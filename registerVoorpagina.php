<?php
$title = 'Registeren';
$link = 'registerVoorpagina.php';

require_once("includes/header.php");

?>

    <main>
        <?php
        if(isset($_GET['error'])) {
            if($_GET['error'] == "emptyfields"){
                echo '<p class="error"> Vul al de velden in!</p>';
            }
            else if($_GET['error'] == "mailnotsent"){
                echo '<p class="error"> Je mail is onsuccesvol verzonden!</p>';
            }
            else if($_GET['error'] == "emailalreadyused"){
                echo '<p class="error"> Dit email is al eens gebruikt, gebruik een ander email!</p>';
            }
            else if($_GET['error'] == "noauthorazation"){
                echo '<p class="error"> Je hebt geen autorisatie voor dat!</p>';
            }
        } else if(isset($_GET['succes'])){
            if($_GET['succes'] == "mailsent"){
                echo '<p class="succes"> Je hebt succesvol een mail verstuurd!</p>';
            }
        }
        ?>
        <form class="form" method="post" action="registerVoorpagina.inc.php">
            <h4 class="text-center">Registreren</h4>
            <h6>Om te kunnen regsitreren vragen wij eerst uw email. Binnen enkelen minuten zult u een verificatiecode op uw mail ontvangen van ons. Vervolgens krijgt u toegang tot de volledige registratie pagina en kunt u beginnen met uw acccount aan te maken.</h6>
            <label for="form-email">Vul hier je emailadres in
             <br><input type="email" class="form-email" name="Email" id="Email" placeholder="Email">
            </label>
            <p><input type="submit" class="form-button" name="EmailConfirmation"  value="Vraag verificatiecode aan"></input></p>
            <p><a class="space" href="inlog.php">Ben je al lid? Inloggen </a></p>
        </form>
    </main>


<?php
require_once("includes/foundation_script.php");
require_once("includes/footer.php");
?>