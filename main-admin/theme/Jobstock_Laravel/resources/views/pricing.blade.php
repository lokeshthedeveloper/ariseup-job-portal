<!-- resources/views/pricing.blade.php -->
@extends('layouts.main')

@section('title', 'Pricing Page')

@section('content')

@include('includes.navbar2')

<!-- Page Title Start -->
<section class="bg-cover bg-second" style="background:url({{ asset('assets/img/bg2.png') }})no-repeat;">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12">
				
				<h2 class="ipt-title text-light">Pricing Page</h2>
				<span class="ipn-subtitle text-light opacity-75">Explore our Min Cost Packages</span>
				
			</div>
		</div>
	</div>
</section>
<!-- Page Title End -->

<!-- Price Box -->
<section>
	<div class="container">
	
		<div class="row justify-content-center">
			<div class="col-xl-6 col-lg-7 col-md-10 text-center">
				<div class="sec-heading center">
					<h2>Choose your Package</h2>
					<p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores</p>
				</div>
			</div>
		</div>
		
		<div class="row gx-4 gy-4">

			<!-- includes/Home/home-2/package.blade.php -->
			@include('includes.Home.home-2.package')
			
		</div>
	</div>
</section>
<!-- Price Box -->
			
<!-- includes/Home/home-4/find2.blade.php -->
@include('includes.Home.home-4.find2')

<!-- includes/Home/index/log.blade.php -->
@include('includes.Home.index.log')

@include('includes.footer2')

@endsection