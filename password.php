<?php 
include('./includes/db/db_config.php');
include('./includes/functions/functions.php');
$errors = array();

//Validates email and checks to see if email exists upon submit
if(array_key_exists('submit', $_POST)){
    

        if(empty($_POST['email'])) {
            $errors['email'] = "Please enter your email";
        }

       
        if(emailDoesNotExist($conn, $_POST['email'])) {
          $errors['email'] = "Email does not exist";
            
        }


          // Retrieves user email and user ID
        $user = getUserByEmail($conn, $_POST);

         $show = $user[0];
           $email = $user[2];
          

          if(empty($errors)) {

            // Sends email to user with password recovery link using mail function
            
             $message = "E be like say you dun forget your password. If this na mistake, just ignore this email and nothing go happen.\r\n". "To reset your password, Follow this link: http://dionysus.6te.net/password_reset.php?user=$show";
            $to = $email;
             $email_subject = "Password Recovery";
            $headers =  'MIME-Version: 1.0' . "\r\n";
            $headers.= 'From: Team Dionysus'."\r\n";
            $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
            $headers.='Reply-To: $email_address'."\r\n";
            mail($to, $email_subject, $message, $headers);



           $sent = " Password recovery instructions has been successfully forwarded to your mail";
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
                     <a class="navbar-brand" href="index.php">
                       <img src="https://res.cloudinary.com/dzgbjty7c/image/upload/v1569269285/logo_zrn1mx.png" width="30" height="30" class="d-inline-block align-top" alt="Financial Tracker logo">
                       Financial Tracker
                     </a>
                     
                            <ul class="nav justify-content-center mt-3">
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

            <div class="row">
                    <div class="col-sm-5 mb-4">
                        <form class="col text-center needs-validation" action="" novalidate onsubmit="validate()" method="POST"> 
                            <div class="container">
                                <div class="row">
                                  <div class="col text-center">
                                    <a href="login.php"><button type="button" class="btn btn-outline-primary col-sm-4 mb-4 btn-sm" id="login">Login</button></a>
                                     <a href="signup.php"><button type="button" class="btn  btn-outline-primary col-sm-4 mb-4 btn-sm disabled"id="signup">SignUp</button></a>
                                  </div>
                                </div>
                              </div>
                              <p class="text-center">Please enter your email address to recover your password </p>

                              <?php 
                                          $data = displayErrors($errors, 'email');
                                          echo $data;


                                          if(isset($sent))  echo $sent;


                                   ?> 

                                 
                              <div class="col-md-12 mb-2">
                                  <label for="validationCustom01"></label>
                                  <input type="email" class="form-control" id="validationCustom01" placeholder="Email" value="" title="Enter Your Email" name="email" required>
                                  
                                  <div class="invalid-feedback"> Please enter your email address </div>
                              </div>
                              <div class="col-md-12 mb-2">
                                <button class="btn btn-primary col-md-12 mb-4 text-center" type="submit" name="submit" id="submit" data-toggle="modal" data-target="#exampleModal">Send</button>
                                <div>
                 <!--  <a class="text-left" href="alt_passwordreset.php">Click here if you could not receive a mail</a> -->
                </div>
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
