<?php

if(isset($_POST['login'])) {

    require 'connectingDatabase.php';

    $username = htmlspecialchars($_POST['Username']);
    $password = htmlspecialchars($_POST['Password']);


    if (empty($username) || empty($password)) {
        header("Location: inlog.php?error=emptyfields");
        exit();
    } else {
        $sql = "SELECT username, is_seller, is_admin, user_id, password FROM [User] WHERE username=:username";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':username', $username);
        $stmt->execute();
//        print_r($password);
        $users  = $stmt->fetchAll();
        $hashedPassword = $users[0]['password'];
        print_r(password_verify($password, $hashedPassword));

        if ($users){
            if ($hashedPassword === $password) {
            $username = $users[0]["username"];
            if ($username[0]["is_seller"] == 1) {
                $userrank = " Verkoper ";
                session_start();
                $_SESSION['Username'] = $username;
                $_SESSION['Rank'] = $userrank;
            } else if ($username[0]["is_admin"] == 1) {
                $userrank = " Admin ";
                session_start();
                $_SESSION['Username'] = $username;
                $_SESSION['Rank'] = $userrank;
            } else if($username[0]["is_seller"] == 0 && $username[0]["is_admin"] == 0) {
                $userrank = " Gebruiker ";
                session_start();
                $_SESSION['Username'] = $username;
                $_SESSION['Rank'] = $userrank;
            }
            header("Location: persoonlijkepagina.php?success=login");
            }
            else{
                header("Location: inlog.php?error=invalid");
            }
        } else{
            header("Location: inlog.php?error=invalid");
        }
    }
}