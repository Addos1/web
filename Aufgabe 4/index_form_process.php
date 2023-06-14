<?php
if($_SERVER['REQUEST_METHOD'] == 'POST') {
  $server = "localhost";
  $user = "root";
  $pass = "";

  $name = $_POST['name'];
  $fname = $_POST['fname'];
  $Email = $_POST['Email'];
  
  $verbindung = mysqli_connect($server, $user, $pass) or die("Keine Verbindung!");

  mysqli_select_db($verbindung, "users");
  $sql = "SELECT * FROM tuser";
  $query = mysqli_query($verbindung, $sql) or die("Query hat nicht funktioniert!");

  $anzahl = mysqli_num_rows($query);
  echo "In der tabelle sind $anzahl User gespiehert:<br>";

  $sql2 = "INSERT INTO `tuser`(`name`, `fname`, `Email`) VALUES ('".$name."','".$fname."','".$Email."')";

  $insert = mysqli_query($verbindung, $sql2) or die("Query hat nicht funktioniert!");
  
  echo $name."<br />".$fname."<br />".$Email."<br />"; 
  mysqli_close($verbindung);
}
?>

