<?php
#page number 10

include("database.php");

$database = new Database();

$database -> empty_session();
$database -> logout();
$database -> logout_form();
$database -> restricted_page('10');

$number_err = $name_err = $dstct_err = $start_err = $division_err = $primary_err = $olcls_err = $science_err = $commerce_err = $art_err = $tec_err = $success = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){

	if(isset($_POST['submit'])){

    $creator      = $database -> session_to_variabal($_SESSION['ad_id']);

    $school_no    = $database -> form_data_process('school_no');
    $number_err   = $database -> field_missing($school_no,'School Number is Missing');

    $name         = $database -> form_data_process('name');
    $name_err     = $database -> field_missing($name,'Name is Missing');

    $start_date   = $database -> form_data_process('start_date');
    $start_err    = $database -> field_missing($start_date,'Starting Date is Missing');

    $district     = $database -> form_data_process('district');
    $dstct_err    = $database -> field_missing($district,'District is Missing');

    $add_li1      = $database -> post_to_variabal($_POST['add_li1']);
    $add_li2      = $database -> post_to_variabal($_POST['add_li2']);
	$seat 		  = $database -> post_to_variabal($_POST['seat']);
	$municipal 	  = $database -> post_to_variabal($_POST['mu_coun']);
	$territory    = $database -> post_to_variabal($_POST['territory']);

    $division     = $database -> form_data_process('division');
    $division     = $database -> data_existance($division,'education_office','eo_id');

    $division_err = $database -> field_missing($division,'Residential Division is Not Existed OR Missing');

    $primary_si   = $database -> form_data_process('primary_class_si');
    $primary_si   = $database -> change_empty_value($primary_si,'0');

    $primary_ta   = $database -> form_data_process('primary_class_ta');
    $primary_ta   = $database -> change_empty_value($primary_ta,'0');

    $primary_en   = $database -> form_data_process('primary_class_en');
    $primary_en   = $database -> change_empty_value($primary_en,'0');

    $ol_si        = $database -> form_data_process('ol_class_si');
    $ol_si        = $database -> change_empty_value($ol_si,'0');

    $ol_ta        = $database -> form_data_process('ol_class_ta');
    $ol_ta        = $database -> change_empty_value($ol_ta,'0');

    $ol_en        = $database -> form_data_process('ol_class_en');
    $ol_en        = $database -> change_empty_value($ol_en,'0');

    $science_si   = $database -> form_data_process('science_class_si');
    $science_si   = $database -> change_empty_value($science_si,'0');

    $science_ta   = $database -> form_data_process('science_class_ta');
    $science_ta   = $database -> change_empty_value($science_ta,'0');

    $science_en   = $database -> form_data_process('science_class_en');
    $science_en   = $database -> change_empty_value($science_en,'0');

    $commerce_si  = $database -> form_data_process('commerce_class_si');
    $commerce_si  = $database -> change_empty_value($commerce_si,'0');

    $commerce_ta  = $database -> form_data_process('commerce_class_ta');
    $commerce_ta  = $database -> change_empty_value($commerce_ta,'0');

    $commerce_en  = $database -> form_data_process('commerce_class_en');
    $commerce_en  = $database -> change_empty_value($commerce_en,'0');

    $art_si       = $database -> form_data_process('art_class_si');
    $art_si       = $database -> change_empty_value($art_si,'0');

    $art_ta       = $database -> form_data_process('art_class_ta');
    $art_ta       = $database -> change_empty_value($art_ta,'0');

    $art_en       = $database -> form_data_process('art_class_en');
    $art_en       = $database -> change_empty_value($art_en,'0');

    $tec_si       = $database -> form_data_process('tec_class_si');
    $tec_si       = $database -> change_empty_value($tec_si,'0');

    $tec_ta       = $database -> form_data_process('tec_class_ta');
    $tec_ta       = $database -> change_empty_value($tec_ta,'0');

    $tec_en       = $database -> form_data_process('tec_class_en');
    $tec_en       = $database -> change_empty_value($tec_en,'0');

    $grama        = $database -> post_to_variabal($_POST['grama']);
    $ethnicity    = $database -> post_to_variabal($_POST['ethnicity']);
    $authority    = $database -> post_to_variabal($_POST['authority']);
    $language     = $database -> post_to_variabal($_POST['language']);
    $density      = $database -> post_to_variabal($_POST['den_cat']);
    $class        = $database -> post_to_variabal($_POST['cla_cat']);
    $gender       = $database -> post_to_variabal($_POST['gender']);
    $facility     = $database -> post_to_variabal($_POST['facility']);
    $electricity  = $database -> post_to_variabal($_POST['electricity']);
    $computer_fa  = $database -> post_to_variabal($_POST['com_fa']);

    $counciling   = $database -> post_to_variabal($_POST['coun_unit']);
    $counciling   = $database -> change_empty_value($counciling,'0');


    $water        = $database -> post_to_variabal($_POST['water']);

    $class_room   = $database -> post_to_variabal($_POST['class_room']);
    $class_room   = $database -> change_empty_value($class_room,'0');

    $toilet       = $database -> post_to_variabal($_POST['toilet']);
    $toilet       = $database -> change_empty_value($toilet,'0');

    $admin_room   = $database -> post_to_variabal($_POST['admin']);
    $admin_room   = $database -> change_empty_value($admin_room,'0');

    $library      = $database -> post_to_variabal($_POST['library']);
    $library      = $database -> change_empty_value($library,'0');

    $ol_sci       = $database -> post_to_variabal($_POST['ol_sci']);
    $ol_sci       = $database -> change_empty_value($ol_sci,'0');

    $al_sci       = $database -> post_to_variabal($_POST['al_sci']);
    $al_sci       = $database -> change_empty_value($al_sci,'0');

    $aest_unit    = $database -> post_to_variabal($_POST['aest_unit']);
    $aest_unit    = $database -> change_empty_value($aest_unit,'0');

    $home_sci     = $database -> post_to_variabal($_POST['home_sci']);
    $home_sci     = $database -> change_empty_value($home_sci,'0');

    $gate         = $database -> post_to_variabal($_POST['gate']);
    $wall         = $database -> post_to_variabal($_POST['wall']);
    $pri_qua      = $database -> post_to_variabal($_POST['pri_qua']);
    $ground       = $database -> post_to_variabal($_POST['ground']);
    $play         = $database -> post_to_variabal($_POST['play']);
    $staff_room   = $database -> post_to_variabal($_POST['staff_room']);

    $tec_buil     = $database -> post_to_variabal($_POST['tec_buil']);
    $tec_buil     = $database -> change_empty_value($tec_buil,'0');

    $tec_lab      = $database -> post_to_variabal($_POST['tec_lab']);
    $tec_lab      = $database -> change_empty_value($tec_lab,'0');

    $gym          = $database -> post_to_variabal($_POST['gym']);

    $canteen      = $database -> post_to_variabal($_POST['canteen']);
    $canteen      = $database -> change_empty_value($canteen,'0');

    $computer     = $database -> post_to_variabal($_POST['computer']);
    $computer     = $database -> change_empty_value($computer,'0');

    $com_lab      = $database -> post_to_variabal($_POST['com_lab']);
    $com_lab      = $database -> change_empty_value($com_lab,'0');

    $assembly     = $database -> post_to_variabal($_POST['assembly']);
    $assembly     = $database -> change_empty_value($assembly,'0');

    $tea_toi      = $database -> post_to_variabal($_POST['tea_toi']);
    $tea_toi      = $database -> change_empty_value($tea_toi,'0');

    $aggry        = $database -> post_to_variabal($_POST['aggry']);
    $aggry        = $database -> change_empty_value($aggry,'0');

    $activity     = $database -> post_to_variabal($_POST['activity']);
    $activity     = $database -> change_empty_value($activity,'0');

    $mhostel      = $database -> post_to_variabal($_POST['mhostel']);
    $mhostel      = $database -> change_empty_value($mhostel,'0');

    $fhostel      = $database -> post_to_variabal($_POST['fhostel']);
    $fhostel      = $database -> change_empty_value($fhostel,'0');

    $te_quar      = $database -> post_to_variabal($_POST['te_quar']);

    $store        = $database -> post_to_variabal($_POST['store']);
    $store        = $database -> change_empty_value($store,'0');

    $multi        = $database -> post_to_variabal($_POST['multi']);
    $multi        = $database -> change_empty_value($multi,'0');

    $clc          = $database -> post_to_variabal($_POST['clc']);
    $clc          = $database -> change_empty_value($clc,'0');

    $tel_no       = $database -> post_to_variabal($_POST['tel_no']);
    $land_ex      = $database -> post_to_variabal($_POST['land_ex']);
    $sick         = $database -> post_to_variabal($_POST['sick']);
    $dental       = $database -> post_to_variabal($_POST['dental']);
    $pavilion     = $database -> post_to_variabal($_POST['pavilion']);

    $land         = $database -> post_to_variabal($_POST['land']);
    $land         = $database -> change_empty_value($land,'0');

    $web          = $database -> post_to_variabal($_POST['web']);
    $email        = $database -> post_to_variabal($_POST['email']);

    $ip           = $database -> get_ip_address();
    $host_name    = gethostname();

    if(isset($school_no) AND isset($name) AND isset($start_date) AND isset($division)){
        $success  = $database -> insert_school($school_no,$name,$start_date,$district,$add_li1,$add_li2,$seat,$municipal,$territory,$division,$primary_si,$primary_ta,$primary_en,$ol_si,$ol_ta,$ol_en,$science_si,$science_ta,$science_en,$commerce_si,$commerce_ta,$commerce_en,$art_si,$art_ta,$art_en,$tec_si,$tec_ta,$tec_en,$grama,$ethnicity,$authority,$language,$density,$class,$gender,$facility,$electricity,$computer_fa,$counciling,$water,$class_room,$toilet,$admin_room,$library,$ol_sci,$al_sci,$aest_unit,$home_sci,$gate,$wall,$pri_qua,$ground,$play,$staff_room,$tec_buil,$tec_lab,$gym,$canteen,$computer,$com_lab,$assembly,$tea_toi,$aggry,$activity,$mhostel,$fhostel,$te_quar,$store,$multi,$clc,$tel_no,$land_ex,$sick,$dental,$pavilion,$land,$web,$email,$ip,$host_name,$creator);
    }
    

    

  }
  if(isset($_POST['cancel'])){

    $database -> headerto('createschoolprofile.php');

  }
  if(isset($_POST['back'])){

    $database -> headerto('home.php');
  }
}
?>

<table>
    <?php $database -> table_header('CREATE SCHOOL PROFILE'); ?>

	  <form method="post" action="">

    <?php $database -> table_text_input_upper('School Number:'); ?>
    <input type="text" name="school_no" value="">
    <?php $database -> table_text_input_lower($number_err); ?>

    <?php $database -> table_text_input_upper('Name:'); ?>
    <input type="text" name="name" value="">
    <?php $database -> table_text_input_lower($name_err); ?>

    <?php $database -> table_text_input_upper('Starting Day:'); ?>
    <input type="date" name="start_date" value="">
    <?php $database -> table_text_input_lower($start_err); ?>

    <?php $database -> table_text_input_upper('District:'); ?>
    <select name="district"><?php $dis_query = $database ->table_search('district');
      while($district = mysqli_fetch_assoc($dis_query)){ ?> 
      <option value="<?php echo $district['dt_id']; ?>"><?php echo $district['name']?></option> <?php }?></select>
    <?php $database -> table_text_input_lower($dstct_err); ?>

    <?php $database -> table_text_input_upper('Address Line 1:'); ?>
    <input type="text" name="add_li1" value="">
    <?php $database -> table_text_input_lower(NULL); ?>
   
    <?php $database -> table_text_input_upper('Address Line 2:'); ?>
    <input type="text" name="add_li2" value="">
    <?php $database -> table_text_input_lower(NULL); ?>

    <?php $database -> table_text_input_upper('Election Seat:'); ?>
    <select name="seat"> <?php $seat_query = $database ->table_search('seat');
      while($seat = mysqli_fetch_assoc($seat_query)){ ?> 
      <option value="<?php echo $seat['se_id']; ?>"><?php echo $seat['name']?></option> <?php }?></select>
    <?php $database -> table_text_input_lower(NULL); ?>

    <?php $database -> table_text_input_upper('Municipal Council:'); ?>
    <select name="mu_coun"> <?php $mu_query = $database ->table_search('municipal_council');
      while($mu_coun = mysqli_fetch_assoc($mu_query)){ ?> 
      <option value="<?php echo $mu_coun['mc_id']; ?>"><?php echo $mu_coun['name']?></option> <?php }?></select>
    <?php $database -> table_text_input_lower(NULL); ?>
   
    <?php $database -> table_text_input_upper('Territory'); ?>
    <select name="territory"> <?php $ter_query = $database ->table_search('territory');
      while($territory = mysqli_fetch_assoc($ter_query)){ ?> 
      <option value="<?php echo $territory['tr_id']; ?>"><?php echo $territory['name']?></option><?php }?></select>
    <?php $database -> table_text_input_lower(NULL); ?>
    
    <?php $database -> table_text_input_upper('Educational Division:'); ?>
    <select name="division"><?php $div_query = $database -> find_division();
      while($division = mysqli_fetch_assoc($div_query)){ ?> 
      <option value="<?php echo $division['eo_id']; ?>"><?php echo $division['name']?></option> <?php }?> </select>
    <?php $database -> table_text_input_lower(NULL); ?>
    
    <?php $database -> table_text_input_upper('Classes for Grade(1-5):'); ?>
    <input type="number" name="primary_class_si" placeholder="Sinhala" value="" min="0" max="15">
    <input type="number" name="primary_class_ta" placeholder="Tamil" value="" min="0" max="15">
    <input type="number" name="primary_class_en" placeholder="English" value="" min="0" max="15">
    <?php $database -> table_text_input_lower(NULL); ?>

    <?php $database -> table_text_input_upper('Classes for Grade(6-11):'); ?>
    <input type="number" name="ol_class_si" placeholder="Sinhala" value="" min="0" max="15">
    <input type="number" name="ol_class_ta" placeholder="Tamil" value="" min="0" max="15">
    <input type="number" name="ol_class_en" placeholder="English" value="" min="0" max="15">
    <?php $database -> table_text_input_lower(NULL); ?>

    <?php $database -> table_text_input_upper('Classes for Grade(Science):'); ?>
    <input type="number" name="science_class_si" placeholder="Sinhala" value="" min="0" max="15">
    <input type="number" name="science_class_ta" placeholder="Tamil" value="" min="0" max="15">
    <input type="number" name="science_class_en" placeholder="English" value="" min="0" max="15">
    <?php $database -> table_text_input_lower(NULL); ?>

    <?php $database -> table_text_input_upper('Classes for Grade(Commerce):'); ?>
    <input type="number" name="commerce_class_si" placeholder="Sinhala" value="" min="0" max="15">
    <input type="number" name="commerce_class_ta" placeholder="Tamil" value="" min="0" max="15">
    <input type="number" name="commerce_class_en" placeholder="English" value="" min="0" max="15">
    <?php $database -> table_text_input_lower(NULL); ?>

    <?php $database -> table_text_input_upper('Classes for Grade(Art):'); ?>
    <input type="number" name="art_class_si" placeholder="Sinhala" value="" min="0" max="15">
    <input type="number" name="art_class_ta" placeholder="Tamil" value="" min="0" max="15">
    <input type="number" name="art_class_en" placeholder="English" value="" min="0" max="15">
    <?php $database -> table_text_input_lower(NULL); ?>

    <?php $database -> table_text_input_upper('Classes for Grade(Technology):'); ?>
    <input type="number" name="tec_class_si" placeholder="Sinhala" value="" min="0" max="15">
    <input type="number" name="tec_class_ta" placeholder="Tamil" value="" min="0" max="15">
    <input type="number" name="tec_class_en" placeholder="English" value="" min="0" max="15">
    <?php $database -> table_text_input_lower(NULL); ?>

    <?php $database -> table_text_input_upper('Grama Niladhari Division:'); ?>
    <select name="grama"><option value="0" selected>-None-</option><?php $grama_query = $database ->table_search('grama');
      while($grama = mysqli_fetch_assoc($grama_query)){ ?> 
      <option value="<?php echo $grama['gr_id']; ?>"><?php echo $grama['name']." ".$grama['number']?></option> <?php } ?></select>
    <?php $database -> table_text_input_lower(NULL); ?>
    
    <?php $database -> table_text_input_upper('Ethnic Catagory:'); ?>
    <select name="ethnicity"> <?php $eth_query = $database ->table_search('ethnicity');
      while($ethnicity = mysqli_fetch_assoc($eth_query)){?> 
      <option value="<?php echo $ethnicity['et_id']; ?>"><?php echo $ethnicity['name']?></option> <?php } ?></select>
    <?php $database -> table_text_input_lower(NULL); ?>

    <?php $database -> table_text_input_upper('Authority Catagory:'); ?>
    <select name="authority"> <?php $auth_query = $database ->table_search('authority');
      while($authority = mysqli_fetch_assoc($auth_query)){ ?> 
      <option value="<?php echo $authority['au_id']; ?>"><?php echo $authority['name']?></option> <?php } ?></select>
    <?php $database -> table_text_input_lower(NULL); ?>
    
    <?php $database -> table_text_input_upper('Language Catagory:'); ?>
    <select name="language"><?php $lang_query = $database ->table_search('language_medium');
      while($language = mysqli_fetch_assoc($lang_query)){ ?> 
      <option value="<?php echo $language['lm_id']; ?>"><?php echo $language['name']?></option> <?php } ?></select>
    <?php $database -> table_text_input_lower(NULL); ?>

    <?php $database -> table_text_input_upper('Density Catagory:'); ?>
    <select name="den_cat"><?php $den_query = $database ->table_search('density_catagory');
      while($den_cat = mysqli_fetch_assoc($den_query)){ ?> 
      <option value="<?php echo $den_cat['dc_id']; ?>"><?php echo $den_cat['name']?></option> <?php } ?></select>
    <?php $database -> table_text_input_lower(NULL); ?>

    <?php $database -> table_text_input_upper('Class Catagory:'); ?>
    <select name="cla_cat"> <?php $cla_query = $database ->table_search('class_catagory');
      while($cla_cat = mysqli_fetch_assoc($cla_query)){ ?> 
      <option value="<?php echo $cla_cat['cc_id']; ?>"><?php echo $cla_cat['name']?></option> <?php } ?></select>
    <?php $database -> table_text_input_lower(NULL); ?>
    
    <?php $database -> table_text_input_upper('Gender Catagory:'); ?>
    <select name="gender"><?php $gen_query = $database ->table_search('gender');
      while($gender = mysqli_fetch_assoc($gen_query)){ ?> 
      <option value="<?php echo $gender['ge_id']; ?>"><?php echo $gender['name']?></option> <?php } ?></select>
    <?php $database -> table_text_input_lower(NULL); ?>
    
    <?php $database -> table_text_input_upper('Facility:'); ?>
    <select name="facility"> <option value="0" selected>-None-</option><?php $fac_query = $database ->table_search('facility_level');
      while($facility = mysqli_fetch_assoc($fac_query)){ ?> 
      <option value="<?php echo $facility['fl_id']; ?>"><?php echo $facility['name']?></option> <?php } ?></select>
    <?php $database -> table_text_input_lower(NULL); ?>

    <?php $database -> table_text_input_upper('Electricity:'); ?>
    <input type="radio" name="electricity" value="1" > Yes
    <input type="radio" name="electricity" value="2" checked> No
    <?php $database -> table_text_input_lower(NULL); ?>

    <?php $database -> table_text_input_upper('Communication Facility:'); ?>
    <input type="radio" name="com_fa" value="1" > Yes
    <input type="radio" name="com_fa" value="2" checked> No
    <?php $database -> table_text_input_lower(NULL); ?>

    <?php $database -> table_text_input_upper('Counciling Unit(squre meter):'); ?>
    <input type="number" name="coun_unit" value="">
    <?php $database -> table_text_input_lower(NULL); ?>

    <?php $database -> table_text_input_upper('Water Supply:'); ?>
    <input type="radio" name="water" value="1" > Yes
    <input type="radio" name="water" value="2"checked> No
    <?php $database -> table_text_input_lower(NULL); ?>

    <?php $database -> table_text_input_upper('Class Room(amount):'); ?>
    <input type="number" name="class_room" value="">
    <?php $database -> table_text_input_lower(NULL); ?>

    <?php $database -> table_text_input_upper('Student Toilet(amount):'); ?>
    <input type="number" name="toilet" value="">
    <?php $database -> table_text_input_lower(NULL); ?>

    <?php $database -> table_text_input_upper('Administration Unit(squre meter):'); ?>
    <input type="number" name="admin" value="">
    <?php $database -> table_text_input_lower(NULL); ?>

    <?php $database -> table_text_input_upper('Library(squre meter):'); ?>
    <input type="number" name="library" value="">
    <?php $database -> table_text_input_lower(NULL); ?>

    <?php $database -> table_text_input_upper('O/L Science Lab(squre meter):'); ?>
    <input type="number" name="ol_sci" value="">
    <?php $database -> table_text_input_lower(NULL); ?>

    <?php $database -> table_text_input_upper('A/L Science Lab(squre meter):'); ?>
    <input type="number" name="al_sci" value="">
    <?php $database -> table_text_input_lower(NULL); ?>

    <?php $database -> table_text_input_upper('Aesthetic Unit(squre meter):'); ?>
    <input type="number" name="aest_unit" value="">
    <?php $database -> table_text_input_lower(NULL); ?>

    <?php $database -> table_text_input_upper('Home Science Unit(squre meter):'); ?>
    <input type="number" name="home_sci" value="">
    <?php $database -> table_text_input_lower(NULL); ?>

    <?php $database -> table_text_input_upper('Gate:'); ?>
    <input type="radio" name="gate" value="1"> Yes
    <input type="radio" name="gate" value="2" checked> No
    <?php $database -> table_text_input_lower(NULL); ?>

    <?php $database -> table_text_input_upper('Wall:'); ?>
    <input type="radio" name="wall" value="1"> Yes
    <input type="radio" name="wall" value="2" checked> No
    <?php $database -> table_text_input_lower(NULL); ?>
   
    <?php $database -> table_text_input_upper('Principal Quaters:'); ?>
    <input type="radio" name="pri_qua" value="1"> Yes
    <input type="radio" name="pri_qua" value="2" checked> No
    <?php $database -> table_text_input_lower(NULL); ?>

    <?php $database -> table_text_input_upper('Ground:'); ?>
    <input type="radio" name="ground" value="1"> Yes
    <input type="radio" name="ground" value="2" checked> No
    <?php $database -> table_text_input_lower(NULL); ?>

    <?php $database -> table_text_input_upper('Play Area:'); ?>
    <input type="radio" name="play" value="1"> Yes
    <input type="radio" name="play" value="2" checked> No
    <?php $database -> table_text_input_lower(NULL); ?>

    <?php $database -> table_text_input_upper('Staff Room:'); ?>
    <input type="radio" name="staff_room" value="1"> Yes
    <input type="radio" name="staff_room" value="2" checked> No
    <?php $database -> table_text_input_lower(NULL); ?>
   
    <?php $database -> table_text_input_upper('Technology Building(squre meter):'); ?>
    <input type="number" name="tec_buil" value="">
    <?php $database -> table_text_input_lower(NULL); ?>
   
    <?php $database -> table_text_input_upper('Technology Lab(squre meter):'); ?>
    <input type="number" name="tec_lab" value="">
    <?php $database -> table_text_input_lower(NULL); ?>

    <?php $database -> table_text_input_upper('Gymnasium:'); ?>
    <input type="radio" name="gym" value="1" > Yes
    <input type="radio" name="gym" value="2" checked> No
    <?php $database -> table_text_input_lower(NULL); ?>
   
    <?php $database -> table_text_input_upper('Canteen/Cafeteria(squre meter):'); ?>
    <input type="number" name="canteen" value="">
    <?php $database -> table_text_input_lower(NULL); ?>

    <?php $database -> table_text_input_upper('Computers(amount):'); ?>
    <input type="number" name="computer" value="">
    <?php $database -> table_text_input_lower(NULL); ?>

    <?php $database -> table_text_input_upper('Computer Lab(squre meter):'); ?>
    <input type="number" name="com_lab" value="">
    <?php $database -> table_text_input_lower(NULL); ?>
   
    <?php $database -> table_text_input_upper('Assembly Hall(squre meter):'); ?>
    <input type="number" name="assembly" value="">
    <?php $database -> table_text_input_lower(NULL); ?>

    <?php $database -> table_text_input_upper('Teachers Toilets(amount):'); ?>
    <input type="number" name="tea_toi" value="">
    <?php $database -> table_text_input_lower(NULL); ?>

    <?php $database -> table_text_input_upper('Aggriculture Unit(squre meter):'); ?>
    <input type="number" name="aggry" value="">
    <?php $database -> table_text_input_lower(NULL); ?>
   
    <?php $database -> table_text_input_upper('Activity Room(squre meter):'); ?>
    <input type="number" name="activity" value="">
    <?php $database -> table_text_input_lower(NULL); ?>
   
    <?php $database -> table_text_input_upper('Male Hostel(squre meter):'); ?>
    <input type="number" name="mhostel" value="">
    <?php $database -> table_text_input_lower(NULL); ?>
   
    <?php $database -> table_text_input_upper('Female Hostel(squre meter):'); ?>
    <input type="number" name="fhostel" value="">
    <?php $database -> table_text_input_lower(NULL); ?>

    <?php $database -> table_text_input_upper('Teachers Quaters:'); ?>
    <input type="radio" name="te_quar" value="1" > Yes
    <input type="radio" name="te_quar" value="2" checked> No
    <?php $database -> table_text_input_lower(NULL); ?>
   
    <?php $database -> table_text_input_upper('Store Room(squre meter):'); ?>
    <input type="number" name="store" value="">
    <?php $database -> table_text_input_lower(NULL); ?>
    
    <?php $database -> table_text_input_upper('Multipurpose Room(squre meter):'); ?>
    <input type="number" name="multi" value="">
    <?php $database -> table_text_input_lower(NULL); ?>

    <?php $database -> table_text_input_upper('CLC Lab(squre meter):'); ?>
    <input type="number" name="clc" value="">
    <?php $database -> table_text_input_lower(NULL); ?>
   
    <?php $database -> table_text_input_upper('Telephone:'); ?>
    <input type="text" name="tel_no" value="">
    <?php $database -> table_text_input_lower(NULL); ?>

    <?php $database -> table_text_input_upper('Land Extend:'); ?>
    <input type="radio" name="land_ex" value="1"> Yes
    <input type="radio" name="land_ex" value="2" checked> No
    <?php $database -> table_text_input_lower(NULL); ?>

    <?php $database -> table_text_input_upper('Sick Room:'); ?>
    <input type="radio" name="sick" value="1" > Yes
    <input type="radio" name="sick" value="2" checked> No
    <?php $database -> table_text_input_lower(NULL); ?>
   
    <?php $database -> table_text_input_upper('Dental Clinic:'); ?>
    <input type="radio" name="dental" value="1" > Yes
    <input type="radio" name="dental" value="2" checked> No
    <?php $database -> table_text_input_lower(NULL); ?>

    <?php $database -> table_text_input_upper('Pavilion:'); ?>
    <input type="radio" name="pavilion" value="1" > Yes
    <input type="radio" name="pavilion" value="2" checked> No
    <?php $database -> table_text_input_lower(NULL); ?>

    <?php $database -> table_text_input_upper('Land Area(squre meter):'); ?>
    <input type="number" name="land" value="">
    <?php $database -> table_text_input_lower(NULL); ?>
    
    <?php $database -> table_text_input_upper('Web:'); ?>
    <input type="text" name="web" value="">
    <?php $database -> table_text_input_lower(NULL); ?>
    
    <?php $database -> table_text_input_upper('E-mail:'); ?>
    <input type="text" name="email" value="">
    <?php $database -> table_text_input_lower(NULL); ?>
   
   </table>

    <input type="submit" name="submit" value="Submit">
    <input type="submit" name="cancel" value="Refresh">
    <input type="submit" name="back" value="Back">
       
    <?php $database -> conditional_display($success); ?> 
</form>


