@extends('layouts.admin')

@section('title', 'View Company')

@section('content')
<div class="row mb-4">
    <div class="col-md-6">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.companies.index') }}">Companies</a></li>
                <li class="breadcrumb-item active">{{ $company->name }}</li>
            </ol>
        </nav>
        <h2><i class="bi bi-building"></i> {{ $company->name }}</h2>
    </div>
    <div class="col-md-6 text-end">
        <a href="{{ route('admin.companies.edit', $company) }}" class="btn btn-warning">
            <i class="bi bi-pencil"></i> Edit
        </a>
        <form action="{{ route('admin.companies.destroy', $company) }}" method="POST" class="d-inline"
              onsubmit="return confirm('Are you sure you want to delete this company?');">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">
                <i class="bi bi-trash"></i> Delete
            </button>
        </form>
    </div>
</div>

<div class="row">
    <div class="col-md-3 mb-4">
        <div class="card shadow-sm">
            <div class="card-body text-center">
                @if($company->logo)
                    <img src="{{ asset('storage/' . $company->logo) }}" alt="{{ $company->name }}"
                         class="img-fluid rounded mb-3" style="max-width: 200px;">
                @else
                    <div class="bg-secondary rounded d-flex align-items-center justify-content-center mb-3"
                         style="width: 200px; height: 200px; margin: 0 auto;">
                        <i class="bi bi-building text-white" style="font-size: 4rem;"></i>
                    </div>
                @endif
                <h4>{{ $company->name }}</h4>
                <p class="text-muted">{{ $company->industry ?? 'N/A' }}</p>
                <span class="badge bg-{{ $company->is_active ? 'success' : 'secondary' }} mb-2">
                    {{ $company->is_active ? 'Active' : 'Inactive' }}
                </span>
                @if($company->website)
                    <div class="mt-3">
                        <a href="{{ $company->website }}" target="_blank" class="btn btn-outline-primary btn-sm">
                            <i class="bi bi-link-45deg"></i> Visit Website
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <div class="col-md-9 mb-4">
        <div class="card shadow-sm">
            <div class="card-body">
                <h5 class="border-bottom pb-2 mb-3"><i class="bi bi-info-circle"></i> Basic Information</h5>

                <div class="row mb-3">
                    <div class="col-md-4">
                        <strong>Company Size:</strong>
                    </div>
                    <div class="col-md-8">
                        {{ $company->company_size ?? 'N/A' }}
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-4">
                        <strong>Location:</strong>
                    </div>
                    <div class="col-md-8">
                        {{ $company->location ?? 'N/A' }}
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-4">
                        <strong>Description:</strong>
                    </div>
                    <div class="col-md-8">
                        {{ $company->description ?? 'N/A' }}
                    </div>
                </div>

                @if($company->about_us)
                    <h5 class="border-bottom pb-2 mb-3 mt-4"><i class="bi bi-file-text"></i> About Us</h5>
                    <p>{{ $company->about_us }}</p>
                @endif

                @if($company->employee_benefits)
                    <h5 class="border-bottom pb-2 mb-3 mt-4"><i class="bi bi-gift"></i> Employee Benefits</h5>
                    <p>{{ $company->employee_benefits }}</p>
                @endif

                @if($company->work_culture)
                    <h5 class="border-bottom pb-2 mb-3 mt-4"><i class="bi bi-people"></i> Work Culture</h5>
                    <p>{{ $company->work_culture }}</p>
                @endif

                @if($company->application_process)
                    <h5 class="border-bottom pb-2 mb-3 mt-4"><i class="bi bi-clipboard-check"></i> Application Process</h5>
                    <p>{{ $company->application_process }}</p>
                @endif

                @if($company->company_video)
                    <h5 class="border-bottom pb-2 mb-3 mt-4"><i class="bi bi-camera-video"></i> Company Video</h5>
                    <a href="{{ $company->company_video }}" target="_blank" class="btn btn-outline-primary btn-sm">
                        <i class="bi bi-play-circle"></i> Watch Video
                    </a>
                @endif

                @if($company->notable_clients_projects)
                    <h5 class="border-bottom pb-2 mb-3 mt-4"><i class="bi bi-star"></i> Notable Clients/Projects</h5>
                    <p>{{ $company->notable_clients_projects }}</p>
                @endif

                @if($company->employee_reviews)
                    <h5 class="border-bottom pb-2 mb-3 mt-4"><i class="bi bi-chat-quote"></i> Employee Reviews</h5>
                    <p>{{ $company->employee_reviews }}</p>
                @endif

                @if($company->diversity_inclusion)
                    <h5 class="border-bottom pb-2 mb-3 mt-4"><i class="bi bi-heart"></i> Diversity & Inclusion</h5>
                    <p>{{ $company->diversity_inclusion }}</p>
                @endif

                @if($company->legal_information)
                    <h5 class="border-bottom pb-2 mb-3 mt-4"><i class="bi bi-file-earmark-text"></i> Legal Information</h5>
                    <p>{{ $company->legal_information }}</p>
                @endif

                <div class="mt-4 pt-3 border-top">
                    <small class="text-muted">
                        <strong>Created:</strong> {{ $company->created_at->format('F d, Y h:i A') }}<br>
                        <strong>Last Updated:</strong> {{ $company->updated_at->format('F d, Y h:i A') }}
                    </small>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
