<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title', 'JobStock - Job Portal')</title>
		<link rel="icon" type="image/x-icon" href="{{ asset('assets/img/favicon.png') }}">

        <!-- Custom CSS -->
        <link href="{{ asset('assets/css/styles.css') }}" rel="stylesheet">

		<!-- Colors CSS -->
        <link href="{{ asset('assets/css/colors.css') }}" rel="stylesheet">
		<link href="https://cdn.jsdelivr.net/npm/@mdi/font/css/materialdesignicons.min.css" rel="stylesheet">

		@stack('styles')
    </head>

    <body>
        <!-- Preloader -->
        <div id="preloader"><div class="preloader"><span></span><span></span></div></div>

        <!-- Main wrapper -->
        <div id="main-wrapper">

            <!-- Main Content -->
            <div>
                @yield('content')
            </div>

            <a href="#" id="back2Top" class="top-scroll" title="Back to top"><i class="bi bi-arrow-up"></i></a>

		</div>
		<!-- End Wrapper -->

		<!-- All Jquery -->
		<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
		<script src="{{ asset('assets/js/popper.min.js') }}"></script>
		<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
		<script src="{{ asset('assets/js/rangeslider.js') }}"></script>
		<script src="{{ asset('assets/js/jquery.nice-select.min.js') }}"></script>
		<script src="{{ asset('assets/js/slick.js') }}"></script>
		<script src="{{ asset('assets/js/counterup.min.js') }}"></script>

		<script src="{{ asset('assets/js/custom.js') }}"></script>

		@stack('scripts')

	</body>
</html>
