<?php

namespace App\Interfaces;

interface CanProvideAccess
{
    public function getAccess(string $id) : AuthenticationData;
}
