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
        echo '<div data-closable class="alert-box callout warning"> Uw mail is niet geldig!
  <button class="close-button" aria-label="Dismiss alert" type="button" data-close>
    <span aria-hidden="true">&CircleTimes;</span>
  </button>
</div>';
    } else if($_GET['error'] == "mailnotsent"){
        echo '<div data-closable class="alert-box callout error"> Uw mail is onsuccesvol verzonden! Check of u een geldige mail gebruikt!
  <button class="close-button" aria-label="Dismiss alert" type="button" data-close>
    <span aria-hidden="true">&CircleTimes;</span>
  </button>
</div>';
    } else if($_GET['error'] == "noauthorization"){
        echo '<div data-closable class="alert-box callout warning"> U heeft geen autorisatie!
  <button class="close-button" aria-label="Dismiss alert" type="button" data-close>
    <span aria-hidden="true">&CircleTimes;</span>
  </button>
</div>';
    }
} else if(isset($_GET['success'])){
    if($_GET['success'] == "mailsent"){
        echo '<div data-closable class="alert-box callout success"> U heeft de mail ontvangen! Check uw inbox!
  <button class="close-button" aria-label="Dismiss alert" type="button" data-close>
    <span aria-hidden="true">&CircleTimes;</span>
  </button>
</div>';
    }
}


?>

    <form class="form" method="post" action="wachtwoordVergetenVoorpagina.inc.php">
            <h4 class="text-center">Verander uw wachtwoord hier</h4>
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