<?php
/**
 * Event triggered when a channel leaves a bridge.
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
 * Event triggered when a channel leaves a bridge.
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
class BridgeLeaveEvent extends EventMessage
{
    /**
     * Returns key: 'BridgeUniqueid'.
     *
     * @return ?string
     */
    public function getBridgeUniqueid(): ?string
    {
        return $this->getKey('BridgeUniqueid');
    }

    /**
     * Returns key: 'BridgeType'.
     *
     * @return ?string
     */
    public function getBridgeType(): ?string
    {
        return $this->getKey('BridgeType');
    }

    /**
     * Returns key: 'BridgeTechnology'.
     *
     * @return ?string
     */
    public function getBridgeTechnology(): ?string
    {
        return $this->getKey('BridgeTechnology');
    }

    /**
     * Returns key: 'BridgeCreator'.
     *
     * @return ?string
     */
    public function getBridgeCreator(): ?string
    {
        return $this->getKey('BridgeCreator');
    }

    /**
     * Returns key: 'BridgeName'.
     *
     * @return ?string
     */
    public function getBridgeName(): ?string
    {
        return $this->getKey('BridgeName');
    }

    /**
     * Returns key: 'BridgeNumChannels'.
     *
     * @return ?string
     */
    public function getBridgeNumChannels(): ?string
    {
        return $this->getKey('BridgeNumChannels');
    }

}
