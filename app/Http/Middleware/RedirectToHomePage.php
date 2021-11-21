<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;

class RedirectToHomePage
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
        if ($request->acceptsHtml())
        {
            return \redirect()->route('HomePage');
        }
        else if (!$request->acceptsJson())
        {
            return \response(null, 406);
        }
        else if (
            !$request->hasHeader('Authorization') OR
            ( $request->hasHeader('Authorization') AND ($request->bearerToken() === null) )
        )
        {
            return \response(null, 401);
        }

        return $next($request);
    }
}
