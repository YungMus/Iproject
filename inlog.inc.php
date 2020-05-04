<?php

if(isset($_POST['login']) || $_POST['login-sending']){

    //require 'connectingDatabase.php';

    $username = htmlspecialchars($_POST['gebruikersnaam']);
    $password = htmlspecialchars($_POST['password']);

    if(empty($username) || empty($password)) {
        header("Location: inlog.php?error=emptyfields");
        exit();
    }
    //Ik heb hier het database nodig
//    else{
//        $sql = "SELECT * FROM userinfo WHERE username=? ";
//        $stmt = mysqli_stmt_init($dbh);
//        if(!mysqli_stmt_prepare($stmt, $sql)){
//            header("Location: inlog.php?error=sqlerror");
//            exit();
//        }
        else{

            mysqli_stmt_bind_param($stmt, "s", $username);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if($row = mysqli_fetch_assoc($result)){
                $passwordcheck = password_verify($password, $row['wachtwoord']);
                if($passwordcheck == false){
                    header("Location: inlog.php?error=wrongpassword");
                    exit();
                }
                else if ($passwordcheck == true){
                    session_start();
                    $_SESSION['IDUser'] = $row['userID'];
                    $_SESSION['username'] = $row['username'];

                    header("Location: persoonlijkepagina.php?login=success");
                    exit();
                }
                else{
                    header("Location: inlogpagina.php?error=wrongpassword");
                    exit();
                }

            }
            else{
                header("Location: inlogpagina.php?error=noUser");
                exit();
            }
        }
    }
//}
else if(isset($_POST['register'])){
    header("Location: register.php");
    exit();
}
else{
    header("Location: inlog.php");
    exit();
}