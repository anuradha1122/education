<?php include("database.php"); 
ob_start();

#page number 02

#declair database


$database = new Database();

$database -> empty_session();
$database ->restricted_page('2');

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>SEMIS</title>
  <link rel="icon" type="image/png" href="img/logo.png">
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

    div.tile {
        
        color: black;
    }

    div.tile:hover {
        color:#cb2026;
    }

    #list a:link { color: white; }
    #list a:visited { color: gray; }
    #list a:hover { color: #cc6633; }
    #list a:active { color: #cc6633; }


    #listItem {
      background-color: black;
      border-color: black;
      border-width: 22px; 

      justify-content: center;

    }

    #myNavbar a:link { color: white; }
    #myNavbar a:visited { color: white; }
    #myNavbar a:hover { color: #cb2026; }
    #myNavbar a:active { color: #cb2026; }

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

<div class="container-fluid">
  
  <?php $position = $database ->home_selection(); ?>

  <div class="row">
    <div class="col-xs-12 text-center">
      <img src="img/logo.png" style="width: 20%;height: 20%">
    </div>
  </div>

  <div class="row text-center">
    <div class="col-sm-8 col-sm-offset-2 col-xs-12 col-xs-offset-0" style="font-family: 'hgs4l',Arial, sans-serif;">

        <a href="profile.php">
        <div class="col-sm-4 col-xs-6" style="padding-top: 10px;">
          <img src="img/tile.gif" style="width: 100%;height: 100%;border :solid;color: white;">
          <div class="col-xs-12 tile" style="position: absolute;top: 50%;left: 50%;transform: translate(-50%, -50%);color: white;">
            <h3>PROFILE</h3>
          </div>
        </div>
        </a>

        <a href="teacher.php">
        <div class="col-sm-4 col-xs-6" style="padding-top: 10px;">
          <img src="img/tile.gif" style="width: 100%;height: 100%;border :solid;color: white;">
          <div class="col-xs-12 tile" style="position: absolute;top: 50%;left: 50%;transform: translate(-50%, -50%);color: white;">
            <h3>TEACHER</h3>
          </div>
        </div>
        </a>
        <a href="principal.php">
        <div class="col-sm-4 col-xs-6" style="padding-top: 10px;">
          <img src="img/tile.gif" style="width: 100%;height: 100%;border :solid;color: white;">
          <div class="col-xs-12 tile" style="position: absolute;top: 50%;left: 50%;transform: translate(-50%, -50%);color: white;">
            <h3>PRINCIPAL</h3>
          </div>
        </div>
        </a>
      
        <a href="edu_staff.php">
        <div class="col-sm-4 col-xs-6" style="padding-top: 10px;">
          <img src="img/tile.gif" style="width: 100%;height: 100%;border :solid;color: white;">
          <div class="col-xs-12 tile" style="position: absolute;top: 50%;left: 50%;transform: translate(-50%, -50%);color: white;">
            <h3>SLEAS</h3>
          </div>
        </div>
        </a>
        <a href="school.php">
        <div class="col-sm-4 col-xs-6" style="padding-top: 10px;">
          <img src="img/tile.gif" style="width: 100%;height: 100%;border :solid;color: white;">
          <div class="col-xs-12 tile" style="position: absolute;top: 50%;left: 50%;transform: translate(-50%, -50%);color: white;">
            <h3>SCHOOL</h3>
          </div>
        </div>
        </a>
        <a href="quick.php">
        <div class="col-sm-4 col-xs-6" style="padding-top: 10px;">
          <img src="img/tile.gif" style="width: 100%;height: 100%;border :solid;color: white;">
          <div class="col-xs-12 tile" style="position: absolute;top: 50%;left: 50%;transform: translate(-50%, -50%);color: white;">
            <h3>QUICK LINKS</h3>
          </div>
        </div>
        </a>
    </div>
  </div>

<?php /*
  <div class="row" id = "list">
    <div class="col-sm-3 col-sm-offset-3 col-xs-offset-0 text-center justify-content">
      <ul class="list-unstyled">
        <?php if($position == '1' OR $position == '2' OR $position == '3' ){ ?>
          <li id="listItem"><a href="myprofile.php" ><h4>See Your Profile</h4></a></li>
          <li id="listItem"><a href="changemyprofile.php" ><h4>Change Your Profile</h4></a></li>
          <li id="listItem"><a href="educationoffice.php" ><h4>Schools And Offices</h4></a></li>
          <li id="listItem"><a href="addsubjecttoschool.php" ><h4>Add Subject to school</h4></a></li>
        <?php } ?>
        <?php if($position == '4'){ ?>
          <li id="listItem"><a href="myprofile.php" ><h4>See Your Profile</h4></a></li>
          <li id="listItem"><a href="changemyprofile.php" ><h4>Change Your Profile</h4></a></li>
          <li id="listItem"><a href="educationoffice.php" ><h4>Schools And Offices</h4></a></li>
        <?php } ?>

        <?php if($position == '5'){ ?>
          <li id="listItem"><a href="myprofile.php" ><h4>See Your Profile</h4></a></li>
          <li id="listItem"><a href="changemyprofile.php" ><h4>Change Your Profile</h4></a></li>
          <li id="listItem"><a href="releaseteacher.php" ><h4>Release Teacher</h4></a></li>
          <li id="listItem"><a href="addsubjecttoschool.php" ><h4>Add Subject to school</h4></a></li>
          <li id="listItem"><a href="educationoffice.php" ><h4>Schools And Offices</h4></a></li>
        <?php } ?>
        <?php if($position == '6'){ ?>
          <li id="listItem"><a href="myprofile.php" ><h4>See Your Profile</h4></a></li>
          <li id="listItem"><a href="teacherhistory.php" ><h4>Teacher History temp</h4></a></li>
          <li id="listItem"><a href="changepreviousschools.php" ><h4>Change Previous Schools</h4></a></li>
          <li id="listItem"><a href="changeteacherprofile.php" ><h4>Change Teacher Profile</h4></a></li>
        <?php } ?>
        <?php if($position == '7'){ ?>
          <li id="listItem"><a href="myprofile.php" ><h4>See Your Profile</h4></a></li>
          <li id="listItem"><a href="changemyprofile.php" ><h4>Change Your Profile</h4></a></li>
          <li id="listItem"><a href="educationoffice.php" ><h4>Schools And Offices</h4></a></li>
        <?php } ?>
        <?php if($position == '8'){ ?>
          <li id="listItem"><a href="myprofile.php" ><h4>See Your Profile</h4></a></li>
          <li id="listItem"><a href="changemyprofile.php" ><h4>Change Your Profile</h4></a></li>
          <li id="listItem"><a href="addcomments.php" ><h4>Comments for Teachers</h4></a></li>
          <li id="listItem"><a href="educationoffice.php" ><h4>Schools And Offices</h4></a></li>
        <?php } ?>
        <?php if($position == '9'){ ?>
          <li id="listItem"><a href="myprofile.php" ><h4>See Your Profile</h4></a></li>
          <li id="listItem"><a href="changemyprofile.php" ><h4>Change Your Profile</h4></a></li>
          <li id="listItem"><a href="educationoffice.php" ><h4>Schools And Offices</h4></a></li>
        <?php } ?>
        <?php if($position == '10'){ ?>
          <li id="listItem"><a href="myprofile.php" ><h4>See Your Profile</h4></a></li>
          <li id="listItem"><a href="changemyprofile.php" ><h4>Change Your Profile</h4></a></li>
          <li id="listItem"><a href="createteacherprofiletemp.php" ><h4>Create Teacher Profile</h4></a></li>
          <li id="listItem"><a href="changeteacherprofile.php" ><h4>Change Teacher Profile</h4></a></li>
          <li id="listItem"><a href="shutdownteacherprofile.php" ><h4>Shutdown Teacher Profile</h4></a></li>
          <li id="listItem"><a href="transferteacher.php" ><h4>Tranfer Teacher</h4></a></li>
          <li id="listItem"><a href="#" ><h4>Create Admin Staff Profile</h4></a></li>
          <li id="listItem"><a href="#" ><h4>Change Admin Staff Profile</h4></a></li>
          <li id="listItem"><a href="#" ><h4>Shutdown Admin Staff Profile</h4></a></li>
          <li id="listItem"><a href="addcomments.php" ><h4>Comments for Teachers</h4></a></li>
          <li id="listItem"><a href="educationoffice.php" ><h4>Schools And Offices</h4></a></li>
        <?php } ?>
        <?php if($position == '11'){ ?>
          <li id="listItem"><a href="myprofile.php" ><h4>See Your Profile</h4></a></li>
          <li id="listItem"><a href="changemyprofile.php" ><h4>Change Your Profile</h4></a></li>
          <li id="listItem"><a href="createteacherprofiletemp.php" ><h4>Create Teacher Profile</h4></a></li>
          <li id="listItem"><a href="changeteacherprofile.php" ><h4>Change Teacher Profile</h4></a></li>
          <li id="listItem"><a href="shutdownteacherprofile.php" ><h4>Shutdown Teacher Profile</h4></a></li>
          <li id="listItem"><a href="transferteacher.php" ><h4>Tranfer Teacher</h4></a></li>
          <li id="listItem"><a href="#" ><h4>Create Admin Staff Profile</h4></a></li>
          <li id="listItem"><a href="#" ><h4>Change Admin Staff Profile</h4></a></li>
          <li id="listItem"><a href="#" ><h4>Shutdown Admin Staff Profile</h4></a></li>
          <li id="listItem"><a href="educationoffice.php" ><h4>Schools And Offices</h4></a></li>
        <?php } ?>
        <?php if($position == '12'){ ?>
          <li id="listItem"><a href="myprofile.php" ><h4>See Your Profile</h4></a></li>
          <li id="listItem"><a href="changemyprofile.php" ><h4>Change Your Profile</h4></a></li>
          <li id="listItem"><a href="createteacherprofiletemp.php" ><h4>Create Teacher Profile</h4></a></li>
          <li id="listItem"><a href="createteacherprofiletemp.php" ><h4>Create Teacher Profile temp</h4></a></li>
          <li id="listItem"><a href="changeteacherprofile.php" ><h4>Change Teacher Profile</h4></a></li>
          <li id="listItem"><a href="shutdownteacherprofile.php" ><h4>Shutdown Teacher Profile</h4></a></li>
          <li id="listItem"><a href="transferteacher.php" ><h4>Tranfer Teacher</h4></a></li>
          <li id="listItem"><a href="createeduofficerprofile.php" ><h4>Create Admin Staff Profile</h4></a></li>
          <li id="listItem"><a href="#" ><h4>Change Admin Staff Profile</h4></a></li>
          <li id="listItem"><a href="#" ><h4>Shutdown Admin Staff Profile</h4></a></li>
          <li id="listItem"><a href="addcomments.php" ><h4>Comments for Teachers</h4></a></li>
          <li id="listItem"><a href="educationoffice.php" ><h4>Schools And Offices</h4></a></li>
        <?php } ?>
        <?php if($position == '13'){ ?>
          <li id="listItem"><a href="myprofile.php" ><h4>See Your Profile</h4></a></li>
          <li id="listItem"><a href="changemyprofile.php" ><h4>Change Your Profile</h4></a></li>
          <li id="listItem"><a href="createteacherprofiletemp.php" ><h4>Create Teacher Profile</h4></a></li>
          <li id="listItem"><a href="createteacherprofiletemp.php" ><h4>Create Teacher Profile temp</h4></a></li>
          <li id="listItem"><a href="changeteacherprofile.php" ><h4>Change Teacher Profile</h4></a></li>
          <li id="listItem"><a href="shutdownteacherprofile.php" ><h4>Shutdown Teacher Profile</h4></a></li>
          <li id="listItem"><a href="transferteacher.php" ><h4>Tranfer Teacher</h4></a></li>
          <li id="listItem"><a href="createeduofficerprofile.php" ><h4>Create Admin Staff Profile</h4></a></li>
          <li id="listItem"><a href="#" ><h4>Change Admin Staff Profile</h4></a></li>
          <li id="listItem"><a href="#" ><h4>Shutdown Admin Staff Profile</h4></a></li>
          <li id="listItem"><a href="addcomments.php" ><h4>Comments for Teachers</h4></a></li>
          <li id="listItem"><a href="educationoffice.php" ><h4>Schools And Offices</h4></a></li>
        <?php } ?>
        <?php if($position == '14'){ ?>
          <li id="listItem"><a href="myprofile.php" ><h4>See Your Profile</h4></a></li>
          <li id="listItem"><a href="changemyprofile.php" ><h4>Change Your Profile</h4></a></li>  
          <li id="listItem"><a href="createteacherprofiletemp.php" ><h4>Create Teacher Profile</h4></a></li>
          <li id="listItem"><a href="createteacherprofiletemp.php" ><h4>Create Teacher Profile temp</h4></a></li>
          <li id="listItem"><a href="teacherhistory.php" ><h4>Teacher History temp</h4></a></li>
          <li id="listItem"><a href="changeteacherprofile.php" ><h4>Change Teacher Profile</h4></a></li>
          <li id="listItem"><a href="shutdownteacherprofile.php" ><h4>Shutdown Teacher Profile</h4></a></li>
          <li id="listItem"><a href="transferteacher.php" ><h4>Tranfer Teacher</h4></a></li>
          <li id="listItem"><a href="createeduofficerprofile.php" ><h4>Create Admin Staff Profile</h4></a></li>
          <li id="listItem"><a href="changepreviousschools.php" ><h4>Change Previous Schools</h4></a></li>
          <li id="listItem"><a href="#" ><h4>Change Admin Staff Profile</h4></a></li>
          <li id="listItem"><a href="#" ><h4>Shutdown Admin Staff Profile</h4></a></li>
          <li id="listItem"><a href="addcomments.php" ><h4>Comments for Teachers</h4></a></li>
          <li id="listItem"><a href="educationoffice.php" ><h4>Schools And Offices</h4></a></li>
        <?php } ?>
      </ul>
    </div>
    <div class="col-sm-3 text-center">
      <ul class="list-unstyled">
        <?php if($position == '1' OR $position == '2' OR $position == '3' ){ ?>
          <li id="listItem"><a href="#" ><h4>School Teacher Constitution</h4></a></li>
          <li id="listItem"><a href="teacherstatistics.php" ><h4>Teacher Statistics</h4></a></li>
          <li id="listItem"><a href="schoolstatistics.php" ><h4>School Statistics</h4></a></li>
        <?php } ?>
        <?php if($position == '4'){ ?>
          <li id="listItem"><a href="#" ><h4>School Teacher Constitution</h4></a></li>
          <li id="listItem"><a href="teacherstatistics.php" ><h4>Teacher Statistics</h4></a></li>
          <li id="listItem"><a href="schoolstatistics.php" ><h4>School Statistics</h4></a></li>
        <?php } ?>

        <?php if($position == '5'){ ?>
          <li id="listItem"><a href="#" ><h4>School Teacher Constitution</h4></a></li>
          <li id="listItem"><a href="#" ><h4>Confirm Appointment</h4></a></li>
          <li id="listItem"><a href="#" ><h4>Teacher History</h4></a></li>
          <li id="listItem"><a href="confirm_appointment.php" ><h4>Confirm Appointment</h4></a></li>
          <li id="listItem"><a href="teacherconstitution.php" ><h4>Teacher Constitution</h4></a></li>
          <li id="listItem"><a href="teacherstatistics.php" ><h4>Teacher Statistics</h4></a></li>
          <li id="listItem"><a href="schoolstatistics.php" ><h4>School Statistics</h4></a></li>
        <?php } ?>
        <?php if($position == '6'){ ?>
          <li id="listItem"><a href="teacherstatistics.php" ><h4>Teacher Statistics</h4></a></li>
          <li id="listItem"><a href="schoolstatistics.php" ><h4>School Statistics</h4></a></li>
          <li id="listItem"><a href="educationoffice.php" ><h4>Schools And Offices</h4></a></li>
        <?php } ?>
        <?php if($position == '7'){ ?>
          <li id="listItem"><a href="#" ><h4>Change Your Profile</h4></a></li>
          <li id="listItem"><a href="teacherstatistics.php" ><h4>Teacher Statistics</h4></a></li>
          <li id="listItem"><a href="schoolstatistics.php" ><h4>School Statistics</h4></a></li>
        <?php } ?>
        <?php if($position == '8'){ ?>
          <li id="listItem"><a href="#" ><h4>Change Your Profile</h4></a></li>
          <li id="listItem"><a href="teacherstatistics.php" ><h4>Teacher Statistics</h4></a></li>
          <li id="listItem"><a href="schoolstatistics.php" ><h4>School Statistics</h4></a></li>
        <?php } ?>
        <?php if($position == '9'){ ?>
          <li id="listItem"><a href="#" ><h4>Change Your Profile</h4></a></li>
          <li id="listItem"><a href="teacherstatistics.php" ><h4>Teacher Statistics</h4></a></li>
          <li id="listItem"><a href="schoolstatistics.php" ><h4>School Statistics</h4></a></li>
        <?php } ?>
        <?php if($position == '10'){ ?>
          <li id="listItem"><a href="#" ><h4>Change Your Profile</h4></a></li>
          <li id="listItem"><a href="confirm_appointment.php" ><h4>Confirm Appointment</h4></a></li>
          <li id="listItem"><a href="#" ><h4>Create Principal Profile</h4></a></li>
          <li id="listItem"><a href="#" ><h4>Change Principal Profile</h4></a></li>
          <li id="listItem"><a href="#" ><h4>Shutdown Principal Profile</h4></a></li>
          <li id="listItem"><a href="#" ><h4>Create School Profile</h4></a></li>
          <li id="listItem"><a href="#" ><h4>Change School Profile</h4></a></li>
          <li id="listItem"><a href="#" ><h4>Shutdown School Profile</h4></a></li>
          <li id="listItem"><a href="teacherstatistics.php" ><h4>Teacher Statistics</h4></a></li>
          <li id="listItem"><a href="schoolstatistics.php" ><h4>School Statistics</h4></a></li>
          <li id="listItem"><a href="educationoffice.php" ><h4>Schools And Offices</h4></a></li>
        <?php } ?>
        <?php if($position == '11'){ ?>
          <li id="listItem"><a href="#" ><h4>Change Your Profile</h4></a></li>
          <li id="listItem"><a href="#" ><h4>Create Principal Profile</h4></a></li>
          <li id="listItem"><a href="#" ><h4>Change Principal Profile</h4></a></li>
          <li id="listItem"><a href="#" ><h4>Shutdown Principal Profile</h4></a></li>
          <li id="listItem"><a href="#" ><h4>Create School Profile</h4></a></li>
          <li id="listItem"><a href="#" ><h4>Change School Profile</h4></a></li>
          <li id="listItem"><a href="#" ><h4>Shutdown School Profile</h4></a></li>
          <li id="listItem"><a href="teacherstatistics.php" ><h4>Teacher Statistics</h4></a></li>
          <li id="listItem"><a href="schoolstatistics.php" ><h4>School Statistics</h4></a></li>
        <?php } ?>
        <?php if($position == '12'){ ?>
          <li id="listItem"><a href="#" ><h4>Create Principal Profile</h4></a></li>
          <li id="listItem"><a href="#" ><h4>Change Principal Profile</h4></a></li>
          <li id="listItem"><a href="#" ><h4>Shutdown Principal Profile</h4></a></li>
          <li id="listItem"><a href="createschoolprofile.php" ><h4>Create School Profile</h4></a></li>
          <li id="listItem"><a href="#" ><h4>Change School Profile</h4></a></li>
          <li id="listItem"><a href="#" ><h4>Shutdown School Profile</h4></a></li>
          <li id="listItem"><a href="teacherstatistics.php" ><h4>Teacher Statistics</h4></a></li>
          <li id="listItem"><a href="schoolstatistics.php" ><h4>School Statistics</h4></a></li>
          <li id="listItem"><a href="educationoffice.php" ><h4>Schools And Offices</h4></a></li>
        <?php } ?>
        <?php if($position == '13'){ ?>
          <li id="listItem"><a href="#" ><h4>Create Principal Profile</h4></a></li>
          <li id="listItem"><a href="#" ><h4>Change Principal Profile</h4></a></li>
          <li id="listItem"><a href="#" ><h4>Shutdown Principal Profile</h4></a></li>
          <li id="listItem"><a href="createschoolprofile.php" ><h4>Create School Profile</h4></a></li>
          <li id="listItem"><a href="#" ><h4>Change School Profile</h4></a></li>
          <li id="listItem"><a href="#" ><h4>Shutdown School Profile</h4></a></li>
          <li id="listItem"><a href="teacherstatistics.php" ><h4>Teacher Statistics</h4></a></li>
          <li id="listItem"><a href="schoolstatistics.php" ><h4>School Statistics</h4></a></li>
          <li id="listItem"><a href="educationoffice.php" ><h4>Schools And Offices</h4></a></li>
        <?php } ?>
        <?php if($position == '14'){ ?>
          <li id="listItem"><a href="createprincipalprofile.php" ><h4>Create Principal Profile</h4></a></li>
          <li id="listItem"><a href="#" ><h4>Change Principal Profile</h4></a></li>
          <li id="listItem"><a href="#" ><h4>Shutdown Principal Profile</h4></a></li>
          <li id="listItem"><a href="createschoolprofile.php" ><h4>Create School Profile</h4></a></li>
          <li id="listItem"><a href="changeschoolprofile.php" ><h4>Change School Profile</h4></a></li>
          <li id="listItem"><a href="#" ><h4>Shutdown School Profile</h4></a></li>
          <li id="listItem"><a href="confirm_appointment.php" ><h4>Confirm Appointment</h4></a></li>
          <li id="listItem"><a href="teacherselections.php" ><h4>Teacher Selections</h4></a></li>
          <li id="listItem"><a href="teacherstatistics.php" ><h4>Teacher Statistics</h4></a></li>
          <li id="listItem"><a href="schoolstatistics.php" ><h4>School Statistics</h4></a></li>
          <li id="listItem"><a href="educationoffice.php" ><h4>Schools And Offices</h4></a></li>
        <?php } ?>
      </ul>
    </div>
  </div>
*/ ?>
</div>

<footer class="container-fluid text-center ">
  <div class="row footer" style="background-color: #1ca1d8">
    <p>2019 Copyright: www.semis.lk</p>
  </div>
  
</footer>

</body>
</html>
