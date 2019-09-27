<?php

session_start();

include './includes/db/db_config.php';
include './includes/functions/functions.php';

$error = array();

if (array_key_exists('login', $_POST)) {

    if (empty($_POST['email'])) {
        $error['email'] = "Please enter your email";
    }

    if (empty($_POST['password'])) {
        $error['password'] = "Please enter your password";
    } else {
        $msg = "Invalid email/password";
        header("location:login.php?msg=$msg");
    }

    if (empty($error)) {

        $clean = array_map('trim', $_POST);

        $data = userLogin($conn, $clean);

        if ($data[0]) {

            $details = $data[1];

            $_SESSION['userid'] = $details['user_ID'];
            $_SESSION['username'] = $details['username'];

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
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Login Page</title>
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
        <div class="container-fluid">

                <nav class="nav">
                     <a class="navbar-brand" href="index.html">
                       <img src="https://res.cloudinary.com/dzgbjty7c/image/upload/v1569269285/logo_zrn1mx.png" width="30" height="30" class="d-inline-block align-top" alt="">
                       Financial Tracker
                     </a>

                            <ul class="nav justify-content-center md-3">
                              <li class="nav-item active">
                                <a class="nav-link" href="index.php">Home
                                      <span class="sr-only">(current)</span>
                                    </a>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link" href="#">Why Us</a>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link" href="#">Pricing</a>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link" href="#">Contact</a>
                              </li>
                            </ul>

                </nav>

            <div class="row">
                    <div class="col-sm-5 mb-4">
                        <form action="" method="post">
                            <div class="container">
                                <div class="row">
                                  <div class="col text-center">
                                    <a href="#"><button type="button" class="btn btn-outline-primary col-sm-4 mb-4 btn-sm" id="login" disabled>Login</button></a>
                                     <a href="signup.php"><button type="button" class="btn  btn-outline-primary col-sm-4 mb-4 btn-sm"id="signup">SignUp</button></a>
                                  </div>
                                </div>
                              </div>
                              <div class="col-md-12 mb-2">
                  <label for="validationCustom01"></label>
                  <?php $mail = displayErrors($error, 'email');
                  echo $mail;
                  ?>
                                  <input type="email" class="form-control" id="validationCustom01" placeholder="email" value="" title="Enter Your Email" name="email" required>
                                  <div class="invalid-feedback">Please enter your email</div>
                              </div>

                              <div class="col-md-12 mb-2">
                  <label for="validationCustom01"></label>
                  <?php
                  $pass = displayErrors($error, 'password');
                  echo $pass;
                  ?>
                                  <input type="password" class="form-control" id="validationCustom01" placeholder="Password" name="password" title="Password" required>
                                  <div class="invalid-feedback">Please enter a password</div>
                              </div>

                              <div class="col-md-12 mb-2">
                                <input class="btn btn-primary col-md-12 mb-4 text-center" type="submit" name="login" value="Login" id="login_btn">
                </div>
                <div>
                  <a class="text-center" href="password.php">Forgot Password</a>
                </div>
                <br>

                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                  <label class="form-check-label" for="defaultCheck1">
                    Remember Me
                  </label>
                  </div>
                        </form>
                    </div>
                    <div class="col-sm-7 mb-4">
                      <img src="https://res.cloudinary.com/kuic/image/upload/v1569576950/Financial%20tracker/Group_3_mj9elh.png" alt="financial tracker image" class="img-fluid mt-3"> 
                    </div>  
            </div>
        </div>
        <script src="js/signup.js"></script>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>

</html>
