@extends('layouts.frontend')

@section('title', 'Verify OTP - ' . config('app.name'))
@section('meta_description', 'Verify your account with OTP')
@section('body-class', 'otp-verification-page')

@section('content')

    <!-- Page Title -->
    <div class="page-title" data-aos="fade">
        <div class="container">
            <nav class="breadcrumbs">
                <ol>
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li><a href="{{ route('company.register') }}">Registration</a></li>
                    <li class="current">Verify OTP</li>
                </ol>
            </nav>
            <h1>Verify Your Account</h1>
        </div>
    </div><!-- End Page Title -->

    <!-- OTP Verification Section -->
    <section class="verification-section section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-7 col-md-9">
                    <div class="verification-card" data-aos="fade-up" data-aos-delay="100">

                        <!-- Header -->
                        <div class="form-heads text-center mb-4">
                            <div class="icon-wrapper mb-3">
                                <i class="bi bi-shield-check"></i>
                            </div>
                            <h3>Enter Verification Code</h3>
                            <p class="text-muted">We've sent a 6-digit code to <strong id="identifierDisplay"></strong></p>
                        </div>

                        <!-- Alert Messages -->
                        <div id="alertMessage" class="alert alert-dismissible fade" style="display: none;" role="alert">
                            <span id="alertText"></span>
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>

                        <!-- OTP Form -->
                        <form id="otpForm" class="otp-form">
                            <!-- Email OTP -->
                            <div class="form-group mb-4">
                                <label class="form-label d-flex justify-content-between">
                                    <span>Email OTP <small class="text-muted">({{ $email }})</small></span>
                                    <button type="button" class="btn btn-link btn-sm p-0" id="resendEmailBtn" disabled>
                                        Resend (<span id="emailCountdown">60</span>s)
                                    </button>
                                </label>
                                <input type="text" id="email_otp" name="email_otp"
                                    class="form-control form-control-lg text-center" placeholder="Enter Email OTP"
                                    maxlength="6" pattern="[0-9]{6}" required autocomplete="off" inputmode="numeric">
                                <div class="error-message text-danger small mt-1"></div>
                                <small class="text-muted d-block mt-1">Note: Use <strong>123456</strong> for email
                                    verification (or check your email)</small>
                            </div>

                            <!-- Phone OTP -->
                            <div class="form-group mb-4">
                                <label class="form-label d-flex justify-content-between">
                                    <span>Phone OTP <small class="text-muted">({{ $phone }})</small></span>
                                    <button type="button" class="btn btn-link btn-sm p-0" id="resendPhoneBtn" disabled>
                                        Resend (<span id="phoneCountdown">60</span>s)
                                    </button>
                                </label>
                                <input type="text" id="phone_otp" name="phone_otp"
                                    class="form-control form-control-lg text-center" placeholder="Enter Phone OTP"
                                    maxlength="6" pattern="[0-9]{4,6}" required autocomplete="off" inputmode="numeric">
                                <div class="error-message text-danger small mt-1"></div>
                                <small class="text-muted d-block mt-1">Note: Use <strong>1234</strong> for phone
                                    verification</small>
                            </div>

                            <div class="form-group mb-3">
                                <button type="submit" id="verifyBtn" class="btn btn-primary w-100 btn-lg">
                                    <i class="bi bi-check-circle me-2"></i> Verify Both OTPs
                                </button>
                            </div>
                        </form>

                        <div class="text-center mt-4">
                            <p class="mb-0">
                                <a href="{{ route('company.register') }}" class="text-muted">
                                    <i class="bi bi-arrow-left me-1"></i> Back to Registration
                                </a>
                            </p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End OTP Verification Section -->

@endsection

@push('styles')
    <style>
        /* Page Title Styles */
        .page-title {
            background: linear-gradient(rgba(63, 187, 192, 0.8), rgba(63, 187, 192, 0.8)), url('https://images.unsplash.com/photo-1563986768609-322da13575f3?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80') center center;
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

        /* Verification Card */
        .verification-card {
            background: #fff;
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.1);
            padding: 50px 40px;
            border-radius: 8px;
        }

        .icon-wrapper {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            background: rgba(63, 187, 192, 0.1);
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto;
            font-size: 40px;
            color: #3fbbc0;
        }

        /* OTP Input */
        #otp {
            font-size: 24px;
            letter-spacing: 8px;
            font-weight: 600;
            padding: 15px;
        }

        #otp:focus {
            border-color: #3fbbc0;
            box-shadow: 0 0 0 0.2rem rgba(63, 187, 192, 0.25);
        }

        /* Buttons */
        .btn-primary {
            background: #3fbbc0;
            border-color: #3fbbc0;
            color: #fff;
            padding: 12px 30px;
            font-weight: 600;
        }

        .btn-primary:hover {
            background: #65c9cd;
            border-color: #65c9cd;
        }

        .btn-primary:disabled {
            background: #ccc;
            border-color: #ccc;
            cursor: not-allowed;
        }

        .btn-link {
            color: #3fbbc0;
            text-decoration: none;
        }

        .btn-link:hover {
            color: #65c9cd;
            text-decoration: underline;
        }

        .btn-link:disabled {
            color: #999;
            cursor: not-allowed;
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

        /* Alert Styles */
        .alert {
            border-radius: 5px;
            padding: 15px;
            margin-bottom: 20px;
        }

        .alert.success {
            background-color: #d4edda;
            border-color: #c3e6cb;
            color: #155724;
        }

        .alert.error {
            background-color: #f8d7da;
            border-color: #f5c6cb;
            color: #721c24;
        }

        .alert.info {
            background-color: #d1ecf1;
            border-color: #bee5eb;
            color: #0c5460;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .verification-card {
                padding: 30px 20px;
            }

            .page-title h1 {
                font-size: 32px;
            }

            #otp {
                font-size: 20px;
                letter-spacing: 4px;
            }
        }
    </style>
@endpush

@push('scripts')
    <script>
        window.userEmail = "{{ $email }}";
        window.userPhone = "{{ $phone }}";
        window.emailVerified = {{ $emailVerified ? 'true' : 'false' }};
        window.phoneVerified = {{ $phoneVerified ? 'true' : 'false' }};
        window.verificationNeeded = @json($verificationNeeded);
    </script>
    <script src="{{ asset('company-assets/verify-otp.js') }}?v={{ time() }}"></script>
@endpush
