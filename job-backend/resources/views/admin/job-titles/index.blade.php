@extends('layouts.admin')

@section('title', 'Job Titles Management')

@section('content')
<div class="row mb-4">
    <div class="col-md-6">
        <h2><i class="bi bi-briefcase"></i> Job Titles Management</h2>
    </div>
    <div class="col-md-6 text-end">
        <a href="{{ route('admin.job-titles.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle"></i> Add New Job Title
        </a>
    </div>
</div>

<div class="card shadow-sm">
    <div class="card-body">
        <!-- Search and Filter -->
        <form method="GET" action="{{ route('admin.job-titles.index') }}" class="row g-3 mb-3">
            <div class="col-md-3">
                <input type="text" name="search" class="form-control" placeholder="Search job titles..."
                       value="{{ request('search') }}">
            </div>
            <div class="col-md-3">
                <select name="industry_id" class="form-select">
                    <option value="">All Industries</option>
                    @foreach($industries as $industry)
                        <option value="{{ $industry->id }}" {{ request('industry_id') == $industry->id ? 'selected' : '' }}>
                            {{ $industry->name }}
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
            <div class="col-md-3">
                <button type="submit" class="btn btn-outline-primary">
                    <i class="bi bi-search"></i> Search
                </button>
                @if(request('search') || request('industry_id') || request('status') !== null)
                    <a href="{{ route('admin.job-titles.index') }}" class="btn btn-outline-secondary">
                        <i class="bi bi-x"></i> Clear
                    </a>
                @endif
            </div>
        </form>

        <!-- Job Titles Table -->
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Industry</th>
                        <th>Status</th>
                        <th width="250">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($jobTitles as $jobTitle)
                        <tr>
                            <td>{{ $jobTitle->id }}</td>
                            <td><strong>{{ $jobTitle->name }}</strong></td>
                            <td>
                                <span class="badge bg-primary">{{ $jobTitle->industry->name }}</span>
                            </td>
                            <td>
                                <form action="{{ route('admin.job-titles.toggle-status', $jobTitle) }}"
                                      method="POST" style="display: inline;">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="btn btn-sm btn-{{ $jobTitle->status ? 'success' : 'secondary' }}">
                                        {{ $jobTitle->status ? 'Active' : 'Inactive' }}
                                    </button>
                                </form>
                            </td>
                            <td>
                                <div class="btn-group" role="group">
                                    <a href="{{ route('admin.job-titles.show', $jobTitle) }}"
                                       class="btn btn-sm btn-info" title="View">
                                        <i class="bi bi-eye"></i>
                                    </a>
                                    <a href="{{ route('admin.job-titles.edit', $jobTitle) }}"
                                       class="btn btn-sm btn-warning" title="Edit">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <form action="{{ route('admin.job-titles.destroy', $jobTitle) }}"
                                          method="POST" style="display: inline;"
                                          onsubmit="return confirm('Are you sure you want to delete this job title?');">
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
                                <p class="text-muted mt-2">No job titles found.</p>
                                <a href="{{ route('admin.job-titles.create') }}" class="btn btn-primary">
                                    <i class="bi bi-plus-circle"></i> Create First Job Title
                                </a>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        @if($jobTitles->hasPages())
            <div class="mt-3">
                {{ $jobTitles->links() }}
            </div>
        @endif
    </div>
</div>
@endsection
