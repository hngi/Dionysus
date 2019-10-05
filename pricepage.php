<?php
include 'includes/db/db_config.php';

include 'includes/functions/functions.php';

 $errors = array();
 

?>
<?php
 //I INITIALIZED MY ERROR ARRAY
   

if(array_key_exists('basic', $_POST)) {

	$sign = "You must be logged in to subscribe to a plan";
    header("location: login.php?sign=$sign");


  
    } 

///////////////////////////////////////////

    
    if(array_key_exists('thrift', $_POST)) {
   

     $sign = "You must be logged in to subscribe to a plan";
    header("location: login.php?sign=$sign");

    } 

///////////////////////////////////////////////////////
    if(array_key_exists('pro', $_POST)) {

    $sign = "You must be logged in to subscribe to a plan";
    header("location: login.php?sign=$sign");

  
    } 

  


    ?>




<!DOCTYPE html>
<html>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- <link rel="stylesheet" type="text/css" href="styles/style.css">
  <link rel="stylesheet" type="text/css" href="css/style.css"> -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="css/pricing.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">	
	
<head>
	<title>Pricing</title>
</head>
<body>
	<div class="container-fluid">
            
		<nav class="navbar navbar-expand-lg navbar-light bg-transparent">
		<a class="navbar-brand" href="index.php"> <img src="https://res.cloudinary.com/dzgbjty7c/image/upload/v1569269285/logo_zrn1mx.png">
			<b style="color: grey; margin-left: 20px;">Financial Tracker</b></a>
	
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarcontent" aria-controls="navbarcontent" aria-expanded="false" aria-label="Toggle Navigation">
		
		<span class="navbar-toggler-icon"></span>
	
	</button>
	
	<div class="collapse navbar-collapse" id="navbarcontent">
		<ul class="navbar-nav ml-auto">
			<li class="nav-item">
				<a class="nav-link" href="index.php"><b>Home</b></a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="#"><b>Why Us</b></a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="pricing.html"><b>Pricing</b></a>
			</li>
			
			<li class="nav-item">
				<a class="nav-link" href="FAQ.html"><b>FAQ</b></a>
			</li>
			
			<li class="nav-item">
				<a class="nav-link" href="contact.html"><b>Contact Us</b></a>
			</li>
			 
					  <li class="invisible">
                                  <img class="image" src=""  alt="..." class="img-thumbnail">
                              </li>
                              <li class="nav-item dropdown invisible">
                                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								  John Doe
                                      </a>
                                  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                      <a class="dropdown-item" href="login.html">Sign Out</a>
                                      <a class="dropdown-item" href="#">Another action</a>
                                      <div class="dropdown-divider"></div>
                                      <a class="dropdown-item" href="#">Something else here</a>
                                  </div>
                              </li>
					</ul>
				  
		</nav>
	<center>
		<table class="table-striped" style="width: 85%;">
			<tr style="border: 1px solid #ddd; margin-bottom: 24px;">
				<td></td>
				<td class="basic" style="background-color: grey; text-align: center; padding-right: 9px; padding-left: 9px;"><h1>Basic</h1></td>
				<td class="basic" style="background-color: gold; text-align: center; padding-right: 9px; padding-left: 9px;"><h1>Thrift</h1></td>
				<td class="basic" style="background-color: silver; text-align: center; padding-right: 9px; padding-left: 9px;"><h1>Pro</h1></td>
			</tr>

			<tr>
				<td></td>
				<td style="text-align: center;"><h2>NGN 500</h2> <br><small>/month</small></td>
				<td style="text-align: center;"><h2>NGN 750</h2> <br><small>/month</small></td>
				<td style="text-align: center;"><h2>NGN 1000</h2> <br><small>/month</small></td>
			</tr>

			<tr>
				<td>Expense Tracker</td>
				<td class="animate" style="text-align: center;">&#10004;</td>
				<td style="text-align: center;">&#10004;</td>
				<td style="text-align: center;">&#10004;</td>
			</tr>

			<tr>
				<td>Expense Limit Reminder</td>
				<td style="text-align: center;">&#10004;</td>
				<td style="text-align: center;">&#10004;</td>
				<td style="text-align: center;">&#10004;</td>
			</tr>

			<tr>
				<td>24/7 Customer Support</td>
				<td style="text-align: center;">&#10004;</td>
				<td style="text-align: center;">&#10004;</td>
				<td style="text-align: center;">&#10004;</td>
			</tr>

			<tr>
				<td>Mobile App</td>
				<td style="text-align: center;">&#10004;</td>
				<td style="text-align: center;">&#10004;</td>
				<td style="text-align: center;">&#10004;</td>
			</tr>

			<tr>
				<td>Bill Tracking</td>
				<td style="text-align: center;">&#10004;</td>
				<td style="text-align: center;">&#10004;</td>
				<td style="text-align: center;">&#10004;</td>
			</tr>

			<tr>
				<td>Reports and Trends</td>
				<td style="text-align: center;">&#10004;</td>
				<td style="text-align: center;">&#10004;</td>
				<td style="text-align: center;">&#10004;</td>
			</tr>

			<tr>
				<td>Email Warning Alerts</td>
				<td style="text-align: center;">&#10060;</td>
				<td style="text-align: center;">&#10004;</td>
				<td style="text-align: center;">&#10004;</td>
			</tr>

			<tr>
				<td>SMS Notifications</td>
				<td style="text-align: center;">&#10060;</td>
				<td style="text-align: center;">&#10060;</td>
				<td style="text-align: center;">&#10004;</td>
			</tr>

			<tr>
				<td>Investments</td>
				<td style="text-align: center;">&#10060;</td>
				<td style="text-align: center;">&#10004;</td>
				<td style="text-align: center;">&#10004;</td>
			</tr>

			<tr>
				<td>Professional Financial Advisor</td>
				<td style="text-align: center;">&#10060;</td>
				<td style="text-align: center;">&#10060;</td>
				<td style="text-align: center;">&#10004;</td>
			</tr>

			<tr>
				<td>Sort Expenses</td>
				<td style="text-align: center;">&#10060;</td>
				<td style="text-align: center;">&#10060;</td>
				<td style="text-align: center;">&#10004;</td>
			</tr>

			<tr>
				<td>Spending Insights</td>
				<td style="text-align: center;">&#10060;</td>
				<td style="text-align: center;">&#10060;</td>
				<td style="text-align: center;">&#10004;</td>
			</tr>

			<tr>
				<td>Tax Calculation</td>
				<td style="text-align: center;">&#10060;</td>
				<td style="text-align: center;">&#10060;</td>
				<td style="text-align: center;">&#10004;</td>
			</tr>

			<tr style="padding-bottom: 5px;">
				<td></td>
				<td><form action="" method="POST"><input type="submit"  value="Choose Basic" target="_blank" class="button btn-success" name="basic" style="height: 59px; border-radius: 3px; width: 100%;"> <input type="hidden" name="amount" value="<?php  ?>"></td>
				<td> <input type="submit"  value="Choose Thrift" target="_blank" class="button btn-success" name="thrift" style="height: 59px; border-radius: 3px; width: 100%;"></td>
				<td> <input type="submit"  value="Choose Pro" target="_blank" class="button btn-success" name="pro" style="height: 59px; border-radius: 3px; width: 100%; background-color: purple;"></td>
			</tr>
		</table>
	</center>
	
<!-- 	<label>By checking the box, you have agreed to our <a href="#">terms and conditions</a></label> -->
	
</div>

<!--<footer class="cd-header flex flex-row flex-center" >
	<ul>
	<li><a href = "FAQ.html"><i class="fa fa-question" ></i> FAQs</a></li>
	<li><a href = "https://boiling-chamber-53204.herokuapp.com/index.php#"> <i class="fa fa-home" ></i>Home</a></li>
	<li><a href = "#"> <i class="fa fa-book" aria-hidden="true"></i>About 	Us</a></li>
	<li><a href = "https://boiling-chamber-53204.herokuapp.com/signup.php"><i class="fa fa-user" aria-hidden="true"></i>Sign Up</a></li>
	<li><a href = "#"><i class="fa fa-twitter-square" ></i> Follow Us on twitter</a></li>
	<li><a href = "#"> <i class="fa fa-facebook-official" ></i> Like us on facebook</a></li>
	<li><a href = "contact.html"> <i class="fa fa-book" aria-hidden="true"></i> contact us</a></li>
	
	</ul>
  </footer>-->
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/bootstrap.bundle.js"></script>
<script type="text/javascript" src="js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
</html>
