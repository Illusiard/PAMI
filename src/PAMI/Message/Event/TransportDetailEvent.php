<?php

namespace PAMI\Message\Event;

class TransportDetailEvent extends EventMessage
{
    /**
     * The object's type. This will always be 'transport'.
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
     * Protocol to use for SIP traffic
     * 
     * @return ?string
     */
    public function getProtocol(): ?string
    {
        return $this->getKey('Protocol');
    }

    /**
     * IP Address and optional port to bind to for this transport
     * 
     * @return ?string
     */
    public function getBind(): ?string
    {
        return $this->getKey('Bind');
    }

    /**
     * Number of simultaneous Asynchronous Operations, can no longer be set, always set to 1
     * 
     * @return ?string
     */
    public function getAsycOperations(): ?string
    {
        return $this->getKey('AsycOperations');
    }

    /**
     * File containing a list of certificates to read (TLS ONLY, not WSS)
     * 
     * @return ?string
     */
    public function getCaListFile(): ?string
    {
        return $this->getKey('CaListFile');
    }

    /**
     * Path to directory containing a list of certificates to read (TLS ONLY, not WSS)
     * 
     * @return ?string
     */
    public function getCaListPath(): ?string
    {
        return $this->getKey('CaListPath');
    }

    /**
     * Certificate file for endpoint (TLS ONLY, not WSS)
     * 
     * @return ?string
     */
    public function getCertFile(): ?string
    {
        return $this->getKey('CertFile');
    }

    /**
     * Private key file (TLS ONLY, not WSS)
     * 
     * @return ?string
     */
    public function getPrivKeyFile(): ?string
    {
        return $this->getKey('PrivKeyFile');
    }

    /**
     * Password required for transport
     * 
     * @return ?string
     */
    public function getPassword(): ?string
    {
        return $this->getKey('Password');
    }

    /**
     * External address for SIP signalling
     * 
     * @return ?string
     */
    public function getExternalSignalingAddress(): ?string
    {
        return $this->getKey('ExternalSignalingAddress');
    }

    /**
     * External port for SIP signalling
     * 
     * @return ?string
     */
    public function getExternalSignalingPort(): ?string
    {
        return $this->getKey('ExternalSignalingPort');
    }

    /**
     * External IP address to use in RTP handling
     * 
     * @return ?string
     */
    public function getExternalMediaAddress(): ?string
    {
        return $this->getKey('ExternalMediaAddress');
    }

    /**
     * Domain the transport comes from
     * 
     * @return ?string
     */
    public function getDomain(): ?string
    {
        return $this->getKey('Domain');
    }

    /**
     * Require verification of server certificate (TLS ONLY, not WSS)
     * 
     * @return ?string
     */
    public function getVerifyServer(): ?string
    {
        return $this->getKey('VerifyServer');
    }

    /**
     * Require verification of client certificate (TLS ONLY, not WSS)
     * 
     * @return ?string
     */
    public function getVerifyClient(): ?string
    {
        return $this->getKey('VerifyClient');
    }

    /**
     * Require client certificate (TLS ONLY, not WSS)
     * 
     * @return ?string
     */
    public function getRequireClientCert(): ?string
    {
        return $this->getKey('RequireClientCert');
    }

    /**
     * Method of SSL transport (TLS ONLY, not WSS)
     * 
     * @return ?string
     */
    public function getMethod(): ?string
    {
        return $this->getKey('Method');
    }

    /**
     * Preferred cryptography cipher names (TLS ONLY, not WSS)
     * 
     * @return ?string
     */
    public function getCipher(): ?string
    {
        return $this->getKey('Cipher');
    }

    /**
     * Network to consider local (used for NAT purposes).
     * 
     * @return ?string
     */
    public function getLocalNet(): ?string
    {
        return $this->getKey('LocalNet');
    }

    /**
     * Enable TOS for the signalling sent over this transport
     * 
     * @return ?string
     */
    public function getTos(): ?string
    {
        return $this->getKey('Tos');
    }

    /**
     * Enable COS for the signalling sent over this transport
     * 
     * @return ?string
     */
    public function getCos(): ?string
    {
        return $this->getKey('Cos');
    }

    /**
     * The timeout (in milliseconds) to set on WebSocket connections.
     * 
     * @return ?string
     */
    public function getWebsocketWriteTimeout(): ?string
    {
        return $this->getKey('WebsocketWriteTimeout');
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