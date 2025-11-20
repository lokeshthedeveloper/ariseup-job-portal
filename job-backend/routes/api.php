<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CompanyAuthController;
use App\Http\Controllers\Api\SkillCategoryController;
use App\Http\Controllers\Api\SkillController;
use App\Http\Controllers\Api\UniversityController;
use App\Http\Controllers\Api\EducationLevelController;
use App\Http\Controllers\Api\CourseController;
use App\Http\Controllers\Api\SpecializationController;
use App\Http\Controllers\Api\IndustryController;
use App\Http\Controllers\Api\JobTitleController;
use App\Http\Controllers\Api\DepartmentController;
use App\Http\Controllers\Api\RoleCategoryController;
use App\Http\Controllers\Api\JobRoleController;
use App\Http\Controllers\Api\CountryController;
use App\Http\Controllers\Api\StateController;
use App\Http\Controllers\Api\CityController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::prefix('company')->group(function () {
    // Public routes (no authentication required)
    Route::post('/register', [CompanyAuthController::class, 'register']);
    Route::post('/verify-otp', [CompanyAuthController::class, 'verifyOtp']);
    Route::post('/resend-otp', [CompanyAuthController::class, 'resendOtp']);
    Route::post('/login', [CompanyAuthController::class, 'login']);

    // Social authentication routes
    Route::get('/auth/{provider}', [CompanyAuthController::class, 'redirectToProvider']);
    Route::get('/auth/{provider}/callback', [CompanyAuthController::class, 'handleProviderCallback']);

    // Protected routes (authentication required)
    Route::middleware('auth:sanctum')->group(function () {
        Route::get('/me', [CompanyAuthController::class, 'me']);
        Route::post('/logout', [CompanyAuthController::class, 'logout']);
    });
});

/*
|--------------------------------------------------------------------------
| Skill Category Routes
|--------------------------------------------------------------------------
*/
Route::prefix('skill-categories')->group(function () {
    // Public routes
    Route::get('/', [SkillCategoryController::class, 'index']);
    Route::get('/active', [SkillCategoryController::class, 'active']);
    Route::get('/{id}', [SkillCategoryController::class, 'show']);

    // Protected routes (add authentication middleware if needed)
    // Route::middleware('auth:sanctum')->group(function () {
        Route::post('/', [SkillCategoryController::class, 'store']);
        Route::put('/{id}', [SkillCategoryController::class, 'update']);
        Route::patch('/{id}/toggle-status', [SkillCategoryController::class, 'toggleStatus']);
        Route::delete('/{id}', [SkillCategoryController::class, 'destroy']);
    // });
});

/*
|--------------------------------------------------------------------------
| Skill Routes
|--------------------------------------------------------------------------
*/
Route::prefix('skills')->group(function () {
    // Public routes
    Route::get('/', [SkillController::class, 'index']);
    Route::get('/active', [SkillController::class, 'active']);
    Route::get('/{id}', [SkillController::class, 'show']);
    Route::get('/category/{categoryId}', [SkillController::class, 'getByCategory']);

    // Protected routes (add authentication middleware if needed)
    // Route::middleware('auth:sanctum')->group(function () {
        Route::post('/', [SkillController::class, 'store']);
        Route::put('/{id}', [SkillController::class, 'update']);
        Route::patch('/{id}/toggle-status', [SkillController::class, 'toggleStatus']);
        Route::delete('/{id}', [SkillController::class, 'destroy']);
    // });
});

/*
|--------------------------------------------------------------------------
| University Routes
|--------------------------------------------------------------------------
*/
Route::prefix('universities')->group(function () {
    // Public routes
    Route::get('/', [UniversityController::class, 'index']);
    Route::get('/active', [UniversityController::class, 'active']);
    Route::get('/{id}', [UniversityController::class, 'show']);

    // Protected routes (add authentication middleware if needed)
    // Route::middleware('auth:sanctum')->group(function () {
        Route::post('/', [UniversityController::class, 'store']);
        Route::put('/{id}', [UniversityController::class, 'update']);
        Route::patch('/{id}/toggle-status', [UniversityController::class, 'toggleStatus']);
        Route::delete('/{id}', [UniversityController::class, 'destroy']);
    // });
});

/*
|--------------------------------------------------------------------------
| Education Level Routes
|--------------------------------------------------------------------------
*/
Route::prefix('education-levels')->group(function () {
    Route::get('/', [EducationLevelController::class, 'index']);
    Route::get('/active', [EducationLevelController::class, 'active']);
    Route::get('/{id}', [EducationLevelController::class, 'show']);
    Route::post('/', [EducationLevelController::class, 'store']);
    Route::put('/{id}', [EducationLevelController::class, 'update']);
    Route::patch('/{id}/toggle-status', [EducationLevelController::class, 'toggleStatus']);
    Route::delete('/{id}', [EducationLevelController::class, 'destroy']);
});

/*
|--------------------------------------------------------------------------
| Course Routes
|--------------------------------------------------------------------------
*/
Route::prefix('courses')->group(function () {
    Route::get('/', [CourseController::class, 'index']);
    Route::get('/active', [CourseController::class, 'active']);
    Route::get('/{id}', [CourseController::class, 'show']);
    Route::get('/education-level/{educationLevelId}', [CourseController::class, 'getByEducationLevel']);
    Route::post('/', [CourseController::class, 'store']);
    Route::put('/{id}', [CourseController::class, 'update']);
    Route::patch('/{id}/toggle-status', [CourseController::class, 'toggleStatus']);
    Route::delete('/{id}', [CourseController::class, 'destroy']);
});

/*
|--------------------------------------------------------------------------
| Specialization Routes
|--------------------------------------------------------------------------
*/
Route::prefix('specializations')->group(function () {
    Route::get('/', [SpecializationController::class, 'index']);
    Route::get('/active', [SpecializationController::class, 'active']);
    Route::get('/{id}', [SpecializationController::class, 'show']);
    Route::get('/course/{courseId}', [SpecializationController::class, 'getByCourse']);
    Route::post('/', [SpecializationController::class, 'store']);
    Route::put('/{id}', [SpecializationController::class, 'update']);
    Route::patch('/{id}/toggle-status', [SpecializationController::class, 'toggleStatus']);
    Route::delete('/{id}', [SpecializationController::class, 'destroy']);
});

/*
|--------------------------------------------------------------------------
| Industry Routes
|--------------------------------------------------------------------------
*/
Route::prefix('industries')->group(function () {
    Route::get('/', [IndustryController::class, 'index']);
    Route::get('/active', [IndustryController::class, 'active']);
    Route::get('/{id}', [IndustryController::class, 'show']);
    Route::post('/', [IndustryController::class, 'store']);
    Route::put('/{id}', [IndustryController::class, 'update']);
    Route::patch('/{id}/toggle-status', [IndustryController::class, 'toggleStatus']);
    Route::delete('/{id}', [IndustryController::class, 'destroy']);
});

/*
|--------------------------------------------------------------------------
| Job Title Routes
|--------------------------------------------------------------------------
*/
Route::prefix('job-titles')->group(function () {
    Route::get('/', [JobTitleController::class, 'index']);
    Route::get('/active', [JobTitleController::class, 'active']);
    Route::get('/{id}', [JobTitleController::class, 'show']);
    Route::get('/industry/{industryId}', [JobTitleController::class, 'getByIndustry']);
    Route::post('/', [JobTitleController::class, 'store']);
    Route::put('/{id}', [JobTitleController::class, 'update']);
    Route::patch('/{id}/toggle-status', [JobTitleController::class, 'toggleStatus']);
    Route::delete('/{id}', [JobTitleController::class, 'destroy']);
});

/*
|--------------------------------------------------------------------------
| Department Routes
|--------------------------------------------------------------------------
*/
Route::prefix('departments')->group(function () {
    Route::get('/', [DepartmentController::class, 'index']);
    Route::get('/active', [DepartmentController::class, 'active']);
    Route::get('/{id}', [DepartmentController::class, 'show']);
    Route::post('/', [DepartmentController::class, 'store']);
    Route::put('/{id}', [DepartmentController::class, 'update']);
    Route::patch('/{id}/toggle-status', [DepartmentController::class, 'toggleStatus']);
    Route::delete('/{id}', [DepartmentController::class, 'destroy']);
});

/*
|--------------------------------------------------------------------------
| Role Category Routes
|--------------------------------------------------------------------------
*/
Route::prefix('role-categories')->group(function () {
    Route::get('/', [RoleCategoryController::class, 'index']);
    Route::get('/active', [RoleCategoryController::class, 'active']);
    Route::get('/{id}', [RoleCategoryController::class, 'show']);
    Route::post('/', [RoleCategoryController::class, 'store']);
    Route::put('/{id}', [RoleCategoryController::class, 'update']);
    Route::patch('/{id}/toggle-status', [RoleCategoryController::class, 'toggleStatus']);
    Route::delete('/{id}', [RoleCategoryController::class, 'destroy']);
});

/*
|--------------------------------------------------------------------------
| Job Role Routes
|--------------------------------------------------------------------------
*/
Route::prefix('job-roles')->group(function () {
    Route::get('/', [JobRoleController::class, 'index']);
    Route::get('/active', [JobRoleController::class, 'active']);
    Route::get('/{id}', [JobRoleController::class, 'show']);
    Route::get('/category/{categoryId}', [JobRoleController::class, 'getByCategory']);
    Route::post('/', [JobRoleController::class, 'store']);
    Route::put('/{id}', [JobRoleController::class, 'update']);
    Route::patch('/{id}/toggle-status', [JobRoleController::class, 'toggleStatus']);
    Route::delete('/{id}', [JobRoleController::class, 'destroy']);
});

/*
|--------------------------------------------------------------------------
| Country Routes
|--------------------------------------------------------------------------
*/
Route::prefix('countries')->group(function () {
    Route::get('/', [CountryController::class, 'index']);
    Route::get('/active', [CountryController::class, 'active']);
    Route::get('/{id}', [CountryController::class, 'show']);
    Route::post('/', [CountryController::class, 'store']);
    Route::put('/{id}', [CountryController::class, 'update']);
    Route::patch('/{id}/toggle-status', [CountryController::class, 'toggleStatus']);
    Route::delete('/{id}', [CountryController::class, 'destroy']);
});

/*
|--------------------------------------------------------------------------
| State Routes
|--------------------------------------------------------------------------
*/
Route::prefix('states')->group(function () {
    Route::get('/', [StateController::class, 'index']);
    Route::get('/active', [StateController::class, 'active']);
    Route::get('/{id}', [StateController::class, 'show']);
    Route::get('/country/{countryId}', [StateController::class, 'getByCountry']);
    Route::post('/', [StateController::class, 'store']);
    Route::put('/{id}', [StateController::class, 'update']);
    Route::patch('/{id}/toggle-status', [StateController::class, 'toggleStatus']);
    Route::delete('/{id}', [StateController::class, 'destroy']);
});

/*
|--------------------------------------------------------------------------
| City Routes
|--------------------------------------------------------------------------
*/
Route::prefix('cities')->group(function () {
    Route::get('/', [CityController::class, 'index']);
    Route::get('/active', [CityController::class, 'active']);
    Route::get('/{id}', [CityController::class, 'show']);
    Route::get('/state/{stateId}', [CityController::class, 'getByState']);
    Route::get('/country/{countryId}', [CityController::class, 'getByCountry']);
    Route::post('/', [CityController::class, 'store']);
    Route::put('/{id}', [CityController::class, 'update']);
    Route::patch('/{id}/toggle-status', [CityController::class, 'toggleStatus']);
    Route::delete('/{id}', [CityController::class, 'destroy']);
});
