<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        if (! $request->expectsJson()) {
            // Check if the request is for company routes
            if ($request->is('company/*') || $request->routeIs('company.*')) {
                return route('company.login');
            }

            // Default redirect for other routes
            return route('login');
        }

        return null;
    }
}
