<?php
/**
 * An AsyncAGI client implementation.
 *
 * PHP Version 7.4
 *
 * @category Pami
 * @package  AsyncAgi
 * @author   Marcelo Gornstein <marcelog@gmail.com>
 * @license  http://marcelog.github.com/PAMI/ Apache License 2.0
 * @link     http://marcelog.github.com/PAMI/
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

namespace PAMI\AsyncAgi;

use PAGI\Exception\ChannelDownException;
use PAGI\Exception\InvalidCommandException;
use PAMI\Client\Exception\ClientException;
use PAMI\Client\IClient as PamiClient;
use PAGI\Client\AbstractClient as PagiClient;
use PAMI\Listener\IEventListener;
use PAMI\Message\Action\AGIAction;
use PAMI\Message\Event\AsyncAGIEvent;
use PAMI\Message\Event\EventMessage;
use PAGI\Client\Result\Result;
use Psr\Log\NullLogger;

/**
 * An AGI client implementation.
 *
 * PHP Version 7.4
 *
 * @category Pami
 * @package  AsyncAgi
 * @author   Marcelo Gornstein <marcelog@gmail.com>
 * @license  http://marcelog.github.com/PAMI/ Apache License 2.0
 * @link     http://marcelog.github.com/PAMI/
 */
class AsyncClientImpl extends PagiClient implements IEventListener
{
    /**
     * The pami client to be used.
     *
     * @var PamiClient
     */
    private PamiClient $pamiClient;
    /**
     * The event that originated this async agi request.
     *
     * @var AsyncAGIEvent
     */
    private AsyncAGIEvent $asyncAgiEvent;
    /**
     * The channel that originated this async agi request.
     *
     * @var ?string
     */
    private ?string $channel = null;
    /**
     * The listener id after registering with the pami client.
     *
     * @var ?string
     */
    private ?string $listenerId = null;

    /**
     * Last CommandId issued, so we can track responses for agi commands.
     *
     * @var ?string
     */
    private ?string $lastCommandId = null;

    /**
     * Filled when an async agi event has been received, with command id equal
     * to the last command id sent.
     *
     * @var ?string
     */
    private ?string $lastAgiResult = null;

    /**
     * Handles pami events.
     *
     * @param EventMessage $event
     *
     * @return void
     */
    public function handle(EventMessage $event): void
    {
        if (($event instanceof AsyncAGIEvent) && $event->getCommandId() === $this->lastCommandId) {
            $this->lastAgiResult = trim($event->getResult());
        }
    }

    /**
     * (non-PHPDoc)
     *
     * @param string $text
     *
     * @return Result
     * @throws ClientException
     * @throws ChannelDownException
     * @throws InvalidCommandException
     * @see ClientImpl::send()
     */
    protected function send($text): Result
    {
        $this->logger->debug('Sending: ' . $text);
        $this->lastCommandId = uniqid(__CLASS__, true);
        $action              = new AGIAction($this->channel, $text, $this->lastCommandId);
        $this->lastAgiResult = false;
        $response            = $this->pamiClient->send($action);
        if (!$response->isSuccess()) {
            throw new ChannelDownException($response->getMessage());
        }
        while ($this->lastAgiResult === false) {
            $this->pamiClient->process();
            usleep(1000);
        }
        
        return $this->getResultFromResultString($this->lastAgiResult);
    }

    /**
     * (non-PHPDoc)
     *
     * @see ClientImpl::open()
     */
    protected function open(): void
    {
        $environment   = $this->asyncAgiEvent->getEnvironment();
        $this->channel = $this->asyncAgiEvent->getChannel();
        foreach (explode("\n", $environment) as $line) {
            if ($this->isEndOfEnvironmentVariables($line)) {
                break;
            }
            $this->readEnvironmentVariable($line);
        }
        $this->listenerId = $this->pamiClient->registerEventListener($this);
        $this->logger->debug(print_r($this->variables, true));
    }

    /**
     * (non-PHPDoc)
     *
     * @see ClientImpl::close()
     */
    protected function close(): void
    {
        $this->pamiClient->unregisterEventListener($this->listenerId);
    }

    /**
     * Constructor.
     *
     * Note: The client accepts an array with options. The available options are
     *
     * pamiClient => The PAMI client that will be used to run this async client.
     *
     * environment => Environment as received by the AsyncAGI Event.
     *
     * @param array $options Optional properties.
     *
     * @return void
     */
    public function __construct(array $options = [])
    {
        $this->logger        = new NullLogger();
        $this->pamiClient    = $options['pamiClient'];
        $this->asyncAgiEvent = $options['asyncAgiEvent'];
        $this->open();
    }
}
