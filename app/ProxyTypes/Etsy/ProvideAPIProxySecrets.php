<?php

namespace App\ProxyTypes\Etsy;

use StarEditions\ProvidesAPIProxySecret;

class ProvideAPIProxySecrets implements ProvidesAPIProxySecret
{
    public function findKey(string $id): string
    {
        return '';
    }

    public function findSecret(string $id): string
    {
        return '';
    }
}
