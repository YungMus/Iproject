<?php
if (isset($_POST['Submit'])) {

    require 'connectingDatabase.php';
    session_start();

    $userID = $_SESSION['user_id'];
    $bank = htmlspecialchars($_POST['Bank']);
    $banknumber = htmlspecialchars($_POST['BankNumber']);
    if(empty($banknumber)){
        $banknumber = 'NVT';
    }
    $checkoption = 'NVT';
    $creditcardnumber = htmlspecialchars($_POST['CreditcardNumber']);
    if(empty($creditcardnumber)){
        $creditcardnumber = 'NVT';
    }

    if (empty($banknumber) || empty($creditcardnumber)) {
        header("Location: verkoopaccountDerdepagina.php?error=emptyfields");
        exit();
    }

    $sql = "SELECT user_id FROM [User] WHERE user_id=:userID ";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':userID', $userID);
    $stmt->execute();
    $userID = $stmt->fetchall();

    if($stmt){
        $sql2 = "INSERT INTO Seller (user_id, bank_code, bank_account_number, check_option, credit_card) VALUES(:user_id, :bank, :bankNumber, :checkoption, :creditcardNumber)";
        $stmt2 = $conn->prepare($sql2);

        $stmt2->bindparam(':user_id', $userID[0]['user_id']);
        $stmt2->bindparam(':bank', $bank);
        $stmt2->bindParam(':bankNumber', $banknumber);
        $stmt2->bindParam(':checkoption', $checkoption);
        $stmt2->bindParam(':creditcardNumber', $creditcardnumber);
        $stmt2->execute();
        header("Location: verkoopaccountOverzicht.php?success=overview&bank=$bank.&banknumber=$banknumber.&creditcardnumber=$creditcardnumber");
    }
} else{
    header("Location: persoonlijkePagina.php?error=noauthorization");
    exit();
}