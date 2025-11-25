@extends('layouts.admin')

@section('title', 'Education Levels Management')

@section('content')
<div class="row mb-4">
    <div class="col-md-6">
        <h2><i class="bi bi-mortarboard"></i> Education Levels Management</h2>
    </div>
    <div class="col-md-6 text-end">
        <a href="{{ route('admin.education-levels.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle"></i> Add New Education Level
        </a>
    </div>
</div>

<div class="card shadow-sm">
    <div class="card-body">
        <!-- Search and Filter -->
        <form method="GET" action="{{ route('admin.education-levels.index') }}" class="row g-3 mb-3">
            <div class="col-md-4">
                <input type="text" name="search" class="form-control" placeholder="Search education levels..."
                       value="{{ request('search') }}">
            </div>
            <div class="col-md-3">
                <select name="status" class="form-select">
                    <option value="">All Status</option>
                    <option value="1" {{ request('status') === '1' ? 'selected' : '' }}>Active</option>
                    <option value="0" {{ request('status') === '0' ? 'selected' : '' }}>Inactive</option>
                </select>
            </div>
            <div class="col-md-5">
                <button type="submit" class="btn btn-outline-primary">
                    <i class="bi bi-search"></i> Search
                </button>
                @if(request('search') || request('status') !== null)
                    <a href="{{ route('admin.education-levels.index') }}" class="btn btn-outline-secondary">
                        <i class="bi bi-x"></i> Clear
                    </a>
                @endif
            </div>
        </form>

        <!-- Education Levels Table -->
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Courses Count</th>
                        <th>Status</th>
                        <th width="250">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($educationLevels as $educationLevel)
                        <tr>
                            <td>{{ $educationLevel->id }}</td>
                            <td><strong>{{ $educationLevel->name }}</strong></td>
                            <td>
                                <span class="badge bg-info">
                                    {{ $educationLevel->courses_count ?? 0 }} courses
                                </span>
                            </td>
                            <td>
                                <form action="{{ route('admin.education-levels.toggle-status', $educationLevel) }}"
                                      method="POST" style="display: inline;">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="btn btn-sm btn-{{ $educationLevel->status ? 'success' : 'secondary' }}">
                                        {{ $educationLevel->status ? 'Active' : 'Inactive' }}
                                    </button>
                                </form>
                            </td>
                            <td>
                                <div class="btn-group" role="group">
                                    <a href="{{ route('admin.education-levels.show', $educationLevel) }}"
                                       class="btn btn-sm btn-info" title="View">
                                        <i class="bi bi-eye"></i>
                                    </a>
                                    <a href="{{ route('admin.education-levels.edit', $educationLevel) }}"
                                       class="btn btn-sm btn-warning" title="Edit">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <form action="{{ route('admin.education-levels.destroy', $educationLevel) }}"
                                          method="POST" style="display: inline;"
                                          onsubmit="return confirm('Are you sure you want to delete this education level?');">
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
                            <td colspan="5" class="text-center py-4">
                                <i class="bi bi-inbox" style="font-size: 3rem; color: #ccc;"></i>
                                <p class="text-muted mt-2">No education levels found.</p>
                                <a href="{{ route('admin.education-levels.create') }}" class="btn btn-primary">
                                    <i class="bi bi-plus-circle"></i> Create First Education Level
                                </a>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        @if($educationLevels->hasPages())
            <div class="mt-3">
                {{ $educationLevels->links() }}
            </div>
        @endif
    </div>
</div>
@endsection
