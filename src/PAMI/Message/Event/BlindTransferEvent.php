<?php
/**
 * Event triggered when a blind transfer is complete.
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
 * Event triggered when a blind transfer is complete.
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
class BlindTransferEvent extends EventMessage
{
    public const RESULT_FAIL          = 'Fail';
    public const RESULT_INVALID       = 'Invalid';
    public const RESULT_NOT_PERMITTED = 'Not Permitted';
    public const RESULT_SUCCESS       = 'Success';

    /**
     * Returns key: 'Result'.
     * Result - Indicates if the transfer was successful or if it failed.
     *
     * - Fail - An internal error occurred.
     * - Invalid - Invalid configuration for transfer (e.g. Not bridged)
     * - Not Permitted - Bridge does not permit transfers
     * - Success - Transfer completed successfully
     *
     * @return ?string
     */
    public function getResult(): ?string
    {
        return $this->getKey('Result');
    }

    /**
     * Returns key: 'TransfererChannel'.
     *
     * @return ?string
     */
    public function getTransfererChannel(): ?string
    {
        return $this->getKey('TransfererChannel');
    }

    /**
     * Returns key: 'TransfererChannelState'.
     * TransfererChannelState - A numeric code for the channel's current state, related to TransfererChannelStateDesc
     *
     * @return ?string
     */
    public function getTransfererChannelState(): ?string
    {
        return $this->getKey('TransfererChannelState');
    }

    /**
     * Returns key: 'TransfererChannelStateDesc'.
     *
     * Down
     * Rsrvd
     * OffHook
     * Dialing
     * Ring
     * Ringing
     * Up
     * Busy
     * Dialing Offhook
     * Pre-ring
     * Unknown
     *
     * @return ?string
     */
    public function getTransfererChannelStateDesc(): ?string
    {
        return $this->getKey('TransfererChannelStateDesc');
    }

    /**
     * Returns key: 'TransfererCallerIDNum'.
     *
     * @return ?string
     */
    public function getTransfererCallerIDNum(): ?string
    {
        return $this->getKey('TransfererCallerIDNum');
    }

    /**
     * Returns key: 'TransfererCallerIDName'.
     *
     * @return ?string
     */
    public function getTransfererCallerIDName(): ?string
    {
        return $this->getKey('TransfererCallerIDName');
    }

    /**
     * Returns key: 'TransfererConnectedLineNum'.
     *
     * @return ?string
     */
    public function getTransfererConnectedLineNum(): ?string
    {
        return $this->getKey('TransfererConnectedLineNum');
    }

    /**
     * Returns key: 'TransfererConnectedLineName'.
     *
     * @return ?string
     */
    public function getTransfererConnectedLineName(): ?string
    {
        return $this->getKey('TransfererConnectedLineName');
    }

    /**
     * Returns key: 'TransfererAccountCode'.
     *
     * @return ?string
     */
    public function getTransfererAccountCode(): ?string
    {
        return $this->getKey('TransfererAccountCode');
    }

    /**
     * Returns key: 'TransfererContext'.
     *
     * @return ?string
     */
    public function getTransfererContext(): ?string
    {
        return $this->getKey('TransfererContext');
    }

    /**
     * Returns key: 'TransfererExten'.
     *
     * @return ?string
     */
    public function getTransfererExten(): ?string
    {
        return $this->getKey('TransfererExten');
    }

    /**
     * Returns key: 'TransfererPriority'.
     *
     * @return ?string
     */
    public function getTransfererPriority(): ?string
    {
        return $this->getKey('TransfererPriority');
    }

    /**
     * Returns key: 'TransfererUniqueid'.
     *
     * @return ?string
     */
    public function getTransfererUniqueid(): ?string
    {
        return $this->getKey('TransfererUniqueid');
    }

    /**
     * Returns key: 'TransfereeChannel'.
     *
     * @return ?string
     */
    public function getTransfereeChannel(): ?string
    {
        return $this->getKey('TransfereeChannel');
    }

    /**
     * Returns key: 'TransfereeChannelState'.
     * TransfereeChannelState - A numeric code for the channel's current state, related to TransfereeChannelStateDesc
     *
     * @return ?string
     */
    public function getTransfereeChannelState(): ?string
    {
        return $this->getKey('TransfereeChannelState');
    }

    /**
     * Returns key: 'TransfereeChannelStateDesc'.
     *
     * Down
     * Rsrvd
     * OffHook
     * Dialing
     * Ring
     * Ringing
     * Up
     * Busy
     * Dialing Offhook
     * Pre-ring
     * Unknown
     *
     * @return ?string
     */
    public function getTransfereeChannelStateDesc(): ?string
    {
        return $this->getKey('TransfereeChannelStateDesc');
    }

    /**
     * Returns key: 'TransfereeCallerIDNum'.
     *
     * @return ?string
     */
    public function getTransfereeCallerIDNum(): ?string
    {
        return $this->getKey('TransfereeCallerIDNum');
    }

    /**
     * Returns key: 'TransfereeCallerIDName'.
     *
     * @return ?string
     */
    public function getTransfereeCallerIDName(): ?string
    {
        return $this->getKey('TransfereeCallerIDName');
    }

    /**
     * Returns key: 'TransfereeConnectedLineNum'.
     *
     * @return ?string
     */
    public function getTransfereeConnectedLineNum(): ?string
    {
        return $this->getKey('TransfereeConnectedLineNum');
    }

    /**
     * Returns key: 'TransfereeConnectedLineName'.
     *
     * @return ?string
     */
    public function getTransfereeConnectedLineName(): ?string
    {
        return $this->getKey('TransfereeConnectedLineName');
    }

    /**
     * Returns key: 'TransfereeAccountCode'.
     *
     * @return ?string
     */
    public function getTransfereeAccountCode(): ?string
    {
        return $this->getKey('TransfereeAccountCode');
    }

    /**
     * Returns key: 'TransfereeContext'.
     *
     * @return ?string
     */
    public function getTransfereeContext(): ?string
    {
        return $this->getKey('TransfereeContext');
    }

    /**
     * Returns key: 'TransfereeExten'.
     *
     * @return ?string
     */
    public function getTransfereeExten(): ?string
    {
        return $this->getKey('TransfereeExten');
    }

    /**
     * Returns key: 'TransfereePriority'.
     *
     * @return ?string
     */
    public function getTransfereePriority(): ?string
    {
        return $this->getKey('TransfereePriority');
    }

    /**
     * Returns key: 'TransfereeUniqueid'.
     *
     * @return ?string
     */
    public function getTransfereeUniqueid(): ?string
    {
        return $this->getKey('TransfereeUniqueid');
    }

    /**
     * Returns key: 'BridgeUniqueid'.
     *
     * @return ?string
     */
    public function getBridgeUniqueid(): ?string
    {
        return $this->getKey('BridgeUniqueid');
    }

    /**
     * Returns key: 'BridgeType'.
     * BridgeType - The type of bridge
     *
     * @return ?string
     */
    public function getBridgeType(): ?string
    {
        return $this->getKey('BridgeType');
    }

    /**
     * Returns key: 'BridgeTechnology'.
     * BridgeTechnology - Technology in use by the bridge
     *
     * @return ?string
     */
    public function getBridgeTechnology(): ?string
    {
        return $this->getKey('BridgeTechnology');
    }

    /**
     * Returns key: 'BridgeCreator'.
     * BridgeCreator - Entity that created the bridge if applicable
     *
     * @return ?string
     */
    public function getBridgeCreator(): ?string
    {
        return $this->getKey('BridgeCreator');
    }

    /**
     * Returns key: 'BridgeName'.
     * BridgeName - Name used to refer to the bridge by its BridgeCreator if applicable
     *
     * @return ?string
     */
    public function getBridgeName(): ?string
    {
        return $this->getKey('BridgeName');
    }

    /**
     * Returns key: 'BridgeNumChannels'.
     * BridgeNumChannels - Number of channels in the bridge
     *
     * @return ?string
     */
    public function getBridgeNumChannels(): ?string
    {
        return $this->getKey('BridgeNumChannels');
    }

    /**
     * Returns key: 'IsExternal'.
     * IsExternal - Indicates if the transfer was performed outside of Asterisk.
     * For instance, a channel protocol native transfer is external. A DTMF transfer is internal.
     *
     * Yes
     * No
     *
     * @return ?string
     */
    public function getIsExternal(): ?string
    {
        return $this->getKey('IsExternal');
    }

    /**
     * Indicates if the transfer was performed outside of Asterisk.
     * For instance, a channel protocol native transfer is external. A DTMF transfer is internal.
     *
     * @return bool
     */
    public function isExternal(): bool
    {
        return $this->getIsExternal() === 'Yes';
    }

    /**
     * Returns key: 'Extension'.
     * Extension - Destination extension for the blind transfer.
     *
     * @return ?string
     */
    public function getExtension(): ?string
    {
        return $this->getKey('Extension');
    }
}
