<?php

namespace App\Proxies\ShopifyProxy;

use App\Models\ShopifyStore;
use App\Interfaces\CanProvideAccess;
use Illuminate\Database\Eloquent\Model;

class CredentialProvider implements CanProvideAccess {
    /**
     * @param string $id
     * @return Model|null
     */
    public function getAccess(string $id): Model|null
    {
       return ShopifyStore::find($id);
    }
}
