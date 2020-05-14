<?php

if (isset($_POST['EmailConfirmation'])) {

    require 'connectingDatabase.php';

    $email = trim(htmlspecialchars($_POST['Email']));
    $date = date("d/m/Y");
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
            $message = "<a href='http://iproject43.icasites.nl/registerTweedepagina.php?email=$email'>Verifieer e-mail</a><hr><h2> Dit is je verificatiecode <span onClick='ClipBoard()'> $token </span></h2>";
            $headers = "<From: The Sender Name <eriknightchina@gmail.com>\r\n";
            $headers .= "Reply-To: replyto@dragonforjiu.xyz\r\n";
            $headers .= "Content-type: text/html\r\n";

            mail($to, $subject, $message, $headers);

            if (mail($to, $subject, $message, $headers)) {
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
    print_r($resultcheck);
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
