<?php

namespace PAMI\Message\Event;

class DialStateEvent extends EventMessage
{
    /**
     * Returns key 'Language'.
     *
     * @return ?string
     */
    public function getLanguage(): ?string
    {
        return $this->getKey('Language');
    }


    /**
     * Returns key 'DestChannel'.
     *
     * @return ?string
     */
    public function getDestChannel(): ?string
    {
        return $this->getKey('DestChannel');
    }

    /**
     * Returns key 'DestChannelState'.
     *
     * @return ?int
     */
    public function getDestChannelState(): ?int
    {
        return $this->getKey('DestChannelState');
    }

    /**
     * Returns key 'DestChannelStateDesc'.
     *
     * @return ?string
     */
    public function getDestChannelStateDesc(): ?string
    {
        return $this->getKey('DestChannelStateDesc');
    }

    /**
     * Returns key 'DestCallerIDNum'.
     *
     * @return ?string
     */
    public function getDestCallerIDNum(): ?string
    {
        return $this->getKey('DestCallerIDNum');
    }

    /**
     * Returns key 'DestCallerIDName'.
     *
     * @return ?string
     */
    public function getDestCallerIDName(): ?string
    {
        return $this->getKey('DestCallerIDName');
    }

    /**
     * Returns key 'DestConnectedLineNum'.
     *
     * @return ?string
     */
    public function getDestConnectedLineNum(): ?string
    {
        return $this->getKey('DestConnectedLineNum');
    }

    /**
     * Returns key 'DestConnectedLineName'.
     *
     * @return ?string
     */
    public function getDestConnectedLineName(): ?string
    {
        return $this->getKey('DestConnectedLineName');
    }

    /**
     * Returns key 'DestLanguage'.
     *
     * @return ?string
     */
    public function getDestLanguage(): ?string
    {
        return $this->getKey('DestLanguage');
    }

    /**
     * Returns key 'DestAccountCode'.
     *
     * @return ?string
     */
    public function getDestAccountCode(): ?string
    {
        return $this->getKey('DestAccountCode');
    }

    /**
     * Returns key 'DestContext'.
     *
     * @return ?string
     */
    public function getDestContext(): ?string
    {
        return $this->getKey('DestContext');
    }

    /**
     * Returns key 'DestExten'.
     *
     * @return ?string
     */
    public function getDestExten(): ?string
    {
        return $this->getKey('DestExten');
    }

    /**
     * Returns key 'DestPriority'.
     *
     * @return ?int
     */
    public function getDestPriority(): ?int
    {
        return $this->getKey('DestPriority');
    }

    /**
     * Returns key 'DestUniqueid'.
     *
     * @return ?string
     */
    public function getDestUniqueid(): ?string
    {
        return $this->getKey('DestUniqueid');
    }

    /**
     * Returns key 'DestLinkedid'.
     *
     * @return ?string
     */
    public function getDestLinkedid(): ?string
    {
        return $this->getKey('DestLinkedid');
    }

    /**
     * Returns key 'DialStatus'.
     *
     * @return ?string
     */
    public function getDialStatus(): ?string
    {
        return $this->getKey('DialStatus');
    }

    /**
     * Returns key 'Forward'.
     *
     * @return ?string
     */
    public function getForward(): ?string
    {
        return $this->getKey('Forward');
    }
}