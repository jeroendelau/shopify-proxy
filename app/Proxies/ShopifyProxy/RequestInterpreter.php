<?php

namespace App\Proxies\ShopifyProxy;

use App\Interfaces\CanProvideRequestDetails;
use Illuminate\Http\Request;

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
     * @return void
     */
    public function getIdentifier()
    {
        // TODO: Implement getIdentifier() method.
    }

    /**
     * @return void
     */
    public function getSignature()
    {
        // TODO: Implement getSignature() method.
    }

    /**
     * @return void
     */
    public function getMethod()
    {
        // TODO: Implement getMethod() method.
    }

    /**
     * @return void
     */
    public function getPath()
    {
        // TODO: Implement getPath() method.
    }

    /**
     * @return void
     */
    public function getPayload()
    {
        // TODO: Implement getPayload() method.
    }
}
