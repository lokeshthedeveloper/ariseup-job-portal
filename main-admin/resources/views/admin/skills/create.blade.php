@extends('layouts.admin')

@section('title', 'Create Skill')

@section('content')
<div class="row mb-4">
    <div class="col-md-12">
        <h2><i class="bi bi-plus-circle"></i> Create New Skill</h2>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.skills.index') }}">Skills</a></li>
                <li class="breadcrumb-item active">Create</li>
            </ol>
        </nav>
    </div>
</div>

<div class="row">
    <div class="col-md-8">
        <div class="card shadow-sm">
            <div class="card-body">
                <form action="{{ route('admin.skills.store') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label for="name" class="form-label">Skill Name <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                               id="name" name="name" value="{{ old('name') }}" required autofocus>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <small class="form-text text-muted">Enter the skill name (e.g., PHP, JavaScript, etc.)</small>
                    </div>

                    <div class="mb-3">
                        <label for="code" class="form-label">Skill Code (Optional)</label>
                        <input type="text" class="form-control @error('code') is-invalid @enderror"
                               id="code" name="code" value="{{ old('code') }}" placeholder="e.g., php, javascript">
                        @error('code')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <small class="form-text text-muted">A unique code identifier for this skill (lowercase recommended).</small>
                    </div>

                    <div class="mb-3">
                        <label for="skill_category_id" class="form-label">Skill Category <span class="text-danger">*</span></label>
                        <select class="form-select @error('skill_category_id') is-invalid @enderror"
                                id="skill_category_id" name="skill_category_id" required>
                            <option value="">-- Select Category --</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}"
                                        {{ old('skill_category_id', request('category')) == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('skill_category_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <small class="form-text text-muted">
                            Only active categories are shown.
                            <a href="{{ route('admin.skill-categories.create') }}" target="_blank">Create new category</a>
                        </small>
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
                        <small class="form-text text-muted">Active skills will be available in dropdown lists.</small>
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="{{ route('admin.skills.index') }}" class="btn btn-secondary">
                            <i class="bi bi-arrow-left"></i> Cancel
                        </a>
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-save"></i> Create Skill
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
                <h6>About Skills</h6>
                <p class="small">Skills are specific competencies or technologies that belong to a category.</p>

                <h6 class="mt-3">Tips:</h6>
                <ul class="small">
                    <li>Use clear, specific names</li>
                    <li>Assign to the appropriate category</li>
                    <li>Add a unique code for API usage</li>
                    <li>Avoid duplicate names in same category</li>
                </ul>

                <h6 class="mt-3">Examples:</h6>
                <ul class="small mb-0">
                    <li><strong>Name:</strong> PHP <strong>Code:</strong> php</li>
                    <li><strong>Name:</strong> JavaScript <strong>Code:</strong> javascript</li>
                    <li><strong>Name:</strong> Laravel <strong>Code:</strong> laravel</li>
                    <li><strong>Name:</strong> React <strong>Code:</strong> react</li>
                </ul>
            </div>
        </div>

        @if($categories->isEmpty())
        <div class="card shadow-sm mt-3 border-warning">
            <div class="card-body">
                <h6 class="text-warning"><i class="bi bi-exclamation-triangle"></i> No Categories</h6>
                <p class="small">You need to create at least one skill category before adding skills.</p>
                <a href="{{ route('admin.skill-categories.create') }}" class="btn btn-warning btn-sm">
                    <i class="bi bi-plus-circle"></i> Create Category
                </a>
            </div>
        </div>
        @endif
    </div>
</div>
@endsection
