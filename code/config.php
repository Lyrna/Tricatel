<?php

// $servername = 'sql307.epizy.com';
// $dbname = 'epiz_28404988_tricatel';
// $username = 'epiz_28404988';
// $password = 'Simplon01';

$servername = 'localhost';
$dbname = 'tricatel';
$username = 'root';
$password = 'Simplon01';

try{
    $dbco = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  }
catch (PDOException $e){
    echo $e->getMessage();
}
?>