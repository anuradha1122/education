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
        width: 33%;
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

    #tablePerson {
      width: 50%;
      text-align: right;
      
    }

    #tablePosition {
      width: 50%;
      text-align:left;

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
        <li><a href="logout.php?id=logout"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
      </ul>
    </div>
  </div>
</nav>
<?php
#page number 19
$database = new Database();

$database -> empty_session();
$database ->restricted_page('19');

?>
<div class="container-fluid">
	<div class="row">
	<div class="col-sm-12 text-center">
		<h3>CONFIRM APPOINTMENT</h3>
	</div>
</div>
<div class="row">
    <div class="col-sm-6 col-sm-offset-3 col-xs-offset-0 justify-content-center">
      <form method="post" action="">
      <table class = "table table-hover">
      	<tr>
      	<th id ="tablePerson">Appointed Person</th>
      	<th id ="tablePosition">Position</th>
      	</tr>


<?php
if(isset($_SESSION['ad_id'])){

	$id = $_SESSION['ad_id'];

	$admin_staff = $database -> table_by_id($id,'admin_staff','ad_id');
	$position = $admin_staff['position'];

	$ad_appointment = $database -> current_admin_search($id);
	$office_id = $ad_appointment['office_no'];

	if($position =='10'){

		$appointment = $database -> table_search_by_element(NULL,'admin_staff_appointment','start_date');

		while($new_staff = mysqli_fetch_assoc($appointment)){

			$ad_id = $new_staff['ad_id'];
			$office_no = $new_staff['office_no'];

			$divi_provi_no = $database -> table_by_id($office_no,'education_office','office_no');
			$zone_provi_no = $database -> table_by_id($office_no,'education_office','office_no');
			$divi_provi = $divi_provi_no['higher_provi_no'];
			$zone_provi = $zone_provi_no['higher_provi_no'];

			if($divi_provi == $office_id OR $zone_provi == $office_id){

				$new_staff = $database -> table_by_id($ad_id,'admin_staff','ad_id');
				$new_position = $new_staff['position'];

				$database -> admin_appointment('6','7','8','9','11',$new_position,$new_staff);
			}	
      	}

      	$appointment = $database -> table_search_by_element(NULL,'principal_appointment','start_date');

		while($new_staff = mysqli_fetch_assoc($appointment)){

			$pr_id = $new_staff['pr_id'];
			$school_no = $new_staff['school_no'];

			$div_office = $database -> table_by_id($school_no,'school','school_no');
			$division_no = $div_office['edu_division'];

			$provi_no = $database -> table_by_id($division_no,'education_office','eo_id');
			$province = $provi_no['higher_provi_no'];

			if($province == $office_id){

				$new_staff = $database -> table_by_id($pr_id,'principal','pr_id');
				$new_position = $new_staff['position'];

				$database -> principal_appointment('5',$new_position,$new_staff);
			}	
			
      	}


	}
	else if($position =='12' OR $position == '14'){

		$appointment = $database -> table_search_by_element(NULL,'admin_staff_appointment','start_date');

		while($new_staff = mysqli_fetch_assoc($appointment)){

			$ad_id = $new_staff['ad_id'];
			$new_staff = $database -> table_by_id($ad_id,'admin_staff','ad_id');
			$new_position = $new_staff['position'];

			$database -> admin_appointment('10','12','13','14','14',$new_position,$new_staff);
      	}
	}
	


}
else if(isset($_SESSION['pr_id'])){

	$id = $_SESSION['pr_id'];

	$principal = $database -> table_by_id($id,'principal','pr_id');
	$pr_position = $principal['position'];

	
	$pr_appointment = $database -> current_principal_search($id);
	$school_id = $pr_appointment['school_no'];
	
	if($pr_position =='5'){

		$appointment = $database -> table_search_by_element(NULL,'teacher_appointment','start_date');

		while($new_staff = mysqli_fetch_assoc($appointment)){

			$tc_id = $new_staff['tc_id'];
			$tc_school_id = $new_staff['school_no'];
			if($school_id == $tc_school_id){

				$new_staff = $database -> table_by_id($tc_id,'teacher','tc_id');
				$new_position = $new_staff['position'];

				$database -> teacher_appointment('1','2','3','4',$new_position,$new_staff);

			}

      	}
	}
}


?>
	</table>
    </div>
  </div>
</div>
<footer class="container-fluid text-center  navbar-fixed-bottom">
  <div class="row footer">
    <p>2018 Copyright: xcodeweb.com</p>
  </div>
  
</footer>