@extends('layouts.admin')

@section('title', 'Theme Components')

@section('content')
    <div class="row mb-4">
        <div class="col-md-12">
            <h2><i class="bi bi-link-45deg"></i> Theme Components Management</h2>
            <p class="text-muted">Manage component assignments for each theme</p>
        </div>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">
            @forelse($themes as $theme)
                <div class="mb-4 pb-4 border-bottom">
                    <div class="row align-items-center mb-3">
                        <div class="col-md-6">
                            <h4>
                                <i class="bi bi-palette"></i> {{ $theme->name }}
                                <span class="badge bg-{{ $theme->status ? 'success' : 'secondary' }} ms-2">
                                    {{ $theme->status ? 'Active' : 'Inactive' }}
                                </span>
                            </h4>
                            <p class="text-muted mb-0">{{ $theme->components->count() }} component(s) assigned</p>
                        </div>
                        <div class="col-md-6 text-end">
                            <a href="{{ route('admin.theme-components.edit', $theme) }}" class="btn btn-primary btn-sm">
                                <i class="bi bi-pencil"></i> Manage Components
                            </a>
                        </div>
                    </div>

                    <div class="d-flex flex-wrap gap-2">
                        @forelse($theme->components as $component)
                            <span class="badge bg-info text-dark p-2">
                                <i class="bi bi-puzzle"></i> {{ $component->name }}
                            </span>
                        @empty
                            <span class="text-muted">No components assigned yet</span>
                        @endforelse
                    </div>
                </div>
            @empty
                <div class="text-center py-5">
                    <i class="bi bi-inbox" style="font-size: 3rem; color: #ccc;"></i>
                    <p class="text-muted mt-3">No active themes found.</p>
                    <a href="{{ route('admin.themes.create') }}" class="btn btn-primary">
                        <i class="bi bi-plus-circle"></i> Create First Theme
                    </a>
                </div>
            @endforelse
        </div>
    </div>
@endsection
