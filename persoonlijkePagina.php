<?php
$title = 'Persoonlijke Pagina';
$link = 'persoonlijkePagina.php';
session_start();

require_once("includes/header.php");

if(isset($_SESSION['IDUser'])){
    echo '<p>Ik ben een gebruiker</p>';
}
else if(isset($_SESSION['IDSeller'])){
    echo '<p>Ik ben een seller</p>';
}
else if(isset($_SESSION['IDAdmin'])){
    echo '<p>Ik ben een admin</p>';
}
else{   header("Location: inlog.php?error=noauthorazation");
    exit();
}
?>

<div class="row flex-container">
    <div class="product-card-thumbnail padding-r">
        <a href="#"><img src="https://placehold.it/180x180"/></a>
    </div>
    <div>
    <div class="callout text-center align-center-middle">
        <h1>iConcepts</h1>
    </div>
</div>
</div>

<div class="row flex-container align-left">
    <div class="callout text-center align-left padding-r">
        <p>menu items</p>
    </div>
    <div class="callout text-center align-right">
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                Vestibulum a libero hendrerit, laoreet eros vitae, accumsan eros.
                Donec dui urna, tempus non elit a, tincidunt pulvinar lectus.
                Maecenas non risus auctor tellus convallis volutpat.
                Mauris aliquam feugiat tortor id blandit. Donec laoreet lobortis turpis vitae semper.
                Quisque gravida ornare euismod.</p>
    </div>
</div>

    <div class="row flex-container align-center">
        <div class="callout text-center">
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                Vestibulum a libero hendrerit, laoreet eros vitae, accumsan eros.
                Donec dui urna, tempus non elit a, tincidunt pulvinar lectus.
                Maecenas non risus auctor tellus convallis volutpat.
                Mauris aliquam feugiat tortor id blandit. Donec laoreet lobortis turpis vitae semper.
                Quisque gravida ornare euismod.</p>
        </div>
    </div>

<?php
require_once("includes/foundation_script.php");
require_once("includes/footer.php");
?>