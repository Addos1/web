<?php
// Array with names
$a[0] = "Anna ";
$a[1] = "ABrittany";
$a[2] = "Cinderella ";
$a[3] = "Diana";
$a[4] = "Eva";
$a[5] = "Fiona";
$a[6] = "Gunda";
$a[7] = "Hege";
$a[8] = "Inga";
$a[9] = "Johanna";
$a[10] = "Kitty";
$a[11] = "Linda";
$a[12] = "Nina";
$a[13] = "Ophelia";


$b[0] = "Raquel";
$b[2] = "Cindy";
$b[3] = "Doris";
$b[4] = "Eve";
$b[5] = "Evita";
$b[6] = "Sunniva";
$b[7] = "Tove";
$b[8] = "Qwar";
$b[9] = "Johan";
$b[10] = "Miller";
$b[11] = "Rock";
$b[12] = "Klar";
$b[13] = "Dimeri";


// get the q parameter from URL
$q = $_REQUEST["q"];

$hint = "";

// lookup all hints from array if $q is different from ""
if ($q !== "") {
  $q = strtolower($q);
  $len=strlen($q);
  for($i = 0; $i < 12; $i++) {

    if (stristr($q, substr($a[$i], 0, $len))) {
      if ($hint === "") {
        $hint = $a[$i];
      } else {
        $hint .= ", $a[$i] $b[$i]";
      
    }
  }
  
  if (stristr($q, substr($b[$i], 0, $len))) {
      if ($hint === "a[$i]") {
        $hint = $b[$i];
      } else {
        $hint .= ", $b[$i] $a[$i]";
      
  
  
  }
  }
}

  
}

// Output "no suggestion" if no hint was found or output correct values
echo $hint === "" ? "no suggestion" : $hint;
?>