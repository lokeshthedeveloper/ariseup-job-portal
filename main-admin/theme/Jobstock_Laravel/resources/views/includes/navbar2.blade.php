<!-- Start Navigation -->
<div class="header header-light">
    <div class="container">
        <nav id="navigation" class="navigation navigation-landscape">
            <div class="nav-header">
                <a class="nav-brand" href=""><img src="{{ asset('assets/img/logo.png') }}" class="logo" alt=""></a>
                <div class="nav-toggle"></div>
                <div class="mobile_nav">
                    <ul>
                        <li class="list-buttons">
                            <a href="JavaScript:Void(0);" data-bs-toggle="modal" data-bs-target="#login">
                                <svg width="32" height="32" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path opacity="0.3" d="M22 12C22 17.5 17.5 22 12 22C6.5 22 2 17.5 2 12C2 6.5 6.5 2 12 2C17.5 2 22 6.5 22 12ZM12 7C10.3 7 9 8.3 9 10C9 11.7 10.3 13 12 13C13.7 13 15 11.7 15 10C15 8.3 13.7 7 12 7Z" class="fill-main"/>
                                    <path d="M12 22C14.6 22 17 21 18.7 19.4C17.9 16.9 15.2 15 12 15C8.8 15 6.09999 16.9 5.29999 19.4C6.99999 21 9.4 22 12 22Z" class="fill-main"/>
                                </svg>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="nav-menus-wrapper">
                <ul class="nav-menu">
                
                    <li class="parent-parent-menu-item"><a href="JavaScript:Void(0);" class="home-link">Home<span class="submenu-indicator"></span></a>
                        <ul class="nav-dropdown nav-submenu">
                            <li><a href="{{ url('/') }}" class="sub-menu-item">Home Layout 1</a></li>
                            <li><a href="{{ url('/home-2') }}" class="sub-menu-item">Home Layout 2</a></li>
                            <li><a href="{{ url('/home-3') }}" class="sub-menu-item">Home Layout 3</a></li>
                            <li><a href="{{ url('/home-4') }}" class="sub-menu-item">Home Layout 4</a></li>
                            <li><a href="{{ url('/home-5') }}" class="sub-menu-item">Home Layout 5</a></li>
                            <li><a href="{{ url('/home-6') }}" class="sub-menu-item">Home Layout 6</a></li>
                            <li><a href="{{ url('/home-7') }}" class="sub-menu-item">Home Layout 7</a></li>
                            <li><a href="{{ url('/home-8') }}" class="sub-menu-item">Home Layout 8</a></li>                                    
                            <li><a href="{{ url('/home-9') }}" class="sub-menu-item">Home Layout 9</a></li>                                    
                            <li><a href="{{ url('/home-10') }}" class="sub-menu-item">Home Layout 10</a></li>
                            <li><a href="{{ url('/home-11') }}" class="sub-menu-item">Home Layout 11</a></li>
                            <li><a href="{{ url('/home-12') }}" class="sub-menu-item">Home Layout 12</a></li>																								
                        </ul>
                    </li>
                    
                    <li class="parent-parent-menu-item"><a href="JavaScript:Void(0);" class="home-link">For Candidate<span class="submenu-indicator"></span></a>
                        <ul class="nav-dropdown nav-submenu">
                            <li class="parent-menu-item"><a href="JavaScript:Void(0);">Browse Jobs<span class="submenu-indicator"></span></a>
                                <ul class="nav-dropdown nav-submenu">
                                    <li><a href="{{ url('/grid-style-1') }}" class="sub-menu-item">Job Grid Style 1</a></li>                                    
                                    <li><a href="{{ url('/grid-style-2') }}" class="sub-menu-item">Job Grid Stle 2</a></li>                                    
                                    <li><a href="{{ url('/grid-style-3') }}" class="sub-menu-item">Job Grid Style 3</a></li>
                                    <li><a href="{{ url('/grid-style-4') }}" class="sub-menu-item">Job Grid Style 4</a></li>
                                    <li><a href="{{ url('/grid-style-5') }}" class="sub-menu-item">Job Grid Style 5</a></li>												
                                    <li><a href="{{ url('/full-job-grid-1') }}" class="sub-menu-item">Grid Full Style 1</a></li>
                                    <li><a href="{{ url('/full-job-grid-2') }}" class="sub-menu-item">Grid Full Style 2</a></li>
                                    <li><a href="{{ url('/list-style-1') }}" class="sub-menu-item">Job List Style 1</a></li>
                                    <li><a href="{{ url('/list-style-2') }}" class="sub-menu-item">Job List Style 2</a></li>
                                    <li><a href="{{ url('/list-style-3') }}" class="sub-menu-item">Job List Style 3</a></li>
                                    <li><a href="{{ url('/full-job-list-1') }}" class="sub-menu-item">List Full Style 1</a></li>
                                    <li><a href="{{ url('/full-job-list-2') }}" class="sub-menu-item">List Full Style 2</a></li>												
                                </ul>
                            </li>
                            <li class="parent-menu-item"><a href="JavaScript:Void(0);">Browse Map Jobs<span class="submenu-indicator"></span></a>
                                <ul class="nav-dropdown nav-submenu">
                                    <li><a href="{{ url('/half-map') }}" class="sub-menu-item">Job Search on Map 01</a></li>                                    
                                    <li><a href="{{ url('/half-map-2') }}" class="sub-menu-item">Job Search on Map 02</a></li>                                    
                                    <li><a href="{{ url('/half-map-3') }}" class="sub-menu-item">Job Search on Map 03</a></li>
                                    <li><a href="{{ url('/half-map-list-1') }}" class="sub-menu-item">Job Search on Map 04</a></li>
                                    <li><a href="{{ url('/half-map-list-2') }}" class="sub-menu-item">Job Search on Map 05</a></li>
                                </ul>
                            </li>
                            <li class="parent-menu-item"><a href="JavaScript:Void(0);">Browse Candidate<span class="submenu-indicator"></span></a>
                                <ul class="nav-dropdown nav-submenu">
                                    <li><a href="{{ url('/candidate-grid-1') }}" class="sub-menu-item">Candidate Grid 01</a></li>                                    
                                    <li><a href="{{ url('/candidate-grid-2') }}" class="sub-menu-item">Candidate Grid 02</a></li>                                    
                                    <li><a href="{{ url('/candidate-list-1') }}" class="sub-menu-item">Candidate List 01</a></li>                                    
                                    <li><a href="{{ url('/candidate-list-2') }}" class="sub-menu-item">Candidate List 02</a></li>
                                    <li><a href="{{ url('/candidate-half-map') }}" class="sub-menu-item">Candidate Half Map 01</a></li>
                                    <li><a href="{{ url('/candidate-half-map-list') }}" class="sub-menu-item">Candidate Half Map 02</a></li>												
                                </ul>
                            </li>
                            <li class="parent-menu-item"><a href="JavaScript:Void(0);">Single job Detail<span class="submenu-indicator"></span></a>
                                <ul class="nav-dropdown nav-submenu">
                                    <li><a href="{{ url('/single-layout-1') }}" class="sub-menu-item">Single Layout 01</a></li>                                    
                                    <li><a href="{{ url('/single-layout-2') }}" class="sub-menu-item">Single Layout 02</a></li>                                    
                                    <li><a href="{{ url('/single-layout-3') }}" class="sub-menu-item">Single Layout 03</a></li>                                    
                                    <li><a href="{{ url('/single-layout-4') }}" class="sub-menu-item">Single Layout 04</a></li>												
                                    <li><a href="{{ url('/single-layout-5') }}" class="sub-menu-item">Single Layout 05</a></li>												
                                    <li><a href="{{ url('/single-layout-6') }}" class="sub-menu-item">Single Layout 06</a></li>												
                                </ul>
                            </li>
                            <li class="parent-menu-item"><a href="JavaScript:Void(0);">Candidate Detail<span class="submenu-indicator"></span></a>
                                <ul class="nav-dropdown nav-submenu">
                                    <li><a href="{{ url('/candidate-detail') }}" class="sub-menu-item">Candidate Detail 01</a></li>                                    
                                    <li><a href="{{ url('/candidate-detail-2') }}" class="sub-menu-item">Candidate Detail 02</a></li>                                    
                                    <li><a href="{{ url('/candidate-detail-3') }}" class="sub-menu-item">Candidate Detail 03</a></li>                                    												
                                </ul>
                            </li>
                            <li><a href="{{ url('/advance-search') }}" class="sub-menu-item">Advance Search</a></li>
                            <li>
                                <a href="{{ url('/candidate-dashboard') }}" class="sub-menu-item">Candidate Dashboard</a>                                
                            </li>
                        </ul>
                    </li>
                    
                    <li class="parent-parent-menu-item"><a href="JavaScript:Void(0);" class="home-link">For Employer<span class="submenu-indicator"></span></a>
                        <ul class="nav-dropdown nav-submenu">
                            <li class="parent-menu-item"><a href="JavaScript:Void(0);">Explore Employers<span class="submenu-indicator"></span></a>
                                <ul class="nav-dropdown nav-submenu">
                                    <li><a href="{{ url('/employer-grid-1') }}" class="sub-menu-item">Search Employers 01</a></li>                                    
                                    <li><a href="{{ url('/employer-grid-2') }}" class="sub-menu-item">Search Employers 02</a></li>                                    
                                    <li><a href="{{ url('/employer-list-1') }}" class="sub-menu-item">Search List Employers 01</a></li>
                                    <li><a href="{{ url('/employer-half-map') }}" class="sub-menu-item">Search Employers Map</a></li>
                                    <li><a href="{{ url('/employer-half-map-list') }}" class="sub-menu-item">Search List Employers Map</a></li>												
                                </ul>
                            </li>
                            <li class="parent-menu-item"><a href="JavaScript:Void(0);">Employer Detail<span class="submenu-indicator"></span></a>
                                <ul class="nav-dropdown nav-submenu">
                                    <li><a href="{{ url('/employer-detail') }}" class="sub-menu-item">Employer Detail 01</a></li>                                    
                                    <li><a href="{{ url('/employer-detail-2') }}" class="sub-menu-item">Employer Detail 02</a></li>                                    											
                                </ul>
                            </li>
                            <li>
                                <a href="{{ url('/employer-dashboard') }}" class="sub-menu-item">Employer Dashboard</a>                                
                            </li>
                        </ul>
                    </li>
                    
                    <li class="parent-parent-menu-item"><a href="JavaScript:Void(0);" class="home-link">Pages<span class="submenu-indicator"></span></a>
                        <ul class="nav-dropdown nav-submenu">
                            <li><a href="{{ url('/about-us') }}" class="sub-menu-item">About Us</a></li> 
                            <li><a href="{{ url('/404') }}" class="sub-menu-item">Error Page</a></li>
                            <li><a href="{{ url('/checkout') }}" class="sub-menu-item">Checkout</a></li>										
                            <li><a href="{{ url('/blog') }}" class="sub-menu-item">Blogs Page</a></li>                                    
                            <li><a href="{{ url('/blog-detail') }}" class="sub-menu-item">Blog Detail</a></li>                                    
                            <li><a href="{{ url('/privacy') }}" class="sub-menu-item">Terms & Privacy</a></li> 
                            <li><a href="{{ url('/pricing') }}" class="sub-menu-item">Pricing</a></li>  
                            <li><a href="{{ url('/faq') }}" class="sub-menu-item">FAQ's</a></li>
                            <li><a href="{{ url('/contact') }}" class="sub-menu-item">Contacts</a></li>
                        </ul>
                    </li>
                    
                    <li><a href="{{ url('/help') }}" class="sub-menu-item">Help</a></li>
                    
                </ul>
                
                <ul class="nav-menu nav-menu-social align-to-right">
                    <li>
                        <a href="JavaScript:Void(0);" data-bs-toggle="modal" data-bs-target="#login"><i class="fas fa-sign-in-alt me-2"></i>Sign In</a>
                    </li>
                    <li class="list-buttons ms-2">
                        <a href="{{ url('/signup') }}"><i class="bi bi-person-circle me-2"></i>Register Today</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</div>
<!-- End Navigation -->
<div class="clearfix"></div>

<script>
    const currentPath = window.location.pathname.replace(/\/$/, '');

    const subMenuItems = document.querySelectorAll('.sub-menu-item');
    subMenuItems.forEach((item) => {
        const itemPath = new URL(item.href).pathname.replace(/\/$/, '');

        if (itemPath === currentPath) {
            item.classList.add('active');

            // Highlight all parent menus recursively
            let parentMenu = item.closest('.parent-menu-item');
            while (parentMenu && !parentMenu.classList.contains('processed')) {
                const parentLink = parentMenu.querySelector('a');
                if (parentLink) {
                    parentLink.classList.add('active');
                }
                parentMenu.classList.add('processed');
                parentMenu = parentMenu.closest('.parent-parent-menu-item');
            }

            // Highlight the top-level parent menu
            const topLevelMenu = item.closest('.parent-parent-menu-item');
            if (topLevelMenu) {
                const topLevelLink = topLevelMenu.querySelector('.home-link');
                if (topLevelLink) {
                    topLevelLink.classList.add('active');
                }
            }
        }
    });
</script>