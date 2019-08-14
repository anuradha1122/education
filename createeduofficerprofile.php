<?php include("database.php"); 
ob_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>SMS</title>
  <link rel="icon" type="image/png" href="img/title.gif">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>

  <script type="text/javascript">
  $(document).ready(function(){
      $('.search-box1 input[type="text"]').on("keyup input", function(){
          /* Get input value on change */
          var inputVal = $(this).val();
          var resultDropdown = $(this).siblings(".result1");
          if(inputVal.length){
              $.get("createteacherdivsearch.php", {term: inputVal}).done(function(data){
                  // Display the returned data in browser
                  resultDropdown.html(data);
              });
          } else{
              resultDropdown.empty();
          }
      });
      
      // Set search input value on click of result item
      $(document).on("click", ".result1 p", function(){
          $(this).parents(".search-box1").find('input[type="text"]').val($(this).text());
          $(this).parent(".result1").empty();
      });
  });
  </script>

  <script type="text/javascript">
  $(document).ready(function(){
      $('.search-box input[type="text"]').on("keyup input", function(){
          /* Get input value on change */
          var inputVal = $(this).val();
          var resultDropdown = $(this).siblings(".result");
          if(inputVal.length){
              $.get("officesearch.php", {term: inputVal}).done(function(data){
                  // Display the returned data in browser
                  resultDropdown.html(data);
              });
          } else{
              resultDropdown.empty();
          }
      });
      
      // Set search input value on click of result item
      $(document).on("click", ".result p", function(){
          $(this).parents(".search-box").find('input[type="text"]').val($(this).text());
          $(this).parent(".result").empty();
      });
  });
  </script>
  <style>
    /* Remove the navbar's default margin-bottom and rounded borders */ 
    .navbar {
      margin-bottom: 0;
      border-radius: 0;
    }

    .features .glyphicon {

      font-size: 200px;
      padding-top: 10px;
      color: #cc6633;
    }

    .footer {

      background-color: black;
      color: white;

    }

    .result {

      position: absolute;
      background-color: black;
      color: white;
      z-index: 999;

    }
    .result1 {

      position: absolute;
      background-color: black;
      color: white;
      z-index: 999;

    }

    .result2 {

      position: absolute;
      background-color: black;
      color: white;
      z-index: 999;

    }

    #list a:link { color: black; }
    #list a:visited { color: gray; }
    #list a:hover { color: #cc6633; }
    #list a:active { color: #cc6633; }


    #myNavbar a:link { color: white; }
    #myNavbar a:visited { color: white; }
    #myNavbar a:hover { color: #cc6633; }
    #myNavbar a:active { color: green; }

    #brand-text a:link { color: white; }
    #brand-text a:visited { color: white; }
    #brand-text a:hover { color: #cc6633; }
    #brand-text a:active { color: green; }
    /* Add a gray background color and some padding to the footer */
    footer {
      background-color: #f2f2f2;
      padding: 25px;
    }



    /* Hide the carousel text when the screen is less than 600 pixels wide */
    @media (max-width: 600px) {
      .carousel-caption {
        display: none; 
      }
    }


    input[type=text], select, [type=date], [type=password] {
    width: 100%;
    padding: 4px 10px;
    margin: 1px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 10px;
    box-sizing: border-box;
    }


    input[type=submit] {
        width: 32%;
        background-color: black;
        color: white;
        padding: 14px 20px;
        margin: 8px 0;
        border: none;
        border-radius: 10px;
        cursor: pointer;
    }

    input[type=submit]:hover {
        background-color: #cc6633;
    }

    td {

      height: 10px;
    }

    #tableField {
      width: 40%;
      text-align: right;
      
    }

    #tableBox {
      width: 60%;
      text-align:left;

    }

    #tableErr {
      width: 30%;
      text-align:left;
      color: red;

    }
  </style>
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header" id="brand-text">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="home.php">Education</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li><a href="home.php">Home</a></li>
        <li><a href="#">About</a></li>
        <li><a href="#">Projects</a></li>
        <li><a href="#">Contact</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="educationoffice.php"><span class="glyphicon glyphicon-chevron-left"></span> Back</a></li>
        <li><a href="logout.php?id=logout"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
      </ul>
    </div>
  </div>
</nav>
<?php 
 #page number 21

  $database = new Database();

  $database -> empty_session();
  //$database ->restricted_page('9');


$firstnme_err = $lastnme_err = $birthday_err = $addli1_err = $addli2_err = $addli3_err = $success = $appdate_err = $emp_err = "";
$nic_err = $tel_err = $email_err = $pw_err = $division_err = $office_err = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){

	if(isset($_POST['submit'])){

    $creator      = $database -> session_to_variabal($_SESSION['ad_id']);

    
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

    $divi         = $database -> form_data_process('division');
    $di           = $database -> table_by_id($divi,'education_office','name');
    $division     = $di['eo_id'];
    $division_err = $database -> field_missing($division,'Residential Division is Missing');

		$gender 		  = $database -> post_to_variabal($_POST['gender']);
		$race 			  = $database -> post_to_variabal($_POST['race']);
		$religion 		= $database -> post_to_variabal($_POST['religion']);
		$civil_status = $database -> post_to_variabal($_POST['civil_status']);

    $app_date     = $database -> form_data_process('app_date');
    $appdate_err  = $database -> field_missing($app_date,'Appointment Date is Missing');

    $office       = $database -> form_data_process('office');
    $office       = $database -> table_by_id($office,'education_office','name');
    $office_no    = $office['office_no'];
    $office_err   = $database -> field_missing($office,'Office is Missing or Wrong Office No');

    $nic          = $database -> form_data_process('nic');
    $nic_err      = $database -> field_missing($nic,'NIC is Missing');
    $nicv         = str_replace("V","",$nic);
    $emp_no       = "A".$nicv;

    $tel          = $database -> form_data_process('tel');
    $tel_err      = $database -> field_missing($tel,'Telephone Number is Missing');

		$medium 		  = $database -> post_to_variabal($_POST['medium']);
		$position 		= $database -> post_to_variabal($_POST['position']);
		$ed_qu 			  = $database -> post_to_variabal($_POST['ed_qu']);
		$pr_qu 			  = $database -> post_to_variabal($_POST['pr_qu']);
		$rank 			  = $database -> post_to_variabal($_POST['rank']);
		
    $email        = $database -> form_data_process('email');
    $email        = $database -> email_validation($email);
    $email        = $database -> email_existance($email,'admin_staff','email');
    $email_err    = $database -> field_missing($email,'Invalied email format or email already exist');
    

    $password     = $database -> form_data_process('password');
    $pw_err       = $database -> field_missing($password,'Password is Missing');
    $password     = crypt($password,'$2a$09$anexamplestringforsalt$');
    $password     = 1;
    $ip           = $database -> get_ip_address();
    $host_name    = gethostname();

    $success  = $database -> insert_admin($emp_no,$first_name,$middle_name,$last_name,$sir_name,$birthday,$add_li1,$add_li2,$add_li3,$division,$gender,$race,$religion,$civil_status,$app_date,$nic,$tel,$medium,$position,$ed_qu,$pr_qu,$rank,$email,$password,$creator,$ip,$host_name,$office_no);

	}
  if(isset($_POST['cancel'])){

    $database -> headerto('createeduofficerprofile.php');

  }
  if(isset($_POST['back'])){

    $database -> headerto('home.php');
  }
}
?>
<div class="container-fluid">
  <div class="row">
    <div class="col-md-12 text-center">
      <h3>CREATE EDUCATION OFFICER PROFILE</h3>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-4 col-sm-offset-4 col-xs-offset-0 justify-content-center">
      <form method="post" action="">
      <table class = "table table-hover">

        

        <tr>
        <td id ="tableField">First Name:</td>
        <td id="tableBox"><input type="text" name="first_name" maxlength="15" value=""></td>
        </tr>
        
        <?php if($firstnme_err !=""){ ?>
        <tr>
        <td id="tableField">
        </td>
        <td id="tableBox" class="text-danger">
        <?php $database -> display_message($firstnme_err); ?>
        </td>
        </tr>
        <?php } ?>

        <tr>
        <td id ="tableField">Middle Name:</td>
        <td id="tableBox"><input type="text" name="middle_name" maxlength="15" value=""></td>
        </tr>

        <tr>
        <td id ="tableField">Last Name:</td>
        <td id="tableBox"><input type="text" name="last_name" maxlength="15" value=""></td>
        </tr>

        <?php if($lastnme_err !=""){ ?>
        <tr>
        <td id="tableField">
        </td>
        <td id="tableBox" class="text-danger">
        <?php $database -> display_message($lastnme_err); ?>
        </td>
        </tr>
        <?php } ?>

        <tr>
        <td id ="tableField">Sir Name:</td>
        <td id="tableBox"><input type="text" name="sir_name" maxlength="50" value=""></td>
        </tr>

        <tr>
        <td id ="tableField">Birth Day:</td>
        <td id="tableBox"><input type="date" name="birthday" value=""></td>
        </tr>
        <?php if($birthday_err !=""){ ?>
        <tr>
        <td id="tableField">
        </td>
        <td id="tableBox" class="text-danger">
        <?php $database -> display_message($birthday_err); ?>
        </td>
        </tr>
        <?php } ?>

        <tr>
        <td id ="tableField">Address Line 1:</td>
        <td id="tableBox"><input type="text" name="add_li1" maxlength="20" value=""></td>
        </tr>

        <?php if($addli1_err !=""){ ?>
        <tr>
        <td id="tableField">
        </td>
        <td id="tableBox" class="text-danger">
        <?php $database -> display_message($addli1_err); ?>
        </td>
        </tr>
        <?php } ?>

        <tr>
        <td id ="tableField">Address Line 2:</td>
        <td id="tableBox"><input type="text" name="add_li2" maxlength="20" value=""></td>
        </tr>

        <?php if($addli2_err !=""){ ?>
        <tr>
        <td id="tableField">
        </td>
        <td id="tableBox" class="text-danger">
        <?php $database -> display_message($addli2_err); ?>
        </td>
        </tr>
        <?php } ?>

        <tr>
        <td id ="tableField">Address Line 3:</td>
        <td id="tableBox"><input type="text" name="add_li3" maxlength="20" value=""></td>
        </tr>
        
        <?php if($addli3_err !=""){ ?>
        <tr>
        <td id="tableField">
        </td>
        <td id="tableBox" class="text-danger">
        <?php $database -> display_message($addli3_err); ?>
        </td>
        </tr>
        <?php } ?>

        <tr>
        <td id ="tableField">Appointed Office:</td>
        <td class="search-box" id="tableBox"><input type="text" name="office" value="">
        <div class="result col-xs-6 justify-content-center"></div></td>
        </tr>

        <?php if($office_err !=""){ ?>
        <tr>
        <td id="tableField">
        </td>
        <td id="tableBox" class="text-danger">
        <?php $database -> display_message($office_err); ?>
        </td>
        </tr>
        <?php } ?>
       
        <tr>
        <td id ="tableField">Residential Edu: Division:</td>
        <td class="search-box1" id="tableBox"><input type="text" name="division" value="">
        <div class="result1 col-xs-6 justify-content-center"></div></td>
        </tr>

        <?php if($division_err !=""){ ?>
        <tr>
        <td id="tableField">
        </td>
        <td id="tableBox" class="text-danger">
        <?php $database -> display_message($division_err); ?>
        </td>
        </tr>
        <?php } ?>

        <tr>
        <td id ="tableField">Gender:</td>
        <td id="tableBox"><input type="radio" name="gender" value="1" checked> Male
        <input type="radio" name="gender" value="2"> Female</td>
        </tr>

        <tr>
        <td id ="tableField">Race:</td>
        <td id="tableBox"><select name="race"><?php $race_query = $database ->table_search('race');
          while($race = mysqli_fetch_assoc($race_query)){ ?> 
          <option value="<?php echo $race['ra_id']; ?>"><?php echo $race['name']?></option> <?php }?> </select></td>
        </tr>

        <tr>
        <td id ="tableField">Religion:</td>
        <td id="tableBox"><select name="religion"><?php $religion_query = $database ->table_search('religion');
          while($religion = mysqli_fetch_assoc($religion_query)){ ?> 
          <option value="<?php echo $religion['rg_id']; ?>"><?php echo $religion['name']?></option> <?php }?> </select></td>
        </tr>

        <tr>
        <td id ="tableField">Civil Status:</td>
        <td id="tableBox"><select name="civil_status"><?php $ci_st_query = $database ->table_search('civil_status');
          while($civil_status = mysqli_fetch_assoc($ci_st_query)){ ?> 
          <option value="<?php echo $civil_status['cs_id']; ?>"><?php echo $civil_status['name']?></option> <?php }?></select></td>
        </tr>

        <tr>
        <td id ="tableField">Appointment Date:</td>
        <td id="tableBox"><input type="date" name="app_date" value=""></td>
        </tr>
        
        <?php if($appdate_err !=""){ ?>
        <tr>
        <td id="tableField">
        </td>
        <td id="tableBox" class="text-danger">
        <?php $database -> display_message($appdate_err); ?>
        </td>
        </tr>
        <?php } ?>

        <tr>
        <td id ="tableField">NIC:</td>
        <td id="tableBox"><input type="text" name="nic"maxlength="15"  value=""></td>      
        </tr>
        
        <?php if($nic_err !=""){ ?>
        <tr>
        <td id="tableField">
        </td>
        <td id="tableBox" class="text-danger">
        <?php $database -> display_message($nic_err); ?>
        </td>
        </tr>
        <?php } ?>


        <tr>
        <td id ="tableField">Telephone:</td>
        <td id="tableBox"><input type="text" name="tel" maxlength="15" value=""></td>
        </tr>
        
        <?php if($tel_err !=""){ ?>
        <tr>
        <td id="tableField">
        </td>
        <td id="tableBox" class="text-danger">
        <?php $database -> display_message($tel_err); ?>
        </td>
        </tr>
        <?php } ?>

        <tr>
        <td id ="tableField">Medium:</td>
        <td id="tableBox"><select name="medium"><?php $med_query = $database ->table_search('medium');
          while($medium = mysqli_fetch_assoc($med_query)){?> 
          <option value="<?php echo $medium['md_id']; ?>"><?php echo $medium['name']?></option> <?php }?></select></td>
        </tr>

        <tr>
        <td id ="tableField">Position:</td>
        <td id="tableBox"><select name="position"> <?php $position_query = $database ->table_search_by_element('edu_officer','position','level');
    while($position = mysqli_fetch_assoc($position_query)){ ?> 
    <option value="<?php echo $position['ps_id']; ?>"><?php echo $position['display_name']?></option> <?php } ?> </select></td>
        </tr>

        <tr>
        <td id ="tableField">Education Qualification:</td>
        <td id="tableBox"><select name="ed_qu"><?php $ed_qu_query = $database ->table_search('education_qualification');
          while($ed_qu = mysqli_fetch_assoc($ed_qu_query)){ ?> 
          <option value="<?php echo $ed_qu['eq_id']; ?>"><?php echo $ed_qu['name']?></option> <?php }?></select></td>
        </tr>

        <tr>
        <td id ="tableField">Professional Qualification:</td>
        <td id="tableBox"><select name="pr_qu"><?php $pr_qu_query = $database ->table_search('prof_qualification');
          while($pr_qu = mysqli_fetch_assoc($pr_qu_query)){?> 
          <option value="<?php echo $pr_qu['pq_id']; ?>"><?php echo $pr_qu['name']?></option> <?php }?></select></td>
        </tr>

        <tr>
        <td id ="tableField">Rank:</td>
        <td id="tableBox"><select name="rank"><?php $rank_query = $database ->table_search_by_element('admin_staff','rank','level');
          while($rank = mysqli_fetch_assoc($rank_query)){?> 
          <option value="<?php echo $rank['rk_id']; ?>"><?php echo $rank['name']?></option> <?php }?></select></td>
        </tr>

        
        <tr>
        <td id ="tableField">Email:</td>
        <td id="tableBox"><input type="text" name="email"  value=""></td>      
        </tr>
        
        <?php if($email_err !=""){ ?>
        <tr>
        <td id="tableField">
        </td>
        <td id="tableBox" class="text-danger">
        <?php $database -> display_message($email_err); ?>
        </td>
        </tr>
        <?php } ?>


        <tr>
        <td id ="tableField">Password:</td>
        <td id="tableBox"><input type="text" name="password" maxlength="15" value=""></td>
        </tr>
        
        <?php if($pw_err !=""){ ?>
        <tr>
        <td id="tableField">
        </td>
        <td id="tableBox" class="text-danger">
        <?php $database -> display_message($pw_err); ?>
        </td>
        </tr>
        <?php } ?>
        


       </table>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-6 col-sm-offset-3 col-xs-offset-0 justify-content-center">
       <input class="btn" type="submit" name="submit" value="Submit">
       <input class="btn" type="submit" name="cancel" value="Refresh">
       <input class="btn" type="submit" name="back" value="Back">
    </div>   
  </div>
  <div class="row">
    <div class="col-xs-12 text-center">
       <?php $database -> conditional_display($success); ?> 
    </div>   
  </div>
      </form> 
</div>

<footer class="container-fluid text-center">
  <div class="row footer">
    <p>2018 Copyright: xcodeweb.com</p>
  </div>
</footer>