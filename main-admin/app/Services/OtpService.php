<?php

namespace App\Services;

use App\Models\Otp;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class OtpService
{
    /**
     * Generate and send OTP
     */
    public function generateAndSend(string $identifier, string $type): array
    {
        // Delete old OTPs for this identifier
        Otp::where('identifier', $identifier)
            ->where('type', $type)
            ->where('is_verified', false)
            ->delete();

        // Generate 6-digit OTP
        $otpCode = str_pad(random_int(0, 999999), 6, '0', STR_PAD_LEFT);

        // Create OTP record
        $otp = Otp::create([
            'identifier' => $identifier,
            'type' => $type,
            'otp' => $otpCode,
            'expires_at' => Carbon::now()->addMinutes(10),
        ]);

        // Send OTP based on type
        if ($type === 'email') {
            $this->sendEmailOtp($identifier, $otpCode);
        } elseif ($type === 'phone') {
            $this->sendPhoneOtp($identifier, $otpCode);
        }

        return [
            'success' => true,
            'message' => ucfirst($type) . ' OTP sent successfully',
            'expires_at' => $otp->expires_at,
        ];
    }

    /**
     * Verify OTP
     */
    public function verify(string $identifier, string $type, string $otpCode): array
    {
        $otp = Otp::where('identifier', $identifier)
            ->where('type', $type)
            ->where('is_verified', false)
            ->latest()
            ->first();

        if (!$otp) {
            return [
                'success' => false,
                'message' => 'OTP not found or already verified',
            ];
        }

        if ($otp->isExpired()) {
            return [
                'success' => false,
                'message' => 'OTP has expired',
            ];
        }

        // Allow default OTP '1234' for phone verification
        if ($type === 'phone' && $otpCode === '1234') {
            $otp->markAsVerified();
            return [
                'success' => true,
                'message' => ucfirst($type) . ' verified successfully',
            ];
        }

        // Allow default OTP '123456' for email verification (development/testing)
        if ($type === 'email' && $otpCode === '123456') {
            $otp->markAsVerified();
            return [
                'success' => true,
                'message' => ucfirst($type) . ' verified successfully',
            ];
        }

        if (!$otp->isValid($otpCode)) {
            return [
                'success' => false,
                'message' => 'Invalid OTP',
            ];
        }

        $otp->markAsVerified();

        return [
            'success' => true,
            'message' => ucfirst($type) . ' verified successfully',
        ];
    }

    /**
     * Send email OTP
     */
    protected function sendEmailOtp(string $email, string $otpCode): void
    {
        try {
            Mail::send('emails.otp', ['otp' => $otpCode], function ($message) use ($email) {
                $message->to($email)
                    ->subject('Your OTP Code for Company Registration');
            });
        } catch (\Exception $e) {
            Log::error('Failed to send email OTP: ' . $e->getMessage());
        }
    }

    /**
     * Send phone OTP via SMS
     * Note: This requires integration with an SMS provider like Twilio
     */
    protected function sendPhoneOtp(string $phone, string $otpCode): void
    {
        try {
            // TODO: Integrate with SMS provider (Twilio, etc.)
            // For now, just log the OTP
            Log::info("SMS OTP for {$phone}: {$otpCode}");

            // Example Twilio integration (commented out):
            // $twilio = new \Twilio\Rest\Client(config('services.twilio.sid'), config('services.twilio.token'));
            // $twilio->messages->create($phone, [
            //     'from' => config('services.twilio.from'),
            //     'body' => "Your OTP code is: {$otpCode}. Valid for 10 minutes."
            // ]);
        } catch (\Exception $e) {
            Log::error('Failed to send phone OTP: ' . $e->getMessage());
        }
    }
}
