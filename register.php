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
?>

<form method="POST" action="register.php">
          <div class="row flex-container align-center padding-y">
                  <div class="row flex-container align-center">
           <div class="callout text-center">
                  <label for="username">Gebruiksnaam</label>
           </div>
          <div class="callout text-center">
                <input type="text" id="username" name="username">
          </div>
        </div>
        </div>
        
        <div class="row flex-container align-center">
           <div class="callout text-center">
                  <label for="email">Email</label>
           </div>
          <div class="callout text-center">
                <input type="text" id="email" name="email">
          </div>
        </div>

        <div class="row flex-container align-center">
           <div class="callout text-center">
                  <label for="password">Wachtwoord</label>
           </div>
          <div class="callout text-center">
                <input type="text" id="password" name="password">
          </div>
        </div>
        
        <div class="row flex-container align-center">
           <div class="callout text-center">
                  <label for="gender">Geslacht</label>
           </div>
          <div class="callout text-center">
                <input type="text" id="gender" name="gender">
          </div>
        </div>
        
                <div class="row flex-container align-center">
           <div class="callout text-center">
                  <label for="birthdate">Geboortedatum</label>
           </div>
          <div class="callout text-center">
                <input type="text" id="birthdate" name="birthdate">
          </div>
        </div>
        
                <div class="row flex-container align-center">
           <div class="callout text-center">
                  <label for="place">Plaats</label>
           </div>
          <div class="callout text-center">
                <input type="text" id="place" name="place">
          </div>
        </div>
        
                <div class="row flex-container align-center">
           <div class="callout text-center">
                  <label for="postalCode">Postcode</label>
           </div>
          <div class="callout text-center">
                <input type="text" id="postalCode" name="postalCode">
          </div>
        </div>
        
                <div class="row flex-container align-center">
           <div class="callout text-center">
                  <label for="houseNumber">Huisnummer</label>
           </div>
          <div class="callout text-center">
                <input type="text" id="houseNumber" name="houseNumber">
          </div>
        </div>
        
                <div class="row flex-container align-center">
           <div class="callout text-center">
                  <label for="celphoneNumber">Telefoonnummer</label>
           </div>
          <div class="callout text-center">
                <input type="text" id="celphoneNumber" name="celphoneNumber">
          </div>
        </div>
                
        <div class="row flex-container align-center">
          <div class="callout text-center">
                        <input type="submit" id="send" name="send" value="maak account">
                </div>
        </div>
        </form>

<?php
require_once("includes/foundation_script.php");
require_once("includes/footer.php");
?>