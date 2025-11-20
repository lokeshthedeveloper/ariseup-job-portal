<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\CandidateController;
use App\Http\Controllers\EmployerController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ContactController;

Route::get('/', [HomeController::class, 'index']);
Route::get('/home-2', [HomeController::class, 'home2']);
Route::get('/home-3', [HomeController::class, 'home3']);
Route::get('/home-4', [HomeController::class, 'home4']);
Route::get('/home-5', [HomeController::class, 'home5']);
Route::get('/home-6', [HomeController::class, 'home6']);
Route::get('/home-7', [HomeController::class, 'home7']);
Route::get('/home-8', [HomeController::class, 'home8']);
Route::get('/home-9', [HomeController::class, 'home9']);
Route::get('/home-10', [HomeController::class, 'home10']);
Route::get('/home-11', [HomeController::class, 'home11']);
Route::get('/home-12', [HomeController::class, 'home12']);

Route::get('/grid-style-1', [HomeController::class, 'gridStyle1']);
Route::get('/grid-style-2', [HomeController::class, 'gridStyle2']);
Route::get('/grid-style-3', [HomeController::class, 'gridStyle3']);
Route::get('/grid-style-4', [HomeController::class, 'gridStyle4']);
Route::get('/grid-style-5', [HomeController::class, 'gridStyle5']);
Route::get('/full-job-grid-1', [HomeController::class, 'fullJobGrid1']);
Route::get('/full-job-grid-2', [HomeController::class, 'fullJobGrid2']);
Route::get('/list-style-1', [HomeController::class, 'listStyle1']);
Route::get('/list-style-2', [HomeController::class, 'listStyle2']);
Route::get('/list-style-3', [HomeController::class, 'listStyle3']);
Route::get('/full-job-list-1', [HomeController::class, 'fullJobList1']);
Route::get('/full-job-list-2', [HomeController::class, 'fullJobList2']);

Route::get('/half-map', [HomeController::class, 'halfMap']);
Route::get('/half-map-2', [HomeController::class, 'halfMap2']);
Route::get('/half-map-3', [HomeController::class, 'halfMap3']);
Route::get('/half-map-list-1', [HomeController::class, 'halfMapList1']);
Route::get('/half-map-list-2', [HomeController::class, 'halfMapList2']);

Route::get('/candidate-grid-1', [HomeController::class, 'candidateGrid1']);
Route::get('/candidate-grid-2', [HomeController::class, 'candidateGrid2']);
Route::get('/candidate-list-1', [HomeController::class, 'candidateList1']);
Route::get('/candidate-list-2', [HomeController::class, 'candidateList2']);
Route::get('/candidate-half-map', [HomeController::class, 'candidateHalfMap']);
Route::get('/candidate-half-map-list', [HomeController::class, 'candidateHalfMapList']);

Route::get('/single-layout-1', [HomeController::class, 'singleLayout1']);
Route::get('/single-layout-2', [HomeController::class, 'singleLayout2']);
Route::get('/single-layout-3', [HomeController::class, 'singleLayout3']);
Route::get('/single-layout-4', [HomeController::class, 'singleLayout4']);
Route::get('/single-layout-5', [HomeController::class, 'singleLayout5']);
Route::get('/single-layout-6', [HomeController::class, 'singleLayout6']);

Route::get('/candidate-detail', [HomeController::class, 'candidateDetail']);
Route::get('/candidate-detail/{title}', [CandidateController::class, 'show'])->name('candidate-detail');

Route::get('/candidate-detail-2', [HomeController::class, 'candidateDetail2']);
Route::get('/candidate-detail-3', [HomeController::class, 'candidateDetail3']);

Route::get('/advance-search', [HomeController::class, 'advanceSearch']);

Route::get('/candidate-dashboard', [HomeController::class, 'candidateDashboard']);
Route::get('/candidate-profile', [HomeController::class, 'candidateProfile']);
Route::get('/candidate-resume', [HomeController::class, 'candidateResume']);
Route::get('/candidate-applied-jobs', [HomeController::class, 'candidateAppliedJobs']);
Route::get('/candidate-alert-job', [HomeController::class, 'candidateAlertJob']);
Route::get('/candidate-saved-jobs', [HomeController::class, 'candidateSavedJobs']);
Route::get('/candidate-follow-employers', [HomeController::class, 'candidateFollowEmployers']);
Route::get('/candidate-messages', [HomeController::class, 'candidateMessages']);
Route::get('/candidate-change-password', [HomeController::class, 'candidateChangePassword']);
Route::get('/candidate-delete-account', [HomeController::class, 'candidateDeleteAccount']);

Route::get('/employer-grid-1', [HomeController::class, 'employerGrid1']);
Route::get('/employer-grid-2', [HomeController::class, 'employerGrid2']);
Route::get('/employer-list-1', [HomeController::class, 'employerList1']);
Route::get('/employer-half-map', [HomeController::class, 'employerHalfMap']);
Route::get('/employer-half-map-list', [HomeController::class, 'employerHalfMapList']);

Route::get('/employer-detail', [HomeController::class, 'employerDetail']);
Route::get('/employer-detail/{title}', [EmployerController::class, 'show'])->name('employer-detail');

Route::get('/employer-detail-2', [HomeController::class, 'employerDetail2']);

Route::get('/employer-dashboard', [HomeController::class, 'employerDashboard']);
Route::get('/employer-profile', [HomeController::class, 'employerProfile']);
Route::get('/employer-jobs', [HomeController::class, 'employerJobs']);
Route::get('/employer-submit-job', [HomeController::class, 'employerSubmitJob']);
Route::get('/employer-applicants-jobs', [HomeController::class, 'employerApplicantsJobs']);
Route::get('/employer-shortlist-candidates', [HomeController::class, 'employerShortlistCandidates']);
Route::get('/employer-package', [HomeController::class, 'employerPackage']);
Route::get('/employer-messages', [HomeController::class, 'employerMessages']);
Route::get('/employer-change-password', [HomeController::class, 'employerChangePassword']);
Route::get('/employer-delete-account', [HomeController::class, 'employerDeleteAccount']);

Route::get('/about-us', [HomeController::class, 'aboutUs']);
Route::get('/404', [HomeController::class, 'notFound']);
Route::get('/checkout', [HomeController::class, 'checkout']);
Route::get('/blog', [HomeController::class, 'blog']);

Route::get('/blog-detail', [HomeController::class, 'blogDetail']);
Route::get('/blog-detail/{title}', [BlogController::class, 'show'])->name('blog-detail');

Route::get('/privacy', [HomeController::class, 'privacy']);
Route::get('/pricing', [HomeController::class, 'pricing']);
Route::get('/faq', [HomeController::class, 'faq']);
Route::get('/contact', [HomeController::class, 'contact']);

Route::get('/contactus', [ContactController::class, 'show'])->name('contact.show');
Route::post('/contactus', [ContactController::class, 'send'])->name('contact.send');

Route::get('/help', [HomeController::class, 'help']);

Route::get('/job-detail', [HomeController::class, 'jobDetail']);
Route::get('/job-detail/{title}', [JobController::class, 'show'])->name('job-detail');

Route::get('/signup', [HomeController::class, 'signup']);
Route::get('/slider-home', [HomeController::class, 'sliderHome']);