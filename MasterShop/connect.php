<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname="market";

$dsn = "mysql:host=$servername;dbname=$dbname";
try {
  $connect = new PDO($dsn, $username, $password);
  $connect ->exec("SET character_set_connection = 'utf8'");
  $connect ->exec("SET NAMES 'UTF8'");
  //$connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  //echo "Connected successfully";
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}
?>