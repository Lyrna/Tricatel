<?php

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