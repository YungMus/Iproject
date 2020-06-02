<?php
$title = 'Inlogpagina';
$link = 'veilingCategorieOverzicht.php';
session_start();
require_once("includes/header.php");
require_once("rubriekenboom overzicht.php");

if ($isSearchedRubric){
    $sqlVeiling = "select top 50 title, startvalue, name, Item.item_id FROM Item INNER JOIN Item_categorie ON Item.item_id = Item_categorie.item_id WHERE name IN (
        SELECT name
        FROM Rubric
        WHERE rubric_id = $rubric_id OR parent_rubric = $rubric_id OR parent_rubric  IN (SELECT rubric_id FROM sublevel1_rubrieken WHERE parent_rubric = $rubric_id)
        OR parent_rubric IN (SELECT rubric_id FROM sublevel2_rubrieken WHERE parent_rubric IN (SELECT rubric_id FROM sublevel1_rubrieken WHERE parent_rubric = $rubric_id)
        OR parent_rubric IN (SELECT rubric_id FROM sublevel3_rubrieken WHERE parent_rubric IN (SELECT rubric_id FROM sublevel2_rubrieken WHERE parent_rubric IN (SELECT rubric_id FROM sublevel1_rubrieken WHERE parent_rubric = $rubric_id))))

)";
    $dataVeiling = $conn->query($sqlVeiling);
    $resultVeiling = $dataVeiling->fetchAll();
    $countVeiling = $dataVeiling->rowCount();

  $html = '  <div class="cell small-4 flex-container flex-dir-column">';

    for($i = 0; $i < $countVeiling; $i ++) {
        $html .= '<div class="callout primary flex-child-auto"><a href="veiling.php?item=' . $resultVeiling[$i]['item_id'] . '">' . $resultVeiling[$i]['title'] . ' &euro;' . $resultVeiling[$i]['startvalue'] . '</a></div>';
    }

 $html.= '</div>
</div>';

  echo $html;
    }
else if($isSearchKeyword){
    $search = '%' . $search . '%';
    $sqlKeyword = 'SELECT top 50 item_id, title, startvalue FROM Item WHERE title LIKE :searchA OR description LIKE :searchB';
    $dataKeyword = $conn->prepare($sqlKeyword);
    $dataKeyword->bindParam(':searchA', $search);
    $dataKeyword->bindParam(':searchB', $search);
    $dataKeyword->execute();

    $resultVeiling = $dataKeyword->fetchAll();
    $countVeiling = $dataKeyword->rowCount();


    $html = '  <div class="cell small-4 flex-container flex-dir-column">';

    for($i = 0; $i < $countVeiling; $i ++) {
        $html .= '<div class="callout primary flex-child-auto"><a href="veiling.php?item=' . $resultVeiling[$i]['item_id'] . '">' . $resultVeiling[$i]['title'] . ' &euro;' . $resultVeiling[$i]['startvalue'] . '</a></div>';
    }

    $html.= '</div>
</div>';

    echo $html;

}
require_once("includes/foundation_script.php");
require_once("includes/footer.html");
?>