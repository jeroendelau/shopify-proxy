<?php

namespace App\Proxies\EtsyProxy;

use App\Interfaces\AuthenticationData;
use App\Interfaces\CanProvideAccess;

class CredentialProvider implements CanProvideAccess {
    /**
     * @param string $id
     * @return AuthenticationData|void
     */
    public function getAccess(string $id): AuthenticationData
    {
        // TODO: Implement getAccess() method.
    }
}
