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
      $('.search-box input[type="text"]').on("keyup input", function(){
          /* Get input value on change */
          var inputVal = $(this).val();
          var resultDropdown = $(this).siblings(".result");
          if(inputVal.length){
              $.get("transferteachersearch.php", {term: inputVal}).done(function(data){
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

    .result {

      position: absolute;
      background-color: black;
      color: white;
      z-index: 999;

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
      width: 50%;
      text-align: right;
      
    }

    #tableBox {
      width: 50%;
      text-align:left;

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

$number_err ="";

?>

<div class="container-fluid">
  <div class="row">
    <div class="col-md-12 text-center">
      <h3>TRANSFER TEACHER</h3>
    </div>
  </div>
  <div class="row">
    <div class="search-box col-sm-6 col-sm-offset-3 col-xs-offset-0 justify-content-center">
      <form method="post" action="">
      <table class = "table table-hover">
     <tr>
     <td id="tableField">	
    Teacher, School Or Divisional Education Office Number:
    </td>
    <td id="tableBox">
    <input type="text" autocomplete="off" placeholder="Enter Number" name="number" >
    <div class="result col-xs-5 justify-content-center"></div>
	</td>
	</tr>

    </table>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-6 col-sm-offset-3 col-xs-offset-0 justify-content-center">
       <input class="btn" type="submit" name="submit" value="Submit">
       <input class="btn" type="submit" name="cancel" value="Refresh">
       <input class="btn" type="submit" name="back" value="Back">
       </form> 
    </div>   
  </div>

      
  <div class="row" >
    <div class="col-sm-6 col-sm-offset-3 col-xs-offset-0 justify-content-center">
   <table class="table table-hover">
<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){

   if(isset($_POST['submit'])){

	  $number  = $database -> post_to_variabal($_POST['number']);
	  $teacher = $database -> table_by_id($number, 'teacher', 'nic');
	  if($teacher <> NULL){
	  	?>
      <tr>
      <td id="tableField">
      <?php
      $database -> display_message($teacher['nic']);
      ?>
      </td>
      <td id="tableBox">
      <?php
      $database -> display_message($teacher['first_name']);
      $database -> display_message(" ");
      $database -> display_message($teacher['last_name']);
      ?>
      </td>
      </tr>
	  	<tr>
	  	<td id="tableField">
	  	<?php
	  	
      $database -> display_message($teacher['tel_no']);
	  	?>
	  	</td>
	  	<td id="tableBox">
	  	<?php
	  	$appointment = $database -> current_teacher_search($teacher['tc_id']);
	  	$school 	 = $database -> table_by_id($appointment['school_no'], 'school', 'school_no');

	  	$database -> display_message($school['name']);
	  	?>
	  	</td>
	  	</tr>
	  	<tr>
	  	<td id="tableField">
	  	<?php
	  	$appoint_date = date_create($appointment['appoint_date']);
		$current_date = date_create(date("Y-m-d"));
		$period 	  = date_diff($appoint_date,$current_date);
		$year = $period -> format("%Y");
		if($year>=10){
			?><p style="color: red;"><?php $database -> display_message($period->format("%Y-%m-%d")); ?></p><?php
		}elseif ($year>=5) {
			?><p style="color: orange;"><?php $database -> display_message($period->format("%Y-%m-%d")); ?></p><?php
		}elseif ($year>=2) {
			?><p style="color: palegreen;"><?php $database -> display_message($period->format("%Y-%m-%d")); ?></p><?php
		}else {
			?><p style="color: green;"><?php $database -> display_message($period->format("%Y-%m-%d")); ?></p><?php
		}

		?>
		</td>
		<td id="tableBox">
		<a href="transferteacherprocess.php?emp_no=<?php $database -> display_message($teacher['emp_no']); ?>"><?php
		$database -> display_message("Trasfer");
		?></a>
		</td>
		</tr>


		<?php

	  }else{
	  	$school = $database -> table_by_id($number, 'school', 'name');
	  	$school_teacher = $database -> school_appointed_teachers($school['school_no']);
      $i=1;
	  	if(mysqli_num_rows($school_teacher) > 0){

	  		while($teacher_detail = mysqli_fetch_assoc($school_teacher)){

	  		$teacher = $database -> table_by_id($teacher_detail['tc_id'], 'teacher', 'tc_id');
	  		?>
        <tr>
        <td id="tableField">
        <?php
        $database -> display_message("(");
        $database -> display_message($i);
        $database -> display_message(")");
        $i++;
        ?>
        </td>
        <td id="tableBox">
        <?php
        $database -> display_message($teacher['nic']);
        ?>
        </td>
        </tr>
		  	<tr>
		  	<td id="tableField">
		  	<a href="transferteacherprocess.php?emp_no=<?php $database -> display_message($teacher['emp_no']); ?>">
		  	<?php
		  	$database -> display_message($teacher['first_name']);
		  	$database -> display_message(" ");
		  	$database -> display_message($teacher['last_name']);

		  	$appointment = $database -> current_teacher_search($teacher['tc_id']);
		  	$school 	 = $database -> table_by_id($teacher_detail['school_no'], 'school', 'school_no');
		  	?>
		  	</a>
		  	</td>
		  	<td id="tableBox">
		  	<?php
		  	$database -> display_message($school['name']);
		  	?>
		  	</td>
		  	</tr>
		  	<tr>
		  	<td id="tableField">
		  	<?php
		  	$appoint_date = date_create($appointment['appoint_date']);
			$current_date = date_create(date("Y-m-d"));
			$period 	  = date_diff($appoint_date,$current_date);
			$year = $period -> format("%Y");
			if($year>=8){
				?><p style="color: red;"><?php $database -> display_message($period->format("%Y-%m-%d")); ?></p><?php
			}elseif ($year>=5) {
				?><p style="color: orange;"><?php $database -> display_message($period->format("%Y-%m-%d")); ?></p><?php
			}else {
				?><p style="color: green;"><?php $database -> display_message($period->format("%Y-%m-%d")); ?></p><?php
			}

			?>
			</td>
			<td id="tableBox">
			
			<?php
			$subject 	 = $database -> table_by_id($teacher['main_sub'], 'subject', 'su_id');
			$database -> display_message($subject['name']);
			?>
			</td>
			</tr>
			<?php

	  		} 
	  		?>


	  		<?php

	  	}else{

	  		$office_id = $database -> table_by_id($number,'education_office','name');
	  		$division = $database -> table_search_by_element($office_id['eo_id'],'school','edu_division');

	  		if(mysqli_num_rows($division) > 0){

	  			while($school_division = mysqli_fetch_assoc($division)){

		  			$school = $school_division['school_no'];

			  		$school_teacher = $database -> school_appointed_teachers($school);
				  	if(mysqli_num_rows($school_teacher) > 0){

				  		while($teacher_detail = mysqli_fetch_assoc($school_teacher)){

				  		$teacher = $database -> table_by_id($teacher_detail['tc_id'], 'teacher', 'tc_id');
				  		?>
					  	<tr>
					  	<td id="tableField">
					  	<?php
					  	$database -> display_message($teacher['first_name']);
					  	$database -> display_message(" ");
					  	$database -> display_message($teacher['last_name']);

					  	$appointment = $database -> current_teacher_search($teacher['tc_id']);
					  	$school 	 = $database -> table_by_id($teacher_detail['school_no'], 'school', 'school_no');
					  	?>
					  	</td>
					  	<td id="tableBox">
					  	<?php
					  	$database -> display_message($school['name']);
					  	?>
					  	</td>
					  	</tr>
					  	<tr>
					  	<td id="tableField">
					  	<?php
					  	$appoint_date = date_create($appointment['appoint_date']);
						$current_date = date_create(date("Y-m-d"));
						$period 	  = date_diff($appoint_date,$current_date);
						$year = $period -> format("%Y");
						if($year>=10){
							?><p style="color: red;"><?php $database -> display_message($period->format("%Y-%m-%d")); ?></p><?php
						}elseif ($year>=5) {
							?><p style="color: orange;"><?php $database -> display_message($period->format("%Y-%m-%d")); ?></p><?php
						}elseif ($year>=2) {
							?><p style="color: yellow;"><?php $database -> display_message($period->format("%Y-%m-%d")); ?></p><?php
						}else {
							?><p style="color: green;"><?php $database -> display_message($period->format("%Y-%m-%d")); ?></p><?php
						}

						?>
						</td>
						<td id="tableBox">
						<a href="transferteacherprocess.php?emp_no=<?php $database -> display_message($teacher['emp_no']); ?>"><?php
						$database -> display_message("Trasfer");
						?></a>
						</td>
						</tr>
						<?php

				  		} 
				  	}
		  		}

		  		?>


		  		<?php 
	  		}else{
	  			?>
				       <?php $database -> display_message($number_err); ?> 

				 <?php
	  		}
	  	} 	

	  }
   }

   if(isset($_POST['cancel'])){

     	$database -> headerto('transferteacher.php');

   }
   if(isset($_POST['back'])){

    	$database -> headerto('home.php');
   }
}
?>
		</table>
      </div>
  	</div>	
</div>
<footer class="container-fluid text-center">
  <div class="row footer">
    <p>2018 Copyright: xcodeweb.com</p>
  </div>
</footer>