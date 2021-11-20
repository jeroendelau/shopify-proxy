<?php

namespace App\Shared;

use App\Models\EbayToken;
use App\Models\ShopifyStore;
use App\Models\EtsyCredentials;
use Spatie\Crypto\Rsa\PublicKey;
use Spatie\Crypto\Rsa\PrivateKey;
use App\Interfaces\CanVerifyRequest;
use App\Interfaces\CanProvideAccess;
use App\Interfaces\CanProvideRequestDetails;
use Spatie\Crypto\Rsa\Exceptions\FileDoesNotExist;
use Spatie\Crypto\Rsa\Exceptions\CouldNotDecryptData;

class SignatureManager implements CanVerifyRequest
{
    /**
     * @var CanProvideRequestDetails
     */
    protected CanProvideRequestDetails $requestDetailsProvider;

    /**
     * @var ShopifyStore|EbayToken|EtsyCredentials|null
     */
    protected ShopifyStore|EbayToken|EtsyCredentials|null $authenticationData;

    /**
     * @var CanProvideAccess
     */
    protected CanProvideAccess $credentialsProvider;

    /**
     * @var string
     * Temporary
     */
    protected string $ttt = '';

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
     * @return string|null
     */
    public function sign() : string|null
    {
        if (!$this->authenticationData) {
            //TODO Return proper response.
            return false;
        }

        try {
            return $this->ttt = PrivateKey::fromFile(storage_path('SpatieCryptoRsa.private'))->encrypt($this->getStringToSign());
        } catch (FileDoesNotExist $exception) {
            //TODO Return proper response, logging and etc.
            return false;
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
            $signature = PublicKey::fromFile(storage_path('SpatieCryptoRsa.public'))->decrypt($this->ttt);
            list($timestamp) = explode("|", $signature);
            $check_signature = PrivateKey::fromFile(storage_path('SpatieCryptoRsa.private'))->encrypt($this->getStringToSign($timestamp));
            if (PublicKey::fromFile(storage_path('SpatieCryptoRsa.public'))->verify($this->ttt, $check_signature)) return false;
            if (time() - $timestamp >= 300) return false;
            return true;
        } catch (FileDoesNotExist $file_exception) {
            //TODO  Add logging or notification.
            return false;
        } catch (CouldNotDecryptData $decrypt_exception) {
            //TODO Add logging or notification.
            return false;
        }
    }


    /**
     * @param string|null $withTimestamp
     * @return string
     */
    protected function getStringToSign(string $withTimestamp = null) :string
    {
        $timestamp = $withTimestamp ? $withTimestamp : time();
        return "{$timestamp}|{$this->requestDetailsProvider->getIdentifier()}|{$this->authenticationData->api_key}|{$this->authenticationData->shared_secret}";
    }
}
