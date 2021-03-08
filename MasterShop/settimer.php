<?php
  include "connect.php";

  $sec = $_POST["showS"];
  $min = $_POST["showM"];
  $hour = $_POST["showH"];



  $sql = "INSERT INTO timer (hour,min,sec)VALUES (:hour,:min,:sec)";
  $res = $connect->prepare($sql);
  $res->bindParam(":hour",$hour);
  $res->bindParam(":min",$min);
  $res->bindParam(":sec",$sec);
  $res->execute();

  $query = "SELECT * FROM timer";
  $res2 = $connect->prepare($query);
  $res2->execute();

  $i = 1;
  $count = 0;

  while ($row = $res2->fetch(PDO::FETCH_ASSOC)){
    $count=$i++;
  }
  echo $count;

  if ($count > 5){
    $query = "DELETE FROM timer LIMIT 1";
    $ress = $connect->prepare($query);
    $ress->execute();
  }

?>