<?php

namespace JayTeamWorlds\Proxy\Library\Interfaces;

use Illuminate\Database\Eloquent\Model;

interface CanProvideAccess
{
    /**
     * @param string $id
     * @return Model|null
     */
    public function getAccess(string $id) : Model|null;
}
