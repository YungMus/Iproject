<?php
$title = 'Veiling';
require_once("includes/header.php");

$html = '<div class="grid-x grid-padding-y grid-padding-y">
  <div class="cell small-4 align-self-top">Align top. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Non harum laborum cum voluptate vel, eius adipisci similique dignissimos nobis at excepturi incidunt fugit molestiae quaerat, consequuntur porro temporibus. Nisi, ex?Align top. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Non harum laborum cum voluptate vel, eius adipisci similique dignissimos nobis at excepturi incidunt fugit molestiae quaerat, consequuntur porro temporibus. Nisi, ex?Align top. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Non harum laborum cum voluptate vel, eius adipisci similique dignissimos nobis at excepturi incidunt fugit molestiae quaerat, consequuntur porro temporibus. Nisi, ex?</div>
  <div class="cell small-4 flex-container flex-dir-column">
    <div class="callout primary flex-child-auto-veiling">Veiling</div>
    <div class="callout primary flex-child-auto-veiling">Veiling</div>
  </div>
</div>
<div class="row flex-container align-left">
    </div>
    <div class="callout text-center align-right">
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                Vestibulum a libero hendrerit, laoreet eros vitae, accumsan eros.
                Donec dui urna, tempus non elit a, tincidunt pulvinar lectus.
                Maecenas non risus auctor tellus convallis volutpat.
                Mauris aliquam feugiat tortor id blandit. Donec laoreet lobortis turpis vitae semper.
                Quisque gravida ornare euismod.</p>
    </div>
</div>
';

echo $html;

require_once("includes/foundation_script.php");
require_once("includes/footer.php");
?>