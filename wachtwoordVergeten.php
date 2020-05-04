<?php
$title = 'Inlogpagina';
$link = 'wachtwoordVergeten.php';

if (($_SERVER['REQUEST_METHOD'] === 'POST')) {
    if (isset($_POST['send'])){
        $oldPassword = htmlspecialchars(trim($_POST['oldPassword']));
        $newPassword = htmlspecialchars(trim($_POST['newPassword']));
        $email = htmlspecialchars(trim($_POST['email']));
        print_r($_POST);
    }
}

require_once("includes/header.php");
require_once("connectingDatabase.php");
?>

<form method="POST" action="wachtwoordVergeten.php">
          <div class="row flex-container align-center padding-y">
          <div class="callout text-center">
                 <label for="email">email</label>
                </div>
            <div class="callout text-center">
                <input type="email" id="email" name="email">
                </div>
         </div>

        <div class="row flex-container align-center">
           <div class="callout text-center">
                  <label for="oldPassword">Oud wachtwoord</label>
           </div>
          <div class="callout text-center">
                <input type="text" id="oldPassword" name="oldPassword">
          </div>
        </div>
        
        <div class="row flex-container align-center">
           <div class="callout text-center">
                  <label for="newPassword">Nieuw wachtwoord</label>
           </div>
          <div class="callout text-center">
                <input type="text" id="newPassword" name="newPassword">
          </div>
        </div>
                
        <div class="row flex-container align-center">
          <div class="callout text-center">
                        <input type="submit" id="send" name="send" value="Nieuw wachtwoord">
                </div>
        </div>
        </form>

<?php
if (isset($_POST['send'])) {
    $sql = "select replace(:oldPassword, :oldPassword, :newPassword) from user WHERE e-mail = :email";
//    $data = $dbh->prepare($sql);
//    $data->execute(array( ':oldPassword' => '%'.$oldPassword.'%', ':newPassword' => '%'.$newPassword.'%', ':email' => $email));
}
require_once("includes/foundation_script.php");
require_once("includes/footer.php");
?>