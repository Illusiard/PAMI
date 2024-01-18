<?php
/**
 * Event triggered when a channel leaves a parking lot due to reaching the time limit of being parked.
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
 * Event triggered when a channel leaves a parking lot due to reaching the time limit of being parked.
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
class ParkedCallTimeOutEvent extends EventMessage
{
    /**
     * Returns key: 'ParkeeChannel'.
     *
     * @return ?string
     */
    public function getParkeeChannel(): ?string
    {
        return $this->getKey('ParkeeChannel');
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
        return $this->getKey('ParkeeCallerIDNum');
    }

    /**
     * Returns key: 'ParkeeCallerIDName'.
     *
     * @return ?string
     */
    public function getParkeeCallerIDName(): ?string
    {
        return $this->getKey('ParkeeCallerIDName');
    }

    /**
     * Returns key: 'ParkeeConnectedLineNum'.
     *
     * @return ?string
     */
    public function getParkeeConnectedLineNum(): ?string
    {
        return $this->getKey('ParkeeConnectedLineNum');
    }

    /**
     * Returns key: 'ParkeeConnectedLineName'.
     *
     * @return ?string
     */
    public function getParkeeConnectedLineName(): ?string
    {
        return $this->getKey('ParkeeConnectedLineName');
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
        return $this->getKey('ParkeeUniqueid');
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
     * Returns key: 'ParkerDialString'.
     *
     * @return ?string
     */
    public function getParkerDialString(): ?string
    {
        return $this->getKey('ParkerDialString');
    }

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
     * Returns key: 'ParkingSpace'.
     *
     * @return ?string
     */
    public function getParkingSpace(): ?string
    {
        return $this->getKey('ParkingSpace');
    }

    /**
     * Returns key: 'ParkingTimeout'.
     *
     * @return ?string
     */
    public function getParkingTimeout(): ?string
    {
        return $this->getKey('ParkingTimeout');
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
}
