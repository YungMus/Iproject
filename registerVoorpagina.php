<?php
$title = 'Registeren';
$link = 'registerVoorpagina.php';

require_once("includes/header.php");
?>

    <div class="hero-full-screen">
        <div class="middle-content-section">
            <div class="marketing-site-content-section">
                <div class="marketing-site-content-section-block">
                    <h3 class="marketing-site-content-section-block-header">Stap 1 Vul je emailadres in</h3>
                    <p class="marketing-site-content-section-block-subheader subheader">Bij stap 1 vul jij je geldige emailadres in, waarbij je vervolgens een mail van ons krijgt met een code. Die code heb je nodig om jezelf te verifiëren.</p>
                </div>
                <div class="marketing-site-content-section-block">
                    <h3 class="marketing-site-content-section-block-header">Stap 2 Vul je accountgegevens in</h3>
                    <p class="marketing-site-content-section-block-subheader subheader">Bij stap 2 vul jij je gebruikersnaam, een wachtwoord en de herhaling van het wachtwoord om je account zo veilig mogelijk te maken.</p>
                </div>
                <div class="marketing-site-content-section-block small-order-2 medium-order-1"
                <h3 class="marketing-site-content-section-block-header">Stap 3 Vul je persoonlijke gegevens in</h3>
                <p class="marketing-site-content-section-block-subheader subheader">Bij stap 3 vul jij je persoonlijke gegevens in, zoals je voornaam, achternaam, geboortedatum, telefoonnummer en je geheime vraag om je wachtwoord te kunnen herstellen.</p>
            </div>
            <div class="marketing-site-content-section-block small-order-2 medium-order-1">
                <h3 class="marketing-site-content-section-block-header">Stap 4 Vul je adresgegevens in</h3>
                <p class="marketing-site-content-section-block-subheader subheader">Bij stap 4 vul jij je adresgegevens in om de gewonnen veilingen opgestuurd te krijgen naar je ingevoerde adres.</p>
            </div>
        </div>
    </div>

<div class="bottom-content-section" data-magellan data-threshold="0">
    <a href="#form-registration"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M24 12c0-6.627-5.373-12-12-12s-12 5.373-12 12 5.373 12 12 12 12-5.373 12-12zm-18.005-1.568l1.415-1.414 4.59 4.574 4.579-4.574 1.416 1.414-5.995 5.988-6.005-5.988z"/></svg></a>
</div>


<div class="form-registration" id="form-registration">

    <figure class="form-registration-img">
        <img src="https://images.pexels.com/photos/221205/pexels-photo-221205.jpeg?h=350&auto=compress&cs=tinysrgb" alt="" />
        <figcaption class="form-registration-img-caption">Vul hier je emailadres in</figcaption>
    </figure>

    <form method="post" class="form-registration-group" action="registerVoorpagina.inc.php">
        <input class="form-registration-input"  type="email" name="Email" placeholder="Jouw email">
        <input class="form-registration-submit-button" type="submit" name="EmailConfirmation" value="Ga door">
        <p class="form-registration-member-signin">Al een account? <a href="inlog.php">Log in</a></p>
        <p class="form-registration-terms"><a href="voorwaardenCondities.php">Voorwaarden &amp; Condities</a></p>
    </form>

</div>

<?php
require_once("includes/foundation_script.php");
require_once("includes/footer.php");
?>