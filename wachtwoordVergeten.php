<?php
$title = 'Wachtwoord herstellen';
$link = 'wachtwoordVergeten.php';

require_once("includes/header.php");

if($_GET['email']) {
    $email = $_GET['email'];
    $sql = "SELECT [e-mail] FROM [User] WHERE [e-mail]= :email";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':email', $email);
    $stmt->execute();

        ?>
        <main>
            <form class="form" method="post" action="wachtwoordVergeten.inc.php">
                <h4 class="text-center">Voer je oude en nieuwe wachtwoorden in</h4>
                <input class="form-input" type="text" name="Email" value="<?php echo $email ?>" readonly>
                <input class="form-input" type="password" name="OldPassword" placeholder="Jouw oude wachtwoord">
                <input class="form-input" type="password" name="NewPassword" placeholder="Jouw nieuwe wachtwoord">
                <input class="form-input" type="password" name="NewPassword-repeat"
                       placeholder="Herhaal jouw nieuwe wachtwoord">
                <input class="form-button" type="submit" name="Changepassword" value="Verander je wachtwoord!">
            </form>
        </main>

        }
        <?php
}else {
    header("Location: wachtwoordVergetenVoorpagina.php?error=noauthorazation");
}

require_once("includes/foundation_script.php");
require_once("includes/footer.html");
?>