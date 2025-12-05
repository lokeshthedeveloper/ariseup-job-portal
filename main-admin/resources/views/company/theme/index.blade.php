@extends('company.layouts.app')

@section('title', 'Theme Selection')
@section('page-title', 'Theme & Component Selection')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0"><i class="fa-solid fa-palette me-2"></i>Customize Your Portal Experience</h5>
                        <p class="mb-0 small mt-1">Select a theme and customize with components of your choice</p>
                    </div>
                    <div class="card-body p-0">
                        <!-- Success/Error Messages -->
                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show m-3" role="alert">
                                <i class="fa-solid fa-check-circle me-2"></i>
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif

                        @if (session('error'))
                            <div class="alert alert-danger alert-dismissible fade show m-3" role="alert">
                                <i class="fa-solid fa-exclamation-circle me-2"></i>
                                {{ session('error') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif

                        @if ($errors->any())
                            <div class="alert alert-danger alert-dismissible fade show m-3" role="alert">
                                <i class="fa-solid fa-exclamation-triangle me-2"></i>
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif

                        <form action="{{ route('company.theme.update') }}" method="POST" id="themeForm">
                            @csrf
                            @method('PUT')

                            <div class="row g-0">
                                <!-- LEFT SIDE - Themes -->
                                <div class="col-md-5 border-end">
                                    <div class="p-4">
                                        <h5 class="mb-3">
                                            <i class="fa-solid fa-brush me-2"></i>Available Themes
                                        </h5>
                                        <p class="text-muted small mb-4">
                                            Click on a theme card to view its components and select it
                                        </p>

                                        <div class="themes-list">
                                            @forelse($themes as $theme)
                                                <div class="theme-item mb-3 {{ $selectedTheme == $theme->id ? 'selected' : '' }}"
                                                    data-theme-id="{{ $theme->id }}"
                                                    data-components="{{ $theme->components->pluck('id')->toJson() }}">
                                                    <label class="theme-label">
                                                        <input type="radio" name="theme_id" value="{{ $theme->id }}"
                                                            class="theme-radio d-none"
                                                            {{ $selectedTheme == $theme->id ? 'checked' : '' }} required>
                                                        <div class="theme-card-horizontal p-3">
                                                            <div class="d-flex align-items-center">
                                                                <div class="theme-icon-box me-3">
                                                                    <i class="fa-solid fa-palette fa-2x"></i>
                                                                </div>
                                                                <div class="flex-grow-1">
                                                                    <h6 class="mb-1 fw-bold">{{ $theme->name }}</h6>
                                                                    <p class="mb-0 small text-muted">
                                                                        <code
                                                                            class="bg-light px-2 py-1 rounded">{{ $theme->slug }}</code>
                                                                    </p>
                                                                    <div class="mt-1">
                                                                        <small class="text-muted">
                                                                            <i class="fa-solid fa-puzzle-piece me-1"></i>
                                                                            {{ $theme->components->count() }} components
                                                                            available
                                                                        </small>
                                                                    </div>
                                                                </div>
                                                                <div class="theme-select-indicator">
                                                                    <i class="fa-solid fa-circle-check fa-2x"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </label>
                                                </div>
                                            @empty
                                                <div class="text-center py-5">
                                                    <i class="fa-solid fa-inbox fa-3x text-muted mb-3"></i>
                                                    <p class="text-muted">No themes available</p>
                                                </div>
                                            @endforelse
                                        </div>
                                    </div>
                                </div>

                                <!-- RIGHT SIDE - Components -->
                                <div class="col-md-7">
                                    <div class="p-4">
                                        <div class="d-flex justify-content-between align-items-center mb-3">
                                            <h5 class="mb-0">
                                                <i class="fa-solid fa-puzzle-piece me-2"></i>Components
                                            </h5>
                                            <div id="selected-theme-badge" class="badge bg-primary" style="display: none;">
                                                Selected Theme: <span id="selected-theme-name"></span>
                                            </div>
                                        </div>
                                        <p class="text-muted small mb-4">
                                            Select components to customize your experience. Components are grouped by the
                                            selected theme.
                                        </p>

                                        <!-- Components Container -->
                                        <div id="components-container">
                                            @if ($themes->count() > 0)
                                                @foreach ($themes as $theme)
                                                    <div class="theme-components-section {{ $selectedTheme == $theme->id ? 'd-block' : 'd-none' }}"
                                                        data-theme-id="{{ $theme->id }}">

                                                        @if ($theme->components->count() > 0)
                                                            <div class="row g-3">
                                                                @foreach ($theme->components as $component)
                                                                    <div class="col-md-6">
                                                                        <div class="component-item">
                                                                            <div class="form-check">
                                                                                <input
                                                                                    class="form-check-input component-checkbox"
                                                                                    type="checkbox" name="components[]"
                                                                                    value="{{ $component->id }}"
                                                                                    id="component_{{ $component->id }}"
                                                                                    data-component-id="{{ $component->id }}"
                                                                                    {{ in_array($component->id, $selectedComponents) ? 'checked' : '' }}>
                                                                                <label class="form-check-label w-100"
                                                                                    for="component_{{ $component->id }}">
                                                                                    <div class="component-content">
                                                                                        <div
                                                                                            class="d-flex align-items-start">
                                                                                            <div
                                                                                                class="component-icon me-2">
                                                                                                <i
                                                                                                    class="fa-solid fa-cube"></i>
                                                                                            </div>
                                                                                            <div class="flex-grow-1">
                                                                                                <strong
                                                                                                    class="d-block">{{ $component->name }}</strong>
                                                                                                <small
                                                                                                    class="text-muted">{{ $component->slug }}</small>
                                                                                            </div>
                                                                                            <div class="check-indicator">
                                                                                                <i
                                                                                                    class="fa-solid fa-check-circle"></i>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                @endforeach
                                                            </div>

                                                            <!-- Quick Actions -->
                                                            <div class="mt-3 pt-3 border-top">
                                                                <div class="d-flex gap-2">
                                                                    <button type="button"
                                                                        class="btn btn-sm btn-outline-primary select-all-components">
                                                                        <i class="fa-solid fa-check-double me-1"></i>Select
                                                                        All
                                                                    </button>
                                                                    <button type="button"
                                                                        class="btn btn-sm btn-outline-secondary deselect-all-components">
                                                                        <i class="fa-solid fa-times me-1"></i>Deselect All
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        @else
                                                            <div class="alert alert-info">
                                                                <i class="fa-solid fa-info-circle me-2"></i>
                                                                This theme doesn't have any components available yet.
                                                            </div>
                                                        @endif
                                                    </div>
                                                @endforeach
                                            @else
                                                <div class="alert alert-warning">
                                                    <i class="fa-solid fa-exclamation-triangle me-2"></i>
                                                    No themes available. Please contact administrator.
                                                </div>
                                            @endif
                                        </div>

                                        <!-- Component Selection Stats -->
                                        <div class="mt-4 p-3 bg-light rounded">
                                            <div class="row text-center">
                                                <div class="col-6">
                                                    <div class="stat-box">
                                                        <i class="fa-solid fa-palette text-primary fa-2x mb-2"></i>
                                                        <div>
                                                            <strong class="d-block"
                                                                id="selected-theme-count">{{ $selectedTheme ? 1 : 0 }}</strong>
                                                            <small class="text-muted">Theme Selected</small>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="stat-box">
                                                        <i class="fa-solid fa-puzzle-piece text-success fa-2x mb-2"></i>
                                                        <div>
                                                            <strong class="d-block"
                                                                id="selected-components-count">{{ count($selectedComponents) }}</strong>
                                                            <small class="text-muted">Components Selected</small>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Submit Section -->
                            <div class="border-top p-4 bg-light">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <small class="text-muted">
                                            <i class="fa-solid fa-info-circle me-1"></i>
                                            Changes will be applied immediately after saving
                                        </small>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-lg">
                                        <i class="fa-solid fa-save me-2"></i>Save Preferences
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        /* Theme Items */
        .theme-item {
            transition: all 0.3s ease;
        }

        .theme-label {
            cursor: pointer;
            margin: 0;
            display: block;
        }

        .theme-card-horizontal {
            border: 2px solid #e0e0e0;
            border-radius: 10px;
            background: white;
            transition: all 0.3s ease;
            position: relative;
        }

        .theme-card-horizontal:hover {
            border-color: #0d6efd;
            box-shadow: 0 2px 8px rgba(13, 110, 253, 0.15);
        }

        .theme-item.selected .theme-card-horizontal {
            border-color: #0d6efd;
            background: linear-gradient(135deg, #f8f9ff 0%, #e7f0ff 100%);
            box-shadow: 0 3px 12px rgba(13, 110, 253, 0.25);
        }

        .theme-icon-box {
            width: 60px;
            height: 60px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #f8f9fa;
            border-radius: 10px;
            color: #6c757d;
            transition: all 0.3s ease;
        }

        .theme-item.selected .theme-icon-box {
            background: #0d6efd;
            color: white;
        }

        .theme-select-indicator {
            color: #e0e0e0;
            transition: all 0.3s ease;
        }

        .theme-item.selected .theme-select-indicator {
            color: #0d6efd;
        }

        /* Component Items */
        .component-item {
            border: 1px solid #dee2e6;
            border-radius: 8px;
            padding: 12px;
            background: white;
            transition: all 0.2s ease;
        }

        .component-item:hover {
            border-color: #0d6efd;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.08);
        }

        .component-item:has(.form-check-input:checked) {
            border-color: #0d6efd;
            background: #f8f9ff;
        }

        .component-icon {
            color: #6c757d;
            font-size: 1.2rem;
        }

        .component-item:has(.form-check-input:checked) .component-icon {
            color: #0d6efd;
        }

        .check-indicator {
            color: #e0e0e0;
            font-size: 1.2rem;
        }

        .component-item:has(.form-check-input:checked) .check-indicator {
            color: #28a745;
        }

        .form-check-label {
            cursor: pointer;
        }

        .form-check-input {
            cursor: pointer;
        }

        /* Stats */
        .stat-box {
            padding: 10px;
        }

        /* Responsive */
        @media (max-width: 768px) {

            .col-md-5,
            .col-md-7 {
                border-right: none !important;
            }

            .border-end {
                border-bottom: 1px solid #dee2e6 !important;
                border-right: none !important;
            }
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const themeItems = document.querySelectorAll('.theme-item');
            const themeRadios = document.querySelectorAll('.theme-radio');
            const componentSections = document.querySelectorAll('.theme-components-section');
            const selectedThemeBadge = document.getElementById('selected-theme-badge');
            const selectedThemeName = document.getElementById('selected-theme-name');
            const selectedThemeCount = document.getElementById('selected-theme-count');
            const selectedComponentsCount = document.getElementById('selected-components-count');

            // Store component selections state (persists across theme switches)
            let componentSelections = new Map();

            // Initialize on page load - capture ALL checkboxes including hidden ones
            initializeComponentSelections();
            updateComponentCount();

            const initialSelected = document.querySelector('.theme-item.selected');
            if (initialSelected) {
                const themeName = initialSelected.querySelector('h6').textContent;
                selectedThemeBadge.style.display = 'block';
                selectedThemeName.textContent = themeName;
            }

            // Theme selection handler
            themeItems.forEach(item => {
                item.addEventListener('click', function() {
                    const themeId = this.dataset.themeId;
                    const themeName = this.querySelector('h6').textContent;
                    const radio = this.querySelector('.theme-radio');

                    // Save current component selections before switching (all visible checkboxes)
                    saveCurrentComponentSelections();

                    // Update radio
                    radio.checked = true;

                    // Update visual selection
                    themeItems.forEach(t => t.classList.remove('selected'));
                    this.classList.add('selected');

                    // Show/hide component sections
                    componentSections.forEach(section => {
                        if (section.dataset.themeId == themeId) {
                            section.classList.remove('d-none');
                            section.classList.add('d-block');
                        } else {
                            section.classList.add('d-none');
                            section.classList.remove('d-block');
                        }
                    });

                    // Restore component selections for this theme from our Map
                    restoreComponentSelections(themeId);

                    // Update badge
                    selectedThemeBadge.style.display = 'block';
                    selectedThemeName.textContent = themeName;
                    selectedThemeCount.textContent = '1';

                    updateComponentCount();
                });
            });

            // Component checkbox handler
            document.querySelectorAll('.component-checkbox').forEach(checkbox => {
                checkbox.addEventListener('change', function() {
                    // Update persistent state
                    const componentId = this.dataset.componentId;
                    componentSelections.set(componentId, this.checked);
                    updateComponentCount();
                });
            });

            // Select All button
            document.querySelectorAll('.select-all-components').forEach(btn => {
                btn.addEventListener('click', function() {
                    const section = this.closest('.theme-components-section');
                    section.querySelectorAll('.component-checkbox').forEach(cb => {
                        cb.checked = true;
                        componentSelections.set(cb.dataset.componentId, true);
                    });
                    updateComponentCount();
                });
            });

            // Deselect All button
            document.querySelectorAll('.deselect-all-components').forEach(btn => {
                btn.addEventListener('click', function() {
                    const section = this.closest('.theme-components-section');
                    section.querySelectorAll('.component-checkbox').forEach(cb => {
                        cb.checked = false;
                        componentSelections.set(cb.dataset.componentId, false);
                    });
                    updateComponentCount();
                });
            });

            // Initialize component selections state from ALL checkboxes (including hidden)
            function initializeComponentSelections() {
                // Get server-side selected components from PHP
                const serverSelectedComponents = @json($selectedComponents);

                console.log('Server selected components:', serverSelectedComponents);

                // Important: Process ALL checkboxes regardless of visibility
                componentSections.forEach(section => {
                    section.querySelectorAll('.component-checkbox').forEach(checkbox => {
                        const componentId = parseInt(checkbox.dataset.componentId);

                        // Check if this component is in the server's selected list
                        const isSelected = serverSelectedComponents.includes(componentId);

                        // Set checkbox state
                        checkbox.checked = isSelected;

                        // Store in our Map
                        componentSelections.set(componentId.toString(), isSelected);
                    });
                });

                console.log('Initialized selections:', componentSelections);
            }

            // Save current visible component selections
            function saveCurrentComponentSelections() {
                // Save state of currently visible checkboxes
                const visibleSections = document.querySelectorAll('.theme-components-section:not(.d-none)');
                visibleSections.forEach(section => {
                    section.querySelectorAll('.component-checkbox').forEach(checkbox => {
                        const componentId = checkbox.dataset.componentId;
                        componentSelections.set(componentId, checkbox.checked);
                    });
                });
            }

            // Restore component selections for a specific theme
            function restoreComponentSelections(themeId) {
                const section = document.querySelector(`.theme-components-section[data-theme-id="${themeId}"]`);
                if (section) {
                    section.querySelectorAll('.component-checkbox').forEach(checkbox => {
                        const componentId = checkbox.dataset.componentId;
                        // Restore from our Map
                        if (componentSelections.has(componentId)) {
                            checkbox.checked = componentSelections.get(componentId);
                        }
                    });
                }
            }

            // Update component count based on all selections (across all themes)
            function updateComponentCount() {
                let totalChecked = 0;
                componentSelections.forEach((isChecked, componentId) => {
                    if (isChecked) totalChecked++;
                });
                selectedComponentsCount.textContent = totalChecked;
            }

            // Before form submit, ensure ALL checkboxes (including hidden) have correct state
            document.getElementById('themeForm').addEventListener('submit', function(e) {
                console.log('Form submission started');
                console.log('Current selections in Map:', componentSelections);

                // IMPORTANT: Remove all existing component checkboxes to avoid duplicates
                // We'll create hidden inputs with unique values instead
                document.querySelectorAll('.component-checkbox').forEach(cb => {
                    cb.disabled = true; // Disable so they won't be submitted
                });

                // Create hidden inputs for selected components (unique only)
                const selectedComponentIds = [];
                componentSelections.forEach((isChecked, componentId) => {
                    if (isChecked) {
                        selectedComponentIds.push(componentId);
                    }
                });

                // Remove duplicates (just in case)
                const uniqueComponentIds = [...new Set(selectedComponentIds)];

                console.log('Unique selected component IDs:', uniqueComponentIds);

                // Add hidden inputs for each unique component
                const form = this;
                uniqueComponentIds.forEach(componentId => {
                    const hiddenInput = document.createElement('input');
                    hiddenInput.type = 'hidden';
                    hiddenInput.name = 'components[]';
                    hiddenInput.value = componentId;
                    hiddenInput.className = 'temp-component-input'; // Mark for cleanup
                    form.appendChild(hiddenInput);
                });

                // Log form data
                const formData = new FormData(this);
                console.log('Form data being submitted:');
                for (let [key, value] of formData.entries()) {
                    console.log(key + ':', value);
                }
            });
        });
    </script>
@endsection
