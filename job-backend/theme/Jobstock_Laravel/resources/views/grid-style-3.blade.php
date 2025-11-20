<!-- resources/views/grid-style-3.blade.php -->
@extends('layouts.main')

@section('title', 'Grid-Style-3 Page')

@section('content')

@include('includes.navbar5')
			
<!-- Page Title Start -->
<div class="page-title bg-main" style="background:url({{ asset('assets/img/bg2.png') }}) no-repeat;">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12">
				
				<h2 class="ipt-title">Grid Style Job 03</h2>
				<div class="breadcrumbs light">
					<nav aria-label="breadcrumb">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="JavaScript:Void(0);">Home</a></li>
							<li class="breadcrumb-item"><a href="JavaScript:Void(0);">Candidate</a></li>
							<li class="breadcrumb-item active" aria-current="page">Job Grid 03</li>
						</ol>
					</nav>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Page Title End -->

<!-- All List Wrap -->
<section class="gray-simple">

	<div class="container">
		
		<div class="row">
		
			<!-- Search Sidebar -->
			<div class="col-xxl-3 col-xl-4 col-lg-4 col-md-12 col-sm-12">
				
				<div class="bg-white rounded mb-3">							
				
					<!-- includes/For-Candidate/Browse-Jobs/grid-style-1/search.blade.php -->
					@include('includes.For-Candidate.Browse-Jobs.grid-style-1.search')
					
					<!-- includes/For-Candidate/Browse-Jobs/grid-style-1/property.blade.php -->
					@include('includes.For-Candidate.Browse-Jobs.grid-style-1.property')
					
				</div>
				
				<!-- includes/For-Candidate/Browse-Jobs/grid-style-1/alert.blade.php -->
				@include('includes.For-Candidate.Browse-Jobs.grid-style-1.alert')
				
			</div>
			<!-- Sidebar End -->
			
			<div class="col-xxl-9 col-xl-8 col-lg-8 col-md-12 col-sm-12">
			
				<div class="row justify-content-center mb-4">
					<div class="col-lg-12 col-md-12">
							
						<!-- includes/For-Candidate/Browse-Jobs/grid-style-1/results.blade.php -->
						@include('includes.For-Candidate.Browse-Jobs.grid-style-1.results')

					</div>
				</div>
				
				<!-- Start All List -->
				<div class="row justify-content-center gx-xl-3 gx-3 gy-4">
		
					<!-- includes/For-Candidate/Browse-Jobs/grid-style-3/jobs7.blade.php -->
					@include('includes.For-Candidate.Browse-Jobs.grid-style-3.jobs7')
					
				</div>
				
				<!-- includes/For-Candidate/Browse-Jobs/grid-style-1/pagination.blade.php -->
				@include('includes.For-Candidate.Browse-Jobs.grid-style-1.pagination')

			</div>
			
		</div>
	</div>		
</section>
<!-- All List Wrap -->
			
<!-- includes/Home/home-4/find2.blade.php -->
@include('includes.Home.home-4.find2')
			
<!-- includes/Home/index/log.blade.php -->
@include('includes.Home.index.log')
	
@include('includes.footer2')

@endsection