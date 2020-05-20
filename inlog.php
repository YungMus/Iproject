<?php
$title = 'Inlogpagina';
$link = 'inlog.php';

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
    } else if (isset($_GET['succes'])) {
        if ($_GET['succes'] == "accountmade") {
            echo '<div data-closable class="alert-box callout success"> Je account is succesvol aangemaakt!
  <button class="close-button" aria-label="Dismiss alert" type="button" data-close>
    <span aria-hidden="true">&CircleTimes;</span>
  </button>
</div>';
        }
    }
}
?>

<main>
    <form class="form" method="post" action="inlog.inc.php">
        <h4 class="text-center">Log in met je account</h4>
        <label for="form-email">Email
            <input type="email" class="form-email" name="Email" id="Email">
        </label>
        <label for="form-password">Wachtwoord
          <input type="password" class="form-password" name="Password" id="password">
        </label>
        <input type="checkbox" id="show-password"><label for="show-password">Laat wachtwoord zien</label>
        <p><input type="submit" class="form-button" name="login"  value="Log in"></input></p>
        <p><a class="space" href="wachtwoordVergeten.php">Wachtwoord vergeten?</a> <a href="registerVoorpagina.php">Geen inloggegevens?</a></p>
    </form>
</main>

<?php
require_once("includes/foundation_script.php");
require_once("includes/footer.php");
?>