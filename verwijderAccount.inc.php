<?php
if (isset($_POST['delete'])) {

    require 'connectingDatabase.php';

    $username = htmlspecialchars($_POST['username']);



    $sql = "DELETE FROM [User] WHERE username = :username"; //user_id='" . $_SESSION["user_id"]);
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':username', $username);
    $stmt->execute();
    $users  = $stmt->fetchAll();
}
?>