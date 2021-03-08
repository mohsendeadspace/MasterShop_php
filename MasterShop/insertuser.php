<?php	
	include "connect.php";
	$email = $_POST["email"];
	$pass = $_POST["pass"];
	
	$sql = "SELECT * FROM tbl_user WHERE email=:email";
	$res2 = $connect->prepare($sql);
	$res2->bindParam(":email",$email);
	$res2->execute();
	
	$row=$res2->fetch(PDO::FETCH_ASSOC);
	
	if($row){
		echo "exist";
	}
	else
	{
		$query = "INSERT INTO tbl_user (email,password)VALUES (:email,:pass)";
		$res =$connect->prepare($query);
		$res->bindParam(":email",$email);
		$res->bindParam(":pass",$pass);
		$ok = $res->execute();

		if ($ok)
	  {
		echo $email;
	  }else
	  {
		echo "not ok";
	  }
	}

	

?>

