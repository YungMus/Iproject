<?php
if (isset($_POST['Verify'])) {

    require 'connectingDatabase.php';

    $verify = $_POST['Verify'];
    $email = $_SESSION['Email'];
    $date = date('d/m/Y/G:i:s');
    $token = md5(time() . $email);

    if ($verify === 'RecoveryQuestion') {
        header("Location: verkoopaccountTweedepagina.php&verify=$verify");
    } else {
        $sql = 'INSERT INTO Seller_Verification_token ([e-mail], token_date, token) VALUES (:email, :token_date, :token)';
        $stmt = $conn->prepare($sql);

        $stmt->bindparam(':email', $email);
        $stmt->bindparam(':token_date', $date);
        $stmt->bindparam(':token', $token);
        $stmt->execute();

        if ($sql) {
            $to = $email;
            $subject = "Verkoper Verificatie";
            $htmlStr = "";
            $htmlStr .= "Hi " . $email . ",<br /><br />";

            $htmlStr .= "Klik hieronder aub op de knop om naar de verifieer pagina te gaan.<br /><br /><br />";
            $htmlStr .= "<a href='http://localhost/Iproject/verkoopaccountTweedepagina.php&verify=$verify target='_blank' style='padding:1em; font-weight:bold; background-color:blue; color:#fff;'>Ga naar de website</a><br /><br /><br />";

            $htmlStr .= "Kopieer hieronder je unieke verificatie code.<br /><br /><br />";
            $htmlStr .= "<p>$token</p><br /><br /><br />";

            $htmlStr .= "Met vriendelijke groeten,<br />";
            $htmlStr .= "<a href='https://iproject43.icasites.nl/' target='_blank'>EenmaalAndermaal</a><br />";


            $name = "EenmaalAndermaal";
            $email_sender = "no-reply@eenmaalandermaal.com";

            $headers = "MIME-Version: 1.0\r\n";
            $headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
            $headers .= "From: {$name} <{$email_sender}> \n";

            $body = $htmlStr;

            if (mail($to, $subject, $body, $headers)) {
                header('Location: registerVoorpagina.php?success=mailsent');
                exit();
            } else {
                header('Location: registerVoorpagina.php?error=mailnotsent');
                exit();
            }
        }
    }
}
