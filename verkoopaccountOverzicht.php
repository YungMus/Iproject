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
else if(isset($_GET['success'])){
    if($_GET['success'] == "overview"){
        echo '<div data-closable class="alert-box callout success"> U heeft succesvol uw gegevens doorgegeven! Bekijk nu het overzicht!
  <button class="close-button" aria-label="Dismiss alert" type="button" data-close>
    <span aria-hidden="true">&CircleTimes;</span>
  </button>
</div>';
    }
}

$bankcode = $_GET['bank'];
$sql = 'SELECT bank_name  FROM Bank_name WHERE bank_code=:bankcode';
$stmt = $conn->prepare($sql);
$stmt->bindParam(':bankcode', $bankcode);
$stmt->execute();
$result = $stmt->fetchAll();

if(isset($_SESSION['Username'])) {
if($_GET['verify'] == 'Email') {
    $email = $_SESSION['Email'];
    $sql = "SELECT verified FROM Seller_Verification_token WHERE [e-mail]= :email AND verified = 1";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    $results = $stmt->fetchAll();
    if (!$results) {
        header("Location: verkoopaccountTweedepagina.php?error=notverified");
    }
}else {
?>

        <main>
            <form class="form" method="post" action="verkoopaccountOverzicht.inc.php">
                <h4 class="text-center">Overzicht</h4>
                <h6>Kloppen uw gegevens? Zo ja klik op bevestigen om uw verkoopaccount definitief aan te maken</h6>
                <label> Bank:
                    <div>
                        <input class="form-input" type="text" name="Bank" id="Bank" value="<?php echo $result[0]['bank_name']; ?>" readonly>
                    </div>
                </label>
                <label> Banknummer:
                    <div>
                        <input class="form-input" type="text" name="BankNumber" id="BankNumber" value="<?php if (isset($_GET['banknumber'])) {
                            echo $_GET['banknumber'];
                        } ?>" readonly>
                    </div>
                </label>
                <label> Creditcardnummer:
                    <div>
                        <input class="form-input" type="text" name="CreditcardNumber" id="CreditcardNumber" value="<?php if (isset($_GET['creditcardnumber'])) {
                            echo $_GET['creditcardnumber'];
                        } ?>" readonly>
                    </div>
                </label>
                <p><input type="submit" class="form-button" name="Submit"  value="Bevestig uw verkoopaccount"></p>
                <p><input type="submit" class="form-button" name="Goback"  value="Ga terug"></p>
            </form>
        </main>


        <?php
    }
}
else {
    header("Location: persoonlijkePagina.php?error=noauthorization");
}
require_once("includes/foundation_script.php");
require_once("includes/footer.html");
?>
