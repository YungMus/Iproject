<?php
$title = 'Inlogpagina';
$link = 'veilingCategorieOverzicht.php';
session_start();
require_once("includes/header.php");

if ($_SESSION['Rank'] == " Admin ") {
    $sql = "SELECT DISTINCT title, startvalue, item_id FROM Item WHERE running_endday <= (SELECT CONVERT(date, getdate())) AND running_endday != '2020-05-28'";
    $data = $conn->query($sql);
    $result = $data->fetchAll();
    $count = $data->rowCount();
    $html = "";
    for ($i = 0; $i < $count; $i++) {
        $html .= '<div class="callout primary flex-child-auto"><a href="veiling.php?item=' . $result[$i]['item_id'] . '">' . $result[$i]['title'] . ' &euro;' . $result[$i]['startvalue'] . '</a></div>';
    }
}

echo $html;
require_once("includes/foundation_script.php");
require_once("includes/footer.html");
?>