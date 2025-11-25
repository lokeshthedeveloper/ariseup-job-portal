@extends('layouts.admin')

@section('title', 'Edit City')

@section('content')
<div class="row mb-4">
    <div class="col-md-12">
        <h2><i class="bi bi-geo-alt"></i> Edit City</h2>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.cities.index') }}">Cities</a></li>
                <li class="breadcrumb-item active">Edit</li>
            </ol>
        </nav>
    </div>
</div>

<div class="row">
    <div class="col-md-8">
        <div class="card shadow-sm">
            <div class="card-header">
                <h5 class="mb-0">City Information</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.cities.update', $city) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="name" class="form-label">City Name <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                               id="name" name="name" value="{{ old('name', $city->name) }}" required>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="country_id" class="form-label">Country <span class="text-danger">*</span></label>
                        <select class="form-select @error('country_id') is-invalid @enderror"
                                id="country_id" name="country_id" required>
                            <option value="">Select Country</option>
                            @foreach($countries as $country)
                                <option value="{{ $country->id }}" {{ old('country_id', $city->country_id) == $country->id ? 'selected' : '' }}>
                                    {{ $country->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('country_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="state_id" class="form-label">State <span class="text-danger">*</span></label>
                        <select class="form-select @error('state_id') is-invalid @enderror"
                                id="state_id" name="state_id" required>
                            <option value="">Select State</option>
                        </select>
                        @error('state_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="status" class="form-label">Status <span class="text-danger">*</span></label>
                        <select class="form-select @error('status') is-invalid @enderror"
                                id="status" name="status" required>
                            <option value="1" {{ old('status', $city->status) == '1' ? 'selected' : '' }}>Active</option>
                            <option value="0" {{ old('status', $city->status) == '0' ? 'selected' : '' }}>Inactive</option>
                        </select>
                        @error('status')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="{{ route('admin.cities.index') }}" class="btn btn-secondary">
                            <i class="bi bi-arrow-left"></i> Cancel
                        </a>
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-save"></i> Update City
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card shadow-sm mb-3">
            <div class="card-header">
                <h5 class="mb-0"><i class="bi bi-info-circle"></i> Information</h5>
            </div>
            <div class="card-body">
                <p class="small mb-2"><strong>Created:</strong> {{ $city->created_at->format('M d, Y h:i A') }}</p>
                <p class="small mb-0"><strong>Last Updated:</strong> {{ $city->updated_at->format('M d, Y h:i A') }}</p>
            </div>
        </div>

        <div class="card shadow-sm">
            <div class="card-header">
                <h5 class="mb-0"><i class="bi bi-info-circle"></i> Guidelines</h5>
            </div>
            <div class="card-body">
                <h6>Field Descriptions:</h6>
                <ul class="small">
                    <li><strong>City Name:</strong> Full official name of the city</li>
                    <li><strong>Country:</strong> Select the country this city belongs to</li>
                    <li><strong>State:</strong> Select the state this city belongs to (filtered by country)</li>
                    <li><strong>Status:</strong> Active cities are visible to users, inactive ones are hidden</li>
                </ul>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const countrySelect = document.getElementById('country_id');
    const stateSelect = document.getElementById('state_id');
    const oldStateId = "{{ old('state_id', $city->state_id) }}";

    // Store all states data
    const allStates = @json($allStates);

    countrySelect.addEventListener('change', function() {
        const countryId = this.value;

        // Clear state dropdown
        stateSelect.innerHTML = '<option value="">Select State</option>';

        if (countryId) {
            // Filter states by selected country
            const filteredStates = allStates.filter(state => state.country_id == countryId);

            filteredStates.forEach(state => {
                const option = document.createElement('option');
                option.value = state.id;
                option.textContent = state.name;
                stateSelect.appendChild(option);
            });
        }
    });

    // Trigger on page load to populate states
    if (countrySelect.value) {
        countrySelect.dispatchEvent(new Event('change'));

        // Set state value after states are populated
        setTimeout(() => {
            stateSelect.value = oldStateId;
        }, 100);
    }
});
</script>
@endpush
@endsection
