<?php
$title = 'Categorie veilingen';
$link = 'veilingCategorieOverzicht.php';
session_start();
require_once("includes/header.php");
$space = false;
if(!isset($_SESSION["isSearchedRubric"])) {
    $_SESSION['space'] = false;
    $_SESSION["isSearchedRubric"] = false;
    $_SESSION["isSearchedKeyword"] = false;
}
if (isset($_POST['Zoek'])) {
    $search = $_POST['categorie'];
    $sqlRubric_id = "select rubric_id FROM Rubric WHERE name = :search";
    $dataRubric_id = $conn->prepare($sqlRubric_id);
    $dataRubric_id->bindParam(':search', $search);
    $dataRubric_id->execute();
    $resultRubric_id = $dataRubric_id->fetchAll();

    $_SESSION["rubric_id"] = $resultRubric_id[0]['rubric_id'];

    $_SESSION["isSearchedKeyword"] = false;
    $_SESSION["isSearchedRubric"] = true;
}

else if (isset($_POST['SearchKeyword'])) {
    $_SESSION["search"] = htmlspecialchars(trim($_POST['categorie']));

    if(strpos($_SESSION["search"], ' ')){
        $_SESSION['space'] = true;
        $_SESSION["searchAfterSpace"] = substr($_SESSION["search"],strpos($_SESSION["search"], ' ') + 1);
        $_SESSION["search"] = substr($_SESSION["search"],0,  strpos($_SESSION["search"], ' ') );
    } else {
        $_SESSION['space'] = false;
    }

    $_SESSION["isSearchedRubric"] = false;
    $_SESSION["isSearchedKeyword"] = true;

}

if($_SESSION["isSearchedRubric"] || $_SESSION["isSearchedKeyword"]) {
    $html = '<nav class="hover-underline-menu" data-menu-underline-from-center>
    <ul class="menu align-center">
                <form method="POST" action="veilingCategorieOverzicht.php">
                    <li><input type="submit" id="VeilingenPagina" name="VeilingenPagina" value="1"></li>
                    <li><input type="submit" id="VeilingenPagina" name="VeilingenPagina" value="2"></li>
                    <li><input type="submit" id="VeilingenPagina" name="VeilingenPagina" value="3"></li>
                    <li><input type="submit" id="VeilingenPagina" name="VeilingenPagina" value="4"></li>
                    <li><input type="submit" id="VeilingenPagina" name="VeilingenPagina" value="5"></li>
                </form>
    </ul>
</nav>';
    echo $html;
}
require_once("rubriekenboom.inc.php");

$start = 0;
$countRows = 25;

if (isset($_POST['VeilingenPagina'])) {
    $pagina = $_POST['VeilingenPagina'];

    switch ($pagina) {
        case 1:
            $start = 0;
            $countRows = 25;
            break;
        case 2:
            $start = 25;
            $countRows = 50;
            break;
        case 3:
            $start = 50;
            $countRows = 75;
            break;
        case 4:
            $start = 75;
            $countRows = 100;
            break;
        case 5:
            $start = 100;
            $countRows = 125;
            break;
    }
}
    if($_SESSION["isSearchedRubric"]) {
        $rubric_id = $_SESSION["rubric_id"];
        $sqlVeiling = "select title, startvalue, name, Item.item_id FROM Item INNER JOIN Item_categorie ON Item.item_id = Item_categorie.item_id WHERE name IN (
        SELECT name
        FROM Rubric
        WHERE rubric_id = $rubric_id OR parent_rubric = $rubric_id OR parent_rubric  IN (SELECT rubric_id FROM sublevel1_rubrieken WHERE parent_rubric = $rubric_id)
        OR parent_rubric IN (SELECT rubric_id FROM sublevel2_rubrieken WHERE parent_rubric IN (SELECT rubric_id FROM sublevel1_rubrieken WHERE parent_rubric = $rubric_id)
        OR parent_rubric IN (SELECT rubric_id FROM sublevel3_rubrieken WHERE parent_rubric IN (SELECT rubric_id FROM sublevel2_rubrieken WHERE parent_rubric IN (SELECT rubric_id FROM sublevel1_rubrieken WHERE parent_rubric = $rubric_id))))
) ORDER BY item_id OFFSET $start ROWS 
FETCH NEXT $countRows ROWS ONLY";
        $dataVeiling = $conn->query($sqlVeiling);
        $resultVeiling = $dataVeiling->fetchAll();
        $countVeiling = $dataVeiling->rowCount();

    } else if ($_SESSION["isSearchedKeyword"]) {
        $search = $_SESSION["search"];
        $search = '% ' . $search . ' %';
        $searchAfterSpace = $_SESSION["searchAfterSpace"];
        $searchAfterSpace = '% ' . $searchAfterSpace . ' %';

        if ($_SESSION['space']) {
            $sqlKeyword = "SELECT DISTINCT item_id, title, startvalue FROM Item WHERE title LIKE :searchA OR description LIKE :searchB 
OR title LIKE :searchC OR description LIKE :searchD ORDER BY item_id OFFSET $start ROWS FETCH NEXT $countRows ROWS ONLY";
            $dataKeyword = $conn->prepare($sqlKeyword);
            $dataKeyword->bindParam(':searchA', $search);
            $dataKeyword->bindParam(':searchB', $search);
            $dataKeyword->bindParam(':searchC', $searchAfterSpace);
            $dataKeyword->bindParam(':searchD', $searchAfterSpace);

        } else {
            $sqlKeyword = "SELECT DISTINCT item_id, title, startvalue FROM Item WHERE title LIKE :searchA OR description LIKE :searchB ORDER BY item_id OFFSET $start ROWS 
FETCH NEXT $countRows ROWS ONLY";
            $dataKeyword = $conn->prepare($sqlKeyword);
            $dataKeyword->bindParam(':searchA', $search);
            $dataKeyword->bindParam(':searchB', $search);
        }

        $dataKeyword->execute();

        $resultVeiling = $dataKeyword->fetchAll();
        $countVeiling = $dataKeyword->rowCount();
    }
if($_SESSION["isSearchedRubric"] || $_SESSION["isSearchedKeyword"]) {
    $html = '  <div class="cell small-4 flex-container flex-dir-column">';

    if ($countVeiling > 0) {
    for ($i = 0; $i < $countVeiling; $i++) {
        $html .= '<div class="callout primary flex-child-auto"><a href="veiling.php?item=' . $resultVeiling[$i]['item_id'] . '">' . $resultVeiling[$i]['title'] . ' &euro;' . $resultVeiling[$i]['startvalue'] . '</a></div>';
    }
}
    else {
        echo 'Er zijn geen resultaten beschikbaar.';
    }

    $html .= '</div>
</div>';
    echo $html;
}

require_once("includes/foundation_script.php");
require_once("includes/footer.html");
?>