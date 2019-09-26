<?php

	session_start();
	
	include('./includes/db/db_config.php');
include('./includes/functions/functions.php');

	$error = array();

	if(array_key_exists('login', $_POST)) {

		if(empty($_POST['email'])) {
			$error['email'] = "Please enter your email";
		}

		if(empty($_POST['password'])) {
			$error['password'] = "Please enter your password";
		} else {
			$msg = "Invalid email/password";
			header("location:login.php?msg=$msg");
		}

		if(empty($error)) {

			$clean = array_map('trim', $_POST);

			$data = userLogin($conn, $clean);

			if($data[0]) {

				$details = $data[1];

				$_SESSION['userid'] = $details['user_ID'];
				$_SESSION['name'] = $details['full_Name'];

				header("location:dashboard.php");
			} else {
				$message = "Invalid email/password";
				header("location.php?mess=$message");
			}

			/* if(validateLogin($conn, $_POST['email'], $_POST['password'])) {
				header("location:sandview.php");
				//echo "Hello";
			} else {
				echo "Wrong email/password";
			} */
		}
	}

?>

<!DOCTYPE html>
<html>
    
<head>
    <title>LOGIN PAGE </title>
    <meta charset="utf-8">
<meta name="description" content="Financial Tracker Web App">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/bootstrap-grid.css">
  <link rel="stylesheet" type="text/css" href="css/bootstrap-reboot.css">
  <link rel="stylesheet" type="text/css" href="css/bootstrap-reboot.min.css">
   <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
    
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->
	<link rel="stylesheet" href="login.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        

</head>

<body onload="myFunction()">
															<nav class="navbar navbar-expand-lg bg-transparent static-top">
															  <div class="container-fluid">
															    <a class="navbar-brand" href="#">
															          <img src="https://res.cloudinary.com/dzgbjty7c/image/upload/v1569269285/logo_zrn1mx.png" alt=""><b style="color: rgba(3, 3, 3, 0.59);">FINANCIAL TRACKER</b>
															        </a>
															    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation" style="background-color: transparent; position: absolute; top: 5px ; float: right; ">
															          <span class="navbar-toggler-icon"></span>
															        </button>
															    <div class="collapse navbar-collapse" id="navbarResponsive">
															      <ul class="navbar-nav ml-auto">
															        <li class="nav-item active">
															          <a class="nav-link" href="#" style="color: rgba(3, 3, 3, 0.59);">Home
															                <span class="sr-only">(current)</span>
															              </a>
															        </li>
															        <li class="nav-item">
															          <a class="nav-link" href="#" style="color: rgba(3, 3, 3, 0.59);">Why Us</a>
															        </li>
															        <li class="nav-item">
															          <a class="nav-link" href="#" style="color: rgba(3, 3, 3, 0.59);">Pricing</a>
															        </li>
															        <li class="nav-item">
															          <a class="nav-link" href="#" style="color: rgba(3, 3, 3, 0.59);">Contact</a>
															        </li>
															      </ul>
															    </div>
															  </div>
															</nav>
    
   <!-- <span> <div class = "img-logo"><a href = "#"><img src = "logo.png"/> <strong>Financial Tracker</a></strong></div></span> <nav><span class = "nav space"></span><span class = "nav space"></span><span class = "nav"><strong><a href = "#">Pricing </a></strong></span><span class = "nav space"></span> <span class = "nav"><strong><a href = "#">Why Us</a></strong></span><span class = "nav space"></span><span class = "nav"><strong><a href = "#">Contact</a></strong></span> <span class = "nav space"></span>  <span class = "nav space"> </span>  <span class = "nav space "></span>   <span class = "nav"><strong></strong></span></nav> -->



	<div>
		<div class="d-flex justify-content-left h-100">
			<div class="user_card">
				<div class="d-fle justify-content-center">
					<h6 style="color: rgba(3, 3, 3, 0.59); padding-left: 20px;">You are welcome to your financial tracker on this lovely <span id = "demo"></span> , how can we help you today?</h6>
					
				</div>
				<div class="d-flex justify-content-center form_container">
					
					
					<form action="" method="post">
						
							<!-- <span  class = "btn btn-primary">Login</span>  <span class="space"></span>           <span  class = "btn btn-primary">  Sign-up</span> -->
						<!-- <br>
						<br>
						<hr> -->
							<div class="input-group mb-3">
					
							<div class="input-group-append">
								<span class="input-group-text"><i class="fas fa-user"></i></span>

							</div>
									<?php  
											$mail = displayErrors($error, 'email');
											echo $mail;
										?>
							<input type="email" name="email" class="form-control input_user input" value="" placeholder="email">
						</div>
						<div class="input-group mb-2">

							<div class="input-group-append">
								<span class="input-group-text"><i class="fas fa-key"></i></span>
							</div>
													<?php
													     $pass = displayErrors($error, 'password');
															echo $pass;
														?>
							<input type="password" name="password" class="form-control input_pass input" value="" placeholder="password">
                        </div>
                        <div class=" justify-content-center links">
                               <span class = "space"></span> <a href="#"  style="color: rgba(3, 3, 3, 0.59);">Forgot password?</a>
							<div></div>
							</div>
							
						<div class="form-group">
							<div class="custom-control custom-checkbox">
								<input type="checkbox" class="custom-control-input" id="customControlInline">
								<label class="custom-control-label" for="customControlInline"> <br><center> Remember me </center></label>
							</div>
						</div>

						<div class="input-group mb-2">
								
								<input type="submit" name="login" class="form-control input_pass input btn" value="Login"  id = "login_btn">
			
							</div>
							
				
			</form>
			
				
			</div>
			</div>
		</div>
	</div>

	<script src = "days.js"></script>
</body>
</html>