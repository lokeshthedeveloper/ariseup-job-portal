<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\CompanyController;
use App\Http\Controllers\Frontend\CompanyThemeController;

/*
|--------------------------------------------------------------------------
| Company Routes
|--------------------------------------------------------------------------
|
| Here are all routes related to company portal functionality.
| These routes are prefixed with 'company' and use the company middleware.
|
*/

// Company Registration OTP Verification Route
Route::get('/company-registration/verify-otp', [CompanyController::class, 'showVerifyOtp'])->name('company.verify-otp');

// Company Authentication Routes
Route::prefix('company')->name('company.')->group(function () {
    // Guest routes (not authenticated)
    Route::middleware('guest')->group(function () {
        Route::get('/login', [CompanyController::class, 'login'])->name('login');
        Route::post('/login', [CompanyController::class, 'loginSubmit'])->name('login.submit');
        Route::get('/forgot-password', [CompanyController::class, 'forgotPassword'])->name('forgot-password');
        Route::post('/forgot-password', [CompanyController::class, 'forgotPasswordSubmit'])->name('forgot-password.submit');
        Route::get('/reset-password/{token}', [CompanyController::class, 'resetPassword'])->name('reset-password');
        Route::post('/reset-password', [CompanyController::class, 'resetPasswordSubmit'])->name('reset-password.submit');
    });

    // Registration Routes (Accessible to Guest and Auth)
    Route::get('/register', [CompanyController::class, 'register'])->name('register');
    Route::post('/register', [CompanyController::class, 'registerSubmit'])->name('register.submit');

    // API-style routes moved to Web for Session Auth
    Route::post('/register-step1', [\App\Http\Controllers\Api\CompanyAuthController::class, 'registerStep1'])->name('register.step1');
    Route::post('/register-step2', [\App\Http\Controllers\Api\CompanyAuthController::class, 'registerStep2'])->name('register.step2');
    Route::post('/verify-otp', [\App\Http\Controllers\Api\CompanyAuthController::class, 'verifyOtp'])->name('verify.otp.submit');
    Route::post('/verify-both-otps', [\App\Http\Controllers\Api\CompanyAuthController::class, 'verifyBothOtps'])->name('verify.both.otps');
    Route::post('/resend-otp', [\App\Http\Controllers\Api\CompanyAuthController::class, 'resendOtp'])->name('resend.otp');

    // Location AJAX Routes (accessible to all)
    Route::get('/get-states/{country_id}', [CompanyController::class, 'getStates'])->name('get-states');
    Route::get('/get-districts/{state_id}', [CompanyController::class, 'getDistricts'])->name('get-districts');
    Route::get('/get-cities/{district_id}', [CompanyController::class, 'getCities'])->name('get-cities');

    // Protected routes (require authentication and verification)
    Route::middleware(['auth', 'company.verified'])->group(function () {
        // Dashboard
        Route::get('/dashboard', [CompanyController::class, 'dashboard'])->name('dashboard');

        // Profile Management
        Route::get('/profile', [CompanyController::class, 'profile'])->name('profile');
        Route::put('/profile', [CompanyController::class, 'updateProfile'])->name('profile.update');

        // Theme Management
        Route::get('/theme', [CompanyThemeController::class, 'index'])->name('theme.index');
        Route::put('/theme', [CompanyThemeController::class, 'update'])->name('theme.update');

        // Logout
        Route::post('/logout', [CompanyController::class, 'logout'])->name('logout');
    });
});
