<?php

namespace PAMI\Message\Event;

class AuthDetail extends EventMessage
{
    /**
     * The object's type. This will always be 'auth'.
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
     * Username to use for account
     * 
     * @return ?string
     */
    public function getUsername(): ?string
    {
        return $this->getKey('Username');
    }

    /**
     * Username to use for account
     * 
     * @return ?string
     */
    public function getPassword(): ?string
    {
        return $this->getKey('Password');
    }

    /**
     * MD5 Hash used for authentication.
     * 
     * @return ?string
     */
    public function getMd5Cred(): ?string
    {
        return $this->getKey('Md5Cred');
    }

    /**
     * SIP realm for endpoint
     * 
     * @return ?string
     */
    public function getRealm(): ?string
    {
        return $this->getKey('Realm');
    }

    /**
     * Lifetime of a nonce associated with this authentication config.
     * 
     * @return ?int
     */
    public function getNonceLifetime(): ?int
    {
        return $this->getKey('NonceLifetime');
    }

    /**
     * Authentication type
     * 
     * @return ?string
     */
    public function getAuthType(): ?string
    {
        return $this->getKey('AuthType');
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

    public function getOauthSecret(): ?string
    {
        return $this->getKey('OauthSecret');
    }

    public function getOauthClientId(): ?string
    {
        return $this->getKey('OauthClientId');
    }

    public function getRefreshToken(): ?string
    {
        return $this->getKey('RefreshToken');
    }
}