<?php
/**
 * Event triggered when a call is unparked.
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
 * Event triggered when a call is unparked.
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
class UnParkedCallEvent extends EventMessage
{
    /**
     * Returns key: 'Parkinglot'.
     *
     * @return ?string
     */
    public function getParkinglot(): ?string
    {
        return $this->getKey('Parkinglot');
    }

    /**
     * Returns key: 'From'.
     * @deprecated Deprecated since Asterisk 12. {@use self::getRetrieverChannel()}.
     *
     * @return ?string
     */
    public function getFrom(): ?string
    {
        return $this->getRetrieverChannel();
    }

    /**
     * Returns key: 'Timeout'.
     * @deprecated Deprecated since Asterisk 12. {@use self::getParkingTimeout()}.
     *
     * @return ?string
     */
    public function getTimeout(): ?string
    {
        return $this->getParkingTimeout();
    }

    /**
     * Returns key: 'ConnectedLineNum'.
     * @deprecated Deprecated since Asterisk 12. {@use self::getParkeeConnectedLineNum()}.
     *
     * @return ?string
     */
    public function getConnectedLineNum(): ?string
    {
        return $this->getParkeeConnectedLineNum();
    }

    /**
     * Returns key: 'ConnectedLineName'.
     * @deprecated Deprecated since Asterisk 12. {@use self::getParkeeConnectedLineName()}.
     *
     * @return ?string
     */
    public function getConnectedLineName(): ?string
    {
        return $this->getParkeeConnectedLineName();
    }

    /**
     * Returns key: 'Channel'.
     * @deprecated Deprecated since Asterisk 12. {@use self::getParkeeChannel()}.
     *
     * @return ?string
     */
    public function getChannel(): ?string
    {
        return $this->getParkeeChannel();
    }

    /**
     * Returns key: 'CallerIDNum'.
     * @deprecated Deprecated since Asterisk 12. {@use self::getParkeeCallerIDNum()}.
     *
     * @return ?string
     */
    public function getCallerIDNum(): ?string
    {
        return $this->getParkeeCallerIDNum();
    }

    /**
     * Returns key: 'CallerIDName'.
     * @deprecated Deprecated since Asterisk 12. {@use self::getParkeeCallerIDName()}.
     *
     * @return ?string
     */
    public function getCallerIDName(): ?string
    {
        return $this->getParkeeCallerIDName();
    }

    /**
     * Returns key: 'UniqueID'.
     * @deprecated Deprecated since Asterisk 12. {@use self::getParkeeUniqueid()}.
     *
     * @return ?string
     */
    public function getUniqueID(): ?string
    {
        return $this->getParkeeUniqueid();
    }

    /**
     * Returns key: 'Exten'.
     * @deprecated Deprecated since Asterisk 12. {@use self::getParkingSpace()}.
     *
     * @return ?string
     */
    public function getExtension(): ?string
    {
        return $this->getParkingSpace();
    }

    /**
     * Returns key: 'ParkeeChannel'.
     *
     * @return ?string
     */
    public function getParkeeChannel(): ?string
    {
        return $this->getKey('ParkeeChannel') ?: $this->getKey('Channel');
    }

    /**
     * Returns key: 'ParkeeChannelState'.
     *
     * @return ?string
     */
    public function getParkeeChannelState(): ?string
    {
        return $this->getKey('ParkeeChannelState');
    }

    /**
     * Returns key: 'ParkeeChannelStateDesc'.
     *
     * @return ?string
     */
    public function getParkeeChannelStateDesc(): ?string
    {
        return $this->getKey('ParkeeChannelStateDesc');
    }

    /**
     * Returns key: 'ParkeeCallerIDNum'.
     *
     * @return ?string
     */
    public function getParkeeCallerIDNum(): ?string
    {
        return $this->getKey('ParkeeCallerIDNum') ?: $this->getKey('CallerIDNum');
    }

    /**
     * Returns key: 'ParkeeCallerIDName'.
     *
     * @return ?string
     */
    public function getParkeeCallerIDName(): ?string
    {
        return $this->getKey('ParkeeCallerIDName') ?: $this->getKey('CallerIDName');
    }

    /**
     * Returns key: 'ParkeeConnectedLineNum'.
     *
     * @return ?string
     */
    public function getParkeeConnectedLineNum(): ?string
    {
        return $this->getKey('ParkeeConnectedLineNum') ?: $this->getKey('ConnectedLineNum');
    }

    /**
     * Returns key: 'ParkeeConnectedLineName'.
     *
     * @return ?string
     */
    public function getParkeeConnectedLineName(): ?string
    {
        return $this->getKey('ParkeeConnectedLineName') ?: $this->getKey('ConnectedLineName');
    }

    /**
     * Returns key: 'ParkeeAccountCode'.
     *
     * @return ?string
     */
    public function getParkeeAccountCode(): ?string
    {
        return $this->getKey('ParkeeAccountCode');
    }

    /**
     * Returns key: 'ParkeeContext'.
     *
     * @return ?string
     */
    public function getParkeeContext(): ?string
    {
        return $this->getKey('ParkeeContext');
    }

    /**
     * Returns key: 'ParkeeExten'.
     *
     * @return ?string
     */
    public function getParkeeExten(): ?string
    {
        return $this->getKey('ParkeeExten');
    }

    /**
     * Returns key: 'ParkeePriority'.
     *
     * @return ?string
     */
    public function getParkeePriority(): ?string
    {
        return $this->getKey('ParkeePriority');
    }

    /**
     * Returns key: 'ParkeeUniqueid'.
     *
     * @return ?string
     */
    public function getParkeeUniqueid(): ?string
    {
        return $this->getKey('ParkeeUniqueid') ?: $this->getKey('UniqueId');
    }

    /**
     * Returns key: 'ParkerDialString'.
     *
     * @return ?string
     */
    public function getParkerDialString(): ?string
    {
        return $this->getKey('ParkerDialString');
    }

    /**
     * Returns key: 'ParkingSpace'.
     *
     * @return ?string
     */
    public function getParkingSpace(): ?string
    {
        return $this->getKey('ParkingSpace') ?: $this->getKey('Exten');
    }

    /**
     * Returns key: 'ParkingTimeout'.
     *
     * @return ?string
     */
    public function getParkingTimeout(): ?string
    {
        return $this->getKey('ParkingTimeout') ?: $this->getKey('Timeout');
    }

    /**
     * Returns key: 'ParkingDuration'.
     *
     * @return ?string
     */
    public function getParkingDuration(): ?string
    {
        return $this->getKey('ParkingDuration');
    }

    /**
     * Returns key: 'ParkerChannel'.
     *
     * @return ?string
     */
    public function getParkerChannel(): ?string
    {
        return $this->getKey('ParkerChannel');
    }

    /**
     * Returns key: 'ParkerChannelState'.
     *
     * @return ?string
     */
    public function getParkerChannelState(): ?string
    {
        return $this->getKey('ParkerChannelState');
    }

    /**
     * Returns key: 'ParkerChannelStateDesc'.
     *
     * @return ?string
     */
    public function getParkerChannelStateDesc(): ?string
    {
        return $this->getKey('ParkerChannelStateDesc');
    }

    /**
     * Returns key: 'ParkerCallerIDNum'.
     *
     * @return ?string
     */
    public function getParkerCallerIDNum(): ?string
    {
        return $this->getKey('ParkerCallerIDNum');
    }

    /**
     * Returns key: 'ParkerCallerIDName'.
     *
     * @return ?string
     */
    public function getParkerCallerIDName(): ?string
    {
        return $this->getKey('ParkerCallerIDName');
    }

    /**
     * Returns key: 'ParkerConnectedLineNum'.
     *
     * @return ?string
     */
    public function getParkerConnectedLineNum(): ?string
    {
        return $this->getKey('ParkerConnectedLineNum');
    }

    /**
     * Returns key: 'ParkerConnectedLineName'.
     *
     * @return ?string
     */
    public function getParkerConnectedLineName(): ?string
    {
        return $this->getKey('ParkerConnectedLineName');
    }

    /**
     * Returns key: 'ParkerAccountCode'.
     *
     * @return ?string
     */
    public function getParkerAccountCode(): ?string
    {
        return $this->getKey('ParkerAccountCode');
    }

    /**
     * Returns key: 'ParkerContext'.
     *
     * @return ?string
     */
    public function getParkerContext(): ?string
    {
        return $this->getKey('ParkerContext');
    }

    /**
     * Returns key: 'ParkerExten'.
     *
     * @return ?string
     */
    public function getParkerExten(): ?string
    {
        return $this->getKey('ParkerExten');
    }

    /**
     * Returns key: 'ParkerPriority'.
     *
     * @return ?string
     */
    public function getParkerPriority(): ?string
    {
        return $this->getKey('ParkerPriority');
    }

    /**
     * Returns key: 'ParkerUniqueid'.
     *
     * @return ?string
     */
    public function getParkerUniqueid(): ?string
    {
        return $this->getKey('ParkerUniqueid');
    }

    /**
     * Returns key: 'RetrieverChannel'.
     *
     * @return ?string
     */
    public function getRetrieverChannel(): ?string
    {
        return $this->getKey('RetrieverChannel') ?: $this->getKey('From');
    }

    /**
     * Returns key: 'RetrieverChannelState'.
     *
     * @return ?string
     */
    public function getRetrieverChannelState(): ?string
    {
        return $this->getKey('RetrieverChannelState');
    }

    /**
     * Returns key: 'RetrieverChannelStateDesc'.
     *
     * @return ?string
     */
    public function getRetrieverChannelStateDesc(): ?string
    {
        return $this->getKey('RetrieverChannelStateDesc');
    }

    /**
     * Returns key: 'RetrieverCallerIDNum'.
     *
     * @return ?string
     */
    public function getRetrieverCallerIDNum(): ?string
    {
        return $this->getKey('RetrieverCallerIDNum');
    }

    /**
     * Returns key: 'RetrieverCallerIDName'.
     *
     * @return ?string
     */
    public function getRetrieverCallerIDName(): ?string
    {
        return $this->getKey('RetrieverCallerIDName');
    }

    /**
     * Returns key: 'RetrieverConnectedLineNum'.
     *
     * @return ?string
     */
    public function getRetrieverConnectedLineNum(): ?string
    {
        return $this->getKey('RetrieverConnectedLineNum');
    }

    /**
     * Returns key: 'RetrieverConnectedLineName'.
     *
     * @return ?string
     */
    public function getRetrieverConnectedLineName(): ?string
    {
        return $this->getKey('RetrieverConnectedLineName');
    }

    /**
     * Returns key: 'RetrieverAccountCode'.
     *
     * @return ?string
     */
    public function getRetrieverAccountCode(): ?string
    {
        return $this->getKey('RetrieverAccountCode');
    }

    /**
     * Returns key: 'RetrieverContext'.
     *
     * @return ?string
     */
    public function getRetrieverContext(): ?string
    {
        return $this->getKey('RetrieverContext');
    }

    /**
     * Returns key: 'RetrieverExten'.
     *
     * @return ?string
     */
    public function getRetrieverExten(): ?string
    {
        return $this->getKey('RetrieverExten');
    }

    /**
     * Returns key: 'RetrieverPriority'.
     *
     * @return ?string
     */
    public function getRetrieverPriority(): ?string
    {
        return $this->getKey('RetrieverPriority');
    }

    /**
     * Returns key: 'RetrieverUniqueid'.
     *
     * @return ?string
     */
    public function getRetrieverUniqueid(): ?string
    {
        return $this->getKey('RetrieverUniqueid');
    }
}
