<?php

if (isset($_POST['confirmtoken'])) {

    require 'connectingDatabase.php';

    $token = $_POST['token'];
    $email = $_POST['email'];

    if (empty($email) || empty($token)) {
        header("Location: registerTweedepagina.php?error=emptyfields&email=$email");
        exit();
    }

    if (checkMailValid($conn, $email)) {
        if (checkTokenMatch($conn, $token, $email)) {
            if (checkDateToken($conn, $email)) {
                if (checkAlreadyVerified($conn, $email)) {
                    $resultSet = $conn->query("SELECT verified,token FROM Email_verification_token WHERE verified = 0 AND token = '$token'");

                    if ($resultSet) {
                        $update = $conn->query("UPDATE Email_verification_token SET verified = 1 WHERE token = '$token'");
                        if ($update) {
                            header("Location: register.php?success=verified&email=$email");
                            exit();
                        } else {
                            echo "Er is een probleem met het verbinden met onze server!";
                        }
                    } else {
                        header("Location: registerTweedepagina.php?error=invalid&email=$email");
                        exit();
                    }
                }
            }
        }
    }
}

function checkTokenMatch ($conn, $token_to_check, $email) {
    $sql = ("SELECT token FROM Email_verification_token WHERE token= :token");
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':token', $token_to_check);
    $stmt->execute();
    $result = $stmt->fetchAll();
    if($result[0]['token'] != $token_to_check) {
        header("Location: registerTweedepagina.php?error=nomatch&email=$email");
        exit();
    }
    if($stmt){
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
    $result = $stmt->fetchAll();
    $date = $result[0][0];
    $time = strtotime($date);
    date_add($time, date_interval_create_from_date_string("4 hours"));
    if($result[0][0] > getdate()) {
        $sql = "DELETE FROM Email_verification_token WHERE email=:email";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        header("Location: registerTweedepagina.php?error=expired&email=$email");
        exit();
    }
    if($stmt){
        return true;
    }
    else {
        return false;
    }
}

function checkMailValid ($conn, $email){
    $sql = "SELECT [e-mail] FROM Email_verification_token WHERE [e-mail]= :email";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    $results = $stmt->fetchAll();
    if($results[0][0] != $email){
        header("Location: registerTweedepagina.php?error=emailinvalid&email=$email");
        exit();
    }
    if($stmt){
        return true;
    } else{
        return false;
    }
}

function checkAlreadyVerified ($conn, $email){
    $sql = ("SELECT verified FROM Email_verification_token WHERE [e-mail]= :email");
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_COLUMN, 0);
    if($result[0] === 1) {
        header("Location: inlog.php?error=alreadyverified");
        exit();
    }
    if($stmt){
        return true;
    }
    else {
        return false;
    }
}

