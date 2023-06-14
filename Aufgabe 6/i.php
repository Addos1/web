<head>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/view.css">
<script src="<?php echo base_url();?>js/view.js"></script>
<script src="<?php echo base_url();?>js/jquery-1.11.1.min.js"></script>
<script>


$(document).ready(function(){
      $("#Employee_Name").change(function(){
          var Employee_Name=$(this).val();
           if(Employee_Name != ''){
                  $.ajax({
                              type:"post",
                              url:"insert.php",
                              data:"Employee_Name="+Employee_Name,
                              datatype:"json",
                              success:function(data){ $("#Employee_Number").val(data);
                               $('#Employee_Number').css( "background-color","#B3CBD6"  ) 
                               $('#Employee_Number').animate({backgroundColor: "#ffffff"});
                               },
                                 error: function(response){
    alert("error scripting")    }

                                                           });
           }
           else{
               $("#Employee_Number").val("");
               }

          });
     });



</script>   

<link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet">

</head>
<?php $msg = $this->session->flashdata('msg'); if((isset($msg)) && (!empty($msg))) { ?>
                <div class="alert alert-success" >

                  <a href="#" class="close" data-dismiss="alert">&times;</a>
                <?php print_r($msg); ?>
                </div>
                <?php } ?>
                <?php $msg = $this->session->flashdata('msg1'); if((isset($msg)) && (!empty($msg))) { ?>
                <div class="alert alert-error" >

                  <a href="#" class="close" data-dismiss="alert">&times;</a>
                <?php print_r($msg); ?>
                </div>
                <?php } ?>
				
				<?php

try {

$dbName = "C:\\inetpub\\wwwroot\\fpdb\\staffing.mdb";
 $db = new PDO("odbc:DRIVER={Microsoft Access Driver (*.mdb)};charset=UTF-8; DBQ=$dbName; Uid=; Pwd=;");

}
catch (PDOException $e) {
  echo $e->getMessage();
}
$sql="SELECT FIRSTNAME, LASTNAME, EMPLOYEE_NUMBER  FROM tbl_USERS WHERE STATUS='A' order by FIRSTNAME";

/* You can add order by clause to the sql statement if the names are to be displayed in alphabetical order */

echo "<select id='Employee_Name' name=Employee_Name value=''>Employee_Name</option>"; // list box select command
foreach ($db->query($sql) as $row){//Array or records stored in $row
echo "<option value=$row[FIRSTNAME] $row[LASTNAME]>$row[FIRSTNAME]  $row[LASTNAME]</option>"; 

/* Option values are added by looping through the array */ 
}
echo "</select>";// Closing of list box


?>



<body id="main_body" >


    <div id="form_container">


<form class="" action="<?php echo base_url();?>employee/insert_employee" method="post">

        <div class="form_description">
            <h2>Enter Data</h2>

        </div>                      
            <ul >

                    <li id="li_1" >
        <label class="description" for="element_1">Date Scheduled</label>
        <div>
            <input id="element_1" name="Date_Scheduled" class="element text medium" type="text" maxlength="255" value="" required/> 
        </div> 
        </li>       <li id="li_2" >
        <label class="description" for="element_2">Employee_Name </label>
        <div>
            <input id="Employee_Name" name="Employee_Name" class="element text medium" type="text" maxlength="255" value="" required/> 
        </div> 


        </li>       <li id="li_3" >
        <label class="description" for="element_3">Employee Number </label>
        <div>
            <input id="Employee_Number" name="Employee_Number" class="element text medium" type="text" maxlength="255" value="" required/> 
       