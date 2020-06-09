<?php
$title = 'Registeren';
$link = 'register.php';
session_start();

require_once("includes/header.php");

if(isset($_GET['error'])) {
    if ($_GET['error'] == "emptyfields") {
        echo '<div data-closable class="alert-box callout warning"> Vul alle benodigde velden in!
                      <button class="close-button" aria-label="Dismiss alert" type="button" data-close>
                      <span aria-hidden="true">&CircleTimes;</span>
                      </button>
                      </div>';
    } else if($_GET['error'] == "passwordcheck"){
        echo '<div data-closable class="alert-box callout warning"> U wachtwoord komt niet overeen! Check of uw wachtwoord overeen komt!
                      <button class="close-button" aria-label="Dismiss alert" type="button" data-close>
                      <span aria-hidden="true">&CircleTimes;</span>
                      </button>
                      </div>';
    } else if($_GET['error'] == "usernamealreadyused"){
        echo '<div data-closable class="alert-box callout warning"> De gebruikersnaam is al eens gebruikt! Gebruik een andere gebruikersnaam.
                      <button class="close-button" aria-label="Dismiss alert" type="button" data-close>
                      <span aria-hidden="true">&CircleTimes;</span>
                      </button>
                      </div>';
    } else if($_GET['error'] == "insertfailed"){
        echo '<div data-closable class="alert-box callout warning"> Uw gegevens is niet succesvol verstuurd! Probeer het opnieuw!
                      <button class="close-button" aria-label="Dismiss alert" type="button" data-close>
                      <span aria-hidden="true">&CircleTimes;</span>
                      </button>
                      </div>';
    } else if($_GET['error'] == "mailnotsent"){
        echo '<div data-closable class="alert-box callout warning"> De mail is onsuccesvol verstuurd, probeer het opnieuw!
                      <button class="close-button" aria-label="Dismiss alert" type="button" data-close>
                      <span aria-hidden="true">&CircleTimes;</span>
                      </button>
                      </div>';
    }

}

if($_GET['email']) {
    $email = $_GET['email'];
    $sql = "SELECT [e-mail] FROM Email_verification_token WHERE [e-mail]= :email";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    $results = $stmt->fetchAll();
    if ($results[0][0] != $email) {
        header("Location: registerVoorpagina.php?error=noauthorization");
    } else {

        ?>
        <main>
        <div class="hero-full-screen">
            <div class="middle-content-section">
                <div class="marketing-site-content-section">
                    <div class="marketing-site-content-section-img">
                        <img src="" alt=""/>
                    </div>
                    <div class="marketing-site-content-section-block">
                        <h3 class="marketing-site-content-section-block-header">Stap 1 Vul uw accountgegevens in</h3>
                        <p class="marketing-site-content-section-block-subheader subheader">Bij stap 1 vult u uw
                            gebruikersnaam, een wachtwoord en de herhaling van het wachtwoord om uw account zo veilig
                            mogelijk te maken.</p>
                    </div>
                    <div class="marketing-site-content-section-block small-order-2 medium-order-1"
                    <h3 class="marketing-site-content-section-block-header">Stap 2 Vul uw persoonlijke gegevens in</h3>
                    <p class="marketing-site-content-section-block-subheader subheader">Bij stap 2 vult u uw
                        persoonlijke
                        gegevens in, zoals uw voornaam, achternaam, geboortedatum, telefoonnummer en uw herstelvraag om
                        uw
                        wachtwoord te kunnen herstellen.</p>
                </div>
                <div class="marketing-site-content-section-block small-order-2 medium-order-1">
                    <h3 class="marketing-site-content-section-block-header">Stap 3 Vul uw adresgegevens in</h3>
                    <p class="marketing-site-content-section-block-subheader subheader">Bij stap 3 vult u uw
                        adresgegevens.
                        Dit zodat wij u de items van de gewonnen veilingen naar u op kunnen sturen.</p>
                </div>
            </div>
        </div>

        <div class="bottom-content-section" data-magellan data-threshold="0">
            <a href="#main-content-section">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                    <path d="M24 12c0-6.627-5.373-12-12-12s-12 5.373-12 12 5.373 12 12 12 12-5.373 12-12zm-18.005-1.568l1.415-1.414 4.59 4.574 4.579-4.574 1.416 1.414-5.995 5.988-6.005-5.988z"/>
                </svg>
            </a>
        </div>

        </div>

        <form method="post" class="form" action="register.inc.php">
            <h6 class="multi-step-checkout-step-title-subheader">Account</h6>
            <p class="create-account-desc">Voer hier uw gebruikersnaam, email en wachtwoord in.</p>
            <label>
                <input type="text" name="Email" id="Email" value="<?php echo $email ?>" readonly>
                <input type="text" name="Username" id="Username" maxlength="20" pattern="[A-Za-z0-9].{5,}"
                       value="<?php if (isset($_GET['Username'])) {
                           echo $_GET['Username'];
                       } ?>" placeholder="Gebruikersnaam - Minimaal 5 tekens" required>
                <label> Moet minimaal bestaan uit een cijfer, een kleine letter en een hoofdletter. Daarnaast moet het wachtwoord ook 8 tekens lang of langer zijn.
                <input type="password" name="Password" id="Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                       placeholder="Wachtwoord" required>
                </label>
                <input type="password" name="PasswordRepeat" id="PasswordRepeat" placeholder="Herhaling Wachtwoord"
                       required>
            </label>
            <div>
                <hr class="multi-step-checkout-form-divider">
            </div>
            <h6 class="multi-step-checkout-step-title-subheader">Persoonlijk</h6>
            <p class="create-account-desc">Vul hier uw persoonlijke gegevens in.</p>
            <div class="small-12 medium-7 column">
                <input type="text" name="Firstname" id="Firstname" pattern="[A-Za-z].{3,}"
                       value="<?php if (isset($_GET['Firstname'])) {
                           echo $_GET['Firstname'];
                       } ?>" placeholder="Voornaam" required>
            </div>
            <div class="small-12 medium-7 column">
                <input type="text" name="Lastname" id="Lastname" pattern="[A-Za-z].{1,}"
                       value="<?php if (isset($_GET['Lastname'])) {
                           echo $_GET['Lastname'];
                       } ?>" placeholder="Achternaam" required>
            </div>
            <div class="small-12 medium-7 column">
                <input type="date" name="Birthday" id="Birthday" value="<?php if (isset($_GET['Birthday'])) {
                    echo $_GET['Birthday'];
                } ?>" placeholder="Geboortedatum" required>
            </div>
            <div class="small-12 medium-7 column">
                <input type="number" name="Phonenumber" id="Phonenumber" pattern="[0-9].{10,12} value="<?php if (isset($_GET['Phonenumber'])) {
                    echo $_GET['Phonenumber'];
                } ?>" placeholder="Telefoonnummer" required>
            </div>
            <select name="RecoveryQuestion" id="RecoverQuestion" required>
                <option value="1">Wat is de achternaam van uw moeder?</option>
                <option value="2">Wat is de naam van uw eerste huisdier?</option>
                <option value="3">Welk merk was u eerste auto?</option>
                <option value="4">Op welke basisschool heeft u gezeten?</option>
                <option value="5">Wat is uw geboorteplaats?</option>
            </select>
            <div class="small-12 medium-7 column">
                <input type="text" name="RecoveryQuestionAnswer" id="RecoverQuestionAnswer" placeholder="Antwoord"
                       required>
            </div>
            <div>
                <hr class="multi-step-checkout-form-divider">
            </div>
            <h6 class="multi-step-checkout-step-title-subheader">Adres</h6>
            <p class="create-account-desc">Vul hier uw adresgegevens in.</p>
            <div class="small-6 medium-3 column">
                <input type="text" name="Address" id="Address" pattern="[A-Za-z0-9].{3,}"
                       value="<?php if (isset($_GET['Address'])) {
                           echo $_GET['Address'];
                       } ?>" placeholder="Straatnaam + huisnummer" required>
            </div>
            <div class="small-6 medium-3 column">
                <input type="text" name="Address2" id="Address2" pattern="[A-Za-z0-9].{2,}"
                       value="<?php if (isset($_GET['Address2'])) {
                           echo $_GET['Address2'];
                       } ?>" placeholder="Appartement, suite, unit etc. optioneel">
            </div>
            <div class="small-6 medium-3 column">
                <input type="text" name="Postalcode" id="Postalcode" pattern="[A-Za-z0-9].{4,}"
                       value="<?php if (isset($_GET['Postalcode'])) {
                           echo $_GET['Postalcode'];
                       } ?>" placeholder="Postcode" required>
            </div>
            <div class="small-6 medium-3 column">
                <input type="text" name="City" id="City" pattern="[A-Za-z].{1,}"
                       value="<?php if (isset($_GET['City'])) {
                           echo $_GET['City'];
                       } ?>" placeholder="Plaats" required>
            </div>
            <div class="small-6 medium-2 column">
                <select name="Country" id="Country" required>
                    <?php
                    $sql = "SELECT country FROM Country";
                    $stmt = $conn->prepare($sql);
                    $stmt->execute();
                    $countries = $stmt->fetchAll();
                    foreach ($countries as $country) {
                        echo '<option value="' . $country[0] . '">' . $country[0] . '</option>';
                    }
                    ?>
                </select>
            </div>
            <p>* Door een account aan te maken met uw e-mailadres, word u klant van Iconcept en accepteert u onze
                Gebruiksvoorwaarden en Privacyverklaring. U zult systeemberichten gerelateerd aan uw veilingen en
                berichten
                van de klantenservice ontvangen.</p>
            <button class="primary button expanded" type="submit" name="Register" value='Register'
            ">Maak account aan</button>
        </form>
        </main>
        <?php
    }
}
else {
    header("Location: registerVoorpagina.php?error=noauthorization");
}
require_once("includes/foundation_script.php");
require_once("includes/footer.html");
?>