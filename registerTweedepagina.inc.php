<?php

if (isset($_POST['confirmtoken'])) {

    require 'connectingDatabase.php';

    $token = $_POST['token'];
    $email = $_POST['email'];


    if (checkTokenMatch($email, $conn, $token) && !checkDateToken ($conn, $email)) {

        $resultSet = $conn->query("SELECT verified,token FROM Email_verification_token WHERE verified = 0 AND token = '$token'");

        if ($resultSet) {
            $update = $conn->query("UPDATE Email_verification_token SET verified = 1 WHERE token = '$token'");
            if ($update) {
                header("Location: register.php?email=$email");
            } else {
                echo "Er is een probleem met het verbinden met onze server!";
            }
        } else {
            echo "Dit account is niet geldig of al geverifieerd.";
        }

    } else {
        die("Je verificatie code komt niet overeen!");
    }
}
function checkTokenMatch ($email, $conn, $token_to_check) {
    $sql = ("SELECT token FROM Email_verification_token WHERE [e-mail]='$email'");
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(1, $token_to_check);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_COLUMN, 0);
    if($result[0] === $token_to_check) {
        return true;
    }
    else {
        return false;
    }
}

function checkDateToken ($conn, $email){
    $sql = ("SELECT token_date FROM Email_verification_token WHERE [e-mail]='$email'");
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_COLUMN, 0);
    date_add($result[0], date_interval_create_from_date_string('4 hours'));
    if($result[0] > getdate()) {
        return true;
    }
    else {
        return false;
    }
}