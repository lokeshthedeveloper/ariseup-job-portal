<!-- resources/views/layouts/main.blade.php -->

<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="csrf-token" content="{{ csrf_token() }}">
		
        <title>JobStock - Laravel 12 Job Listing, Job Portal Landing & Admin Dashboard Template</title>
		<link rel="icon" type="image/x-icon" href="{{ asset('assets/img/favicon.png') }}">
		
        <!-- Custom CSS -->
        <link href="{{ asset('assets/css/styles.css') }}" rel="stylesheet">
		
		<!-- Colors CSS -->
        <link href="{{ asset('assets/css/colors.css') }}" rel="stylesheet">
		<link href="https://cdn.jsdelivr.net/npm/@mdi/font/css/materialdesignicons.min.css" rel="stylesheet">
		
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

		<!-- Map -->
		<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD_8C7p0Ws2gUu7wo0b6pK9Qu7LuzX2iWY&amp;libraries=places&amp;"></script>
		<script src="{{ asset('assets/js/map/map_infobox.js') }}"></script>
		<script src="{{ asset('assets/js/map/markerclusterer.js') }}"></script> 
		<script src="{{ asset('assets/js/map/map.js') }}"></script>
		<script src="{{ asset('assets/js/map/employer-map.js') }}"></script>

		<!-- Morris.js charts -->
		<script src="{{ asset('assets/js/raphael/raphael.min.js') }}"></script>
		<script src="{{ asset('assets/js/morris.js/morris.min.js') }}"></script>
		<!-- Custom Chart JavaScript -->
		<script src="{{ asset('assets/js/custom/dashboard.js') }}"></script>
		<script src="{{ asset('assets/js/main.js') }}"></script>
		<script src="{{ asset('assets/js/contact.js') }}"></script>

		<!-- HTML Editor -->
		<script src="{{ asset('assets/js/datepicker.js') }}"></script>
		<script src="{{ asset('assets/js/htmleditor.js') }}"></script>
		<!-- plugins -->
		
	</body>
</html>