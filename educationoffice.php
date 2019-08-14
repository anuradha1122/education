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
              $.get("schoolofficesearch.php", {term: inputVal}).done(function(data){
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

    .result {

      position: absolute;
      background-color: black;
      color: white;
      z-index: 999;

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
      <h3>EDUCATION OFFICES AND SCHOOLS</h3>
    </div>
  </div>
  <div class="row">
    <div class="search-box col-sm-4 col-sm-offset-4 col-xs-offset-0 justify-content-center">
      <form method="post" action="">
      <table class = "table table-hover">
     <tr>
     <td>	
    Education Office Number:
    </td>
    <td>
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
    <div class="col-sm-4 col-sm-offset-4 col-xs-offset-0 justify-content-center">
   <table class="table table-hover">
<?php
header('Cache-Control: no cache');
if($_SERVER["REQUEST_METHOD"] == "POST"){

   if(isset($_POST['submit'])){

	  $number  = strtoupper($database -> post_to_variabal($_POST['number']));
	  $office = $database -> table_by_id($number, 'education_office', 'name');
	  if($office <> NULL){
	  	$number_arr = str_split($office['office_no']);
	  	if($number_arr[1] == 0 AND $number_arr[2] == 0 AND $number_arr[3] == 0 AND $number_arr[4] == 0 AND $number_arr[5] == 0){
		  	$province_query = $database -> find_province();
		  	if(mysqli_num_rows($province_query) > 0){
	  			while($province = mysqli_fetch_assoc($province_query)){
	  				?>
				  	<tr>
				  	<td id="officeNo">
				  	<a href="officeinsight.php?number=<?php $database -> display_message($province['office_no']); ?>">
				  	<?php
				  		$database -> display_message($province['office_no']);
				  	?>
				  	</a>
				  	</td>
				  	<td id="officeName">
				  	<a href="schoollist.php?number=<?php $database -> display_message($province['office_no']); ?>">
				  	<?php
				  		$database -> display_message($province['name']);
				  	?>
				  	</a>
				  	</td>
				  	</tr>
				  	
					<?php
	  			}
	  		}
		  	
	  	}elseif ($number_arr[2] == 0 AND $number_arr[3] == 0 AND $number_arr[4] == 0 AND $number_arr[5] == 0) {
	  		?>
		  	<tr>
		  	<td id="officeNo">
		  	<a href="officeinsight.php?number=<?php $database -> display_message($office['office_no']); ?>">
		  	<?php
		  		$database -> display_message($office['office_no']);
		  	?>
		  	</a>
		  	</td>
		  	<td id="officeName">
		  	<a href="schoollist.php?number=<?php $database -> display_message($office['office_no']); ?>">
		  	<?php
		  		$database -> display_message($office['name']);
		  	?>
		  	</a>
		  	</td>
		  	</tr>
		  	
			<?php
		  	$zone_query = $database -> find_zone();
		  	if(mysqli_num_rows($zone_query) > 0){
	  			while($zone = mysqli_fetch_assoc($zone_query)){
	  				$correct_zone = str_split($zone['office_no']);
	  				if($correct_zone[1] == $number_arr[1]){
	  					?>
					  	<tr>
					  	<td id="officeNo">
					  	<a href="officeinsight.php?number=<?php $database -> display_message($zone['office_no']); ?>">
					  	<?php
					  		$database -> display_message($zone['office_no']);
					  	?>
					  	</a>
					  	</td>
					  	<td id="officeName">
					  	<a href="schoollist.php?number=<?php $database -> display_message($zone['office_no']); ?>">
					  	<?php
					  		$database -> display_message($zone['name']);
					  	?>
					  	</a>
					  	</td>
					  	</tr>
					  	
						<?php
	  				}
	  				
	  			}
	  		}
	  	}elseif ($number_arr[4] == 0 AND $number_arr[5] == 0) {
	  		?>
		  	<tr>
		  	<td id="officeNo">
		  	<a href="officeinsight.php?number=<?php $database -> display_message($office['office_no']); ?>">
		  	<?php
		  		$database -> display_message($office['office_no']);
		  	?>
		  	</a>
		  	</td>
		  	<td id="officeName">
		  	<a href="schoollist.php?number=<?php $database -> display_message($office['office_no']); ?>">
		  	<?php
		  		$database -> display_message($office['name']);
		  	?>
		  	</a>
		  	</td>
		  	</tr>
		  	
			<?php
	  		$division_query = $database -> find_division();
		  	if(mysqli_num_rows($division_query) > 0){
	  			while($division = mysqli_fetch_assoc($division_query)){
	  				$correct_division = str_split($division['office_no']);
	  				if($correct_division[1] == $number_arr[1] AND $correct_division[2] == $number_arr[2] AND $correct_division[3] == $number_arr[3]){
	  					?>
					  	<tr>
					  	<td id="officeNo">
					  	<a href="officeinsight.php?number=<?php $database -> display_message($division['office_no']); ?>">
					  	<?php
					  		$database -> display_message($division['office_no']);
					  	?>
					  	</a>
					  	</td>
					  	<td id="officeName">
					  	<a href="schoollist.php?number=<?php $database -> display_message($division['office_no']); ?>">
					  	<?php
					  		$database -> display_message($division['name']);
					  	?>
					  	</a>
					  	</td>
					  	</tr>
					  	
						<?php
	  				}
	  				
	  			}
	  		}
	  	}else {
	  		?>
		  	<tr>
		  	<td id="officeNo">
		  	<a href="officeinsight.php?number=<?php $database -> display_message($office['office_no']); ?>">
		  	<?php
		  		$database -> display_message($office['office_no']);
		  	?>
		  	</a>
		  	</td>
		  	<td id="officeName">
		  	<a href="schoollist.php?number=<?php $database -> display_message($office['office_no']); ?>">
		  	<?php
		  		$database -> display_message($office['name']);
		  	?>
		  	</a>
		  	</td>
		  	</tr>
		  	
			<?php
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