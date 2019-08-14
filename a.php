<?php include("database.php"); 
ob_start();
$database = new Database();
?>
<!DOCTYPE html>
<html>
<head>
	<title>test</title>
</head>
<body>
<?php 
	
	$i=0;
	

	$sqll = "SELECT tc_id, MIN(appoint_date) AS ap_date FROM teacher_appointment WHERE tc_id <'10000' GROUP BY tc_id;";
	$sql_query = $database -> query($sqll);
	if(mysqli_num_rows($sql_query) > 0){
		while($sql = mysqli_fetch_assoc($sql_query)){
			$i++;
			echo $sql['ap_date']."--".$sql['tc_id']."<br>";
			
			
		}
	}
	
	echo $i;
?>
</body>
</html>