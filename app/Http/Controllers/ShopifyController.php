<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use StarEditions\SignatureManager;
use App\ProxyTypes\Shopify\AccessProvider;
use StarEditions\ApiProxy\Shopify\Forwarder;
use Psr\Http\Client\ClientExceptionInterface;
use App\ProxyTypes\Shopify\RequestDetailsProvider;
use App\ProxyTypes\Shopify\ProvideAPIProxySecrets;
use StarEditions\ApiProxy\Exceptions\InvalidSignatureException;

class ShopifyController extends Controller
{
    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function sendToForwarder(Request $request) : JsonResponse
    {
        $accessData = new AccessProvider();
        $prodiceSecrets = new ProvideAPIProxySecrets();
        $verifier = new SignatureManager($prodiceSecrets);
        $provideRequestData = new RequestDetailsProvider($request);

        try {
            $response = (new Forwarder($verifier, $accessData))->forward($provideRequestData);
            $data = json_decode($response->getBody()->getContents(), true);
            return response()->json($data, $response->getStatusCode());
        } catch (InvalidSignatureException $exception) {
            return response()->json($exception->getMessage(), 400);
        } catch (ClientExceptionInterface $exception) {
            return response()->json($exception->getMessage(), 400);
        }
    }
}
