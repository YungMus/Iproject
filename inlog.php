<?php
$title = 'Inlogpagina';
$link = 'inlog.php';

require_once("includes/header.php");
require_once("connectingDatabase.php");
?>

<form method="POST" action="inlog.php">
          <div class="row flex-container align-center padding-y">
          <div class="callout text-center">
                 <label for="email">email</label>
                </div>
            <div class="callout text-center">
                <input type="email" id="email" name="email">
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
                        <input type="submit" id="logIn" name="logIn" value="log in">
                </div>
        </div>
        </form>
        
            <div class="row flex-container align-center">
      <div class="callout text-center">
             <p><a href="register.php">Maak account</a></p>
             </div>
        </div>
        
        <div class="row flex-container align-center">
      <div class="callout text-center">
             <p><a href="wachtwoordVergeten.php">Nieuw wachtwoord</a></p>
             </div>
        </div>

<?php
require_once("includes/foundation_script.php");
require_once("includes/footer.php");
?>