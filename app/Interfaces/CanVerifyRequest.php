<?php

namespace App\Interfaces;

interface CanVerifyRequest
{
    public function sign($storeId);
    public function verify(CanProvideRequestDetails $request);
}
