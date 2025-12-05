<header id="header" class="header sticky-top">

    <div class="topbar d-flex align-items-center">
        <div class="container d-flex justify-content-center justify-content-md-between">
            <div class="contact-info d-flex align-items-center">
                <i class="bi bi-envelope d-flex align-items-center"><a
                        href="mailto:{{ config('app.contact_email', 'contact@example.com') }}">{{ config('app.contact_email', 'contact@example.com') }}</a></i>
                <i
                    class="bi bi-phone d-flex align-items-center ms-4"><span>{{ config('app.contact_phone', '+1 5589 55488 55') }}</span></i>
            </div>
        </div>
    </div><!-- End Top Bar -->

    <div class="branding d-flex align-items-center">

        <div class="container position-relative d-flex align-items-center justify-content-between">
            <a href="{{ route('home') }}" class="logo d-flex align-items-center me-auto">
                <h1 class="sitename">{{ config('app.name', 'JobPortal') }}</h1>
            </a>

            <nav id="navmenu" class="navmenu">
                <ul>
                    <li><a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}">Home</a>
                    </li>
                    <li><a href="{{ route('home') }}#features">Features</a></li>
                    <li><a href="{{ route('home') }}#pricing">Pricing</a></li>
                    <li><a href="{{ route('blog.index') }}"
                            class="{{ request()->routeIs('blog.*') ? 'active' : '' }}">Blog</a></li>
                    <li><a href="{{ route('contact') }}"
                            class="{{ request()->routeIs('contact') ? 'active' : '' }}">Contact</a></li>
                </ul>
                <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
            </nav>

            @auth
                @if (Auth::user()->role === 'company')
                    <div class="dropdown d-none d-sm-block">
                        <a class="cta-btn dropdown-toggle" href="#" role="button" id="companyDropdown"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-person-circle me-2"></i>{{ Auth::user()->company->name ?? Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="companyDropdown">
                            <li><a class="dropdown-item" href="{{ route('company.dashboard') }}"><i
                                        class="bi bi-speedometer2 me-2"></i>Dashboard</a></li>

                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <a class="dropdown-item" href="#"
                                    onclick="event.preventDefault(); document.getElementById('logout-form-frontend').submit();">
                                    <i class="bi bi-box-arrow-right me-2"></i>Logout
                                </a>
                                <form id="logout-form-frontend" action="{{ route('company.logout') }}" method="POST"
                                    class="d-none">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </div>
                @else
                    <a class="cta-btn d-none d-sm-block" href="{{ route('company.register') }}">
                        <i class="bi bi-building me-2"></i>Register Company
                    </a>
                @endif
            @else
                <div class="dropdown d-none d-sm-block">
                    <button class="cta-btn dropdown-toggle" type="button" id="companyMenuDropdown"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-building me-2"></i>For Companies
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="companyMenuDropdown">
                        <li><a class="dropdown-item" href="{{ route('company.login') }}"><i
                                    class="bi bi-box-arrow-in-right me-2"></i>Login</a></li>
                        <li><a class="dropdown-item" href="{{ route('company.register') }}"><i
                                    class="bi bi-person-plus me-2"></i>Register</a></li>
                    </ul>
                </div>
            @endauth

        </div>

    </div>

</header>

<style>
    .cta-btn {
        font-family: var(--heading-font);
        font-weight: 600;
        font-size: 14px;
        letter-spacing: 0.5px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        padding: 10px 28px;
        border-radius: 50px;
        transition: all 0.3s ease;
        margin-left: 15px;
        color: #fff !important;
        background: linear-gradient(135deg, #2196F3 0%, #1976D2 100%);
        text-decoration: none;
        box-shadow: 0 4px 15px rgba(33, 150, 243, 0.3);
        border: none;
    }

    .cta-btn:hover {
        background: linear-gradient(135deg, #42A5F5 0%, #2196F3 100%);
        color: #fff !important;
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(33, 150, 243, 0.4);
    }

    .cta-btn i {
        margin-right: 8px;
        font-size: 16px;
    }

    .dropdown-menu {
        border: none;
        border-radius: 15px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        padding: 10px;
        margin-top: 10px;
        animation: fadeIn 0.3s ease;
    }

    .dropdown-item {
        padding: 10px 15px;
        border-radius: 8px;
        transition: all 0.2s;
        font-weight: 500;
        color: #555;
    }

    .dropdown-item:hover {
        background-color: #f0f7ff;
        color: #2196F3;
        transform: translateX(5px);
    }

    .dropdown-item i {
        margin-right: 10px;
        color: #2196F3;
        width: 20px;
        text-align: center;
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(10px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
</style>
