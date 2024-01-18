<?php
/**
 * Event triggered when issuing a VoicemailUsersList action.
 *
 * PHP Version 7.4
 *
 * @category   Pami
 * @package    Message
 * @subpackage Action
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
 * Event triggered when issuing a VoicemailUsersList action.
 *
 * PHP Version 7.4
 *
 * @category   Pami
 * @package    Message
 * @subpackage Action
 * @author     Marcelo Gornstein <marcelog@gmail.com>
 * @author     Boltunov Artem <dev@bluescarf.ru>
 * @license    http://marcelog.github.com/PAMI/ Apache License 2.0
 * @link       http://marcelog.github.com/PAMI/
 */
class VoicemailUserEntryEvent extends EventMessage
{
    /**
     * Returns key: 'NewMessageCount'.
     *
     * @return ?string
     */
    public function getNewMessageCount(): ?string
    {
        return $this->getKey('NewMessageCount');
    }

    /**
     * Returns key: 'MaxMessageLength'.
     *
     * @return ?string
     */
    public function getMaxMessageLength(): ?string
    {
        return $this->getKey('MaxMessageLength');
    }

    /**
     * Returns key: 'MaxMessageCount'.
     *
     * @return ?string
     */
    public function getMaxMessageCount(): ?string
    {
        return $this->getKey('MaxMessageCount');
    }

    /**
     * Returns key: 'CallOperator'.
     *
     * @return ?string
     */
    public function getCallOperator(): ?string
    {
        return $this->getKey('CallOperator');
    }

    /**
     * Returns key: 'CanReview'.
     *
     * @return ?string
     */
    public function getCanReview(): ?string
    {
        return $this->getKey('CanReview');
    }

    /**
     * Returns key: 'VolumeGain'.
     *
     * @return ?string
     */
    public function getVolumeGain(): ?string
    {
        return $this->getKey('VolumeGain');
    }

    /**
     * Returns key: 'DeleteMessage'.
     *
     * @return ?string
     */
    public function getDeleteMessage(): ?string
    {
        return $this->getKey('DeleteMessage');
    }

    /**
     * Returns key: 'AttachmentFormat'.
     *
     * @return ?string
     */
    public function getAttachmentFormat(): ?string
    {
        return $this->getKey('AttachmentFormat');
    }

    /**
     * Returns key: 'AttachMessage'.
     *
     * @return ?string
     */
    public function getAttachMessage(): ?string
    {
        return $this->getKey('AttachMessage');
    }

    /**
     * Returns key: 'SayCID'.
     *
     * @return ?string
     */
    public function getSayCID(): ?string
    {
        return $this->getKey('SayCID');
    }

    /**
     * Returns key: 'SayEnvelope'.
     *
     * @return ?string
     */
    public function getSayEnvelope(): ?string
    {
        return $this->getKey('SayEnvelope');
    }

    /**
     * Returns key: 'SayDurationMin'.
     *
     * @return ?string
     */
    public function getSayDurationMin(): ?string
    {
        return $this->getKey('SayDurationMin');
    }

    /**
     * Returns key: 'ExitContext'.
     *
     * @return ?string
     */
    public function getExitContext(): ?string
    {
        return $this->getKey('ExitContext');
    }

    /**
     * Returns key: 'DialOut'.
     *
     * @return ?string
     */
    public function getDialOut(): ?string
    {
        return $this->getKey('DialOut');
    }

    /**
     * Returns key: 'Callback'.
     *
     * @return ?string
     */
    public function getCallback(): ?string
    {
        return $this->getKey('Callback');
    }

    /**
     * Returns key: 'Timezone'.
     *
     * @return ?string
     */
    public function getTimezone(): ?string
    {
        return $this->getKey('Timezone');
    }

    /**
     * Returns key: 'Language'.
     *
     * @return ?string
     */
    public function getLanguage(): ?string
    {
        return $this->getKey('Language');
    }

    /**
     * Returns key: 'MailCommand'.
     *
     * @return ?string
     */
    public function getMailCommand(): ?string
    {
        return $this->getKey('MailCommand');
    }

    /**
     * Returns key: 'ServerEmail'.
     *
     * @return ?string
     */
    public function getServerEmail(): ?string
    {
        return $this->getKey('ServerEmail');
    }

    /**
     * Returns key: 'Pager'.
     *
     * @return ?string
     */
    public function getPager(): ?string
    {
        return $this->getKey('Pager');
    }

    /**
     * Returns key: 'Email'.
     *
     * @return ?string
     */
    public function getEmail(): ?string
    {
        return $this->getKey('Email');
    }

    /**
     * Returns key: 'Fullname'.
     *
     * @return ?string
     */
    public function getFullname(): ?string
    {
        return $this->getKey('Fullname');
    }

    /**
     * Returns key: 'VoicemailBox'.
     *
     * @return ?string
     */
    public function getVoicemailBox(): ?string
    {
        return $this->getKey('VoicemailBox');
    }

    /**
     * Returns key: 'VmContext'.
     *
     * @return ?string
     */
    public function getVoicemailContext(): ?string
    {
        return $this->getKey('VmContext');
    }
}
