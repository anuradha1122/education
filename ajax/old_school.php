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

</head>
<body>
<table class="table table-hover">
	<tr>
		<th>
			Ref_no
		</th>
		<th>
			School Name
		</th>
		<th>
			Attached School
		</th>
		<th>
			Appointment Catagory
		</th>
		<th>
			Appoint Date
		</th>
		<th>
			Teaching Subject 01
		</th>
		<th>
			Teaching Subject 02
		</th>
		<th>
			Teaching Subject 03
		</th>

	</tr>
<?php 

$q = $_GET['q'];


$sql="SELECT * FROM teacher WHERE nic = '$q'";
$result = mysqli_query($database ->connection,$sql);
while($row = mysqli_fetch_array($result)) {

    $tc_id = $row['tc_id'];
    $sql1="SELECT * FROM teacher_appointment WHERE tc_id = '$tc_id' ORDER BY appoint_date";
	$result1 = mysqli_query($database ->connection,$sql1);
	while($row1 = mysqli_fetch_array($result1)) {
		?><tr>
		<td><?php echo $row1['ta_id']; ?></td>

	    <?php $school = $row1['school_no']; ?>
	    <?php
	    $sql2="SELECT * FROM school WHERE school_no = '$school'";
		$result2 = mysqli_query($database ->connection,$sql2);
		while($row2 = mysqli_fetch_array($result2)) {
			?>
			<td><?php echo $row2['name']; ?></td>
			<?php
		}
		?>

		<?php $school2 = $row1['school2']; ?>
	    <?php
	    $sql2="SELECT * FROM school WHERE school_no = '$school2'";
		$result2 = mysqli_query($database ->connection,$sql2);
		while($row2 = mysqli_fetch_array($result2)) {
			?>
			<td><?php if($row2['name']=='empty'){echo "";}else{echo $row2['name'];}  ?></td>
			<?php
		}
		?>

	    <?php $catagory = $row1['catagory']; ?>
	    <?php
	    $sql3="SELECT * FROM appointment_state WHERE ap_id = '$catagory'";
		$result3 = mysqli_query($database ->connection,$sql3);
		while($row3 = mysqli_fetch_array($result3)) {
			?>
			<td><?php echo $row3['name']; ?></td>
			<?php
		}
		?>
	    <td><?php echo $row1['appoint_date']; ?></td>
	    
	    <?php $sub1 = $row1['teach_sub1']; ?>
	    <?php
	    $sql2="SELECT * FROM subject WHERE su_id = '$sub1'";
		$result2 = mysqli_query($database ->connection,$sql2);
		while($row2 = mysqli_fetch_array($result2)) {
			?>
			<td><?php if($sub1=='0'){echo "";}else{echo $row2['name'];}  ?></td>
			<?php
		}
		?>

		<?php $sub2 = $row1['teach_sub2']; ?>
	    <?php
	    $sql2="SELECT * FROM subject WHERE su_id = '$sub2'";
		$result2 = mysqli_query($database ->connection,$sql2);
		while($row2 = mysqli_fetch_array($result2)) {
			?>
			<td><?php if($sub2=='0'){echo "";}else{echo $row2['name'];}  ?></td>
			<?php
		}
		?>

		<?php $sub3 = $row1['teach_sub3']; ?>
	    <?php
	    $sql2="SELECT * FROM subject WHERE su_id = '$sub3'";
		$result2 = mysqli_query($database ->connection,$sql2);
		while($row2 = mysqli_fetch_array($result2)) {
			?>
			<td><?php if($sub3=='0'){echo "";}else{echo $row2['name'];}  ?></td>
			<?php
		}
		?>

		</tr><?php
	}
}
mysqli_close($database ->connection);
?>
</table>
</body>
</html>