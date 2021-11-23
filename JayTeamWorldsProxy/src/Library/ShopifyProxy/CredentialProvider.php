<?php

namespace JayTeamWorlds\Proxy\Library\ShopifyProxy;

use Illuminate\Database\Eloquent\Model;
use JayTeamWorlds\Proxy\Laravel\Models\ShopifyStore;
use JayTeamWorlds\Proxy\Library\Interfaces\CanProvideAccess;

class CredentialProvider implements CanProvideAccess {
    /**
     * @param string $id
     * @return Model|null
     */
    public function getAccess(string $id): Model|null
    {
       return ShopifyStore::where('api_key', $id)->first();
    }
}
