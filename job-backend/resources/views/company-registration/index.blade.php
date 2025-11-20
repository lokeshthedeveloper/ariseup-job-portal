@extends('layouts.app')

@section('title', 'Company Registration Portal - JobStock')

@section('content')

@include('includes.navbar-simple')

<!-- Hero Section Start -->
<section class="bg-main pt-5 pb-5">
    <div class="container">
        <div class="row justify-content-center text-center">
            <div class="col-xl-8 col-lg-9 col-md-10">
                <div class="sec-heading center">
                    <h2 class="mb-3 text-white">Find Top Talent for Your Company</h2>
                    <p class="fs-5 text-white opacity-75">Join thousands of companies using JobStock to discover and hire the best candidates</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Hero Section End -->

<!-- Features Section Start -->
<section class="gray-simple">
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-xl-6 col-lg-7 col-md-10 text-center">
                <div class="sec-heading center">
                    <h2 class="mb-3">Why Choose JobStock?</h2>
                    <p>Everything you need to build your dream team</p>
                </div>
            </div>
        </div>

        <div class="row g-4">
            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                <div class="card rounded-4 border-0 h-100">
                    <div class="card-body p-4">
                        <div class="mb-3">
                            <div class="square--70 circle bg-light-main text-main">
                                <i class="bi bi-building fs-2"></i>
                            </div>
                        </div>
                        <h5 class="mb-3">Company Profile</h5>
                        <p class="mb-0 text-muted">Create a comprehensive company profile to showcase your organization and attract top talent</p>
                    </div>
                </div>
            </div>

            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                <div class="card rounded-4 border-0 h-100">
                    <div class="card-body p-4">
                        <div class="mb-3">
                            <div class="square--70 circle bg-light-main text-main">
                                <i class="bi bi-shield-check fs-2"></i>
                            </div>
                        </div>
                        <h5 class="mb-3">Secure Verification</h5>
                        <p class="mb-0 text-muted">Email and SMS OTP verification to ensure account security and authenticity</p>
                    </div>
                </div>
            </div>

            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                <div class="card rounded-4 border-0 h-100">
                    <div class="card-body p-4">
                        <div class="mb-3">
                            <div class="square--70 circle bg-light-main text-main">
                                <i class="bi bi-people fs-2"></i>
                            </div>
                        </div>
                        <h5 class="mb-3">Talent Pool</h5>
                        <p class="mb-0 text-muted">Access a wide pool of qualified candidates ready to join your team</p>
                    </div>
                </div>
            </div>

            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                <div class="card rounded-4 border-0 h-100">
                    <div class="card-body p-4">
                        <div class="mb-3">
                            <div class="square--70 circle bg-light-main text-main">
                                <i class="bi bi-briefcase fs-2"></i>
                            </div>
                        </div>
                        <h5 class="mb-3">Job Posting</h5>
                        <p class="mb-0 text-muted">Post unlimited jobs and manage all applications in one place</p>
                    </div>
                </div>
            </div>

            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                <div class="card rounded-4 border-0 h-100">
                    <div class="card-body p-4">
                        <div class="mb-3">
                            <div class="square--70 circle bg-light-main text-main">
                                <i class="bi bi-graph-up fs-2"></i>
                            </div>
                        </div>
                        <h5 class="mb-3">Analytics Dashboard</h5>
                        <p class="mb-0 text-muted">Track your job postings performance and application metrics</p>
                    </div>
                </div>
            </div>

            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                <div class="card rounded-4 border-0 h-100">
                    <div class="card-body p-4">
                        <div class="mb-3">
                            <div class="square--70 circle bg-light-main text-main">
                                <i class="bi bi-lightning fs-2"></i>
                            </div>
                        </div>
                        <h5 class="mb-3">Quick Registration</h5>
                        <p class="mb-0 text-muted">Register with email, phone or use social login for instant access</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- CTA Section -->
        <div class="row justify-content-center mt-5">
            <div class="col-xl-10 col-lg-11">
                <div class="card bg-main rounded-4 border-0">
                    <div class="card-body p-5 text-center">
                        <h3 class="text-white mb-4">Ready to Find Your Next Great Hire?</h3>
                        <p class="text-white opacity-75 mb-4 fs-6">Join thousands of companies already using JobStock</p>
                        <div class="d-flex gap-3 justify-content-center flex-wrap">
                            <a href="{{ route('company.register') }}" class="btn btn-whites fw-medium px-4 py-3">
                                <i class="bi bi-person-plus me-2"></i>Register Your Company
                            </a>
                            <a href="{{ route('company.login') }}" class="btn btn-outline-light fw-medium px-4 py-3">
                                <i class="bi bi-box-arrow-in-right me-2"></i>Sign In
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Features Section End -->

@include('includes.footer-simple')

@endsection
