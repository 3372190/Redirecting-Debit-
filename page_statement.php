<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<head>
	<title>Profile Settings | Redirect Debit</title>
    
    	<!-- JS Global Compulsory -->
	<script type="text/javascript" src="assets/plugins/jquery/jquery.min.js"></script>
	<script type="text/javascript" src="assets/plugins/jquery/jquery-migrate.min.js"></script>
	<script type="text/javascript" src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    
        <!-- Firebase -->
    <script type="text/javascript" src="inc/firebase/firebase.js"></script>
    <script type="text/javascript" src="inc/firebase/userHandler.js"></script>
    <script type="text/javascript" src="inc/firebase/pagestatement.js"></script>
    <script type="text/javascript">
    if(!isUserLoggedIn()){
        window.location = "page_login.php"
    }
        
        getUserId();
        getProviderList();
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
		<?php include 'inc/header.php'?>
		<!--=== End Header ===-->

		<!--=== Profile ===-->
		<div class="container content profile">
			<div class="row">
				<!--Left Sidebar-->
			 <?php include 'inc/profile_sidebar.php'?>
				<!--End Left Sidebar-->

				<!-- Profile Content -->
				<div class="col-md-9">
					<div class="profile-body margin-bottom-20">
						<div class="tab-v1">
							<ul class="nav nav-justified nav-tabs">
								<li class="disabled active"><a data-toggle="tab" href="#profile">Upload Statement</a></li>
								<li class="disabled"><a data-toggle="tab" href="#passwordTab" onclick="return false;">Select Service Providers</a></li>
								<li class="disabled"><a data-toggle="tab" href="#settings" onclick="return false;">Review and Save</a></li>
							</ul>
                            
                            
							<div class="tab-content">
								<div id="profile" class="profile-edit tab-pane fade in active">
                                    
                                    <form class="sky-form" method="post" id="fileprocess" enctype="multipart/form-data">
										<!--Checkout-Form-->
										<section>
                                        <h2 class="heading-md">Use This Page To Upload Statements to be Processed By Us.</h2>
									<p>Statements can be in Csv format only!!</p>
                                            
										</section>

										<section>
                                            <h3>Upload Statement</h3>
                                            <input type="file" name="fileToUpload" id="fileToUpload" />
                                            <h5 id="message" name="message" style="color:red;" ></h5>
										</section>

										<div class="row">
											<label class="label col col-4">Bank Provider</label>
											<section class="col col-5">
												<label class="select" >
													<select name="bankNumber" id="bankNumber">
														<option disabled="" selected="" value="0" >Select Bank</option>
														<option value="1">Westpac Australia</option>
														<option value="2">Commonwealth Bank</option>
													</select>
													<i></i>
												</label>
											</section>
										</div>
										<button type="button" id="cancel" class="btn-u btn-u-default">Cancel</button>
										<button class="btn-u" type="submit" id="submit" name="submit">Next</button>
										<!--End Checkout-Form-->
									</form>
								</div>

								<div id="passwordTab" class="profile-edit tab-pane fade">
				                    <div class="table-search-v2" >
                                        <div class="table-responsive">
                                            <h5 id="nomessage" name="nomessage" style="color:red;" ></h5>
                                            <table class="table table-bordered table-striped" id="serviceresult">
                                                    <tbody>
                                                    </tbody>
                                            </table>
                                        </div>
                                    </div>
                                <button type="button" id="providerBack" name="providerBack" class="btn-u btn-u-default">Back</button>
								<button class="btn-u"  id="selectproviders" name="selectproviders" type="submit">Next</button>
									
                            </div>


								<div id="settings" class="profile-edit tab-pane fade">
								    <div class="table-search-v2" >
                                        <div class="table-responsive">
                                            <h5 id="upmessage" name="upmessage" style="color:red;" ></h5>
                                            <table class="table table-bordered table-striped" id="servicesave">
                                                    <tbody>
                                                    </tbody>
                                            </table>
                                        </div>
                                    </div>
                                <button type="button" id="providerBack" name="providerBack" class="btn-u btn-u-default">Back</button>
								<button class="btn-u"  id="saveproviders" name="saveproviders" type="submit">Save And notify</button>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- End Profile Content -->
			</div><!--/end row-->
		</div>
		<!--=== End Profile ===-->

		<!--=== Footer Version 1 ===-->
            <?php include 'inc/footer.php'?>
		<!--=== End Footer Version 1 ===-->
	</div><!--/wrapper-->


	<!-- JS Implementing Plugins -->
	<script type="text/javascript" src="assets/plugins/back-to-top.js"></script>
	<script type="text/javascript" src="assets/plugins/smoothScroll.js"></script>
	<script type="text/javascript" src="assets/plugins/sky-forms-pro/skyforms/js/jquery-ui.min.js"></script>
	<script type="text/javascript" src="assets/plugins/sky-forms-pro/skyforms/js/jquery.validate.min.js"></script>
	<script type="text/javascript" src="assets/plugins/sky-forms-pro/skyforms/js/jquery.maskedinput.min.js"></script>
	<script type="text/javascript" src="assets/plugins/scrollbar/js/jquery.mCustomScrollbar.concat.min.js"></script>
	<!-- JS Customization -->
	<script type="text/javascript" src="assets/js/custom.js"></script>
	<!-- JS Page Level -->
	<script type="text/javascript" src="assets/js/app.js"></script>
	<script type="text/javascript" src="assets/js/forms/reg.js"></script>
	<script type="text/javascript" src="assets/js/forms/checkout.js"></script>
	<script type="text/javascript" src="assets/js/plugins/datepicker.js"></script>
	<script type="text/javascript" src="assets/js/plugins/style-switcher.js"></script>
	<script type="text/javascript">
		jQuery(document).ready(function() {
			App.init();
			App.initScrollBar();
			RegForm.initRegForm();
			Datepicker.initDatepicker();
			CheckoutForm.initCheckoutForm();
			StyleSwitcher.initStyleSwitcher();
		});
	</script>
<!--[if lt IE 9]>
	<script src="assets/plugins/respond.js"></script>
	<script src="assets/plugins/html5shiv.js"></script>
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<script src="assets/plugins/sky-forms-pro/skyforms/js/sky-forms-ie8.js"></script>
	<![endif]-->

<!--[if lt IE 10]>
	<script src="assets/plugins/sky-forms-pro/skyforms/js/jquery.placeholder.min.js"></script>
	<![endif]-->

</body>
</html>
