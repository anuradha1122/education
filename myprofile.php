<?php
#page number 24

include("database.php");
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

    @font-face {
        font-family: arjunn;
        src: url(font/arjunn);
        src: url("font/arjunn.eot?#iefix") format("embedded-opentype"),
             url("font/arjunn.woff") format("woff"),
             url("font/arjunn.ttf") format("truetype"),
             url("font/arjunn.svg#HurmeGeometricSans4 Bold") format("svg");
    }
    @font-face {
        font-family: hgs4b;
        src: url(font/HurmeGeometricSans4 Bold);
        src: url("font/HurmeGeometricSans4 Bold.eot?#iefix") format("embedded-opentype"),
             url("font/HurmeGeometricSans4 Bold.woff") format("woff"),
             url("font/HurmeGeometricSans4 Bold.ttf") format("truetype"),
             url("font/HurmeGeometricSans4 Bold.svg#HurmeGeometricSans4 Bold") format("svg");
    }
    @font-face {
        font-family: hgs4l;
        src: url(font/HurmeGeometricSans4 Light);
        src: url("font/HurmeGeometricSans4 Light.eot?#iefix") format("embedded-opentype"),
             url("font/HurmeGeometricSans4 Light.woff") format("woff"),
             url("font/HurmeGeometricSans4 Light.ttf") format("truetype"),
             url("font/HurmeGeometricSans4 Light.svg#HurmeGeometricSans4 Light") format("svg");
    }
    @font-face {
        font-family: hgs4bo;
        src: url(font/HurmeGeometricSans4 LightOblique);
        src: url("font/HurmeGeometricSans4 LightOblique.eot?#iefix") format("embedded-opentype"),
             url("font/HurmeGeometricSans4 LightOblique.woff") format("woff"),
             url("font/HurmeGeometricSans4 LightOblique.ttf") format("truetype"),
             url("font/HurmeGeometricSans4 LightOblique.svg#HurmeGeometricSans4 LightOblique") format("svg");
    }
    @font-face {
        font-family: hgs4;
        src: url("font/HurmeGeometricSans4");
        src: url("font/HurmeGeometricSans4.eot?#iefix") format("embedded-opentype"),
             url("font/HurmeGeometricSans4.woff") format("woff"),
             url("font/HurmeGeometricSans4.ttf") format("truetype"),
             url("font/HurmeGeometricSans4.svg#HurmeGeometricSans4") format("svg");
    }
    @font-face {
        font-family: kalaham;
        src: url("font/KALAHAM");
        src: url("font/KALAHAM.eot?#iefix") format("embedded-opentype"),
             url("font/KALAHAM.woff") format("woff"),
             url("font/KALAHAM.ttf") format("truetype"),
             url("font/KALAHAM.svg#HurmeGeometricSans4") format("svg");
    }
    @font-face {
        font-family: basuru;
        src: url("font/basuru");
        src: url("font/basuru.eot?#iefix") format("embedded-opentype"),
             url("font/basuru.woff") format("woff"),
             url("font/basuru.ttf") format("truetype"),
             url("font/basuru.svg#HurmeGeometricSans4") format("svg");
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


    #tableField {
      width: 50%;
      text-align: right;
      
    }

    #tableBox {
      width: 50%;
      text-align:left;

    }


  </style>
</head>
<body>

<nav class="navbar navbar-inverse" style="background-color: #1ca1d8">
  <div class="container-fluid">
    <div class="navbar-header" id="brand-text">
      <a class="navbar-brand animated bounce delay-1s slower" href="index.php" style="color: white;stroke:solid"><span style="font-family: 'arjunn',Arial, sans-serif;font-size: 50px">isma ;;=</span><span style="font-family: 'hgs4l',Arial, sans-serif;"> | Sip Thathu | </span><span style="font-family: 'kalaham',Arial, sans-serif;">சிப் தது</span></a>
    </div>

    <ul class="nav navbar-nav navbar-right">
        <li><a href="logout.php?id=logout" style="color: white"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
      </ul>
  </div>
</nav>


<?php 
$database = new Database();

$database -> empty_session();
//$database -> restricted_page('24');

$day_err = "";
?>
<div class="container-fluid">
  <div class="row">
    <div class="col-md-12 text-center" style="font-family: 'hgs4l',Arial, sans-serif;">
      <h3>MY PROFILE</h3>
    </div>
  </div>
  <div class="row">
    <div class="col-xs-12 justify-content-center"  style="font-family: 'hgs4l',Arial, sans-serif;">
      <table class = "table table-hover">
      <?php
          if(isset($_SESSION['tc_id'])){

            $tc_id  = $_SESSION["tc_id"];
            $teacher = $database -> table_by_id($tc_id, 'teacher', 'tc_id');
            ?>
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
              <td id="tableField"  >
             <?php
              $database -> display_message($school['name']);
              ?>
              </td>
              <td>
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
              <td>
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
            $comments_query = $database -> table_search_by_element($tc_id,'comment','staff_id');
            while($comments = mysqli_fetch_assoc($comments_query)){
              if($comments['position'] == 1){

              ?>
              <tr>
              <td id="tableField">
             <?php
              if($comments['catagory'] == 1){

                $database -> display_message("comments");
              }elseif($comments['catagory'] == 2){
                
                $database -> display_message("Achievments");
              }elseif($comments['catagory'] == 3){
                
                $database -> display_message("Offences");
              }
              ?>
            </td>
            <td id="tableBox">
            <?php
              $database -> display_message($comments['comment']);
              ?>
              </td>
            </tr>
            <?php
              }
            }
          }
          if(isset($_SESSION['pr_id'])){
            $pr_id  = $_SESSION["pr_id"];
            $principal = $database -> table_by_id($pr_id, 'principal', 'pr_id');
            ?>
            <tr>
              <td id="tableField">
            <?php
            $database -> display_message("Full Name : ");
            ?>
            </td>
            <td id="tableBox">
            <?php
            $database -> display_message($database -> gender_title($principal));
            $database -> display_message(" ");
            $database -> display_message($principal['sir_name']);
            $database -> display_message(" ");
            $database -> display_message($principal['first_name']);
            $database -> display_message(" ");
            $database -> display_message($principal['middle_name']);
            $database -> display_message(" ");
            $database -> display_message($principal['last_name']);
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
            $database -> display_message($principal['add_li1']);
            $database -> display_message(" ");
            $database -> display_message($principal['add_li2']);
            $database -> display_message(" ");
            $database -> display_message($principal['add_li3']); 
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
            $database -> display_message($principal['birth_day']);
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
            $division = $database -> table_by_id($principal['division'], 'education_office', 'eo_id');
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
            $race = $database -> table_by_id($principal['race'], 'race', 'ra_id');
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
            $religion = $database -> table_by_id($principal['religion'], 'religion', 'rg_id');
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
            $civil_status = $database -> table_by_id($principal['civil_status'], 'civil_status', 'cs_id');
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
            $database -> display_message($principal['appoint_date']);
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
            $appoint_state = $database -> table_by_id($principal['appoint_state'], 'appointment_state', 'ap_id');
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
            $database -> display_message($principal['nic']);
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
            $database -> display_message($principal['tel_no']);
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
            $medium = $database -> table_by_id($principal['medium'], 'medium', 'md_id');
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
            $edu_quali = $database -> table_by_id($principal['edu_quali'], 'education_qualification', 'eq_id');
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
            $prof_quali = $database -> table_by_id($principal['prof_quali'], 'prof_qualification', 'pq_id');
            $database -> display_message($prof_quali['name']);
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
            $position = $database -> table_by_id($principal['position'], 'position', 'ps_id');
            $database -> display_message($position['name']);
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
            $rank = $database -> table_by_id($principal['rank'], 'rank', 'rk_id');
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
              </td>
            </tr>
            <tr>
              <td id="tableField">
            <?php
            $current_appointment = $database -> current_principal_search($principal['pr_id']);
            $school = $database -> table_by_id($current_appointment['school_no'], 'school', 'school_no');
            $database -> display_message($school['name']);
            ?>
            </td>
            <td id="tableBox">
            <?php
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
            
            $old_appointment = $database -> old_principal_search($principal['pr_id']);
            while($old_school = mysqli_fetch_assoc($old_appointment)){
              ?>
              <tr>
              <td  id="tableField">
            <?php
              $school = $database -> table_by_id($old_school['school_no'], 'school', 'school_no');
              $database -> display_message($school['name']);
              ?>
            </td>
            <td id="tableBox">
            <?php
              $database -> display_message(" From ");
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
        
            $comments_query = $database -> table_search_by_element($pr_id,'comment','staff_id');
              while($comments = mysqli_fetch_assoc($comments_query)){
                if($comments['position'] == 2){

                ?>
                <tr>
                <td id="tableField">
               <?php
                if($comments['catagory'] == 1){

                  $database -> display_message("comments");
                }elseif($comments['catagory'] == 2){
                  
                  $database -> display_message("Achievments");
                }elseif($comments['catagory'] == 3){
                  
                  $database -> display_message("Offences");
                }
                ?>
              </td>
              <td id="tableBox">
              <?php
                $database -> display_message($comments['comment']);
                ?>
                </td>
              </tr>
              <?php
                }
              }
            }
          }
          if(isset($_SESSION['ad_id'])){ 
            $ad_id  = $_SESSION["ad_id"];
            $admin_staff = $database -> table_by_id($ad_id, 'admin_staff', 'ad_id');
            ?>
            <tr>
              <td id="tableField">
            <?php
            $database -> display_message("Full Name : ");
            ?>
            </td>
            <td id="tableBox">
            <?php
            $database -> display_message($database -> gender_title($admin_staff));
            $database -> display_message(" ");
            $database -> display_message($admin_staff['sir_name']);
            $database -> display_message(" ");
            $database -> display_message($admin_staff['first_name']);
            $database -> display_message(" ");
            $database -> display_message($admin_staff['middle_name']);
            $database -> display_message(" ");
            $database -> display_message($admin_staff['last_name']);
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
            $database -> display_message($admin_staff['add_li1']);
            $database -> display_message(" ");
            $database -> display_message($admin_staff['add_li2']);
            $database -> display_message(" ");
            $database -> display_message($admin_staff['add_li3']); 
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
            $database -> display_message($admin_staff['birth_day']);
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
            $division = $database -> table_by_id($admin_staff['division'], 'education_office', 'eo_id');
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
            $race = $database -> table_by_id($admin_staff['race'], 'race', 'ra_id');
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
            $religion = $database -> table_by_id($admin_staff['religion'], 'religion', 'rg_id');
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
            $civil_status = $database -> table_by_id($admin_staff['civil_status'], 'civil_status', 'cs_id');
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
            $database -> display_message($admin_staff['appoint_date']);
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
            $database -> display_message($admin_staff['nic']);
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
            $database -> display_message($admin_staff['tel_no']);
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
            $medium = $database -> table_by_id($admin_staff['medium'], 'medium', 'md_id');
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
            $edu_quali = $database -> table_by_id($admin_staff['edu_quali'], 'education_qualification', 'eq_id');
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
            $prof_quali = $database -> table_by_id($admin_staff['prof_quali'], 'prof_qualification', 'pq_id');
            $database -> display_message($prof_quali['name']);
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
            $position = $database -> table_by_id($admin_staff['position'], 'position', 'ps_id');
            $database -> display_message($position['name']);
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
            $rank = $database -> table_by_id($admin_staff['rank'], 'rank', 'rk_id');
            $database -> display_message($rank['name']);
            ?>
              </td>
            </tr>
            <tr>
              <td id="tableField">
            <?php

            $database -> display_message("Current Office : ");
            ?>
            </td>
            <td id="tableBox">
              </td>
            </tr>
            <tr>
              <td id="tableField">
            <?php
            $current_appointment = $database -> current_admin_search($admin_staff['ad_id']);
            $school = $database -> table_by_id($current_appointment['office_no'], 'education_office', 'office_no');
            $database -> display_message($school['name']);
            ?>
            </td>
            <td id="tableBox">
            <?php
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
            $database -> display_message("Previous Office : ");
            ?>
            </td>
            <td id="tableBox">

              </td>
            </tr>
            <?php
            
            $old_appointment = $database -> old_admin_search($admin_staff['ad_id']);
            while($old_school = mysqli_fetch_assoc($old_appointment)){
              ?>
              <tr>
              <td id="tableField">
             <?php
              $school = $database -> table_by_id($old_school['school_no'], 'school', 'school_no');
              $database -> display_message($school['name']);
              ?>
            </td>
            <td id="tableBox">
            <?php
              $database -> display_message(" From ");
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

            $comments_query = $database -> table_search_by_element($ad_id,'comment','staff_id');
            while($comments = mysqli_fetch_assoc($comments_query)){
              if($comments['position'] == 3){

              ?>
              <tr>
              <td id="tableField">
             <?php
              if($comments['catagory'] == 1){

                $database -> display_message("comments");
              }elseif($comments['catagory'] == 2){
                
                $database -> display_message("Achievments");
              }elseif($comments['catagory'] == 3){
                
                $database -> display_message("Offences");
              }
              ?>
            </td>
            <td id="tableBox">
            <?php
              $database -> display_message($comments['comment']);
              ?>
              </td>
            </tr>
            <?php
              }
            }
          }
          ?>
      </table>
    </div>
  </div>
</div>
<footer class="container-fluid text-center">
  <div class="row footer" style="background-color: #1ca1d8">
    <p>2019 Copyright: www.semis.lk</p>
  </div>
</footer>



