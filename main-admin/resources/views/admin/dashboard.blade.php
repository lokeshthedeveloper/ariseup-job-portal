@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
<div class="row">
    <div class="col-md-12">
        <h2 class="mb-4">
            <i class="bi bi-speedometer2"></i> Dashboard
        </h2>
    </div>
</div>

<div class="row">
    <div class="col-md-4 mb-4">
        <div class="card shadow-sm">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-muted mb-2">Total Companies</h6>
                        <h3 class="mb-0">{{ \App\Models\Company::count() }}</h3>
                    </div>
                    <div class="fs-1 text-primary">
                        <i class="bi bi-building"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-4 mb-4">
        <div class="card shadow-sm">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-muted mb-2">Active Companies</h6>
                        <h3 class="mb-0">{{ \App\Models\Company::where('is_active', true)->count() }}</h3>
                    </div>
                    <div class="fs-1 text-success">
                        <i class="bi bi-check-circle"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-4 mb-4">
        <div class="card shadow-sm">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-muted mb-2">Inactive Companies</h6>
                        <h3 class="mb-0">{{ \App\Models\Company::where('is_active', false)->count() }}</h3>
                    </div>
                    <div class="fs-1 text-warning">
                        <i class="bi bi-pause-circle"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card shadow-sm">
            <div class="card-header bg-white">
                <h5 class="mb-0">
                    <i class="bi bi-clock-history"></i> Recent Companies
                </h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Company Name</th>
                                <th>Industry</th>
                                <th>Location</th>
                                <th>Status</th>
                                <th>Created At</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse(\App\Models\Company::latest()->take(5)->get() as $company)
                                <tr>
                                    <td>{{ $company->name }}</td>
                                    <td>{{ $company->industry ?? 'N/A' }}</td>
                                    <td>{{ $company->location ?? 'N/A' }}</td>
                                    <td>
                                        <span class="badge bg-{{ $company->is_active ? 'success' : 'secondary' }}">
                                            {{ $company->is_active ? 'Active' : 'Inactive' }}
                                        </span>
                                    </td>
                                    <td>{{ $company->created_at->format('M d, Y') }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center text-muted">No companies found</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="text-center mt-3">
                    <a href="{{ route('admin.companies.index') }}" class="btn btn-outline-primary">
                        View All Companies <i class="bi bi-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
