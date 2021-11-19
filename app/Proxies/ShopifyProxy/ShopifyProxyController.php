<?php

namespace App\Proxies\ShopifyProxy;

use App\Interfaces\CanProvideAccess;
use Illuminate\Http\Request;
use Shopify\Context;
use Illuminate\Http\JsonResponse;
use Shopify\Exception\MissingArgumentException;

use App\Interfaces\CanForwardRequests;

class ShopifyProxyController implements CanForwardRequests
{

    public function __construct()
    {
        try {
            Context::initialize(
                env('SHOPIFY_API_KEY', ''),
                env('SHOPIFY_API_SECRET', ''),
                env('SHOPIFY_APP_SCOPE', ''),
                env('SHOPIFY_APP_HOST', ''),
                new ShopifySessionStorage()
            );
        } catch (MissingArgumentException $exception) {

        }
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function forward(Request $request): JsonResponse
    {
        // TODO: Implement forward() method.
        $interpreter = new RequestInterpreter($request);
        $provider = new CredentialProvider();

        return response()->json();
    }
}
