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
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ContactController;

// Frontend Routes
Route::get('/', function () {
    return view('frontend.home');
})->name('home');

Route::get('/test-route', function () {
    return 'Test route works!';
});

// Blog Routes
Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
Route::get('/blog/{slug}', [BlogController::class, 'show'])->name('blog.show');

// Contact Routes
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit');

use App\Http\Controllers\Frontend\CompanyController as FrontendCompanyController;

// Company Authentication Routes
Route::prefix('company')->name('company.')->group(function () {
    Route::get('/login', [FrontendCompanyController::class, 'login'])->name('login');
    Route::post('/login', [FrontendCompanyController::class, 'loginSubmit'])->name('login.submit');
    Route::get('/register', [FrontendCompanyController::class, 'register'])->name('register');
    Route::get('/forgot-password', [FrontendCompanyController::class, 'forgotPassword'])->name('forgot-password');
    Route::post('/forgot-password', [FrontendCompanyController::class, 'forgotPasswordSubmit'])->name('forgot-password.submit');
    Route::get('/reset-password/{token}', [FrontendCompanyController::class, 'resetPassword'])->name('reset-password');
    Route::post('/reset-password', [FrontendCompanyController::class, 'resetPasswordSubmit'])->name('reset-password.submit');
    Route::get('/dashboard', [FrontendCompanyController::class, 'dashboard'])->name('dashboard');
});

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
    Route::middleware(['auth:admin'])->group(function () {
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
