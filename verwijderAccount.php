<?php
$title = 'verwijder account';
$link = 'verwijderAccount.php';
session_start();
require_once("includes/header.php");

/* if(isset($_GET['error'])) {
    if ($_GET['error'] == "emptyfields") {
        echo '<div data-closable class="alert-box callout warning"> Vul de velden in!
  <button class="close-button" aria-label="Dismiss alert" type="button" data-close>
    <span aria-hidden="true">&CircleTimes;</span>
  </button>
</div>';
    } else if ($_GET['error'] == "invalid") {
        echo '<div data-closable class="alert-box callout alert">ingevoerde gegevens kloppen niet!
<button class="close-button" aria-label="Dismiss alert" type="button" data-close>
    <span aria-hidden="true">&CircleTimes;</span>
  </button>
</div>';
    } else if (isset($_GET['success'])) {
        if ($_GET['success'] == "verwijdert") {
            echo '<div data-closable class="alert-box callout success"> Het account is verwijdert!
  <button class="close-button" aria-label="Dismiss alert" type="button" data-close>
    <span aria-hidden="true">&CircleTimes;</span>
  </button>
</div>';
        }
    }
} */
?>



<main>
    <form class="form" method="post" action="verwijderAccount.inc.php">
        <h4 class="text-center">Verwijderen account</h4>
        <h6>Vul hier het wachtwoord van het account in om het account te verwijderen. Na het voltooien van deze stap
            wordt uw account en alle persoonsgegevens die er aan gekoppeld zijn permanent verwijdert uit onze database.
            Dit betekent dat u niet meer kunt inloggen en dat het account niet meer terug te halen is.
            Voor meer informatie klik dan <a href="voorwaardenCondities.php">hier voor de voorwaarde pagina.</a></h6>
        <input type="username" name="username" id="username">
        <p><input id="delete-account" type="checkbox"><label for="delete-account">Ja, Ik wil mijn iConcepts account en al zijn data permanent verwijderen.</p></label>
        <p><input type="submit" class="form-button" name="delete"  value="VERWIJDER ACCOUNT"></p>
    </form>
</main>

<?php
require_once("includes/foundation_script.php");
require_once("includes/footer.html");
?>
