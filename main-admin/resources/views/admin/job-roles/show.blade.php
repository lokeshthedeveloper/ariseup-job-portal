@extends('layouts.admin')

@section('title', 'Job Role Details')

@section('content')
<div class="row mb-4">
    <div class="col-md-8">
        <h2><i class="bi bi-person-badge"></i> Job Role Details</h2>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.job-roles.index') }}">Job Roles</a></li>
                <li class="breadcrumb-item active">{{ $jobRole->name }}</li>
            </ol>
        </nav>
    </div>
    <div class="col-md-4 text-end">
        <a href="{{ route('admin.job-roles.edit', $jobRole) }}" class="btn btn-warning">
            <i class="bi bi-pencil"></i> Edit
        </a>
        <a href="{{ route('admin.job-roles.index') }}" class="btn btn-secondary">
            <i class="bi bi-arrow-left"></i> Back
        </a>
    </div>
</div>

<div class="row">
    <div class="col-md-8">
        <div class="card shadow-sm">
            <div class="card-header">
                <h5 class="mb-0">Job Role Information</h5>
            </div>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-md-4">
                        <strong>Job Role Name:</strong>
                    </div>
                    <div class="col-md-8">
                        {{ $jobRole->name }}
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-4">
                        <strong>Role Category:</strong>
                    </div>
                    <div class="col-md-8">
                        <span class="badge bg-primary">{{ $jobRole->roleCategory->name }}</span>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-4">
                        <strong>Status:</strong>
                    </div>
                    <div class="col-md-8">
                        <span class="badge bg-{{ $jobRole->status ? 'success' : 'secondary' }}">
                            {{ $jobRole->status ? 'Active' : 'Inactive' }}
                        </span>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-4">
                        <strong>Created At:</strong>
                    </div>
                    <div class="col-md-8">
                        {{ $jobRole->created_at->format('F d, Y h:i A') }}
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-4">
                        <strong>Last Updated:</strong>
                    </div>
                    <div class="col-md-8">
                        {{ $jobRole->updated_at->format('F d, Y h:i A') }}
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
                    <a href="{{ route('admin.job-roles.edit', $jobRole) }}" class="btn btn-warning">
                        <i class="bi bi-pencil"></i> Edit Job Role
                    </a>

                    <form action="{{ route('admin.job-roles.toggle-status', $jobRole) }}"
                          method="POST">
                        @csrf
                        @method('PATCH')
                        <button type="submit" class="btn btn-{{ $jobRole->status ? 'secondary' : 'success' }} w-100">
                            <i class="bi bi-toggle-{{ $jobRole->status ? 'off' : 'on' }}"></i>
                            {{ $jobRole->status ? 'Deactivate' : 'Activate' }}
                        </button>
                    </form>

                    <form action="{{ route('admin.job-roles.destroy', $jobRole) }}"
                          method="POST"
                          onsubmit="return confirm('Are you sure you want to delete this job role?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger w-100">
                            <i class="bi bi-trash"></i> Delete Job Role
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
                <p class="mb-0 small">
                    <i class="bi bi-clock-history"></i> <strong>In system for:</strong>
                    {{ $jobRole->created_at->diffForHumans() }}
                </p>
            </div>
        </div>
    </div>
</div>
@endsection
