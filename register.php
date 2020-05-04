<?php
$title = 'Registeren';
$link = 'register.php';

if (($_SERVER['REQUEST_METHOD'] === 'POST')) {
    if (isset($_POST['send'])){
        $username = htmlspecialchars(trim($_POST['username']));
        $email = htmlspecialchars(trim($_POST['email']));
        $password = htmlspecialchars(trim($_POST['password']));
        $gender = htmlspecialchars(trim($_POST['gender']));
        $birthdate = htmlspecialchars(trim($_POST['birthdate']));
        $place = htmlspecialchars(trim($_POST['place']));
        $postalCode = htmlspecialchars(trim($_POST['postalCode']));
        $houseNumber = htmlspecialchars(trim($_POST['houseNumber']));
        $celphoneNumber = htmlspecialchars(trim($_POST['celphoneNumber']));
        print_r($_POST);
    }
}

require_once("includes/header.php");
//require_once("connectingDatabase.php");
?>
    <form>
        <div class="form">
            <h4 class="text-center">Registreer hier!</h4>
            <label for="form-username">Gebruikersnaam
                <input type="text" class="form-username" name="username" id="username">
            </label>
            <label for="form-email">Email
                <input type="text" class="form-email" name="email" id="email">
            </label>
            <label for="form-password">Wachtwoord
                <input type="text" class="form-password" name="password" id="password">
            </label>
            <label for="form-password">Herhaal wachtwoord
                <input type="text" class="form-password" name="password-repeat" id="password-repeat">
            </label>
            <label for="form-gender">Geslacht
                <label for="radio-button">Man
                    <input type="radio" class="form-gender" name="male" id="male">
                </label>
                <label for="radio-button">Vrouw
                    <input type="radio" class="form-gender" name="female" id="female">
                </label>
            </label>
            <button type="submit" class="form-button">Registreren</button>
            <p class="text-center"><a href="inlog.php">Toch inloggen?</a></p>
        </div>
    </form>


<?php
require_once("includes/foundation_script.php");
require_once("includes/footer.php");
?>