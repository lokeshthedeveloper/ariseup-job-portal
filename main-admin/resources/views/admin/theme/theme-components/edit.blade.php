@extends('layouts.admin')

@section('title', 'Manage Theme Components')

@section('content')
    <div class="row mb-4">
        <div class="col-md-12">
            <h2><i class="bi bi-link-45deg"></i> Manage Components for: {{ $theme->name }}</h2>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.theme-components.index') }}">Theme Components</a>
                    </li>
                    <li class="breadcrumb-item active">{{ $theme->name }}</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-body">
                    <form action="{{ route('admin.theme-components.update', $theme) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <h5 class="mb-3">Select Components</h5>
                        <p class="text-muted">Choose which components should be available in this theme</p>

                        <div class="row">
                            @forelse($components as $component)
                                <div class="col-md-6 mb-3">
                                    <div
                                        class="form-check p-3 border rounded {{ in_array($component->id, $selectedComponents) ? 'bg-light border-primary' : '' }}">
                                        <input class="form-check-input" type="checkbox" name="components[]"
                                            value="{{ $component->id }}" id="component_{{ $component->id }}"
                                            {{ in_array($component->id, $selectedComponents) ? 'checked' : '' }}>
                                        <label class="form-check-label w-100" for="component_{{ $component->id }}">
                                            <strong><i class="bi bi-puzzle"></i> {{ $component->name }}</strong>
                                            <br>
                                            <small class="text-muted">Slug: {{ $component->slug }}</small>
                                        </label>
                                    </div>
                                </div>
                            @empty
                                <div class="col-md-12">
                                    <p class="text-center text-muted py-4">
                                        No active components available.
                                        <a href="{{ route('admin.components.create') }}">Create one</a>
                                    </p>
                                </div>
                            @endforelse
                        </div>

                        <div class="mt-4 d-flex gap-2">
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-check-lg"></i> Update Components
                            </button>
                            <a href="{{ route('admin.theme-components.index') }}" class="btn btn-secondary">
                                <i class="bi bi-x-lg"></i> Cancel
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow-sm mb-3">
                <div class="card-header">
                    <h5 class="mb-0">Theme Info</h5>
                </div>
                <div class="card-body">
                    <p><strong>Name:</strong> {{ $theme->name }}</p>
                    <p><strong>Slug:</strong> <code>{{ $theme->slug }}</code></p>
                    <p><strong>Status:</strong>
                        <span class="badge bg-{{ $theme->status ? 'success' : 'secondary' }}">
                            {{ $theme->status ? 'Active' : 'Inactive' }}
                        </span>
                    </p>
                    <p class="mb-0"><strong>Current Components:</strong> {{ count($selectedComponents) }}</p>
                </div>
            </div>

            <div class="card shadow-sm">
                <div class="card-header">
                    <h5 class="mb-0">Quick Tips</h5>
                </div>
                <div class="card-body">
                    <ul class="mb-0">
                        <li>Select multiple components for this theme</li>
                        <li>Components can be used across multiple themes</li>
                        <li>Only active components are shown here</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
