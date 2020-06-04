<?php
$title = 'Veiling aanmaken';
$link = 'veilingaanmaken.php';
session_start();
require_once("includes/header.php");

if(($_SESSION['Rank'] = ' Verkoper ')) {

?>


<main>
    <form class="form" method="post" action="veilingaanmaken.inc.php">
        <h4 class="text-center">Veiling aanbieden</h4>
        <label>
        <div>
            <input class="form-input" type="text" name="Title" id="Title" placeholder="Titel">
        </div>
        </label>
        <label> Vul hier een uitgebreide beschrijving over je veiling.
        <textarea class="form-input" id="Description" name="Description" placeholder="Beschrijving" style="height:200px"></textarea>
        </label>
        <label> Voor hoelang wilt u jouw veiling actief hebben?
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
        <label> Het startprijs moet minimaal 1€ en maximaal 999999999€
        <div>
            <input class="form-input" type="text" name="Startprice" id="Startprice" pattern="[0-9]{1,9}" placeholder="Startprijs">
        </div>
        </label>
        <label> Hoeveel reken je voor de verzendkosten van je veiling?
            <div>
                <input class="form-input" type="text" name="Shippingcost" id="Shippingcost" pattern="[0-9]{1,4}" placeholder="Verzendkosten">
            </div>
        </label>
        <label>Afbeelding:
        <input type="file" class="form-input" name="Image" id="Image"><br>
        </label>
        <p><input type="submit" class="form-button" name="Submit"  value="Ga naar het overzicht"></p>
    </form>
</main>


<?php
} else {
    header("Location: persoonlijkePagina.php?error=noauthorization");
}
require_once("includes/foundation_script.php");
require_once("includes/footer.html");
?>

