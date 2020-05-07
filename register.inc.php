<?php

if (isset($_POST['Register'])){

    require 'connectingDatabase.php';

    $username = htmlspecialchars($_POST['Username']);
    $email = htmlspecialchars($_POST['Email']);
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

    if(empty($username) || empty($email) || empty($password) || empty($passwordrepeat) || empty($firstname) || empty($lastname) || empty($birthday)  || empty($phonenumber)  || empty($recoveryquestion) || empty($recoveryquestionanswer) || empty($address)  || empty($address2)  || empty($postalcode)  || empty($city)  || empty($country) ){
        header("Location: register.php?error=emptyfields&Username=".$username."&Email=".$email."&Firstname=".$firstname."&Lastname=".$lastname."&Birthday=".$birthday."&Phonenumber=".$phonenumber."&RecoveryQuestion=".$recoveryquestion."&RecoveryQuestionAnswer=".$recoveryquestionanswer."&Address=".$address."&Address2=".$address2."&Postalcode=".$postalcode."&City=".$city."&Country=".$country);
        exit();
    }

    else if($password !== $passwordrepeat){
        header("Location: register.php?error=passwordcheck&Username=".$username."&Email=".$email."&Firstname=".$firstname."&Lastname=".$lastname."&Birthday=".$birthday."&Phonenumber=".$phonenumber."&RecoveryQuestion=".$recoveryquestion."&RecoveryQuestionAnswer=".$recoveryquestionanswer."&Address=".$address."&Address2=".$address2."&Postalcode=".$postalcode."&City=".$city."&Country=".$country);
        exit();
    }

    else{

        $sql = "SELECT username FROM User WHERE username=?";
        $stmt = mysqli_stmt_init($conn);

        if(!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: register.php?error=sqlerror");
            exit();
        }
        else{
            mysqli_stmt_bind_param($stmt, "s", $username);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $resultcheck = mysqli_stmt_num_rows($stmt);
            if($resultcheck > 0) {
                header("Location: register.php?error=usernamealreadyused&Username=".$username."&Email=".$email."&Firstname=".$firstname."&Lastname=".$lastname."&Birthday=".$birthday."&Phonenumber=".$phonenumber."&RecoveryQuestion=".$recoveryquestion."&RecoveryQuestionAnswer=".$recoveryquestionanswer."&Address=".$address."&Address2=".$address2."&Postalcode=".$postalcode."&City=".$city."&Country=".$country);
                exit();
            }
            else{
                $sql = "INSERT INTO User (username, \"e-mail\", password, firstname, lastname, birth_day, recover_question, recover_question_answer, address, address_addition, postal_code, place_name, country) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
                $stmt = mysqli_stmt_init($conn);
                if(!mysqli_stmt_prepare($stmt, $sql)) {
                    header("Location: register.php?error=sqlerror");
                    exit();
                }
                else{
                    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

                    mysqli_stmt_bind_param($stmt, "sssssssssssss", $username, $email, $hashedPassword, $firstname, $lastname, $birthday, $recoveryquestion, $recoveryquestionanswer, $address, $address2, $postalcode, $city, $country);
                    mysqli_stmt_execute($stmt);
                    header("Location: register.php?register=success");
                    exit();
                }
            }
        }

    }
    mysqli_stmt_close($stmt);
    mysqli_close($dbh);
}

else{
    header("Location: inlog.php");
    exit();
}