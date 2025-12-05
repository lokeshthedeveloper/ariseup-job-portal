@extends('layouts.admin')

@section('title', 'Edit Theme')

@section('content')
    <div class="row mb-4">
        <div class="col-md-12">
            <h2><i class="bi bi-palette"></i> Edit Theme</h2>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.themes.index') }}">Themes</a></li>
                    <li class="breadcrumb-item active">Edit: {{ $theme->name }}</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-body">
                    <form action="{{ route('admin.themes.update', $theme) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="name" class="form-label">Theme Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                                name="name" value="{{ old('name', $theme->name) }}" required autofocus>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="slug" class="form-label">Slug</label>
                            <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug"
                                name="slug" value="{{ old('slug', $theme->slug) }}">
                            <small class="text-muted">URL-friendly version of the name</small>
                            @error('slug')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="status" name="status" value="1"
                                {{ old('status', $theme->status) ? 'checked' : '' }}>
                            <label class="form-check-label" for="status">
                                Active
                            </label>
                        </div>

                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-check-lg"></i> Update Theme
                            </button>
                            <a href="{{ route('admin.themes.index') }}" class="btn btn-secondary">
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
                    <h5 class="mb-0">Theme Details</h5>
                </div>
                <div class="card-body">
                    <p><strong>Created:</strong> {{ $theme->created_at->format('M d, Y') }}</p>
                    <p><strong>Last Updated:</strong> {{ $theme->updated_at->format('M d, Y') }}</p>
                    <p><strong>Components:</strong> {{ $theme->components->count() }}</p>
                </div>
            </div>

            <div class="card shadow-sm">
                <div class="card-header">
                    <h5 class="mb-0">Danger Zone</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.themes.destroy', $theme) }}" method="POST"
                        onsubmit="return confirm('Are you sure you want to delete this theme? This action cannot be undone.');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger w-100">
                            <i class="bi bi-trash"></i> Delete Theme
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
