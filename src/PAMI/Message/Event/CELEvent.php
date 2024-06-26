<?php
/**
 * Event triggered when a CEL log message is generated
 *
 * PHP Version 7.4
 *
 * @category   Pami
 * @package    Message
 * @subpackage Event
 * @author     Jacob Kiers <jacob@alphacomm.nl>
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
 * Event triggered when a CEL log message is generated
 *
 * PHP Version 7.4
 *
 * @category   Pami
 * @package    Message
 * @subpackage Event
 * @author     Jacob Kiers <jacob@alphacomm.nl>
 * @license    http://marcelog.github.com/PAMI/ Apache License 2.0
 * @link       http://marcelog.github.com/PAMI/
 */
class CELEvent extends EventMessage
{
    /**
     * Returns key: 'AMAFlags'.
     *
     * @return ?string
     */
    public function getAMAFlags(): ?string
    {
        return $this->getKey('AMAFlags');
    }


    /**
     * Returns key: 'AppData'.
     *
     * @return ?string
     */
    public function getAppData(): ?string
    {
        return $this->getKey('AppData');
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
     * Returns key: 'CallerIDani'.
     *
     * @return ?string
     */
    public function getCallerIDani(): ?string
    {
        return $this->getKey('CallerIDani');
    }


    /**
     * Returns key: 'CallerIDdnid'.
     *
     * @return ?string
     */
    public function getCallerIDdnid(): ?string
    {
        return $this->getKey('CallerIDdnid');
    }


    /**
     * Returns key: 'CallerIDname'.
     *
     * @return ?string
     */
    public function getCallerIDname(): ?string
    {
        return $this->getKey('CallerIDname');
    }


    /**
     * Returns key: 'CallerIDnum'.
     *
     * @return ?string
     */
    public function getCallerIDnum(): ?string
    {
        return $this->getKey('CallerIDnum');
    }


    /**
     * Returns key: 'CallerIDrdnis'.
     *
     * @return ?string
     */
    public function getCallerIDrdnis(): ?string
    {
        return $this->getKey('CallerIDrdnis');
    }


    /**
     * Returns key: 'Event'.
     *
     * @return ?string
     */
    public function getEvent(): ?string
    {
        return $this->getKey('Event');
    }


    /**
     * Returns key: 'EventName'.
     *
     * @return ?string
     */
    public function getEventName(): ?string
    {
        return $this->getKey('EventName');
    }


    /**
     * Returns key: 'EventTime'.
     *
     * @return ?string
     */
    public function getEventTime(): ?string
    {
        return $this->getKey('EventTime');
    }


    /**
     * Returns key: 'Extra'.
     *
     * @return ?string
     */
    public function getExtra(): ?string
    {
        return $this->getKey('Extra');
    }

    /**
     * Returns key: 'Peer'.
     *
     * @return ?string
     */
    public function getPeer(): ?string
    {
        return $this->getKey('Peer');
    }


    /**
     * Returns key: 'PeerAccount'.
     *
     * @return ?string
     */
    public function getPeerAccount(): ?string
    {
        return $this->getKey('PeerAccount');
    }


    /**
     * Returns key: 'Timestamp'.
     *
     * @return ?string
     */
    public function getTimestamp(): ?string
    {
        return $this->getKey('Timestamp');
    }


    /**
     * Returns key: 'Userfield'.
     *
     * @return ?string
     */
    public function getUserfield(): ?string
    {
        return $this->getKey('Userfield');
    }
}
