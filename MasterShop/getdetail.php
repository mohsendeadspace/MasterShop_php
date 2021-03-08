<?php

include "connect.php";

$id = $_POST["id2"];
$query = "SELECT * FROM tbl_gallery WHERE idproduct =:id";
$res = $connect->prepare($query);
$res->bindParam(":id",$id);
$res->execute();
$pics = array();
while ($row=$res->fetch(PDO::FETCH_ASSOC)){

  $record = array();
  $record["pic"] = $row["img"];

  $pics[]=$record;

}

echo JSon_encode($pics);

?>