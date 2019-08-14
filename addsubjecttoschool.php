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

    #button {

    	
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

    #sub_no {

    	text-align: center;
    	width: 20%;
    }

    #class_amount {

    	text-align: center;
    	width: 30%;
    }

    #subject {

    	text-align: left;
    	width: 50%;
    }
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


    input[type=text], [type=number], select, [type=date], [type=password] {
    width: 100%;
    padding: 4px 10px;
    margin: 1px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 10px;
    box-sizing: border-box;
    }


    input[type=submit] {
        width: 30%;
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
<?php
#page number 29

$database = new Database();

$database -> empty_session();
//$database -> restricted_page('29');

$number_err ="";
$x =  0;
$y = 1;
if(isset($_SESSION['pr_id'])){
  $pr_id          = $database -> session_to_variabal($_SESSION['pr_id']);
  $appointment      = $database -> current_principal_search($pr_id);
}
if(isset($_SESSION['tc_id'])){
  $tc_id          = $database -> session_to_variabal($_SESSION['tc_id']);
  $appointment      = $database -> current_teacher_search($tc_id);
}

$school 	 			= $database -> table_by_id($appointment['school_no'],'school','school_no');
$school_subject 	 	= $database -> table_by_id($school['sc_id'],'school_subject','sc_id');

if(!isset($school_subject['sc_id'])){

	$database -> new_school_subject($school['sc_id']);
	$database -> headerto('addsubjecttoschool.php');
}

if($_SERVER["REQUEST_METHOD"] == "POST"){

   if(isset($_POST['submit'])){
   			
  		if(isset($_POST['common_si']) AND $_POST['common_si'] <> ''){
        $common_si    = $database -> post_to_variabal($_POST['common_si']);
        $update       = $database -> update_one_column('school_subject', 'common_si', $common_si, 'sc_id', $school['sc_id']);
      }

      if(isset($_POST['common_tm']) AND $_POST['common_tm'] <> ''){
        $common_tm    = $database -> post_to_variabal($_POST['common_tm']);
        $update       = $database -> update_one_column('school_subject', 'common_tm', $common_tm, 'sc_id', $school['sc_id']);
      }

      if(isset($_POST['common_en']) AND $_POST['common_en'] <> ''){
        $common_en    = $database -> post_to_variabal($_POST['common_en']);
        $update       = $database -> update_one_column('school_subject', 'common_en', $common_en, 'sc_id', $school['sc_id']);
      }

      if(isset($_POST['english_pri_en']) AND $_POST['english_pri_en'] <> ''){
        $english_pri_en    = $database -> post_to_variabal($_POST['english_pri_en']);
        $update       = $database -> update_one_column('school_subject', 'english_pri_en', $english_pri_en, 'sc_id', $school['sc_id']);
      }

      if(isset($_POST['second_lang_si']) AND $_POST['second_lang_si'] <> ''){
        $second_lang_si    = $database -> post_to_variabal($_POST['second_lang_si']);
        $update       = $database -> update_one_column('school_subject', 'second_lang_si', $second_lang_si, 'sc_id', $school['sc_id']);
      }

      if(isset($_POST['second_lang_tm']) AND $_POST['second_lang_tm'] <> ''){
        $second_lang_tm    = $database -> post_to_variabal($_POST['second_lang_tm']);
        $update       = $database -> update_one_column('school_subject', 'second_lang_tm', $second_lang_tm, 'sc_id', $school['sc_id']);
      }

      if(isset($_POST['second_lang_en']) AND $_POST['second_lang_en'] <> ''){
        $second_lang_en    = $database -> post_to_variabal($_POST['second_lang_en']);
        $update       = $database -> update_one_column('school_subject', 'second_lang_en', $second_lang_en, 'sc_id', $school['sc_id']);
      }

      if(isset($_POST['primary_sup_si']) AND $_POST['primary_sup_si'] <> ''){
        $primary_sup_si    = $database -> post_to_variabal($_POST['primary_sup_si']);
        $update       = $database -> update_one_column('school_subject', 'primary_sup_si', $primary_sup_si, 'sc_id', $school['sc_id']);
      }

      if(isset($_POST['primary_sup_tm']) AND $_POST['primary_sup_tm'] <> ''){
        $primary_sup_tm    = $database -> post_to_variabal($_POST['primary_sup_tm']);
        $update       = $database -> update_one_column('school_subject', 'primary_sup_tm', $primary_sup_tm, 'sc_id', $school['sc_id']);
      }

      if(isset($_POST['primary_sup_en']) AND $_POST['primary_sup_en'] <> ''){
        $primary_sup_en    = $database -> post_to_variabal($_POST['primary_sup_en']);
        $update       = $database -> update_one_column('school_subject', 'primary_sup_en', $primary_sup_en, 'sc_id', $school['sc_id']);
      }

      if(isset($_POST['science_si']) AND $_POST['science_si'] <> ''){
        $science_si    = $database -> post_to_variabal($_POST['science_si']);
        $update       = $database -> update_one_column('school_subject', 'science_si', $science_si, 'sc_id', $school['sc_id']);
      }

      if(isset($_POST['science_tm']) AND $_POST['science_tm'] <> ''){
        $science_tm    = $database -> post_to_variabal($_POST['science_tm']);
        $update       = $database -> update_one_column('school_subject', 'science_tm', $science_tm, 'sc_id', $school['sc_id']);
      }

      if(isset($_POST['science_en']) AND $_POST['science_en'] <> ''){
        $science_en    = $database -> post_to_variabal($_POST['science_en']);
        $update       = $database -> update_one_column('school_subject', 'science_en', $science_en, 'sc_id', $school['sc_id']);
      }

      if(isset($_POST['maths_si']) AND $_POST['maths_si'] <> ''){
        $maths_si    = $database -> post_to_variabal($_POST['maths_si']);
        $update       = $database -> update_one_column('school_subject', 'maths_si', $maths_si, 'sc_id', $school['sc_id']);
      }

      if(isset($_POST['maths_tm']) AND $_POST['maths_tm'] <> ''){
        $maths_tm    = $database -> post_to_variabal($_POST['maths_tm']);
        $update       = $database -> update_one_column('school_subject', 'maths_tm', $maths_tm, 'sc_id', $school['sc_id']);
      }

      if(isset($_POST['maths_en']) AND $_POST['maths_en'] <> ''){
        $maths_en    = $database -> post_to_variabal($_POST['maths_en']);
        $update       = $database -> update_one_column('school_subject', 'maths_en', $maths_en, 'sc_id', $school['sc_id']);
      }

      if(isset($_POST['mother_lang_si']) AND $_POST['mother_lang_si'] <> ''){
        $mother_lang_si    = $database -> post_to_variabal($_POST['mother_lang_si']);
        $update       = $database -> update_one_column('school_subject', 'mother_lang_si', $mother_lang_si, 'sc_id', $school['sc_id']);
      }

      if(isset($_POST['mother_lang_tm']) AND $_POST['mother_lang_tm'] <> ''){
        $mother_lang_tm    = $database -> post_to_variabal($_POST['mother_lang_tm']);
        $update       = $database -> update_one_column('school_subject', 'mother_lang_tm', $mother_lang_tm, 'sc_id', $school['sc_id']);
      }

      if(isset($_POST['mother_lang_en']) AND $_POST['mother_lang_en'] <> ''){
        $mother_lang_en    = $database -> post_to_variabal($_POST['mother_lang_en']);
        $update       = $database -> update_one_column('school_subject', 'mother_lang_en', $mother_lang_en, 'sc_id', $school['sc_id']);
      }

      if(isset($_POST['english_ol_en']) AND $_POST['english_ol_en'] <> ''){
        $english_ol_en    = $database -> post_to_variabal($_POST['english_ol_en']);
        $update       = $database -> update_one_column('school_subject', 'english_ol_en', $english_ol_en, 'sc_id', $school['sc_id']);
      }

      if(isset($_POST['religion_si']) AND $_POST['religion_si'] <> ''){
        $religion_si    = $database -> post_to_variabal($_POST['religion_si']);
        $update       = $database -> update_one_column('school_subject', 'religion_si', $religion_si, 'sc_id', $school['sc_id']);
      }

      if(isset($_POST['religion_tm']) AND $_POST['religion_tm'] <> ''){
        $religion_tm    = $database -> post_to_variabal($_POST['religion_tm']);
        $update       = $database -> update_one_column('school_subject', 'religion_tm', $religion_tm, 'sc_id', $school['sc_id']);
      }

      if(isset($_POST['religion_en']) AND $_POST['religion_en'] <> ''){
        $religion_en    = $database -> post_to_variabal($_POST['religion_en']);
        $update       = $database -> update_one_column('school_subject', 'religion_en', $religion_en, 'sc_id', $school['sc_id']);
      }

      if(isset($_POST['history_si']) AND $_POST['history_si'] <> ''){
        $history_si    = $database -> post_to_variabal($_POST['history_si']);
        $update       = $database -> update_one_column('school_subject', 'history_si', $history_si, 'sc_id', $school['sc_id']);
      }

      if(isset($_POST['history_tm']) AND $_POST['history_tm'] <> ''){
        $history_tm    = $database -> post_to_variabal($_POST['history_tm']);
        $update       = $database -> update_one_column('school_subject', 'history_tm', $history_tm, 'sc_id', $school['sc_id']);
      }

      if(isset($_POST['history_en']) AND $_POST['history_en'] <> ''){
        $history_en    = $database -> post_to_variabal($_POST['history_en']);
        $update       = $database -> update_one_column('school_subject', 'history_en', $history_en, 'sc_id', $school['sc_id']);
      }

      if(isset($_POST['first_cat_si']) AND $_POST['first_cat_si'] <> ''){
        $first_cat_si    = $database -> post_to_variabal($_POST['first_cat_si']);
        $update       = $database -> update_one_column('school_subject', 'first_cat_si', $first_cat_si, 'sc_id', $school['sc_id']);
      }

      if(isset($_POST['first_cat_tm']) AND $_POST['first_cat_tm'] <> ''){
        $first_cat_tm    = $database -> post_to_variabal($_POST['first_cat_tm']);
        $update       = $database -> update_one_column('school_subject', 'first_cat_tm', $first_cat_tm, 'sc_id', $school['sc_id']);
      }

      if(isset($_POST['first_cat_en']) AND $_POST['first_cat_en'] <> ''){
        $first_cat_en    = $database -> post_to_variabal($_POST['first_cat_en']);
        $update       = $database -> update_one_column('school_subject', 'first_cat_en', $first_cat_en, 'sc_id', $school['sc_id']);
      }

      if(isset($_POST['sec_cat_si']) AND $_POST['sec_cat_si'] <> ''){
        $sec_cat_si    = $database -> post_to_variabal($_POST['sec_cat_si']);
        $update       = $database -> update_one_column('school_subject', 'sec_cat_si', $sec_cat_si, 'sc_id', $school['sc_id']);
      }

      if(isset($_POST['sec_cat_tm']) AND $_POST['sec_cat_tm'] <> ''){
        $sec_cat_tm    = $database -> post_to_variabal($_POST['sec_cat_tm']);
        $update       = $database -> update_one_column('school_subject', 'sec_cat_tm', $sec_cat_tm, 'sc_id', $school['sc_id']);
      }

      if(isset($_POST['sec_cat_en']) AND $_POST['sec_cat_en'] <> ''){
        $sec_cat_en    = $database -> post_to_variabal($_POST['sec_cat_en']);
        $update       = $database -> update_one_column('school_subject', 'sec_cat_en', $sec_cat_en, 'sc_id', $school['sc_id']);
      }

      if(isset($_POST['third_cat_si']) AND $_POST['third_cat_si'] <> ''){
        $third_cat_si    = $database -> post_to_variabal($_POST['third_cat_si']);
        $update       = $database -> update_one_column('school_subject', 'third_cat_si', $third_cat_si, 'sc_id', $school['sc_id']);
      }

      if(isset($_POST['third_cat_tm']) AND $_POST['third_cat_tm'] <> ''){
        $third_cat_tm    = $database -> post_to_variabal($_POST['third_cat_tm']);
        $update       = $database -> update_one_column('school_subject', 'third_cat_tm', $third_cat_tm, 'sc_id', $school['sc_id']);
      }

      if(isset($_POST['third_cat_en']) AND $_POST['third_cat_en'] <> ''){
        $third_cat_en    = $database -> post_to_variabal($_POST['third_cat_en']);
        $update       = $database -> update_one_column('school_subject', 'third_cat_en', $third_cat_en, 'sc_id', $school['sc_id']);
      }

      if(isset($_POST['al_sci_si']) AND $_POST['al_sci_si'] <> ''){
        $al_sci_si    = $database -> post_to_variabal($_POST['al_sci_si']);
        $update       = $database -> update_one_column('school_subject', 'al_sci_si', $al_sci_si, 'sc_id', $school['sc_id']);
      }

      if(isset($_POST['al_sci_tm']) AND $_POST['al_sci_tm'] <> ''){
        $al_sci_tm    = $database -> post_to_variabal($_POST['al_sci_tm']);
        $update       = $database -> update_one_column('school_subject', 'al_sci_tm', $al_sci_tm, 'sc_id', $school['sc_id']);
      }

      if(isset($_POST['al_sci_en']) AND $_POST['al_sci_en'] <> ''){
        $al_sci_en    = $database -> post_to_variabal($_POST['al_sci_en']);
        $update       = $database -> update_one_column('school_subject', 'al_sci_en', $al_sci_en, 'sc_id', $school['sc_id']);
      }

      if(isset($_POST['al_tec_si']) AND $_POST['al_tec_si'] <> ''){
        $al_tec_si    = $database -> post_to_variabal($_POST['al_tec_si']);
        $update       = $database -> update_one_column('school_subject', 'al_tec_si', $al_tec_si, 'sc_id', $school['sc_id']);
      }

      if(isset($_POST['al_tec_tm']) AND $_POST['al_tec_tm'] <> ''){
        $al_tec_tm    = $database -> post_to_variabal($_POST['al_tec_tm']);
        $update       = $database -> update_one_column('school_subject', 'al_tec_tm', $al_tec_tm, 'sc_id', $school['sc_id']);
      }

      if(isset($_POST['al_tec_en']) AND $_POST['al_tec_en'] <> ''){
        $al_tec_en    = $database -> post_to_variabal($_POST['al_tec_en']);
        $update       = $database -> update_one_column('school_subject', 'al_tec_en', $al_tec_en, 'sc_id', $school['sc_id']);
      }

      if(isset($_POST['al_art_si']) AND $_POST['al_art_si'] <> ''){
        $al_art_si    = $database -> post_to_variabal($_POST['al_art_si']);
        $update       = $database -> update_one_column('school_subject', 'al_art_si', $al_art_si, 'sc_id', $school['sc_id']);
      }

      if(isset($_POST['al_art_tm']) AND $_POST['al_art_tm'] <> ''){
        $al_art_tm    = $database -> post_to_variabal($_POST['al_art_tm']);
        $update       = $database -> update_one_column('school_subject', 'al_art_tm', $al_art_tm, 'sc_id', $school['sc_id']);
      }

      if(isset($_POST['al_art_en']) AND $_POST['al_art_en'] <> ''){
        $al_art_en    = $database -> post_to_variabal($_POST['al_art_en']);
        $update       = $database -> update_one_column('school_subject', 'al_art_en', $al_art_en, 'sc_id', $school['sc_id']);
      }

      if(isset($_POST['git_si']) AND $_POST['git_si'] <> ''){
        $git_si    = $database -> post_to_variabal($_POST['git_si']);
        $update       = $database -> update_one_column('school_subject', 'git_si', $git_si, 'sc_id', $school['sc_id']);
      }

      if(isset($_POST['git_tm']) AND $_POST['git_tm'] <> ''){
        $git_tm    = $database -> post_to_variabal($_POST['git_tm']);
        $update       = $database -> update_one_column('school_subject', 'git_tm', $git_tm, 'sc_id', $school['sc_id']);
      }

      if(isset($_POST['git_en']) AND $_POST['git_en'] <> ''){
        $git_en    = $database -> post_to_variabal($_POST['git_en']);
        $update       = $database -> update_one_column('school_subject', 'git_en', $git_en, 'sc_id', $school['sc_id']);
      }

      if(isset($_POST['english_al']) AND $_POST['english_al'] <> ''){
        $english_al    = $database -> post_to_variabal($_POST['english_al']);
        $update       = $database -> update_one_column('school_subject', 'english_al', $english_al, 'sc_id', $school['sc_id']);
      }


     	$database -> headerto('addsubjecttoschool.php');					
   }

   if(isset($_POST['cancel'])){

     	$database -> headerto('addsubjecttoschool.php');

   }
   if(isset($_POST['back'])){

    	$database -> headerto('home.php');
   }
}
?>

<div class="container-fluid">
  <div class="row">
    <div class="col-xs-12 text-center">
      <h3>ADD SUBJECTS TO SCHOOL</h3>
    </div>
  </div>
  <div class="row" style="border-bottom: solid">
    <form method="post" action="">
    <div class="col-sm-3 col-sm-offset-3 col-xs-6 col-xs-offset-0 justify-content-center text-center">
      <?php $database -> display_message("Subject"); ?>
    </div>
    <div class="col-sm-3  col-xs-6 justify-content-center text-center">
      <?php $database -> display_message("Class Amount"); ?>
    </div>
  </div>


  <div class="row">
    <form method="post" action="">
    <div class="col-sm-3 col-sm-offset-3 col-xs-6 col-xs-offset-0 justify-content-center text-center">
      <?php $database -> display_message("Primary Common(Sinhala)"); ?>
    </div>
    <div class="col-sm-3  col-xs-6 justify-content-center text-center">
      <input type="number" name="common_si" value="<?php echo $school_subject['common_si']; ?>" style="width: 70%;">
    </div>
  </div>

  <div class="row">
    <form method="post" action="">
    <div class="col-sm-3 col-sm-offset-3 col-xs-6 col-xs-offset-0 justify-content-center text-center">
      <?php $database -> display_message("Primary Common(Tamil)"); ?>
    </div>
    <div class="col-sm-3  col-xs-6 justify-content-center text-center">
      <input type="number" name="common_tm" value="<?php echo $school_subject['common_tm']; ?>" style="width: 70%;">
    </div>
  </div>

  <div class="row">
    <form method="post" action="">
    <div class="col-sm-3 col-sm-offset-3 col-xs-6 col-xs-offset-0 justify-content-center text-center">
      <?php $database -> display_message("Primary Common(English)"); ?>
    </div>
    <div class="col-sm-3  col-xs-6 justify-content-center text-center">
      <input type="number" name="common_en" value="<?php echo $school_subject['common_en']; ?>" style="width: 70%;">
    </div>
  </div>

  <div class="row">
    <form method="post" action="">
    <div class="col-sm-3 col-sm-offset-3 col-xs-6 col-xs-offset-0 justify-content-center text-center">
      <?php $database -> display_message("Primary English"); ?>
    </div>
    <div class="col-sm-3  col-xs-6 justify-content-center text-center">
      <input type="number" name="english_pri_en" value="<?php echo $school_subject['english_pri_en']; ?>" style="width: 70%;">
    </div>
  </div>

  <div class="row">
    <form method="post" action="">
    <div class="col-sm-3 col-sm-offset-3 col-xs-6 col-xs-offset-0 justify-content-center text-center">
      <?php $database -> display_message("Second Language(Sinhala)"); ?>
    </div>
    <div class="col-sm-3  col-xs-6 justify-content-center text-center">
      <input type="number" name="second_lang_si" value="<?php echo $school_subject['second_lang_si']; ?>" style="width: 70%;">
    </div>
  </div>

  <div class="row">
    <form method="post" action="">
    <div class="col-sm-3 col-sm-offset-3 col-xs-6 col-xs-offset-0 justify-content-center text-center">
      <?php $database -> display_message("Second Language(Tamil)"); ?>
    </div>
    <div class="col-sm-3  col-xs-6 justify-content-center text-center">
      <input type="number" name="second_lang_tm" value="<?php echo $school_subject['second_lang_tm']; ?>" style="width: 70%;">
    </div>
  </div>

  <div class="row">
    <form method="post" action="">
    <div class="col-sm-3 col-sm-offset-3 col-xs-6 col-xs-offset-0 justify-content-center text-center">
      <?php $database -> display_message("Second Language(English)"); ?>
    </div>
    <div class="col-sm-3  col-xs-6 justify-content-center text-center">
      <input type="number" name="second_lang_en" value="<?php echo $school_subject['second_lang_en']; ?>" style="width: 70%;">
    </div>
  </div>

  <div class="row">
    <form method="post" action="">
    <div class="col-sm-3 col-sm-offset-3 col-xs-6 col-xs-offset-0 justify-content-center text-center">
      <?php $database -> display_message("Primary Student Count(Sinhala)"); ?>
    </div>
    <div class="col-sm-3  col-xs-6 justify-content-center text-center">
      <input type="number" name="primary_sup_si" value="<?php echo $school_subject['primary_sup_si']; ?>" style="width: 70%;">
    </div>
  </div>

  <div class="row">
    <form method="post" action="">
    <div class="col-sm-3 col-sm-offset-3 col-xs-6 col-xs-offset-0 justify-content-center text-center">
      <?php $database -> display_message("Primary Student Count(Tamil)"); ?>
    </div>
    <div class="col-sm-3  col-xs-6 justify-content-center text-center">
      <input type="number" name="primary_sup_tm" value="<?php echo $school_subject['primary_sup_tm']; ?>" style="width: 70%;">
    </div>
  </div>

  <div class="row">
    <form method="post" action="">
    <div class="col-sm-3 col-sm-offset-3 col-xs-6 col-xs-offset-0 justify-content-center text-center">
      <?php $database -> display_message("Primary Student Count(English)"); ?>
    </div>
    <div class="col-sm-3  col-xs-6 justify-content-center text-center">
      <input type="number" name="primary_sup_en" value="<?php echo $school_subject['primary_sup_en']; ?>" style="width: 70%;">
    </div>
  </div>

  <div class="row">
    <form method="post" action="">
    <div class="col-sm-3 col-sm-offset-3 col-xs-6 col-xs-offset-0 justify-content-center text-center">
      <?php $database -> display_message("Science(Sinhala)"); ?>
    </div>
    <div class="col-sm-3  col-xs-6 justify-content-center text-center">
      <input type="number" name="science_si" value="<?php echo $school_subject['science_si']; ?>" style="width: 70%;">
    </div>
  </div>

  <div class="row">
    <form method="post" action="">
    <div class="col-sm-3 col-sm-offset-3 col-xs-6 col-xs-offset-0 justify-content-center text-center">
      <?php $database -> display_message("Science(Tamil)"); ?>
    </div>
    <div class="col-sm-3  col-xs-6 justify-content-center text-center">
      <input type="number" name="science_tm" value="<?php echo $school_subject['science_tm']; ?>" style="width: 70%;">
    </div>
  </div>

  <div class="row">
    <form method="post" action="">
    <div class="col-sm-3 col-sm-offset-3 col-xs-6 col-xs-offset-0 justify-content-center text-center">
      <?php $database -> display_message("Science(English)"); ?>
    </div>
    <div class="col-sm-3  col-xs-6 justify-content-center text-center">
      <input type="number" name="science_en" value="<?php echo $school_subject['science_en']; ?>" style="width: 70%;">
    </div>
  </div>

  <div class="row">
    <form method="post" action="">
    <div class="col-sm-3 col-sm-offset-3 col-xs-6 col-xs-offset-0 justify-content-center text-center">
      <?php $database -> display_message("Mathematics(Sinhala)"); ?>
    </div>
    <div class="col-sm-3  col-xs-6 justify-content-center text-center">
      <input type="number" name="maths_si" value="<?php echo $school_subject['maths_si']; ?>" style="width: 70%;">
    </div>
  </div>

  <div class="row">
    <form method="post" action="">
    <div class="col-sm-3 col-sm-offset-3 col-xs-6 col-xs-offset-0 justify-content-center text-center">
      <?php $database -> display_message("Mathematics(Tamil)"); ?>
    </div>
    <div class="col-sm-3  col-xs-6 justify-content-center text-center">
      <input type="number" name="maths_tm" value="<?php echo $school_subject['maths_tm']; ?>" style="width: 70%;">
    </div>
  </div>

  <div class="row">
    <form method="post" action="">
    <div class="col-sm-3 col-sm-offset-3 col-xs-6 col-xs-offset-0 justify-content-center text-center">
      <?php $database -> display_message("Mathematics(English)"); ?>
    </div>
    <div class="col-sm-3  col-xs-6 justify-content-center text-center">
      <input type="number" name="maths_en" value="<?php echo $school_subject['maths_en']; ?>" style="width: 70%;">
    </div>
  </div>

  <div class="row">
    <form method="post" action="">
    <div class="col-sm-3 col-sm-offset-3 col-xs-6 col-xs-offset-0 justify-content-center text-center">
      <?php $database -> display_message("Mother Language(Sinhala)"); ?>
    </div>
    <div class="col-sm-3  col-xs-6 justify-content-center text-center">
      <input type="number" name="mother_lang_si" value="<?php echo $school_subject['mother_lang_si']; ?>" style="width: 70%;">
    </div>
  </div>

  <div class="row">
    <form method="post" action="">
    <div class="col-sm-3 col-sm-offset-3 col-xs-6 col-xs-offset-0 justify-content-center text-center">
      <?php $database -> display_message("Mother Language(Tamil)"); ?>
    </div>
    <div class="col-sm-3  col-xs-6 justify-content-center text-center">
      <input type="number" name="mother_lang_tm" value="<?php echo $school_subject['mother_lang_tm']; ?>" style="width: 70%;">
    </div>
  </div>

  <div class="row">
    <form method="post" action="">
    <div class="col-sm-3 col-sm-offset-3 col-xs-6 col-xs-offset-0 justify-content-center text-center">
      <?php $database -> display_message("Mother Language(English)"); ?>
    </div>
    <div class="col-sm-3  col-xs-6 justify-content-center text-center">
      <input type="number" name="mother_lang_en" value="<?php echo $school_subject['mother_lang_en']; ?>" style="width: 70%;">
    </div>
  </div>

  <div class="row">
    <form method="post" action="">
    <div class="col-sm-3 col-sm-offset-3 col-xs-6 col-xs-offset-0 justify-content-center text-center">
      <?php $database -> display_message("6-11 English"); ?>
    </div>
    <div class="col-sm-3  col-xs-6 justify-content-center text-center">
      <input type="number" name="english_ol_en" value="<?php echo $school_subject['english_ol_en']; ?>" style="width: 70%;">
    </div>
  </div>

  <div class="row">
    <form method="post" action="">
    <div class="col-sm-3 col-sm-offset-3 col-xs-6 col-xs-offset-0 justify-content-center text-center">
      <?php $database -> display_message("Religion(Sinhala)"); ?>
    </div>
    <div class="col-sm-3  col-xs-6 justify-content-center text-center">
      <input type="number" name="religion_si" value="<?php echo $school_subject['religion_si']; ?>" style="width: 70%;">
    </div>
  </div>

  <div class="row">
    <form method="post" action="">
    <div class="col-sm-3 col-sm-offset-3 col-xs-6 col-xs-offset-0 justify-content-center text-center">
      <?php $database -> display_message("Religion(Tamil)"); ?>
    </div>
    <div class="col-sm-3  col-xs-6 justify-content-center text-center">
      <input type="number" name="religion_tm" value="<?php echo $school_subject['religion_tm']; ?>" style="width: 70%;">
    </div>
  </div>

  <div class="row">
    <form method="post" action="">
    <div class="col-sm-3 col-sm-offset-3 col-xs-6 col-xs-offset-0 justify-content-center text-center">
      <?php $database -> display_message("Religion(English)"); ?>
    </div>
    <div class="col-sm-3  col-xs-6 justify-content-center text-center">
      <input type="number" name="religion_en" value="<?php echo $school_subject['religion_en']; ?>" style="width: 70%;">
    </div>
  </div>

  <div class="row">
    <form method="post" action="">
    <div class="col-sm-3 col-sm-offset-3 col-xs-6 col-xs-offset-0 justify-content-center text-center">
      <?php $database -> display_message("History(Sinhala)"); ?>
    </div>
    <div class="col-sm-3  col-xs-6 justify-content-center text-center">
      <input type="number" name="history_si" value="<?php echo $school_subject['history_si']; ?>" style="width: 70%;">
    </div>
  </div>

  <div class="row">
    <form method="post" action="">
    <div class="col-sm-3 col-sm-offset-3 col-xs-6 col-xs-offset-0 justify-content-center text-center">
      <?php $database -> display_message("History(Tamil)"); ?>
    </div>
    <div class="col-sm-3  col-xs-6 justify-content-center text-center">
      <input type="number" name="history_tm" value="<?php echo $school_subject['history_tm']; ?>" style="width: 70%;">
    </div>
  </div>

  <div class="row">
    <form method="post" action="">
    <div class="col-sm-3 col-sm-offset-3 col-xs-6 col-xs-offset-0 justify-content-center text-center">
      <?php $database -> display_message("History(English)"); ?>
    </div>
    <div class="col-sm-3  col-xs-6 justify-content-center text-center">
      <input type="number" name="history_en" value="<?php echo $school_subject['history_en']; ?>" style="width: 70%;">
    </div>
  </div>

  <div class="row">
    <form method="post" action="">
    <div class="col-sm-3 col-sm-offset-3 col-xs-6 col-xs-offset-0 justify-content-center text-center">
      <?php $database -> display_message("First Catagory(Sinhala)"); ?>
    </div>
    <div class="col-sm-3  col-xs-6 justify-content-center text-center">
      <input type="number" name="first_cat_si" value="<?php echo $school_subject['first_cat_si']; ?>" style="width: 70%;">
    </div>
  </div>

  <div class="row">
    <form method="post" action="">
    <div class="col-sm-3 col-sm-offset-3 col-xs-6 col-xs-offset-0 justify-content-center text-center">
      <?php $database -> display_message("First Catagory(Tamil)"); ?>
    </div>
    <div class="col-sm-3  col-xs-6 justify-content-center text-center">
      <input type="number" name="first_cat_tm" value="<?php echo $school_subject['first_cat_tm']; ?>" style="width: 70%;">
    </div>
  </div>

  <div class="row">
    <form method="post" action="">
    <div class="col-sm-3 col-sm-offset-3 col-xs-6 col-xs-offset-0 justify-content-center text-center">
      <?php $database -> display_message("First Catagory(English)"); ?>
    </div>
    <div class="col-sm-3  col-xs-6 justify-content-center text-center">
      <input type="number" name="first_cat_en" value="<?php echo $school_subject['first_cat_en']; ?>" style="width: 70%;">
    </div>
  </div>

  <div class="row">
    <form method="post" action="">
    <div class="col-sm-3 col-sm-offset-3 col-xs-6 col-xs-offset-0 justify-content-center text-center">
      <?php $database -> display_message("Second Catagory(Sinhala)"); ?>
    </div>
    <div class="col-sm-3  col-xs-6 justify-content-center text-center">
      <input type="number" name="sec_cat_si" value="<?php echo $school_subject['sec_cat_si']; ?>" style="width: 70%;">
    </div>
  </div>

  <div class="row">
    <form method="post" action="">
    <div class="col-sm-3 col-sm-offset-3 col-xs-6 col-xs-offset-0 justify-content-center text-center">
      <?php $database -> display_message("Second Catagory(Tamil)"); ?>
    </div>
    <div class="col-sm-3  col-xs-6 justify-content-center text-center">
      <input type="number" name="sec_cat_tm" value="<?php echo $school_subject['sec_cat_tm']; ?>" style="width: 70%;">
    </div>
  </div>

  <div class="row">
    <form method="post" action="">
    <div class="col-sm-3 col-sm-offset-3 col-xs-6 col-xs-offset-0 justify-content-center text-center">
      <?php $database -> display_message("Second Catagory(English)"); ?>
    </div>
    <div class="col-sm-3  col-xs-6 justify-content-center text-center">
      <input type="number" name="sec_cat_en" value="<?php echo $school_subject['sec_cat_en']; ?>" style="width: 70%;">
    </div>
  </div>

  <div class="row">
    <form method="post" action="">
    <div class="col-sm-3 col-sm-offset-3 col-xs-6 col-xs-offset-0 justify-content-center text-center">
      <?php $database -> display_message("Third Catagory(Sinhala)"); ?>
    </div>
    <div class="col-sm-3  col-xs-6 justify-content-center text-center">
      <input type="number" name="third_cat_si" value="<?php echo $school_subject['third_cat_si']; ?>" style="width: 70%;">
    </div>
  </div>

  <div class="row">
    <form method="post" action="">
    <div class="col-sm-3 col-sm-offset-3 col-xs-6 col-xs-offset-0 justify-content-center text-center">
      <?php $database -> display_message("Third Catagory(Tamil)"); ?>
    </div>
    <div class="col-sm-3  col-xs-6 justify-content-center text-center">
      <input type="number" name="third_cat_tm" value="<?php echo $school_subject['third_cat_tm']; ?>" style="width: 70%;">
    </div>
  </div>

  <div class="row">
    <form method="post" action="">
    <div class="col-sm-3 col-sm-offset-3 col-xs-6 col-xs-offset-0 justify-content-center text-center">
      <?php $database -> display_message("Third Catagory(English)"); ?>
    </div>
    <div class="col-sm-3  col-xs-6 justify-content-center text-center">
      <input type="number" name="third_cat_en" value="<?php echo $school_subject['third_cat_en']; ?>" style="width: 70%;">
    </div>
  </div>

  <div class="row">
    <form method="post" action="">
    <div class="col-sm-3 col-sm-offset-3 col-xs-6 col-xs-offset-0 justify-content-center text-center">
      <?php $database -> display_message("Science(Sinhala)"); ?>
    </div>
    <div class="col-sm-3  col-xs-6 justify-content-center text-center">
      <input type="number" name="al_sci_si" value="<?php echo $school_subject['al_sci_si']; ?>" style="width: 70%;">
    </div>
  </div>

  <div class="row">
    <form method="post" action="">
    <div class="col-sm-3 col-sm-offset-3 col-xs-6 col-xs-offset-0 justify-content-center text-center">
      <?php $database -> display_message("Science(Tamil)"); ?>
    </div>
    <div class="col-sm-3  col-xs-6 justify-content-center text-center">
      <input type="number" name="al_sci_tm" value="<?php echo $school_subject['al_sci_tm']; ?>" style="width: 70%;">
    </div>
  </div>

  <div class="row">
    <form method="post" action="">
    <div class="col-sm-3 col-sm-offset-3 col-xs-6 col-xs-offset-0 justify-content-center text-center">
      <?php $database -> display_message("Science(English)"); ?>
    </div>
    <div class="col-sm-3  col-xs-6 justify-content-center text-center">
      <input type="number" name="al_sci_en" value="<?php echo $school_subject['al_sci_en']; ?>" style="width: 70%;">
    </div>
  </div>

  <div class="row">
    <form method="post" action="">
    <div class="col-sm-3 col-sm-offset-3 col-xs-6 col-xs-offset-0 justify-content-center text-center">
      <?php $database -> display_message("Technology(Sinhala)"); ?>
    </div>
    <div class="col-sm-3  col-xs-6 justify-content-center text-center">
      <input type="number" name="al_tec_si" value="<?php echo $school_subject['al_tec_si']; ?>" style="width: 70%;">
    </div>
  </div>

  <div class="row">
    <form method="post" action="">
    <div class="col-sm-3 col-sm-offset-3 col-xs-6 col-xs-offset-0 justify-content-center text-center">
      <?php $database -> display_message("Technology(Tamil)"); ?>
    </div>
    <div class="col-sm-3  col-xs-6 justify-content-center text-center">
      <input type="number" name="al_tec_tm" value="<?php echo $school_subject['al_tec_tm']; ?>" style="width: 70%;">
    </div>
  </div>

  <div class="row">
    <form method="post" action="">
    <div class="col-sm-3 col-sm-offset-3 col-xs-6 col-xs-offset-0 justify-content-center text-center">
      <?php $database -> display_message("Technology(English)"); ?>
    </div>
    <div class="col-sm-3  col-xs-6 justify-content-center text-center">
      <input type="number" name="al_tec_en" value="<?php echo $school_subject['al_tec_en']; ?>" style="width: 70%;">
    </div>
  </div>

  <div class="row">
    <form method="post" action="">
    <div class="col-sm-3 col-sm-offset-3 col-xs-6 col-xs-offset-0 justify-content-center text-center">
      <?php $database -> display_message("Art & Commerce(Sinhala)"); ?>
    </div>
    <div class="col-sm-3  col-xs-6 justify-content-center text-center">
      <input type="number" name="al_art_si" value="<?php echo $school_subject['al_art_si']; ?>" style="width: 70%;">
    </div>
  </div>

  <div class="row">
    <form method="post" action="">
    <div class="col-sm-3 col-sm-offset-3 col-xs-6 col-xs-offset-0 justify-content-center text-center">
      <?php $database -> display_message("Art & Commerce(Tamil)"); ?>
    </div>
    <div class="col-sm-3  col-xs-6 justify-content-center text-center">
      <input type="number" name="al_art_tm" value="<?php echo $school_subject['al_art_tm']; ?>" style="width: 70%;">
    </div>
  </div>

  <div class="row">
    <form method="post" action="">
    <div class="col-sm-3 col-sm-offset-3 col-xs-6 col-xs-offset-0 justify-content-center text-center">
      <?php $database -> display_message("Art & Commerce(English)"); ?>
    </div>
    <div class="col-sm-3  col-xs-6 justify-content-center text-center">
      <input type="number" name="al_art_en" value="<?php echo $school_subject['al_art_en']; ?>" style="width: 70%;">
    </div>
  </div>

  <div class="row">
    <form method="post" action="">
    <div class="col-sm-3 col-sm-offset-3 col-xs-6 col-xs-offset-0 justify-content-center text-center">
      <?php $database -> display_message("GIT(Sinhala)"); ?>
    </div>
    <div class="col-sm-3  col-xs-6 justify-content-center text-center">
      <input type="number" name="git_si" value="<?php echo $school_subject['git_si']; ?>" style="width: 70%;">
    </div>
  </div>

  <div class="row">
    <form method="post" action="">
    <div class="col-sm-3 col-sm-offset-3 col-xs-6 col-xs-offset-0 justify-content-center text-center">
      <?php $database -> display_message("GIT(Tamil)"); ?>
    </div>
    <div class="col-sm-3  col-xs-6 justify-content-center text-center">
      <input type="number" name="git_tm" value="<?php echo $school_subject['git_tm']; ?>" style="width: 70%;">
    </div>
  </div>

  <div class="row">
    <form method="post" action="">
    <div class="col-sm-3 col-sm-offset-3 col-xs-6 col-xs-offset-0 justify-content-center text-center">
      <?php $database -> display_message("GIT(English)"); ?>
    </div>
    <div class="col-sm-3  col-xs-6 justify-content-center text-center">
      <input type="number" name="git_en" value="<?php echo $school_subject['git_en']; ?>" style="width: 70%;">
    </div>
  </div>

  <div class="row">
    <form method="post" action="">
    <div class="col-sm-3 col-sm-offset-3 col-xs-6 col-xs-offset-0 justify-content-center text-center">
      <?php $database -> display_message("AL English"); ?>
    </div>
    <div class="col-sm-3  col-xs-6 justify-content-center text-center">
      <input type="number" name="english_al" value="<?php echo $school_subject['english_al']; ?>" style="width: 70%;">
    </div>
  </div>

	<div class="row">
	  <div class="col-sm-6 col-sm-offset-3 col-xs-offset-0 justify-content-center">
	    
	    <input id="button" type="submit" name="submit" value="Submit">
	    <input id="button" type="submit" name="cancel" value="Refresh">
	    <input id="button" type="submit" name="back" value="Back">
	      </form>
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
    
