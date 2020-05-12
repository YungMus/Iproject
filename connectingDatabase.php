<?php
//$dsn = "sqlsrv:Server=mssql.iproject.icasites.nl,1433;Database=iproject43";
$host = 'mssql.iproject.icasites.nl';
$dbname = 'iproject43';
$user = 'iproject43';
$password = 'QK8HfEAR';
try
{
//    $conn = new PDO($dsn, "iproject43", "QK8HfEAR");
//    $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    $conn = mysqli_connect($host, $user, $password, $dbname);
}
catch(PDOException $e)
{
    echo $e->getMessage();
}
?>