<?php
#page number 24

include("database.php");

$database = new Database();

$database -> empty_session();
$database -> logout();
$database -> logout_form();
$database -> restricted_page('24');

$day_err = "";
$emp_no  = $_GET["emp_no"];
$teacher = $database -> table_by_id($emp_no, 'teacher', 'emp_no');

$database -> display_message("Full Name : ");
$database -> display_message($database -> gender_title($teacher));
$database -> display_message(" ");
$database -> display_message($teacher['sir_name']);
$database -> display_message(" ");
$database -> display_message($teacher['first_name']);
$database -> display_message(" ");
$database -> display_message($teacher['middle_name']);
$database -> display_message(" ");
$database -> display_message($teacher['last_name']);
$database -> display_message("<br>");

$database -> display_message("Address : ");

$database -> display_message($teacher['add_li1']);
$database -> display_message(" ");
$database -> display_message($teacher['add_li2']);
$database -> display_message(" ");
$database -> display_message($teacher['add_li3']);
$database -> display_message("<br>");

$database -> display_message("Birth Day : ");

$database -> display_message($teacher['birth_day']);
$database -> display_message("<br>");

$database -> display_message("Residential Division : ");
$division = $database -> table_by_id($teacher['division'], 'education_office', 'eo_id');
$database -> display_message($division['name']);
$database -> display_message("<br>");

$database -> display_message("Race : ");
$race = $database -> table_by_id($teacher['race'], 'race', 'ra_id');
$database -> display_message($race['name']);
$database -> display_message("<br>");

$database -> display_message("Religion : ");
$religion = $database -> table_by_id($teacher['religion'], 'religion', 'rg_id');
$database -> display_message($religion['name']);
$database -> display_message("<br>");

$database -> display_message("Civil Status : ");
$civil_status = $database -> table_by_id($teacher['civil_status'], 'civil_status', 'cs_id');
$database -> display_message($civil_status['name']);
$database -> display_message("<br>");

$database -> display_message("First Appointment Date : ");
$database -> display_message($teacher['appoint_date']);
$database -> display_message("<br>");

$database -> display_message("Appointment State : ");
$appoint_state = $database -> table_by_id($teacher['appoint_state'], 'appointment_state', 'ap_id');
$database -> display_message($appoint_state['name']);
$database -> display_message("<br>");

$database -> display_message("NIC : ");
$database -> display_message($teacher['nic']);
$database -> display_message("<br>");

$database -> display_message("Telephone No : ");
$database -> display_message($teacher['tel_no']);
$database -> display_message("<br>");

$database -> display_message("Medium : ");
$medium = $database -> table_by_id($teacher['medium'], 'medium', 'md_id');
$database -> display_message($medium['name']);
$database -> display_message("<br>");

$database -> display_message("Education Qualification : ");
$edu_quali = $database -> table_by_id($teacher['edu_quali'], 'education_qualification', 'eq_id');
$database -> display_message($edu_quali['name']);
$database -> display_message("<br>");

$database -> display_message("Proffesional Qualification : ");
$prof_quali = $database -> table_by_id($teacher['prof_quali'], 'prof_qualification', 'pq_id');
$database -> display_message($prof_quali['name']);
$database -> display_message("<br>");

$database -> display_message("Appointment catagory : ");
$appoint_cat = $database -> table_by_id($teacher['appoint_cat'], 'appointment_catagory', 'ct_id');
$database -> display_message($appoint_cat['name']);
$database -> display_message("<br>");

$database -> display_message("Position : ");
$position = $database -> table_by_id($teacher['position'], 'position', 'ps_id');
$database -> display_message($position['name']);
$database -> display_message("<br>");

$database -> display_message("Current Function : ");
$function = $database -> table_by_id($teacher['cur_function'], 'teacher_function', 'tf_id');
$database -> display_message($function['name']);
$database -> display_message("<br>");

$database -> display_message("Main Subject : ");
$subject = $database -> table_by_id($teacher['main_sub'], 'subject', 'su_id');
$database -> display_message($subject['name']);
$database -> display_message("<br>");

$database -> display_message("Second Subject : ");
$subject = $database -> table_by_id($teacher['sec_sub'], 'subject', 'su_id');
$database -> display_message($subject['name']);
$database -> display_message("<br>");

$database -> display_message("Third Subject : ");
$subject = $database -> table_by_id($teacher['third_sub'], 'subject', 'su_id');
$database -> display_message($subject['name']);
$database -> display_message("<br>");

$database -> display_message("Rank : ");
$rank = $database -> table_by_id($teacher['rank'], 'rank', 'rk_id');
$database -> display_message($rank['name']);
$database -> display_message("<br>");

$database -> display_message("Current School : ");
$current_appointment = $database -> current_teacher_search($teacher['tc_id']);
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
$old_appointment = $database -> old_teacher_search($teacher['tc_id']);
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
   			$creator      = $database -> session_to_variabal($_SESSION['pr_id']);
   			$ip           = $database -> get_ip_address();
    		$host_name    = gethostname();
   			$day     	  = $database -> form_data_process('day');
    		$day_err 	  = $database -> field_missing($day,'New Appoint day is Missing');

	   		$database -> update_leave_details('teacher_appointment', $ip, $host_name, $day, $teacher['tc_id'], 'tc_id');
	   		$database -> teacher_appoint_by_principal( $teacher['tc_id'], $current_appointment['release_school'], $day);
	   		$database -> headerto('releaseteacher.php');
   		}else{

   			$database -> display_message("Enter Valied Date");
   		}
   		
   		
   }

   if(isset($_POST['back'])){

   		$database -> headerto('releaseteacher.php');
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

