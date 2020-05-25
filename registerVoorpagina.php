<?php
$title = 'Registeren';
$link = 'registerVoorpagina.php';

require_once("includes/header.php");

if(isset($_GET['error'])) {
    if($_GET['error'] == "emptyfields"){
        echo '<div data-closable class="alert-box callout warning"> Vul het veld in!
  <button class="close-button" aria-label="Dismiss alert" type="button" data-close>
    <span aria-hidden="true">&CircleTimes;</span>
  </button>
</div>';
    }
    else if($_GET['error'] == "mailnotsent"){
        echo '<div data-closable class="alert-box callout warning"> Je mail is onsuccesvol verzonden!
  <button class="close-button" aria-label="Dismiss alert" type="button" data-close>
    <span aria-hidden="true">&CircleTimes;</span>
  </button>
</div>';
    }
    else if($_GET['error'] == "emailalreadyused"){
        echo '<div data-closable class="alert-box callout warning"> Dit email is al eens gebruikt, gebruik een ander email!
  <button class="close-button" aria-label="Dismiss alert" type="button" data-close>
    <span aria-hidden="true">&CircleTimes;</span>
  </button>
</div>';
    }
    else if($_GET['error'] == "noauthorization"){
        echo '<div data-closable class="alert-box callout warning"> Je hebt geen autorisatie voor dat!
  <button class="close-button" aria-label="Dismiss alert" type="button" data-close>
    <span aria-hidden="true">&CircleTimes;</span>
  </button>
</div>';
    }
    else if($_GET['error'] == "emailinvalid"){
        echo '<div data-closable class="alert-box callout warning"> Jouw email is niet geldig!
  <button class="close-button" aria-label="Dismiss alert" type="button" data-close>
    <span aria-hidden="true">&CircleTimes;</span>
  </button>
</div>';
    }
} else if(isset($_GET['succes'])){
    if($_GET['succes'] == "mailsent"){
        echo '<div data-closable class="alert-box callout success"> Je hebt succesvol een mail verstuurd!
  <button class="close-button" aria-label="Dismiss alert" type="button" data-close>
    <span aria-hidden="true">&CircleTimes;</span>
  </button>
</div>';
    }
}
?>

    <main>
        <form class="form" method="post" action="registerVoorpagina.inc.php">
            <h4 class="text-center">Registreren</h4>
            <h6>Om te kunnen registreren vragen wij eerst uw email. Binnen enkelen minuten zult u een verificatiecode op uw mail ontvangen van ons. Vervolgens krijgt u toegang tot de volledige registratie pagina en kunt u beginnen met uw acccount aan te maken.</h6>
            <label for="form-email">Vul hier je emailadres in
             <br><input type="email" class="form-email" name="Email" id="Email" placeholder="Email">
            </label>
            <p><input type="submit" class="form-button" name="EmailConfirmation"  value="Vraag verificatiecode aan"></input></p>
            <p><a class="space" href="inlog.php">Ben je al lid? Inloggen </a></p>
        </form>
    </main>


<?php
require_once("includes/foundation_script.php");
require_once("includes/footer.php");
?>