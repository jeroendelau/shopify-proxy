<?php

namespace JayTeamWorlds\Proxy\Library\Interfaces;

interface CanVerifyRequest
{
    /**
     * @return string
     */
    public function sign() : string;

    /**
     * @return bool
     */
    public function verify() : bool;
}
