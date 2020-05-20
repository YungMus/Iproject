<?php

if(isset($_POST['login'])) {

    require 'connectingDatabase.php';

    $email = htmlspecialchars($_POST['Email']);
    $password = htmlspecialchars($_POST['Password']);
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    if (empty($email) || empty($password)) {
        header("Location: inlog.php?error=emptyfields");
        exit();
    } else {
        $sql = "SELECT username, is_seller, is_admin, user_id FROM [User] WHERE [e-mail]= :email AND password= :password";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password);
        $stmt->execute();
        $results = $stmt->fetchAll();

        if($results != null) {
            $username = $results[0]["username"];
            if ($results[0]["is_seller"] == 1) {
                $userrank = "Seller";
                session_start();
                $_SESSION['IDSeller'] = $results[0]['user_id'];
            } else if ($results[0]["is_admin"] == 1) {
                $userrank = "Admin";
                session_start();
                $_SESSION['IDAdmin'] = $results[0]['user_id'];
            } else {
                $userrank = "User";
                session_start();
                $_SESSION['IDUser'] = $results[0]['user_id'];
            }
            header("Location: persoonlijkepagina.php?succes=login");
        } else {
        header("Location: inlog.php?error=invalid");
        }
    }
}