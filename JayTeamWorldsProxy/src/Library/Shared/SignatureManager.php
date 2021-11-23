<?php

namespace JayTeamWorlds\Proxy\Library\Shared;

use ParagonIE\Halite\KeyFactory;
use ParagonIE\Halite\Symmetric\Crypto;
use JayTeamWorlds\Proxy\Laravel\Models\EbayToken;
use JayTeamWorlds\Proxy\Laravel\Models\EtsyToken;
use JayTeamWorlds\Proxy\Laravel\Models\ShopifyStore;
use JayTeamWorlds\Proxy\Library\Interfaces\CanVerifyRequest;
use JayTeamWorlds\Proxy\Library\Interfaces\CanProvideAccess;
use JayTeamWorlds\Proxy\Library\Interfaces\CanProvideRequestDetails;
use ParagonIE\HiddenString\HiddenString;

class SignatureManager implements CanVerifyRequest
{

    public string|null $newSignature = null;

    /**
     * @var CanProvideRequestDetails
     */
    protected CanProvideRequestDetails $requestDetailsProvider;

    /**
     * @var ShopifyStore|EbayToken|EtsyToken|null
     */
    protected ShopifyStore|EbayToken|EtsyToken|null $authenticationData;

    /**
     * @var CanProvideAccess
     */
    protected CanProvideAccess $credentialsProvider;

    /**
     * @param CanProvideRequestDetails $requestDetailsProvider
     * @param CanProvideAccess $credentialsProvider
     */
    public function __construct(CanProvideRequestDetails $requestDetailsProvider, CanProvideAccess $credentialsProvider)
    {
        $this->credentialsProvider = $credentialsProvider;
        $this->requestDetailsProvider = $requestDetailsProvider;
        $this->authenticationData = $this->credentialsProvider->getAccess($this->requestDetailsProvider->getIdentifier());
    }


    /**
     * @return string
     */
    public function sign() : string
    {
        try {
            $key = KeyFactory::loadEncryptionKey(config('jayteam-proxy.encryption_key'));
            return $this->newSignature = Crypto::encrypt(new HiddenString($this->getStringToSign()), $key);
        } catch (\Exception $exception) {
            //TODO Return proper response, logging and etc.
            return '';
        }
    }

    /**
     * @return bool
     */
    public function verify() : bool
    {
        if (!$this->authenticationData) {
            //TODO Return proper response.
            return false;
        }

        try {
            $key = KeyFactory::loadEncryptionKey(config('jayteam-proxy.encryption_key'));
            $signature =  Crypto::decrypt($this->requestDetailsProvider->getSignature(),$key)->getString();

            list($timestamp) = explode("|", $signature);
            $check_signature = Crypto::encrypt(new HiddenString($this->getStringToSign($timestamp)), $key);

            if (Crypto::decrypt($check_signature,$key)->getString() !== $signature)
                return false;

            if (time() - $timestamp >= 300)
                $this->sign();

            return true;
        } catch (\Exception $exception) {
            //TODO  Add logging or notification.
            return false;
        }
    }


    /**
     * @param string|null $withTimestamp
     * @return string
     */
    protected function getStringToSign(string $withTimestamp = null) :string
    {
        $timestamp = $withTimestamp ?: time();
        return "{$timestamp}|{$this->requestDetailsProvider->getIdentifier()}|{$this->authenticationData->api_key}|{$this->authenticationData->shared_secret}";
    }
}
