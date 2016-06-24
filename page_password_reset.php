<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<head>
	<title>Reset Password | Redirect Debit</title>
        	<!-- JS Global Compulsory -->
	<script type="text/javascript" src="assets/plugins/jquery/jquery.min.js"></script>
	<script type="text/javascript" src="assets/plugins/jquery/jquery-migrate.min.js"></script>
	<script type="text/javascript" src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    
    
    <!-- Firebase -->
    <script type="text/javascript" src="inc/firebase/firebase.js"></script>
    <script type="text/javascript" src="inc/firebase/userHandler.js"></script>
    <script type="text/javascript">
    if(isUserLoggedIn()){
		if (getUserLev() != 3) {
			userLogout();
		}
        window.location = "page_profile.php"
    }
        $(document).ready(function() {
           getUserToolbar(); 
        });
    </script>
<?php include 'inc/head.php'?>
</head>

<body>
	<div class="wrapper">
		<!--=== Header ===-->
        
        <?php include 'inc/header.php'?>
			
		<!--=== End Header ===-->

		<!--=== Breadcrumbs ===-->
		<div class="breadcrumbs">
			<div class="container">
				<h1 class="pull-left">Login</h1>
				<ul class="pull-right breadcrumb">
					<li><a href="index.php">Home</a></li>
					<li class="active">Login</li>
					<li><a href="page_registration.php">Sign Up</a></li>
				</ul>
			</div><!--/container-->
		</div><!--/breadcrumbs-åΩsa   ->
		<!--=== End Breadcrumbs ===-->

		<!--=== Content Part ===-->
		<div class="container content">
			<div class="row">
				<div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
					<form class="reg-page" method="post">
                        
                        <div class="reg-header">
							<h2>Enter Your Email</h2>
						</div>
                           <div class="row">
                               <center>
                                   <h5 id="message" name="message" class="message"></h5>
                               </center>
                                
                            </div>

						<div class="input-group margin-bottom-20">
							<span class="input-group-addon"><i class="fa fa-user"></i></span>
							<input type="text" placeholder="Email Address" class="form-control" id="emailAddress" name="emailAddress">
						</div>

						<div class="row"> 
							<div class="col-md-6">
								<button class="btn-u pull-right" id="resetButton" name="restButton">Reset Password</button>
							</div>
						</div>
					</form>
				</div>
			</div><!--/row-->
		</div><!--/container-->
		<!--=== End Content Part ===-->

		<!--=== Footer Version 1 ===-->
            <?php include 'inc/footer.php'?>
		 <!--=== End Footer Version 1 ===-->
	</div><!--/wrapper-->


	<!-- JS Implementing Plugins -->
	<script type="text/javascript" src="assets/plugins/back-to-top.js"></script>
	<script type="text/javascript" src="assets/plugins/smoothScroll.js"></script>
	<!-- JS Customization -->
	<script type="text/javascript" src="assets/js/custom.js"></script>
	<!-- JS Page Level -->
	<script type="text/javascript" src="assets/js/app.js"></script>
	<script type="text/javascript" src="assets/js/plugins/style-switcher.js"></script>
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