<?php

$dbName = 'db_exb';
$host = 'localhost';
$user = 'ingridyasmin';
$password = 'bcd127';

try{
     $pdo = new PDO("mysql:dbname=".$dbName.";host=".$dbHost, $dbUser, $dbPassword);
}
catch (Exception $e){
     echo "Unable to connect: " . $e->getMessage() ."<p>";
}
?>