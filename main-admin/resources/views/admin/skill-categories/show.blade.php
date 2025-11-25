@extends('layouts.admin')

@section('title', 'View Skill Category')

@section('content')
<div class="row mb-4">
    <div class="col-md-12">
        <h2><i class="bi bi-eye"></i> View Skill Category</h2>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.skill-categories.index') }}">Skill Categories</a></li>
                <li class="breadcrumb-item active">{{ $skillCategory->name }}</li>
            </ol>
        </nav>
    </div>
</div>

<div class="row">
    <div class="col-md-8">
        <div class="card shadow-sm mb-4">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0"><i class="bi bi-tag"></i> Category Details</h5>
            </div>
            <div class="card-body">
                <table class="table table-borderless">
                    <tr>
                        <th width="200">ID:</th>
                        <td>{{ $skillCategory->id }}</td>
                    </tr>
                    <tr>
                        <th>Name:</th>
                        <td><strong>{{ $skillCategory->name }}</strong></td>
                    </tr>
                    <tr>
                        <th>Status:</th>
                        <td>
                            <span class="badge bg-{{ $skillCategory->status ? 'success' : 'secondary' }}">
                                {{ $skillCategory->status ? 'Active' : 'Inactive' }}
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <th>Total Skills:</th>
                        <td><span class="badge bg-info">{{ $skillCategory->skills->count() }}</span></td>
                    </tr>
                    <tr>
                        <th>Created At:</th>
                        <td>{{ $skillCategory->created_at->format('F d, Y H:i:s') }}</td>
                    </tr>
                    <tr>
                        <th>Updated At:</th>
                        <td>{{ $skillCategory->updated_at->format('F d, Y H:i:s') }}</td>
                    </tr>
                </table>

                <div class="mt-3">
                    <a href="{{ route('admin.skill-categories.edit', $skillCategory) }}" class="btn btn-warning">
                        <i class="bi bi-pencil"></i> Edit Category
                    </a>
                    <a href="{{ route('admin.skill-categories.index') }}" class="btn btn-secondary">
                        <i class="bi bi-arrow-left"></i> Back to List
                    </a>
                </div>
            </div>
        </div>

        <!-- Associated Skills -->
        @if($skillCategory->skills->count() > 0)
        <div class="card shadow-sm">
            <div class="card-header bg-info text-white">
                <h5 class="mb-0"><i class="bi bi-list-check"></i> Associated Skills ({{ $skillCategory->skills->count() }})</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Code</th>
                                <th>Status</th>
                                <th>Created</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($skillCategory->skills as $skill)
                            <tr>
                                <td>{{ $skill->id }}</td>
                                <td><strong>{{ $skill->name }}</strong></td>
                                <td>
                                    @if($skill->code)
                                        <code>{{ $skill->code }}</code>
                                    @else
                                        <span class="text-muted">-</span>
                                    @endif
                                </td>
                                <td>
                                    <span class="badge bg-{{ $skill->status ? 'success' : 'secondary' }}">
                                        {{ $skill->status ? 'Active' : 'Inactive' }}
                                    </span>
                                </td>
                                <td>{{ $skill->created_at->format('M d, Y') }}</td>
                                <td>
                                    <a href="{{ route('admin.skills.show', $skill) }}" class="btn btn-sm btn-info">
                                        <i class="bi bi-eye"></i>
                                    </a>
                                    <a href="{{ route('admin.skills.edit', $skill) }}" class="btn btn-sm btn-warning">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        @else
        <div class="card shadow-sm">
            <div class="card-body text-center py-5">
                <i class="bi bi-inbox" style="font-size: 3rem; color: #ccc;"></i>
                <p class="text-muted mt-3">No skills associated with this category yet.</p>
                <a href="{{ route('admin.skills.create') }}" class="btn btn-primary">
                    <i class="bi bi-plus-circle"></i> Add First Skill
                </a>
            </div>
        </div>
        @endif
    </div>

    <div class="col-md-4">
        <div class="card shadow-sm">
            <div class="card-header bg-secondary text-white">
                <i class="bi bi-gear"></i> Quick Actions
            </div>
            <div class="card-body">
                <div class="d-grid gap-2">
                    <a href="{{ route('admin.skill-categories.edit', $skillCategory) }}" class="btn btn-warning">
                        <i class="bi bi-pencil"></i> Edit Category
                    </a>

                    <a href="{{ route('admin.skills.create') }}?category={{ $skillCategory->id }}" class="btn btn-success">
                        <i class="bi bi-plus-circle"></i> Add Skill to This Category
                    </a>

                    <form action="{{ route('admin.skill-categories.toggle-status', $skillCategory) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <button type="submit" class="btn btn-{{ $skillCategory->status ? 'secondary' : 'success' }} w-100">
                            <i class="bi bi-toggle-{{ $skillCategory->status ? 'off' : 'on' }}"></i>
                            {{ $skillCategory->status ? 'Deactivate' : 'Activate' }} Category
                        </button>
                    </form>

                    @if($skillCategory->skills->count() == 0)
                    <hr>
                    <form action="{{ route('admin.skill-categories.destroy', $skillCategory) }}" method="POST"
                          onsubmit="return confirm('Are you sure you want to delete this category?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger w-100">
                            <i class="bi bi-trash"></i> Delete Category
                        </button>
                    </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
