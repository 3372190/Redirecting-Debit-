<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<head>
	<title>Registration | Redirect Debit</title>
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
					<form class="reg-page"> <!--action="assets/php/demo-registration-process.php" method="post" -->
						<div class="reg-header">
							<h2>Register a new account</h2>
							<p>Already have an account? Click <a href="page_login.php" class="color-green">here</a> to login.</p>
						</div>

                        <div class="row">
                            <div class="col-sm-6">
                                <label>First name <span class="color-red">*</span></label>
				                <input type="text" class="form-control margin-bottom-20">
                            </div>
                            <div class="col-sm-6">
                                <label>Last name<span class="color-red">*</span></label>
                                <input type="password" class="form-control margin-bottom-20">
                            </div>
                        </div>
                        
						<label>Address</label>
						<input type="text" class="form-control margin-bottom-20" name="uname">
                        
                        
                        <div class="row">
                            <div class="col-sm-6">
                                
                                <label>State</label><br>
                                <select name="bankNumber" id="bankNumber">
                                    <option disabled="" selected="" value="0" >Select State</option>
                                    <option value="1">VIC</option>
                                    <option value="2">NSW</option>
                                    <option value="3">TAS</option>
                                    <option value="4">ACT</option>
                                    <option value="5">WA</option>
                                    <option value="6">SA</option>
                                    <option value="7">NT</option>
                                    <option value="8">QLD</option>
                                </select>
                                
                            </div>
                            <div class="col-sm-6">
                                
                                <label>Postcode<span class="color-red">*</span></label>
				                <input type="text" class="form-control margin-bottom-20">
                            
                            </div>
                        
                        </div>
                        
                                <label>Country<span class="color-red">*</span></label>
                                <input type="password" class="form-control margin-bottom-20">


						<label>Email Address <span class="color-red">*</span></label>
						<input type="text" class="form-control margin-bottom-20">
                        
                        <label>Confirm Email <span class="color-red">*</span></label>
						<input type="text" class="form-control margin-bottom-20">

						<div class="row">
							<div class="col-sm-6">
								<label>Password <span class="color-red">*</span></label>
								<input type="password" class="form-control margin-bottom-20">
							</div>
							<div class="col-sm-6">
								<label>Confirm Password <span class="color-red">*</span></label>
								<input type="password" class="form-control margin-bottom-20">
							</div>
						</div>

						<hr>

						<div class="row">
							<div class="col-lg-6 checkbox">
								<label>
									<input type="checkbox">
									I have read the <a href="page_terms.html" class="color-green">Terms and Conditions</a>
								</label>
							</div>
							<div class="col-lg-6 text-right">
								<button class="btn-u" type="submit">Register</button>
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

	<!-- JS Global Compulsory -->
	<script type="text/javascript" src="assets/plugins/jquery/jquery.min.js"></script>
	<script type="text/javascript" src="assets/plugins/jquery/jquery-migrate.min.js"></script>
	<script type="text/javascript" src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
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
