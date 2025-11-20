<!-- Start Navigation -->
<div class="header header-dark head-fixed">
    <div class="container-fluid">
        <nav id="navigation" class="navigation navigation-landscape">
            <div class="nav-header">
                <a class="nav-brand" href="">
                    <img src="{{ asset('assets/img/logo-light.png') }}" class="logo" alt="">
                </a>
                <div class="nav-toggle"></div>
                <ul class="mobile_nav dhsbrd">
                    <li>
                        <div class="btn-group account-drop">
                            <button type="button" class="btn btn-order-by-filt" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa-regular fa-comments"></i><span class="noti-status"></span>
                            </button>
                            <div class="dropdown-menu pull-right animated flipInX">
                                <div class="drp_menu_headr bg-main">
                                    <h4>Notifications</h4>
                                </div>
                                <div class="ntf-list-groups">
                                    <div class="ntf-list-groups-single">
                                        <div class="ntf-list-groups-icon text-purple"><i class="fa-solid fa-house-medical-circle-check"></i></div>
                                        <div class="ntf-list-groups-caption"><p class="small"><strong>Kr. Shaury Preet</strong> Replied Your Message</p></div>
                                    </div>
                                    <div class="ntf-list-groups-single">
                                        <div class="ntf-list-groups-icon text-warning"><i class="fa-solid fa-envelope"></i></div>
                                        <div class="ntf-list-groups-caption"><p class="small">Mortin Denver Accepted Your Resume <strong class="text-success">On JobStock</strong></p></div>
                                    </div>
                                    <div class="ntf-list-groups-single">
                                        <div class="ntf-list-groups-icon text-success"><i class="fa-solid fa-sack-dollar"></i></div>
                                        <div class="ntf-list-groups-caption"><p class="small">Your Job #456256 Expired Yesterday <strong>View job</strong></p></div>
                                    </div>
                                    <div class="ntf-list-groups-single">
                                        <div class="ntf-list-groups-icon text-danger"><i class="fa-solid fa-comments"></i></div>
                                        <div class="ntf-list-groups-caption"><p class="small"><strong>Daniel kurwa</strong> Has Been Approved Your Resume!.</p></div>
                                    </div>
                                    <div class="ntf-list-groups-single">
                                        <div class="ntf-list-groups-icon text-info"><i class="fa-solid fa-circle-dollar-to-slot"></i></div>
                                        <div class="ntf-list-groups-caption"><p class="small">Khushi Verma Left A Review On <strong class="text-danger">Your Message</strong></p></div>
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
                            <button type="button" class="btn btn-order-by-filt" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img src="{{ asset('assets/img/l-12.png') }}" class="img-fluid circle" alt="">
                            </button>
                            <div class="dropdown-menu pull-right animated flipInX">
                                <div class="drp_menu_headr bg-main">
                                    <h4>Hi, Calvin English</h4>
                                    <div class="drp_menu_headr-right"><button type="button" class="btn btn-whites">Logout</button></div>
                                </div>
                                <ul>
                                    <li><a href="{{ url('/candidate-dashboard') }}"><i class="fa fa-tachometer-alt"></i>Dashboard<span class="notti_coun style-1">4</span></a></li>                                  
                                    <li><a href="{{ url('/candidate-profile') }}"><i class="fa fa-user-tie"></i>My Profile</a></li>                                 
                                    <li><a href="{{ url('/candidate-resume') }}"><i class="fa fa-file"></i>My Resume<span class="notti_coun style-2">7</span></a></li>
                                    <li><a href="{{ url('/candidate-saved-jobs') }}"><i class="fa-solid fa-bookmark"></i>Saved Resume</a></li>
                                    <li><a href="{{ url('/candidate-messages') }}"><i class="fa fa-envelope"></i>Messages<span class="notti_coun style-3">3</span></a></li>
                                    <li><a href="{{ url('/candidate-change-password') }}"><i class="fa fa-unlock-alt"></i>Change Password</a></li>
                                    <li><a href="{{ url('/candidate-delete-account') }}"><i class="fa-solid fa-trash-can"></i>Delete Account</a></li>
                                </ul>
                            </div>
                        </div>
                    </li>
                </ul>
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
                
                <ul class="nav-menu nav-menu-social align-to-right dhsbrd">
                    <li>
                        <div class="btn-group account-drop">
                            <button type="button" class="btn btn-order-by-filt" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa-regular fa-comments"></i><span class="noti-status"></span>
                            </button>
                            <div class="dropdown-menu pull-right animated flipInX">
                                <div class="drp_menu_headr bg-main">
                                    <h4>Notifications</h4>
                                </div>
                                <div class="ntf-list-groups">
                                    <div class="ntf-list-groups-single">
                                        <div class="ntf-list-groups-icon text-purple"><i class="fa-solid fa-house-medical-circle-check"></i></div>
                                        <div class="ntf-list-groups-caption"><p class="small"><strong>Kr. Shaury Preet</strong> Replied Your Message</p></div>
                                    </div>
                                    <div class="ntf-list-groups-single">
                                        <div class="ntf-list-groups-icon text-warning"><i class="fa-solid fa-envelope"></i></div>
                                        <div class="ntf-list-groups-caption"><p class="small">Mortin Denver Accepted Your Resume <strong class="text-success">On JobStock</strong></p></div>
                                    </div>
                                    <div class="ntf-list-groups-single">
                                        <div class="ntf-list-groups-icon text-success"><i class="fa-solid fa-sack-dollar"></i></div>
                                        <div class="ntf-list-groups-caption"><p class="small">Your Job #456256 Expired Yesterday <strong>View job</strong></p></div>
                                    </div>
                                    <div class="ntf-list-groups-single">
                                        <div class="ntf-list-groups-icon text-danger"><i class="fa-solid fa-comments"></i></div>
                                        <div class="ntf-list-groups-caption"><p class="small"><strong>Daniel kurwa</strong> Has Been Approved Your Resume!.</p></div>
                                    </div>
                                    <div class="ntf-list-groups-single">
                                        <div class="ntf-list-groups-icon text-info"><i class="fa-solid fa-circle-dollar-to-slot"></i></div>
                                        <div class="ntf-list-groups-caption"><p class="small">Khushi Verma Left A Review On <strong class="text-danger">Your Message</strong></p></div>
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
                            <button type="button" class="btn btn-order-by-filt" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img src="{{ asset('assets/img/l-12.png') }}" class="img-fluid circle" alt="">
                            </button>
                            <div class="dropdown-menu pull-right animated flipInX">
                                <div class="drp_menu_headr bg-main">
                                    <h4>Hi, Calvin English</h4>
                                    <div class="drp_menu_headr-right"><button type="button" class="btn btn-whites">Logout</button></div>
                                </div>
                                <ul>
                                    <li><a href="{{ url('/candidate-dashboard') }}"  class="sub-menu-item"><i class="fa fa-tachometer-alt"></i>Dashboard<span class="notti_coun style-1">4</span></a></li>                                  
                                    <li><a href="{{ url('/candidate-profile') }}" class="sub-menu-item"><i class="fa fa-user-tie"></i>My Profile</a></li>                                 
                                    <li><a href="{{ url('/candidate-resume') }}" class="sub-menu-item"><i class="fa fa-file"></i>My Resume<span class="notti_coun style-2">7</span></a></li>
                                    <li><a href="{{ url('/candidate-saved-jobs') }}" class="sub-menu-item"><i class="fa-solid fa-bookmark"></i>Saved Resume</a></li>
                                    <li><a href="{{ url('/candidate-messages') }}" class="sub-menu-item"><i class="fa fa-envelope"></i>Messages<span class="notti_coun style-3">3</span></a></li>
                                    <li><a href="{{ url('/candidate-change-password') }}" class="sub-menu-item"><i class="fa fa-unlock-alt"></i>Change Password</a></li>
                                    <li><a href="{{ url('/candidate-delete-account') }}" class="sub-menu-item"><i class="fa-solid fa-trash-can"></i>Delete Account</a></li>
                                </ul>
                            </div>
                        </div>
                    </li>
                    <li class="list-buttons ms-2">
                        <a href="{{ url('/employer-submit-job') }}"><i class="bi bi-patch-check-fill me-2"></i>Post Your Job</a>
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