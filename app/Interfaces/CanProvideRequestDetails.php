<?php

namespace App\Interfaces;

interface CanProvideRequestDetails
{
    public function getIdentifier();
    public function getSignature();
    public function getMethod();
    public function getPath();
    public function getPayload();
}
