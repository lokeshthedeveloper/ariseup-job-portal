<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\CompanyController;
use App\Http\Controllers\Admin\SkillCategoryController;
use App\Http\Controllers\Admin\SkillController;
use App\Http\Controllers\Admin\UniversityController;
use App\Http\Controllers\Admin\EducationLevelController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\SpecializationController;
use App\Http\Controllers\Admin\IndustryController;
use App\Http\Controllers\Admin\JobTitleController;
use App\Http\Controllers\Admin\DepartmentController;
use App\Http\Controllers\Admin\RoleCategoryController;
use App\Http\Controllers\Admin\JobRoleController;
use App\Http\Controllers\Admin\CountryController;
use App\Http\Controllers\Admin\StateController;
use App\Http\Controllers\Admin\CityController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test-route', function () {
    return 'Test route works!';
});

// Company Registration Routes
Route::get('/company-registration', function () {
    return view('company-registration.index');
})->name('company.index');

Route::get('/company-registration/register', function () {
    return view('company-registration.register');
})->name('company.register');

Route::get('/company-registration/login', function () {
    return view('company-registration.login');
})->name('company.login');

Route::get('/company-registration/verify-otp', function () {
    return view('company-registration.verify-otp');
})->name('company.verify-otp');

Route::get('/company-registration/success', function () {
    return view('company-registration.success');
})->name('company.success');

// Admin Authentication Routes
Route::prefix('admin')->name('admin.')->group(function () {
    // Guest routes (not authenticated)
    Route::middleware('guest')->group(function () {
        Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
        Route::post('/login', [AuthController::class, 'login']);
        Route::get('/forgot-password', [AuthController::class, 'showForgotPasswordForm'])->name('password.request');
        Route::post('/forgot-password', [AuthController::class, 'sendResetLink'])->name('password.email');
        Route::get('/reset-password/{token}', [AuthController::class, 'showResetPasswordForm'])->name('password.reset');
        Route::post('/reset-password', [AuthController::class, 'resetPassword'])->name('password.update');
    });

    // Authenticated admin routes
    Route::middleware(['auth', 'admin'])->group(function () {
        Route::get('/dashboard', function () {
            return view('admin.dashboard');
        })->name('dashboard');

        Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

        // Company management routes
        Route::resource('companies', CompanyController::class);
        Route::post('companies/bulk-delete', [CompanyController::class, 'bulkDelete'])->name('companies.bulk-delete');

        // Skill Category management routes
        Route::resource('skill-categories', SkillCategoryController::class);
        Route::patch('skill-categories/{skillCategory}/toggle-status', [SkillCategoryController::class, 'toggleStatus'])
            ->name('skill-categories.toggle-status');

        // Skill management routes
        Route::resource('skills', SkillController::class);
        Route::patch('skills/{skill}/toggle-status', [SkillController::class, 'toggleStatus'])
            ->name('skills.toggle-status');

        // University management routes
        Route::resource('universities', UniversityController::class);
        Route::patch('universities/{university}/toggle-status', [UniversityController::class, 'toggleStatus'])
            ->name('universities.toggle-status');

        // Education Level management routes
        Route::resource('education-levels', EducationLevelController::class);
        Route::patch('education-levels/{educationLevel}/toggle-status', [EducationLevelController::class, 'toggleStatus'])
            ->name('education-levels.toggle-status');

        // Course management routes
        Route::resource('courses', CourseController::class);
        Route::patch('courses/{course}/toggle-status', [CourseController::class, 'toggleStatus'])
            ->name('courses.toggle-status');

        // Specialization management routes
        Route::resource('specializations', SpecializationController::class);
        Route::patch('specializations/{specialization}/toggle-status', [SpecializationController::class, 'toggleStatus'])
            ->name('specializations.toggle-status');

        // Industry management routes
        Route::resource('industries', IndustryController::class);
        Route::patch('industries/{industry}/toggle-status', [IndustryController::class, 'toggleStatus'])
            ->name('industries.toggle-status');

        // Job Title management routes
        Route::resource('job-titles', JobTitleController::class);
        Route::patch('job-titles/{jobTitle}/toggle-status', [JobTitleController::class, 'toggleStatus'])
            ->name('job-titles.toggle-status');

        // Department management routes
        Route::resource('departments', DepartmentController::class);
        Route::patch('departments/{department}/toggle-status', [DepartmentController::class, 'toggleStatus'])
            ->name('departments.toggle-status');

        // Role Category management routes
        Route::resource('role-categories', RoleCategoryController::class);
        Route::patch('role-categories/{roleCategory}/toggle-status', [RoleCategoryController::class, 'toggleStatus'])
            ->name('role-categories.toggle-status');

        // Job Role management routes
        Route::resource('job-roles', JobRoleController::class);
        Route::patch('job-roles/{jobRole}/toggle-status', [JobRoleController::class, 'toggleStatus'])
            ->name('job-roles.toggle-status');

        // Country management routes
        Route::resource('countries', CountryController::class);
        Route::patch('countries/{country}/toggle-status', [CountryController::class, 'toggleStatus'])
            ->name('countries.toggle-status');

        // State management routes
        Route::resource('states', StateController::class);
        Route::patch('states/{state}/toggle-status', [StateController::class, 'toggleStatus'])
            ->name('states.toggle-status');

        // City management routes
        Route::resource('cities', CityController::class);
        Route::patch('cities/{city}/toggle-status', [CityController::class, 'toggleStatus'])
            ->name('cities.toggle-status');
    });
});
