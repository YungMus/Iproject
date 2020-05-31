<?php
if (isset($_POST['changepassword'])) {

    require 'connectingDatabase.php';


    $email = trim(htmlspecialchars($_POST['Email']));
    $date = date('d/m/Y/G:i:s');
    $token = md5(time() . $email);

    if (empty($email)) {
        header("Location: wachtwoordVergetenVoorpagina.php?error=emptyfields");
        exit();
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: wachtwoordVergetenVoorpagina.php?error=emailinvalid");
    }

    else if (checkEmailExists($email, $conn)) {
        $sql = 'SELECT user_id  FROM [User] WHERE [e-mail]=:email';
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $userID = $stmt->fetchAll();

        $sql2 = 'INSERT INTO Password_lost_token (user_id, token_date, token) VALUES (:userID, :token_date, :token)';
        $stmt2 = $conn->prepare($sql2);

        $stmt2->bindparam(':userID', $userID[0]['user_id']);
        $stmt2->bindparam(':token_date', $date);
        $stmt2->bindparam(':token', $token);
        $stmt2->execute();

        if ($sql) {
            $to = $email;
            $subject = "Wachtwoord vergeten";
            $htmlStr = "";
            $htmlStr .= "Hi " . $email . ",<br /><br />";

            $htmlStr .= "Klik hieronder aub op het knop om naar het herstelpagina te gaan.<br /><br /><br />";
            $htmlStr .= "<a href='http://localhost/Iproject/wachtwoordVergetenTweedepagina.php?email=.$email.' target='_blank' style='padding:1em; font-weight:bold; background-color:blue; color:#fff;'>Ga naar het website</a><br /><br /><br />";

            $htmlStr .= "Kopieer hieronder je unieke verificatie code.<br /><br /><br />";
            $htmlStr .= "<p>$token</p><br /><br /><br />";

            $htmlStr .= "Met vriendelijke groeten,<br />";
            $htmlStr .= "<a href='https://iproject43.icasites.nl/' target='_blank'>EenmaalAndermaal</a><br />";


            $name = "EenmaalAndermaal";
            $email_sender = "no-reply@eenmaalandermaal.com";

            $headers  = "MIME-Version: 1.0\r\n";
            $headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
            $headers .= "From: {$name} <{$email_sender}> \n";

            $body = $htmlStr;

            if (mail($to, $subject, $body, $headers)) {
                session_start();
                $_SESSION['userID'] = $userID[0]['user_id'];
                header('Location: wachtwoordvergetenVoorpagina.php?success=mailsent');
            } else {
                header('Location: wachtwoordvergetenVoorpagina.php?error=mailnotsent');
            }

        }
    }
}

function checkEmailExists($email_to_check, $conn) {
    $sql = 'SELECT [e-mail]  FROM [User] WHERE [e-mail]=:email';
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':email', $email_to_check);
    $stmt->execute();
    if($stmt) {
        return true;
    }
    else {
        return false;
    }
}


