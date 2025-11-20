<!-- resources/views/help.blade.php -->
@extends('layouts.main')

@section('title', 'Help Page')

@section('content')

@include('includes.navbar2')

<!-- Page Title Start -->
<section class="bg-cover bg-second" style="background:url({{ asset('assets/img/bg2.png') }})no-repeat;">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12">
				
				<h2 class="ipt-title text-light">Help & Component</h2>
				<span class="ipn-subtitle text-light opacity-75">Check all elements and components</span>
				
			</div>
		</div>
	</div>
</section>
<!-- Page Title End -->

<!-- All Components Start -->
<section>
	<div class="container">
	
		<!-- row Start -->
		<div class="row mb-5">
			
			<div class="col-xl-6 col-lg-6 col-md-12 col-12">
				<div class="elements-wrap">
					<h3>Headings</h3>
					
					<!-- includes/help/headings.blade.php -->
					@include('includes.help.headings')

				</div>
			</div>
			
			<div class="col-xl-6 col-lg-6 col-md-12 col-12">
				<div class="elements-wrap">
					<h3>Buttons</h3>
					<div class="d-flex flex-wrap gap-2">
						
						<!-- includes/help/buttons.blade.php -->
						@include('includes.help.buttons')

					</div>
				</div>
			</div>
			
		</div>
		<!-- /row -->
		
		<!-- row Start -->
		<div class="row mb-5">
			
			<div class="col-xl-6 col-lg-6 col-md-12 col-12">
				<div class="elements-wrap">
					<h3>Alerts</h3>
					
					<!-- includes/help/alerts.blade.php -->
					@include('includes.help.alerts')

				</div>
			</div>
			
			<div class="col-xl-6 col-lg-6 col-md-12 col-12">
				<div class="elements-wrap">
					<h3>Alert Links</h3>
					
					<!-- includes/help/links.blade.php -->
					@include('includes.help.links')

				</div>
			</div>
			
		</div>
		<!-- /row -->
		
		<!-- row Start -->
		<div class="row mb-5">
			
			<div class="col-xl-6 col-lg-6 col-md-12 col-12">
				<div class="elements-wrap">
					<h3>Badges</h3>
					<div class="d-flex flex-wrap gap-2 mb-4">
						
						<!-- includes/help/badges.blade.php -->
						@include('includes.help.badges')

					</div>
					
					<h3>Avatar</h3>
					<div class="d-flex align-items-center flex-wrap gap-3 mb-4">
						
						<!-- includes/help/avatar.blade.php -->
						@include('includes.help.avatar')

					</div>
					
					<h3>Pagination</h3>
					<div class="pagination-wrap">
						<nav aria-label="...">
							<ul class="pagination">
							<li class="page-item"><a href="#" class="page-link">Previous</a></li>
							<li class="page-item"><a class="page-link" href="#" style="margin-left: 1rem;">1</a></li>
							<li class="page-item active">
								<a class="page-link" href="#" aria-current="page">2</a>
							</li>
							<li class="page-item"><a class="page-link" href="#">3</a></li>
							<li class="page-item"><a class="page-link" href="#">4</a></li>
							<li class="page-item"><a class="page-link" href="#">5</a></li>
							<li class="page-item"><a class="page-link" href="#">Next</a></li>
							</ul>
						</nav>
					</div>
				</div>
			</div>
			
			<div class="col-xl-6 col-lg-6 col-md-12 col-12">
				<div class="elements-wrap">
					<h3>Form Elements</h3>
					
					<!-- includes/help/form.blade.php -->
					@include('includes.help.form')

				</div>
			</div>
			
		</div>
		<!-- /row -->
		
		<!-- row Start -->
		<div class="row mb-5">
			
			<div class="col-xl-6 col-lg-6 col-md-12 col-12">
				<div class="elements-wrap">
					<h3>Accordion</h3>
					<div class="accordion" id="accordionExample">
						
						<!-- includes/help/accordion.blade.php -->
						@include('includes.help.accordion')

					</div>
				</div>
			</div>
			
			<div class="col-xl-6 col-lg-6 col-md-12 col-12">
				<div class="elements-wrap">
					<h3>Navs and tabs</h3>
					
					<!-- includes/help/tabs.blade.php -->
					@include('includes.help.tabs')

				</div>
			</div>
			
		</div>
		<!-- /row -->
		
	</div>	
</section>
<!-- All Components End -->
			
<!-- includes/Home/home-4/find2.blade.php -->
@include('includes.Home.home-4.find2')
		
<!-- includes/Home/index/log.blade.php -->
@include('includes.Home.index.log')

@include('includes.footer2')

@endsection