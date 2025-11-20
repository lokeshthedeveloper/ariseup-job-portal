@extends('layouts.admin')

@section('title', 'Industry Details')

@section('content')
<div class="row mb-4">
    <div class="col-md-8">
        <h2><i class="bi bi-building"></i> Industry Details</h2>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.industries.index') }}">Industries</a></li>
                <li class="breadcrumb-item active">{{ $industry->name }}</li>
            </ol>
        </nav>
    </div>
    <div class="col-md-4 text-end">
        <a href="{{ route('admin.industries.edit', $industry) }}" class="btn btn-warning">
            <i class="bi bi-pencil"></i> Edit
        </a>
        <a href="{{ route('admin.industries.index') }}" class="btn btn-secondary">
            <i class="bi bi-arrow-left"></i> Back
        </a>
    </div>
</div>

<div class="row">
    <div class="col-md-8">
        <div class="card shadow-sm">
            <div class="card-header">
                <h5 class="mb-0">Industry Information</h5>
            </div>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-md-4">
                        <strong>Industry Name:</strong>
                    </div>
                    <div class="col-md-8">
                        {{ $industry->name }}
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-4">
                        <strong>Industry Code:</strong>
                    </div>
                    <div class="col-md-8">
                        <code>{{ $industry->code }}</code>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-4">
                        <strong>Status:</strong>
                    </div>
                    <div class="col-md-8">
                        <span class="badge bg-{{ $industry->status ? 'success' : 'secondary' }}">
                            {{ $industry->status ? 'Active' : 'Inactive' }}
                        </span>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-4">
                        <strong>Job Titles Count:</strong>
                    </div>
                    <div class="col-md-8">
                        <span class="badge bg-info">{{ $industry->job_titles_count ?? 0 }}</span>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-4">
                        <strong>Created At:</strong>
                    </div>
                    <div class="col-md-8">
                        {{ $industry->created_at->format('F d, Y h:i A') }}
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-4">
                        <strong>Last Updated:</strong>
                    </div>
                    <div class="col-md-8">
                        {{ $industry->updated_at->format('F d, Y h:i A') }}
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
                    <a href="{{ route('admin.industries.edit', $industry) }}" class="btn btn-warning">
                        <i class="bi bi-pencil"></i> Edit Industry
                    </a>

                    <form action="{{ route('admin.industries.toggle-status', $industry) }}"
                          method="POST">
                        @csrf
                        @method('PATCH')
                        <button type="submit" class="btn btn-{{ $industry->status ? 'secondary' : 'success' }} w-100">
                            <i class="bi bi-toggle-{{ $industry->status ? 'off' : 'on' }}"></i>
                            {{ $industry->status ? 'Deactivate' : 'Activate' }}
                        </button>
                    </form>

                    <form action="{{ route('admin.industries.destroy', $industry) }}"
                          method="POST"
                          onsubmit="return confirm('Are you sure you want to delete this industry?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger w-100">
                            <i class="bi bi-trash"></i> Delete Industry
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
                    <i class="bi bi-briefcase"></i> <strong>Job Titles:</strong>
                    {{ $industry->job_titles_count ?? 0 }}
                </p>
                <p class="mb-0 small">
                    <i class="bi bi-clock-history"></i> <strong>In system for:</strong>
                    {{ $industry->created_at->diffForHumans() }}
                </p>
            </div>
        </div>
    </div>
</div>
@endsection
