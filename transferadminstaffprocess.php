<?php
#page number 28

include("database.php");

$database = new Database();

$database -> empty_session();
$database -> logout();
$database -> logout_form();
$database -> restricted_page('28');


$emp_no  = $_GET["emp_no"];
$admin_staff = $database -> table_by_id($emp_no, 'admin_staff', 'emp_no');

$database -> display_message("Full Name : ");
$database -> display_message($database -> gender_title($admin_staff));
$database -> display_message(" ");
$database -> display_message($admin_staff['sir_name']);
$database -> display_message(" ");
$database -> display_message($admin_staff['first_name']);
$database -> display_message(" ");
$database -> display_message($admin_staff['middle_name']);
$database -> display_message(" ");
$database -> display_message($admin_staff['last_name']);
$database -> display_message("<br>");

$database -> display_message("Address : ");

$database -> display_message($admin_staff['add_li1']);
$database -> display_message(" ");
$database -> display_message($admin_staff['add_li2']);
$database -> display_message(" ");
$database -> display_message($admin_staff['add_li3']);
$database -> display_message("<br>");

$database -> display_message("Birth Day : ");

$database -> display_message($admin_staff['birth_day']);
$database -> display_message("<br>");

$database -> display_message("Residential Division : ");
$division = $database -> table_by_id($admin_staff['division'], 'education_office', 'eo_id');
$database -> display_message($division['name']);
$database -> display_message("<br>");

$database -> display_message("Race : ");
$race = $database -> table_by_id($admin_staff['race'], 'race', 'ra_id');
$database -> display_message($race['name']);
$database -> display_message("<br>");

$database -> display_message("Religion : ");
$religion = $database -> table_by_id($admin_staff['religion'], 'religion', 'rg_id');
$database -> display_message($religion['name']);
$database -> display_message("<br>");

$database -> display_message("Civil Status : ");
$civil_status = $database -> table_by_id($admin_staff['civil_status'], 'civil_status', 'cs_id');
$database -> display_message($civil_status['name']);
$database -> display_message("<br>");

$database -> display_message("First Appointment Date : ");
$database -> display_message($admin_staff['appoint_date']);
$database -> display_message("<br>");

$database -> display_message("NIC : ");
$database -> display_message($admin_staff['nic']);
$database -> display_message("<br>");

$database -> display_message("Telephone No : ");
$database -> display_message($admin_staff['tel_no']);
$database -> display_message("<br>");

$database -> display_message("Medium : ");
$medium = $database -> table_by_id($admin_staff['medium'], 'medium', 'md_id');
$database -> display_message($medium['name']);
$database -> display_message("<br>");

$database -> display_message("Education Qualification : ");
$edu_quali = $database -> table_by_id($admin_staff['edu_quali'], 'education_qualification', 'eq_id');
$database -> display_message($edu_quali['name']);
$database -> display_message("<br>");

$database -> display_message("Proffesional Qualification : ");
$prof_quali = $database -> table_by_id($admin_staff['prof_quali'], 'prof_qualification', 'pq_id');
$database -> display_message($prof_quali['name']);
$database -> display_message("<br>");

$database -> display_message("Position : ");
$position = $database -> table_by_id($admin_staff['position'], 'position', 'ps_id');
$database -> display_message($position['name']);
$database -> display_message("<br>");

$database -> display_message("Rank : ");
$rank = $database -> table_by_id($admin_staff['rank'], 'rank', 'rk_id');
$database -> display_message($rank['name']);
$database -> display_message("<br>");

$database -> display_message("Current office : ");
$current_appointment = $database -> current_admin_search($admin_staff['ad_id']);
$office = $database -> table_by_id($current_appointment['office_no'], 'education_office', 'office_no');
$database -> display_message($office['name']);
$database -> display_message(" From ");
$database -> display_message($current_appointment['appoint_date']);
$database -> display_message(" To ");
$database -> display_message("present");
$database -> display_message("<br>");
$database -> display_message("Time Period: ");
$appoint_date = date_create($current_appointment['appoint_date']);
$current_date = date_create(date("Y-m-d"));
$period 	  = date_diff($appoint_date,$current_date);
$database -> display_message($period->format("%Y-%m-%d"));
$database -> display_message("<br>");
$database -> display_message("Previous office : ");
$database -> display_message("<br>");
$old_appointment = $database -> old_admin_search($admin_staff['ad_id']);
while($old_office = mysqli_fetch_assoc($old_appointment)){

	$office = $database -> table_by_id($old_office['office_no'], 'office', 'office_no');
	$database -> display_message($office['name']);
	$database -> display_message(" From ");
	$database -> display_message($old_office['appoint_date']);
	$database -> display_message(" To ");
	$database -> display_message($old_office['release_date']);
	$database -> display_message("<br>");
	$database -> display_message("Time Period: ");
	$appoint_date = date_create($old_office['appoint_date']);
	$current_date = date_create($old_office['release_date']);
	$period 	  = date_diff($appoint_date,$current_date);
	$database -> display_message($period->format("%Y-%m-%d"));
	$database -> display_message("<br>");
}


if($_SERVER["REQUEST_METHOD"] == "POST"){

   if(isset($_POST['submit'])){

   		$admin_staff['ad_id'];
   		$office = $database -> post_to_variabal($_POST['office']);
   		$database -> release_staff('admin_staff_appointment','release_office',$office,$admin_staff['ad_id'],'ad_id');
   		$database -> headerto('transferadminstaff.php');
   }

   if(isset($_POST['cancel'])){

   		$database -> headerto('transferadminstaff.php');
   }
}

?>

<form action="" method="post">

    <label for="email"><b>Transfer office No </b></label>
    <input type="text" placeholder="office No" name="office" >

    <input type="submit" name="submit" value="Submit">
    <input type="submit" name="cancel" value="Refresh">
    <input type="submit" name="back" value="Back">
</form>

