<?php
$title = 'Registeren';
$link = 'registerTweedePagina.php';

require_once("includes/header.php");
?>

    <div class="form-registration" id="form-registration">

        <figure class="form-registration-img">
            <figcaption class="form-registration-img-caption">Vul hier je verificatiecode en email in</figcaption>
        </figure>

        <form class="form-registration-group" method="post" action="registerTweedepagina.inc.php">
            <input class="form-registration-input" type="text" name="email" placeholder="Jouw emailadres">
            <input class="form-registration-input"  type="text" name="token" placeholder="Jouw verificatie code">
            <input class="form-registration-submit-button" type="submit" name="confirmtoken" value="Ga door">
            <p class="form-registration-member-signin">Al een account? <a href="inlog.php">Log in</a></p>
            <p class="form-registration-terms"><a href="voorwaardenCondities.php">Voorwaarden &amp; Condities</a></p>
        </form>

    </div>

<?php
require_once("includes/foundation_script.php");
require_once("includes/footer.php");
?>