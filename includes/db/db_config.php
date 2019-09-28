<?php

    // define('DBNAME', 'financialtracker');
    // define('DBUSER', 'root');
    // define('DBPASS', '');

    // try{

    // $conn = new PDO('mysql:host=localhost;dbname='.DBNAME, DBUSER, DBPASS);

    // $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_SILENT);

    // } catch(PDOException $err) {

    //     echo $err->getMessage();
    // }

    $url = parse_url(getenv("CLEARDB_DATABASE_URL"));
    $server = $url["host"];
    $username = $url["user"];
    $password = $url["pass"];
    $dbname = substr($url["path"], 1);
    $conn = new mysqli($server, $username, $password, $dbname);


?>