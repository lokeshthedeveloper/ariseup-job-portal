<!-- resources/views/employer-detail.blade.php -->
@extends('layouts.main')

@section('title', 'Employer-Detail Page')

@section('content')

@include('includes.navbar2')
			
<!-- Header Information Start -->
<section class="gray-simple">
	<div class="container">
		<div class="row">
			<div class="col-xl-12 col-lg-12 col-md-12">
				<div class="emplr-head-block">
					
					<div class="emplr-head-left">
						<div class="emplr-head-thumb">
							<figure><img src="{{ !empty($item['img']) ? asset($item['img']) : asset('assets/img/l-1.png') }}" class="img-fluid rounded" alt=""></figure>
						</div>
						<div class="emplr-head-caption">
							<div class="emplr-head-caption-top">
								<div class="emplr-yior-1">
									<span class="label text-sm-muted text-success bg-light-success">
										@if(!empty($item['open']))
											{{ $item['open'] }}
										@else
											10 Openings
										@endif
									</span>
								</div>
								<div class="emplr-yior-2">
									<h4 class="emplr-title">
										@if(!empty($item['title']))
											{{ $item['title'] }}
										@else
											Tripadvisor Inc.
										@endif
									</h4>
								</div>
								<div class="emplr-yior-3">
									<span><i class="fa-solid fa-building-shield me-1"></i>
										@if(!empty($item['name']))
											{{ $item['name'] }}
										@else
											Software
										@endif
									</span>
									<span><i class="fa-solid fa-location-dot me-1"></i>
										@if(!empty($item['location']))
											{{ $item['location'] }}
										@else
											Canada, USA
										@endif
									</span>
									<span class="text-light opacity-75"><i class="fa-solid fa-star me-1"></i>4.2 (412 Reviews)</span>
								</div>
							</div>
						</div>
					</div>
					<div class="emplr-head-right">
						<button type="button" class="btn btn-main">Follow Now</button>
						<button type="button" class="btn btn-outline-main ms-2" data-bs-toggle="modal" data-bs-target="#review"><i class="fa-solid fa-star me-2"></i>Write Review</button>
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
						<div class="single-cdtsr-header"><h5>About Company</h5></div>
						<div class="single-cdtsr-body">
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.<p>
							<p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
						</div>
					</div>
					
					<div class="single-cdtsr-block">
						<div class="single-cdtsr-header"><h5>Our Award</h5></div>
						<div class="single-cdtsr-body">
							<div class="row gx-3 gy-4">
							
								<!-- includes/For-Employer/Employer-Detail/award.blade.php -->
								@include('includes.For-Employer.Employer-Detail.award')
							
							</div>
						</div>
					</div>
					
					<!-- includes/For-Employer/Employer-Detail/services.blade.php -->
					@include('includes.For-Employer.Employer-Detail.services')
					
					<!-- Company Review -->
					<div class="single-cdtsr-block">
						<div class="single-cdtsr-header"><h5>412 Reviews</h5></div>
						<div class="single-cdtsr-body">
							
							<!-- includes/For-Employer/Employer-Detail/reviews2.blade.php -->
							@include('includes.For-Employer.Employer-Detail.reviews2')
							
						</div>
						
						<div class="pagfooter mx-auto mb-3">
							
							<!-- includes/For-Employer/Employer-Detail/pagination2.blade.php -->
							@include('includes.For-Employer.Employer-Detail.pagination2')

						</div>
						
					</div>
				
				</div>
			</div>
			
			<div class="col-xl-4 col-lg-4 col-md-12">

				<div class="eflorio-wrap-block mb-4">
					<div class="eflorio-wrap-group">
						<div class="eflorio-wrap-body">
							<div class="eflorio-list-groups">
							
								<!-- includes/For-Employer/Employer-Detail/views.blade.php -->
								@include('includes.For-Employer.Employer-Detail.views')
							
							</div>
						</div>
						<div class="eflorio-wrap-footer">
							<div class="eflorio-footer-body">
								<button type="button" class="btn btn-main fw-medium full-width">View Website</button>
							</div>
						</div>
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

<!-- includes/For-Employer/Employer-Detail/modal.blade.php -->
@include('includes.For-Employer.Employer-Detail.modal')

@include('includes.footer2')

@endsection