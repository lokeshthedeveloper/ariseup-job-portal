@extends('layouts.admin')

@section('title', 'Components Management')

@section('content')
    <div class="row mb-4">
        <div class="col-md-6">
            <h2><i class="bi bi-puzzle"></i> Components Management</h2>
        </div>
        <div class="col-md-6 text-end">
            <a href="{{ route('admin.components.create') }}" class="btn btn-primary">
                <i class="bi bi-plus-circle"></i> Add New Component
            </a>
        </div>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">
            <!-- Components Table -->
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Slug</th>
                            <th>Themes</th>
                            <th>Status</th>
                            <th>Created</th>
                            <th width="200">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($components as $component)
                            <tr>
                                <td>{{ $component->id }}</td>
                                <td><strong>{{ $component->name }}</strong></td>
                                <td><code>{{ $component->slug }}</code></td>
                                <td>
                                    <span class="badge bg-info">
                                        {{ $component->themes_count }} theme(s)
                                    </span>
                                </td>
                                <td>
                                    <form action="{{ route('admin.components.toggle-status', $component) }}" method="POST"
                                        style="display: inline;">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit"
                                            class="btn btn-sm btn-{{ $component->status ? 'success' : 'secondary' }}">
                                            {{ $component->status ? 'Active' : 'Inactive' }}
                                        </button>
                                    </form>
                                </td>
                                <td>{{ $component->created_at->format('M d, Y') }}</td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <a href="{{ route('admin.components.edit', $component) }}"
                                            class="btn btn-sm btn-warning" title="Edit">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                        <form action="{{ route('admin.components.destroy', $component) }}" method="POST"
                                            style="display: inline;"
                                            onsubmit="return confirm('Are you sure you want to delete this component?');">
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
                                    <p class="text-muted mt-2">No components found.</p>
                                    <a href="{{ route('admin.components.create') }}" class="btn btn-primary">
                                        <i class="bi bi-plus-circle"></i> Create First Component
                                    </a>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            @if ($components->hasPages())
                <div class="mt-3">
                    {{ $components->links() }}
                </div>
            @endif
        </div>
    </div>
@endsection
