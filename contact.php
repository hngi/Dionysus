<?php
namespace SendGrid;

require 'vendor/autoload.php';
include './includes/db/db_config.php';
include './includes/functions/functions.php';
require "./includes/sendgrid-php/sendgrid-php.php";
use SendGrid\Mail\Content;
use SendGrid\Mail\From;
use SendGrid\Mail\Mail;
use SendGrid\Mail\Personalization;
use SendGrid\Mail\To;

$errors = array();

//Validates email and checks to see if email exists upon submit
if (array_key_exists('submit', $_POST)) {

    if (empty($_POST['fullname'])) {
        $errors['fullname'] = "Please enter your Full Name";
    }

    if (empty($_POST['email'])) {
        $errors['email'] = "Email does not exist";
    }
    if (empty($_POST['subject'])) {
        $errors['subject'] = "Please enter a subject";
    }

    if (empty($_POST['messagebox'])) {
        $errors['messagebox'] = "Please enter a message";
    }
    if (empty($errors)) {
        function resetPasswordEmail()
        {
            try {
                $subject1 = $_POST['subject'];
                $email = $_POST['email'];
                $messagebox = $_POST['messagebox'];
                $fullname = $_POST['fullname'];
                $message = "We have received your message from our contact page we will get back to you within 24hr <br> Full Name: $fullname <br> Email: $email <br> Message: $messagebox <br> ";
                $from = new From("contact@dionysus-team.com", "contact@dionysus-team.com");
                $subject = $subject1;
                $to = new To($email, $email);
                $content = new Content("text/html", $message);
                $mail = new Mail($from, $to, $subject, $content);
                $personalization = new Personalization();
                $personalization->addTo(new To("dionysus123@gmail.com", "dionysus123@gmail.com"));
                $mail->addPersonalization($personalization);
                return $mail;
            } catch (\Exception $e) {
                echo $e->getMessage();
            }
            return null;
        }

        $sent = "";
        function sendResetPasswordEmail()
        {
            $apiKey = getenv('SENDGRID_API_KEY');
            $sg = new \SendGrid($apiKey);
            $request_body = resetPasswordEmail();

            try {
                global $sent;
                $response = $sg->client->mail()->send()->post($request_body);
                header("location:ThankYou.html");
            } catch (Exception $e) {
                echo 'Caught exception: ', $e->getMessage(), "\n";
            }
        }
        sendResetPasswordEmail();
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
        <title>Contact Us Page</title>
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
                    <a class="nav-link" href="pricing.php"><b>Pricing</b></a>
                    </li>
                  <li class="nav-item">
                    <a class="nav-link" href="FAQ.html"><b>FAQs</b></a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#"><b>Contact Us</b></a>
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
              </div>
          </nav>


            <div class="row">
                    <div class="col-sm-5 mb-4">
                        <form class="col text-center needs-validation" action="" novalidate onsubmit="validate()" method="POST"> 
                          <div class="row d-flex justify-content-center">
                            <h3 class="white-text mb-3  font-weight-bold">Contact Us</h3>
                           </div>
                           <p class="text-center">Enquiry,Comments and Suggestions</p>
                                         
                              <div class="col-md-12 mb-3 input-group">
                                  <div class="input-group-prepend">
                                      <span class="input-group-text" id="basic-addon1" style="background-color: none !important;"><i class="fas fa-user"></i></span>
                                  </div>
                                  <label for="validationCustom01"></label>
                                  <input type="text" class="form-control" id="validationCustom01" placeholder="Name" value="" title="Enter Your Name" minlength="3" maxlength="20" name="fullname" required>
                                  <div class="invalid-feedback">Please enter your Name</div>
                              </div>

                              <div class="col-md-12 mb-3 input-group">
                                  <div class="input-group-prepend">
                                      <span class="input-group-text" id="basic-addon1"><i class="fas fa-envelope"></i></span>
                                  </div>
                                  <label for="validationCustom01"></label>
                                  <input type="email" class="form-control" id="validationCustom02" placeholder="Email" value="" title="Enter Your Email" name="email" required>
                                  <div class="invalid-feedback">Please enter your Email</div>
                              </div>

                              <div class="col-md-12 mb-3 input-group">
                                  <div class="input-group-prepend">
                                      <span class="input-group-text" id="basic-addon1"><i class="fas fa-tag"></i></span>
                                  </div>
                                  <label for="validationCustom01"></label>
                                  <input type="text" class="form-control" id="validationCustom01" placeholder="Subject" value="" title="Message Subject"m minlength="2" maxlength="20" name="subject" required>
                                  <div class="invalid-feedback">Please enter Subject of Message</div>
                              </div>

                              <div class="form-group required-field-block">       
                                  <div class="col-md-12 input-group">
                                      <span class="input-group-text" id="basic-addon1"><i class="fas fa-pencil-alt"></i></span>
                                      <textarea rows="7" size="30" value="" class="form-control" placeholder="Message" title="Message"  minlength="30" name="messagebox" required></textarea>
                                      <div class="invalid-feedback">Message should be 30 Chracters or more</div>       
                                  </div>
                              </div>

                              <div class="col-md-12">
                              <button class="btn btn-primary col-md-12 mb-4 text-center" type="submit" name="submit" id="submit" data-toggle="modal" data-target="#exampleModal" onclick="return sendHelloEmail();">Send</button>
                              </div>
                        </form>
                    </div>
                    <div class="col-sm-7 mb-4">
                        <img src="https://res.cloudinary.com/kuic/image/upload/v1569576950/Financial%20tracker/Group_3_mj9elh.png" alt="financial tracker image" class="img-fluid mt-3"> 
                    </div>   
            </div>
        </div>

        <!---
        <footer class="cd-header flex flex-row flex-center" >
          <ul>
          <li><a href = "FAQ.html"><i class="fa fa-question" ></i> FAQs</a></li>
          <li><a href = "https://boiling-chamber-53204.herokuapp.com/index.php#"> <i class="fa fa-home" ></i>Home</a></li>
          <li><a href = "#"> <i class="fa fa-book" aria-hidden="true"></i>About 	Us</a></li>
          <li><a href = "https://boiling-chamber-53204.herokuapp.com/signup.php"><i class="fa fa-user" aria-hidden="true"></i>Sign Up</a></li>
          <li><a href = "#"><i class="fa fa-twitter-square" ></i> Follow Us on twitter</a></li>
          <li><a href = "#"> <i class="fa fa-facebook-official" ></i> Like us on facebook</a></li>
          <li><a href = "contact.php"> <i class="fa fa-book" aria-hidden="true"></i> contact us</a></li>
          
          </ul>
          </footer>-->
        <script src="https://kit.fontawesome.com/85682eb992.js" crossorigin="anonymous"></script>
        <script src="js/signup.js"></script>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>

</html>