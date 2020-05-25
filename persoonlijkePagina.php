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
                <a href="#">Rubriek 1</a>
                <ul class="menu vertical subrubriek">
                    <li>
                        <a href="#">Subrubriek 1.1</a>
                        <ul class="menu vertical">
                            <li><a class="subitem" href="#">Subrubriek 1.1.1</a></li>
                            <li><a class="subitem" href="#">Subrubriek 1.1.2</a></li>
                            <li><a class="subitem" href="#">Subrubriek 1.1.3</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">Subrubriek 1.2</a>
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
                <a href="#">Rubriek 2</a>
                <ul class="menu vertical subrubriek">
                    <li><a class="subitem" href="#">Thing 1</a></li>
                    <li><a class="subitem" href="#">Thing 2</a></li>
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
        </ul>


    </div>
    <div class="row flex-container align-center">

        <div class="callout text-center">
            <p>Dit is de persoonlijke pagina</p>
            <?php
            if(isset($_SESSION['IDUser']) || isset($_SESSION['IDSeller']) || isset($_SESSION['IDAdmin'])){
                echo "<a class=\"button large\" href= 'uitgelogd.php'>Uitloggen</a>";            }
            ?>
        </div>
    </div>

<?php
require_once("includes/foundation_script.php");
require_once("includes/footer.php");
?>