<!-- resources/views/half-map-2.blade.php -->
@extends('layouts.main')

@section('title', 'Half-Map-2 Page')

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
					
					<!-- includes/For-Candidate/Browse-Map-Jobs/half-map/results2.blade.php -->
					@include('includes.For-Candidate.Browse-Map-Jobs.half-map.results2')
					
				</div>
				
			</div>
			
		</div>
		
		<!--- All List -->
		<div class="map-content-list">
			<!-- Start All List -->
			<div class="row justify-content-center gx-xl-3 gx-3 gy-4">
	
				<!-- includes/For-Candidate/Browse-Jobs/grid-style-2/jobs6.blade.php -->
				@include('includes.For-Candidate.Browse-Jobs.grid-style-2.jobs6')
				
			</div>
			
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