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
  <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
  <script type="text/javascript">
  $(document).ready(function(){
      $('.search-box input[type="text"]').on("keyup input", function(){
          /* Get input value on change */
          var inputVal = $(this).val();
          var resultDropdown = $(this).siblings(".result");
          if(inputVal.length){
              $.get("createteachersearch.php", {term: inputVal}).done(function(data){
                  // Display the returned data in browser
                  resultDropdown.html(data);
              });
          } else{
              resultDropdown.empty();
          }
      });
      
      // Set search input value on click of result item
      $(document).on("click", ".result p", function(){
          $(this).parents(".search-box").find('input[type="text"]').val($(this).text());
          $(this).parent(".result").empty();
      });
  });
  </script>
  <script type="text/javascript">
  $(document).ready(function(){
      $('.search-box1 input[type="text"]').on("keyup input", function(){
          /* Get input value on change */
          var inputVal = $(this).val();
          var resultDropdown = $(this).siblings(".result1");
          if(inputVal.length){
              $.get("createteacherdivsearch.php", {term: inputVal}).done(function(data){
                  // Display the returned data in browser
                  resultDropdown.html(data);
              });
          } else{
              resultDropdown.empty();
          }
      });
      
      // Set search input value on click of result item
      $(document).on("click", ".result1 p", function(){
          $(this).parents(".search-box1").find('input[type="text"]').val($(this).text());
          $(this).parent(".result1").empty();
      });
  });
  </script>

  <script type="text/javascript">
  $(document).ready(function(){
      $('.search-box2 input[type="text"]').on("keyup input", function(){
          /* Get input value on change */
          var inputVal = $(this).val();
          var resultDropdown = $(this).siblings(".result2");
          if(inputVal.length){
              $.get("subjectsearch.php", {term: inputVal}).done(function(data){
                  // Display the returned data in browser
                  resultDropdown.html(data);
              });
          } else{
              resultDropdown.empty();
          }
      });
      
      // Set search input value on click of result item
      $(document).on("click", ".result2 p", function(){
          $(this).parents(".search-box2").find('input[type="text"]').val($(this).text());
          $(this).parent(".result2").empty();
      });
  });
  </script>

  <script type="text/javascript">
  $(document).ready(function(){
      $('.search-box3 input[type="text"]').on("keyup input", function(){
          /* Get input value on change */
          var inputVal = $(this).val();
          var resultDropdown = $(this).siblings(".result3");
          if(inputVal.length){
              $.get("createteachersearch.php", {term: inputVal}).done(function(data){
                  // Display the returned data in browser
                  resultDropdown.html(data);
              });
          } else{
              resultDropdown.empty();
          }
      });
      
      // Set search input value on click of result item
      $(document).on("click", ".result3 p", function(){
          $(this).parents(".search-box3").find('input[type="text"]').val($(this).text());
          $(this).parent(".result3").empty();
      });
  });
  </script>

  <script type="text/javascript">
  $(document).ready(function(){
      $('.search-box4 input[type="text"]').on("keyup input", function(){
          /* Get input value on change */
          var inputVal = $(this).val();
          var resultDropdown = $(this).siblings(".result4");
          if(inputVal.length){
              $.get("createteachersearch.php", {term: inputVal}).done(function(data){
                  // Display the returned data in browser
                  resultDropdown.html(data);
              });
          } else{
              resultDropdown.empty();
          }
      });
      
      // Set search input value on click of result item
      $(document).on("click", ".result4 p", function(){
          $(this).parents(".search-box4").find('input[type="text"]').val($(this).text());
          $(this).parent(".result4").empty();
      });
  });
  </script>

  <script type="text/javascript">
  $(document).ready(function(){
      $('.search-box5 input[type="text"]').on("keyup input", function(){
          /* Get input value on change */
          var inputVal = $(this).val();
          var resultDropdown = $(this).siblings(".result5");
          if(inputVal.length){
              $.get("createteachersearch.php", {term: inputVal}).done(function(data){
                  // Display the returned data in browser
                  resultDropdown.html(data);
              });
          } else{
              resultDropdown.empty();
          }
      });
      
      // Set search input value on click of result item
      $(document).on("click", ".result5 p", function(){
          $(this).parents(".search-box5").find('input[type="text"]').val($(this).text());
          $(this).parent(".result5").empty();
      });
  });
  </script>

  <script type="text/javascript">
  $(document).ready(function(){
      $('.search-box6 input[type="text"]').on("keyup input", function(){
          /* Get input value on change */
          var inputVal = $(this).val();
          var resultDropdown = $(this).siblings(".result6");
          if(inputVal.length){
              $.get("createteachersearch.php", {term: inputVal}).done(function(data){
                  // Display the returned data in browser
                  resultDropdown.html(data);
              });
          } else{
              resultDropdown.empty();
          }
      });
      
      // Set search input value on click of result item
      $(document).on("click", ".result6 p", function(){
          $(this).parents(".search-box6").find('input[type="text"]').val($(this).text());
          $(this).parent(".result6").empty();
      });
  });
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

    .result {

      position: absolute;
      background-color: black;
      color: white;
      z-index: 999;

    }
    .result1 {

      position: absolute;
      background-color: black;
      color: white;
      z-index: 999;

    }

    .result2 {

      position: absolute;
      background-color: black;
      color: white;
      z-index: 999;

    }

    .result3 {

      position: absolute;
      background-color: black;
      color: white;
      z-index: 999;

    }

    .result4 {

      position: absolute;
      background-color: black;
      color: white;
      z-index: 999;

    }

    .result5 {

      position: absolute;
      background-color: black;
      color: white;
      z-index: 999;

    }

    .result6 {

      position: absolute;
      background-color: black;
      color: white;
      z-index: 999;

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
#page number 14

$database = new Database();

$database -> empty_session();
$database ->restricted_page('14');

$activity ="";
$number_err = $name_err = $dstct_err = $start_err = $division_err = $primary_err = $olcls_err = $science_err = $commerce_err = $art_err = $tec_err = $success = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){

	if(isset($_POST['submit'])){

    $creator      = $database -> find_creator();

    $school_no    = $database -> form_data_process('name');
    $school_no    = $database -> data_existance($school_no,'school','name');
    $number_err   = $database -> field_missing($school_no,'School Number is Missing or Wrong');

    

    if(isset($_POST['start_date']) AND $_POST['start_date'] <> ''){
        $start_date     = $database -> post_to_variabal($_POST['start_date']);
        $update         = $database -> update_one_column('school', 'start_date', $start_date, 'school_no', $school_no);
            }

    if(isset($_POST['district']) AND $_POST['district'] <> ''){
        $district       = $database -> post_to_variabal($_POST['district']);
        $update         = $database -> update_one_column('school', 'district', $district, 'school_no', $school_no);
            }

    if(isset($_POST['add_li1']) AND $_POST['add_li1'] <> ''){
        $add_li1        = $database -> post_to_variabal($_POST['add_li1']);
        $update         = $database -> update_one_column('school', 'add_li1', $add_li1, 'school_no', $school_no);
            }

    if(isset($_POST['add_li2']) AND $_POST['add_li2'] <> ''){
        $add_li2        = $database -> post_to_variabal($_POST['add_li2']);
        $update         = $database -> update_one_column('school', 'add_li2', $add_li2, 'school_no', $school_no);
            }

    if(isset($_POST['seat']) AND $_POST['seat'] <> ''){
        $seat           = $database -> post_to_variabal($_POST['seat']);
        $update         = $database -> update_one_column('school', 'elec_seat', $seat, 'school_no', $school_no);
            }

    if(isset($_POST['mu_coun']) AND $_POST['mu_coun'] <> ''){
        $municipal      = $database -> post_to_variabal($_POST['mu_coun']);
        $update         = $database -> update_one_column('school', 'muni_coun', $municipal, 'school_no', $school_no);
            }

    if(isset($_POST['territory']) AND $_POST['territory'] <> ''){
        $territory      = $database -> post_to_variabal($_POST['territory']);
        $update         = $database -> update_one_column('school','territory', $territory, 'school_no', $school_no);
            }

    if(isset($_POST['division']) AND $_POST['division'] <> ''){
        $division       = $database -> post_to_variabal($_POST['division']);
        $division       = $database -> data_existance($division,'education_office','eo_id');
        $division_err   = $database -> field_missing($division,'Invalied Division');
        if($division <> ''){

            $update         = $database -> update_one_column('school','edu_division', $division, 'school_no', $school_no);
            }   
    }

    if(isset($_POST['primary_class_si']) AND $_POST['primary_class_si'] <> ''){
        $primary_si     = $database -> post_to_variabal($_POST['primary_class_si']);
        $update         = $database -> update_one_column('school','primary_si', $primary_si, 'school_no', $school_no);
        
    }

    if(isset($_POST['primary_class_ta']) AND $_POST['primary_class_ta'] <> ''){
        $primary_ta     = $database -> post_to_variabal($_POST['primary_class_ta']);
        $update         = $database -> update_one_column('school','primary_ta', $primary_ta, 'school_no', $school_no);
        
    }

    if(isset($_POST['primary_class_en']) AND $_POST['primary_class_en'] <> ''){
        $primary_en     = $database -> post_to_variabal($_POST['primary_class_en']);
        $update         = $database -> update_one_column('school','primary_en', $primary_en, 'school_no', $school_no);
        
    }

    if(isset($_POST['ol_class_si']) AND $_POST['ol_class_si'] <> ''){
        $ol_si          = $database -> post_to_variabal($_POST['ol_class_si']);
        $update         = $database -> update_one_column('school','ol_si', $ol_si, 'school_no', $school_no);
        
    }

    if(isset($_POST['ol_class_ta']) AND $_POST['ol_class_ta'] <> ''){
        $ol_ta          = $database -> post_to_variabal($_POST['ol_class_ta']);
        $update         = $database -> update_one_column('school','ol_ta', $ol_ta, 'school_no', $school_no);
        
    }

    if(isset($_POST['ol_class_en']) AND $_POST['ol_class_en'] <> ''){
        $ol_en          = $database -> post_to_variabal($_POST['ol_class_en']);
        $update         = $database -> update_one_column('school','ol_en', $ol_en, 'school_no', $school_no);
        
    }

    if(isset($_POST['science_class_si']) AND $_POST['science_class_si'] <> ''){
        $science_si     = $database -> post_to_variabal($_POST['science_class_si']);
        $update         = $database -> update_one_column('school','science_si', $science_si, 'school_no', $school_no);
        
    }

    if(isset($_POST['science_class_ta']) AND $_POST['science_class_ta'] <> ''){
        $science_ta     = $database -> post_to_variabal($_POST['science_class_ta']);
        $update         = $database -> update_one_column('school','science_ta', $science_ta, 'school_no', $school_no);
        
    }

    if(isset($_POST['science_class_en']) AND $_POST['science_class_en'] <> ''){
        $science_en     = $database -> post_to_variabal($_POST['science_class_en']);
        $update         = $database -> update_one_column('school','science_en', $science_en, 'school_no', $school_no);
        
    }

    if(isset($_POST['commerce_class_si']) AND $_POST['commerce_class_si'] <> ''){
        $commerce_si    = $database -> post_to_variabal($_POST['commerce_class_si']);
        $update         = $database -> update_one_column('school','commerce_si', $commerce_si, 'school_no', $school_no);
        
    }

    if(isset($_POST['commerce_class_ta']) AND $_POST['commerce_class_ta'] <> ''){
        $commerce_ta    = $database -> post_to_variabal($_POST['commerce_class_ta']);
        $update         = $database -> update_one_column('school','commerce_ta', $commerce_ta, 'school_no', $school_no);
        
    }

    if(isset($_POST['commerce_class_en']) AND $_POST['commerce_class_en'] <> ''){
        $commerce_en    = $database -> post_to_variabal($_POST['commerce_class_en']);
        $update         = $database -> update_one_column('school','commerce_en', $commerce_en, 'school_no', $school_no);
        
    }

    if(isset($_POST['art_class_si']) AND $_POST['art_class_si'] <> ''){
        $art_si         = $database -> post_to_variabal($_POST['art_class_si']);
        $update         = $database -> update_one_column('school', 'art_si', $art_si, 'school_no', $school_no);
        
    }

    if(isset($_POST['art_class_ta']) AND $_POST['art_class_ta'] <> ''){
        $art_ta         = $database -> post_to_variabal($_POST['art_class_ta']);
        $update         = $database -> update_one_column('school', 'art_ta', $art_ta, 'school_no', $school_no);
        
    }

    if(isset($_POST['art_class_en']) AND $_POST['art_class_en'] <> ''){
        $art_en         = $database -> post_to_variabal($_POST['art_class_en']);
        $update         = $database -> update_one_column('school', 'art_en', $art_en, 'school_no', $school_no);
        
    }

    if(isset($_POST['tec_class_si']) AND $_POST['tec_class_si'] <> ''){
        $tec_si         = $database -> post_to_variabal($_POST['tec_class_si']);
        $update         = $database -> update_one_column('school', 'tec_si', $tec_si, 'school_no', $school_no);
        
    }

    if(isset($_POST['tec_class_ta']) AND $_POST['tec_class_ta'] <> ''){
        $tec_ta         = $database -> post_to_variabal($_POST['tec_class_ta']);
        $update         = $database -> update_one_column('school', 'tec_ta', $tec_ta, 'school_no', $school_no);
        
    }

    if(isset($_POST['tec_class_en']) AND $_POST['tec_class_en'] <> ''){
        $tec_en         = $database -> post_to_variabal($_POST['tec_class_en']);
        $update         = $database -> update_one_column('school', 'tec_en', $tec_en, 'school_no', $school_no);
        
    }

    if(isset($_POST['grama']) AND $_POST['grama'] <> ''){
        $grama          = $database -> post_to_variabal($_POST['grama']);
        $update         = $database -> update_one_column('school', 'gra_div_no', $grama, 'school_no', $school_no);
        
    }

    if(isset($_POST['ethnicity']) AND $_POST['ethnicity'] <> ''){
        $ethnicity      = $database -> post_to_variabal($_POST['ethnicity']);
        $update         = $database -> update_one_column('school', 'cat_by_ethi', $ethnicity, 'school_no', $school_no);
        
    }

    if(isset($_POST['authority']) AND $_POST['authority'] <> ''){
        $authority      = $database -> post_to_variabal($_POST['authority']);
        $update         = $database -> update_one_column('school', 'cat_by_auth', $authority, 'school_no', $school_no);
        
    }

    if(isset($_POST['language']) AND $_POST['language'] <> ''){
        $language       = $database -> post_to_variabal($_POST['language']);
        $update         = $database -> update_one_column('school', 'cat_by_lang', $language, 'school_no', $school_no);
        
    }

    if(isset($_POST['den_cat']) AND $_POST['den_cat'] <> ''){
        $density        = $database -> post_to_variabal($_POST['den_cat']);
        $update         = $database -> update_one_column('school', 'cat_by_den', $density, 'school_no', $school_no);
        
    }

    if(isset($_POST['cla_cat']) AND $_POST['cla_cat'] <> ''){
        $class          = $database -> post_to_variabal($_POST['cla_cat']);
        $update         = $database -> update_one_column('school', 'cat_by_cls', $class, 'school_no', $school_no);
        
    }

    if(isset($_POST['gender']) AND $_POST['gender'] <> ''){
        $gender         = $database -> post_to_variabal($_POST['gender']);
        $update         = $database -> update_one_column('school', 'cat_by_gen', $gender, 'school_no', $school_no);
        
    }

    if(isset($_POST['facility']) AND $_POST['facility'] <> ''){
        $facility       = $database -> post_to_variabal($_POST['facility']);
        $update         = $database -> update_one_column('school', 'cat_by_facil', $facility, 'school_no', $school_no);
        
    }
    
    if(isset($_POST['electricity']) AND $_POST['electricity'] <> ''){
        $electricity    = $database -> post_to_variabal($_POST['electricity']);
        $update         = $database -> update_one_column('school', 'electricity', $electricity, 'school_no', $school_no);
        
    }

    if(isset($_POST['com_fa']) AND $_POST['com_fa'] <> ''){
        $computer_fa    = $database -> post_to_variabal($_POST['com_fa']);
        $update         = $database -> update_one_column('school', 'computer_fa', $computer_fa, 'school_no', $school_no);
        
    }

    if(isset($_POST['coun_unit']) AND $_POST['coun_unit'] <> ''){
        $counciling     = $database -> post_to_variabal($_POST['coun_unit']);
        $update         = $database -> update_one_column('school', 'counciling_unit', $counciling, 'school_no', $school_no);
        
    }

    if(isset($_POST['water']) AND $_POST['water'] <> ''){
        $water          = $database -> post_to_variabal($_POST['water']);
        $update         = $database -> update_one_column('school', 'water_supply', $water, 'school_no', $school_no);
        
    }

    if(isset($_POST['class_room']) AND $_POST['class_room'] <> ''){
        $class_room     = $database -> post_to_variabal($_POST['class_room']);
        $update         = $database -> update_one_column('school', 'class_room', $class_room, 'school_no', $school_no);
        
    }

    if(isset($_POST['toilet']) AND $_POST['toilet'] <> ''){
        $toilet         = $database -> post_to_variabal($_POST['toilet']);
        $update         = $database -> update_one_column('school', 'stu_toilet', $toilet, 'school_no', $school_no);
        
    }

    if(isset($_POST['admin']) AND $_POST['admin'] <> ''){
        $admin_room     = $database -> post_to_variabal($_POST['admin']);
        $update         = $database -> update_one_column('school', 'admin_unit', $admin_room, 'school_no', $school_no);
        
    }

    if(isset($_POST['library']) AND $_POST['library'] <> ''){
        $library        = $database -> post_to_variabal($_POST['library']);
        $update         = $database -> update_one_column('school', 'library', $library, 'school_no', $school_no);
        
    }

    if(isset($_POST['ol_sci']) AND $_POST['ol_sci'] <> ''){
        $ol_sci         = $database -> post_to_variabal($_POST['ol_sci']);
        $update         = $database -> update_one_column('school', 'ol_sci_lab', $ol_sci, 'school_no', $school_no);
        
    }

    if(isset($_POST['al_sci']) AND $_POST['al_sci'] <> ''){
        $al_sci         = $database -> post_to_variabal($_POST['al_sci']);
        $update         = $database -> update_one_column('school', 'al_sci_lab', $al_sci, 'school_no', $school_no);
        
    }

    if(isset($_POST['aest_unit']) AND $_POST['aest_unit'] <> ''){
        $aest_unit      = $database -> post_to_variabal($_POST['aest_unit']);
        $update         = $database -> update_one_column('school', 'aesthetic_unit', $aest_unit, 'school_no', $school_no);
        
    }

    if(isset($_POST['home_sci']) AND $_POST['home_sci'] <> ''){
        $home_sci       = $database -> post_to_variabal($_POST['home_sci']);
        $update         = $database -> update_one_column('school', 'home_sci', $home_sci, 'school_no', $school_no);
        
    }

    if(isset($_POST['gate']) AND $_POST['gate'] <> ''){
        $gate           = $database -> post_to_variabal($_POST['gate']);
        $update         = $database -> update_one_column('school', 'gate', $gate, 'school_no', $school_no);
        
    }

    if(isset($_POST['wall']) AND $_POST['wall'] <> ''){
        $wall           = $database -> post_to_variabal($_POST['wall']);
        $update         = $database -> update_one_column('school', 'wall', $wall, 'school_no', $school_no);
        
    }

    if(isset($_POST['pri_qua']) AND $_POST['pri_qua'] <> ''){
        $pri_qua        = $database -> post_to_variabal($_POST['pri_qua']);
        $update         = $database -> update_one_column('school', 'prin_quart', $pri_qua, 'school_no', $school_no);
        
    }

    if(isset($_POST['ground']) AND $_POST['ground'] <> ''){
        $ground         = $database -> post_to_variabal($_POST['ground']);
        $update         = $database -> update_one_column('school', 'ground', $ground, 'school_no', $school_no);
        
    }

    if(isset($_POST['play']) AND $_POST['play'] <> ''){
        $play           = $database -> post_to_variabal($_POST['play']);
        $update         = $database -> update_one_column('school', 'play_area', $play, 'school_no', $school_no);
        
    }

    if(isset($_POST['staff_room']) AND $_POST['staff_room'] <> ''){
        $staff_room     = $database -> post_to_variabal($_POST['staff_room']);
        $update         = $database -> update_one_column('school', 'staff_room', $staff_room, 'school_no', $school_no);
        
    }

    if(isset($_POST['tec_buil']) AND $_POST['tec_buil'] <> ''){
        $tec_buil       = $database -> post_to_variabal($_POST['tec_buil']);
        $update         = $database -> update_one_column('school', 'tech_build', $tec_buil, 'school_no', $school_no);
        
    }

    if(isset($_POST['tec_lab']) AND $_POST['tec_lab'] <> ''){
        $tec_lab        = $database -> post_to_variabal($_POST['tec_lab']);
        $update         = $database -> update_one_column('school', 'tech_lab', $tec_lab, 'school_no', $school_no);
        
    }

    if(isset($_POST['gym']) AND $_POST['gym'] <> ''){
        $gym            = $database -> post_to_variabal($_POST['gym']);
        $update         = $database -> update_one_column('school', 'gym', $gym, 'school_no', $school_no);
        
    }

    if(isset($_POST['canteen']) AND $_POST['canteen'] <> ''){
        $canteen        = $database -> post_to_variabal($_POST['canteen']);
        $update         = $database -> update_one_column('school', 'food_sevice', $canteen, 'school_no', $school_no);
        
    }

    if(isset($_POST['computer']) AND $_POST['computer'] <> ''){
        $computer       = $database -> post_to_variabal($_POST['computer']);
        $update         = $database -> update_one_column('school', 'com_amount', $computer, 'school_no', $school_no);
        
    }

    if(isset($_POST['com_lab']) AND $_POST['com_lab'] <> ''){
        $com_lab        = $database -> post_to_variabal($_POST['com_lab']);
        $update         = $database -> update_one_column('school', 'com_lab', $com_lab, 'school_no', $school_no);
        
    }

    if(isset($_POST['assembly']) AND $_POST['assembly'] <> ''){
        $assembly       = $database -> post_to_variabal($_POST['assembly']);
        $update         = $database -> update_one_column('school', 'assem_hall', $assembly, 'school_no', $school_no);
        
    }

    if(isset($_POST['tea_toi']) AND $_POST['tea_toi'] <> ''){
        $tea_toi        = $database -> post_to_variabal($_POST['tea_toi']);
        $update         = $database -> update_one_column('school', 'tea_toilet', $tea_toi, 'school_no', $school_no);
        
    }

    if(isset($_POST['aggry']) AND $_POST['aggry'] <> ''){
        $aggry          = $database -> post_to_variabal($_POST['aggry']);
        $update         = $database -> update_one_column('school', 'agri_unit', $aggry, 'school_no', $school_no);
        
    }

    if(isset($_POST['activity']) AND $_POST['activity'] <> ''){
        $activity_room  = $database -> post_to_variabal($_POST['activity']);
        $update         = $database -> update_one_column('school', 'activity_room', $activity_room, 'school_no', $school_no);
        
    }

    if(isset($_POST['mhostel']) AND $_POST['mhostel'] <> ''){
        $mhostel        = $database -> post_to_variabal($_POST['mhostel']);
        $update         = $database -> update_one_column('school', 'hostel_male', $mhostel, 'school_no', $school_no);
        
    }

    if(isset($_POST['fhostel']) AND $_POST['fhostel'] <> ''){
        $fhostel        = $database -> post_to_variabal($_POST['fhostel']);
        $update         = $database -> update_one_column('school', 'hostel_female', $fhostel, 'school_no', $school_no);
        
    }

    if(isset($_POST['te_quar']) AND $_POST['te_quar'] <> ''){
        $te_quar        = $database -> post_to_variabal($_POST['te_quar']);
        $update         = $database -> update_one_column('school', 'te_qurt', $te_quar, 'school_no', $school_no);
        
    }

    if(isset($_POST['store']) AND $_POST['store'] <> ''){
        $store          = $database -> post_to_variabal($_POST['store']);
        $update         = $database -> update_one_column('school', 'store_room', $store, 'school_no', $school_no);
        
    }

    if(isset($_POST['multi']) AND $_POST['multi'] <> ''){
        $multi          = $database -> post_to_variabal($_POST['multi']);
        $update         = $database -> update_one_column('school', 'mltiprpse_room', $multi, 'school_no', $school_no);
        
    }

    if(isset($_POST['clc']) AND $_POST['clc'] <> ''){
        $clc            = $database -> post_to_variabal($_POST['clc']);
        $update         = $database -> update_one_column('school', 'clc_lab', $clc, 'school_no', $school_no);
        
    }

    if(isset($_POST['tel_no']) AND $_POST['tel_no'] <> ''){
        $tel_no         = $database -> post_to_variabal($_POST['tel_no']);
        $update         = $database -> update_one_column('school', 'telephone', $tel_no, 'school_no', $school_no);
        
    }

    if(isset($_POST['land_ex']) AND $_POST['land_ex'] <> ''){
        $land_ex        = $database -> post_to_variabal($_POST['land_ex']);
        $update         = $database -> update_one_column('school', 'land_extend', $land_ex, 'school_no', $school_no);
        
    }

    if(isset($_POST['sick']) AND $_POST['sick'] <> ''){
        $sick           = $database -> post_to_variabal($_POST['sick']);
        $update         = $database -> update_one_column('school', 'sick_room', $sick, 'school_no', $school_no);
        
    }

    if(isset($_POST['dental']) AND $_POST['dental'] <> ''){
        $dental         = $database -> post_to_variabal($_POST['dental']);
        $update         = $database -> update_one_column('school', 'dental_clinic', $dental, 'school_no', $school_no);
        
    }

    if(isset($_POST['pavilion']) AND $_POST['pavilion'] <> ''){
        $pavilion       = $database -> post_to_variabal($_POST['pavilion']);
        $update         = $database -> update_one_column('school', 'pavilian', $pavilion, 'school_no', $school_no);
        
    }

    if(isset($_POST['land']) AND $_POST['land'] <> ''){
        $land           = $database -> post_to_variabal($_POST['land']);
        $update         = $database -> update_one_column('school', 'land_area', $land, 'school_no', $school_no);
        
    }

    if(isset($_POST['web']) AND $_POST['web'] <> ''){
        $web            = $database -> post_to_variabal($_POST['web']);
        $update         = $database -> update_one_column('school', 'web', $web, 'school_no', $school_no);
        
    }
    
    if(isset($_POST['email']) AND $_POST['email'] <> ''){
        $email          = $database -> post_to_variabal($_POST['email']);
        $update         = $database -> update_one_column('school', 'email', $email, 'school_no', $school_no);
        
    }
    if(isset($_POST['name']) AND $_POST['name'] <> ''){
        $name           = $database -> post_to_variabal($_POST['name']);
        $update         = $database -> update_one_column('school', 'name', $name, 'school_no', $school_no);
    }

    $ip           = $database -> get_ip_address();
    $host_name    = gethostname();
    echo $activity;
	}
  if(isset($_POST['cancel'])){

    $database -> headerto('changeschoolprofile.php');

  }
  if(isset($_POST['back'])){

    $database -> headerto('home.php');
  }
}
?>

<div class="container-fluid">
  <div class="row">
    <div class="col-md-12 text-center">
      <h3>CHANGE SCHOOL PROFILE</h3>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-4 col-sm-offset-4 col-xs-offset-0 justify-content-center">
      <form method="post" action="">
      <table class = "table table-hover">


    <tr>
        <td id ="tableField">Name:</td>
        <td><input type="text" name="name" value=""></td>
    </tr>
    <?php if($name_err !=""){ ?>
        <tr>
        <td id="tableField">
        </td>
        <td id="tableBox" class="text-danger">
        <?php $database -> display_message($name_err); ?>
        </td>
        </tr>
    <?php } ?>

    <tr>
        <td id ="tableField">Started Date:</td>
        <td><input type="date" name="start_date" value=""></td>
    </tr>

    <tr>
        <td id ="tableField">District:</td>
        <td><select name="district"><option value="" selected>No Change</option><?php $dis_query = $database ->table_search('district');
        while($district = mysqli_fetch_assoc($dis_query)){ ?> 
        <option value="<?php echo $district['dt_id']; ?>"><?php echo $district['name']?></option> <?php }?></select></td>
    </tr>

    <tr>
        <td id ="tableField">Address Line 1:</td>
        <td><input type="text" name="add_li1" value=""></td>
    </tr>

    <tr>
        <td id ="tableField">Address Line 2:</td>
        <td><input type="text" name="add_li2" value=""></td>
    </tr>

    <tr>
        <td id ="tableField">Election Seat:</td>
        <td><select name="seat"><option value="" selected>No Change</option> <?php $seat_query = $database ->table_search('seat');
      while($seat = mysqli_fetch_assoc($seat_query)){ ?> 
      <option value="<?php echo $seat['se_id']; ?>"><?php echo $seat['name']?></option> <?php }?></select></td>
    </tr>

    <tr>
        <td id ="tableField">Municipal Council:</td>
        <td><select name="mu_coun"><option value="" selected>No Change</option> <?php $mu_query = $database ->table_search('municipal_council');
      while($mu_coun = mysqli_fetch_assoc($mu_query)){ ?> 
      <option value="<?php echo $mu_coun['mc_id']; ?>"><?php echo $mu_coun['name']?></option> <?php }?></select></td>
    </tr>

    <tr>
        <td id ="tableField">Territory:</td>
        <td><select name="territory"> <option value="" selected>No Change</option><?php $ter_query = $database ->table_search('territory');
      while($territory = mysqli_fetch_assoc($ter_query)){ ?> 
      <option value="<?php echo $territory['tr_id']; ?>"><?php echo $territory['name']?></option><?php }?></select></td>
    </tr>
    
    <tr>
        <td id ="tableField">Residential Edu: Division:</td>
        <td><select name="division"><option value="" selected>No Change</option><?php $div_query = $database -> find_division();
      while($division = mysqli_fetch_assoc($div_query)){ ?> 
      <option value="<?php echo $division['eo_id']; ?>"><?php echo $division['name']?></option> <?php }?> </select></td>
    </tr>
    
    <tr>
        <td id ="tableField">Classes for Grade(1-5):</td>
        <td><input type="number" name="primary_class_si" placeholder="Sinhala" value="" min="0" max="15">
        <input type="number" name="primary_class_ta" placeholder="Tamil" value="" min="0" max="15">
        <input type="number" name="primary_class_en" placeholder="English" value="" min="0" max="15"></td>
    </tr>
    

    <?php $database -> table_text_input_upper('Classes for Grade(6-11):'); ?>
    <input type="number" name="ol_class_si" placeholder="Sinhala" value="" min="0" max="15">
    <input type="number" name="ol_class_ta" placeholder="Tamil" value="" min="0" max="15">
    <input type="number" name="ol_class_en" placeholder="English" value="" min="0" max="15">
    <?php $database -> table_text_input_lower($olcls_err); ?>

    <?php $database -> table_text_input_upper('Classes for Grade(Science):'); ?>
    <input type="number" name="science_class_si" placeholder="Sinhala" value="" min="0" max="15">
    <input type="number" name="science_class_ta" placeholder="Tamil" value="" min="0" max="15">
    <input type="number" name="science_class_en" placeholder="English" value="" min="0" max="15">
    <?php $database -> table_text_input_lower($science_err); ?>

    <?php $database -> table_text_input_upper('Classes for Grade(Commerce):'); ?>
    <input type="number" name="commerce_class_si" placeholder="Sinhala" value="" min="0" max="15">
    <input type="number" name="commerce_class_ta" placeholder="Tamil" value="" min="0" max="15">
    <input type="number" name="commerce_class_en" placeholder="English" value="" min="0" max="15">
    <?php $database -> table_text_input_lower($commerce_err); ?>

    <?php $database -> table_text_input_upper('Classes for Grade(Art):'); ?>
    <input type="number" name="art_class_si" placeholder="Sinhala" value="" min="0" max="15">
    <input type="number" name="art_class_ta" placeholder="Tamil" value="" min="0" max="15">
    <input type="number" name="art_class_en" placeholder="English" value="" min="0" max="15">
    <?php $database -> table_text_input_lower($art_err); ?>

    <?php $database -> table_text_input_upper('Classes for Grade(Technology):'); ?>
    <input type="number" name="tec_class_si" placeholder="Sinhala" value="" min="0" max="15">
    <input type="number" name="tec_class_ta" placeholder="Tamil" value="" min="0" max="15">
    <input type="number" name="tec_class_en" placeholder="English" value="" min="0" max="15">
    <?php $database -> table_text_input_lower($tec_err); ?>

    <?php $database -> table_text_input_upper('Grama Niladhari Division:'); ?>
    <select name="grama"><option value="" selected>No Change</option><?php $grama_query = $database ->table_search('grama');
      while($grama = mysqli_fetch_assoc($grama_query)){ ?> 
      <option value="<?php echo $grama['gr_id']; ?>"><?php echo $grama['name']." ".$grama['number']?></option> <?php } ?></select>
    <?php $database -> table_text_input_lower(NULL); ?>
    
    <?php $database -> table_text_input_upper('Ethnic Catagory:'); ?>
    <select name="ethnicity"><option value="" selected>No Change</option> <?php $eth_query = $database ->table_search('ethnicity');
      while($ethnicity = mysqli_fetch_assoc($eth_query)){?> 
      <option value="<?php echo $ethnicity['et_id']; ?>"><?php echo $ethnicity['name']?></option> <?php } ?></select>
    <?php $database -> table_text_input_lower(NULL); ?>

    <?php $database -> table_text_input_upper('Authority Catagory:'); ?>
    <select name="authority"><option value="" selected>No Change</option> <?php $auth_query = $database ->table_search('authority');
      while($authority = mysqli_fetch_assoc($auth_query)){ ?> 
      <option value="<?php echo $authority['au_id']; ?>"><?php echo $authority['name']?></option> <?php } ?></select>
    <?php $database -> table_text_input_lower(NULL); ?>
    
    <?php $database -> table_text_input_upper('Language Catagory:'); ?>
    <select name="language"><option value="" selected>No Change</option><?php $lang_query = $database ->table_search('language_medium');
      while($language = mysqli_fetch_assoc($lang_query)){ ?> 
      <option value="<?php echo $language['lm_id']; ?>"><?php echo $language['name']?></option> <?php } ?></select>
    <?php $database -> table_text_input_lower(NULL); ?>

    <?php $database -> table_text_input_upper('Density Catagory:'); ?>
    <select name="den_cat"><option value="" selected>No Change</option><?php $den_query = $database ->table_search('density_catagory');
      while($den_cat = mysqli_fetch_assoc($den_query)){ ?> 
      <option value="<?php echo $den_cat['dc_id']; ?>"><?php echo $den_cat['name']?></option> <?php } ?></select>
    <?php $database -> table_text_input_lower(NULL); ?>

    <?php $database -> table_text_input_upper('Class Catagory:'); ?>
    <select name="cla_cat"><option value="" selected>No Change</option> <?php $cla_query = $database ->table_search('class_catagory');
      while($cla_cat = mysqli_fetch_assoc($cla_query)){ ?> 
      <option value="<?php echo $cla_cat['cc_id']; ?>"><?php echo $cla_cat['name']?></option> <?php } ?></select>
    <?php $database -> table_text_input_lower(NULL); ?>
    
    <?php $database -> table_text_input_upper('Gender Catagory:'); ?>
    <select name="gender"><option value="" selected>No Change</option><?php $gen_query = $database ->table_search('gender');
      while($gender = mysqli_fetch_assoc($gen_query)){ ?> 
      <option value="<?php echo $gender['ge_id']; ?>"><?php echo $gender['name']?></option> <?php } ?></select>
    <?php $database -> table_text_input_lower(NULL); ?>
    
    <?php $database -> table_text_input_upper('Facility:'); ?>
    <select name="facility"> <option value="" selected>No Change</option><?php $fac_query = $database ->table_search('facility_level');
      while($facility = mysqli_fetch_assoc($fac_query)){ ?> 
      <option value="<?php echo $facility['fl_id']; ?>"><?php echo $facility['name']?></option> <?php } ?></select>
    <?php $database -> table_text_input_lower(NULL); ?>

    <?php $database -> table_text_input_upper('Electricity:'); ?>
    <input type="radio" name="electricity" value="" checked> No Change
    <input type="radio" name="electricity" value="1" > Yes
    <input type="radio" name="electricity" value="2" > No
    <?php $database -> table_text_input_lower(NULL); ?>

    <?php $database -> table_text_input_upper('Communication Facility:'); ?>
    <input type="radio" name="com_fa" value="" checked> No Change
    <input type="radio" name="com_fa" value="1" > Yes
    <input type="radio" name="com_fa" value="2" > No
    <?php $database -> table_text_input_lower(NULL); ?>

    <?php $database -> table_text_input_upper('Counciling Unit(squre meter):'); ?>
    <input type="number" name="coun_unit" value="">
    <?php $database -> table_text_input_lower(NULL); ?>

    <?php $database -> table_text_input_upper('Water Supply:'); ?>
    <input type="radio" name="water" value="" checked> No Change
    <input type="radio" name="water" value="1" > Yes
    <input type="radio" name="water" value="2" > No
    <?php $database -> table_text_input_lower(NULL); ?>

    <?php $database -> table_text_input_upper('Class Room(amount):'); ?>
    <input type="number" name="class_room" value="">
    <?php $database -> table_text_input_lower(NULL); ?>

    <?php $database -> table_text_input_upper('Student Toilet(amount):'); ?>
    <input type="number" name="toilet" value="">
    <?php $database -> table_text_input_lower(NULL); ?>

    <?php $database -> table_text_input_upper('Administration Unit(squre meter):'); ?>
    <input type="number" name="admin" value="">
    <?php $database -> table_text_input_lower(NULL); ?>

    <?php $database -> table_text_input_upper('Library(squre meter):'); ?>
    <input type="number" name="library" value="">
    <?php $database -> table_text_input_lower(NULL); ?>

    <?php $database -> table_text_input_upper('O/L Science Lab(squre meter):'); ?>
    <input type="number" name="ol_sci" value="">
    <?php $database -> table_text_input_lower(NULL); ?>

    <?php $database -> table_text_input_upper('A/L Science Lab(squre meter):'); ?>
    <input type="number" name="al_sci" value="">
    <?php $database -> table_text_input_lower(NULL); ?>

    <?php $database -> table_text_input_upper('Aesthetic Unit(squre meter):'); ?>
    <input type="number" name="aest_unit" value="">
    <?php $database -> table_text_input_lower(NULL); ?>

    <?php $database -> table_text_input_upper('Home Science Unit(squre meter):'); ?>
    <input type="number" name="home_sci" value="">
    <?php $database -> table_text_input_lower(NULL); ?>

    <?php $database -> table_text_input_upper('Gate:'); ?>
    <input type="radio" name="gate" value="" checked> No Change
    <input type="radio" name="gate" value="1"> Yes
    <input type="radio" name="gate" value="2" > No
    <?php $database -> table_text_input_lower(NULL); ?>

    <?php $database -> table_text_input_upper('Wall:'); ?>
    <input type="radio" name="wall" value="" checked> No Change
    <input type="radio" name="wall" value="1"> Yes
    <input type="radio" name="wall" value="2" > No
    <?php $database -> table_text_input_lower(NULL); ?>
   
    <?php $database -> table_text_input_upper('Principal Quaters:'); ?>
    <input type="radio" name="pri_qua" value="" checked> No Change
    <input type="radio" name="pri_qua" value="1"> Yes
    <input type="radio" name="pri_qua" value="2" > No
    <?php $database -> table_text_input_lower(NULL); ?>

    <?php $database -> table_text_input_upper('Ground:'); ?>
    <input type="radio" name="ground" value="" checked> No Change
    <input type="radio" name="ground" value="1"> Yes
    <input type="radio" name="ground" value="2"> No
    <?php $database -> table_text_input_lower(NULL); ?>

    <?php $database -> table_text_input_upper('Play Area:'); ?>
    <input type="radio" name="play" value="" checked> No Change
    <input type="radio" name="play" value="1"> Yes
    <input type="radio" name="play" value="2"> No
    <?php $database -> table_text_input_lower(NULL); ?>

    <?php $database -> table_text_input_upper('Staff Room:'); ?>
    <input type="radio" name="staff_room" value="" checked> No Change
    <input type="radio" name="staff_room" value="1"> Yes
    <input type="radio" name="staff_room" value="2"> No
    <?php $database -> table_text_input_lower(NULL); ?>
   
    <?php $database -> table_text_input_upper('Technology Building(squre meter):'); ?>
    <input type="number" name="tec_buil" value="">
    <?php $database -> table_text_input_lower(NULL); ?>
   
    <?php $database -> table_text_input_upper('Technology Lab(squre meter):'); ?>
    <input type="number" name="tec_lab" value="">
    <?php $database -> table_text_input_lower(NULL); ?>

    <?php $database -> table_text_input_upper('Gymnasium:'); ?>
    <input type="radio" name="gym" value="" checked> No Change
    <input type="radio" name="gym" value="1" > Yes
    <input type="radio" name="gym" value="2" > No
    <?php $database -> table_text_input_lower(NULL); ?>
   
    <?php $database -> table_text_input_upper('Canteen/Cafeteria(squre meter):'); ?>
    <input type="number" name="canteen" value="">
    <?php $database -> table_text_input_lower(NULL); ?>

    <?php $database -> table_text_input_upper('Computers(amount):'); ?>
    <input type="number" name="computer" value="">
    <?php $database -> table_text_input_lower(NULL); ?>

    <?php $database -> table_text_input_upper('Computer Lab(squre meter):'); ?>
    <input type="number" name="com_lab" value="">
    <?php $database -> table_text_input_lower(NULL); ?>
   
    <?php $database -> table_text_input_upper('Assembly Hall(squre meter):'); ?>
    <input type="number" name="assembly" value="">
    <?php $database -> table_text_input_lower(NULL); ?>

    <?php $database -> table_text_input_upper('Teachers Toilets(amount):'); ?>
    <input type="number" name="tea_toi" value="">
    <?php $database -> table_text_input_lower(NULL); ?>

    <?php $database -> table_text_input_upper('Aggriculture Unit(squre meter):'); ?>
    <input type="number" name="aggry" value="">
    <?php $database -> table_text_input_lower(NULL); ?>
   
    <?php $database -> table_text_input_upper('Activity Room(squre meter):'); ?>
    <input type="number" name="activity" value="">
    <?php $database -> table_text_input_lower(NULL); ?>
   
    <?php $database -> table_text_input_upper('Male Hostel(squre meter):'); ?>
    <input type="number" name="mhostel" value="">
    <?php $database -> table_text_input_lower(NULL); ?>
   
    <?php $database -> table_text_input_upper('Female Hostel(squre meter):'); ?>
    <input type="number" name="fhostel" value="">
    <?php $database -> table_text_input_lower(NULL); ?>

    <?php $database -> table_text_input_upper('Teachers Quaters:'); ?>
    <input type="radio" name="te_quar" value="" checked> No Change
    <input type="radio" name="te_quar" value="1" > Yes
    <input type="radio" name="te_quar" value="2" > No
    <?php $database -> table_text_input_lower(NULL); ?>
   
    <?php $database -> table_text_input_upper('Store Room(squre meter):'); ?>
    <input type="number" name="store" value="">
    <?php $database -> table_text_input_lower(NULL); ?>
    
    <?php $database -> table_text_input_upper('Multipurpose Room(squre meter):'); ?>
    <input type="number" name="multi" value="">
    <?php $database -> table_text_input_lower(NULL); ?>

    <?php $database -> table_text_input_upper('CLC Lab(squre meter):'); ?>
    <input type="number" name="clc" value="">
    <?php $database -> table_text_input_lower(NULL); ?>
   
    <?php $database -> table_text_input_upper('Telephone:'); ?>
    <input type="text" name="tel_no" value="">
    <?php $database -> table_text_input_lower(NULL); ?>

    <?php $database -> table_text_input_upper('Land Extend:'); ?>
    <input type="radio" name="land_ex" value="" checked> No Change
    <input type="radio" name="land_ex" value="1"> Yes
    <input type="radio" name="land_ex" value="2"> No
    <?php $database -> table_text_input_lower(NULL); ?>

    <?php $database -> table_text_input_upper('Sick Room:'); ?>
    <input type="radio" name="sick" value="" checked> No Change
    <input type="radio" name="sick" value="1" > Yes
    <input type="radio" name="sick" value="2" > No
    <?php $database -> table_text_input_lower(NULL); ?>
   
    <?php $database -> table_text_input_upper('Dental Clinic:'); ?>
    <input type="radio" name="dental" value="" checked> No Change
    <input type="radio" name="dental" value="1" > Yes
    <input type="radio" name="dental" value="2" > No
    <?php $database -> table_text_input_lower(NULL); ?>

    <?php $database -> table_text_input_upper('Pavilion:'); ?>
    <input type="radio" name="pavilion" value="" checked> No Change
    <input type="radio" name="pavilion" value="1" > Yes
    <input type="radio" name="pavilion" value="2" > No
    <?php $database -> table_text_input_lower(NULL); ?>

    <?php $database -> table_text_input_upper('Land Area(squre meter):'); ?>
    <input type="number" name="land" value="">
    <?php $database -> table_text_input_lower(NULL); ?>
    
    <?php $database -> table_text_input_upper('Web:'); ?>
    <input type="text" name="web" value="">
    <?php $database -> table_text_input_lower(NULL); ?>
    
    <?php $database -> table_text_input_upper('E-mail:'); ?>
    <input type="text" name="email" value="">
    <?php $database -> table_text_input_lower(NULL); ?>
   
   </table>

    <input type="submit" name="submit" value="Submit">
    <input type="submit" name="cancel" value="Refresh">
    <input type="submit" name="back" value="Back">
       
    <?php $database -> conditional_display($success); ?> 
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


