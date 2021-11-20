<?php

namespace App\Proxies\ShopifyProxy;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Http;

use App\Shared\SignatureManager;
use App\Interfaces\CanForwardRequests;

class ShopifyProxyController implements CanForwardRequests
{
    /**
     * @var array|string[]
     */
    protected array $shopifyRequestHeaders = [
        "Content-Type" => "application/json",
       // "X-Shopify-Access-Token" => "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"
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

        /**
         * Temporary signing for dev. purpose.
         */
        $signatureManager->sign();

        if (!$signatureManager->verify()) {
            return response()->json(null, 401);
        }

        $credentialData = $credentialProvider->getAccess($requestDetailsProvider->getIdentifier());
        /**
         * Password for private apps
         *   curl -X GET \
         *   https://{shop}.myshopify.com/admin/api/2021-10/shop.json \
         *    -H 'Content-Type: application/json' \
         *    -H 'X-Shopify-Access-Token: {password}'
         */
         //$this->shopifyRequestHeaders['X-Shopify-Access-Token'] = $credentialData->password;

        $responseFromShopify = Http::withHeaders($this->shopifyRequestHeaders)
            ->accept('application/json')
            ->{$requestDetailsProvider->getMethod()}(
                /**
                 * Example url: https://7ef1fccf837de463786559ffef8dd96a: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@pnzdevteststore.myshopify.com/admin/api/2021-10/shop
                 */
                "https://{$credentialData->api_key}:{$credentialData->password}@{$credentialData->id}.{$this->shopifyDomain}/{$requestDetailsProvider->getPath()}"
            );

        return response()->json($responseFromShopify->json());
    }
}
