@extends('layouts.admin')

@section('title', 'Create Skill Category')

@section('content')
<div class="row mb-4">
    <div class="col-md-12">
        <h2><i class="bi bi-plus-circle"></i> Create New Skill Category</h2>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.skill-categories.index') }}">Skill Categories</a></li>
                <li class="breadcrumb-item active">Create</li>
            </ol>
        </nav>
    </div>
</div>

<div class="row">
    <div class="col-md-8">
        <div class="card shadow-sm">
            <div class="card-body">
                <form action="{{ route('admin.skill-categories.store') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label for="name" class="form-label">Category Name <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                               id="name" name="name" value="{{ old('name') }}" required autofocus>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <small class="form-text text-muted">Enter a unique name for the skill category.</small>
                    </div>

                    <div class="mb-3">
                        <label for="status" class="form-label">Status <span class="text-danger">*</span></label>
                        <select class="form-select @error('status') is-invalid @enderror" id="status" name="status" required>
                            <option value="1" {{ old('status', '1') == '1' ? 'selected' : '' }}>Active</option>
                            <option value="0" {{ old('status') == '0' ? 'selected' : '' }}>Inactive</option>
                        </select>
                        @error('status')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <small class="form-text text-muted">Active categories will be available in dropdown lists.</small>
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="{{ route('admin.skill-categories.index') }}" class="btn btn-secondary">
                            <i class="bi bi-arrow-left"></i> Cancel
                        </a>
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-save"></i> Create Category
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card shadow-sm">
            <div class="card-header bg-info text-white">
                <i class="bi bi-info-circle"></i> Information
            </div>
            <div class="card-body">
                <h6>About Skill Categories</h6>
                <p class="small">Skill categories are used to organize skills into logical groups.</p>

                <h6 class="mt-3">Tips:</h6>
                <ul class="small">
                    <li>Use clear, descriptive names</li>
                    <li>Keep categories broad but meaningful</li>
                    <li>Avoid duplicate category names</li>
                    <li>Set status to "Active" to make it available</li>
                </ul>

                <h6 class="mt-3">Examples:</h6>
                <ul class="small mb-0">
                    <li>Programming Languages</li>
                    <li>Frameworks & Libraries</li>
                    <li>Databases</li>
                    <li>Cloud Platforms</li>
                    <li>Soft Skills</li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection
