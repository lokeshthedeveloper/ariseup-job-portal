@extends('company.layouts.app')

@section('title', 'Company Dashboard - ' . config('app.name'))
@section('page-title', 'Company Dashboard')

@section('content')

    <!-- Alert Messages -->
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if (session('info'))
        <div class="alert alert-info alert-dismissible fade show" role="alert">
            <i class="bi bi-info-circle me-2"></i>{{ session('info') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <!-- Row Start -->
    <div class="row align-items-center gx-4 gy-4 mb-4">

        <!-- Employee Count Card -->
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <h4 class="mb-0">{{ $data['employee_count'] }}</h4>
                            <p class="text-muted mb-0">Employee Count</p>
                        </div>
                        <div class="text-primary fs-1">
                            <i class="bi bi-people"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Employer Count Card -->
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <h4 class="mb-0">{{ $data['employer_count'] }}</h4>
                            <p class="text-muted mb-0">Employer Count</p>
                        </div>
                        <div class="text-success fs-1">
                            <i class="bi bi-building"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Referral Count Card -->
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <h4 class="mb-0">{{ $data['referral_count'] }}</h4>
                            <p class="text-muted mb-0">Referral Count</p>
                        </div>
                        <div class="text-warning fs-1">
                            <i class="bi bi-person-plus"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Total Earning Card -->
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <h4 class="mb-0">${{ number_format($data['total_earning']) }}</h4>
                            <p class="text-muted mb-0">Total Earning</p>
                        </div>
                        <div class="text-danger fs-1">
                            <i class="bi bi-currency-dollar"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- Row End -->

    <!-- Row Start -->
    <div class="row align-items-center gx-4 gy-4 mb-4">

        <!-- Total Post Jobs Card -->
        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <h4 class="mb-0">{{ $data['total_post_jobs'] }}</h4>
                            <p class="text-muted mb-0">Total Post Jobs</p>
                        </div>
                        <div class="text-info fs-1">
                            <i class="bi bi-briefcase"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Active Jobs Card -->
        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <h4 class="mb-0">{{ $data['active_jobs'] }}</h4>
                            <p class="text-muted mb-0">Active Jobs</p>
                        </div>
                        <div class="text-success fs-1">
                            <i class="bi bi-check-circle"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Inactive Jobs Card -->
        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <h4 class="mb-0">{{ $data['inactive_jobs'] }}</h4>
                            <p class="text-muted mb-0">Inactive Jobs</p>
                        </div>
                        <div class="text-danger fs-1">
                            <i class="bi bi-x-circle"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- Row End -->

@endsection
