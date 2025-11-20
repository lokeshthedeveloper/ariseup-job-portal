<!-- resources/views/contact.blade.php -->
@extends('layouts.main')

@section('title', 'Contact Page')

@section('content')

@include('includes.navbar2')

<!-- Page Title Start -->
<section class="bg-cover bg-second" style="background:url({{ asset('assets/img/bg2.png') }})no-repeat;">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12">
				
				<h2 class="ipt-title text-light">Get In touch</h2>
				<span class="text-light opacity-75">Get all latest news and updates</span>
				
			</div>
		</div>
	</div>
</section>
<!-- Page Title End -->

<!-- Contact Start -->
<section>

	<div class="container">
	
		<div class="row justify-content-center">
			<div class="col-lg-7 col-md-10 text-center">
				<div class="sec-heading center">
					<label class="label text-success bg-light-success">Grow Your Business</label>
					<h2>Activate Next Now</h2>
					<p>Please fill the form and we will guide you to the best solution. Our experts will get in touch soon.</p>
				</div>
			</div>
		</div>
	
		<!-- row Start -->
		<div class="row align-items-center justify-content-center">
		
			<div class="col-lg-10 col-md-12">
				
				<form class="mt-4" action="{{ route('contact.send') }}" method="post" name="myForm">
					@csrf
					<p class="mb-0" id="error-msg"></p>
					<div id="simple-msg"></div>
					<div class="row">
						<div class="col-lg-6 col-md-6">
							<div class="form-group">
								<label>Name</label>
								<input name="name" id="name" type="text" class="form-control simple" placeholder="Name :">
							</div>
						</div>
						<div class="col-lg-6 col-md-6">
							<div class="form-group">
								<label>Email</label>
								<input name="email" id="email" type="email" class="form-control simple" placeholder="Email :">
							</div>
						</div>
						<div class="col-lg-6 col-md-6">
							<div class="form-group">
								<label>Subject</label>
								<input name="subject" id="subject" type="text" class="form-control simple" placeholder="Subject :">
							</div>
						</div>
						<div class="col-lg-6 col-md-6">
							<div class="form-group">
								<label>Phone.</label>
								<input name="number" id="number" type="text" class="form-control simple" placeholder="Number :">
							</div>
						</div>
						<div class="col-lg-12 col-md-12">
							<div class="form-group">
								<label>Message</label>
								<textarea name="Message" id="Message" class="form-control simple" placeholder="Message :"></textarea>
							</div>
						</div>
						<div class="col-lg-12 col-md-12">
							<div class="form-group">
								<button type="submit" id="submit" name="send" class="btn btn-main px-5">Submit Request</button>
							</div>
						</div>
					</div>			
				</form>	
			</div>		
			
		</div>
		<!-- /row -->

		<!-- row Start -->
		<div class="row align-items-center justify-content-center">
			<div class="col-lg-10 col-md-12">
				
				<div class="ctr-jobstock-box">
					
					<!-- includes/Pages/contacts.blade.php -->
					@include('includes.Pages.contacts')
					
				</div>
								
			</div>
		</div>
		<!-- /row -->					
		
	</div>
			
</section>
<!-- Contact End -->
			
<!-- includes/Home/home-4/find2.blade.php -->
@include('includes.Home.home-4.find2')
			
<!-- includes/Home/index/log.blade.php -->
@include('includes.Home.index.log')

@include('includes.footer2')

@endsection