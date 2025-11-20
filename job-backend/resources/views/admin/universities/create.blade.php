@extends('layouts.admin')

@section('title', 'Add New University')

@section('content')
<div class="row mb-4">
    <div class="col-md-12">
        <h2><i class="bi bi-mortarboard-fill"></i> Add New University</h2>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.universities.index') }}">Universities</a></li>
                <li class="breadcrumb-item active">Create</li>
            </ol>
        </nav>
    </div>
</div>

<div class="row">
    <div class="col-md-8">
        <div class="card shadow-sm">
            <div class="card-header">
                <h5 class="mb-0">University Information</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.universities.store') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label for="name" class="form-label">University Name <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                               id="name" name="name" value="{{ old('name') }}" required>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="country" class="form-label">Country <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('country') is-invalid @enderror"
                                       id="country" name="country" value="{{ old('country') }}" required>
                                @error('country')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="state" class="form-label">State <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('state') is-invalid @enderror"
                                       id="state" name="state" value="{{ old('state') }}" required>
                                @error('state')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="type" class="form-label">University Type <span class="text-danger">*</span></label>
                                <select class="form-select @error('type') is-invalid @enderror"
                                        id="type" name="type" required>
                                    <option value="">Select Type</option>
                                    <option value="Government" {{ old('type') == 'Government' ? 'selected' : '' }}>Government</option>
                                    <option value="Private" {{ old('type') == 'Private' ? 'selected' : '' }}>Private</option>
                                    <option value="Other" {{ old('type') == 'Other' ? 'selected' : '' }}>Other</option>
                                </select>
                                @error('type')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="established_year" class="form-label">Established Year <span class="text-danger">*</span></label>
                                <input type="number" class="form-control @error('established_year') is-invalid @enderror"
                                       id="established_year" name="established_year" value="{{ old('established_year') }}"
                                       min="1000" max="{{ date('Y') + 1 }}" required>
                                @error('established_year')
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
                        <a href="{{ route('admin.universities.index') }}" class="btn btn-secondary">
                            <i class="bi bi-arrow-left"></i> Cancel
                        </a>
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-save"></i> Create University
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
                    <li><strong>University Name:</strong> Full official name of the university</li>
                    <li><strong>Country:</strong> Country where the university is located</li>
                    <li><strong>State:</strong> State or province where the university is located</li>
                    <li><strong>Type:</strong> Government, Private, or Other</li>
                    <li><strong>Established Year:</strong> Year when the university was founded</li>
                    <li><strong>Status:</strong> Active universities are visible to users, inactive ones are hidden</li>
                </ul>

                <div class="alert alert-info small">
                    <i class="bi bi-lightbulb"></i> <strong>Tip:</strong> Make sure all information is accurate before saving.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
