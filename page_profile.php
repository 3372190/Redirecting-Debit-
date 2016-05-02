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
									<span class="counter">10</span>

									<div class="clearfix margin-bottom-10"></div>

									<div class="row margin-bottom-20">
										<div class="col-xs-6 service-in">
											<small>Notified</small>
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
												<img class="rounded-x" src="assets/img/profile_serviceproviders/vodafone_logo.png" alt="">
											</td>
											<td class="td-width">
												<h3><a href="#">Vodafone Mobile Plan</a></h3>
												<p>Vodafone direct debit update information requested. Account Number: 1234 5678 Account Name: John Smith.</p>
												<small class="hex">Date Requested April 25, 2016</small>
											</td>
											<td>
												<span class="label label-success">Success</span>
											</td>
											<td>
												<ul class="list-inline s-icons">
													<li>
														<a data-placement="top" data-toggle="tooltip" class="tooltips" data-original-title="Facebook" href="https://www.facebook.com/vodafoneau">
															<i class="fa fa-facebook"></i>
														</a>
													</li>
													<li>
														<a data-placement="top" data-toggle="tooltip" class="tooltips" data-original-title="Twitter" href="https://twitter.com/VodafoneAU
">
															<i class="fa fa-twitter"></i>
														</a>
													</li>
													<li>
														<a data-placement="top" data-toggle="tooltip" class="tooltips" data-original-title="Dropbox" href="#">
															<i class="fa fa-dropbox"></i>
														</a>
													</li>
													<li>
														<a data-placement="top" data-toggle="tooltip" class="tooltips" data-original-title="Linkedin" href="https://www.linkedin.com/company/vodafone">
															<i class="fa fa-linkedin"></i>
														</a>
													</li>
												</ul>
												<span><a href="#">vodafone@email.com</a></span>
												<span><a href="www.vodafone.com.au">www.vodafone.com.au</a></span>
											</td>
										</tr>
										<tr>
											<td>
												<img class="rounded-x" src="assets/img/profile_serviceproviders/lumo-energy_logo.png" alt="">
											</td>
											<td>
												<h3><a href="#">Lumo Energy Bill</a></h3>
												<p>Lumo Direct debit energy monthly bill, credit card update requested.</p>
												<small class="hex">Requested April 30, 2016</small>
											</td>
											<td>
												<span class="label label-success">Success</span>
											</td>
											<td>
												<ul class="list-inline s-icons">
													<li>
														<a data-placement="top" data-toggle="tooltip" class="tooltips" data-original-title="Facebook" href="https://www.facebook.com/Lumo.Energy/
 ">
															<i class="fa fa-facebook"></i>
														</a>
													</li>
													<li>
														<a data-placement="top" data-toggle="tooltip" class="tooltips" data-original-title="Twitter" href="https://twitter.com/Lumo_Energy">
															<i class="fa fa-twitter"></i>
														</a>
													</li>
													<li>
														<a data-placement="top" data-toggle="tooltip" class="tooltips" data-original-title="Dropbox" href="#">
															<i class="fa fa-dropbox"></i>
														</a>
													</li>
													<li>
														<a data-placement="top" data-toggle="tooltip" class="tooltips" data-original-title="Linkedin" href="https://www.linkedin.com/company/lumo-energy">
															<i class="fa fa-linkedin"></i>
														</a>
													</li>
												</ul>
												<span><a href="#">lumo-engergy@email.com</a></span>
												<span><a href="www.lumoenergy.com.au">www.lumoenergy.com.au</a></span>
											</td>
										</tr>
										<tr>
											<td>
												<img class="rounded-x" src="assets/img/profile_serviceproviders/tpg_logo.png" alt="">
											</td>
											<td>
												<h3><a href="#"></a>TPG Internet Service Monthly Bill</h3>
												<p>Credit card update for TPG monthly direct debit requested.</p>
												<small class="hex">Requested May 1, 2016</small>
											</td>
											<td>
												<span class="label label-danger">Failed</span>
											</td>
											<td>
												<ul class="list-inline s-icons">
													<li>
														<a data-placement="top" data-toggle="tooltip" class="tooltips" data-original-title="Facebook" href="https://www.facebook.com/pages/TPG-Telecom/103129136393562?fref=ts">
															<i class="fa fa-facebook"></i>
														</a>
													</li>
													<li>
														<a data-placement="top" data-toggle="tooltip" class="tooltips" data-original-title="Twitter" href="https://twitter.com/tpg_telecom?lang=en">
															<i class="fa fa-twitter"></i>
														</a>
													</li>
													<li>
														<a data-placement="top" data-toggle="tooltip" class="tooltips" data-original-title="Dropbox" href="#">
															<i class="fa fa-dropbox"></i>
														</a>
													</li>
													<li>
														<a data-placement="top" data-toggle="tooltip" class="tooltips" data-original-title="Linkedin" href="https://www.linkedin.com/company/tpgtelecom">
															<i class="fa fa-linkedin"></i>
														</a>
													</li>
												</ul>
												<span><a href="#">tpg-support@email.com</a></span>
												<span><a href="https://www.tpg.com.au/
 ">www.tpg.com.au</a></span>
											</td>
										</tr>
										<tr>
											<td>
												<img class="" src="assets/img/profile_serviceproviders/fitness-first_logo.png" alt="">
											</td>
											<td>
												<h3><a href="#">Fitness First Membership</a></h3>
												<p>Fitness First memebership direct debit payments, credit card update requested.</p>
												<small class="hex">Requested May 2, 2016</small>
											</td>
											<td>
												<span class="label label-info">Pending</span>
											</td>
											<td>
												<ul class="list-inline s-icons">
													<li>
														<a data-placement="top" data-toggle="tooltip" class="tooltips" data-original-title="Facebook" href="https://www.facebook.com/FitnessFirstAustralia">
															<i class="fa fa-facebook"></i>
														</a>
													</li>
													<li>
														<a data-placement="top" data-toggle="tooltip" class="tooltips" data-original-title="Twitter" href="https://twitter.com/fitnessfirstau">
															<i class="fa fa-twitter"></i>
														</a>
													</li>
													<li>
														<a data-placement="top" data-toggle="tooltip" class="tooltips" data-original-title="Dropbox" href="#">
															<i class="fa fa-dropbox"></i>
														</a>
													</li>
													<li>
														<a data-placement="top" data-toggle="tooltip" class="tooltips" data-original-title="Linkedin" href="https://www.linkedin.com/company/fitness-first">
															<i class="fa fa-linkedin"></i>
														</a>
													</li>
												</ul>
												<span><a href="#">fitness-first@support.com</a></span>
												<span><a href="www.fitnessfirst.com.au/">www.fitnessfirst.com.au</a></span>
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
								<h2 class="panel-title heading-sm pull-left"><i class="fa fa-tasks"></i>Banks</h2>
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
