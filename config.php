<?php

session_start();

$base = dirname(__FILE__);

$dbName = "db_exb";
$host = "127.0.0.1";
// $user = "ingridyasmin";
$user = "root";
$password = "bcd127";


$pdo = new PDO("mysql:dbname=$dbName;host=$host",$user, $password);


?>