<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Company;
use App\Models\CompanyTheme;
use App\Models\Theme;

class CompanyController extends Controller
{
    /**
     * Show the company login form.
     */
    public function login()
    {
        return view('company.auth.login');
    }

    /**
     * Handle company login submission.
     */
    public function loginSubmit(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Attempt to log in using the 'web' guard (since users table is shared)
        // Assuming 'role' check is needed or if we use a separate guard
        if (\Auth::attempt($request->only('email', 'password'), $request->filled('remember'))) {
            $user = \Auth::user();
            if ($user->role === 'company') {
                // Check registration status
                if (!$user->company) {
                    return redirect()->route('company.register', ['step' => 2]);
                }

                // Check verification
                if (!$user->company->email_verified && !$user->company->phone_verified_at) {
                    return redirect()->route('company.verify-otp');
                }

                return redirect()->route('company.dashboard');
            }

            \Auth::logout();
            return back()->withErrors(['email' => 'Unauthorized access.']);
        }

        return back()->withErrors(['email' => 'The provided credentials are incorrect.']);
    }

    /**
     * Handle company logout.
     */
    public function logout(Request $request)
    {
        \Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('company.login');
    }

    /**
     * Show the company registration form.
     */
    public function register(Request $request)
    {
        $initialStep = 1;
        if (\Auth::check()) {
            $user = \Auth::user();

            // Check if user has completed all registration steps
            if ($user->company && ($user->company->email_verified || $user->company->phone_verified_at)) {
                // User is fully registered - don't allow them to go back
                return redirect()->route('company.dashboard')
                    ->with('info', 'Your profile is already complete. If you need to make changes, please contact the administrator.');
            }

            if (!$user->company) {
                $initialStep = 2;
            } elseif (!$user->company->email_verified && !$user->company->phone_verified_at) {
                // User has company but not verified - redirect to OTP verification
                return redirect()->route('company.verify-otp');
            }
        }

        if ($request->has('step')) {
            $initialStep = (int) $request->step;
        }

        $userId = \Auth::id();

        $countries = \App\Models\Country::where('status', 1)->get();
        return view('company.auth.register', compact('countries', 'initialStep', 'userId'));
    }

    /**
     * Show the OTP verification form.
     */
    public function showVerifyOtp()
    {
        $user = \Auth::user();
        if (!$user) {
            return redirect()->route('company.login');
        }

        // Check which verifications are needed
        $emailVerified = $user->email_verified_at !== null;
        $phoneVerified = $user->company && $user->company->phone_verified_at !== null;

        // If both are already verified, redirect to dashboard
        if ($emailVerified && $phoneVerified) {
            return redirect()->route('company.dashboard')
                ->with('success', 'Your account is already verified.');
        }

        // Get verification needs from session (set by middleware) or determine from user
        $verificationNeeded = session('verification_needed', [
            'email' => !$emailVerified,
            'phone' => !$phoneVerified,
        ]);

        return view('company.auth.verify-otp', [
            'email' => $user->email,
            'phone' => $user->phone ?? $user->company->phone ?? '',
            'emailVerified' => $emailVerified,
            'phoneVerified' => $phoneVerified,
            'verificationNeeded' => $verificationNeeded,
        ]);
    }

    public function getStates($country_id)
    {
        $states = \App\Models\State::where('country_id', $country_id)->where('status', 1)->get();
        return response()->json($states);
    }

    public function getDistricts($state_id)
    {
        $districts = \App\Models\District::where('state_id', $state_id)->where('status', 1)->get();
        return response()->json($districts);
    }

    public function getCities($district_id)
    {
        $cities = \App\Models\City::where('district_id', $district_id)->where('status', 1)->get();
        return response()->json($cities);
    }

    /**
     * Handle company registration submission.
     */
    public function registerSubmit(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'company_name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'country' => 'required|exists:countries,id',
            'state' => 'required|exists:states,id',
            'district' => 'required|exists:districts,id',
            'city' => 'required|exists:cities,id',
        ]);

        // Create User
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'role' => 'company', // Ensure role is set
        ]);

        // Get Location Names
        $country = \App\Models\Country::find($request->country)->name;
        $state = \App\Models\State::find($request->state)->name;
        $district = \App\Models\District::find($request->district)->name;
        $city = \App\Models\City::find($request->city)->name;

        // Create Company
        Company::create([
            'user_id' => $user->id,
            'name' => $request->company_name,
            'phone' => $request->phone,
            'company_email' => $request->email, // Default to user email
            'country' => $country,
            'state' => $state,
            'district' => $district,
            'city' => $city,
            'address' => "$city, $state, $country", // Default address
            'is_active' => true, // Or false if approval needed
        ]);

        // Login User
        Auth::login($user);

        return redirect()->route('company.dashboard')->with('success', 'Registration successful!');
    }

    /**
     * Show the forgot password form.
     */
    public function forgotPassword()
    {
        return view('company.auth.forgot-password');
    }

    /**
     * Handle forgot password submission.
     */
    public function forgotPasswordSubmit(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        // Logic to send reset link (using standard Laravel PasswordBroker)
        $status = \Password::sendResetLink($request->only('email'));

        if ($status === \Password::RESET_LINK_SENT) {
            return back()->with('status', __($status));
        }

        return back()->withErrors(['email' => __($status)]);
    }

    /**
     * Show the reset password form.
     */
    public function resetPassword($token)
    {
        return view('company.auth.reset-password', ['token' => $token]);
    }

    /**
     * Handle reset password submission.
     */
    public function resetPasswordSubmit(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed|min:8',
        ]);

        $status = \Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->forceFill([
                    'password' => $password
                ])->setRememberToken(\Str::random(60));

                $user->save();

                \Auth::login($user);
            }
        );

        if ($status === \Password::PASSWORD_RESET) {
            return redirect()->route('company.login')->with('status', __($status));
        }

        return back()->withErrors(['email' => __($status)]);
    }

    /**
     * Show the company dashboard.
     */
    public function dashboard()
    {
        $user = \Auth::user();

        // Check if user has completed company details
        if (!$user->company) {
            return redirect()->route('company.register', ['step' => 2])
                ->with('error', 'Please complete your company details first.');
        }

        // Check if user has verified their account
        if (!$user->company->email_verified && !$user->company->phone_verified_at) {
            return redirect()->route('company.verify-otp')
                ->with('error', 'Please verify your account first.');
        }

        $data = [
            'employee_count' => 120,
            'employer_count' => 43,
            'referral_count' => 89,
            'total_earning' => 24500,
            'total_post_jobs' => 65,
            'active_jobs' => 42,
            'inactive_jobs' => 23,
        ];

        return view('company.dashboard', compact('data'));
    }

    /**
     * Show the company profile edit form.
     */
    public function profile()
    {
        $user = \Auth::user();

        // Check if user has completed registration
        if (!$user->company) {
            return redirect()->route('company.register', ['step' => 2])
                ->with('error', 'Please complete your company details first.');
        }

        if (!$user->company->email_verified && !$user->company->phone_verified_at) {
            return redirect()->route('company.verify-otp')
                ->with('error', 'Please verify your account first.');
        }

        $company = $user->company;

        if (!$company) {
            return redirect()->route('company.dashboard')->with('error', 'Company profile not found.');
        }

        return view('company.profile.edit', compact('company', 'user'));
    }

    /**
     * Update the company profile.
     */
    public function updateProfile(Request $request)
    {
        $user = \Auth::user();
        $company = $user->company;

        if (!$company) {
            return redirect()->route('company.dashboard')->with('error', 'Company profile not found.');
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'company_email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:20',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'address' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:100',
            'state' => 'nullable|string|max:100',
            'country' => 'nullable|string|max:100',
            'facebook' => 'nullable|url',
            'linkedin' => 'nullable|url',
            'youtube' => 'nullable|url',
            'twitter' => 'nullable|url',
        ]);

        // Handle Logo Upload
        if ($request->hasFile('logo')) {
            $imageName = time() . '.' . $request->logo->extension();
            $request->logo->move(public_path('uploads/company/logos'), $imageName);
            $company->logo = 'uploads/company/logos/' . $imageName;
        }

        // Update Company Details
        $company->name = $request->name;
        $company->company_email = $request->company_email;
        $company->phone = $request->phone;
        $company->address = $request->address;
        $company->city = $request->city;
        $company->state = $request->state;
        $company->country = $request->country;

        // Update Social Media Links
        $socialMedia = [
            'facebook' => $request->facebook,
            'linkedin' => $request->linkedin,
            'youtube' => $request->youtube,
            'twitter' => $request->twitter,
        ];
        $company->social_media_links = $socialMedia;

        $company->save();

        return redirect()->route('company.profile')->with('success', 'Profile updated successfully.');
    }

    /**
     * Show the theme settings page.
     */
    public function themeSettings()
    {
        $user = \Auth::user();

        // Check if user has completed registration
        if (!$user->company) {
            return redirect()->route('company.register', ['step' => 2])
                ->with('error', 'Please complete your company details first.');
        }

        if (!$user->company->email_verified && !$user->company->phone_verified_at) {
            return redirect()->route('company.verify-otp')
                ->with('error', 'Please verify your account first.');
        }

        $company = $user->company;

        if (!$company) {
            return redirect()->route('company.dashboard')->with('error', 'Company profile not found.');
        }

        // Get all active themes grouped by section type
        $themes = \App\Models\Theme::where('is_active', true)->get()->groupBy('section_type');

        // Get current company themes
        $currentThemes = \App\Models\CompanyTheme::where('company_id', $company->id)
            ->pluck('theme_id', 'section_type')
            ->toArray();

        return view('company.theme-settings', compact('themes', 'currentThemes'));
    }

    /**
     * Update the theme settings.
     */
    public function updateThemeSettings(Request $request)
    {
        $user = \Auth::user();
        $company = $user->company;

        if (!$company) {
            return redirect()->route('company.dashboard')->with('error', 'Company profile not found.');
        }

        $data = $request->except('_token');

        foreach ($data as $sectionType => $themeId) {
            // Validate theme exists and matches section type
            $theme = \App\Models\Theme::find($themeId);
            if ($theme && $theme->section_type === str_replace('_', ' ', $sectionType)) {
                \App\Models\CompanyTheme::updateOrCreate(
                    [
                        'company_id' => $company->id,
                        'section_type' => $theme->section_type,
                    ],
                    [
                        'theme_id' => $themeId,
                    ]
                );
            }
        }

        return redirect()->route('company.theme-settings')->with('success', 'Theme settings updated successfully.');
    }
}
