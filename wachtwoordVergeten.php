<?php
$title = 'Wachtwoord herstellen';
$link = 'wachtwoordVergeten.php';

require_once("includes/header.php");

if(isset($_GET['error'])) {
    if ($_GET['error'] == "emptyfields") {
        echo '<div data-closable class="alert-box callout warning"> Vul het veld in!
  <button class="close-button" aria-label="Dismiss alert" type="button" data-close>
    <span aria-hidden="true">&CircleTimes;</span>
  </button>
</div>';
    } else if ($_GET['error'] == "passwordcheck") {
        echo '<div data-closable class="alert-box callout warning"> Uw wachtwoord komt niet met elkaar overeen! Check of uw wachtwoord overeen komt!
  <button class="close-button" aria-label="Dismiss alert" type="button" data-close>
    <span aria-hidden="true">&CircleTimes;</span>
  </button>
</div>';
    } else if ($_GET['error'] == "passwordcheck") {
        echo '<div data-closable class="alert-box callout warning"> Uw wachtwoord komt niet met elkaar overeen! Check of uw wachtwoord overeen komt!
  <button class="close-button" aria-label="Dismiss alert" type="button" data-close>
    <span aria-hidden="true">&CircleTimes;</span>
  </button>
</div>';
    } else if ($_GET['error'] == "oldpasswordcheck") {
        echo '<div data-closable class="alert-box callout warning"> Uw oude wachtwoord klopt niet! Vul het juiste wachtwoord in!
  <button class="close-button" aria-label="Dismiss alert" type="button" data-close>
    <span aria-hidden="true">&CircleTimes;</span>
  </button>
</div>';
    }
} else if(isset($_GET['success'])){
    if($_GET['success'] == "confirmed"){
        echo '<div data-closable class="alert-box callout success"> U bent succesvol door ons bevestigd! Verander uw wachtwoord nu!
  <button class="close-button" aria-label="Dismiss alert" type="button" data-close>
    <span aria-hidden="true">&CircleTimes;</span>
  </button>
</div>';
    }
}

if($_GET['email']) {
    $email = $_GET['email'];
    $sql = "SELECT [e-mail] FROM [User] WHERE [e-mail]= :email";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':email', $email);
    $stmt->execute();

        ?>
        <main>
            <form class="form" method="post" action="wachtwoordVergeten.inc.php">
                <h4 class="text-center">Voer uw oude en nieuwe wachtwoorden in</h4>
                <input class="form-input" type="text" name="Email" value="<?php echo $email ?>" readonly>
                <input class="form-input" type="password" name="NewPassword" placeholder="Uw nieuwe wachtwoord">
                <input class="form-input" type="password" name="NewPassword-repeat"
                       placeholder="Herhaal uw nieuwe wachtwoord">
                <input class="form-button" type="submit" name="Changepassword" value="Verander uw wachtwoord!">
            </form>
        </main>

        }
        <?php
}else {
    header("Location: wachtwoordVergetenVoorpagina.php?error=noauthorazation");
}

require_once("includes/foundation_script.php");
require_once("includes/footer.html");
?>