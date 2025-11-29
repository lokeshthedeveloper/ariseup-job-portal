@extends('layouts.admin')

@section('title', 'Edit Theme')

@section('content')
    <div class="pagetitle">
        <h1>Edit Theme</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.themes.index') }}">Themes</a></li>
                <li class="breadcrumb-item active">Edit</li>
            </ol>
        </nav>
    </div>

    <section class="section">
        <div class="row">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Edit Theme Details</h5>

                        <form action="{{ route('admin.themes.update', $theme->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label for="theme_name" class="form-label">Theme Name</label>
                                <input type="text" class="form-control @error('theme_name') is-invalid @enderror"
                                    id="theme_name" name="theme_name" value="{{ old('theme_name', $theme->theme_name) }}"
                                    required>
                                @error('theme_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="section_type" class="form-label">Section Type</label>
                                <select class="form-select @error('section_type') is-invalid @enderror" id="section_type"
                                    name="section_type" required>
                                    <option value="">Select Section Type</option>
                                    @foreach ($sectionTypes as $type)
                                        <option value="{{ $type }}"
                                            {{ old('section_type', $theme->section_type) == $type ? 'selected' : '' }}>
                                            {{ $type }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('section_type')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="view_file" class="form-label">View File Path</label>
                                <input type="text" class="form-control @error('view_file') is-invalid @enderror"
                                    id="view_file" name="view_file" value="{{ old('view_file', $theme->view_file) }}"
                                    placeholder="e.g. themes.theme1.header" required>
                                <div class="form-text">Enter the blade view path (dot notation).</div>
                                @error('view_file')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="screenshot" class="form-label">Screenshot</label>
                                @if ($theme->screenshot)
                                    <div class="mb-2">
                                        <img src="{{ asset($theme->screenshot) }}" alt="Current Screenshot"
                                            class="img-thumbnail" style="max-height: 100px;">
                                    </div>
                                @endif
                                <input type="file" class="form-control @error('screenshot') is-invalid @enderror"
                                    id="screenshot" name="screenshot">
                                @error('screenshot')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3 form-check">
                                <input type="checkbox" class="form-check-input" id="is_active" name="is_active"
                                    value="1" {{ old('is_active', $theme->is_active) ? 'checked' : '' }}>
                                <label class="form-check-label" for="is_active">Active</label>
                            </div>

                            <button type="submit" class="btn btn-primary">Update Theme</button>
                            <a href="{{ route('admin.themes.index') }}" class="btn btn-secondary">Cancel</a>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
