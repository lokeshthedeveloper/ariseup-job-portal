<!-- resources/views/home-4.blade.php -->
@extends('layouts.main')

@section('title', 'Home-4 Page')

@section('content')

@include('includes.navbar2')
			
<!-- Hero Banner Start -->
<div class="hero-header bg-light-main">
	<div class="container">
		<div class="row gx-xl-3 gx-lg-2 align-items-center">
			<div class="col-xl-6 col-lg-7 col-md-12 col-sm-12">
				<h3 class="m-0 px-1 py-2 text-success">Great Job Here</h3>
				<h1 class="mb-4">Discover & Find Your<br>Dream Companies</h1>
				<div class="search-from-clasic mt-5 mb-5">
					<div class="hero-search-content b-all search-shadow-color">
						<div class="row">
						
							<div class="col-xl-9 col-lg-10 col-md-9 col-sm-12">
								<div class="classic-search-box">
									<div class="form-group full">
										<div class="input-with-icon">
											<input type="text" class="form-control" placeholder="Skills, Designations, Keyword">
											<img src="{{ asset('assets/img/pin.svg') }}" width="20" alt="">
										</div>
									</div>
								</div>
							</div>
							
							<div class="col-xl-3 col-lg-2 col-md-3 col-sm-12">
								<div class="form-group">
									<a href="#" class="btn btn-main full-width fw-medium">Find Job</a>
								</div>
							</div>
									
						</div>
					</div>
				</div>
				
				<div class="vesm-rsv-box-wrap">
					<div class="vesm-rsv-box-head">
						<div class="vesm-rsv-txt"><span>14k reviews on</span></div>
						<div class="vesm-rsv-star">
							<i class="fa-solid fa-star"></i>
							<i class="fa-solid fa-star"></i>
							<i class="fa-solid fa-star"></i>
							<i class="fa-solid fa-star"></i>
							<i class="fa-solid fa-star"></i>
						</div>
					</div>
					<div class="vesm-rsv-box-caption">
						<div class="vesm-rsv-elcox">
							<div class="vesm-rsv-elcox-01"><span class="vshm-arrows"><i class="fa-solid fa-share"></i></span><h5 class="reviews-ctr">4.9</h5></div>
						</div>
						<div class="vesm-rsv-elcox-02">
							<ul>
								<li><figure><img src="{{ asset('assets/img/user-3.png') }}" class="img-fluid" alt=""></figure></li>
								<li><figure><img src="{{ asset('assets/img/user-7.png') }}" class="img-fluid" alt=""></figure></li>
								<li><figure><img src="{{ asset('assets/img/user-5.png') }}" class="img-fluid" alt=""></figure></li>
								<li><figure><img src="{{ asset('assets/img/user-6.png') }}" class="img-fluid" alt=""></figure></li>
								<li><div class="img-coun">12k</div></li>
							</ul>
						</div>
					</div>
				
				</div>
			</div>
			<div class="col-xl-6 col-lg-5 col-md-12 col-sm-12">
				<div class="hero-side-thumb">
					<figure>
						<img src="{{ asset('assets/img/side-banner.png') }}" class="img-fluid" alt="">
					</figure>
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

<!-- Top Companies Start -->
<section class="pt-2">
	<div class="container">
		
		<div class="row justify-content-center">
			<div class="col-xl-6 col-lg-7 col-md-10 text-center">
				<div class="sec-heading center">
					<h2>Broswe Top Companies</h2>
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
<!-- Top Companies End -->

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
		
		<div class="row align-items-center gx-4 gy-4">
			
			<!-- includes/Home/index/categories.blade.php -->
			@include('includes.Home.index.categories')
			
		</div>
		
	</div>
</section>
<!-- Top Job Categories End -->

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
		
			<!-- includes/Home/home-4/jobs4.blade.php -->
			@include('includes.Home.home-4.jobs4')			
			
		</div>
		
	</div>
</section>
<!-- Featured Jobs End -->

<!-- Side Caption Start -->
<div class="position-relative">
	<div class="container">
		
		<!-- includes/Home/home-4/popular.blade.php -->
		@include('includes.Home.home-4.popular')

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

<!-- includes/Home/home-4/find2.blade.php -->
@include('includes.Home.home-4.find2')				
			
<!-- includes/Home/index/log.blade.php -->
@include('includes.Home.index.log')

@include('includes.footer2')

@endsection