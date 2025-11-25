<!-- resources/views/home-5.blade.php -->
@extends('layouts.main')

@section('title', 'Home-5 Page')

@section('content')

@include('includes.top-header')

@include('includes.navbar2')
			
<!-- Hero Banner Start -->
<div class="image-cover hero-header" style="background:url({{ asset('assets/img/slider-5.jpg') }}) no-repeat;" data-overlay="6">
	<div class="container">

		<div class="inner-banner-text text-center">
			<h1>Discover Great Job Offer<br>With JobStock</h1>
			<p class="fs-6">Getting a new job is never easy. Check what new jobs we have in store for you on JobStock.</p>
		</div>
		
		<div class="full-search-2 mt-5">
			<div class="hero-search-content search-shadow colored">
				
				<div class="row classic-search-box m-0 gx-2">
						
					<div class="col-xl-3 col-lg-3 col-md-12 col-sm-12">
						<div class="form-group briod">
							<div class="input-with-icon">
								<input type="text" class="form-control" placeholder="Skills, Designations, Keyword">
								<i class="fa-solid fa-magnifying-glass text-main"></i>
							</div>
						</div>
					</div>
					<div class="col-xl-3 col-lg-3 col-md-12 col-sm-12">
							<div class="form-group briod">
								<div class="input-with-icon">
									<select class="form-control">
										<option value="1">Job Category</option>
										<option value="2">Accounting & Finance</option>
										<option value="3">Automotive Jobs</option>
										<option value="4">Business Services</option>
										<option value="5">Education Training</option>
										<option value="6">Software Application</option>
										<option value="7">Restaurant & Food</option>
										<option value="8">Healthcare</option>
										<option value="9">Transportation</option>
										<option value="10">Telecommunications</option>
									</select>
									<i class="fa-solid fa-briefcase text-main"></i>
								</div>
							</div>
						</div>
					<div class="col-xl-3 col-lg-3 col-md-12 col-sm-12">
						<div class="form-group">
							<div class="input-with-icon">
								<select class="form-control">
									<option value="1">Select City</option>
									<option value="2">Huntingdon</option>
									<option value="3">Fenland</option>
									<option value="4">United State</option>
									<option value="5">United Kingdom</option>
									<option value="6">California</option>
									<option value="7">Canada</option>
									<option value="8">New York</option>
								</select>
								<i class="fa-solid fa-location-crosshairs text-main"></i>
							</div>
						</div>
					</div>
					<div class="col-xl-3 col-lg-3 col-md-12 col-sm-12">
						<div class="fliox-search-wiop">
							<div class="form-group me-2">
								<a href="JavaScript:Void(0);" data-bs-toggle="modal" data-bs-target="#filter" class="btn btn-filter-search"><i class="fa-solid fa-filter"></i>Filter</a>
							</div>
							<div class="form-group">
								<button type="submit" class="btn btn-main full-width">Search</button>
							</div>
						</div>
					</div>
							
				</div>
				
			</div>
		</div>
			
	</div>
</div>
<!-- Hero Banner End -->

<!-- Explore Categories Start -->
<section>
	<div class="container">
		
		<div class="row justify-content-center">
			<div class="col-xl-6 col-lg-7 col-md-10 text-center">
				<div class="sec-heading center">
					<h2>Explore Best Categories</h2>
					<p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores</p>
				</div>
			</div>
		</div>
		
		<div class="row gx-4 gy-4 justify-content-center">
			
			<!-- includes/Home/index/categories.blade.php -->
			@include('includes.Home.index.categories')
			
		</div>
		
	</div>	
</section>
<!-- Explore Categories End -->

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

<!-- Featured Jobs Start -->
<section>
	<div class="container">
		
		<div class="row justify-content-center">
			<div class="col-xl-6 col-lg-7 col-md-10 text-center">
				<div class="sec-heading center">
					<h2>Featured Jobs</h2>
					<p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores</p>
				</div>
			</div>
		</div>
		
		<div class="row justify-content-center gx-xl-3 gx-3 gy-4">
		
			<!-- includes/Home/index/jobs.blade.php -->
			@include('includes.Home.index.jobs')				
				
		</div>
		
	</div>
</section>
<!-- Featured Jobs End -->

<!-- Explore Top Companies Start -->
<section class="gray-simple">
	<div class="container">
	
		<div class="row justify-content-center">
			<div class="col-xl-6 col-lg-7 col-md-10 text-center">
				<div class="sec-heading center">
					<h2>Explore Top Companies</h2>
					<p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores</p>
				</div>
			</div>
		</div>
	
		<div class="row justify-content-center gx-xl-3 gx-3 gy-4">
		
			<!-- includes/Home/home-4/employer.blade.php -->
			@include('includes.Home.home-4.employer')						
			
		</div>
		
	</div>		
</section>
<!-- Explore Top Companies End -->

<!-- Hire Experts Start -->
<section>
	<div class="container">
	
		<div class="row justify-content-center">
			<div class="col-xl-6 col-lg-7 col-md-10 text-center">
				<div class="sec-heading center">
					<h2>Hire Talents & Experts</h2>
					<p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores</p>
				</div>
			</div>
		</div>
	
		<div class="row justify-content-center gx-4 gy-4">
		
			<!-- includes/Home/home-5/candidate2.blade.php -->
			@include('includes.Home.home-5.candidate2')
			
		</div>
		
	</div>		
</section>
<!-- Hire Experts End -->

<!-- Side Caption Start -->
<div class="position-relative">
	<div class="container">
		
		<!-- includes/Home/home-5/platform.blade.php -->
		@include('includes.Home.home-5.platform')
		
	</div>
</div>
<!-- Side Caption End -->

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

<!-- includes/Home/home-5/find3.blade.php -->
@include('includes.Home.home-5.find3')
			
<!-- includes/Home/index/log.blade.php -->
@include('includes.Home.index.log')
		
<!-- includes/Home/home-3/filter.blade.php -->
@include('includes.Home.home-3.filter')			
	
@include('includes.footer5')			

@endsection