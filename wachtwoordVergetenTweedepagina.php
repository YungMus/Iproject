<?php
$title = 'Wachtwoord herstellen';
$link = 'wachtwoordVergetenTweedepagina.php';
session_start();
$userID = $_SESSION['userID'];

require_once("includes/header.php");

$sql = 'SELECT recover_question  FROM [User] WHERE user_id=:userID';
$stmt = $conn->prepare($sql);
$stmt->bindParam(':userID', $userID);
$stmt->execute();
$result = $stmt->fetchAll();



if($_GET['email']) {
    $email = $_GET['email'];
    $sql = "SELECT [e-mail] FROM [User] WHERE [e-mail]= :email";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    $results = $stmt->fetchAll();
    if ($results[0]['e-mail'] != $email) {
        header("Location: wachtwoordVergetenVoorpagina.php?error=noauthorization");
    } else {
        ?>
        <main>
            <form class="form" method="post" action="wachtwoordVergetenTweedepagina.inc.php">
                <h4 class="text-center">Voer je gegevens in</h4>
                <input class="form-input" type="text" name="Email" value="<?php echo $email ?>" readonly>
                <input class="form-input" type="text" name="Token" placeholder="Jouw verificatie code">
                <input class="form-input" type="text" name="RecoveryQuestion" id="RecoverQuestion" value="<?php
                if ($result[0]['recover_question'] == 1) {
                    echo 'Wat is het achternaam van je moeder?';
                } else if ($result[0]['recover_question'] == 2) {
                    echo 'Wat is het naam van je eerste huisdier?';
                } else if ($result[0]['recover_question'] == 3) {
                    echo 'Wat was je eerste auto?';
                } else if ($result[0]['recover_question'] == 4) {
                    echo 'Op welke basisschool zat je?';
                } else if ($result[0]['recover_question'] == 5) {
                    echo 'Hoe heet de stad waar je bent geboren?';
                }
                ?>" readonly>

                <div class="small-12 medium-7 column">
                    <input class="form-input" type="text" name="RecoveryQuestionAnswer" id="RecoverQuestionAnswer"
                           placeholder="Antwoord"
                           required>
                </div>
                <input class="form-button" type="submit" name="confirmtoken" value="Ga door">
            </form>
        </main>
        <?php
    }
} else {
    header("Location: wachtwoordVergetenVoorpagina.php?error=noauthorazation");
}
require_once("includes/foundation_script.php");
require_once("includes/footer.html");
?>