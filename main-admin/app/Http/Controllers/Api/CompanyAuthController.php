<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Company;
use App\Services\OtpService;
use App\Services\SocialAuthService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class CompanyAuthController extends Controller
{
    protected $otpService;
    protected $socialAuthService;

    public function __construct(OtpService $otpService, SocialAuthService $socialAuthService)
    {
        $this->otpService = $otpService;
        $this->socialAuthService = $socialAuthService;
    }

    /**
     * Step 1: Register User Details
     */
    public function registerStep1(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'phone' => 'required|string|max:20',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors(),
            ], 422);
        }

        try {
            // Create user
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'phone' => $request->phone,
                'role' => 'company',
            ]);

            return response()->json([
                'success' => true,
                'message' => 'User details registered successfully.',
                'user_id' => $user->id,
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Registration failed: ' . $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Step 2: Register Company Details
     */
    public function registerStep2(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|exists:users,id',
            'company_name' => 'required|string|max:255',
            'company_type' => 'required|in:company,consultancy',
            'verification_method' => 'required|in:email,phone',
            // Optional fields
            'logo' => 'nullable|string',
            'description' => 'nullable|string',
            'industry' => 'nullable|string',
            'company_size' => 'nullable|string',
            'country' => 'required|exists:countries,id',
            'state' => 'required|exists:states,id',
            'district' => 'required|exists:districts,id',
            'city' => 'required|exists:cities,id',
            'website' => 'nullable|string',
            'social_media_links' => 'nullable|json',
            'job_categories' => 'nullable|json',
            'about_us' => 'nullable|string',
            'open_positions_note' => 'nullable|string',
            'contact_info' => 'nullable|json',
            'employee_benefits' => 'nullable|string',
            'work_culture' => 'nullable|string',
            'notable_clients_projects' => 'nullable|string',
            'employee_reviews' => 'nullable|string',
            'diversity_inclusion' => 'nullable|string',
            'company_video' => 'nullable|string',
            'application_process' => 'nullable|string',
            'legal_information' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors(),
            ], 422);
        }

        try {
            $user = User::find($request->user_id);

            // Check if user already has a company
            if ($user->company) {
                return response()->json([
                    'success' => false,
                    'message' => 'User already has a registered company.',
                ], 400);
            }

            // Get Location Names
            $countryName = \App\Models\Country::find($request->country)->name;
            $stateName = \App\Models\State::find($request->state)->name;
            $districtName = \App\Models\District::find($request->district)->name;
            $cityName = \App\Models\City::find($request->city)->name;

            // Create company
            $company = Company::create([
                'user_id' => $user->id,
                'name' => $request->company_name,
                'company_type' => $request->company_type,
                'phone' => $user->phone, // Use user's phone for company initially
                'logo' => $request->logo,
                'description' => $request->description,
                'industry' => $request->industry,
                'company_size' => $request->company_size,
                'country' => $countryName,
                'state' => $stateName,
                'district' => $districtName,
                'city' => $cityName,
                'address' => "$cityName, $stateName, $countryName",
                'website' => $request->website,
                'social_media_links' => $request->social_media_links,
                'job_categories' => $request->job_categories,
                'about_us' => $request->about_us,
                'open_positions_note' => $request->open_positions_note,
                'contact_info' => $request->contact_info,
                'employee_benefits' => $request->employee_benefits,
                'work_culture' => $request->work_culture,
                'notable_clients_projects' => $request->notable_clients_projects,
                'employee_reviews' => $request->employee_reviews,
                'diversity_inclusion' => $request->diversity_inclusion,
                'company_video' => $request->company_video,
                'application_process' => $request->application_process,
                'legal_information' => $request->legal_information,
            ]);

            // Send OTP based on verification method
            $identifier = $request->verification_method === 'email' ? $user->email : $user->phone;
            $otpResult = $this->otpService->generateAndSend($identifier, $request->verification_method);

            return response()->json([
                'success' => true,
                'message' => 'Company details registered successfully. Please verify your ' . $request->verification_method,
                'user_id' => $user->id,
                'verification_method' => $request->verification_method,
                'otp_expires_at' => $otpResult['expires_at'],
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Registration failed: ' . $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Register a new company (Full registration - kept for backward compatibility)
     */
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'phone' => 'required|string|max:20',
            'company_name' => 'required|string|max:255',
            'company_type' => 'required|in:company,consultancy',
            'verification_method' => 'required|in:email,phone',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors(),
            ], 422);
        }

        try {
            // Create user
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'phone' => $request->phone,
                'role' => 'company',
            ]);

            // Create company
            $company = Company::create([
                'user_id' => $user->id,
                'name' => $request->company_name,
                'company_type' => $request->company_type,
                'phone' => $request->phone,
            ]);

            // Send OTP based on verification method
            $identifier = $request->verification_method === 'email' ? $request->email : $request->phone;
            $otpResult = $this->otpService->generateAndSend($identifier, $request->verification_method);

            return response()->json([
                'success' => true,
                'message' => 'Company registered successfully. Please verify your ' . $request->verification_method,
                'user_id' => $user->id,
                'verification_method' => $request->verification_method,
                'otp_expires_at' => $otpResult['expires_at'],
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Registration failed: ' . $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Verify OTP
     */
    public function verifyOtp(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'identifier' => 'required|string',
            'type' => 'required|in:email,phone',
            'otp' => 'required|string|size:6',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors(),
            ], 422);
        }

        $result = $this->otpService->verify($request->identifier, $request->type, $request->otp);

        if (!$result['success']) {
            return response()->json($result, 400);
        }

        // Update user verification status
        if ($request->type === 'email') {
            $user = User::where('email', $request->identifier)->first();
            if ($user) {
                $user->update(['email_verified_at' => now()]);
                if ($user->company) {
                    $user->company->update(['email_verified' => true]);
                }
            }
        } elseif ($request->type === 'phone') {
            $user = User::where('phone', $request->identifier)->first();
            if ($user) {
                $user->update(['phone_verified_at' => now()]);
                if ($user->company) {
                    $user->company->update(['phone_verified_at' => now()]);
                }
            }
        }

        // Generate API token
        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'success' => true,
            'message' => $result['message'],
            'user' => $user->load('company'),
            'token' => $token,
        ], 200);
    }

    /**
     * Resend OTP
     */
    public function resendOtp(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'identifier' => 'required|string',
            'type' => 'required|in:email,phone',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors(),
            ], 422);
        }

        $result = $this->otpService->generateAndSend($request->identifier, $request->type);

        return response()->json($result, 200);
    }

    /**
     * Login
     */
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors(),
            ], 422);
        }

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }

        if (!$user->isCompany()) {
            return response()->json([
                'success' => false,
                'message' => 'Unauthorized access',
            ], 403);
        }

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'success' => true,
            'user' => $user->load('company'),
            'token' => $token,
        ], 200);
    }

    /**
     * Logout
     */
    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'success' => true,
            'message' => 'Logged out successfully',
        ], 200);
    }

    /**
     * Redirect to social provider
     */
    public function redirectToProvider(string $provider)
    {
        try {
            return $this->socialAuthService->redirectToProvider($provider);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ], 400);
        }
    }

    /**
     * Handle social provider callback
     */
    public function handleProviderCallback(Request $request, string $provider)
    {
        $result = $this->socialAuthService->handleProviderCallback($provider);

        if (!$result['success']) {
            return response()->json($result, 400);
        }

        // If user doesn't have a company, create one
        $user = $result['user'];
        if (!$user->company) {
            Company::create([
                'user_id' => $user->id,
                'name' => $user->name . "'s Company",
                'company_type' => 'company',
                'email_verified' => true,
            ]);
        }

        return response()->json([
            'success' => true,
            'user' => $user->load('company'),
            'token' => $result['token'],
        ], 200);
    }

    /**
     * Get authenticated user
     */
    public function me(Request $request)
    {
        return response()->json([
            'success' => true,
            'user' => $request->user()->load('company'),
        ], 200);
    }
}
