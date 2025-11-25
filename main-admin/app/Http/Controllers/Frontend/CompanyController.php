<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
                return redirect()->route('company.dashboard');
            }
            
            \Auth::logout();
            return back()->withErrors(['email' => 'Unauthorized access.']);
        }

        return back()->withErrors(['email' => 'The provided credentials are incorrect.']);
    }

    /**
     * Show the company registration form.
     */
    public function register()
    {
        return view('company.auth.register');
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
                    'password' => \Hash::make($password)
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
        return view('company.dashboard');
    }
}
