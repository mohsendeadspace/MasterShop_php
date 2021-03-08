<?php
include "connect.php";
$id = $_POST["id2"];
$query = "SELECT * FROM tbl_product WHERE id=:id";
$res = $connect->prepare($query);
$res->bindParam(":id",$id);
$res->execute();
$pics = array();
while ($row=$res->fetch(PDO::FETCH_ASSOC)){

  $record = array();
  $record["title"] = $row["title"];
  $record["intro"] = $row["introduction"];
  $record["price"] = $row["price"];


  $record["color"] = $row["colors"];
  $record["gaurantee"] = $row["garantee"];

  $sql = "SELECT * FROM tbl_color WHERE id=:id";
  $res2 = $connect->prepare($sql);
  $res2->bindParam(":id",$record["color"]);
  $res2->execute();
  $row2 = $res2->fetch(PDO::FETCH_ASSOC);
  $record["color"] = $row2["title"];



  $sql2 = "SELECT * FROM tbl_garantee WHERE id=:id";
  $res3 = $connect->prepare($sql2);
  $res3->bindParam(":id",$record["gaurantee"]);
  $res3->execute();
  $row3 = $res3->fetch(PDO::FETCH_ASSOC);
  $record["gaurantee"] = $row3["title"];



  $pics[]=$record;


}

echo JSon_encode($pics);
?>