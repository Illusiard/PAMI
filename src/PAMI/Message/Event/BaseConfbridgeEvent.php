<?php

namespace PAMI\Message\Event;

abstract class BaseConfbridgeEvent extends EventMessage
{
    /**
     * Returns key: 'Conference'.
     *
     * @return ?string
     */
    public function getConference(): ?string
    {
        return $this->getKey('Conference');
    }

    /**
     * Returns key: 'Admin'.
     *
     * @return ?string
     */
    public function getAdmin(): ?string
    {
        return $this->getKey('Admin');
    }
}