<?php

namespace PAMI\Message\Event;

class HangupHandlerPushEvent extends EventMessage
{
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
     * Returns key: 'Handler'.
     *
     * @return ?string
     */
    public function getHandler(): ?string
    {
        return $this->getKey('Handler');
    }
}