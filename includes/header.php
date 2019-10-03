<?php
session_start();

if (!isset($_SESSION['userid'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
}

if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['userid']);
    header("location: login.php");
}

?>

<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Financial Tracker - Dashboard</title>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <meta name="description" content="Financial Tracker Web App">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="styles/style2.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
</head>

<body>


    <nav class="navbar navbar-expand-lg navbar-light bg-transparent">

        <a class="navbar-brand" href="#"> <img src="https://res.cloudinary.com/dzgbjty7c/image/upload/v1569269285/logo_zrn1mx.png">
            <b style="color: grey; margin-left: 20px;">Financial Tracker</b></a>
    
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarcontent" aria-controls="navbarcontent" aria-expanded="false" aria-label="Toggle Navigation">
        
        <span class="navbar-toggler-icon"></span>
    
    </button>
    
    <div class="collapse navbar-collapse" id="navbarcontent">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="#"><b>Home</b></a>
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

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <?php echo $_SESSION['username']; ?>
                    </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="dashboard.php?logout='1'" id="logout">Sign Out</a>
                    <a class="dropdown-item" href="#">Update Profile</a>
                </div>
            </li>
        </ul>

    </nav>
