<?php
if (isset($_POST['Verwijder'])) {

    require 'connectingDatabase.php';

    $username = htmlspecialchars($_SESSION['Username']);



    $sql = "DELETE FROM [User] WHERE username = :username";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':username', $username);
    $stmt->execute();
}
?>