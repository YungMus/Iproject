<?php

if (isset($_POST['EmailConfirmation'])){

    require 'connectingDatabase.php';

    $email = htmlspecialchars($_POST['Email']);
    $date = getdate();
    $token = md5(time().$email);

    if( empty($email) ){
        header("Location: registerVoorpagina.php?error=emptyfields&Email=".$email);
        exit();
    }
    else{

        $sql = "SELECT email FROM user WHERE email=?";
        $stmt = mysqli_stmt_init($conn);

        if(!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: registerVoorpagina.php?error=sqlerror");
            exit();
        }
        else{
            mysqli_stmt_bind_param($stmt, "s", $email);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $resultcheck = mysqli_stmt_num_rows($stmt);
            if($resultcheck > 0) {
                header("Location: registerVoorpagina.php?error=emailalreadyused&Email=".$email);
                exit();
            }
            else{
                $sql = "INSERT INTO User (\"e-mail\",token_date, token) VALUES (?, ?, ?)";
                $stmt = mysqli_stmt_init($conn);
                if(!mysqli_stmt_prepare($stmt, $sql)) {
                    header("Location: registerVoorpagina.php?error=inserterror");
                    exit();
                }
                else {
                    mysqli_stmt_bind_param($stmt, "sss",  $email, $date, $token);
                    mysqli_stmt_execute($stmt);
                }
                if($sql){
                    $to = $email;
                    $subject = "Email Verificatie";
                    $message = "<a href='http://iproject43.icasites.nl/registerTweedepagina.php'>Verifieer e-mail</a><hr><h2> Dit is je verificatiecode <span onClick='ClipBoard()'> $token </span></h2>";
                    $headers = "From eriknightchina@gmail.com \r\n";
                    $headers .= "MIME-Version: 1.0" . "\r\n";
                    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

                    mail($to,$subject,$message,$headers);

                    header("Location: registerVoorpagina.php?register=success");
                }
            }
        }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}

else{
    header("Location: inlog.php");
    exit();
}