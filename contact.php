<?php
$title = 'Contact';
require_once("includes/header.php");
?>
    <section class="contact-us-section">
        <div class="row medium-unstack">
            <div class="columns contact-us-section-left">
                <h1 class="contact-us-header">Get In Touch</h1>
                <div class="responsive-embed">
                    <img src="images/maps.png" alt="Map of HAN" />
                </div>

                <ul class="contact-us-list">
                    <li><i class="fi-address-book">100 W Rincon Ave, Campbell CA 95008</i></li>
                    <li><i class="fi-mail"><a href="mailto:">hello@yeticave.com</a></i></li>
                    <li><i class="fi-telephone">
                        1 (408) 445 9978
                    </i></li>
                </ul>
            </div>
            <div class="columns contact-us-section-right">
                <h1 class="contact-us-header">Mail Us</h1>
                <form class="contact-us-form">
                    <input type="text" placeholder="Full name">
                    <input type="email" placeholder="Email">
                    <textarea name="message" id="" rows="12" placeholder="Type your message here"></textarea>
                    <div class="contact-us-form-actions">
                        <input type="submit" class="button" value="Send it" />
                        <div>
                            <label for="FileUpload" class="button contact-us-file-button">Attach Files</label>
                            <input type="file" id="FileUpload" class="show-for-sr">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>



<?php
require_once("includes/foundation_script.php");
require_once("includes/footer.php");
?>