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
#page number 30

$database = new Database();

$database -> empty_session();
$database -> restricted_page('30');

if(isset($_SESSION['pr_id'])){
?>
<div class="container-fluid">
  <div class="row">
    <div class="col-md-12 text-center">
      <h3>ACADEMIC STAFF CONSTITUTION</h3>
    </div>
  </div>

<?php

	$pr_id 					= $database -> session_to_variabal($_SESSION['pr_id']);
	$appointment 			= $database -> current_principal_search($pr_id);
	$school 	 			= $database -> table_by_id($appointment['school_no'],'school','school_no');
	$school_subject 	 	= $database -> table_by_id($school['sc_id'],'school_subject','sc_id');
?>
  <div class="row">
  	<div class="col-sm-6 col-sm-offset-3 col-xs-offset-0">
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
  	<div class="table-responsive justify-content-center">
  		<table class="table table-hover">
  			<tr>
  				<th id="tableSubject">
  					Subject
  				</th>
  				<th id="tableNecessity">
  					Necessity
  				</th>
  				<th id="tableAppointed">
  					Appointed
  				</th>
  				<th id="tableTeaching">
  					Teaching
  				</th>
  				<th id="tableExcess">
  					Excess
  				</th>
  				<th id="tableDeficient">
  					Deficient
  				</th>
  			</tr>
  		
  	<?php

	$all_count = array();
	$count = 1;
	$subject_query = $database -> table_search('subject'); 

	while($subject = mysqli_fetch_assoc($subject_query)){

		$sub_catagory = $database -> table_by_id($subject['sub_cat'],'subject_catagory','sc_id');
		$arr = $database -> teacher_constitution($count,$sub_catagory['value'],$school_subject,$school,$subject['medium']);
		array_push($all_count, $arr[0]);
		array_push($all_count, $arr[1]);
		array_push($all_count, $arr[2]);
		array_push($all_count, $arr[3]);
		array_push($all_count, $arr[4]);

		$count++;
	}
?>
	</table>
  </div>
 </div>

</div>
<?php

}elseif ($_SESSION['ad_id']) {
	
	$ad_id = $database -> session_to_variabal($_SESSION['ad_id']);
}
?>
<footer class="container-fluid text-center ">
  <div class="row footer">
    <p>2018 Copyright: xcodeweb.com</p>
  </div>
  
</footer>