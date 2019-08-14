<?php
#page number 13

include("database.php");

$database = new Database();

$database -> empty_session();
$database -> logout();
$database -> logout_form();
$database -> restricted_page('13');

$activity ="";
$firstnme_err = $lastnme_err = $birthday_err = $addli1_err = $addli2_err = $addli3_err = $success = $appdate_err = $emp_err = "";
$nic_err = $tel_err = $email_err = $pw_err = $division_err = $office_err = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){

	if(isset($_POST['submit'])){

    $creator      = $database -> find_creator();
    
    $emp_no       = $database -> form_data_process('emp_no');
    $emp_no       = $database -> data_existance($emp_no,'admin_staff','emp_no');
    $emp_err      = $database -> field_missing($emp_no,'Emplyee Number is Missing or Wrong');

    if(isset($_POST['first_name']) AND $_POST['first_name'] <> ''){
        $first_name   = $database -> post_to_variabal($_POST['first_name']);
        $update       = $database -> update_one_column('admin_staff', 'first_name', $first_name, 'emp_no', $emp_no);
        $activity .= ".1";
    }
    
    if(isset($_POST['middle_name']) AND $_POST['middle_name'] <> ''){
        $middle_name  = $database -> post_to_variabal($_POST['middle_name']);
        $update       = $database -> update_one_column('admin_staff', 'middle_name', $middle_name, 'emp_no', $emp_no);
        $activity .= ".2";
    }

    if(isset($_POST['last_name']) AND $_POST['last_name'] <> ''){
        $last_name    = $database -> post_to_variabal($_POST['last_name']);
        $update       = $database -> update_one_column('admin_staff', 'last_name', $last_name, 'emp_no', $emp_no);
        $activity .= ".3";
    }

    if(isset($_POST['sir_name']) AND $_POST['sir_name'] <> ''){
        $sir_name     = $database -> post_to_variabal($_POST['sir_name']);
        $update       = $database -> update_one_column('admin_staff', 'sir_name', $sir_name, 'emp_no', $emp_no);
        $activity .= ".4";
    }
    
    if(isset($_POST['birthday']) AND $_POST['birthday'] <> ''){
        $birthday     = $database -> post_to_variabal($_POST['birthday']);
        $update       = $database -> update_one_column('admin_staff', 'birth_day', $birthday, 'emp_no', $emp_no);
        $activity .= ".5";
    }
    
    if(isset($_POST['add_li1']) AND $_POST['add_li1'] <> ''){
        $add_li1      = $database -> post_to_variabal($_POST['add_li1']);
        $update       = $database -> update_one_column('admin_staff', 'add_li1', $add_li1, 'emp_no', $emp_no);
        $activity .= ".6";
    }

    if(isset($_POST['add_li2']) AND $_POST['add_li2'] <> ''){
        $add_li2      = $database -> post_to_variabal($_POST['add_li2']);
        $update       = $database -> update_one_column('admin_staff', 'add_li2', $add_li2, 'emp_no', $emp_no);
        $activity .= ".7";
    }

    if(isset($_POST['add_li3']) AND $_POST['add_li3'] <> ''){
        $add_li3      = $database -> post_to_variabal($_POST['add_li3']);
        $update       = $database -> update_one_column('admin_staff', 'add_li3', $add_li3, 'emp_no', $emp_no);
        $activity .= ".8";
    }
    
    if(isset($_POST['division']) AND $_POST['division'] <> ''){
        $division     = $database -> post_to_variabal($_POST['division']);
        $update       = $database -> update_one_column('admin_staff', 'division', $division, 'emp_no', $emp_no);
        $activity .= ".9";
    }
    
    if(isset($_POST['gender']) AND $_POST['gender'] <> '' AND $_POST['gender'] <> 'no'){
        $gender       = $database -> post_to_variabal($_POST['gender']);
        $update       = $database -> update_one_column('admin_staff', 'gender', $gender, 'emp_no', $emp_no);
        $activity .= ".10";
    }
    
    if(isset($_POST['race']) AND $_POST['race'] <> ''){
        $race         = $database -> post_to_variabal($_POST['race']);
        $update       = $database -> update_one_column('admin_staff', 'race', $race, 'emp_no', $emp_no);
        $activity .= ".11";
    }

    if(isset($_POST['religion']) AND $_POST['religion'] <> ''){
        $religion     = $database -> post_to_variabal($_POST['religion']);
        $update       = $database -> update_one_column('admin_staff', 'religion', $religion, 'emp_no', $emp_no);
        $activity .= ".12";
    }
    
    if(isset($_POST['civil_status']) AND $_POST['civil_status'] <> ''){
        $civil_status = $database -> post_to_variabal($_POST['civil_status']);
        $update       = $database -> update_one_column('admin_staff', 'civil_status', $civil_status, 'emp_no', $emp_no);
        $activity .= ".13";
    }

    if(isset($_POST['app_date']) AND $_POST['app_date'] <> ''){
        $app_date     = $database -> post_to_variabal($_POST['app_date']);
        $update       = $database -> update_one_column('admin_staff', 'appoint_date', $app_date, 'emp_no', $emp_no);
        $activity .= ".14";
    }

    if(isset($_POST['nic']) AND $_POST['nic'] <> ''){
        $nic          = $database -> post_to_variabal($_POST['nic']);
        $update       = $database -> update_one_column('admin_staff', 'nic', $nic, 'emp_no', $emp_no);
        $activity .= ".16";
    }

    if(isset($_POST['tel']) AND $_POST['tel'] <> ''){
        $tel          = $database -> post_to_variabal($_POST['tel']);
        $update       = $database -> update_one_column('admin_staff', 'tel_no', $tel, 'emp_no', $emp_no);
        $activity .= ".17";
    }

    if(isset($_POST['medium']) AND $_POST['medium'] <> ''){
        $medium       = $database -> post_to_variabal($_POST['medium']);
        $update       = $database -> update_one_column('admin_staff', 'medium', $medium, 'emp_no', $emp_no);
        $activity .= ".18";
    }

    if(isset($_POST['position']) AND $_POST['position'] <> ''){
        $position     = $database -> post_to_variabal($_POST['position']);
        $update       = $database -> update_one_column('admin_staff', 'position', $position, 'emp_no', $emp_no);
        $activity .= ".19";
    }

    if(isset($_POST['ed_qu']) AND $_POST['ed_qu'] <> ''){
        $ed_qu        = $database -> post_to_variabal($_POST['ed_qu']);
        $update       = $database -> update_one_column('admin_staff', 'edu_quali', $ed_qu, 'emp_no', $emp_no);
        $activity .= ".20";
    }

    if(isset($_POST['pr_qu']) AND $_POST['pr_qu'] <> ''){
        $pr_qu        = $database -> post_to_variabal($_POST['pr_qu']);
        $update       = $database -> update_one_column('admin_staff', 'prof_quali', $pr_qu, 'emp_no', $emp_no);
        $activity .= ".21";
    }

    if(isset($_POST['rank']) AND $_POST['rank'] <> ''){
        $rank         = $database -> post_to_variabal($_POST['rank']);
        $update       = $database -> update_one_column('admin_staff', 'rank', $rank, 'emp_no', $emp_no);
        $activity .= ".22";
    }

    if(isset($_POST['email']) AND $_POST['email'] <> ''){
        $email        = $database -> form_data_process('email');
        $email        = $database -> email_validation($email);
        $email        = $database -> email_existance($email,'admin_staff','email');
        $email_err    = $database -> field_missing($email,'Invalied email format or email already exist');
        if($email <> ''){
            $update       = $database -> update_one_column('admin_staff', 'email', $email, 'emp_no', $emp_no);
            $activity .= ".23";
        }      
    }

    if(isset($_POST['password']) AND $_POST['password'] <> '' AND isset($_POST['cpassword']) AND $_POST['cpassword'] <> ''){
        $password     = $database -> form_data_process('password');
        $password     = crypt($password,'$2a$09$anexamplestringforsalt$');

        $cpassword    = $database -> form_data_process('cpassword');
        $cpassword    = crypt($cpassword,'$2a$09$anexamplestringforsalt$');

        if($password == $cpassword){

            $update   = $database -> update_one_column('admin_staff', 'password', $password, 'emp_no', $emp_no);
            $activity .= ".24";
        } else{

            $pw_err   = $database -> text_to_variabal('password did not Match');
        }
    }
		
    if(isset($_POST['new_emp']) AND $_POST['new_emp'] <> ''){
        $new_emp  = $database -> post_to_variabal($_POST['new_emp']);
        $update   = $database -> update_one_column('teacher', 'emp_no', $new_emp, 'emp_no', $emp_no);
        $activity .= ".25";
    }

    echo $activity;
    
    $ip           = $database -> get_ip_address();
    $host_name    = gethostname();


	}
  if(isset($_POST['cancel'])){

    $database -> headerto('createeduofficerprofile.php');

  }
  if(isset($_POST['back'])){

    $database -> headerto('home.php');
  }
}
?>

<table>
  <?php $database -> table_header('CREATE ADMIN STAFF PROFILE'); ?>
	<form method="post" action="">

  <?php $database -> table_text_input_upper('Emplyee Number:'); ?>
  <input type="text" name="emp_no" value="">
  <?php $database -> table_text_input_lower($emp_err); ?>

  <?php if(isset($_SESSION['ad_id'])){ ?>
  <?php $database -> table_text_input_upper('New Emplyee Number:'); ?>
  <input type="text" name="new_emp" value="">
  <?php $database -> table_text_input_lower(NULL); ?>
  <?php } ?>

  <?php if(isset($_SESSION['ad_id'])){ ?>
  <?php $database -> table_text_input_upper('First Name:'); ?>
  <input type="text" name="first_name" value="">
  <?php $database -> table_text_input_lower($firstnme_err); ?>
  <?php } ?>
  
  <?php if(isset($_SESSION['ad_id'])){ ?>
  <?php $database -> table_text_input_upper('Middle Name:'); ?>
  <input type="text" name="middle_name" value="">
  <?php $database -> table_text_input_lower(NULL); ?>
  <?php } ?>

  <?php if(isset($_SESSION['ad_id'])){ ?>
  <?php $database -> table_text_input_upper('Last Name:'); ?>
  <input type="text" name="last_name" value="">
  <?php $database -> table_text_input_lower($lastnme_err); ?>
  <?php } ?>
   
  <?php if(isset($_SESSION['ad_id'])){ ?>
  <?php $database -> table_text_input_upper('Sir Name:'); ?>
  <input type="text" name="sir_name" value="">
  <?php $database -> table_text_input_lower(NULL); ?>
  <?php } ?>

  <?php if(isset($_SESSION['ad_id'])){ ?>
  <?php $database -> table_text_input_upper('Birthday:'); ?>
  <input type="date" name="birthday" value="">
  <?php $database -> table_text_input_lower($birthday_err); ?>
  <?php } ?>

  <?php if(isset($_SESSION['ad_id'])){ ?>
  <?php $database -> table_text_input_upper('Address Line 1:'); ?>
  <input type="text" name="add_li1" value="">
  <?php $database -> table_text_input_lower($addli1_err); ?>
  <?php } ?>
   
  <?php if(isset($_SESSION['ad_id'])){ ?>
  <?php $database -> table_text_input_upper('Address Line 2:'); ?>
  <input type="text" name="add_li2" value="">
  <?php $database -> table_text_input_lower($addli2_err); ?>
  <?php } ?>

  <?php if(isset($_SESSION['ad_id'])){ ?>
  <?php $database -> table_text_input_upper('Address Line 3:'); ?>
  <input type="text" name="add_li3" value="">
  <?php $database -> table_text_input_lower($addli3_err); ?>
  <?php } ?>

  <?php if(isset($_SESSION['ad_id'])){ ?>
  <?php $database -> table_text_input_upper('Residential Edu: Division:'); ?>
  <select name="division"><option value="" selected>No Change</option><?php $div_query = $database -> find_division();
    while($division = mysqli_fetch_assoc($div_query)){ ?> 
    <option value="<?php echo $division['eo_id']; ?>"><?php echo $division['name']?></option> <?php }?> </select>
  <?php $database -> table_text_input_lower(NULL); ?>
  <?php } ?>

  <?php if(isset($_SESSION['ad_id'])){ ?>
  <?php $database -> table_text_input_upper('Gender:'); ?>
  <input type="radio" name="gender" value="no" checked> No Change
  <input type="radio" name="gender" value="1"> Male
  <input type="radio" name="gender" value="2"> Female
  <?php $database -> table_text_input_lower(NULL); ?>
  <?php } ?>

  <?php if(isset($_SESSION['ad_id'])){ ?>
  <?php $database -> table_text_input_upper('Race:'); ?> 
  <select name="race"><option value="" selected>No Change</option> <?php $race_query = $database ->table_search('race');
    while($race = mysqli_fetch_assoc($race_query)){ ?> 
    <option value="<?php echo $race['ra_id']; ?>"><?php echo $race['name']?></option> <?php } ?></select>
  <?php $database -> table_text_input_lower(NULL); ?>
  <?php } ?>
   
  <?php if(isset($_SESSION['ad_id'])){ ?>
  <?php $database -> table_text_input_upper('Religion:'); ?> 
  <select name="religion"><option value="" selected>No Change</option><?php  $religion_query = $database ->table_search('religion');
    while($religion = mysqli_fetch_assoc($religion_query)){ ?> 
    <option value="<?php echo $religion['rg_id']; ?>"><?php echo $religion['name']?></option> <?php } ?></select>
  <?php $database -> table_text_input_lower(NULL); ?>
  <?php } ?>
   
  <?php if(isset($_SESSION['ad_id'])){ ?>
  <?php $database -> table_text_input_upper('Civil Status:'); ?> 
  <select name="civil_status"> <option value="" selected>No Change</option><?php $ci_st_query = $database ->table_search('civil_status');
    while($civil_status = mysqli_fetch_assoc($ci_st_query)){ ?> 
    <option value="<?php echo $civil_status['cs_id']; ?>"><?php echo $civil_status['name']?></option> <?php } ?></select>
  <?php $database -> table_text_input_lower(NULL); ?>
  <?php } ?>

  <?php if(isset($_SESSION['ad_id'])){ ?>
  <?php $database -> table_text_input_upper('Appointment date:'); ?> 
  <input type="date" name="app_date" value="">
  <?php $database -> table_text_input_lower($appdate_err); ?>
  <?php } ?>

  <?php if(isset($_SESSION['ad_id'])){ ?>
  <?php $database -> table_text_input_upper('First Appointed Office No:'); ?>
    <input type="text" name="office" value="">
  <?php $database -> table_text_input_lower($office_err); ?>
  <?php } ?>

  <?php if(isset($_SESSION['ad_id'])){ ?>
  <?php $database -> table_text_input_upper('NIC:'); ?> 
  <input type="text" name="nic" value="">
  <?php $database -> table_text_input_lower($nic_err); ?>  
  <?php } ?>
    
  <?php if(isset($_SESSION['ad_id'])){ ?>
  <?php $database -> table_text_input_upper('Telephone:'); ?> 
  <input type="text" name="tel" value="">
  <?php $database -> table_text_input_lower($tel_err); ?>  
  <?php } ?>

  <?php if(isset($_SESSION['ad_id'])){ ?>
  <?php $database -> table_text_input_upper('Medium:'); ?> 
  <select name="medium"> <option value="" selected>No Change</option><?php $med_query = $database ->table_search('medium');
    while($medium = mysqli_fetch_assoc($med_query)){ ?> 
    <option value="<?php echo $medium['md_id']; ?>"><?php echo $medium['name']?></option> <?php } ?></select>
  <?php $database -> table_text_input_lower(NULL); ?>
  <?php } ?>
   
  <?php if(isset($_SESSION['ad_id'])){ ?>
  <?php $database -> table_text_input_upper('Position:'); ?> 
  <select name="position"> <option value="" selected>No Change</option><?php $position_query = $database ->table_search_by_element('edu_officer','position','level');
    while($position = mysqli_fetch_assoc($position_query)){ ?> 
    <option value="<?php echo $position['ps_id']; ?>"><?php echo $position['display_name']?></option> <?php } ?> </select>
  <?php $database -> table_text_input_lower(NULL); ?>
  <?php } ?>

  <?php if(isset($_SESSION['ad_id'])){ ?>
  <?php $database -> table_text_input_upper('Education Qualification:'); ?> 
  <select name="ed_qu"> <option value="" selected>No Change</option><?php $ed_qu_query = $database ->table_search('education_qualification');
    while($ed_qu = mysqli_fetch_assoc($ed_qu_query)){ ?> 
    <option value="<?php echo $ed_qu['eq_id']; ?>"><?php echo $ed_qu['name']?></option> <?php } ?></select>
  <?php $database -> table_text_input_lower(NULL); ?>
  <?php } ?>


  <?php if(isset($_SESSION['ad_id'])){ ?>
  <?php $database -> table_text_input_upper('Professional Qualification:'); ?> 
  <select name="pr_qu"><option value="" selected>No Change</option> <?php $pr_qu_query = $database ->table_search('prof_qualification');
    while($pr_qu = mysqli_fetch_assoc($pr_qu_query)){ ?> 
    <option value="<?php echo $pr_qu['pq_id']; ?>"><?php echo $pr_qu['name']?></option> <?php } ?></select>
  <?php $database -> table_text_input_lower(NULL); ?>
  <?php } ?>


  <?php if(isset($_SESSION['ad_id'])){ ?>
  <?php $database -> table_text_input_upper('Rank:'); ?> 
  <select name="rank"><option value="" selected>No Change</option><?php  $rank_query = $database ->table_search_by_element('admin_staff','rank','level');
    while($rank = mysqli_fetch_assoc($rank_query)){ ?> 
    <option value="<?php echo $rank['rk_id']; ?>"><?php echo $rank['name']?></option> <?php } ?></select>
  <?php $database -> table_text_input_lower(NULL); ?>
  <?php } ?>

  <?php if(isset($_SESSION['ad_id'])){ ?>
  <?php $database -> table_text_input_upper('E-mail:'); ?> 
  <input type="text" name="email" value="">
  <?php $database -> table_text_input_lower($email_err); ?>
  <?php } ?>
   
  <?php if(isset($_SESSION['ad_id'])){ ?> 
  <?php $database -> table_text_input_upper('Pass Word:'); ?>
  <input type="password" name="password" maxlength="10" minlength="6" value="">
  <?php $database -> table_text_input_lower(NULL); ?>
  <?php } ?>

  <?php if(isset($_SESSION['ad_id'])){ ?>
  <?php $database -> table_text_input_upper('Confirm Pass Word:'); ?>
  <input type="password" name="cpassword" maxlength="10" minlength="6" value="">
  <?php $database -> table_text_input_lower($pw_err); ?>
  <?php } ?>
  
  </table>

    <input type="submit" name="submit" value="Submit">
    <input type="submit" name="cancel" value="Refresh">
    <input type="submit" name="back" value="Back">
       
    <?php $database -> conditional_display($success); ?> 
</form>
