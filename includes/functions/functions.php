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

function todayExpenses($dbconn, $userid)
{
    $tdate = date('d');
    $mdate = date('m');
    $ydate = date('Y');
    // $stmt = $dbconn->prepare("select c as texpense from userexpense where expense_Date='$tdate' && (user_ID='$userid')");
    $stmt = $dbconn->prepare("select sum(expense_Cost) as texpense from userexpense WHERE DAY(expense_Date) = '$tdate' AND YEAR(expense_Date) = '$ydate' AND MONTH(expense_Date) = '$mdate' AND user_ID = '$userid'");
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_BOTH);
    return $row['texpense'];
}

function weeklyExpenses($dbconn, $userid)
{
    $tdate = date('d');
    $mdate = date('m');
    $ydate = date('Y');
    // $stmt = $dbconn->prepare("select sum(expense_Cost) as weeklyexpense from userexpense where ((expense_Date) between '$pdate' and '$ndate') && (user_ID='$userid')");
    $stmt = $dbconn->prepare("SELECT sum(expense_Cost) AS weeklyexpense FROM userexpense WHERE user_ID ='$userid' AND MONTH(expense_Date) = '$mdate' AND YEAR(expense_Date) = '$ydate' GROUP BY WEEK(expense_Date) limit 1");

    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_BOTH);
    return $row['weeklyexpense'];
}

function deleteExpense($dbconn, $recordid)
{
    $stmt = $dbconn->prepare("DELETE FROM userexpense WHERE userexpense_ID=$recordid");
    $stmt->execute();
    return "Record deleted successfully";
}

function monthlyExpenses($dbconn, $userid)
{
    $monthdate = date("m");
    // $monthdate = preg_replace("'0'", "", $monthdate);
    $stmt = $dbconn->prepare("select sum(expense_Cost) as monthlyexpenses from userexpense where MONTH(expense_Date) = '$monthdate' AND user_ID = '$userid'");
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_BOTH);
    return $row['monthlyexpenses'];
}

function yearlyExpenses($dbconn, $userid)
{
    $nyear = date("Y");
    $stmt = $dbconn->prepare("select sum(expense_Cost) as yearlyexpenses from userexpense where (year(expense_Date)='$nyear') && (user_ID='$userid')");
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_BOTH);
    return $row['yearlyexpenses'];
}

function graphExpenses($dbconn, $userid)
{
    $stmt = $dbconn->prepare("SELECT MONTH(expense_Date) AS iMonths, sum(expense_Cost) AS cost, user_ID as user FROM userexpense WHERE user_ID = $userid GROUP BY MONTH(expense_Date), user_ID");
    $stmt->execute();
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $arr[] = $row;
    }

    return $arr;
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

    $stmt->bindParam(':e', $email['email']);

    $stmt->execute();

    $row = $stmt->fetch(PDO::FETCH_BOTH);

    return $row;

}

function getUserItems($dbconn, $userid)
{
    $arr = [];
    $stmt = $dbconn->prepare("SELECT * FROM userexpense WHERE user_ID=:u ORDER BY expense_Date DESC LIMIT 8");

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
    $stmt = $dbconn->prepare("SELECT * FROM userexpense WHERE user_ID=:u ORDER BY expense_Date DESC");

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
