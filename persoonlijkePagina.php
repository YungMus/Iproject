<?php
$title = 'Persoonlijke Pagina';
require_once("includes/header.php");
?>

<?php
    $html = '<div class="row flex-container">
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
    </div>';
    echo $html;
?>

<?php
require_once("includes/foundation_script.php");
require_once("includes/footer.php");
?>