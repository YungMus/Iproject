<?php
$title = 'Inlogpagina';
$link = 'inlog.php';

session_start();

require_once("includes/header.php");

if(isset($_GET['error'])) {
    if ($_GET['error'] == "emptyfields") {
        echo '<div data-closable class="alert-box callout warning"> Vul de velden in!
  <button class="close-button" aria-label="Dismiss alert" type="button" data-close>
    <span aria-hidden="true">&CircleTimes;</span>
  </button>
</div>';
    } else if ($_GET['error'] == "invalid") {
        echo '<div data-closable class="alert-box callout alert"> Je ingevoerde gegevens kloppen niet!
<button class="close-button" aria-label="Dismiss alert" type="button" data-close>
    <span aria-hidden="true">&CircleTimes;</span>
  </button>
</div>';
    } else if ($_GET['error'] == "noauthorization") {
        echo '<div data-closable class="alert-box callout alert"> Je hebt geen autorisatie!
<button class="close-button" aria-label="Dismiss alert" type="button" data-close>
    <span aria-hidden="true">&CircleTimes;</span>
  </button>
</div>';
    } else if ($_GET['error'] == "alreadyverified") {
        echo '<div data-closable class="alert-box callout warning"> Je account is al geverifieerd! Probeer in te loggen!
  <button class="close-button" aria-label="Dismiss alert" type="button" data-close>
    <span aria-hidden="true">&CircleTimes;</span>
  </button>
</div>';
    }
}
    else if (isset($_GET['success'])) {
        if ($_GET['success'] == "accountmade") {
            echo '<div data-closable class="alert-box callout success"> Je account is succesvol aangemaakt!
  <button class="close-button" aria-label="Dismiss alert" type="button" data-close>
    <span aria-hidden="true">&CircleTimes;</span>
  </button>
</div>';
        } else if ($_GET['success'] == "logout") {
            echo '<div data-closable class="alert-box callout success"> Je bent succesvol uitgelogd!
  <button class="close-button" aria-label="Dismiss alert" type="button" data-close>
    <span aria-hidden="true">&CircleTimes;</span>
  </button>
</div>';
        }
    }

if(!isset($_SESSION['Username'])) {
    ?>

    <main>
        <form class="form" method="post" action="inlog.inc.php">
            <h4 class="text-center">Log in met je account</h4>
            <label for="form-username">Gebruikersnaam
                <input type="text" class="form-input" name="Username" id="Username">
            </label>
            <label for="form-password">Wachtwoord
                <input type="password" class="form-input" name="Password" id="password">
            </label>
            <p><input type="submit" class="form-button" name="login" value="Log in"></input></p>
            <p><a class="space" href="wachtwoordVergetenVoorpagina.php">Wachtwoord vergeten?</a> <a
                    href="registerVoorpagina.php">Geen inloggegevens?</a></p>
        </form>
    </main>

    <?php
} else{
    header("Location: persoonlijkepagina.php?error=alreadyloggedin");
}
require_once("includes/foundation_script.php");
require_once("includes/footer.html");
?>