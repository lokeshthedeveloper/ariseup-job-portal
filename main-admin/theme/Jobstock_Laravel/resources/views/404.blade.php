<!-- resources/views/404.blade.php -->
@extends('layouts.main')

@section('title', '404 Page')

@section('content')

@include('includes.navbar2')

<!-- Page Title Start -->
<section class="bg-cover bg-second" style="background:url({{ asset('assets/img/bg2.png') }})no-repeat;">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12">
				
				<h2 class="ipt-title text-light">Error Page</h2>
				<span class="ipn-subtitle text-light opacity-75">No Any Result Found!</span>
				
			</div>
		</div>
	</div>
</section>
<!-- Page Title End -->

<!-- User Dashboard -->
<section class="error-wrap">
	<div class="container">
		<div class="row justify-content-center">
			
			<div class="col-lg-6 col-md-10">
				<div class="text-center">
					
					<img src="{{ asset('assets/img/404.png') }}" class="img-fluid" alt="">
					<p class="fs-6">Maecenas quis consequat libero, a feugiat eros. Nunc ut lacinia tortor morbi ultricies laoreet ullamcorper phasellus semper</p>
					<a class="btn btn-main px-5" href="{{ url('/') }}">Back To Home</a>
					
				</div>
			</div>
			
		</div>
	</div>
</section>
<!-- User Dashboard End -->
			
<!-- includes/Home/home-2/working2.blade.php -->
@include('includes.Home.home-2.working2')

<!-- includes/Home/index/log.blade.php -->
@include('includes.Home.index.log')

@include('includes.footer3')

@endsection