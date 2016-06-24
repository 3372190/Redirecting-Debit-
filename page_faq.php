<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<head>
	<title>FAQ Page | Redirect Debit</title>
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
			if (getUserLev() != 3) {
				userLogout();
			}
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
				<h1 class="pull-left">FAQs</h1>
			</div>
		</div><!--/breadcrumbs-->
		<!--=== End Breadcrumbs ===-->

		<!--=== Content Part ===-->
		<div class="container content">
			<div class="row">
				<div class="col-md-9">
					<!-- General Questions -->
					<div class="headline"><h2>General Questions</h2></div>
					<div class="panel-group acc-v1 margin-bottom-40" id="accordion">
						<div class="panel panel-default">
							<div class="panel-heading">
								<h4 class="panel-title">
									<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
										1. What if the bank I am with is not supported?
									</a>
								</h4>
							</div>
							<div id="collapseOne" class="panel-collapse collapse in">
								<div class="panel-body">
									Please submit a request for your bank and we will work on getting that bank setup
								</div>
							</div>
						</div>

						<div class="panel panel-default">
							<div class="panel-heading">
								<h4 class="panel-title">
									<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
										2. What if my service provider is not listed?
									</a>
								</h4>
							</div>
							<div id="collapseTwo" class="panel-collapse collapse">
								<div class="panel-body">
									<p>Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.</p>
									<ul class="list-unstyled">
										<li><i class="fa fa-check color-green"></i> Donec id elit non mi porta gravida at eget metus..</li>
										<li><i class="fa fa-check color-green"></i> Fusce dapibus, tellus ac cursus comodo egetine..</li>
										<li><i class="fa fa-check color-green"></i> Food truck quinoa nesciunt laborum eiusmod runch..</li>
										<li><i class="fa fa-check color-green"></i> Donec id elit non mi porta gravida at eget metus..</li>
									</ul>
								</div>
							</div>
						</div>

						<div class="panel panel-default">
							<div class="panel-heading">
								<h4 class="panel-title">
									<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
										3. How long does it take for a service provider to respond to a notification?
									</a>
								</h4>
							</div>
							<div id="collapseThree" class="panel-collapse collapse">
								<div class="panel-body">
									<p>Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Food truck quinoa nesciunt laborum eiusmodolf moon tempor, sunt aliqua put a bird.</p>
									<ul class="list-unstyled">
										<li><i class="fa fa-check color-green"></i> Donec id elit non mi porta gravida at eget metus..</li>
										<li><i class="fa fa-check color-green"></i> Fusce dapibus, tellus ac cursus comodo egetine..</li>
									</ul>
								</div>
							</div>
						</div>

						<div class="panel panel-default">
							<div class="panel-heading">
								<h4 class="panel-title">
									<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseFour">
										4. Livil anim keffiyeh helvetica craft beer labore wesde brunch?
									</a>
								</h4>
							</div>
							<div id="collapseFour" class="panel-collapse collapse">
								<div class="panel-body">
									Olif moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et.
								</div>
							</div>
						</div>

						<div class="panel panel-default">
							<div class="panel-heading">
								<h4 class="panel-title">
									<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseFive">
										5. Leggings occaecat craft beer farmto tableraw denim?
									</a>
								</h4>
							</div>
							<div id="collapseFive" class="panel-collapse collapse">
								<div class="panel-body">
									<p>Keffiyeh anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et.</p>
									<ul class="list-unstyled">
										<li><i class="fa fa-check color-green"></i> Donec id elit non mi porta gravida at eget metus..</li>
										<li><i class="fa fa-check color-green"></i> Fusce dapibus, tellus ac cursus comodo egetine..</li>
										<li><i class="fa fa-check color-green"></i> Food truck quinoa nesciunt laborum eiusmod runch..</li>
										<li><i class="fa fa-check color-green"></i> Donec id elit non mi porta gravida at eget metus..</li>
										<li><i class="fa fa-check color-green"></i> Fusce dapibus, tellus ac cursus comodo egetine..</li>
										<li><i class="fa fa-check color-green"></i> Food truck quinoa nesciunt laborum eiusmod runch..</li>
									</ul>
								</div>
							</div>
						</div>

						<div class="panel panel-default">
							<div class="panel-heading">
								<h4 class="panel-title">
									<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseSix">
										6. Keffiyeh anim keffiyeh helvetica craft beer labore wesse?
									</a>
								</h4>
							</div>
							<div id="collapseSix" class="panel-collapse collapse">
								<div class="panel-body">
									Helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Brunch sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et.
								</div>
							</div>
						</div>

						<div class="panel panel-default">
							<div class="panel-heading">
								<h4 class="panel-title">
									<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseSeven">
										7. Helvetica craft beer labore wes anderson cred nesciu ntlife richardson?
									</a>
								</h4>
							</div>
							<div id="collapseSeven" class="panel-collapse collapse">
								<div class="panel-body">
									Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.
								</div>
							</div>
						</div>
					</div><!--/acc-v1-->
					<!-- End General Questions -->

					<!-- Other Questions -->

				</div><!--/col-md-9-->

				<div class="col-md-3">
					<!-- Contacts -->
					<div class="headline"><h2>Contacts</h2></div>
					<ul class="list-unstyled who margin-bottom-30">
						<li><a href="#"><i class="fa fa-home"></i>Rmit University Melbourne</a></li>
						<li><a href="#"><i class="fa fa-envelope"></i>info@redirectdebit.com</a></li>
						<li><a href="#"><i class="fa fa-globe"></i>http://www.redirectdebit.com</a></li>
					</ul>
					<!-- End Contacts -->

					

					
				</div><!--/col-md-3-->
			</div><!--/row-->
		</div><!--/container-->
		<!--=== End Content Part ===-->

		<!--=== Footer Version 1 ===-->
		<?php include 'inc/footer.php'?>
        <!--/footer-->


	</div><!--/wrapper-->

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
