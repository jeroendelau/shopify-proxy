<?php

namespace JayTeamWorlds\Proxy\Library\ShopifyProxy;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use JayTeamWorlds\Proxy\Library\Interfaces\CanProvideRequestDetails;


class RequestInterpreter implements CanProvideRequestDetails {

    /**
     * @var Request
     */
    protected Request $request;

    //TODO Should accept other types or generate request object from the globals.
    public function __construct(Request $request)
    {
        $this->request = $request;
    }
    /**
     * @return string
     */
    public function getIdentifier() : string
    {
        return $this->request->header('php-auth-user');
    }

    /**
     * @return bool
     */
    public function hasSignature() : bool
    {
        return $this->request->hasHeader('XSignature');
    }

    /**
     * @return string
     */
    public function getSignature() : string
    {
        return $this->request->header('XSignature');
    }

    /**
     * @return string
     */
    public function getMethod() : string
    {
        return $this->request->getMethod();
    }

    /**
     * @return string
     */
    public function getPath() : string
    {
        //return Str::remove('/api', $this->request->getRequestUri());
        return $this->request->getRequestUri();
    }

    /**
     * @return array
     */
    public function getPayload() : array
    {
        return $this->request->all();
    }
}
