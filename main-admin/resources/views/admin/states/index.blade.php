@extends('layouts.admin')

@section('title', 'States Management')

@section('content')
<div class="row mb-4">
    <div class="col-md-6">
        <h2><i class="bi bi-map"></i> States Management</h2>
    </div>
    <div class="col-md-6 text-end">
        <a href="{{ route('admin.states.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle"></i> Add New State
        </a>
    </div>
</div>

<div class="card shadow-sm">
    <div class="card-body">
        <!-- Search and Filter -->
        <form method="GET" action="{{ route('admin.states.index') }}" class="row g-3 mb-3">
            <div class="col-md-3">
                <input type="text" name="search" class="form-control" placeholder="Search states..."
                       value="{{ request('search') }}">
            </div>
            <div class="col-md-3">
                <select name="country_id" class="form-select">
                    <option value="">All Countries</option>
                    @foreach($countries as $country)
                        <option value="{{ $country->id }}" {{ request('country_id') == $country->id ? 'selected' : '' }}>
                            {{ $country->name }}
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
                @if(request('search') || request('country_id') || request('status') !== null)
                    <a href="{{ route('admin.states.index') }}" class="btn btn-outline-secondary">
                        <i class="bi bi-x"></i> Clear
                    </a>
                @endif
            </div>
        </form>

        <!-- States Table -->
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Country</th>
                        <th>Cities</th>
                        <th>Status</th>
                        <th width="250">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($states as $state)
                        <tr>
                            <td>{{ $state->id }}</td>
                            <td><strong>{{ $state->name }}</strong></td>
                            <td>{{ $state->country->name ?? 'N/A' }}</td>
                            <td>{{ $state->cities_count ?? 0 }}</td>
                            <td>
                                <form action="{{ route('admin.states.toggle-status', $state) }}"
                                      method="POST" style="display: inline;">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="btn btn-sm btn-{{ $state->status ? 'success' : 'secondary' }}">
                                        {{ $state->status ? 'Active' : 'Inactive' }}
                                    </button>
                                </form>
                            </td>
                            <td>
                                <div class="btn-group" role="group">
                                    <a href="{{ route('admin.states.show', $state) }}"
                                       class="btn btn-sm btn-info" title="View">
                                        <i class="bi bi-eye"></i>
                                    </a>
                                    <a href="{{ route('admin.states.edit', $state) }}"
                                       class="btn btn-sm btn-warning" title="Edit">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <form action="{{ route('admin.states.destroy', $state) }}"
                                          method="POST" style="display: inline;"
                                          onsubmit="return confirm('Are you sure you want to delete this state?');">
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
                                <p class="text-muted mt-2">No states found.</p>
                                <a href="{{ route('admin.states.create') }}" class="btn btn-primary">
                                    <i class="bi bi-plus-circle"></i> Create First State
                                </a>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        @if($states->hasPages())
            <div class="mt-3">
                {{ $states->links() }}
            </div>
        @endif
    </div>
</div>
@endsection
