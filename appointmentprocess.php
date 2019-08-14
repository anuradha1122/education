<?php
#page number 20

include("database.php");

$database = new Database();

$database -> empty_session();
//$database -> restricted_page('20');


if($_SERVER["REQUEST_METHOD"] == "POST"){

	if(isset($_POST['accept'])){
		$creator      = $database -> session_to_variabal($_SESSION['ad_id']);
		$ip           = $database -> get_ip_address();

		if($_POST['id'] == 'ad_id') {
			$accept = $database -> update_data_appointment($_POST['id_val'], 'admin_staff_appointment', 'admin_staff', 'ad_id', $ip, $creator);
		}

		if($_POST['id'] == 'pr_id') {
			$accept = $database -> update_data_appointment($_POST['id_val'], 'principal_appointment', 'principal', 'pr_id', $ip, $creator);
		}

		if($_POST['id'] == 'tc_id') {
			$accept = $database -> update_data_appointment($_POST['id_val'], 'teacher_appointment', 'teacher', 'tc_id', $ip, $creator);
		}
		
	}

	if(isset($_POST['cancel'])){

		$database -> headerto('confirm_appointment.php');
		
	}
}