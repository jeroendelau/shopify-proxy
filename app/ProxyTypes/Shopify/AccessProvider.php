<?php

namespace App\ProxyTypes\Shopify;

use StarEditions\ApiProxy\Shopify\CanProvideShopifyAccess;

class AccessProvider implements CanProvideShopifyAccess {
    public function getApiKey(?string $id = null): string
    {
        return '7ef1fccf837de463786559ffef8dd96a';
    }

    public function getSecret(?string $id = null): string
    {
        return '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';
    }

    public function getSharedSecret(?string $id = null): string
    {
       return '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';
    }

    public function getShopUrl(?string $id = null): string
    {
        return 'pnzdevteststore';
    }
}
