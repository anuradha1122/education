<?php
#page number 26

include("database.php");

$database = new Database();

$database -> empty_session();
$database -> logout();
$database -> logout_form();
$database -> restricted_page('26');

$day_err = "";
$emp_no  = $_GET["emp_no"];
$principal = $database -> table_by_id($emp_no, 'principal', 'emp_no');

$database -> display_message("Full Name : ");
$database -> display_message($database -> gender_title($principal));
$database -> display_message(" ");
$database -> display_message($principal['sir_name']);
$database -> display_message(" ");
$database -> display_message($principal['first_name']);
$database -> display_message(" ");
$database -> display_message($principal['middle_name']);
$database -> display_message(" ");
$database -> display_message($principal['last_name']);
$database -> display_message("<br>");

$database -> display_message("Address : ");

$database -> display_message($principal['add_li1']);
$database -> display_message(" ");
$database -> display_message($principal['add_li2']);
$database -> display_message(" ");
$database -> display_message($principal['add_li3']);
$database -> display_message("<br>");

$database -> display_message("Birth Day : ");

$database -> display_message($principal['birth_day']);
$database -> display_message("<br>");

$database -> display_message("Residential Division : ");
$division = $database -> table_by_id($principal['division'], 'education_office', 'eo_id');
$database -> display_message($division['name']);
$database -> display_message("<br>");

$database -> display_message("Race : ");
$race = $database -> table_by_id($principal['race'], 'race', 'ra_id');
$database -> display_message($race['name']);
$database -> display_message("<br>");

$database -> display_message("Religion : ");
$religion = $database -> table_by_id($principal['religion'], 'religion', 'rg_id');
$database -> display_message($religion['name']);
$database -> display_message("<br>");

$database -> display_message("Civil Status : ");
$civil_status = $database -> table_by_id($principal['civil_status'], 'civil_status', 'cs_id');
$database -> display_message($civil_status['name']);
$database -> display_message("<br>");

$database -> display_message("First Appointment Date : ");
$database -> display_message($principal['appoint_date']);
$database -> display_message("<br>");

$database -> display_message("Appointment State : ");
$appoint_state = $database -> table_by_id($principal['appoint_state'], 'appointment_state', 'ap_id');
$database -> display_message($appoint_state['name']);
$database -> display_message("<br>");

$database -> display_message("NIC : ");
$database -> display_message($principal['nic']);
$database -> display_message("<br>");

$database -> display_message("Telephone No : ");
$database -> display_message($principal['tel_no']);
$database -> display_message("<br>");

$database -> display_message("Medium : ");
$medium = $database -> table_by_id($principal['medium'], 'medium', 'md_id');
$database -> display_message($medium['name']);
$database -> display_message("<br>");

$database -> display_message("Education Qualification : ");
$edu_quali = $database -> table_by_id($principal['edu_quali'], 'education_qualification', 'eq_id');
$database -> display_message($edu_quali['name']);
$database -> display_message("<br>");

$database -> display_message("Proffesional Qualification : ");
$prof_quali = $database -> table_by_id($principal['prof_quali'], 'prof_qualification', 'pq_id');
$database -> display_message($prof_quali['name']);
$database -> display_message("<br>");

$database -> display_message("Position : ");
$position = $database -> table_by_id($principal['position'], 'position', 'ps_id');
$database -> display_message($position['name']);
$database -> display_message("<br>");

$database -> display_message("Rank : ");
$rank = $database -> table_by_id($principal['rank'], 'rank', 'rk_id');
$database -> display_message($rank['name']);
$database -> display_message("<br>");

$database -> display_message("Current School : ");
$current_appointment = $database -> current_principal_search($principal['pr_id']);
$school = $database -> table_by_id($current_appointment['school_no'], 'school', 'school_no');
$database -> display_message($school['name']);
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
$database -> display_message("Previous School : ");
$database -> display_message("<br>");
$old_appointment = $database -> old_principal_search($principal['pr_id']);
while($old_school = mysqli_fetch_assoc($old_appointment)){

	$school = $database -> table_by_id($old_school['school_no'], 'school', 'school_no');
	$database -> display_message($school['name']);
	$database -> display_message(" From ");
	$database -> display_message($old_school['appoint_date']);
	$database -> display_message(" To ");
	$database -> display_message($old_school['release_date']);
	$database -> display_message("<br>");
	$database -> display_message("Time Period: ");
	$appoint_date = date_create($old_school['appoint_date']);
	$current_date = date_create($old_school['release_date']);
	$period 	  = date_diff($appoint_date,$current_date);
	$database -> display_message($period->format("%Y-%m-%d"));
	$database -> display_message("<br>");
}


if($_SERVER["REQUEST_METHOD"] == "POST"){

   if(isset($_POST['submit'])){

   		if(isset($_POST['day']) AND $_POST['day'] <> ''){
   			$creator      = $database -> session_to_variabal($_SESSION['ad_id']);
   			$ip           = $database -> get_ip_address();
    		$host_name    = gethostname();
   			$day     	  = $database -> form_data_process('day');
    		$day_err 	  = $database -> field_missing($day,'New Appoint day is Missing');

	   		$database -> update_leave_details('principal_appointment', $ip, $host_name, $day, $principal['pr_id'], 'pr_id');
	   		$database -> principal_appoint_by_admin( $principal['pr_id'], $current_appointment['release_school'], $day);
	   		$database -> headerto('releaseprincipal.php');
   		}else{

   			$database -> display_message("Enter Valied Date");
   		}
   		
   		
   }

   if(isset($_POST['back'])){

   		$database -> headerto('releaseprincipal.php');
   }
}

?>

<form action="" method="post">

	<?php $database -> table_text_input_upper('Sceduled Date:'); ?>
    <input type="date" name="day" value="">
    <?php $database -> table_text_input_lower($day_err); ?>

    <input type="submit" name="submit" value="Release">
    <input type="submit" name="back" value="Back">
</form>

