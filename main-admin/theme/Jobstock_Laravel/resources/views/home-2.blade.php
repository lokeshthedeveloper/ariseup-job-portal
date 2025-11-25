<!-- resources/views/home-2.blade.php -->
@extends('layouts.main')

@section('title', 'Home-2 Page')

@section('content')

@include('includes.navbar2')
			
<!-- Hero Banner Start -->
<div class="image-bg hero-header" style="background:#016551 url({{ asset('assets/img/simple-banner.jpg') }}) no-repeat;">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-9 col-md-11 col-sm-12 pt-5rem">
				<div class="inner-banner-text text-center">
					<div class="inner-banner-eclips mb-2"><span class="label p-2 px-4 rounded-5 fw-medium text-light bg-main">Get Your Hot Jobs</span></div>
					<h1>Find the great jobs<br>offer for you</h1>
					<p class="fs-5">Getting a new job is never easy. Check what new jobs we have in store for you on JobStock.</p>
				</div>
				<div class="search-from-clasic mt-5">
					<div class="hero-search-content">
						<div class="row">
						
							<div class="col-xl-10 col-lg-10 col-md-9 col-sm-12">
								<div class="classic-search-box">
									<div class="form-group full">
										<div class="input-with-icon">
											<input type="text" class="form-control" placeholder="Search for locality, landmark, project, or builder">
											<img src="{{ asset('assets/img/pin.svg') }}" width="20" alt="">
										</div>
									</div>
								</div>
							</div>
							
							<div class="col-xl-2 col-lg-2 col-md-3 col-sm-12">
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
</div>
<!-- Hero Banner End -->

<!-- Our Partners Start -->
<section class="bg-second min">
	<div class="container">
		
		<div class="row justify-content-center mb-2">
			<div class="col-lg-7 col-md-10 text-center">
				<div class="sec-heading center mb-4">
					<h5 class="text-light opacity-75 fw-medium">The fastedt-growing companies use JobStock</h5>
				</div>
			</div>
		</div>
		
		<div class="row align-items-center justify-content-center row-cols-xl-5 row-cols-lg-5 row-cols-md-3 row-cols-3 gx-3 gy-3">
			
			<!-- includes/Home/home-2/companies2.blade.php -->
			@include('includes.Home.home-2.companies2')

		</div>
		
	</div>
</section>
<div class="clearfix"></div>
<!-- Our Partners End -->

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
		
			<!-- includes/Home/home-2/jobs2.blade.php -->
			@include('includes.Home.home-2.jobs2')						
			
		</div>
		
	</div>
</section>
<!-- Featured Jobs End -->

<!-- Side Caption Start -->
<div class="position-relative">
	<div class="container">
		<div class="row justify-content-end align-items-md-center">
		
			<div class="d-none d-lg-block col-lg-6 position-absolute top-0 start-0 bg-cover h-100 rounded-end" style="background-image: url({{ asset('assets/img/banner-1.jpg') }});"></div>
			<div class="d-lg-none mb-5 mb-md-0">
				<img class="img-fluid rounded" src="{{ asset('assets/img/banner-1.jpg') }}" alt="Image Description">
			</div>

			<div class="col-lg-6 align-self-center">
				<div class="p-lg-5 p-md-0 pt-md-5">
					<!-- Heading -->
					<div class="mb-4 mb-sm-4">
						<span class="font--bold label-light-success px-3 py-2 rounded mb-2">Our Showcase</span>
						<h2 class="lh-base mt-2">Best Job Search platform<br>Experience for you</h2>
						<p class="fw-light fs-5">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
					</div>
					<!-- End Heading -->

					<div class="row mb-sm-4">
						<div class="col-sm-6 col-md-12 col-lg-6">
							<!-- List Checked -->
							<ul class="colored-list">
							<li>Corporate Business jobs</li>
							<li>Creative Services</li>
							<li>New Business Innovation</li>
							<li>Online E-commerce</li>
							<li>Residential Services</li>
							</ul>
							<!-- End List Checked -->
						</div>
						<!-- End Col -->

						<div class="col-sm-6 col-md-12 col-lg-6">
							<!-- List Checked -->
							<ul class="colored-list">
							<li>Company Showcase</li>
							<li>News & Updates</li>
							<li>Online Bookings</li>
							<li>and much more...</li>
							</ul>
							<!-- End List Checked -->
						</div>
						<!-- End Col -->
					</div>
					<!-- End Row -->
				
					<div class="row">
						<div class="col-sm-12 col-md-12 col-lg-6">
							<a class="btn btn-main fw-medium px-4" href="#">Get Started</a>
						</div>
					</div>
				</div>
			</div>
			<!-- End Col -->
			
		</div>
		<!-- End Row -->
	</div>
</div>
<!-- Side Caption End -->

<!-- Explore Categories City -->
<section>
	<div class="container">
	
		<div class="row justify-content-center">
			<div class="col-lg-8 col-md-10 text-center">
				<div class="sec-heading center">
					<h2>Explore Top Categories</h2>
					<p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores</p>
				</div>
			</div>
		</div>
	
		<div class="row justify-content-center gx-4 gy-4">
		
			<!-- includes/Home/home-2/categories2.blade.php -->
			@include('includes.Home.home-2.categories2')
		
		</div>
	
	</div>
</section>
<!-- Explore Categories City -->

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

<!-- Select Your City -->
<section>
	<div class="container">
	
		<div class="row justify-content-center">
			<div class="col-xl-6 col-lg-7 col-md-10 text-center">
				<div class="sec-heading center">
					<h2>Explore Job in NewYork</h2>
					<p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores</p>
				</div>
			</div>
		</div>
	
		<div class="row g-xl-3 g-lg-3 g-4">
		
			<!-- includes/Home/home-2/explore.blade.php -->
			@include('includes.Home.home-2.explore')
			
		</div>
		
	</div>		
</section>
<!-- Select Your City -->

<!-- Hire Experts Start -->
<section class="gray-simple">
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
		
			<!-- includes/Home/home-2/candidate.blade.php -->
			@include('includes.Home.home-2.candidate')
			
		</div>
		
	</div>		
</section>
<!-- Hire Experts End -->

<!-- Price Box -->
<section>
	<div class="container">
	
		<div class="row justify-content-center">
			<div class="col-xl-6 col-lg-7 col-md-10 text-center">
				<div class="sec-heading center">
					<h2>Choose your Package</h2>
					<p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores</p>
				</div>
			</div>
		</div>
		
		<div class="row gx-4 gy-4">

			<!-- includes/Home/home-2/package.blade.php -->
			@include('includes.Home.home-2.package')
						
		</div>
	</div>
</section>
<!-- Price Box -->
			
<!-- includes/Home/home-2/working2.blade.php -->
@include('includes.Home.home-2.working2')
			
<!-- includes/Home/index/log.blade.php -->
@include('includes.Home.index.log')		

@include('includes.footer3')

@endsection