<?php

namespace PAMI\Message\Event;

class IdentifyDetailEvent extends EventMessage
{
    /**
     * The object's type. This will always be 'identify'.
     * 
     * @return ?string
     */
    public function getObjectType(): ?string
    {
        return $this->getKey('ObjectType');
    }

    /**
     * The name of this object.
     * 
     * @return ?string
     */
    public function getObjectName(): ?string
    {
        return $this->getKey('ObjectName');
    }

    /**
     * Name of endpoint identified
     * 
     * @return ?string
     */
    public function getEndpoint(): ?string
    {
        return $this->getKey('Endpoint');
    }

    /**
     * Perform SRV lookups for provided hostnames.
     * 
     * @return ?string
     */
    public function getSrvLookups(): ?string
    {
        return $this->getKey('SrvLookups');
    }

    /**
     * IP addresses or networks to match against.
     * 
     * @return ?string
     */
    public function getMatch(): ?string
    {
        return $this->getKey('Match');
    }

    /**
     * Header/value pair to match against.
     * 
     * @return ?string
     */
    public function getMatchHeader(): ?string
    {
        return $this->getKey('MatchHeader');
    }

    /**
     * The name of the endpoint associated with this information.
     * 
     * @return ?string
     */
    public function getEndpointName(): ?string
    {
        return $this->getKey('EndpointName');
    }
}