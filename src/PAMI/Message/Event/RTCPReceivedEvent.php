<?php
/**
 * Event triggered when exchanging rtp stats.
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
 * Event triggered when exchanging rtp stats.
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
class RTCPReceivedEvent extends EventMessage
{
    /**
     * Returns key: 'From'.
     *
     * @return ?string
     */
    public function getFrom(): ?string
    {
        return $this->getKey('From');
    }

    /**
     * Returns key: 'PT'.
     *
     * @return ?string
     */
    public function getPT(): ?string
    {
        return $this->getKey('PT');
    }

    /**
     * Returns key: 'ReceptionReports'.
     *
     * @return ?string
     */
    public function getReceptionReports(): ?string
    {
        return $this->getKey('ReceptionReports');
    }

    /**
     * Returns key: 'SenderSSRC'.
     *
     * @return ?string
     */
    public function getSenderSSRC(): ?string
    {
        return $this->getKey('SenderSSRC');
    }

    /**
     * Returns key: 'FractionLost'.
     *
     * @return ?string
     */
    public function getFractionLost(): ?string
    {
        return $this->getKey('FractionLost');
    }

    /**
     * Returns key: 'PacketsLost'.
     *
     * @return ?string
     */
    public function getPacketsLost(): ?string
    {
        return $this->getKey('PacketsLost');
    }

    /**
     * Returns key: 'HighestSequence'.
     *
     * @return ?string
     */
    public function getHighestSequence(): ?string
    {
        return $this->getKey('HighestSequence');
    }
    /**
     * Returns key: 'SequenceNumberCycles'.
     *
     * @return ?string
     */
    public function getSequenceNumberCycles(): ?string
    {
        return $this->getKey('SequenceNumberCycles');
    }
    /**
     * Returns key: 'IAJitter'.
     *
     * @return ?string
     */
    public function getIAJitter(): ?string
    {
        return $this->getKey('IAJitter');
    }
    /**
     * Returns key: 'LastSR'.
     *
     * @return ?string
     */
    public function getLastSR(): ?string
    {
        return $this->getKey('LastSR');
    }
    /**
     * Returns key: 'DLSR'.
     *
     * @return ?string
     */
    public function getDLSR(): ?string
    {
        return $this->getKey('DLSR');
    }
    /**
     * Returns key: 'RTT'.
     *
     * @return ?string
     */
    public function getRTT(): ?string
    {
        return $this->getKey('RTT');
    }
}
