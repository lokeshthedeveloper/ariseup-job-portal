@extends('company.layouts.app')

@section('title', 'Edit Profile - ' . config('app.name'))
@section('page-title', 'Edit Profile')

@section('content')
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="mb-0">Edit Company Profile</h4>
                </div>
                <div class="card-body p-4">
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    @if (session('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ session('error') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <form action="{{ route('company.profile.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <h5 class="mb-3">Basic Information</h5>
                        <div class="mb-3">
                            <label for="name" class="form-label">Company Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                                name="name" value="{{ old('name', $company->name) }}" required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="logo" class="form-label">Company Logo</label>
                            @if ($company->logo)
                                <div class="mb-2">
                                    <img src="{{ asset($company->logo) }}" alt="Current Logo" class="img-thumbnail"
                                        style="max-height: 100px;">
                                </div>
                            @endif
                            <input type="file" class="form-control @error('logo') is-invalid @enderror" id="logo"
                                name="logo">
                            @error('logo')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="company_email" class="form-label">Email</label>
                                <input type="email" class="form-control @error('company_email') is-invalid @enderror"
                                    id="company_email" name="company_email"
                                    value="{{ old('company_email', $company->company_email) }}">
                                @error('company_email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="phone" class="form-label">Mobile Number</label>
                                <input type="text" class="form-control @error('phone') is-invalid @enderror"
                                    id="phone" name="phone" value="{{ old('phone', $company->phone) }}">
                                @error('phone')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="address" class="form-label">Address</label>
                            <textarea class="form-control @error('address') is-invalid @enderror" id="address" name="address" rows="2">{{ old('address', $company->address) }}</textarea>
                            @error('address')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label for="city" class="form-label">City</label>
                                <input type="text" class="form-control @error('city') is-invalid @enderror"
                                    id="city" name="city" value="{{ old('city', $company->city) }}">
                                @error('city')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="state" class="form-label">State</label>
                                <input type="text" class="form-control @error('state') is-invalid @enderror"
                                    id="state" name="state" value="{{ old('state', $company->state) }}">
                                @error('state')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="country" class="form-label">Country</label>
                                <input type="text" class="form-control @error('country') is-invalid @enderror"
                                    id="country" name="country" value="{{ old('country', $company->country) }}">
                                @error('country')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <hr class="my-4">

                        <h5 class="mb-3">Social Media</h5>
                        @php
                            $social = $company->social_media_links ?? [];
                        @endphp

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="facebook" class="form-label">Facebook</label>
                                <input type="url" class="form-control @error('facebook') is-invalid @enderror"
                                    id="facebook" name="facebook"
                                    value="{{ old('facebook', $social['facebook'] ?? '') }}"
                                    placeholder="https://facebook.com/...">
                                @error('facebook')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="linkedin" class="form-label">LinkedIn</label>
                                <input type="url" class="form-control @error('linkedin') is-invalid @enderror"
                                    id="linkedin" name="linkedin"
                                    value="{{ old('linkedin', $social['linkedin'] ?? '') }}"
                                    placeholder="https://linkedin.com/...">
                                @error('linkedin')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="youtube" class="form-label">YouTube</label>
                                <input type="url" class="form-control @error('youtube') is-invalid @enderror"
                                    id="youtube" name="youtube" value="{{ old('youtube', $social['youtube'] ?? '') }}"
                                    placeholder="https://youtube.com/...">
                                @error('youtube')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="twitter" class="form-label">Twitter</label>
                                <input type="url" class="form-control @error('twitter') is-invalid @enderror"
                                    id="twitter" name="twitter" value="{{ old('twitter', $social['twitter'] ?? '') }}"
                                    placeholder="https://twitter.com/...">
                                @error('twitter')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="mt-4 text-end">
                            <button type="submit" class="btn btn-primary">Save Changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
