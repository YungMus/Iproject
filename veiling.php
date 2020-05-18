<?php
$title = 'Veiling';
$link = 'veiling.php';
require_once("includes/header.php");
$item = 1;
if (isset($_GET['item'])) {
    $item = $_GET['item'];
}

$sql = "select title, startvalue, description, running_endday, running_endtime, placename, username, filename from Item inner join [file] on Item.item_id = [file].item_id inner join [user] on Item.seller = [user].user_id where Item.item_id = $item";
$data = $conn->prepare($sql);
$data->execute();
$html = "";

$result = $data->fetchAll();
$html .= '<div class="grid-x grid-padding-y grid-padding-y">
    <div class="product-card-thumbnail padding-r">
        <a href="#"><img src="';
$html .= $result[0]["filename"];
$html .= '"/></a>
    </div>  <div class="cell small-4 flex-container flex-dir-column">
    <div class="callout primary flex-child-auto-veiling">Veiling</div>
    <div class="callout primary flex-child-auto-veiling">Veiling</div>

  <h2>';
$html .= $result[0]['username'];
$html .= '</h2> <p>';
$html .= $result[0]['running_endday'];
$html .= '&nbsp;&nbsp;';
$html .= $result[0]['running_endtime'];
$html .= '</p> <p>';
$html .= $result[0]['placename'];
$html .= '</p>
</div> </div> <h1>';
$html .= $result[0]['title'];
$html .= '&nbsp;&euro;';
$html .= $result[0]['startvalue'];
$html .= '</h1><div class="row flex-container align-left">
    </div>
    <div class="callout text-center align-right">
        <p>';
$html .= $result[0]['description'];
$html .= '</p>
    </div>
</div>';

echo $html;


require_once("includes/foundation_script.php");
require_once("includes/footer.php");
?>