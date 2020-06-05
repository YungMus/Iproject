<?php
if (isset($_POST['Choose'])) {

    require 'connectingDatabase.php';
    session_start();
    $rubric = $_POST['rubric'];
    $sql = "SELECT rubric_id FROM rubric WHERE name =:rubric";
    $stmt = $conn->prepare($sql);
    $stmt->bindparam(':rubric', $rubric);
    $stmt->execute();
    $result = $stmt->fetchall();
    $rubricID = $result[0]['rubric_id'];

    $_SESSION['RubricID'] = $rubricID;
    header("Location: veilingaanmaken.php?success=rubric");
    exit();
}
else{
    header("Location: persoonlijkePagina.php?error=noauthorization");
    exit();
}