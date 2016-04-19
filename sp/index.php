<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<?php
define("BASE_URL", "http://redirectdebit.com/");
?>
<head>
	<title>Login | Redirect Debit Portal</title>
        	<!-- JS Global Compulsory -->
	<script type="text/javascript" src="http://redirectdebit.com/assets/plugins/jquery/jquery.min.js"></script>
	<script type="text/javascript" src="http://redirectdebit.com/assets/plugins/jquery/jquery-migrate.min.js"></script>
	<script type="text/javascript" src="http://redirectdebit.com/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    
    
    <!-- Firebase -->
    <script type="text/javascript" src="inc/firebase/firebase.js"></script>
    <script type="text/javascript" src="inc/firebase/userHandler.js"></script>
    <script type="text/javascript">
    if(isUserLoggedIn()){
        window.location = "page_profile.php"
    }
    </script>
<?php include 'inc/head.php'?>
</head>

<body>
	<div class="wrapper">
		<!--=== Header ===-->
        
        <?php include 'inc/header.php'?>
			
		<!--=== End Header ===-->

		<!--=== Content Part ===-->
		<div class="container content">
			<div class="row">
				<div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
					<form class="reg-page">
                        
                        <div class="reg-header">
							<h2>Service provider login</h2>
						</div>

						<div class="input-group margin-bottom-20">
							<span class="input-group-addon"><i class="fa fa-user"></i></span>
							<input type="text" placeholder="Username" class="form-control" id="email">
						</div>
						<div class="input-group margin-bottom-20">
							<span class="input-group-addon"><i class="fa fa-lock"></i></span>
							<input type="password" placeholder="Password" class="form-control" id="pword">
						</div>

						<div class="row">
							<div class="col-md-6 checkbox">
								<label><input type="checkbox"> Stay signed in</label>
							</div>
							<div class="col-md-6">
								<button class="btn-u pull-right" id="loginButton">Login</button>
							</div>
						</div>
                        <hr>

						<h4>Forgotten your Password?</h4>
						<p>No worries, <a class="color-green" href="#">Contact us</a> and we will put you on the right path.</p>
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
	<script type="text/javascript" src="http://redirectdebit.com/assets/plugins/back-to-top.js"></script>
	<script type="text/javascript" src="http://redirectdebit.com/assets/plugins/smoothScroll.js"></script>
	<!-- JS Customization -->
	<script type="text/javascript" src="http://redirectdebit.com/assets/js/custom.js"></script>
	<!-- JS Page Level -->
	<script type="text/javascript" src="http://redirectdebit.com/assets/js/app.js"></script>
	<script type="text/javascript" src="http://redirectdebit.com/assets/js/plugins/style-switcher.js"></script>
	<script type="text/javascript">
		jQuery(document).ready(function() {
			App.init();
			StyleSwitcher.initStyleSwitcher();
		});
	</script>

<!--[if lt IE 9]>
	<script src="<?php echo BASE_URL?>assets/plugins/respond.js"></script>
	<script src="<?php echo BASE_URL?>assets/plugins/html5shiv.js"></script>
	<script src="<?php echo BASE_URL?>assets/plugins/placeholder-IE-fixes.js"></script>
	<![endif]-->

</body>
</html>
