<!-- resources/views/employer-shortlist-candidates.blade.php -->
@extends('layouts.main')

@section('title', 'Employer-Shortlist-Candidates Page')

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
					<li class="active"><a href="{{ url('/employer-shortlist-candidates') }}"><i class="fa-solid fa-user-clock me-2"></i>Shortlisted Candidates</a></li>
					<li><a href="{{ url('/employer-package') }}"><i class="fa-solid fa-wallet me-2"></i>Package</a></li>
					<li><a href="{{ url('/employer-messages') }}"><i class="fa-solid fa-comments me-2"></i>Messages</a></li>
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
					<h1 class="mb-1 fs-3 fw-medium">Shortlisted Candidates</h1>
					<nav aria-label="breadcrumb">
						<ol class="breadcrumb">
							<li class="breadcrumb-item text-muted"><a href="#">Employer</a></li>
							<li class="breadcrumb-item text-muted"><a href="#">Dashboard</a></li>
							<li class="breadcrumb-item"><a href="#" class="text-main">Shortlisted Candidates</a></li>
						</ol>
					</nav>
				</div>
			</div>
		</div>
		
		<div class="dashboard-widg-bar d-block">
			
			<!-- Header Wrap -->
			<div class="row">
				<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
					<div class="card">
						<div class="card-header">
							<div class="_mp-inner-content elior">
								<div class="_mp-inner-first">
									<div class="search-inline">
										<input type="text" class="form-control" placeholder="Job title, Keywords etc.">
										<button type="button" class="btn btn-main">Search</button>
									</div>
								</div>
								<div class="_mp_inner-last">
									<div class="item-shorting-box-right">
										<div class="shorting-by me-2 small">
											<select>
												<option value="0">Short by (Default)</option>
												<option value="1">Short by (Featured)</option>
												<option value="2">Short by (Urgent)</option>
												<option value="3">Short by (Post Date)</option>
											</select>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="card-body">
							<!-- Start All List -->
							<div class="row justify-content-start gx-3 gy-4">
						
								<!-- includes/For-Employer/employer-dashboard/list2.blade.php -->
								@include('includes.For-Employer.employer-dashboard.list2')
								
							</div>
							<!-- End All Job List -->
						</div>
					</div>
				</div>	
			</div>
			<!-- Header Wrap -->

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