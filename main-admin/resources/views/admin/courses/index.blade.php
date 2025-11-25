@extends('layouts.admin')

@section('title', 'Courses Management')

@section('content')
<div class="row mb-4">
    <div class="col-md-6">
        <h2><i class="bi bi-book"></i> Courses Management</h2>
    </div>
    <div class="col-md-6 text-end">
        <a href="{{ route('admin.courses.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle"></i> Add New Course
        </a>
    </div>
</div>

<div class="card shadow-sm">
    <div class="card-body">
        <!-- Search and Filter -->
        <form method="GET" action="{{ route('admin.courses.index') }}" class="row g-3 mb-3">
            <div class="col-md-3">
                <input type="text" name="search" class="form-control" placeholder="Search courses..."
                       value="{{ request('search') }}">
            </div>
            <div class="col-md-3">
                <select name="education_level" class="form-select">
                    <option value="">All Education Levels</option>
                    @foreach($educationLevels as $level)
                        <option value="{{ $level->id }}" {{ request('education_level') == $level->id ? 'selected' : '' }}>
                            {{ $level->name }}
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
                @if(request('search') || request('education_level') || request('status') !== null)
                    <a href="{{ route('admin.courses.index') }}" class="btn btn-outline-secondary">
                        <i class="bi bi-x"></i> Clear
                    </a>
                @endif
            </div>
        </form>

        <!-- Courses Table -->
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Education Level</th>
                        <th>Duration</th>
                        <th>Specializations</th>
                        <th>Status</th>
                        <th width="250">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($courses as $course)
                        <tr>
                            <td>{{ $course->id }}</td>
                            <td><strong>{{ $course->name }}</strong></td>
                            <td>
                                <span class="badge bg-primary">
                                    {{ $course->educationLevel->name }}
                                </span>
                            </td>
                            <td>{{ $course->duration_value }} {{ $course->duration_unit }}</td>
                            <td>
                                <span class="badge bg-info">
                                    {{ $course->specializations_count ?? 0 }} specializations
                                </span>
                            </td>
                            <td>
                                <form action="{{ route('admin.courses.toggle-status', $course) }}"
                                      method="POST" style="display: inline;">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="btn btn-sm btn-{{ $course->status ? 'success' : 'secondary' }}">
                                        {{ $course->status ? 'Active' : 'Inactive' }}
                                    </button>
                                </form>
                            </td>
                            <td>
                                <div class="btn-group" role="group">
                                    <a href="{{ route('admin.courses.show', $course) }}"
                                       class="btn btn-sm btn-info" title="View">
                                        <i class="bi bi-eye"></i>
                                    </a>
                                    <a href="{{ route('admin.courses.edit', $course) }}"
                                       class="btn btn-sm btn-warning" title="Edit">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <form action="{{ route('admin.courses.destroy', $course) }}"
                                          method="POST" style="display: inline;"
                                          onsubmit="return confirm('Are you sure you want to delete this course?');">
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
                                <p class="text-muted mt-2">No courses found.</p>
                                <a href="{{ route('admin.courses.create') }}" class="btn btn-primary">
                                    <i class="bi bi-plus-circle"></i> Create First Course
                                </a>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        @if($courses->hasPages())
            <div class="mt-3">
                {{ $courses->links() }}
            </div>
        @endif
    </div>
</div>
@endsection
