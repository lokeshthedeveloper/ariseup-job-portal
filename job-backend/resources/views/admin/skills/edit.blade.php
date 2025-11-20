@extends('layouts.admin')

@section('title', 'Edit Skill')

@section('content')
<div class="row mb-4">
    <div class="col-md-12">
        <h2><i class="bi bi-pencil"></i> Edit Skill</h2>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.skills.index') }}">Skills</a></li>
                <li class="breadcrumb-item active">Edit: {{ $skill->name }}</li>
            </ol>
        </nav>
    </div>
</div>

<div class="row">
    <div class="col-md-8">
        <div class="card shadow-sm">
            <div class="card-body">
                <form action="{{ route('admin.skills.update', $skill) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="name" class="form-label">Skill Name <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                               id="name" name="name" value="{{ old('name', $skill->name) }}" required autofocus>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <small class="form-text text-muted">Enter the skill name (e.g., PHP, JavaScript, etc.)</small>
                    </div>

                    <div class="mb-3">
                        <label for="code" class="form-label">Skill Code (Optional)</label>
                        <input type="text" class="form-control @error('code') is-invalid @enderror"
                               id="code" name="code" value="{{ old('code', $skill->code) }}" placeholder="e.g., php, javascript">
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
                                        {{ old('skill_category_id', $skill->skill_category_id) == $category->id ? 'selected' : '' }}>
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
                            <option value="1" {{ old('status', $skill->status) == '1' ? 'selected' : '' }}>Active</option>
                            <option value="0" {{ old('status', $skill->status) == '0' ? 'selected' : '' }}>Inactive</option>
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
                            <i class="bi bi-save"></i> Update Skill
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card shadow-sm">
            <div class="card-header bg-secondary text-white">
                <i class="bi bi-info-circle"></i> Skill Information
            </div>
            <div class="card-body">
                <p class="small mb-2"><strong>ID:</strong> {{ $skill->id }}</p>
                <p class="small mb-2"><strong>Created:</strong> {{ $skill->created_at->format('M d, Y H:i') }}</p>
                <p class="small mb-2"><strong>Updated:</strong> {{ $skill->updated_at->format('M d, Y H:i') }}</p>
                <p class="small mb-3"><strong>Current Category:</strong> {{ $skill->category->name ?? 'N/A' }}</p>
            </div>
        </div>

        <div class="card shadow-sm mt-3">
            <div class="card-header bg-danger text-white">
                <i class="bi bi-trash"></i> Danger Zone
            </div>
            <div class="card-body">
                <p class="small">Delete this skill permanently.</p>
                <form action="{{ route('admin.skills.destroy', $skill) }}" method="POST"
                      onsubmit="return confirm('Are you sure you want to delete this skill? This action cannot be undone.');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">
                        <i class="bi bi-trash"></i> Delete Skill
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
