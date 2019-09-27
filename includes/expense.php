<?php 
include('db/db_config.php');
include('functions/functions.php');
$errors = array();
if(array_key_exists('submit', $_POST)){
    
    if(empty($_POST['type1'])) {
            $errors['type1'] = "Please select a type";
        }
        
        if(empty($_POST['item-name'])) {
            $errors['item-name'] = "Please enter an item";
        }

        if(empty($_POST['date'])) {
            $errors['date'] = "Please select a date";
        }

        if($_POST['amount'] != $_POST['amount']) {
            $errors['amount'] = "Please enter an amount";
        }

        if($_POST['description'] != $_POST['description']) {
            $errors['description'] = "Please enter an description";
        }

        if(empty($errors)) {
            
            $clean = array_map('trim', $_POST);

            doAddExpenseItem($conn, $clean);

            $success = "You have successfully added a new expense";

            
        }
    }
    
    $recent_items = getUserItems($conn, $_SESSION['userid']);
 ?>