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
class AorListEvent extends EventMessage
{
    /**
     * The object's type. This will always be 'aor'.
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
     * Minimum keep alive time for an AoR
     * 
     * @return ?string
     */
    public function getMinimumExpiration(): ?string
    {
        return $this->getKey('MinimumExpiration');
    }

    /**
     * Maximum time to keep an AoR
     * 
     * @return ?string
     */
    public function getMaximumExpiration(): ?string
    {
        return $this->getKey('MaximumExpiration');
    }

    /**
     * Default expiration time in seconds for contacts that are dynamically bound to an AoR.
     * 
     * @return ?string
     */
    public function getDefaultExpiration(): ?string
    {
        return $this->getKey('DefaultExpiration');
    }

    /**
     * Interval at which to qualify an AoR
     * 
     * @return ?string
     */
    public function getQualifyFrequency(): ?string
    {
        return $this->getKey('QualifyFrequency');
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

    /**
     * Maximum number of contacts that can bind to an AoR
     * 
     * @return ?string
     */
    public function getMaxContacts(): ?string
    {
        return $this->getKey('MaxContacts');
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
     * Determines whether new contacts should replace unavailable ones.
     * 
     * @return ?string
     */
    public function getRemoveUnavailable(): ?string
    {
        return $this->getKey('RemoveUnavailable');
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
     * Outbound proxy used when sending OPTIONS request
     * 
     * @return ?string
     */
    public function getOutboundProxy(): ?string
    {
        return $this->getKey('OutboundProxy');
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
}