<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<head>
	<title>Registration | Redirect Debit</title>
    	<script type="text/javascript" src="assets/plugins/jquery/jquery.min.js"></script>
	<script type="text/javascript" src="assets/plugins/jquery/jquery-migrate.min.js"></script>
	<script type="text/javascript" src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    
    
    <!-- Firebase -->
    <script type="text/javascript" src="inc/firebase/firebase.js"></script>
    <script type="text/javascript" src="inc/firebase/userHandler.js"></script>
    <script type="text/javascript">
    if(isUserLoggedIn()){
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
				<h1 class="pull-left">Registration</h1>
				<ul class="pull-right breadcrumb">
					<li><a href="index.html">Home</a></li>
					<li><a href="">Pages</a></li>
					<li class="active">Registration</li>
				</ul>
			</div><!--/container-->
		</div><!--/breadcrumbs-->
		<!--=== End Breadcrumbs ===-->

		<!--=== Content Part ===-->
		<div class="container content">
			<div class="row">
				<div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
					<form class="reg-page" method="post"> 
						<div class="reg-header">
							<h2>Register a new account</h2>
							<p>Already have an account? Click <a href="page_login.php" class="color-green">here</a> to login.</p>
						</div>

                        <div class="row">
                            <div class="row"><center>
                                <h5 id="message" name="message" class="message"></h5>
                                </center>
                            </div>
                            <div class="col-sm-6">
				                <input type="text" name="firstName" id="firstName" placeholder="First name" class="form-control margin-bottom-20">
                            </div>
                            <div class="col-sm-6">
                                <input type="text" placeholder="Last name" name="lastName" id="lastName" class="form-control margin-bottom-20">
                            </div>
                        </div>
                        <hr>
                    
						<input type="text" name="address" id="address" placeholder="Address" class="form-control margin-bottom-20" name="uname">
                        
                        
                        <div class="row">
                            <div class="col-sm-6">
				               <input type="text" placeholder="State" name="state" id="state" class="form-control margin-bottom-20">
                            </div>
                            <div class="col-sm-6">
				                <input type="text" placeholder="Postcode" name="postcode" id="postcode" class="form-control margin-bottom-20">
                            </div>
                        </div>
                        
                        <input type="text" placeholder="Country" name="country" id="country" class="form-control margin-bottom-20">
                        <hr>

                        <input type="text" placeholder="Contact Number" name="phoneNumber" id="phoneNumber" class="form-control margin-bottom-20">

						<input type="text" placeholder="Email Address" name="emailAddress" id="emailAddress" class="form-control margin-bottom-20">
                        
						<input type="text" placeholder="Confirm Email" id="confirmEmail" name="confirmEmail" class="form-control margin-bottom-20">
                        <hr>

						<div class="row">
							<div class="col-sm-6">
								<input type="password" placeholder="Password" name="password" id="password" class="form-control margin-bottom-20"/>
							</div>
							<div class="col-sm-6">
								<input type="password" placeholder="Confirm Password" name="confirmPassword" id="confirmPassword" class="form-control margin-bottom-20">
							</div>
						</div>

						<hr>

						<div class="row">
							<div class="col-lg-6 checkbox">
								<label>
									<input type="checkbox" name="termBox" id="termBox">
									I have read the <a href="page_terms.php"  class="color-green">Terms and Conditions</a>
								</label>
							</div>
							<div class="col-lg-6 text-right">
                                <img width="50px" height="50px" id="loader" name="loader" src="./assets/img/loading.gif"/>
								<button class="btn-u" type="submit" name="registerButton" id="registerButton">Register</button>
                                
							</div>
						</div>
					</form>
				</div>
			</div>
		</div><!--/container-->
		<!--=== End Content Part ===-->

		<!--=== Footer Version 1 ===-->
            <?php include 'inc/footer.php'?>
		<!--=== End Footer Version 1 ===-->
	</div>

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
