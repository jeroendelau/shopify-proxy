<?php

namespace JayTeamWorlds\Proxy\Library\ShopifyProxy;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Http;

use JayTeamWorlds\Proxy\Library\Shared\SignatureManager;
use JayTeamWorlds\Proxy\Library\Interfaces\CanForwardRequests;

class ShopifyProxyController implements CanForwardRequests
{
    /**
     * @var array|string[]
     */
    protected array $shopifyRequestHeaders = [
        "Content-Type" => "application/json",
        "Accept"       => "application/json",
    ];

    /**
     * @var string
     */
    protected string $shopifyDomain = "myshopify.com";

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function forward(Request $request): JsonResponse
    {
        $requestDetailsProvider = new RequestInterpreter($request);
        $credentialProvider = new CredentialProvider();
        $signatureManager = new SignatureManager(
            $requestDetailsProvider,
            $credentialProvider
        );

        if ($requestDetailsProvider->hasSignature() AND !$signatureManager->verify()) {
          return \response()->json(null, 401);
        } else if (!$requestDetailsProvider->hasSignature()) {
            $signatureManager->sign();
        }

        $responseHeaders = ['XSignature' => $signatureManager->newSignature] ?: [];

        $credentialData = $credentialProvider->getAccess($requestDetailsProvider->getIdentifier());

        $responseFromShopify = Http::withHeaders($this->shopifyRequestHeaders)
            ->{$requestDetailsProvider->getMethod()}(
                "https://{$credentialData->api_key}:{$credentialData->password}@{$credentialData->shop_url}.{$this->shopifyDomain}/{$requestDetailsProvider->getPath()}"
            );

        return response()->json(
            $responseFromShopify->json(),
            $responseFromShopify->status(),
            $responseHeaders
        );
    }
}
