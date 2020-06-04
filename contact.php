<?php
$title = 'Contact';
$link = 'contact.php';
session_start();
require_once("includes/header.php");

if(isset($_GET['error'])){
    if ($_GET['error'] == "emptyfields") {
        echo '<div data-closable class="alert-box callout info"> Vul alle velden in!
              <button class="close-button" aria-label="Dismiss alert" type="button" data-close>
              <span aria-hidden="true">&CircleTimes;</span>
              </button>
              </div>';
    } else if($_GET['error'] == "noauthorization"){
        echo '<div data-closable class="alert-box callout warning"> U heeft geen autorisatie!
                      <button class="close-button" aria-label="Dismiss alert" type="button" data-close>
                      <span aria-hidden="true">&CircleTimes;</span>
                      </button>
                      </div>';
    }
} else if (isset($_GET['success'])) {
    if ($_GET['success'] == "messagesent") {
        echo '<div data-closable class="alert-box callout success"> U heeft succesvol een bericht achter gelaten!
  <button class="close-button" aria-label="Dismiss alert" type="button" data-close>
    <span aria-hidden="true">&CircleTimes;</span>
  </button>
</div>';
    }
}

?>
    <section class="contact-us-section">
        <div class="row medium-unstack">
            <div class="columns contact-us-section-left">
                <h1 class="contact-us-header">Neem contact op</h1>
                <ul class="contact-us-list">
                    <li><i class="fi-address-book">Heyendaalseweg 98, Nijmegen 6525EE</i></li>
                    <li><i class="fi-mail"><a href="mailto:">eenmaalandermaal@gmail.com</a></i></li>
                    <li><i class="fi-telephone">
                        024 890 4500
                    </i></li>
                </ul>
            </div>
            <div class="columns contact-us-section-right">
                <h1 class="contact-us-header">Mail Ons</h1>
                <form class="contact-us-form" method="post" action="contact.inc.php">
                    <input type="text" name="Fullname" id="Fullname" pattern="[A-Za-z].{3,}" value="<?php if (isset($_GET['Fullname'])) {echo $_GET['Fullname']; }?>" placeholder="Volledige naam">
                    <input type="email" name="Email" id="Email" value="<?php if (isset($_GET['Email'])) {echo $_GET['Email']; }?>" placeholder="Email">
                    <input type="number" name="Phonenumber" id="Phonenumber" value="<?php if (isset($_GET['Phonenumber'])) {echo $_GET['Phonenumber']; }?>" placeholder="Telefoonnummer">
                    <textarea name="Message" id="" rows="12" value="<?php if (isset($_GET['Message'])) {echo $_GET['Message']; }?>" placeholder="Typ uw bericht hier"></textarea>
                    <div class="contact-us-form-actions">
                        <input type="submit" class="button" name="send">
                    </div>
                </form>
            </div>
            <div class="responsive-embed">
                <div id="googleMap" style="width:100%;height:800px;"></div>

                <script>
                    function myMap() {
                        var mapProp= {
                            center:new google.maps.LatLng(51.827221, 5.868610),
                            zoom:15,
                        };
                        var map = new google.maps.Map(document.getElementById("googleMap"),mapProp);
                    }
                </script>

                <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDTLDS5shXNd_qCUpSDZIeGZdQKIiaRFuY&callback=myMap"></script>
<!--                <img src="images/maps.png" alt="Map of HAN" />-->
            </div>
        </div>
    </section>



<?php
require_once("includes/foundation_script.php");
require_once("includes/footer.html");
?>