<?php
$title = 'Inlogpagina';
$link = 'inlog.php';

require_once("includes/header.php");

if(isset($_GET['error'])){
    if($_GET['error'] == "emptyfields"){
        echo '<p class="error"> Vul al het velden in!</p>';
    }
    else if($_GET['error'] == "wrongpassword"){
        echo '<p class="error"> Jouw wachtwoord klopt niet!</p>';
    }
    else if($_GET['error'] == "sqlerror"){
        echo '<p class="error">Er bevindt zich een sqlerror!</p>';
    }
    else if($_GET['error'] == "noAuthorisation"){
        echo '<p class="error">Je hebt geen autorisatie!</p>';
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
            <input type="password" class="form-password" name="Password" id="Password">
        </label>
        <input id="show-password" type="checkbox"><label for="show-password">Laat wachtwoord zien</label>
        <p><input type="submit" class="form-button" name="login"  value="Log in"></input></p>
        <p><a class="space" href="wachtwoordVergeten.php">Wachtwoord vergeten?</a> <a href="register.php">Geen inloggegevens?</a></p>
    </form>
</main>

<?php
require_once("includes/foundation_script.php");
require_once("includes/footer.php");
?>