<?php

namespace App\ProxyTypes\Shopify;

use StarEditions\ProvidesAPIProxySecret;

class ProvideAPIProxySecrets implements ProvidesAPIProxySecret
{
    public function findKey(string $id): string
    {
        return '7ef1fccf837de463786559ffef8dd96a';
    }

    public function findSecret(string $id): string
    {
        return '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';
    }
}
