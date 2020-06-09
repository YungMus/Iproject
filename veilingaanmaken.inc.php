<?php

if (isset($_POST['Submit'])) {

    require 'connectingDatabase.php';
    session_start();

    $image = $_FILES['file']['name'];
    $filedestination = 'http://iproject43.icasites.nl/upload/' . basename($_FILES['file']['name']);

    $sellerID = $_SESSION['user_id'];
    $title = $_POST['Title'];
    $description = $_POST['Description'];
    $startprice = $_POST['Startprice'];
    $shippingcosts = $_POST['Shippingcost'];
    $duration = $_POST['Duration'];
    $pay_method = '-';
    $pay_instruction = 'NVT';
    $date = new DateTime();
    $starting_time = date('G:i:s');
    $starting_day = date('Y/m/d');
    $end_day = date_modify($date, "$duration");
    $end_day = $date->format('Y/m/d');
    $ending_time = $starting_time;
    $thumbnail = $image;

    if (empty($title) || empty($description) || empty($startprice) || empty($shippingcosts) || empty($duration) || empty($image)) {
        header("Location: veilingaanmaken.php?error=emptyfields");
    } else {
        if (move_uploaded_file($_FILES['file']['tmp_name'], $filedestination)) {
            $sql = "SELECT MAX(item_id) FROM Item ";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $itemID = $stmt->fetchall();
            $itemID = $itemID[0][0] + 1;

            $sql2 = "SELECT place_name, country FROM [User] WHERE user_id=:userID";
            $stmt2 = $conn->prepare($sql2);

            $stmt2->bindparam(':userID', $sellerID);
            $stmt2->execute();
            $stmt2 = $stmt2->fetchAll();

            $placename = $stmt2[0]['place_name'];
            $country = $stmt2[0]['country'];

            if ($stmt && $stmt2) {
                $sql3 = 'INSERT INTO Item (item_id, title, description, startvalue, pay_method, pay_instruction, placename, country, starting_day, starting_time, shipment_costs, seller, running_endday, running_endtime, thumbnail) 
                        VALUES (:itemID, :title, :description, :startvalue, :pay_method, :pay_instruction, :placename, :country, :starting_day, :starting_time, :shipment_costs, :seller, :running_endday, :running_endtime, :thumbnail)';
                $stmt3 = $conn->prepare($sql3);

                $stmt3->bindparam(':itemID', $itemID);
                $stmt3->bindparam(':title', $title);
                $stmt3->bindparam(':description', $description);
                $stmt3->bindparam(':startvalue', $startprice);
                $stmt3->bindparam(':pay_method', $pay_method);
                $stmt3->bindparam(':pay_instruction', $pay_instruction);
                $stmt3->bindparam(':placename', $placename);
                $stmt3->bindparam(':country', $country);
                $stmt3->bindparam(':starting_day', $starting_day);
                $stmt3->bindparam(':starting_time', $starting_time);
                $stmt3->bindparam(':shipment_costs', $shippingcosts);
                $stmt3->bindparam(':seller', $sellerID);
                $stmt3->bindparam(':running_endday', $end_day);
                $stmt3->bindparam(':running_endtime', $ending_time);
                $stmt3->bindparam(':thumbnail', $thumbnail);
                $stmt3->execute();

                $sql4 = 'INSERT INTO ItemRubric (item_id, most_specific_rubric) VALUES (:itemID, :rubric)';
                $stmt4 = $conn->prepare($sql4);

                $stmt4->bindparam(':itemID', $itemID);
                $stmt4->bindparam(':rubric', $_SESSION['RubricID']);
                $stmt4->execute();
                if ($stmt3 && $stmt4) {
                    header("Location: persoonlijkePagina.php?success=auctionmade");
                    exit();
                } else{
                    echo "Er kan geen verbinding met het database gemaakt worden!";
                }
            } else {
                echo "Er kan geen verbinding met het database gemaakt worden!";
            }
        }
    }
}
else {
    header("Location: persoonlijkePagina.php?error=noauthorization");
    exit();
}
