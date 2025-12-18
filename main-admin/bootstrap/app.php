<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        api: __DIR__ . '/../routes/api.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->alias([
            'admin' => \App\Http\Middleware\IsAdmin::class,
            'company.verified' => \App\Http\Middleware\EnsureCompanyVerified::class,
        ]);

        // Ensure CORS middleware is active and runs first
        $middleware->prepend(\Illuminate\Http\Middleware\HandleCors::class);

        // Exclude API-style routes from CSRF verification
        $middleware->validateCsrfTokens(except: [
            'company/register-step1',
            'company/register-step2',
            'company/verify-otp',
            'company/verify-both-otps',
            'company/resend-otp',
        ]);

        // Redirect unauthenticated users to appropriate login page
        $middleware->redirectGuestsTo(function ($request) {
            if ($request->is('company/*') || $request->routeIs('company.*')) {
                return route('company.login');
            }
            return route('login');
        });
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
