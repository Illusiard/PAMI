<?php
/**
 * Event triggered when an extension is masqued??
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
 * Event triggered when an extension is masqued??
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
class MasqueradeEvent extends EventMessage
{
    /**
     * Returns key: 'Clone'.
     *
     * @return ?string
     */
    public function getClone(): ?string
    {
        return $this->getKey('Clone');
    }

    /**
     * Returns key: 'CloneState'.
     *
     * @return ?string
     */
    public function getCloneState(): ?string
    {
        return $this->getKey('CloneState');
    }
    /**
     * Returns key: 'Original'.
     *
     * @return ?string
     */
    public function getOriginal(): ?string
    {
        return $this->getKey('Original');
    }

    /**
     * Returns key: 'OriginalState'.
     *
     * @return ?string
     */
    public function getOriginalState(): ?string
    {
        return $this->getKey('OriginalState');
    }
}
