<?php include("database.php"); 
ob_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Education Home</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
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

    #tableField {

    	width: 40%;
    	text-align: right;
    }

    #tableContent {
    	width: 60%;
    	text-align: right;
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

    #top_x_div {
    	width: 20%;
    	height: 100%;
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
        <li class="active"><a href="home.php">Home</a></li>
        <li><a style ="" href="#">About</a></li>
        <li><a href="#">Projects</a></li>
        <li><a href="#">Contact</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="logout.php?id=logout"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
      </ul>
    </div>
  </div>
</nav>

<?php
#page number 31

$database = new Database();

$database -> empty_session();
//$database -> restricted_page('31');

if(!isset($_GET['sub_id'])){
	$database -> headerto('teacherconstitution.php');
}else{

	$sub_id = $_GET['sub_id'];
	$transport = explode(",", $sub_id);
	$subject_id = $transport[0]; 
	$number = $transport[1]; 

}

?>
<div class="container-fluid">
  <div class="row">
    <div class="col-md-12 text-center">
      <h3>ACADEMIC STAFF FOR SUBJECT</h3>
    </div>
  </div>

<?php

	$school 	 			= $database -> table_by_id($number,'school','school_no');
	$school_subject 	 	= $database -> table_by_id($school['sc_id'],'school_subject','sc_id');
?>
  <div class="row">
  	<div class="col-sm-6 col-sm-offset-3 col-xs-offset-0" >
  		<table class = "table table-hover">
  			<tr>
  				<td id="tableField">
  					<?php $database -> display_message("School Medium :"); 
  					$lang_medium 	= $database -> table_by_id($school['cat_by_lang'],'language_medium','lm_id'); ?>
  				</td>
  				<td>
  					<?php $database -> display_message($lang_medium['name']); ?>
  				</td>
  			</tr>
  			<tr>
  				<td id="tableField">
  					<?php $database -> display_message("School Name : "); ?>
  				</td>
  				<td>
  					<?php $database -> display_message($school['name']); ?>
  				</td>
  			</tr>
  			<tr>
  				<td id="tableField">
  					<?php $database -> display_message("Address : "); ?>
  				</td>
  				<td>
  					<?php $database -> display_message($school['add_li1']); ?>
  				</td>
  			</tr>
  			<tr>
  				<td id="tableField">
  					<?php $database -> display_message(" "); ?>
  				</td>
  				<td>
  					<?php $database -> display_message($school['add_li2']); ?>
  				</td>
  			</tr>
  			<tr>
  				<td id="tableField">
  					<?php $database -> display_message("Province : ");
					$higher_province = $database -> table_by_id($school['edu_division'],'education_office','eo_id');
					$province = $database -> table_by_id($higher_province['higher_provi_no'],'education_office','office_no'); ?>
  				</td>
  				<td>
  					<?php $database -> display_message($province['name']); ?>
  				</td>
  			</tr>
  			<tr>
  				<td id="tableField">
  					<?php $database -> display_message("Zone : ");
					$higher_zone = $database -> table_by_id($school['edu_division'],'education_office','eo_id');
					$zone = $database -> table_by_id($higher_zone['higher_zone_no'],'education_office','office_no'); ?>
  				</td>
  				<td>
  					<?php $database -> display_message($zone['name']); ?>
  				</td>
  			</tr>
  			<tr>
  				<td id="tableField">
  					<?php $database -> display_message("Division : ");
					$division 	= $database -> table_by_id($school['edu_division'],'education_office','eo_id'); ?>
  				</td>
  				<td>
  					<?php $database -> display_message($division['name']); ?>
  				</td>
  			</tr>
  			<tr>
  				<td id="tableField">
  					<?php $database -> display_message("School No : "); ?>
  				</td>
  				<td>
  					<?php $database -> display_message($school['school_no']); ?>
  				</td>
  			</tr>
  		</table>
  	</div>
  </div>
  <div class="row">
      <div class="col-md-6" >
        <div class="well" class="table">
        <table class="table table-hover" style="padding-top: 0px;">
        <?php 
        $school_subject = $database -> table_by_id($school['sc_id'],'school_subject','sc_id');
        if($school_subject <> NULL ) {

            $class        = $school_subject[$subject_id];
            $subject      = $database -> table_by_id($subject_id,'subject','su_id');
            $catagory     = $database -> table_by_id($subject['sub_cat'],'subject_catagory','sc_id');
            $class_amount = $database -> table_by_id($class,'class_teacher','ct_id');

          ?>
          <tr>
            <th>
              <?php $database -> display_message($subject['name']); ?>
            </th>
            <th>
              
            </th>
          </tr>
          <tr>
            <td>
              Teacher Neccesity :
            </td>
            <td>
              <?php $database -> display_message($class_amount[$catagory['value']]); ?>
            </td>
          </tr>
          <?php
          $appoint_query = $database -> school_appointed_teachers($number);
          if(mysqli_num_rows($appoint_query) > 0){
            $appoint_teacher = 0;
            while($appoint = mysqli_fetch_assoc($appoint_query)){
                $teacher      = $database -> table_by_id($appoint['tc_id'],'teacher','tc_id');

                  if($teacher['main_sub'] == $subject_id){
                    $appoint_teacher++;
                  }
            }
          }
          ?>
          <tr>
            <td>
              Teacher Appointed :
            </td>
            <td>
              <?php $database -> display_message($appoint_teacher); ?>
            </td>
          </tr>

          <?php
          $appoint_query = $database -> school_appointed_teachers($number);
          if(mysqli_num_rows($appoint_query) > 0){

            while($appoint = mysqli_fetch_assoc($appoint_query)){
                $teacher      = $database -> table_by_id($appoint['tc_id'],'teacher','tc_id');

                  if($teacher['main_sub'] == $subject_id){
                    ?>
                    <tr>
                      <td>
                        <a href="transferteacherprocess.php?emp_no=<?php $database -> display_message($teacher['emp_no']); ?>">
                        <?php $database -> display_message($teacher['first_name']); ?>
                        <?php $database -> display_message(" "); ?>
                        <?php $database -> display_message($teacher['last_name']); ?>
                        </a>
                      </td>
                      <td>
                        
                      </td>
                    </tr>
                    
                    <?php
                  }
            }
          }

          $appoint_query = $database -> school_appointed_teachers($number);
          if(mysqli_num_rows($appoint_query) > 0){
            $teach_teacher = 0;
            while($appoint = mysqli_fetch_assoc($appoint_query)){
                $teacher      = $database -> table_by_id($appoint['tc_id'],'teacher','tc_id');

                  if($teacher['sec_sub'] == $subject_id OR $teacher['third_sub'] == $subject_id OR $teacher['forth_sub'] == $subject_id OR $teacher['fifth_sub'] == $subject_id){
                    $teach_teacher++;
                  }
            }
          }
          ?>
          <tr>
            <td>
              Teacher Teaching Subject :
            </td>
            <td>
              <?php $database -> display_message($teach_teacher); ?>
            </td>
          </tr>
          <?php

          $appoint_query = $database -> school_appointed_teachers($number);
          if(mysqli_num_rows($appoint_query) > 0){

            while($appoint = mysqli_fetch_assoc($appoint_query)){
                $teacher      = $database -> table_by_id($appoint['tc_id'],'teacher','tc_id');

                  if($teacher['sec_sub'] == $subject_id OR $teacher['third_sub'] == $subject_id OR $teacher['forth_sub'] == $subject_id OR $teacher['fifth_sub'] == $subject_id){
                    ?>
                    <tr>
                      <td>
                        <a href="transferteacherprocess.php?emp_no=<?php $database -> display_message($teacher['emp_no']); ?>">
                        <?php $database -> display_message($teacher['first_name']); ?>
                        <?php $database -> display_message(" "); ?>
                        <?php $database -> display_message($teacher['last_name']); ?>
                        </a>
                      </td>
                      <td>
                        
                      </td>
                    </tr>
                    <?php
                  }
            }
          }
          

          $excess = $deficient = 0;
          $unbalance = $class_amount[$catagory['value']] - $appoint_teacher;
            if($unbalance <0) {
              $excess = $unbalance;
            }elseif ($unbalance>0) {
              $deficient = $unbalance;
            }
          ?>
          <tr>
            <td>
              Teacher Excess :
            </td>
            <td>
              <?php $database -> display_message(abs($excess)); ?>
            </td>
          </tr>
          <tr>
            <td>
              Teacher Deficient :
            </td>
            <td>
              <?php $database -> display_message(abs($deficient)); ?>
            </td>
          </tr>
          <?php
          
        }else{
          $database -> display_message("Teachers Are Not Allocated");
        }
      ?>
        </table>
        </div>
      </div>
      <div class="col-md-6" style="padding-top:40px;">
        <div class="well" id="chart_div1" class="chart"></div>
      </div>
  </div>
</div>

<footer class="container-fluid text-center ">
  <div class="row footer">
    <p>2018 Copyright: xcodeweb.com</p>
  </div>
  
</footer>

<script src="//static.codepen.io/assets/common/stopExecutionOnTimeout-b2a7b3fe212eaa732349046d8416e00a9dec26eb7fd347590fbced3ab38af52e.js"></script>

<script src='//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='https://www.google.com/jsapi'></script>

  
<script >
google.load("visualization", "1", {packages:["corechart"]});
google.setOnLoadCallback(drawChart1);
function drawChart1() {
  var data = google.visualization.arrayToDataTable([
      ['', 'Amount'],
      ["Necessity", <?php echo $class_amount[$catagory['value']]; ?>],
      ["Appointed", <?php echo $appoint_teacher; ?>],
      ["Teaching", <?php echo $teach_teacher; ?>],
      ["Excess", <?php echo abs($excess); ?>],
      ["Deficient", <?php echo $deficient; ?>]
    ]);

  var options = {
    title: 'Teacher Static(Amount)',
    hAxis: {title: 'Teachers', titleTextStyle: {color: 'black'}}
 };

var chart = new google.visualization.ColumnChart(document.getElementById('chart_div1'));
  chart.draw(data, options);
}

$(window).resize(function(){
  drawChart1();
});

</script>
