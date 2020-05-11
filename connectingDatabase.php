<?php
$dsn = "sqlsrv:Server=mssql.iproject.icasites.nl,1433;Database=iproject43";
try
{
    $conn = new PDO($dsn, "iproject43", "QK8HfEAR");
    $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

    $sql = "SELECT tst_Column1, tst_Column2, tst_Column3 FROM test";

    foreach ($conn->query($sql) as $row)
    {
        print_r($row);
    }
    echo ('Done');
}
catch(PDOException $e)
{
    echo $e->getMessage();
}
?>