<?php
$title = 'Registeren';
$link = 'registerVoorpagina.php';
session_start();

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
        echo '<div data-closable class="alert-box callout warning"> Uw mail is onsuccesvol verzonden! Check of uw mail geldig is!
  <button class="close-button" aria-label="Dismiss alert" type="button" data-close>
    <span aria-hidden="true">&CircleTimes;</span>
  </button>
</div>';
    }
    else if($_GET['error'] == "emailalreadyused"){
        echo '<div data-closable class="alert-box callout warning"> Deze mail is al eens gebruikt, gebruik een ander mail!
  <button class="close-button" aria-label="Dismiss alert" type="button" data-close>
    <span aria-hidden="true">&CircleTimes;</span>
  </button>
</div>';
    }
    else if($_GET['error'] == "noauthorization"){
        echo '<div data-closable class="alert-box callout warning"> U heeft geen autorisatie voor dat!
  <button class="close-button" aria-label="Dismiss alert" type="button" data-close>
    <span aria-hidden="true">&CircleTimes;</span>
  </button>
</div>';
    }
} else if(isset($_GET['success'])){
    if($_GET['success'] == "mailsent"){
        echo '<div data-closable class="alert-box callout success"> U heeft succesvol een mail verstuurd! Check uw inbox!
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
            <h6>Om te kunnen registreren vragen wij eerst uw email adres. Binnen enkelen minuten zult u een verificatiecode ontvangen. Vervolgens krijgt u toegang tot de volledige registratie pagina en kunt u beginnen het aanmaken van uw account.</h6>
            <label for="form-email">Vul hier je emailadres in
             <br><input type="email" class="form-input" name="Email" id="Email" placeholder="Email">
            </label>
            <p><input type="submit" class="form-button" name="EmailConfirmation"  value="Vraag verificatiecode aan"></input></p>
            <p><a class="space" href="inlog.php">Bent u al lid? Inloggen </a></p>
        </form>
    </main>


<?php
require_once("includes/foundation_script.php");
require_once("includes/footer.html");
?>