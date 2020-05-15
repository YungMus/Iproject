<?php

if(isset($_POST['login']) || $_POST['login-sending']) {

    require 'connectingDatabase.php';

    $email = strlen(trim($_POST['Email']));
    $password = strlen(trim($_POST['Password']));

    if (empty($email) || empty($password)) {
        header("Location: inlog.php?error=emptyfields");
        exit();
    }
    else {
        $sql = "SELECT password FROM [User] WHERE username=? AND password=? ";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(1, $username);
        $stmt->bindParam(2, $password);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
//        $passwordcheck = password_verify($password, $result[0]);

    }
//    if ($passwordcheck == false) {
    if ($password != $result){
        header("Location: inlog.php?error=wrongpassword&result=$result&result=$password");
    }
//    else if ($passwordcheck == true) {
    else if($password == $result[0] ){
        if ($result['is_seller'] === 1) {
            session_start();
            $_SESSION['IDSeller'] = $result['user_id'];

        } else if ($result['is_admin'] === 1) {
            session_start();
            $_SESSION['IDAdmin'] = $result['user_id'];
        } else {
            session_start();
            $_SESSION['IDUser'] = $result['user_id'];
        }
        header("Location: persoonlijkepagina.php?login=success");
        exit();
    } else {
        header("Location: inlogpagina.php?error=wrongpassword");
        exit();
    }
}
    else{
        header("Location: inlogpagina.php?error=noUser");
        exit();
    }
