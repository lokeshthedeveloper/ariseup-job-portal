@extends('layouts.admin')

@section('title', 'Edit Component')

@section('content')
    <div class="row mb-4">
        <div class="col-md-12">
            <h2><i class="bi bi-puzzle"></i> Edit Component</h2>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.components.index') }}">Components</a></li>
                    <li class="breadcrumb-item active">Edit: {{ $component->name }}</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-body">
                    <form action="{{ route('admin.components.update', $component) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="name" class="form-label">Component Name <span
                                    class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                                name="name" value="{{ old('name', $component->name) }}" required autofocus>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="slug" class="form-label">Slug</label>
                            <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug"
                                name="slug" value="{{ old('slug', $component->slug) }}">
                            <small class="text-muted">URL-friendly version of the name</small>
                            @error('slug')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="status" name="status" value="1"
                                {{ old('status', $component->status) ? 'checked' : '' }}>
                            <label class="form-check-label" for="status">
                                Active
                            </label>
                        </div>

                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-check-lg"></i> Update Component
                            </button>
                            <a href="{{ route('admin.components.index') }}" class="btn btn-secondary">
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
                    <h5 class="mb-0">Component Details</h5>
                </div>
                <div class="card-body">
                    <p><strong>Created:</strong> {{ $component->created_at->format('M d, Y') }}</p>
                    <p><strong>Last Updated:</strong> {{ $component->updated_at->format('M d, Y') }}</p>
                    <p><strong>Used in Themes:</strong> {{ $component->themes->count() }}</p>
                </div>
            </div>

            <div class="card shadow-sm">
                <div class="card-header">
                    <h5 class="mb-0">Danger Zone</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.components.destroy', $component) }}" method="POST"
                        onsubmit="return confirm('Are you sure you want to delete this component? This action cannot be undone.');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger w-100">
                            <i class="bi bi-trash"></i> Delete Component
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
