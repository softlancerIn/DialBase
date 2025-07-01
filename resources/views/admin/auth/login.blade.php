<!DOCTYPE html>
<html lang="en">

	
<!-- Mirrored from shreethemes.net/goodup-live-2/goodup/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 21 Feb 2025 18:57:03 GMT -->
<head>
	   <!-- Meta Data -->
	   <meta charset="UTF-8">
	   <meta http-equiv="X-UA-Compatible" content="IE=edge">
	   <meta name="viewport" content="width=device-width, initial-scale=1">
	   <title>Goodup - Business Directory & Listing HTML Template</title>

	   <!-- Favicon -->
	   <link rel="shortcut icon" type="image/x-icon" href="{{asset('admin/assets/img/favicon.png')}}')}}">
		 
        <!-- Custom CSS -->
        <link href="{{asset('admin/assets/css/styles.css')}}" rel="stylesheet">
		
    </head>
	
    <body>
	
		 <!-- ============================================================== -->
        <!-- Preloader - style you can find in spinners.css -->
        <!-- ============================================================== -->
       <div class="preloader"></div>
		
        <!-- ============================================================== -->
        <!-- Main wrapper - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <div id="main-wrapper">
		
            <!-- ============================================================== -->
            <!-- Top header  -->
            <!-- ============================================================== -->
            <!-- Start Navigation -->
			<div class="header header-light head-shadow dark-text">
				<div class="container">
					<nav id="navigation" class="navigation navigation-landscape">
						<div class="nav-header">
							<a class="nav-brand" href="{{route('index')}}">
								<img src="{{asset('admin/assets/img/logo.png')}}" class="logo" alt="" />
							</a>
							<div class="nav-toggle"></div>
							<div class="mobile_nav">
								<ul>
								<li>
									<a href="#" data-bs-toggle="modal" data-bs-target="#login" class="theme-cl fs-lg">
										<i class="lni lni-user"></i>
									</a>
								</li>
								<li>
									<a href="add-listing.html" class="crs_yuo12 w-auto text-white theme-bg">
										<span class="embos_45"><i class="fas fa-plus me-2"></i>Add Listing</span>
									</a>
								</li>
								</ul>
							</div>
						</div>
					</nav>
				</div>
			</div>
			<!-- End Navigation -->
			<div class="clearfix"></div>
			<!-- ============================================================== -->
			<!-- Top header  -->
			<!-- ============================================================== -->
			
			<!-- ======================= Login Detail ======================== -->
			<section class="gray">
				<div class="container">
					<div class="row align-items-start justify-content-center">
						<div class="col-xl-5 col-lg-8 col-md-12">
							
							<div class="signup-screen-wrap">
								<div class="signup-screen-single">
									<div class="text-center mb-4">
										<h4 class="m-0 ft-medium">Login Your Account</h4>
									</div>
									
									<form action="{{route('logincheck')}}" class="submit-form" method="post">
                                        @csrf		
										<div class="form-group">
											<label class="mb-1">User Name</label>
											<input type="text" name="email" class="form-control rounded" placeholder="Username*">
										</div>
										
										<div class="form-group">
											<label class="mb-1">Password</label>
											<input type="password" name="password" class="form-control rounded" placeholder="Password*">
										</div>
										
										<div class="form-group">
											<div class="d-flex align-items-center justify-content-between">
												<div class="flex-1">
													<input id="dd" class="checkbox-custom" name="dd" type="checkbox" checked>
													<label for="dd" class="checkbox-custom-label">Remember Me</label>
												</div>	
												<div class="eltio_k2">
													<a href="#" class="theme-cl">Lost Your Password?</a>
												</div>	
											</div>
										</div>
										
										<div class="form-group">
											<button type="submit" class="btn btn-md full-width theme-bg text-light rounded ft-medium">Sign In</button>
										</div>										
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!-- ======================= Login End ======================== -->
		</div>
		<!-- ============================================================== -->
		<!-- End Wrapper -->
		<!-- ============================================================== -->

		<!-- ============================================================== -->
		<!-- All Jquery -->
		<!-- ============================================================== -->
		<script src="{{asset('admin/assets/js/jquery.min.js')}}"></script>
		<script src="{{asset('admin/assets/js/popper.min.js')}}"></script>
		<script src="{{asset('admin/assets/js/bootstrap.min.js')}}"></script>
		<script src="{{asset('admin/assets/js/slick.js')}}"></script>
		<script src="{{asset('admin/assets/js/jquery.magnific-popup.min.js')}}"></script>
		<script src="{{asset('admin/assets/js/dropzone.js')}}"></script>
		<script src="{{asset('admin/assets/js/counterup.js')}}"></script>
		<script src="{{asset('admin/assets/js/lightbox.js')}}"></script>
		<script src="{{asset('admin/assets/js/moment.min.js')}}"></script>
		<script src="{{asset('admin/assets/js/daterangepicker.js')}}"></script>
		<script src="{{asset('admin/assets/js/lightbox.js')}}"></script>		
		<script src="{{asset('admin/assets/js/jQuery.style.switcher.js')}}"></script>
		<script src="{{asset('admin/assets/js/custom.js')}}"></script>
		<!-- ============================================================== -->
		<!-- This page plugins -->
		<!-- ============================================================== -->		

	</body>

<!-- Mirrored from shreethemes.net/goodup-live-2/goodup/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 21 Feb 2025 18:57:03 GMT -->
</html>