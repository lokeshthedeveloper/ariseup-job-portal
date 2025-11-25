@extends('layouts.admin')

@section('title', 'Country Details')

@section('content')
<div class="row mb-4">
    <div class="col-md-8">
        <h2><i class="bi bi-globe"></i> Country Details</h2>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.countries.index') }}">Countries</a></li>
                <li class="breadcrumb-item active">{{ $country->name }}</li>
            </ol>
        </nav>
    </div>
    <div class="col-md-4 text-end">
        <a href="{{ route('admin.countries.edit', $country) }}" class="btn btn-warning">
            <i class="bi bi-pencil"></i> Edit
        </a>
        <a href="{{ route('admin.countries.index') }}" class="btn btn-secondary">
            <i class="bi bi-arrow-left"></i> Back
        </a>
    </div>
</div>

<div class="row">
    <div class="col-md-8">
        <div class="card shadow-sm">
            <div class="card-header">
                <h5 class="mb-0">Country Information</h5>
            </div>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-md-4">
                        <strong>Country Name:</strong>
                    </div>
                    <div class="col-md-8">
                        {{ $country->name }}
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-4">
                        <strong>Country Code:</strong>
                    </div>
                    <div class="col-md-8">
                        <span class="badge bg-info">{{ $country->code }}</span>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-4">
                        <strong>Status:</strong>
                    </div>
                    <div class="col-md-8">
                        <span class="badge bg-{{ $country->status ? 'success' : 'secondary' }}">
                            {{ $country->status ? 'Active' : 'Inactive' }}
                        </span>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-4">
                        <strong>Created At:</strong>
                    </div>
                    <div class="col-md-8">
                        {{ $country->created_at->format('F d, Y h:i A') }}
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-4">
                        <strong>Last Updated:</strong>
                    </div>
                    <div class="col-md-8">
                        {{ $country->updated_at->format('F d, Y h:i A') }}
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
                    <a href="{{ route('admin.countries.edit', $country) }}" class="btn btn-warning">
                        <i class="bi bi-pencil"></i> Edit Country
                    </a>

                    <form action="{{ route('admin.countries.toggle-status', $country) }}"
                          method="POST">
                        @csrf
                        @method('PATCH')
                        <button type="submit" class="btn btn-{{ $country->status ? 'secondary' : 'success' }} w-100">
                            <i class="bi bi-toggle-{{ $country->status ? 'off' : 'on' }}"></i>
                            {{ $country->status ? 'Deactivate' : 'Activate' }}
                        </button>
                    </form>

                    <form action="{{ route('admin.countries.destroy', $country) }}"
                          method="POST"
                          onsubmit="return confirm('Are you sure you want to delete this country?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger w-100">
                            <i class="bi bi-trash"></i> Delete Country
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
                    <i class="bi bi-map"></i> <strong>States:</strong>
                    {{ $country->states_count ?? 0 }}
                </p>
                <p class="mb-2 small">
                    <i class="bi bi-geo-alt"></i> <strong>Cities:</strong>
                    {{ $country->cities_count ?? 0 }}
                </p>
                <p class="mb-0 small">
                    <i class="bi bi-clock-history"></i> <strong>In system for:</strong>
                    {{ $country->created_at->diffForHumans() }}
                </p>
            </div>
        </div>
    </div>
</div>
@endsection
