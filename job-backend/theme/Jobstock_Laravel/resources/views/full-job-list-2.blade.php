<!-- resources/views/full-job-list-2.blade.php -->
@extends('layouts.main')

@section('title', 'Full-Job-List-2 Page')

@section('content')

@include('includes.navbar2')

<!-- Page Title Start -->
<div class="page-title bg-second" style="background:url({{ asset('assets/img/bg2.png') }}) no-repeat;">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12">
				
				<div class="full-search-2">
					<div class="hero-search-content search-shadow">
						
						<!-- includes/For-Candidate/Browse-Jobs/full-job-grid-1/full-search.blade.php -->
						@include('includes.For-Candidate.Browse-Jobs.full-job-grid-1.full-search')
					
					</div>
				</div>
		
			</div>
		</div>
	</div>
</div>
<!-- Page Title End -->

<!-- All List Wrap -->
<section>
	<div class="container">
		<div class="row">
		
			<!-- Search Sidebar -->
			<div class="col-lg-3 col-md-12 col-sm-12">
				<div class="side-widget-blocks">							
				
					<!-- includes/For-Candidate/Browse-Jobs/grid-style-1/search.blade.php -->
					@include('includes.For-Candidate.Browse-Jobs.grid-style-1.search')
												
					<!-- includes/For-Candidate/Browse-Jobs/list-style-1/property2.blade.php -->
					@include('includes.For-Candidate.Browse-Jobs.list-style-1.property2')

				</div>							
			</div>
			<!-- Sidebar End -->
			
			<!-- Job List Wrap -->
			<div class="col-lg-9 col-md-12 col-sm-12">
				<!-- Job Alert Box -->
				<div class="row justify-content-center">
				
					<!-- includes/For-Candidate/Browse-Jobs/list-style-1/alert2.blade.php -->
					@include('includes.For-Candidate.Browse-Jobs.list-style-1.alert2')
					
				</div>
				<!-- Job Alert Box End -->
				
				<!-- Shorting Box -->
				<div class="row justify-content-center mb-4">
					<div class="col-lg-12 col-md-12">
							
						<!-- includes/For-Candidate/Browse-Jobs/grid-style-1/results.blade.php -->
						@include('includes.For-Candidate.Browse-Jobs.grid-style-1.results')

					</div>
				</div>
				<!-- Shorting Wrap End -->
				
				<!-- Start All List -->
				<div class="row justify-content-start gx-3 gy-4">
			
					<!-- includes/For-Candidate/Browse-Jobs/list-style-2/jobs13.blade.php -->
					@include('includes.For-Candidate.Browse-Jobs.list-style-2.jobs13')
					
				</div>
				<!-- End All Job List -->
				
				<!-- includes/For-Candidate/Browse-Jobs/grid-style-1/pagination.blade.php -->
				@include('includes.For-Candidate.Browse-Jobs.grid-style-1.pagination')
				
			</div>
			<!-- Job List Wrap End-->
			
		</div>
	</div>		
</section>
<!-- All List Wrap -->
			
<!-- includes/Home/home-4/find2.blade.php -->
@include('includes.Home.home-4.find2')
		
<!-- includes/Home/index/log.blade.php -->
@include('includes.Home.index.log')
	
<!-- includes/Home/home-3/filter.blade.php -->
@include('includes.Home.home-3.filter')
	
@include('includes.footer2')

@endsection