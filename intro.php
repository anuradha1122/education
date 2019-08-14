<?php
#page number 01



#declair database
include("database.php");
ob_start();
$database = new Database();

$database -> full_session();
$login_err = NULL;

if($_SERVER["REQUEST_METHOD"] == "POST"){


  $email = $_POST['email'];
  $psw   = $_POST['psw'];
  $password = crypt($psw,'$2a$09$anexamplestringforsalt$');

  

  $login_err = $database-> login_coordinator($email, $password, $database);
  
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>SIP THATHU</title>
  <meta http-equiv="refresh" content="5;url=http://localhost/education/" />
  <link rel="icon" type="image/png" href="img/logo.png">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    
  
  <!-- Material Design Bootstrap -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.7/css/mdb.min.css" rel="stylesheet">


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

    .btln {
        background-color: #1ca1d8; 
        color: white; 
        border: 2px solid white;
        border-radius: 10px;
        height: 35px;
    }

    .btn:hover {
        background-color: black;
        color: white;
    }

    .row-fluid {
      background-color: black;
    }

    #myNavbar a:link { color: white; }
    #myNavbar a:visited { color: white; }
    #myNavbar a:hover { color: #cc6633; }
    #myNavbar a:active { color: green; }

    #brand-text a:link { color: #cb2026; }
    #brand-text a:visited { color: #cb2026; }
    #brand-text a:hover { color: white; }
    #brand-text a:active { color: #cb2026; }

    #document a:link { color: #cb2026; }
    #document a:visited { color: black; }
    #document a:hover { color: #cb2026; }
    #document a:active { color: black; }
    /* Add a gray background color and some padding to the footer */
    footer {
      
      padding: 25px;
    }


    div.tile {
        
        color: black;
    }

    div.tile:hover {
        color:#cb2026;
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


  <div class="container-fluid text-center" style="background-color: #1ca1d8;padding-bottom: 1000px">
    </br></br></br></br>
    <h1 class="animated heartBeat slower" style="font-family: 'basuru',Arial, sans-serif;color: white;font-size: 80px">inr.uqj ,iaikhs</h1>
    
    <img class="animated heartBeat slower" src="img/logo1.png" style="width: 30%;height: 30%;">
  </div>

<footer class="container-fluid text-center ">
  <div class="row footer">
    <p style="background-color: #1ca1d8">2019 Copyright: www.semis.lk</p>
  </div>
  
</footer>