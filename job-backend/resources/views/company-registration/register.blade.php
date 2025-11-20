@extends('layouts.app')

@section('title', 'Company Registration - JobStock')

@section('content')

@include('includes.navbar-simple')

<!-- Registration Form Start -->
<section class="gray-simple">
    <div class="container">
        <!-- row Start -->
        <div class="row justify-content-center">

            <!-- Single Registration Card -->
            <div class="col-xl-8 col-lg-9 col-md-12">
                <div class="card rounded-4">
                    <div class="card-body p-4">

                        <!-- Header -->
                        <div class="form-heads d-block mb-4">
                            <div class="d-flex align-items-center justify-content-start gap-3">
                                <div class="head-caps">
                                    <h4>Register Your Company</h4>
                                    <p>Create your company profile and start hiring the best talent</p>
                                </div>
                            </div>
                        </div>

                        <!-- Progress Steps -->
                        <div class="steps-progress mb-4">
                            <div class="d-flex justify-content-between">
                                <div class="step-item active" data-step="1">
                                    <div class="step-circle">1</div>
                                    <span class="step-label">Account</span>
                                </div>
                                <div class="step-item" data-step="2">
                                    <div class="step-circle">2</div>
                                    <span class="step-label">Company</span>
                                </div>
                                <div class="step-item" data-step="3">
                                    <div class="step-circle">3</div>
                                    <span class="step-label">Verify</span>
                                </div>
                            </div>
                        </div>

                        <!-- Alert Messages -->
                        <div id="alertMessage" class="alert alert-dismissible fade" style="display: none;" role="alert">
                            <span id="alertText"></span>
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>

                        <!-- Registration Form -->
                        <form id="registrationForm" class="p-md-3">

                            <!-- Step 1: Account Information -->
                            <div class="form-step active" id="step1">
                                <h5 class="mb-4">Account Information</h5>
                                <div class="form-float d-flex flex-column gap-3">

                                    <div class="form-group mb-0">
                                        <label class="fw-medium fs-6 text-dark">Full Name<i class="text-danger text-md">*</i></label>
                                        <input type="text" id="name" name="name" class="form-control" placeholder="Enter your full name" required>
                                    </div>

                                    <div class="form-group mb-0">
                                        <label class="fw-medium fs-6 text-dark">Email Address<i class="text-danger text-md">*</i></label>
                                        <input type="email" id="email" name="email" class="form-control" placeholder="your.email@company.com" required>
                                        <span class="text-sm opacity-75">We'll send OTP to this email for verification</span>
                                    </div>

                                    <div class="form-group mb-0">
                                        <label class="fw-medium fs-6 text-dark">Phone Number<i class="text-danger text-md">*</i></label>
                                        <input type="tel" id="phone" name="phone" class="form-control" placeholder="+1 (555) 000-0000" required>
                                        <span class="text-sm opacity-75">For SMS OTP verification</span>
                                    </div>

                                    <div class="form-group mb-0">
                                        <label class="fw-medium fs-6 text-dark">Password<i class="text-danger text-md">*</i></label>
                                        <input type="password" id="password" name="password" class="form-control" placeholder="Minimum 8 characters" required>
                                    </div>

                                    <div class="form-group mb-0">
                                        <label class="fw-medium fs-6 text-dark">Confirm Password<i class="text-danger text-md">*</i></label>
                                        <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" placeholder="Re-enter your password" required>
                                    </div>

                                    <div class="form-group mb-0 mt-3">
                                        <button type="button" class="btn btn-main full-width" onclick="nextStep(2)">Continue to Company Details</button>
                                    </div>
                                </div>
                            </div>

                            <!-- Step 2: Company Details -->
                            <div class="form-step" id="step2">
                                <h5 class="mb-4">Company Details</h5>
                                <div class="form-float d-flex flex-column gap-3">

                                    <div class="form-group mb-0">
                                        <label class="fw-medium fs-6 text-dark">Company Name<i class="text-danger text-md">*</i></label>
                                        <input type="text" id="company_name" name="company_name" class="form-control" placeholder="Your company name" required>
                                    </div>

                                    <div class="form-group mb-0">
                                        <label class="fw-medium fs-6 text-dark">Company Type<i class="text-danger text-md">*</i></label>
                                        <select id="company_type" name="company_type" class="form-control" required>
                                            <option value="">Select company type</option>
                                            <option value="company">Company</option>
                                            <option value="consultancy">Consultancy</option>
                                        </select>
                                    </div>

                                    <div class="form-group mb-0">
                                        <label class="fw-medium fs-6 text-dark">Industry<i class="text-danger text-md">*</i></label>
                                        <input type="text" id="industry" name="industry" class="form-control" placeholder="e.g., Technology, Healthcare" required>
                                    </div>

                                    <div class="form-group mb-0">
                                        <label class="fw-medium fs-6 text-dark">Company Size<i class="text-danger text-md">*</i></label>
                                        <select id="company_size" name="company_size" class="form-control" required>
                                            <option value="">Select size</option>
                                            <option value="1-10">1-10 employees</option>
                                            <option value="11-50">11-50 employees</option>
                                            <option value="51-200">51-200 employees</option>
                                            <option value="201-500">201-500 employees</option>
                                            <option value="501+">501+ employees</option>
                                        </select>
                                    </div>

                                    <div class="form-group mb-0">
                                        <label class="fw-medium fs-6 text-dark">Location<i class="text-danger text-md">*</i></label>
                                        <input type="text" id="location" name="location" class="form-control" placeholder="City, Country" required>
                                    </div>

                                    <div class="form-group mb-0">
                                        <label class="fw-medium fs-6 text-dark">Website<i class="text-danger text-md">*</i></label>
                                        <input type="url" id="website" name="website" class="form-control" placeholder="https://yourcompany.com" required>
                                    </div>

                                    <div class="form-group mb-0">
                                        <label class="fw-medium fs-6 text-dark">About Company<i class="text-danger text-md">*</i></label>
                                        <textarea id="about_us" name="about_us" class="form-control" rows="4" placeholder="Brief description of your company" required></textarea>
                                    </div>

                                    <div class="form-group mb-0 mt-3 d-flex gap-2">
                                        <button type="button" class="btn btn-secondary" onclick="prevStep(1)">Back</button>
                                        <button type="button" class="btn btn-main flex-fill" onclick="nextStep(3)">Continue to Verification</button>
                                    </div>
                                </div>
                            </div>

                            <!-- Step 3: Verification Method -->
                            <div class="form-step" id="step3">
                                <h5 class="mb-4">Choose Verification Method</h5>
                                <div class="form-float d-flex flex-column gap-3">

                                    <p class="text-muted mb-3">Select how you want to verify your account</p>

                                    <div class="row g-3">
                                        <div class="col-md-6">
                                            <div class="sing-btn-groups">
                                                <input type="radio" class="btn-check" name="verification_method" id="verify_email" value="email">
                                                <label class="btn btn-md btn-outline-gray h-auto" for="verify_email">
                                                    <div class="d-flex align-items-center gap-3">
                                                        <div class="icons">
                                                            <i class="bi bi-envelope-fill text-main" style="font-size: 2rem;"></i>
                                                        </div>
                                                        <div class="btn-caps text-start">
                                                            <h6 class="mb-0 lh-base">Email Verification</h6>
                                                            <p class="m-0 text-md text-muted">Verify via email OTP</p>
                                                        </div>
                                                    </div>
                                                </label>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="sing-btn-groups">
                                                <input type="radio" class="btn-check" name="verification_method" id="verify_phone" value="phone">
                                                <label class="btn btn-md btn-outline-gray h-auto" for="verify_phone">
                                                    <div class="d-flex align-items-center gap-3">
                                                        <div class="icons">
                                                            <i class="bi bi-phone-fill text-main" style="font-size: 2rem;"></i>
                                                        </div>
                                                        <div class="btn-caps text-start">
                                                            <h6 class="mb-0 lh-base">SMS Verification</h6>
                                                            <p class="m-0 text-md text-muted">Verify via phone OTP</p>
                                                        </div>
                                                    </div>
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group mb-0">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="terms" required>
                                            <label class="form-check-label" for="terms">
                                                I agree to the <a href="#" class="text-main">Terms and Conditions</a> & <a href="#" class="text-main">Privacy Policy</a>
                                            </label>
                                        </div>
                                    </div>

                                    <div class="form-group mb-0 mt-3 d-flex gap-2">
                                        <button type="button" class="btn btn-secondary" onclick="prevStep(2)">Back</button>
                                        <button type="submit" id="submitBtn" class="btn btn-main flex-fill">Register & Send OTP</button>
                                    </div>
                                </div>
                            </div>

                        </form>

                        <div class="devider position-relative d-block mt-4">
                            <hr class="mb-4 mt-4">
                            <div class="position-absolute top-50 start-50 translate-middle"><span class="square--30 circle bg-white text-muted">OR</span></div>
                        </div>

                        <div class="social-signup d-flex flex-column gap-3 mb-3">
                            <button type="button" class="btn btn-gray rounded-pill w-100" onclick="socialLogin('google')">
                                <img src="{{ asset('assets/img/google.png') }}" class="img-fluid me-2" width="20" alt="Google">Continue with Google
                            </button>
                            <button type="button" class="btn btn-gray rounded-pill w-100" onclick="socialLogin('facebook')">
                                <img src="{{ asset('assets/img/facebook.png') }}" class="img-fluid me-2" width="20" alt="Facebook">Continue with Facebook
                            </button>
                            <button type="button" class="btn btn-gray rounded-pill w-100" onclick="socialLogin('linkedin')">
                                <img src="{{ asset('assets/img/linkedin.png') }}" class="img-fluid me-2" width="20" alt="LinkedIn">Continue with LinkedIn
                            </button>
                        </div>

                        <div class="text-center mt-3">
                            <p class="mb-0">Already have an account? <a href="{{ route('company.login') }}" class="text-main fw-medium">Sign In</a></p>
                        </div>

                    </div>
                </div>
            </div>

        </div>
        <!-- /row -->
    </div>
</section>
<!-- Registration Form End -->

@include('includes.footer-simple')

@endsection

@push('styles')
<style>
    .form-step {
        display: none;
    }
    .form-step.active {
        display: block;
    }
    .steps-progress {
        position: relative;
        padding: 20px 0;
    }
    .steps-progress::before {
        content: '';
        position: absolute;
        top: 50%;
        left: 10%;
        right: 10%;
        height: 2px;
        background: #e0e0e0;
        z-index: 0;
    }
    .step-item {
        text-align: center;
        position: relative;
        z-index: 1;
        flex: 1;
    }
    .step-circle {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        background: #fff;
        border: 2px solid #e0e0e0;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 8px;
        font-weight: 600;
        color: #999;
        transition: all 0.3s;
    }
    .step-item.active .step-circle {
        background: #0b8260;
        border-color: #0b8260;
        color: #fff;
    }
    .step-item.completed .step-circle {
        background: #4CAF50;
        border-color: #4CAF50;
        color: #fff;
    }
    .step-label {
        font-size: 13px;
        color: #666;
    }
    .step-item.active .step-label {
        color: #0b8260;
        font-weight: 600;
    }
    .btn.loading::after {
        content: '';
        display: inline-block;
        width: 16px;
        height: 16px;
        border: 2px solid #fff;
        border-top-color: transparent;
        border-radius: 50%;
        animation: spin 0.6s linear infinite;
        margin-left: 8px;
    }
    @keyframes spin {
        to { transform: rotate(360deg); }
    }
</style>
@endpush

@push('scripts')
<script src="{{ asset('company-assets/register.js') }}"></script>
@endpush
