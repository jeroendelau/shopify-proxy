<?php

namespace JayTeamWorlds\Proxy\Library\EtsyProxy;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Http;

use JayTeamWorlds\Proxy\Library\Shared\SignatureManager;
use JayTeamWorlds\Proxy\Library\Interfaces\CanForwardRequests;

class EtsyProxyController implements CanForwardRequests
{
    /**
     * @var array|string[]
     */
    protected array $etsyRequestHeaders = [
        'x-api-key' => "",
        'Authorization' => "Bearer "
    ];

    /**
     * @var string
     */
    protected string $etsyDomain = "openapi.etsy.com/v3/";

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



        $responseFromShopify = Http::withHeaders($this->etsyRequestHeaders)
            ->accept('application/json')
            ->{$requestDetailsProvider->getMethod()}(
                "https://{$this->etsyDomain}/{$requestDetailsProvider->getPath()}"
            );

        return response()->json($responseFromShopify->json());
    }
}
