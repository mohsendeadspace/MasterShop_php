<?php
  include "connect.php";
  $query = "SELECT * FROM timer ORDER BY id DESC";
  $res = $connect->prepare($query);
  $res->execute();

  $row = $res->fetch(PDO::FETCH_ASSOC);
  echo $row["hour"].":".$row["min"].":".$row["sec"];


?>