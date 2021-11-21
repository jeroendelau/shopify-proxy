<?php

namespace App\Proxies\EbayProxy;

use App\Models\EbayToken;
use App\Interfaces\CanProvideAccess;
use Illuminate\Database\Eloquent\Model;

class CredentialProvider implements CanProvideAccess {
    /**
     * @param string $id
     * @return Model|null
     */
    public function getAccess(string $id): Model|null
    {
       return EbayToken::find($id);
    }
}
