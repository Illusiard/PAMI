<?php
/**
 * This class will test some actions.
 *
 * PHP Version 7.4
 *
 * @category   Pami
 * @package    Test
 * @subpackage Action
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

namespace PAMI\Client\Impl {

    use PAMI\Client\Exception\ClientException;
    use PAMI\Exception\PAMIException;
    use PAMI\Message\Action\AbsoluteTimeoutAction;
    use PAMI\Message\Action\ActionMessage;
    use PAMI\Message\Action\AgentLogoffAction;
    use PAMI\Message\Action\AgentsAction;
    use PAMI\Message\Action\AGIAction;
    use PAMI\Message\Action\AttendedTransferAction;
    use PAMI\Message\Action\BlindTransferAction;
    use PAMI\Message\Action\BridgeAction;
    use PAMI\Message\Action\BridgeInfoAction;
    use PAMI\Message\Action\ChallengeAction;
    use PAMI\Message\Action\ChangeMonitorAction;
    use PAMI\Message\Action\CommandAction;
    use PAMI\Message\Action\ConfbridgeListAction;
    use PAMI\Message\Action\ConfbridgeMuteAction;
    use PAMI\Message\Action\ConfbridgeUnmuteAction;
    use PAMI\Message\Action\CoreSettingsAction;
    use PAMI\Message\Action\CoreStatusAction;
    use PAMI\Message\Action\CreateConfigAction;
    use PAMI\Message\Action\DAHDIDialOffHookAction;
    use PAMI\Message\Action\DAHDIDNDOffAction;
    use PAMI\Message\Action\DAHDIDNDOnAction;
    use PAMI\Message\Action\DAHDIHangupAction;
    use PAMI\Message\Action\DAHDIRestartAction;
    use PAMI\Message\Action\DAHDIShowChannelsAction;
    use PAMI\Message\Action\DAHDITransferAction;
    use PAMI\Message\Action\DBDelAction;
    use PAMI\Message\Action\DBDelTreeAction;
    use PAMI\Message\Action\DBGetAction;
    use PAMI\Message\Action\DBPutAction;
    use PAMI\Message\Action\DongleReloadAction;
    use PAMI\Message\Action\DongleResetAction;
    use PAMI\Message\Action\DongleRestartAction;
    use PAMI\Message\Action\DongleSendPDUAction;
    use PAMI\Message\Action\DongleSendSMSAction;
    use PAMI\Message\Action\DongleSendUSSDAction;
    use PAMI\Message\Action\DongleShowDevicesAction;
    use PAMI\Message\Action\DongleStartAction;
    use PAMI\Message\Action\DongleStopAction;
    use PAMI\Message\Action\EventsAction;
    use PAMI\Message\Action\ExtensionStateAction;
    use PAMI\Message\Action\GetConfigAction;
    use PAMI\Message\Action\GetConfigJSONAction;
    use PAMI\Message\Action\GetVarAction;
    use PAMI\Message\Action\HangupAction;
    use PAMI\Message\Action\JabberSendAction;
    use PAMI\Message\Action\ListCategoriesAction;
    use PAMI\Message\Action\ListCommandsAction;
    use PAMI\Message\Action\LocalOptimizeAwayAction;
    use PAMI\Message\Action\LoginAction;
    use PAMI\Message\Action\LogoffAction;
    use PAMI\Message\Action\MailboxCountAction;
    use PAMI\Message\Action\MailboxStatusAction;
    use PAMI\Message\Action\MeetmeListAction;
    use PAMI\Message\Action\MeetmeMuteAction;
    use PAMI\Message\Action\MeetmeUnmuteAction;
    use PAMI\Message\Action\MixMonitorAction;
    use PAMI\Message\Action\ModuleCheckAction;
    use PAMI\Message\Action\ModuleLoadAction;
    use PAMI\Message\Action\ModuleReloadAction;
    use PAMI\Message\Action\ModuleUnloadAction;
    use PAMI\Message\Action\MonitorAction;
    use PAMI\Message\Action\OriginateAction;
    use PAMI\Message\Action\ParkAction;
    use PAMI\Message\Action\ParkedCallsAction;
    use PAMI\Message\Action\PauseMonitorAction;
    use PAMI\Message\Action\PingAction;
    use PAMI\Message\Action\PlayDTMFAction;
    use PAMI\Message\Action\QueueAddAction;
    use PAMI\Message\Action\QueueLogAction;
    use PAMI\Message\Action\QueuePauseAction;
    use PAMI\Message\Action\QueuePenaltyAction;
    use PAMI\Message\Action\QueueReloadAction;
    use PAMI\Message\Action\QueueRemoveAction;
    use PAMI\Message\Action\QueueResetAction;
    use PAMI\Message\Action\QueueRuleAction;
    use PAMI\Message\Action\QueuesAction;
    use PAMI\Message\Action\QueueStatusAction;
    use PAMI\Message\Action\QueueSummaryAction;
    use PAMI\Message\Action\QueueUnpauseAction;
    use PAMI\Message\Action\RedirectAction;
    use PAMI\Message\Action\ReloadAction;
    use PAMI\Message\Action\SendTextAction;
    use PAMI\Message\Action\SetVarAction;
    use PAMI\Message\Action\ShowDialPlanAction;
    use PAMI\Message\Action\SIPNotifyAction;
    use PAMI\Message\Action\SIPPeersAction;
    use PAMI\Message\Action\SIPQualifyPeerAction;
    use PAMI\Message\Action\SIPShowPeerAction;
    use PAMI\Message\Action\SIPShowRegistryAction;
    use PAMI\Message\Action\StatusAction;
    use PAMI\Message\Action\StopMixMonitorAction;
    use PAMI\Message\Action\StopMonitorAction;
    use PAMI\Message\Action\UnpauseMonitorAction;
    use PAMI\Message\Action\UpdateConfigAction;
    use PAMI\Message\Action\UserEventAction;
    use PAMI\Message\Action\VGSMSMSTxAction;
    use PAMI\Message\Action\VoicemailUsersListAction;
    use PAMI\Message\Action\WaitEventAction;
    use PAMI\Message\Response\ResponseMessage;
    use PHPUnit_Framework_TestCase;

    /**
     * This class will test some actions.
     *
     * PHP Version 7.4
     *
     * @category   Pami
     * @package    Test
     * @subpackage Action
     * @author     Marcelo Gornstein <marcelog@gmail.com>
 * @author     Boltunov Artem <dev@bluescarf.ru>
     * @license    http://marcelog.github.com/ Apache License 2.0
     * @link       http://marcelog.github.com/
     */
    class Test_Actions extends PHPUnit_Framework_TestCase
    {
        private array $_properties = [];

        /**
         * @return void
         */
        public function setUp(): void
        {
            global $mockTime;
            $this->_properties = [];
            $mockTime          = true;
        }

        /**
         * @throws ClientException
         */
        private function _start(array $write, ActionMessage $action): ClientImpl
        {
            global $mock_stream_socket_client;
            global $mock_stream_set_blocking;
            global $mockTime;
            global $standardAMIStart;
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
            $writeLogin                = [
                "action: Login\r\nactionid: 1432.123\r\nusername: asd\r\nsecret: asd\r\n",
            ];
            setFgetsMock($standardAMIStart, $writeLogin);
            $client = new ClientImpl($options);
            $client->open();
            if ($action instanceof DBGetAction) {
                $event = [
                    'Response: Success',
                    'EventList: start',
                    'ActionID: 1432.123',
                    '',
                    'Event: DBGetResponse',
                    'ActionID: 1432.123',
                    '',
                ];
            } else {
                $event = [
                    'Response: Success',
                    'ActionID: 1432.123',
                    '',
                ];
            }
            setFgetsMock($event, $write);
            $result = $client->send($action);
            $this->assertInstanceOf(ResponseMessage::class, $result);

            return $client;
        }

        /**
         * @test
         * @throws ClientException
         */
        public function can_absolute_timeout(): void
        {
            $write  = [
                "action: AbsoluteTimeout\r\nactionid: 1432.123\r\nchannel: SIP/asd\r\ntimeout: 10\r\n",
            ];
            $action = new AbsoluteTimeoutAction('SIP/asd', 10);
            $client = $this->_start($write, $action);
        }

        /**
         * @test
         * @throws ClientException
         */
        public function can_login(): void
        {
            $write  = [
                implode("\r\n", [
                    'action: Login',
                    'actionid: 1432.123',
                    'username: foo',
                    'secret: bar',
                    '',
                ]),
            ];
            $action = new LoginAction('foo', 'bar');
            $client = $this->_start($write, $action);
        }

        /**
         * @test
         * @throws ClientException
         */
        public function can_login_with_events(): void
        {
            $write  = [
                implode("\r\n", [
                    'action: Login',
                    'actionid: 1432.123',
                    'username: foo',
                    'secret: bar',
                    'events: all',
                    '',
                ]),
            ];
            $action = new LoginAction('foo', 'bar', 'all');
            $client = $this->_start($write, $action);
        }

        /**
         * @test
         * @throws ClientException
         */
        public function can_agent_logoff(): void
        {
            $write  = [
                implode("\r\n", [
                    'action: AgentLogoff',
                    'actionid: 1432.123',
                    'agent: asd',
                    'soft: true',
                    '',
                ]),
            ];
            $action = new AgentLogoffAction('asd', true);
            $client = $this->_start($write, $action);
        }

        /**
         * @test
         * @throws ClientException
         */
        public function can_agents(): void
        {
            $write  = [
                implode("\r\n", [
                    'action: Agents',
                    'actionid: 1432.123',
                    '',
                ]),
            ];
            $action = new AgentsAction();
            $client = $this->_start($write, $action);
        }

        /**
         * @test
         * @throws ClientException
         */
        public function can_atxfer(): void
        {
            $write  = [
                implode("\r\n", [
                    'action: Atxfer',
                    'actionid: 1432.123',
                    'channel: channel',
                    'exten: exten',
                    'context: context',
                    'priority: priority',
                    '',
                ]),
            ];
            $action = new AttendedTransferAction('channel', 'exten', 'context', 'priority');
            $client = $this->_start($write, $action);
        }

        /**
         * @test
         * @throws ClientException
         */
        public function can_blindTransfer(): void
        {
            $write  = [
                implode("\r\n", [
                    'action: BlindTransfer',
                    'actionid: 1432.123',
                    'channel: channel',
                    'exten: exten',
                    'context: context',
                    '',
                ]),
            ];
            $action = new BlindTransferAction('channel', 'exten', 'context');
            $client = $this->_start($write, $action);
        }

        /**
         * @test
         * @throws ClientException
         */
        public function can_bridge(): void
        {
            $write  = [
                implode("\r\n", [
                    'action: Bridge',
                    'actionid: 1432.123',
                    'channel1: channel1',
                    'channel2: channel2',
                    'tone: true',
                    '',
                ]),
            ];
            $action = new BridgeAction('channel1', 'channel2', true);
            $client = $this->_start($write, $action);
        }

        /**
         * @test
         * @throws ClientException
         */
        public function can_bridge_info(): void
        {
            $bridge_uniqueid = '57cb3a7e-0fa3-4e28-924f-d7728b0d7a9a';

            $write  = [
                implode("\r\n", [
                    'action: BridgeInfo',
                    'actionid: 1432.123',
                    'bridgeuniqueid: ' . $bridge_uniqueid,
                    '',
                ]),
            ];
            $action = new BridgeInfoAction($bridge_uniqueid);
            $client = $this->_start($write, $action);
        }

        /**
         * @test
         * @throws ClientException
         */
        public function can_challenge(): void
        {
            $write  = [
                implode("\r\n", [
                    'action: Challenge',
                    'actionid: 1432.123',
                    'authtype: test',
                    '',
                ]),
            ];
            $action = new ChallengeAction('test');
            $client = $this->_start($write, $action);
        }

        /**
         * @test
         * @throws ClientException
         */
        public function can_change_monitor(): void
        {
            $write  = [
                implode("\r\n", [
                    'action: ChangeMonitor',
                    'actionid: 1432.123',
                    'channel: channel',
                    'file: file',
                    '',
                ]),
            ];
            $action = new ChangeMonitorAction('channel', 'file');
            $client = $this->_start($write, $action);
        }

        /**
         * @test
         * @throws ClientException
         */
        public function can_command(): void
        {
            $write  = [
                implode("\r\n", [
                    'action: Command',
                    'actionid: 1432.123',
                    'command: command',
                    '',
                ]),
            ];
            $action = new CommandAction('command');
            $client = $this->_start($write, $action);
        }

        /**
         * @test
         * @throws ClientException
         */
        public function can_confbridge_list(): void
        {
            $conference = 'conf-59dba3997444e5';
            $write      = [
                implode("\r\n", [
                    'action: ConfbridgeList',
                    'actionid: 1432.123',
                    'conference: ' . $conference,
                    '',
                ]),
            ];
            $action     = new ConfbridgeListAction($conference);
            $client     = $this->_start($write, $action);
        }

        /**
         * @test
         * @throws ClientException
         */
        public function can_confbridge_mute(): void
        {
            $write  = [
                implode("\r\n", [
                    'action: ConfbridgeMute',
                    'actionid: 1432.123',
                    'channel: channel',
                    'conference: conference',
                    '',
                ]),
            ];
            $action = new ConfbridgeMuteAction('channel', 'conference');
            $client = $this->_start($write, $action);
        }

        /**
         * @test
         * @throws ClientException
         */
        public function can_confbridge_unmute(): void
        {
            $write  = [
                implode("\r\n", [
                    'action: ConfbridgeUnmute',
                    'actionid: 1432.123',
                    'channel: channel',
                    'conference: conference',
                    '',
                ]),
            ];
            $action = new ConfbridgeUnmuteAction('channel', 'conference');
            $client = $this->_start($write, $action);
        }

        /**
         * @test
         * @throws ClientException
         */
        public function can_core_settings(): void
        {
            $write  = [
                implode("\r\n", [
                    'action: CoreSettings',
                    'actionid: 1432.123',
                    '',
                ]),
            ];
            $action = new CoreSettingsAction();
            $client = $this->_start($write, $action);
        }

        /**
         * @test
         * @throws ClientException
         */
        public function can_dongle_show_devices(): void
        {
            $write  = [
                implode("\r\n", [
                    'action: DongleShowDevices',
                    'actionid: 1432.123',
                    '',
                ]),
            ];
            $action = new DongleShowDevicesAction();
            $client = $this->_start($write, $action);
        }

        /**
         * @test
         * @throws ClientException
         */
        public function can_dongle_reload(): void
        {
            $write  = [
                implode("\r\n", [
                    'action: DongleReload',
                    'actionid: 1432.123',
                    'when: when',
                    '',
                ]),
            ];
            $action = new DongleReloadAction('when');
            $client = $this->_start($write, $action);
        }

        /**
         * @test
         * @throws ClientException
         */
        public function can_dongle_restart(): void
        {
            $write  = [
                implode("\r\n", [
                    'action: DongleRestart',
                    'actionid: 1432.123',
                    'when: when',
                    'device: device',
                    '',
                ]),
            ];
            $action = new DongleRestartAction('when', 'device');
            $client = $this->_start($write, $action);
        }

        /**
         * @test
         * @throws ClientException
         */
        public function can_dongle_reset(): void
        {
            $write  = [
                implode("\r\n", [
                    'action: DongleReset',
                    'actionid: 1432.123',
                    'device: device',
                    '',
                ]),
            ];
            $action = new DongleResetAction('device');
            $client = $this->_start($write, $action);
        }

        /**
         * @test
         * @throws ClientException
         */
        public function can_dongle_send_pdu(): void
        {
            $write  = [
                implode("\r\n", [
                    'action: DongleSendPDU',
                    'actionid: 1432.123',
                    'device: device',
                    'pdu: pdu',
                    '',
                ]),
            ];
            $action = new DongleSendPDUAction('device', 'pdu');
            $client = $this->_start($write, $action);
        }

        /**
         * @test
         * @throws ClientException
         */
        public function can_dongle_send_ussd(): void
        {
            $write  = [
                implode("\r\n", [
                    'action: DongleSendUSSD',
                    'actionid: 1432.123',
                    'device: device',
                    'ussd: ussd',
                    '',
                ]),
            ];
            $action = new DongleSendUSSDAction('device', 'ussd');
            $client = $this->_start($write, $action);
        }

        /**
         * @test
         * @throws ClientException
         */
        public function can_dongle_stop(): void
        {
            $write  = [
                implode("\r\n", [
                    'action: DongleStop',
                    'actionid: 1432.123',
                    'when: when',
                    'device: device',
                    '',
                ]),
            ];
            $action = new DongleStopAction('when', 'device');
            $client = $this->_start($write, $action);
        }

        /**
         * @test
         * @throws ClientException
         */
        public function can_dongle_start(): void
        {
            $write  = [
                implode("\r\n", [
                    'action: DongleStart',
                    'actionid: 1432.123',
                    'device: device',
                    '',
                ]),
            ];
            $action = new DongleStartAction('device');
            $client = $this->_start($write, $action);
        }

        /**
         * @test
         * @throws ClientException
         */
        public function can_dongle_sms_send(): void
        {
            $write  = [
                implode("\r\n", [
                    'action: DongleSendSMS',
                    'actionid: 1432.123',
                    'device: device',
                    'number: number',
                    'message: message',
                    '',
                ]),
            ];
            $action = new DongleSendSMSAction('device', 'number', 'message');
            $client = $this->_start($write, $action);
        }

        /**
         * @test
         * @throws ClientException
         */
        public function can_core_status(): void
        {
            $write  = [
                implode("\r\n", [
                    'action: CoreStatus',
                    'actionid: 1432.123',
                    '',
                ]),
            ];
            $action = new CoreStatusAction();
            $client = $this->_start($write, $action);
        }

        /**
         * @test
         * @throws ClientException
         */
        public function can_create_config(): void
        {
            $write  = [
                implode("\r\n", [
                    'action: CreateConfig',
                    'actionid: 1432.123',
                    'filename: file.conf',
                    '',
                ]),
            ];
            $action = new CreateConfigAction('file.conf');
            $client = $this->_start($write, $action);
        }

        /**
         * @test
         * @throws ClientException
         */
        public function can_dahdi_dndoff(): void
        {
            $write  = [
                implode("\r\n", [
                    'action: DAHDIDNDOff',
                    'actionid: 1432.123',
                    'dahdichannel: channel',
                    '',
                ]),
            ];
            $action = new DAHDIDNDOffAction('channel');
            $client = $this->_start($write, $action);
        }

        /**
         * @test
         * @throws ClientException
         */
        public function can_dahdi_dndon(): void
        {
            $write  = [
                implode("\r\n", [
                    'action: DAHDIDNDOn',
                    'actionid: 1432.123',
                    'dahdichannel: channel',
                    '',
                ]),
            ];
            $action = new DAHDIDNDOnAction('channel');
            $client = $this->_start($write, $action);
        }

        /**
         * @test
         * @throws ClientException
         */
        public function can_dahdi_dialoffhook(): void
        {
            $write  = [
                implode("\r\n", [
                    'action: DAHDIDialOffhook',
                    'actionid: 1432.123',
                    'dahdichannel: channel',
                    'number: number',
                    '',
                ]),
            ];
            $action = new DAHDIDialOffHookAction('channel', 'number');
            $client = $this->_start($write, $action);
        }

        /**
         * @test
         * @throws ClientException
         */
        public function can_dahdi_hangup(): void
        {
            $write  = [
                implode("\r\n", [
                    'action: DAHDIHangup',
                    'actionid: 1432.123',
                    'dahdichannel: channel',
                    '',
                ]),
            ];
            $action = new DAHDIHangupAction('channel');
            $client = $this->_start($write, $action);
        }

        /**
         * @test
         * @throws ClientException
         */
        public function can_dahdi_restart(): void
        {
            $write  = [
                implode("\r\n", [
                    'action: DAHDIRestart',
                    'actionid: 1432.123',
                    '',
                ]),
            ];
            $action = new DAHDIRestartAction();
            $client = $this->_start($write, $action);
        }

        /**
         * @test
         * @throws ClientException
         */
        public function can_dahdi_show_channels(): void
        {
            $write  = [
                implode("\r\n", [
                    'action: DAHDIShowChannels',
                    'actionid: 1432.123',
                    '',
                ]),
            ];
            $action = new DAHDIShowChannelsAction();
            $client = $this->_start($write, $action);
        }

        /**
         * @test
         * @throws ClientException
         */
        public function can_dahdi_transfer(): void
        {
            $write  = [
                implode("\r\n", [
                    'action: DAHDITransfer',
                    'actionid: 1432.123',
                    'dahdichannel: channel',
                    '',
                ]),
            ];
            $action = new DAHDITransferAction('channel');
            $client = $this->_start($write, $action);
        }

        /**
         * @test
         * @throws ClientException
         */
        public function can_dbdel(): void
        {
            $write  = [
                implode("\r\n", [
                    'action: DBDel',
                    'actionid: 1432.123',
                    'family: family',
                    'key: key',
                    '',
                ]),
            ];
            $action = new DBDelAction('family', 'key');
            $client = $this->_start($write, $action);
        }

        /**
         * @test
         * @throws ClientException
         */
        public function can_dbdeltree(): void
        {
            $write  = [
                implode("\r\n", [
                    'action: DBDelTree',
                    'actionid: 1432.123',
                    'family: family',
                    'key: key',
                    '',
                ]),
            ];
            $action = new DBDelTreeAction('family', 'key');
            $client = $this->_start($write, $action);
        }

        /**
         * @test
         * @throws ClientException
         */
        public function can_dbget(): void
        {
            $write  = [
                implode("\r\n", [
                    'action: DBGet',
                    'actionid: 1432.123',
                    'family: family',
                    'key: key',
                    '',
                ]),
            ];
            $action = new DBGetAction('family', 'key');
            $client = $this->_start($write, $action);
        }

        /**
         * @test
         * @throws ClientException
         */
        public function can_dbput(): void
        {
            $write  = [
                implode("\r\n", [
                    'action: DBPut',
                    'actionid: 1432.123',
                    'family: family',
                    'key: key',
                    'val: val',
                    '',
                ]),
            ];
            $action = new DBPutAction('family', 'key', 'val');
            $client = $this->_start($write, $action);
        }

        /**
         * @test
         * @throws ClientException
         */
        public function can_events_off(): void
        {
            $write  = [
                implode("\r\n", [
                    'action: Events',
                    'actionid: 1432.123',
                    'eventmask: off',
                    '',
                ]),
            ];
            $action = new EventsAction();
            $client = $this->_start($write, $action);
        }

        /**
         * @test
         * @throws ClientException
         */
        public function can_events(): void
        {
            $write  = [
                implode("\r\n", [
                    'action: Events',
                    'actionid: 1432.123',
                    'eventmask: a,b,c',
                    '',
                ]),
            ];
            $action = new EventsAction(['a', 'b', 'c']);
            $client = $this->_start($write, $action);
        }

        /**
         * @test
         * @throws ClientException
         */
        public function can_extension_state(): void
        {
            $write  = [
                implode("\r\n", [
                    'action: ExtensionState',
                    'actionid: 1432.123',
                    'exten: exten',
                    'context: context',
                    '',
                ]),
            ];
            $action = new ExtensionStateAction('exten', 'context');
            $client = $this->_start($write, $action);
        }

        /**
         * @test
         * @throws ClientException
         */
        public function can_get_config(): void
        {
            $write  = [
                implode("\r\n", [
                    'action: GetConfig',
                    'actionid: 1432.123',
                    'filename: file.conf',
                    'category: category',
                    '',
                ]),
            ];
            $action = new GetConfigAction('file.conf', 'category');
            $client = $this->_start($write, $action);
        }

        /**
         * @test
         * @throws ClientException
         */
        public function can_get_configjson(): void
        {
            $write  = [
                implode("\r\n", [
                    'action: GetConfigJSON',
                    'actionid: 1432.123',
                    'filename: file.conf',
                    '',
                ]),
            ];
            $action = new GetConfigJSONAction('file.conf');
            $client = $this->_start($write, $action);
        }

        /**
         * @test
         * @throws ClientException
         */
        public function can_get_var(): void
        {
            $write  = [
                implode("\r\n", [
                    'action: Getvar',
                    'actionid: 1432.123',
                    'variable: var',
                    'channel: channel',
                    '',
                ]),
            ];
            $action = new GetVarAction('var', 'channel');
            $client = $this->_start($write, $action);
        }

        /**
         * @test
         * @throws ClientException
         */
        public function can_hangup(): void
        {
            $write  = [
                implode("\r\n", [
                    'action: Hangup',
                    'actionid: 1432.123',
                    'channel: channel',
                    '',
                ]),
            ];
            $action = new HangupAction('channel');
            $client = $this->_start($write, $action);
        }

        /**
         * @test
         * @throws ClientException
         */
        public function can_hangup_with_cause(): void
        {
            $write  = [
                implode("\r\n", [
                    'action: Hangup',
                    'actionid: 1432.123',
                    'channel: channel',
                    'cause: 5',
                    '',
                ]),
            ];
            $action = new HangupAction('channel', 5);
            $client = $this->_start($write, $action);
        }

        /**
         * @test
         * @throws ClientException
         */
        public function can_jabbersend(): void
        {
            $write  = [
                implode("\r\n", [
                    'action: JabberSend',
                    'actionid: 1432.123',
                    'jabber: jabber',
                    'jid: jid',
                    'screenname: jid',
                    'message: message',
                    '',
                ]),
            ];
            $action = new JabberSendAction('jabber', 'jid', 'message');
            $client = $this->_start($write, $action);
        }

        /**
         * @test
         * @throws ClientException
         */
        public function can_list_categories(): void
        {
            $write  = [
                implode("\r\n", [
                    'action: ListCategories',
                    'actionid: 1432.123',
                    'filename: file.conf',
                    '',
                ]),
            ];
            $action = new ListCategoriesAction('file.conf');
            $client = $this->_start($write, $action);
        }

        /**
         * @test
         * @throws ClientException
         */
        public function can_list_commands(): void
        {
            $write  = [
                implode("\r\n", [
                    'action: ListCommands',
                    'actionid: 1432.123',
                    '',
                ]),
            ];
            $action = new ListCommandsAction();
            $client = $this->_start($write, $action);
        }

        /**
         * @test
         * @throws ClientException
         */
        public function can_local_optimize_away(): void
        {
            $write  = [
                implode("\r\n", [
                    'action: LocalOptimizeAway',
                    'actionid: 1432.123',
                    'channel: channel',
                    '',
                ]),
            ];
            $action = new LocalOptimizeAwayAction('channel');
            $client = $this->_start($write, $action);
        }

        /**
         * @test
         * @throws ClientException
         */
        public function can_mailbox_count(): void
        {
            $write  = [
                implode("\r\n", [
                    'action: MailboxCount',
                    'actionid: 1432.123',
                    'mailbox: mailbox',
                    '',
                ]),
            ];
            $action = new MailboxCountAction('mailbox');
            $client = $this->_start($write, $action);
        }

        /**
         * @test
         * @throws ClientException
         */
        public function can_mailbox_status(): void
        {
            $write  = [
                implode("\r\n", [
                    'action: MailboxStatus',
                    'actionid: 1432.123',
                    'mailbox: mailbox',
                    '',
                ]),
            ];
            $action = new MailboxStatusAction('mailbox');
            $client = $this->_start($write, $action);
        }

        /**
         * @test
         * @throws ClientException
         */
        public function can_meetme_list(): void
        {
            $write  = [
                implode("\r\n", [
                    'action: MeetmeList',
                    'actionid: 1432.123',
                    'conference: conference',
                    '',
                ]),
            ];
            $action = new MeetmeListAction('conference');
            $client = $this->_start($write, $action);
        }

        /**
         * @test
         * @throws ClientException
         */
        public function can_meetme_mute(): void
        {
            $write  = [
                implode("\r\n", [
                    'action: MeetmeMute',
                    'actionid: 1432.123',
                    'meetme: meetme',
                    'usernum: usernum',
                    '',
                ]),
            ];
            $action = new MeetmeMuteAction('meetme', 'usernum');
            $client = $this->_start($write, $action);
        }

        /**
         * @test
         * @throws ClientException
         */
        public function can_meetme_unmute(): void
        {
            $write  = [
                implode("\r\n", [
                    'action: MeetmeUnmute',
                    'actionid: 1432.123',
                    'meetme: meetme',
                    'usernum: usernum',
                    '',
                ]),
            ];
            $action = new MeetmeUnmuteAction('meetme', 'usernum');
            $client = $this->_start($write, $action);
        }

        /**
         * @test
         * @throws ClientException
         */
        public function can_mix_monitor(): void
        {
            $write  = [
                implode("\r\n", [
                    'action: MixMonitor',
                    'actionid: 1432.123',
                    'channel: channel',
                    'file: file',
                    'options: options',
                    '',
                ]),
            ];
            $action = new MixMonitorAction('channel');
            $action->setFile('file');
            $action->setOptions(['o', 'p', 't', 'i', 'o', 'n', 's']);
            $client = $this->_start($write, $action);
        }

        /**
         * @test
         * @throws ClientException
         */
        public function can_module_check(): void
        {
            $write  = [
                implode("\r\n", [
                    'action: ModuleCheck',
                    'actionid: 1432.123',
                    'module: module',
                    '',
                ]),
            ];
            $action = new ModuleCheckAction('module');
            $client = $this->_start($write, $action);
        }

        /**
         * @test
         * @throws ClientException
         */
        public function can_module_load(): void
        {
            $write  = [
                implode("\r\n", [
                    'action: ModuleLoad',
                    'actionid: 1432.123',
                    'module: module',
                    'loadtype: load',
                    '',
                ]),
            ];
            $action = new ModuleLoadAction('module');
            $client = $this->_start($write, $action);
        }

        /**
         * @test
         * @throws ClientException
         */
        public function can_module_reload(): void
        {
            $write  = [
                implode("\r\n", [
                    'action: ModuleLoad',
                    'actionid: 1432.123',
                    'module: module',
                    'loadtype: reload',
                    '',
                ]),
            ];
            $action = new ModuleReloadAction('module');
            $client = $this->_start($write, $action);
        }

        /**
         * @test
         * @throws ClientException
         */
        public function can_module_unload(): void
        {
            $write  = [
                implode("\r\n", [
                    'action: ModuleLoad',
                    'actionid: 1432.123',
                    'module: module',
                    'loadtype: unload',
                    '',
                ]),
            ];
            $action = new ModuleUnloadAction('module');
            $client = $this->_start($write, $action);
        }

        /**
         * @test
         * @throws ClientException
         */
        public function can_monitor(): void
        {
            $write  = [
                implode("\r\n", [
                    'action: Monitor',
                    'actionid: 1432.123',
                    'channel: channel',
                    'mix: true',
                    'format: wav',
                    'file: file',
                    '',
                ]),
            ];
            $action = new MonitorAction('channel', 'file');
            $client = $this->_start($write, $action);
        }

        /**
         * @test
         * @throws ClientException
         */
        public function can_voicemail_users_list(): void
        {
            $write  = [
                implode("\r\n", [
                    'action: VoicemailUsersList',
                    'actionid: 1432.123',
                    '',
                ]),
            ];
            $action = new VoicemailUsersListAction();
            $client = $this->_start($write, $action);
        }

        /**
         * @test
         * @throws ClientException
         */
        public function can_pause_monitor(): void
        {
            $write  = [
                implode("\r\n", [
                    'action: PauseMonitor',
                    'actionid: 1432.123',
                    'channel: channel',
                    '',
                ]),
            ];
            $action = new PauseMonitorAction('channel');
            $client = $this->_start($write, $action);
        }

        /**
         * @test
         * @throws ClientException
         */
        public function can_unpause_monitor(): void
        {
            $write  = [
                implode("\r\n", [
                    'action: UnpauseMonitor',
                    'actionid: 1432.123',
                    'channel: channel',
                    '',
                ]),
            ];
            $action = new UnpauseMonitorAction('channel');
            $client = $this->_start($write, $action);
        }

        /**
         * @test
         * @throws ClientException
         */
        public function can_stop_monitor(): void
        {
            $write  = [
                implode("\r\n", [
                    'action: StopMonitor',
                    'actionid: 1432.123',
                    'channel: channel',
                    '',
                ]),
            ];
            $action = new StopMonitorAction('channel');
            $client = $this->_start($write, $action);
        }

        /**
         * @test
         * @throws ClientException
         */
        public function can_stop_mix_monitor(): void
        {
            $write  = [
                implode("\r\n", [
                    'action: StopMixMonitor',
                    'actionid: 1432.123',
                    'channel: channel',
                    'mixmonitorid: mix_monitor',
                    '',
                ]),
            ];
            $action = new StopMixMonitorAction('channel');
            $action->setMixMonitorId('mix_monitor');
            $client = $this->_start($write, $action);
        }

        /**
         * @test
         * @throws ClientException
         */
        public function can_status(): void
        {
            $write  = [
                implode("\r\n", [
                    'action: Status',
                    'actionid: 1432.123',
                    'channel: channel',
                    '',
                ]),
            ];
            $action = new StatusAction('channel');
            $client = $this->_start($write, $action);
        }

        /**
         * @test
         * @throws ClientException
         */
        public function can_show_dialplan(): void
        {
            $write  = [
                implode("\r\n", [
                    'action: ShowDialPlan',
                    'actionid: 1432.123',
                    'context: context',
                    'extension: extension',
                    '',
                ]),
            ];
            $action = new ShowDialPlanAction('context', 'extension');
            $client = $this->_start($write, $action);
        }

        /**
         * @test
         * @throws ClientException
         */
        public function can_set_var(): void
        {
            $write  = [
                implode("\r\n", [
                    'action: Setvar',
                    'actionid: 1432.123',
                    'variable: variable',
                    'value: value',
                    'channel: channel',
                    '',
                ]),
            ];
            $action = new SetVarAction('variable', 'value', 'channel');
            $client = $this->_start($write, $action);
        }

        /**
         * @test
         * @throws ClientException
         */
        public function can_reload(): void
        {
            $write  = [
                implode("\r\n", [
                    'action: Reload',
                    'actionid: 1432.123',
                    'module: module',
                    '',
                ]),
            ];
            $action = new ReloadAction('module');
            $client = $this->_start($write, $action);
        }

        /**
         * @test
         * @throws ClientException
         */
        public function can_ping(): void
        {
            $write  = [
                implode("\r\n", [
                    'action: Ping',
                    'actionid: 1432.123',
                    '',
                ]),
            ];
            $action = new PingAction();
            $client = $this->_start($write, $action);
        }

        /**
         * @test
         * @throws ClientException
         */
        public function can_send_text(): void
        {
            $write  = [
                implode("\r\n", [
                    'action: SendText',
                    'actionid: 1432.123',
                    'channel: channel',
                    'message: message',
                    '',
                ]),
            ];
            $action = new SendTextAction('channel', 'message');
            $client = $this->_start($write, $action);
        }

        /**
         * @test
         * @throws ClientException
         */
        public function can_sip_show_registry(): void
        {
            $write  = [
                implode("\r\n", [
                    'action: SIPshowregistry',
                    'actionid: 1432.123',
                    '',
                ]),
            ];
            $action = new SIPShowRegistryAction();
            $client = $this->_start($write, $action);
        }

        /**
         * @test
         * @throws ClientException
         */
        public function can_sip_peers(): void
        {
            $write  = [
                implode("\r\n", [
                    'action: Sippeers',
                    'actionid: 1432.123',
                    '',
                ]),
            ];
            $action = new SIPPeersAction();
            $client = $this->_start($write, $action);
        }

        /**
         * @test
         * @throws ClientException
         */
        public function can_sip_notify(): void
        {
            $write  = [
                implode("\r\n", [
                    'action: SIPnotify',
                    'actionid: 1432.123',
                    'channel: channel',
                    '',
                ]),
            ];
            $action = new SIPNotifyAction('channel');
            $client = $this->_start($write, $action);
        }

        /**
         * @test
         * @throws ClientException
         */
        public function can_sip_show_peer(): void
        {
            $write  = [
                implode("\r\n", [
                    'action: SIPshowpeer',
                    'actionid: 1432.123',
                    'peer: peer',
                    '',
                ]),
            ];
            $action = new SIPShowPeerAction('peer');
            $client = $this->_start($write, $action);
        }

        /**
         * @test
         * @throws ClientException
         */
        public function can_sip_qualify_peer(): void
        {
            $write  = [
                implode("\r\n", [
                    'action: Sipqualifypeer',
                    'actionid: 1432.123',
                    'peer: peer',
                    '',
                ]),
            ];
            $action = new SIPQualifyPeerAction('peer');
            $client = $this->_start($write, $action);
        }

        /**
         * @test
         * @throws ClientException
         */
        public function can_vgsm_sms_tx(): void
        {
            $write  = [
                implode("\r\n", [
                    'action: vgsm_sms_tx',
                    'actionid: 1432.123',
                    'account: account',
                    'x-sms-concatenate-total-messages: totalmsg',
                    'x-sms-concatenate-sequence-number: seqnum',
                    'x-sms-concatenate-refid: refid',
                    'x-sms-class: class',
                    'content: content',
                    'x-sms-me: me',
                    'content-transfer-encoding: encoding',
                    'content-type: type',
                    'to: to',
                    '',
                ]),
            ];
            $action = new VGSMSMSTxAction();
            $action->setAccount('account');
            $action->setConcatTotalMsg('totalmsg');
            $action->setConcatSeqNum('seqnum');
            $action->setConcatRefId('refid');
            $action->setSmsClass('class');
            $action->setContent('content');
            $action->setMe('me');
            $action->setContentEncoding('encoding');
            $action->setContentType('type');
            $action->setTo('to');
            $client = $this->_start($write, $action);
        }

        /**
         * @test
         * @throws ClientException
         */
        public function can_parked_calls(): void
        {
            $write  = [
                implode("\r\n", [
                    'action: ParkedCalls',
                    'actionid: 1432.123',
                    '',
                ]),
            ];
            $action = new ParkedCallsAction();
            $client = $this->_start($write, $action);
        }

        /**
         * @test
         * @throws ClientException
         */
        public function can_queues(): void
        {
            $write  = [
                implode("\r\n", [
                    'action: Queues',
                    'actionid: 1432.123',
                    '',
                ]),
            ];
            $action = new QueuesAction();
            $client = $this->_start($write, $action);
        }

        /**
         * @test
         * @throws ClientException
         */
        public function can_redirect(): void
        {
            $write  = [
                implode("\r\n", [
                    'action: Redirect',
                    'actionid: 1432.123',
                    'channel: channel',
                    'exten: extension',
                    'context: context',
                    'priority: priority',
                    'extrapriority: extrapriority',
                    'extracontext: extracontext',
                    'extraexten: extraextension',
                    'extrachannel: extrachannel',
                    '',
                ]),
            ];
            $action = new RedirectAction('channel', 'extension', 'context', 'priority');
            $action->setExtraPriority('extrapriority');
            $action->setExtraContext('extracontext');
            $action->setExtraExtension('extraextension');
            $action->setExtraChannel('extrachannel');
            $client = $this->_start($write, $action);
        }

        /**
         * @test
         * @throws ClientException
         */
        public function can_queue_unpause(): void
        {
            $write  = [
                implode("\r\n", [
                    'action: QueuePause',
                    'actionid: 1432.123',
                    'queue: queue',
                    'reason: reason',
                    'interface: interface',
                    'paused: false',
                    '',
                ]),
            ];
            $action = new QueueUnpauseAction('interface', 'queue', 'reason');
            $client = $this->_start($write, $action);
        }

        /**
         * @test
         * @throws ClientException
         */
        public function can_queue_pause(): void
        {
            $write  = [
                implode("\r\n", [
                    'action: QueuePause',
                    'actionid: 1432.123',
                    'queue: queue',
                    'reason: reason',
                    'interface: interface',
                    'paused: true',
                    '',
                ]),
            ];
            $action = new QueuePauseAction('interface', 'queue', 'reason');
            $client = $this->_start($write, $action);
        }

        /**
         * @test
         * @throws ClientException
         */
        public function can_queue_summary(): void
        {
            $write  = [
                implode("\r\n", [
                    'action: QueueSummary',
                    'actionid: 1432.123',
                    'queue: queue',
                    '',
                ]),
            ];
            $action = new QueueSummaryAction('queue');
            $client = $this->_start($write, $action);
        }

        /**
         * @test
         * @throws ClientException
         */
        public function can_queue_status(): void
        {
            $write  = [
                implode("\r\n", [
                    'action: QueueStatus',
                    'actionid: 1432.123',
                    'queue: queue',
                    'member: member',
                    '',
                ]),
            ];
            $action = new QueueStatusAction('queue', 'member');
            $client = $this->_start($write, $action);
        }

        /**
         * @test
         * @throws ClientException
         */
        public function can_queue_reset(): void
        {
            $write  = [
                implode("\r\n", [
                    'action: QueueReset',
                    'actionid: 1432.123',
                    'queue: queue',
                    '',
                ]),
            ];
            $action = new QueueResetAction('queue');
            $client = $this->_start($write, $action);
        }

        /**
         * @test
         * @throws ClientException
         */
        public function can_queue_rule(): void
        {
            $write  = [
                implode("\r\n", [
                    'action: QueueRule',
                    'actionid: 1432.123',
                    'rule: rule',
                    '',
                ]),
            ];
            $action = new QueueRuleAction('rule');
            $client = $this->_start($write, $action);
        }

        /**
         * @test
         * @throws ClientException
         */
        public function can_queue_remove(): void
        {
            $write  = [
                implode("\r\n", [
                    'action: QueueRemove',
                    'actionid: 1432.123',
                    'queue: queue',
                    'interface: interface',
                    '',
                ]),
            ];
            $action = new QueueRemoveAction('queue', 'interface');
            $client = $this->_start($write, $action);
        }

        /**
         * @test
         * @throws ClientException
         */
        public function can_queue_reload(): void
        {
            $write  = [
                implode("\r\n", [
                    'action: QueueReload',
                    'actionid: 1432.123',
                    'queue: queue',
                    'members: yes',
                    'rules: yes',
                    'parameters: yes',
                    '',
                ]),
            ];
            $action = new QueueReloadAction('queue', true, true, true);
            $client = $this->_start($write, $action);
        }

        /**
         * @test
         * @throws ClientException
         */
        public function can_queue_penalty(): void
        {
            $write  = [
                implode("\r\n", [
                    'action: QueuePenalty',
                    'actionid: 1432.123',
                    'interface: interface',
                    'penalty: penalty',
                    'queue: queue',
                    '',
                ]),
            ];
            $action = new QueuePenaltyAction('interface', 'penalty', 'queue');
            $client = $this->_start($write, $action);
        }

        /**
         * @test
         * @throws ClientException
         */
        public function can_queue_log(): void
        {
            $write  = [
                implode("\r\n", [
                    'action: QueueLog',
                    'actionid: 1432.123',
                    'event: event',
                    'queue: queue',
                    'message: message',
                    'interface: member',
                    'uniqueid: uniqueid',
                    '',
                ]),
            ];
            $action = new QueueLogAction('queue', 'event');
            $action->setMessage('message');
            $action->setMemberName('member');
            $action->setUniqueId('uniqueid');
            $client = $this->_start($write, $action);
        }

        /**
         * @test
         * @throws ClientException
         */
        public function can_queue_add(): void
        {
            $write  = [
                implode("\r\n", [
                    'action: QueueAdd',
                    'actionid: 1432.123',
                    'interface: interface',
                    'queue: queue',
                    'paused: true',
                    'membername: member',
                    'penalty: penalty',
                    'stateinterface: state',
                    '',
                ]),
            ];
            $action = new QueueAddAction('queue', 'interface');
            $action->setPaused('true');
            $action->setMemberName('member');
            $action->setPenalty('penalty');
            $action->setStateInterface('state');
            $client = $this->_start($write, $action);
        }

        /**
         * @test
         * @throws ClientException
         */
        public function can_play_dtmf(): void
        {
            $write  = [
                implode("\r\n", [
                    'action: PlayDTMF',
                    'actionid: 1432.123',
                    'channel: channel',
                    'digit: 1',
                    '',
                ]),
            ];
            $action = new PlayDTMFAction('channel', '1');
            $client = $this->_start($write, $action);
        }

        /**
         * @test
         * @throws ClientException
         */
        public function can_park(): void
        {
            $write  = [
                implode("\r\n", [
                    'action: Park',
                    'actionid: 1432.123',
                    'channel: channel1',
                    'channel2: channel2',
                    'timeout: timeout',
                    'parkinglot: lot',
                    '',
                ]),
            ];
            $action = new ParkAction('channel1', 'channel2', 'timeout', 'lot');
            $client = $this->_start($write, $action);
        }

        /**
         * @test
         * @throws ClientException
         */
        public function can_agi(): void
        {
            $write  = [
                implode("\r\n", [
                    'action: AGI',
                    'actionid: 1432.123',
                    'channel: channel1',
                    'command: an agi command',
                    'commandid: blah',
                    '',
                ]),
            ];
            $action = new AGIAction('channel1', 'an agi command', 'blah');
            $client = $this->_start($write, $action);
        }

        /**
         * @test
         * @throws ClientException
         */
        public function can_originate(): void
        {
            $write  = [
                implode("\r\n", [
                    'action: Originate',
                    'actionid: 1432.123',
                    'channel: channel',
                    'codecs: a,b',
                    'async: true',
                    'account: account',
                    'callerid: clid',
                    'timeout: timeout',
                    'data: data',
                    'application: app',
                    'priority: priority',
                    'context: context',
                    'exten: extension',
                    'Variable: a=b',
                    '',
                ]),
            ];
            $action = new OriginateAction('channel');
            $action->setCodecs(['a', 'b']);
            $action->setAsync(true);
            $action->setAccount('account');
            $action->setCallerId('clid');
            $action->setTimeout('timeout');
            $action->setData('data');
            $action->setApplication('app');
            $action->setPriority('priority');
            $action->setContext('context');
            $action->setExtension('extension');
            $action->setVariable('a', 'b');
            $client = $this->_start($write, $action);
        }

        /**
         * @test
         * @throws ClientException
         */
        public function can_logoff(): void
        {
            $write  = [
                implode("\r\n", [
                    'action: Logoff',
                    'actionid: 1432.123',
                    '',
                ]),
            ];
            $action = new LogoffAction();
            $client = $this->_start($write, $action);
        }

        /**
         * @test
         * @throws ClientException
         */
        public function can_user_event(): void
        {
            $write  = [
                implode("\r\n", [
                    'action: UserEvent',
                    'actionid: 1432.123',
                    'userevent: FooEvent',
                    'foo: Bar',
                    'bar: Foo',
                    '',
                ]),
            ];
            $action = new UserEventAction('FooEvent', ['Foo' => 'Bar', 'Bar' => 'Foo']);
            $client = $this->_start($write, $action);
        }

        /**
         * @test
         * @throws ClientException
         */
        public function can_wait_event(): void
        {
            $write  = [
                implode("\r\n", [
                    'action: WaitEvent',
                    'actionid: 1432.123',
                    'timeout: 20',
                    '',
                ]),
            ];
            $action = new WaitEventAction(20);
            $client = $this->_start($write, $action);
        }

        /**
         * @test
         * @throws PAMIException
         */
        public function can_set_actionid(): void
        {
            $action = new PingAction();
            // ActionID is between 0 and 69 characters long.
            $actionID = '121234567890123456789012345678901234567890';
            $action->setActionID($actionID);
            $this->assertSame($actionID, $action->getActionID());
        }

        /**
         * @test
         * @throws PAMIException
         */
        public function cannot_set_actionid_longer_than_69_characters(): void
        {
            $action = new PingAction();
            // A 70-character long ActionID
            $action->setActionID('1234567890123456789012345678901234567890123456789012345678901234567890');
        }

        /**
         * @test
         * @throws PAMIException
         */
        public function cannot_set_empty_actionid(): void
        {
            $action = new PingAction();
            // An empty ActionID
            $action->setActionID('');
        }

        /**
         * @test
         * @throws ClientException
         */
        public function can_update_config(): void
        {
            $number      = 9876;
            $writeCreate = [
                implode("\r\n", [
                    'action: UpdateConfig',
                    'actionid: 1432.123',
                    'srcfilename: sip.conf',
                    'dstfilename: sip.conf',
                    'action-000000: NewCat',
                    'cat-000000: ' . $number,
                    'action-000001: Append',
                    'cat-000001: ' . $number,
                    'var-000001: username',
                    'value-000001: test',
                    'action-000002: Append',
                    'cat-000002: ' . $number,
                    'var-000002: secret',
                    'value-000002: secret',
                    '',
                ]),
            ];

            $actionCreate = new UpdateConfigAction();

            $actionCreate->setSrcFilename('sip.conf');
            $actionCreate->setDstFilename('sip.conf');

            $actionCreate->setAction('NewCat');
            $actionCreate->setCat($number);

            $actionCreate->setAction('Append');
            $actionCreate->setCat($number);
            $actionCreate->setVar('username');
            $actionCreate->setValue('test');

            $actionCreate->setAction('Append');
            $actionCreate->setCat($number);
            $actionCreate->setVar('secret');
            $actionCreate->setValue('secret');

            $client = $this->_start($writeCreate, $actionCreate);

            $writeDelete = [
                implode("\r\n", [
                    'action: UpdateConfig',
                    'actionid: 1432.123',
                    'srcfilename: sip.conf',
                    'dstfilename: sip.conf',
                    'reload: yes',
                    'action-000000: DelCat',
                    'cat-000000: ' . $number,
                    '',
                ]),
            ];

            $actionDelete = new UpdateConfigAction();

            $actionDelete->setSrcFilename('sip.conf');
            $actionDelete->setDstFilename('sip.conf');
            $actionDelete->setReload(true);
            $actionDelete->setAction('DelCat');
            $actionDelete->setCat($number);

            $client = $this->_start($writeDelete, $actionDelete);
        }
    }
}
