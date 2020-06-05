<?php
if (isset($_POST['VerifyRecoverQuestion'])) {

    require 'connectingDatabase.php';
    session_start();

    $email = $_SESSION['Email'];
    $verify = "RecoveryQuestion";
    $recoveryQuestion = htmlspecialchars($_POST['RecoveryQuestion']);
    $recoveryQuestionAnswer = htmlspecialchars($_POST['RecoveryQuestionAnswer']);

    if (empty($recoveryQuestion) || empty($recoveryQuestionAnswer)) {
        header("Location: verkoopaccountTweedepagina.php?error=emptyfields");
    }
            if(checkRecoveyQuestionAnswer($conn, $recoveryQuestionAnswer, $email, $verify)){
                if (checkAlreadyVerified($conn, $email)) {
                    $resultSet = $conn->query("SELECT verified FROM Seller_Verification_token WHERE verified = 0 AND [e-mail] = '$email'");

                    if ($resultSet) {
                        $update = $conn->query("UPDATE Seller_Verification_token SET verified = 1 WHERE [e-mail] = '$email'");
                        if ($update) {
                            header("Location: verkoopaccountDerdepagina.php?success=confirmed");
                            exit();
                        } else {
                            echo "Er is een probleem met het verbinden met onze server!";
                        }
                    } else {
                        header("Location: verkoopaccountTweedepagina.php?error=invalid");
                        exit();
                    }
                }
            }

} else if(isset($_POST['VerifyEmail'])){

    require 'connectingDatabase.php';
    session_start();

    $email = $_SESSION['Email'];
    $token = trim(htmlspecialchars($_POST['Token']));

    if (empty($token)) {
        header("Location: verkoopaccountTweedepagina.php?error=emptyfields");
    }
        if (checkTokenMatch($conn, $token)) {
                if (checkDateToken($conn, $email, $email)) {
                    if (checkAlreadyVerified($conn, $email)) {
                        $resultSet = $conn->query("SELECT verified,token FROM Seller_Verification_token WHERE verified = 0 AND token = '$token'");

                        if ($resultSet) {
                            $update = $conn->query("UPDATE Seller_Verification_token SET verified = 1 WHERE token = '$token'");
                            if ($update) {
                                header("Location: verkoopaccountDerdepagina.php?success=confirmed");
                                exit();
                            } else {
                                echo "Er is een probleem met het verbinden met onze server!";
                            }
                        } else {
                            header("Location: verkoopaccountTweedepagina.php?error=invalid");
                            exit();
                        }
                    }
                }
            }
} else{
    header("Location: persoonlijkePagina.php?error=noauthorization");
    exit();
}

function checkRecoveyQuestionAnswer ($conn, $question_to_check, $email, $verify){
    $sql = "SELECT recover_question_answer FROM [User] WHERE [e-mail]= :email";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    $result = $stmt->fetchAll();
    if($result[0][0] != $question_to_check){
        header("Location: verkoopaccountTweedepagina.php?error=recoveryquestionanswer&verify=$verify");
        exit();
    }
    if($stmt){
        return true;
    } else{
        return false;
    }
}

function checkDateToken ($conn, $email_to_check, $email){
    $sql = ("SELECT token_date FROM Seller_Verification_token WHERE [e-mail]= :email");
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':email', $email_to_check);
    $stmt->execute();
    $result = $stmt->fetchAll();
    $date = $result[0][0];
    $time = strtotime($date);
    date_add($time, date_interval_create_from_date_string("4 hours"));
    if($result[0][0] > getdate()) {
        $sql = "DELETE FROM Seller_Verification_token WHERE email=:email";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        header("Location: verkoopaccountTweedepagina.php?error=expired");
        exit();
    }
    if($stmt){
        return true;
    }
    else {
        return false;
    }
}

function checkTokenMatch ($conn, $token_to_check) {
    $sql = ("SELECT token FROM Seller_Verification_token WHERE token=:token");
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':token', $token_to_check);
    $stmt->execute();
    $result = $stmt->fetchAll();
    if($result[0]['token'] != $token_to_check) {
        header("Location: verkoopaccountTweedepagina.php?error=nomatch");
        exit();
    }
    if($stmt){
        return true;
    }
    else {
        return false;
    }
}

function checkAlreadyVerified ($conn, $email){
    $sql = ("SELECT verified FROM Seller_Verification_token WHERE [e-mail]= :email");
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_COLUMN, 0);
    if($result[0] === 1) {
        header("Location: persoonlijkePagina.php?error=alreadyverified");
        exit();
    }
    if($stmt){
        return true;
    }
    else {
        return false;
    }
}