<?php
#page number 25
include("database.php");

$database = new Database();

$database -> empty_session();
$database -> logout();
$database -> logout_form();
$database -> restricted_page('25');

$ad_id = $database -> session_to_variabal($_SESSION['ad_id']);
$appointment = $database -> current_admin_search($ad_id);
$division_query = $database -> table_search_by_element($appointment['office_no'],' education_office', 'higher_provi_no');
if(mysqli_num_rows($division_query) > 0){
	while($division = mysqli_fetch_assoc($division_query)){

		$school_query = $database -> table_search_by_element($division['office_no'],'school', 'edu_division');
		if(mysqli_num_rows($school_query) > 0){
			while($school = mysqli_fetch_assoc($school_query)){

				$release_principal = $database -> release_principal_search($school['school_no']);

				if(mysqli_num_rows($release_principal) > 0){
					while($principal_detail = mysqli_fetch_assoc($release_principal)){

					$principal = $database -> table_by_id($principal_detail['pr_id'], 'principal', 'pr_id');
					$database -> display_message($principal['emp_no']);
					$database -> display_message(" ");
					$database -> display_message($principal['first_name']);
					$database -> display_message(" ");
					$database -> display_message($principal['last_name']);
					$database -> display_message(" ");
					$database -> display_message($principal_detail['appoint_date']);
					$appoint_date = date_create($principal_detail['appoint_date']);
					$current_date = date_create(date("Y-m-d"));
					$period 	  = date_diff($appoint_date,$current_date);
					$database -> display_message($period->format("%Y-%m-%d"));
					$database -> display_message(" ");

					?><a href="releaseprincipalprocess.php?emp_no=<?php $database -> display_message($principal['emp_no']); ?>"><?php
					$database -> display_message("Release");
					$database -> display_message("<br>");
					?></a><?php


					}
				}
			}
		}
	}
}