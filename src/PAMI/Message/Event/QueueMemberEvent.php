<?php
/**
 * Event triggered for a QueueStatus action.
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
 * Event triggered for a QueueStatus action.
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
class QueueMemberEvent extends EventMessage
{
    /**
     * Returns key: 'Queue'.
     *
     * @return ?string
     */
    public function getQueue(): ?string
    {
        return $this->getKey('Queue');
    }

    /**
     * Returns key: 'Location'.
     *
     * @return ?string
     */
    public function getLocation(): ?string
    {
        return $this->getKey('Location');
    }

    /**
     * Returns key: 'MemberName'.
     *
     * @return ?string
     */
    public function getMemberName(): ?string
    {
        return $this->getKey('Name');
    }

    /**
     * Returns key: 'Membership'.
     *
     * @return ?string
     */
    public function getMembership(): ?string
    {
        return $this->getKey('Membership');
    }

    /**
     * Returns key: 'Penalty'.
     *
     * @return ?int
     */
    public function getPenalty(): ?int
    {
        return (int)$this->getKey('Penalty') ?: null;
    }

    /**
     * Returns key: 'CallsTaken'.
     *
     * @return ?int
     */
    public function getCallsTaken(): ?int
    {
        return (int)$this->getKey('CallsTaken') ?: null;
    }

    /**
     * Returns key: 'Status'.
     *
     * @return ?int
     */
    public function getStatus(): ?int
    {
        return (int)$this->getKey('Status') ?: null;
    }

    /**
     * Returns key: 'Pause'.
     *
     * @return bool
     */
    public function getPaused(): bool
    {
        return (int)$this->getKey('Paused') !== 0;
    }
}
