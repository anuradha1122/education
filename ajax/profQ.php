<?php 
$path = $_SERVER['DOCUMENT_ROOT'];
   $path .= "/education/database.php";
   include_once($path);
ob_start();
$database = new Database();
?>

<!DOCTYPE html>
<html>
<head>
<style>

</style>
</head>
<body>
<?php 

$q = $_GET['q'];


$sql="SELECT * FROM teacher WHERE nic = '$q'";
$result = mysqli_query($database ->connection,$sql);


while($row = mysqli_fetch_array($result)) {

    $pq_id = $row['prof_quali'];
    $sql1="SELECT * FROM prof_qualification WHERE pq_id = '$pq_id'";
	$result1 = mysqli_query($database ->connection,$sql1);


	while($row1 = mysqli_fetch_array($result1)) {

	    echo $row1['name'];
	}
}
mysqli_close($database ->connection);
?>
</body>
</html>