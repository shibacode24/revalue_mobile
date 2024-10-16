<!doctype html>
<html lang="en">


<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--favicon-->
	<link rel="icon" href="{{asset('public/images/logo1.png')}}" type="image/png" />
	<!--plugins-->
	<link href="{{asset('public/plugins/simplebar/css/simplebar.css')}}" rel="stylesheet" />
	<link href="{{asset('public/plugins/perfect-scrollbar/css/perfect-scrollbar.css')}}" rel="stylesheet" />
	<link href="{{asset('public/plugins/metismenu/css/metisMenu.min.css')}}" rel="stylesheet" />
	<link href="{{asset('public/plugins/datatable/css/dataTables.bootstrap5.min.css')}}" rel="stylesheet" />
	<!-- loader-->
	<link href="{{asset('public/css/pace.min.css')}}" rel="stylesheet" />
	<script src="{{asset('public/js/pace.min.js')}}"></script>
	<!-- Bootstrap CSS -->
	<link href="{{asset('public/css/bootstrap.min.css')}}" rel="stylesheet">
	<link href="{{asset('public/css/bootstrap-extended.css')}}" rel="stylesheet">
	<link href="{{asset('public/css/app.css')}}" rel="stylesheet">
	<link href="{{asset('public/css/icons.css')}}" rel="stylesheet">
	<!-- Theme Style CSS -->
	<link rel="stylesheet" href="{{asset('public/css/dark-theme.css')}}" />
	<link rel="stylesheet" href="{{asset('public/css/semi-dark.css')}}" />
	<link rel="stylesheet" href="{{asset('public/css/header-colors.css')}}" />
	<title>REVALUE MOBILE</title>
</head>

<body>
	<!--wrapper-->
	<div class="wrapper">
		<!--sidebar wrapper -->
		<div class="sidebar-wrapper" data-simplebar="true">
			<div class="sidebar-header">
				<div>
					<img src="{{asset('public/images/logo1.png')}}" class="logo-icon" alt="logo icon">
				</div>
				<div>
					<h4 class="logo-text">REVALUE MOBILE</h4>
				</div>
				<div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i>
				</div>
			</div>
			<!--navigation-->
			<ul class="metismenu" id="menu">
				<li>
					<a href="{{route('dashboard')}}">
						<div class="parent-icon"><i class='bx bx-home-circle'></i>
						</div>
						<div class="menu-title">Dashboard</div>
					</a>
					
				</li>
				<li>
					<a href="#" class="has-arrow">
						<div class="parent-icon"><i class="bx bx-category"></i>
						</div>
						<div class="menu-title">Masters</div>
					</a>
					<ul>
						<li> <a href="{{route('city')}}"><i class="bx bx-right-arrow-alt"></i>City</a>
						</li>
						<li> <a href="{{route('slider')}}"><i class="bx bx-right-arrow-alt"></i>Slider</a>
						</li>
						<li> <a href="{{route('instant_services')}}"><i class="bx bx-right-arrow-alt"></i>Instant Services</a>
						</li>
						<li> <a href="{{route('mobile_types')}}"><i class="bx bx-right-arrow-alt"></i>Mobile Brand</a>
						</li>
						<li> <a href="{{route('mobile_series')}}"><i class="bx bx-right-arrow-alt"></i>Mobile Type</a>
						</li>
						<li> <a href="{{route('sold')}}"><i class="bx bx-right-arrow-alt"></i>Recently Sold </a>
						</li>
						<li> <a href="{{route('problem_category')}}"><i class="bx bx-right-arrow-alt"></i>Problem Type</a>
							
						</li>
						<!--<li> <a href="{{route('techvendor')}}"><i class="bx bx-right-arrow-alt"></i> Technician Vendor</a>
							
						</li>-->
					</ul>
				</li>
				<!-- <li>
					<a href="#" class="has-arrow">
						<div class="parent-icon"><i class="bx bx-category"></i>
						</div>
						<div class="menu-title">Sell Masters</div>
					</a>
					<ul>
						{{-- <li> <a href="{{route('mobile_series')}}"><i class="bx bx-right-arrow-alt"></i>Mobile Type</a>
						</li>
						 --}}
					</ul>
				</li> -->
				<li>
					<a href="{{route('notification')}}">
						<div class="parent-icon"><i class='bx bx-notification'></i>
						</div>
						<div class="menu-title">Notifications</div>
					</a>
					<li>
						<a href="{{route('technicine')}}">
							<div>
								<i class="bx bx-edit-alt"></i>
							</div>
							<div class="menu-title">Vendor Register</div>
						</a>
					</li>
				<li>
						<a href="{{route('vendor_slider')}}">
							<div>
								<i class="bx bx-edit-alt"></i>
							</div>
							<div class="menu-title">Vendor App Slider</div>
						</a>
					</li>
					<li>
						<a href="{{route('maintenance')}}">
							<div>
								<i class="bx bx-edit-alt"></i>
							</div>
							<div class="menu-title">Reason Maintenance</div>
						</a>
					</li>
				<li>
						<a href="{{route('stores.index')}}">
						<div class="parent-icon"><i class='bx bx-right-arrow-alt'></i></div>
						<div class="menu-title">Store</div>
					</a>	</li>
					
					<li>
						<a href="{{route('service-points.index')}}">
						<div class="parent-icon"><i class='bx bx-right-arrow-alt'></i></div>
						<div class="menu-title">Service Points</div>
					</a></li>
					<li> <a href="{{route('sales')}}"><i class="bx bx-right-arrow-alt"></i>Sale</a>
						</li>
						<li> <a href="{{route('complaint')}}"><i class="bx bx-right-arrow-alt"></i>Complaint</a>
						</li>
				<li> <a href="{{route('donate')}}"><i class="bx bx-right-arrow-alt"></i>Donate</a>
						</li>
					<li> <a href=""><i class="bx bx-right-arrow-alt"></i>User Roles</a>
						</li>
						<li> <a href=""><i class="bx bx-right-arrow-alt"></i>Report</a>
							
						</li>
				<li> <a href="{{route('database_backup')}}"><i class="bx bx-download"></i>Database Backup</a>
							
						</li>
				</li>
			</ul>
			<!--end navigation-->
		</div>
		<!--end sidebar wrapper -->
		<!--start header -->
		<header>
			<div class="topbar d-flex align-items-center">
				<nav class="navbar navbar-expand flex flex-between">
					<div class="mobile-toggle-menu"><i class='bx bx-menu'></i>
					</div>
					

					<div class="top-menu ms-auto">
						<ul class="navbar-nav align-items-center">

							<li class="nav-item dropdown dropdown-large">
									<div class="dropdown-menu dropdown-menu-end">

									<div class="header-notifications-list">

									</div>
									<a href="javascript:;">
										<div class="text-center msg-footer">View All Notifications</div>
									</a>
								</div>
							</li>

							<li class="nav-item dropdown dropdown-large">
								
								<div class="dropdown-menu dropdown-menu-end">
									<a href="javascript:;">
										<div class="msg-header">
											<p class="msg-header-title">Messages</p>
											<p class="msg-header-clear ms-auto">Marks all as read</p>
										</div>
									</a>
									<div class="header-message-list">

									</div>
									<a href="javascript:;">
										<div class="text-center msg-footer">View All Messages</div>
									</a>
								</div>
							</li>
						</ul>
					</div>

					<div class="user-box dropdown " align="right">
						<a align="right" class="d-flex align-items-center nav-link dropdown-toggle dropdown-toggle-nocaret" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
							<img src="{{asset('public/images/avatars/avatar-1.png')}}" class="user-img" alt="user avatar">
							<div class="user-info ps-3">
								<p class="designattion mb-0">Admin</p>
							</div>
						</a>
						<ul class="dropdown-menu dropdown-menu-end">
							<!-- <li><a class="dropdown-item" href="profile.html"><i class="bx bx-user"></i><span>Profile</span></a>
							</li>
							<li><a class="dropdown-item" href="javascript:;"><i class="bx bx-cog"></i><span>Settings</span></a>
							</li>
							<li><a class="dropdown-item" href="javascript:;"><i class='bx bx-home-circle'></i><span>Dashboard</span></a>
							</li>
							<li><a class="dropdown-item" href="javascript:;"><i class='bx bx-dollar-circle'></i><span>Earnings</span></a>
							</li>
							<li><a class="dropdown-item" href="javascript:;"><i class='bx bx-download'></i><span>Downloads</span></a>
							</li> -->
							<li>
								<div class="dropdown-divider mb-0"></div>
							</li>
							<li><a class="dropdown-item" href="{{route('logout')}}"><i class='bx bx-log-out-circle'></i><span>Logout</span></a>
							</li>
						</ul>
					</div>
				</nav>
			</div>
		</header>
		<!--end header -->
		<!--start page wrapper -->
@yield('content')
       	<!--start overlay-->
		<div class="overlay toggle-icon"></div>
		<!--end overlay-->
		<!--Start Back To Top Button--> <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
		<!--End Back To Top Button-->
		
	</div>
	<!--end wrapper-->
	<!--start switcher-->
	
	<!--end switcher-->
	<!-- Bootstrap JS -->
	<script src="{{asset('public/js/bootstrap.bundle.min.js')}}"></script>
	<!--plugins-->
	<script src="{{asset('public/js/jquery.min.js')}}"></script>
	<script src="{{asset('public/plugins/simplebar/js/simplebar.min.js')}}"></script>
	<script src="{{asset('public/plugins/metismenu/js/metisMenu.min.js')}}"></script>
	<script src="{{asset('public/plugins/perfect-scrollbar/js/perfect-scrollbar.js')}}"></script>
	<script src="{{asset('public/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
	<script src="{{asset('public/plugins/datatable/js/dataTables.bootstrap5.min.js')}}"></script>
	<script src="{{asset('public/js/table-datatable.js')}}"></script>
	<!--app JS-->
	<script src="{{asset('public/js/app.js')}}"></script>
	<script src="{{asset('webcamjs-master/webcam.min.js')}}"></script>
	<script src="{{asset('https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.js')}}"></script>
	@yield('js')
</body>


</html>