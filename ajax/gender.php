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

    if($row['gender']==1) {
    	echo "Male";
    }elseif($row['gender']==2) {
    	echo "Female";
    }
}
mysqli_close($database ->connection);
?>
</body>
</html>