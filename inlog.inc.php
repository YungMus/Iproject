<?php

if(isset($_POST['login']) || $_POST['login-sending']){

    //require 'connectingDatabase.php';

    $username = htmlspecialchars($_POST['gebruikersnaam']);
    $password = htmlspecialchars($_POST['password']);

    if(empty($username) || empty($password)) {
        header("Location: inlog.php?error=emptyfields");
        exit();
    }
    else{
        $sql = "SELECT * FROM User WHERE username=? ";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("Location: inlog.php?error=sqlerror");
            exit();
        }
        else{

            mysqli_stmt_bind_param($stmt, "s", $username);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if($row = mysqli_fetch_assoc($result)){
                $passwordcheck = password_verify($password, $row['password']);
                if($passwordcheck == false){
                    header("Location: inlog.php?error=wrongpassword");
                    exit();
                }
                else if ($passwordcheck == true) {
                    if ($row['is_seller'] === 1) {
                        session_start();
                        $_SESSION['IDSeller'] = $row['user_id'];

                    }
                    else if($row['is_admin'] === 1) {
                        session_start();
                        $_SESSION['IDAdmin'] = $row['user_id'];
                    }
                    else{
                    session_start();
                    $_SESSION['IDUser'] = $row['user_id'];
                    }
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
}
else if(isset($_POST['register'])){
    header("Location: register.php");
    exit();
}
else{
    header("Location: inlog.php");
    exit();
}