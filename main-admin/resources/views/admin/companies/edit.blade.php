@extends('layouts.admin')

@section('title', 'Edit Company')

@section('content')
    <div class="row mb-4">
        <div class="col-md-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.companies.index') }}">Companies</a></li>
                    <li class="breadcrumb-item active">Edit Company</li>
                </ol>
            </nav>
            <h2><i class="bi bi-pencil"></i> Edit Company: {{ $company->name }}</h2>
        </div>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">
            <form method="POST" action="{{ route('admin.companies.update', $company) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="row">
                    <!-- Basic Information -->
                    <div class="col-md-12 mb-4">
                        <h5 class="border-bottom pb-2"><i class="bi bi-info-circle"></i> Basic Information</h5>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="name" class="form-label">Company Name <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                            name="name" value="{{ old('name', $company->name) }}" required>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="logo" class="form-label">Company Logo</label>
                        @if ($company->logo)
                            <div class="mb-2">
                                <img src="{{ asset('storage/' . $company->logo) }}" alt="Current Logo" class="rounded"
                                    width="100">
                            </div>
                        @endif
                        <input type="file" class="form-control @error('logo') is-invalid @enderror" id="logo"
                            name="logo" accept="image/*">
                        <small class="text-muted">Leave empty to keep current logo</small>
                        @error('logo')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="industry" class="form-label">Industry</label>
                        <input type="text" class="form-control @error('industry') is-invalid @enderror" id="industry"
                            name="industry" value="{{ old('industry', $company->industry) }}">
                        @error('industry')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="company_size" class="form-label">Company Size</label>
                        <select class="form-control @error('company_size') is-invalid @enderror" id="company_size"
                            name="company_size">
                            <option value="">Select Size</option>
                            <option value="1-50"
                                {{ old('company_size', $company->company_size) == '1-50' ? 'selected' : '' }}>1-50 employees
                            </option>
                            <option value="51-200"
                                {{ old('company_size', $company->company_size) == '51-200' ? 'selected' : '' }}>51-200
                                employees</option>
                            <option value="201-500"
                                {{ old('company_size', $company->company_size) == '201-500' ? 'selected' : '' }}>201-500
                                employees</option>
                            <option value="500+"
                                {{ old('company_size', $company->company_size) == '500+' ? 'selected' : '' }}>500+
                                employees</option>
                        </select>
                        @error('company_size')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="location" class="form-label">Location</label>
                        <input type="text" class="form-control @error('location') is-invalid @enderror" id="location"
                            name="location" value="{{ old('location', $company->location) }}">
                        @error('location')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="website" class="form-label">Website</label>
                        <input type="url" class="form-control @error('website') is-invalid @enderror" id="website"
                            name="website" value="{{ old('website', $company->website) }}">
                        @error('website')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-12 mb-3">
                        <label for="description" class="form-label">Company Description</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description"
                            rows="3">{{ old('description', $company->description) }}</textarea>
                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-12 mb-3">
                        <label for="about_us" class="form-label">About Us</label>
                        <textarea class="form-control @error('about_us') is-invalid @enderror" id="about_us" name="about_us" rows="4">{{ old('about_us', $company->about_us) }}</textarea>
                        @error('about_us')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Additional Information -->
                    <div class="col-md-12 mb-4 mt-3">
                        <h5 class="border-bottom pb-2"><i class="bi bi-file-text"></i> Additional Information</h5>
                    </div>

                    <div class="col-md-12 mb-3">
                        <label for="employee_benefits" class="form-label">Employee Benefits</label>
                        <textarea class="form-control @error('employee_benefits') is-invalid @enderror" id="employee_benefits"
                            name="employee_benefits" rows="3">{{ old('employee_benefits', $company->employee_benefits) }}</textarea>
                        @error('employee_benefits')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-12 mb-3">
                        <label for="work_culture" class="form-label">Work Culture</label>
                        <textarea class="form-control @error('work_culture') is-invalid @enderror" id="work_culture" name="work_culture"
                            rows="3">{{ old('work_culture', $company->work_culture) }}</textarea>
                        @error('work_culture')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-12 mb-3">
                        <label for="application_process" class="form-label">Application Process</label>
                        <textarea class="form-control @error('application_process') is-invalid @enderror" id="application_process"
                            name="application_process" rows="3">{{ old('application_process', $company->application_process) }}</textarea>
                        @error('application_process')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="company_video" class="form-label">Company Video URL</label>
                        <input type="url" class="form-control @error('company_video') is-invalid @enderror"
                            id="company_video" name="company_video"
                            value="{{ old('company_video', $company->company_video) }}">
                        @error('company_video')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Status</label>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="is_active" name="is_active"
                                value="1" {{ old('is_active', $company->is_active) ? 'checked' : '' }}>
                            <label class="form-check-label" for="is_active">
                                Active
                            </label>
                        </div>
                    </div>

                    <!-- Optional Fields -->
                    <div class="col-md-12 mb-4 mt-3">
                        <h5 class="border-bottom pb-2"><i class="bi bi-three-dots"></i> Optional Information</h5>
                    </div>

                    <div class="col-md-12 mb-3">
                        <label for="notable_clients_projects" class="form-label">Notable Clients/Projects</label>
                        <textarea class="form-control @error('notable_clients_projects') is-invalid @enderror" id="notable_clients_projects"
                            name="notable_clients_projects" rows="3">{{ old('notable_clients_projects', $company->notable_clients_projects) }}</textarea>
                        @error('notable_clients_projects')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-12 mb-3">
                        <label for="employee_reviews" class="form-label">Employee Reviews/Testimonials</label>
                        <textarea class="form-control @error('employee_reviews') is-invalid @enderror" id="employee_reviews"
                            name="employee_reviews" rows="3">{{ old('employee_reviews', $company->employee_reviews) }}</textarea>
                        @error('employee_reviews')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-12 mb-3">
                        <label for="diversity_inclusion" class="form-label">Diversity & Inclusion Statement</label>
                        <textarea class="form-control @error('diversity_inclusion') is-invalid @enderror" id="diversity_inclusion"
                            name="diversity_inclusion" rows="3">{{ old('diversity_inclusion', $company->diversity_inclusion) }}</textarea>
                        @error('diversity_inclusion')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-12 mb-3">
                        <label for="legal_information" class="form-label">Legal Information</label>
                        <textarea class="form-control @error('legal_information') is-invalid @enderror" id="legal_information"
                            name="legal_information" rows="3">{{ old('legal_information', $company->legal_information) }}</textarea>
                        @error('legal_information')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Change Password Section -->
                    <div class="col-md-12 mb-4 mt-3">
                        <h5 class="border-bottom pb-2"><i class="bi bi-key"></i> Change Password (Optional)</h5>
                        <p class="text-muted small">Leave blank to keep current password</p>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="password" class="form-label">New Password</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror"
                            id="password" name="password" autocomplete="new-password">
                        <small class="text-muted">Minimum 8 characters</small>
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="password_confirmation" class="form-label">Confirm New Password</label>
                        <input type="password" class="form-control" id="password_confirmation"
                            name="password_confirmation" autocomplete="new-password">
                    </div>
                </div>

                <div class="mt-4">
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-check-circle"></i> Update Company
                    </button>
                    <a href="{{ route('admin.companies.index') }}" class="btn btn-secondary">
                        <i class="bi bi-x-circle"></i> Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection
