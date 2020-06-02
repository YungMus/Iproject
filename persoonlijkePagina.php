<?php
$title = 'Persoonlijke Pagina';
$link = 'persoonlijkePagina.php';
session_start();

require_once("includes/header.php");
require_once("connectingDatabase.php");

if(isset($_SESSION['Username'])){
    echo '<div data-closable class="alert-box callout info"> Welkom'. $_SESSION['Rank'] . $_SESSION['Username'] .'!
  <button class="close-button" aria-label="Dismiss alert" type="button" data-close>
    <span aria-hidden="true">&CircleTimes;</span>
  </button>
</div>';
}
else{
    header("Location: inlog.php?error=noauthorization");
}

if(isset($_GET['error'])) {
    if ($_GET['error'] == "alreadyloggedin") {
        echo '<div data-closable class="alert-box callout error"> Je bent al ingelogd!
                      <button class="close-button" aria-label="Dismiss alert" type="button" data-close>
                      <span aria-hidden="true">&CircleTimes;</span>
                      </button>
                      </div>';
    }
}


?>
    <div class="grid-x grid-padding-y grid-padding-x">
        <ul class="multilevel-accordion-menu vertical menu rubriek" data-accordion-menu>
            <li>
                <a href="#">Profiel en instellingen</a>
                <ul class="menu vertical subrubriek">
                    <li>
                        <a href="#">Mijn account</a>
                        <ul class="menu vertical">
                            <li><a class="subitem" href="#">Persoonlijke informatie</a></li>
                            <li><a class="subitem" href="#">Adres informatie</a></li>
                            <li><a class="subitem" href="#">Betaalopties</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">sub2</a>
                        <ul class="menu vertical">
                            <li>
                                <a href="#">Subrubriek 1.2.1</a>
                                <ul class="menu vertical">
                                    <li><a class="subitem" href="#">Subrubriek 1.2.1.1</a></li>
                                    <li><a class="subitem" href="#">Subrubriek 1.2.1.2</a></li>
                                </ul>
                            </li>
                            <li><a class="subitem" href="#">Subrubriek 1.2.2</a></li>
                        </ul>
                    </li>
                    <li><a class="subitem" href="#">Subrubriek 1.3</a></li>
                    <li><a class="subitem" href="verwijderAccount.php">Verwijder account</a></li>
                </ul>
            </li>
            <li>
                <a href="#">Veilingen</a>
                <ul class="menu vertical subrubriek">
                    <li><a class="subitem" href="#">Gewonnen veilingen</a></li>
                    <li><a class="subitem" href="#">Biedingen</a></li>
                    <li><a class="subitem" href="#">Favorite</a></li>
                    <li><a class="subitem" href="#">Aanbevolen voor jou</a></li>
                </ul>
            </li>
            <li>
                <a href="#">Rubriek 3</a>
                <ul class="menu vertical subrubriek">
                    <li><a class="subitem" href="#">Thing 1</a></li>
                    <li><a class="subitem" href="#">Thing 2</a></li>

                </ul>
            </li>
            <li>
                <a href="#">Rubriek 4</a>
                <ul class="menu vertical subrubriek">
                    <li><a href="#">Sub-item 3</a>
                        <ul class="menu vertical">
                            <li><a class="subitem" href="#">Thing 1</a></li>
                            <li><a class="subitem" href="#">Thing 2</a></li>
                        </ul>
                    </li>
                    <li><a class="subitem" href="#">Thing 1</a></li>
                    <li><a class="subitem" href="#">Thing 2</a></li>
                </ul>
            </li>
            <br>
            <?php
            if(isset($_SESSION['Username'])){
                echo "<ul>    
                <a class=\"button secondary large\" href='uitgelogd.php'>uitloggen</a>
            </ul>";}
            ?>
        </ul>

        <div class="cell small-4 flex-container flex-dir-column">
            <div class="callout text-center">
                <h1>Dit is de persoonlijke pagina</h1>
                <p>hier komt alle info van het aanpassen van je gegevens</p>

            </div>
        </div>

                <div>
                <?php
                if(($_SESSION['Rank']) === " Gebruiker "){
                    echo "<a a class=\"button secondary large\" href='verkoopaccount.php?Email=".$_SESSION['Email']."'>Word verkoper</a>";}
                ?>
                </div>
<?php

$html = '<div class="cell small-4 flex-container flex-dir-column">';

$sql = "SELECT notification_id, notification, is_seen FROM Notification INNER JOIN [User] ON Notification.user_id = [User].user_id WHERE username = :username";
$data = $conn->prepare($sql);
$data ->bindParam(':username', $_SESSION['username']);
$data->execute();
$result = $data->fetchAll();


foreach ($result as $notification) {
    $html .= '<div class="callout text-center">
                <p>';
    $html .= $notification['notification'];
    $html .= '</p>
            </div>';
}

?>

        <div class="cell small-4 flex-container flex-dir-column">
            <div class="callout text-center">
                <p>demo melding 1</p>
            </div>
            <div class="callout text-center">
                <p>demo melding 2</p>

            </div>
        </div>

    </div>

<?php
require_once("includes/foundation_script.php");
require_once("includes/footer.html");
?>

<!--            --><?php
//            if(isset($_SESSION['IDUser']) || isset($_SESSION['IDSeller']) || isset($_SESSION['IDAdmin'])){
//                echo "<a class=\"button large\" href= 'uitgelogd.php'>Uitloggen</a>";            }
//            ?>
