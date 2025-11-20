@extends('layouts.app')

@section('title', 'Verify OTP - JobStock')

@section('content')

@include('includes.navbar-simple')

<!-- OTP Verification Start -->
<section class="gray-simple">
    <div class="container">
        <div class="row justify-content-center">

            <div class="col-xl-6 col-lg-7 col-md-8">
                <div class="card rounded-4">
                    <div class="card-body p-4">

                        <div class="form-heads d-block mb-4 text-center">
                            <div class="mb-3">
                                <div class="square--90 circle bg-light-main text-main mx-auto">
                                    <i class="bi bi-shield-check fs-1"></i>
                                </div>
                            </div>
                            <div class="head-caps">
                                <h4>Verify Your Account</h4>
                                <p>We've sent a verification code to<br><strong id="verificationTarget">---</strong></p>
                            </div>
                        </div>

                        <!-- Alert Messages -->
                        <div id="alertMessage" class="alert alert-dismissible fade" style="display: none;" role="alert">
                            <span id="alertText"></span>
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>

                        <form id="otpForm" class="p-md-3">

                            <div class="form-float d-flex flex-column gap-4">

                                <div class="form-group mb-0">
                                    <label class="fw-medium fs-6 text-dark text-center d-block mb-3">Enter 6-Digit Code</label>
                                    <div class="d-flex justify-content-center gap-2">
                                        <input type="text" id="otp1" class="form-control text-center otp-input" maxlength="1" required style="width: 50px; height: 50px; font-size: 20px; font-weight: 600;">
                                        <input type="text" id="otp2" class="form-control text-center otp-input" maxlength="1" required style="width: 50px; height: 50px; font-size: 20px; font-weight: 600;">
                                        <input type="text" id="otp3" class="form-control text-center otp-input" maxlength="1" required style="width: 50px; height: 50px; font-size: 20px; font-weight: 600;">
                                        <input type="text" id="otp4" class="form-control text-center otp-input" maxlength="1" required style="width: 50px; height: 50px; font-size: 20px; font-weight: 600;">
                                        <input type="text" id="otp5" class="form-control text-center otp-input" maxlength="1" required style="width: 50px; height: 50px; font-size: 20px; font-weight: 600;">
                                        <input type="text" id="otp6" class="form-control text-center otp-input" maxlength="1" required style="width: 50px; height: 50px; font-size: 20px; font-weight: 600;">
                                    </div>
                                </div>

                                <div class="text-center" id="timer">
                                    <p class="text-muted mb-0">Time remaining: <strong id="countdown">10:00</strong></p>
                                </div>

                                <div class="text-center" id="resendSection" style="display: none;">
                                    <button type="button" class="btn btn-link text-main" onclick="resendOtp()">Resend OTP</button>
                                </div>

                                <div class="form-group mb-0">
                                    <button type="submit" id="verifyBtn" class="btn btn-main full-width">Verify & Continue</button>
                                </div>

                            </div>
                        </form>

                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
<!-- OTP Verification End -->

@include('includes.footer-simple')

@endsection

@push('styles')
<style>
    .otp-input:focus {
        border-color: #0b8260;
        box-shadow: 0 0 0 0.2rem rgba(11, 130, 96, 0.25);
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
<script src="{{ asset('company-assets/verify-otp.js') }}"></script>
@endpush
