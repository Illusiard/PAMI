<?php

declare(ticks=1);
/**
 * TCP Client implementation for AMI.
 *
 * PHP Version 7.4
 *
 * @category   Pami
 * @package    Client
 * @subpackage Impl
 * @author     Marcelo Gornstein <marcelog@gmail.com>
 * @author     Boltunov Artem <dev@bluescarf.ru>
 * @license    http://marcelog.github.com/PAMI/ Apache License 2.0
 * @version    SVN: $Id$
 * @link       http://marcelog.github.com/PAMI/
 *
 * Copyright 2011 Marcelo Gornstein <marcelog@gmail.com>
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *     http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 *
 */

namespace PAMI\Client\Impl;

use Closure;
use Exception;
use PAMI\Message\Event\EventMessage;
use PAMI\Message\OutgoingMessage;
use PAMI\Message\Message;
use PAMI\Message\IncomingMessage;
use PAMI\Message\Action\LoginAction;
use PAMI\Message\Response\ResponseMessage;
use PAMI\Message\Event\Factory\Impl\EventFactoryImpl;
use PAMI\Listener\IEventListener;
use PAMI\Client\Exception\ClientException;
use PAMI\Client\IClient;
use Psr\Log\LoggerInterface;
use Psr\Log\NullLogger;

/**
 * TCP Client implementation for AMI.
 *
 * PHP Version 7.4
 *
 * @category   Pami
 * @package    Client
 * @subpackage Impl
 * @author     Marcelo Gornstein <marcelog@gmail.com>
 * @author     Boltunov Artem <dev@bluescarf.ru>
 * @license    http://marcelog.github.com/PAMI/ Apache License 2.0
 * @link       http://marcelog.github.com/PAMI/
 */
class ClientImpl implements IClient
{
    /**
     * PSR-3 logger.
     *
     * @var LoggerInterface
     */
    private LoggerInterface $logger;

    /**
     * Hostname
     *
     * @var string
     */
    private string $host;

    /**
     * TCP Port.
     *
     * @var integer
     */
    private int $port;

    /**
     * Username
     *
     * @var string
     */
    private string $user;

    /**
     * Password
     *
     * @var string
     */
    private string $pass;

    /**
     * Connection timeout, in seconds.
     *
     * @var integer
     */
    private int $cTimeout;

    /**
     * Connection scheme, like tcp:// or tls://
     *
     * @var string
     */
    private string $scheme;

    /**
     * R/W timeout, in milliseconds.
     *
     * @var integer
     */
    private $rTimeout;

    /**
     * Our stream socket resource.
     *
     * @var resource
     */
    private $socket;

    /**
     * Our event listeners
     *
     * @var IEventListener[]
     */
    private array $eventListeners = [];

    /**
     * The receiving queue.
     *
     * @var IncomingMessage[]|ResponseMessage[]
     */
    private array $incomingQueue = [];

    /**
     * Our current received message. May be incomplete, will be completed
     * eventually with an EOM.
     *
     * @var string
     */
    private string $currentProcessingMessage = '';

    /**
     * This should not happen. Asterisk may send responses without a
     * corresponding ActionId.
     *
     * @var ?string
     */
    private ?string $lastActionId = null;

    /**
     * Event mask to apply on login action.
     *
     * @var ?string
     */
    private ?string $eventMask;

    /**
     * Opens a tcp connection to ami.
     *
     * @return void
     * @throws ClientException
     */
    public function open(): void
    {
        $cString      = $this->scheme . $this->host . ':' . $this->port;
        $context      = stream_context_create();
        $errno        = 0;
        $errorMessage = '';
        $this->socket = @stream_socket_client(
            $cString,
            $errno,
            $errorMessage,
            $this->cTimeout,
            STREAM_CLIENT_CONNECT,
            $context
        );
        if ($this->socket === false) {
            throw new ClientException('Error connecting to ami: ' . $errorMessage);
        }
        $msg        = new LoginAction($this->user, $this->pass, $this->eventMask);
        $asteriskId = @stream_get_line($this->socket, 1024, Message::EOL);
        if (strpos($asteriskId, 'Asterisk') === false) {
            throw new ClientException(
                "Unknown peer. Is this an ami?: $asteriskId"
            );
        }
        $response = $this->send($msg);
        if (!$response->isSuccess()) {
            throw new ClientException(
                'Could not connect: ' . $response->getMessage()
            );
        }
        @stream_set_blocking($this->socket, 0);
        $this->currentProcessingMessage = '';
        $this->logger->debug('Logged in successfully to ami.');
    }

    /**
     * Registers the given listener so it can receive events. Returns the generated
     * id for this new listener. You can pass in an IEventListener, a Closure,
     * and an array containing the object and name of the method to invoke. Can specify
     * an optional predicate to invoke before calling the callback.
     *
     * @param mixed    $listener
     * @param ?Closure $predicate
     *
     * @return string
     */
    public function registerEventListener($listener, ?Closure $predicate = null): string
    {
        $listenerId = uniqid('PamiListener', true);

        $this->eventListeners[$listenerId] = [$listener, $predicate];

        return $listenerId;
    }

    /**
     * Unregisters an event listener.
     *
     * @param string $listenerId The id returned by registerEventListener.
     *
     * @return void
     */
    public function unregisterEventListener(string $listenerId): void
    {
        if (isset($this->eventListeners[$listenerId])) {
            unset($this->eventListeners[$listenerId]);
        }
    }

    /**
     * Reads a complete message over the stream until EOM.
     *
     * @return string[]
     * @throws ClientException
     */
    protected function getMessages(): array
    {
        $messages = array();
        // Read something.
        $read = @fread($this->socket, 65535);
        if ($read === false || @feof($this->socket)) {
            throw new ClientException('Error reading');
        }
        $this->currentProcessingMessage .= $read;
        // If we have a complete message, then return it. Save the rest for
        // later.
        while (($marker = strpos($this->currentProcessingMessage, Message::EOM))) {
            $msg                            = substr($this->currentProcessingMessage, 0, $marker);
            $this->currentProcessingMessage = substr(
                $this->currentProcessingMessage,
                $marker + strlen(Message::EOM)
            );
            $messages[]                     = $msg;
        }

        return $messages;
    }

    /**
     * Main processing loop. Also called from send(), you should call this in
     * your own application in order to continue reading events and responses
     * from ami.
     *
     * @throws ClientException
     */
    public function process(): void
    {
        $messages = $this->getMessages();
        foreach ($messages as $aMsg) {
            $this->logger->debug(
                '------ Received: ------ ' . "\n" . $aMsg . "\n\n"
            );
            $resPos = strpos($aMsg, 'Response:');
            $evePos = strpos($aMsg, 'Event:');
            if (($resPos !== false)
                && (($resPos < $evePos) || $evePos === false)
            ) {
                $response                                      = $this->messageToResponse($aMsg);
                $this->incomingQueue[$response->getActionId()] = $response;
            } elseif ($evePos !== false) {
                $event    = $this->messageToEvent($aMsg);
                $response = $this->findResponse($event);
                if (is_null($response) || $response->isComplete()) {
                    $this->dispatch($event);
                } else {
                    $response->addEvent($event);
                }
            } else {
                // broken ami... sending a response with events without
                // Event and ActionId
                $bMsg     = 'Event: ResponseEvent' . "\r\n";
                $bMsg     .= 'ActionId: ' . $this->lastActionId . "\r\n" . $aMsg;
                $event    = $this->messageToEvent($bMsg);
                $response = $this->findResponse($event);
                if ($response) {
                    $response->addEvent($event);
                }
            }
            $this->logger->debug('----------------');
        }
    }

    /**
     * Tries to find an associated response for the given message.
     *
     * @param IncomingMessage $message Message sent by asterisk.
     *
     * @return null|ResponseMessage|IncomingMessage
     */
    protected function findResponse(IncomingMessage $message)
    {
        $actionId = $message->getActionId();

        return $this->incomingQueue[$actionId] ?? null;
    }

    /**
     * Dispatch the incoming message to a handler.
     *
     * @param IncomingMessage $message Message to dispatch.
     *
     * @return void
     */
    protected function dispatch(IncomingMessage $message): void
    {
        foreach ($this->eventListeners as [$listener, $predicate]) {
            if (is_callable($predicate) && !$predicate($message)) {
                continue;
            }
            if ($listener instanceof Closure) {
                $listener($message);
            } elseif (is_array($listener)) {
                $listener[0]->{$listener[1]}($message);
            } else {
                $listener->handle($message);
            }
        }
    }

    /**
     * Returns a ResponseMessage from a raw string that came from asterisk.
     *
     * @param string $msg Raw string.
     *
     * @return ResponseMessage
     */
    private function messageToResponse(string $msg): ResponseMessage
    {
        $response = new ResponseMessage($msg);
        $actionId = $response->getActionId();
        if (is_null($actionId)) {
            $response->setActionId($this->lastActionId);
        }

        return $response;
    }

    /**
     * Returns a EventMessage from a raw string that came from asterisk.
     *
     * @param string $msg Raw string.
     *
     * @return EventMessage
     */
    private function messageToEvent(string $msg): EventMessage
    {
        return EventFactoryImpl::createFromRaw($msg);
    }

    /**
     * Returns a message (response) related to the given message. This uses
     * the ActionID tag (key).
     *
     * @return IncomingMessage
     * @todo not suitable for multi threaded applications.
     *
     */
    protected function getRelated(OutgoingMessage $message)
    {
        $ret = false;
        $id  = $message->getActionID();
        if (isset($this->incomingQueue[$id])) {
            $response = $this->incomingQueue[$id];
            if ($response->isComplete()) {
                unset($this->incomingQueue[$id]);
                $ret = $response;
            }
        }

        return $ret;
    }

    /**
     * Sends a message to ami.
     *
     * @param OutgoingMessage $message Message to send.
     *
     * @return ResponseMessage|IncomingMessage
     * @throws ClientException
     * @throws Exception
     * @see ClientImpl::send()
     */
    public function send(OutgoingMessage $message, ?int $timeout = null): ResponseMessage
    {
        $messageToSend = $message->serialize();
        $length        = strlen($messageToSend);
        $this->logger->debug(
            '------ Sending: ------ ' . "\n" . $messageToSend . '----------'
        );
        $this->lastActionId = $message->getActionId();
        if (@fwrite($this->socket, $messageToSend) < $length) {
            throw new ClientException('Could not send message');
        }
        $read = 0;
        while ($read <= ($timeout ?? $this->rTimeout)) {
            $this->process();
            $response = $this->getRelated($message);
            if ($response !== false) {
                $this->lastActionId = null;

                return $response;
            }
            usleep(1000); // 1ms delay
            if (($timeout ?? $this->rTimeout) > 0) {
                $read++;
            }
        }
        throw new ClientException('Read timeout');
    }

    /**
     * Closes the connection to ami.
     *
     * @return void
     */
    public function close(): void
    {
        $this->logger->debug('Closing connection to asterisk.');
        @stream_socket_shutdown($this->socket, STREAM_SHUT_RDWR);
    }

    /**
     * Sets the logger implementation.
     *
     * @param LoggerInterface $logger The PSR3-Logger
     *
     * @return void
     */
    public function setLogger(LoggerInterface $logger): void
    {
        $this->logger = $logger;
    }

    /**
     * Constructor.
     *
     * @param string[] $options Options for ami client.
     *
     */
    public function __construct(array $options)
    {
        $this->logger    = new NullLogger();
        $this->host      = $options['host'];
        $this->port      = (int)$options['port'];
        $this->user      = $options['username'];
        $this->pass      = $options['secret'];
        $this->cTimeout  = $options['connect_timeout'];
        $this->rTimeout  = $options['read_timeout'];
        $this->scheme    = $options['scheme'] ?? 'tcp://';
        $this->eventMask = $options['event_mask'] ?? null;
    }
}
