<!-- resources/views/advance-search.blade.php -->
@extends('layouts.main')

@section('title', 'Advance-Search Page')

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
				<div class="col-xl-12 col-lg-12 col-md-12 pt-5rem">
				
					<div class="_mp-inner-content elior">
						<div class="_mp-inner-first">
							<div class="search-inline">
								<input type="text" class="form-control" placeholder="Job Title, Keyword etc.">
								<button type="button" class="btn btn-main">Search</button>
							</div>
						</div>
						<div class="_mp_inner-last">
							<a class="filter-pop-link gray-simple rounded py-3 px-4" href="JavaScript:Void(0);" data-bs-toggle="modal" data-bs-target="#filter"><i class="fa fa-sliders-h mr-2"></i>Filter</a>
						</div>
					</div>
					
					<div class="types-job-matches mb-4">
						<ul class="nav nav-pills nav-fill gap-3 p-2 whites gray-simple rounded-2 light-nav" id="pillNav2" role="tablist">
							<li class="nav-item">
								<button class="nav-link active rounded-2" id="bestmatches-tab" data-bs-toggle="pill" data-bs-target="#bestmatches" type="button" role="tab" aria-controls="bestmatches" aria-selected="true">Best Matches</button>
							</li>
							<li class="nav-item">
								<button class="nav-link rounded-2" id="featured-tab" data-bs-toggle="pill" data-bs-target="#featured" type="button" role="tab" aria-controls="featured" aria-selected="false">Featured</button>
							</li>
							<li class="nav-item">
								<button class="nav-link rounded-2" id="mostrecent-tab" data-bs-toggle="pill" data-bs-target="#mostrecent" type="button" role="tab" aria-controls="mostrecent" aria-selected="false">Most Recent</button>
							</li>
						</ul>
					</div>
					
				</div>
				
			</div>
			
		</div>
		
		<!--- All List -->
		<div class="map-content-list">
			<div class="tab-content" id="pills-tabContent">
				<!-- Best Matches -->
				<div class="tab-pane fade show active" id="bestmatches" role="tabpanel" aria-labelledby="bestmatches-tab" tabindex="0">
					<div class="row justify-content-start gx-3 gy-4 overflow-hidden">
			
						<!-- includes/For-Candidate/advance-search/jobs16.blade.php -->
						@include('includes.For-Candidate.advance-search.jobs16')
						
					</div>
					
					<!-- includes/For-Candidate/Browse-Jobs/grid-style-1/pagination.blade.php -->
					@include('includes.For-Candidate.Browse-Jobs.grid-style-1.pagination')
			
				</div>
				
				<!-- Featured Matches -->
				<div class="tab-pane fade" id="featured" role="tabpanel" aria-labelledby="featured-tab" tabindex="0">
					<div class="row justify-content-start gx-3 gy-4 overflow-hidden">
						
						<!-- includes/For-Candidate/advance-search/jobs17.blade.php -->
						@include('includes.For-Candidate.advance-search.jobs17')
						
					</div>
					
					<!-- includes/For-Candidate/Browse-Jobs/grid-style-1/pagination.blade.php -->
					@include('includes.For-Candidate.Browse-Jobs.grid-style-1.pagination')
					
				</div>
				
				<!-- Most Recent Matches -->
				<div class="tab-pane fade" id="mostrecent" role="tabpanel" aria-labelledby="mostrecent-tab" tabindex="0">
					<div class="row justify-content-start gx-3 gy-4 overflow-hidden">
						
						<!-- includes/For-Candidate/advance-search/jobs18.blade.php -->
						@include('includes.For-Candidate.advance-search.jobs18')
						
					</div>
					
					<!-- includes/For-Candidate/Browse-Jobs/grid-style-1/pagination.blade.php -->
					@include('includes.For-Candidate.Browse-Jobs.grid-style-1.pagination')

				</div>
			</div>
				
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