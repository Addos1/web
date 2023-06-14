<?php
if($_SERVER['REQUEST_METHOD'] == 'POST') {
  $server = "localhost";
  $user = "root";
  $pass = "";

  $name = $_POST['name'];
  $vorname = $_POST['vorname'];
  $adresse = $_POST['adresse'];
  $zipcode = $_POST['zipcode'];
  $phone = $_POST['phone'];
  
  if($name==''||$vorname==''||$adresse==''||$zipcode==''||$phone=='')
	  {
		  header ('Location: ../checkout.php');
	  }
  
  if(isset($_POST['anme']))
  {
	  if($name==''||$vorname==''||$adresse==''||$zipcode==''||$phone=='')
	  {
		  header ('Location: ../checkout.php');
	  }
	  elseif(strpos('0',$name)!==false||strpos('1',$name)!==false||strpos('2',$name)!==false||strpos('3',$name)!==false||strpos('4',$name)!==false||strpos('5',$name)!==false||strpos('6',$name)!==false||strpos('7',$name)!==false||strpos('8',$name)!==false||strpos('9',$name)!==false||strpos('0',$vorname)!==false||strpos('1',$vorname)!==false||strpos('2',$vorname)!==false||strpos('3',$vorname)!==false||strpos('4',$vorname)!==false||strpos('5',$vorname)!==false||strpos('6',$vorname)!==false||strpos('7',$vorname)!==false||strpos('8',$vorname)!==false||strpos('9',$vorname)!==false||strpos('a',$zipcode)!==false||strpos('b',$zipcode)!==false||strpos('c',$zipcode)!==false||strpos('d',$zipcode)!==false||strpos('e',$zipcode)!==false||strpos('f',$zipcode)!==false||strpos('g',$zipcode)!==false||strpos('h',$zipcode)!==false||strpos('i',$zipcode)!==false||strpos('j',$zipcode)!==false||strpos('k',$zipcode)!==false||strpos('l',$zipcode)!==false||strpos('m',$zipcode)!==false||strpos('n',$zipcode)!==false||strpos('o',$zipcode)!==false||strpos('p',$zipcode)!==false||strpos('q',$zipcode)!==false||strpos('r',$zipcode)!==false||strpos('s',$zipcode)!==false||strpos('t',$zipcode)!==false||strpos('u',$zipcode)!==false||strpos('v',$zipcode)!==false||strpos('w',$zipcode)!==false||strpos('x',$zipcode)!==false||strpos('y',$zipcode)!==false||strpos('z',$zipcode)!==false||strpos('a',$phone)!==false||strpos('b',$phone)!==false||strpos('c',$phone)!==false||strpos('d',$phone)!==false||strpos('e',$phone)!==false||strpos('f',$phone)!==false||strpos('g',$phone)!==false||strpos('h',$phone)!==false||strpos('i',$phone)!==false||strpos('j',$phone)!==false||strpos('k',$phone)!==false||strpos('l',$phone)!==false||strpos('m',$phone)!==false||strpos('n',$phone)!==false||strpos('o',$phone)!==false||strpos('p',$phone)!==false||strpos('q',$phone)!==false||strpos('r',$phone)!==false||strpos('s',$phone)!==false||strpos('t',$phone)!==false||strpos('u',$phone)!==false||strpos('v',$phone)!==false||strpos('w',$phone)!==false||strpos('x',$phone)!==false||strpos('y',$phone)!==false||strpos('z',$phone)!==false)
	  {
		  header ('Location: ../checkout.php');
	  }else
	  {
	  
		  $verbindung = mysqli_connect($server, $user, $pass) or die("Keine Verbindung!");

		  mysqli_select_db($verbindung, "db_baby");
		  
		  $verbindung->query("UPDATE client set c_act=0 where c_act=1");
		  
		  $sql = "SELECT * FROM client";
		  $query = mysqli_query($verbindung, $sql) or die("Query hat nicht funktioniert!");

		  $sql2 = "INSERT INTO `client`(`C_name`, `C_vorname`, `C_adresse`, `C_zipcode`, `C_phone`, `c_act` ) VALUES ('".$name."','".$vorname."','".$adresse."','".$zipcode."','".$phone."',1)";

		  $insert = mysqli_query($verbindung, $sql2) or die("Query hat nicht funktioniert!");


		  mysqli_close($verbindung);
		  
		  header ('Location: ../checkout.php');
	  }
  }
  elseif(isset($_POST['entr']))
  {
	  if($name==''||$vorname==''||$adresse==''||$zipcode==''||$phone=='')
	  {
		  header ('Location: ../checkout.php');
	  }
	  elseif(strpos('0',$name)!==false||strpos('1',$name)!==false||strpos('2',$name)!==false||strpos('3',$name)!==false||strpos('4',$name)!==false||strpos('5',$name)!==false||strpos('6',$name)!==false||strpos('7',$name)!==false||strpos('8',$name)!==false||strpos('9',$name)!==false||strpos('0',$vorname)!==false||strpos('1',$vorname)!==false||strpos('2',$vorname)!==false||strpos('3',$vorname)!==false||strpos('4',$vorname)!==false||strpos('5',$vorname)!==false||strpos('6',$vorname)!==false||strpos('7',$vorname)!==false||strpos('8',$vorname)!==false||strpos('9',$vorname)!==false||strpos('a',$zipcode)!==false||strpos('b',$zipcode)!==false||strpos('c',$zipcode)!==false||strpos('d',$zipcode)!==false||strpos('e',$zipcode)!==false||strpos('f',$zipcode)!==false||strpos('g',$zipcode)!==false||strpos('h',$zipcode)!==false||strpos('i',$zipcode)!==false||strpos('j',$zipcode)!==false||strpos('k',$zipcode)!==false||strpos('l',$zipcode)!==false||strpos('m',$zipcode)!==false||strpos('n',$zipcode)!==false||strpos('o',$zipcode)!==false||strpos('p',$zipcode)!==false||strpos('q',$zipcode)!==false||strpos('r',$zipcode)!==false||strpos('s',$zipcode)!==false||strpos('t',$zipcode)!==false||strpos('u',$zipcode)!==false||strpos('v',$zipcode)!==false||strpos('w',$zipcode)!==false||strpos('x',$zipcode)!==false||strpos('y',$zipcode)!==false||strpos('z',$zipcode)!==false||strpos('a',$phone)!==false||strpos('b',$phone)!==false||strpos('c',$phone)!==false||strpos('d',$phone)!==false||strpos('e',$phone)!==false||strpos('f',$phone)!==false||strpos('g',$phone)!==false||strpos('h',$phone)!==false||strpos('i',$phone)!==false||strpos('j',$phone)!==false||strpos('k',$phone)!==false||strpos('l',$phone)!==false||strpos('m',$phone)!==false||strpos('n',$phone)!==false||strpos('o',$phone)!==false||strpos('p',$phone)!==false||strpos('q',$phone)!==false||strpos('r',$phone)!==false||strpos('s',$phone)!==false||strpos('t',$phone)!==false||strpos('u',$phone)!==false||strpos('v',$phone)!==false||strpos('w',$phone)!==false||strpos('x',$phone)!==false||strpos('y',$phone)!==false||strpos('z',$phone)!==false)
	  {
		  header ('Location: ../checkout.php');
	  }else
	  {
	  
		  $verbindung = mysqli_connect($server, $user, $pass) or die("Keine Verbindung!");

		  mysqli_select_db($verbindung, "db_baby");
		  
		  $verbindung->query("UPDATE client set c_act=0 where c_act=1");

		  $sql2 = "UPDATE client set c_act=1 WHERE C_name='".$name."' AND C_vorname='".$vorname."' AND C_adresse='".$adresse."' AND C_zipcode=".$zipcode." AND C_phone=".$phone;
		echo $sql2;
		  $verbindung->query($sql2);

		  mysqli_close($verbindung);
		  
		  header ('Location: ../checkout.php');
	  }
  }
  elseif(isset($_POST['abme']))
  {
	$verbindung = mysqli_connect($server, $user, $pass) or die("Keine Verbindung!");

	mysqli_select_db($verbindung, "db_baby");
		  
	$verbindung->query("UPDATE client set c_act=0 where c_act=1");
	header ('Location: ../checkout.php');
  }
}
?>