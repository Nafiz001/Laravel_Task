<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ForceJsonResponse
{
    /**
     * Force every API request to be treated as a JSON client.
     *
     * This ensures unauthenticated/forbidden requests return clean JSON
     * (401/403) even when called from a browser, instead of Laravel trying
     * to redirect to a non-existent "login" route.
     */
    public function handle(Request $request, Closure $next): Response
    {
        $request->headers->set('Accept', 'application/json');

        return $next($request);
    }
}
