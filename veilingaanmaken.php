<?php
$title = 'Veiling aanmaken';
$link = 'veilingaanmaken.php';
session_start();
require_once("includes/header.php");

if(isset($_GET['error'])) {
    if ($_GET['error'] == "emptyfields") {
        echo '<div data-closable class="alert-box callout error"> Vul al de velden in!
  <button class="close-button" aria-label="Dismiss alert" type="button" data-close>
    <span aria-hidden="true">&CircleTimes;</span>
  </button>
</div>';
    }
} else if(isset($_GET['success'])){
    if($_GET['success'] == "rubric"){
        echo '<div data-closable class="alert-box callout success"> U heeft succesvol een rubriek uitgekozen!
  <button class="close-button" aria-label="Dismiss alert" type="button" data-close>
    <span aria-hidden="true">&CircleTimes;</span>
  </button>
</div>';
    }
}

if(($_SESSION['Rank'] = ' Verkoper ')) {

?>


<main>
    <form class="form" method="post" action="veilingaanmaken.inc.php" enctype="multipart/form-data">
        <h4 class="text-center">Veiling aanbieden</h4>
        <label>
        <div>
            <input class="form-input" type="text" name="Title" id="Title" placeholder="Titel">
        </div>
        </label>
        <label> Vul hier een uitgebreide beschrijving over uw veiling.
        <textarea class="form-input" id="Description" name="Description" placeholder="Beschrijving" style="height:200px"></textarea>
        </label>
        <label> Voor hoelang wilt u de veiling actief hebben?
            <div>
                <label> 1 Dag
                <input class="form-input" type="radio" name="Duration" id="Duration" value="+1 day">
                </label>
                <label> 7 Dagen
                <input class="form-input" type="radio" name="Duration" id="Duration" value="+7 days">
                </label>
                <label> 30 Dagen
                <input class="form-input" type="radio" name="Duration" id="Duration" value="+30 days">
                </label>
            </div>
        </label>
        <label> De startprijs moet minimaal 1€ en maximaal 999999999€
        <div>
            <input class="form-input" type="text" name="Startprice" id="Startprice" pattern="[0-9]{1,9}" placeholder="Startprijs">
        </div>
        </label>
        <label> Hoeveel rekent u voor de verzendkosten van uw veiling?
            <div>
                <input class="form-input" type="text" name="Shippingcost" id="Shippingcost" pattern="[0-9]{1,4}" placeholder="Verzendkosten">
            </div>
        </label>
        <label>Afbeelding:
            <div>
        <input type="file" class="form-input" name="file" id="file">
            </div>
        </label>
        <p><input type="submit" class="form-button" name="Submit"  value="Maak veiling aan"></p>
    </form>
</main>


<?php
} else {
    header("Location: persoonlijkePagina.php?error=noauthorization");
}
require_once("includes/foundation_script.php");
require_once("includes/footer.html");
?>

