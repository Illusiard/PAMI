<?php

namespace PAMI\Message\Event;

abstract class BaseAGIExecEvent extends EventMessage
{
    /**
     * Returns key: 'Command'.
     *
     * @return ?string
     */
    public function getCommand(): ?string
    {
        return $this->getKey('Command');
    }

    /**
     * Returns key: 'CommandId'.
     *
     * @return ?string
     */
    public function getCommandId(): ?string
    {
        return $this->getKey('CommandId');
    }
}