<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class EnsureCompanyVerified
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::user();

        // Only apply to company users
        if (!$user || $user->role !== 'company') {
            return $next($request);
        }

        // Check if user has a company
        if (!$user->company) {
            return redirect()->route('company.register')
                ->with('error', 'Please complete your company registration.');
        }

        // Check if email or phone is not verified
        $emailVerified = $user->email_verified_at !== null;
        $phoneVerified = $user->company->phone_verified_at !== null;

        if (!$emailVerified || !$phoneVerified) {
            // Store which verifications are needed in session
            session([
                'verification_needed' => [
                    'email' => !$emailVerified,
                    'phone' => !$phoneVerified,
                ]
            ]);

            return redirect()->route('company.verify-otp')
                ->with('error', 'Please verify your account to continue.');
        }

        return $next($request);
    }
}
