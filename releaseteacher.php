<?php
#page number 23
include("database.php");

$database = new Database();

$database -> empty_session();
$database -> logout();
$database -> logout_form();
$database -> restricted_page('23');

$pr_id = $database -> session_to_variabal($_SESSION['pr_id']);
$appointment = $database -> current_principal_search($pr_id);
$release_teacher = $database -> release_teacher_search($appointment['school_no']);
if(mysqli_num_rows($release_teacher) > 0){
	while($teacher_detail = mysqli_fetch_assoc($release_teacher)){

	$teacher = $database -> table_by_id($teacher_detail['tc_id'], 'teacher', 'tc_id');
	$database -> display_message($teacher['emp_no']);
	$database -> display_message(" ");
	$database -> display_message($teacher['first_name']);
	$database -> display_message(" ");
	$database -> display_message($teacher['last_name']);
	$database -> display_message(" ");
	$database -> display_message($teacher_detail['appoint_date']);
	$appoint_date = date_create($teacher_detail['appoint_date']);
	$current_date = date_create(date("Y-m-d"));
	$period 	  = date_diff($appoint_date,$current_date);
	$database -> display_message($period->format("%Y-%m-%d"));
	$database -> display_message(" ");

	?><a href="releaseteacherprocess.php?emp_no=<?php $database -> display_message($teacher['emp_no']); ?>"><?php
	$database -> display_message("Release");
	?></a><?php


	}
}