<?php
#page number 01



#declair database
include("database.php");
ob_start();
$database = new Database();


  $school_query = $database ->table_search('school'); 
  while($school = mysqli_fetch_array($school_query)) {
    $sc_id = $school['sc_id'];
    
    if($school['edu_division']=="Ella"){
      $sql = "UPDATE school SET  edu_division = '261' WHERE sc_id = '$sc_id'";
      $table_update = $database -> query($sql);
    }
    
  }
  



?>