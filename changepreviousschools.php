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
              $.get("nicsearch.php", {term: inputVal}).done(function(data){
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
      $('.search-box7 input[type="text"]').on("keyup input", function(){
          /* Get input value on change */
          var inputVal = $(this).val();
          var resultDropdown = $(this).siblings(".result7");
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
      $(document).on("click", ".result7 p", function(){
          $(this).parents(".search-box7").find('input[type="text"]').val($(this).text());
          $(this).parent(".result7").empty();
      });
  });
</script>

<script type="text/javascript">
  $(document).ready(function(){
      $('.search-box8 input[type="text"]').on("keyup input", function(){
          /* Get input value on change */
          var inputVal = $(this).val();
          var resultDropdown = $(this).siblings(".result8");
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
      $(document).on("click", ".result8 p", function(){
          $(this).parents(".search-box8").find('input[type="text"]').val($(this).text());
          $(this).parent(".result8").empty();
      });
  });
</script>

<script type="text/javascript">
  $(document).ready(function(){
      $('.search-box9 input[type="text"]').on("keyup input", function(){
          /* Get input value on change */
          var inputVal = $(this).val();
          var resultDropdown = $(this).siblings(".result9");
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
      $(document).on("click", ".result9 p", function(){
          $(this).parents(".search-box9").find('input[type="text"]').val($(this).text());
          $(this).parent(".result9").empty();
      });
  });
</script>

<script type="text/javascript">
  $(document).ready(function(){
      $('.search-box10 input[type="text"]').on("keyup input", function(){
          /* Get input value on change */
          var inputVal = $(this).val();
          var resultDropdown = $(this).siblings(".result10");
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
      $(document).on("click", ".result10 p", function(){
          $(this).parents(".search-box10").find('input[type="text"]').val($(this).text());
          $(this).parent(".result10").empty();
      });
  });
</script>

<script type="text/javascript">
  $(document).ready(function(){
      $('.search-box11 input[type="text"]').on("keyup input", function(){
          /* Get input value on change */
          var inputVal = $(this).val();
          var resultDropdown = $(this).siblings(".result11");
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
      $(document).on("click", ".result11 p", function(){
          $(this).parents(".search-box11").find('input[type="text"]').val($(this).text());
          $(this).parent(".result11").empty();
      });
  });
</script>

<script type="text/javascript">
  $(document).ready(function(){
      $('.search-box12 input[type="text"]').on("keyup input", function(){
          /* Get input value on change */
          var inputVal = $(this).val();
          var resultDropdown = $(this).siblings(".result12");
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
      $(document).on("click", ".result12 p", function(){
          $(this).parents(".search-box12").find('input[type="text"]').val($(this).text());
          $(this).parent(".result12").empty();
      });
  });
</script>

<script>
  
  function old_school(str) {
    if (str == "") {
        document.getElementById("old_school").innerHTML = "";
        return;
    } else { 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("old_school").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","ajax/old_school.php?q="+str,true);
        xmlhttp.send();
    }
}
</script>

<script>
  
  function eMail(str) {
    if (str == "") {
        document.getElementById("eMail").innerHTML = "";
        return;
    } else { 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("eMail").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","ajax/email.php?q="+str,true);
        xmlhttp.send();
    }
}
</script>

<script>
  
  function subject1(str) {
    if (str == "") {
        document.getElementById("subject2").innerHTML = "";
        return;
    } else { 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("subject2").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","ajax/subject2.php?q="+str,true);
        xmlhttp.send();
    }
}
</script>

<script>
  
  function subject2(str) {
    if (str == "") {
        document.getElementById("subject2").innerHTML = "";
        return;
    } else { 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("subject2").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","ajax/subject2.php?q="+str,true);
        xmlhttp.send();
    }
}
</script>

<script>
  
  function subject3(str) {
    if (str == "") {
        document.getElementById("subject2").innerHTML = "";
        return;
    } else { 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("subject2").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","ajax/subject2.php?q="+str,true);
        xmlhttp.send();
    }
}
</script>

<script>
  
  function subject4(str) {
    if (str == "") {
        document.getElementById("subject2").innerHTML = "";
        return;
    } else { 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("subject2").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","ajax/subject2.php?q="+str,true);
        xmlhttp.send();
    }
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


    input[type=text], select, [type=date], [type=password], [type=number] {
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

    .result {

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

    .result8 {

      position: absolute;
      background-color: black;
      color: white;
      z-index: 999;

    }

    .result9 {

      position: absolute;
      background-color: black;
      color: white;
      z-index: 999;

    }

    .result10 {

      position: absolute;
      background-color: black;
      color: white;
      z-index: 999;

    }

    .result11 {

      position: absolute;
      background-color: black;
      color: white;
      z-index: 999;

    }

    .result12 {

      position: absolute;
      background-color: black;
      color: white;
      z-index: 999;

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

#page number 11

$database = new Database();

$database -> empty_session();
$database ->restricted_page('11');
$activity = "";
$email_err = $emp_err = $cpw_err = $success = $pw_err = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){

  if(isset($_POST['submit'])){

    $emp_no       = $database -> form_data_process('keynic');
    $emp_no       = $database -> data_existance($emp_no,'teacher','nic');
    $emp_err      = $database -> field_missing($emp_no,'Emplyee Number is Missing or Wrong');
    $person       = $database -> table_by_id($emp_no,'teacher','nic');

    if(isset($_POST['keynic']) AND $_POST['keynic'] <> '' AND isset($_POST['ref_no']) AND $_POST['ref_no'] <> ''){
      if(isset($_POST['school']) AND $_POST['school'] <> ''){
      
        $ref_no       = $database -> post_to_variabal($_POST['ref_no']);
        $school_name       = $database -> post_to_variabal($_POST['school']);
        $school       = $database -> table_by_id($school_name,'school','name');
        $school_no = $school['school_no'];
        $update       = $database -> update_one_column('teacher_appointment', 'school_no', $school_no, 'ta_id', $ref_no);
      }

      if(isset($_POST['rem']) AND $_POST['rem'] == 'remove'){
        $ref_no       = $database -> post_to_variabal($_POST['ref_no']);
        $valied = $database -> table_by_id($ref_no,'teacher_appointment','ta_id');
        if($valied['release_school']<>''){
          $delete = $database -> delete_by_id($ref_no,'teacher_appointment','ta_id');
        }
      }

      if(isset($_POST['school2']) AND $_POST['school2'] <> ''){
      
        $ref_no       = $database -> post_to_variabal($_POST['ref_no']);
        $school2      = $database -> post_to_variabal($_POST['school2']);
        $school       = $database -> table_by_id($school2,'school','name');
        $school_no = $school['school_no'];
        $update       = $database -> update_one_column('teacher_appointment', 'school2', $school_no, 'ta_id', $ref_no);
      }

      if(isset($_POST['app_date']) AND $_POST['app_date'] <> ''){
      
        $ref_no       = $database -> post_to_variabal($_POST['ref_no']);

        $release       = $database -> table_by_id($ref_no,'teacher_appointment','ta_id');
        $release_date  = $release['appoint_date'];
        $tc_id = $release['tc_id'];

        $app_date     = $database -> post_to_variabal($_POST['app_date']);
        $update1       = $database -> update_one_column('teacher_appointment', 'appoint_date', $app_date, 'ta_id', $ref_no);
        $update2 = $database -> update_from_two_column('teacher_appointment','release_date',$app_date,'tc_id',$tc_id,'release_date',$release_date);
      }

      if(isset($_POST['app_state']) AND $_POST['app_state'] <> ''){
      
        $ref_no       = $database -> post_to_variabal($_POST['ref_no']);

        $app_state     = $database -> post_to_variabal($_POST['app_state']);
        $update       = $database -> update_one_column('teacher_appointment', 'catagory', $app_state, 'ta_id', $ref_no);
        
      }

      if(isset($_POST['teach1']) AND $_POST['teach1'] <> ''){
      
        $ref_no       = $database -> post_to_variabal($_POST['ref_no']);
        $teach1      = $database -> post_to_variabal($_POST['teach1']);
        $subject       = $database -> table_by_id($teach1,'subject','name');
        $subject_no = $subject['su_id'];
        $update       = $database -> update_one_column('teacher_appointment', 'teach_sub1', $subject_no, 'ta_id', $ref_no);
      }

      if(isset($_POST['teach2']) AND $_POST['teach2'] <> ''){
      
        $ref_no       = $database -> post_to_variabal($_POST['ref_no']);
        $teach2      = $database -> post_to_variabal($_POST['teach2']);
        $subject       = $database -> table_by_id($teach2,'subject','name');
        $subject_no = $subject['su_id'];
        $update       = $database -> update_one_column('teacher_appointment', 'teach_sub2', $subject_no, 'ta_id', $ref_no);
      }

      if(isset($_POST['teach3']) AND $_POST['teach3'] <> ''){
      
        $ref_no       = $database -> post_to_variabal($_POST['ref_no']);
        $teach3      = $database -> post_to_variabal($_POST['teach3']);
        $subject       = $database -> table_by_id($teach3,'subject','name');
        $subject_no = $subject['su_id'];
        $update       = $database -> update_one_column('teacher_appointment', 'teach_sub3', $subject_no, 'ta_id', $ref_no);
      }

      if(isset($_POST['teach4']) AND $_POST['teach4'] <> ''){
      
        $ref_no       = $database -> post_to_variabal($_POST['ref_no']);
        $teach4      = $database -> post_to_variabal($_POST['teach4']);
        $subject       = $database -> table_by_id($teach4,'subject','name');
        $subject_no = $subject['su_id'];
        $update       = $database -> update_one_column('teacher_appointment', 'teach_sub4', $subject_no, 'ta_id', $ref_no);
      }
    }
    
  }
  if(isset($_POST['cancel'])){

    $database -> headerto('changeteacherprofile.php');

  }
  if(isset($_POST['back'])){

    $database -> headerto('home.php');
  }
}
?>
<div class="container-fluid">
  <div class="row">
    <div class="col-md-12 text-center">
      <h3>CHANGE PREVIOUS SCHOOLS</h3>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-4 col-sm-offset-4 col-xs-offset-0 justify-content-center">
        <form method="post" action="">
      <table class="table table-hover">
        <tr>
        <td id="tableField">
        NIC:
        </td>
        <td class="search-box" id="tableBox">
        <input type="text" name="keynic" value="" onkeyup ="old_school(this.value);eMail(this.value)">
        <div class="result col-xs-6 justify-content-center"></div>
        </td>
        </tr>

        <?php if($emp_err !=""){ ?>
        <tr>
        <td id="tableField">
        </td>
        <td id="tableBox" class="text-danger">
        <?php $database -> display_message($emp_err); ?>
        </td>
        </tr>
        <?php } ?>
      </table>   
    </div>
    <div class="col-xs-12">
      <table class="table table-hover">
        <div id="old_school"></div>
      </table>
      
    </div>
    <div class="col-sm-4 col-sm-offset-4 col-xs-offset-0 justify-content-center">
    
      <table class = "table table-hover">
    
        <?php if(isset($_SESSION['ad_id'])){ ?>
        <tr>
        <td id="tableField">
        Ref No:
        </td>
        <td id="tableBox">
        <input type="number" name="ref_no" value="">
        
        </td>
        </tr>

        <tr>
        <td id="tableField">
        School
        
        </td>
        <td class="search-box7" id="tableBox">
        <input type="text" name="school" value="">
        <div class="result7 col-xs-6 justify-content-center"></div>
        </td>
        </tr>

        <tr>
        <td id="tableField">
        Attached School
        
        </td>
        <td class="search-box8" id="tableBox">
        <input type="text" name="school2" value="">
        <div class="result8 col-xs-6 justify-content-center"></div>
        </td>
        </tr>

        <tr>
        <td id="tableField">
        Appointment Date:
        </td>
        <td id="tableBox">
        <input type="date" name="app_date" value="">
        </td>
        </tr>
        <?php } ?>


        <?php if(isset($_SESSION['ad_id']) OR isset($_SESSION['pr_id'])){ ?>
        <tr>
        <td id="tableField">
        Appointment State:
        </td>
        <td id="tableBox">
        <select name="app_state"> <option value="" selected>No Change</option><?php $cat_query = $database ->table_search('appointment_state');
          while($catagory = mysqli_fetch_assoc($cat_query)){ ?> 
          <option value="<?php echo $catagory['ap_id']; ?>"><?php echo $catagory['name']?></option> <?php }?> </select>
          <div id="catagory"></div>
          </td>   </tr>
        <?php } ?>

        <tr>
        <td id="tableField">
        Teaching Subject 01
        
        </td>
        <td class="search-box9" id="tableBox">
        <input type="text" name="teach1" value="">
        <div class="result9 col-xs-6 justify-content-center"></div>
        </td>
        </tr>

        <tr>
        <td id="tableField">
        Teaching Subject 02
        
        </td>
        <td class="search-box10" id="tableBox">
        <input type="text" name="teach2" value="">
        <div class="result10 col-xs-6 justify-content-center"></div>
        </td>
        </tr>

        <tr>
        <td id="tableField">
        Teaching Subject 03
        
        </td>
        <td class="search-box11" id="tableBox">
        <input type="text" name="teach3" value="">
        <div class="result11 col-xs-6 justify-content-center"></div>
        </td>
        </tr>

        <tr>
        <td id="tableField">
        Teaching Subject 04
        
        </td>
        <td class="search-box12" id="tableBox">
        <input type="text" name="teach4" value="">
        <div class="result12 col-xs-6 justify-content-center"></div>
        </td>
        </tr>

        <tr>
        <td id="tableField">
        Delete Ref No
        
        </td>
        <td id="tableBox">
        <input type="checkbox" name="rem" value="remove">
        </td>
        </tr>

       </table>
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
    <?php $database -> conditional_display($success); ?> 
    </form>  
</div>
<footer class="container-fluid text-center">
  <div class="row footer">
    <p>2018 Copyright: xcodeweb.com</p>
  </div>
</footer>

