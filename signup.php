<?php 

include('./includes/db/db_config.php');
include('./includes/functions/functions.php');
$errors = array();
if(array_key_exists('submit', $_POST)){
    
    if(empty($_POST['name'])) {
            $errors['name'] = "Please enter your full name";
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

            echo "Registration successful";
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
        <link rel="stylesheet" type="text/css" href="css/style.css">
        
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>
    <body>
        <div class="container-fluid">
            
                <nav class="navbar navbar-expand-lg bg-transparent static-top">
                                <div class="container-fluid">
                                  <a class="navbar-brand" href="#">
                                        <img src="https://res.cloudinary.com/dzgbjty7c/image/upload/v1569269285/logo_zrn1mx.png" alt=""><b style="color: rgba(0, 0, 0, 0.51);">FINANCIAL TRACKER</b>
                                      </a>
                                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation" style="background-color: transparent; top: 15px; float: right; ">
                                        <span class="navbar-toggler-icon"></span>
                                      </button>
                                  <div class="collapse navbar-collapse" id="navbarResponsive">
                                    <ul class="navbar-nav ml-auto">
                                      <li class="nav-item active">
                                        <a class="nav-link" href="#" style="color: rgba(0, 0, 0, 0.51);">Home
                                              <span class="sr-only">(current)</span>
                                            </a>
                                      </li>
                                      <li class="nav-item">
                                        <a class="nav-link" href="#" style="color: rgba(0, 0, 0, 0.51);">Why Us</a>
                                      </li>
                                      <li class="nav-item">
                                        <a class="nav-link" href="#" style="color: rgba(0, 0, 0, 0.51);">Pricing</a>
                                      </li>
                                      <li class="nav-item">
                                        <a class="nav-link" href="#" style="color: rgba(0, 0, 0, 0.51);">Contact</a>
                                      </li>
                                    </ul>
                                  </div>
                                </div>
                              </nav>
                          
                </nav>

            <div class="row">
                    <div class="col-sm-5 mb-4">
                        <form class="col text-center" action="" method="post" style="top: 5px;"> 
                            <div class="container">
                                <div class="row">
                                  <div class="col text-center">

                                   <!--     <button type="button" class="btn btn-outline-primary col-sm-4 mb-4 btn-sm" id="login">Login</button>
                                      <button type="button" class="btn  btn-outline-primary col-sm-4 mb-4 btn-sm" id="signup" value="SignUp"> SignUp</button> -->
                                  </div>
                                </div>
                              </div>
                              <?php 
                            $data = displayErrors($errors, 'name');
                            echo $data;
                              ?>
                            <div class="err">
                            <input class="col-sm-10" type="text" placeholder="Full Name" title="Your Full Name" name="name">
                            </div>

                            <?php 
                            $data = displayErrors($errors, 'email');
                            echo $data;
                              ?>
                              <div class="err">
                            <input class="col-sm-10" type="email" placeholder="Email Address" title="Enter Your Email Address" name="email">
                              </div>

                            <?php 
                            $data = displayErrors($errors, 'password');
                            echo $data;
                              ?>
                              <div class="err">
                            <input class="col-sm-10" type="password" placeholder="Password" name="password">
                              </div>

                            <?php 
                            $data = displayErrors($errors, 'pword');
                            echo $data;
                              ?>

                            <div class="err">
                            <input class="col-sm-10" type="password" placeholder="Confirm Password" name="pword">
                            </div>

                            <input class="btn col-sm-10 btn-outline-primary" type="submit" placeholder="Confirm Password" name="submit">
                            
                          </form>

                    </div>
                    
                    
            </div>
        </div>
    </body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/bootstrap.bundle.js"></script>
<script type="text/javascript" src="js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
</html>