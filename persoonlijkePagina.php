<?php
$title = 'Persoonlijke Pagina';
$link = 'persoonlijkePagina.php';
session_start();

require_once("includes/header.php");

if(isset($_SESSION['IDUser'])){
    echo '<div data-closable class="alert-box callout info"> Welkom gebruiker!
  <button class="close-button" aria-label="Dismiss alert" type="button" data-close>
    <span aria-hidden="true">&CircleTimes;</span>
  </button>
</div>';
}
else if(isset($_SESSION['IDSeller'])){
    echo '<div data-closable class="alert-box callout info"> Welkom verkoper!
  <button class="close-button" aria-label="Dismiss alert" type="button" data-close>
    <span aria-hidden="true">&CircleTimes;</span>
  </button>
</div>';
}
else if(isset($_SESSION['IDAdmin'])){
    echo '<div data-closable class="alert-box callout info"> Welkom admin!
  <button class="close-button" aria-label="Dismiss alert" type="button" data-close>
    <span aria-hidden="true">&CircleTimes;</span>
  </button>
</div>';
}
else{   header("Location: inlog.php?error=noauthorization");
    exit();
}

?>
    <div class="grid-x grid-padding-y grid-padding-x">
        <ul class="multilevel-accordion-menu vertical menu rubriek" data-accordion-menu>
            <li>
                <a href="#">profiel en instellingen</a>
                <ul class="menu vertical subrubriek">
                    <li>
                        <a href="#">sub1</a>
                        <ul class="menu vertical">
                            <li><a class="subitem" href="#">Subrubriek 1.1.1</a></li>
                            <li><a class="subitem" href="#">Subrubriek 1.1.2</a></li>
                            <li><a class="subitem" href="#">Subrubriek 1.1.3</a></li>
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
                    <li><a class="subitem" href="#">Subrubriek 1.4</a></li>
                </ul>
            </li>
            <li>
                <a href="#">veilingen</a>
                <ul class="menu vertical subrubriek">
                    <li><a class="subitem" href="#">gewonnen veilingen</a></li>
                    <li><a class="subitem" href="#">biedingen</a></li>
                    <li><a class="subitem" href="#">favorite</a></li>
                    <li><a class="subitem" href="#">aanbevolen voor jou</a></li>
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
            if(isset($_SESSION['IDUser']) || isset($_SESSION['IDSeller']) || isset($_SESSION['IDAdmin'])){
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

    </div>
<?php
require_once("includes/foundation_script.php");
require_once("includes/footer.php");
?>

<!--            --><?php
//            if(isset($_SESSION['IDUser']) || isset($_SESSION['IDSeller']) || isset($_SESSION['IDAdmin'])){
//                echo "<a class=\"button large\" href= 'uitgelogd.php'>Uitloggen</a>";            }
//            ?>
