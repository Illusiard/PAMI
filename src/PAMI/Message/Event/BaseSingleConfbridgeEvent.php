<?php

namespace PAMI\Message\Event;

class BaseSingleConfbridgeEvent extends BaseConfbridgeEvent
{
    /**
     * Returns key: 'BridgeUniqueid'.
     *
     * @return ?string
     */
    public function getBridgeUniqueid(): ?string
    {
        return $this->getKey('BridgeUniqueid');
    }

    /**
     * Returns key: 'BridgeType'.
     *
     * @return ?string
     */
    public function getBridgeType(): ?string
    {
        return $this->getKey('BridgeType');
    }

    /**
     * Returns key: 'BridgeTechnology'.
     *
     * @return ?string
     */
    public function getBridgeTechnology(): ?string
    {
        return $this->getKey('BridgeTechnology');
    }

    /**
     * Returns key: 'BridgeCreator'.
     *
     * @return ?string
     */
    public function getBridgeCreator(): ?string
    {
        return $this->getKey('BridgeCreator');
    }

    /**
     * Returns key: 'BridgeName'.
     *
     * @return ?string
     */
    public function getBridgeName(): ?string
    {
        return $this->getKey('BridgeName');
    }

    /**
     * Returns key: 'BridgeNumChannels'.
     *
     * @return ?string
     */
    public function getBridgeNumChannels(): ?string
    {
        return $this->getKey('BridgeNumChannels');
    }
}