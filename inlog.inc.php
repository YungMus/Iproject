<?php

if(isset($_POST['login'])) {

    require 'connectingDatabase.php';

    $username = htmlspecialchars($_POST['Username']);
    $password = htmlspecialchars($_POST['Password']);


    if (empty($username) || empty($password)) {
        header("Location: inlog.php?error=emptyfields");
        exit();
    } else {
        $sql = "SELECT username, is_seller, is_admin, user_id, password, [e-mail] FROM [User] WHERE username=:username";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':username', $username);
        $stmt->execute();
        $users  = $stmt->fetchAll();
        $hashedPassword = $users[0]['password'];

        if ($users){
            if (password_verify($password, $hashedPassword)) {
            $username = $users[0]["username"];
            $email = $users[0]["e-mail"];
            $user_id = $users[0]["user_id"];
            if ($username[0]["is_seller"] == 1) {
                $userrank = " Verkoper ";
                session_start();
                $_SESSION['Username'] = $username;
                $_SESSION['Email'] = $email;
                $_SESSION['Rank'] = $userrank;
                $_SESSION['user_id'] = $user_id;
            } else if ($username[0]["is_admin"] == 1) {
                $userrank = " Admin ";
                session_start();
                $_SESSION['Username'] = $username;
                $_SESSION['Rank'] = $userrank;
                $_SESSION['Email'] = $email;
                $_SESSION['user_id'] = $user_id;
            } else if($username[0]["is_seller"] == 0 && $username[0]["is_admin"] == 0) {
                $userrank = " Gebruiker ";
                session_start();
                $_SESSION['Username'] = $username;
                $_SESSION['Rank'] = $userrank;
                $_SESSION['Email'] = $email;
                $_SESSION['user_id'] = $user_id;
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