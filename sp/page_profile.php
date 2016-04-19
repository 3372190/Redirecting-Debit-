<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<head>
	<title>Profile Page | Redirect Debit</title>
    
    	<!-- JS Global Compulsory -->
	<script type="text/javascript" src="assets/plugins/jquery/jquery.min.js"></script>
	<script type="text/javascript" src="assets/plugins/jquery/jquery-migrate.min.js"></script>
	<script type="text/javascript" src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    
    
    <!-- Firebase -->
    <script type="text/javascript" src="inc/firebase/firebase.js"></script>
    <script type="text/javascript" src="inc/firebase/userHandler.js"></script>
    <script type="text/javascript">
    if(!isUserLoggedIn()){
        window.location = "page_login.php"
    }
    </script>

	<!-- Meta -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">

	<!-- Favicon -->
	<link rel="shortcut icon" href="favicon.ico">

	<!-- Web Fonts -->
	<link rel='stylesheet' type='text/css' href='//fonts.googleapis.com/css?family=Open+Sans:400,300,600&amp;subset=cyrillic,latin'>

	<!-- CSS Global Compulsory -->
	<link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/style.css">

	<!-- CSS Header and Footer -->
	<link rel="stylesheet" href="assets/css/headers/header-default.css">
	<link rel="stylesheet" href="assets/css/footers/footer-v1.css">

	<!-- CSS Implementing Plugins -->
	<link rel="stylesheet" href="assets/plugins/animate.css">
	<link rel="stylesheet" href="assets/plugins/line-icons/line-icons.css">
	<link rel="stylesheet" href="assets/plugins/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="assets/plugins/scrollbar/css/jquery.mCustomScrollbar.css">
	<link rel="stylesheet" href="assets/plugins/sky-forms-pro/skyforms/css/sky-forms.css">
	<link rel="stylesheet" href="assets/plugins/sky-forms-pro/skyforms/custom/custom-sky-forms.css">

	<!-- CSS Page Style -->
	<link rel="stylesheet" href="assets/css/pages/profile.css">

	<!-- CSS Theme -->
	<link rel="stylesheet" href="assets/css/theme-colors/default.css" id="style_color">
	<link rel="stylesheet" href="assets/css/theme-skins/dark.css">

	<!-- CSS Customization -->
	<link rel="stylesheet" href="assets/css/custom.css">
</head>

<body>
	<div class="wrapper">
		<!--=== Header ===-->
        
        		<!--=== Header ===-->
		<?php include 'inc/header.php'?>
		<!--=== End Header ===-->

		<!--=== Profile ===-->
		<div class="container content profile">
			<div class="row">
                
                <?php include 'inc/profile_sidebar.php'?>


				<!-- Profile Content -->
				<div class="col-md-9">
					<div class="profile-body">
						<!--Service Block v3-->
						<div class="row margin-bottom-10">
							<div class="col-sm-6 sm-margin-bottom-20">
								<div class="service-block-v3 service-block-u">
									<i class="icon-users"></i>
									<span class="service-heading">Number Of Services</span>
									<span class="counter">12</span>

									<div class="clearfix margin-bottom-10"></div>

									<div class="row margin-bottom-20">
										<div class="col-xs-6 service-in">
											<small>Last Week</small>
											<h4 class="counter">1,385</h4>
										</div>
										<div class="col-xs-6 text-right service-in">
											<small>Last Month</small>
											<h4 class="counter">6,048</h4>
										</div>
									</div>
									<div class="statistics">
										<h3 class="heading-xs">Statistics in Progress Bar <span class="pull-right">67%</span></h3>
										<div class="progress progress-u progress-xxs">
											<div style="width: 67%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="67" role="progressbar" class="progress-bar progress-bar-light">
											</div>
										</div>
										<small>11% less <strong>than last month</strong></small>
									</div>
								</div>
							</div>

						</div><!--/end row-->
						<!--End Service Block v3-->

						<hr>

												<!-- Begin Table Search v2 -->
						<div class="table-search-v2">
							<div class="table-responsive">
								<table class="table table-bordered table-striped">
									<thead>
										<tr>
											<th>User Image</th>
											<th class="hidden-sm">About</th>
											<th>Status</th>
											<th>Contacts</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>
												<img class="rounded-x" src="assets/img/testimonials/img1.jpg" alt="">
											</td>
											<td class="td-width">
												<h3><a href="#">Sed nec elit arcu</a></h3>
												<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed id commodo lacus. Fusce non malesuada ante. Donec vel arcu.</p>
												<small class="hex">Joined February 28, 2014</small>
											</td>
											<td>
												<span class="label label-success">Success</span>
											</td>
											<td>
												<ul class="list-inline s-icons">
													<li>
														<a data-placement="top" data-toggle="tooltip" class="tooltips" data-original-title="Facebook" href="#">
															<i class="fa fa-facebook"></i>
														</a>
													</li>
													<li>
														<a data-placement="top" data-toggle="tooltip" class="tooltips" data-original-title="Twitter" href="#">
															<i class="fa fa-twitter"></i>
														</a>
													</li>
													<li>
														<a data-placement="top" data-toggle="tooltip" class="tooltips" data-original-title="Dropbox" href="#">
															<i class="fa fa-dropbox"></i>
														</a>
													</li>
													<li>
														<a data-placement="top" data-toggle="tooltip" class="tooltips" data-original-title="Linkedin" href="#">
															<i class="fa fa-linkedin"></i>
														</a>
													</li>
												</ul>
												<span><a href="#">info@example.com</a></span>
												<span><a href="#">www.htmlstream.com</a></span>
											</td>
										</tr>
										<tr>
											<td>
												<img class="rounded-x" src="assets/img/testimonials/img2.jpg" alt="">
											</td>
											<td>
												<h3><a href="#">Donec at aliquam est, a mattis mauris</a></h3>
												<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed id commodo lacus. Fusce non malesuada ante. Donec vel arcu.</p>
												<small class="hex">Joined March 2, 2014</small>
											</td>
											<td>
												<span class="label label-info"> Pending</span>
											</td>
											<td>
												<ul class="list-inline s-icons">
													<li>
														<a data-placement="top" data-toggle="tooltip" class="tooltips" data-original-title="Facebook" href="#">
															<i class="fa fa-facebook"></i>
														</a>
													</li>
													<li>
														<a data-placement="top" data-toggle="tooltip" class="tooltips" data-original-title="Twitter" href="#">
															<i class="fa fa-twitter"></i>
														</a>
													</li>
													<li>
														<a data-placement="top" data-toggle="tooltip" class="tooltips" data-original-title="Dropbox" href="#">
															<i class="fa fa-dropbox"></i>
														</a>
													</li>
													<li>
														<a data-placement="top" data-toggle="tooltip" class="tooltips" data-original-title="Linkedin" href="#">
															<i class="fa fa-linkedin"></i>
														</a>
													</li>
												</ul>
												<span><a href="#">info@example.com</a></span>
												<span><a href="#">www.htmlstream.com</a></span>
											</td>
										</tr>
										<tr>
											<td>
												<img class="rounded-x" src="assets/img/testimonials/img3.jpg" alt="">
											</td>
											<td>
												<h3><a href="#">Pellentesque semper tempus vehicula</a></h3>
												<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed id commodo lacus. Fusce non malesuada ante. Donec vel arcu.</p>
												<small class="hex">Joined March 3, 2014</small>
											</td>
											<td>
												<span class="label label-warning">Expiring</span>
											</td>
											<td>
												<ul class="list-inline s-icons">
													<li>
														<a data-placement="top" data-toggle="tooltip" class="tooltips" data-original-title="Facebook" href="#">
															<i class="fa fa-facebook"></i>
														</a>
													</li>
													<li>
														<a data-placement="top" data-toggle="tooltip" class="tooltips" data-original-title="Twitter" href="#">
															<i class="fa fa-twitter"></i>
														</a>
													</li>
													<li>
														<a data-placement="top" data-toggle="tooltip" class="tooltips" data-original-title="Dropbox" href="#">
															<i class="fa fa-dropbox"></i>
														</a>
													</li>
													<li>
														<a data-placement="top" data-toggle="tooltip" class="tooltips" data-original-title="Linkedin" href="#">
															<i class="fa fa-linkedin"></i>
														</a>
													</li>
												</ul>
												<span><a href="#">info@example.com</a></span>
												<span><a href="#">www.htmlstream.com</a></span>
											</td>
										</tr>
										<tr>
											<td>
												<img class="rounded-x" src="assets/img/testimonials/img4.jpg" alt="">
											</td>
											<td>
												<h3><a href="#">Alesuada fames ac turpis egestas</a></h3>
												<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed id commodo lacus. Fusce non malesuada ante. Donec vel arcu.</p>
												<small class="hex">Joined March 4, 2014</small>
											</td>
											<td>
												<span class="label label-danger">Error!</span>
											</td>
											<td>
												<ul class="list-inline s-icons">
													<li>
														<a data-placement="top" data-toggle="tooltip" class="tooltips" data-original-title="Facebook" href="#">
															<i class="fa fa-facebook"></i>
														</a>
													</li>
													<li>
														<a data-placement="top" data-toggle="tooltip" class="tooltips" data-original-title="Twitter" href="#">
															<i class="fa fa-twitter"></i>
														</a>
													</li>
													<li>
														<a data-placement="top" data-toggle="tooltip" class="tooltips" data-original-title="Dropbox" href="#">
															<i class="fa fa-dropbox"></i>
														</a>
													</li>
													<li>
														<a data-placement="top" data-toggle="tooltip" class="tooltips" data-original-title="Linkedin" href="#">
															<i class="fa fa-linkedin"></i>
														</a>
													</li>
												</ul>
												<span><a href="#">info@example.com</a></span>
												<span><a href="#">www.htmlstream.com</a></span>
											</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
						<!-- End Table Search v2 -->

						<hr>

						<!--Profile Blog-->
						<div class="panel panel-profile">
							<div class="panel-heading overflow-h">
								<h2 class="panel-title heading-sm pull-left"><i class="fa fa-tasks"></i>Contacts</h2>
								<a href="page_profile_users.html" class="btn-u btn-brd btn-brd-hover btn-u-dark btn-u-xs pull-right">View All</a>
							</div>
							<div class="panel-body">
								<div class="row">
									<div class="col-sm-6">
										<div class="profile-blog blog-border">
											<img class="rounded-x" src="assets/img/testimonials/img1.jpg" alt="">
											<div class="name-location">
												<strong>Mikel Andrews</strong>
												<span><i class="fa fa-map-marker"></i><a href="#">California,</a> <a href="#">US</a></span>
											</div>
											<div class="clearfix margin-bottom-20"></div>
											<p>Donec non dignissim eros. Mauris faucibus turpis volutpat sagittis rhoncus. Pellentesque et rhoncus sapien, sed ullamcorper justo.</p>
											<hr>
											<ul class="list-inline share-list">
												<li><i class="fa fa-bell"></i><a href="#">12 Notifications</a></li>
												<li><i class="fa fa-group"></i><a href="#">54 Followers</a></li>
												<li><i class="fa fa-twitter"></i><a href="#">Retweet</a></li>
											</ul>
										</div>
									</div>

									<div class="col-sm-6">
										<div class="profile-blog blog-border">
											<img class="rounded-x" src="assets/img/testimonials/img4.jpg" alt="">
											<div class="name-location">
												<strong>Natasha Kolnikova</strong>
												<span><i class="fa fa-map-marker"></i><a href="#">Moscow,</a> <a href="#">Russia</a></span>
											</div>
											<div class="clearfix margin-bottom-20"></div>
											<p>Donec non dignissim eros. Mauris faucibus turpis volutpat sagittis rhoncus. Pellentesque et rhoncus sapien, sed ullamcorper justo.</p>
											<hr>
											<ul class="list-inline share-list">
												<li><i class="fa fa-bell"></i><a href="#">37 Notifications</a></li>
												<li><i class="fa fa-group"></i><a href="#">46 Followers</a></li>
												<li><i class="fa fa-twitter"></i><a href="#">Retweet</a></li>
											</ul>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!--End Profile Blog-->

						<hr>


						<hr>


					</div>
				</div>
				<!-- End Profile Content -->
			</div>
		</div><!--/container-->
		<!--=== End Profile ===-->

        <!--=== Footer Version 1 ===-->
            <?php include 'inc/footer.php'?>
		<!--=== End Footer Version 1 ===-->
	</div><!--/wrapper-->


	<!-- JS Implementing Plugins -->
	<script type="text/javascript" src="assets/plugins/back-to-top.js"></script>
	<script type="text/javascript" src="assets/plugins/smoothScroll.js"></script>
	<script type="text/javascript" src="assets/plugins/counter/waypoints.min.js"></script>
	<script type="text/javascript" src="assets/plugins/counter/jquery.counterup.min.js"></script>
	<script type="text/javascript" src="assets/plugins/sky-forms-pro/skyforms/js/jquery-ui.min.js"></script>
	<script type="text/javascript" src="assets/plugins/scrollbar/js/jquery.mCustomScrollbar.concat.min.js"></script>
	<!-- JS Customization -->
	<script type="text/javascript" src="assets/js/custom.js"></script>
	<!-- JS Page Level -->
	<script type="text/javascript" src="assets/js/app.js"></script>
	<script type="text/javascript" src="assets/js/plugins/datepicker.js"></script>
	<script type="text/javascript" src="assets/js/plugins/style-switcher.js"></script>

	<script type="text/javascript">
		jQuery(document).ready(function() {
			App.init();
			App.initCounter();
			App.initScrollBar();
			Datepicker.initDatepicker();
			StyleSwitcher.initStyleSwitcher();
		});
	</script>
    

<!--[if lt IE 9]>
	<script src="assets/plugins/respond.js"></script>
	<script src="assets/plugins/html5shiv.js"></script>
	<script src="assets/plugins/placeholder-IE-fixes.js"></script>
	<![endif]-->

</body>
</html>
