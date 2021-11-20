<?php

namespace App\Proxies\ShopifyProxy;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Interfaces\CanProvideRequestDetails;


class RequestInterpreter implements CanProvideRequestDetails {

    /**
     * @var Request
     */
    protected Request $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }
    /**
     * @return string
     */
    public function getIdentifier() : string
    {
        list(,,$shopId) = explode('.',$this->request->header('host'));
        return $shopId;
    }

    /**
     * @return string
     */
    public function getSignature() : string
    {
        return $this->request->bearerToken();
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
