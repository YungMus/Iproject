<?php

if (isset($_POST['confirmtoken'])){

    require 'connectingDatabase.php';

    $token = $_POST['token'];
    $email = $_POST['email'];

    $sql = ("SELECT token FROM Email_verification_token WHERE [e-mail]='$email'");
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(1, $token);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_COLUMN, 0);

    if($result[0] === $token) {

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

} else{
        die("Je verificatie code komt niet overeen!");
    }
}

