<?php
$title = 'Inlogpagina';
$link = 'inlog.php';

require_once("includes/header.php");
$html = '<div class="row flex-container align-center padding-y">
          <div class="callout text-center">
                <p>Email:</p>
                </div>
            <div class="callout text-center">
                <p>lorem ipsum</p>
                </div>
         </div>

        <div class="row flex-container align-center">
           <div class="callout text-center">
                <p>Wachtwoord:</p>
           </div>
          <div class="callout text-center">
                <p>lorem ipsum 2</p>
          </div>
        </div>

        <div class="row flex-container align-center">
          <div class="callout text-center">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                Vestibulum a libero hendrerit, laoreet eros vitae, accumsan eros. 
                Donec dui urna, tempus non elit a, tincidunt pulvinar lectus. 
                Maecenas non risus auctor tellus convallis volutpat. 
                Mauris aliquam feugiat tortor id blandit. Donec laoreet lobortis turpis vitae semper. 
                Quisque gravida ornare euismod.</p>
          </div>
        </div>
                
        <div class="row flex-container align-center">
          <div class="callout text-center">
                <p>Log in</p>
                </div>
        </div>
        
            <div class="row flex-container align-center">
      <div class="callout text-center">
             <p><a href="register.php">Maak account</a></p>
             </div>
        </div>
        
        <div class="row flex-container align-center">
      <div class="callout text-center">
             <p><a href="wachtwoordVergeten.php">Nieuw wachtwoord</a></p>
             </div>
        </div>';
echo $html;

require_once("includes/foundation_script.php");
require_once("includes/footer.php");
?>