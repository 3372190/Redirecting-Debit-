<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<head>
	<title>Registration | Redirect Debit</title>
    
<?php include 'inc/head.php'?>
                	<!-- JS Global Compulsory -->
	<script type="text/javascript" src="assets/plugins/jquery/jquery.min.js"></script>
	<script type="text/javascript" src="assets/plugins/jquery/jquery-migrate.min.js"></script>
	<script type="text/javascript" src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    
    
    <!-- Firebase -->
    <script type="text/javascript" src="inc/firebase/firebase.js"></script>
    <script type="text/javascript" src="inc/firebase/userHandler.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
           getUserToolbar(); 
        });
    </script>
</head>

<body>
	<div class="wrapper">
		<!--=== Header ===-->
		<?php include 'inc/header.php'?>
		<!--=== End Header ===-->

		<!--=== Breadcrumbs ===-->
		<div class="breadcrumbs">
			<div class="container">
				<h1 class="pull-left">Bank Search</h1>
			</div><!--/container-->
		</div><!--/breadcrumbs-->
		<!--=== End Breadcrumbs ===-->

		<!--=== Content Part ===-->
		<div class="container content">
			<div class="row">
				<div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
					<form class="reg-page">
						<div class="reg-header">
							<div class="headline"><h2>Compatible Companies</h2></div>
							<p>Use the search box below to see if we support your bank!</p>
						</div>
						<div class="owl-clients-v1">
							<div class="item">
								<img src="assets/img/banks/anz_logo.png" alt="">
							</div>
							<div class="item">
								<img src="assets/img/banks/bendigo_logo.png" alt="">
							</div>
							<div class="item">
								<img src="assets/img/banks/commbank_logo1.png" alt="">
							</div>
							<div class="item">
								<img src="assets/img/banks/hsbc-logo.png" alt="">
							</div>
							<div class="item">
								<img src="assets/img/banks/nab_logo.png" alt="">
							</div>
							<div class="item">
								<img src="assets/img/banks/westpac_logo.png" alt="">
							</div>
							<div class="item">
								<img src="assets/img/banks/ing_logo.png" alt="">
							</div>
						</div>


                    </form>
                </div>
			</div>
		</div><!--/container-->
		<!--=== Footer Version 1 ===-->
            <?php include 'inc/footer.php'?>
		<!--=== End Footer Version 1 ===-->
	</div>

	<!-- JS Global Compulsory -->
	<script type="text/javascript" src="assets/plugins/jquery/jquery.min.js"></script>
	<script type="text/javascript" src="assets/plugins/jquery/jquery-migrate.min.js"></script>
	<script type="text/javascript" src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    
	<script type="text/javascript" src="assets/plugins/parallax-slider/js/modernizr.js"></script>
	<script type="text/javascript" src="assets/plugins/parallax-slider/js/jquery.cslider.js"></script>
	<script type="text/javascript" src="assets/plugins/owl-carousel/owl-carousel/owl.carousel.js"></script>
	<!-- JS Implementing Plugins -->
	<script type="text/javascript" src="assets/plugins/back-to-top.js"></script>
	<script type="text/javascript" src="assets/plugins/smoothScroll.js"></script>
	<!-- JS Customization -->
	<script type="text/javascript" src="assets/js/custom.js"></script>
	<!-- JS Page Level -->
	<script type="text/javascript" src="assets/js/app.js"></script>
    
	<script type="text/javascript" src="assets/js/plugins/owl-carousel.js"></script>
	<script type="text/javascript" src="assets/js/plugins/style-switcher.js"></script>
    
	<script type="text/javascript" src="assets/js/plugins/parallax-slider.js"></script>
	<script type="text/javascript">
		jQuery(document).ready(function() {
			App.init();
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
