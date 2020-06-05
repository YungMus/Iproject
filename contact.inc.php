<?php
session_start();
if(isset($_POST['send'])) {

    require 'connectingDatabase.php';

    $fullname = htmlspecialchars(trim($_POST['Fullname']));
    $email = htmlspecialchars(trim($_POST['Email']));
    $phonenumber = htmlspecialchars(trim($_POST['Phonenumber']));
    $message = htmlspecialchars(trim($_POST['Message']));
    $date = date('d/m/Y/G:i:s');

    if (empty($fullname) || empty($email) || empty($message)) {
        header("Location: contact.php?error=emptyfield&fullname=" . $fullname . "&email=" . $email . "&phonenumber=" . $phonenumber . "&message=" . $message);
        exit();
    }
else {
    $sql = "INSERT INTO Contact (fullname, [e-mail], phone, message, date) VALUES (:fullname, :email, :phone, :message, :date)";
    $stmt = $conn->prepare($sql);

    $stmt->bindparam(':fullname', $fullname);
    $stmt->bindparam(':email', $email);
    $stmt->bindparam(':phone', $phonenumber);
    $stmt->bindparam(':message', $message);
    $stmt->bindparam(':date', $date);
    $stmt->execute();

    header("Location: contact.php?success=messagesent");
}
} else{
    header("Location: contact.php?error=noauthorization");
}