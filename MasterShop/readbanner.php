<?php
include "connect.php";
$query = "SELECT * FROM tbl_banner";
$res = $connect->prepare($query);
$res->execute();
$products = array();
while ($row = $res->fetch(PDO::FETCH_ASSOC))
{
  $record = array();
  $record["id"] = $row["id"];
  $record["pic"] = $row["name"];

  $products[] = $record;
}

echo JSon_encode($products)

?>