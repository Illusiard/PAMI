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
class QueueParamsEvent extends EventMessage
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
     * Returns key: 'Max'.
     *
     * @return ?int
     */
    public function getMax(): ?int
    {
        return (int)$this->getKey('Max');
    }

    /**
     * Returns key: 'Strategy'.
     *
     * @return ?string
     */
    public function getStrategy(): ?string
    {
        return $this->getKey('Strategy');
    }

    /**
     * Returns key: 'Calls'.
     *
     * @return ?int
     */
    public function getCalls(): ?int
    {
        return (int)$this->getKey('Calls');
    }

    /**
     * Returns key: 'HoldTime'.
     *
     * @return ?int
     */
    public function getHoldTime(): ?int
    {
        return (int)$this->getKey('HoldTime');
    }

    /**
     * Returns key: 'Completed'.
     *
     * @return ?int
     */
    public function getCompleted(): ?int
    {
        return (int)$this->getKey('Completed');
    }

    /**
     * Returns key: 'Abandoned'.
     *
     * @return ?int
     */
    public function getAbandoned(): ?int
    {
        return (int)$this->getKey('Abandoned');
    }

    /**
     * Returns key: 'ServiceLevel'.
     *
     * @return ?int
     */
    public function getServiceLevel(): ?int
    {
        return (int)$this->getKey('ServiceLevel');
    }

    /**
     * Returns key: 'ServiceLevelPerf'.
     *
     * @return float
     */
    public function getServiceLevelPerf(): float
    {
        return (float)$this->getKey('ServiceLevelPerf');
    }

    /**
     * Returns key: 'Weight'.
     *
     * @return ?int
     */
    public function getWeight(): ?int
    {
        return (int)$this->getKey('Weight');
    }
}
