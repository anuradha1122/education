<?php
#page number 06
include("database.php");

$database = new Database();

$database -> empty_session();
$database -> logout();
$database -> logout_form();
$database ->restricted_page('6');

$firstnme_err = $lastnme_err = $birthday_err = $addli1_err = $addli2_err = $addli3_err = $success = $appdate_err = $startday_err = $grade_err = "";
$nic_err = $tel_err = $email_err = $pw_err = $division_err = $emp_err = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){

	if(isset($_POST['submit'])){

    $creator      = $database -> session_to_variabal($_SESSION['ad_id']);

    $first_name   = $database -> form_data_process('first_name');
    $firstnme_err = $database -> field_missing($first_name,'First Name is Missing');

	$middle_name  = $database -> post_to_variabal($_POST['middle_name']);

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

    $app_state    = $database -> post_to_variabal($_POST['app_state']);
    $app_cata     = $database -> post_to_variabal($_POST['catagory']);

    $nic          = $database -> form_data_process('nic');
    $nic_err      = $database -> field_missing($nic,'NIC is Missing');

    $tel          = $database -> form_data_process('tel');
    $tel_err      = $database -> field_missing($tel,'Telephone Number is Missing');

	$medium 	  = $database -> post_to_variabal($_POST['medium']);
	$position 	  = $database -> post_to_variabal($_POST['position']);
	$ed_qu 		  = $database -> post_to_variabal($_POST['ed_qu']);
	$pr_qu 		  = $database -> post_to_variabal($_POST['pr_qu']);
	$rank 		  = $database -> post_to_variabal($_POST['rank']);
    $function     = $database -> post_to_variabal($_POST['cur_function']);
    $sub1         = $database -> post_to_variabal($_POST['first_sub']);
    $sub2         = $database -> post_to_variabal($_POST['sec_sub']);
    $sub3         = $database -> post_to_variabal($_POST['third_sub']);

    $email        = $database -> form_data_process('email');
    $email        = $database -> email_validation($email);
    $email        = $database -> email_existance($email,'teacher','email');

    $email_err    = $database -> field_missing($email,'Invalied email format or email already exist');
    
    $password     = $database -> form_data_process('password');
    $pw_err       = $database -> field_missing($password,'Password is Missing');
    $password     = crypt($password,'$2a$09$anexamplestringforsalt$');

    $ip           = $database -> get_ip_address();
    $host_name    = gethostname();

    $success  = $database -> insert_teacher($emp_no,$first_name,$middle_name,$last_name,$sir_name,$birthday,$add_li1,$add_li2,$add_li3,$division,$gender,$race,$religion,$civil_status,$app_date,$app_state,$app_cata,$nic,$tel,$medium,$position,$ed_qu,$pr_qu,$rank,$function,$sub1,$sub2,$sub3,$email,$password,$creator,$ip,$host_name);

	}
  if(isset($_POST['cancel'])){

    $database -> headerto('createteacherprofile.php');

  }
  if(isset($_POST['back'])){

    $database -> headerto('home.php');
  }
}
?>

<table>
    <?php $database -> table_header('CREATE STUDENT PROFILE'); ?>

	  <form method="post" action="">

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

    <?php $database -> table_text_input_upper('Medium:'); ?>
    <select name="language"><?php $lang_query = $database ->table_search('language_medium');
      while($language = mysqli_fetch_assoc($lang_query)){ ?> 
      <option value="<?php echo $language['lm_id']; ?>"><?php echo $language['name']?></option> <?php }?></select>
    <?php $database -> table_text_input_lower(NULL); ?>
    
    <?php $database -> table_text_input_upper('Starting Date:'); ?>
    <input type="date" name="start_date" value="">
    <?php $database -> table_text_input_lower($startday_err); ?>

    <?php $database -> table_text_input_upper('Starting Grade:'); ?>
    <input type="number" name="start_grade" value="" min="1" max="13">        
    <?php $database -> table_text_input_lower($grade_err); ?>

    <?php $database -> table_text_input_upper('Telephone:'); ?>
    <input type="text" name="tel" value="">
    <?php $database -> table_text_input_lower($tel_err); ?>

    <?php $database -> table_text_input_upper('NIC:'); ?>
    <input type="text" name="nic" value="">
    <?php $database -> table_text_input_lower(NULL); ?>

   </table>

    <input type="submit" name="submit" value="Submit">
    <input type="submit" name="cancel" value="Refresh">
    <input type="submit" name="back" value="Back">
       
    <?php $database -> conditional_display($success); ?> 
</form>


