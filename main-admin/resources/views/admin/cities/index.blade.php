@extends('layouts.admin')

@section('title', 'Cities Management')

@section('content')
<div class="row mb-4">
    <div class="col-md-6">
        <h2><i class="bi bi-geo-alt"></i> Cities Management</h2>
    </div>
    <div class="col-md-6 text-end">
        <a href="{{ route('admin.cities.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle"></i> Add New City
        </a>
    </div>
</div>

<div class="card shadow-sm">
    <div class="card-body">
        <!-- Search and Filter -->
        <form method="GET" action="{{ route('admin.cities.index') }}" class="row g-3 mb-3">
            <div class="col-md-3">
                <input type="text" name="search" class="form-control" placeholder="Search cities..."
                       value="{{ request('search') }}">
            </div>
            <div class="col-md-2">
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
                <select name="state_id" class="form-select">
                    <option value="">All States</option>
                    @foreach($states as $state)
                        <option value="{{ $state->id }}" {{ request('state_id') == $state->id ? 'selected' : '' }}>
                            {{ $state->name }}
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
                @if(request('search') || request('country_id') || request('state_id') || request('status') !== null)
                    <a href="{{ route('admin.cities.index') }}" class="btn btn-outline-secondary">
                        <i class="bi bi-x"></i> Clear
                    </a>
                @endif
            </div>
        </form>

        <!-- Cities Table -->
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>State</th>
                        <th>Country</th>
                        <th>Status</th>
                        <th width="250">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($cities as $city)
                        <tr>
                            <td>{{ $city->id }}</td>
                            <td><strong>{{ $city->name }}</strong></td>
                            <td>{{ $city->state->name ?? 'N/A' }}</td>
                            <td>{{ $city->country->name ?? 'N/A' }}</td>
                            <td>
                                <form action="{{ route('admin.cities.toggle-status', $city) }}"
                                      method="POST" style="display: inline;">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="btn btn-sm btn-{{ $city->status ? 'success' : 'secondary' }}">
                                        {{ $city->status ? 'Active' : 'Inactive' }}
                                    </button>
                                </form>
                            </td>
                            <td>
                                <div class="btn-group" role="group">
                                    <a href="{{ route('admin.cities.show', $city) }}"
                                       class="btn btn-sm btn-info" title="View">
                                        <i class="bi bi-eye"></i>
                                    </a>
                                    <a href="{{ route('admin.cities.edit', $city) }}"
                                       class="btn btn-sm btn-warning" title="Edit">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <form action="{{ route('admin.cities.destroy', $city) }}"
                                          method="POST" style="display: inline;"
                                          onsubmit="return confirm('Are you sure you want to delete this city?');">
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
                                <p class="text-muted mt-2">No cities found.</p>
                                <a href="{{ route('admin.cities.create') }}" class="btn btn-primary">
                                    <i class="bi bi-plus-circle"></i> Create First City
                                </a>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        @if($cities->hasPages())
            <div class="mt-3">
                {{ $cities->links() }}
            </div>
        @endif
    </div>
</div>
@endsection
