<?php
$dsn = "sqlsrv:Server=mssql.iproject.icasites.nl,1433;Database=iproject43";

try
{
    $conn = new PDO($dsn, "iproject43", "QK8HfEAR");
    $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
}
catch(PDOException $e)
{
    echo $e->getMessage();
}
?>