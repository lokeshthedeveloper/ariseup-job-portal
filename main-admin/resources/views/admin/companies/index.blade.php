@extends('layouts.admin')

@section('title', 'Companies Management')

@section('content')
<div class="row mb-4">
    <div class="col-md-6">
        <h2><i class="bi bi-building"></i> Companies Management</h2>
    </div>
    <div class="col-md-6 text-end">
        <a href="{{ route('admin.companies.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle"></i> Add New Company
        </a>
    </div>
</div>

<div class="card shadow-sm">
    <div class="card-body">
        <!-- Search and Bulk Delete -->
        <div class="row mb-3">
            <div class="col-md-6">
                <form method="GET" action="{{ route('admin.companies.index') }}" class="d-flex">
                    <input type="text" name="search" class="form-control me-2" placeholder="Search companies..."
                           value="{{ request('search') }}">
                    <button type="submit" class="btn btn-outline-primary">
                        <i class="bi bi-search"></i> Search
                    </button>
                    @if(request('search'))
                        <a href="{{ route('admin.companies.index') }}" class="btn btn-outline-secondary ms-2">
                            <i class="bi bi-x"></i> Clear
                        </a>
                    @endif
                </form>
            </div>
            <div class="col-md-6 text-end">
                <button type="button" class="btn btn-danger" id="bulkDeleteBtn" style="display: none;">
                    <i class="bi bi-trash"></i> Delete Selected
                </button>
            </div>
        </div>

        <!-- Companies Table -->
        <div class="table-responsive">
            <form id="bulkDeleteForm" method="POST" action="{{ route('admin.companies.bulk-delete') }}">
                @csrf
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th width="50">
                                <input type="checkbox" id="selectAll" class="form-check-input">
                            </th>
                            <th>Logo</th>
                            <th>Company Name</th>
                            <th>Industry</th>
                            <th>Location</th>
                            <th>Status</th>
                            <th>Created</th>
                            <th width="200">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($companies as $company)
                            <tr>
                                <td>
                                    <input type="checkbox" name="ids[]" value="{{ $company->id }}"
                                           class="form-check-input company-checkbox">
                                </td>
                                <td>
                                    @if($company->logo)
                                        <img src="{{ asset('storage/' . $company->logo) }}" alt="{{ $company->name }}"
                                             class="rounded" width="40" height="40" style="object-fit: cover;">
                                    @else
                                        <div class="bg-secondary rounded d-flex align-items-center justify-content-center"
                                             style="width: 40px; height: 40px;">
                                            <i class="bi bi-building text-white"></i>
                                        </div>
                                    @endif
                                </td>
                                <td>
                                    <strong>{{ $company->name }}</strong>
                                    @if($company->website)
                                        <br><small><a href="{{ $company->website }}" target="_blank">
                                            <i class="bi bi-link-45deg"></i> Website
                                        </a></small>
                                    @endif
                                </td>
                                <td>{{ $company->industry ?? 'N/A' }}</td>
                                <td>{{ $company->location ?? 'N/A' }}</td>
                                <td>
                                    <span class="badge bg-{{ $company->is_active ? 'success' : 'secondary' }}">
                                        {{ $company->is_active ? 'Active' : 'Inactive' }}
                                    </span>
                                </td>
                                <td>{{ $company->created_at->format('M d, Y') }}</td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <a href="{{ route('admin.companies.show', $company) }}"
                                           class="btn btn-sm btn-info" title="View">
                                            <i class="bi bi-eye"></i>
                                        </a>
                                        <a href="{{ route('admin.companies.edit', $company) }}"
                                           class="btn btn-sm btn-warning" title="Edit">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                        <form action="{{ route('admin.companies.destroy', $company) }}"
                                              method="POST" class="d-inline"
                                              onsubmit="return confirm('Are you sure you want to delete this company?');">
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
                                <td colspan="8" class="text-center text-muted py-4">
                                    <i class="bi bi-inbox fs-1 d-block mb-2"></i>
                                    No companies found
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </form>
        </div>

        <!-- Pagination -->
        <div class="d-flex justify-content-center">
            {{ $companies->links() }}
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    // Select All Checkbox
    document.getElementById('selectAll').addEventListener('change', function() {
        const checkboxes = document.querySelectorAll('.company-checkbox');
        checkboxes.forEach(checkbox => checkbox.checked = this.checked);
        toggleBulkDeleteButton();
    });

    // Individual Checkboxes
    document.querySelectorAll('.company-checkbox').forEach(checkbox => {
        checkbox.addEventListener('change', toggleBulkDeleteButton);
    });

    function toggleBulkDeleteButton() {
        const checkedBoxes = document.querySelectorAll('.company-checkbox:checked');
        const bulkDeleteBtn = document.getElementById('bulkDeleteBtn');

        if (checkedBoxes.length > 0) {
            bulkDeleteBtn.style.display = 'inline-block';
        } else {
            bulkDeleteBtn.style.display = 'none';
        }
    }

    // Bulk Delete Button
    document.getElementById('bulkDeleteBtn').addEventListener('click', function() {
        const checkedBoxes = document.querySelectorAll('.company-checkbox:checked');
        if (checkedBoxes.length > 0) {
            if (confirm(`Are you sure you want to delete ${checkedBoxes.length} companies?`)) {
                document.getElementById('bulkDeleteForm').submit();
            }
        }
    });
</script>
@endpush
