@extends('layouts.admin')

@section('title', 'Role Category Details')

@section('content')
<div class="row mb-4">
    <div class="col-md-8">
        <h2><i class="bi bi-tags"></i> Role Category Details</h2>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.role-categories.index') }}">Role Categories</a></li>
                <li class="breadcrumb-item active">{{ $roleCategory->name }}</li>
            </ol>
        </nav>
    </div>
    <div class="col-md-4 text-end">
        <a href="{{ route('admin.role-categories.edit', $roleCategory) }}" class="btn btn-warning">
            <i class="bi bi-pencil"></i> Edit
        </a>
        <a href="{{ route('admin.role-categories.index') }}" class="btn btn-secondary">
            <i class="bi bi-arrow-left"></i> Back
        </a>
    </div>
</div>

<div class="row">
    <div class="col-md-8">
        <div class="card shadow-sm">
            <div class="card-header">
                <h5 class="mb-0">Role Category Information</h5>
            </div>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-md-4">
                        <strong>Role Category Name:</strong>
                    </div>
                    <div class="col-md-8">
                        {{ $roleCategory->name }}
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-4">
                        <strong>Status:</strong>
                    </div>
                    <div class="col-md-8">
                        <span class="badge bg-{{ $roleCategory->status ? 'success' : 'secondary' }}">
                            {{ $roleCategory->status ? 'Active' : 'Inactive' }}
                        </span>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-4">
                        <strong>Job Roles Count:</strong>
                    </div>
                    <div class="col-md-8">
                        <span class="badge bg-info">{{ $roleCategory->job_roles_count ?? 0 }}</span>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-4">
                        <strong>Created At:</strong>
                    </div>
                    <div class="col-md-8">
                        {{ $roleCategory->created_at->format('F d, Y h:i A') }}
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-4">
                        <strong>Last Updated:</strong>
                    </div>
                    <div class="col-md-8">
                        {{ $roleCategory->updated_at->format('F d, Y h:i A') }}
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
                    <a href="{{ route('admin.role-categories.edit', $roleCategory) }}" class="btn btn-warning">
                        <i class="bi bi-pencil"></i> Edit Role Category
                    </a>

                    <form action="{{ route('admin.role-categories.toggle-status', $roleCategory) }}"
                          method="POST">
                        @csrf
                        @method('PATCH')
                        <button type="submit" class="btn btn-{{ $roleCategory->status ? 'secondary' : 'success' }} w-100">
                            <i class="bi bi-toggle-{{ $roleCategory->status ? 'off' : 'on' }}"></i>
                            {{ $roleCategory->status ? 'Deactivate' : 'Activate' }}
                        </button>
                    </form>

                    <form action="{{ route('admin.role-categories.destroy', $roleCategory) }}"
                          method="POST"
                          onsubmit="return confirm('Are you sure you want to delete this role category?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger w-100">
                            <i class="bi bi-trash"></i> Delete Role Category
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
                    <i class="bi bi-person-badge"></i> <strong>Job Roles:</strong>
                    {{ $roleCategory->job_roles_count ?? 0 }}
                </p>
                <p class="mb-0 small">
                    <i class="bi bi-clock-history"></i> <strong>In system for:</strong>
                    {{ $roleCategory->created_at->diffForHumans() }}
                </p>
            </div>
        </div>
    </div>
</div>
@endsection
