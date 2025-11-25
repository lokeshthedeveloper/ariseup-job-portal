@extends('layouts.admin')

@section('title', 'Edit Skill Category')

@section('content')
<div class="row mb-4">
    <div class="col-md-12">
        <h2><i class="bi bi-pencil"></i> Edit Skill Category</h2>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.skill-categories.index') }}">Skill Categories</a></li>
                <li class="breadcrumb-item active">Edit: {{ $skillCategory->name }}</li>
            </ol>
        </nav>
    </div>
</div>

<div class="row">
    <div class="col-md-8">
        <div class="card shadow-sm">
            <div class="card-body">
                <form action="{{ route('admin.skill-categories.update', $skillCategory) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="name" class="form-label">Category Name <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                               id="name" name="name" value="{{ old('name', $skillCategory->name) }}" required autofocus>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <small class="form-text text-muted">Enter a unique name for the skill category.</small>
                    </div>

                    <div class="mb-3">
                        <label for="status" class="form-label">Status <span class="text-danger">*</span></label>
                        <select class="form-select @error('status') is-invalid @enderror" id="status" name="status" required>
                            <option value="1" {{ old('status', $skillCategory->status) == '1' ? 'selected' : '' }}>Active</option>
                            <option value="0" {{ old('status', $skillCategory->status) == '0' ? 'selected' : '' }}>Inactive</option>
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
                            <i class="bi bi-save"></i> Update Category
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card shadow-sm">
            <div class="card-header bg-secondary text-white">
                <i class="bi bi-info-circle"></i> Category Information
            </div>
            <div class="card-body">
                <p class="small mb-2"><strong>ID:</strong> {{ $skillCategory->id }}</p>
                <p class="small mb-2"><strong>Created:</strong> {{ $skillCategory->created_at->format('M d, Y H:i') }}</p>
                <p class="small mb-2"><strong>Updated:</strong> {{ $skillCategory->updated_at->format('M d, Y H:i') }}</p>
                <p class="small mb-3"><strong>Associated Skills:</strong> {{ $skillCategory->skills->count() }}</p>

                @if($skillCategory->skills->count() > 0)
                    <div class="alert alert-warning small">
                        <i class="bi bi-exclamation-triangle"></i> This category has {{ $skillCategory->skills->count() }} associated skill(s). Deleting it will affect those skills.
                    </div>
                @endif
            </div>
        </div>

        <div class="card shadow-sm mt-3">
            <div class="card-header bg-danger text-white">
                <i class="bi bi-trash"></i> Danger Zone
            </div>
            <div class="card-body">
                <p class="small">Delete this skill category permanently.</p>
                @if($skillCategory->skills->count() > 0)
                    <button class="btn btn-danger btn-sm" disabled>
                        <i class="bi bi-trash"></i> Cannot Delete (Has Skills)
                    </button>
                    <small class="d-block mt-2 text-muted">Remove all associated skills first.</small>
                @else
                    <form action="{{ route('admin.skill-categories.destroy', $skillCategory) }}" method="POST"
                          onsubmit="return confirm('Are you sure you want to delete this category? This action cannot be undone.');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">
                            <i class="bi bi-trash"></i> Delete Category
                        </button>
                    </form>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
