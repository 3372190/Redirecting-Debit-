<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<head>
	<title>Profile Page | Redirect Debit</title>
    
    	<!-- JS Global Compulsory -->
	<script type="text/javascript" src="../assets/plugins/jquery/jquery.min.js"></script>
	<script type="text/javascript" src="../assets/plugins/jquery/jquery-migrate.min.js"></script>
	<script type="text/javascript" src="../assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    
    
    <!-- Firebase -->
    <script type="text/javascript" src="../inc/firebase/firebase.js"></script>
        <script type="text/javascript" src="inc/AUserHandler.js"></script>
    <script type="text/javascript" src="../inc/firebase/pageoverall.js"></script>
    <script type="text/javascript">
    if((!isUserLoggedIn()) && (getUserLev() != 1)){
        window.location = "page_login.php"
    }
        
        loadUserDetails();
        $(document).ready(function() {
           getUserToolbar(); 
        });
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
	<link rel="stylesheet" href="../assets/plugins/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="../assets/css/style.css">

	<!-- CSS Header and Footer -->
	<link rel="stylesheet" href="../assets/css/headers/header-default.css">
	<link rel="stylesheet" href="../assets/css/footers/footer-v1.css">

	<!-- CSS Implementing Plugins -->
	<link rel="stylesheet" href="../assets/plugins/animate.css">
	<link rel="stylesheet" href="../assets/plugins/line-icons/line-icons.css">
	<link rel="stylesheet" href="../assets/plugins/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="../assets/plugins/scrollbar/css/jquery.mCustomScrollbar.css">
	<link rel="stylesheet" href="../assets/plugins/sky-forms-pro/skyforms/css/sky-forms.css">
	<link rel="stylesheet" href="../assets/plugins/sky-forms-pro/skyforms/custom/custom-sky-forms.css">

	<!-- CSS Page Style -->
	<link rel="stylesheet" href="../assets/css/pages/profile.css">

	<!-- CSS Theme -->
	<link rel="stylesheet" href="../assets/css/theme-colors/default.css" id="style_color">
	<link rel="stylesheet" href="../assets/css/theme-skins/dark.css">

	<!-- CSS Customization -->
	<link rel="stylesheet" href="../assets/css/custom.css">
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
										<div class="row">
				<div class="col-md-12">
					<form class="reg-page" method="post"> 
						<div class="reg-header">
							<h2>Create a new Service Provider</h2>
						</div>

                        <div class="row">
                            <div class="row"><center>
                                <h5 id="message" name="message" class="message"></h5>
                                </center>
                            </div>
                            <div class="col-sm-6">
				                <input type="text" name="name" id="name" placeholder="Service Provider Name" class="form-control margin-bottom-20">
                            </div>
                            <div class="col-sm-6">
                                <input type="text" placeholder="Service Provider Website" name="website" id="website" class="form-control margin-bottom-20">
                            </div>
                        </div>
                        <input type="text" placeholder="Service Provider Image Url" name="imageUrl" id="imageUrl" class="form-control margin-bottom-20">
                        <hr>
                    
                        <input type="textarea" placeholder="Service Provider Description" name="description" id="description" rows="4" cols="50" class="form-control margin-bottom-20"/>
                        
                        <hr>


						<input type="text" placeholder="Service Provider Email Address" name="emailAddress" id="emailAddress" class="form-control margin-bottom-20">
                        
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
							<div class="col-lg-6 text-right">
                                <img width="50px" height="50px" id="loader" name="loader" src="./assets/img/loading.gif"/>
								<button class="btn-u" type="submit" name="registerButton" id="registerButton">Register</button>
                                
							</div>
						</div>
					</form>
				</div>
			</div>
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
	<script type="text/javascript" src="../assets/plugins/back-to-top.js"></script>
	<script type="text/javascript" src="../assets/plugins/smoothScroll.js"></script>
	<script type="text/javascript" src="../assets/plugins/counter/waypoints.min.js"></script>
	<script type="text/javascript" src="../assets/plugins/counter/jquery.counterup.min.js"></script>
	<script type="text/javascript" src="../assets/plugins/sky-forms-pro/skyforms/js/jquery-ui.min.js"></script>
	<script type="text/javascript" src="../assets/plugins/scrollbar/js/jquery.mCustomScrollbar.concat.min.js"></script>
	<!-- JS Customization -->
	<script type="text/javascript" src="../assets/js/custom.js"></script>
	<!-- JS Page Level -->
	<script type="text/javascript" src="../assets/js/app.js"></script>
	<script type="text/javascript" src="../assets/js/plugins/datepicker.js"></script>
	<script type="text/javascript" src="../assets/js/plugins/style-switcher.js"></script>

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
