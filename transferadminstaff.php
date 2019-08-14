<?php
#page number 27

include("database.php");

$database = new Database();

$database -> empty_session();
$database -> logout();
$database -> logout_form();
$database -> restricted_page('27');

$number_err ="";

?>

<form action="" method="post">

    <label for="email"><b>Admin Staff Member or Education Office Number</b></label>
    <input type="text" placeholder="Enter Number" name="number" >

    <input type="submit" name="submit" value="Submit">
    <input type="submit" name="cancel" value="Refresh">
    <input type="submit" name="back" value="Back">
</form>
<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){

   if(isset($_POST['submit'])){

	  $number  = $database -> post_to_variabal($_POST['number']);
	  $admin_staff = $database -> table_by_id($number, 'admin_staff', 'emp_no');
	  if($admin_staff <> NULL){

	  	$database -> display_message($admin_staff['emp_no']);
	  	$database -> display_message(" ");
	  	$database -> display_message($admin_staff['first_name']);
	  	$database -> display_message(" ");
	  	$database -> display_message($admin_staff['last_name']);
	  	$database -> display_message(" ");

	  	$appointment = $database -> current_admin_search($admin_staff['ad_id']);
	  	$office 	 = $database -> table_by_id($appointment['office_no'], 'education_office', 'office_no');

	  	$database -> display_message($office['name']);
	  	$database -> display_message(" ");
	  	$database -> display_message($appointment['appoint_date']);
	  	$database -> display_message(" ");
	  	
	  	$appoint_date = date_create($appointment['appoint_date']);
		$current_date = date_create(date("Y-m-d"));
		$period 	  = date_diff($appoint_date,$current_date);
		$database -> display_message($period->format("%Y-%m-%d"));

		$database -> display_message(" ");
		?><a href="transferadminstaffprocess.php?emp_no=<?php $database -> display_message($admin_staff['emp_no']); ?>"><?php
		$database -> display_message("Trasfer");
		?></a><?php

	  }else{

	  	$office_admin_staff = $database -> office_appointed_adminstaff($number);
	  	if(mysqli_num_rows($office_admin_staff) > 0){

	  		while($admin_staff_detail = mysqli_fetch_assoc($office_admin_staff)){

	  		$admin_staff = $database -> table_by_id($admin_staff_detail['ad_id'], 'admin_staff', 'ad_id');
	  		$database -> display_message($admin_staff['emp_no']);
		  	$database -> display_message(" ");
		  	$database -> display_message($admin_staff['first_name']);
		  	$database -> display_message(" ");
		  	$database -> display_message($admin_staff['last_name']);
		  	$database -> display_message(" ");

		  	$appointment = $database -> current_admin_search($admin_staff['ad_id']);
		  	$office 	 = $database -> table_by_id($appointment['ad_id'], 'education_office', 'office_no');

		  	$database -> display_message($office['name']);
		  	$database -> display_message(" ");
		  	$database -> display_message($admin_staff_detail['appoint_date']);
		  	$database -> display_message(" ");

		  	$appoint_date = date_create($appointment['appoint_date']);
			$current_date = date_create(date("Y-m-d"));
			$period 	  = date_diff($appoint_date,$current_date);
			$database -> display_message($period->format("%Y-%m-%d"));

			$database -> display_message(" ");

			?><a href="transferadminstaffprocess.php?emp_no=<?php $database -> display_message($admin_staff['emp_no']); ?>"><?php
			$database -> display_message("Trasfer");
			?></a><?php

	  		$database -> display_message("<br>");

	  		} 
	  	} 	

	  }
   }

   if(isset($_POST['cancel'])){

     	$database -> headerto('transferadminstaff.php');

   }
   if(isset($_POST['back'])){

    	$database -> headerto('home.php');
   }
}
?>