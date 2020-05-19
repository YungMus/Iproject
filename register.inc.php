<?php

if (isset($_POST['Register'])){

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

    if(empty($username) ||  empty($password) || empty($passwordrepeat) || empty($firstname) || empty($lastname) || empty($birthday)  || empty($phonenumber)  || empty($recoveryquestion) || empty($recoveryquestionanswer) || empty($address)  ||  empty($postalcode)  || empty($city)  || empty($country) ){
        header("Location: register.php?error=emptyfields&Username=".$username."&Firstname=".$firstname."&Lastname=".$lastname."&Birthday=".$birthday."&Phonenumber=".$phonenumber."&RecoveryQuestion=".$recoveryquestion."&RecoveryQuestionAnswer=".$recoveryquestionanswer."&Address=".$address."&Address2=".$address2."&Postalcode=".$postalcode."&City=".$city."&Country=".$country);
        exit();
    }

    else if($password !== $passwordrepeat){
        header("Location: register.php?error=passwordcheck&Username=".$username."&Firstname=".$firstname."&Lastname=".$lastname."&Birthday=".$birthday."&Phonenumber=".$phonenumber."&RecoveryQuestion=".$recoveryquestion."&RecoveryQuestionAnswer=".$recoveryquestionanswer."&Address=".$address."&Address2=".$address2."&Postalcode=".$postalcode."&City=".$city."&Country=".$country);
        exit();
    }
        else if (!checkUsernameExists($username, $conn)) {
            $sql = "INSERT INTO [User] (username, [e-mail], password, firstname, lastname, birth_day, recover_question, recover_question_answer, address, address_addition, postal_code, place_name, country) VALUES (:username, :email, :password, :firstname, :lastname, :birth_day, :recover_question, :recover_question_answer, :address, :address_addition, :postal_code, :place_name, :country)";
            $stmt = $conn->prepare($sql);
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            $stmt->bindparam(':username', $username);
            $stmt->bindparam(':email', $email);
            $stmt->bindparam(':password', $hashedPassword);
            $stmt->bindparam(':firstname', $firstname);
            $stmt->bindparam(':lastname', $lastname);
            $stmt->bindparam(':birth_day', $birthday);
            $stmt->bindparam(':recover_question', $recoveryquestion);
            $stmt->bindparam(':recover_question_answer', $recoveryquestionanswer);
            $stmt->bindparam(':address', $address);
            $stmt->bindparam(':address_addition', $address2);
            $stmt->bindparam(':postal_code', $postalcode);
            $stmt->bindparam(':place_name', $city);
            $stmt->bindparam(':country', $country);
            $stmt->execute();
        }
            if($sql) {
                $sql2 = "INSERT INTO Userphone (phone) VALUES (:userphone)";
                $stmt = $conn->prepare($sql);
                $stmt->bindparam(':userphone', $phonenumber);
                $stmt->execute();
            }
                else{
                  echo"Het aanmaken van je account is mislukt!";
                  exit();
                }
                if($sql2){
                    header("Location: inlog.php?register=success");
                    exit();
                }
        }
    else{
    header("Location: inlog.php");
    exit();
}

function checkUsernameExists($username_to_check, $conn) {
    $sql = 'SELECT username  FROM [User] WHERE [username]=:username';
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':username', $username_to_check);
    $stmt->execute();
    $stmt = $stmt->fetchAll(PDO::FETCH_NUM);
    $resultcheck = count($stmt);
    if ($resultcheck > 0) {
        header("Location: registerVoorpagina.php?error=usernamealreadyused&Username=" . $username_to_check);
        exit();
    }
    if($stmt) {
        return true;
    }
    else {
        return false;
    }
}