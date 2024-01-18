<?php
/**
 * Event triggered when getting a dongle device.
 *
 * PHP Version 7.4
 *
 * @category   Pami
 * @package    Message
 * @subpackage Event
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
namespace PAMI\Message\Event;

/**
 * Event triggered when getting a dongle device.
 *
 * PHP Version 7.4
 *
 * @category   Pami
 * @package    Message
 * @subpackage Event
 * @author     Marcelo Gornstein <marcelog@gmail.com>
 * @author     Boltunov Artem <dev@bluescarf.ru>
 * @license    http://marcelog.github.com/PAMI/ Apache License 2.0
 * @link       http://marcelog.github.com/PAMI/
 */
class DongleDeviceEntryEvent extends EventMessage
{
    /**
     * Returns key: 'Device'.
     *
     * @return ?string
     */
    public function getDevice(): ?string
    {
        return $this->getKey('Device');
    }

    /**
     * Returns key: 'AudioSetting'.
     *
     * @return ?string
     */
    public function getAudioSetting(): ?string
    {
        return $this->getKey('AudioSetting');
    }

    /**
     * Returns key: 'DataSetting'.
     *
     * @return ?string
     */
    public function getDataSetting(): ?string
    {
        return $this->getKey('DataSetting');
    }

    /**
     * Returns key: 'IMEISetting'.
     *
     * @return ?string
     */
    public function getIMEISetting(): ?string
    {
        return $this->getKey('IMEISetting');
    }

    /**
     * Returns key: 'IMSISetting'.
     *
     * @return ?string
     */
    public function getIMSISetting(): ?string
    {
        return $this->getKey('IMSISetting');
    }

    /**
     * Returns key: 'ChannelLanguage'.
     *
     * @return ?string
     */
    public function getChannelLanguage(): ?string
    {
        return $this->getKey('ChannelLanguage');
    }

    /**
     * Returns key: 'Group'.
     *
     * @return ?string
     */
    public function getGroup(): ?string
    {
        return $this->getKey('Group');
    }

    /**
     * Returns key: 'RXGain'.
     *
     * @return ?string
     */
    public function getRXGain(): ?string
    {
        return $this->getKey('RXGain');
    }

    /**
     * Returns key: 'TXGain'.
     *
     * @return ?string
     */
    public function getTXGain(): ?string
    {
        return $this->getKey('TXGain');
    }

    /**
     * Returns key: 'U2DIAG'.
     *
     * @return ?string
     */
    public function getU2DIAG(): ?string
    {
        return $this->getKey('U2DIAG');
    }

    /**
     * Returns key: 'UseCallingPres'.
     *
     * @return ?string
     */
    public function getUseCallingPres(): ?string
    {
        return $this->getKey('UseCallingPres');
    }

    /**
     * Returns key: 'DefaultCallingPres'.
     *
     * @return ?string
     */
    public function getDefaultCallingPres(): ?string
    {
        return $this->getKey('DefaultCallingPres');
    }

    /**
     * Returns key: 'AutoDeleteSMS'.
     *
     * @return ?string
     */
    public function getAutoDeleteSMS(): ?string
    {
        return $this->getKey('AutoDeleteSMS');
    }

    /**
     * Returns key: 'DisableSMS'.
     *
     * @return ?string
     */
    public function getDisableSMS(): ?string
    {
        return $this->getKey('DisableSMS');
    }

    /**
     * Returns key: 'ResetDongle'.
     *
     * @return ?string
     */
    public function getResetDongle(): ?string
    {
        return $this->getKey('ResetDongle');
    }

    /**
     * Returns key: 'SMSPDU'.
     *
     * @return ?string
     */
    public function getSMSPDU(): ?string
    {
        return $this->getKey('SMSPDU');
    }

    /**
     * Returns key: 'CallWaitingSetting'.
     *
     * @return ?string
     */
    public function getCallWaitingSetting(): ?string
    {
        return $this->getKey('CallWaitingSetting');
    }

    /**
     * Returns key: 'DTMF'.
     *
     * @return ?string
     */
    public function getDTMF(): ?string
    {
        return $this->getKey('DTMF');
    }

    /**
     * Returns key: 'MinimalDTMFGap'.
     *
     * @return ?string
     */
    public function getMinimalDTMFGap(): ?string
    {
        return $this->getKey('MinimalDTMFGap');
    }

    /**
     * Returns key: 'MinimalDTMFDuration'.
     *
     * @return ?string
     */
    public function getMinimalDTMFDuration(): ?string
    {
        return $this->getKey('MinimalDTMFDuration');
    }

    /**
     * Returns key: 'MinimalDTMFInterval'.
     *
     * @return ?string
     */
    public function getMinimalDTMFInterval(): ?string
    {
        return $this->getKey('MinimalDTMFInterval');
    }

    /**
     * Returns key: 'State'.
     *
     * @return ?string
     */
    public function getState(): ?string
    {
        return $this->getKey('State');
    }

    /**
     * Returns key: 'AudioState'.
     *
     * @return ?string
     */
    public function getAudioState(): ?string
    {
        return $this->getKey('AudioState');
    }

    /**
     * Returns key: 'DataState'.
     *
     * @return ?string
     */
    public function getDataState(): ?string
    {
        return $this->getKey('DataState');
    }

    /**
     * Returns key: 'Voice'.
     *
     * @return ?string
     */
    public function getVoice(): ?string
    {
        return $this->getKey('Voice');
    }

    /**
     * Returns key: 'SMS'.
     *
     * @return ?string
     */
    public function getSMS(): ?string
    {
        return $this->getKey('SMS');
    }

    /**
     * Returns key: 'Manufacturer'.
     *
     * @return ?string
     */
    public function getManufacturer(): ?string
    {
        return $this->getKey('Manufacturer');
    }

    /**
     * Returns key: 'Model'.
     *
     * @return ?string
     */
    public function getModel(): ?string
    {
        return $this->getKey('Model');
    }

    /**
     * Returns key: 'Firmware'.
     *
     * @return ?string
     */
    public function getFirmware(): ?string
    {
        return $this->getKey('Firmware');
    }

    /**
     * Returns key: 'IMEIState'.
     *
     * @return ?string
     */
    public function getIMEIState(): ?string
    {
        return $this->getKey('IMEIState');
    }

    /**
     * Returns key: 'IMSIState'.
     *
     * @return ?string
     */
    public function getIMSIState(): ?string
    {
        return $this->getKey('IMSIState');
    }

    /**
     * Returns key: 'GSMRegistrationStatus'.
     *
     * @return ?string
     */
    public function getGSMRegistrationStatus(): ?string
    {
        return $this->getKey('GSMRegistrationStatus');
    }

    /**
     * Returns key: 'RSSI'.
     *
     * @return ?string
     */
    public function getRSSI(): ?string
    {
        return $this->getKey('RSSI');
    }

    /**
     * Returns key: 'Mode'.
     *
     * @return ?string
     */
    public function getMode(): ?string
    {
        return $this->getKey('Mode');
    }

    /**
     * Returns key: 'Submode'.
     *
     * @return ?string
     */
    public function getSubmode(): ?string
    {
        return $this->getKey('Submode');
    }

    /**
     * Returns key: 'ProviderName'.
     *
     * @return ?string
     */
    public function getProviderName(): ?string
    {
        return $this->getKey('ProviderName');
    }

    /**
     * Returns key: 'LocationAreaCode'.
     *
     * @return ?string
     */
    public function getLocationAreaCode(): ?string
    {
        return $this->getKey('LocationAreaCode');
    }

    /**
     * Returns key: 'CellID'.
     *
     * @return ?string
     */
    public function getCellID(): ?string
    {
        return $this->getKey('CellID');
    }

    /**
     * Returns key: 'SubscriberNumber'.
     *
     * @return ?string
     */
    public function getSubscriberNumber(): ?string
    {
        return $this->getKey('SubscriberNumber');
    }

    /**
     * Returns key: 'SMSServiceCenter'.
     *
     * @return ?string
     */
    public function getSMSServiceCenter(): ?string
    {
        return $this->getKey('SMSServiceCenter');
    }

    /**
     * Returns key: 'UseUCS2Encoding'.
     *
     * @return ?string
     */
    public function getUseUCS2Encoding(): ?string
    {
        return $this->getKey('UseUCS2Encoding');
    }

    /**
     * Returns key: 'USSDUse7BitEncoding'.
     *
     * @return ?string
     */
    public function getUSSDUse7BitEncoding(): ?string
    {
        return $this->getKey('USSDUse7BitEncoding');
    }

    /**
     * Returns key: 'USSDUseUCS2Decoding'.
     *
     * @return ?string
     */
    public function getUSSDUseUCS2Decoding(): ?string
    {
        return $this->getKey('USSDUseUCS2Decoding');
    }

    /**
     * Returns key: 'TasksInQueue'.
     *
     * @return ?string
     */
    public function getTasksInQueue(): ?string
    {
        return $this->getKey('TasksInQueue');
    }

    /**
     * Returns key: 'CommandsInQueue'.
     *
     * @return ?string
     */
    public function getCommandsInQueue(): ?string
    {
        return $this->getKey('CommandsInQueue');
    }

    /**
     * Returns key: 'CallWaitingState'.
     *
     * @return ?string
     */
    public function getCallWaitingState(): ?string
    {
        return $this->getKey('CallWaitingState');
    }

    /**
     * Returns key: 'CurrentDeviceState'.
     *
     * @return ?string
     */
    public function getCurrentDeviceState(): ?string
    {
        return $this->getKey('CurrentDeviceState');
    }

    /**
     * Returns key: 'DesiredDeviceState'.
     *
     * @return ?string
     */
    public function getDesiredDeviceState(): ?string
    {
        return $this->getKey('DesiredDeviceState');
    }

    /**
     * Returns key: 'CallsChannels'.
     *
     * @return ?string
     */
    public function getCallsChannels(): ?string
    {
        return $this->getKey('CallsChannels');
    }

    /**
     * Returns key: 'Active'.
     *
     * @return ?string
     */
    public function getActive(): ?string
    {
        return $this->getKey('Active');
    }

    /**
     * Returns key: 'Held'.
     *
     * @return ?string
     */
    public function getHeld(): ?string
    {
        return $this->getKey('Held');
    }

    /**
     * Returns key: 'Dialing'.
     *
     * @return ?string
     */
    public function getDialing(): ?string
    {
        return $this->getKey('Dialing');
    }

    /**
     * Returns key: 'Alerting'.
     *
     * @return ?string
     */
    public function getAlerting(): ?string
    {
        return $this->getKey('Alerting');
    }

    /**
     * Returns key: 'Incoming'.
     *
     * @return ?string
     */
    public function getIncoming(): ?string
    {
        return $this->getKey('Incoming');
    }

    /**
     * Returns key: 'Waiting'.
     *
     * @return ?string
     */
    public function getWaiting(): ?string
    {
        return $this->getKey('Waiting');
    }

    /**
     * Returns key: 'Releasing'.
     *
     * @return ?string
     */
    public function getReleasing(): ?string
    {
        return $this->getKey('Releasing');
    }

    /**
     * Returns key: 'Initializing'.
     *
     * @return ?string
     */
    public function getInitializing(): ?string
    {
        return $this->getKey('Initializing');
    }
}
