<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Admin Panel') - {{ config('app.name') }}</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">

    @stack('styles')
</head>

<body>
    @auth
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ route('admin.dashboard') }}">
                    <i class="bi bi-speedometer2"></i> Ariseup Admin
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}"
                                href="{{ route('admin.dashboard') }}">Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('admin.companies.*') ? 'active' : '' }}"
                                href="{{ route('admin.companies.index') }}">Companies</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle {{ request()->routeIs('admin.universities.*') || request()->routeIs('admin.education-levels.*') || request()->routeIs('admin.courses.*') || request()->routeIs('admin.specializations.*') || request()->routeIs('admin.industries.*') || request()->routeIs('admin.job-titles.*') || request()->routeIs('admin.departments.*') || request()->routeIs('admin.role-categories.*') || request()->routeIs('admin.job-roles.*') || request()->routeIs('admin.countries.*') || request()->routeIs('admin.states.*') || request()->routeIs('admin.cities.*') || request()->routeIs('admin.skill-categories.*') || request()->routeIs('admin.skills.*') ? 'active' : '' }}"
                                href="#" id="mastersDropdown" role="button" data-bs-toggle="dropdown">
                                <i class="bi bi-collection"></i> Masters
                            </a>
                            <ul class="dropdown-menu">
                                <!-- Education Section -->
                                <li class="dropdown-header">Education</li>
                                <li>
                                    <a class="dropdown-item {{ request()->routeIs('admin.universities.*') ? 'active' : '' }}"
                                        href="{{ route('admin.universities.index') }}">
                                        <i class="bi bi-mortarboard-fill"></i> Universities
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item {{ request()->routeIs('admin.education-levels.*') ? 'active' : '' }}"
                                        href="{{ route('admin.education-levels.index') }}">
                                        <i class="bi bi-mortarboard"></i> Education Levels
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item {{ request()->routeIs('admin.courses.*') ? 'active' : '' }}"
                                        href="{{ route('admin.courses.index') }}">
                                        <i class="bi bi-book"></i> Courses
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item {{ request()->routeIs('admin.specializations.*') ? 'active' : '' }}"
                                        href="{{ route('admin.specializations.index') }}">
                                        <i class="bi bi-award"></i> Specializations
                                    </a>
                                </li>

                                <li>
                                    <hr class="dropdown-divider">
                                </li>

                                <!-- Job Section -->
                                <li class="dropdown-header">Job Management</li>
                                <li>
                                    <a class="dropdown-item {{ request()->routeIs('admin.industries.*') ? 'active' : '' }}"
                                        href="{{ route('admin.industries.index') }}">
                                        <i class="bi bi-building"></i> Industries
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item {{ request()->routeIs('admin.job-titles.*') ? 'active' : '' }}"
                                        href="{{ route('admin.job-titles.index') }}">
                                        <i class="bi bi-briefcase"></i> Job Titles
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item {{ request()->routeIs('admin.departments.*') ? 'active' : '' }}"
                                        href="{{ route('admin.departments.index') }}">
                                        <i class="bi bi-diagram-3"></i> Departments
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item {{ request()->routeIs('admin.role-categories.*') ? 'active' : '' }}"
                                        href="{{ route('admin.role-categories.index') }}">
                                        <i class="bi bi-tags"></i> Role Categories
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item {{ request()->routeIs('admin.job-roles.*') ? 'active' : '' }}"
                                        href="{{ route('admin.job-roles.index') }}">
                                        <i class="bi bi-person-badge"></i> Job Roles
                                    </a>
                                </li>

                                <li>
                                    <hr class="dropdown-divider">
                                </li>

                                <!-- Geography Section -->
                                <li class="dropdown-header">Geography</li>
                                <li>
                                    <a class="dropdown-item {{ request()->routeIs('admin.countries.*') ? 'active' : '' }}"
                                        href="{{ route('admin.countries.index') }}">
                                        <i class="bi bi-globe"></i> Countries
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item {{ request()->routeIs('admin.states.*') ? 'active' : '' }}"
                                        href="{{ route('admin.states.index') }}">
                                        <i class="bi bi-map"></i> States
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item {{ request()->routeIs('admin.cities.*') ? 'active' : '' }}"
                                        href="{{ route('admin.cities.index') }}">
                                        <i class="bi bi-geo-alt"></i> Cities
                                    </a>
                                </li>

                                <li>
                                    <hr class="dropdown-divider">
                                </li>

                                <!-- Skills Section -->
                                <li class="dropdown-header">Skills</li>
                                <li>
                                    <a class="dropdown-item {{ request()->routeIs('admin.skill-categories.*') ? 'active' : '' }}"
                                        href="{{ route('admin.skill-categories.index') }}">
                                        <i class="bi bi-tags"></i> Skill Categories
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item {{ request()->routeIs('admin.skills.*') ? 'active' : '' }}"
                                        href="{{ route('admin.skills.index') }}">
                                        <i class="bi bi-star"></i> Skills
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle {{ request()->routeIs('admin.themes.*') || request()->routeIs('admin.components.*') || request()->routeIs('admin.theme-components.*') ? 'active' : '' }}"
                                href="#" id="themeDropdown" role="button" data-bs-toggle="dropdown">
                                <i class="bi bi-palette"></i> Theme
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a class="dropdown-item {{ request()->routeIs('admin.themes.*') ? 'active' : '' }}"
                                        href="{{ route('admin.themes.index') }}">
                                        <i class="bi bi-palette"></i> Themes
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item {{ request()->routeIs('admin.components.*') ? 'active' : '' }}"
                                        href="{{ route('admin.components.index') }}">
                                        <i class="bi bi-puzzle"></i> Components
                                    </a>
                                </li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li>
                                    <a class="dropdown-item {{ request()->routeIs('admin.theme-components.*') ? 'active' : '' }}"
                                        href="{{ route('admin.theme-components.index') }}">
                                        <i class="bi bi-link-45deg"></i> Theme Components
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-bs-toggle="dropdown">
                                <i class="bi bi-person-circle"></i> {{ auth()->user()->name }}
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li>
                                    <form action="{{ route('admin.logout') }}" method="POST">
                                        @csrf
                                        <button type="submit" class="dropdown-item">
                                            <i class="bi bi-box-arrow-right"></i> Logout
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    @endauth

    <main class="@auth container-fluid py-4 @else container py-5 @endauth">
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @yield('content')
    </main>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    @stack('scripts')
</body>

</html>
