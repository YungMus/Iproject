<?php

$title = 'Inlogpagina';
$link = 'veilingCategorieOverzicht.php';
require_once("includes/header.php");

$sql = "select name, rubric_id FROM hoofd_rubrieken";
$data = $conn->query($sql);
$result = $data->fetchAll();
$count = $data->rowCount();

$html = '<div class="grid-x grid-padding-y grid-padding-x">
    <ul class="multilevel-accordion-menu vertical menu rubriek" data-accordion-menu>';

for ($i = 0; $i < $count; $i ++) {
    $html .= '<li>
            <a href="#">'. $result[$i]['name'] .'</a>
            <ul class="menu vertical subrubriek">';
    $parent_rubric = $result[$i]['rubric_id'];
                   $sqlA = "select TOP 3 name, rubric_id FROM sublevel1_rubrieken WHERE parent_rubric = $parent_rubric";
                   $dataA = $conn->query($sqlA);
                   $resultA = $dataA->fetchAll();
                   $countA = $dataA->rowCount();
                    for ($iA = 0; $iA < $countA; $iA ++) {
                        $html .= '<li> <a href="#">' . $resultA[$iA]['name'] . '</a> <ul class="menu vertical">';

                        $parent_rubricA = $resultA[$iA]['rubric_id'];
                        $sqlB = "select TOP 3 name, rubric_id FROM sublevel2_rubrieken WHERE parent_rubric = $parent_rubricA";
                        $dataB = $conn->query($sqlB);
                        $resultB = $dataB->fetchAll();
                        $countB = $dataB->rowCount();
                        for ($iB = 0; $iB < $countB; $iB ++) {
                            $html .= '<li> <a href="#">' . $resultB[$iB]['name'] . '</a> <ul class="menu vertical">';

                            $parent_rubricB = $resultB[$iB]['rubric_id'];
                            $sqlC = "select TOP 3 name, rubric_id FROM sublevel3_rubrieken WHERE parent_rubric = $parent_rubricB";
                            $dataC = $conn->query($sqlC);
                            $resultC = $dataC->fetchAll();
                            $countC = $dataC->rowCount();

                            for ($iC = 0; $iC < $countC; $iC ++) {
                                $html .= '<li> <a href="#">' . $resultC[$iC]['name'] . '</a> </li>';
                            }
                            $html .='</ul> </li>';
                        }

                        $html .='</ul> </li>';
                    }
$html.= '   </ul></li>';
}

$html .= '</div></ul>';
echo $html;

require_once("includes/foundation_script.php");
require_once("includes/footer.php");
?>