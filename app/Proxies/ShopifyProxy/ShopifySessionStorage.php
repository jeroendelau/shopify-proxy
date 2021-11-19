<?php

namespace App\Proxies\ShopifyProxy;

use Shopify\Auth\Session;
use Shopify\Auth\SessionStorage;

class ShopifySessionStorage implements SessionStorage
{

    /**
     * @param Session $session
     * @return bool
     */
    public function storeSession(Session $session): bool
    {
        // TODO: Implement storeSession() method.
        return true;
    }

    /**
     * @param string $sessionId
     * @return Session
     */
    public function loadSession(string $sessionId) : Session
    {
        // TODO: Implement loadSession() method.
        return new Session('','',true, '');
    }

    /**
     * @param string $sessionId
     * @return bool
     */
    public function deleteSession(string $sessionId): bool
    {
        // TODO: Implement deleteSession() method.
        return true;
    }
}
