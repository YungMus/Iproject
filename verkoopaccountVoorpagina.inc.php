<?php
if (isset($_POST['Continue'])) {

    require 'connectingDatabase.php';
    session_start();

    $verify = $_POST['Verify'];
    $email = $_SESSION['Email'];
    $date = date('d/m/Y/G:i:s');
    $token = md5(time() . $email);
    print_r($verify);

    if ($verify === 'RecoveryQuestion') {
        header("Location: verkoopaccountVoorpagina.php?error=invalid&verify=$verify");
    } else if($verify === 'Email') {
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

            $htmlStr .= "Klik hieronder aub op de knop om naar de verificatie pagina te gaan.<br /><br /><br />";
            $htmlStr .= "<a href='https://iproject43.icasites.nl/verkoopaccountTweedepagina.php?verify=$verify' target='_blank' style='padding:1em; font-weight:bold; background-color:blue; color:#fff;'>Ga naar de website</a><br /><br /><br />";

            $htmlStr .= "Kopieer hieronder uw unieke verificatie code.<br /><br /><br />";
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
                header('Location: verkoopaccountVoorpagina.php?success=mailsent');
                exit();
            } else {
                header('Location: verkoopaccountVoorpagina.php?error=mailnotsent');
                exit();
            }
        }
    }
} else{
    header("Location: persoonlijkePagina.php?error=noauthorization");
    exit();
}
