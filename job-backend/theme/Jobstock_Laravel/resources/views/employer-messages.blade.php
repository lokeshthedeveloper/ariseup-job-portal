<!-- resources/views/employer-messages.blade.php -->
@extends('layouts.main')

@section('title', 'Employer-Messages Page')

@section('content')

@include('includes.navbar8')

<!-- dashboard Detail -->
<div class="dashboard-wrap bg-light">
	<a class="mobNavigation" data-bs-toggle="collapse" href="#MobNav" role="button" aria-expanded="false" aria-controls="MobNav">
		<i class="fas fa-bars mr-2"></i>Dashboard Navigation
	</a>
		<div class="collapse" id="MobNav">
		<div class="dashboard-nav">
			<div class="dash-user-blocks pt-5">
				<div class="jbs-grid-usrs-thumb">
					<div class="jbs-grid-yuo">
						<a href="{{ url('/candidate-detail') }}"><figure><img src="{{ asset('assets/img/l-12.png') }}" class="img-fluid circle" alt=""></figure></a>
					</div>
				</div>
				<div class="jbs-grid-usrs-caption mb-3">
					<div class="jbs-kioyer">
						<span class="label text-light bg-main">05 Openings</span>
					</div>
					<div class="jbs-tiosk">
						<h4 class="jbs-tiosk-title"><a href="{{ url('/candidate-detail') }}">Instagram App</a></h4>
						<div class="jbs-tiosk-subtitle"><span><i class="fa-solid fa-location-dot me-2"></i>Canada</span></div>
					</div>
				</div>
			</div>
			<div class="dashboard-inner">
				<ul data-submenu-title="Main Navigation">
					<li><a href="{{ url('/employer-dashboard') }}"><i class="fa-solid fa-gauge-high me-2"></i>User Dashboard</a></li>
					<li><a href="{{ url('/employer-profile') }}"><i class="fa-regular fa-user me-2"></i>User Profile </a></li>
					<li><a href="{{ url('/employer-jobs') }}"><i class="fa-solid fa-business-time me-2"></i>My Jobs</a></li>
					<li><a href="{{ url('/employer-submit-job') }}"><i class="fa-solid fa-pen-ruler me-2"></i>Submit Jobs</a></li>
					<li><a href="{{ url('/employer-applicants-jobs') }}"><i class="fa-solid fa-user-group me-2"></i>Applicants Jobs</a></li>
					<li><a href="{{ url('/employer-shortlist-candidates') }}"><i class="fa-solid fa-user-clock me-2"></i>Shortlisted Candidates</a></li>
					<li><a href="{{ url('/employer-package') }}"><i class="fa-solid fa-wallet me-2"></i>Package</a></li>
					<li class="active"><a href="{{ url('/employer-messages') }}"><i class="fa-solid fa-comments me-2"></i>Messages</a></li>
					<li><a href="{{ url('/employer-change-password') }}"><i class="fa-solid fa-unlock-keyhole me-2"></i>Change Password</a></li>
					<li><a href="{{ url('/employer-delete-account') }}"><i class="fa-solid fa-trash-can me-2"></i>Delete Account</a></li>
					<li><a href="{{ url('/') }}"><i class="fa-solid fa-power-off me-2"></i>Log Out</a></li>
				</ul>
			</div>					
		</div>
	</div>
	
	<div class="dashboard-content">
		<div class="dashboard-tlbar d-block mb-4">
			<div class="row">
				<div class="colxl-12 col-lg-12 col-md-12">
					<h1 class="mb-1 fs-3 fw-medium">Employer Messages</h1>
					<nav aria-label="breadcrumb">
						<ol class="breadcrumb">
							<li class="breadcrumb-item text-muted"><a href="#">Employer</a></li>
							<li class="breadcrumb-item text-muted"><a href="#">Dashboard</a></li>
							<li class="breadcrumb-item"><a href="#" class="text-main">Employer Messages</a></li>
						</ol>
					</nav>
				</div>
			</div>
		</div>
		
		<div class="dashboard-widg-bar d-block">
			
			<!-- Convershion -->
			<div class="messages-container margin-top-0">
				<div class="messages-headline">
					<h4>Connor Griffin</h4>
					<a href="#" class="message-action"><i class="ti-trash"></i> Delete Conversation</a>
				</div>

				<div class="messages-container-inner">

					<!-- Messages -->
					<div class="dash-msg-inbox">
						<ul>
								
							<!-- includes/For-Candidate/candidate-dashboard/messages.blade.php -->
							@include('includes.For-Candidate.candidate-dashboard.messages')

						</ul>
					</div>
					<!-- Messages / End -->

					<!-- Message Content -->
					<div class="dash-msg-content">

						<!-- includes/For-Candidate/candidate-dashboard/msg.blade.php -->
						@include('includes.For-Candidate.candidate-dashboard.msg')
						
						<!-- Reply Area -->
						<div class="clearfix"></div>
						<div class="message-reply">
							<textarea cols="40" rows="3" class="form-control with-light" placeholder="Your Message"></textarea>
							<button type="submit" class="btn btn-main">Send Message</button>
						</div>
						
					</div>
					<!-- Message Content -->

				</div>

			</div>

		</div>
		
		<!-- footer -->
		<div class="row">
			<div class="col-md-12">
				<div class="py-3 text-center">© <script>document.write(new Date().getFullYear())</script> JobStock. Develop with <i class="mdi mdi-heart text-danger"></i> by <a href="https://shreethemes.in" target="_blank" class="text-reset">Shreethemes</a>.</div>
			</div>
		</div>

	</div>				
	
</div>
<!-- dashboard Detail End -->

@endsection