<?php
$title = 'Inlogpagina';
$link = 'veilingCategorieOverzicht.php';

require_once("includes/header.php");
?>

<div class="grid-x grid-padding-y grid-padding-x">
    <ul class="multilevel-accordion-menu vertical menu" data-accordion-menu>
        <li>
            <a href="#">Item 1</a>
            <ul class="menu vertical sublevel-1">
                <li>
                    <a href="#">Sub-item 1</a>
                    <ul class="menu vertical sublevel-2">
                        <li><a class="subitem" href="#">Thing 1</a></li>
                        <li><a class="subitem" href="#">Thing 2</a></li>
                        <li><a class="subitem" href="#">Thing 3</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#">Sub-item 2</a>
                    <ul class="menu vertical sublevel-2">
                        <li>
                            <a href="#">Super-sub-item 1</a>
                            <ul class="menu vertical sublevel-3">
                                <li><a class="subitem" href="#">Thing 1</a></li>
                                <li><a class="subitem" href="#">Thing 2</a></li>
                            </ul>
                        </li>
                        <li><a class="subitem" href="#">Thing 2</a></li>
                    </ul>
                </li>
                <li><a class="subitem" href="#">Thing 1</a></li>
                <li><a class="subitem" href="#">Thing 2</a></li>
            </ul>
        </li>
        <li>
            <a href="#">Item 2</a>
            <ul class="menu vertical sublevel-1">
                <li><a class="subitem" href="#">Thing 1</a></li>
                <li><a class="subitem" href="#">Thing 2</a></li>
            </ul>
        </li>
        <li>
            <a href="#">Item 3</a>
            <ul class="menu vertical sublevel-1">
                <li><a class="subitem" href="#">Thing 1</a></li>
                <li><a class="subitem" href="#">Thing 2</a></li>
            </ul>
        </li>
        <li>
            <a href="#">Item 4</a>
            <ul class="menu vertical sublevel-1">
                <li>
                    <a href="#">Sub-item 3</a>
                    <ul class="menu vertical sublevel-2">
                        <li><a class="subitem" href="#">Thing 1</a></li>
                        <li><a class="subitem" href="#">Thing 2</a></li>
                    </ul>
                </li>
                <li><a class="subitem" href="#">Thing 1</a></li>
                <li><a class="subitem" href="#">Thing 2</a></li>
            </ul>
        </li>
    </ul>



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