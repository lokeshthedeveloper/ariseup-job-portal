@extends('layouts.admin')

@section('title', 'Edit Specialization')

@section('content')
<div class="row mb-4">
    <div class="col-md-12">
        <h2><i class="bi bi-award"></i> Edit Specialization</h2>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.specializations.index') }}">Specializations</a></li>
                <li class="breadcrumb-item active">Edit</li>
            </ol>
        </nav>
    </div>
</div>

<div class="row">
    <div class="col-md-8">
        <div class="card shadow-sm">
            <div class="card-header">
                <h5 class="mb-0">Specialization Information</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.specializations.update', $specialization) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="name" class="form-label">Specialization Name <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                               id="name" name="name" value="{{ old('name', $specialization->name) }}" required>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="course_id" class="form-label">Course <span class="text-danger">*</span></label>
                        <select class="form-select @error('course_id') is-invalid @enderror"
                                id="course_id" name="course_id" required>
                            <option value="">Select Course</option>
                            @foreach($courses as $course)
                                <option value="{{ $course->id }}" {{ old('course_id', $specialization->course_id) == $course->id ? 'selected' : '' }}>
                                    {{ $course->name }} ({{ $course->educationLevel->name }})
                                </option>
                            @endforeach
                        </select>
                        @error('course_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="status" class="form-label">Status <span class="text-danger">*</span></label>
                        <select class="form-select @error('status') is-invalid @enderror"
                                id="status" name="status" required>
                            <option value="1" {{ old('status', $specialization->status) == '1' ? 'selected' : '' }}>Active</option>
                            <option value="0" {{ old('status', $specialization->status) == '0' ? 'selected' : '' }}>Inactive</option>
                        </select>
                        @error('status')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="{{ route('admin.specializations.index') }}" class="btn btn-secondary">
                            <i class="bi bi-arrow-left"></i> Cancel
                        </a>
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-save"></i> Update Specialization
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card shadow-sm mb-3">
            <div class="card-header">
                <h5 class="mb-0"><i class="bi bi-info-circle"></i> Information</h5>
            </div>
            <div class="card-body">
                <p class="small mb-2"><strong>Created:</strong> {{ $specialization->created_at->format('M d, Y h:i A') }}</p>
                <p class="small mb-0"><strong>Last Updated:</strong> {{ $specialization->updated_at->format('M d, Y h:i A') }}</p>
            </div>
        </div>

        <div class="card shadow-sm">
            <div class="card-header">
                <h5 class="mb-0"><i class="bi bi-info-circle"></i> Guidelines</h5>
            </div>
            <div class="card-body">
                <h6>Field Descriptions:</h6>
                <ul class="small">
                    <li><strong>Specialization Name:</strong> Name of the specialization (e.g., Computer Science, Mechanical Engineering, Finance)</li>
                    <li><strong>Course:</strong> The course this specialization belongs to</li>
                    <li><strong>Status:</strong> Active specializations are visible to users, inactive ones are hidden</li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection
