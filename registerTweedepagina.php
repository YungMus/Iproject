<?php
$title = 'Registeren';
$link = 'registerTweedePagina.php';
session_start();

require_once("includes/header.php");

if (isset($_GET['error'])) {
    if ($_GET['error'] == "invalid") {
        echo '<div data-closable class="alert-box callout warning"> Deze mail is niet geldig!
  <button class="close-button" aria-label="Dismiss alert" type="button" data-close>
    <span aria-hidden="true">&CircleTimes;</span>
  </button>
</div>';
    } else if ($_GET['error'] == "nomatch") {
        echo '<div data-closable class="alert-box callout warning"> Uw verificatie code komt niet overeen!
  <button class="close-button" aria-label="Dismiss alert" type="button" data-close>
    <span aria-hidden="true">&CircleTimes;</span>
  </button>
</div>';
    } else if ($_GET['error'] == "emptyfields") {
        echo '<div data-closable class="alert-box callout warning"> Vul alle velden in!
  <button class="close-button" aria-label="Dismiss alert" type="button" data-close>
    <span aria-hidden="true">&CircleTimes;</span>
  </button>
</div>';
    } else if ($_GET['error'] == "emailinvalid") {
        echo '<div data-closable class="alert-box callout warning"> Uw email is niet geldig!
  <button class="close-button" aria-label="Dismiss alert" type="button" data-close>
    <span aria-hidden="true">&CircleTimes;</span>
  </button>
</div>';
    } else if ($_GET['error'] == "expired") {
        echo '<div data-closable class="alert-box callout warning"> Uw verificatie code is verlopen! Stuur opnieuw een verificatie code naar uw mail!
  <button class="close-button" aria-label="Dismiss alert" type="button" data-close>
    <span aria-hidden="true">&CircleTimes;</span>
  </button>
</div>';
    } else if ($_GET['error'] == "tokennotverified") {
        echo '<div data-closable class="alert-box callout warning"> Uw mail is nog niet geverifieerd, verifieer het nogmaals aub!
  <button class="close-button" aria-label="Dismiss alert" type="button" data-close>
    <span aria-hidden="true">&CircleTimes;</span>
  </button>
</div>';
    }
    else if($_GET['error'] == "emailinvalid"){
        echo '<div data-closable class="alert-box callout warning"> Uw mail is niet bekend bij ons! Probeer het opnieuw!
  <button class="close-button" aria-label="Dismiss alert" type="button" data-close>
    <span aria-hidden="true">&CircleTimes;</span>
  </button>
</div>';
    }
}

if($_GET['email']) {
    ?>
    <main>
        <form class="form" method="post" action="registerTweedepagina.inc.php">
            <h4 class="text-center">Verifieren</h4>
            <input class="form-input" type="text" name="email" placeholder="Uw emailadres">
            <input class="form-input" type="text" name="token" placeholder="Uw verificatie code">
            <input class="form-button" type="submit" name="confirmtoken" value="Ga door">
            <p class="middle">Al een account? <a href="inlog.php">Log in</a></p>
            <p class="middle"><a href="voorwaardenCondities.php">Voorwaarden &amp; Condities</a></p>
        </form>
    </main>
    <?php
}else {
    header("Location: registerVoorpagina.php?error=noauthorazation");
}

require_once("includes/foundation_script.php");
require_once("includes/footer.html");
?>