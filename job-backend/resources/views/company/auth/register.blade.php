@extends('layouts.frontend')

@section('title', 'Company Registration - ' . config('app.name'))
@section('meta_description', 'Register your company and start hiring top talent today')
@section('body-class', 'company-registration-page')

@section('content')

    <!-- Page Title -->
    <div class="page-title" data-aos="fade">
        <div class="container">
            <nav class="breadcrumbs">
                <ol>
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li class="current">Company Registration</li>
                </ol>
            </nav>
            <h1>Register Your Company</h1>
        </div>
    </div><!-- End Page Title -->

    <!-- Registration Form Start -->
    <section class="registration-section section">
        <div class="container">
            <!-- row Start -->
            <div class="row justify-content-center">

                <!-- Single Registration Card -->
                <div class="col-xl-8 col-lg-9 col-md-12">
                    <div class="registration-card" data-aos="fade-up" data-aos-delay="100">

                        <!-- Header -->
                        <div class="form-heads text-center mb-4">
                            <h3>Create Your Company Profile</h3>
                            <p class="text-muted">Start hiring the best talent today</p>
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
                        <form id="registrationForm" class="registration-form">

                            <!-- Step 1: Account Information -->
                            <div class="form-step active" id="step1">
                                <h5 class="mb-4">Account Information</h5>
                                <div class="form-float d-flex flex-column gap-3">

                                    <div class="form-group mb-0">
                                        <label class="form-label">Full Name<span class="text-danger">*</span></label>
                                        <input type="text" id="name" name="name" class="form-control"
                                            placeholder="Enter your full name" required>
                                        <div class="error-message text-danger small mt-1"></div>
                                    </div>

                                    <div class="form-group mb-0">
                                        <label class="form-label">Email Address<span class="text-danger">*</span></label>
                                        <input type="email" id="email" name="email" class="form-control"
                                            placeholder="your.email@company.com" required>
                                        <small class="form-text text-muted">We'll send OTP to this email for
                                            verification</small>
                                        <div class="error-message text-danger small mt-1"></div>
                                    </div>

                                    <div class="form-group mb-0">
                                        <label class="form-label">Phone Number<span class="text-danger">*</span></label>
                                        <input type="tel" id="phone" name="phone" class="form-control"
                                            placeholder="+1 (555) 000-0000" required>
                                        <small class="form-text text-muted">For SMS OTP verification</small>
                                        <div class="error-message text-danger small mt-1"></div>
                                    </div>

                                    <div class="form-group mb-0">
                                        <label class="form-label">Password<span class="text-danger">*</span></label>
                                        <input type="password" id="password" name="password" class="form-control"
                                            placeholder="Minimum 8 characters" required>
                                        <div class="error-message text-danger small mt-1"></div>
                                    </div>

                                    <div class="form-group mb-0">
                                        <label class="form-label">Confirm Password<span class="text-danger">*</span></label>
                                        <input type="password" id="password_confirmation" name="password_confirmation"
                                            class="form-control" placeholder="Re-enter your password" required>
                                        <div class="error-message text-danger small mt-1"></div>
                                    </div>

                                    <div class="form-group mb-0 mt-3">
                                        <button type="button" class="btn btn-primary w-100" onclick="nextStep(2)">
                                            Continue to Company Details <i class="bi bi-arrow-right ms-2"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <!-- Step 2: Company Details -->
                            <div class="form-step" id="step2">
                                <h5 class="mb-4">Company Details</h5>
                                <div class="form-float d-flex flex-column gap-3">

                                    <div class="form-group mb-0">
                                        <label class="form-label">Company Name<span class="text-danger">*</span></label>
                                        <input type="text" id="company_name" name="company_name" class="form-control"
                                            placeholder="Your company name" required>
                                        <div class="error-message text-danger small mt-1"></div>
                                    </div>

                                    <div class="form-group mb-0">
                                        <label class="form-label">Company Type<span class="text-danger">*</span></label>
                                        <select id="company_type" name="company_type" class="form-control form-select"
                                            required>
                                            <option value="">Select company type</option>
                                            <option value="company">Company</option>
                                            <option value="consultancy">Consultancy</option>
                                        </select>
                                        <div class="error-message text-danger small mt-1"></div>
                                    </div>

                                    <div class="form-group mb-0">
                                        <label class="form-label">Industry<span class="text-danger">*</span></label>
                                        <input type="text" id="industry" name="industry" class="form-control"
                                            placeholder="e.g., Technology, Healthcare" required>
                                        <div class="error-message text-danger small mt-1"></div>
                                    </div>

                                    <div class="form-group mb-0">
                                        <label class="form-label">Company Size<span class="text-danger">*</span></label>
                                        <select id="company_size" name="company_size" class="form-control form-select"
                                            required>
                                            <option value="">Select size</option>
                                            <option value="1-10">1-10 employees</option>
                                            <option value="11-50">11-50 employees</option>
                                            <option value="51-200">51-200 employees</option>
                                            <option value="201-500">201-500 employees</option>
                                            <option value="501+">501+ employees</option>
                                        </select>
                                        <div class="error-message text-danger small mt-1"></div>
                                    </div>

                                    <div class="form-group mb-0">
                                        <label class="form-label">Location<span class="text-danger">*</span></label>
                                        <input type="text" id="location" name="location" class="form-control"
                                            placeholder="City, Country" required>
                                        <div class="error-message text-danger small mt-1"></div>
                                    </div>

                                    <div class="form-group mb-0">
                                        <label class="form-label">Website<span class="text-danger">*</span></label>
                                        <input type="url" id="website" name="website" class="form-control"
                                            placeholder="https://yourcompany.com" required>
                                        <div class="error-message text-danger small mt-1"></div>
                                    </div>

                                    <div class="form-group mb-0">
                                        <label class="form-label">About Company<span class="text-danger">*</span></label>
                                        <textarea id="about_us" name="about_us" class="form-control" rows="4"
                                            placeholder="Brief description of your company" required></textarea>
                                        <div class="error-message text-danger small mt-1"></div>
                                    </div>

                                    <div class="form-group mb-0 mt-3 d-flex gap-2">
                                        <button type="button" class="btn btn-secondary" onclick="prevStep(1)">
                                            <i class="bi bi-arrow-left me-2"></i> Back
                                        </button>
                                        <button type="button" class="btn btn-primary flex-fill" onclick="nextStep(3)">
                                            Continue to Verification <i class="bi bi-arrow-right ms-2"></i>
                                        </button>
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
                                            <input type="radio" class="btn-check" name="verification_method"
                                                id="verify_email" value="email">
                                            <label class="verification-option" for="verify_email">
                                                <div class="d-flex align-items-center gap-3">
                                                    <div class="icon-wrapper">
                                                        <i class="bi bi-envelope-fill"></i>
                                                    </div>
                                                    <div>
                                                        <h6 class="mb-0">Email Verification</h6>
                                                        <small class="text-muted">Verify via email OTP</small>
                                                    </div>
                                                </div>
                                            </label>
                                        </div>

                                        <div class="col-md-6">
                                            <input type="radio" class="btn-check" name="verification_method"
                                                id="verify_phone" value="phone">
                                            <label class="verification-option" for="verify_phone">
                                                <div class="d-flex align-items-center gap-3">
                                                    <div class="icon-wrapper">
                                                        <i class="bi bi-phone-fill"></i>
                                                    </div>
                                                    <div>
                                                        <h6 class="mb-0">SMS Verification</h6>
                                                        <small class="text-muted">Verify via phone OTP</small>
                                                    </div>
                                                </div>
                                            </label>
                                        </div>
                                    </div>

                                    <div class="form-group mb-0 mt-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="terms" required>
                                            <label class="form-check-label" for="terms">
                                                I agree to the <a href="#" class="text-primary">Terms and
                                                    Conditions</a> & <a href="#" class="text-primary">Privacy
                                                    Policy</a>
                                            </label>
                                        </div>
                                    </div>

                                    <div class="form-group mb-0 mt-3 d-flex gap-2">
                                        <button type="button" class="btn btn-secondary" onclick="prevStep(2)">
                                            <i class="bi bi-arrow-left me-2"></i> Back
                                        </button>
                                        <button type="submit" id="submitBtn" class="btn btn-primary flex-fill">
                                            <i class="bi bi-check-circle me-2"></i> Register & Send OTP
                                        </button>
                                    </div>
                                </div>
                            </div>

                        </form>

                        <div class="text-center mt-3">
                            <p class="mb-0">Already have an account? <a href="{{ route('company.login') }}"
                                    class="text-primary fw-medium">Sign In</a></p>
                        </div>

                    </div>
                </div>

            </div>
            <!-- /row -->
        </div>
    </section>
    <!-- Registration Form End -->

@endsection

@push('styles')
    <style>
        /* Page Title Styles */
        .page-title {
            background: linear-gradient(rgba(63, 187, 192, 0.8), rgba(63, 187, 192, 0.8)), url('https://images.unsplash.com/photo-1486312338219-ce68d2c6f44d?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80') center center;
            background-size: cover;
            padding: 60px 0;
            margin-bottom: 60px;
        }

        .page-title h1 {
            color: #fff;
            font-size: 48px;
            font-weight: 700;
            margin-bottom: 10px;
        }

        .breadcrumbs {
            margin-bottom: 20px;
        }

        .breadcrumbs ol {
            display: flex;
            flex-wrap: wrap;
            list-style: none;
            padding: 0;
            margin: 0;
            font-size: 14px;
        }

        .breadcrumbs ol li+li {
            padding-left: 10px;
        }

        .breadcrumbs ol li+li::before {
            display: inline-block;
            padding-right: 10px;
            color: rgba(255, 255, 255, 0.7);
            content: "/";
        }

        .breadcrumbs ol a {
            color: rgba(255, 255, 255, 0.7);
            text-decoration: none;
        }

        .breadcrumbs ol a:hover,
        .breadcrumbs ol .current {
            color: #fff;
        }

        /* Registration Card */
        .registration-card {
            background: #fff;
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.1);
            padding: 40px;
            border-radius: 8px;
        }

        .registration-form {
            margin-top: 20px;
        }

        /* Form Steps */
        .form-step {
            display: none;
        }

        .form-step.active {
            display: block;
        }

        /* Progress Steps */
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
            background: #3fbbc0;
            border-color: #3fbbc0;
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
            color: #3fbbc0;
            font-weight: 600;
        }

        /* Form Elements */
        .form-label {
            font-weight: 600;
            color: #2c4964;
            margin-bottom: 8px;
        }

        .form-control {
            border: 1px solid #dee2e6;
            border-radius: 5px;
            padding: 12px 15px;
        }

        .form-control:focus {
            border-color: #3fbbc0;
            box-shadow: 0 0 0 0.2rem rgba(63, 187, 192, 0.25);
        }

        /* Verification Options */
        .verification-option {
            display: block;
            padding: 20px;
            border: 2px solid #dee2e6;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.3s;
        }

        .verification-option:hover {
            border-color: #3fbbc0;
            background: rgba(63, 187, 192, 0.05);
        }

        .btn-check:checked+.verification-option {
            border-color: #3fbbc0;
            background: rgba(63, 187, 192, 0.1);
        }

        .verification-option .icon-wrapper {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background: rgba(63, 187, 192, 0.1);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            color: #3fbbc0;
        }

        /* Buttons */
        .btn-primary {
            background: #3fbbc0;
            border-color: #3fbbc0;
            color: #fff;
        }

        .btn-primary:hover {
            background: #65c9cd;
            border-color: #65c9cd;
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
            to {
                transform: rotate(360deg);
            }
        }

        /* Divider */
        .divider-or {
            position: relative;
            text-align: center;
            margin: 30px 0;
        }

        .divider-or::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 0;
            right: 0;
            height: 1px;
            background: #dee2e6;
        }

        .divider-or span {
            position: relative;
            background: #fff;
            padding: 0 15px;
            color: #999;
            font-size: 14px;
        }

        /* Social Buttons */
        .social-signup .btn {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 12px;
        }
    </style>
@endpush

@push('scripts')
    <script src="{{ asset('company-assets/register.js') }}"></script>
@endpush
