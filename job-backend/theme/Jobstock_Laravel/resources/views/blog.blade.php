<!-- resources/views/blog.blade.php -->
@extends('layouts.main')

@section('title', 'Blog Page')

@section('content')

@include('includes.navbar2')

<!-- Page Title Start -->
<section class="bg-cover bg-second" style="background:url({{ asset('assets/img/bg2.png') }})no-repeat;">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12">
				
				<h2 class="ipt-title text-light">Our Latest Updates</h2>
				<span class="ipn-subtitle text-light opacity-75">Get all latest news and updates</span>
				
			</div>
		</div>
	</div>
</section>
<!-- Page Title End -->

<!-- Blog List Start -->
<section class="gray-simple">
	<div class="container">
	
		<!-- row Start -->
		<div class="row gx-4 gy-4">
		
			<!-- includes/Pages/blog2.blade.php -->
			@include('includes.Pages.blog2')
			
		</div>
		<!-- /row -->

		<!-- includes/For-Candidate/Browse-Jobs/grid-style-1/pagination.blade.php -->
		@include('includes.For-Candidate.Browse-Jobs.grid-style-1.pagination')			
		
	</div>	
</section>
<!-- Blog List End -->
			
<!-- includes/Home/home-4/find2.blade.php -->
@include('includes.Home.home-4.find2')
			
<!-- includes/Home/index/log.blade.php -->
@include('includes.Home.index.log')

@include('includes.footer2')

@endsection