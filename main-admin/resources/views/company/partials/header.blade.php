<div class="header header-light dark-text">
    <div class="container">
        <nav id="navigation" class="navigation navigation-landscape">
            <div class="nav-header">
                <a class="nav-brand" href="{{ route('home') }}">
                    <!-- Using text logo to match frontend -->
                    <h1 class="sitename" style="font-size: 24px; font-weight: 700; color: #333; margin: 0;">
                        {{ config('app.name', 'JobPortal') }}</h1>
                </a>
                <div class="nav-toggle"></div>
                <div class="mobile_nav">
                    <ul>
                        <li>
                            <a href="#"
                                onclick="event.preventDefault(); document.getElementById('logout-form-mobile').submit();"
                                class="theme-cl fs-lg">
                                <i class="fa-solid fa-arrow-right-to-bracket"></i>
                            </a>
                            <form id="logout-form-mobile" action="{{ route('company.logout') }}" method="POST"
                                class="d-none">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="nav-menus-wrapper" style="transition-property: none;">
                <ul class="nav-menu">
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li><a href="#">Find Job</a></li>
                    <li><a href="#">Candidates</a></li>
                    <li><a href="#">Pages</a></li>
                </ul>

                <ul class="nav-menu nav-menu-social align-to-right dhsbrd">
                    <li>
                        <div class="btn-group account-drop">
                            <button type="button" class="btn btn-order-by-filt" data-bs-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <i class="fa-regular fa-comments"></i><span class="noti-status"></span>
                            </button>
                            <div class="dropdown-menu pull-right animated flipInX">
                                <div class="drp_menu_headr bg-main">
                                    <h4>Notifications</h4>
                                </div>
                                <div class="ntf-list-groups">
                                    <div class="ntf-list-groups-single">
                                        <div class="ntf-list-groups-icon text-purple"><i
                                                class="fa-solid fa-house-medical-circle-check"></i></div>
                                        <div class="ntf-list-groups-caption">
                                            <p class="small"><strong>System</strong> Welcome to JobPortal!</p>
                                        </div>
                                    </div>
                                    <div class="ntf-list-groups-single">
                                        <a href="#" class="ntf-more">View All Notifications</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="btn-group account-drop">
                            <button type="button" class="btn btn-order-by-filt" data-bs-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <img src="{{ Auth::user()->company && Auth::user()->company->logo ? asset(Auth::user()->company->logo) : asset('company-assets/img/user-1.jpg') }}"
                                    class="img-fluid circle" alt="">
                            </button>
                            <div class="dropdown-menu pull-right animated flipInX">
                                <div class="drp_menu_headr bg-main">
                                    <h4>Hi, {{ Auth::user()->name }}</h4>
                                    <div class="drp_menu_headr-right">
                                        <form action="{{ route('company.logout') }}" method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn-whites">Logout</button>
                                        </form>
                                    </div>
                                </div>
                                <ul>
                                    <li><a href="{{ route('company.dashboard') }}" class="sub-menu-item"><i
                                                class="fa fa-tachometer-alt"></i>Dashboard</a></li>
                                    <li><a href="{{ route('company.profile') }}" class="sub-menu-item"><i
                                                class="fa fa-user-tie"></i>My Profile</a></li>
                                    <li><a href="#"
                                            onclick="event.preventDefault(); document.getElementById('logout-form-header').submit();"
                                            class="sub-menu-item"><i class="fa-solid fa-power-off"></i>Log Out</a></li>
                                    <form id="logout-form-header" action="{{ route('company.logout') }}" method="POST"
                                        class="d-none">
                                        @csrf
                                    </form>
                                </ul>
                            </div>
                        </div>
                    </li>
                    <li class="list-buttons ms-2">
                        <a href="#"><i class="bi bi-patch-check-fill me-2"></i>Post Your Job</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</div>
