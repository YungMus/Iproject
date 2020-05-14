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
            $sql = "INSERT INTO [User] (username, [e-mail], password, firstname, lastname, birth_day, recover_question, recover_question_answer, address, address_addition, postal_code, place_name, country) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            $stmt->bindparam(1, $username);
            $stmt->bindparam(2, $email);
            $stmt->bindparam(3, $hashedPassword);
            $stmt->bindparam(4, $firstname);
            $stmt->bindparam(5, $lastname);
            $stmt->bindparam(6, $birthday);
            $stmt->bindparam(7, $recoveryquestion);
            $stmt->bindparam(8, $recoveryquestionanswer);
            $stmt->bindparam(9, $address);
            $stmt->bindparam(10, $address2);
            $stmt->bindparam(11, $postalcode);
            $stmt->bindparam(12, $city);
            $stmt->bindparam(13, $country);
            $stmt->execute();
        }
            if($sql) {
                $sql2 = "INSERT INTO Userphone (phone) VALUES (?)";
                $stmt = $conn->prepare($sql);
                $stmt->bindparam(1, $phonenumber);
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
    $sql = 'SELECT username  FROM [User] WHERE [username]=?';
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(1, $username_to_check);
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