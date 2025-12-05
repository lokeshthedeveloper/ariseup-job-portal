@extends('layouts.admin')

@section('title', 'Create Theme')

@section('content')
    <div class="row mb-4">
        <div class="col-md-12">
            <h2><i class="bi bi-palette"></i> Create New Theme</h2>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.themes.index') }}">Themes</a></li>
                    <li class="breadcrumb-item active">Create</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-body">
                    <form action="{{ route('admin.themes.store') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="name" class="form-label">Theme Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                                name="name" value="{{ old('name') }}" required autofocus>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="slug" class="form-label">Slug <small class="text-muted">(Leave empty to
                                    auto-generate)</small></label>
                            <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug"
                                name="slug" value="{{ old('slug') }}">
                            <small class="text-muted">URL-friendly version of the name</small>
                            @error('slug')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="status" name="status" value="1"
                                {{ old('status', true) ? 'checked' : '' }}>
                            <label class="form-check-label" for="status">
                                Active
                            </label>
                        </div>

                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-check-lg"></i> Create Theme
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
            <div class="card shadow-sm">
                <div class="card-header">
                    <h5 class="mb-0">Quick Help</h5>
                </div>
                <div class="card-body">
                    <p><strong>Theme Name:</strong> Enter a descriptive name for your theme.</p>
                    <p><strong>Slug:</strong> Leave empty to auto-generate from the name, or provide a custom URL-friendly
                        identifier.</p>
                    <p><strong>Status:</strong> Check to make the theme active immediately.</p>
                </div>
            </div>
        </div>
    </div>
@endsection
