<!-- resources/views/candidate-detail.blade.php -->
@extends('layouts.main')

@section('title', 'Candidate-Detail Page')

@section('content')

@include('includes.navbar2')
			
<!-- Header Information Start -->
<section class="gray-simple">
	<div class="container">
		<div class="row">
			<div class="col-xl-12 col-lg-12 col-md-12">
				<div class="cndt-head-block">
					
					<div class="cndt-head-left">
						<div class="cndt-head-thumb">
							<figure><img src="{{ !empty($item['img']) ? asset($item['img']) : asset('assets/img/avatar.jpg') }}" class="img-fluid circle" alt=""></figure>
						</div>
						<div class="cndt-head-caption">
							<div class="cndt-head-caption-top">
								<div class="cndt-yior-1"><span class="label text-sm-muted text-success bg-success bg-opacity-05">Featured</span></div>
								<div class="cndt-yior-2">
									<h4 class="cndt-title">
										@if(!empty($item['title']))
											{{ $item['title'] }}
										@else
											Calvin English
										@endif
									</h4>
								</div>
								<div class="cndt-yior-3">
									<span><i class="fa-solid fa-user-graduate me-1"></i>
										@if(!empty($item['subtitle']))
											{{ $item['subtitle'] }}
										@else
											Developer
										@endif
									</span>
									<span><i class="fa-solid fa-location-dot me-1"></i>Canada, USA</span>
									<span><i class="fa-solid fa-sack-dollar me-1"></i>$2500/PA</span>
									<span><i class="fa-solid fa-cake-candles me-1"></i>07 Apr 1992</span>
								</div>
							</div>
							<div class="cndt-head-caption-bottom">
								<div class="cndt-yior-skills">
									<span>Design</span>
									<span>Python</span>
									<span>Java</span>
									<span>PHP</span>
									<span>WordPress</span>
								</div>
							</div>
						</div>
					</div>
					<div class="cndt-head-right">
						<button type="button" class="btn btn-main">Download CV<i class="fa-solid fa-download ms-2"></i></button>
						<button type="button" class="btn btn-outline-main ms-2"><i class="fa-solid fa-bookmark"></i></button>
					</div>
				
				</div>
			</div>
		</div>
	</div>
</section>
<!-- Header Information End -->

<!-- Full Candidate Details Start -->
<section>
	<div class="container">
		<!-- row Start -->
		<div class="row">

			<div class="col-xl-8 col-lg-8 col-md-12">
				<div class="cdtsr-groups-block">
					
					<div class="single-cdtsr-block">
						<div class="single-cdtsr-header"><h5>About Candidate</h5></div>
						<div class="single-cdtsr-body">
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.<p>
							<p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
						</div>
					</div>
					
					<div class="single-cdtsr-block">
						<div class="single-cdtsr-header"><h5>All Information</h5></div>
						<div class="single-cdtsr-body">
							<div class="row align-items-center justify-content-between gy-4">
								
								<!-- includes/For-Candidate/Candidate-Detail/information.blade.php -->
								@include('includes.For-Candidate.Candidate-Detail.information')
								
							</div>
						</div>
					</div>
					
					<!-- includes/For-Candidate/Candidate-Detail/resumes.blade.php -->
					@include('includes.For-Candidate.Candidate-Detail.resumes')
				
				</div>
			</div>
			
			<div class="col-xl-4 col-lg-4 col-md-12">
				<div class="sidefr-usr-block mb-4">
					<div class="sidefr-usr-header">
						<h4 class="sidefr-usr-title">Contact Calvin English</h4>
					</div>
					<div class="sidefr-usr-body">
						<form>
							<div class="form-group">
								<input type="text" class="form-control" placeholder="Your Name">
							</div>
							<div class="form-group">
								<input type="email" class="form-control" placeholder="Email Address">
							</div>
							<div class="form-group">
								<input type="text" class="form-control" placeholder="Phone.">
							</div>
							<div class="form-group">
								<input type="text" class="form-control" placeholder="Subject">
							</div>
							<div class="form-group">
								<textarea class="form-control" placeholder="Your Message"></textarea>
							</div>
							<div class="form-group m-0">
								<button type="button" class="btn btn-main fw-medium full-width">Send Message</button>
							</div>
						</form>
					</div>
				</div>
				
				<div class="sidefr-usr-block">
					<div class="cndts-share-block">
						<div class="cndts-share-title">
							<h5>Share Profile</h5>
						</div>
						<div class="cndts-share-list">
							<ul>
								<li><a href="JavaScript:Void(0);"><i class="fa-brands fa-facebook-f"></i></a></li>
								<li><a href="JavaScript:Void(0);"><i class="fa-brands fa-twitter"></i></a></li>
								<li><a href="JavaScript:Void(0);"><i class="fa-brands fa-google-plus-g"></i></a></li>
								<li><a href="JavaScript:Void(0);"><i class="fa-brands fa-instagram"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
				
			</div>
			
		</div>
		<!-- /row -->					
	</div>	
</section>
<!-- Full Candidate Details End -->						
			
<!-- includes/Home/home-4/find2.blade.php -->
@include('includes.Home.home-4.find2')
			
<!-- includes/Home/index/log.blade.php -->
@include('includes.Home.index.log')

@include('includes.footer2')

@endsection