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
        width: 32%;
        background-color: black;
        color: white;
        padding: 14px 20px;
        margin: 1px 0;
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
      width: 30%;
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
        <li><a href="logout.php?id=logout"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="container-fluid">
	<div class="row">
	<div class="col-sm-12 text-center">
		<h3>PERSONAL DETAILS</h3>
	</div>
</div>
<div class="row">
    <div class="col-sm-6 col-sm-offset-3 col-xs-offset-0 justify-content-center">
      <form method="post" action="appointmentprocess.php">
      <table class = "table table-hover">
      	<tr>
      	<th id ="tableField">Appointed Person</th>
      	<th id ="tablePosition">Position</th>
      	</tr>

<?php
#page number 20
$database = new Database();

$database -> empty_session();
$database -> restricted_page('20');

if(isset($_GET['ad_id'])){

	$database -> display_appointed_person($_GET['ad_id'],'admin_staff','ad_id'); ?>
	</table>
	</div>
</div>
<div class="row">
	<div class="col-sm-6 col-sm-offset-3 col-xs-offset-0 justify-content-center">
		<input type="hidden" name="id" value="ad_id">
		<input type="hidden" name="id_val" value="<?php echo $_GET['ad_id']; ?>">
		<input id="btnset" type="submit" name="accept" value="Accept">
	    <input id="btnset" type="submit" name="cancel" value="Cancel">
	    <input id="btnset" type="submit" name="reject" value="Reject">
	    </form>
	</div>	
</div>
	    
	    

	<?php
	
}
else if(isset($_GET['pr_id'])){

	$database -> display_appointed_person($_GET['pr_id'],'principal','pr_id');
  ?>
	</table>
  </div>
</div>
<div class="row">
  <div class="col-sm-6 col-sm-offset-3 col-xs-offset-0 justify-content-center">
    <input type="hidden" name="id" value="pr_id">
    <input type="hidden" name="id_val" value="<?php echo $_GET['pr_id']; ?>">
    <input id="btnset" type="submit" name="accept" value="Accept">
      <input id="btnset" type="submit" name="cancel" value="Cancel">
      <input id="btnset" type="submit" name="reject" value="Reject">
      </form>
  </div>  
</div>
<?php
	
}
else if(isset($_GET['tc_id'])){

	$database -> display_appointed_person($_GET['tc_id'],'teacher','tc_id');
	?>
</table>
  </div>
</div>
<div class="row">
  <div class="col-sm-6 col-sm-offset-3 col-xs-offset-0 justify-content-center">
    <input type="hidden" name="id" value="tc_id">
    <input type="hidden" name="id_val" value="<?php echo $_GET['tc_id']; ?>">
    <input id="btnset" type="submit" name="accept" value="Accept">
      <input id="btnset" type="submit" name="cancel" value="Cancel">
      <input id="btnset" type="submit" name="reject" value="Reject">
      </form>
  </div>  
</div>
 
	<?php
}
?>
<footer class="container-fluid text-center">
  <div class="row footer">
    <p>2018 Copyright: xcodeweb.com</p>
  </div>
  
</footer>