<?php 

include('./includes/db/db_config.php');
include('./includes/functions/functions.php');
$errors = array();
if(array_key_exists('submit', $_POST)){
    
    if(empty($_POST['name'])) {
            $errors['name'] = "Please enter your user name";
        }
        

        if(empty($_POST['email'])) {
            $errors['email'] = "Please enter your email";
        }

       
        if(doesEmailExist($conn, $_POST['email'])) {
            $errors['email'] = "Email already exists";
            
        }

        if(empty($_POST['password'])) {
            $errors['password'] = "Please enter your password";
        }

        if(empty($_POST['pword'])) {
            $errors['pword'] = "Please confirm your password";
        }

        if($_POST['password'] != $_POST['pword']) {
            $errors['pword'] = "Passwords do not match";
        }

        if(empty($errors)) {
            
            $clean = array_map('trim', $_POST);

            doUserRegister($conn, $clean);

            $success = "Registration successful | Kindly login to continue";
            header("location:login.php?success=$success");
        }
    }


 ?>








<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Sign Up Page</title>
        <meta name="description" content="Financial Tracker Web App">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="css/bootstrap-grid.css">
        <link rel="stylesheet" type="text/css" href="css/bootstrap-reboot.css">
        <link rel="stylesheet" type="text/css" href="css/bootstrap-reboot.min.css">
        <link rel="stylesheet" type="text/css" href="styles/style.css">
        
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>
    <body>

    <?php if(isset($success))  echo $success  ?>
        <div class="container-fluid">
            
                <nav class="navbar navbar-expand-lg navbar-light bg-transparent">

                            <a class="navbar-brand" href="#"> <img src="https://res.cloudinary.com/dzgbjty7c/image/upload/v1569269285/logo_zrn1mx.png">
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
                                <a class="nav-link" href="#"><b>Pricing</b></a>
                              </li>

                              <li class="nav-item">
                                <a class="nav-link" href="contact.html"><b>Contact Us</b></a>
                              </li>

                              <li class="nav-item dropdown invisible">
                                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    John Doe
                                      </a>
                                  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                      <a class="dropdown-item" href="login.html">Sign Out</a>
                                      <a class="dropdown-item" href="#">Update profile</a>
                                  </div>
                              </li>
                            </ul>
                          
                </nav>

            <div class="row">
                    <div class="col-sm-5 mb-4">
                        <form class="col text-center needs-validation" novalidate onsubmit="validate()" method="POST"> 
                            <div class="container">
                                <div class="row">
                                  <div class="col text-center">
                                    <a href="login.php"><button type="button" class="btn btn-outline-primary col-sm-4 mb-4 btn-sm" id="login">Login</button></a>
                                     <a href="#"><button type="button" class="btn  btn-outline-primary col-sm-4 mb-4 btn-sm" disabled id="signup">SignUp</button></a>
                                  </div>
                                </div>
                              </div>
                              <div class="col-md-12 mb-3 input-group">
                                  <div class="input-group-prepend">
                                      <span class="input-group-text" id="basic-addon1" style="background-color: none !important;"><i class="fas fa-user"></i></span>
                                  </div>
                                  <label for="validationCustom01"></label>
                                  <input type="text" name="name" class="form-control" id="validationCustom01" placeholder="Username" value="" title="Enter Your Username" required>
                                  <div class="invalid-feedback">Please enter a Username</div>
                              </div>
                              <?php 
                            $data = displayErrors($errors, 'email');
                            echo $data;
                              ?>
                              <div class="col-md-12 mb-3">
                                  <label for="validationCustom01"></label>
                                  <div class="input-group-prepend">
                                      <span class="input-group-text" id="basic-addon1"><i class="fas fa-envelope"></i></span>
                                  <input type="email" class="form-control" id="validationCustom01" placeholder="Email" value="" title="Enter Your Email" name="email" required></div>
                                  <div class="invalid-feedback">Please enter your email</div>
                              </div>
                              <div class="col-md-12 mb-3 input-group">
                                  <label for="validationCustom01"></label>
                                  <div class="input-group-prepend">
                                      <span class="input-group-text" id="basic-addon1" style="background-color: none !important;"><i class="fas fa-lock"></i></span>
                                  </div>
                                  <input type="password" class="form-control" name="password" id="validationCustom01" placeholder="Password" value="" title="Password" required>
                                  <div class="invalid-feedback">Please enter a password</div>
                              </div>

                              <?php 
                            $data = displayErrors($errors, 'pword');
                            echo $data;
                              ?>
                              <div class="col-md-12 mb-3 input-group">
                                  <label for="validationCustom01"></label>
                                  <div class="input-group-prepend">
                                      <span class="input-group-text" id="basic-addon1" style="background-color: none !important;"><i class="fas fa-lock"></i></span>
                                  </div>
                                  <input type="password" class="form-control" name="pword" id="validationCustom01" placeholder="Confirm Password" value="" title="Confirm Password" required>
                                  <div class="invalid-feedback">Please confirm your password</div>
                              </div>
                              <div class="col-md-12 mb-2">
                                <button class="btn btn-primary col-md-12 mb-4 text-center" name="submit" type="submit" >Sign up</button>
                              </div>
                              <p class="text-center mb-4">OR</p>
                              <div class="col-md-12 mb-2">
                                <button class="btn btn-primary col-md-12 mb-4 text-center btn-danger" name="submit" type="submit"><span class="btn-label p-2"><i class="fab fa-google-plus-g"></i></span>SignUp with Google</button>
                              </div>
                        </form>
                    </div>
                    <div class="col-sm-7 mb-4">
                        <img src="https://res.cloudinary.com/kuic/image/upload/v1569576950/Financial%20tracker/Group_3_mj9elh.png" alt="financial tracker image" class="img-fluid mt-3"> 
                    </div>  
            </div>
        </div>
        <script src="js/signup.js"></script>
        <script src="https://kit.fontawesome.com/85682eb992.js" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>

</html>
