<?php
$title = 'Verkoopaccount registeren';
$link = 'verkoopaccount.php';
session_start();

require_once("includes/header.php");

if($_GET['Email']) {
$email = $_GET['Email'];
$sql = "SELECT [e-mail] FROM [User] WHERE [e-mail]= :email";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':email', $email);
$stmt->execute();
$results = $stmt->fetchAll();
if ($results[0][0] != $email) {
    header("Location: registerVoorpagina.php?error=noauthorization");
} else {

?>

<main>
    <form class="form" method="post" action="verkoopaccount.php.inc.php">
        <h4 class="text-center">Verkoopaccount registeren</h4>
        <h6>Om te kunnen registreren vragen wij uw bank of creditcard gegevens. Binnen enkelen minuten zult u een verificatiecode op uw mail ontvangen van ons. Vervolgens krijgt u toegang tot als verkoper en kunt u beginnen met het verkopen van je spullen.</h6>
        <label> Kies een bank uit
        <select class="form-input" name="RecoveryQuestion" id="RecoverQuestion" required>
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
            <input class="form-input" type="text" name="BankNumber" id="BankNumber" pattern="[A-Za-z0-9]{16,16}" placeholder="Banknummer" required>
        </div>
        </label>
        <p><input type="submit" class="form-button" name="EmailConfirmation"  value="Vraag verificatiecode aan"></input></p>
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
