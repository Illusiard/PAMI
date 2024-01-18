<?php
/**
 * Event triggered when a dial action has started.
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
 * Event triggered when a dial action has started.
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
class DialBeginEvent extends EventMessage
{
    /**
     * Returns key: 'DestChannel'.
     *
     * @return ?string
     */
    public function getDestChannel(): ?string
    {
        return $this->getKey('DestChannel');
    }

    /**
     * Returns key: 'DestChannelState'.
     *
     * @return ?string
     */
    public function getDestChannelState(): ?string
    {
        return $this->getKey('DestChannelState');
    }

    /**
     * Returns key: 'DestChannelStateDesc'.
     *
     * @return ?string
     */
    public function getDestChannelStateDesc(): ?string
    {
        return $this->getKey('DestChannelStateDesc');
    }

    /**
     * Returns key: 'DestCallerIDNum'.
     *
     * @return ?string
     */
    public function getDestCallerIDNum(): ?string
    {
        return $this->getKey('DestCallerIDNum');
    }

    /**
     * Returns key: 'DestCallerIDName'.
     *
     * @return ?string
     */
    public function getDestCallerIDName(): ?string
    {
        return $this->getKey('DestCallerIDName');
    }

    /**
     * Returns key: 'DestConnectedLineNum'.
     *
     * @return ?string
     */
    public function getDestConnectedLineNum(): ?string
    {
        return $this->getKey('DestConnectedLineNum');
    }

    /**
     * Returns key: 'DestConnectedLineName'.
     *
     * @return ?string
     */
    public function getDestConnectedLineName(): ?string
    {
        return $this->getKey('DestConnectedLineName');
    }

    /**
     * Returns key: 'DestAccountCode'.
     *
     * @return ?string
     */
    public function getDestAccountCode(): ?string
    {
        return $this->getKey('DestAccountCode');
    }

    /**
     * Returns key: 'DestContext'.
     *
     * @return ?string
     */
    public function getDestContext(): ?string
    {
        return $this->getKey('DestContext');
    }

    /**
     * Returns key: 'DestExten'.
     *
     * @return ?string
     */
    public function getDestExten(): ?string
    {
        return $this->getKey('DestExten');
    }

    /**
     * Returns key: 'DestPriority'.
     *
     * @return ?string
     */
    public function getDestPriority(): ?string
    {
        return $this->getKey('DestPriority');
    }

    /**
     * Returns key: 'DestUniqueid'.
     *
     * @return ?string
     */
    public function getDestUniqueid(): ?string
    {
        return $this->getKey('DestUniqueid');
    }

    /**
     * Returns key: 'DialStatus'.
     *
     * @return ?string
     */
    public function getDialStatus(): ?string
    {
        return $this->getKey('DialStatus');
    }

    /**
     * Returns key: 'DialString'.
     *
     * @return ?string
     */
    public function getDialString(): ?string
    {
        return $this->getKey('DialString');
    }
}
