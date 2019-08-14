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
  <script type="text/javascript">
    $('#radioBtn a').on('click', function(){
      var sel = $(this).data('title');
      var tog = $(this).data('toggle');
      $('#'+tog).prop('value', sel);
      
      $('a[data-toggle="'+tog+'"]').not('[data-title="'+sel+'"]').removeClass('active').addClass('notActive');
      $('a[data-toggle="'+tog+'"][data-title="'+sel+'"]').removeClass('notActive').addClass('active');
  })
  </script>
  <script type="text/javascript">
  $(document).ready(function(){
      $('.search-box input[type="text"]').on("keyup input", function(){
          /* Get input value on change */
          var inputVal = $(this).val();
          var resultDropdown = $(this).siblings(".result");
          if(inputVal.length){
              $.get("schoolandofficesearch.php", {term: inputVal}).done(function(data){
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
  <script type="text/javascript">
  $(document).ready(function(){
      $('.search-box1 input[type="text"]').on("keyup input", function(){
          /* Get input value on change */
          var inputVal = $(this).val();
          var resultDropdown = $(this).siblings(".result1");
          if(inputVal.length){
              $.get("subjectsearch.php", {term: inputVal}).done(function(data){
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
      $('.search-box2 input[type="text"]').on("keyup input", function(){
          /* Get input value on change */
          var inputVal = $(this).val();
          var resultDropdown = $(this).siblings(".result2");
          if(inputVal.length){
              $.get("subjectsearch.php", {term: inputVal}).done(function(data){
                  // Display the returned data in browser
                  resultDropdown.html(data);
              });
          } else{
              resultDropdown.empty();
          }
      });
      
      // Set search input value on click of result item
      $(document).on("click", ".result2 p", function(){
          $(this).parents(".search-box2").find('input[type="text"]').val($(this).text());
          $(this).parent(".result2").empty();
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
        width: 90%;

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

    #tableSubject {
      width: 50%;
      text-align: center;
    }

    #tableNecessity {
      width: 10%;
      text-align: center;
    }

    #tableAppointed {
      width: 10%;
      text-align: center;
    }

    #tableTeaching {
      width: 10%;
      text-align: center;
    }

    #tableExcess {
      width: 10%;
      text-align: center;
    }

    #tableDeficient {
      width: 10%;
      text-align: center;
    }

    .slidecontainer {
    width: 100%;
}

.slider {
    -webkit-appearance: none;
    width: 100%;
    height: 25px;
    background: #d3d3d3;
    outline: none;
    opacity: 0.7;
    -webkit-transition: .2s;
    transition: opacity .2s;
}

.slider:hover {
    opacity: 1;
}

.slider::-webkit-slider-thumb {
    -webkit-appearance: none;
    appearance: none;
    width: 25px;
    height: 25px;
    background: blue;
    cursor: pointer;
}

.slider::-moz-range-thumb {
    width: 25px;
    height: 25px;
    background: #4CAF50;
    cursor: pointer;
}

.center-block {
  display: block;
  margin-right: auto;
  margin-left: auto;
}

.result,.result1,.result2 {

      position: absolute;
      background-color: black;
      color: white;
      z-index: 999;

    }

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
  //$database -> restricted_page('21');



if($_SERVER["REQUEST_METHOD"] == "POST"){
	if(isset($_POST['submit'])){
		if(isset($_POST['gender'])){
			$gender = $_POST['gender'];
		}else{
			$gender = '0';
		}
		if(isset($_POST['civil_status'])){
			$civil_status = $_POST['civil_status'];
		}else{
			$civil_status = 0;
		}
		if(isset($_POST['medium'])){
			$medium = $_POST['medium'];
		}else{
			$medium = 0;
		}
		if(isset($_POST['race'])){
			$race = $_POST['race'];
		}else{
			$race = 0;
		}
		if(isset($_POST['religion'])){
			$religion = $_POST['religion'];
		}else{
			$religion = 0;
		}
		if(isset($_POST['appoint_catagory'])){
			$appoint_catagory = $_POST['appoint_catagory'];
		}else{
			$appoint_catagory = 0;
		}
		if(isset($_POST['edu_quali'])){
			$edu_quali = $_POST['edu_quali'];
		}else{
			$edu_quali = 0;
		}
		if(isset($_POST['rank'])){
			$rank = $_POST['rank'];
		}else{
			$rank = 0;
		}
		if(isset($_POST['prof_quali'])){
			$prof_quali = $_POST['prof_quali'];
		}else{
			$prof_quali = 0;
		}
		if(isset($_POST['name'])){
			$name = $_POST['name'];
			$school = $database ->table_by_id($name,'school','name');
			if(isset($school)){
				$school_no = $school['school_no'];
			}else{
				$school_no = 0;
			}

			$office = $database ->table_by_id($name,'education_office','name');			
			if(isset($office)){
				$office_no = $office['eo_id'];

			}
			else{
				$office_no = 1;
			}
		}else{
			$school_no = 0;
			$office_no = 1;
		}

		if(isset($_POST['ap_sub']) AND $_POST['ap_sub'] <> ''){
			$ap_sub = $_POST['ap_sub'];
			$ap_subject = $database ->table_by_id($ap_sub,'subject','name');
			$app_no = $ap_subject['su_id'];
		}else{
			$app_no = 0;
		}

		if(isset($_POST['te_sub']) AND $_POST['te_sub'] <> ''){
			$te_sub = $_POST['te_sub'];
			$te_subject = $database ->table_by_id($te_sub,'subject','name');
			$tec_no = $te_subject['su_id'];
		}else{
			$tec_no = 0;
		}
		if(isset($_POST['app_prd'])){
			$app_prd = $_POST['app_prd'];
		}else{
			$app_prd = 40;
		}

		if(isset($_POST['sch_prd'])){
			$sch_prd = $_POST['sch_prd'];
		}else{
			$sch_prd = 40;
		}

		if(isset($_POST['min_age'])){
			$min_age = $_POST['min_age'];
		}else{
			$min_age = 40;
		}

		if(isset($_POST['max_age'])){
			$max_age = $_POST['max_age'];
		}else{
			$max_age = 40;
		}

		if(isset($_POST['first_name'])){
			$first_name = $_POST['first_name'];
		}else{
			$first_name = "no";
		}

		if(isset($_POST['middle_name'])){
			$middle_name = $_POST['middle_name'];
		}else{
			$middle_name = "no";
		}

		if(isset($_POST['last_name'])){
			$last_name = $_POST['last_name'];
		}else{
			$last_name = "no";
		}

		if(isset($_POST['sir_name'])){
			$sir_name = $_POST['sir_name'];
		}else{
			$sir_name = "no";
		}

		if(isset($_POST['birth_day'])){
			$birthday = $_POST['birth_day'];
		}else{
			$birthday = "no";
		}

		if(isset($_POST['address'])){
			$address = $_POST['address'];
		}else{
			$address = "no";
		}

		if(isset($_POST['telephone'])){
			$telephone = $_POST['telephone'];
		}else{
			$telephone = "no";
		}

		if(isset($_POST['email'])){
			$email = $_POST['email'];
		}else{
			$email = "no";
		}

		if(isset($_POST['gender_select'])){
			$gender_select = $_POST['gender_select'];
		}else{
			$gender_select = "no";
		}

		if(isset($_POST['race_select'])){
			$race_select = $_POST['race_select'];
		}else{
			$race_select = "no";
		}

		if(isset($_POST['religion_select'])){
			$religion_select = $_POST['religion_select'];
		}else{
			$religion_select = "no";
		}

		if(isset($_POST['civil_status_select'])){
			$civil_status_select = $_POST['civil_status_select'];
		}else{
			$civil_status_select = "no";
		}

		if(isset($_POST['app_date_select'])){
			$app_date_select = $_POST['app_date_select'];
		}else{
			$app_date_select = "no";
		}

		if(isset($_POST['cur_school_select'])){
			$cur_school_select = $_POST['cur_school_select'];
		}else{
			$cur_school_select = "no";
		}

		if(isset($_POST['cur_scl_name_select'])){
			$cur_scl_name_select = $_POST['cur_scl_name_select'];
		}else{
			$cur_scl_name_select = "no";
		}

		if(isset($_POST['medium_select'])){
			$medium_select = $_POST['medium_select'];
		}else{
			$medium_select = "no";
		}

		if(isset($_POST['edu_select'])){
			$edu_select = $_POST['edu_select'];
		}else{
			$edu_select = "no";
		}

		if(isset($_POST['pro_select'])){
			$pro_select = $_POST['pro_select'];
		}else{
			$pro_select = "no";
		}

		if(isset($_POST['position_select'])){
			$position_select = $_POST['position_select'];
		}else{
			$position_select = "no";
		}

		if(isset($_POST['rank_select'])){
			$rank_select = $_POST['rank_select'];
		}else{
			$rank_select = "no";
		}

		if(isset($_POST['app_sub_select'])){
			$app_sub_select = $_POST['app_sub_select'];
		}else{
			$app_sub_select = "no";
		}

		if(isset($_POST['te_sub_select'])){
			$te_sub_select = $_POST['te_sub_select'];
		}else{
			$te_sub_select = "no";
		}

		if(isset($_POST['catagory_select'])){
			$catagory_select = $_POST['catagory_select'];
		}else{
			$catagory_select = "no";
		}

?>
<div class="row">
          <div class="col-xs-12 text-center">
            <h3>TEACHER SELECTIONS RESULTS</h3>
          </div>
          <div class="col-xs-12 text-center table-responsive ">
            <table class="table table-hover">
            <tr>
              <th class="text-center">
                <h4>Number</h4>
              </th>

              <th class="text-center">
                <h4>NIC</h4>
              </th>

              <?php if($first_name == 'yes'){ ?>
              <th class="text-left">
                <h4>First Name</h4>
              </th>
              <?php } ?>

              <?php if($middle_name == 'yes'){ ?>
              <th class="text-left">
                <h4>middle Name</h4>
              </th>
              <?php } ?>

              <?php if($last_name == 'yes'){ ?>
              <th class="text-left">
                <h4>Last Name</h4>
              </th>
              <?php } ?>

              <?php if($sir_name == 'yes'){ ?>
              <th class="text-left">
                <h4>Sir Name</h4>
              </th>
              <?php } ?>

              <?php if($birthday == 'yes'){ ?>
              <th class="text-left">
                <h4>Birth Day</h4>
              </th>
              <?php } ?>

              <?php if($telephone == 'yes'){ ?>
              <th class="text-left">
                <h4>Telephone</h4>
              </th>
              <?php } ?>

              <?php if($address == 'yes'){ ?>
              <th class="text-left">
                <h4>Address</h4>
              </th>
              <?php } ?>

              <?php if($email == 'yes'){ ?>
              <th class="text-left">
                <h4>E-Mail</h4>
              </th>
              <?php } ?>

              <?php if($gender_select == 'yes'){ ?>
              <th class="text-left">
                <h4>Gender</h4>
              </th>
              <?php } ?>

              <?php if($race_select == 'yes'){ ?>
              <th class="text-left">
                <h4>Race</h4>
              </th>
              <?php } ?>

              <?php if($religion_select == 'yes'){ ?>
              <th class="text-left">
                <h4>Religion</h4>
              </th>
              <?php } ?>

              <?php if($civil_status_select == 'yes'){ ?>
              <th class="text-left">
                <h4>Civil Status</h4>
              </th>
              <?php } ?>

              <?php if($app_date_select == 'yes'){ ?>
              <th class="text-left">
                <h4>Appointed Date</h4>
              </th>
              <?php } ?>

              <?php if($cur_school_select == 'yes'){ ?>
              <th class="text-left">
                <h4>Appointed Date</h4>
                <h5>(Current School)</h5>
              </th>
              <?php } ?>

              <?php if($cur_scl_name_select == 'yes'){ ?>
              <th class="text-left">
                <h4>School Name</h4>
              </th>
              <?php } ?>

              <?php if($medium_select == 'yes'){ ?>
              <th class="text-left">
                <h4>Medium</h4>
              </th>
              <?php } ?>

              <?php if($edu_select == 'yes'){ ?>
              <th class="text-left">
                <h4>Education</h4>
                <h4>Qualification</h4>
              </th>
              <?php } ?>

              <?php if($pro_select == 'yes'){ ?>
              <th class="text-left">
                <h4>Professional</h4>
                <h4>Qualification</h4>
              </th>
              <?php } ?>

              <?php if($position_select == 'yes'){ ?>
              <th class="text-left">
                <h4>Position</h4>
              </th>
              <?php } ?>

              <?php if($rank_select == 'yes'){ ?>
              <th class="text-left">
                <h4>Rank</h4>
              </th>
              <?php } ?>

              <?php if($app_sub_select == 'yes'){ ?>
              <th class="text-left">
                <h4>Appointed</h4>
                <h4>Subject</h4>
              </th>
              <?php } ?>

              <?php if($te_sub_select == 'yes'){ ?>
              <th class="text-left">
                <h4>Teaching</h4>
                <h4>Subject 1</h4>
              </th>
              <th class="text-left">
                <h4>Teaching</h4>
                <h4>Subject 2</h4>
              </th>
              <th class="text-left">
                <h4>Teaching</h4>
                <h4>Subject 3</h4>
              </th>
              <th class="text-left">
                <h4>Teaching</h4>
                <h4>Subject 4</h4>
              </th>
              <?php } ?>

              <?php if($catagory_select == 'yes'){ ?>
              <th class="text-left">
                <h4>Appointed</h4>
                <h4>Catagory</h4>
              </th>
              <?php } ?>
            </tr>
<?php 
  ?> <h1><?php echo "$office_no"; ?></h1> <?php 
		$i = 1;
		$current_date = date_create(date("Y-m-d"));
		$teacher_query = $database ->select_appointed_teachers($gender,$civil_status,$medium,$race,$religion,$appoint_catagory,$edu_quali,$rank,$prof_quali,$school_no,$app_no,$tec_no,$office_no);
		while($teacher = mysqli_fetch_assoc($teacher_query)){
      $birth_day    = date_create($teacher['birth_day']);
      $age        = date_diff($birth_day,$current_date);
      $age_year     = $age -> format("%Y");

      $appoint_date   = date_create($teacher['appoint_date']);
      $service      = date_diff($appoint_date,$current_date);
      $sevice_year  = $service -> format("%Y");

      $school_appoint   = $database ->current_teacher_search($teacher['tc_id']);
      $cur_appoint_date   = date_create($school_appoint['appoint_date']);
      $cur_service      = date_diff($cur_appoint_date,$current_date);
      $cur_sevice_year  = $cur_service -> format("%Y");


			if($sevice_year <= $app_prd AND $cur_sevice_year <= $sch_prd AND $age_year <= $max_age AND $age_year >= $min_age){
				?>
        
            <tr>
              <td><?php echo $i; ?></td>
              <td><?php echo $teacher['nic']; ?></td>
              <?php if($first_name == 'yes'){ ?>
              <td class="text-left"><?php echo $teacher['first_name']; ?></td>
              <?php } ?>
              <?php if($middle_name == 'yes'){ ?>
              <td class="text-left"><?php echo $teacher['middle_name']; ?></td>
              <?php } ?>
              <?php if($last_name == 'yes'){ ?>
              <td class="text-left"><?php echo $teacher['last_name']; ?></td>
              <?php } ?>
              <?php if($sir_name == 'yes'){ ?>
              <td class="text-left"><?php echo $teacher['sir_name']; ?></td>
              <?php } ?>
              <?php if($birthday == 'yes'){ ?>
              <td class="text-left"><?php echo $teacher['birth_day']; ?></td>
              <?php } ?>
              <?php if($telephone == 'yes'){ ?>
              <td class="text-left"><?php echo $teacher['tel_no']; ?></td>
              <?php } ?>
              <?php if($address == 'yes'){ ?>
              <td class="text-left"><?php echo $teacher['add_li1']." ".$teacher['add_li2']." ".$teacher['add_li3']; ?></td>
              <?php } ?>
              <?php if($email == 'yes'){ ?>
              <td class="text-left"><?php echo $teacher['email']; ?></td>
              <?php } ?>

              <?php if($gender_select == 'yes'){ ?>
              <td class="text-left"><?php 
              if($teacher['gender'] == 1){
                echo "Male";
              }
              if($teacher['gender'] == 2){
                echo "Female";
              }
              ?></td>
              <?php } ?>

              <?php if($race_select == 'yes'){ ?>
              <td class="text-left">
              <?php 
                $race_name = $database -> table_by_id($teacher['race'],'race','ra_id');
                echo $race_name['name'];
              ?></td>
              <?php } ?>

              <?php if($religion_select == 'yes'){ ?>
              <td class="text-left">
              <?php 
                $religion_name = $database -> table_by_id($teacher['religion'],'religion','rg_id');
                echo $religion_name['name'];
              ?></td>
              <?php } ?>

              <?php if($civil_status_select == 'yes'){ ?>
              <td class="text-left">
              <?php 
                $civil_status_name = $database -> table_by_id($teacher['civil_status'],'civil_status','cs_id');
                echo $civil_status_name['name'];
              ?></td>
              <?php } ?>

              <?php if($app_date_select == 'yes'){ ?>
              <td class="text-left"><?php echo $teacher['appoint_date']; ?></td>
              <?php } ?>

              <?php if($cur_school_select == 'yes'){ ?>
              <td class="text-left">
              <?php 
                $cur_school_date = $database ->current_teacher_search($teacher['tc_id']);
                echo $cur_school_date['appoint_date'];
              ?></td>
              <?php } ?>

              <?php if($cur_school_select == 'yes'){ ?>
              <td class="text-left">
              <?php 
                $school_name = $database -> table_by_id($cur_school_date['school_no'],'school','school_no');
                echo $school_name['name'];
              ?></td>
              <?php } ?>

              <?php if($medium_select == 'yes'){ ?>
              <td class="text-left">
              <?php 
                $medium_name = $database -> table_by_id($teacher['medium'],'medium','md_id');
                echo $medium_name['name'];
              ?></td>
              <?php } ?>

              <?php if($edu_select == 'yes'){ ?>
              <td class="text-left">
              <?php 
                $edu_name = $database -> table_by_id($teacher['edu_quali'],'education_qualification','eq_id');
                echo $edu_name['name'];
              ?></td>
              <?php } ?>

              <?php if($pro_select == 'yes'){ ?>
              <td class="text-left">
              <?php 
                $pro_name = $database -> table_by_id($teacher['prof_quali'],'prof_qualification','pq_id');
                echo $pro_name['name'];
              ?></td>
              <?php } ?>

              <?php if($position_select == 'yes'){ ?>
              <td class="text-left">
              <?php 
                $position_name = $database -> table_by_id($teacher['position'],'position','ps_id');
                echo $position_name['display_name'];
              ?></td>
              <?php } ?>

              <?php if($rank_select == 'yes'){ ?>
              <td class="text-left">
              <?php 
                $rank_name = $database -> table_by_id($teacher['rank'],'rank','rk_id');
                echo $rank_name['name'];
              ?></td>
              <?php } ?>

              <?php if($app_sub_select == 'yes'){ ?>
              <td class="text-left">
              <?php 
                $app_sub_name = $database -> table_by_id($teacher['main_sub'],'subject','su_id');
                echo $app_sub_name['name'];
              ?></td>
              <?php } ?>

              <?php if($te_sub_select == 'yes'){ ?>
              <td class="text-left">
              <?php 
                $te_sub_name = $database -> table_by_id($teacher['sec_sub'],'subject','su_id');
                echo $te_sub_name['name'];
              ?></td>
              <td class="text-left">
              <?php 
                $te_sub_name = $database -> table_by_id($teacher['third_sub'],'subject','su_id');
                echo $te_sub_name['name'];
              ?></td>
              <td class="text-left">
              <?php 
                $te_sub_name = $database -> table_by_id($teacher['forth_sub'],'subject','su_id');
                echo $te_sub_name['name'];
              ?></td>
              <td class="text-left">
              <?php 
                $te_sub_name = $database -> table_by_id($teacher['fifth_sub'],'subject','su_id');
                echo $te_sub_name['name'];
              ?></td>
              <?php } ?>

              <?php if($catagory_select == 'yes'){ ?>
              <td class="text-left">
              <?php 
                $catagory_name = $database -> table_by_id($teacher['appoint_cat'],'appointment_catagory','ct_id');
                echo $catagory_name['short_name'];
              ?></td>
              <?php } 
              $i++;
              ?>
            </tr>
  
        <?php 
			   }	
      }
      ?>
      </table>
    </div>
  </div>
      <?php
        
	}
}

?>


<footer class="container-fluid text-center ">
  <div class="row footer">
    <p>2019 Copyright: www.semis.lk</p>
  </div>
</footer>

</body>
</html>
