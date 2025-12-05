@extends('layouts.admin')

@section('title', 'Themes Management')

@section('content')
    <div class="row mb-4">
        <div class="col-md-6">
            <h2><i class="bi bi-palette"></i> Themes Management</h2>
        </div>
        <div class="col-md-6 text-end">
            <a href="{{ route('admin.themes.create') }}" class="btn btn-primary">
                <i class="bi bi-plus-circle"></i> Add New Theme
            </a>
        </div>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">
            <!-- Themes Table -->
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Slug</th>
                            <th>Components</th>
                            <th>Status</th>
                            <th>Created</th>
                            <th width="200">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($themes as $theme)
                            <tr>
                                <td>{{ $theme->id }}</td>
                                <td><strong>{{ $theme->name }}</strong></td>
                                <td><code>{{ $theme->slug }}</code></td>
                                <td>
                                    <span class="badge bg-info">
                                        {{ $theme->components_count }} component(s)
                                    </span>
                                </td>
                                <td>
                                    <form action="{{ route('admin.themes.toggle-status', $theme) }}" method="POST"
                                        style="display: inline;">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit"
                                            class="btn btn-sm btn-{{ $theme->status ? 'success' : 'secondary' }}">
                                            {{ $theme->status ? 'Active' : 'Inactive' }}
                                        </button>
                                    </form>
                                </td>
                                <td>{{ $theme->created_at->format('M d, Y') }}</td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <a href="{{ route('admin.themes.edit', $theme) }}" class="btn btn-sm btn-warning"
                                            title="Edit">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                        <form action="{{ route('admin.themes.destroy', $theme) }}" method="POST"
                                            style="display: inline;"
                                            onsubmit="return confirm('Are you sure you want to delete this theme?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" title="Delete">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center py-4">
                                    <i class="bi bi-inbox" style="font-size: 3rem; color: #ccc;"></i>
                                    <p class="text-muted mt-2">No themes found.</p>
                                    <a href="{{ route('admin.themes.create') }}" class="btn btn-primary">
                                        <i class="bi bi-plus-circle"></i> Create First Theme
                                    </a>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            @if ($themes->hasPages())
                <div class="mt-3">
                    {{ $themes->links() }}
                </div>
            @endif
        </div>
    </div>
@endsection
