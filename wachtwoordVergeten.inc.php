<?php

if (isset($_POST['Changepassword'])) {



    require 'connectingDatabase.php';

    $email = $_GET['email'];
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
        $resultSet = $conn->query("SELECT password FROM Password_lost_token WHERE password='$oldpassword'");

        if ($resultSet) {
            $update = $conn->query("UPDATE [User] SET password = $newpassword WHERE password = '$oldpassword'");
            if ($update) {
                header("Location: inlog.php?success=verified");
            } else {
                echo "Er is een probleem met het verbinden met onze server!";
            }
        } else {
            header("Location: wachtwoordVergetenTweedepagina.php?error=invalid&email=$email");
        }
    }

}

function checkOldPasswordExist($conn, $password_to_check, $email) {
    $sql = 'SELECT password  FROM [User] WHERE password=:password';
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':password', $password_to_check);
    $stmt->execute();
    $stmt = $stmt->fetchAll();
    if($stmt[0]['password'] === $password_to_check){
        header("Location: wachtwoordVergetenTweedepagina.php?error=oldpasswordcheck&email=$email");
        exit();
    }
    if($stmt) {
        return true;
    }
    else {
        return false;
    }
}