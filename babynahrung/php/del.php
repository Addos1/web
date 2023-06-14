<?php

$serv = "localhost";

    $conn = mysqli_connect($serv,"root","")
    or die("Error in DB");
	
    mysqli_select_db($conn, "db_baby");
	
	
$data = $conn->query("select * from bezahlung");

	while ($res = mysqli_fetch_array($data)){
		$id=$res["fk_prod"];
		if(isset($_POST['posteraser'])){
		   
		   $sql = query("DELETE FROM bezahlung WHERE fk_prod = '$id' ");       
		   redirect ('cart.php');
		}
	}
?>