<?php
$title = 'Veiling aanmaken';
$link = 'veilingaanmakenVoorpagina.php';
session_start();
require_once("includes/header.php");
if(($_SESSION['Rank'] = ' Verkoper ')) {
    require_once("rubriekenboomOverzichtVeilingaanmaken.php");
} else{
    header("Location: persoonlijkePagina.php?error=noauthorization");
    exit();
}
require_once("includes/foundation_script.php");
require_once("includes/footer.html");
?>