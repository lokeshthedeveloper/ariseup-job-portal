<!-- resources/views/employer-half-map.blade.php -->
@extends('layouts.main')

@section('title', 'Employer-Half-Map Page')

@section('content')

@include('includes.navbar6')

<!-- Hero Banner Start -->
<div class="map-banner-wrap half-map">
	
	<div class="map-left-box">
		<div class="map-home flt-wrap">
			<div class="home-map-container fw-map">
				<div id="map-main"></div>
			</div>
		</div>
	</div>
	
	<div class="map-content-wrap">
		<div class="map-content-bxo">
		
			<div class="row">
				<div class="col-xl-12 col-lg-12 col-md-12">
				
					<!-- includes/For-Candidate/Browse-Map-Jobs/half-map/search2.blade.php -->
					@include('includes.For-Candidate.Browse-Map-Jobs.half-map.search2')
					
					<div class="_mp-inner-content elior">
						<div class="item-shorting clearfix">
							<div class="left-column"><h4 class="m-0">Showing 1 - 10 of 20 Results</h4></div>
						</div>
						<div class="item-shorting-box-right">
							<div class="shorting-by me-2 small">
								<select>
									<option value="0">Short by (Default)</option>
									<option value="1">Short by (Featured)</option>
									<option value="2">Short by (Urgent)</option>
									<option value="3">Short by (Post Date)</option>
								</select>
							</div>
							<div class="shorting-by small">
								<select>
									<option value="0">10 Per Page</option>
									<option value="1">20 Per Page</option>
									<option value="2">50 Per Page</option>
									<option value="3">10 Per Page</option>
								</select>
							</div>
						</div>
					</div>
					
				</div>
				
			</div>
			
		</div>
		
		<!--- All List -->
		<div class="map-content-list">
			<!-- Start All List -->
			<div class="row justify-content-start gx-3 gy-4">
		
				<!-- includes/For-Employer/Explore-Employers/employer3.blade.php -->
				@include('includes.For-Employer.Explore-Employers.employer3')
				
			</div>
			<!-- End All Job List -->
			
			<!-- includes/For-Candidate/Browse-Jobs/grid-style-1/pagination.blade.php -->
			@include('includes.For-Candidate.Browse-Jobs.grid-style-1.pagination')
				
		</div>
	</div>
	
</div>
<div class="clearfix"></div>
<!-- Hero Banner End -->

<!-- includes/Home/index/log.blade.php -->
@include('includes.Home.index.log')
			
<!-- includes/Home/home-3/filter.blade.php -->
@include('includes.Home.home-3.filter')
	
@endsection