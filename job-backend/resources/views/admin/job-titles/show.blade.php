@extends('layouts.admin')

@section('title', 'Job Title Details')

@section('content')
<div class="row mb-4">
    <div class="col-md-8">
        <h2><i class="bi bi-briefcase"></i> Job Title Details</h2>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.job-titles.index') }}">Job Titles</a></li>
                <li class="breadcrumb-item active">{{ $jobTitle->name }}</li>
            </ol>
        </nav>
    </div>
    <div class="col-md-4 text-end">
        <a href="{{ route('admin.job-titles.edit', $jobTitle) }}" class="btn btn-warning">
            <i class="bi bi-pencil"></i> Edit
        </a>
        <a href="{{ route('admin.job-titles.index') }}" class="btn btn-secondary">
            <i class="bi bi-arrow-left"></i> Back
        </a>
    </div>
</div>

<div class="row">
    <div class="col-md-8">
        <div class="card shadow-sm">
            <div class="card-header">
                <h5 class="mb-0">Job Title Information</h5>
            </div>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-md-4">
                        <strong>Job Title Name:</strong>
                    </div>
                    <div class="col-md-8">
                        {{ $jobTitle->name }}
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-4">
                        <strong>Industry:</strong>
                    </div>
                    <div class="col-md-8">
                        <span class="badge bg-primary">{{ $jobTitle->industry->name }}</span>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-4">
                        <strong>Industry Code:</strong>
                    </div>
                    <div class="col-md-8">
                        <code>{{ $jobTitle->industry->code }}</code>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-4">
                        <strong>Status:</strong>
                    </div>
                    <div class="col-md-8">
                        <span class="badge bg-{{ $jobTitle->status ? 'success' : 'secondary' }}">
                            {{ $jobTitle->status ? 'Active' : 'Inactive' }}
                        </span>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-4">
                        <strong>Created At:</strong>
                    </div>
                    <div class="col-md-8">
                        {{ $jobTitle->created_at->format('F d, Y h:i A') }}
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-4">
                        <strong>Last Updated:</strong>
                    </div>
                    <div class="col-md-8">
                        {{ $jobTitle->updated_at->format('F d, Y h:i A') }}
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
                    <a href="{{ route('admin.job-titles.edit', $jobTitle) }}" class="btn btn-warning">
                        <i class="bi bi-pencil"></i> Edit Job Title
                    </a>

                    <form action="{{ route('admin.job-titles.toggle-status', $jobTitle) }}"
                          method="POST">
                        @csrf
                        @method('PATCH')
                        <button type="submit" class="btn btn-{{ $jobTitle->status ? 'secondary' : 'success' }} w-100">
                            <i class="bi bi-toggle-{{ $jobTitle->status ? 'off' : 'on' }}"></i>
                            {{ $jobTitle->status ? 'Deactivate' : 'Activate' }}
                        </button>
                    </form>

                    <form action="{{ route('admin.job-titles.destroy', $jobTitle) }}"
                          method="POST"
                          onsubmit="return confirm('Are you sure you want to delete this job title?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger w-100">
                            <i class="bi bi-trash"></i> Delete Job Title
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
                    {{ $jobTitle->created_at->diffForHumans() }}
                </p>
            </div>
        </div>
    </div>
</div>
@endsection
