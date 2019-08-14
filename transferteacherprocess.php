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
#page number 22

$database = new Database();

$database -> empty_session();
//$database -> restricted_page('22');


$emp_no  = $_GET["emp_no"];
$teacher = $database -> table_by_id($emp_no, 'teacher', 'emp_no');
?>
<div class="container-fluid">
  <div class="row">
    <div class="col-md-12 text-center">
      <h3>
        <?php
      $database -> display_message($teacher['first_name']);
      $database -> display_message(" ");
      $database -> display_message($teacher['last_name']);
      ?>
      </h3>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-6 col-sm-offset-3 col-xs-offset-0 justify-content-center">
      <table class = "table table-hover">
      <tr>
      <td id="tableField">
      <?php
      $database -> display_message("Full Name :");
      ?>
      </td>
      <td id="tableBox">
      <?php
      $database -> display_message($database -> gender_title($teacher));
      $database -> display_message($teacher['sir_name']);
      $database -> display_message(" ");
      $database -> display_message($teacher['first_name']);
      $database -> display_message(" ");
      $database -> display_message($teacher['middle_name']);
      $database -> display_message(" ");
      $database -> display_message($teacher['last_name']);
      

      ?>
        </td>
      </tr>
      <tr>
      <td id="tableField">
      <?php
      $database -> display_message("Address : ");
      ?>
      </td>
      <td id="tableBox">
      <?php
      $database -> display_message($teacher['add_li1']);
      $database -> display_message(" ");
      $database -> display_message($teacher['add_li2']);
      $database -> display_message(" ");
      $database -> display_message($teacher['add_li3']);
      

      ?>
        </td>
      </tr>
      <tr>
      <td id="tableField">
      <?php
      $database -> display_message("Birth Day : ");
      ?>
      </td>
      <td id="tableBox">
      <?php
      $database -> display_message($teacher['birth_day']);
      

      ?>
        </td>
      </tr>
      <tr>
      <td id="tableField">
      <?php
      $database -> display_message("Residential Division : ");
      ?>
      </td>
      <td id="tableBox">
      <?php
      $division = $database -> table_by_id($teacher['division'], 'education_office', 'eo_id');
      $database -> display_message($division['name']);
      

      ?>
        </td>
      </tr>
      <tr>
      <td id="tableField">
      <?php
      $database -> display_message("Race : ");
      ?>
      </td>
      <td id="tableBox">
      <?php
      $race = $database -> table_by_id($teacher['race'], 'race', 'ra_id');
      $database -> display_message($race['name']);
      

      ?>
        </td>
      </tr>
      <tr>
      <td id="tableField">
      <?php
      $database -> display_message("Religion : ");
      ?>
      </td>
      <td id="tableBox">
      <?php
      $religion = $database -> table_by_id($teacher['religion'], 'religion', 'rg_id');
      $database -> display_message($religion['name']);
      

      ?>
        </td>
      </tr>
      <tr>
      <td id="tableField">
      <?php
      $database -> display_message("Civil Status : ");
      ?>
      </td>
      <td id="tableBox">
      <?php
      $civil_status = $database -> table_by_id($teacher['civil_status'], 'civil_status', 'cs_id');
      $database -> display_message($civil_status['name']);
      

      ?>
        </td>
      </tr>
      <tr>
      <td id="tableField">
      <?php
      $database -> display_message("First Appointment Date : ");
      ?>
      </td>
      <td id="tableBox">
      <?php
      $database -> display_message($teacher['appoint_date']);
      

      ?>
        </td>
      </tr>
      <tr>
      <td id="tableField">
      <?php
      $database -> display_message("Appointment State : ");
      ?>
      </td>
      <td id="tableBox">
      <?php
      $appoint_state = $database -> table_by_id($teacher['appoint_state'], 'appointment_state', 'ap_id');
      $database -> display_message($appoint_state['name']);
      

      ?>
        </td>
      </tr>
      <tr>
      <td id="tableField">
      <?php
      $database -> display_message("NIC : ");
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
      <?php
      $database -> display_message("Telephone No : ");
      ?>
      </td>
      <td id="tableBox">
      <?php
      $database -> display_message($teacher['tel_no']);
      

      ?>
        </td>
      </tr>
      <tr>
      <td id="tableField">
      <?php
      $database -> display_message("Medium : ");
      ?>
      </td>
      <td id="tableBox">
      <?php
      $medium = $database -> table_by_id($teacher['medium'], 'medium', 'md_id');
      $database -> display_message($medium['name']);
      

      ?>
        </td>
      </tr>
      <tr>
      <td id="tableField">
      <?php
      $database -> display_message("Education Qualification : ");
      ?>
      </td>
      <td id="tableBox">
      <?php
      $edu_quali = $database -> table_by_id($teacher['edu_quali'], 'education_qualification', 'eq_id');
      $database -> display_message($edu_quali['name']);
      

      ?>
        </td>
      </tr>
      <tr>
      <td id="tableField">
      <?php
      $database -> display_message("Proffesional Qualification : ");
      ?>
      </td>
      <td id="tableBox">
      <?php
      $prof_quali = $database -> table_by_id($teacher['prof_quali'], 'prof_qualification', 'pq_id');
      $database -> display_message($prof_quali['name']);
      

      ?>
        </td>
      </tr>
      <tr>
      <td id="tableField">
      <?php
      $database -> display_message("Appointment catagory : ");
      ?>
      </td>
      <td id="tableBox">
      <?php
      $appoint_cat = $database -> table_by_id($teacher['appoint_cat'], 'appointment_catagory', 'ct_id');
      $database -> display_message($appoint_cat['name']);
      

      ?>
        </td>
      </tr>
      <tr>
      <td id="tableField">
      <?php
      $database -> display_message("Position : ");
      ?>
      </td>
      <td id="tableBox">
      <?php
      $position = $database -> table_by_id($teacher['position'], 'position', 'ps_id');
      $database -> display_message($position['name']);
      

      ?>
        </td>
      </tr>
      <tr>
      <td id="tableField">
      <?php
      $database -> display_message("Current Function : ");
      ?>
      </td>
      <td id="tableBox">
      <?php
      $function = $database -> table_by_id($teacher['cur_function'], 'teacher_function', 'tf_id');
      $database -> display_message($function['name']);
      

      ?>
        </td>
      </tr>
      <tr>
      <td id="tableField">
      <?php
      $database -> display_message("Appointed Subject : ");
      ?>
      </td>
      <td id="tableBox">
      <?php
      $subject = $database -> table_by_id($teacher['main_sub'], 'subject', 'su_id');
      $database -> display_message($subject['name']);
      

      ?>
        </td>
      </tr>
      <tr>
      <td id="tableField">
      <?php
      $database -> display_message("Teaching Subject 01: ");
      ?>
      </td>
      <td id="tableBox">
      <?php
      $subject = $database -> table_by_id($teacher['sec_sub'], 'subject', 'su_id');
      $database -> display_message($subject['name']);
      

      ?>
        </td>
      </tr>
      <tr>
      <td id="tableField">
      <?php
      $database -> display_message("Teaching Subject 02: ");
      ?>
      </td>
      <td id="tableBox">
      <?php
      $subject = $database -> table_by_id($teacher['third_sub'], 'subject', 'su_id');
      $database -> display_message($subject['name']);
      
      ?>
        </td>
      </tr>
      <tr>
      <td id="tableField">
      <?php
      $database -> display_message("Teaching Subject 03: ");
      ?>
      </td>
      <td id="tableBox">
      <?php
      $subject = $database -> table_by_id($teacher['forth_sub'], 'subject', 'su_id');
      $database -> display_message($subject['name']);
      ?>


        </td>
      </tr>
      <tr>
      <td id="tableField">
      <?php
      $database -> display_message("Teaching Subject 04: ");
      ?>
      </td>
      <td id="tableBox">
      <?php
      $subject = $database -> table_by_id($teacher['fifth_sub'], 'subject', 'su_id');
      $database -> display_message($subject['name']);
      ?>
      
        </td>
      </tr>
      <tr>
      <td id="tableField">
      <?php
      $database -> display_message("Rank : ");
      ?>
      </td>
      <td id="tableBox">
      <?php
      $rank = $database -> table_by_id($teacher['rank'], 'rank', 'rk_id');
      $database -> display_message($rank['name']);
      

      ?>
        </td>
      </tr>
      <tr>
      <td id="tableField">
      <?php
      $database -> display_message("Current School : ");
      ?>
      </td>
      <td id="tableBox">
      <?php
      $current_appointment = $database -> current_teacher_search($teacher['tc_id']);
      $school = $database -> table_by_id($current_appointment['school_no'], 'school', 'school_no');
      $database -> display_message($school['name']);
      $database -> display_message(" From ");
      $database -> display_message($current_appointment['appoint_date']);
      $database -> display_message(" To ");
      $database -> display_message("present");
      
      ?>
        </td>
      </tr>
      <tr>
      <td id="tableField">
      <?php
      $database -> display_message("Time Period: ");
      ?>
      </td>
      <td id="tableBox">
      <?php
      $appoint_date = date_create($current_appointment['appoint_date']);
      $current_date = date_create(date("Y-m-d"));
      $period     = date_diff($appoint_date,$current_date);
      $database -> display_message($period->format("%Y-%m-%d"));
      
      ?>
        </td>
      </tr>
      <tr>
      <td id="tableField">
      <?php
      $database -> display_message("Previous School : ");
      ?>
      </td>
      <td id="tableBox">
      </td>
      </tr>
      <?php
      $old_appointment = $database -> old_teacher_search($teacher['tc_id']);
      while($old_school = mysqli_fetch_assoc($old_appointment)){

        $school = $database -> table_by_id($old_school['school_no'], 'school', 'school_no');
        ?>
        <tr>
        <td id="tableField">
        <?php
        $database -> display_message($school['name']);
        ?>
        </td>
        <td id="tableBox">
        <?php
        $database -> display_message("From ");
        $database -> display_message($old_school['appoint_date']);
        $database -> display_message(" To ");
        $database -> display_message($old_school['release_date']);
        ?>
      </td>
      </tr>
      <tr>
      <td id="tableField">
      <?php
        $database -> display_message("Time Period: ");
        ?>
        </td>
        <td id="tableBox">
        <?php
        $appoint_date = date_create($old_school['appoint_date']);
        $current_date = date_create($old_school['release_date']);
        $period     = date_diff($appoint_date,$current_date);
        $database -> display_message($period->format("%Y-%m-%d"));
        ?>
        </td>
        </tr>
        <?php
      }


if($_SERVER["REQUEST_METHOD"] == "POST"){

   if(isset($_POST['submit'])){

   		echo $teacher['tc_id'];
   		echo $school = $database -> post_to_variabal($_POST['school']);
   		$database -> release_staff('teacher_appointment','release_school',$school,$teacher['tc_id'],'tc_id');
   		$database -> headerto('transferteacher.php');
   }

   if(isset($_POST['back'])){

   		$database -> headerto('transferteacher.php');
   }

   if(isset($_POST['cancel'])){

  
   }
}

?>

<form action="" method="post">

    <tr>
    <td id="tableField">
    <label for="email"><b>Transfer School No </b></label>
    </td>
    <td id="tableBox">
    <input type="text" placeholder="School No" name="school" >
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
</form>
</div>
<footer class="container-fluid text-center">
  <div class="row footer">
    <p>2018 Copyright: xcodeweb.com</p>
  </div>
</footer>