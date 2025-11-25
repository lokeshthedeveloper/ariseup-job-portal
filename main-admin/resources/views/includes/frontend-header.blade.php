<header id="header" class="header sticky-top">

    <div class="topbar d-flex align-items-center">
      <div class="container d-flex justify-content-center justify-content-md-between">
        <div class="contact-info d-flex align-items-center">
          <i class="bi bi-envelope d-flex align-items-center"><a href="mailto:{{ config('app.contact_email', 'contact@example.com') }}">{{ config('app.contact_email', 'contact@example.com') }}</a></i>
          <i class="bi bi-phone d-flex align-items-center ms-4"><span>{{ config('app.contact_phone', '+1 5589 55488 55') }}</span></i>
        </div>
        <div class="social-links d-none d-md-flex align-items-center">
          <a href="{{ config('app.social_twitter', '#') }}" class="twitter"><i class="bi bi-twitter-x"></i></a>
          <a href="{{ config('app.social_facebook', '#') }}" class="facebook"><i class="bi bi-facebook"></i></a>
          <a href="{{ config('app.social_instagram', '#') }}" class="instagram"><i class="bi bi-instagram"></i></a>
          <a href="{{ config('app.social_linkedin', '#') }}" class="linkedin"><i class="bi bi-linkedin"></i></a>
        </div>
      </div>
    </div><!-- End Top Bar -->

    <div class="branding d-flex align-items-center">

      <div class="container position-relative d-flex align-items-center justify-content-between">
        <a href="{{ route('home') }}" class="logo d-flex align-items-center me-auto">
          <!-- Uncomment the line below if you also wish to use an image logo -->
          <!-- <img src="{{ asset('frontend-assets/img/logo.png') }}" alt=""> -->
          <h1 class="sitename">{{ config('app.name', 'JobPortal') }}</h1>
        </a>

        <nav id="navmenu" class="navmenu">
          <ul>
            <li><a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}">Home</a></li>
            <li><a href="{{ route('home') }}#about">About</a></li>
            <li><a href="{{ route('home') }}#services">Services</a></li>
            <li><a href="{{ route('home') }}#pricing">Pricing</a></li>
            <li><a href="{{ route('blog.index') }}" class="{{ request()->routeIs('blog.*') ? 'active' : '' }}">Blog</a></li>
            <li class="dropdown"><a href="#"><span>Jobs</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
              <ul>
                <li><a href="#">Browse Jobs</a></li>
                <li><a href="#">Job Categories</a></li>
                <li><a href="#">Job Alerts</a></li>
              </ul>
            </li>
            <li><a href="{{ route('contact') }}" class="{{ request()->routeIs('contact') ? 'active' : '' }}">Contact</a></li>
          </ul>
          <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
        </nav>

        <a class="cta-btn d-none d-sm-block" href="{{ route('company.register') }}">Register Company</a>

      </div>

    </div>

  </header>
