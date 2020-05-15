<?php

if(isset($_POST['login']) || $_POST['login-sending']) {

    require 'connectingDatabase.php';

    $email = htmlspecialchars($_POST['Email']);
    $password = htmlspecialchars($_POST['Password']);
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    if (empty($email) || empty($password)) {
        header("Location: inlog.php?error=emptyfields");
        exit();
    }
    else {
        $sql = "SELECT username, is_seller, is_admin FROM [User] WHERE [e-mail]=? AND password=?";
        $stmt = $conn->prepare($sql);
        print_r("EMAIL" . $email);
        print_r("Password" . $password);
        $stmt->bindParam(1, $email);
        $stmt->bindParam(2, $password);
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if($results != null) {
            $username = $result["username"];
            if ($result["is_seller"] == 1) {
                $userrank = "Seller";
                session_start();
                $_SESSION['IDSeller'] = $result['user_id'];
            } else if ($result["is_admin"] == 1) {
                $userrank = "Admin";
                session_start();
                $_SESSION['IDAdmin'] = $result['user_id'];
            } else {
                $userrank = "User";
                session_start();
                $_SESSION['IDUser'] = $result['user_id'];
            }
            header("Location: persoonlijkepagina.php?login=success");
        } else {
        header("Location: inlog.php?login=invalid");
        }
/*        while ($results[0]) {
            print_r($results);

        }*/
    }
}