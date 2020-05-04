<?php
$title = 'Registeren';
$link = 'register.php';
require_once("includes/header.php");

$html = ' <div class="registratieText">Accountgegevens:</div>
        <div class="row flex-container align-center">
          <div class="callout text-center">
                <p>Gebruiksnaam:</p>
                </div>
            <div class="callout text-center">
                <p>lorem ipsum</p>
                </div>
         </div>

        <div class="row flex-container align-center">
           <div class="callout text-center">
                <p>Email:</p>
           </div>
          <div class="callout text-center">
                <p>lorem ipsum 2</p>
          </div>
        </div>
        <div class="row flex-container align-center">
          <div class="callout text-center">
                <p>Wachtwoord:</p>
                </div>
            <div class="callout text-center">
                <p>lorem ipsum</p>
                </div>
         </div>
         <div class="row flex-container align-center">
          <div class="callout text-center">
                <p>Herhaal wachtwoord:</p>
                </div>
            <div class="callout text-center">
                <p>lorem ipsum</p>
                </div>
         </div>
         <div class="row flex-container align-center">
          <div class="callout text-center">
                <p>Geslacht:</p>
                </div>
            <div class="callout text-center">
                <p>lorem ipsum</p>
                </div>
         </div>
         <div class="row flex-container align-center">
          <div class="callout text-center">
                <p>Geboortedatum:</p>
                </div>
            <div class="callout text-center">
                <p>lorem ipsum</p>
                </div>
         </div>
         <div class="registratieText">Contactgegevens:</div>
         <div class="row flex-container align-center">
          <div class="callout text-center">
                <p>Plaats:</p>
                </div>
            <div class="callout text-center">
                <p>lorem ipsum</p>
                </div>
         </div>
         <div class="row flex-container align-center">
          <div class="callout text-center">
                <p>Postcode:</p>
                </div>
            <div class="callout text-center">
                <p>lorem ipsum</p>
                </div>
         </div>
         <div class="row flex-container align-center">
          <div class="callout text-center">
                <p>Huisnummer:</p>
                </div>
            <div class="callout text-center">
                <p>lorem ipsum</p>
                </div>
         </div>
         <div class="row flex-container align-center">
          <div class="callout text-center">
                <p>Telefoonnummer:</p>
                </div>
            <div class="callout text-center">
                <p>lorem ipsum</p>
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
                <p>Maak account</p>
                </div>
        </div>';
echo $html;

require_once("includes/foundation_script.php");
require_once("includes/footer.php");
?>