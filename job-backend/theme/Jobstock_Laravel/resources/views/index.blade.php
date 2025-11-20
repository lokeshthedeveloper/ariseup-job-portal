<!-- resources/views/index.blade.php -->
@extends('layouts.main')

@section('title', 'Index Page')

@section('content')

@include('includes.navbar')
			
<!-- Hero Banner Start -->
<div class="image-cover hero-header position-relative py-5" style="background:url({{ asset('assets/img/4268.jpg') }})no-repeat; "data-overlay="7">
	<div class="position-absolute bottom-0 start-0 end-0">
		<img src="{{ asset('assets/img/banner-curve.svg') }}" class="img-fluid" alt="SVG">
	</div>
	<div class="container position-relative z-9">

		<div class="row justify-content-between align-items-center">
			<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
				<h6 class="text-green fw-medium d-inline-flex align-items-center mb-3"><span class="bg-green w-10 h-05 me-2"></span>Get Hot & Trending Jobs</h6>
				<h1 class="mb-4">Real Jobs, Real People, Real Success</h1>
				<p class="fs-5">Getting a new job is never easy. Check what new jobs we have in store for you on JobStock.</p>
				<div class="lios-vrst">
					<ul>
						
						<!-- includes/Home/index/ctr.blade.php -->
						@include('includes.Home.index.ctr')

					</ul>
				</div>
			</div>
			
			<div class="col-xl-5 col-lg-5 col-md-12 col-sm-12">
				<div class="hero-search-wrap">
					<div class="hero-search">
						<h1>Grow Your Career with <span class="text-main">JobStock</span></h1>
					</div>
					<div class="hero-search-content verticle-space">
						<div class="row">
							<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
								<div class="form-group">
									<div class="input-with-icon">
										<input type="text" class="form-control border" placeholder="Search Job Keywords..">
										<img src="{{ asset('assets/img/pin.svg') }}" width="18" alt="">
									</div>
								</div>
							</div>
						
							<div class="col-xl-6 col-lg-12 col-md-6 col-sm-6">
								<div class="form-group">
									<label>Job Category</label>
									<select class="form-control">
										<option value="1">Software & Application</option>
										<option value="2">Banking</option>
										<option value="3">Health & Medical</option>
										<option value="4">Mobile & App</option>
										<option value="5">Education</option>
									</select>
								</div>
							</div>
							<div class="col-xl-6 col-lg-12 col-md-6 col-sm-6">
								<div class="form-group">
									<label>Job Type</label>
									<select class="form-control">
										<option value="1">All Type</option>
										<option value="2">Full Time</option>
										<option value="3">Part Time</option>
										<option value="4">Contractor</option>
										<option value="5">Freelance</option>
									</select>
								</div>
							</div>
							
							<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
								<div class="form-group">
									<label>Job Lavel</label>
									<select class="form-control">
										<option value="1">Junior Lavel</option>
										<option value="2">Mid Lavel</option>
										<option value="3">Manager</option>
										<option value="4">Team Leader</option>
										<option value="5">Senior Lavel</option>
									</select>
								</div>
							</div>
							<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
								<div class="form-group">
									<label>Experience</label>
									<select class="form-control">
										<option value="1">1 Year</option>
										<option value="2">2 Year</option>
										<option value="3">3 Year</option>
										<option value="4">4 Year</option>
										<option value="5">5 Year</option>
									</select>
								</div>
							</div>
							
							<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
								<div class="form-group">
									<label>Expected Sallary</label>
									<select class="form-control">
										<option value="1">$500 - $1000 PA</option>
										<option value="2">$200 - $5000 PA</option>
										<option value="3">$5000 - $10000 PA</option>
										<option value="4">$10000 - $20000 PA</option>
										<option value="5">$20000 - $40000 PA</option>
										<option value="6">$40000 - $50000 PA</option>
										<option value="7">$50000 - $100000 PA</option>
									</select>
								</div>
							</div>
							
							<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
								<button type="submit" class="btn btn-main full-width">Search Result</button>
							</div>
						
						</div>
					</div>
			
				</div>
			</div>
			
		</div>
			
	</div>
	
</div>
<!-- Hero Banner End -->

<!-- Our Partners Start -->
<section class="min">
	<div class="container">
		
		<div class="row justify-content-center mb-2">
			<div class="col-xl-4 col-lg-7 col-md-10 text-center">
				<div class="center mb-4">
					<h5 class="fw-medium lh-lg">Join over 2,000 companies around the world that trust the <span class="text-main">JobStock</span> platforms</h5>
				</div>
			</div>
		</div>
		
		<div class="row align-items-center justify-content-center row-cols-xl-5 row-cols-lg-5 row-cols-md-3 row-cols-3 gx-3 gy-3">

			<!-- includes/Home/index/companies.blade.php -->
			@include('includes.Home.index.companies')

		</div>
		
	</div>
</section>
<div class="clearfix"></div>
<!-- Our Partners End -->

<!-- Featured Jobs Start -->
<section class="pt-2">
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

<!-- Top Job Categories Start -->
<section class="gray-simple">
	<div class="container">
		
		<div class="row justify-content-center">
			<div class="col-xl-6 col-lg-7 col-md-10 text-center">
				<div class="sec-heading center">
					<h2>Explore Top Categories</h2>
					<p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores</p>
				</div>
			</div>
		</div>
		
		<div class="row justify-content-center gx-4 gy-4">
			
			<!-- includes/Home/index/categories.blade.php -->
			@include('includes.Home.index.categories')
			
		</div>
		
	</div>
</section>
<!-- Top Job Categories End -->

<!-- Top Features & Process Start -->
<section>
	<div class="container">
		
		<div class="row justify-content-center">
			<div class="col-xl-6 col-lg-7 col-md-10">
				<div class="sec-heading center">
					<h2>Features & Process</h2>
					<p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores</p>
				</div>
			</div>
		</div>
		
		<div class="row justify-content-center gx-xl-4 gx-lg-4">
		
			<!-- includes/Home/index/features.blade.php -->
			@include('includes.Home.index.features')
			
		</div>
		
	</div>
</section>
<!-- Top Features & Process End -->

<!-- includes/Home/index/video.blade.php -->
@include('includes.Home.index.video')

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

<!-- includes/Home/index/working.blade.php -->
@include('includes.Home.index.working')

<!-- includes/Home/index/log.blade.php -->
@include('includes.Home.index.log')

@include('includes.footer')
  
@endsection