<?php
if (isset($_POST['VerifyRecoverQuestion'])) {

    require 'connectingDatabase.php';
    session_start();

    $userID = $_SESSION['user_id'];
    $bank = htmlspecialchars($_POST['Bank']);
    $banknumber = htmlspecialchars($_POST['BankNumber']);
    $checkoption = 'NVT';
    $creditcardnumber = htmlspecialchars($_POST['CreditcardNumber']);

    if (empty($banknumber) || !empty($creditcardnumber)) {
        header("Location: verkoopaccountDerdepagina.php?error=emptyfields");
    }
    if (!empty($banknumber) || empty($creditcardnumber)) {
        header("Location: verkoopaccountDerdepagina.php?error=emptyfields");
    }

    $sql = "SELECT user_id FROM [User] WHERE user_id=:userID ";
    $stmt = $conn->prepare($sql);
    $stmt->prepare(':userID', $userID);
    $stmt->execute();
    $userID = $stmt->fetchall();

    if($stmt){
        $sql2 = "INSERT INTO Seller (user_id, bank_code, bank_account_number, check_option, credit_card) VALUES(:user_id, :bank, :bankNumber, :checkoption, :creditcardNumber)";
        $stmt2 = $conn->prepare($sql2);

        $stmt2->bindparam(':user_id', $userID);
        $stmt2->bindparam(':bank', $bank);
        $stmt2->bindParam(':bankNumber', $banknumber);
        $stmt2->bindParam(':checkoption', $checkoption);
        $stmt2->bindParam(':$creditcardNumber', $creditcardnumber);
    }
}