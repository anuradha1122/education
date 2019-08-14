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
        <li><a href="logout.php?id=logout"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
      </ul>
    </div>
  </div>
</nav>
<?php
#page number 15

$database = new Database();

$database -> empty_session();
$database -> restricted_page('15');

$emp_err =  $success = $date_err = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){

	if(isset($_POST['submit'])){

    $creator    = $database -> find_creator();

    $emp_no 	= $database -> form_data_process('emp_no');
    $emp_no     = $database -> data_existance($emp_no,'teacher','emp_no');
    $emp_err   	= $database -> field_missing($emp_no,'Employement Number Wrong or Missing');

    $date    	= $database -> form_data_process('date');
    $dare_err   = $database -> field_missing($date,'Date is Missing');

    $ip           = $database -> get_ip_address();
    $host_name    = gethostname();

    if(isset($_POST['leave_detail']) AND $_POST['leave_detail'] <> '' AND isset($_POST['emp_no']) AND $_POST['emp_no'] <> '' AND isset($_POST['date']) AND $_POST['date'] <> ''){

        $leave_detail   = $database -> post_to_variabal($_POST['leave_detail']);
        $update         = $database -> update_one_column('teacher', 'leave_detail', $leave_detail, 'emp_no', $emp_no);
        $teacher 		= $database -> table_by_id($emp_no,'teacher','emp_no');
        $id 			= $teacher['tc_id'];
        $update         = $database -> update_one_column('teacher', 'active', '0', 'emp_no', $emp_no);
        $update         = $database -> update_leave_details('teacher_appointment',$ip, $host_name, $date, $id, 'tc_id');

    }

    
	}

  if(isset($_POST['cancel'])){

    $database -> headerto('shutdownteacherprofile.php');

  }
  if(isset($_POST['back'])){

    $database -> headerto('home.php');
  }
}
?>
<div class="container-fluid">
  <div class="row">
    <div class="col-md-12 text-center">
      <h3>SHUTDOWN TEACHER PROFILE</h3>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-4 col-sm-offset-4 col-xs-offset-0 justify-content-center">
      <form method="post" action="">
      <table class = "table table-hover">

    <tr>
    <td>
    Emplyement Number:
    </td>
    <td>
    <input type="text" name="emp_no" value="">
    </td>
    </tr>

    <?php if($emp_err !=""){ ?>
    <tr>
    <td id="tableField">
    </td>
    <td id="tableBox" class="text-danger">
    <?php $database -> display_message($emp_err); ?>
    </td>
    </tr>
    <?php } ?>

    <tr>
    <td>
    Release Date:
    </td>
    <td>
    <input type="date" name="date" value="">
    </td>
    </tr>
    
    <?php if($date_err !=""){ ?>
    <tr>
    <td id="tableField">
    </td>
    <td id="tableBox" class="text-danger">
    <?php $database -> display_message($date_err); ?>
    </td>
    </tr>
    <?php } ?>

    <tr>
    <td>
    Reason:
     </td>
    <td>
    <select name="leave_detail"><?php $leave_query = $database ->table_search('leave_detail');
      while($leave = mysqli_fetch_assoc($leave_query)){ ?> 
      <option value="<?php echo $leave['ld_id']; ?>"><?php echo $leave['name']?></option> <?php }?></select>
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
       
    <?php $database -> conditional_display($success); ?> 
</form>