<?php
/**
 * Event triggered when a channel updated its status.
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
 * Event triggered when a channel updated its status.
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
class ChannelUpdateEvent extends EventMessage
{
    /**
     * Returns key: 'ChannelType'.
     *
     * @return ?string
     */
    public function getChannelType(): ?string
    {
        return $this->getKey('ChannelType');
    }

    /**
     * Returns key: 'SIPcallid'.
     *
     * @return ?string
     */
    public function getSIPCallID(): ?string
    {
        return $this->getKey('SIPcallid');
    }

    /**
     * Returns key: 'SIPfullcontact'.
     *
     * @return ?string
     */
    public function getSIPFullContact(): ?string
    {
        return $this->getKey('SIPfullcontact');
    }

}
