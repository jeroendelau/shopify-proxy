<?php

namespace App\Interfaces;

interface CanVerifyRequest
{
    public function sign($storeId) : string;
    public function verify(CanProvideRequestDetails $request) : bool;
}
