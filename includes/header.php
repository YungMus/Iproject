<?php
$metahttpequiv = "<meta http-equiv=\"x-ua-compatible\" content='ie=edge'>";
$metaCharset = "<meta charset='utf-8'>";
$metaViewport = "<meta name='viewport' content='width=device-width, initial-scale=1.0'>";
$headTitle = "<title>$title</title>";

if (($_SERVER['REQUEST_METHOD'] === 'POST')) {
    if (isset($_POST['search'])){
        $search = htmlspecialchars(trim($_POST['search']));
        echo $search;
    }
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
//        $data = $dbh->prepare($sql);
//        $data->execute(array(':searchA' => '%' . $search . '%', ':searchB' => '%' . $search . '%'));
        }


    ?>

    <link rel="stylesheet" href="css/foundation.css">
    <link rel="stylesheet" href="css/app.css">
    <link rel="stylesheet"
          href="//cdnjs.cloudflare.com/ajax/libs/foundicons/3.0.0/foundation-icons.min.css"/>
</head>
<body>
<header>
    <div class="top-bar">
        <div class="top-bar-left">
            <ul class="dropdown menu" data-dropdown-menu>
                <li class="menu-text"><?php echo $title ?></li>
                <li><a href="index.php">Home</a></li>
                <li><a href="veiling.php">veiling</a>
                <li><a href="veilingCategorieOverzicht.php">veiling categorie overzicht</a></li>
                </li>
                <li><a href="contact.php">Contact</a>
                    <ul class="menu">
                        <li><a href="contact.php">Contact</a></li>
                        <li><a href="voorwaardenCondities.php">Voorwaarden & condities</a></li>
                    </ul>
                </li>
                <li><a href="persoonlijkePagina.php">persoonlijke Pagina</a>
                    <ul class="menu">
                        <li><a href="inlog.php">inloggen</a></li>
                        <li><a href="register.php">registreren</a></li>
                    </ul>
                </li>

            </ul>
        </div>
        <div class="top-bar-right">
            <ul class="menu">
                <form method="POST" action=<?php echo $link;?>>
                <li><label for="search"></label><input type="text" id="search" name="search" placeholder="Search"></li>
                <li><input type="submit" id="sendHeader" name="sendHeader" value="Search"></li>
                </form>
            </ul>
        </div>
    </div>
    <!--          --><?php
    //          if(isset($_SESSION['IDgebruiker'])) {
    //              echo '<li><a href="ingelogd.php">Admin</a></li>';
    //          }
    //          ?>
</header>
