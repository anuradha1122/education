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
      $('.search-box1 input[type="text"]').on("keyup input", function(){
          /* Get input value on change */
          var inputVal = $(this).val();
          var resultDropdown = $(this).siblings(".result1");
          if(inputVal.length){
              $.get("nicsearch.php", {term: inputVal}).done(function(data){
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
              $.get("createteachersearch.php", {term: inputVal}).done(function(data){
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
              $.get("subjectsearch.php", {term: inputVal}).done(function(data){
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
              $.get("subjectsearch.php", {term: inputVal}).done(function(data){
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
              $.get("subjectsearch.php", {term: inputVal}).done(function(data){
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

<script type="text/javascript">
  $(document).ready(function(){
      $('.search-box7 input[type="text"]').on("keyup input", function(){
          /* Get input value on change */
          var inputVal = $(this).val();
          var resultDropdown = $(this).siblings(".result7");
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
      $(document).on("click", ".result7 p", function(){
          $(this).parents(".search-box7").find('input[type="text"]').val($(this).text());
          $(this).parent(".result7").empty();
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

    .result7 {

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
#page number 06

$database = new Database();

$database -> empty_session();
//$database ->restricted_page('31');

$nic_err = $school_err = $fdate_err = $ldate_err = $success = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){

	if(isset($_POST['submit'])){

    $nic          = $database -> form_data_process('nic');
    $nic          = $database -> table_by_id($nic,'teacher','nic');
    $nic_err      = $database -> field_missing($nic,'NIC is Missing or wrong NIC');

    $school       = $database -> form_data_process('school');
    $school       = $database -> table_by_id($school,'school','name');
    $office       = $database -> table_by_id($school['edu_division'],'education_office','eo_id');
    $zone         = $database -> table_by_id($office['higher_zone_no'],'education_office','office_no');
    $province        = $database -> table_by_id($office['higher_provi_no'],'education_office','office_no');

    $school_err   = $database -> field_missing($school,'School is Missing or Wrong School No');

    if($_POST['school2'] <>''){
      $school_sec      = $database -> form_data_process('school2');
      $sch2       = $database -> table_by_id($school_sec,'school','name');
      if(!empty($sch2)){
        $school2 = $sch2['school_no'];
      }else{
        $school2 = '0';
      }
    }else{
      $school2 = '0';
    }

    if($_POST['teach1'] <>''){
      $teach1      = $database -> form_data_process('teach1');
      $tc1       = $database -> table_by_id($teach1,'subject','name');
      if(!empty($tc1)){
        $teaching1 = $tc1['su_id'];
      }else{
        $teaching1 = '0';
      }
    }else{
      $teaching1 = '0';
    }

    if($_POST['teach2'] <>''){
      $teach2      = $database -> form_data_process('teach2');
      $tc2       = $database -> table_by_id($teach2,'subject','name');
      if(!empty($tc2)){
        $teaching2 = $tc2['su_id'];
      }else{
        $teaching2 = '0';
      }
    }else{
      $teaching2 = '0';
    }

    if($_POST['teach3'] <>''){
      $teach3      = $database -> form_data_process('teach3');
      $tc3       = $database -> table_by_id($teach3,'subject','name');
      if(!empty($tc3)){
        $teaching3 = $tc3['su_id'];
      }else{
        $teaching3 = '0';
      }
    }else{
      $teaching3 = '0';
    }

    $teaching4 = '0';

    $state        = $database -> post_to_variabal($_POST['state']);

    $f_date       = $database -> form_data_process('f_date');
    $fdate_err    = $database -> field_missing($f_date,'first date is Missing');

    if(isset($nic) AND isset($school) AND isset($f_date)){

        $success  = $database -> insert_teacher_history($nic['nic'],$school['school_no'],$school2,$office['eo_id'],$zone['eo_id'],$province['eo_id'],$state,$f_date,$teaching1,$teaching2,$teaching3,$teaching4);
        $success = "Record Created Successfully";
    }
    

	}
  if(isset($_POST['cancel'])){

    $database -> headerto('teacherhistory.php');

  }
  if(isset($_POST['back'])){

    $database -> headerto('home.php');
  }
}
?>
<div class="container-fluid">
  <div class="row">
    <div class="col-md-12 text-center">
      <h3>School Change</h3>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-4 col-sm-offset-4 col-xs-offset-0 justify-content-center">
      <form method="post" action="">
      <table class = "table table-hover">
    <tr>
    <td id ="tableField">NIC:</td>
    <td class="search-box1" id="tableBox"><input type="text" name="nic"  value="">
    <div class="result1 col-xs-6 justify-content-center"></div></td>
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
    <td id ="tableField">School:</td>
    <td class="search-box2" id="tableBox"><input type="text" name="school" value="">
    <div class="result2 col-xs-6 justify-content-center"></div></td>
    </tr>

    <?php if($school_err !=""){ ?>
    <tr>
    <td id="tableField">
    </td>
    <td id="tableBox" class="text-danger">
    <?php $database -> display_message($school_err); ?>
    </td>
    </tr>
    <?php } ?>

    <tr>
    <td id ="tableField">Attached School:</td>
    <td class="search-box3" id="tableBox"><input type="text" name="school2" value="">
    <div class="result3 col-xs-6 justify-content-center"></div></td>
    </tr>


    <tr>
        <td id ="tableField">Appoint State:</td>
        <td>
            <select name="state"><?php $state_query = $database ->table_search('appointment_state');
            while($state = mysqli_fetch_assoc($state_query)){ ?> 
            <option value="<?php echo $state['ap_id']; ?>"><?php echo $state['name']?></option> <?php }?> </select>
        </td>
    </tr>


    <tr>
    <td id ="tableField">Appointed Date:</td>
    <td id="tableBox"><input type="date" name="f_date" value=""></td>
    </tr>

    <?php if($fdate_err !=""){ ?>
    <tr>
    <td id="tableField">
    </td>
    <td id="tableBox" class="text-danger">
    <?php $database -> display_message($fdate_err); ?>
    </td>
    </tr>
    <?php } ?>

    <tr>
    <td id ="tableField">Teaching Subject 1:</td>
    <td class="search-box4" id="tableBox"><input type="text" name="teach1" value="">
    <div class="result4 col-xs-6 justify-content-center"></div></td>
    </tr>

    <tr>
    <td id ="tableField">Teaching Subject 2:</td>
    <td class="search-box5" id="tableBox"><input type="text" name="teach2" value="">
    <div class="result5 col-xs-6 justify-content-center"></div></td>
    </tr>

    <tr>
    <td id ="tableField">Teaching Subject 3:</td>
    <td class="search-box6" id="tableBox"><input type="text" name="teach3" value="">
    <div class="result6 col-xs-6 justify-content-center"></div></td>
    </tr>

   </table>
   </div>
  </div>
<div class="row">
    <div class="col-sm-6 col-sm-offset-3 col-xs-offset-0 justify-content-center">

    <input type="submit" name="submit" value="Submit">
    <input type="submit" name="cancel" value="Refresh">
    <input type="submit" name="back" value="Back">
       
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
