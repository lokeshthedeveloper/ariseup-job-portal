@extends('company.layouts.app')

@section('title', 'Theme Settings - ' . config('app.name'))
@section('page-title', 'Theme Settings')

@section('content')
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="mb-0">Theme Management</h4>
                </div>
                <div class="card-body p-4">
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <form action="{{ route('company.theme-settings.update') }}" method="POST">
                        @csrf

                        @foreach ($themes as $sectionType => $sectionThemes)
                            <div class="mb-5">
                                <h4 class="mb-3 border-bottom pb-2">{{ $sectionType }}</h4>
                                <div class="row">
                                    @foreach ($sectionThemes as $theme)
                                        <div class="col-md-4 mb-4">
                                            <div
                                                class="card h-100 theme-card {{ isset($currentThemes[$sectionType]) && $currentThemes[$sectionType] == $theme->id ? 'border-primary' : '' }}">
                                                @if ($theme->screenshot)
                                                    <img src="{{ asset($theme->screenshot) }}" class="card-img-top"
                                                        alt="{{ $theme->theme_name }}"
                                                        style="height: 150px; object-fit: cover;">
                                                @else
                                                    <div class="card-img-top bg-light d-flex align-items-center justify-content-center"
                                                        style="height: 150px;">
                                                        <span class="text-muted">No Preview</span>
                                                    </div>
                                                @endif
                                                <div class="card-body">
                                                    <h5 class="card-title">{{ $theme->theme_name }}</h5>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio"
                                                            name="{{ str_replace(' ', '_', $sectionType) }}"
                                                            id="theme_{{ $theme->id }}" value="{{ $theme->id }}"
                                                            {{ isset($currentThemes[$sectionType]) && $currentThemes[$sectionType] == $theme->id ? 'checked' : '' }}>
                                                        <label class="form-check-label" for="theme_{{ $theme->id }}">
                                                            Select this layout
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach

                        <div class="text-end">
                            <button type="submit" class="btn btn-primary btn-lg">Save Theme Settings</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('styles')
    <style>
        .theme-card {
            transition: transform 0.2s;
            cursor: pointer;
        }

        .theme-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        .theme-card.border-primary {
            border-width: 2px;
        }
    </style>
@endpush
