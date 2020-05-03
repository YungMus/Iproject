<?php

$serverName = "(local)";
$databaseName = "I-Project";

try {
    $conn = new PDO("sqlsrv:server=$serverName;Database=$databaseName", "", "");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    echo "Connected...<br><br>";

    $data = $conn->query("SELECT DISTINCT TOP(10) Firstname, Lastname FROM Person");
    $results = $data->fetchAll(PDO::FETCH_ASSOC);

    print_r($results);

    foreach($results as $row){
        echo "<p>{$row['Firstname']} {$row['Lastname']}</p>";
    }

}
catch(Exception $e)
{
    die(print_r($e->getMessage()));
}