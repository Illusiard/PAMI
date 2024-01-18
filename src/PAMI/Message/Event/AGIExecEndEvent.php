<?php
/**
 * Event triggered when a received AGI command completes processing.
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
 * Event triggered when a received AGI command completes processing.
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
class AGIExecEndEvent extends EventMessage
{
    /**
     * Returns key: 'Command'.
     *
     * @return ?string
     */
    public function getCommand(): ?string
    {
        return $this->getKey('Command');
    }

    /**
     * Returns key: 'CommandId'.
     *
     * @return ?string
     */
    public function getCommandId(): ?string
    {
        return $this->getKey('CommandId');
    }

    /**
     * Returns key: 'ResultCode'.
     *
     * @return ?string
     */
    public function getResultCode(): ?string
    {
        return $this->getKey('ResultCode');
    }

    /**
     * Returns key: 'Result'.
     *
     * @return ?string
     */
    public function getResult(): ?string
    {
        return $this->getKey('Result');
    }
}
