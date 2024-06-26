<?php
/**
 * Event triggered when an async agi is executed.
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
 * Event triggered when an async agi is executed.
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
class AsyncAGIEvent extends EventMessage
{
    /**
     * Returns key: 'SubEvent'.
     *
     * @return ?string
     */
    public function getSubEvent(): ?string
    {
        return $this->getKey('SubEvent');
    }

    /**
     * Returns the original environment received with this event.
     *
     * @return ?string
     */
    public function getEnvironment(): ?string
    {
        return $this->getKey('Env');
    }

    /**
     * Returns the agi result for the command issued.
     *
     * @return ?string
     */
    public function getResult(): ?string
    {
        return $this->getKey('Result');
    }

    /**
     * Returns the command id associated with this event.
     *
     * @return ?string
     */
    public function getCommandId(): ?string
    {
        return $this->getKey('CommandId');
    }
    /**
     * Constructor.
     *
     * @param string $rawContent Literal message as received from ami.
     *
     * @return void
     */
    public function __construct(string $rawContent)
    {
        parent::__construct($rawContent);
        $this->setKey('Env', urldecode($this->getEnvironment()));
        $this->setKey('Result', urldecode($this->getResult()));
    }
}
