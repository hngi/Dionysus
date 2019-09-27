<?php

function doUserRegister($dbconn, $input)
{

    $hash = password_hash($input['password'], PASSWORD_BCRYPT);

    $stmt = $dbconn->prepare("INSERT INTO user(username, email, password) VALUES(:f, :e, :h)");

    $data = [
        ":f" => $input['name'],
        ":e" => $input['email'],
        ":h" => $hash,
    ];

    $stmt->execute($data);
}

function doesEmailExist($dbconn, $email)
{
    $result = false;

    $stmt = $dbconn->prepare("SELECT email FROM user WHERE :e=email");

    $stmt->bindParam(":e", $email);
    $stmt->execute();

    $count = $stmt->rowCount();

    if ($count > 0) {
        $result = true;
    }

    return $result;
}

function doAddExpenseItem($dbconn, $input)
{

    $stmt = $dbconn->prepare("INSERT INTO userexpense(user_ID, expense_Date, expense_Item, expense_Cost, type, description) VALUES(:a, :b, :c, :d, :e, :f)");

    $data = [
        ":a" => $_SESSION['userid'],
        ":b" => $input['date'],
        ":c" => $input['item-name'],
        ":d" => $input['amount'],
        ":e" => $input['type1'],
        ":f" => $input['description'],
    ];

    $stmt->execute($data);
}

function displayErrors($err, $name)
{

    $result = "";

    if (isset($err[$name])) {
        $result = '<span class=err>' . $err[$name] . '</span>';
    }

    return $result;
}

function getUserByEmail($dbconn, $email)
{
    $stmt = $dbconn->prepare("SELECT * FROM user WHERE email=:e");

    $stmt->bindParam(':e', $email);

    $stmt->execute();

    $row = $stmt->fetch(PDO::FETCH_BOTH);

    return $row;

}

function getUserItems($dbconn, $userid)
{
    $arr = [];
    $stmt = $dbconn->prepare("SELECT * FROM userexpense WHERE user_ID=:u ORDER BY expense_Date ASC LIMIT 10");

    $stmt->bindParam(':u', $userid);

    $stmt->execute();
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $arr[] = $row;
    }

    return $arr;

}

function getAllUserItems($dbconn, $userid)
{
    $arr = [];
    $stmt = $dbconn->prepare("SELECT * FROM userexpense WHERE user_ID=:u ORDER BY expense_Date ASC");

    $stmt->bindParam(':u', $userid);

    $stmt->execute();
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $arr[] = $row;
    }

    return $arr;

}

function emailDoesNotExist($dbconn, $email)
{
    $result = false;

    $stmt = $dbconn->prepare("SELECT email FROM user WHERE :e=email");

    $stmt->bindParam(":e", $email);
    $stmt->execute();

    $count = $stmt->rowCount();

    if ($count == 0) {
        $result = true;
    }

    return $result;
}

function updatePassword($dbconn, $input)
{

    $hash = password_hash($input['password'], PASSWORD_BCRYPT);

    $stmt = $dbconn->prepare("UPDATE user SET password=:pass WHERE user_ID=:uid");

    $data = [

        ":uid" => $input['user_id'],
        ":pass" => $hash,
    ];

    $stmt->execute($data);
}

function userLogin($dbconn, $input)
{

    $result = [];

    $stmt = $dbconn->prepare("SELECT * FROM user WHERE email=:e");

    $stmt->bindParam(':e', $input['email']);
    $stmt->execute();

    $count = $stmt->rowCount();
    $row = $stmt->fetch(PDO::FETCH_BOTH);

    if ($count != 1 || !password_verify($input['password'], $row['password'])) {
        $result[] = false;
    } else {
        $result[] = true;
        $result[] = $row;
    }
    return $result;
}
