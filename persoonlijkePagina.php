<?php
$title = 'Persoonlijke Pagina';
$link = 'persoonlijkePagina.php';
session_start();

require_once("includes/header.php");

if(isset($_SESSION['IDUser'])){
    echo '<div data-closable class="alert-box callout success">
  <i class="fa fa-check"></i> Je bent succesvol ingelogd gebruiker!
  <button class="close-button" aria-label="Dismiss alert" type="button" data-close>
    <span aria-hidden="true">&CircleTimes;</span>
  </button>
</div>';
}
else if(isset($_SESSION['IDSeller'])){
    echo '<div data-closable class="alert-box callout success">
  <i class="fa fa-check"></i> Je bent succesvol ingelogd verkoper!
  <button class="close-button" aria-label="Dismiss alert" type="button" data-close>
    <span aria-hidden="true">&CircleTimes;</span>
  </button>
</div>';
}
else if(isset($_SESSION['IDAdmin'])){
    echo '<div data-closable class="alert-box callout success">
  <i class="fa fa-check"></i> Je bent succesvol ingelogd admin!
  <button class="close-button" aria-label="Dismiss alert" type="button" data-close>
    <span aria-hidden="true">&CircleTimes;</span>
  </button>
</div>';
}
else{   header("Location: inlog.php?error=noauthorization");
    exit();
}

?>
    <div class="row flex-container align-center">
        <div class="callout text-center">
            <p>Dit is de persoonlijke pagina</p>
            <?php
            if(isset($_SESSION['IDUser']) || isset($_SESSION['IDSeller']) || isset($_SESSION['IDAdmin'])){
                echo "<a class=\"button large\" href= 'uitgelogd.php'>Uitloggen</a>";            }
            ?>
        </div>
    </div>

<?php
require_once("includes/foundation_script.php");
require_once("includes/footer.php");
?>