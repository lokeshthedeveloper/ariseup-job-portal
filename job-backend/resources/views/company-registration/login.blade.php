@extends('layouts.app')

@section('title', 'Company Login - JobStock')

@section('content')

@include('includes.navbar-simple')

<!-- Login Form Start -->
<section class="gray-simple">
    <div class="container">
        <div class="row justify-content-center">

            <div class="col-xl-6 col-lg-7 col-md-8">
                <div class="card rounded-4">
                    <div class="card-body p-4">

                        <div class="form-heads d-block mb-4">
                            <div class="d-flex align-items-center justify-content-start gap-3">
                                <div class="head-caps">
                                    <h4>Welcome Back</h4>
                                    <p>Sign in to your company account</p>
                                </div>
                            </div>
                        </div>

                        <!-- Alert Messages -->
                        <div id="alertMessage" class="alert alert-dismissible fade" style="display: none;" role="alert">
                            <span id="alertText"></span>
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>

                        <form id="loginForm" class="p-md-3">

                            <div class="form-float d-flex flex-column gap-4">

                                <div class="form-group mb-0">
                                    <label class="fw-medium fs-6 text-dark">Email or Phone<i class="text-danger text-md">*</i></label>
                                    <input type="text" id="identifier" name="identifier" class="form-control" placeholder="Enter email or phone number" required>
                                </div>

                                <div class="form-group mb-0">
                                    <label class="fw-medium fs-6 text-dark">Password<i class="text-danger text-md">*</i></label>
                                    <input type="password" id="password" name="password" class="form-control" placeholder="Enter your password" required>
                                </div>

                                <div class="form-group mb-0">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="rememberMe">
                                            <label class="form-check-label" for="rememberMe">Remember me</label>
                                        </div>
                                        <a href="#" class="text-main">Forgot Password?</a>
                                    </div>
                                </div>

                                <div class="form-group mb-0">
                                    <button type="submit" id="loginBtn" class="btn btn-main full-width">Sign In</button>
                                </div>

                            </div>
                        </form>

                        <div class="devider position-relative d-block mt-4">
                            <hr class="mb-4 mt-4">
                            <div class="position-absolute top-50 start-50 translate-middle"><span class="square--30 circle bg-white text-muted">OR</span></div>
                        </div>

                        <div class="social-signup d-flex flex-column gap-3 mb-3">
                            <button type="button" class="btn btn-gray rounded-pill w-100" onclick="socialLogin('google')">
                                <img src="{{ asset('assets/img/google.png') }}" class="img-fluid me-2" width="20" alt="Google">Sign in with Google
                            </button>
                            <button type="button" class="btn btn-gray rounded-pill w-100" onclick="socialLogin('facebook')">
                                <img src="{{ asset('assets/img/facebook.png') }}" class="img-fluid me-2" width="20" alt="Facebook">Sign in with Facebook
                            </button>
                            <button type="button" class="btn btn-gray rounded-pill w-100" onclick="socialLogin('linkedin')">
                                <img src="{{ asset('assets/img/linkedin.png') }}" class="img-fluid me-2" width="20" alt="LinkedIn">Sign in with LinkedIn
                            </button>
                        </div>

                        <div class="text-center mt-3">
                            <p class="mb-0">Don't have an account? <a href="{{ route('company.register') }}" class="text-main fw-medium">Register Now</a></p>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
<!-- Login Form End -->

@include('includes.footer-simple')

@endsection

@push('styles')
<style>
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
<script>
const API_BASE_URL = window.location.origin + '/api/company';

function showAlert(message, type = 'info') {
    const alertElement = document.getElementById('alertMessage');
    const alertText = document.getElementById('alertText');
    alertElement.className = `alert alert-${type} alert-dismissible fade show`;
    alertText.textContent = message;
    alertElement.style.display = 'block';

    setTimeout(() => {
        alertElement.style.display = 'none';
    }, 5000);
}

function socialLogin(provider) {
    window.location.href = `${API_BASE_URL}/auth/${provider}`;
}

document.getElementById('loginForm').addEventListener('submit', async function(e) {
    e.preventDefault();

    const loginBtn = document.getElementById('loginBtn');
    const originalText = loginBtn.innerHTML;
    loginBtn.disabled = true;
    loginBtn.classList.add('loading');

    try {
        const response = await fetch(`${API_BASE_URL}/login`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
            },
            body: JSON.stringify({
                identifier: document.getElementById('identifier').value,
                password: document.getElementById('password').value,
            })
        });

        const data = await response.json();

        if (response.ok && data.success) {
            localStorage.setItem('auth_token', data.token);
            localStorage.setItem('user_data', JSON.stringify(data.user));

            showAlert('Login successful! Redirecting...', 'success');

            setTimeout(() => {
                window.location.href = '/company-registration/success';
            }, 1500);
        } else {
            let errorMessage = 'Login failed. Please check your credentials.';
            if (data.message) {
                errorMessage = data.message;
            } else if (data.errors) {
                const errors = Object.values(data.errors).flat();
                errorMessage = errors.join(', ');
            }

            showAlert(errorMessage, 'danger');
            loginBtn.disabled = false;
            loginBtn.classList.remove('loading');
            loginBtn.innerHTML = originalText;
        }
    } catch (error) {
        console.error('Login error:', error);
        showAlert('An error occurred. Please try again.', 'danger');
        loginBtn.disabled = false;
        loginBtn.classList.remove('loading');
        loginBtn.innerHTML = originalText;
    }
});
</script>
@endpush
