<?php
/**
 * This is a generic event received from ami.
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

use PAMI\Message\IncomingMessage;

/**
 * This is a generic event received from ami.
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
abstract class EventMessage extends IncomingMessage
{
    /**
     * Returns key: 'Event'.
     *
     * @return ?string
     */
    public function getName(): ?string
    {
        return $this->getKey('Event');
    }

    /**
     * Returns key: 'Privilege'.
     *
     * @return ?string
     */
    public function getPrivilege(): ?string
    {
        return $this->getKey('Privilege');
    }


    /**
     * Returns key: 'Channel'.
     *
     * @return ?string
     */
    public function getChannel(): ?string
    {
        return $this->getKey('Channel');
    }


    /**
     * Returns key: 'ChannelState'.
     *
     * @return ?string
     */
    public function getChannelState(): ?string
    {
        return $this->getKey('ChannelState');
    }

    /**
     * Returns key: 'ChannelStateDesc'.
     *
     * @return ?string
     */
    public function getChannelStateDesc(): ?string
    {
        return $this->getKey('ChannelStateDesc');
    }

    /**
     * Returns key: 'CallerIDNum'.
     *
     * @return ?string
     */
    public function getCallerIDNum(): ?string
    {
        return $this->getKey('CallerIDNum');
    }

    /**
     * Returns key: 'CallerIDName'.
     *
     * @return ?string
     */
    public function getCallerIDName(): ?string
    {
        return $this->getKey('CallerIDName');
    }

    /**
     * Returns key: 'ConnectedLineNum'.
     *
     * @return ?string
     */
    public function getConnectedLineNum(): ?string
    {
        return $this->getKey('ConnectedLineNum');
    }

    /**
     * Returns key: 'ConnectedLineName'.
     *
     * @return ?string
     */
    public function getConnectedLineName(): ?string
    {
        return $this->getKey('ConnectedLineName');
    }

    /**
     * Returns key: 'AccountCode'.
     *
     * @return ?string
     */
    public function getAccountCode(): ?string
    {
        return $this->getKey('AccountCode');
    }

    /**
     * Returns key: 'Context'.
     *
     * @return ?string
     */
    public function getContext(): ?string
    {
        return $this->getKey('Context');
    }

    /**
     * Returns key: 'Exten'.
     *
     * @return ?string
     */
    public function getExten(): ?string
    {
        return $this->getKey('Exten');
    }

    /**
     * Returns key: 'Priority'.
     *
     * @return ?string
     */
    public function getPriority(): ?string
    {
        return $this->getKey('Priority');
    }

    /**
     * Returns key: 'Uniqueid'.
     *
     * @return ?string
     */
    public function getUniqueid(): ?string
    {
        return $this->getKey('Uniqueid');
    }

    /**
     * Returns key: 'Linkedid'.
     *
     * @return ?string
     */
    public function getLinkedid(): ?string
    {
        return $this->getKey('Linkedid');
    }
}
