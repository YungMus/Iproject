<?php

if (isset($_POST['Submit'])) {

    require 'connectingDatabase.php';
    session_start();

    $email = $_SESSION['Email'];
    $update = $conn->query("UPDATE [User] SET is_seller = 1 WHERE [e-mail] ='$email'");
    if ($update) {
        session_start();
        $userrank = " Verkoper ";
        $_SESSION['Rank'] = $userrank;
        header("Location: persoonlijkePagina.php?success=seller");
        exit();
    } else {
        echo "Er is een probleem met het verbinden met onze server!";
    }

}

else if (isset($_POST['Goback'])) {
    require 'connectingDatabase.php';
    session_start();
    $userID = $_SESSION['user_id'];
    $sql = "DELETE FROM Seller WHERE user_id = :userID";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':userID', $userID);
    $stmt->execute();
    header("Location: verkoopaccountDerdepagina.php");
    exit();

} else{
    header("Location: persoonlijkePagina.php?error=noauthorization");
    exit();
}