<?php

if (isset($_POST['Changepassword'])) {



    require 'connectingDatabase.php';

    $email = $_POST['Email'];
    $oldpassword = htmlspecialchars(trim($_POST['OldPassword']));
    $newpassword = htmlspecialchars(trim($_POST['NewPassword']));
    $newpasswordrepeat = htmlspecialchars(trim($_POST['NewPassword-repeat']));

    if (empty($oldpassword) || empty($newpassword) || empty($newpasswordrepeat)) {
        header("Location: wachtwoordVergeten.php?error=emptyfields&email=$email");
        exit();
    } else if ($newpassword !== $newpasswordrepeat) {
        header("Location: wachtwoordVergeten.php?error=passwordcheck&email=$email");
        exit();
    } else if(checkOldPasswordExist($conn, $oldpassword, $email)){
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

function checkOldPasswordExist($conn, $password_to_check, $email) {
    $sql = 'SELECT password  FROM [User] WHERE [e-mail]=:email';
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    $oldpassword = $stmt->fetchAll();
    $hashedOldPassword = $oldpassword[0]['password'];
    if (!password_verify($password_to_check, $hashedOldPassword)) {
            header("Location: wachtwoordVergeten.php?error=oldpasswordcheck&email=$email");
            exit();
    }
    if($stmt) {
        return true;
    }
    else {
        return false;
    }
}