<!-- resources/views/home-6.blade.php -->
@extends('layouts.main')

@section('title', 'Home-6 Page')

@section('content')

@include('includes.navbar2')
			
<!-- Hero Banner Start -->
<div class="image-cover hero-header" style="background:#016551 url({{ asset('assets/img/slider-2.jpg') }}) no-repeat;">
	<div class="container">
		<div class="row">
			<div class="col-xl-7 col-lg-9 col-md-12">
				<div class="simple-search-wrap mb-5">
					<div class="hero-search-2">
						<h2 class="text-xl text-main">Find</h2>
						<h1 class="mb-4">Great Job Opportunity<br>You Deserve</h1>
						<div class="search-from-clasic mt-5">
							<div class="hero-search-content">
								<div class="row">
								
									<div class="col-xl-9 col-lg-9 col-md-8 col-sm-12 pe-xl-0 pe-lg-0 pe-md-0">
										<div class="classic-search-box">
											<div class="form-group full">
												<div class="input-with-icon">
													<input type="text" class="form-control" placeholder="Skills, Designations, Keyword">
													<img src="{{ asset('assets/img/pin.svg') }}" width="20" alt="">
												</div>
											</div>
											<div class="form-group">
												<a href="JavaScript:Void(0);" data-bs-toggle="modal" data-bs-target="#filter" class="btn btn-filter-search"><i class="fa-solid fa-filter"></i>Filter</a>
											</div>
										</div>
									</div>
									
									<div class="col-xl-3 col-lg-3 col-md-4 col-sm-12">
										<div class="form-group">
											<button type="submit" class="btn btn-main full-width">Search Job</button>
										</div>
									</div>
											
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
		</div>
	</div>
</div>
<!-- Hero Banner End -->

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

<!-- Hire Box End -->
<section class="p-0">
	<div class="container-fluid px-0">
		<div class="row gx-0">
		
			<div class="col-xl-6 col-lg-6 col-md-12 bg-dark">
				<div class="hired-box-slack">
					<div class="hired-box-caption">
						<h2 class="text-light lh-base">Hire talents & experts for your web development</h2>
						<p class="text-light fw-light opacity-75">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo</p>
					</div>
					<div class="hired-box-btns">
						<a href="#" class="btn btn-lg btn-main fw-medium px-5">Hire Talents</a>
					</div>
				</div>
			</div>
			
			<div class="col-xl-6 col-lg-6 col-md-12 bg-main">
				<div class="hired-box-slack">
					<div class="hired-box-caption">
						<h2 class="text-light lh-base">We Are Expert In Web design and development</h2>
						<p class="text-light fw-light opacity-75">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo</p>
					</div>
					<div class="hired-box-btns">
						<a href="#" class="btn btn-lg btn-dark fw-medium px-5">Join Our Team</a>
					</div>
				</div>
			</div>
			
		</div>
	</div>
</section>
<!-- Hire Box End -->

<!-- Why Choose Us Start -->
<section class="pb-4">
	<div class="container">
		
		<!-- includes/Home/home-6/popular2.blade.php -->
		@include('includes.Home.home-6.popular2')
		
	</div>
</section>
<div class="clearfix"></div>
<!-- Why Choose Us End -->

<!-- Why Choose Us Start -->
<section class="pt-0">
	<div class="container">
		
		<!-- includes/Home/home-6/showcase.blade.php -->
		@include('includes.Home.home-6.showcase')
		
	</div>
</section>
<div class="clearfix"></div>
<!-- Why Choose Us End -->

<!-- includes/Home/index/video.blade.php -->
@include('includes.Home.index.video')			

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
			
<!-- includes/Home/home-6/cv.blade.php -->
@include('includes.Home.home-6.cv')
				
<!-- includes/Home/index/log.blade.php -->
@include('includes.Home.index.log')
				
<!-- includes/Home/home-3/filter.blade.php -->
@include('includes.Home.home-3.filter')			
	
@include('includes.footer3')			

@endsection