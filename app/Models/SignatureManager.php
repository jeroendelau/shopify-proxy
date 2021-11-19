<?php

namespace App\Models;

use App\Interfaces\CanVerifyRequest;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Spatie\Crypto\Rsa\PublicKey;
use Spatie\Crypto\Rsa\PrivateKey;
use App\Interfaces\CanProvideRequestDetails;
use Spatie\Crypto\Rsa\Exceptions\FileDoesNotExist;


class SignatureManager extends Model implements CanVerifyRequest
{
    use HasFactory;

    /**
     * @param $storeId
     * @return string
     */
    public function sign($storeId) : string
    {
       try {
           return PrivateKey::fromFile('SpatieCryptoRsa.private')
               ->encrypt($storeId);
       } catch (FileDoesNotExist $exception) {
           return '';
       }
    }

    /**
     * @param CanProvideRequestDetails $request
     * @return bool
     */
    public function verify(CanProvideRequestDetails $request) : bool
    {
        try {
            return PublicKey::fromFile('SpatieCryptoRsa.private')
                ->verify($request->getSignature(),'');
        } catch (FileDoesNotExist $exception) {
            return false;
        }
    }
}
