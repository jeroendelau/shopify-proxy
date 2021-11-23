<?php

namespace JayTeamWorlds\Proxy\Library\EbayProxy;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Http;

use JayTeamWorlds\Proxy\Library\Shared\SignatureManager;
use JayTeamWorlds\Proxy\Library\Interfaces\CanForwardRequests;

class EbayProxyController implements CanForwardRequests
{
    /**
     * @var array|string[]
     */
    protected array $ebayRequestHeaders = [
        "Content-Type" => "application/json",
    ];

    /**
     * @var string
     */
    protected string $ebayDomain = "myshopify.com";

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

        $responseFromShopify = Http::withHeaders($this->ebayRequestHeaders)
            ->accept('application/json')
            ->{$requestDetailsProvider->getMethod()}(
                "https://{$this->ebayDomain}/{}/{$requestDetailsProvider->getPath()}"
            );

        return response()->json($responseFromShopify->json());
    }
}
