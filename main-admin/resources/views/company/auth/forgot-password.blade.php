@extends('layouts.frontend')

@section('title', 'Forgot Password - ' . config('app.name'))

@section('content')
    <div class="page-title" data-aos="fade">
        <div class="container">
            <nav class="breadcrumbs">
                <ol>
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li class="current">Forgot Password</li>
                </ol>
            </nav>
            <h1>Forgot Password</h1>
        </div>
    </div>

    <section class="section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card shadow-sm">
                        <div class="card-body p-4">
                            <h4 class="card-title text-center mb-4">Reset Password</h4>
                            <p class="text-muted text-center mb-4">Enter your email address and we'll send you a link to
                                reset your password.</p>

                            <form action="{{ route('company.forgot-password.submit') }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email Address</label>
                                    <input type="email" class="form-control" id="email" name="email" required>
                                </div>
                                <div class="d-grid">
                                    <button type="submit" class="btn btn-primary">Send Reset Link</button>
                                </div>
                            </form>

                            <div class="text-center mt-3">
                                <a href="{{ route('company.login') }}" class="text-decoration-none"><i
                                        class="bi bi-arrow-left"></i> Back to Login</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('styles')
    <style>
        .page-title {
            background: linear-gradient(rgba(13, 110, 253, 0.85), rgba(10, 88, 202, 0.85)), url('https://images.unsplash.com/photo-1497366216548-37526070297c?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80') center center;
            background-size: cover;
            padding: 26px 0;
            margin-bottom: 60px;
        }

        .page-title h1 {
            color: #fff;
            font-size: 32px;
            font-weight: 700;
            margin-bottom: 8px;
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
    </style>
@endpush
