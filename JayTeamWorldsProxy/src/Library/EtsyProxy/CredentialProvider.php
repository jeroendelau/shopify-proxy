<?php

namespace JayTeamWorlds\Proxy\Library\EtsyProxy;

use Illuminate\Database\Eloquent\Model;
use JayTeamWorlds\Proxy\Laravel\Models\EtsyToken;
use JayTeamWorlds\Proxy\Library\Interfaces\CanProvideAccess;

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
