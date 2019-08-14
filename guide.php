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
      <a class="navbar-brand" style="color: #cb2026;" href="home.php">SEMIS</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="home.php">Home</a></li>
        <li><a style ="" href="#">About</a></li>
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
    <div class="col-xs-12 text-center">
      <img src="img/logo.png" style="width: 20%;height: 20%">
    </div>
  </div>

  <div class="row text-center" style="font-family: 'hgs4l',Arial, sans-serif;">
     <h2>Teacher's Guide</h2>
  </div>
  <div class="row">
      <div class="col-sm-6 col-sm-offset-3 col-xs-12 col-xs-offset-0 text-center justify-content">
        <a href="http://nie.lk/seletguide2">
        <div class="col-sm-4 col-xs-12">
          <img src="img/guides.gif" style="width: 100%;height: 100%;">
          <div class="col-xs-12 tile" style="position: absolute;top: 50%;left: 50%;transform: translate(-50%, -50%);">
            <h3>SINHALA</h3>
          </div>
        </div>
        </a>

        <a href="http://nie.lk/seletguide3">
        <div class="col-sm-4 col-xs-12">
          <img src="img/guides.gif" style="width: 100%;height: 100%;">
          <div class="col-xs-12 tile" style="position: absolute;top: 50%;left: 50%;transform: translate(-50%, -50%);">
            <h3>TAMIL</h3>
          </div>
        </div>
        </a>
        <a href="http://nie.lk/seletguide">
        <div class="col-sm-4 col-xs-12">
          <img src="img/guides.gif" style="width: 100%;height: 100%;">
          <div class="col-xs-12 tile" style="position: absolute;top: 50%;left: 50%;transform: translate(-50%, -50%);">
            <h3>ENGLISH</h3>
          </div>
        </div>
        </a>
      </div>
  </div>
</div>

<footer class="container-fluid text-center ">
  <div class="row footer">
    <p>2018 Copyright: xcodeweb.com</p>
  </div>
  
</footer>

</body>
</html>
