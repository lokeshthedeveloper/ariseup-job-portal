<?php

namespace App\Services;

use App\Models\User;
use App\Models\SocialAccount;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class SocialAuthService
{
    /**
     * Redirect to social provider
     */
    public function redirectToProvider(string $provider)
    {
        $this->validateProvider($provider);

        return Socialite::driver($provider)->redirect();
    }

    /**
     * Handle callback from social provider
     */
    public function handleProviderCallback(string $provider): array
    {
        $this->validateProvider($provider);

        try {
            $socialUser = Socialite::driver($provider)->user();
        } catch (\Exception $e) {
            return [
                'success' => false,
                'message' => 'Failed to authenticate with ' . $provider,
            ];
        }

        // Check if social account exists
        $socialAccount = SocialAccount::where('provider', $provider)
            ->where('provider_id', $socialUser->getId())
            ->first();

        if ($socialAccount) {
            // Update tokens
            $socialAccount->update([
                'provider_token' => $socialUser->token,
                'provider_refresh_token' => $socialUser->refreshToken,
            ]);

            $user = $socialAccount->user;
        } else {
            // Check if user with this email exists
            $user = User::where('email', $socialUser->getEmail())->first();

            if (!$user) {
                // Create new user
                $user = User::create([
                    'name' => $socialUser->getName(),
                    'email' => $socialUser->getEmail(),
                    'email_verified_at' => now(),
                    'password' => Hash::make(Str::random(24)),
                    'role' => 'company',
                ]);
            }

            // Create social account
            SocialAccount::create([
                'user_id' => $user->id,
                'provider' => $provider,
                'provider_id' => $socialUser->getId(),
                'provider_token' => $socialUser->token,
                'provider_refresh_token' => $socialUser->refreshToken,
            ]);
        }

        // Generate API token
        $token = $user->createToken('auth_token')->plainTextToken;

        return [
            'success' => true,
            'user' => $user,
            'token' => $token,
        ];
    }

    /**
     * Validate provider
     */
    protected function validateProvider(string $provider): void
    {
        if (!in_array($provider, ['google', 'facebook', 'linkedin'])) {
            throw new \InvalidArgumentException('Invalid social provider');
        }
    }
}
