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

        $sql = 'SELECT [e-mail]  FROM [User] WHERE [e-mail]=?';
        $stmt = $conn->prepare($sql);

        if(!$stmt) {
            header("Location: registerVoorpagina.php?error=sqlerror");
            exit();
        }
        else{
            $stmt-> bindParam(1, $email);
            $stmt->execute();
            $stmt = $stmt->fetchAll(PDO::FETCH_NUM);
            $resultcheck = count($stmt);
            if($resultcheck > 0) {
                header("Location: registerVoorpagina.php?error=emailalreadyused&Email=".$email);
                exit();
            }
            else{
                $sql = 'INSERT INTO Email_verification_token ([e-mail], token_date, token) VALUES (?, ?, ?)';
                $stmt = $conn->prepare($sql);
                if(!$stmt) {
                    header("Location: registerVoorpagina.php?error=inserterror");
                    exit();
                }
                else {
                    $stmt-> bindparam(1, $email);
                    $stmt-> bindparam(2, $date);
                    $stmt-> bindparam(3, $token);
                    $stmt->execute();
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
    $stmt->close();
    $conn->close();
}

else{
    header("Location: inlog.php");
    exit();
}