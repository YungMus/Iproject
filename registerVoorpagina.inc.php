<?php

if (isset($_POST['EmailConfirmation'])) {

    require 'connectingDatabase.php';

    $email = trim(htmlspecialchars($_POST['Email']));
    $date = date('d/m/Y/h:i:s');
    $token = md5(time() . $email);

    if (empty($email)) {
        header("Location: registerVoorpagina.php?error=emptyfields&Email=" . $email);
        exit();
    }

    if (!checkEmailExists($email, $conn)) {
        $sql = 'INSERT INTO Email_verification_token ([e-mail], token_date, token) VALUES (?, ?, ?)';
        $stmt = $conn->prepare($sql);

        $stmt->bindparam(1, $email);
        $stmt->bindparam(2, $date);
        $stmt->bindparam(3, $token);
        $stmt->execute();

        if ($sql) {
            $to = $email;
            $subject = "Email Verificatie";
            $htmlStr = "";
            $htmlStr .= "Hi " . $email . ",<br /><br />";

            $htmlStr .= "Klik hieronder aub op het knop om naar het verifieer pagina te gaan.<br /><br /><br />";
            $htmlStr .= "<a href='http://localhost/Iproject/registerTweedepagina.php' target='_blank' style='padding:1em; font-weight:bold; background-color:blue; color:#fff;'>Ga naar het website</a><br /><br /><br />";

            $htmlStr .= "Kopieer hieronder je unieke verificatie code.<br /><br /><br />";
            $htmlStr .= "<p>'$token'</p><br /><br /><br />";

            $htmlStr .= "Met vriendelijke groeten,<br />";
            $htmlStr .= "<a href='https://iproject43.icasites.nl/' target='_blank'>EenmaalAndermaal</a><br />";


            $name = "EenmaalAndermaal";
            $email_sender = "no-reply@eenmaalandermaal.com";

            $headers  = "MIME-Version: 1.0\r\n";
            $headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
            $headers .= "From: {$name} <{$email_sender}> \n";

            $body = $htmlStr;

            if (mail($to, $subject, $body, $headers)) {
                echo("
                  Message successfully sent!   
               ");
                header('Location: registerVoorpagina.php?email=succesvolverzonden');
            } else {
                echo("
                  Message delivery failed...
               ");
                header('Location: registerVoorpagina.php?email=onsuccesvolverzonden');
            }

        }
    }
}


function checkEmailExists($email_to_check, $conn) {
    $sql = 'SELECT [e-mail]  FROM Email_verification_token WHERE [e-mail]=?';
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(1, $email_to_check);
    $stmt->execute();
    $stmt = $stmt->fetchAll(PDO::FETCH_NUM);
    $resultcheck = count($stmt);
    if ($resultcheck > 0) {
        header("Location: registerVoorpagina.php?error=emailalreadyused&Email=" . $email_to_check);
        exit();
    }
    if($stmt) {
        return true;
    }
    else {
        return false;
    }
}
