@extends('layouts.admin')

@section('title', 'View Skill')

@section('content')
<div class="row mb-4">
    <div class="col-md-12">
        <h2><i class="bi bi-eye"></i> View Skill</h2>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.skills.index') }}">Skills</a></li>
                <li class="breadcrumb-item active">{{ $skill->name }}</li>
            </ol>
        </nav>
    </div>
</div>

<div class="row">
    <div class="col-md-8">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0"><i class="bi bi-star"></i> Skill Details</h5>
            </div>
            <div class="card-body">
                <table class="table table-borderless">
                    <tr>
                        <th width="200">ID:</th>
                        <td>{{ $skill->id }}</td>
                    </tr>
                    <tr>
                        <th>Name:</th>
                        <td><strong>{{ $skill->name }}</strong></td>
                    </tr>
                    <tr>
                        <th>Code:</th>
                        <td>
                            @if($skill->code)
                                <code>{{ $skill->code }}</code>
                            @else
                                <span class="text-muted">Not set</span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>Category:</th>
                        <td>
                            @if($skill->category)
                                <a href="{{ route('admin.skill-categories.show', $skill->category) }}"
                                   class="badge bg-secondary text-decoration-none">
                                    {{ $skill->category->name }}
                                </a>
                            @else
                                <span class="text-muted">N/A</span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>Status:</th>
                        <td>
                            <span class="badge bg-{{ $skill->status ? 'success' : 'secondary' }}">
                                {{ $skill->status ? 'Active' : 'Inactive' }}
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <th>Created At:</th>
                        <td>{{ $skill->created_at->format('F d, Y H:i:s') }}</td>
                    </tr>
                    <tr>
                        <th>Updated At:</th>
                        <td>{{ $skill->updated_at->format('F d, Y H:i:s') }}</td>
                    </tr>
                </table>

                <div class="mt-3">
                    <a href="{{ route('admin.skills.edit', $skill) }}" class="btn btn-warning">
                        <i class="bi bi-pencil"></i> Edit Skill
                    </a>
                    <a href="{{ route('admin.skills.index') }}" class="btn btn-secondary">
                        <i class="bi bi-arrow-left"></i> Back to List
                    </a>
                    @if($skill->category)
                        <a href="{{ route('admin.skill-categories.show', $skill->category) }}" class="btn btn-info">
                            <i class="bi bi-tag"></i> View Category
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card shadow-sm">
            <div class="card-header bg-secondary text-white">
                <i class="bi bi-gear"></i> Quick Actions
            </div>
            <div class="card-body">
                <div class="d-grid gap-2">
                    <a href="{{ route('admin.skills.edit', $skill) }}" class="btn btn-warning">
                        <i class="bi bi-pencil"></i> Edit Skill
                    </a>

                    <form action="{{ route('admin.skills.toggle-status', $skill) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <button type="submit" class="btn btn-{{ $skill->status ? 'secondary' : 'success' }} w-100">
                            <i class="bi bi-toggle-{{ $skill->status ? 'off' : 'on' }}"></i>
                            {{ $skill->status ? 'Deactivate' : 'Activate' }} Skill
                        </button>
                    </form>

                    <hr>

                    <form action="{{ route('admin.skills.destroy', $skill) }}" method="POST"
                          onsubmit="return confirm('Are you sure you want to delete this skill?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger w-100">
                            <i class="bi bi-trash"></i> Delete Skill
                        </button>
                    </form>
                </div>
            </div>
        </div>

        @if($skill->category)
        <div class="card shadow-sm mt-3">
            <div class="card-header bg-info text-white">
                <i class="bi bi-tag"></i> Category Info
            </div>
            <div class="card-body">
                <p class="small mb-2"><strong>Name:</strong> {{ $skill->category->name }}</p>
                <p class="small mb-2">
                    <strong>Status:</strong>
                    <span class="badge bg-{{ $skill->category->status ? 'success' : 'secondary' }}">
                        {{ $skill->category->status ? 'Active' : 'Inactive' }}
                    </span>
                </p>
                <p class="small mb-3">
                    <strong>Total Skills:</strong>
                    <span class="badge bg-info">{{ $skill->category->skills->count() }}</span>
                </p>
                <a href="{{ route('admin.skill-categories.show', $skill->category) }}"
                   class="btn btn-sm btn-info w-100">
                    <i class="bi bi-eye"></i> View Category
                </a>
            </div>
        </div>
        @endif
    </div>
</div>
@endsection
