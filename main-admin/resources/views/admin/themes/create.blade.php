@extends('layouts.admin')

@section('title', 'Add New Theme')

@section('content')
    <div class="pagetitle">
        <h1>Add New Theme</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.themes.index') }}">Themes</a></li>
                <li class="breadcrumb-item active">Create</li>
            </ol>
        </nav>
    </div>

    <section class="section">
        <div class="row">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Theme Details</h5>

                        <form action="{{ route('admin.themes.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="mb-3">
                                <label for="theme_name" class="form-label">Theme Name</label>
                                <input type="text" class="form-control @error('theme_name') is-invalid @enderror"
                                    id="theme_name" name="theme_name" value="{{ old('theme_name') }}" required>
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
                                            {{ old('section_type') == $type ? 'selected' : '' }}>{{ $type }}
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
                                    id="view_file" name="view_file" value="{{ old('view_file') }}"
                                    placeholder="e.g. themes.theme1.header" required>
                                <div class="form-text">Enter the blade view path (dot notation).</div>
                                @error('view_file')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="screenshot" class="form-label">Screenshot</label>
                                <input type="file" class="form-control @error('screenshot') is-invalid @enderror"
                                    id="screenshot" name="screenshot">
                                @error('screenshot')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3 form-check">
                                <input type="checkbox" class="form-check-input" id="is_active" name="is_active"
                                    value="1" checked>
                                <label class="form-check-label" for="is_active">Active</label>
                            </div>

                            <button type="submit" class="btn btn-primary">Create Theme</button>
                            <a href="{{ route('admin.themes.index') }}" class="btn btn-secondary">Cancel</a>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
