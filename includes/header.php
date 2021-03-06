<?php
require_once("connectingDatabase.php");

$headTitle = "<title>$title</title>";

if (isset($_POST['sendHeader'])) {
    $search = htmlspecialchars($_POST['search']);
}
?>


<!doctype html>
<html class="no-js" lang="nl" dir="ltr">
<head>
    <meta http-equiv="x-ua-compatible" content='ie=edge'>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <?php
    echo $headTitle;

    ?>

    <link rel="stylesheet" href="css/foundation.css">
    <link rel="stylesheet" href="css/app.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/foundicons/3.0.0/foundation-icons.min.css"/>
</head>
<body>
<header>
    <div class="top-bar">
        <div class="top-bar-left">
            <ul class="dropdown menu" data-dropdown-menu>
                <li class="top-bar-title"><a href="index.php"><img  src="images/Eenmaalandermaal.png" alt="Iproject" width="200"></a></li>
<!--                <li class="menu-text">--><?php //echo $title ?><!--</li>-->
                <li><a href="veilingCategorieOverzicht.php">Veiling categorie overzicht</a></li>
                </li>
                <li><a href="contact.php">Contact</a>
                    <ul class="menu">
                        <li><a href="contact.php">Neem contact met ons op</a></li>
                        <li><a href="voorwaardenCondities.php">Voorwaarden & condities</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <div class="top-bar-right">
            <ul class="menu">
                <form method="POST" action="veilingCategorieOverzicht.php">
                    <ul class="menu">
                    <li><label for="search"></label><input type="text" id="categorie" name="categorie" placeholder="Zoek" required></li>
                     <li><input class="button" type="submit" id="SearchKeyword" name="SearchKeyword" value="Zoek"></li>
                    </ul>
                </form>
                <ul><a href="<?php  if(isset($_SESSION['user_id'])){
                        echo "persoonlijkePagina.php";}
                        else { echo "inlog.php"; }?>
">
                        <img src="images/usericon.png" alt="Iproject" width="20"></a></ul>
            </ul>
        </div>
    </div>
</header>
<main>


