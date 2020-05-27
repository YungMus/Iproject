<?php
$title = 'Registeren';
$link = 'registerTweedePagina.php';
session_start();

require_once("includes/header.php");

if (isset($_GET['error'])) {
    if ($_GET['error'] == "invalid") {
        echo '<div data-closable class="alert-box callout warning"> Dit mail is niet geldig!
  <button class="close-button" aria-label="Dismiss alert" type="button" data-close>
    <span aria-hidden="true">&CircleTimes;</span>
  </button>
</div>';
    } else if ($_GET['error'] == "nomatch") {
        echo '<div data-closable class="alert-box callout warning"> Je verificatie code komt niet overeen!
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
        echo '<div data-closable class="alert-box callout warning"> Je email is niet geldig!
  <button class="close-button" aria-label="Dismiss alert" type="button" data-close>
    <span aria-hidden="true">&CircleTimes;</span>
  </button>
</div>';
    } else if ($_GET['error'] == "expired") {
        echo '<div data-closable class="alert-box callout warning"> Je verificatie code is verlopen! Stuur opnieuw een verificatie code naar je mail!
  <button class="close-button" aria-label="Dismiss alert" type="button" data-close>
    <span aria-hidden="true">&CircleTimes;</span>
  </button>
</div>';
    }
}

if($_GET['email']) {
    $email = $_GET['email'];
    $sql = "SELECT [e-mail] FROM Email_verification_token WHERE [e-mail]= :email";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    $results = $stmt->fetchAll();
    if($results[0][0] != $email){
        header("Location: registerVoorpagina.php?error=noauthorization");
    }
    else {
        ?>


        <main>
            <form class="form" method="post" action="registerTweedepagina.inc.php">
                <h4 class="text-center">Verifieren</h4>
                <input class="form-email" type="text" name="email" placeholder="Jouw emailadres">
                <input class="form-token" type="text" name="token" placeholder="Jouw verificatie code">
                <input class="form-button" type="submit" name="confirmtoken" value="Ga door">
                <p class="middle">Al een account? <a href="inlog.php">Log in</a></p>
                <p class="middle"><a href="voorwaardenCondities.php">Voorwaarden &amp; Condities</a></p>
            </form>
        </main>

        <?php
    }
}
else {
//    header("Location: registerVoorpagina.php?error=noauthorazation");
}

require_once("includes/foundation_script.php");
require_once("includes/footer.php");
?>