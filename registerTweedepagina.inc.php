<?php

if (isset($_POST['confirmtoken'])) {

    require 'connectingDatabase.php';

    $token = $_POST['token'];
    $email = $_POST['email'];

    if (empty($email) || empty($token)) {
        header("Location: registerVoorpagina.php?error=emptyfields");
        exit();
    }  else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: registerVoorpagina.php?error=emailinvalid");
    }


    if (checkTokenMatch($email, $conn, $token)) {
        if (checkDateToken($conn, $email)) {
            if (checkAlreadyVerified($conn, $email)) {
                $resultSet = $conn->query("SELECT verified,token FROM Email_verification_token WHERE verified = 0 AND token = '$token'");

                if ($resultSet) {
                    $update = $conn->query("UPDATE Email_verification_token SET verified = 1 WHERE token = '$token'");
                    if ($update) {
                        header("Location: register.php?succes=verified&email=$email");
                    } else {
                        echo "Er is een probleem met het verbinden met onze server!";
                    }
                } else {
                    header("Location: registerTweedepagina.php?error=invalid");
                }
            }
            else{
                header("Location: login.php?error=alreadyverified");
            }
        }
        else{
            $sql = "DELETE FROM Email_verification_token WHERE email=:email";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':email', $email);
            $stmt->execute();
            header("Location: registerTweedepagina.php?error=expired");
        }
    }
           else {
        header("Location: registerTweedepagina.php?error=nomatch");
    }
}
function checkTokenMatch ($email, $conn, $token_to_check) {
    $sql = ("SELECT token FROM Email_verification_token WHERE [e-mail]= :email AND token= :token");
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':token', $token_to_check);
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
    $sql = ("SELECT token_date FROM Email_verification_token WHERE [e-mail]= :email");
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_COLUMN, 0);
    date_add($result[0], date_interval_create_from_date_string('4 hours'));
    if($result[0] < getdate()) {
        return true;
    }
    else {
        return false;
    }
}

function checkAlreadyVerified ($conn, $email){
    $sql = ("SELECT verified FROM Email_verification_token WHERE [e-mail]= :email AND verified= 1");
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_COLUMN, 0);
    if($result[0] < 1) {
        return true;
    }
    else {
        return false;
    }
}