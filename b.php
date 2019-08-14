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

$teacher_query = $database-> table_search_by_element('0','teacher','active');
	if(mysqli_num_rows($teacher_query) > 0){
	  	while($teacher = mysqli_fetch_assoc($teacher_query)){
	  		$i++;
	  		echo $i."--".$teacher['nic']."<br>";
	  	}
	}

?>