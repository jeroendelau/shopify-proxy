<?php

namespace App\Interfaces;

interface CanProvideRequestDetails
{
    /**
     * @return string
     */
    public function getIdentifier() : string;

    /**
     * @return string
     */
    public function getSignature() : string;

    /**
     * @return string
     */
    public function getMethod() : string;

    /**
     * @return string
     */
    public function getPath(): string;

    /**
     * @return mixed
     */
    public function getPayload() : mixed;
}
