<?php
#page number 08

include("database.php");

$database = new Database();

$database -> empty_session();
$database -> logout();
$database -> logout_form();
$database ->restricted_page('8');

$firstnme_err = $lastnme_err = $birthday_err = $addli1_err = $addli2_err = $addli3_err = $success = $appdate_err = "";
$nic_err = $tel_err = $email_err = $pw_err = $division_err = $emp_err = $school_err = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){

	if(isset($_POST['submit'])){

    $creator      = $database -> session_to_variabal($_SESSION['ad_id']);

    $emp_no       = $database -> form_data_process('emp_no');
    $emp_err      = $database -> field_missing($emp_no,'Emplyee Number is Missing');

    $first_name   = $database -> form_data_process('first_name');
    $firstnme_err = $database -> field_missing($first_name,'First Name is Missing');

	$middle_name 	= $database -> post_to_variabal($_POST['middle_name']);

    $last_name    = $database -> form_data_process('last_name');
    $lastnme_err  = $database -> field_missing($last_name,'Last Name is Missing');

    $sir_name     = $database -> post_to_variabal($_POST['sir_name']);

    $birthday     = $database -> form_data_process('birthday');
    $birthday_err = $database -> field_missing($birthday,'Birthday is Missing');

    $add_li1      = $database -> form_data_process('add_li1');
    $addli1_err   = $database -> field_missing($add_li1,'Address Line is Missing');

    $add_li2      = $database -> form_data_process('add_li2');
    $addli2_err   = $database -> field_missing($add_li2,'Address Line is Missing');

    $add_li3      = $database -> form_data_process('add_li3');
    $addli3_err   = $database -> field_missing($add_li3,'Address Line is Missing');

    $division     = $database -> form_data_process('division');
    $division_err = $database -> field_missing($division,'Residential Division is Missing');

	$gender 	  = $database -> post_to_variabal($_POST['gender']);
	$race 		  = $database -> post_to_variabal($_POST['race']);
	$religion 	  = $database -> post_to_variabal($_POST['religion']);
	$civil_status = $database -> post_to_variabal($_POST['civil_status']);

    $app_date     = $database -> form_data_process('app_date');
    $appdate_err  = $database -> field_missing($app_date,'Appointment Date is Missing');

    $school       = $database -> form_data_process('school');
    $school       = $database -> table_by_id($school,'school','school_no');
    $school_err   = $database -> field_missing($school,'School is Missing or Wrong School No');

    $app_state    = $database -> post_to_variabal($_POST['app_state']);

    $nic          = $database -> form_data_process('nic');
    $nic_err      = $database -> field_missing($nic,'NIC is Missing');

    $tel          = $database -> form_data_process('tel');
    $tel_err      = $database -> field_missing($tel,'Telephone Number is Missing');

	$medium 	  = $database -> post_to_variabal($_POST['medium']);
	$position 	  = $database -> post_to_variabal($_POST['position']);
	$ed_qu 		  = $database -> post_to_variabal($_POST['ed_qu']);
	$pr_qu 		  = $database -> post_to_variabal($_POST['pr_qu']);
	$rank 		  = $database -> post_to_variabal($_POST['rank']);
		
    $email        = $database -> form_data_process('email');
    $email        = $database -> email_validation($email);
    $email        = $database -> email_existance($email,'principal','email');

    $email_err    = $database -> field_missing($email,'Invalied email format or email already exist');
    

    $password     = $database -> form_data_process('password');
    $pw_err       = $database -> field_missing($password,'Password is Missing');
    $password     = crypt($password,'$2a$09$anexamplestringforsalt$');

    $ip           = $database -> get_ip_address();
    $host_name    = gethostname();

    $success  = $database -> insert_principal($emp_no,$first_name,$middle_name,$last_name,$sir_name,$birthday,$add_li1,$add_li2,$add_li3,$division,$gender,$race,$religion,$civil_status,$app_date,$app_state,$nic,$tel,$medium,$position,$ed_qu,$pr_qu,$rank,$email,$password,$creator,$ip,$host_name,$school);

	}
  if(isset($_POST['cancel'])){

    $database -> headerto('createprincipalprofile.php');

  }
  if(isset($_POST['back'])){

    $database -> headerto('home.php');
  }
}
?>

<table>
    <?php $database -> table_header('CREATE PRINCIPAL PROFILE'); ?>

	  <form method="post" action="">

    <?php $database -> table_text_input_upper('Emplyee Number:'); ?>
    <input type="text" name="emp_no" value="">
    <?php $database -> table_text_input_lower($emp_err); ?>

   
    <?php $database -> table_text_input_upper('First Name:'); ?>
    <input type="text" name="first_name" value="">
    <?php $database -> table_text_input_lower($firstnme_err); ?>

    <?php $database -> table_text_input_upper('Middle Name:'); ?>
    <input type="text" name="middle_name" value="">
    <?php $database -> table_text_input_lower(NULL); ?>

    <?php $database -> table_text_input_upper('Last Name:'); ?>
    <input type="text" name="last_name" value="">
    <?php $database -> table_text_input_lower($lastnme_err); ?>

    <?php $database -> table_text_input_upper('Sir Name:'); ?>
    <input type="text" name="sir_name" value="">
    <?php $database -> table_text_input_lower(NULL); ?>

    <?php $database -> table_text_input_upper('Birth Day:'); ?>
    <input type="date" name="birthday" value="">
    <?php $database -> table_text_input_lower($birthday_err); ?>

    <?php $database -> table_text_input_upper('Address Line 1:'); ?>
    <input type="text" name="add_li1" value="">
    <?php $database -> table_text_input_lower($addli1_err); ?>

    <?php $database -> table_text_input_upper('Address Line 2:'); ?>
    <input type="text" name="add_li2" value="">
    <?php $database -> table_text_input_lower($addli2_err); ?>

    <?php $database -> table_text_input_upper('Address Line 3:'); ?>
    <input type="text" name="add_li3" value="">
    <?php $database -> table_text_input_lower($addli3_err); ?>

    <?php $database -> table_text_input_upper('Residential Edu: Division:'); ?>
    <select name="division"><?php $div_query = $database -> find_division();
      while($division = mysqli_fetch_assoc($div_query)){ ?> 
      <option value="<?php echo $division['eo_id']; ?>"><?php echo $division['name']?></option> <?php }?> </select>
    <?php $database -> table_text_input_lower(NULL); ?>

   <?php $database -> table_text_input_upper('Gender:'); ?>
    <input type="radio" name="gender" value="1" checked> Male
    <input type="radio" name="gender" value="2"> Female
    <?php $database -> table_text_input_lower(NULL); ?>

    <?php $database -> table_text_input_upper('Race:'); ?>
    <select name="race"><?php $race_query = $database ->table_search('race');
      while($race = mysqli_fetch_assoc($race_query)){ ?> 
      <option value="<?php echo $race['ra_id']; ?>"><?php echo $race['name']?></option> <?php }?> </select>
    <?php $database -> table_text_input_lower(NULL); ?>

    <?php $database -> table_text_input_upper('Religion:'); ?>
    <select name="religion"><?php $religion_query = $database ->table_search('religion');
      while($religion = mysqli_fetch_assoc($religion_query)){ ?> 
      <option value="<?php echo $religion['rg_id']; ?>"><?php echo $religion['name']?></option> <?php }?> </select>
    <?php $database -> table_text_input_lower(NULL); ?>
    
    <?php $database -> table_text_input_upper('Civil Status:'); ?>
    <select name="civil_status"><?php $ci_st_query = $database ->table_search('civil_status');
      while($civil_status = mysqli_fetch_assoc($ci_st_query)){ ?> 
      <option value="<?php echo $civil_status['cs_id']; ?>"><?php echo $civil_status['name']?></option> <?php }?></select>
    <?php $database -> table_text_input_lower(NULL); ?>

    <?php $database -> table_text_input_upper('Appointment Date:'); ?>
    <input type="date" name="app_date" value="">
    <?php $database -> table_text_input_lower($appdate_err); ?>

    <?php $database -> table_text_input_upper('First Appointed School No:'); ?>
    <input type="text" name="school" value="">
    <?php $database -> table_text_input_lower($school_err); ?>

    <?php $database -> table_text_input_upper('Appointment State:'); ?>
    <select name="app_state" style="width: 200px;"> <?php $st_query = $database ->table_search('appointment_state');
      while($state = mysqli_fetch_assoc($st_query)){ ?> 
      <option value="<?php echo $state['ap_id']; ?>"><?php echo $state['name']?></option> <?php }?></select>
    <?php $database -> table_text_input_lower(NULL); ?>

    <?php $database -> table_text_input_upper('NIC:'); ?>
    <input type="text" name="nic" value="">        
    <?php $database -> table_text_input_lower($nic_err); ?>

    <?php $database -> table_text_input_upper('Telephone:'); ?>
    <input type="text" name="tel" value="">
    <?php $database -> table_text_input_lower($tel_err); ?>

    <?php $database -> table_text_input_upper('Medium:'); ?>
    <select name="medium"><?php $med_query = $database ->table_search('medium');
      while($medium = mysqli_fetch_assoc($med_query)){?> 
      <option value="<?php echo $medium['md_id']; ?>"><?php echo $medium['name']?></option> <?php }?></select>
    <?php $database -> table_text_input_lower(NULL); ?>

    <?php $database -> table_text_input_upper('Position:'); ?>
    <select name="position"> <?php $position_query = $database ->table_search_by_element('principal','position','level');
      while($position = mysqli_fetch_assoc($position_query)){ ?> 
      <option value="<?php echo $position['ps_id']; ?>"><?php echo $position['display_name']?></option> <?php }?></select>
    <?php $database -> table_text_input_lower(NULL); ?>

   	<?php $database -> table_text_input_upper('Education Qualification:'); ?>
    <select name="ed_qu"><?php $ed_qu_query = $database ->table_search('education_qualification');
      while($ed_qu = mysqli_fetch_assoc($ed_qu_query)){ ?> 
      <option value="<?php echo $ed_qu['eq_id']; ?>"><?php echo $ed_qu['name']?></option> <?php }?></select>
    <?php $database -> table_text_input_lower(NULL); ?>

    <?php $database -> table_text_input_upper('Professional Qualification:'); ?>
    <select name="pr_qu"><?php $pr_qu_query = $database ->table_search('prof_qualification');
      while($pr_qu = mysqli_fetch_assoc($pr_qu_query)){?> 
      <option value="<?php echo $pr_qu['pq_id']; ?>"><?php echo $pr_qu['name']?></option> <?php }?></select>
    <?php $database -> table_text_input_lower(NULL); ?>

    <?php $database -> table_text_input_upper('Rank:'); ?>
    <select name="rank"><?php $rank_query = $database ->table_search_by_element('principal','rank','level');
      while($rank = mysqli_fetch_assoc($rank_query)){?> 
      <option value="<?php echo $rank['rk_id']; ?>"><?php echo $rank['name']?></option> <?php }?></select>
    <?php $database -> table_text_input_lower(NULL); ?>

    <?php $database -> table_text_input_upper('E-mail:'); ?>
    <input type="text" name="email" value="">
    <?php $database -> table_text_input_lower($email_err); ?>

    <?php $database -> table_text_input_upper('Pass Word:'); ?>
    <input type="password" name="password" maxlength="10" minlength="6" value="">
    <?php $database -> table_text_input_lower($pw_err); ?>

    </table>

    <input type="submit" name="submit" value="Submit">
    <input type="submit" name="cancel" value="Refresh">
    <input type="submit" name="back" value="Back">
       
    <?php $database -> conditional_display($success); ?> 
</form>