<?php

namespace App\Interfaces;

interface CanVerifyRequest
{
    /**
     * @return string|null
     */
    public function sign() : string|null;

    /**
     * @return bool
     */
    public function verify() : bool;
}
