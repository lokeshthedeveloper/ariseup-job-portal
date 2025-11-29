@extends('layouts.admin')

@section('title', 'Theme Management')

@section('content')
    <div class="pagetitle">
        <h1>Theme Management</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                <li class="breadcrumb-item active">Themes</li>
            </ol>
        </nav>
    </div>

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h5 class="card-title">All Themes</h5>
                            <a href="{{ route('admin.themes.create') }}" class="btn btn-primary">Add New Theme</a>
                        </div>

                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif

                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Screenshot</th>
                                    <th>Theme Name</th>
                                    <th>Section Type</th>
                                    <th>View File</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($themes as $theme)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            @if ($theme->screenshot)
                                                <img src="{{ asset($theme->screenshot) }}" alt="Screenshot" width="50">
                                            @else
                                                <span class="text-muted">No Image</span>
                                            @endif
                                        </td>
                                        <td>{{ $theme->theme_name }}</td>
                                        <td>{{ $theme->section_type }}</td>
                                        <td>{{ $theme->view_file }}</td>
                                        <td>
                                            @if ($theme->is_active)
                                                <span class="badge bg-success">Active</span>
                                            @else
                                                <span class="badge bg-danger">Inactive</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.themes.edit', $theme->id) }}"
                                                class="btn btn-sm btn-info">Edit</a>
                                            <form action="{{ route('admin.themes.destroy', $theme->id) }}" method="POST"
                                                class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger"
                                                    onclick="return confirm('Are you sure?')">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        {{ $themes->links() }}

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
