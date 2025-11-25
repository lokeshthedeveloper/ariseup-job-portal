@extends('layouts.admin')

@section('title', 'Industries Management')

@section('content')
<div class="row mb-4">
    <div class="col-md-6">
        <h2><i class="bi bi-building"></i> Industries Management</h2>
    </div>
    <div class="col-md-6 text-end">
        <a href="{{ route('admin.industries.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle"></i> Add New Industry
        </a>
    </div>
</div>

<div class="card shadow-sm">
    <div class="card-body">
        <!-- Search and Filter -->
        <form method="GET" action="{{ route('admin.industries.index') }}" class="row g-3 mb-3">
            <div class="col-md-4">
                <input type="text" name="search" class="form-control" placeholder="Search by name or code..."
                       value="{{ request('search') }}">
            </div>
            <div class="col-md-2">
                <select name="status" class="form-select">
                    <option value="">All Status</option>
                    <option value="1" {{ request('status') === '1' ? 'selected' : '' }}>Active</option>
                    <option value="0" {{ request('status') === '0' ? 'selected' : '' }}>Inactive</option>
                </select>
            </div>
            <div class="col-md-3">
                <button type="submit" class="btn btn-outline-primary">
                    <i class="bi bi-search"></i> Search
                </button>
                @if(request('search') || request('status') !== null)
                    <a href="{{ route('admin.industries.index') }}" class="btn btn-outline-secondary">
                        <i class="bi bi-x"></i> Clear
                    </a>
                @endif
            </div>
        </form>

        <!-- Industries Table -->
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Code</th>
                        <th>Job Titles Count</th>
                        <th>Status</th>
                        <th width="250">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($industries as $industry)
                        <tr>
                            <td>{{ $industry->id }}</td>
                            <td><strong>{{ $industry->name }}</strong></td>
                            <td><code>{{ $industry->code }}</code></td>
                            <td>
                                <span class="badge bg-info">{{ $industry->job_titles_count ?? 0 }}</span>
                            </td>
                            <td>
                                <form action="{{ route('admin.industries.toggle-status', $industry) }}"
                                      method="POST" style="display: inline;">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="btn btn-sm btn-{{ $industry->status ? 'success' : 'secondary' }}">
                                        {{ $industry->status ? 'Active' : 'Inactive' }}
                                    </button>
                                </form>
                            </td>
                            <td>
                                <div class="btn-group" role="group">
                                    <a href="{{ route('admin.industries.show', $industry) }}"
                                       class="btn btn-sm btn-info" title="View">
                                        <i class="bi bi-eye"></i>
                                    </a>
                                    <a href="{{ route('admin.industries.edit', $industry) }}"
                                       class="btn btn-sm btn-warning" title="Edit">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <form action="{{ route('admin.industries.destroy', $industry) }}"
                                          method="POST" style="display: inline;"
                                          onsubmit="return confirm('Are you sure you want to delete this industry?');">
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
                            <td colspan="6" class="text-center py-4">
                                <i class="bi bi-inbox" style="font-size: 3rem; color: #ccc;"></i>
                                <p class="text-muted mt-2">No industries found.</p>
                                <a href="{{ route('admin.industries.create') }}" class="btn btn-primary">
                                    <i class="bi bi-plus-circle"></i> Create First Industry
                                </a>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        @if($industries->hasPages())
            <div class="mt-3">
                {{ $industries->links() }}
            </div>
        @endif
    </div>
</div>
@endsection
