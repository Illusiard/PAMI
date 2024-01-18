<?php
/**
 * Event triggered for a QueueSummary action.
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
 * Event triggered for a QueueSummary action.
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
class QueueSummaryEvent extends EventMessage
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
     * Returns key: 'LoggedIn'.
     *
     * @return ?string
     */
    public function getLoggedIn(): ?string
    {
        return $this->getKey('LoggedIn');
    }

    /**
     * Returns key: 'Available'.
     *
     * @return ?string
     */
    public function getAvailable(): ?string
    {
        return $this->getKey('Available');
    }

    /**
     * Returns key: 'Callers'.
     *
     * @return ?string
     */
    public function getCallers(): ?string
    {
        return $this->getKey('Callers');
    }

    /**
     * Returns key: 'HoldTime'.
     *
     * @return ?int
     */
    public function getHoldTime(): ?int
    {
        return (int)$this->getKey('HoldTime') ?: null;
    }

    /**
     * Returns key: 'LongestHoldTime'.
     *
     * @return ?int
     */
    public function getLongestHoldTime(): ?int
    {
        return (int)$this->getKey('LongestHoldTime') ?: null;
    }
}
