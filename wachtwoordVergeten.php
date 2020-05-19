<?php
$title = 'Wachtwoord vergeten';
$link = 'wachtwoordVergeten.php';
session_start();
if (($_SERVER['REQUEST_METHOD'] === 'POST')) {
    if (isset($_POST['send'])){
        $oldPassword = htmlspecialchars(trim($_POST['oldPassword']));
        $newPassword = htmlspecialchars(trim($_POST['newPassword']));
        $email = htmlspecialchars(trim($_POST['email']));
        print_r($_POST);
    }
}

require_once("includes/header.php");
?>

    <form>
        <div class="form">
            <h4 class="text-center">Wachtwoord veranderen</h4>
            <label for="form-email">Gebruikersnaam
                <input type="text" class="form-username" name="email" id="email" >
            </label>
            <label for="form-password">Oude wachtwoord
                <input type="text" class="form-password" name="password" id="password">
            </label>
            <label for="form-password">Nieuwe wachtwoord
                <input type="text" class="form-password" name="password" id="password">
            </label>
            <button type="submit" class="form-button">Verander wachtwoord</button>
            <p class="text-center"><a href="inlog.php">Toch inloggen?</a></p>
        </div>
    </form>

<?php
require_once("includes/foundation_script.php");
require_once("includes/footer.php");
?>