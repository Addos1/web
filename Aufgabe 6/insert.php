<?php



header('Content-Type: application/json');


try {

$dbName = "C:\\inetpub\\wwwroot\\fpdb\\staffing.mdb";
 $db = new PDO("odbc:DRIVER={Microsoft Access Driver (*.mdb)};charset=UTF-8; DBQ=$dbName; Uid=; Pwd=;");

}
catch (PDOException $e) {
  echo $e->getMessage();
}
$Employee_Name=  trim($_POST["Employee_Name"]);  
$Employee_Lastname=  trim($_POST["Employee_Name"]);      
        $params = array( ':FIRSTNAME' => $Employee_Name, ':LASTNAME'=>$Employee_Lastname );

$query = $db->prepare("
    SELECT * FROM tbl_USERS
    WHERE FIRSTNAME=:FIRSTNAME and LASTNAME=:LASTNAME");

$query->execute($params);

$result = $query->fetch(PDO::FETCH_ASSOC);
$EMPLOYEE_NUMBER=trim('EMPLOYEE_NUMBER');
$rc= $result[$EMPLOYEE_NUMBER];

echo json_encode ($rc);

?>