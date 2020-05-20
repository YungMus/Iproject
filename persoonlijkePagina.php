<?php
$title = 'Persoonlijke Pagina';
$link = 'persoonlijkePagina.php';
session_start();

require_once("includes/header.php");

if(isset($_SESSION['IDUser'])){
    echo '<div data-closable class="alert-box callout info"> Welkom gebruiker!
  <button class="close-button" aria-label="Dismiss alert" type="button" data-close>
    <span aria-hidden="true">&CircleTimes;</span>
  </button>
</div>';
}
else if(isset($_SESSION['IDSeller'])){
    echo '<div data-closable class="alert-box callout info"> Welkom verkoper!
  <button class="close-button" aria-label="Dismiss alert" type="button" data-close>
    <span aria-hidden="true">&CircleTimes;</span>
  </button>
</div>';
}
else if(isset($_SESSION['IDAdmin'])){
    echo '<div data-closable class="alert-box callout info"> Welkom admin!
  <button class="close-button" aria-label="Dismiss alert" type="button" data-close>
    <span aria-hidden="true">&CircleTimes;</span>
  </button>
</div>';
}
else{   header("Location: inlog.php?error=noauthorization");
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