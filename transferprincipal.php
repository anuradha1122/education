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

    <label for="email"><b>Principal, School Or Education Office Number</b></label>
    <input type="text" placeholder="Enter Number" name="number" >

    <input type="submit" name="submit" value="Submit">
    <input type="submit" name="cancel" value="Refresh">
    <input type="submit" name="back" value="Back">
</form>
<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){

   if(isset($_POST['submit'])){

	  $number  = $database -> post_to_variabal($_POST['number']);
	  $principal = $database -> table_by_id($number, 'principal', 'emp_no');
	  if($principal <> NULL){

	  	$database -> display_message($principal['emp_no']);
	  	$database -> display_message(" ");
	  	$database -> display_message($principal['first_name']);
	  	$database -> display_message(" ");
	  	$database -> display_message($principal['last_name']);
	  	$database -> display_message(" ");

	  	$appointment = $database -> current_principal_search($principal['pr_id']);
	  	$school 	 = $database -> table_by_id($appointment['school_no'], 'school', 'school_no');

	  	$database -> display_message($school['name']);
	  	$database -> display_message(" ");
	  	$database -> display_message($appointment['appoint_date']);
	  	$database -> display_message(" ");
	  	
	  	$appoint_date = date_create($appointment['appoint_date']);
		$current_date = date_create(date("Y-m-d"));
		$period 	  = date_diff($appoint_date,$current_date);
		$database -> display_message($period->format("%Y-%m-%d"));

		$database -> display_message(" ");
		?><a href="transferprincipalprocess.php?emp_no=<?php $database -> display_message($principal['emp_no']); ?>"><?php
		$database -> display_message("Trasfer");
		?></a><?php

	  }else{

	  	$school_principal = $database -> school_appointed_principal($number);
	  	if(mysqli_num_rows($school_principal) > 0){

	  		while($principal_detail = mysqli_fetch_assoc($school_principal)){

	  		$principal = $database -> table_by_id($principal_detail['pr_id'], 'principal', 'pr_id');
	  		$database -> display_message($principal['emp_no']);
		  	$database -> display_message(" ");
		  	$database -> display_message($principal['first_name']);
		  	$database -> display_message(" ");
		  	$database -> display_message($principal['last_name']);
		  	$database -> display_message(" ");

		  	$appointment = $database -> current_principal_search($principal['pr_id']);
		  	$school 	 = $database -> table_by_id($principal_detail['school_no'], 'school', 'school_no');

		  	$database -> display_message($school['name']);
		  	$database -> display_message(" ");
		  	$database -> display_message($principal_detail['appoint_date']);
		  	$database -> display_message(" ");

		  	$appoint_date = date_create($appointment['appoint_date']);
			$current_date = date_create(date("Y-m-d"));
			$period 	  = date_diff($appoint_date,$current_date);
			$database -> display_message($period->format("%Y-%m-%d"));

			$database -> display_message(" ");

			?><a href="transferprincipalprocess.php?emp_no=<?php $database -> display_message($principal['emp_no']); ?>"><?php
			$database -> display_message("Trasfer");
			?></a><?php

	  		$database -> display_message("<br>");

	  		} 
	  	}else{

	  		$division = $database -> table_search_by_element($number,'school','edu_division');

	  		if(mysqli_num_rows($division) > 0){

	  			while($school_division = mysqli_fetch_assoc($division)){

	  			$school = $school_division['school_no'];

		  		$school_principal = $database -> school_appointed_principal($school);
			  	if(mysqli_num_rows($school_principal) > 0){

			  		while($principal_detail = mysqli_fetch_assoc($school_principal)){

			  		$principal = $database -> table_by_id($principal_detail['pr_id'], 'principal', 'pr_id');
			  		$database -> display_message($principal['emp_no']);
				  	$database -> display_message(" ");
				  	$database -> display_message($principal['first_name']);
				  	$database -> display_message(" ");
				  	$database -> display_message($principal['last_name']);
				  	$database -> display_message(" ");

				  	$appointment = $database -> current_teacher_search($principal['pr_id']);
				  	$school 	 = $database -> table_by_id($principal_detail['school_no'], 'school', 'school_no');

				  	$database -> display_message($school['name']);
				  	$database -> display_message(" ");
				  	$database -> display_message($principal_detail['appoint_date']);
				  	$database -> display_message(" ");

				  	$appoint_date = date_create($appointment['appoint_date']);
					$current_date = date_create(date("Y-m-d"));
					$period 	  = date_diff($appoint_date,$current_date);
					$database -> display_message($period->format("%Y-%m-%d"));

					$database -> display_message(" ");

					?><a href="transferprincipalprocess.php?emp_no=<?php $database -> display_message($principal['emp_no']); ?>"><?php
					$database -> display_message("Trasfer");
					?></a><?php

			  		$database -> display_message("<br>");

			  		} 
			  	}
		  		} 
	  		}else{
	  			$database -> display_message("Number Incorrect");
	  		}
	  	} 	

	  }
   }

   if(isset($_POST['cancel'])){

     	$database -> headerto('transferprincipal.php');

   }
   if(isset($_POST['back'])){

    	$database -> headerto('home.php');
   }
}
?>