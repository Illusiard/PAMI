<?php
/**
 * Event triggered when an action CoreShowChannel is issued.
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
 * Event triggered when an action CoreShowChannel is issued.
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
class CoreShowChannelEvent extends EventMessage
{
    /**
     * Returns key: 'Extension'.
     *
     * @return ?string
     */
    public function getExtension(): ?string
    {
        return $this->getKey('Extension');
    }


    /**
     * Returns key: 'Application'.
     *
     * @return ?string
     */
    public function getApplication(): ?string
    {
        return $this->getKey('Application');
    }

    /**
     * Returns key: 'ApplicationData'.
     *
     * @return ?string
     */
    public function getApplicationData(): ?string
    {
        return $this->getKey('ApplicationData');
    }

    /**
     * Returns key: 'Duration'.
     *
     * @return ?string
     */
    public function getDuration(): ?string
    {
        return $this->getKey('Duration');
    }

    /**
     * Returns key: 'BridgedChannel'.
     *
     * @return ?string
     */
    public function getBridgedChannel(): ?string
    {
        return $this->getKey('BridgedChannel');
    }

    /**
     * Returns key: 'BridgedUniqueID'.
     *
     * @return ?string
     */
    public function getBridgedUniqueID(): ?string
    {
        return $this->getKey('BridgedUniqueID');
    }
}
