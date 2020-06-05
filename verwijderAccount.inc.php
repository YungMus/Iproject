<?php
if (isset($_POST['delete'])) {
    session_start();
    require 'connectingDatabase.php';
    
    $username = htmlspecialchars($_POST['username']);
    $sessionusername = $_SESSION['Username'];

    if (empty($username)) {
        header("Location: verwijderAccount.php?error=emptyfields");
        exit();
    } else if($username == $sessionusername) {
        $sql = "DELETE FROM [User] WHERE username = :username";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':username', $username);
        $stmt->execute();
        session_unset();
        session_destroy();
            header("Location: verwijderAccount.php?success=deleted");
    } else {
            header("Location: verwijderAccount.php?error=invalid");
        }
    }
?>