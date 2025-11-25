<!-- resources/views/slider-home.blade.php -->
@extends('layouts.main')

@section('title', 'Slider-Home Page')

@section('content')

@include('includes.top-header')

@include('includes.navbar2')

<!-- Hero Banner Start -->
<div class="slider-home">
	<div class="slider-banner">
		
		<!-- includes/other/slider.blade.php -->
		@include('includes.other.slider')
		
	</div>
</div>
<!-- Hero Banner End -->

<!-- Search Block Start -->
<section class="py-0">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-xxl-9 col-xl-10 col-lg-12 col-md-12">
				<div class="card rounded-4 shadow-sm w-100 px-4 px-xl-5 py-5 ovr-top">
					
					<form class="slider-search-form mb-4">
						<div class="inner-form-block rounded-pill border p-2">
							<div class="d-flex align-items-center justify-content-between gap-2 w-100">
								<div class="form-group flex-fill m-0">
									<div class="input-with-icon">
										<input type="text" class="form-control fs-6 bg-transparent" id="trendingSearch" placeholder="Skills, Designations, Keyword">
										<i class="bi bi-search text-main fs-5"></i>
									</div>
								</div>
								<div class="submit-block"><button type="submit" class="square--60 btn-main border-0 fs-5 circle"><i class="bi bi-search"></i></button></div>
							</div>
						</div>
					</form>
					
					<div id="tagContainer">
						<ul class="p-0 m-0 d-flex align-items-center justify-content-center gap-2 flex-wrap">
							<li><span class="badge badge-md badge-maintag rounded-pill" onclick="fillInput('Web Designer')">Web Designer</span></li>
							<li><span class="badge badge-md badge-maintag rounded-pill" onclick="fillInput('Front-end Developer')">Front-end Developer</span></li>
							<li><span class="badge badge-md badge-maintag rounded-pill" onclick="fillInput('Figma Developer')">Figma Developer</span></li>
							<li><span class="badge badge-md badge-maintag rounded-pill" onclick="fillInput('UI/UX Designer')">UI/UX Designer</span></li>
						</ul>
					</div>

				</div>
			</div>
		</div>
	</div>
</section>
<!-- Search Block End -->

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

			<!-- includes/Home/home-8/categories3.blade.php -->
			@include('includes.Home.home-8.categories3')
		
		</div>
		
	</div>
</section>
<!-- Top Job Categories End -->

<!-- Trending Jobs Start -->
<section>
	<div class="container">
		
		<div class="row justify-content-center">
			<div class="col-xl-6 col-lg-7 col-md-10 text-center">
				<div class="sec-heading center">
					<h2>Trending jobs Jobs</h2>
					<p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores</p>
				</div>
			</div>
		</div>
		
		<!-- Start All List -->
		<div class="row justify-content-center gx-3 gy-4 mb-5">
	
			<!-- includes/other/trending.blade.php -->
			@include('includes.other.trending')
			
		</div>
		<!-- End All Job List -->
		
		<!-- More button -->
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12">
				<div class="d-flex align-items-center justify-content-center">
					<a href="#" class="btn btn-dark px-5 rounded-pill">Explore More Jobs</a>
				</div>
			</div>
		</div>
		
	</div>
</section>
<div class="clearfix"></div>
<!-- Trending Jobs End -->

<!-- includes/Home/index/video.blade.php -->
@include('includes.Home.index.video')			

<!-- Good Reviews By Customers -->
<section class="gray">
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

<!-- Our Price End -->
<section>
	<div class="container">
	
		<div class="row justify-content-center">
			<div class="col-lg-7 col-md-10 text-center">
				<div class="sec-heading center">
					<h2>Explore our Prices</h2>
					<p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores</p>
				</div>
			</div>
		</div>
		
		<div class="row justify-content-center gx-4 gy-4">
			
			<!-- includes/Home/home-9/prices.blade.php -->
			@include('includes.Home.home-9.prices')
			
		</div>
		
	</div>	
</section>
<!-- Our Price End -->
			
<!-- includes/Home/home-11/working4.blade.php -->
@include('includes.Home.home-11.working4')
			
<!-- includes/Home/index/log.blade.php -->
@include('includes.Home.index.log')
			
@include('includes.footer3')

@endsection