<?php
$title = 'Verkoopaccount registeren';
$link = 'verkoopaccountDerdepagina.php';
session_start();

require_once("includes/header.php");

if(isset($_SESSION['Username'])) {
    $email = $_SESSION['Email'];
    $sql = "SELECT verified FROM Seller_Verification_token WHERE [e-mail]= :email AND verified = 1";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    $results = $stmt->fetchAll();
    if (!$results) {
        header("Location: verkoopaccountTweedepagina.php?error=notverified");
    } else {
?>

        <main>
            <form class="form" method="post" action="verkoopaccountOverzicht.inc.php">
                <h4 class="text-center">Overzicht</h4>
                <h6>Kloppen je gegevens? Zo ja klik op bevestigen om je verkoopaccount definitief aan te maken</h6>
                <label>
                    <div>
                        <input class="form-input" type="text" name="Bank" id="Bank" value="<?php if (isset($_GET['bank'])) {
                            echo $_GET['bank'];
                        } ?>" readonly>
                    </div>
                </label>
                <label>
                    <div>
                        <input class="form-input" type="text" name="BankNumber" id="BankNumber" value="<?php if (isset($_GET['banknumber'])) {
                            echo $_GET['banknumber'];
                        } ?>" readonly>
                    </div>
                </label>
                <label>
                    <div>
                        <input class="form-input" type="text" name="CreditcardNumber" id="CreditcardNumber" value="<?php if (isset($_GET['creditcardnumber'])) {
                            echo $_GET['creditcardnumber'];
                        } ?>" readonly>>
                    </div>
                </label>
                <p><input type="submit" class="form-button" name="Submit"  value="Bevestig je verkoopaccount"></p>
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
