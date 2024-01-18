<?php
/**
 * Event triggered when a call is transfered.
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
 * Event triggered when a call is transfered.
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
class TransferEvent extends EventMessage
{
    /**
     * Returns key: 'TransferMethod'.
     *
     * @return ?string
     */
    public function getTransferMethod(): ?string
    {
        return $this->getKey('TransferMethod');
    }

    /**
     * Returns key: 'TransferType'.
     *
     * @return ?string
     */
    public function getTransferType(): ?string
    {
        return $this->getKey('TransferType');
    }

    /**
     * Returns key: 'TargetChannel'.
     *
     * @return ?string
     */
    public function getTargetChannel(): ?string
    {
        return $this->getKey('TargetChannel');
    }

    /**
     * Returns key: 'SIP-Callid'.
     *
     * @return ?string
     */
    public function getSipCallID(): ?string
    {
        return $this->getKey('SIP-Callid');
    }

    /**
     * Returns key: 'TargetUniqueID'.
     *
     * @return ?string
     */
    public function getTargetUniqueID(): ?string
    {
        return $this->getKey('TargetUniqueid');
    }

    /**
     * Returns key: 'TransferExten'.
     *
     * @return ?string
     */
    public function getTransferExten(): ?string
    {
        return $this->getKey('TransferExten');
    }

    /**
     * Returns key: 'TransferContext'.
     *
     * @return ?string
     */
    public function getTransferContext(): ?string
    {
        return $this->getKey('TransferContext');
    }
}
