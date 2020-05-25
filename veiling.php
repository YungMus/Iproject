<?php
$title = 'Veiling';
$link = 'veiling.php';
session_start();
require_once("includes/header.php");
$item = 1;
if (isset($_GET['item'])) {
    $item = $_GET['item'];
}

$sql = "select title, startvalue, description, running_endday, running_endtime, placename, username, [file] from Item inner join Pictures on Item.item_id = Pictures.item_id inner join [user] on Item.seller = [user].user_id where Item.item_id = $item";
$data = $conn->query($sql);
$html = "";

$result = $data->fetchAll();
$html .= '<div class="grid-x grid-padding-y grid-padding-y">
    <div class="product-card-thumbnail padding-r">
        <a href="#"><img src="/pics/';
$html .= $result[0]["[file]"];
$html .= '"/></a>
    </div>  <div class="cell small-4 flex-container flex-dir-column">

  <h2>';
$html .= $result[0]['username'] . ' 50.0' ;//$result[0]['Rating'];
$html .= '</h2> <p>';
$html .= $result[0]['running_endday'];
$html .= '&nbsp;&nbsp;';
$html .= $result[0]['running_endtime'];
$html .= '</p> <p>';
$html .= $result[0]['placename'];
$html .= '</p> ';
$html .= '<div class="row flex-container align-left">
    </div>
    <div class="callout text-center align-right"> <p>';
$html .= $result[0]['description'];
$html .= '</p>';
$html .= '</div> </div> <h1>';
$html .= $result[0]['title'];
$html .= '&nbsp;&euro;';
$html .= $result[0]['startvalue'];
$html .= '</h1>
</div>
</div>';

echo $html;

$sql = "SELECT TOP 5 username, offer_amount FROM Offer INNER JOIN  [User] ON Offer.user_id = [User].user_id WHERE item_id = $item ORDER BY offer_amount";
$data = $conn->query($sql);
$html = "";
$result = $data->fetchAll();
$count = $data->rowCount();
$index = 0;

while ($index < $count){
    $html .= '<h3>' . $result[$index]['username'] . ' ' . $result[$index]['offer_amount'] . '</h3>';
    $index ++;
}
echo $html;

require_once("includes/foundation_script.php");
require_once("includes/footer.php");
?>