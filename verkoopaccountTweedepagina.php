<?php
$title = 'Verkoopaccount registeren';
$link = 'verkoopaccountTweedepagina.php';
session_start();

require_once("includes/header.php");

$userID = $_SESSION['user_id'];
$sql = 'SELECT recover_question  FROM [User] WHERE user_id=:userID';
$stmt = $conn->prepare($sql);
$stmt->bindParam(':userID', $userID);
$stmt->execute();
$result = $stmt->fetchAll();

if(isset($_SESSION['Username'])) {
    if($_GET['verify'] = 'RecoveryQuestion'){
    ?>

    <main>
        <form class="form" method="post" action="verkoopaccountTweedepagina.inc.php">
            <h4 class="text-center">Verkoopaccount registeren</h4>
            <label> Verifieer jezelf door jouw herstelvraag te beantwoorden
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
            </label>
            </label>
            <p><input type="submit" class="form-button" name="VerifyRecoverQuestion"  value="Ga door"></p>
        </form>
    </main>
        <?php
        }
if($_GET['verify'] = 'Email') {
    ?>

    <main>
        <form class="form" method="post" action="verkoopaccountTweedepagina.inc.php">
            <h4 class="text-center">Verkoopaccount registeren</h4>
            <input class="form-input" type="text" name="Token" placeholder="Jouw verificatie code">
            </label>
            <p><input type="submit" class="form-button" name="VerifyEmail"  value="Ga door"></p>
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
