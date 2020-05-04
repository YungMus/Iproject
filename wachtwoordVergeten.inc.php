<?php
if (isset($_POST['send'])) {
    $sql = "select replace(:oldPassword, :oldPassword, :newPassword) from user WHERE e-mail = :email";
//    $data = $dbh->prepare($sql);
//    $data->execute(array( ':oldPassword' => '%'.$oldPassword.'%', ':newPassword' => '%'.$newPassword.'%', ':email' => $email));
}
?>