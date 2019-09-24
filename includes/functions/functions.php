<?php

      function doUserRegister($dbconn, $input) {

        $hash = password_hash($input['password'], PASSWORD_BCRYPT);

        $stmt = $dbconn->prepare("INSERT INTO user(full_Name, email, password) VALUES(:f, :e, :h)");

        $data = [
            ":f" => $input['name'],
            ":e" => $input['email'],
            ":h" => $hash
        ];

        $stmt->execute($data);
    }

    function doesEmailExist($dbconn, $email) {
        $result = false;

        $stmt = $dbconn->prepare("SELECT email FROM user WHERE :e=email");

        $stmt->bindParam(":e", $email);
        $stmt->execute();

        $count = $stmt->rowCount();

        if($count > 0) {
            $result = true;
        }

        return $result;
    }

    function displayErrors($err, $name) {

        $result = "";

        if(isset($err[$name])) {
            $result = '<span class=err>'.$err[$name].'</span>';
        }

        return $result;
    }

   
 

?>