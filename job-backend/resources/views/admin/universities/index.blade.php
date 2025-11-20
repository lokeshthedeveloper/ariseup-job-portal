@extends('layouts.admin')

@section('title', 'Universities Management')

@section('content')
<div class="row mb-4">
    <div class="col-md-6">
        <h2><i class="bi bi-mortarboard-fill"></i> Universities Management</h2>
    </div>
    <div class="col-md-6 text-end">
        <a href="{{ route('admin.universities.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle"></i> Add New University
        </a>
    </div>
</div>

<div class="card shadow-sm">
    <div class="card-body">
        <!-- Search and Filter -->
        <form method="GET" action="{{ route('admin.universities.index') }}" class="row g-3 mb-3">
            <div class="col-md-3">
                <input type="text" name="search" class="form-control" placeholder="Search universities..."
                       value="{{ request('search') }}">
            </div>
            <div class="col-md-2">
                <select name="type" class="form-select">
                    <option value="">All Types</option>
                    <option value="Government" {{ request('type') === 'Government' ? 'selected' : '' }}>Government</option>
                    <option value="Private" {{ request('type') === 'Private' ? 'selected' : '' }}>Private</option>
                    <option value="Other" {{ request('type') === 'Other' ? 'selected' : '' }}>Other</option>
                </select>
            </div>
            <div class="col-md-2">
                <select name="status" class="form-select">
                    <option value="">All Status</option>
                    <option value="1" {{ request('status') === '1' ? 'selected' : '' }}>Active</option>
                    <option value="0" {{ request('status') === '0' ? 'selected' : '' }}>Inactive</option>
                </select>
            </div>
            <div class="col-md-2">
                <select name="country" class="form-select">
                    <option value="">All Countries</option>
                    @foreach($countries as $country)
                        <option value="{{ $country }}" {{ request('country') === $country ? 'selected' : '' }}>
                            {{ $country }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-3">
                <button type="submit" class="btn btn-outline-primary">
                    <i class="bi bi-search"></i> Search
                </button>
                @if(request('search') || request('type') || request('status') !== null || request('country') || request('state'))
                    <a href="{{ route('admin.universities.index') }}" class="btn btn-outline-secondary">
                        <i class="bi bi-x"></i> Clear
                    </a>
                @endif
            </div>
        </form>

        <!-- Universities Table -->
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>State</th>
                        <th>Country</th>
                        <th>Type</th>
                        <th>Established</th>
                        <th>Status</th>
                        <th width="250">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($universities as $university)
                        <tr>
                            <td>{{ $university->id }}</td>
                            <td><strong>{{ $university->name }}</strong></td>
                            <td>{{ $university->state }}</td>
                            <td>{{ $university->country }}</td>
                            <td>
                                <span class="badge bg-{{ $university->getTypeBadgeColor() }}">
                                    {{ $university->type }}
                                </span>
                            </td>
                            <td>{{ $university->established_year }}</td>
                            <td>
                                <form action="{{ route('admin.universities.toggle-status', $university) }}"
                                      method="POST" style="display: inline;">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="btn btn-sm btn-{{ $university->status ? 'success' : 'secondary' }}">
                                        {{ $university->status ? 'Active' : 'Inactive' }}
                                    </button>
                                </form>
                            </td>
                            <td>
                                <div class="btn-group" role="group">
                                    <a href="{{ route('admin.universities.show', $university) }}"
                                       class="btn btn-sm btn-info" title="View">
                                        <i class="bi bi-eye"></i>
                                    </a>
                                    <a href="{{ route('admin.universities.edit', $university) }}"
                                       class="btn btn-sm btn-warning" title="Edit">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <form action="{{ route('admin.universities.destroy', $university) }}"
                                          method="POST" style="display: inline;"
                                          onsubmit="return confirm('Are you sure you want to delete this university?');">
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
                            <td colspan="8" class="text-center py-4">
                                <i class="bi bi-inbox" style="font-size: 3rem; color: #ccc;"></i>
                                <p class="text-muted mt-2">No universities found.</p>
                                <a href="{{ route('admin.universities.create') }}" class="btn btn-primary">
                                    <i class="bi bi-plus-circle"></i> Create First University
                                </a>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        @if($universities->hasPages())
            <div class="mt-3">
                {{ $universities->links() }}
            </div>
        @endif
    </div>
</div>
@endsection
