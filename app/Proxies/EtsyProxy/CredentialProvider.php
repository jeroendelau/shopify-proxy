<?php

namespace App\Proxies\EtsyProxy;

use App\Models\EtsyToken;
use App\Interfaces\CanProvideAccess;
use Illuminate\Database\Eloquent\Model;

class CredentialProvider implements CanProvideAccess {
    /**
     * @param string $id
     * @return Model|null
     */
    public function getAccess(string $id): Model|null
    {
       return EtsyToken::find($id);
    }
}
