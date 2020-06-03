<?php
$title = 'Wachtwoord vergeten';
$link = 'wachtwoordVergetenVoorpagina.php';
session_start();

require_once("includes/header.php");

if(isset($_GET['error'])) {
    if ($_GET['error'] == "emptyfields") {
        echo '<div data-closable class="alert-box callout warning"> Vul het veld in!
  <button class="close-button" aria-label="Dismiss alert" type="button" data-close>
    <span aria-hidden="true">&CircleTimes;</span>
  </button>
</div>';
    } else if ($_GET['error'] == "emailinvalid") {
        echo '<div data-closable class="alert-box callout warning"> Jouw mail is niet een geldige mail!
  <button class="close-button" aria-label="Dismiss alert" type="button" data-close>
    <span aria-hidden="true">&CircleTimes;</span>
  </button>
</div>';
    } else if($_GET['error'] == "mailnotsent"){
        echo '<div data-closable class="alert-box callout error"> Je mail is onsuccesvol verzonden! Check of je mail geldig is!
  <button class="close-button" aria-label="Dismiss alert" type="button" data-close>
    <span aria-hidden="true">&CircleTimes;</span>
  </button>
</div>';
    } else if($_GET['error'] == "noauthorization"){
        echo '<div data-closable class="alert-box callout warning"> Je hebt geen autorisatie voor dat!
  <button class="close-button" aria-label="Dismiss alert" type="button" data-close>
    <span aria-hidden="true">&CircleTimes;</span>
  </button>
</div>';
    }
} else if(isset($_GET['success'])){
    if($_GET['success'] == "mailsent"){
        echo '<div data-closable class="alert-box callout success"> Je hebt succesvol een mail verstuurd! Check je mailbox!
  <button class="close-button" aria-label="Dismiss alert" type="button" data-close>
    <span aria-hidden="true">&CircleTimes;</span>
  </button>
</div>';
    }
}


?>

    <form class="form" method="post" action="wachtwoordVergetenVoorpagina.inc.php">
            <h4 class="text-center">Verander je wachtwoord hier</h4>
            <label for="form-email">Email
                <input type="text" class="form-input" name="Email" id="email" >
            </label>
            <button type="submit" class="form-button" name="changepassword">Verander wachtwoord</button>
            <p class="text-center"><a href="inlog.php">Toch inloggen?</a></p>
    </form>

<?php
require_once("includes/foundation_script.php");
require_once("includes/footer.html");
?>