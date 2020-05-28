<?php
if (isset($_POST['Verwijder'])) {

    require 'connectingDatabase.php';

    $username = htmlspecialchars($_SESSION['Username']);



    $sql = "DELETE FROM [User] WHERE username = :username"; //user_id='" . $_SESSION["user_id"]);
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':username', $username);
    $stmt->execute();
}
?>