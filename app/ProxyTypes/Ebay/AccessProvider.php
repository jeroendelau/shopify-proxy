<?php

namespace App\ProxyTypes\Ebay;

use StarEditions\ApiProxy\Ebay\CanProvideEbayAccess;

class AccessProvider implements CanProvideEbayAccess
{
    /**
     * @param string|null $id
     * @return bool
     */
    public function isSandbox(?string $id = null): bool
    {
        return '';
    }

    /**
     * @param string|null $id
     * @return string
     */
    public function oAuthToken(?string $id = null): string
    {
       return '';
    }
}
