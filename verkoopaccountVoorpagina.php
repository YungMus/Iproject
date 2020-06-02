<?php
$title = 'Verkoopaccount registeren';
$link = 'verkoopaccountVoorpagina.php';
session_start();

require_once("includes/header.php");

if(isset($_SESSION['Username'])) {
        ?>

        <main>
            <form class="form" method="post" action="verkoopaccountVoorpagina.inc.php">
                <h4 class="text-center">Verkoopaccount registeren</h4>
                <label> Kies een manier om jezelf te verifieren
                    <input type="radio" id="RecoveryQuestion" name="Verify" value="RecoveryQuestion" checked>
                    <label for="RecoveryQuestion">Herstelvraag beantwoorden</label><br>
                    <input type="radio" id="Email" name="Verify" value="Email">
                    <label for="Email">Email versturen</label><br>
                </label>
                </label>
                <p><input type="submit" class="form-button" name="Continue"  value="Ga door"></input></p>
            </form>
        </main>


        <?php
}
else {
    header("Location: persoonlijkePagina.php?error=noauthorization");
}
require_once("includes/foundation_script.php");
require_once("includes/footer.html");
?>
