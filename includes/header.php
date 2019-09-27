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


    <nav class="nav">
        <a class="navbar-brand" href="#">
            <img src="https://res.cloudinary.com/dzgbjty7c/image/upload/v1569269285/logo_zrn1mx.png" width="30" height="30" class="d-inline-block align-top" alt=""> Financial Tracker
        </a>

        <ul class="nav justify-content-center">
            <li class="nav-item">
                <a class="nav-link" href="#">Why Us</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Pricing</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Contact</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-user-circle"><?php echo $_SESSION['username']; ?>
                    </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="dashboard.php?logout='1'" id="logout">Sign Out</a>
                    <a class="dropdown-item" href="#">Update Profile</a>
                </div>
            </li>
        </ul>

    </nav>
