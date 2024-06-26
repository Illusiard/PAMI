<?php
/**
 * Event triggered when linking (connecting) two channels.
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
 * Event triggered when linking (connecting) two channels.
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
class LinkEvent extends EventMessage
{
    /**
     * Returns key: 'Channel1'.
     *
     * @return ?string
     */
    public function getChannel1(): ?string
    {
        return $this->getKey('Channel1');
    }

    /**
     * Returns key: 'Channel2'.
     *
     * @return ?string
     */
    public function getChannel2(): ?string
    {
        return $this->getKey('Channel2');
    }

    /**
     * Returns key: 'CallerID1'.
     *
     * @return ?string
     */
    public function getCallerID1(): ?string
    {
        return $this->getKey('CallerID1');
    }

    /**
     * Returns key: 'CallerID2'.
     *
     * @return ?string
     */
    public function getCallerID2(): ?string
    {
        return $this->getKey('CallerID2');
    }

    /**
     * Returns key: 'UniqueID1'.
     *
     * @return ?string
     */
    public function getUniqueID1(): ?string
    {
        return $this->getKey('UniqueID1');
    }

    /**
     * Returns key: 'UniqueID2'.
     *
     * @return ?string
     */
    public function getUniqueID2(): ?string
    {
        return $this->getKey('UniqueID2');
    }
}
