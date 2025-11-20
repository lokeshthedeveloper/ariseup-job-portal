@extends('layouts.app')

@section('title', 'Registration Successful - JobStock')

@section('content')

@include('includes.navbar-simple')

<!-- Success Page Start -->
<section class="gray-simple">
    <div class="container">
        <div class="row justify-content-center">

            <div class="col-xl-7 col-lg-8 col-md-10">
                <div class="card rounded-4">
                    <div class="card-body p-5 text-center">

                        <!-- Success Animation -->
                        <div class="mb-4">
                            <div class="square--100 circle bg-light-success text-success mx-auto d-flex align-items-center justify-content-center">
                                <i class="bi bi-check-circle-fill" style="font-size: 3.5rem;"></i>
                            </div>
                        </div>

                        <div class="form-heads d-block mb-4">
                            <h3 class="mb-3">Registration Successful!</h3>
                            <p class="text-muted">Your company account has been created and verified successfully</p>
                        </div>

                        <!-- User Info Card -->
                        <div class="card bg-light-gray rounded-3 border-0 mb-4">
                            <div class="card-body p-4">
                                <div class="row g-3 text-start">
                                    <div class="col-12">
                                        <div class="d-flex justify-content-between align-items-center py-2 border-bottom">
                                            <span class="fw-medium text-muted">Name:</span>
                                            <span class="fw-600" id="userName">---</span>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="d-flex justify-content-between align-items-center py-2 border-bottom">
                                            <span class="fw-medium text-muted">Email:</span>
                                            <span class="fw-600" id="userEmail">---</span>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="d-flex justify-content-between align-items-center py-2 border-bottom">
                                            <span class="fw-medium text-muted">Company:</span>
                                            <span class="fw-600" id="companyName">---</span>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="d-flex justify-content-between align-items-center py-2">
                                            <span class="fw-medium text-muted">Company Type:</span>
                                            <span class="fw-600" id="companyType">---</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Success Message -->
                        <div class="alert alert-success border-0 rounded-3 mb-4" role="alert">
                            <i class="bi bi-info-circle me-2"></i>
                            You can now start posting jobs and managing your company profile!
                        </div>

                        <!-- Action Buttons -->
                        <div class="d-flex gap-3 justify-content-center flex-wrap">
                            <button type="button" class="btn btn-main px-4 py-3" onclick="goToDashboard()">
                                <i class="bi bi-speedometer2 me-2"></i>Go to Dashboard
                            </button>
                            <button type="button" class="btn btn-outline-secondary px-4 py-3" onclick="logout()">
                                <i class="bi bi-box-arrow-right me-2"></i>Logout
                            </button>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
<!-- Success Page End -->

@include('includes.footer-simple')

@endsection

@push('scripts')
<script>
// Load user data
document.addEventListener('DOMContentLoaded', function() {
    const userData = JSON.parse(localStorage.getItem('user_data'));
    const authToken = localStorage.getItem('auth_token');

    if (!userData || !authToken) {
        window.location.href = '/company-registration/register';
        return;
    }

    // Display user information
    document.getElementById('userName').textContent = userData.name || '---';
    document.getElementById('userEmail').textContent = userData.email || '---';

    if (userData.company) {
        document.getElementById('companyName').textContent = userData.company.name || '---';
        const companyType = userData.company.company_type || '';
        document.getElementById('companyType').textContent = companyType
            ? companyType.charAt(0).toUpperCase() + companyType.slice(1)
            : '---';
    }
});

function goToDashboard() {
    // Redirect to company dashboard
    alert('Dashboard feature coming soon! Your token is saved in localStorage.');
    console.log('Auth Token:', localStorage.getItem('auth_token'));
}

function logout() {
    if (confirm('Are you sure you want to logout?')) {
        localStorage.removeItem('auth_token');
        localStorage.removeItem('user_data');
        window.location.href = '/company-registration/login';
    }
}
</script>
@endpush
