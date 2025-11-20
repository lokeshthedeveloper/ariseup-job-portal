@extends('layouts.admin')

@section('title', 'Course Details')

@section('content')
<div class="row mb-4">
    <div class="col-md-8">
        <h2><i class="bi bi-book"></i> Course Details</h2>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.courses.index') }}">Courses</a></li>
                <li class="breadcrumb-item active">{{ $course->name }}</li>
            </ol>
        </nav>
    </div>
    <div class="col-md-4 text-end">
        <a href="{{ route('admin.courses.edit', $course) }}" class="btn btn-warning">
            <i class="bi bi-pencil"></i> Edit
        </a>
        <a href="{{ route('admin.courses.index') }}" class="btn btn-secondary">
            <i class="bi bi-arrow-left"></i> Back
        </a>
    </div>
</div>

<div class="row">
    <div class="col-md-8">
        <div class="card shadow-sm">
            <div class="card-header">
                <h5 class="mb-0">Course Information</h5>
            </div>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-md-4">
                        <strong>Course Name:</strong>
                    </div>
                    <div class="col-md-8">
                        {{ $course->name }}
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-4">
                        <strong>Education Level:</strong>
                    </div>
                    <div class="col-md-8">
                        <span class="badge bg-primary">
                            {{ $course->educationLevel->name }}
                        </span>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-4">
                        <strong>Duration:</strong>
                    </div>
                    <div class="col-md-8">
                        {{ $course->duration_value }} {{ $course->duration_unit }}
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-4">
                        <strong>Specializations Count:</strong>
                    </div>
                    <div class="col-md-8">
                        <span class="badge bg-info">
                            {{ $course->specializations_count ?? 0 }} specializations
                        </span>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-4">
                        <strong>Status:</strong>
                    </div>
                    <div class="col-md-8">
                        <span class="badge bg-{{ $course->status ? 'success' : 'secondary' }}">
                            {{ $course->status ? 'Active' : 'Inactive' }}
                        </span>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-4">
                        <strong>Created At:</strong>
                    </div>
                    <div class="col-md-8">
                        {{ $course->created_at->format('F d, Y h:i A') }}
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-4">
                        <strong>Last Updated:</strong>
                    </div>
                    <div class="col-md-8">
                        {{ $course->updated_at->format('F d, Y h:i A') }}
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
                    <a href="{{ route('admin.courses.edit', $course) }}" class="btn btn-warning">
                        <i class="bi bi-pencil"></i> Edit Course
                    </a>

                    <form action="{{ route('admin.courses.toggle-status', $course) }}"
                          method="POST">
                        @csrf
                        @method('PATCH')
                        <button type="submit" class="btn btn-{{ $course->status ? 'secondary' : 'success' }} w-100">
                            <i class="bi bi-toggle-{{ $course->status ? 'off' : 'on' }}"></i>
                            {{ $course->status ? 'Deactivate' : 'Activate' }}
                        </button>
                    </form>

                    <form action="{{ route('admin.courses.destroy', $course) }}"
                          method="POST"
                          onsubmit="return confirm('Are you sure you want to delete this course?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger w-100">
                            <i class="bi bi-trash"></i> Delete Course
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
                    <i class="bi bi-award"></i> <strong>Total Specializations:</strong>
                    {{ $course->specializations_count ?? 0 }}
                </p>
                <p class="mb-0 small">
                    <i class="bi bi-clock-history"></i> <strong>In system for:</strong>
                    {{ $course->created_at->diffForHumans() }}
                </p>
            </div>
        </div>
    </div>
</div>
@endsection
