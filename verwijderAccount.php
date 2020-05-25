<?php
$title = 'verwijder account';
$link = 'verwijderAccount.php';
session_start();
require_once("includes/header.php");
?>

<main>
    <form class="form" method="post" action="verwijderAccount.inc.php">
        <h4 class="text-center">Verwijderen account</h4>
        <h6>Vul hier het wachtwoord van het account in om het account te verwijderen. Na het voltooien van deze stap
            wordt uw account en alle persoonsgegevens die er aan gekoppeld zijn permanent verwijdert uit onze database.
            Dit betekent dat u niet meer kunt inloggen en dat het account niet meer terug te halen is.
            Voor meer informatie klik dan <a href="voorwaardenCondities.php">hier voor de voorwaarde pagina.</a></h6>
        <label for="form-password">Wachtwoord
            <input type="password" class="form-password" name="Password" id="Password">
        </label>
        <p><input id="delete-account" type="checkbox"><label for="show-password">Ja, Ik wil mijn iConcepts account en al zijn data permanent verwijderen.</p></label>
        <p><input type="submit" class="form-button" name="delete"  value="VERWIJDER ACCOUNT"></p>
    </form>
</main>

<?php
require_once("includes/foundation_script.php");
require_once("includes/footer.php");
?>
