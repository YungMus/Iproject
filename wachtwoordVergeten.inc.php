<?php

if (isset($_POST['Changepassword'])) {



    require 'connectingDatabase.php';

    $email = $_POST['Email'];
    $newpassword = htmlspecialchars(trim($_POST['NewPassword']));
    $newpasswordrepeat = htmlspecialchars(trim($_POST['NewPassword-repeat']));

    if  (empty($newpassword) || empty($newpasswordrepeat)) {
        header("Location: wachtwoordVergeten.php?error=emptyfields&email=$email");
        exit();
    } else if ($newpassword !== $newpasswordrepeat) {
        header("Location: wachtwoordVergeten.php?error=passwordcheck&email=$email");
        exit();
    } else{
            $hashedNewPassword = password_hash($newpassword, PASSWORD_DEFAULT);
            $update = $conn->query("UPDATE [User] SET password ='$hashedNewPassword' WHERE [e-mail] ='$email'");
            if ($update) {
                header("Location: inlog.php?success=changed");
                exit();
            } else {
                echo "Er is een probleem met het verbinden met onze server!";
            }
        }
} else{
    header("Location: wachtwoordVergetenVoorpagina.php?error=noauthorization");
    exit();
}