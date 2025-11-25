@extends('layouts.admin')

@section('title', 'Education Level Details')

@section('content')
<div class="row mb-4">
    <div class="col-md-8">
        <h2><i class="bi bi-mortarboard"></i> Education Level Details</h2>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.education-levels.index') }}">Education Levels</a></li>
                <li class="breadcrumb-item active">{{ $educationLevel->name }}</li>
            </ol>
        </nav>
    </div>
    <div class="col-md-4 text-end">
        <a href="{{ route('admin.education-levels.edit', $educationLevel) }}" class="btn btn-warning">
            <i class="bi bi-pencil"></i> Edit
        </a>
        <a href="{{ route('admin.education-levels.index') }}" class="btn btn-secondary">
            <i class="bi bi-arrow-left"></i> Back
        </a>
    </div>
</div>

<div class="row">
    <div class="col-md-8">
        <div class="card shadow-sm">
            <div class="card-header">
                <h5 class="mb-0">Education Level Information</h5>
            </div>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-md-4">
                        <strong>Education Level Name:</strong>
                    </div>
                    <div class="col-md-8">
                        {{ $educationLevel->name }}
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-4">
                        <strong>Status:</strong>
                    </div>
                    <div class="col-md-8">
                        <span class="badge bg-{{ $educationLevel->status ? 'success' : 'secondary' }}">
                            {{ $educationLevel->status ? 'Active' : 'Inactive' }}
                        </span>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-4">
                        <strong>Courses Count:</strong>
                    </div>
                    <div class="col-md-8">
                        <span class="badge bg-info">
                            {{ $educationLevel->courses_count ?? 0 }} courses
                        </span>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-4">
                        <strong>Created At:</strong>
                    </div>
                    <div class="col-md-8">
                        {{ $educationLevel->created_at->format('F d, Y h:i A') }}
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-4">
                        <strong>Last Updated:</strong>
                    </div>
                    <div class="col-md-8">
                        {{ $educationLevel->updated_at->format('F d, Y h:i A') }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card shadow-sm">
            <div class="card-header">
                <h5 class="mb-0">Quick Actions</h5>
            </div>
            <div class="card-body">
                <div class="d-grid gap-2">
                    <a href="{{ route('admin.education-levels.edit', $educationLevel) }}" class="btn btn-warning">
                        <i class="bi bi-pencil"></i> Edit Education Level
                    </a>

                    <form action="{{ route('admin.education-levels.toggle-status', $educationLevel) }}"
                          method="POST">
                        @csrf
                        @method('PATCH')
                        <button type="submit" class="btn btn-{{ $educationLevel->status ? 'secondary' : 'success' }} w-100">
                            <i class="bi bi-toggle-{{ $educationLevel->status ? 'off' : 'on' }}"></i>
                            {{ $educationLevel->status ? 'Deactivate' : 'Activate' }}
                        </button>
                    </form>

                    <form action="{{ route('admin.education-levels.destroy', $educationLevel) }}"
                          method="POST"
                          onsubmit="return confirm('Are you sure you want to delete this education level?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger w-100">
                            <i class="bi bi-trash"></i> Delete Education Level
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <div class="card shadow-sm mt-3">
            <div class="card-header">
                <h5 class="mb-0">Statistics</h5>
            </div>
            <div class="card-body">
                <p class="mb-2 small">
                    <i class="bi bi-book"></i> <strong>Total Courses:</strong>
                    {{ $educationLevel->courses_count ?? 0 }}
                </p>
                <p class="mb-0 small">
                    <i class="bi bi-clock-history"></i> <strong>In system for:</strong>
                    {{ $educationLevel->created_at->diffForHumans() }}
                </p>
            </div>
        </div>
    </div>
</div>
@endsection
