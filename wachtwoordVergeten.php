<?php
$title = 'Wachtwoord vergeten';
$link = 'wachtwoordVergeten.php';
session_start();

require_once("includes/header.php");
?>

    <form>
        <div class="form">
            <h4 class="text-center">Wachtwoord veranderen</h4>
            <label for="form-email">Email
                <input type="text" class="form-email" name="email" id="email" >
            </label>
            <button type="submit" class="form-button" name="changepassword">Verander wachtwoord</button>
            <p class="text-center"><a href="inlog.php">Toch inloggen?</a></p>
        </div>
    </form>

<?php
require_once("includes/foundation_script.php");
require_once("includes/footer.php");
?>