<?php
include "connect.php";
$query = "SELECT * FROM tbl_product ORDER BY sell DESC LIMIT 5";
$res = $connect->prepare($query);
$res->execute();
$products = array();
while ($row = $res->fetch(PDO::FETCH_ASSOC))
{
  $record = array();
  $record["id"] = $row["id"];
  $record["title"] = $row["title"];
  $record["price"] = $row["price"];
  $record["pprice"] = $row["prevprice"];

  $sql = "SELECT * FROM tbl_gallery WHERE idproduct=:id";
  $res2 = $connect->prepare($sql);
  $res2->bindParam(":id",$record["id"]);
  $res2->execute();
  $row2 = $res2->fetch(PDO::FETCH_ASSOC);
  $record["pic"] = $row2["img"];

  $products[] = $record;
}

echo JSon_encode($products)


?>