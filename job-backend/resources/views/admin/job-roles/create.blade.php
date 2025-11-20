@extends('layouts.admin')

@section('title', 'Add New Job Role')

@section('content')
<div class="row mb-4">
    <div class="col-md-12">
        <h2><i class="bi bi-person-badge"></i> Add New Job Role</h2>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.job-roles.index') }}">Job Roles</a></li>
                <li class="breadcrumb-item active">Create</li>
            </ol>
        </nav>
    </div>
</div>

<div class="row">
    <div class="col-md-8">
        <div class="card shadow-sm">
            <div class="card-header">
                <h5 class="mb-0">Job Role Information</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.job-roles.store') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label for="name" class="form-label">Job Role Name <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                               id="name" name="name" value="{{ old('name') }}" required>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="role_category_id" class="form-label">Role Category <span class="text-danger">*</span></label>
                        <select class="form-select @error('role_category_id') is-invalid @enderror"
                                id="role_category_id" name="role_category_id" required>
                            <option value="">Select Role Category</option>
                            @foreach($roleCategories as $roleCategory)
                                <option value="{{ $roleCategory->id }}" {{ old('role_category_id') == $roleCategory->id ? 'selected' : '' }}>
                                    {{ $roleCategory->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('role_category_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
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
                        <a href="{{ route('admin.job-roles.index') }}" class="btn btn-secondary">
                            <i class="bi bi-arrow-left"></i> Cancel
                        </a>
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-save"></i> Create Job Role
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
                    <li><strong>Job Role Name:</strong> Name of the job role (e.g., Senior Manager, Team Lead)</li>
                    <li><strong>Role Category:</strong> The category this job role belongs to</li>
                    <li><strong>Status:</strong> Active job roles are visible to users, inactive ones are hidden</li>
                </ul>

                <div class="alert alert-info small">
                    <i class="bi bi-lightbulb"></i> <strong>Tip:</strong> Make sure to select the appropriate role category for accurate categorization.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
