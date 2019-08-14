<?php
#page number 18

include("database.php");

$database = new Database();

$database -> empty_session();
$database -> logout();
$database -> logout_form();
$database -> restricted_page('18');

$scl_err =  $success = $date_err = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){

	if(isset($_POST['submit'])){

    $creator    = $database -> find_creator();

    $school_no 	= $database -> form_data_process('school_no');
    $school_no  = $database -> data_existance($school_no,'school','school_no');
    $scl_err   	= $database -> field_missing($school_no,'School Number Wrong or Missing');

    $date    	= $database -> form_data_process('date');
    $dare_err   = $database -> field_missing($date,'Date is Missing');

    $ip           = $database -> get_ip_address();
    $host_name    = gethostname();

    if(isset($_POST['shut_down']) AND $_POST['shut_down'] <> '' AND isset($_POST['school_no']) AND $_POST['school_no'] <> '' AND isset($_POST['date']) AND $_POST['date'] <> ''){

        $shut_down      = $database -> post_to_variabal($_POST['shut_down']);
        $update         = $database -> update_one_column('school', 'active', '0', 'school_no', $school_no);
        

    }

    
	}

  if(isset($_POST['cancel'])){

    $database -> headerto('shutdownprincipalprofile.php');

  }
  if(isset($_POST['back'])){

    $database -> headerto('home.php');
  }
}
?>

<table>
    <?php $database -> table_header('SHUTDOWN SCHOOL PROFILE'); ?>

	<form method="post" action="">

    <?php $database -> table_text_input_upper('School Number:'); ?>
    <input type="text" name="school_no" value="">
    <?php $database -> table_text_input_lower($scl_err); ?>

    <?php $database -> table_text_input_upper('Last Date:'); ?>
    <input type="date" name="date" value="">
    <?php $database -> table_text_input_lower($date_err); ?>

    <?php $database -> table_text_input_upper('Reason:'); ?>
    <select name="shut_down"><?php $leave_query = $database ->table_search('school_shutdown');
      while($leave = mysqli_fetch_assoc($leave_query)){ ?> 
      <option value="<?php echo $leave['ss_id']; ?>"><?php echo $leave['name']?></option> <?php }?></select>
    <?php $database -> table_text_input_lower(NULL); ?>
   
   </table>

    <input type="submit" name="submit" value="Submit">
    <input type="submit" name="cancel" value="Refresh">
    <input type="submit" name="back" value="Back">
       
    <?php $database -> conditional_display($success); ?> 
</form>