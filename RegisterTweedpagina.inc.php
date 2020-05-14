<?php

if (isset($_POST['confirmtoken'])){

    require 'connectingDatabase.php';

    $token = $_POST['token'];
    $email = $_POST['email'];

    $checkToken = $conn->query("SELECT token FROM Email_verification_token WHERE [e-mail] = $email");

    if($checkToken === $token) {


        $resultSet = $conn->query("SELECT veriefied,token FROM Email_verification_token WHERE verified = 0 AND token = '$token' LIMIT 1");

        if ($resultSet->num_rows == 1) {
            $update = $conn->query("UPDATE Email_verification_token SET verified = 1 WHERE token = '$token' LIMIT 1");
            if ($update) {
                header("Location: register.php?email=verified");
            } else {
                $conn->error;
            }
        } else {
            echo "Dit account is niet geldig of al geverifieerd.";
        }

} else{
        die("Je verificatie code komt niet overeen!");
    }
}
