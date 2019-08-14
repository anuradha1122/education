<?php 
#page number 05

session_start();
#Database configuration
require_once("database_config.php");


#declair database class for all database connections 
class Database{


	public $connection;



	function __construct(){


		$this -> open_db_connection();
	}


	public function open_db_connection(){

		$this->connection = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);

		if(mysqli_connect_errno()){


			die("Database connection fail". mysqli_error());
		}

	}


	public function query($sql){


		$result = mysqli_query($this ->connection, $sql);
		$this ->confirm_query($result);
		return $result;
	}


	public function confirm_query($result){

		if(!$result){


			die("Query Failed". mysql_error());
		}

	}
	

	public function escape_string($string){


		$escaped_string = mysqli_real_escape_string($this ->connection, $string);
		return $escaped_string;

	}



	public function login($email, $psw, $table, $database){


	  $sql = "SELECT * FROM {$table} WHERE (email = '$email' OR nic = '$email') AND (password = '$psw') AND active = '1' AND leave_detail = '0'";
	  $result = $database ->query($sql);

	  $user_find = $this -> fetch_single_detail($result);
	  return $user_find;
	}


	public function fetch_single_detail($result) {


		if(mysqli_num_rows($result)>0){

	    $user_detail = mysqli_fetch_array($result);

	    return $user_detail;

		}else{

		  return $user_detail = NULL;
		}


	}


	public function login_coordinator($email, $psw, $database){

	  $table = 'admin_staff';
	  $user_find = $database ->login($email, $psw, $table, $database);

	  if($user_find == NULL){
	    $table = 'principal';
	    $user_find = $database ->login($email, $psw, $table, $database);

	    if($user_find == NULL){
	      $table = 'teacher';
	      $user_find = $database ->login($email, $psw, $table, $database);

	      if($user_find == NULL){
	       

	      	$login_err = $this ->text_to_variabal("User Name Or password Incorrect");
	      	return $login_err;
	        
	      }else{

	      	$session_name = 'tc_id';
	      	$this ->header_home($user_find, $session_name);

	      }
	    }else{

	      
	      	$session_name = 'pr_id';
	      	$this ->header_home($user_find, $session_name);
	    }
	  }else{

	    
	      	$session_name = 'ad_id';
	      	$this ->header_home($user_find, $session_name);
	  }
	}



	public function header_home($user_find,$session_name){

		$this ->variabal_to_session($user_find["$session_name"],$session_name);
        header("Location:home.php"); 

	}

	public function variabal_to_session($variabal,$session_name) {

		$_SESSION["$session_name"] = $variabal;
	}

	public function session_to_variabal($session_name) {

		$variabal = $session_name;
		return $variabal;
	}

	public function link_to_variabal($link) {

		$variabal = $link;
		return $variabal;
	}

	public function text_to_variabal($text){


		$variabal = $text;
		return $variabal;	
	}

	public function post_to_variabal($post){


		$variabal = $post;
		return $variabal;	
	}

	public function empty_session() {

		if(!isset($_SESSION['tc_id']) AND !isset($_SESSION['ad_id']) AND !isset($_SESSION['pr_id'])){


			header("Location:index.php");
		}
	}

	public function full_session() {

		if(isset($_SESSION['tc_id']) OR isset($_SESSION['ad_id']) OR isset($_SESSION['pr_id'])){


			header("Location:home.php");
		}

	}

	public function display_message($message) {


		echo $message;
	}

	public function conditional_display($message) {


		if($message != NULL) {

			$this ->display_message($message);
		}
	}


	public function home_selection() {



		if(isset($_SESSION['tc_id'])){

			$id = $this -> session_to_variabal($_SESSION['tc_id']);
			$coloumn = "tc_id";
			$table   = "teacher";
			return $this    -> home_catagory($id, $table, $coloumn);
			

		}
		else if(isset($_SESSION['pr_id'])){

			$id = $this -> session_to_variabal($_SESSION['pr_id']);
			$coloumn = "pr_id";
			$table   = "principal";
			return $this    -> home_catagory($id, $table, $coloumn);

		}
		else if(isset($_SESSION['ad_id'])){

			$id = $this -> session_to_variabal($_SESSION['ad_id']);
			$coloumn = "ad_id";
			$table   = "admin_staff";
			return $this    -> home_catagory($id, $table, $coloumn);

		}
	}

	public function restricted_page($page_id){

		if(isset($_SESSION['tc_id'])){

			$id 		= $this -> session_to_variabal($_SESSION['tc_id']);
			$page_found	= $this -> restrict_page_core($id,'teacher','tc_id',$page_id);
	
		}
		else if(isset($_SESSION['pr_id'])){

			$id 		= $this -> session_to_variabal($_SESSION['pr_id']);
			$page_found	= $this -> restrict_page_core($id,'principal','pr_id',$page_id);

		}
		else if(isset($_SESSION['ad_id'])){

			$id 		= $this -> session_to_variabal($_SESSION['ad_id']);
			$page_found	= $this -> restrict_page_core($id,'admin_staff','ad_id',$page_id);

		}
	}

	public function restrict_page_core($id,$table,$coloumn,$page_id){

		$staff 	= $this -> table_by_id($id,$table,$coloumn);
		$position 	= $staff['position'];
		$sql 		= "SELECT * FROM page_restriction WHERE '$page_id'=pg_id AND '$position'=ps_id";
		$result 	= $this -> query($sql);
  		$page_find 	= $this -> fetch_single_detail($result);
  		if($page_find==NULL){
  			$this -> headerto('home.php');
  		}

	}


	public function home_catagory($id, $table, $coloumn) {

		
		$user_detail = $this -> table_by_id($id, $table, $coloumn);
		return $user_detail['position'];

	}

	public function table_by_id($id, $table, $coloumn) {

		$sql = "SELECT * FROM {$table} WHERE {$coloumn} = '$id'";
		$table_query = $this -> query($sql);
		$table_detail = $this -> fetch_single_detail($table_query);
		return $table_detail;

	}

	public function delete_by_id($id, $table, $coloumn) {

		$sql = "DELETE FROM {$table} WHERE {$coloumn} = '$id'";
		$table_query = $this -> query($sql);

	}

	public function current_teacher_search($id) {

		$sql = "SELECT * FROM teacher_appointment WHERE tc_id = '$id' AND appoint_date <> '' AND release_date = ''";
		$table_query = $this -> query($sql);
		$table_detail = $this -> fetch_single_detail($table_query);
		return $table_detail;

	}

	public function current_principal_search($id) {

		$sql = "SELECT * FROM principal_appointment WHERE pr_id = '$id' AND appoint_date <> '' AND release_date = ''";
		$table_query = $this -> query($sql);
		$table_detail = $this -> fetch_single_detail($table_query);
		return $table_detail;

	}

	public function current_admin_search($id) {

		$sql = "SELECT * FROM admin_staff_appointment WHERE ad_id = '$id' AND appoint_date <> '' AND release_date = ''";
		$table_query = $this -> query($sql);
		$table_detail = $this -> fetch_single_detail($table_query);
		return $table_detail;

	}

	public function current_teacher_search_by_school($school_no) {

		$sql = "SELECT * FROM teacher_appointment WHERE school_no = '$school_no' AND appoint_date <> '' AND release_date = ''";
		$table_query = $this -> query($sql);
		return $table_query;

	}

	public function release_teacher_search($school_no) {

		$sql = "SELECT * FROM teacher_appointment WHERE school_no = '$school_no' AND release_school <> '' AND release_date = ''";
		$table_query = $this -> query($sql);
		return $table_query;

	}

	public function release_principal_search($school_no) {

		$sql = "SELECT * FROM principal_appointment WHERE school_no = '$school_no' AND release_school <> '' AND release_date = ''";
		$table_query = $this -> query($sql);
		return $table_query;

	}

	public function old_teacher_search($id) {

		$sql = "SELECT * FROM teacher_appointment WHERE tc_id = '$id' AND appoint_date <> '' AND release_date <> ''";
		$table_query = $this -> query($sql);
		return $table_query;

	}

	public function old_principal_search($id) {

		$sql = "SELECT * FROM principal_appointment WHERE pr_id = '$id' AND appoint_date <> '' AND release_date <> ''";
		$table_query = $this -> query($sql);
		return $table_query;

	}

	public function old_admin_search($id) {

		$sql = "SELECT * FROM admin_staff_appointment WHERE ad_id = '$id' AND appoint_date <> '' AND release_date <> ''";
		$table_query = $this -> query($sql);
		return $table_query;

	}
	

	public function school_appointed_teachers($school_no){

		$sql = "SELECT * FROM teacher_appointment WHERE school_no = '$school_no' AND appoint_date <> '' AND release_date = ''";
		$table_query = $this -> query($sql);
		return $table_query;
	}

	public function select_appointed_teachers($gender,$civil_status,$medium,$race,$religion,$appoint_catagory,$edu_quali,$rank,$prof_quali,$school_no,$app_no,$tec_no,$office_no){

		$sql ="SELECT * FROM teacher_appointment INNER JOIN teacher ON teacher_appointment.tc_id = teacher.tc_id WHERE teacher_appointment.appoint_date <> '' AND teacher_appointment.release_date = '' AND (teacher.gender = '$gender' OR '$gender' = '0') AND (teacher.civil_status = '$civil_status' OR '$civil_status' = '0') AND (teacher.medium = '$medium' OR '$medium' = '0') AND (teacher.race = '$race' OR '$race' = '0') AND (teacher.religion = '$religion' OR '$religion' = '0') AND (teacher.appoint_cat = '$appoint_catagory' OR '$appoint_catagory' = '0') AND (teacher.edu_quali = '$edu_quali' OR '$edu_quali' = '0') AND (teacher.rank = '$rank' OR '$rank' = '0') AND (teacher.prof_quali = '$prof_quali' OR '$prof_quali' = '0') AND (teacher_appointment.school_no = '$school_no' OR '$school_no' = '0') AND (teacher_appointment.division = '$office_no' OR teacher_appointment.zone = '$office_no' OR teacher_appointment.province = '$office_no' OR '$office_no' = '1')  AND (teacher.main_sub = '$app_no' OR '$app_no' = '0') AND (teacher.sec_sub = '$tec_no' OR teacher.third_sub = '$tec_no' OR teacher.forth_sub = '$tec_no' OR teacher.fifth_sub = '$tec_no' OR '$tec_no' = '0')";
		$table_query = $this -> query($sql);
		return $table_query;
	}

	public function school_appointed_principal($school_no){

		$sql = "SELECT * FROM principal_appointment WHERE school_no = '$school_no' AND appoint_date <> '' AND release_date = ''";
		$table_query = $this -> query($sql);
		return $table_query;
	}

	public function office_appointed_adminstaff($office_no){

		$sql = "SELECT * FROM admin_staff_appointment WHERE office_no = '$office_no' AND appoint_date <> '' AND release_date = ''";
		$table_query = $this -> query($sql);
		return $table_query;
	}

	public function table_search($table) {

		$sql = "SELECT * FROM {$table}";
		$table_query = $this -> query($sql);
		return $table_query;

	}

	public function table_search_decend($table) {

		$sql = "SELECT * FROM {$table} ORDER BY rk_id DESC";
		$table_query = $this -> query($sql);
		return $table_query;

	}

	public function table_search_by_element($id,$table,$coloumn) {

		$sql = "SELECT * FROM {$table} WHERE {$coloumn} = '$id'";
		$table_query = $this -> query($sql);
		return $table_query;

	}

	public function table_search_by_two_element($id1,$id2,$table,$coloumn1,$coloumn2) {

		$sql = "SELECT * FROM {$table} WHERE {$coloumn1} = '$id1' AND {$coloumn2} = '$id2'";
		$table_query = $this -> query($sql);
		return $table_query;

	}

	public function table_search_by_two_value($id1,$id2,$table,$coloumn) {

		$sql = "SELECT * FROM {$table} WHERE {$coloumn} = '$id1' OR {$coloumn} = '$id2'";
		$table_query = $this -> query($sql);
		return $table_query;

	}

	public function table_distinct($table,$coloumn) {

		$sql = "SELECT DISTINCT {$coloumn} FROM {$table}";
		$table_query = $this -> query($sql);
		return $table_query;

	}

	public function find_division(){

		$sql = "SELECT * FROM education_office WHERE higher_zone_no <> ''";
		$table_query = $this -> query($sql);
		return $table_query;
	}

	public function find_province(){

		$sql = "SELECT * FROM education_office WHERE higher_provi_no = ''";
		$table_query = $this -> query($sql);
		return $table_query;
	}

	public function find_zone(){

		$sql = "SELECT * FROM education_office WHERE higher_provi_no <> '' AND higher_zone_no =''";
		$table_query = $this -> query($sql);
		return $table_query;
	}

	public function headerto($location){

		header("Location:{$location}");
	}

	public function logout(){


		if(isset($_GET['logout'])){
	  		session_destroy();
	  		$this -> headerto('index.php');
	   }
	}

	public function logout_form(){

		?>

		<form action="" method="post">
		<button type="submit" name="logout">Logout</button>
		</form>

		<?php
	}

	public function form_data_process($post_name){

		if($_POST["{$post_name}"] != NULL){

			$variabal 	= $this -> post_to_variabal($_POST["{$post_name}"]);
			return $variabal;

		}else{

			$variabal = NULL;
			return $variabal;
		}
	}


	public function field_missing($field,$message){

		if($field == NULL){

	      $error = $message;
	      return $error;
	    }


	}

	public function change_empty_value($variable,$number) {

		if($variable ==""){

			$variable = $number;
			return $variable;
		}
		else{
			return $variable;
		}

	}

	public function insert_admin($emp_no,$first_name,$middle_name,$last_name,$sir_name,$birthday,$add_li1,$add_li2,$add_li3,$division,$gender,$race,$religion,$civil_status,$app_date,$nic,$tel,$medium,$position,$ed_qu,$pr_qu,$rank,$email,$password,$creator,$ip,$host_name,$office_no){

		if($first_name AND $last_name AND $birthday AND $add_li1 AND $add_li2 AND $add_li3 AND $division AND $app_date AND $nic AND $tel AND $email AND $password AND $office_no !=""){

	      $insert = "INSERT INTO admin_staff 
	                (emp_no,first_name,middle_name,last_name,sir_name,birth_day,add_li1,add_li2,add_li3,division,gender,race,religion,civil_status,
	                	appoint_date,nic,tel_no,medium,position,edu_quali,prof_quali,rank,email,password,created_by,leave_detail,active,ip,date_time,host_name) 
	                VALUES 
	                ('a','a','a','a','a','$birthday','a','a','a','1','$gender',
	                	'$race','$religion','$civil_status','$app_date','$nic','$tel','$medium','$position','$ed_qu','$pr_qu','$rank','$email',
	                	'$password','$creator','1','0','$ip',now(),'$host_name')";

	      $result = $this ->query($insert);

	      $admin_detail = $this -> table_by_id($email,'admin_staff','email');
	      $ad_id 			= $admin_detail['ad_id'];

	      $office_ad 	= "INSERT INTO admin_staff_appointment
	      					(ad_id,office_no,appoint_date)
	      					VALUES 
	                		('$ad_id','$office_no','$app_date')";


		  $ad_result 	= $this ->query($office_ad);

	      if($result == '1'){

	      	return $result="Record created Successfully";
	      }
	      
	    }
	}


	public function insert_principal($emp_no,$first_name,$middle_name,$last_name,$sir_name,$birthday,$add_li1,$add_li2,$add_li3,$division,$gender,$race,$religion,$civil_status,$app_date,$app_state,$nic,$tel,$medium,$position,$ed_qu,$pr_qu,$rank,$email,$password,$creator,$ip,$host_name,$school){

		if($first_name AND $last_name AND $birthday AND $add_li1 AND $add_li2 AND $add_li3 AND $division AND $app_date AND $nic AND $tel AND $email AND $school AND $password !=""){
			
	      $insert = "INSERT INTO principal 
	                (emp_no,first_name,middle_name,last_name,sir_name,birth_day,add_li1,add_li2,add_li3,division,gender,race,religion,civil_status,
	                	appoint_date,appoint_state,nic,tel_no,medium,edu_quali,prof_quali,rank,position,email,password,created_by,active,leave_detail,ip,date_time,host_name) 
	                VALUES 
	                ('$emp_no','$first_name','$middle_name','$last_name','$sir_name','$birthday','$add_li1','$add_li2','$add_li3','$division','$gender',
	                	'$race','$religion','$civil_status','$app_date','$app_state','$nic','$tel','$medium','$ed_qu','$pr_qu','$rank','$position','$email',
	                	'$password','$creator','0','0','$ip',now(),'$host_name')";

	      $result = $this ->query($insert);

	      $princi_detail = $this -> table_by_id($email,'principal','email');
	      $pr_id 			= $princi_detail['pr_id'];

	      $school_no = $school['school_no'];
	      $school_pri 	= "INSERT INTO principal_appointment
	      					(pr_id,school_no,appoint_date)
	      					VALUES 
	                		('$pr_id','$school_no','$app_date')";


		  $pr_result 	= $this ->query($school_pri);
	      if($result == '1'){

	      	return $result="Record created Successfully";
	      }
	      
	    }
	}

	public function insert_principal_temp($emp_no,$first_name,$middle_name,$last_name,$sir_name,$birthday,$add_li1,$add_li2,$add_li3,$division,$gender,$race,$religion,$civil_status,$app_date,$nic,$tel,$medium,$position,$ed_qu,$pr_qu,$rank,$email,$password,$creator,$ip,$host_name,$school){

		if($first_name AND $last_name AND $birthday AND $add_li1 AND $add_li2 AND $add_li3 AND $division AND $app_date AND $nic AND $tel AND $email AND $school AND $password !=""){

	      $insert = "INSERT INTO principal 
	                (emp_no,first_name,middle_name,last_name,sir_name,birth_day,add_li1,add_li2,add_li3,division,gender,race,religion,civil_status,
	                	appoint_date,nic,tel_no,medium,edu_quali,prof_quali,rank,position,email,password,created_by,active,leave_detail,ip,date_time,host_name) 
	                VALUES 
	                ('$emp_no','$first_name','$middle_name','$last_name','$sir_name','$birthday','$add_li1','$add_li2','$add_li3','$division','$gender',
	                	'$race','$religion','$civil_status','$app_date','$nic','$tel','$medium','$ed_qu','$pr_qu','$rank','$position','$email',
	                	'$password','$creator','1','0','$ip',now(),'$host_name')";

	      $result = $this ->query($insert);

	      $princi_detail = $this -> table_by_id($email,'principal','email');
	      $pr_id 			= $princi_detail['pr_id'];

	      $school_no = $school['school_no'];
	      $school_pri 	= "INSERT INTO principal_appointment
	      					(pr_id,school_no,appoint_date,appoint_ip,start_date,appoint_host)
	      					VALUES 
	                		('$pr_id','$school_no','$app_date','1','$app_date','1')";


		  $pr_result 	= $this ->query($school_pri);
	      if($result == '1'){

	      	return $result="Record created Successfully";
	      }
	      
	    }
	}

	public function insert_teacher($emp_no,$first_name,$middle_name,$last_name,$sir_name,$birthday,$add_li1,$add_li2,$add_li3,$division,$gender,$race,$religion,$civil_status,$app_date,$app_state,$app_cata,$nic,$tel,$medium,$position,$ed_qu,$pr_qu,$rank,$function,$sub1,$sub2,$sub3,$sub4,$sub5,$email,$password,$creator,$ip,$host_name,$school){

		if($first_name AND $last_name AND $birthday AND $add_li1 AND $add_li2 AND $add_li3 AND $division AND $app_date AND $nic AND $tel AND $email AND $school AND $password !=""){

	      $insert 		= "INSERT INTO teacher 
	                		(emp_no,first_name,middle_name,last_name,sir_name,birth_day,add_li1,add_li2,add_li3,division,gender,race,religion,civil_status,
	                		appoint_date,appoint_state,nic,tel_no,medium,edu_quali,prof_quali,appoint_cat,position,cur_function,main_sub,sec_sub,third_sub,forth_sub,fifth_sub,rank,
	                		email,password,created_by,active,leave_detail,ip,date_time,host_name) 
	               		 	VALUES 
	                		('$emp_no','$first_name','$middle_name','$last_name','$sir_name','$birthday','$add_li1','$add_li2','$add_li3','$division','$gender',
	                		'$race','$religion','$civil_status','$app_date','$app_state','$nic','$tel','$medium','$ed_qu','$pr_qu','$app_cata','$position',
	                		'$function','$sub1','$sub2','$sub3','$sub4','$sub5','$rank','$email','$password','$creator','1','0','$ip',now(),'$host_name')";

	    $result 		= $this ->query($insert);

	    $teacher_detail = $this -> table_by_id($email,'teacher','email');
	    $tc_id 			= $teacher_detail['tc_id'];

	      $school_no = $school['school_no'];
	      $school_tea 	= "INSERT INTO teacher_appointment
	      					(tc_id,school_no,appoint_date,catagory)
	      					VALUES 
	                		('$tc_id','$school_no','$app_date','$app_state')";


		  $te_result 	= $this ->query($school_tea);

	      if($result == '1'){
	      	return $result="Record created Successfully";
	      }
	      
	    }
	}

	public function insert_teacher_temp($emp_no,$first_name,$middle_name,$last_name,$sir_name,$birthday,$add_li1,$add_li2,$add_li3,$division,$gender,$race,$religion,$civil_status,$app_date,$app_state,$app_cata,$nic,$tel,$medium,$position,$ed_qu,$pr_qu,$rank,$function,$sub1,$sub2,$sub3,$sub4,$sub5,$email,$password,$creator,$ip,$host_name,$school){

		if($first_name AND $last_name AND $birthday AND $add_li1 AND $add_li2 AND $add_li3 AND $division AND $app_date AND $nic AND $tel AND $email AND $school AND $password !=""){

	      $insert 		= "INSERT INTO teacher 
	                		(emp_no,first_name,middle_name,last_name,sir_name,birth_day,add_li1,add_li2,add_li3,division,gender,race,religion,civil_status,
	                		appoint_date,appoint_state,nic,tel_no,medium,edu_quali,prof_quali,appoint_cat,position,cur_function,main_sub,sec_sub,third_sub,forth_sub,fifth_sub,rank,
	                		email,password,created_by,active,leave_detail,ip,date_time,host_name) 
	               		 	VALUES 
	                		('$emp_no','$first_name','$middle_name','$last_name','$sir_name','$birthday','$add_li1','$add_li2','$add_li3','$division','$gender',
	                		'$race','$religion','$civil_status','$app_date','$app_state','$nic','$tel','$medium','$ed_qu','$pr_qu','$app_cata','$position',
	                		'$function','$sub1','$sub2','$sub3','$sub4','$sub5','$rank','$email','$password','$creator','1','0','$ip',now(),'$host_name')";

	    $result 		= $this ->query($insert);

	    $teacher_detail = $this -> table_by_id($email,'teacher','email');
	    $tc_id 			= $teacher_detail['tc_id'];

	      $school_no = $school['school_no'];
	      $school_tea 	= "INSERT INTO teacher_appointment
	      					(tc_id,school_no,appoint_date,catagory,appoint_ip,start_date,appoint_host)
	      					VALUES 
	                		('$tc_id','$school_no','$app_date','$app_state','1','$app_date','1')";


		  $te_result 	= $this ->query($school_tea);

	      if($result == '1'){
	      	return $result="Record created Successfully";
	      }
	      
	    }
	}

	public function insert_teacher_history($nic,$school,$school2,$division,$zone,$province,$state,$f_date,$teaching1,$teaching2,$teaching3,$teaching4){

		$teacher = $this -> table_by_id($nic,'teacher','nic');
		$current = $this -> current_teacher_search($teacher['tc_id']);
		if(isset($current)){

			$update = $this -> update_history($teacher['tc_id'],$f_date);
			$update = $this -> insert_history($teacher['tc_id'],$school,$school2,$division,$zone,$province,$f_date,$state,$teaching1,$teaching2,$teaching3,$teaching4);
		}
	}

	public function insert_principal_history($nic,$school,$f_date){

		$principal = $this -> table_by_id($nic,'principal','nic');
		$current = $this -> current_principal_search($principal['pr_id']);
		if(isset($current)){
			$update = $this -> update_history_principal($principal['pr_id'],$f_date);
			$update = $this -> insert_history_principal($principal['pr_id'],$school,$f_date);
		}
	}

	public function update_history($id,$f_date) {

		$sql = "UPDATE teacher_appointment SET  release_date = '$f_date', release_school = '1',release_ip = '1', release_host = '1', last_date = now() WHERE tc_id = '$id' AND start_date <> '' AND release_date = ''";
		$table_update = $this -> query($sql);
		
	}

	public function insert_history( $id, $school, $school2,$division,$zone,$province, $day, $state,$teaching1,$teaching2,$teaching3,$teaching4){

		$sql = "INSERT INTO teacher_appointment (tc_id,school_no,school2,division,zone,province,teach_sub1,teach_sub2,teach_sub3,teach_sub4,appoint_date,catagory,appoint_ip,start_date,appoint_host) VALUES ('$id','$school','$school2','$division','$zone','$province','$teaching1','$teaching2','$teaching3','$teaching4','$day','$state','1',now(),'1') ";
    	$table_update = $this -> query($sql);

	}



	public function update_history_principal($id,$f_date) {

		$sql = "UPDATE principal_appointment SET  release_date = '$f_date', release_school = '1',release_ip = '1', release_host = '1', last_date = now() WHERE pr_id = '$id' AND start_date <> '' AND release_date = ''";
		$table_update = $this -> query($sql);
		
	}

	public function insert_history_principal( $id, $school, $day){

		$sql = "INSERT INTO principal_appointment (pr_id,school_no,appoint_date,appoint_ip,start_date,appoint_host) VALUES ('$id','$school','$day','1',now(),'1') ";
    	$table_update = $this -> query($sql);

	}

	public function insert_change( $id, $catagory, $previous, $creator){

		$sql = "INSERT INTO teacher_history (tc_id,catagory,previous,creator,c_date) VALUES ('$id','$catagory','$previous','$creator',curdate()) ";
    	$table_update = $this -> query($sql);

	}

	public function insert_school($school_no,$name,$start_date,$district,$add_li1,$add_li2,$seat,$municipal,$territory,$division,$primary_si,$primary_ta,$primary_en,$ol_si,$ol_ta,$ol_en,$science_si,$science_ta,$science_en,$commerce_si,$commerce_ta,$commerce_en,$art_si,$art_ta,$art_en,$tec_si,$tec_ta,$tec_en,$grama,$ethnicity,$authority,$language,$density,$class,$gender,$facility,$electricity,$computer_fa,$counciling,$water,$class_room,$toilet,$admin_room,$library,$ol_sci,$al_sci,$aest_unit,$home_sci,$gate,$wall,$pri_qua,$ground,$play,$staff_room,$tec_buil,$tec_lab,$gym,$canteen,$computer,$com_lab,$assembly,$tea_toi,$aggry,$activity,$mhostel,$fhostel,$te_quar,$store,$multi,$clc,$tel_no,$land_ex,$sick,$dental,$pavilion,$land,$web,$email,$ip,$host_name,$creator ){

		if($school_no AND $name AND $start_date AND $district AND $division !=""){
			

			$insert = "INSERT INTO school 
	                (school_no,name,start_date,district,add_li1,add_li2,elec_seat,muni_coun,territory,edu_division,primary_si,primary_ta,primary_en,ol_si,ol_ta,ol_en,science_si,science_ta,science_en,commerce_si,commerce_ta,commerce_en,art_si,art_ta,art_en,tec_si,tec_ta,tec_en,gra_div_no,cat_by_ethi,cat_by_auth,cat_by_lang,cat_by_cls,cat_by_den,cat_by_gen,cat_by_facil,electricity,computer_fa,counciling_unit,water_supply,class_room,stu_toilet,admin_unit,library,ol_sci_lab,al_sci_lab,aesthetic_unit,home_sci,gate,wall,prin_quart,ground,play_area,staff_room,tech_build,tech_lab,gym,food_service,com_amount,com_lab,assem_hall,tea_toilet,agri_unit,activity_room,hostel_male,hostel_female,te_qurt,store_room,mltiprpse_room,clc_lab,telephone,land_extend,sick_room,dental_clinic,pavilian,land_area,web,email,active,created_by,ip,date_time,host_name) 
	                VALUES 
	                ('$school_no','$name','$start_date','$district','$add_li1','$add_li2','$seat','$municipal','$territory','$division','$primary_si','$primary_ta','$primary_en','$ol_si','$ol_ta','$ol_en','$science_si','$science_ta','$science_en','$commerce_si','$commerce_ta','$commerce_en','$art_si','$art_ta','$art_en','$tec_si','$tec_ta','$tec_en','$grama','$ethnicity','$authority','$language','$class','$density','$gender','$facility','$electricity','$computer_fa','$counciling','$water','$class_room','$toilet','$admin_room','$library','$ol_sci','$al_sci','$aest_unit','$home_sci','$gate','$wall','$pri_qua','$ground','$play','$staff_room','$tec_buil','$tec_lab','$gym','$canteen','$computer','$com_lab','$assembly','$tea_toi','$aggry','$activity','$mhostel','$fhostel','$te_quar','$store','$multi','$clc','$tel_no','$land_ex','$sick','$dental','$pavilion','$land','$web','$email','1','$creator','$ip',now(),'$host_name')";

	      $result = $this ->query($insert);
	      if($result == '1')
	      return $result="Record created Successfully";

		}
	}

	public function insert_comment($staff_id,$position,$creator,$comment,$ip,$catagory){

		if($staff_id AND $creator AND $comment AND $ip AND $catagory !=""){
			
			$insert = "INSERT INTO comment 
	                (staff_id,position,catagory,comment,ad_id,ip,cur_time) 
	                VALUES 
	                ('$staff_id','$position','$catagory','$comment','$creator','$ip',now())";

	      $result = $this ->query($insert);
	      if($result == '1')
	      return $result="Record created Successfully";
	  	}
	}



	public function email_validation($email){

		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  			$email_err = ""; 
  			return $email_err;
		}else{

			return $email;
		}
	}
	

	public function email_existance($email,$table,$ecoloumn){

		$exsist 	= $this -> table_search_by_element($email,$table,$ecoloumn);
		$exsisted 	= $this -> fetch_single_detail($exsist);
		if($exsisted == NULL){

			return $email;
		}else{
			$email = NULL;
			return $email;

		}
	}

	public function data_existance($data,$table,$coloumn){

		$exsist 	= $this -> table_search_by_element($data,$table,$coloumn);
		$exsisted 	= $this -> fetch_single_detail($exsist);
		if($exsisted <> NULL){
			
			return $data;
			
		}else{
			$data = NULL;
			
			return $data;


		}
	}

	public function get_ip_address()
	{
	    if (!empty($_SERVER['HTTP_CLIENT_IP'])){

	      $ip=$_SERVER['HTTP_CLIENT_IP'];

	    }elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
	      
	      $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];

	    }else{
	      
	      $ip=$_SERVER['REMOTE_ADDR'];
	    }
	    
	    return $ip;
	}


	public function table_header($header){
	?>
		<tr>
	      <th><?php echo $header; ?></th>
	    </tr>
	<?php
	}

	public function table_text_input_upper($display){
	?>
		<tr>
	   	<td><?php echo $display;?></td><td>
	<?php
	}


	public function table_text_input_lower($error){
	?>
		</td><td><?php $this -> conditional_display($error); ?></td>
   		</tr>
	<?php
	}


	public function admin_appointment($posi_one,$posi_two,$posi_three,$posi_four,$posi_five,$new_position,$new_staff){

		if($new_position == $posi_one OR $new_position ==$posi_two OR $new_position == $posi_three OR $new_position ==$posi_four OR $new_position == $posi_five){
			$position_find = $this -> table_by_id($new_position,'position','ps_id');
			?> 
			<tr>
			<td id="tablePerson">
				<a href="confirm_appointment_process.php?ad_id=<?php echo $new_staff['ad_id']; ?>">
			<?php
			echo $new_staff['sir_name']." ".$new_staff['first_name']." ".$new_staff['middle_name']." ".$new_staff['last_name'];
			?></a></td><td id="tablePosition"><?php
			echo $position_find['display_name'];
			
			?>
			</td>
			
			</tr>
			<?php
		}
	}

	public function principal_appointment($posi_one,$new_position,$new_staff){

		if($new_position == $posi_one){
			$position_find = $this -> table_by_id($new_position,'position','ps_id');
			?> 
			<tr>
			<td id="tablePerson">
			<a href="confirm_appointment_process.php?pr_id=<?php echo $new_staff['pr_id']; ?>"><?php
			echo $new_staff['sir_name']." ".$new_staff['first_name']." ".$new_staff['middle_name']." ".$new_staff['last_name']; ?></a></td><td id="tablePosition"><?php
			echo $position_find['display_name'];
			?>
			</td>
			
			</tr>
			<?php
		}
	}

	public function teacher_appointment($posi_one,$posi_two,$posi_three,$posi_four,$new_position,$new_staff){

		if($new_position == $posi_one OR $new_position ==$posi_two OR $new_position == $posi_three OR $new_position ==$posi_four){
			$position_find = $this -> table_by_id($new_position,'position','ps_id');
			?>
			<tr>
			<td id="tablePerson">
			<a href="confirm_appointment_process.php?tc_id=<?php echo $new_staff['tc_id']; ?>"><?php
			echo $new_staff['sir_name']." ".$new_staff['first_name']." ".$new_staff['middle_name']." ".$new_staff['last_name']; ?></a></td><td id="tablePosition"><?php
			echo $position_find['display_name'];
			?>
			</td>
			
			</tr>
			<?php
		}
	}


	#confirm_appointment_process
	public function gender_title($person){

		if($person['gender'] =='1'){
			return "Mr. ";
		}
		else if($person['gender'] == '2'){

			if($person['civil_status'] == '1'){

				return "Mrs. ";
			}
			else{

				return "Miss. ";
			}
		}
	}

	public function display_appointed_person($id,$table,$id_coloumn){

		$person = $this -> table_by_id($id,$table,$id_coloumn);
		?>
		<tr>
		<td id="tableField">
		<?php
		$this ->display_message("NAME:");
		?></td><td><?php
		$gender = $this ->gender_title($person);
		$this ->display_message($gender);
		$this ->display_message($person['sir_name']);
		$this ->display_message(" ");
		$this ->display_message($person['first_name']);
		$this ->display_message(" ");
		$this ->display_message($person['middle_name']);
		$this ->display_message(" ");
		$this ->display_message($person['last_name']);
		?>
		</td>
		</tr>
		<tr>
		<td id="tableField">
		<?php
		$position = $this -> table_by_id($person['position'],'position','ps_id');
		$this ->display_message("APPOINTED AS: ");
		?></td><td><?php
		$this ->display_message($position['display_name']);
		?>
		</td>
		</tr>
		<tr>
		<td id="tableField">
		<?php
		$this ->display_message("APPOINTED DATE:");
		?></td><td><?php
		$this ->display_message($person['appoint_date']);
		?>
		</td>
		</tr>
		<tr>
		<td id="tableField">
		<?php
		$this ->display_message("E MAIL:");
		?></td><td><?php
		$this ->display_message($person['email']);
		?>
		</td>
		</tr>
		<tr>
		<td id="tableField">
		<?php
		$this ->display_message("TELEPHONE:");
		?></td><td><?php
		$this ->display_message($person['tel_no']);
		?>
		</td>
		</tr>
		<tr>
		<td id="tableField">
		<?php
		$edu_quali = $this -> table_by_id($person['edu_quali'],'education_qualification','eq_id');
		$this ->display_message("EDUCATIONAL QUALIFICATION:");
		?></td><td><?php
		$this ->display_message($edu_quali['name']);
		?>
		</td>
		</tr>
		<tr>
		<td id="tableField">
		<?php
		$prof_quali = $this -> table_by_id($person['prof_quali'],'prof_qualification','pq_id');
		$this ->display_message("PROFFESIONAL QUALIFICATION:");
		?></td><td><?php
		$this ->display_message($prof_quali['name']);
		?>
		</td>
		</tr>
		<tr>
		<td id="tableField">
		<?php
		$this ->display_message("NIC:");
		?></td><td><?php
		$this ->display_message($person['nic']);
		?>
		</td>
		</tr>
		<tr>
		<td id="tableField">
		<?php
		$rank = $this -> table_by_id($person['rank'],'rank','rk_id');
		$this ->display_message("RANK:");
		?></td><td><?php
		$this ->display_message($rank['name']);
		?>
		</td>
		</tr>
		<tr>
		<td id="tableField">
		<?php
		$medium = $this -> table_by_id($person['medium'],'medium','md_id');
		$this ->display_message("MEDIUM:");
		?></td><td><?php
		$this ->display_message($medium['name']);
		?>
		</td>
		</tr>
		<tr>
		<td id="tableField">
		<?php
		$creator = $this -> table_by_id($person['created_by'],'admin_staff','ad_id');
		$this ->display_message("RECORD CREATED BY:");
		?></td><td><?php
		$this ->gender_title($creator);
		$this ->display_message($creator['sir_name']);
		$this ->display_message(" ");
		$this ->display_message($creator['first_name']);
		$this ->display_message(" ");
		$this ->display_message($creator['middle_name']);
		$this ->display_message(" ");
		$this ->display_message($creator['last_name']);
		?>
		</td>
		</tr>
		<?php
	}

	public function form_button_set(){

		?>
		<form method="post" action="">

	    <input type="submit" name="accept" value="Accept">
	    <input type="submit" name="cancel" value="Cancel">
	    <input type="submit" name="reject" value="Reject">
	    
		</form>
		<?php
	}

	public function update_data_appointment($id, $appoint_table, $main_table, $id_coloumn, $ip, $host) {

		$sql = "UPDATE {$appoint_table} SET  appoint_ip = '$ip', appoint_host = '$host', start_date = now() WHERE {$id_coloumn} = '$id' AND start_date = ''";
		$table_update = $this -> query($sql);

		$sql = "UPDATE {$main_table} SET  active= 1 WHERE {$id_coloumn} = '$id'";
		$table_update = $this -> query($sql);
		
		$this ->headerto('confirm_appointment.php');
	}

	#shutdownteacherprofile.php

	public function update_leave_details($appoint_table, $ip, $host, $date, $id, $id_coloumn){

		$sql = "UPDATE {$appoint_table} SET  release_date = '$date', release_ip = '$ip', last_date = now(), release_host = '$host' WHERE last_date = '' AND {$id_coloumn} = '$id'";
		$table_update = $this -> query($sql);
		
	}

	public function teacher_appoint_by_principal( $id, $school, $day){

		$sql = "INSERT INTO teacher_appointment (tc_id,school_no,appoint_date) VALUES ('$id','$school','$day') ";
    	$table_update = $this -> query($sql);

	}

	public function principal_appoint_by_admin( $id, $school, $day){

		$sql = "INSERT INTO principal_appointment (pr_id,school_no,appoint_date) VALUES ('$id','$school','$day') ";
    	$table_update = $this -> query($sql);

	}
	#changeteacherprofile.php
	
	public function update_one_column($table,$coloumn,$value,$id_coloumn,$id){

		$sql = "UPDATE {$table} SET  {$coloumn}= '$value' WHERE {$id_coloumn} = '$id'";
    	$table_update = $this -> query($sql);
	}

	public function update_from_two_column($table,$coloumn,$value,$id_coloumn1,$id1,$id_coloumn2,$id2){

		$sql = "UPDATE {$table} SET  {$coloumn}= '$value' WHERE {$id_coloumn1} = '$id1' AND {$id_coloumn2} = '$id2'";
    	$table_update = $this -> query($sql);
	}

	public function update_one_intcolumn($table,$coloumn,$value,$id_coloumn,$id){

		$sql = "UPDATE {$table} SET  `{$coloumn}`= '$value' WHERE {$id_coloumn} = '$id'";
    	$table_update = $this -> query($sql);
	}

	public function release_staff($table,$coloumn,$value,$id,$id_coloumn){

		$sql = "UPDATE {$table} SET  {$coloumn}= '$value' WHERE {$id_coloumn} = '$id' AND appoint_date <> '' AND release_date = '' ";
    	$table_update = $this -> query($sql);
	}

	public function find_creator(){

		if(isset($_SESSION['ad_id'])){

            $creator      = $this -> session_to_variabal($_SESSION['ad_id']);
            $creator      = $this -> table_by_id($creator,'admin_staff','ad_id');
            return $creator['emp_no']." ".$_SESSION['ad_id'];

        } elseif (isset($_SESSION['pr_id'])) {

            $creator      = $this -> session_to_variabal($_SESSION['pr_id']);
            $creator      = $this -> table_by_id($creator,'principal','pr_id');
            return $creator['emp_no']." ".$_SESSION['ad_id'];

        } elseif (isset($_SESSION['tc_id'])) {

            $creator      = $this -> session_to_variabal($_SESSION['tc_id']);
            $creator      = $this -> table_by_id($creator,'teacher','tc_id');
            return $creator['emp_no']." ".$_SESSION['ad_id'];
        }
	}

	public function find_position(){

		if(isset($_SESSION['ad_id'])){

            $id = "ad_id";
            return $id;

        } elseif (isset($_SESSION['pr_id'])) {

            $id = "pr_id";
            return $id;

        } elseif (isset($_SESSION['tc_id'])) {

            $id = "tc_id";
            return $id;
        }
	}

	public function find_id(){

		if(isset($_SESSION['ad_id'])){

            $id = $_SESSION['ad_id'];
            return $id;

        } elseif (isset($_SESSION['pr_id'])) {

            $id = $_SESSION['pr_id'];
            return $id;

        } elseif (isset($_SESSION['tc_id'])) {

            $id = $_SESSION['tc_id'];
            return $id;
        }
	}

	public function new_school_subject($id){

		$sql = "INSERT INTO school_subject (sc_id) VALUES ('$id') ";
    	$table_update = $this -> query($sql);

	}

	public function teacher_constitution($subject_no, $sub_cat, $school_subject,$school,$medium){
		?><tr><?php	
		if($school_subject[$subject_no] <> 0){
			$arr[] = $subject_no;
			$count = 0;
			$te_count = 0;
			$class 	 	= $this -> table_by_id($school_subject[$subject_no],'class_teacher','class');
			$subject 	= $this -> table_by_id($subject_no,'subject','su_id');
			?><td id="tableSubject"><a href='teacherconstitutionforsubject.php?sub_id=<?php $this -> display_message($subject_no.",".$medium.",".$sub_cat); ?>'><?php $this -> display_message($subject['name']); ?></a> </td>
			<td id="tableNecessity"><?php
			
			$this -> display_message($class[$sub_cat]); ?></td><?php
			$arr[] = $class[$sub_cat];
			$teacher_quary = $this -> current_teacher_search_by_school($school['school_no']);

			while ($teacher = mysqli_fetch_assoc($teacher_quary)) {
				$teacher_subject = $this -> table_by_id($teacher['tc_id'],'teacher','tc_id');
				if($teacher_subject['main_sub'] == $subject_no AND $teacher_subject['medium'] == $medium){
					$count++;
				}
			}

			?><td id="tableAppointed"><?php
			$this -> display_message($count);
			?></td><?php
			$arr[] = $count;


			$teacher_quary = $this -> current_teacher_search_by_school($school['school_no']);

			while ($teacher = mysqli_fetch_assoc($teacher_quary)) {
				$teacher_subject = $this -> table_by_id($teacher['tc_id'],'teacher','tc_id');
				if($teacher_subject['sec_sub'] == $subject_no OR $teacher_subject['third_sub'] == $subject_no){
					$te_count++;
				}
			}
			?><td id="tableTeaching"><?php
			$this -> display_message($te_count);
			?></td><?php
			$arr[] = $te_count;

			$difference = $class[$sub_cat] - $count;
			if($difference>0){
				?><td id="tableExcess"><?php
				$this -> display_message('0');
				?></td><?php
				?><td id="tableDeficient"><?php
				$this -> display_message($difference);
				?></td><?php
			}
			if($difference<0){
				?><td id="tableExcess"><?php
				$this -> display_message($difference);
				?></td><?php
				?><td id="tableDeficient"><?php
				$this -> display_message('0');
				?></td><?php
			}
			if($difference==0){
				?><td id="tableExcess"><?php
				$this -> display_message('0');
				?></td><?php
				?><td id="tableDeficient"><?php
				$this -> display_message('0');
				?></td><?php
			}
			$arr[] = $difference;

			return $arr;
		}
		?></tr><?php
	}

	public function teacher_constitution_for_subject($subject_no, $sub_cat, $school_subject,$school,$medium){

		if($school_subject[$subject_no] <> 0){
			$count = 0;
			$te_count = 0;
			$class 	 	= $this -> table_by_id($school_subject[$subject_no],'class_teacher','class');
			$subject 	= $this -> table_by_id($subject_no,'subject','su_id'); ?>
			<tr>
			<th>
			<?php $this -> display_message($subject['name']); ?>
			</th>
			<th></th>
			</tr> 
			<tr>
			<td>
			<?php $this -> display_message("Teacher Necessity : "); ?>
			</td>
			<td>
			<?php $this -> display_message($class[$sub_cat]); ?>
			</td>
			</tr>
			<?php
			$arr[] = $class[$sub_cat];
			$teacher_quary = $this -> current_teacher_search_by_school($school['school_no']);

			while ($teacher = mysqli_fetch_assoc($teacher_quary)) {
				$teacher_subject = $this -> table_by_id($teacher['tc_id'],'teacher','tc_id');
				if($teacher_subject['main_sub'] == $subject_no AND $teacher_subject['medium'] == $medium){
					$count++;
				}
			} ?>
			<tr>
			<td>
			<?php $this -> display_message("Current Appointed Teacher Amount : "); ?>
			</td>
			<td>
			<?php $this -> display_message($count); ?>
			</td>
			</tr>
			<?php
			$arr[] = $count;
			$teacher_quary = $this -> current_teacher_search_by_school($school['school_no']);

			while ($teacher = mysqli_fetch_assoc($teacher_quary)) {
				$teacher_subject = $this -> table_by_id($teacher['tc_id'],'teacher','tc_id');
				if($teacher_subject['main_sub'] == $subject_no AND $teacher_subject['medium'] == $medium){
					?>
					<tr>
					<td>
					<?php
					$this -> display_message($teacher_subject['first_name']);
					$this -> display_message(" ");
					$this -> display_message($teacher_subject['last_name']);
					?> </td>
					<td></td>
					</tr>
					<?php
				}
			}

			$teacher_quary = $this -> current_teacher_search_by_school($school['school_no']);

			while ($teacher = mysqli_fetch_assoc($teacher_quary)) {
				$teacher_subject = $this -> table_by_id($teacher['tc_id'],'teacher','tc_id');
				if($teacher_subject['sec_sub'] == $subject_no OR $teacher_subject['third_sub'] == $subject_no){
					$te_count++;
				}
			}
			?>
			<tr>
			<td>
			<?php $this -> display_message("Current Teaching Teacher Amount : "); ?>
			</td>
			<td>
			<?php $this -> display_message($te_count); ?>
			</td>
			</tr>
			<?php 
			$arr[] = $te_count;
			$teacher_quary = $this -> current_teacher_search_by_school($school['school_no']);

			while ($teacher = mysqli_fetch_assoc($teacher_quary)) {
				$teacher_subject = $this -> table_by_id($teacher['tc_id'],'teacher','tc_id');
				if($teacher_subject['sec_sub'] == $subject_no OR $teacher_subject['third_sub'] == $subject_no){
					?>
					<tr>
					<td>
					<?php 
					$this -> display_message($teacher_subject['first_name']);
					$this -> display_message(" ");
					$this -> display_message($teacher_subject['last_name']);
					?>
					</td><td></td>
					</tr>
					<tr>
					<td>
					<?php 
					$this -> display_message(" (Appointed Subject : ");
					$subject_main 	= $this -> table_by_id($teacher_subject['main_sub'],'subject','su_id');
					$this -> display_message($subject_main['name']);
					?>
					</td><td></td>
					</tr>
					<?php
				}
			}
			?>
			<tr>
			<td>
			<?php 
			$this -> display_message("Excess Or Deficient Teacher Amount : ");
			?>
			</td>
			<td>
			<?php
			$difference = $class[$sub_cat] - $count;
			$this -> display_message($difference);
			?>
			</td>
			</tr>
			<?php
			$arr[] = $difference;
			

			$this -> display_message("<br><br>");
			return $arr;
		}
	}
}


?>