<?php

namespace PAMI\Message\Event;

class ContactStatusDetailEvent extends EventMessage
{
    /**
     * The AoR that owns this contact.
     * 
     * @return ?string
     */
    public function getAOR(): ?string
    {
        return $this->getKey('AOR');
    }

    /**
     * This contact's URI.
     * 
     * @return ?string
     */
    public function getURI(): ?string
    {
        return $this->getKey('URI');
    }

    /**
     * This contact's status.
     * 
     * @return ?string
     */
    public function getStatus(): ?string
    {
        return $this->getKey('Status');
    }

    /**
     * The round trip time in microseconds.
     * 
     * @return ?string
     */
    public function getRoundTripUSec(): ?int
    {
        return $this->getKey('RoundTripUSec');
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

    /**
     * Content of the User-Agent header in REGISTER request
     * 
     * @return ?string
     */
    public function getUserAgent(): ?string
    {
        return $this->getKey('UserAgent');
    }

    /**
     * Absolute time that this contact is no longer valid after
     * 
     * @return ?int
     */
    public function getRegExpire(): ?int
    {
        return $this->getKey('RegExpire');
    }

    /**
     * IP address:port of the last Via header in REGISTER request. Will only appear in the event if available.
     * 
     * @return ?string
     */
    public function getViaAddress(): ?string
    {
        return $this->getKey('ViaAddress');
    }

    /**
     * Content of the Call-ID header in REGISTER request. Will only appear in the event if available.
     * 
     * @return ?string
     */
    public function getCallID(): ?string
    {
        return $this->getKey('CallID');
    }

    /**
     * The sorcery ID of the contact.
     * 
     * @return ?string
     */
    public function getID(): ?string
    {
        return $this->getKey('ID');
    }

    /**
     * A boolean indicating whether qualify should be authenticated.
     * 
     * @return ?string
     */
    public function getAuthenticateQualify(): ?string
    {
        return $this->getKey('AuthenticateQualify');
    }

    /**
     * The contact's outbound proxy.
     * 
     * @return ?string
     */
    public function getOutboundProxy(): ?string
    {
        return $this->getKey('OutboundProxy');
    }

    /**
     * The Path header received on the REGISTER.
     * 
     * @return ?string
     */
    public function getPath(): ?string
    {
        return $this->getKey('Path');
    }

    /**
     * The interval in seconds at which the contact will be qualified.
     * 
     * @return ?int
     */
    public function getQualifyFrequency(): ?int
    {
        return $this->getKey('QualifyFrequency');
    }

    /**
     * The elapsed time in decimal seconds after which an OPTIONS message is sent before the contact is considered unavailable. 
     * 
     * @return ?float
     */
    public function getQualifyTimeout(): ?float
    {
        return $this->getKey('QualifyTimeout');
    }
}