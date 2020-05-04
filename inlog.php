<?php
$title = 'Inlogpagina';
$link = 'inlog.php';

require_once("includes/header.php");
//require_once("connectingDatabase.php");

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
    <form class="log-in-form" method="post" action="inlog.inc.php">
        <h4 class="text-center">Log in met je account</h4>
        <label>Email
            <input type="email" placeholder="iemand@voorbeeld.com">
        </label>
        <label>Wachtwoord
            <input type="password" placeholder="Wachtwoord">
        </label>
        <input id="show-password" type="checkbox"><label for="show-password">Laat wachtwoord zien</label>
        <p><input type="submit" class="button expanded" name="login" value="Log in"></input></p>
        <p class="text-center"><a href="wachtwoordVergeten.php">Wachtwoord vergeten?</a></p>
    </form>
</main>

<?php
require_once("includes/foundation_script.php");
require_once("includes/footer.php");
?>