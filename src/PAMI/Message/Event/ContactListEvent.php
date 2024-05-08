<?php

namespace PAMI\Message\Event;

/**
 * Event triggered for the end of the list when an action QueueSummary
 * is issued.
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
class ContactListEvent extends EventMessage
{
    /**
     * The object's type. This will always be 'contact'.
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
     * IP address of the last Via header in REGISTER request. Will only appear in the event if available.
     * 
     * @return ?string
     */
    public function getViaAddr(): ?string
    {
        return $this->getKey('ViaAddr');
    }

    /**
     * Port number of the last Via header in REGISTER request. Will only appear in the event if available.
     * 
     * @return ?string
     */
    public function getViaPort(): ?string
    {
        return $this->getKey('ViaPort');
    }

    /**
     * The elapsed time in decimal seconds after which an OPTIONS message is sent before the contact is considered unavailable.
     * 
     * @return ?string
     */
    public function getQualifyTimeout(): ?string
    {
        return $this->getKey('QualifyTimeout');
    }

    /**
     * Content of the Call-ID header in REGISTER request. Will only appear in the event if available.
     * 
     * @return ?string
     */
    public function getCallId(): ?string
    {
        return $this->getKey('CallId');
    }

    /**
     * Asterisk Server name.
     * 
     * @return ?string
     */
    public function getRegServer(): ?string
    {
        return $this->getKey('RegServer');
    }

    /**
     * If true delete the contact on Asterisk restart/boot.
     * 
     * @return ?string
     */
    public function getPruneOnBoot(): ?string
    {
        return $this->getKey('PruneOnBoot');
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
     * The name of the endpoint associated with this information.
     * 
     * @return ?string
     */
    public function getEndpoint(): ?string
    {
        return $this->getKey('Endpoint');
    }

    /**
     * A boolean indicating whether a qualify should be authenticated.
     * 
     * @return ?string
     */
    public function getAuthenticateQualify(): ?string
    {
        return $this->getKey('AuthenticateQualify');
    }

    /**
     * This contact's URI.
     * 
     * @return ?string
     */
    public function getUri(): ?string
    {
        return $this->getKey('Uri');
    }

    /**
     * The interval in seconds at which the contact will be qualified.
     * 
     * @return ?string
     */
    public function getQualifyFrequency(): ?string
    {
        return $this->getKey('QualifyFrequency');
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
     * @return ?string
     */
    public function getExpirationTime(): ?string
    {
        return $this->getKey('ExpirationTime');
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
    public function getRoundtripUsec(): ?string
    {
        return $this->getKey('RoundtripUsec');
    }
}