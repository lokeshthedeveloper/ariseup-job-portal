@extends('layouts.admin')

@section('title', 'Specialization Details')

@section('content')
<div class="row mb-4">
    <div class="col-md-8">
        <h2><i class="bi bi-award"></i> Specialization Details</h2>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.specializations.index') }}">Specializations</a></li>
                <li class="breadcrumb-item active">{{ $specialization->name }}</li>
            </ol>
        </nav>
    </div>
    <div class="col-md-4 text-end">
        <a href="{{ route('admin.specializations.edit', $specialization) }}" class="btn btn-warning">
            <i class="bi bi-pencil"></i> Edit
        </a>
        <a href="{{ route('admin.specializations.index') }}" class="btn btn-secondary">
            <i class="bi bi-arrow-left"></i> Back
        </a>
    </div>
</div>

<div class="row">
    <div class="col-md-8">
        <div class="card shadow-sm">
            <div class="card-header">
                <h5 class="mb-0">Specialization Information</h5>
            </div>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-md-4">
                        <strong>Specialization Name:</strong>
                    </div>
                    <div class="col-md-8">
                        {{ $specialization->name }}
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-4">
                        <strong>Course:</strong>
                    </div>
                    <div class="col-md-8">
                        <span class="badge bg-primary">
                            {{ $specialization->course->name }}
                        </span>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-4">
                        <strong>Education Level:</strong>
                    </div>
                    <div class="col-md-8">
                        <span class="badge bg-secondary">
                            {{ $specialization->course->educationLevel->name }}
                        </span>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-4">
                        <strong>Course Duration:</strong>
                    </div>
                    <div class="col-md-8">
                        {{ $specialization->course->duration_value }} {{ $specialization->course->duration_unit }}
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-4">
                        <strong>Status:</strong>
                    </div>
                    <div class="col-md-8">
                        <span class="badge bg-{{ $specialization->status ? 'success' : 'secondary' }}">
                            {{ $specialization->status ? 'Active' : 'Inactive' }}
                        </span>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-4">
                        <strong>Created At:</strong>
                    </div>
                    <div class="col-md-8">
                        {{ $specialization->created_at->format('F d, Y h:i A') }}
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-4">
                        <strong>Last Updated:</strong>
                    </div>
                    <div class="col-md-8">
                        {{ $specialization->updated_at->format('F d, Y h:i A') }}
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
                    <a href="{{ route('admin.specializations.edit', $specialization) }}" class="btn btn-warning">
                        <i class="bi bi-pencil"></i> Edit Specialization
                    </a>

                    <form action="{{ route('admin.specializations.toggle-status', $specialization) }}"
                          method="POST">
                        @csrf
                        @method('PATCH')
                        <button type="submit" class="btn btn-{{ $specialization->status ? 'secondary' : 'success' }} w-100">
                            <i class="bi bi-toggle-{{ $specialization->status ? 'off' : 'on' }}"></i>
                            {{ $specialization->status ? 'Deactivate' : 'Activate' }}
                        </button>
                    </form>

                    <form action="{{ route('admin.specializations.destroy', $specialization) }}"
                          method="POST"
                          onsubmit="return confirm('Are you sure you want to delete this specialization?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger w-100">
                            <i class="bi bi-trash"></i> Delete Specialization
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <div class="card shadow-sm mt-3">
            <div class="card-header">
                <h5 class="mb-0">Related Information</h5>
            </div>
            <div class="card-body">
                <p class="mb-2 small">
                    <i class="bi bi-book"></i> <strong>Course:</strong>
                    {{ $specialization->course->name }}
                </p>
                <p class="mb-2 small">
                    <i class="bi bi-mortarboard"></i> <strong>Education Level:</strong>
                    {{ $specialization->course->educationLevel->name }}
                </p>
                <p class="mb-0 small">
                    <i class="bi bi-clock-history"></i> <strong>In system for:</strong>
                    {{ $specialization->created_at->diffForHumans() }}
                </p>
            </div>
        </div>
    </div>
</div>
@endsection
