<?php

namespace JayTeamWorlds\Proxy\Library\Interfaces;

interface CanProvideRequestDetails
{
    /**
     * @return string
     */
    public function getIdentifier() : string;

    /**
     * @return bool
     */
    public function hasSignature() : bool;

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
