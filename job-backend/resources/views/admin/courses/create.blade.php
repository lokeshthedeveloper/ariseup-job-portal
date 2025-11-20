@extends('layouts.admin')

@section('title', 'Add New Course')

@section('content')
<div class="row mb-4">
    <div class="col-md-12">
        <h2><i class="bi bi-book"></i> Add New Course</h2>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.courses.index') }}">Courses</a></li>
                <li class="breadcrumb-item active">Create</li>
            </ol>
        </nav>
    </div>
</div>

<div class="row">
    <div class="col-md-8">
        <div class="card shadow-sm">
            <div class="card-header">
                <h5 class="mb-0">Course Information</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.courses.store') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label for="name" class="form-label">Course Name <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                               id="name" name="name" value="{{ old('name') }}" required>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="education_level_id" class="form-label">Education Level <span class="text-danger">*</span></label>
                        <select class="form-select @error('education_level_id') is-invalid @enderror"
                                id="education_level_id" name="education_level_id" required>
                            <option value="">Select Education Level</option>
                            @foreach($educationLevels as $level)
                                <option value="{{ $level->id }}" {{ old('education_level_id') == $level->id ? 'selected' : '' }}>
                                    {{ $level->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('education_level_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="duration_value" class="form-label">Duration Value <span class="text-danger">*</span></label>
                                <input type="number" class="form-control @error('duration_value') is-invalid @enderror"
                                       id="duration_value" name="duration_value" value="{{ old('duration_value') }}"
                                       min="1" required>
                                @error('duration_value')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="duration_unit" class="form-label">Duration Unit <span class="text-danger">*</span></label>
                                <select class="form-select @error('duration_unit') is-invalid @enderror"
                                        id="duration_unit" name="duration_unit" required>
                                    <option value="">Select Unit</option>
                                    <option value="Years" {{ old('duration_unit') == 'Years' ? 'selected' : '' }}>Years</option>
                                    <option value="Months" {{ old('duration_unit') == 'Months' ? 'selected' : '' }}>Months</option>
                                </select>
                                @error('duration_unit')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="status" class="form-label">Status <span class="text-danger">*</span></label>
                        <select class="form-select @error('status') is-invalid @enderror"
                                id="status" name="status" required>
                            <option value="1" {{ old('status', '1') == '1' ? 'selected' : '' }}>Active</option>
                            <option value="0" {{ old('status') == '0' ? 'selected' : '' }}>Inactive</option>
                        </select>
                        @error('status')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="{{ route('admin.courses.index') }}" class="btn btn-secondary">
                            <i class="bi bi-arrow-left"></i> Cancel
                        </a>
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-save"></i> Create Course
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card shadow-sm">
            <div class="card-header">
                <h5 class="mb-0"><i class="bi bi-info-circle"></i> Guidelines</h5>
            </div>
            <div class="card-body">
                <h6>Field Descriptions:</h6>
                <ul class="small">
                    <li><strong>Course Name:</strong> Full name of the course (e.g., Bachelor of Science, Master of Business Administration)</li>
                    <li><strong>Education Level:</strong> The level of education this course belongs to</li>
                    <li><strong>Duration Value:</strong> Numeric value for the course duration</li>
                    <li><strong>Duration Unit:</strong> Time unit (Years or Months)</li>
                    <li><strong>Status:</strong> Active courses are visible to users, inactive ones are hidden</li>
                </ul>

                <div class="alert alert-info small">
                    <i class="bi bi-lightbulb"></i> <strong>Tip:</strong> Courses can have multiple specializations.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
