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
        width: 99%;
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

    #teacher {
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

$number_err ="";

?>

<div class="container-fluid">
  <div class="row">
    <div class="col-md-12 text-center">
      <h3>

        <?php 

        if(isset($_POST['number']) AND $_POST['number'] !="" AND isset($_POST['age'])){
          $database -> display_message("AGE STATISTICS");
        }
        elseif(isset($_POST['number']) AND $_POST['number'] !="" AND isset($_POST['gender'])){
          $database -> display_message("GENDER STATISTICS");
        } 
        elseif(isset($_POST['number']) AND $_POST['number'] !="" AND isset($_POST['race'])){
          $database -> display_message("RACE STATISTICS");
        }
        elseif(isset($_POST['number']) AND $_POST['number'] !="" AND isset($_POST['religion'])){
          $database -> display_message("RELIGION STATISTICS");
        }
        elseif(isset($_POST['number']) AND $_POST['number'] !="" AND isset($_POST['civil'])){
          $database -> display_message("CIVIL STATUS STATISTICS");
        }
        elseif(isset($_POST['number']) AND $_POST['number'] !="" AND isset($_POST['service'])){
          $database -> display_message("SERVICE STATISTICS");
        }
        elseif(isset($_POST['number']) AND $_POST['number'] !="" AND isset($_POST['medium'])){
          $database -> display_message("MEDIUM STATISTICS");
        }
        elseif(isset($_POST['number']) AND $_POST['number'] !="" AND isset($_POST['education'])){
          $database -> display_message("EDUCATIONAL QUALI: STATISTICS");
        }
        elseif(isset($_POST['number']) AND $_POST['number'] !="" AND isset($_POST['professional'])){
          $database -> display_message("PROFESSIONAL QUALI: STATISTICS");
        }
        else{
          $database -> headerto('teacherstatistics.php');
        }
        ?>

        </h3>
        <h4>
        <?php
        $number = $_POST['number'];
        $school = $database -> table_by_id($number,'school','name');
        $database -> display_message($school['name']);
        $database -> display_message($school['school_no']);
        if(!isset($school)) {
          $office = $database -> table_by_id($number,'education_office','name');
          $database -> display_message($office['name']);
          $database -> display_message($school['office_no']);
          if(!isset($office)) {
            $database -> headerto('teacherstatistics.php');
          }
        }
        ?>

      </h4>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-4 col-sm-offset-4 col-xs-offset-0 justify-content-center">
      <?php
      if($_SERVER["REQUEST_METHOD"] == "POST"){

          $number = $_POST['number'];
          $school = $database -> table_by_id($number,'school','name');
          if(!isset($school)) {
            $office = $database -> table_by_id($number,'education_office','name');
            if(!isset($office)) {
              $database -> headerto('teacherstatistics.php');
            }else{
              $number = $office['office_no'];
              $office = $database -> table_by_id($number,'education_office','office_no');
              if(!isset($office)) {
                $database -> headerto('schoolstatistics.php');
              }
              if($office['higher_zone_no'] <> "" AND $office['higher_provi_no'] <> "") {

                $type = "division";
              }elseif ($office['higher_zone_no'] == "" AND $office['higher_provi_no'] <> "") {
                $type = "zone"; 
              }elseif ($office['higher_zone_no'] == "" AND $office['higher_provi_no'] == "" AND $office['office_no'] <> "W00000") {
                $type = "province"; 
              }elseif ($office['office_no'] == "W00000") {
                $type = "country"; 
              }
            }
          }else{
            $number = $school['school_no'];
          }

          if(isset($_POST['age'])){ 
            $thirty = $fourty = $fifty = $sixty = $seventy = 0;
            if(isset($school)) {
              $teacher_query = $database -> school_appointed_teachers($number);
              if(mysqli_num_rows($teacher_query) > 0){
                ?>
                <table class="table table-hover">
                  <?php
                  while($tc_id = mysqli_fetch_assoc($teacher_query)){
                    $teacher = $database -> table_by_id($tc_id['tc_id'],'teacher','tc_id');
                    $birth_date = date_create($teacher['birth_day']);
                    $current_date = date_create(date("Y-m-d"));
                    $period     = date_diff($birth_date,$current_date);
                    $age = $period->format("%Y");
                    if($age<30) {
                      $thirty++;
                    }elseif ($age<40) {
                      $fourty++;
                    }elseif ($age<50) {
                      $fifty++;
                    }elseif ($age<55) {
                      $sixty++;
                    }elseif ($age<60) {
                      $seventy++;
                    }
                  }
                  $total = $thirty+$fourty+$fifty+$sixty+$seventy;
                  $thirtyp = round($thirty*100/$total,1);
                  $fourtyp = round($fourty*100/$total,1);
                  $fiftyp = round($fifty*100/$total,1);
                  $sixtyp = round($sixty*100/$total,1);
                  $seventyp = round($seventy*100/$total,1);
                  ?>
                  <tr>
                    <th id="tableMain">
                      Age
                    </th>
                    <th id="teacher">
                      Teachers
                    </th>
                    <th id="percentage">
                     Percentage
                    </th>
                  </tr>
                  <tr>
                    <td id="tableMain">
                     20-29 
                    </td>
                    <td id="teacher">
                      <?php $database -> display_message($thirty); ?>
                    </td>
                    <td id="percentage">
                      <?php $database -> display_message($thirtyp); ?>
                    </td>
                  </tr>
                  <tr>
                    <td id="tableMain">
                      30-39
                    </td>
                    <td id="teacher">
                      <?php $database -> display_message($fourty); ?>
                    </td>
                    <td id="percentage">
                      <?php $database -> display_message($fourtyp); ?>
                    </td>
                  </tr>
                  <tr>
                    <td id="tableMain">
                      40-49
                    </td>
                    <td id="teacher">
                      <?php $database -> display_message($fifty); ?>
                    </td>
                    <td id="percentage">
                      <?php $database -> display_message($fiftyp); ?>
                    </td>
                  </tr>
                  <tr>
                    <td id="tableMain">
                      50-54
                    </td>
                    <td id="teacher">
                      <?php $database -> display_message($sixty); ?>
                    </td>
                    <td id="percentage">
                      <?php $database -> display_message($sixtyp); ?>
                    </td>
                  </tr>
                  <tr>
                    <td id="tableMain">
                      55-59
                    </td>
                    <td id="teacher">
                      <?php $database -> display_message($seventy); ?>
                    </td>
                    <td id="percentage">
                      <?php $database -> display_message($seventyp); ?>
                    </td>
                  </tr>
                </table>
                <?php
                
              }
            }elseif (isset($office)) {
              

              if($type == "division"){
                $thirty = $fourty = $fifty = $sixty = $seventy = 0;
                $div_id = $office['eo_id'];

                $school_query = $database -> table_search_by_element($div_id,'school','edu_division');
                ?>
                <table class="table table-hover">
                <?php
                if(mysqli_num_rows($school_query) > 0){
                  while($school = mysqli_fetch_assoc($school_query)){
                    $teacher_query = $database -> school_appointed_teachers($school['school_no']);
                    if(mysqli_num_rows($teacher_query) > 0){
                      
                        while($tc_id = mysqli_fetch_assoc($teacher_query)){
                          $teacher = $database -> table_by_id($tc_id['tc_id'],'teacher','tc_id');
                          $birth_date = date_create($teacher['birth_day']);
                          $current_date = date_create(date("Y-m-d"));
                          $period     = date_diff($birth_date,$current_date);
                          $age = $period->format("%Y");
                          if($age<30) {
                            $thirty++;
                          }elseif ($age<40) {
                            $fourty++;
                          }elseif ($age<50) {
                            $fifty++;
                          }elseif ($age<55) {
                            $sixty++;
                          }elseif ($age<60) {
                            $seventy++;
                          }
                        }
                    }
                  }
                }
                $total = $thirty+$fourty+$fifty+$sixty+$seventy;
                $thirtyp = round($thirty*100/$total,1);
                $fourtyp = round($fourty*100/$total,1);
                $fiftyp = round($fifty*100/$total,1);
                $sixtyp = round($sixty*100/$total,1);
                $seventyp = round($seventy*100/$total,1);
                ?>
                <tr>
                  <th id="tableMain">
                    Age
                  </th>
                  <th id="teacher">
                    Teachers
                  </th>
                  <th id="percentage">
                   Percentage
                  </th>
                </tr>
                <tr>
                  <td id="tableMain">
                   20-29 
                  </td>
                  <td id="teacher">
                    <?php $database -> display_message($thirty); ?>
                  </td>
                  <td id="percentage">
                    <?php $database -> display_message($thirtyp); ?>
                  </td>
                </tr>
                <tr>
                  <td id="tableMain">
                    30-39
                  </td>
                  <td id="teacher">
                    <?php $database -> display_message($fourty); ?>
                  </td>
                  <td id="percentage">
                    <?php $database -> display_message($fourtyp); ?>
                  </td>
                </tr>
                <tr>
                  <td id="tableMain">
                    40-49
                  </td>
                  <td id="teacher">
                    <?php $database -> display_message($fifty); ?>
                  </td>
                  <td id="percentage">
                    <?php $database -> display_message($fiftyp); ?>
                  </td>
                </tr>
                <tr>
                  <td id="tableMain">
                    50-55
                  </td>
                  <td id="teacher">
                    <?php $database -> display_message($sixty); ?>
                  </td>
                  <td id="percentage">
                    <?php $database -> display_message($sixtyp); ?>
                  </td>
                </tr>
                <tr>
                  <td id="tableMain">
                    55-59
                  </td>
                  <td id="teacher">
                    <?php $database -> display_message($seventy); ?>
                  </td>
                  <td id="percentage">
                    <?php $database -> display_message($seventyp); ?>
                  </td>
                </tr>
              </table>
              <?php
              }
              elseif($type == "zone"){
                $thirty = $fourty = $fifty = $sixty = $seventy = 0;
                $zone_id = $office['eo_id'];

                $zone_query = $database -> table_search_by_element($office['office_no'],'education_office','higher_zone_no');
                ?>
                <table class="table table-hover">
                <?php
                if(mysqli_num_rows($zone_query) > 0){
                    while($zone = mysqli_fetch_assoc($zone_query)){
                      $div_id = $database -> table_by_id($zone['office_no'],'education_office','office_no');
                      $school_query = $database -> table_search_by_element($div_id['eo_id'],'school','edu_division');
                      if(mysqli_num_rows($school_query) > 0){
                          while($school = mysqli_fetch_assoc($school_query)){
                            $teacher_query = $database -> school_appointed_teachers($school['school_no']);
                            if(mysqli_num_rows($teacher_query) > 0){
                              
                                while($tc_id = mysqli_fetch_assoc($teacher_query)){
                                  $teacher = $database -> table_by_id($tc_id['tc_id'],'teacher','tc_id');
                                  $birth_date = date_create($teacher['birth_day']);
                                  $current_date = date_create(date("Y-m-d"));
                                  $period     = date_diff($birth_date,$current_date);
                                  $age = $period->format("%Y");
                                  if($age<30) {
                                    $thirty++;
                                  }elseif ($age<40) {
                                    $fourty++;
                                  }elseif ($age<50) {
                                    $fifty++;
                                  }elseif ($age<55) {
                                    $sixty++;
                                  }elseif ($age<60) {
                                    $seventy++;
                                  }
                                }
                            }
                          }
                      }
                    }
                }
                $total = $thirty+$fourty+$fifty+$sixty+$seventy;
                $thirtyp = round($thirty*100/$total,1);
                $fourtyp = round($fourty*100/$total,1);
                $fiftyp = round($fifty*100/$total,1);
                $sixtyp = round($sixty*100/$total,1);
                $seventyp = round($seventy*100/$total,1);
                ?>
                <tr>
                  <th id="tableMain">
                    Age
                  </th>
                  <th id="teacher">
                    Teachers
                  </th>
                  <th id="percentage">
                   Percentage
                  </th>
                </tr>
                <tr>
                  <td id="tableMain">
                   20-29 
                  </td>
                  <td id="teacher">
                    <?php $database -> display_message($thirty); ?>
                  </td>
                  <td id="percentage">
                    <?php $database -> display_message($thirtyp); ?>
                  </td>
                </tr>
                <tr>
                  <td id="tableMain">
                    30-39
                  </td>
                  <td id="teacher">
                    <?php $database -> display_message($fourty); ?>
                  </td>
                  <td id="percentage">
                    <?php $database -> display_message($fourtyp); ?>
                  </td>
                </tr>
                <tr>
                  <td id="tableMain">
                    40-49
                  </td>
                  <td id="teacher">
                    <?php $database -> display_message($fifty); ?>
                  </td>
                  <td id="percentage">
                    <?php $database -> display_message($fiftyp); ?>
                  </td>
                </tr>
                <tr>
                  <td id="tableMain">
                    50-54
                  </td>
                  <td id="teacher">
                    <?php $database -> display_message($sixty); ?>
                  </td>
                  <td id="percentage">
                    <?php $database -> display_message($sixtyp); ?>
                  </td>
                </tr>
                <tr>
                  <td id="tableMain">
                    55-59
                  </td>
                  <td id="teacher">
                    <?php $database -> display_message($seventy); ?>
                  </td>
                  <td id="percentage">
                    <?php $database -> display_message($seventyp); ?>
                  </td>
                </tr>
              </table>
                <?php
              }
              elseif($type == "province"){
                $thirty = $fourty = $fifty = $sixty = $seventy = 0;
                $province_id = $office['eo_id'];
                ?>
                <table class="table table-hover">
                <?php
                $province_query = $database -> table_search_by_element($office['office_no'],'education_office','higher_provi_no');
                if(mysqli_num_rows($province_query) > 0){
                    while($province = mysqli_fetch_assoc($province_query)){
                      $div_id = $database -> table_by_id($province['office_no'],'education_office','office_no');
                      $school_query = $database -> table_search_by_element($div_id['eo_id'],'school','edu_division');
                      if(mysqli_num_rows($school_query) > 0){
                          while($school = mysqli_fetch_assoc($school_query)){
                            $teacher_query = $database -> school_appointed_teachers($school['school_no']);
                              if(mysqli_num_rows($teacher_query) > 0){
                                
                                  while($tc_id = mysqli_fetch_assoc($teacher_query)){
                                    $teacher = $database -> table_by_id($tc_id['tc_id'],'teacher','tc_id');
                                    $birth_date = date_create($teacher['birth_day']);
                                    $current_date = date_create(date("Y-m-d"));
                                    $period     = date_diff($birth_date,$current_date);
                                    $age = $period->format("%Y");
                                    if($age<30) {
                                      $thirty++;
                                    }elseif ($age<40) {
                                      $fourty++;
                                    }elseif ($age<50) {
                                      $fifty++;
                                    }elseif ($age<55) {
                                      $sixty++;
                                    }elseif ($age<60) {
                                      $seventy++;
                                    }
                                  }
                              }
                          }
                      }
                    }
                }
    
                $total = $thirty+$fourty+$fifty+$sixty+$seventy;
                $thirtyp = round($thirty*100/$total,1);
                $fourtyp = round($fourty*100/$total,1);
                $fiftyp = round($fifty*100/$total,1);
                $sixtyp = round($sixty*100/$total,1);
                $seventyp = round($seventy*100/$total,1);
                ?>
                <tr>
                  <th id="tableMain">
                    Age
                  </th>
                  <th id="teacher">
                    Teachers
                  </th>
                  <th id="percentage">
                   Percentage
                  </th>
                </tr>
                <tr>
                  <td id="tableMain">
                   20-29 
                  </td>
                  <td id="teacher">
                    <?php $database -> display_message($thirty); ?>
                  </td>
                  <td id="percentage">
                    <?php $database -> display_message($thirtyp); ?>
                  </td>
                </tr>
                <tr>
                  <td id="tableMain">
                    30-39
                  </td>
                  <td id="teacher">
                    <?php $database -> display_message($fourty); ?>
                  </td>
                  <td id="percentage">
                    <?php $database -> display_message($fourtyp); ?>
                  </td>
                </tr>
                <tr>
                  <td id="tableMain">
                    40-49
                  </td>
                  <td id="teacher">
                    <?php $database -> display_message($fifty); ?>
                  </td>
                  <td id="percentage">
                    <?php $database -> display_message($fiftyp); ?>
                  </td>
                </tr>
                <tr>
                  <td id="tableMain">
                    50-54
                  </td>
                  <td id="teacher">
                    <?php $database -> display_message($sixty); ?>
                  </td>
                  <td id="percentage">
                    <?php $database -> display_message($sixtyp); ?>
                  </td>
                </tr>
                <tr>
                  <td id="tableMain">
                    55-59
                  </td>
                  <td id="teacher">
                    <?php $database -> display_message($seventy); ?>
                  </td>
                  <td id="percentage">
                    <?php $database -> display_message($seventyp); ?>
                  </td>
                </tr>
              </table>
                <?php
              }
              elseif($type == "country"){
                $thirty = $fourty = $fifty = $sixty = $seventy = 0;
                $school_query = $database -> table_search('school');
                ?>
                <table class="table table-hover">
                <?php
                if(mysqli_num_rows($school_query) > 0){
                  while($school = mysqli_fetch_assoc($school_query)){
                    $teacher_query = $database -> school_appointed_teachers($school['school_no']);
                    if(mysqli_num_rows($teacher_query) > 0){
                      while($tc_id = mysqli_fetch_assoc($teacher_query)){
                        $teacher = $database -> table_by_id($tc_id['tc_id'],'teacher','tc_id');
                        $birth_date = date_create($teacher['birth_day']);
                        $current_date = date_create(date("Y-m-d"));
                        $period     = date_diff($birth_date,$current_date);
                        $age = $period->format("%Y");
                        if($age<30) {
                          $thirty++;
                        }elseif ($age<40) {
                          $fourty++;
                        }elseif ($age<50) {
                          $fifty++;
                        }elseif ($age<55) {
                          $sixty++;
                        }elseif ($age<60) {
                          $seventy++;
                        }
                      }
                    }
                  }
                }
                $total = $thirty+$fourty+$fifty+$sixty+$seventy;
                $thirtyp = round($thirty*100/$total,1);
                $fourtyp = round($fourty*100/$total,1);
                $fiftyp = round($fifty*100/$total,1);
                $sixtyp = round($sixty*100/$total,1);
                $seventyp = round($seventy*100/$total,1);
                ?>
                <tr>
                  <th id="tableMain">
                    Age
                  </th>
                  <th id="teacher">
                    Teachers
                  </th>
                  <th id="percentage">
                   Percentage
                  </th>
                </tr>
                <tr>
                  <td id="tableMain">
                   20-29 
                  </td>
                  <td id="teacher">
                    <?php $database -> display_message($thirty); ?>
                  </td>
                  <td id="percentage">
                    <?php $database -> display_message($thirtyp); ?>
                  </td>
                </tr>
                <tr>
                  <td id="tableMain">
                    30-39
                  </td>
                  <td id="teacher">
                    <?php $database -> display_message($fourty); ?>
                  </td>
                  <td id="percentage">
                    <?php $database -> display_message($fourtyp); ?>
                  </td>
                </tr>
                <tr>
                  <td id="tableMain">
                    40-49
                  </td>
                  <td id="teacher">
                    <?php $database -> display_message($fifty); ?>
                  </td>
                  <td id="percentage">
                    <?php $database -> display_message($fiftyp); ?>
                  </td>
                </tr>
                <tr>
                  <td id="tableMain">
                    50-54
                  </td>
                  <td id="teacher">
                    <?php $database -> display_message($sixty); ?>
                  </td>
                  <td id="percentage">
                    <?php $database -> display_message($sixtyp); ?>
                  </td>
                </tr>
                <tr>
                  <td id="tableMain">
                    55-59
                  </td>
                  <td id="teacher">
                    <?php $database -> display_message($seventy); ?>
                  </td>
                  <td id="percentage">
                    <?php $database -> display_message($seventyp); ?>
                  </td>
                </tr>
              </table>
              <?php
              }
            }
          }elseif (isset($_POST['gender'])) {

            $male = $female = 0;
            if(isset($school)) {
              $teacher_query = $database -> school_appointed_teachers($number);
              if(mysqli_num_rows($teacher_query) > 0){
                ?>
                <table class="table table-hover">
                  <?php
                  while($tc_id = mysqli_fetch_assoc($teacher_query)){
                    $teacher = $database -> table_by_id($tc_id['tc_id'],'teacher','tc_id');
                    $gender = $teacher['gender'];
                    if($gender == 1) {
                      $male++;
                    }elseif ($gender == 2) {
                      $female++;
                    }
                  }
                  $total = $male+$female;
                  $malep = round($male*100/$total,1);
                  $femalep = round($female*100/$total,1);
                  ?>
                  <tr>
                    <th id="tableMain">
                      Gender
                    </th>
                    <th id="teacher">
                      Teachers
                    </th>
                    <th id="percentage">
                     Percentage
                    </th>
                  </tr>
                  <tr>
                    <td id="tableMain">
                     Male 
                    </td>
                    <td id="teacher">
                      <?php $database -> display_message($male); ?>
                    </td>
                    <td id="percentage">
                      <?php $database -> display_message($malep); ?>
                    </td>
                  </tr>
                  <tr>
                    <td id="tableMain">
                      Female
                    </td>
                    <td id="teacher">
                      <?php $database -> display_message($female); ?>
                    </td>
                    <td id="percentage">
                      <?php $database -> display_message($femalep); ?>
                    </td>
                  </tr>
                </table>
                <?php
                
              }
            }elseif (isset($office)) {
          
              if($type == "division"){
                $male = $female = 0;
                $div_id = $office['eo_id'];

                $school_query = $database -> table_search_by_element($div_id,'school','edu_division');
                ?>
                <table class="table table-hover">
                <?php
                if(mysqli_num_rows($school_query) > 0){
                  while($school = mysqli_fetch_assoc($school_query)){
                    $teacher_query = $database -> school_appointed_teachers($school['school_no']);
                    if(mysqli_num_rows($teacher_query) > 0){
                      
                        while($tc_id = mysqli_fetch_assoc($teacher_query)){
                          $teacher = $database -> table_by_id($tc_id['tc_id'],'teacher','tc_id');
                          $gender = $teacher['gender'];
                          if($gender == 1) {
                            $male++;
                          }elseif ($gender == 2) {
                            $female++;
                          }
                        }
                    }
                  }
                }
                $total = $male+$female;
                $malep = round($male*100/$total,1);
                $femalep = round($female*100/$total,1);
                ?>
                <tr>
                  <th id="tableMain">
                    Gender
                  </th>
                  <th id="teacher">
                    Teachers
                  </th>
                  <th id="percentage">
                   Percentage
                  </th>
                </tr>
                <tr>
                  <td id="tableMain">
                   Male 
                  </td>
                  <td id="teacher">
                    <?php $database -> display_message($male); ?>
                  </td>
                  <td id="percentage">
                    <?php $database -> display_message($malep); ?>
                  </td>
                </tr>
                <tr>
                  <td id="tableMain">
                    Female
                  </td>
                  <td id="teacher">
                    <?php $database -> display_message($female); ?>
                  </td>
                  <td id="percentage">
                    <?php $database -> display_message($femalep); ?>
                  </td>
                </tr>
              </table>
              <?php
              }
              elseif($type == "zone"){
                $thirty = $fourty = $fifty = $sixty = $seventy = 0;
                $zone_id = $office['eo_id'];

                $zone_query = $database -> table_search_by_element($office['office_no'],'education_office','higher_zone_no');
                ?>
                <table class="table table-hover">
                <?php
                if(mysqli_num_rows($zone_query) > 0){
                    while($zone = mysqli_fetch_assoc($zone_query)){
                      $div_id = $database -> table_by_id($zone['office_no'],'education_office','office_no');
                      $school_query = $database -> table_search_by_element($div_id['eo_id'],'school','edu_division');
                      if(mysqli_num_rows($school_query) > 0){
                          while($school = mysqli_fetch_assoc($school_query)){
                            $teacher_query = $database -> school_appointed_teachers($school['school_no']);
                            if(mysqli_num_rows($teacher_query) > 0){
                              
                              while($tc_id = mysqli_fetch_assoc($teacher_query)){
                                $teacher = $database -> table_by_id($tc_id['tc_id'],'teacher','tc_id');
                                $gender = $teacher['gender'];
                                if($gender == 1) {
                                  $male++;
                                }elseif ($gender == 2) {
                                  $female++;
                                }
                              }
                            }
                          }
                      }
                    }
                }
                $total = $male+$female;
                $malep = round($male*100/$total,1);
                $femalep = round($female*100/$total,1);
                ?>
                <tr>
                  <th id="tableMain">
                    Gender
                  </th>
                  <th id="teacher">
                    Teachers
                  </th>
                  <th id="percentage">
                   Percentage
                  </th>
                </tr>
                <tr>
                  <td id="tableMain">
                   Male 
                  </td>
                  <td id="teacher">
                    <?php $database -> display_message($male); ?>
                  </td>
                  <td id="percentage">
                    <?php $database -> display_message($malep); ?>
                  </td>
                </tr>
                <tr>
                  <td id="tableMain">
                    Female
                  </td>
                  <td id="teacher">
                    <?php $database -> display_message($female); ?>
                  </td>
                  <td id="percentage">
                    <?php $database -> display_message($femalep); ?>
                  </td>
                </tr>
              </table>
                <?php
              }
              elseif($type == "province"){
                $thirty = $fourty = $fifty = $sixty = $seventy = 0;
                $province_id = $office['eo_id'];
                ?>
                <table class="table table-hover">
                <?php
                $province_query = $database -> table_search_by_element($office['office_no'],'education_office','higher_provi_no');
                if(mysqli_num_rows($province_query) > 0){
                    while($province = mysqli_fetch_assoc($province_query)){
                      $div_id = $database -> table_by_id($province['office_no'],'education_office','office_no');
                      $school_query = $database -> table_search_by_element($div_id['eo_id'],'school','edu_division');
                      if(mysqli_num_rows($school_query) > 0){
                          while($school = mysqli_fetch_assoc($school_query)){
                      
                            $teacher_query = $database -> school_appointed_teachers($school['school_no']);
                            if(mysqli_num_rows($teacher_query) > 0){
                              
                              while($tc_id = mysqli_fetch_assoc($teacher_query)){
                                $teacher = $database -> table_by_id($tc_id['tc_id'],'teacher','tc_id');
                                $gender = $teacher['gender'];
                                if($gender == 1) {
                                  $male++;
                                }elseif ($gender == 2) {
                                  $female++;
                                }
                              }
                            }
                          }
                      }
                    }
                }
    
                $total = $male+$female;
                $malep = round($male*100/$total,1);
                $femalep = round($female*100/$total,1);
                ?>
                <tr>
                  <th id="tableMain">
                    Gender
                  </th>
                  <th id="teacher">
                    Teachers
                  </th>
                  <th id="percentage">
                   Percentage
                  </th>
                </tr>
                <tr>
                  <td id="tableMain">
                   Male 
                  </td>
                  <td id="teacher">
                    <?php $database -> display_message($male); ?>
                  </td>
                  <td id="percentage">
                    <?php $database -> display_message($malep); ?>
                  </td>
                </tr>
                <tr>
                  <td id="tableMain">
                    Female
                  </td>
                  <td id="teacher">
                    <?php $database -> display_message($female); ?>
                  </td>
                  <td id="percentage">
                    <?php $database -> display_message($femalep); ?>
                  </td>
                </tr>
              </table>
                <?php
              }
              elseif($type == "country"){
                $thirty = $fourty = $fifty = $sixty = $seventy = 0;
                $school_query = $database -> table_search('school');
                ?>
                <table class="table table-hover">
                <?php
                if(mysqli_num_rows($school_query) > 0){
                  while($school = mysqli_fetch_assoc($school_query)){
                    $teacher_query = $database -> school_appointed_teachers($school['school_no']);
                    if(mysqli_num_rows($teacher_query) > 0){
                      
                      while($tc_id = mysqli_fetch_assoc($teacher_query)){
                        $teacher = $database -> table_by_id($tc_id['tc_id'],'teacher','tc_id');
                        $gender = $teacher['gender'];
                        if($gender == 1) {
                          $male++;
                        }elseif ($gender == 2) {
                          $female++;
                        }
                      }
                    }
                  }
                }
                $total = $male+$female;
                $malep = round($male*100/$total,1);
                $femalep = round($female*100/$total,1);
                ?>
                <tr>
                  <th id="tableMain">
                    Gender
                  </th>
                  <th id="teacher">
                    Teachers
                  </th>
                  <th id="percentage">
                   Percentage
                  </th>
                </tr>
                <tr>
                  <td id="tableMain">
                   Male 
                  </td>
                  <td id="teacher">
                    <?php $database -> display_message($male); ?>
                  </td>
                  <td id="percentage">
                    <?php $database -> display_message($malep); ?>
                  </td>
                </tr>
                <tr>
                  <td id="tableMain">
                    Female
                  </td>
                  <td id="teacher">
                    <?php $database -> display_message($female); ?>
                  </td>
                  <td id="percentage">
                    <?php $database -> display_message($femalep); ?>
                  </td>
                </tr>
              </table>
              <?php
              }
            }
          }elseif (isset($_POST['race'])) {

            $sinhala = $tamil_s = $tamil_i = $muslim = $other_r = 0;
            if(isset($school)) {
              $teacher_query = $database -> school_appointed_teachers($number);
              if(mysqli_num_rows($teacher_query) > 0){
                ?>
                <table class="table table-hover">
                  <?php
                  while($tc_id = mysqli_fetch_assoc($teacher_query)){
                    $teacher = $database -> table_by_id($tc_id['tc_id'],'teacher','tc_id');
                    $race = $teacher['race'];
                    if($race == 1) {
                      $sinhala++;
                    }elseif ($race == 2) {
                      $tamil_s++;
                    }elseif ($race == 3) {
                      $tamil_i++;
                    }elseif ($race == 4) {
                      $muslim++;
                    }elseif ($race == 5) {
                      $other_r++;
                    }
                  }
                  $total = $sinhala+$tamil_s+$tamil_i+$muslim+$other_r;
                  $sinhalap = round($sinhala*100/$total,1);
                  $tamil_sp = round($tamil_s*100/$total,1);
                  $tamil_ip = round($tamil_i*100/$total,1);
                  $muslimp = round($muslim*100/$total,1);
                  $other_rp = round($other_r*100/$total,1);
                  ?>
                  <tr>
                    <th id="tableMain">
                      Race
                    </th>
                    <th id="teacher">
                      Teachers
                    </th>
                    <th id="percentage">
                     Percentage
                    </th>
                  </tr>
                  <tr>
                    <td id="tableMain">
                     Sinhala 
                    </td>
                    <td id="teacher">
                      <?php $database -> display_message($sinhala); ?>
                    </td>
                    <td id="percentage">
                      <?php $database -> display_message($sinhalap); ?>
                    </td>
                  </tr>
                  <tr>
                    <td id="tableMain">
                      Tamil SriLanka
                    </td>
                    <td id="teacher">
                      <?php $database -> display_message($tamil_s); ?>
                    </td>
                    <td id="percentage">
                      <?php $database -> display_message($tamil_sp); ?>
                    </td>
                  </tr>
                  <tr>
                    <td id="tableMain">
                      Tamil India
                    </td>
                    <td id="teacher">
                      <?php $database -> display_message($tamil_i); ?>
                    </td>
                    <td id="percentage">
                      <?php $database -> display_message($tamil_ip); ?>
                    </td>
                  </tr>
                  <tr>
                    <td id="tableMain">
                      Muslim
                    </td>
                    <td id="teacher">
                      <?php $database -> display_message($muslim); ?>
                    </td>
                    <td id="percentage">
                      <?php $database -> display_message($muslimp); ?>
                    </td>
                  </tr>
                  <tr>
                    <td id="tableMain">
                      Other
                    </td>
                    <td id="teacher">
                      <?php $database -> display_message($other_r); ?>
                    </td>
                    <td id="percentage">
                      <?php $database -> display_message($other_rp); ?>
                    </td>
                  </tr>
                </table>
                <?php
                
              }
            }
          }elseif (isset($_POST['religion'])) {

            $buddhism = $hindu = $islam = $catholic = $christian = $other_re = 0;
            if(isset($school)) {
              $teacher_query = $database -> school_appointed_teachers($number);
              if(mysqli_num_rows($teacher_query) > 0){
                ?>
                <table class="table table-hover">
                  <?php
                  while($tc_id = mysqli_fetch_assoc($teacher_query)){
                    $teacher = $database -> table_by_id($tc_id['tc_id'],'teacher','tc_id');
                    $religion = $teacher['religion'];
                    if($religion == 1) {
                      $buddhism++;
                    }elseif ($religion == 2) {
                      $hindu++;
                    }elseif ($religion == 3) {
                      $islam++;
                    }elseif ($religion == 4) {
                      $catholic++;
                    }elseif ($religion == 5) {
                      $christian++;
                    }elseif ($religion == 6) {
                      $other_re++;
                    }
                  }
                  $total = $buddhism+$hindu+$islam+$catholic+$christian+$other_re;
                  $buddhismp = round($buddhism*100/$total,1);
                  $hindup = round($hindu*100/$total,1);
                  $islamp = round($islam*100/$total,1);
                  $catholicp = round($catholic*100/$total,1);
                  $christianp = round($christian*100/$total,1);
                  $other_rep = round($other_re*100/$total,1);
                  ?>
                  <tr>
                    <th id="tableMain">
                      Religion
                    </th>
                    <th id="teacher">
                      Teachers
                    </th>
                    <th id="percentage">
                     Percentage
                    </th>
                  </tr>
                  <tr>
                    <td id="tableMain">
                     Buddhism 
                    </td>
                    <td id="teacher">
                      <?php $database -> display_message($buddhism); ?>
                    </td>
                    <td id="percentage">
                      <?php $database -> display_message($buddhismp); ?>
                    </td>
                  </tr>
                  <tr>
                    <td id="tableMain">
                      Hindu
                    </td>
                    <td id="teacher">
                      <?php $database -> display_message($hindu); ?>
                    </td>
                    <td id="percentage">
                      <?php $database -> display_message($hindup); ?>
                    </td>
                  </tr>
                  <tr>
                    <td id="tableMain">
                      Islam
                    </td>
                    <td id="teacher">
                      <?php $database -> display_message($islam); ?>
                    </td>
                    <td id="percentage">
                      <?php $database -> display_message($islamp); ?>
                    </td>
                  </tr>
                  <tr>
                    <td id="tableMain">
                      Catholic
                    </td>
                    <td id="teacher">
                      <?php $database -> display_message($catholic); ?>
                    </td>
                    <td id="percentage">
                      <?php $database -> display_message($catholicp); ?>
                    </td>
                  </tr>
                  <tr>
                    <td id="tableMain">
                      Christian
                    </td>
                    <td id="teacher">
                      <?php $database -> display_message($christian); ?>
                    </td>
                    <td id="percentage">
                      <?php $database -> display_message($christianp); ?>
                    </td>
                  </tr>
                  <tr>
                    <td id="tableMain">
                      Other
                    </td>
                    <td id="teacher">
                      <?php $database -> display_message($other_re); ?>
                    </td>
                    <td id="percentage">
                      <?php $database -> display_message($other_rep); ?>
                    </td>
                  </tr>
                </table>
                <?php
                
              }
            }
          }
      }
?>
    </div>   
  </div>
  <div class="row">
      <div class="col-md-6">
        <div class="well" id="chart_div1" class="chart"></div>
      </div>
      <div class="col-md-6">
        <div class="well" id="chart_div2" class="chart"></div>
      </div>
  </div>
</div>
<footer class="container-fluid text-center">
  <div class="row footer">
    <p>2018 Copyright: xcodeweb.com</p>
  </div>
</footer>

<script src="//static.codepen.io/assets/common/stopExecutionOnTimeout-b2a7b3fe212eaa732349046d8416e00a9dec26eb7fd347590fbced3ab38af52e.js"></script>

<script src='//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='https://www.google.com/jsapi'></script>

  
<?php if(isset($_POST['age'])) { ?>
  <script >
  google.load("visualization", "1", {packages:["corechart"]});
  google.setOnLoadCallback(drawChart1);
  function drawChart1() {
    var data = google.visualization.arrayToDataTable([
      ['Age', 'Amount'],
      ['Below 30', <?php $database -> display_message($thirty); ?>],
      ['30-39', <?php $database -> display_message($fourty); ?>],
      ['40-49', <?php $database -> display_message($fifty); ?>],
      ['50-54', <?php $database -> display_message($sixty); ?>],
      ['55-59', <?php $database -> display_message($seventy); ?>]
    ]);

    var options = {
      title: 'Age Static(Amount)',
      hAxis: {title: 'Age', titleTextStyle: {color: 'black'}}
   };

  var chart = new google.visualization.ColumnChart(document.getElementById('chart_div1'));
    chart.draw(data, options);
  }

  google.load("visualization", "1", {packages:["corechart"]});
  google.setOnLoadCallback(drawChart2);
  function drawChart2() {
    var data = google.visualization.arrayToDataTable([
       ['Age', 'Amount'],
       ['Below 30', <?php $database -> display_message($thirtyp); ?>],
       ['30-39', <?php $database -> display_message($fourtyp); ?>],
       ['40-49', <?php $database -> display_message($fiftyp); ?>],
       ['50-54', <?php $database -> display_message($sixtyp); ?>],
       ['55-59', <?php $database -> display_message($seventyp); ?>]
     ]);

    var options = {
      title: 'Age Static(Percentage)',
      hAxis: {title: 'Age',  titleTextStyle: {color: '#333'}},
      vAxis: {minValue: 0}
    };

    var chart = new google.visualization.PieChart(document.getElementById('chart_div2'));
    chart.draw(data, options);
  }

  $(window).resize(function(){
    drawChart1();
    drawChart2();
  });

  </script>
<?php } ?>

<?php if(isset($_POST['gender'])) { ?>
  <script >
  google.load("visualization", "1", {packages:["corechart"]});
  google.setOnLoadCallback(drawChart1);
  function drawChart1() {
    var data = google.visualization.arrayToDataTable([
      ['Gender', 'Teacher'],
      ['Male', <?php $database -> display_message($male); ?>],
      ['Female', <?php $database -> display_message($female); ?> ]
    ]);

    var options = {
      title: 'Gender Static(Amount)',
      hAxis: {title: 'Gender', titleTextStyle: {color: 'black'}}
   };

  var chart = new google.visualization.ColumnChart(document.getElementById('chart_div1'));
    chart.draw(data, options);
  }

  google.load("visualization", "1", {packages:["corechart"]});
  google.setOnLoadCallback(drawChart2);
  function drawChart2() {
    var data = google.visualization.arrayToDataTable([
       ['Gender', 'Teacher'],
       ['Male', <?php $database -> display_message($malep); ?>],
       ['Female', <?php $database -> display_message($femalep); ?>]
     ]);

    var options = {
      title: 'Gender Static(Percentage)',
      hAxis: {title: 'Gender',  titleTextStyle: {color: '#333'}},
      vAxis: {minValue: 0}
    };

    var chart = new google.visualization.PieChart(document.getElementById('chart_div2'));
    chart.draw(data, options);
  }

  $(window).resize(function(){
    drawChart1();
    drawChart2();
  });

  </script>
<?php } ?>

<?php if(isset($_POST['race'])) { ?>
  <script >
  google.load("visualization", "1", {packages:["corechart"]});
  google.setOnLoadCallback(drawChart1);
  function drawChart1() {
    var data = google.visualization.arrayToDataTable([
      ['Race', 'Teacher'],
      ['Sinhala', <?php $database -> display_message($sinhala); ?>],
      ['Tamil SriLanka', <?php $database -> display_message($tamil_s); ?>],
      ['Tamil India', <?php $database -> display_message($tamil_i); ?>],
      ['Muslim', <?php $database -> display_message($muslim); ?>],
      ['Other', <?php $database -> display_message($other_r); ?> ]
    ]);

    var options = {
      title: 'Race Static(Amount)',
      hAxis: {title: 'Race', titleTextStyle: {color: 'black'}}
   };

  var chart = new google.visualization.ColumnChart(document.getElementById('chart_div1'));
    chart.draw(data, options);
  }

  google.load("visualization", "1", {packages:["corechart"]});
  google.setOnLoadCallback(drawChart2);
  function drawChart2() {
    var data = google.visualization.arrayToDataTable([
      ['Race', 'Teacher'],
      ['Sinhala', <?php $database -> display_message($sinhalap); ?>],
      ['Tamil SriLanka', <?php $database -> display_message($tamil_sp); ?>],
      ['Tamil India', <?php $database -> display_message($tamil_ip); ?>],
      ['Muslim', <?php $database -> display_message($muslimp); ?>],
      ['Other', <?php $database -> display_message($other_rp); ?> ]
    ]);

    var options = {
      title: 'Gender Static(Percentage)',
      hAxis: {title: 'Gender',  titleTextStyle: {color: '#333'}},
      vAxis: {minValue: 0}
    };

    var chart = new google.visualization.PieChart(document.getElementById('chart_div2'));
    chart.draw(data, options);
  }

  $(window).resize(function(){
    drawChart1();
    drawChart2();
  });

  </script>
<?php } ?>

<?php if(isset($_POST['religion'])) { ?>
  <script >
  google.load("visualization", "1", {packages:["corechart"]});
  google.setOnLoadCallback(drawChart1);
  function drawChart1() {
    var data = google.visualization.arrayToDataTable([
      ['Religion', 'Teacher'],
      ['Buddhism', <?php $database -> display_message($buddhism); ?>],
      ['Hindu', <?php $database -> display_message($hindu); ?>],
      ['Islam', <?php $database -> display_message($islam); ?>],
      ['Catholic', <?php $database -> display_message($catholic); ?>],
      ['Christian', <?php $database -> display_message($christian); ?>],
      ['Other', <?php $database -> display_message($other_re); ?> ]
    ]);

    var options = {
      title: 'Religion Static(Amount)',
      hAxis: {title: 'Religion', titleTextStyle: {color: 'black'}}
   };

  var chart = new google.visualization.ColumnChart(document.getElementById('chart_div1'));
    chart.draw(data, options);
  }

  google.load("visualization", "1", {packages:["corechart"]});
  google.setOnLoadCallback(drawChart2);
  function drawChart2() {
    var data = google.visualization.arrayToDataTable([
      ['Religion', 'Teacher'],
      ['Buddhism', <?php $database -> display_message($buddhismp); ?>],
      ['Hindu', <?php $database -> display_message($hindup); ?>],
      ['Islam', <?php $database -> display_message($islamp); ?>],
      ['Catholic', <?php $database -> display_message($catholicp); ?>],
      ['Christian', <?php $database -> display_message($christianp); ?>],
      ['Other', <?php $database -> display_message($other_rep); ?> ]
    ]);

    var options = {
      title: 'Religion Static(Percentage)',
      hAxis: {title: 'Religion',  titleTextStyle: {color: '#333'}},
      vAxis: {minValue: 0}
    };

    var chart = new google.visualization.PieChart(document.getElementById('chart_div2'));
    chart.draw(data, options);
  }

  $(window).resize(function(){
    drawChart1();
    drawChart2();
  });

  </script>
<?php } ?>
