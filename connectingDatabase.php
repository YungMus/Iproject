<?php

$serverName = "(local)";
$databaseName = "IProject";

try {
    $conn = new PDO("sqlsrv:server=$serverName;Database=$databaseName", "root", "");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    echo "Connected...<br><br>";

    $data = $conn->query("SELECT DISTINCT TOP(10) rubric_id, order_nr FROM Rubric");
    $results = $data->fetchAll(PDO::FETCH_ASSOC);

    print_r($results);

    foreach($results as $row){
        echo "<p>{$row['rubric_id']} {$row['order_nr']}</p>";
    }

}
catch(Exception $e)
{
    die(print_r($e->getMessage()));
}

?>
