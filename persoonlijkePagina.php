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
        echo '<div data-closable class="alert-box callout error"> U bent al ingelogd!
                      <button class="close-button" aria-label="Dismiss alert" type="button" data-close>
                      <span aria-hidden="true">&CircleTimes;</span>
                      </button>
                      </div>';
    } else if ($_GET['error'] == "noauthorization") {
        echo '<div data-closable class="alert-box callout error"> U bent al een verkoper
                      <button class="close-button" aria-label="Dismiss alert" type="button" data-close>
                      <span aria-hidden="true">&CircleTimes;</span>
                      </button>
                      </div>';
    }
} else if(isset($_GET['success'])){
    if($_GET['success'] == "auctionmade"){
        echo '<div data-closable class="alert-box callout success"> U heeft succesvol een veiling opgezet!
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
                    <?php
                    if ($_SESSION['Rank'] == " Admin "){
                        echo'
                        <li>
                        <a href="Veiling%20over%20datum.php">Veilingen over datum</a>
                        </li>';
                    }
                    ?>
                    <li>
                        <a href="#">Mijn account</a>
                        <ul class="menu vertical">
                            <li><a class="subitem" href="#">Persoonlijke informatie</a></li>
                            <li><a class="subitem" href="#">Adres informatie</a></li>
                            <li><a class="subitem" href="#">Betaalopties</a></li>
                        </ul>
                    </li>
                    <li>
                    </li>
                    <li><a class="subitem" href="verwijderAccount.php">Verwijder account</a></li>
                </ul>
            </li>
            <li>
                <a href="#">Veilingen</a>
                <ul class="menu vertical subrubriek">
                    <li><a class="subitem" href="#">Gewonnen veilingen</a></li>
                    <li><a class="subitem" href="#">Biedingen</a></li>
                    <li><a class="subitem" href="#">Favoriet</a></li>
                    <li><a class="subitem" href="#">Aanbevolen voor u</a></li>
                    <?php
                    if(($_SESSION['Rank']) === " Verkoper "){
                    echo "<li><a class='subitem' href='veilingaanmakenVoorpagina.php'>Veilingen aanmaken</a></li>";}
                    ?>
                </ul>
            </li>
            <li>
            </li>
            <li>
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
                <p>hier komt alle info van het aanpassen van uw gegevens</p>

            </div>
        </div>

                <div>
                <?php
                if(($_SESSION['Rank']) === " Gebruiker "){
                    echo "<a a class=\"button secondary large\" href='verkoopaccountVoorpagina.php?''>Word verkoper</a>";}
                ?>
                </div>
<?php

$html = '<div class="cell small-4 flex-container flex-dir-column">';

$sql = "SELECT notification_id, notification, is_seen FROM Notification WHERE user_id = :user_id ORDER BY notification_id DESC";
$data = $conn->prepare($sql);
$data ->bindParam(':user_id', $_SESSION['user_id']);
$data->execute();
$result = $data->fetchAll();

if(isset($result[0])) {
    foreach ($result as $notification) {
        $html .= '<div data-closable class="alert-box callout error">';
        $html .= $notification['notification'];
        $html .= '<button class="close-button" aria-label="Dismiss alert" type="button" data-close>
                <span aria-hidden="true">&CircleTimes;</span>
            </button>
        </div>';
    }
} else {
    $html .= "<div data-closable class=\"alert-box callout error\"> U heeft geen meldingen.
            <button class=\"close-button\" aria-label=\"Dismiss alert\" type=\"button\" data-close>
                <span aria-hidden=\"true\">&CircleTimes;</span>
            </button>
        </div>";
}
echo $html;
?>

<?php
require_once("includes/foundation_script.php");
require_once("includes/footer.html");
?>
