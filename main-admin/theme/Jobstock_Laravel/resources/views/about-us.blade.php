<!-- resources/views/about-us.blade.php -->
@extends('layouts.main')

@section('title', 'About-Us Page')

@section('content')

@include('includes.navbar2')

<!-- Page Title Start -->
<section class="page-head bg-cover" style="background:#017efa url({{ asset('assets/img/about.jpg') }}) no-repeat;" data-overlay="4">
	<div class="container">
		<div class="row">
			<div class="col-xl-8 col-lg-9 col-md-12">
				
				<h1 class="text-white mb-4">Who We are<br> & Our Smart Mission</h1>
				<p class="text-white mb-4">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. </p>
				<button type="button" class="btn btn-main fw-medium">Get In Touch</button>
			</div>
		</div>
	</div>
</section>
<!-- Page Title End -->

<!-- Our Story Start -->
<section>

	<div class="container">
	
		<!-- row Start -->
		<div class="row align-items-center justify-content-between">

			<div class="col-lg-6 col-md-6">
				<div class="story-wrap explore-content">
					
					<h2>Our Mission & Story</h2>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
					<p class="fw-light mb-4">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. </p>
					<button type="button" class="btn fw-medium btn-main">Start Today Now</button>
				</div>
			</div>
			
			<div class="col-lg-5 col-md-6">
				<img src="{{ asset('assets/img/bn-1.png') }}" class="img-fluid" alt="">
			</div>
			
		</div>
		<!-- /row -->					
		
	</div>
			
</section>
<!-- Our Story End -->

<!-- Our Team -->
<section class="bg-light">
	<div class="container">
	
		<div class="row">
			<div class="col-lg-12 col-md-12">
				<div class="sec-heading center">
					<h2>Meet Our Team</h2>
					<p>Professional & Dedicated Team</p>
				</div>
			</div>
		</div>
		
		<div class="row gx-3 gy-4">
			
			<!-- includes/Pages/team.blade.php -->
			@include('includes.Pages.team')

		</div>
	
	</div>
</section>
<!-- Our Team -->

<!-- Valuable Step Start -->
<section class="bg-second">
	<div class="container">
		
		<div class="row justify-content-center">
			<div class="col-xl-6 col-lg-7 col-md-10 text-center">
				<div class="sec-heading center light">
					<h2>Choose What You Need</h2>
					<p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores</p>
				</div>
			</div>
		</div>
		
		<div class="row align-items-center gx-4 gy-4">
		
			<!-- includes/Home/home-2/need.blade.php -->
			@include('includes.Home.home-2.need')
			
		</div>
		
	</div>
</section>
<!-- Valuable Step End -->

<!-- Good Reviews By Customers -->
<section>
	<div class="container">
	
		<div class="row justify-content-center">
			<div class="col-lg-7 col-md-10 text-center">
				<div class="sec-heading center">
					<h2>Good Reviews By Customers</h2>
					<p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores</p>
				</div>
			</div>
		</div>
		
		<div class="row justify-content-center gx-4 gy-4">
			
			<!-- includes/Home/index/reviews.blade.php -->
			@include('includes.Home.index.reviews')
			
		</div>
		
	</div>	
</section>
<!-- Good Reviews By Customers -->
			
<!-- includes/Home/home-4/find2.blade.php -->
@include('includes.Home.home-4.find2')

<!-- includes/Home/index/log.blade.php -->
@include('includes.Home.index.log')

<!-- includes/Home/home-3/filter.blade.php -->
@include('includes.Home.home-3.filter')
			
@include('includes.footer2')

@endsection