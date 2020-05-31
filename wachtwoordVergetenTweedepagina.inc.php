<?php
if (isset($_POST['confirmtoken'])) {

    require 'connectingDatabase.php';
    session_start();

    $userID = $_SESSION['userID'];
    $email = trim(htmlspecialchars($_POST['Email']));
    $token = trim(htmlspecialchars($_POST['Token']));
    $recoveryQuestion = htmlspecialchars($_POST['RecoveryQuestion']);
    $recoveryQuestionAnswer = htmlspecialchars($_POST['RecoveryQuestionAnswer']);

    if (empty($email) || empty($token) || empty($recoveryQuestion) || empty($recoveryQuestionAnswer)) {
        header("Location: wachtwoordVergetenTweedepagina.php?error=emptyfields&email=$email");
    } else if (checkMailValid($conn, $email)) {
        if (checkTokenMatch($conn, $token, $email)) {
            if (checkDateToken($conn, $userID, $email)) {
                header("Location: wachtwoordVergeten.php?success=verified&email=$email");
            }
        }
    }
}




    function checkTokenMatch ($conn, $token_to_check, $email) {
        $sql = ("SELECT token FROM Password_lost_token WHERE token= :token");
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':token', $token_to_check);
        $stmt->execute();
        $result = $stmt->fetchAll();
        if($result[0]['token'] != $token_to_check) {
            header("Location: wachtwoordVergetenTweedepagina.php?error=nomatch&email=$email");
        }
        if($stmt){
            return true;
        }
        else {
            return false;
        }
    }

    function checkDateToken ($conn, $userID_to_check, $email){
        $sql = ("SELECT token_date FROM Password_lost_token WHERE user_id= :userID");
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':userID', $userID_to_check);
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
            header("Location: wachtwoordVergetenTweedepagina.php?error=expired&email=$email");
        }
        if($stmt){
            return true;
        }
        else {
            return false;
        }
    }

    function checkMailValid ($conn, $email){
        $sql = "SELECT [e-mail] FROM [User] WHERE [e-mail]= :email";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $results = $stmt->fetchAll();
        if($results[0][0] != $email){
            header("Location: wachtwoordVergetenTweedepagina.php?error=emailinvalid&email=$email");
        }
        if($stmt){
            return true;
        } else{
            return false;
        }
    }

