<?php

namespace PAMI\Message\Event;

class EndpointDetailEvent extends EventMessage
{
    /*
        /**
         * The object's type. This will always be 'endpoint'.
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
     * Media Codec(s) to disallow
     *
     * @return ?string
     */
    public function getDisallow(): ?string
    {
        return $this->getKey('Disallow');
    }

    /**
     * Media Codec(s) to allow
     *
     * @return ?string
     */
    public function getAllow(): ?string
    {
        return $this->getKey('Allow');
    }

    /**
     * DTMF mode
     *
     * @return ?string
     */
    public function getDtmfMode(): ?string
    {
        return $this->getKey('DtmfMode');
    }

    /**
     * Allow use of IPv6 for RTP traffic
     *
     * @return ?string
     */
    public function getRtpIpv6(): ?string
    {
        return $this->getKey('RtpIpv6');
    }

    /**
     * Enforce that RTP must be symmetric
     *
     * @return ?string
     */
    public function getRtpSymmetric(): ?string
    {
        return $this->getKey('RtpSymmetric');
    }

    /**
     * Enable the ICE mechanism to help traverse NAT
     *
     * @return ?string
     */
    public function getIceSupport(): ?string
    {
        return $this->getKey('IceSupport');
    }

    /**
     * Use Endpoint's requested packetization interval
     *
     * @return ?string
     */
    public function getUsePtime(): ?string
    {
        return $this->getKey('UsePtime');
    }

    /**
     * Force use of return port
     *
     * @return ?string
     */
    public function getForceRport(): ?string
    {
        return $this->getKey('ForceRport');
    }

    /**
     * Allow Contact header to be rewritten with the source IP address-port
     *
     * @return ?string
     */
    public function getRewriteContact(): ?string
    {
        return $this->getKey('RewriteContact');
    }

    /**
     * Explicit transport configuration to use
     *
     * @return ?string
     */
    public function getTransport(): ?string
    {
        return $this->getKey('Transport');
    }

    /**
     * Full SIP URI of the outbound proxy used to send requests
     *
     * @return ?string
     */
    public function getOutboundProxy(): ?string
    {
        return $this->getKey('OutboundProxy');
    }

    /**
     * Default Music On Hold class
     *
     * @return ?string
     */
    public function getMohSuggest(): ?string
    {
        return $this->getKey('MohSuggest');
    }

    /**
     * Allow support for RFC3262 provisional ACK tags
     *
     * @return ?string
     */
    public function get100rel(): ?string
    {
        return $this->getKey('100rel');
    }

    /**
     * Session timers for SIP packets
     *
     * @return ?string
     */
    public function getTimers(): ?string
    {
        return $this->getKey('Timers');
    }

    /**
     * Minimum session timers expiration period
     *
     * @return ?string
     */
    public function getTimersMinSe(): ?string
    {
        return $this->getKey('TimersMinSe');
    }

    /**
     * Maximum session timer expiration period
     *
     * @return ?int
     */
    public function getTimersSessExpires(): ?int
    {
        return $this->getKey('TimersSessExpires');
    }

    /**
     * Authentication Object(s) associated with the endpoint
     *
     * @return ?string
     */
    public function getAuth(): ?string
    {
        return $this->getKey('Auth');
    }

    /**
     * Authentication object(s) used for outbound requests
     *
     * @return ?string
     */
    public function getOutboundAuth(): ?string
    {
        return $this->getKey('OutboundAuth');
    }

    /**
     * AoR(s) to be used with the endpoint
     *
     * @return ?string
     */
    public function getAors(): ?string
    {
        return $this->getKey('Aors');
    }

    /**
     * IP address used in SDP for media handling
     *
     * @return ?string
     */
    public function getMediaAddress(): ?string
    {
        return $this->getKey('MediaAddress');
    }

    /**
     * Way(s) for the endpoint to be identified
     *
     * @return ?string
     */
    public function getIdentifyBy(): ?string
    {
        return $this->getKey('IdentifyBy');
    }

    /**
     * Determines whether media may flow directly between endpoints.
     *
     * @return ?string
     */
    public function getDirectMedia(): ?string
    {
        return $this->getKey('DirectMedia');
    }

    /**
     * Direct Media method type
     *
     * @return ?string
     */
    public function getDirectMediaMethod(): ?string
    {
        return $this->getKey('DirectMediaMethod');
    }

    /**
     * Accept Connected Line updates from this endpoint
     *
     * @return ?string
     */
    public function getTrustConnectedLine(): ?string
    {
        return $this->getKey('TrustConnectedLine');
    }

    /**
     * Send Connected Line updates to this endpoint
     *
     * @return ?string
     */
    public function getSendConnectedLine(): ?string
    {
        return $this->getKey('SendConnectedLine');
    }

    /**
     * Connected line method type
     *
     * @return ?string
     */
    public function getConnectedLineMethod(): ?string
    {
        return $this->getKey('ConnectedLineMethod');
    }

    /**
     * Mitigation of direct media (re)INVITE glare
     *
     * @return ?string
     */
    public function getDirectMediaGlareMitigation(): ?string
    {
        return $this->getKey('DirectMediaGlareMitigation');
    }

    /**
     * Disable direct media session refreshes when NAT obstructs the media session
     *
     * @return ?string
     */
    public function getDisableDirectMediaOnNat(): ?string
    {
        return $this->getKey('DisableDirectMediaOnNat');
    }

    /**
     * CallerID information for the endpoint
     *
     * @return ?string
     */
    public function getCallerID(): ?string
    {
        return $this->getKey('CallerID');
    }

    /**
     * Default privacy level
     *
     * @return ?string
     */
    public function getCallerIDPrivacy(): ?string
    {
        return $this->getKey('CallerIDPrivacy');
    }

    /**
     * Internal id_tag for the endpoint
     *
     * @return ?string
     */
    public function getCallerIDTag(): ?string
    {
        return $this->getKey('CallerIDTag');
    }

    /**
     * Accept identification information received from this endpoint
     *
     * @return ?string
     */
    public function getTrustIdInbound(): ?string
    {
        return $this->getKey('TrustIdInbound');
    }

    /**
     * Send private identification details to the endpoint.
     *
     * @return ?string
     */
    public function getTrustIdOutbound(): ?string
    {
        return $this->getKey('TrustIdOutbound');
    }

    /**
     * Send the P-Asserted-Identity header
     *
     * @return ?string
     */
    public function getSendPai(): ?string
    {
        return $this->getKey('SendPai');
    }

    /**
     * Send the Remote-Party-ID header
     *
     * @return ?string
     */
    public function getSendRpid(): ?string
    {
        return $this->getKey('SendRpid');
    }

    /**
     * Send the Diversion header, conveying the diversion information to the called user agent
     *
     * @return ?string
     */
    public function getSendDiversion(): ?string
    {
        return $this->getKey('SendDiversion');
    }

    /**
     * NOTIFY the endpoint when state changes for any of the specified mailboxes
     *
     * @return ?string
     */
    public function getMailboxes(): ?string
    {
        return $this->getKey('Mailboxes');
    }

    /**
     * Condense MWI notifications into a single NOTIFY.
     *
     * @return ?string
     */
    public function getAggregateMwi(): ?string
    {
        return $this->getKey('AggregateMwi');
    }

    /**
     * Determines whether res_pjsip will use and enforce usage of media encryption for this endpoint.
     *
     * @return ?string
     */
    public function getMediaEncryption(): ?string
    {
        return $this->getKey('MediaEncryption');
    }

    /**
     * Determines whether encryption should be used if possible but does not terminate the session if not achieved.
     *
     * @return ?string
     */
    public function getMediaEncryptionOptimistic(): ?string
    {
        return $this->getKey('MediaEncryptionOptimistic');
    }

    /**
     * Determines whether res_pjsip will use and enforce usage of AVPF for this endpoint.
     *
     * @return ?string
     */
    public function getUseAvpf(): ?string
    {
        return $this->getKey('UseAvpf');
    }

    /**
     * Determines whether res_pjsip will use and enforce usage of AVP, regardless of the RTP profile in use for this endpoint.
     *
     * @return ?string
     */
    public function getForceAvp(): ?string
    {
        return $this->getKey('ForceAvp');
    }

    /**
     * Determines whether res_pjsip will use the media transport received in the offer SDP in the corresponding answer SDP.
     *
     * @return ?string
     */
    public function getMediaUseReceivedTransport(): ?string
    {
        return $this->getKey('MediaUseReceivedTransport');
    }

    /**
     * Determines whether one-touch recording is allowed for this endpoint.
     *
     * @return ?string
     */
    public function getOneTouchRecording(): ?string
    {
        return $this->getKey('OneTouchRecording');
    }

    /**
     * Determines whether chan_pjsip will indicate ringing using inband progress.
     *
     * @return ?string
     */
    public function getInbandProgress(): ?string
    {
        return $this->getKey('InbandProgress');
    }

    /**
     * The numeric pickup groups for a channel.
     *
     * @return ?string
     */
    public function getCallGroup(): ?string
    {
        return $this->getKey('CallGroup');
    }

    /**
     * The numeric pickup groups that a channel can pickup.
     *
     * @return ?string
     */
    public function getPickupGroup(): ?string
    {
        return $this->getKey('PickupGroup');
    }

    /**
     * The named pickup groups for a channel.
     *
     * @return ?string
     */
    public function getNamedCallGroup(): ?string
    {
        return $this->getKey('NamedCallGroup');
    }

    /**
     * The named pickup groups that a channel can pickup.
     *
     * @return ?string
     */
    public function getNamedPickupGroup(): ?string
    {
        return $this->getKey('NamedPickupGroup');
    }

    /**
     * The number of in-use channels which will cause busy to be returned as device state
     *
     * @return ?string
     */
    public function getDeviceStateBusyAt(): ?string
    {
        return $this->getKey('DeviceStateBusyAt');
    }

    /**
     * Whether T.38 UDPTL support is enabled or not
     *
     * @return ?string
     */
    public function getT38Udptl(): ?string
    {
        return $this->getKey('T38Udptl');
    }

    /**
     * T.38 UDPTL error correction method
     *
     * @return ?string
     */
    public function getT38UdptlEc(): ?string
    {
        return $this->getKey('T38UdptlEc');
    }

    /**
     * T.38 UDPTL maximum datagram size
     *
     * @return ?string
     */
    public function getT38UdptlMaxdatagram(): ?string
    {
        return $this->getKey('T38UdptlMaxdatagram');
    }

    /**
     * Whether CNG tone detection is enabled
     *
     * @return ?string
     */
    public function getFaxDetect(): ?string
    {
        return $this->getKey('FaxDetect');
    }

    /**
     * Whether NAT support is enabled on UDPTL sessions
     *
     * @return ?string
     */
    public function getT38UdptlNat(): ?string
    {
        return $this->getKey('T38UdptlNat');
    }

    /**
     * Whether IPv6 is used for UDPTL Sessions
     *
     * @return ?string
     */
    public function getT38UdptlIpv6(): ?string
    {
        return $this->getKey('T38UdptlIpv6');
    }

    /**
     * Bind the UDPTL instance to the media_adress
     *
     * @return ?string
     */
    public function getT38BindUdptlToMediaAddress(): ?string
    {
        return $this->getKey('T38BindUdptlToMediaAddress');
    }

    /**
     * Set which country's indications to use for channels created for this endpoint.
     *
     * @return ?string
     */
    public function getToneZone(): ?string
    {
        return $this->getKey('ToneZone');
    }

    /**
     * Set the default language to use for channels created for this endpoint.
     *
     * @return ?string
     */
    public function getLanguage(): ?string
    {
        return $this->getKey('Language');
    }

    /**
     * The feature to enact when one-touch recording is turned on.
     *
     * @return ?string
     */
    public function getRecordOnFeature(): ?string
    {
        return $this->getKey('RecordOnFeature');
    }

    /**
     * The feature to enact when one-touch recording is turned off.
     *
     * @return ?string
     */
    public function getRecordOffFeature(): ?string
    {
        return $this->getKey('RecordOffFeature');
    }

    /**
     * Determines whether SIP REFER transfers are allowed for this endpoint
     *
     * @return ?string
     */
    public function getAllowTransfer(): ?string
    {
        return $this->getKey('AllowTransfer');
    }

    /**
     * Determines whether a user=phone parameter is placed into the request URI if the user is determined to be a phone number
     *
     * @return ?string
     */
    public function getUserEqPhone(): ?string
    {
        return $this->getKey('UserEqPhone');
    }

    /**
     * Determines whether hold and unhold will be passed through using re-INVITEs with recvonly and sendrecv to the remote side
     *
     * @return ?string
     */
    public function getMohPassthrough(): ?string
    {
        return $this->getKey('MohPassthrough');
    }

    /**
     * String placed as the username portion of an SDP origin (o=) line.
     *
     * @return ?string
     */
    public function getSdpOwner(): ?string
    {
        return $this->getKey('SdpOwner');
    }

    /**
     * String used for the SDP session (s=) line.
     *
     * @return ?string
     */
    public function getSdpSession(): ?string
    {
        return $this->getKey('SdpSession');
    }

    /**
     * DSCP TOS bits for audio streams
     *
     * @return ?string
     */
    public function getTosAudio(): ?string
    {
        return $this->getKey('TosAudio');
    }

    /**
     * DSCP TOS bits for video streams
     *
     * @return ?string
     */
    public function getTosVideo(): ?string
    {
        return $this->getKey('TosVideo');
    }

    /**
     * Priority for audio streams
     *
     * @return ?string
     */
    public function getCosAudio(): ?string
    {
        return $this->getKey('CosAudio');
    }

    /**
     * Priority for video streams
     *
     * @return ?string
     */
    public function getCosVideo(): ?string
    {
        return $this->getKey('CosVideo');
    }

    /**
     * Determines if endpoint is allowed to initiate subscriptions with Asterisk.
     *
     * @return ?string
     */
    public function getAllowSubscribe(): ?string
    {
        return $this->getKey('AllowSubscribe');
    }

    /**
     * The minimum allowed expiry time for subscriptions initiated by the endpoint.
     *
     * @return ?string
     */
    public function getSubMinExpiry(): ?string
    {
        return $this->getKey('SubMinExpiry');
    }

    /**
     * Username to use in From header for requests to this endpoint.
     *
     * @return ?string
     */
    public function getFromUser(): ?string
    {
        return $this->getKey('FromUser');
    }

    /**
     * Domain to use in From header for requests to this endpoint.
     *
     * @return ?string
     */
    public function getFromDomain(): ?string
    {
        return $this->getKey('FromDomain');
    }

    /**
     * Username to use in From header for unsolicited MWI NOTIFIES to this endpoint.
     *
     * @return ?string
     */
    public function getMwiFromUser(): ?string
    {
        return $this->getKey('MwiFromUser');
    }

    /**
     * Name of the RTP engine to use for channels created for this endpoint
     *
     * @return ?string
     */
    public function getRtpEngine(): ?string
    {
        return $this->getKey('RtpEngine');
    }

    /**
     * Verify that the provided peer certificate is valid
     *
     * @return ?string
     */
    public function getDtlsVerify(): ?string
    {
        return $this->getKey('DtlsVerify');
    }

    /**
     * Interval at which to renegotiate the TLS session and rekey the SRTP session
     *
     * @return ?string
     */
    public function getDtlsRekey(): ?string
    {
        return $this->getKey('DtlsRekey');
    }

    /**
     * Path to certificate file to present to peer
     *
     * @return ?string
     */
    public function getDtlsCertFile(): ?string
    {
        return $this->getKey('DtlsCertFile');
    }

    /**
     * Path to private key for certificate file
     *
     * @return ?string
     */
    public function getDtlsPrivateKey(): ?string
    {
        return $this->getKey('DtlsPrivateKey');
    }

    /**
     * Cipher to use for DTLS negotiation
     *
     * @return ?string
     */
    public function getDtlsCipher(): ?string
    {
        return $this->getKey('DtlsCipher');
    }

    /**
     * Path to certificate authority certificate
     *
     * @return ?string
     */
    public function getDtlsCaFile(): ?string
    {
        return $this->getKey('DtlsCaFile');
    }

    /**
     * Path to a directory containing certificate authority certificates
     *
     * @return ?string
     */
    public function getDtlsCaPath(): ?string
    {
        return $this->getKey('DtlsCaPath');
    }

    /**
     * Whether we are willing to accept connections, connect to the other party, or both.
     *
     * @return ?string
     */
    public function getDtlsSetup(): ?string
    {
        return $this->getKey('DtlsSetup');
    }

    /**
     * Determines whether 32 byte tags should be used instead of 80 byte tags.
     *
     * @return ?string
     */
    public function getSrtpTag32(): ?string
    {
        return $this->getKey('SrtpTag32');
    }

    /**
     * How redirects received from an endpoint are handled
     *
     * @return ?string
     */
    public function getRedirectMethod(): ?string
    {
        return $this->getKey('RedirectMethod');
    }

    /**
     * Variable set on a channel involving the endpoint.
     *
     * @return ?string
     */
    public function getSetVar(): ?string
    {
        return $this->getKey('SetVar');
    }

    /**
     * Context to route incoming MESSAGE requests to.
     *
     * @return ?string
     */
    public function getMessageContext(): ?string
    {
        return $this->getKey('MessageContext');
    }

    /**
     * Respond to a SIP invite with the single most preferred codec (DEPRECATED)
     *
     * @return ?string
     */
    public function getPreferredCodecOnly(): ?string
    {
        return $this->getKey('PreferredCodecOnly');
    }

    /**
     * The aggregate device state for this endpoint.
     *
     * @return ?string
     */
    public function getDeviceState(): ?string
    {
        return $this->getKey('DeviceState');
    }

    /**
     * The number of active channels associated with this endpoint.
     *
     * @return ?string
     */
    public function getActiveChannels(): ?string
    {
        return $this->getKey('ActiveChannels');
    }

    /**
     * Context for incoming MESSAGE requests.
     *
     * @return ?string
     */
    public function getSubscribeContext(): ?string
    {
        return $this->getKey('SubscribeContext');
    }

    /**
     * Enable RFC3578 overlap dialing support.
     *
     * @return ?string
     */
    public function getAllowOverlap(): ?string
    {
        return $this->getKey('AllowOverlap');
    }

    /**
     * Dialplan context to use for RFC3578 overlap dialing.
     *
     * @return ?string
     */
    public function getOverlapContext(): ?string
    {
        return $this->getKey('OverlapContext');
    }

    public function getRpidImmediate(): ?string
    {
        return $this->getKey('RpidImmediate');
    }

    public function getWebrtc(): ?string
    {
        return $this->getKey('Webrtc');
    }

    public function getIgnore183WithoutSdp(): ?string
    {
        return $this->getKey('Ignore183WithoutSdp');
    }

    public function getSendAoc(): ?string
    {
        return $this->getKey('SendAoc');
    }

    public function getCodecPrefsIncomingAnswer(): ?string
    {
        return $this->getKey('CodecPrefsIncomingAnswer');
    }

    public function getSecurityNegotiation(): ?string
    {
        return $this->getKey('SecurityNegotiation');
    }

    public function getDtlsFingerprint(): ?string
    {
        return $this->getKey('DtlsFingerprint');
    }

    public function getOutgoingCallOfferPref(): ?string
    {
        return $this->getKey('OutgoingCallOfferPref');
    }

    public function getSuppressQ850ReasonHeaders(): ?string
    {
        return $this->getKey('SuppressQ850ReasonHeaders');
    }

    public function getMwiSubscribeReplacesUnsolicited(): ?string
    {
        return $this->getKey('MwiSubscribeReplacesUnsolicited');
    }

    public function getFollowEarlyMediaFork(): ?string
    {
        return $this->getKey('FollowEarlyMediaFork');
    }

    public function getReferBlindProgress(): ?string
    {
        return $this->getKey('ReferBlindProgress');
    }

    public function getMaxAudioStreams(): ?int
    {
        return $this->getKey('MaxAudioStreams');
    }

    public function getBundle(): ?string
    {
        return $this->getKey('Bundle');
    }

    public function getFaxDetectTimeout(): ?int
    {
        return $this->getKey('FaxDetectTimeout');
    }

    public function getRtpTimeoutHold(): ?int
    {
        return $this->getKey('RtpTimeoutHold');
    }

    public function getVoicemailExtension(): ?string
    {
        return $this->getKey('VoicemailExtension');
    }

    public function getRtpTimeout(): ?int
    {
        return $this->getKey('RtpTimeout');
    }

    public function getStirShaken(): ?string
    {
        return $this->getKey('StirShaken');
    }

    public function getContactAcl(): ?string
    {
        return $this->getKey('ContactAcl');
    }

    public function getGeolocOutgoingCallProfile(): ?string
    {
        return $this->getKey('GeolocOutgoingCallProfile');
    }

    public function getSendHistoryInfo(): ?string
    {
        return $this->getKey('SendHistoryInfo');
    }

    public function getDtlsAutoGenerateCert(): ?string
    {
        return $this->getKey('DtlsAutoGenerateCert');
    }

    public function getAsymmetricRtpCodec(): ?string
    {
        return $this->getKey('AsymmetricRtpCodec');
    }

    public function getGeolocIncomingCallProfile(): ?string
    {
        return $this->getKey('GeolocIncomingCallProfile');
    }

    public function getCodecPrefsOutgoingAnswer(): ?string
    {
        return $this->getKey('CodecPrefsOutgoingAnswer');
    }

    public function getNotifyEarlyInuseRinging(): ?string
    {
        return $this->getKey('NotifyEarlyInuseRinging');
    }

    public function getIncomingMwiMailbox(): ?string
    {
        return $this->getKey('IncomingMwiMailbox');
    }

    public function getIncomingCallOfferPref(): ?string
    {
        return $this->getKey('IncomingCallOfferPref');
    }

    public function getAllowUnauthenticatedOptions(): ?string
    {
        return $this->getKey('AllowUnauthenticatedOptions');
    }

    public function getStirShakenProfile(): ?string
    {
        return $this->getKey('StirShakenProfile');
    }

    public function getBindRtpToMediaAddress(): ?string
    {
        return $this->getKey('BindRtpToMediaAddress');
    }

    public function getG726NonStandard(): ?string
    {
        return $this->getKey('G726NonStandard');
    }

    public function getSecurityMechanisms(): ?string
    {
        return $this->getKey('SecurityMechanisms');
    }

    public function getAcl(): ?string
    {
        return $this->getKey('Acl');
    }

    public function getRtcpMux(): ?string
    {
        return $this->getKey('RtcpMux');
    }

    public function getMaxVideoStreams(): ?int
    {
        return $this->getKey('MaxVideoStreams');
    }

    public function getAcceptMultipleSdpAnswers(): ?string
    {
        return $this->getKey('AcceptMultipleSdpAnswers');
    }

    public function getCodecPrefsIncomingOffer(): ?string
    {
        return $this->getKey('CodecPrefsIncomingOffer');
    }

    public function getCodecPrefsOutgoingOffer(): ?string
    {
        return $this->getKey('CodecPrefsOutgoingOffer');
    }

    public function getRtpKeepalive(): ?int
    {
        return $this->getKey('RtpKeepalive');
    }

}