<?php
require_once("connectingDatabase.php");

$metahttpequiv = "<meta http-equiv=\"x-ua-compatible\" content='ie=edge'>";
$metaCharset = "<meta charset='utf-8'>";
$metaViewport = "<meta name='viewport' content='width=device-width, initial-scale=1.0'>";
$headTitle = "<title>$title</title>";

if (isset($_POST['sendHeader'])) {
    $search = htmlspecialchars($_POST['search']);
}
?>

<!doctype html>
<html class="no-js" lang="nl" dir="ltr">
<head>
    <?php
    echo $metahttpequiv,
    $metaCharset,
    $metaViewport,
    $headTitle;

    if (isset($_POST['sendHeader'])) {
        $sql = "select * from item WHERE title LIKE :searchA OR description like :searchB";
        $data = $conn->prepare($sql);
        $data->execute(array(':searchA' => '%' . $search . '%', ':searchB' => '%' . $search . '%'));
        }
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
                <li><a href="index.php">Home</a></li>
                <li><a href="veiling.php">Veiling</a>
                <li><a href="veilingCategorieOverzicht.php">Veiling categorie overzicht</a></li>
                </li>
                <li><a href="contact.php">Contact</a>
                    <ul class="menu">
                        <li><a href="contact.php">Neem contact met ons op</a></li>
                        <li><a href="voorwaardenCondities.php">Voorwaarden & condities</a></li>
                    </ul>
                </li>
                <li><a href="<?php  if(isset($_SESSION['IDUser']) || isset($_SESSION['IDSeller']) || isset($_SESSION['IDAdmin'])){
                        echo "persoonlijkePagina.php";
                    } ?>">Persoonlijke Pagina</a>
                    <ul class="menu">

                        <?php
                        if(isset($_SESSION['IDUser']) || isset($_SESSION['IDSeller']) || isset($_SESSION['IDAdmin'])){
                            echo "<li><a href= 'uitgelogd.php'>Uitloggen</a></li>";
                        } else {
                            echo "<li><a href='inlog.php'>Inloggen</a></li>";
                            echo "<li><a href='registerVoorpagina.php'>Registreren</a></li>";
                        }
                        ?>
                    </ul>
                </li>
            </ul>
        </div>
        <div class="top-bar-right">
            <ul class="menu">
                <form method="POST" action="resultaten.php">
                    <ul class="menu">
                    <li><label for="search"></label><input type="text" id="search" name="search" placeholder="Zoek"></li>
                     <li><input class="button" type="submit" id="sendHeader" name="sendHeader" value="Zoek"></li>
                    </ul>
                </form>
                <ul><a href="persoonlijkePagina.php"><img src="images/usericon.png" alt="Iproject" width="20"></a></ul>
            </ul>
        </div>
    </div>
    <!--          --><?php
    //          if(isset($_SESSION['IDgebruiker'])) {
    //              echo '<li><a href="ingelogd.php">Admin</a></li>';
    //          }
    //          ?>
</header>
<main>


