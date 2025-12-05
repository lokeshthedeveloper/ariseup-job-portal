<a class="mobNavigation" data-bs-toggle="collapse" href="#MobNav" role="button" aria-expanded="false" aria-controls="MobNav">
    <i class="fas fa-bars mr-2"></i>Dashboard Navigation
</a>
<div class="collapse" id="MobNav">
    <div class="dashboard-nav">
        <div class="dash-user-blocks pt-5">
            <div class="jbs-grid-usrs-thumb">
                <div class="jbs-grid-yuo">
                    <a href="{{ route('company.profile') }}">
                        <figure>
                            @if (Auth::user()->company && Auth::user()->company->logo)
                                <img src="{{ asset(Auth::user()->company->logo) }}" class="img-fluid circle"
                                    alt="">
                            @else
                                <img src="{{ asset('company-assets/img/l-12.png') }}" class="img-fluid circle"
                                    alt="">
                            @endif
                        </figure>
                    </a>
                </div>
            </div>
            <div class="jbs-grid-usrs-caption mb-3">
                <div class="jbs-kioyer">
                    <span class="label text-light bg-main">Company</span>
                </div>
                <div class="jbs-tiosk">
                    <h4 class="jbs-tiosk-title"><a
                            href="{{ route('company.profile') }}">{{ Auth::user()->company->name ?? Auth::user()->name }}</a>
                    </h4>
                    <div class="jbs-tiosk-subtitle">
                        <span><i
                                class="fa-solid fa-location-dot me-2"></i>{{ Auth::user()->company->city ?? 'Location' }}</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="dashboard-inner">
            <ul data-submenu-title="Main Navigation">
                <li class="{{ request()->routeIs('company.dashboard') ? 'active' : '' }}">
                    <a href="{{ route('company.dashboard') }}"><i class="fa-solid fa-gauge-high me-2"></i>Dashboard</a>
                </li>
                <li class="{{ request()->routeIs('company.theme.*') ? 'active' : '' }}">
                    <a href="{{ route('company.theme.index') }}"><i class="fa-solid fa-palette me-2"></i>Theme</a>
                </li>
                <li class="{{ request()->routeIs('company.profile') ? 'active' : '' }}">
                    <a href="{{ route('company.profile') }}"><i class="fa-regular fa-user me-2"></i>Company Profile</a>
                </li>
                <li>
                    <a href="#"><i class="fa-solid fa-business-time me-2"></i>My Jobs</a>
                </li>
                <li>
                    <a href="#"><i class="fa-solid fa-pen-ruler me-2"></i>Submit Jobs</a>
                </li>
                <li>
                    <a href="#"><i class="fa-solid fa-user-group me-2"></i>Applicants Jobs</a>
                </li>
                <li>
                    <a href="#"><i class="fa-solid fa-user-clock me-2"></i>Shortlisted Candidates</a>
                </li>
                <li>
                    <a href="#"><i class="fa-solid fa-wallet me-2"></i>Package</a>
                </li>
                <li>
                    <a href="#"><i class="fa-solid fa-comments me-2"></i>Messages</a>
                </li>

                <li>
                    <a href="#"><i class="fa-solid fa-unlock-keyhole me-2"></i>Change Password</a>
                </li>
                <li>
                    <a href="#"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="fa-solid fa-power-off me-2"></i>Log Out
                    </a>
                    <form id="logout-form" action="{{ route('company.logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
            </ul>
        </div>
    </div>
</div>
