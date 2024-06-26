<?php
/**
 * Interface for an ami client.
 *
 * PHP Version 7.4
 *
 * @category Pami
 * @package  Client
 * @author   Marcelo Gornstein <marcelog@gmail.com>
 * @license  http://marcelog.github.com/PAMI/ Apache License 2.0
 * @version  SVN: $Id$
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
namespace PAMI\Client;

use Closure;
use PAMI\Client\Exception\ClientException;
use PAMI\Message\OutgoingMessage;
use PAMI\Message\Response\ResponseMessage;
use Psr\Log\LoggerInterface;

/**
 * Interface for an ami client.
 *
 * PHP Version 7.4
 *
 * @category Pami
 * @package  Client
 * @author   Marcelo Gornstein <marcelog@gmail.com>
 * @license  http://marcelog.github.com/PAMI/ Apache License 2.0
 * @version  SVN: $Id$
 * @link     http://marcelog.github.com/PAMI/
 */
interface IClient
{
    /**
     * Opens a tcp connection to ami.
     *
     * @throws ClientException
     * @return void
     */
    public function open(): void;

    /**
     * Main processing loop. Also called from send(), you should call this in
     * your own application in order to continue reading events and responses
     * from ami.
     *
     * @return void
     */
    public function process(): void;

    /**
     * Registers the given listener so it can receive events. Returns the generated
     * id for this new listener. You can pass in an IEventListener, a Closure,
     * and an array containing the object and name of the method to invoke. Can specify
     * an optional predicate to invoke before calling the callback.
     *
     * @param mixed $listener
     * @param Closure|null $predicate
     *
     * @return string
     */
    public function registerEventListener($listener, ?Closure $predicate = null): string;

    /**
     * Unregisters an event listener.
     *
     * @param string $listenerId The id returned by registerEventListener.
     *
     * @return void
     */
    public function unregisterEventListener(string $listenerId): void;

    /**
     * Closes the connection to ami.
     *
     * @return void
     */
    public function close(): void;

    /**
     * Sends a message to ami.
     *
     * @param OutgoingMessage $message Message to send.
     *
     * @see ClientImpl::send()
     * @throws ClientException
     * @return ResponseMessage
     */
    public function send(OutgoingMessage $message): ResponseMessage;

    /**
     * Sets the logger implementation.
     *
     * @param LoggerInterface $logger The PSR3-Logger
     *
     * @return void
     */
    public function setLogger(LoggerInterface $logger): void;
}
