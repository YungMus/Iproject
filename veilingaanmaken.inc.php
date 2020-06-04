<?php

if (isset($_POST['Submit'])) {

    require 'connectingDatabase.php';

    $image = $_FILES['Image']['name'];
    $filedestination = ' ../images/thumbnails/' . basename($_FILES['Image']['name']);
    move_uploaded_file($_FILES['Image']['tmp_name'], $filedestination);

    print_r($image);
    $title = $_POST['Title'];
    $description = $_POST['Description'];
    $startprice = $_POST['Startprice'];
    $shippingcosts = $_POST['Shippingcost'];
    $duration = $_POST['Duration'];
    $pay_method = '-';
    $pay_instruction = 'NVT';
    $date = new DateTime();
    $date->format('Y-m-d');
    $starting_time = date('G:i:s');
    $starting_day = date_modify($date,"$duration");
    print_r($starting_day);
    $ending_time = $starting_time;
    $thumbnail = $_POST['Image'];
}