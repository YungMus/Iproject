<?php
$title = 'Homepagina';
$link = 'index.php';
session_start();
require_once("includes/header.php");
?>
<div class="hero-section">
    <div class="hero-section-text">
        <h1>Titel</h1>
        <h5>te vervangen ondertitel</h5>
    </div>
</div>
<br>
<nav class="hover-underline-menu" data-menu-underline-from-center>
    <ul class="menu align-center">
        <li><a href="#">Één</a></li>
        <li><a href="#">Twee</a></li>
        <li><a href="#">Drie</a></li>
        <li><a href="#">Vier</a></li>
    </ul>
</nav>
<br>
<div class="grid-x grid-padding-y grid-padding-x">
    <div class="cell small-4 align-self-top"></div>
    <div class="cell small-4 flex-container flex-dir-column">
    <div class="callout primary flex-child-auto">
    Dit is de site van Iconcepts. Op deze site kunt u gemakkelijk veilingen zetten en op veilingen bieden. Als u wilt bieden moet u eerst een account aanmaken.
    Dit kan op <a href="register.php">register</a>. Als u dit eenmaal heeft gedaan kunt u vol gebruik van onze maken.
</div>
</div>
</div>

<article class="product-cards">

<?php
    $sql = "select title, startvalue, description, filename from Item inner join [file] on Item.item_id = [file].item_id order by Item.item_id";
    $data = $conn->prepare($sql);
    $data->execute();
    $html = "";

    $result = $data->fetchAll();
    for ($i = 0; $i < 3; $i ++) {
        $html .= '<div class="product-card">
    <div class="product-card-thumbnail">
        <a href="veiling.php?item=';
        $html .= $i + 1;
        $html .= '"><img src="';
        $html .= $result[$i]["filename"];
        $html .= '" width=180 /></a>
    </div>
    <h2 class="product-card-title "><a href="#">';
        $html .= $result[$i]["title"];
        $html .= '</a></h2>
    <span class="product-card-desc">';
        $html .= $result[$i]["description"];
        $html .= '</span>
    <span class="product-card-price">';
        $html .= $result[$i]["startvalue"];
        $html .= '</span>
    <div class="product-card-colors">';
        for ($y = 0; $y < 4; $y ++) {
            $html .= '<button href="#" class="product-card-color-option"><img src="https://placehold.it/30x30"/></button>';
        }
        $html .= '</div></div> <br>';
    }
    echo $html;

require_once("includes/foundation_script.php");
require_once("includes/footer.php");
?>
