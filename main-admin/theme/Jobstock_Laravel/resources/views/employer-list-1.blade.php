<!-- resources/views/employer-list-1.blade.php -->
@extends('layouts.main')

@section('title', 'Employer-List-1 Page')

@section('content')

@include('includes.navbar2')

<!-- Page Title Start -->
<div class="page-title bg-second" style="background:url({{ asset('assets/img/bg2.png') }}) no-repeat;">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12 pt-5rem">
				
				<h2 class="ipt-title">Employer List Style 01</h2>
				<div class="breadcrumbs light">
					<nav aria-label="breadcrumb">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="JavaScript:Void(0);">Home</a></li>
							<li class="breadcrumb-item"><a href="JavaScript:Void(0);">Employer</a></li>
							<li class="breadcrumb-item active" aria-current="page">Employer List 01</li>
						</ol>
					</nav>
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
			<div class="col-xxl-3 col-xl-4 col-lg-4 col-md-12 col-sm-12">
				<div class="side-widget-blocks">							
				
					<div class="sidebar_header d-flex align-items-center justify-content-between px-4 py-3 br-bottom">
						<h4 class="fs-bold fs-lg mb-0">Search Filter</h4>
						<div class="ssh-header">
							<a href="javascript:void(0);" class="clear_all ft-medium text-muted">Clear All</a>
							<a href="#search_open" data-bs-toggle="collapse" aria-expanded="false" role="button" class="collapsed _filter-ico ml-2"><i class="fa-solid fa-filter"></i></a>
						</div>
					</div>
													
					<!-- includes/For-Candidate/Browse-Jobs/list-style-1/property2.blade.php -->
					@include('includes.For-Candidate.Browse-Jobs.list-style-1.property2')

				</div>							
			</div>
			<!-- Sidebar End -->
			
			<!-- Job List Wrap -->
			<div class="col-xxl-9 col-xl-8 col-lg-8 col-md-12 col-sm-12">
				
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
			
					<!-- includes/For-Candidate/candidate-dashboard/employer2.blade.php -->
					@include('includes.For-Candidate.candidate-dashboard.employer2')
					
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

@include('includes.footer2')

@endsection