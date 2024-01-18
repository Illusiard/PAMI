<?php
/**
 * This class will test the ami client
 *
 * PHP Version 7.4
 *
 * @category   Pami
 * @package    Test
 * @subpackage Client
 * @author     Marcelo Gornstein <marcelog@gmail.com>
 * @author     Boltunov Artem <dev@bluescarf.ru>
 * @license    http://marcelog.github.com/ Apache License 2.0
 * @version    SVN: $Id$
 * @link       http://marcelog.github.com/
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

namespace {

    $mockTime                  = false;
    $mockTimeCount             = false;
    $mockTimeReturn            = false;
    $mock_stream_socket_client = false;
    $mock_stream_set_blocking  = false;
    $mockFwrite                = false;
    $mockFwriteReturn          = false;
    $mockFwriteCount           = 0;
    $mockFgets                 = false;
    $mockFgetsCount            = 0;
    $mockFreadReturn           = false;
    $standardAMIStart          = [
        'Asterisk Call Manager/1.1',
        'Response: Success',
        'ActionID: 1432.123',
        'Message: Authentication accepted',
        '',
        'Response: Goodbye',
        'ActionID: 1432.123',
        'Message: Thanks for all the fish.',
        '',
    ];
    $standardAMIStartBadLogin  = [
        'Asterisk Call Manager/1.1',
        'Response: Error', // also tests behavior when asterisk does not return an actionid
        'Message: Authentication accepted',
        '',
    ];
}

namespace PAMI\Message\Action {

    function microtime(): float
    {
        global $mockTime;
        global $mockTimeCount;
        global $mockTimeReturn;
        if (isset($mockTime) && $mockTime === true) {
            return 1432.123;
        }

        return \microtime(...func_get_args());
    }
}

namespace PAMI\Client\Impl {

    use Exception;
    use PAMI\Client\Exception\ClientException;
    use PAMI\Listener\IEventListener;
    use PAMI\Message\Action\CoreShowChannelsAction;
    use PAMI\Message\Action\LoginAction;
    use PAMI\Message\Event\CoreShowChannelsCompleteEvent;
    use PAMI\Message\Event\EventMessage;
    use PAMI\Message\Event\PeerStatusEvent;
    use PAMI\Message\Event\UnknownEvent;
    use PAMI\Message\IncomingMessage;
    use PAMI\Message\Response\ResponseMessage;

    use PHPUnit_Framework_TestCase;
    use RuntimeException;

    use function stream_get_line as stream_get_lineAlias;
    use function time;

    function microtime(): float
    {
        global $mockTime;
        global $mockTimeCount;
        global $mockTimeReturn;
        if (isset($mockTime) && $mockTime === true) {
            return 1432.123;
        }

        return \microtime(...func_get_args());
    }

    function stream_socket_client(
        $remote_socket,
        &$errno = null,
        &$errstr = null,
        $timeout = null,
        $flags = null,
        $context = null
    ) {
        global $mock_stream_socket_client;
        if (!isset($mock_stream_socket_client) || $mock_stream_socket_client !== true) {
            return \stream_socket_client($remote_socket, $errno, $errstr, $timeout, $flags, $context);
        }

        return null;
    }

    function stream_socket_shutdown(): bool
    {
        return true;
    }

    function stream_set_blocking(): bool
    {
        global $mock_stream_set_blocking;
        if (isset($mock_stream_set_blocking) && $mock_stream_set_blocking === true) {
            return true;
        }

        return \stream_set_blocking(...func_get_args());
    }

    /**
     * @return false|int
     * @throws Exception
     */
    function fwrite()
    {
        global $mockFwrite;
        global $mockFwriteCount;
        global $mockFwriteReturn;
        if (isset($mockFwrite) && $mockFwrite === true) {
            $args = func_get_args();
            if (isset($mockFwriteReturn[$mockFwriteCount]) && $mockFwriteReturn[$mockFwriteCount] !== false) {
                if ($mockFwriteReturn[$mockFwriteCount] === 'fwrite error') {
                    $mockFwriteCount++;

                    return 0;
                }
                $str = $mockFwriteReturn[$mockFwriteCount] . "\r\n";
                if ($str !== $args[1]) {
                    throw new RuntimeException(
                        'Mocked: ' . PHP_EOL . PHP_EOL . print_r($mockFwriteReturn[$mockFwriteCount], true) . PHP_EOL
                        . PHP_EOL
                        . ' is different from: ' . PHP_EOL . PHP_EOL . print_r($args[1], true)
                    );
                }
            }
            $mockFwriteCount++;

            return strlen($args[1]);
        }

        return \fwrite(...func_get_args());
    }

    function stream_get_line()
    {
        global $mockFgets;
        global $mockFgetsCount;
        global $mockFgetsReturn;
        if (isset($mockFgets) && $mockFgets === true) {
            $result = $mockFgetsReturn[$mockFgetsCount];
            $mockFgetsCount++;

            return is_string($result) ? $result . "\r\n" : $result;
        }

        return stream_get_lineAlias(...func_get_args());
    }

    function feof($resource): bool
    {
        global $mockFgets;
        if (isset($mockFgets) && $mockFgets === true) {
            return false;
        }

        return \feof($resource);
    }

    function fread()
    {
        global $mockFgets;
        global $mockFgetsCount;
        global $mockFgetsReturn;
        if (isset($mockFgets) && $mockFgets === true) {
            $result = $mockFgetsReturn[$mockFgetsCount];
            $mockFgetsCount++;
            if (is_int($result)) {
                sleep($result);

                return '';
            }

            return is_string($result) ? $result . "\r\n" : $result;
        }

        return \fread(...func_get_args());
    }

    function setFgetsMock(array $readValues, $writeValues)
    {
        global $mockFgets;
        global $mockFopen;
        global $mockFgetsCount;
        global $mockFgetsReturn;
        global $mockFwrite;
        global $mockFwriteCount;
        global $mockFwriteReturn;
        $mockFgets        = true;
        $mockFopen        = true;
        $mockFwrite       = true;
        $mockFgetsCount   = 0;
        $mockFgetsReturn  = $readValues;
        $mockFwriteCount  = 0;
        $mockFwriteReturn = $writeValues;
    }

    /**
     * This class will test the ami client
     *
     * PHP Version 7.4
     *
     * @category   Pami
     * @package    Test
     * @subpackage Client
     * @author     Marcelo Gornstein <marcelog@gmail.com>
     * @author     Boltunov Artem <dev@bluescarf.ru>
     * @license    http://marcelog.github.com/ Apache License 2.0
     * @link       http://marcelog.github.com/
     */
    class Test_Client extends PHPUnit_Framework_TestCase
    {
        private array $_properties = [];

        /**
         * @return void
         */
        public function setUp(): void
        {
            $this->_properties = [];
        }

        /**
         * @test
         */
        public function can_get_client(): void
        {
            $options = [
                'host'            => 'tcp://1.1.1.1',
                'port'            => 9999,
                'username'        => 'asd',
                'secret'          => 'asd',
                'connect_timeout' => 10,
                'read_timeout'    => 10,
            ];
            $client  = new ClientImpl($options);
        }

        /**
         * @test
         */
        public function can_connect_timeout(): void
        {
            $options = [
                'host'            => '2.3.4.5',
                'scheme'          => 'tcp://',
                'port'            => 9999,
                'username'        => 'asd',
                'secret'          => 'asd',
                'connect_timeout' => 3,
                'read_timeout'    => 10,
            ];
            $start   = time();
            try {
                $client = new ClientImpl($options);
                $client->open();
            } catch (Exception $e) {
            }
            $length = time() - $start;
            $this->assertTrue($length >= 2 && $length <= 5);
        }

        /**
         * @test
         * @trow ClientException
         * @throws ClientException
         */
        public function can_detect_other_peer(): void
        {
            global $mock_stream_socket_client;
            global $mock_stream_set_blocking;
            $mock_stream_socket_client = true;
            $mock_stream_set_blocking  = true;
            $options                   = [
                'host'            => '2.3.4.5',
                'scheme'          => 'tcp://',
                'port'            => 9999,
                'username'        => 'asd',
                'secret'          => 'asd',
                'connect_timeout' => 10,
                'read_timeout'    => 10,
            ];
            $read                      = ['Whatever'];
            $write                     = [];
            setFgetsMock($read, $write);
            $client = new ClientImpl($options);
            $client->open();
        }

        /**
         * @test
         * @throws ClientException
         */
        public function can_register_event_listener(): void
        {
            global $mock_stream_socket_client;
            global $mock_stream_set_blocking;
            global $mockTime;
            global $standardAMIStart;
            $mockTime                  = true;
            $mock_stream_socket_client = true;
            $mock_stream_set_blocking  = true;
            $options                   = [
                'host'            => '2.3.4.5',
                'scheme'          => 'tcp://',
                'port'            => 9999,
                'username'        => 'asd',
                'secret'          => 'asd',
                'connect_timeout' => 10,
                'read_timeout'    => 10,
            ];
            $write                     = [
                "action: Login\r\nactionid: 1432.123\r\nusername: asd\r\nsecret: asd\r\n",
            ];
            setFgetsMock($standardAMIStart, $write);
            $client = new ClientImpl($options);
            $client->registerEventListener(new SomeListenerClass());
            $client->open();
            $event = [
                'Event: PeerStatus',
                'Privilege: system,all',
                'ChannelType: SIP',
                'Peer: SIP/someguy',
                'PeerStatus: Registered',
                '',
            ];
            setFgetsMock($event, $event);
            for ($i = 0; $i < 6; $i++) {
                $client->process();
            }
            $event = SomeListenerClass::$event;
            $this->assertEquals('PeerStatus', $event->getName());
            $this->assertInstanceOf(PeerStatusEvent::class, $event);
        }

        /**
         * @test
         * @throws ClientException
         */
        public function can_register_closure_event_listener(): void
        {
            global $mock_stream_socket_client;
            global $mock_stream_set_blocking;
            global $mockTime;
            global $standardAMIStart;
            $mockTime                  = true;
            $mock_stream_socket_client = true;
            $mock_stream_set_blocking  = true;
            $options                   = [
                'host'            => '2.3.4.5',
                'scheme'          => 'tcp://',
                'port'            => 9999,
                'username'        => 'asd',
                'secret'          => 'asd',
                'connect_timeout' => 10,
                'read_timeout'    => 10,
            ];
            $write                     = [
                "action: Login\r\nactionid: 1432.123\r\nusername: asd\r\nsecret: asd\r\n",
            ];
            setFgetsMock($standardAMIStart, $write);
            $client         = new ClientImpl($options);
            $resultVariable = false;
            $client->registerEventListener(function ($event) use (&$resultVariable) {
                $resultVariable = $event;
            });
            $client->open();
            $event = [
                'Event: PeerStatus',
                'Privilege: system,all',
                'ChannelType: SIP',
                'Peer: SIP/someguy',
                'PeerStatus: Registered',
                '',
            ];
            setFgetsMock($event, $event);
            for ($i = 0; $i < 6; $i++) {
                $client->process();
            }
            $this->assertEquals('PeerStatus', $resultVariable->getName());
            $this->assertInstanceOf(PeerStatusEvent::class, $resultVariable);
        }

        /**
         * @test
         * @throws ClientException
         */
        public function can_register_method_event_listener(): void
        {
            global $mock_stream_socket_client;
            global $mock_stream_set_blocking;
            global $mockTime;
            global $standardAMIStart;
            $mockTime                  = true;
            $mock_stream_socket_client = true;
            $mock_stream_set_blocking  = true;
            $options                   = [
                'host'            => '2.3.4.5',
                'scheme'          => 'tcp://',
                'port'            => 9999,
                'username'        => 'asd',
                'secret'          => 'asd',
                'connect_timeout' => 10,
                'read_timeout'    => 10,
            ];
            $write                     = [
                "action: Login\r\nactionid: 1432.123\r\nusername: asd\r\nsecret: asd\r\n",
            ];
            setFgetsMock($standardAMIStart, $write);
            $client         = new ClientImpl($options);
            $resultVariable = false;
            $listener       = new SomeListenerClass();
            $client->registerEventListener([$listener, 'handle']);
            $client->open();
            $event = [
                'Event: PeerStatus',
                'Privilege: system,all',
                'ChannelType: SIP',
                'Peer: SIP/someguy',
                'PeerStatus: Registered',
                '',
            ];
            setFgetsMock($event, $event);
            for ($i = 0; $i < 6; $i++) {
                $client->process();
            }
            $event = SomeListenerClass::$event;
            $this->assertEquals('PeerStatus', $event->getName());
            $this->assertInstanceOf(PeerStatusEvent::class, $event);
        }

        /**
         * @test
         * @throws ClientException
         */
        public function can_unregister_event_listener(): void
        {
            global $mock_stream_socket_client;
            global $mock_stream_set_blocking;
            global $mockTime;
            global $standardAMIStart;
            $mockTime                  = true;
            $mock_stream_socket_client = true;
            $mock_stream_set_blocking  = true;
            $options                   = [
                'host'            => '2.3.4.5',
                'scheme'          => 'tcp://',
                'port'            => 9999,
                'username'        => 'asd',
                'secret'          => 'asd',
                'connect_timeout' => 10,
                'read_timeout'    => 10,
            ];
            $write                     = [
                "action: Login\r\nactionid: 1432.123\r\nusername: asd\r\nsecret: asd\r\n",
            ];
            setFgetsMock($standardAMIStart, $write);
            $client                   = new ClientImpl($options);
            SomeListenerClass::$event = null;
            $id                       = $client->registerEventListener(new SomeListenerClass());
            $client->open();
            $event = [
                'Event: PeerStatus',
                'Privilege: system,all',
                'ChannelType: SIP',
                'Peer: SIP/someguy',
                'PeerStatus: Registered',
                '',
            ];
            setFgetsMock($event, $event);
            $client->unregisterEventListener($id);
            for ($i = 0; $i < 6; $i++) {
                $client->process();
            }
            $event = SomeListenerClass::$event;
            $this->assertNull(SomeListenerClass::$event);
        }

        /**
         * @test
         * @throws ClientException
         */
        public function can_filter_with_predicate(): void
        {
            global $mock_stream_socket_client;
            global $mock_stream_set_blocking;
            global $mockTime;
            global $standardAMIStart;
            $mockTime                  = true;
            $mock_stream_socket_client = true;
            $mock_stream_set_blocking  = true;
            $options                   = [
                'host'            => '2.3.4.5',
                'scheme'          => 'tcp://',
                'port'            => 9999,
                'username'        => 'asd',
                'secret'          => 'asd',
                'connect_timeout' => 10,
                'read_timeout'    => 10,
            ];
            $write                     = [
                "action: Login\r\nactionid: 1432.123\r\nusername: asd\r\nsecret: asd\r\n",
            ];
            setFgetsMock($standardAMIStart, $write);
            $client         = new ClientImpl($options);
            $resultVariable = false;
            $client->registerEventListener(
                function ($event) use (&$resultVariable) {
                    $resultVariable = $event;
                },
                function ($event) {
                    return false;
                }
            );
            $client->open();
            $event = [
                'Event: PeerStatus',
                'Privilege: system,all',
                'ChannelType: SIP',
                'Peer: SIP/someguy',
                'PeerStatus: Registered',
                '',
            ];
            setFgetsMock($event, $event);
            for ($i = 0; $i < 6; $i++) {
                $client->process();
            }
            $this->assertFalse($resultVariable);
        }

        /**
         * @test
         * @throws ClientException
         */
        public function can_login(): void
        {
            global $mock_stream_socket_client;
            global $mock_stream_set_blocking;
            global $mockTime;
            global $standardAMIStart;
            $mockTime                  = true;
            $mock_stream_socket_client = true;
            $mock_stream_set_blocking  = true;
            $options                   = [
                'host'            => '2.3.4.5',
                'scheme'          => 'tcp://',
                'port'            => 9999,
                'username'        => 'asd',
                'secret'          => 'asd',
                'connect_timeout' => 10,
                'read_timeout'    => 10,
            ];
            $write                     = [
                "action: Login\r\nactionid: 1432.123\r\nusername: asd\r\nsecret: asd\r\n",
            ];
            setFgetsMock($standardAMIStart, $write);
            $client = new ClientImpl($options);
            $client->open();
            $client->close();
        }

        /**
         * @test
         * @throw ClientException
         * @throws ClientException
         */
        public function cannot_send(): void
        {
            global $mock_stream_socket_client;
            global $mock_stream_set_blocking;
            global $mockTime;
            global $standardAMIStart;
            $mockTime                  = true;
            $mock_stream_socket_client = true;
            $mock_stream_set_blocking  = true;
            $options                   = [
                'host'            => '2.3.4.5',
                'scheme'          => 'tcp://',
                'port'            => 9999,
                'username'        => 'asd',
                'secret'          => 'asd',
                'connect_timeout' => 10,
                'read_timeout'    => 10,
            ];
            $write                     = [
                'fwrite error',
            ];
            setFgetsMock($standardAMIStart, $write);
            $client = new ClientImpl($options);
            $client->open();
        }

        /**
         * @test
         * @throw ClientException
         * @throws ClientException
         */
        public function cannot_login(): void
        {
            global $mock_stream_socket_client;
            global $mock_stream_set_blocking;
            global $mockTime;
            global $standardAMIStartBadLogin;
            $mockTime                  = true;
            $mock_stream_socket_client = true;
            $mock_stream_set_blocking  = true;
            $options                   = [
                'host'            => '2.3.4.5',
                'scheme'          => 'tcp://',
                'port'            => 9999,
                'username'        => 'asd',
                'secret'          => 'asd',
                'connect_timeout' => 10,
                'read_timeout'    => 10,
            ];
            $write                     = [
                "action: Login\r\nactionid: 1432.123\r\nusername: asd\r\nsecret: asd\r\n",
            ];
            setFgetsMock($standardAMIStartBadLogin, $write);
            $client = new ClientImpl($options);
            $client->open();
        }

        /**
         * @test
         * @throw ClientException
         * @throws ClientException
         */
        public function cannot_read(): void
        {
            global $mock_stream_socket_client;
            global $mock_stream_set_blocking;
            global $mockTime;
            global $standardAMIStart;
            $mockTime                  = true;
            $mock_stream_socket_client = true;
            $mock_stream_set_blocking  = true;
            $options                   = [
                'host'            => '2.3.4.5',
                'scheme'          => 'tcp://',
                'port'            => 9999,
                'username'        => 'asd',
                'secret'          => 'asd',
                'connect_timeout' => 10,
                'read_timeout'    => 10,
            ];
            $write                     = [
                "action: Login\r\nactionid: 1432.123\r\nusername: asd\r\nsecret: asd\r\n",
            ];
            setFgetsMock($standardAMIStart, $write);
            $client = new ClientImpl($options);
            $client->open();
            setFgetsMock([false], $write);
            $client->send(new LoginAction('asd', 'asd'));
        }

        /**
         * @test
         * @throw ClientException
         * @throws ClientException
         */
        public function cannot_read_by_read_timeout(): void
        {
            global $mock_stream_socket_client;
            global $mock_stream_set_blocking;
            global $mockTime;
            global $standardAMIStart;
            $mockTime                  = true;
            $mock_stream_socket_client = true;
            $mock_stream_set_blocking  = true;
            $options                   = [
                'host'            => '2.3.4.5',
                'scheme'          => 'tcp://',
                'port'            => 9999,
                'username'        => 'asd',
                'secret'          => 'asd',
                'connect_timeout' => 10,
                'read_timeout'    => 1,
            ];
            $write                     = [
                "action: Login\r\nactionid: 1432.123\r\nusername: asd\r\nsecret: asd\r\n",
            ];
            setFgetsMock($standardAMIStart, $write);
            $client = new ClientImpl($options);
            $client->open();
            setFgetsMock([10, 4], $write);
            $start = time();
            $client->send(new LoginAction('asd', 'asd'));
            $this->assertEquals(10, time() - $start);
        }

        /**
         * @test
         * @throws ClientException
         */
        public function can_get_response_with_associated_events(): void
        {
            global $mock_stream_socket_client;
            global $mock_stream_set_blocking;
            global $mockTime;
            global $standardAMIStart;
            $mockTime                  = true;
            $mock_stream_socket_client = true;
            $mock_stream_set_blocking  = true;
            $options                   = [
                'host'            => '2.3.4.5',
                'scheme'          => 'tcp://',
                'port'            => 9999,
                'username'        => 'asd',
                'secret'          => 'asd',
                'connect_timeout' => 10,
                'read_timeout'    => 10,
            ];
            $write                     = [
                "action: Login\r\nactionid: 1432.123\r\nusername: asd\r\nsecret: asd\r\n",
            ];
            setFgetsMock($standardAMIStart, $write);
            $client = new ClientImpl($options);
            $client->registerEventListener(new SomeListenerClass());
            $client->open();
            $event = [
                'Response: Success',
                'ActionID: 1432.123',
                'Eventlist: start',
                'Message: Channels will follow',
                '',
                'Event: CoreShowChannelsComplete',
                'EventList: Complete',
                'ListItems: 0',
                'ActionID: 1432.123',
                '',
            ];
            $write = [
                "action: CoreShowChannels\r\nactionid: 1432.123\r\n",
            ];
            setFgetsMock($event, $write);
            $result = $client->send(new CoreShowChannelsAction());
            $this->assertInstanceOf(ResponseMessage::class, $result);
            $events = $result->getEvents();
            $this->assertCount(1, $events);
            $this->assertInstanceOf(CoreShowChannelsCompleteEvent::class, $events[0]);
            $this->assertEquals(
                $events[0]->getRawContent(),
                implode("\r\n", [
                    'Event: CoreShowChannelsComplete',
                    'EventList: Complete',
                    'ListItems: 0',
                    'ActionID: 1432.123',
                ])
            );
        }

        /**
         * @test
         * @throws ClientException
         */
        public function can_serialize_response_and_events(): void
        {
            global $mock_stream_socket_client;
            global $mock_stream_set_blocking;
            global $mockTime;
            global $standardAMIStart;
            $mockTime                  = true;
            $mock_stream_socket_client = true;
            $mock_stream_set_blocking  = true;
            $options                   = [
                'host'            => '2.3.4.5',
                'scheme'          => 'tcp://',
                'port'            => 9999,
                'username'        => 'asd',
                'secret'          => 'asd',
                'connect_timeout' => 10,
                'read_timeout'    => 10,
            ];
            $write                     = [
                "action: Login\r\nactionid: 1432.123\r\nusername: asd\r\nsecret: asd\r\n",
            ];
            setFgetsMock($standardAMIStart, $write);
            $client = new ClientImpl($options);
            $client->registerEventListener(new SomeListenerClass());
            $client->open();
            $event = [
                'Response: Success',
                'ActionID: 1432.123',
                'Eventlist: start',
                'Message: Channels will follow',
                '',
                'Event: CoreShowChannelsComplete',
                'EventList: Complete',
                'ListItems: 0',
                'ActionID: 1432.123',
                '',
            ];
            $write = [
                "action: CoreShowChannels\r\nactionid: 1432.123\r\n",
            ];
            setFgetsMock($event, $write);
            $result  = $client->send(new CoreShowChannelsAction());
            $ser     = serialize($result);
            $result2 = unserialize($ser, ['allowedClasses' => [ResponseMessage::class, IncomingMessage::class]]);
            $events  = $result2->getEvents();
            $this->assertEquals('Channels will follow', $result2->getMessage());
            $this->assertEquals('CoreShowChannelsComplete', $events[0]->getName());
            $this->assertEquals(0, $events[0]->getListItems());
        }

        /**
         * @test
         * @throws ClientException
         */
        public function can_get_response_events_without_actionid_and_event(): void
        {
            global $mock_stream_socket_client;
            global $mock_stream_set_blocking;
            global $mockTime;
            global $standardAMIStart;
            $mockTime                  = true;
            $mock_stream_socket_client = true;
            $mock_stream_set_blocking  = true;
            $options                   = [
                'host'            => '2.3.4.5',
                'scheme'          => 'tcp://',
                'port'            => 9999,
                'username'        => 'asd',
                'secret'          => 'asd',
                'connect_timeout' => 1000,
                'read_timeout'    => 1000,
            ];
            $write                     = [
                "action: Login\r\nactionid: 1432.123\r\nusername: asd\r\nsecret: asd\r\n",
            ];
            setFgetsMock($standardAMIStart, $write);
            $client = new ClientImpl($options);
            $client->registerEventListener(new SomeListenerClass());
            $client->open();
            $event = [
                'Response: Success',
                'ActionID: 1432.123',
                'Eventlist: start',
                'Message: Channels will follow',
                '',
                'Channel: pepe',
                'Count: Blah',
                '',
                'Event: CoreShowChannelsComplete',
                'EventList: Complete',
                'ListItems: 0',
                'ActionID: 1432.123',
                '',
            ];
            $write = [
                "action: CoreShowChannels\r\nactionid: 1432.123\r\n",
            ];
            setFgetsMock($event, $write);
            $result = $client->send(new CoreShowChannelsAction());
            $events = $result->getEvents();
            $this->assertEquals('ResponseEvent', $events[0]->getName());
            $this->assertEquals('pepe', $events[0]->getKey('Channel'));
            $this->assertEquals('Blah', $events[0]->getKey('Count'));
            $this->assertEquals('CoreShowChannelsComplete', $events[1]->getName());
            $this->assertEquals(0, $events[1]->getListItems());
        }

        /**
         * @test
         */
        public function can_get_set_variable(): void
        {
            $now    = time();
            $action = new LoginAction('a', 'b');
            $this->assertEquals($now, $action->getCreatedDate());
            $action->setVariable('variable', 'value');
            $this->assertEquals('value', $action->getVariable('variable'));
            $this->assertNull($action->getVariable('variable2'));
        }

        /**
         * @test
         */
        public function can_get_set_variable_with_multiple_values(): void
        {
            global $mockTime;
            $mockTime = true;
            $now      = time();
            $action   = new LoginAction('a', 'b');
            $this->assertEquals($now, $action->getCreatedDate());
            $action->setVariable('variable', ['value1', 'value2']);
            $text
                = "action: Login\r\n"
                . "actionid: 1432.123\r\n"
                . "username: a\r\n"
                . "secret: b\r\n"
                . "Variable: variable=value1\r\n"
                . "Variable: variable=value2\r\n"
                . "\r\n";
            $this->assertEquals($text, $action->serialize());
        }

        /**
         * @test
         * @throws ClientException
         */
        public function can_report_unknown_event(): void
        {
            global $mock_stream_socket_client;
            global $mock_stream_set_blocking;
            global $mockTime;
            global $standardAMIStart;
            $mockTime                  = true;
            $mock_stream_socket_client = true;
            $mock_stream_set_blocking  = true;
            $options                   = [
                'host'            => '2.3.4.5',
                'scheme'          => 'tcp://',
                'port'            => 9999,
                'username'        => 'asd',
                'secret'          => 'asd',
                'connect_timeout' => 10,
                'read_timeout'    => 10,
            ];
            $write                     = [
                "action: Login\r\nactionid: 1432.123\r\nusername: asd\r\nsecret: asd\r\n",
            ];
            setFgetsMock($standardAMIStart, $write);
            $client = new ClientImpl($options);
            $client->registerEventListener(new SomeListenerClass());
            $client->open();
            $event = [
                'Event: MyOwnImaginaryEvent',
                'Privilege: system,all',
                'ChannelType: SIP',
                '',
            ];
            setFgetsMock($event, $event);
            for ($i = 0; $i < 4; $i++) {
                $client->process();
            }
            $this->assertInstanceOf(UnknownEvent::class, SomeListenerClass::$event);
        }

        /**
         * @test
         * @group channel_vars
         * ChanVariable is sent without a channel name and without a "channel"
         * key.
         * https://github.com/marcelog/PAMI/issues/85
         * @throws ClientException
         */
        public function can_get_channel_variables_without_default_channel_name(): void
        {
            global $mock_stream_socket_client;
            global $mock_stream_set_blocking;
            global $mockTime;
            global $standardAMIStart;
            $mockTime                  = true;
            $mock_stream_socket_client = true;
            $mock_stream_set_blocking  = true;
            $options                   = [
                'host'            => '2.3.4.5',
                'scheme'          => 'tcp://',
                'port'            => 9999,
                'username'        => 'asd',
                'secret'          => 'asd',
                'connect_timeout' => 10,
                'read_timeout'    => 10,
            ];
            $write                     = [
                "action: Login\r\nactionid: 1432.123\r\nusername: asd\r\nsecret: asd\r\n",
            ];
            setFgetsMock($standardAMIStart, $write);
            $client = new ClientImpl($options);
            $client->registerEventListener(new SomeListenerClass());
            $client->open();
            $event = [
                'Event: Dial',
                'Privilege: call,all',
                'SubEvent: Begin',
                'Destination: SIP/jw1034-00000010',
                'CallerIDNum: 1201',
                'CallerIDName: <unknown>',
                'ConnectedLineNum: strategy-sequential',
                'ConnectedLineName: <unknown>',
                'UniqueID: pbx-1439974866.33',
                'DestUniqueID: pbx-1439974866.34',
                'Dialstring: jw1034',
                'ChanVariable: var1',
                'ChanVariable: var2=v2',
                '',
            ];
            setFgetsMock($event, $event);
            for ($i = 0; $i < 14; $i++) {
                $client->process();
            }
            $event       = SomeListenerClass::$event;
            $varChan     = [
                'var1' => '',
                'var2' => 'v2',
            ];
            $channelVars = [
                'default' => $varChan,
            ];
            $this->assertEquals($channelVars, $event->getAllChannelVariables());
            $this->assertEquals($varChan, $event->getChannelVariables());
            $this->assertEquals($varChan, $event->getChannelVariables('default'));
        }


        /**
         * @test
         * @group channel_vars
         * ChanVariable is sent without a channel name but with a "channel" key.
         * https://github.com/marcelog/PAMI/issues/85
         * @throws ClientException
         */
        public function can_get_channel_variables_with_default_channel_name(): void
        {
            global $mock_stream_socket_client;
            global $mock_stream_set_blocking;
            global $mockTime;
            global $standardAMIStart;
            $mockTime                  = true;
            $mock_stream_socket_client = true;
            $mock_stream_set_blocking  = true;
            $options                   = [
                'host'            => '2.3.4.5',
                'scheme'          => 'tcp://',
                'port'            => 9999,
                'username'        => 'asd',
                'secret'          => 'asd',
                'connect_timeout' => 10,
                'read_timeout'    => 10,
            ];
            $write                     = [
                "action: Login\r\nactionid: 1432.123\r\nusername: asd\r\nsecret: asd\r\n",
            ];
            setFgetsMock($standardAMIStart, $write);
            $client = new ClientImpl($options);
            $client->registerEventListener(new SomeListenerClass());
            $client->open();
            $event = [
                'Event: Dial',
                'Privilege: call,all',
                'Channel: Local/0@pbx_dial_callroute_to_endpoint-00000008;2',
                'SubEvent: Begin',
                'Destination: SIP/jw1034-00000010',
                'CallerIDNum: 1201',
                'CallerIDName: <unknown>',
                'ConnectedLineNum: strategy-sequential',
                'ConnectedLineName: <unknown>',
                'UniqueID: pbx-1439974866.33',
                'DestUniqueID: pbx-1439974866.34',
                'Dialstring: jw1034',
                'ChanVariable: var1',
                'ChanVariable: var2=v2',
                '',
            ];
            setFgetsMock($event, $event);
            for ($i = 0; $i < 15; $i++) {
                $client->process();
            }
            $event       = SomeListenerClass::$event;
            $varChan     = [
                'var1' => '',
                'var2' => 'v2',
            ];
            $channelVars = [
                'local/0@pbx_dial_callroute_to_endpoint-00000008;2' => $varChan,
            ];
            $this->assertEquals($channelVars, $event->getAllChannelVariables());
            $this->assertEquals($varChan, $event->getChannelVariables());
            $this->assertEquals(
                $varChan,
                $event->getChannelVariables('Local/0@pbx_dial_callroute_to_endpoint-00000008;2')
            );
        }

        /**
         * @test
         * @group channel_vars
         * ChanVariable is sent with a channel name and with a "channel" key.
         * https://github.com/marcelog/PAMI/issues/85
         * @throws ClientException
         */
        public function can_get_channel_variables(): void
        {
            global $mock_stream_socket_client;
            global $mock_stream_set_blocking;
            global $mockTime;
            global $standardAMIStart;
            $mockTime                  = true;
            $mock_stream_socket_client = true;
            $mock_stream_set_blocking  = true;
            $options                   = [
                'host'            => '2.3.4.5',
                'scheme'          => 'tcp://',
                'port'            => 9999,
                'username'        => 'asd',
                'secret'          => 'asd',
                'connect_timeout' => 10,
                'read_timeout'    => 10,
            ];
            $write                     = [
                "action: Login\r\nactionid: 1432.123\r\nusername: asd\r\nsecret: asd\r\n",
            ];
            setFgetsMock($standardAMIStart, $write);
            $client = new ClientImpl($options);
            $client->registerEventListener(new SomeListenerClass());
            $client->open();
            $event = [
                'Event: Dial',
                'Privilege: call,all',
                'SubEvent: Begin',
                'Channel: Local/0@pbx_dial_callroute_to_endpoint-00000008;2',
                'Destination: SIP/jw1034-00000010',
                'CallerIDNum: 1201',
                'CallerIDName: <unknown>',
                'ConnectedLineNum: strategy-sequential',
                'ConnectedLineName: <unknown>',
                'UniqueID: pbx-1439974866.33',
                'DestUniqueID: pbx-1439974866.34',
                'Dialstring: jw1034',
                'ChanVariable: var1',
                'ChanVariable: var2=value2',
                'ChanVariable(Local/0@pbx_dial_callroute_to_endpoint-00000008;2): var3=value3',
                'ChanVariable(Local/0@pbx_dial_callroute_to_endpoint-00000008;2): var4=value4',
                'ChanVariable(Local/0@pbx_dial_callroute_to_endpoint-00000008;2): var5=value5',
                'ChanVariable(SIP/jw1034-00000010): var12=value12',
                'ChanVariable(SIP/jw1034-00000010): var22=value22',
                'ChanVariable(SIP/jw1034-00000010): var32=value32',
                '',
            ];
            setFgetsMock($event, $event);
            for ($i = 0; $i < 21; $i++) {
                $client->process();
            }
            $event       = SomeListenerClass::$event;
            $varChan1    = [
                'var1' => '',
                'var2' => 'value2',
                'var3' => 'value3',
                'var4' => 'value4',
                'var5' => 'value5',
            ];
            $varChan2    = [
                'var12' => 'value12',
                'var22' => 'value22',
                'var32' => 'value32',
            ];
            $channelVars = [
                'local/0@pbx_dial_callroute_to_endpoint-00000008;2' => $varChan1,
                'sip/jw1034-00000010'                               => $varChan2,
            ];
            $this->assertEquals($varChan1, $event->getChannelVariables());
            $this->assertEquals($channelVars, $event->getAllChannelVariables());
        }
    }

    class SomeListenerClass implements IEventListener
    {
        public static ?EventMessage $event = null;

        public function handle(EventMessage $event): void
        {
            self::$event = $event;
        }
    }
}
