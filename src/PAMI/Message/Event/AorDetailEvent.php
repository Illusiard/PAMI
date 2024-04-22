<?php

namespace PAMI\Message\Event;


class AorDetailEvent extends EventMessage
{
    /**
     * The object's type. This will always be 'aor'
     *
     * @return ?string
     */
    public function getObjectType(): ?string
    {
        return $this->getKey('ObjectType');
    }

    /**
     * The name of this object
     *
     * @return ?string
     */
    public function getObjectName(): ?string
    {
        return $this->getKey('ObjectName');
    }

    /**
     * Minimum keep alive time for an AoR
     *
     * @return ?int
     */
    public function getMinimumExpiration(): ?int
    {
        return $this->getKey('MinimumExpiration');
    }

    /**
     * Default expiration time in seconds for contacts that are dynamically bound to an AoR.
     *
     * @return ?int
     */
    public function getDefaultExpiration(): ?int
    {
        return $this->getKey('DefaultExpiration');
    }

    /**
     * Maximum time to keep an AoR
     *
     * @return ?int
     */
    public function getMaximumExpiration(): ?int
    {
        return $this->getKey('MaximumExpiration');
    }

    public function getQualifyTimeout(): ?float
    {
        return $this->getKey('QualifyTimeout');
    }

    /**
     * Interval at which to qualify an AoR
     *
     * @return ?int
     */
    public function getQualifyFrequency(): ?int
    {
        return $this->getKey('QualifyFrequency');
    }

    /**
     * Allow subscriptions for the specified mailbox(es)
     *
     * @return ?string
     */
    public function getMailboxes(): ?string
    {
        return $this->getKey('Mailboxes');
    }

    /**
     * Enables Path support for REGISTER requests and Route support for other requests.
     *
     * @return ?string
     */
    public function getSupportPath(): ?string
    {
        return $this->getKey('SupportPath');
    }

    /**
     * Determines whether new contacts should replace unavailable ones.
     *
     * @return ?string
     */
    public function getRemoveUnavailable(): ?string
    {
        return $this->getKey('RemoveUnavailable');
    }

    public function getVoicemailExtension(): ?string
    {
        return $this->getKey('VoicemailExtension');
    }

    /**
     * Maximum number of contacts that can bind to an AoR
     *
     * @return ?int
     */
    public function getMaxContacts(): ?int
    {
        return $this->getKey('MaxContacts');
    }

    /**
     * Authenticates a qualify challenge response if needed
     *
     * @return ?string
     */
    public function getAuthenticateQualify(): ?string
    {
        return $this->getKey('AuthenticateQualify');
    }

    public function getContacts(): ?string
    {
        return $this->getKey('Contacts');
    }

    /**
     * Determines whether new contacts replace existing ones.
     *
     * @return ?string
     */
    public function getRemoveExisting(): ?string
    {
        return $this->getKey('RemoveExisting');
    }

    /**
     * Outbound proxy used when sending OPTIONS request
     *
     * @return ?string
     */
    public function getOutboundProxy(): ?string
    {
        return $this->getKey('OutboundProxy');
    }

    /**
     * The total number of contacts associated with this AoR.
     *
     * @return ?int
     */
    public function getTotalContacts(): ?int
    {
        return $this->getKey('TotalContacts');
    }

    /**
     * The number of non-permanent contacts associated with this AoR.
     * 
     * @return ?int
     */
    public function getContactsRegistered(): ?int
    {
        return $this->getKey('ContactsRegistered');
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