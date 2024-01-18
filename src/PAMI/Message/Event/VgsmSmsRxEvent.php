<?php
/**
 * On reception of an inbound SMS (SMS-DELIVERY) the message will also be
 * reported as a manager event, however, acknowledgment still relies on SMS
 * spooler to handle the message. This event is generated starting from 0.21.0
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
 * On reception of an inbound SMS (SMS-DELIVERY) the message will also be
 * reported as a manager event, however, acknowledgment still relies on SMS
 * spooler to handle the message. This event is generated starting from 0.21.0
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
class VgsmSmsRxEvent extends EventMessage
{
    /**
     * Returns key: 'Received'.
     *
     * @return ?string
     */
    public function getReceived(): ?string
    {
        return $this->getKey('Received');
    }

    /**
     * Returns key: 'From'.
     *
     * @return ?string
     */
    public function getFrom(): ?string
    {
        return $this->getKey('From');
    }

    /**
     * Returns key: 'Subject'.
     *
     * @return ?string
     */
    public function getSubject(): ?string
    {
        return $this->getKey('Subject');
    }

    /**
     * Returns key: 'MIME-Version'.
     *
     * @return ?string
     */
    public function getMimeVersion(): ?string
    {
        return $this->getKey('MIME-Version');
    }

    /**
     * Returns key: 'Content-Type'.
     *
     * @return ?string
     */
    public function getContentType(): ?string
    {
        return $this->getKey('Content-Type');
    }

    /**
     * Returns key: 'Content-Transfer-Encoding'.
     *
     * @return ?string
     */
    public function getContentEncoding(): ?string
    {
        return $this->getKey('Content-Transfer-Encoding');
    }

    /**
     * Returns key: 'Date'.
     *
     * @return ?string
     */
    public function getDate(): ?string
    {
        return $this->getKey('Date');
    }

    /**
     * Returns key: 'Content'.
     *
     * @return ?string
     */
    public function getContent(): ?string
    {
        return $this->getKey('Content');
    }

    /**
     * Returns key: 'X-SMS-Message-Type:'.
     *
     * @return ?string
     */
    public function getMessageType(): ?string
    {
        return $this->getKey('X-SMS-Message-Type');
    }

    /**
     * Returns key: 'X-SMS-Sender-NP'.
     *
     * @return ?string
     */
    public function getSenderNP(): ?string
    {
        return $this->getKey('X-SMS-Sender-NP');
    }

    /**
     * Returns key: 'X-SMS-Sender-TON'.
     *
     * @return ?string
     */
    public function getSenderTON(): ?string
    {
        return $this->getKey('X-SMS-Sender-TON');
    }

    /**
     * Returns key: 'X-SMS-Sender-Number'.
     *
     * @return ?string
     */
    public function getSenderNumber(): ?string
    {
        return $this->getKey('X-SMS-Sender-Number');
    }

    /**
     * Returns key: 'X-SMS-SMCC-NP'.
     *
     * @return ?string
     */
    public function getSMCCNP(): ?string
    {
        return $this->getKey('X-SMS-SMCC-NP');
    }

    /**
     * Returns key: 'X-SMS-SMCC-TON'.
     *
     * @return ?string
     */
    public function getSMCCTON(): ?string
    {
        return $this->getKey('X-SMS-SMCC-TON');
    }

    /**
     * Returns key: 'X-SMS-SMCC-Number'.
     *
     * @return ?string
     */
    public function getSMCCNumber(): ?string
    {
        return $this->getKey('X-SMS-SMCC-Number');
    }

    /**
     * Returns key: 'X-SMS-More-Messages-To-Send'.
     *
     * @return ?string
     */
    public function getMoreMessagesToSend(): ?string
    {
        return $this->getKey('X-SMS-More-Messages-To-Send');
    }

    /**
     * Returns key: 'X-SMS-Reply-Path'.
     *
     * @return ?string
     */
    public function getReplyPath(): ?string
    {
        return $this->getKey('X-SMS-Reply-Path');
    }

    /**
     * Returns key: 'XX-SMS-User-Data-Header-Indicator'.
     *
     * @return ?string
     */
    public function getDataHeaderIndicator(): ?string
    {
        return $this->getKey('X-SMS-User-Data-Header-Indicator');
    }

    /**
     * Returns key: 'X-SMS-Status-Report-Indication'.
     *
     * @return ?string
     */
    public function getStatusReportIndication(): ?string
    {
        return $this->getKey('X-SMS-Status-Report-Indication');
    }
}
