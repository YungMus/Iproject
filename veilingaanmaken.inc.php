<?php

if (isset($_POST['Submit'])) {

    require 'connectingDatabase.php';
    define ('SITE_ROOT', realpath(dirname(__FILE__)));
    $image = $_FILES['file']['name'];
    $filedestination = SITE_ROOT.' /images/thumbnailes' . basename($_FILES['file']['name']);

    if(move_uploaded_file($_FILES['file']['tmp_name'], $filedestination)){
        echo "File is valid, and was successfully uploaded.";
    } else {
        echo "Upload failed";

    }

    $title = $_POST['Title'];
    $description = $_POST['Description'];
    $startprice = $_POST['Startprice'];
    $shippingcosts = $_POST['Shippingcost'];
    $duration = $_POST['Duration'];
    $pay_method = '-';
    $pay_instruction = 'NVT';
    $date = new DateTime();
    $starting_time = date('G:i:s');
    $starting_day = date_modify($date,"$duration");
    $starting_day = $date->format('Y-m-d');
    $ending_time = $starting_time;
    $thumbnail = $_POST['file'];


}
