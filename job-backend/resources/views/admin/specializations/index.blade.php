@extends('layouts.admin')

@section('title', 'Specializations Management')

@section('content')
<div class="row mb-4">
    <div class="col-md-6">
        <h2><i class="bi bi-award"></i> Specializations Management</h2>
    </div>
    <div class="col-md-6 text-end">
        <a href="{{ route('admin.specializations.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle"></i> Add New Specialization
        </a>
    </div>
</div>

<div class="card shadow-sm">
    <div class="card-body">
        <!-- Search and Filter -->
        <form method="GET" action="{{ route('admin.specializations.index') }}" class="row g-3 mb-3">
            <div class="col-md-3">
                <input type="text" name="search" class="form-control" placeholder="Search specializations..."
                       value="{{ request('search') }}">
            </div>
            <div class="col-md-3">
                <select name="course" class="form-select">
                    <option value="">All Courses</option>
                    @foreach($courses as $course)
                        <option value="{{ $course->id }}" {{ request('course') == $course->id ? 'selected' : '' }}>
                            {{ $course->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-2">
                <select name="status" class="form-select">
                    <option value="">All Status</option>
                    <option value="1" {{ request('status') === '1' ? 'selected' : '' }}>Active</option>
                    <option value="0" {{ request('status') === '0' ? 'selected' : '' }}>Inactive</option>
                </select>
            </div>
            <div class="col-md-4">
                <button type="submit" class="btn btn-outline-primary">
                    <i class="bi bi-search"></i> Search
                </button>
                @if(request('search') || request('course') || request('status') !== null)
                    <a href="{{ route('admin.specializations.index') }}" class="btn btn-outline-secondary">
                        <i class="bi bi-x"></i> Clear
                    </a>
                @endif
            </div>
        </form>

        <!-- Specializations Table -->
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Course</th>
                        <th>Education Level</th>
                        <th>Status</th>
                        <th width="250">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($specializations as $specialization)
                        <tr>
                            <td>{{ $specialization->id }}</td>
                            <td><strong>{{ $specialization->name }}</strong></td>
                            <td>
                                <span class="badge bg-primary">
                                    {{ $specialization->course->name }}
                                </span>
                            </td>
                            <td>
                                <span class="badge bg-secondary">
                                    {{ $specialization->course->educationLevel->name }}
                                </span>
                            </td>
                            <td>
                                <form action="{{ route('admin.specializations.toggle-status', $specialization) }}"
                                      method="POST" style="display: inline;">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="btn btn-sm btn-{{ $specialization->status ? 'success' : 'secondary' }}">
                                        {{ $specialization->status ? 'Active' : 'Inactive' }}
                                    </button>
                                </form>
                            </td>
                            <td>
                                <div class="btn-group" role="group">
                                    <a href="{{ route('admin.specializations.show', $specialization) }}"
                                       class="btn btn-sm btn-info" title="View">
                                        <i class="bi bi-eye"></i>
                                    </a>
                                    <a href="{{ route('admin.specializations.edit', $specialization) }}"
                                       class="btn btn-sm btn-warning" title="Edit">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <form action="{{ route('admin.specializations.destroy', $specialization) }}"
                                          method="POST" style="display: inline;"
                                          onsubmit="return confirm('Are you sure you want to delete this specialization?');">
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
                                <p class="text-muted mt-2">No specializations found.</p>
                                <a href="{{ route('admin.specializations.create') }}" class="btn btn-primary">
                                    <i class="bi bi-plus-circle"></i> Create First Specialization
                                </a>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        @if($specializations->hasPages())
            <div class="mt-3">
                {{ $specializations->links() }}
            </div>
        @endif
    </div>
</div>
@endsection
