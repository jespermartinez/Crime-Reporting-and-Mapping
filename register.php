<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta name="description" content="Neon Admin Panel" />
	<meta name="author" content="" />
	
	<title> Admin Crime System | Register</title>
	

	<link rel="stylesheet" href="assets/js/jquery-ui/css/no-theme/jquery-ui-1.10.3.custom.min.css">
	<link rel="stylesheet" href="assets/css/font-icons/entypo/css/entypo.css">
	<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Noto+Sans:400,700,400italic">
	<link rel="stylesheet" href="assets/css/bootstrap.css">
	<link rel="stylesheet" href="assets/css/neon-core.css">
	<link rel="stylesheet" href="assets/css/neon-theme.css">
	<link rel="stylesheet" href="assets/css/neon-forms.css">
	<link rel="stylesheet" href="assets/css/custom.css">

	<script src="assets/js/jquery-1.11.0.min.js"></script>

	
	
</head>

	<?php include ('inc/config.php'); ?>
	<?php include ('inc/model.php'); ?>
	<?php include ('inc/controller.php'); ?>


<body class="page-body login-page login-form-fall" data-url="http://neon.dev">


<!-- This is needed when you send requests via Ajax -->
<script type="text/javascript">
var baseurl = '';
</script>

<div class="login-container">
	
	<div class="login-header login-caret">

		<!-- <img src="assets/images/picbacklogin.png"> -->

		<div class="login-content">
			
			<a href="" class="logo">
				<img src="assets/images/logo_logo_final.png" width="400" alt="" style="margin-left:-50px" />
			</a>
			
			<p class="description">Create an Administrator Account.</p>
			
			<!-- progress bar indicator -->
			<div class="login-progressbar-indicator">
				<h3>43%</h3>
				<span>Signing in...</span>
			</div>
			
		</div>
		
	</div>
	
	<div class="login-progressbar" style="background-color: blue">
		<div style="background-color: red"></div>
	</div>
	
	<div class="login-form">
		
		<div class="login-content">
			
			<form method="post" role="form" id="form_register">
				
				<div class="form-register-success">
					<i class="entypo-check" style="background-color: darkblue"></i>
					<h3>You have been successfully registered.</h3>
					<p>You can now continue to loging-in</p>
				</div>
				
				<div class="form-steps">
<!-- Step 1 Form Process -->
					<div class="step current" id="step-1">
					
						<div class="form-group">
							<div class="input-group">
								<div class="input-group-addon">
									<i class="entypo-user"></i>
								</div>
								
								<input type="text" class="form-control" id="fname" placeholder="First Name" data-mask="[a-zA-Z0-1\.]+" data-is-regex="true" autocomplete="off" required="" />
							</div>
						</div>

						<div class="form-group">
							<div class="input-group">
								<div class="input-group-addon">
									<i class="entypo-user"></i>
								</div>
								
								<input type="text" class="form-control" id="mname" placeholder="Middle Name" autocomplete="off" data-mask="[a-zA-Z0-1\.]+" data-is-regex="true" required=""/>
							</div>
						</div>

						<div class="form-group">
							<div class="input-group">
								<div class="input-group-addon">
									<i class="entypo-user"></i>
								</div>
								
								<input type="text" class="form-control" id="lname" placeholder="Last Name" autocomplete="off" data-mask="[a-zA-Z0-1\.]+" data-is-regex="true" required=""/>
							</div>
						</div>

						<div class="form-group">
							<div class="input-group">
								<div class="input-group-addon">
									<i class="entypo-users"></i>
								</div>
								
								<select class="form-control" id="gender" required="">
									<option value=""><b>Select Gender</b></option>
									<option value="Male">Male</option>
									<option value="Female">Female</option>
								</select>

							</div>
						</div>

						<div class="form-group">
							<div class="input-group">
								<div class="input-group-addon">
									<i class="entypo-user"></i>
								</div>
								
								<input type="number" class="form-control" id="age" placeholder="Age" autocomplete="off" required="" />
							</div>
						</div>		
						
						<div class="form-group">
							<button type="button" data-step="step-2" class="btn btn-primary btn-block btn-login">
								<i class="entypo-right-open-mini"></i>
								Next Step
							</button>
						</div>
						
						<div class="form-group">
							Step 1 of 2
						</div>
					
					</div>
<!-- End Step 1 Form Process -->

<!-- Step 2 Form Process -->					
					<div class="step" id="step-2">
					
						<div class="form-group">
							<div class="input-group">
								<div class="input-group-addon">
									<i class="entypo-home"></i>
								</div>

								<select class="form-control" id="municipality" required="">
									<option value=""><b>Select Municipality</b></option>
									<option value="Manay">Manay</option>
									<option value="Banaybanay">Banaybanay</option>
									<option value="Mati City">Mati City</option>
									<option value="Lupon">Lupon</option>
									<option value="San Isidro">San Isidro</option>
									<option value="Governor Generoso">Governor Generoso</option>
									<option value="Baganga">Baganga</option>
									<option value="Cateel">Cateel</option>
									<option value="Tarragona">Tarragona</option>
									<option value="Caraga">Caraga</option>
								</select>
										
							</div>
						</div>

						<div class="form-group">
							<div class="input-group">
								<div class="input-group-addon">
									<i class="entypo-vcard"></i>
								</div>
								
								<input type="text" class="form-control" id="verification_code" placeholder="Enter your Verification Code"  autocomplete="off" required="" />
							</div>
						</div>

					
						<div class="form-group">
							<div class="input-group">
								<div class="input-group-addon">
									<i class="entypo-mail"></i>
								</div>
								
								<input type="text" class="form-control" id="email" data-mask="email" placeholder="E-mail" autocomplete="off" required="" />
							</div>
						</div>
						
						<div class="form-group">
							<div class="input-group">
								<div class="input-group-addon">
									<i class="entypo-lock"></i>
								</div>
								
								<input type="password" class="form-control" id="password" placeholder="Choose Password" autocomplete="off" required="" />
							</div>
						</div>
						
						<div class="form-group">
							<button class="btn btn-success btn-block btn-login" id="btn_register">
								<i class="entypo-right-open-mini"></i>
								Complete Registration
							</button>
						</div>
						
						<div class="form-group">
							Step 2 of 2
						</div>
						
					</div>
<!-- End Step 2 Form Process -->						
				</div>
				
			</form>
			
			
			<div class="login-bottom-links">
				
				<a href="index.php" class="link">
					<i class="entypo-lock"></i>
					Return to Login Page
				</a>		
					
			</div>
			
		</div>
		
	</div>
	
</div>

	<!-- Bottom Scripts -->
	<script src="assets/js/gsap/main-gsap.js"></script>
	<script src="assets/js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js"></script>
	<script src="assets/js/bootstrap.js"></script>
	<script src="assets/js/joinable.js"></script>
	<script src="assets/js/resizeable.js"></script>
	<script src="assets/js/neon-api.js"></script>
	<script src="assets/js/jquery.validate.min.js"></script>
	<script src="assets/js/jquery.inputmask.bundle.min.js"></script>
	<script src="assets/js/neon-custom.js"></script>
	<script src="assets/js/neon-demo.js"></script>

<!-- Json for register filter & style -->
	<script src="assets/js/neon-register.js"></script>
<!-- End Json for register filter & style -->


	<!-- <script src="json/jquery-1.11.0.js"></script> -->
	<!-- <script src="json/jquery-1.11.3.min.js"></script> -->
	<!-- <script src="json/add_edit_json.js"></script> -->
	<!-- <script src="json/gentel.js"></script> -->

</body>
</html>