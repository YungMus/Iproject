<?php
$title = 'Veiling';
$link = 'veiling.php';
require_once("includes/header.php");
$item = $_GET['item'];

$sql = "select title, startvalue, description, filename from Item inner join [file] on Item.item_id = [file].item_id where Item.item_id = $item";
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
  </div>
</div> <h1>';
$html .= $result[0]['title'];
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