<?php
$title = 'Inlogpagina';
$link = 'veilingCategorieOverzicht.php';

require_once("includes/header.php");
?>

<div class="grid-x grid-padding-y grid-padding-x">
    <ul class="multilevel-accordion-menu vertical menu rubriek" data-accordion-menu>
        <li>
            <a href="#">Rubriek 1</a>
            <ul class="menu vertical">
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
            <ul class="menu vertical">
                <li><a class="subitem" href="#">Thing 1</a></li>
                <li><a class="subitem" href="#">Thing 2</a></li>
            </ul>
        </li>
        <li>
            <a href="#">Rubriek 3</a>
            <ul class="menu vertical">
                <li><a class="subitem" href="#">Thing 1</a></li>
                <li><a class="subitem" href="#">Thing 2</a></li>

            </ul>
        </li>
        <li>
            <a href="#">Rubriek 4</a>
            <ul class="menu vertical rubriekeen">
                <li><a href="#">Sub-item 3</a>
<!--                    <ul class="menu vertical">-->
<!--                        <li><a class="subitem" href="#">Thing 1</a></li>-->
<!--                        <li><a class="subitem" href="#">Thing 2</a></li>-->
<!--                    </ul>-->
                </li>
                <li><a class="subitem" href="#">Thing 1</a></li>
                <li><a class="subitem" href="#">Thing 2</a></li>
            </ul>
        </li>
        <li>
            <a href="#">Bedrag</a>
            <ul class="menu vertical rubriekeen">
                <li>
                    <div class="grid-x grid-margin-x">
                        <div class="cell small-8">
                            <a> Test 123
                        <div class="slider" data-slider data-initial-start="25" data-initial-end="75">
                            <span class="slider-handle" data-slider-handle role="slider" tabindex="1"></span>
                            <span class="slider-fill" data-slider-fill></span>
                            <span class="slider-handle" data-slider-handle role="slider" tabindex="1"></span>
                            <br>
                            <input class="cell small-2" type="number" id="sliderOutput1">
                            <input class="cell small-2" type="number" id="sliderOutput2">
                        </div>
                            </a>
                        </div>
                    </div>
                </li>
            </ul>
        </li>
        <li>
            <a href="#">afstand</a>
            <ul class="menu vertical rubriekeen">
                <li><a>
                    <div class="grid-x grid-margin-x">
                        <div class="cell small-10">
                            <div class="slider" data-slider data-initial-start="50" data-step="1" data-position-value-function="log" data-non-linear-base="5">
                                <span class="slider-handle" data-slider-handle role="slider" tabindex="1" aria-controls="sliderOutputNonLinear"></span>
                            </div>
                        </div>
                        <div class="cell small-2">
                            <input type="number" id="sliderOutputNonLinear">
                        </div>
                    </div>
                    </a>
                </li>
            </ul>
        </li>
    </ul>



<!--                        _____________________________________________________________________-->
<!--                    <div class="grid-x grid-margin-x">-->
<!--                        <div class="cell small-10">-->
<!--                            <div class="slider" data-slider data-initial-start="25" data-initial-end="75">-->
<!--                                <span class="slider-handle"  data-slider-handle role="slider" tabindex="1" aria-controls="sliderOutput1"></span>-->
<!--                                <span class="slider-fill" data-slider-fill></span>-->
<!--                                <span  class="slider-handle"  data-slider-handle role="slider" tabindex="1" aria-controls="sliderOutput2"></span>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                        <div class="cell small-2">-->
<!--                            <input type="number" id="sliderOutput1">-->
<!--                            <input type="number" id="sliderOutput2">-->
<!--                        </div>-->
<!--                    </div>-->
<!---->
<!--                    <div class="grid-x grid-margin-x">-->
<!--                        <div class="cell small-10">-->
<!--                            <div class="slider" data-slider data-initial-start="50" data-step="1" data-position-value-function="log" data-non-linear-base="5">-->
<!--                                <span class="slider-handle" data-slider-handle role="slider" tabindex="1" aria-controls="sliderOutputNonLinear"></span>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                        <div class="cell small-2">-->
<!--                            <input type="number" id="sliderOutputNonLinear">-->
<!--                        </div>-->
<!--                    </div>-->




    <div class="cell small-4 flex-container flex-dir-column">
      <div class="callout primary flex-child-auto"><a href="veiling.php">Veiling</a></div>
      <div class="callout primary flex-child-auto"><a href="veiling.php">Veiling</a></div>
      <div class="callout primary flex-child-auto"><a href="veiling.php">Veiling</a></div>
      <div class="callout primary flex-child-auto"><a href="veiling.php">Veiling</a></div>
      <div class="callout primary flex-child-auto"><a href="veiling.php">Veiling</a></div>
      <div class="callout primary flex-child-auto"><a href="veiling.php">Veiling</a></div>
      <div class="callout primary flex-child-auto"><a href="veiling.php">Veiling</a></div>
      <div class="callout primary flex-child-auto"><a href="veiling.php">Veiling</a></div>
      <div class="callout primary flex-child-auto"><a href="veiling.php">Veiling</a></div>
      <div class="callout primary flex-child-auto"><a href="veiling.php">Veiling</a></div>
      <div class="callout primary flex-child-auto"><a href="veiling.php">Veiling</a></div>
      <div class="callout primary flex-child-auto"><a href="veiling.php">Veiling</a></div>
  </div>
</div>

<?php
require_once("includes/foundation_script.php");
require_once("includes/footer.php");
?>