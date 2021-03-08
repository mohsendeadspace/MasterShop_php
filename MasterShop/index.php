<?php

  include "connect.php";
  $email = $_POST["email"];
  $pass = $_POST["pass"];


  $query = "SELECT * FROM tbl_user WHERE email=:email AND password=:pass";
  $result =$connect->prepare($query);

  $result->bindParam(":email",$email);
  $result->bindParam(":pass",$pass);

  $result->execute();
  $row = $result->fetch(PDO::FETCH_ASSOC);
  if($row == false) {
    echo "Not exsist";
  }else {
    echo $row["email"];
  }

?>