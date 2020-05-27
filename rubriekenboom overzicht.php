<?php

$title = 'Inlogpagina';
$link = 'veilingCategorieOverzicht.php';
session_start();
require_once("includes/header.php");

$sqlB = "select name, rubric_id FROM sublevel2_rubrieken";
$dataB = $conn->query($sqlB);
$resultB = $dataB->fetchAll();
$countB = $dataB->rowCount();

$sqlC = "select name, rubric_id FROM sublevel3_rubrieken";
$dataC = $conn->query($sqlC);
$resultC = $dataC->fetchAll();
$countC = $dataC->rowCount();

$sql = "select name, rubric_id FROM hoofd_rubrieken";
$data = $conn->query($sql);
$result = $data->fetchAll();
$count = $data->rowCount();

$html = '<div class="grid-x grid-padding-y grid-padding-x">
    <ul class="multilevel-accordion-menu vertical menu rubriek" data-accordion-menu>';

for ($i = 0; $i < $count; $i ++) {
    $html .= '<li>
            <a href="#">'. $result[$i]['name'] .'</a>
            <ul class="menu vertical subrubriek">
                <li>';
    $parent_rubric = $result[$i]['rubric_id'];
                   $sqlA = "select name, rubric_id FROM sublevel1_rubrieken WHERE parent_rubric = $parent_rubric";
                   $dataA = $conn->query($sqlA);
                   $resultA = $dataA->fetchAll();
                   $countA = $dataA->rowCount();
                    for ($iA = 0; $iA < $countA; $iA ++) {
                        $html.= '<a href="#">'. $resultA[$iA]['name'].'</a> ';
                    }
                    $parent_rubricA = $resultA[$iA]['rubric_id'];
                    echo $parent_rubricA;
                        $sqlB = "select name, rubric_id FROM sublevel1_rubrieken WHERE parent_rubric = $parent_rubricA";
                        $dataB = $conn->query($sqlB);
                        $resultB = $dataB->fetchAll();
                        $countB = $dataB->rowCount();
                        for ($iB = 0; $iB < $countB; $iB ++) {
                            $html.= '<a href="#">'. $resultA[$iB]['name'].'</a>';
                        }
$html.= '<ul class="menu vertical">
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
        </li>';
}

$html .= '</div></ul>';
echo $html;

require_once("includes/foundation_script.php");
require_once("includes/footer.php");
?>