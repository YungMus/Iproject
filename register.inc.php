<?php

if (isset($_POST['Register'])) {

    require 'connectingDatabase.php';

    $email = $_POST['Email'];
    $username = htmlspecialchars($_POST['Username']);
    $password = htmlspecialchars(trim($_POST['Password']));
    $passwordrepeat = htmlspecialchars(trim($_POST['PasswordRepeat']));
    $firstname = htmlspecialchars($_POST['Firstname']);
    $lastname = htmlspecialchars($_POST['Lastname']);
    $birthday = htmlspecialchars($_POST['Birthday']);
    $phonenumber = htmlspecialchars($_POST['Phonenumber']);
    $recoveryquestion = htmlspecialchars($_POST['RecoveryQuestion']);
    $recoveryquestionanswer = htmlspecialchars($_POST['RecoveryQuestionAnswer']);
    $address = htmlspecialchars($_POST['Address']);
    $address2 = htmlspecialchars($_POST['Address2']);
    $postalcode = htmlspecialchars($_POST['Postalcode']);
    $city = htmlspecialchars($_POST['City']);
    $country = htmlspecialchars($_POST['Country']);

    if (empty($username) || empty($password) || empty($passwordrepeat) || empty($firstname) || empty($lastname) || empty($birthday) || empty($phonenumber) || empty($recoveryquestion) || empty($recoveryquestionanswer) || empty($address) || empty($postalcode) || empty($city) || empty($country)) {
        header("Location: register.php?error=emptyfields&email=" . $email . "&Username=" . $username . "&Firstname=" . $firstname . "&Lastname=" . $lastname . "&Birthday=" . $birthday . "&Phonenumber=" . $phonenumber . "&RecoveryQuestion=" . $recoveryquestion . "&RecoveryQuestionAnswer=" . $recoveryquestionanswer . "&Address=" . $address . "&Address2=" . $address2 . "&Postalcode=" . $postalcode . "&City=" . $city . "&Country=" . $country);
        exit();
    } else if ($password !== $passwordrepeat) {
        header("Location: register.php?error=passwordcheck&email=" . $email . "&Username=" . $username . "&Firstname=" . $firstname . "&Lastname=" . $lastname . "&Birthday=" . $birthday . "&Phonenumber=" . $phonenumber . "&RecoveryQuestion=" . $recoveryquestion . "&RecoveryQuestionAnswer=" . $recoveryquestionanswer . "&Address=" . $address . "&Address2=" . $address2 . "&Postalcode=" . $postalcode . "&City=" . $city . "&Country=" . $country);
        exit();
    }
    else if (!checkUsernameExists($username, $conn, $email, $firstname, $lastname, $birthday,$phonenumber, $recoveryquestion, $recoveryquestionanswer, $address, $address2, $postalcode, $city, $country) && checkUserVerified($conn, $email)) {
        $sql = "SELECT MAX(user_id) FROM [User] ";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $userID = $stmt->fetchall();
        $userID = $userID[0][0] + 1;

        $sql2 = "INSERT INTO [User] (user_id, username, [e-mail], password, firstname, lastname, birth_day, recover_question, recover_question_answer, address, address_addition, postal_code, place_name, country) VALUES (:user_id, :username, :email, :password, :firstname, :lastname, :birth_day, :recover_question, :recover_question_answer, :address, :address_addition, :postal_code, :place_name, :country)";
        $stmt2 = $conn->prepare($sql2);
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        print_r($sql2);

        $stmt2->bindparam(':user_id', $userID);
        $stmt2->bindparam(':username', $username);
        $stmt2->bindparam(':email', $email);
        $stmt2->bindparam(':password', $hashedPassword);
        $stmt2->bindparam(':firstname', $firstname);
        $stmt2->bindparam(':lastname', $lastname);
        $stmt2->bindparam(':birth_day', $birthday);
        $stmt2->bindparam(':recover_question', $recoveryquestion);
        $stmt2->bindparam(':recover_question_answer', $recoveryquestionanswer);
        $stmt2->bindparam(':address', $address);
        $stmt2->bindparam(':address_addition', $address2);
        $stmt2->bindparam(':postal_code', $postalcode);
        $stmt2->bindparam(':place_name', $city);
        $stmt2->bindparam(':country', $country);
        $stmt2->execute();
    }
            if($sql2) {
                $sql3 = "SELECT MAX(order_nr) FROM Userphone ";
                $stmt3 = $conn->prepare($sql3);
                $stmt3->execute();
                $orderNr = $stmt3->fetchall();
                $orderNr = $orderNr[0][0] + 1;

                $sql4 = "INSERT INTO Userphone (order_nr, phone, user_id) VALUES (:orderNr, :userphone, :userID)";
                $stmt4 = $conn->prepare($sql4);
                $stmt4->bindparam(':orderNr', $orderNr);
                $stmt4->bindparam(':userphone', $phonenumber);
                $stmt4->bindparam(':userID', $userID);
                $stmt4->execute();

                $to = $email;
                $subject = "Welkom gebruiker!";
                $htmlStr = "";
                $htmlStr .= "Hi " . $firstname . $lastname . ",<br /><br />";

                $htmlStr .= "Je hebt succesvol een account bij ons aangemaakt! Je bent van harte welkom om bij een kijkje te nemen op onze website en zelfs mee te bieden!<br /><br /><br />";

                $htmlStr .= "Wil je gaan inloggen?<br /><br /><br />";

                $htmlStr .= "Klik hieronder om naar het inlogpagina te gaan<br /><br /><br />";
                $htmlStr .= "<a href='http://localhost/Iproject/inlog.php?' target='_blank' style='padding:1em; font-weight:bold; background-color:blue; color:#fff;'>Ga naar de website</a><br /><br /><br />";

                $htmlStr .= "Met vriendelijke groeten,<br />";
                $htmlStr .= "<a href='https://iproject43.icasites.nl/' target='_blank'>EenmaalAndermaal</a><br />";


                $name = "EenmaalAndermaal";
                $email_sender = "no-reply@eenmaalandermaal.com";

                $headers  = "MIME-Version: 1.0\r\n";
                $headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
                $headers .= "From: {$name} <{$email_sender}> \n";

                $body = $htmlStr;

                if (mail($to, $subject, $body, $headers)) {
                    header("Location: inlog.php?success=accountmade");
                    exit();
                } else {
                    header("Location: register.php?error=mailnotsent&email=$email");
                    exit();
                }
            }
            else{
                header("Location: register.php?error=insertfailed&email=$email");
                exit();
            }
}
else {
    header("Location: registerVoorpagina.php?error=noauthorization");
    exit();
}

function checkUsernameExists($username_to_check, $conn, $email, $firstname, $lastname, $birthday,$phonenumber, $recoveryquestion, $recoveryquestionanswer, $address, $address2, $postalcode, $city, $country) {
    $sql = 'SELECT username  FROM [User] WHERE username=:username';
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':username', $username_to_check);
    $stmt->execute();
    $stmt = $stmt->fetchAll(PDO::FETCH_NUM);
    $resultcheck = count($stmt);
    if ($resultcheck > 0) {
        header("Location: register.php?error=usernamealreadyused&email=" . $email . "&Firstname=" . $firstname . "&Lastname=" . $lastname . "&Birthday=" . $birthday . "&Phonenumber=" . $phonenumber . "&RecoveryQuestion=" . $recoveryquestion . "&RecoveryQuestionAnswer=" . $recoveryquestionanswer . "&Address=" . $address . "&Address2=" . $address2 . "&Postalcode=" . $postalcode . "&City=" . $city . "&Country=" . $country);
        exit();
    }
    if($stmt) {
        return true;
    }
    else {
        return false;
    }
}

function checkUserVerified ($conn, $email_to_check){
    $sql = 'SELECT verified  FROM Email_verification_token WHERE [e-mail]= :email';
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':email', $email_to_check);
    $stmt->execute();
    $verified = $stmt->fetchall();
    if($verified[0]['verified'] === 0){
        header("Location: registerTweedepagina.php?error=tokennotverified&email=$email_to_check");
        exit();
    }
    if($stmt) {
        return true;
    }
    else {
        return false;
    }
}