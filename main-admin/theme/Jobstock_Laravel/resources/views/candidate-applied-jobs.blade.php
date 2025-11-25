<!-- resources/views/candidate-applied-jobs.blade.php -->
@extends('layouts.main')

@section('title', 'Candidate-Applied-Jobs Page')

@section('content')

@include('includes.navbar7')

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
						<a href="{{ url('/candidate-detail') }}"><figure><img src="{{ asset('assets/img/user-5.png') }}" class="img-fluid circle" alt=""></figure></a>
					</div>
				</div>
				<div class="jbs-grid-usrs-caption mb-3">
					<div class="jbs-kioyer">
						<div class="jbs-kioyer-groups">
							<span class="fa-solid fa-star active"></span>
							<span class="fa-solid fa-star active"></span>
							<span class="fa-solid fa-star active"></span>
							<span class="fa-solid fa-star active"></span>
							<span class="fa-solid fa-star"></span>
							<span class="aal-reveis">4.7</span>
						</div>
					</div>
					<div class="jbs-tiosk">
						<h4 class="jbs-tiosk-title"><a href="{{ url('/candidate-detail') }}">Linda D. Strong</a></h4>
						<div class="jbs-tiosk-subtitle"><span>Front-End Developer</span></div>
					</div>
				</div>
			</div>
			<div class="dashboard-inner">
				<ul data-submenu-title="Main Navigation">
					<li><a href="{{ url('/candidate-dashboard') }}"><i class="fa-solid fa-gauge-high me-2"></i>User Dashboard</a></li>
					<li><a href="{{ url('/candidate-profile') }}"><i class="fa-regular fa-user me-2"></i>My Profile </a></li>
					<li><a href="{{ url('/candidate-resume') }}"><i class="fa-solid fa-file-pdf me-2"></i>My Resumes</a></li>
					<li class="active"><a href="{{ url('/candidate-applied-jobs') }}"><i class="fa-regular fa-paper-plane me-2"></i>Applied jobs</a></li>
					<li><a href="{{ url('/candidate-alert-job') }}"><i class="fa-solid fa-bell me-2"></i>Alert Jobs<span class="count-tag bg-warning">4</span></a></li>
					<li><a href="{{ url('/candidate-saved-jobs') }}"><i class="fa-solid fa-bookmark me-2"></i>Shortlist Jobs</a></li>
					<li><a href="{{ url('/candidate-follow-employers') }}"><i class="fa-solid fa-user-clock me-2"></i>Following Employers</a></li>
					<li><a href="{{ url('/candidate-messages') }}"><i class="fa-solid fa-comments me-2"></i>Messages<span class="count-tag">4</span></a></li>
					<li><a href="{{ url('/candidate-change-password') }}"><i class="fa-solid fa-unlock-keyhole me-2"></i>Change Password</a></li>
					<li><a href="{{ url('/candidate-delete-account') }}"><i class="fa-solid fa-trash-can me-2"></i>Delete Account</a></li>
					<li><a href="{{ url('/') }}"><i class="fa-solid fa-power-off me-2"></i>Log Out</a></li>
				</ul>
			</div>					
		</div>
	</div>
	
	<div class="dashboard-content">
		<div class="dashboard-tlbar d-block mb-4">
			<div class="row">
				<div class="colxl-12 col-lg-12 col-md-12">
					<h1 class="mb-1 fs-3 fw-medium">Applied Jobs</h1>
					<nav aria-label="breadcrumb">
						<ol class="breadcrumb">
							<li class="breadcrumb-item text-muted"><a href="#">Candidate</a></li>
							<li class="breadcrumb-item text-muted"><a href="#">Dashboard</a></li>
							<li class="breadcrumb-item"><a href="#" class="text-main">Applied Jobs</a></li>
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
						
								<!-- includes/For-Candidate/candidate-dashboard/jobs19.blade.php -->
								@include('includes.For-Candidate.candidate-dashboard.jobs19')
								
							</div>
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

<!-- includes/For-Candidate/candidate-dashboard/files.blade.php -->
@include('includes.For-Candidate.candidate-dashboard.files')

@endsection