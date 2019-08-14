<?php
#page number 17

include("database.php");

$database = new Database();

$database -> empty_session();
$database -> logout();
$database -> logout_form();
$database -> restricted_page('17');

$emp_err =  $success = $date_err = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){

	if(isset($_POST['submit'])){

    $creator    = $database -> find_creator();

    $emp_no 	= $database -> form_data_process('emp_no');
    $emp_no     = $database -> data_existance($emp_no,'admin_staff','emp_no');
    $emp_err   	= $database -> field_missing($emp_no,'Employement Number Wrong or Missing');

    $date    	= $database -> form_data_process('date');
    $date_err   = $database -> field_missing($date,'Date is Missing');

    $ip           = $database -> get_ip_address();
    $host_name    = gethostname();

    if(isset($_POST['leave_detail']) AND $_POST['leave_detail'] <> '' AND isset($_POST['emp_no']) AND $_POST['emp_no'] <> '' AND isset($_POST['date']) AND $_POST['date'] <> ''){

        $leave_detail   = $database -> post_to_variabal($_POST['leave_detail']);
        $update         = $database -> update_one_column('admin_staff', 'leave_detail', $leave_detail, 'emp_no', $emp_no);
        $admin_staff 	= $database -> table_by_id($emp_no,'admin_staff','emp_no');
        $id 			= $admin_staff['ad_id'];
        $update         = $database -> update_one_column('admin_staff', 'active', '0', 'emp_no', $emp_no);
        $update         = $database -> update_leave_details('admin_staff_appointment',$ip, $host_name, $date, $id, 'ad_id');

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
    <?php $database -> table_header('SHUTDOWN PRINCIPAL PROFILE'); ?>

	<form method="post" action="">

    <?php $database -> table_text_input_upper('Emplyement Number:'); ?>
    <input type="text" name="emp_no" value="">
    <?php $database -> table_text_input_lower($emp_err); ?>

    <?php $database -> table_text_input_upper('Release Date:'); ?>
    <input type="date" name="date" value="">
    <?php $database -> table_text_input_lower($date_err); ?>

    <?php $database -> table_text_input_upper('Reason:'); ?>
    <select name="leave_detail"><?php $leave_query = $database ->table_search('leave_detail');
      while($leave = mysqli_fetch_assoc($leave_query)){ ?> 
      <option value="<?php echo $leave['ld_id']; ?>"><?php echo $leave['name']?></option> <?php }?></select>
    <?php $database -> table_text_input_lower(NULL); ?>
   
   </table>

    <input type="submit" name="submit" value="Submit">
    <input type="submit" name="cancel" value="Refresh">
    <input type="submit" name="back" value="Back">
       
    <?php $database -> conditional_display($success); ?> 
</form>