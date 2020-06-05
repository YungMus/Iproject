<?php
if (isset($_POST['Choose'])) {

    require 'connectingDatabase.php';
    session_start();

    $_SESSION['Rubric'] = $_POST['rubric'];
    header("Location: veilingaanmaken.php?success=rubric");
    exit();
} else{
    header("Location: persoonlijkePagina.php?error=noauthorization");
    exit();
}