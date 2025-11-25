@extends('layouts.admin')

@section('title', 'Forgot Password')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-5">
        <div class="card shadow">
            <div class="card-body p-5">
                <h3 class="text-center mb-4">
                    <i class="bi bi-key"></i> Forgot Password
                </h3>
                <p class="text-muted mb-4">
                    Enter your email address and we'll send you a password reset link.
                </p>

                <form method="POST" action="{{ route('admin.password.email') }}">
                    @csrf

                    <div class="mb-3">
                        <label for="email" class="form-label">Email Address</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror"
                               id="email" name="email" value="{{ old('email') }}" required autofocus>
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary w-100 mb-3">
                        <i class="bi bi-send"></i> Send Reset Link
                    </button>

                    <div class="text-center">
                        <a href="{{ route('admin.login') }}" class="text-decoration-none">
                            <i class="bi bi-arrow-left"></i> Back to Login
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
