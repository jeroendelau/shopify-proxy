<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class RedirectToHomePage
{
    /**
     * Handle an incoming request.
     *
     * @param  Request  $request
     * @param  Closure  $next
     * @return RedirectResponse|Response
     */
    public function handle(Request $request, Closure $next)
    {
        if ($request->acceptsHtml()) {
            return redirect()->route('HomePage');
        }

        return $next($request);
    }
}
