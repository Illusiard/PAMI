<?php
/**
 * Whenever a ME (GSM module) changes working state, an event is generated.
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
 * Whenever a ME (GSM module) changes working state, an event is generated.
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
class VgsmMeStateEvent extends EventMessage
{
    /**
     * Returns key: 'X-vGSM-ME-State'.
     *
     * @return ?string
     */
    public function getState(): ?string
    {
        return $this->getKey('X-vGSM-ME-State');
    }

    /**
     * Returns key: 'X-vGSM-ME-Old-State'.
     *
     * @return ?string
     */
    public function getOldState(): ?string
    {
        return $this->getKey('X-vGSM-ME-Old-State');
    }

    /**
     * Returns key: 'X-vGSM-ME-State-Change-Reason'.
     *
     * @return ?string
     */
    public function getReason(): ?string
    {
        return $this->getKey('X-vGSM-ME-State-Change-Reason');
    }
}
