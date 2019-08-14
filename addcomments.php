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
  <script>
    window.console = window.console || function(t) {};
  </script>

    
    
    <script>
    if (document.location.search.match(/type=embed/gi)) {
      window.parent.postMessage("resize", "*");
    }
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

    chart {
      width: 100%;
      height: 250px;
     
    }

    .row {
      margin: 0 !important;
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

    #tableMain {
      width: 35%;
      text-align: center;
      
    }

    #school {
      width: 30%;
      text-align:center;

    }

    #percentage {
      width: 35%;
      text-align:center;

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
#page number dont

$database = new Database();

$database -> empty_session();
//$database -> restricted_page('21');

$comment_err = $nic_err = $success = $staff_id = $position = "";


if($_SERVER["REQUEST_METHOD"] == "POST"){

  if(isset($_POST['submit'])){

    $creator      = $database -> session_to_variabal($_SESSION['ad_id']);

    $nic          = strtoupper($database -> form_data_process('nic'));
    $teacher          = $database -> table_by_id($nic,'teacher','nic');
    if($teacher['tc_id'] <> ""){
      $staff_id = $teacher['tc_id'];
      $position = 1;
    }else {
      $principal          = $database -> table_by_id($nic,'principal','nic');
      if($principal['pr_id'] <> ""){
        $staff_id = $principal['pr_id'];
        $position = 2;
      }else{
        $admin_staff          = $database -> table_by_id($nic,'admin_staff','nic');
        if($admin_staff['ad_id'] <> ""){
          $staff_id = $admin_staff['ad_id'];
          $position = 3;
        }else{
          $nic_err      = $database -> field_missing($nic,'NIC is Missing Or Wrong NIC');
        }
      }
    }
    

    $catagory     = $database -> form_data_process('catagory');

    $comment      = $database -> form_data_process('comment');
    $comment_err  = $database -> field_missing($comment,'Comment is Missing');

    $ip           = $database -> get_ip_address();

    $success  = $database -> insert_comment($staff_id,$position,$creator,$comment,$ip,$catagory);

  }
  if(isset($_POST['cancel'])){

    $database -> headerto('createteacherprofile.php');

  }
  if(isset($_POST['back'])){

    $database -> headerto('home.php');
  }
}
?>
<div class="container-fluid">
  <div class="row">
    <div class="col-md-12 text-center">
      <h3>ADD COMMENTS</h3>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-4 col-sm-offset-4 col-xs-offset-0 justify-content-center">
      <form method="post" action="">
      <table class = "table table-hover">

        <tr>
        <td id ="tableField">Catagory:</td>
        <td id="tableBox"><input type="radio" name="catagory" value="1" checked> Comments<br>
        <input type="radio" name="catagory" value="2"> Achievments<br>
        <input type="radio" name="catagory" value="3"> Offences</td>
        </tr>


        <tr>
        <td id ="tableField">NIC:</td>
        <td id="tableBox"><input type="text" name="nic" maxlength="15" value=""></td>
        </tr>
        
        <?php if($nic_err !=""){ ?>
        <tr>
        <td id="tableField">
        </td>
        <td id="tableBox" class="text-danger">
        <?php $database -> display_message($nic_err); ?>
        </td>
        </tr>
        <?php } ?>

        <tr>
        <td id ="tableField">Comment:</td>
        <td id="tableBox"><textarea class="form-control" id="area" name="comment" rows="6" maxlength="250"></textarea></td>
        </tr>
        
        <?php if($comment_err !=""){ ?>
        <tr>
        <td id="tableField">
        </td>
        <td id="tableBox" class="text-danger">
        <?php $database -> display_message($comment_err); ?>
        </td>
        </tr>
        <?php } ?>


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
    <div class="col-xs-12 text-center text-success">
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