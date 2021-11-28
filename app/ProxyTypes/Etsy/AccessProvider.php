<?php

namespace App\ProxyTypes\Etsy;

use StarEditions\ApiProxy\Etsy\CanProvideEtsyAccess;

class AccessProvider implements CanProvideEtsyAccess {
    /**
     * @param string|null $id
     * @return string
     */
    public function getApiKey(?string $id = null): string
    {
        return '';
    }

    /**
     * @param string|null $id
     * @return string
     */
    public function getOAuthToken(?string $id = null): string
    {
        return '';
    }
}
