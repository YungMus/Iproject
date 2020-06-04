<?php

$sql = "select name, rubric_id FROM hoofd_rubrieken";
$data = $conn->query($sql);
$result = $data->fetchAll();
$count = $data->rowCount();

$html = '<form action="veilingCategorieOverzicht.php" method="post">
<input class="button" type="submit" id="Zoek" name="Zoek" value="Zoek"><div class="grid-x grid-padding-y grid-padding-x">
    <ul class="multilevel-accordion-menu vertical menu rubriek" data-accordion-menu>';

for ($i = 0; $i < $count; $i ++) {
    $html .= '<li>
            <a href="#">'. $result[$i]['name'] .' </a> <input type="radio" id="'. $result[$i]['name'] .'" name="categorie" value="'. $result[$i]['name'] .'" checked>
            <ul class="menu vertical subrubriek">';
    $parent_rubric = $result[$i]['rubric_id'];
                   $sqlA = "select name, rubric_id FROM sublevel1_rubrieken WHERE parent_rubric = $parent_rubric";
                   $dataA = $conn->query($sqlA);
                   $resultA = $dataA->fetchAll();
                   $countA = $dataA->rowCount();
                    for ($iA = 0; $iA < $countA; $iA ++) {
                        $html .= '<li> <a href="#">' . $resultA[$iA]['name'] . '</a> <input type="radio" id="'. $resultA[$iA]['name'] .'" name="categorie" value="'. $resultA[$iA]['name'] .'"><ul class="menu vertical">';

//                        $parent_rubricA = $resultA[$iA]['rubric_id'];
//                        $sqlB = "select TOP 5 name, rubric_id FROM sublevel2_rubrieken WHERE parent_rubric = $parent_rubricA";
//                        $dataB = $conn->query($sqlB);
//                        $resultB = $dataB->fetchAll();
//                        $countB = $dataB->rowCount();
//                        for ($iB = 0; $iB < $countB; $iB ++) {
//                            $html .= '<li> <a href="#">' . $resultB[$iB]['name'] . '</a> <input type="radio" id="'. $resultB[$iB]['name'] .'" name="categorie" value="'. $resultB[$iB]['name'] .'"> <ul class="menu vertical">';
//                            $html .='</ul> </li>';
//                        }

                        $html .='</ul> </li>';
                    }
$html.= ' </ul></li>';
}

$html .= '</form></ul>';

echo $html;
?>