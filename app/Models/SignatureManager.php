<?php

namespace App\Models;

use App\Interfaces\CanVerifyRequest;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use App\Interfaces\CanProvideRequestDetails;

class SignatureManager extends Model implements CanVerifyRequest
{
    use HasFactory;

    /**
     * @param $storeId
     * @return mixed
     */
    public function sign($storeId) : mixed
    {
        // TODO: Implement sign() method.
        return;
    }

    /**
     * @param CanProvideRequestDetails $request
     * @return mixed
     */
    public function verify(CanProvideRequestDetails $request) : mixed
    {
        // TODO: Implement verify() method.
        return;
    }
}
