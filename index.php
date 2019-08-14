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

<div class="container-fluid" >
  <div class="row text-right text-danger" style="background-color: green">
     <?php $database -> conditional_display($login_err); ?>
  </div>
  <div class="row text-center animated fadeInRight slower" style="background-color: white;color: black;font-family: 'hgs4l',Arial, sans-serif;">
     <h2 class="hidden-xs animated flipInY delay-1s slower"><b style="color: #1ca1d8;">S</b>ABARAGAMUWA <b style="color: #1ca1d8">E</b>DUCATION <b style="color: #1ca1d8">M</b>ANAGEMENT <b style="color: #1ca1d8">I</b>NFORMATION <b style="color: #1ca1d8">S</b>YSTEM</h2>
     <h4 class="visible-xs animated flipInY delay-1s slower"><b style="color: #1ca1d8;">S</b>ABARAGAMUWA <b style="color: #1ca1d8">E</b>DUCATION <b style="color: #1ca1d8">M</b>ANAGEMENT <b style="color: #1ca1d8">I</b>NFORMATION <b style="color: #1ca1d8">S</b>YSTEM</h4>
  </div>

  <div class="row" style="display: flex;align-items: center;">
    <div class="col-sm-4 hidden-xs text-center" style="height: 100%;">
      <img src="img/msg.gif" style="width: 100%;height: 100%;">
        <div class="centered tile" style="position: absolute;top: 50%;left: 50%;transform: translate(-50%, -50%);color: white;">
          
         
         <img class="animated delay-2s flipInY slower" src="img/president.gif" style="width: 80%;height: 80%;">
         
         <a href="president.php"><h3 style="font-family: 'arjunn',Arial, sans-serif;">w;s.re ckdêm;s;=ukaf.a mKsjqvh</h3><h4 style="font-family: 'kalaham',Arial, sans-serif;">mjpNkjF [dhjpgjpapd; tho;j;Jr; nra;jp</h4></a>
        </div>

    </div>
    <div class="col-xs-12 col-sm-8" style="position: relative;text-align: center;">
      <img src="img/main7.gif" style="width: 100%;height: 100%;border: solid;border-color: black;opacity: 0.3">
      <div class="centered tile" style="position: absolute;top: 50%;left: 50%;transform: translate(-50%, -50%);color: white;">
         
         <img class="animated delay-2s flipInY slower" src="img/logo.png" style="width: 90%;height: 90%;">
         
      </div>

    </div>
  </div>
  <div class="row text-center visible-xs" style="background-color: white;color: black;font-family: 'hgs4l',Arial, sans-serif;">
     <p style="font-family: 'hgs4l',Arial, sans-serif;">
        Amongst the patterns of</br>
        Hues, movements, images, rhythms,</br>
        Relishing the digital world in the blink of an eye,</br>
        Marching together, unlost,</br>
        With a wandering humankind.</br></br>

        Numbers, data, information</br>
        positive, negative, multiplications,</br>
        all shared in the blink of an eye,</br>
        among all,
        Let’s march forward,</br>
        with the talented, renowned humanity</br></br>

        The world won’t come to us,</br>
        Towards it must we march,</br>
        With what we call our own,</br>
        Our name,
        Our talents,
        Our values,</br>
        Let’s take them to heart </br>
        and onwards and forward,</br>
        Let’s march.</br></br>

        Schools, teachers, pupils, principals, officers,</br>
        Information, they ask for often,</br>
        With it, let’s move forward.</br>
  </div>
  

  <div class="row text-center" style="padding-top: 10px;padding-bottom: 10px;color: white">
    <div class="col-md-2 col-sm-4 col-xs-12">
      <a href="index.php"><img src="img/tile.gif" style="width: 100%;height: 100%;border: solid;border-color: black;border-radius: 15px;">
      <div class="centered tile" style="position: absolute;top: 50%;left: 50%;transform: translate(-50%, -50%);color: white;">
        
       <h3 class="hidden-xs hidden-sm"><span class="glyphicon glyphicon-home" aria-hidden="true"></span></br>ABOUT US</h3>
       <h3 class="visible-sm"><span class="glyphicon glyphicon-home" aria-hidden="true"></span></br>ABOUT US</h3>
       <h2 class="visible-xs"><span class="glyphicon glyphicon-home" aria-hidden="true"></span></br>ABOUT US</h2></div></a>
    </div>
    <div class="col-md-2 col-sm-4 col-xs-12">
      <a href="guide.php"><img src="img/tile.gif" style="width: 100%;height: 100%;border: solid;border-color: black;border-radius: 15px;">
      <div class="centered tile" style="position: absolute;top: 50%;left: 50%;transform: translate(-50%, -50%);color: white;">
      <h3 class="hidden-xs hidden-sm"><span class="glyphicon glyphicon-random" aria-hidden="true"></span></br>GUIDES</h3>
       <h3 class="visible-sm"><span class="glyphicon glyphicon-random" aria-hidden="true"></span></br>GUIDES</h3>
       <h2 class="visible-xs"><span class="glyphicon glyphicon-random" aria-hidden="true"></span></br>GUIDES</h2></div></a>
    </div>
    <div class="col-md-2 col-sm-4 col-xs-12">
      <a href="circulars.php"><img src="img/tile.gif" style="width: 100%;height: 100%;border: solid;border-color: black;border-radius: 15px;">
      <div class="centered tile" style="position: absolute;top: 50%;left: 50%;transform: translate(-50%, -50%);color: white;">
      <h3 class="hidden-xs hidden-sm"><span class="glyphicon glyphicon-repeat" aria-hidden="true"></span></br>CIRCULARS</h3>
       <h3 class="visible-sm"><span class="glyphicon glyphicon-repeat" aria-hidden="true"></span></br>CIRCULARS</h3>
       <h2 class="visible-xs"><span class="glyphicon glyphicon-repeat" aria-hidden="true"></span></br>CIRCULARS</h2></div></a>
    </div>
    <div class="col-md-2 col-sm-4 col-xs-12">
      <a href="librery.php"><img src="img/tile.gif" style="width: 100%;height: 100%;border: solid;border-color: black;border-radius: 15px;">
      <div class="centered tile" style="position: absolute;top: 50%;left: 50%;transform: translate(-50%, -50%);color: white;">
      <h3 class="hidden-xs hidden-sm"><span class="glyphicon glyphicon-book" aria-hidden="true"></span></br>LIBRARY</h3>
       <h3 class="visible-sm"><span class="glyphicon glyphicon-book" aria-hidden="true"></span></br>LIBRARY</h3>
       <h2 class="visible-xs"><span class="glyphicon glyphicon-book" aria-hidden="true"></span></br>LIBRARY</h2></div></a>
    </div>
    <div class="col-md-2 col-sm-4 col-xs-12">
      <a href="index.php"><img src="img/tile.gif" style="width: 100%;height: 100%;border: solid;border-color: black;border-radius: 15px;">
      <div class="centered tile" style="position: absolute;top: 50%;left: 50%;transform: translate(-50%, -50%);color: white;">
      <h3 class="hidden-xs hidden-sm"><span class="glyphicon glyphicon-duplicate" aria-hidden="true"></span></br>PAPERS</h3>
       <h3 class="visible-sm"><span class="glyphicon glyphicon-duplicate" aria-hidden="true"></span></br>PAPERS</h3>
       <h2 class="visible-xs"><span class="glyphicon glyphicon-duplicate" aria-hidden="true"></span></br>PAPERS</h2></div></a>
    </div>
    <div class="col-md-2 col-sm-4 col-xs-12">
      <a href="index.php"><img src="img/tile.gif" style="width: 100%;height: 100%;border: solid;border-color: black;border-radius: 15px;">
      <div class="centered tile" style="position: absolute;top: 50%;left: 50%;transform: translate(-50%, -50%);color: white;">
      <h3 class="hidden-xs hidden-sm"><span class="glyphicon glyphicon-camera" aria-hidden="true"></span></br>GALLERY</h3>
       <h3 class="visible-sm"><span class="glyphicon glyphicon-camera" aria-hidden="true"></span></br>GALLERY</h3>
       <h2 class="visible-xs"><span class="glyphicon glyphicon-camera" aria-hidden="true"></span></br>GALLERY</h2></div></a>
    </div>
    
  </div>

  <div class="row text-center" style="padding-top: 10px;padding-bottom: 10px">
    <div class="col-md-2 col-sm-4 col-xs-12">
      <a href="guide.php"><img src="img/tile.gif" style="width: 100%;height: 100%;border: solid;border-color: black;border-radius: 15px;">
      <div class="centered tile" style="position: absolute;top: 50%;left: 50%;transform: translate(-50%, -50%);color: white;">
      <h3 class="hidden-xs hidden-sm"><span class="glyphicon glyphicon-home" aria-hidden="true"></span></br>GUIDES</h3>
       <h3 class="visible-sm"><span class="glyphicon glyphicon-home" aria-hidden="true"></span></br>GUIDES</h3>
       <h2 class="visible-xs"><span class="glyphicon glyphicon-home" aria-hidden="true"></span></br>GUIDES</h2></div></a>
    </div>
    <div class="col-md-2 col-sm-4 col-xs-12">
      <a href="index.php"><img src="img/tile.gif" style="width: 100%;height: 100%;border: solid;border-color: black;border-radius: 15px;">
      <div class="centered tile" style="position: absolute;top: 50%;left: 50%;transform: translate(-50%, -50%);color: white;">
      <h3 class="hidden-xs hidden-sm"><span class="glyphicon glyphicon-home" aria-hidden="true"></span></br>CONTACT US</h3>
       <h3 class="visible-sm"><span class="glyphicon glyphicon-home" aria-hidden="true"></span></br>CONTACT US</h3>
       <h2 class="visible-xs"><span class="glyphicon glyphicon-home" aria-hidden="true"></span></br>CONTACT US</h2></div></a>
    </div>
    <div class="col-md-2 col-sm-4 col-xs-12">
      <a href="index.php"><img src="img/tile.gif" style="width: 100%;height: 100%;border: solid;border-color: black;border-radius: 15px;">
      <div class="centered tile" style="position: absolute;top: 50%;left: 50%;transform: translate(-50%, -50%);color: white;">
      <h3 class="hidden-xs hidden-sm"><span class="glyphicon glyphicon-home" aria-hidden="true"></span></br>COMMENTS</h3>
       <h3 class="visible-sm"><span class="glyphicon glyphicon-home" aria-hidden="true"></span></br>COMMENTS</h3>
       <h2 class="visible-xs"><span class="glyphicon glyphicon-home" aria-hidden="true"></span></br>COMMENTS</h2></div></a>
    </div>
    <div class="col-md-2 col-sm-4 col-xs-12">
      <a href="index.php"><img src="img/tile.gif" style="width: 100%;height: 100%;border: solid;border-color: black;border-radius: 15px;">
      <div class="centered tile" style="position: absolute;top: 50%;left: 50%;transform: translate(-50%, -50%);color: white;">
      <h3 class="hidden-xs hidden-sm"><span class="glyphicon glyphicon-home" aria-hidden="true"></span></br>PAPERS</h3>
       <h3 class="visible-sm"><span class="glyphicon glyphicon-home" aria-hidden="true"></span></br>PAPERS</h3>
       <h2 class="visible-xs"><span class="glyphicon glyphicon-home" aria-hidden="true"></span></br>PAPERS</h2></div></a>
    </div>
    <div class="col-md-2 col-sm-4 col-xs-12">
      <a href="index.php"><img src="img/tile.gif" style="width: 100%;height: 100%;border: solid;border-color: black;border-radius: 15px;">
      <div class="centered tile" style="position: absolute;top: 50%;left: 50%;transform: translate(-50%, -50%);color: white;">
      <h3 class="hidden-xs hidden-sm"><span class="glyphicon glyphicon-home" aria-hidden="true"></span></br>GALLERY</h3>
       <h3 class="visible-sm"><span class="glyphicon glyphicon-home" aria-hidden="true"></span></br>GALLERY</h3>
       <h2 class="visible-xs"><span class="glyphicon glyphicon-home" aria-hidden="true"></span></br>GALLERY</h2></div></a>
    </div>
    <div class="col-md-2 col-sm-4 col-xs-12">
      <a href="index.php"><img src="img/tile.gif" style="width: 100%;height: 100%;border: solid;border-color: black;border-radius: 15px;">
      <div class="centered tile" style="position: absolute;top: 50%;left: 50%;transform: translate(-50%, -50%);color: white;">
      <h3 class="hidden-xs hidden-sm"><span class="glyphicon glyphicon-home" aria-hidden="true"></span></br>STATISTICS</h3>
       <h3 class="visible-sm"><span class="glyphicon glyphicon-home" aria-hidden="true"></span></br>STATISTICS</h3>
       <h2 class="visible-xs"><span class="glyphicon glyphicon-home" aria-hidden="true"></span></br>STATISTICS</h2></div></a>
    </div>
  </div>

  <div class="row text-center" style="background-color: white;color: black;">
     <h2 style="background-color: white;color: black;font-family: 'basuru',Arial, sans-serif;">
      <h1><span style="color: #1ca1d8">වේගවත්</span> සමාජයක - <span style="color: #1ca1d8">මෘදු</span> ගමන්මඟ ...</h1>
      <h2 style="font-family: 'kalaham',Arial, sans-serif;"><span style="color: #1ca1d8">khw;wkilAk;</span> r%fj;jpd; <span style="color: #1ca1d8">,yF</span> nray;top</h2>
      <h2><span style="color: #1ca1d8">Soft</span> path of The <span style="color: #1ca1d8">moving</span> Society ...</h2>
    </h2>
  </div>
  <div class="row text-center" style="background-color: white;color: black;font-family: 'hgs4',Arial, sans-serif;padding-top: 10px">
     <div class="col-xs-12 col-sm-4" style="padding-bottom: 10px;">
       <img src="img/mahinda.gif" style="width: 50%;height: 50%;border-radius: 25%;padding-bottom: 10px">
       <div class="col-xs-12" style="color: black">
         <p><a href="sec.php">"Digitization towards smart service"</a></p> 
         <h4 style="color: #1ca1d8;"> MAHINDA S WEERASOORIYA</h4>
         <h4>Secretary</h4>
         <h5>Ministry of Education, Cultural and Information Technology, Sabaragamuwa province</h5>
       </div>
     </div>
     <div class="col-xs-12 col-sm-4" style="padding-bottom: 10px;">
       <img src="img/damma.gif" style="width: 50%;height: 50%;border-radius: 25%;padding-bottom: 10px">
       <div class="col-xs-12" style="color: black">
         <p><a href="governer.php">"'SipThathu' Gateway to Digitization"</a></p>
         <h4 style="color: #1ca1d8;">DHAMMA DISSANAYAKE</h4>
         <h4>Hon. Governer</h4>
         <h5>Sabaragamuwa province</h5>
       </div>
     </div>
     <div class="col-xs-12 col-sm-4" style="padding-bottom: 10px;">
       <img src="img/sepala.gif" style="width: 50%;height: 50%;border-radius: 25%;padding-bottom: 10px">
       <div class="col-xs-12" style="color: black">
         <p><a href="director.php">"Soft Path of the Fast Moving Society"</a></p>
         <h4 style="color: #1ca1d8;"> SEPALA KURUPPU ARACHCHI</h4>
         <h4>Director</h4>
         <h5>Provincial Department of Education, Sabaragamuwa Province</h5>
       </div>
     </div>
  </div>
  
</div>

<footer class="container-fluid text-center ">
  <div class="row footer">
    <p style="background-color: #1ca1d8">2019 Copyright: www.semis.lk</p>
  </div>
  
</footer>