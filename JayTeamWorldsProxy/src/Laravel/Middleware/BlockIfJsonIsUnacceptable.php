<?php

namespace JayTeamWorlds\Proxy\Laravel\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;

class BlockIfJsonIsUnacceptable
{
    /**
     * Handle an incoming request.
     *
     * @param  Request  $request
     * @param  Closure  $next
     * @return RedirectResponse|Response|JsonResponse
     */
    public function handle(Request $request, Closure $next): Response|RedirectResponse|JsonResponse
    {
        if ($request->acceptsHtml() || !$request->acceptsJson())
            return \response(null, 406);

        if (!$request->hasHeader('php-auth-user') OR !$request->hasHeader('php-auth-pw'))
            return \response(null, 401);

        return $next($request);
    }
}
