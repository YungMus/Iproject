<?php
$title = 'Verkoopaccount registeren';
$link = 'verkoopaccountDerdepagina.php';
session_start();

require_once("includes/header.php");

if(isset($_GET['error'])) {
    if ($_GET['error'] == "emptyfields") {
        echo '<div data-closable class="alert-box callout warning"> Vul het veld in!
  <button class="close-button" aria-label="Dismiss alert" type="button" data-close>
    <span aria-hidden="true">&CircleTimes;</span>
  </button>
</div>';
    }
}
if(isset($_SESSION['Username'])) {
if($_GET['verify'] === 'Email') {
$email = $_SESSION['Email'];
$sql = "SELECT verified FROM Seller_Verification_token WHERE [e-mail]= :email AND verified = 1";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':email', $email);
$stmt->execute();
$results = $stmt->fetchAll();
if (!$results) {
    header("Location: verkoopaccountTweedepagina.php?error=notverified");
    exit();
}
} else {

?>

<main>
    <form class="form" method="post" action="verkoopaccountDerdepagina.inc.php">
        <h4 class="text-center">Verkoopaccount registeren</h4>
        <h6>Om te kunnen registreren vragen wij uw bank of creditcard gegevens. Vervolgens krijgt u een overzicht van uw gegevens. En na uw bevestiging kunt u beginnen met het verkopen van uw spullen.</h6>
        <label> Kies een bank uit
        <select class="form-input" name="Bank" id="Bank" required>
            <option value="0">ING</option>
            <option value="1">ABN AMRO</option>
            <option value="2">Rabobank</option>
            <option value="3">De Volksbank</option>
            <option value="4">bunq</option>
            <option value="5">Knab</option>
            <option value="6">SNS Bank</option>
            <option value="7">Van Lanschot</option>
            <option value="8">N26</option>
            <option value="9">Revolut</option>
        </select>
        </label>
        <label>
        <div>
            <input class="form-input" type="text" name="BankNumber" id="BankNumber" pattern="[A-Za-z0-9]{16,16}" placeholder="Banknummer - Bestaat uit 16 letters en cijfers">
        </div>
        </label>
        <label>
            <div>
                <input class="form-input" type="text" name="CreditcardNumber" id="CreditcardNumber" pattern="[0-9]{16,16}" placeholder="Creditcard nummer - Bestaat uit 16 cijfers">
            </div>
        </label>
        <p><input type="submit" class="form-button" name="Submit"  value="Ga naar het overzicht"></p>
    </form>
</main>


<?php
        }
    }
else {
    header("Location: persoonlijkePagina.php?error=noauthorization");
    exit();
}
require_once("includes/foundation_script.php");
require_once("includes/footer.html");
?>
