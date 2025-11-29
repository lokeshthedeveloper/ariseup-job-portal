<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Company Dashboard - ' . config('app.name'))</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('company-assets/img/favicon.png') }}">

    <!-- Frontend CSS (for Header/Footer) -->
    <link href="{{ asset('frontend-assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend-assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend-assets/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend-assets/css/main.css') }}" rel="stylesheet">

    <!-- Theme CSS (for Dashboard) -->
    <link href="{{ asset('company-assets/css/styles.css') }}" rel="stylesheet">
    <link href="{{ asset('company-assets/css/colors.css') }}" rel="stylesheet">

    @stack('styles')

    <style>
        /* Fix header and dashboard spacing */
        .header {
            margin-bottom: 0 !important;
        }

        .dashboard-wrap {
            margin-top: 0 !important;
            padding-top: 0 !important;
        }

        .dashboard-content {
            min-height: calc(100vh - 200px);
        }

        /* Footer alignment */
        .dashboard-content>.row:last-child {
            margin-top: 2rem;
        }

        /* Ensure sidebar toggle works */
        .mobNavigation {
            cursor: pointer;
        }

        /* Remove extra spacing from frontend CSS */
        #main-wrapper {
            padding-top: 0 !important;
        }
    </style>
</head>

<body>
    <!-- Preloader -->
    <div id="preloader">
        <div class="preloader"><span></span><span></span></div>
    </div>

    <!-- Main wrapper -->
    <div id="main-wrapper">

        <!-- Header -->
        @include('company.partials.header')

        <!-- Dashboard Detail -->
        <div class="dashboard-wrap bg-light">

            <!-- Sidebar -->
            @include('company.partials.sidebar')

            <div class="dashboard-content">
                <div class="dashboard-tlbar d-block mb-4">
                    <div class="row">
                        <div class="colxl-12 col-lg-12 col-md-12">
                            <h1 class="mb-1 fs-3 fw-medium">@yield('page-title', 'Dashboard')</h1>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item text-muted"><a href="#">Company</a></li>
                                    <li class="breadcrumb-item"><a href="#"
                                            class="text-main">@yield('page-title', 'Dashboard')</a></li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>

                <div class="dashboard-widg-bar d-block">
                    @yield('content')
                </div>

                <!-- Footer -->
                @include('company.partials.footer')

            </div>
        </div>
        <!-- dashboard Detail End -->

        <a href="#" id="back2Top" class="top-scroll" title="Back to top"><i class="bi bi-arrow-up"></i></a>

    </div>
    <!-- End Wrapper -->

    <!-- Theme JS -->
    <script src="{{ asset('company-assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('company-assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('company-assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('company-assets/js/rangeslider.js') }}"></script>
    <script src="{{ asset('company-assets/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('company-assets/js/slick.js') }}"></script>
    <script src="{{ asset('company-assets/js/counterup.min.js') }}"></script>
    <script src="{{ asset('company-assets/js/custom.js') }}"></script>

    <script>
        // Simple mobile nav toggle for frontend header
        document.addEventListener('DOMContentLoaded', function() {
            const mobileNavToggleBtn = document.querySelector('.mobile-nav-toggle');
            if (mobileNavToggleBtn) {
                mobileNavToggleBtn.addEventListener('click', function() {
                    document.querySelector('body').classList.toggle('mobile-nav-active');
                    this.classList.toggle('bi-list');
                    this.classList.toggle('bi-x');
                });
            }
        });
    </script>

    <!-- Morris.js charts -->
    <script src="{{ asset('company-assets/js/raphael/raphael.min.js') }}"></script>
    <script src="{{ asset('company-assets/js/morris.js/morris.min.js') }}"></script>
    <script src="{{ asset('company-assets/js/custom/dashboard.js') }}"></script>

    @stack('scripts')

</body>

</html>
