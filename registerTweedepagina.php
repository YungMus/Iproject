<?php
$title = 'Registeren';
$link = 'registerTweedePagina.php';

require_once("includes/header.php");

if($_GET['email']) {
    $email = $_GET['email'];
?>


<main>
    <?php
    if(isset($_GET['error'])) {
        if ($_GET['error'] == "invalid") {
            echo '<p class="error"> Dit account is niet geldig of al geverifieerd!</p>';
        } else if($_GET['error'] == "nomatch"){
            echo '<p class="error"> Je verificatie code komt niet overeen!</p>';
        }
    }
    ?>
        <form class="form" method="post" action="registerTweedepagina.inc.php">
            <h4 class="text-center">Verifieren</h4>
            <input class="form-email" type="text" name="email" placeholder="Jouw emailadres">
            <input class="form-token"  type="text" name="token" placeholder="Jouw verificatie code">
            <input class="form-button" type="submit" name="confirmtoken" value="Ga door">
            <p class="middle">Al een account? <a  href="inlog.php">Log in</a></p>
            <p class="middle"><a href="voorwaardenCondities.php">Voorwaarden &amp; Condities</a></p>
        </form>
</main>

<?php
}
else {
    header("Location: registerVoorpagina.php?error=noauthorazation");
}

require_once("includes/foundation_script.php");
require_once("includes/footer.php");
?>