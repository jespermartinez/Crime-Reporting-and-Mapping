<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta name="description" content="Neon Admin Panel" />
	<meta name="author" content="" />
	
	<title> Admin Crime System | Login</title>
	

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


	<?php   

            if(isset($_SESSION['adminlogged']) ){

            	echo '<script>document.location.href="admin.php?page=home"</script>';
              
            }else{

              	//echo '<script>document.location.href="index.php"</script>';
                
            }  

    ?>




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
			
			<p class="description">Login your Administrator Account. </p>
			
			<!-- progress bar indicator -->
			<div class="login-progressbar-indicator">
				<h3>43%</h3>
				<span>logging in...</span>
			</div>
			
		</div>
		
	</div>
	
	<div class="login-progressbar" style="background-color: darkblue">
		<div style="background-color: red"></div>
	</div>
	
	<div class="login-form">
		
		<div class="login-content">
			
			<div class="form-login-error" >	
				<i class="entypo-alert" style="background-color: darkblue"></i>
				<h3><b>Invalid login</b></h3>
				<p>Wrong combination of Email and Password</p>
			</div>
			
			<form method="post" role="form" id="form_login">
				
				<div class="form-group">
					
					<div class="input-group">
						<div class="input-group-addon">
							<i class="entypo-mail"></i>
						</div>
						
						<input type="text" class="form-control" id="username" placeholder="E-mail" data-mask="username" autocomplete="off" required="" />
					</div>
					
				</div>
				
				<div class="form-group">
					
					<div class="input-group">
						<div class="input-group-addon">
							<i class="entypo-key"></i>
						</div>
						
						<input type="password" class="form-control" id="password" placeholder="Password" autocomplete="off" required="" />
					</div>
				
				</div>

				
				<div class="form-group">
					<button id="login_process" class="btn btn-primary btn-block btn-login">
						<i class="entypo-login"></i>
						Login
					</button>
				</div>
				
				
			</form>

			
			<div class="login-bottom-links">
				
<!-- 				<a href="extra-forgot-password.html" class="link">Forgot your password?</a> -->
				
				<br />
				
				<a href="register.php">Create Account</a>
				
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
	<script src="assets/js/neon-custom.js"></script>
	<script src="assets/js/neon-demo.js"></script>

<!-- Json for Login -->
	<script src="assets/js/neon-login.js"></script>
<!-- End Json for Login -->	

	<!-- <script src="json/jquery-1.11.0.js"></script> -->
	<!-- <script src="json/jquery-1.11.3.min.js"></script> -->
	<!-- <script src="json/add_edit_json.js"></script> -->
	<!-- <script src="json/gentel.js"></script> -->

</body>
</html>
