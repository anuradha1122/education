<?php include("database.php"); 
ob_start();

#page number 02

#declair database


$database = new Database();


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

    <form class="navbar-form navbar-right" method="POST" action="">
      <div class="form-group text-danger text-right">
        <span><img src="img/flag.png" style="width: 8%"></span>
        <input type="text" class="form-control" placeholder="E-Mail Or NIC" name="email" style="border: black solid 2px;">
        <input type="password" class="form-control" placeholder="Pass Word" name="psw" style="border: black solid 2px;">
      </div>
      <button type="submit" class="btln" id="button" style="border: black solid 2px;">Log In</button>
     
    </form>
  </div>
</nav>

<div class="container-fluid">
  
  <?php $position = $database ->home_selection(); ?>

  <div class="row" style="padding-top: 50px;">
    <div class="col-xs-3 col-xs-offset-3 text-center">
      <img class="animated flipInY slower" src="img/sepala.gif" style="width: 80%;height: 80%">
    </div>
    <div class="col-xs-3 text-center">
      <img class="animated flipInY slower" src="img/logo.png" style="width: 100%;height: 100%">
    </div>
    
  </div>
  <div class="row text-center">
    <h1 style="font-family: 'arjunn',Arial, sans-serif;">w;s.re ckdêm;s;=ukaf.a mKsjqvh</h1>
  </div>
  <div class="row text-center">
    <img src="img/pmess.gif" style="width: 60%;height: 60%">
  </div>

  <div class="row text-center">
    <h1 style="font-family: 'kalaham',Arial, sans-serif;">mjpNkjF [dhjpgjpapd; tho;j;Jr; nra;jp</h1>
  </div>
  <div class="row text-center">
    <img src="img/pmest.gif" style="width: 60%;height: 60%">
  </div>
</div>

<footer class="container-fluid text-center ">
  <div class="row footer">
    <p>2019 Copyright: semis.lk</p>
  </div>
  
</footer>

</body>
</html>
