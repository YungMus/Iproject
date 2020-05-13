<?php
$title = 'Contact';
$link = 'contact.php';

require_once("includes/header.php");

?>
    <section class="contact-us-section">
        <div class="row medium-unstack">
            <div class="columns contact-us-section-left">
                <h1 class="contact-us-header">Neem contact op</h1>
                <ul class="contact-us-list">
                    <li><i class="fi-address-book">100 W Rincon Ave, Campbell CA 95008</i></li>
                    <li><i class="fi-mail"><a href="mailto:">hello@yeticave.com</a></i></li>
                    <li><i class="fi-telephone">
                        1 (408) 445 9978
                    </i></li>
                </ul>
            </div>
            <div class="columns contact-us-section-right">
                <h1 class="contact-us-header">Mail Ons</h1>
                <form class="contact-us-form">
                    <input type="text" placeholder="Volledige naam">
                    <input type="email" placeholder="Email">
                    <textarea name="message" id="" rows="12" placeholder="Typ uw bericht hier"></textarea>
                    <div class="contact-us-form-actions">
                        <input type="submit" class="button" value="versturen" />
                        <div>
                            <label for="FileUpload" class="button contact-us-file-button">Bestanden toevoegen</label>
                            <input type="file" id="FileUpload" class="show-for-sr">
                        </div>
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

                <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBQpsDf33wGZbYi1tnasVf0oddRZNTJlGU&callback=myMap"></script>
<!--                <img src="images/maps.png" alt="Map of HAN" />-->
            </div>
        </div>
    </section>



<?php
require_once("includes/foundation_script.php");
require_once("includes/footer.php");
?>