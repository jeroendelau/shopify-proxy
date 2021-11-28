<?php

namespace App\ProxyTypes\Ebay;

use Illuminate\Http\Request;
use StarEditions\CanProvideRequestDetails;

class RequestDetailsProvider implements CanProvideRequestDetails
{
    /**
     * @var Request
     */
    protected Request $request;

    /**
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * @return string
     */
    public function getIdentifier(): string
    {
        // TODO Check URL and value
        list($identifier) = explode('/',$this->request->path());
        return $identifier;
    }

    /**
     * @return bool
     */
    public function hasSignature(): bool
    {
        return true;
    }

    /**
     * @return string
     */
    public function getSignature(): string
    {
        return '';
    }

    /**
     * @return string
     */
    public function getMethod(): string
    {
        return strtoupper($this->request->method());
    }

    /**
     * @return string
     */
    public function getPath(): string
    {
        return $this->request->getPathInfo();
    }

    /**
     * @return string
     */
    public function getPayload(): string
    {
        return json_encode($this->request->input());
    }
}
