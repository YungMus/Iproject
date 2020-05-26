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
    } else if (!checkUsernameExists($username, $conn, $email, $firstname, $lastname, $birthday,$phonenumber, $recoveryquestion, $recoveryquestionanswer, $address, $address2, $postalcode, $city, $country)) {
        $sql = "SELECT MAX(user_id) FROM [User] ";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $userID = $stmt->fetchall();
        $userID = $userID[0][0] + 1;

        $sql2 = "INSERT INTO [User] (user_id, username, [e-mail], password, firstname, lastname, birth_day, recover_question, recover_question_answer, address, address_addition, postal_code, place_name, country) VALUES (:user_id, :username, :email, :password, :firstname, :lastname, :birth_day, :recover_question, :recover_question_answer, :address, :address_addition, :postal_code, :place_name, :country)";
        $stmt2 = $conn->prepare($sql2);
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

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

                header("Location: inlog.php?success=accountmade");
                exit();
            } else{
                header("Location: register.php?error=insertfailed");
            }
}
else {
    header("Location: registerVoorpagina.php?error=noauthorization");
    exit();
}
function checkUsernameExists($username_to_check, $conn, $email, $firstname, $lastname, $birthday,$phonenumber, $recoveryquestion, $recoveryquestionanswer, $address, $address2, $postalcode, $city, $country) {
    $sql = 'SELECT username  FROM [User] WHERE [username]=:username';
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

function getMaxUserID ($conn){

    if($stmt) {
        return true;
    }
    else {
        return false;
    }
}