@extends('layouts.frontend')

@section('title', 'Company Dashboard - ' . config('app.name'))

@section('content')
    <div class="page-title" data-aos="fade">
        <div class="container">
            <nav class="breadcrumbs">
                <ol>
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li class="current">Dashboard</li>
                </ol>
            </nav>
            <h1>Company Dashboard</h1>
        </div>
    </div>

    <section class="section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card shadow-sm">
                        <div class="card-body p-4">
                            <h4 class="card-title mb-4">Welcome, {{ Auth::user()->name }}!</h4>
                            <p>You are logged in as a company.</p>

                            <div class="mt-4">
                                <h5>Your Company Details</h5>
                                @if (Auth::user()->company)
                                    <p><strong>Company Name:</strong> {{ Auth::user()->company->name }}</p>
                                    <p><strong>Status:</strong>
                                        {{ Auth::user()->company->is_active ? 'Active' : 'Pending' }}</p>
                                @else
                                    <p class="text-warning">No company profile found.</p>
                                @endif
                            </div>

                            <div class="mt-4">
                                <form action="{{ route('admin.logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-danger">Logout</button>
                                </form>
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
    </style>
@endpush
