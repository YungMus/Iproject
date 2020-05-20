<?php
$title = 'Persoonlijke Pagina';
$link = 'persoonlijkePagina.php';
session_start();

require_once("includes/header.php");

if(isset($_SESSION['IDUser'])){
    echo '<p>Ik ben een gebruiker</p>';
}
else if(isset($_SESSION['IDSeller'])){
    echo '<p>Ik ben een seller</p>';
}
else if(isset($_SESSION['IDAdmin'])){
    echo '<p>Ik ben een admin</p>';
}
else{   header("Location: inlog.php?error=noauthorazation");
    exit();
}
?>

    <div class="row flex-container align-center">
        <div class="callout text-center">
            <p>Dit is de persoonlijke pagina</p>
            <a class="button large" href="#">So Large</a>
            <?php
            if(isset($_SESSION['IDUser']) || isset($_SESSION['IDSeller']) || isset($_SESSION['IDAdmin'])){
                echo "<li><a href= 'uitgelogd.php'>Uitloggen</a></li>";
            } else {
                echo "<li><a href='inlog.php'>Inloggen</a></li>";
                echo "<li><a href='registerVoorpagina.php'>Registreren</a></li>";
            }
            ?>
        </div>
    </div>

<?php
require_once("includes/foundation_script.php");
require_once("includes/footer.php");
?>