<!-- Start Navigation -->
<div class="header header-light">
    <div class="container">
        <nav id="navigation" class="navigation navigation-landscape">
            <div class="nav-header">
                <a class="nav-brand" href="{{ url('/') }}"><img src="{{ asset('assets/img/logo.png') }}" class="logo" alt="JobStock"></a>
                <div class="nav-toggle"></div>
            </div>
            <div class="nav-menus-wrapper">
                <ul class="nav-menu">
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li><a href="{{ route('company.index') }}">For Employers</a></li>
                </ul>
                <ul class="nav-menu nav-menu-social align-to-right">
                    <li class="list-buttons">
                        <a href="{{ route('company.login') }}" class="bg-main"><i class="bi bi-person me-2"></i>Sign In</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</div>
<!-- End Navigation -->
<div class="clearfix"></div>
