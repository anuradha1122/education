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
        width: 90%;

        cursor: pointer;
    }

    input[type=submit]:hover {
        background-color: #cc6633;
    }

    td {

      height: 10px;
    }

    #tableField {
      width: 50%;
      text-align: right;
      
    }

    #tableBox {
      width: 50%;
      text-align:center;

    }

    #tableSubject {
      width: 50%;
      text-align: center;
    }

    #tableNecessity {
      width: 10%;
      text-align: center;
    }

    #tableAppointed {
      width: 10%;
      text-align: center;
    }

    #tableTeaching {
      width: 10%;
      text-align: center;
    }

    #tableExcess {
      width: 10%;
      text-align: center;
    }

    #tableDeficient {
      width: 10%;
      text-align: center;
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
        <li><a href="educationoffice.php"><span class="glyphicon glyphicon-chevron-left"></span> Back</a></li>
        <li><a href="logout.php?id=logout"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
      </ul>
    </div>
  </div>
</nav>
<?php 
 #page number 21

  $database = new Database();

  $database -> empty_session();
  //$database -> restricted_page('21');

  if(isset($_GET['number'])) {
    $number = $_GET['number'];
    $school = $database -> table_by_id($number,'school','school_no');
  }else{
    $database -> headerto('educationoffice.php');
  }
?>
<div class="container-fluid">
  <div class="row">
    <div class="col-md-12 text-center">
      <h3>SCHOOL DETAILS</h3>
      <h4><?php $database -> display_message($school['name']); ?>
          <?php $database -> display_message(" ("); ?>
          <?php $database -> display_message($school['school_no']); ?>
          <?php $database -> display_message(")"); ?>
      </h4>
    </div>
  </div> 
  <div class="row" >
      <div class="col-sm-4 col-sm-offset-4 col-xs-offset-0 justify-content-center">
        <table class="table table-hover">
          <tr>
            <td id="tableField">
              <?php $database -> display_message("School Medium :"); 
              $lang_medium  = $database -> table_by_id($school['cat_by_lang'],'language_medium','lm_id'); ?>
            </td>
            <td>
              <?php $database -> display_message($lang_medium['name']); ?>
            </td>
          </tr>
          <tr>
            <td id="tableField">
              <?php $database -> display_message("School Name : "); ?>
            </td>
            <td>
              <?php $database -> display_message($school['name']); ?>
            </td>
          </tr>
          <tr>
            <td id="tableField">
              <?php $database -> display_message("Address : "); ?>
            </td>
            <td>
              <?php $database -> display_message($school['add_li1']); ?>
            </td>
          </tr>
          <?php if($school['add_li2']) { ?>
          <tr>
            <td id="tableField">
              <?php $database -> display_message(" "); ?>
            </td>
            <td>
              <?php $database -> display_message($school['add_li2']); ?>
            </td>
          </tr>
        <?php } ?>
          <tr>
            <td id="tableField">
              <?php $database -> display_message("Province : ");
            $higher_province = $database -> table_by_id($school['edu_division'],'education_office','eo_id');
            $province = $database -> table_by_id($higher_province['higher_provi_no'],'education_office','office_no'); ?>
            </td>
            <td>
              <?php $database -> display_message($province['name']); ?>
            </td>
          </tr>
          <tr>
            <td id="tableField">
              <?php $database -> display_message("Zone : ");
            $higher_zone = $database -> table_by_id($school['edu_division'],'education_office','eo_id');
            $zone = $database -> table_by_id($higher_zone['higher_zone_no'],'education_office','office_no'); ?>
            </td>
            <td>
              <?php $database -> display_message($zone['name']); ?>
            </td>
          </tr>
          <tr>
            <td id="tableField">
              <?php $database -> display_message("Division : ");
            $division   = $database -> table_by_id($school['edu_division'],'education_office','eo_id'); ?>
            </td>
            <td>
              <?php $database -> display_message($division['name']); ?>
            </td>
          </tr>
          <tr>
            <td id="tableField">
              <?php $database -> display_message("School No : "); ?>
            </td>
            <td>
              <?php $database -> display_message($school['school_no']); ?>
            </td>
          </tr>

          <tr>
            <td id="tableField">
              <?php $database -> display_message("Go To : "); ?>
            </td>
            <td>
              <input class="btn btn-primary" type="submit" onclick="location.href='teacherselections.php';" name="teacher_selection" value="Teacher Selections">
            </td>
          </tr>
        </table>
      </div>
  </div>
  
  <div class="row">
    <div class="col-md-12 text-center">
      <h3>TEACHER ALLOCATION FOR SUBJECT CATAGORY</h3>
    </div>
  </div> 
  <?php
  $classes = $database -> table_by_id($school['sc_id'],'school_subject','sc_id');
  ?>
  <div class="row text-center  table-responsive">
    <div class="col-sm-8 col-sm-offset-2 col-xs-offset-0 justify-content-center text-center">
      <table class="table table-hover">
      <tr>
        <th>Subject Catagory</th>
        <th>Necessity</th>
        <th>Appointed</th>
        <th>Excess</th>
        <th>Deficient</th>
      </tr>

      <?php 
      $i = 0;
      $a = $b =$c =$d = 0;
      if($classes['common_si']<>'0'){
        $necessity = $database -> table_by_id($classes['common_si'],'class_teacher','class');

        $current_query = $database -> school_appointed_teachers($number);
        while($current = mysqli_fetch_assoc($current_query)){
          $teacher = $database -> table_by_id($current['tc_id'],'teacher','tc_id');
          $subject = $database -> table_by_id($teacher['main_sub'],'subject','su_id');
          if($subject['sub_cat'] == 1 AND $subject['medium'] == 1){
            $i++;
          }
        }
        $a = $necessity['common'] +$a;
        $b = $i +$b;
        $balance = $i - $necessity['common'];

      ?>
      <tr>
        <th>Primary Common Sinhala</th>
        <th><?php echo $necessity['common']; ?></th>
        <th><?php  echo $i; ?></th>
        <th><?php if($balance>0){ echo $balance; $c = $balance + $c; }else{echo 0;} ?></th>
        <th><?php if($balance<0){ echo $balance; $d = $balance + $d;}else{echo 0;} ?></th>
      </tr>
      <?php 
      }
      ?>

      <?php 
      $i = 0;
      if($classes['common_tm']<>'0'){
        $necessity = $database -> table_by_id($classes['common_tm'],'class_teacher','class');

        $current_query = $database -> school_appointed_teachers($number);
        while($current = mysqli_fetch_assoc($current_query)){
          $teacher = $database -> table_by_id($current['tc_id'],'teacher','tc_id');
          $subject = $database -> table_by_id($teacher['main_sub'],'subject','su_id');
          if($subject['sub_cat'] == 1 AND $subject['medium'] == 2){
            $i++;
          }
        }
        $a = $necessity['common'] +$a;
        $b = $i +$b;
        $balance = $i - $necessity['common'];

      ?>
      <tr>
        <th>Primary Common Tamil</th>
        <th><?php echo $necessity['common']; ?></th>
        <th><?php  echo $i; ?></th>
        <th><?php if($balance>0){ echo $balance; $c = $balance + $c; }else{echo 0;} ?></th>
        <th><?php if($balance<0){ echo $balance; $d = $balance + $d;}else{echo 0;} ?></th>
      </tr>
      <?php 
      }
      ?>

      <?php 
      $i = 0;
      if($classes['common_en']<>'0'){
        $necessity = $database -> table_by_id($classes['common_en'],'class_teacher','class');

        $current_query = $database -> school_appointed_teachers($number);
        while($current = mysqli_fetch_assoc($current_query)){
          $teacher = $database -> table_by_id($current['tc_id'],'teacher','tc_id');
          $subject = $database -> table_by_id($teacher['main_sub'],'subject','su_id');
          if($subject['sub_cat'] == 1 AND $subject['medium'] == 3){
            $i++;
          }
        }
        $a = $necessity['common'] +$a;
        $b = $i +$b;
        $balance = $i - $necessity['common'];

      ?>
      <tr>
        <th>Primary Common English</th>
        <th><?php echo $necessity['common']; ?></th>
        <th><?php  echo $i; ?></th>
        <th><?php if($balance>0){ echo $balance; $c = $balance + $c; }else{echo 0;} ?></th>
        <th><?php if($balance<0){ echo $balance; $d = $balance + $d;}else{echo 0;} ?></th>
      </tr>
      <?php 
      }
      ?>


      <?php 
      $i = 0;
      if($classes['english_pri_en']<>'0'){
        $necessity = $database -> table_by_id($classes['english_pri_en'],'class_teacher','class');

        $current_query = $database -> school_appointed_teachers($number);
        while($current = mysqli_fetch_assoc($current_query)){
          $teacher = $database -> table_by_id($current['tc_id'],'teacher','tc_id');
          $subject = $database -> table_by_id($teacher['main_sub'],'subject','su_id');
          if($subject['sub_cat'] == 2){
            $i++;
          }
        }
        $a = $necessity['english_pri'] +$a;
        $b = $i +$b;
        $balance = $i - $necessity['english_pri'];

      ?>
      <tr>
        <th>English Primary</th>
        <th><?php echo $necessity['english_pri']; ?></th>
        <th><?php  echo $i; ?></th>
        <th><?php if($balance>0){ echo $balance; $c = $balance + $c; }else{echo 0;} ?></th>
        <th><?php if($balance<0){ echo $balance; $d = $balance + $d; }else{echo 0;} ?></th>
      </tr>
      <?php 
      }
      ?>
      

      <?php 
      $i = 0;
      if($classes['second_lang_si']<>'0'){
        $necessity = $database -> table_by_id($classes['second_lang_si'],'class_teacher','class');

        $current_query = $database -> school_appointed_teachers($number);
        while($current = mysqli_fetch_assoc($current_query)){
          $teacher = $database -> table_by_id($current['tc_id'],'teacher','tc_id');
          $subject = $database -> table_by_id($teacher['main_sub'],'subject','su_id');
          if($subject['sub_cat'] == 3 AND $subject['medium'] == 1){
            $i++;
          }
        }

        $a = $necessity['second_lang'] +$a;
        $b = $i +$b;
        $balance = $i - $necessity['second_lang'];

      ?>
      <tr>
        <th>Primary Second Language Sinhala</th>
        <th><?php echo $necessity['second_lang']; ?></th>
        <th><?php  echo $i; ?></th>
        <th><?php if($balance>0){ echo $balance; $c = $balance + $c; }else{echo 0;} ?></th>
        <th><?php if($balance<0){ echo $balance; $d = $balance + $d; }else{echo 0;} ?></th>
      </tr>
      <?php 
      }
      ?>

      <?php 
      $i = 0;
      if($classes['second_lang_tm']<>'0'){
        $necessity = $database -> table_by_id($classes['second_lang_tm'],'class_teacher','class');

        $current_query = $database -> school_appointed_teachers($number);
        while($current = mysqli_fetch_assoc($current_query)){
          $teacher = $database -> table_by_id($current['tc_id'],'teacher','tc_id');
          $subject = $database -> table_by_id($teacher['main_sub'],'subject','su_id');
          if($subject['sub_cat'] == 3 AND $subject['medium'] == 2){
            $i++;
          }
        }
        $a = $necessity['second_lang'] +$a;
        $b = $i +$b;
        $balance = $i - $necessity['second_lang'];

      ?>
      <tr>
        <th>Primary Second Language Tamil</th>
        <th><?php echo $necessity['second_lang']; ?></th>
        <th><?php  echo $i; ?></th>
        <th><?php if($balance>0){ echo $balance; $c = $balance + $c; }else{echo 0;} ?></th>
        <th><?php if($balance<0){ echo $balance; $d = $balance + $d; }else{echo 0;} ?></th>
      </tr>
      <?php 
      }
      ?>

      <?php 
      $i = 0;
      if($classes['common_si']<>'0' OR $classes['common_tm']<>'0' OR $classes['common_en']<>'0'){

      ?>
      <tr>
        <th>Primary Supervision</th>
        <th><?php echo "0"; ?></th>
        <th><?php  echo "0"; ?></th>
        <th><?php echo "0"; ?></th>
        <th><?php echo "0"; ?></th>
      </tr>
      <?php 
      }
      ?>

      <?php 
      $i = 0;
      if($classes['science_si']<>'0'){
        $necessity = $database -> table_by_id($classes['science_si'],'class_teacher','class');

        $current_query = $database -> school_appointed_teachers($number);
        while($current = mysqli_fetch_assoc($current_query)){
          $teacher = $database -> table_by_id($current['tc_id'],'teacher','tc_id');
          $subject = $database -> table_by_id($teacher['main_sub'],'subject','su_id');
          if($subject['sub_cat'] == 5 AND $subject['medium'] == 1){
            $i++;
          }
        }

        $a = $necessity['science'] +$a;
        $b = $i +$b;
        $balance = $i - $necessity['science'];

      ?>
      <tr>
        <th>6-11 Science Sinhala</th>
        <th><?php echo $necessity['science']; ?></th>
        <th><?php  echo $i; ?></th>
        <th><?php if($balance>0){ echo $balance; $c = $balance + $c; }else{echo 0;} ?></th>
        <th><?php if($balance<0){ echo $balance; $d = $balance + $d; }else{echo 0;} ?></th>
      </tr>
      <?php 
      }
      ?>

      <?php 
      $i = 0;
      if($classes['science_tm']<>'0'){
        $necessity = $database -> table_by_id($classes['science_tm'],'class_teacher','class');

        $current_query = $database -> school_appointed_teachers($number);
        while($current = mysqli_fetch_assoc($current_query)){
          $teacher = $database -> table_by_id($current['tc_id'],'teacher','tc_id');
          $subject = $database -> table_by_id($teacher['main_sub'],'subject','su_id');
          if($subject['sub_cat'] == 5 AND $subject['medium'] == 2){
            $i++;
          }
        }

        $a = $necessity['science'] +$a;
        $b = $i +$b;
        $balance = $i - $necessity['science'];

      ?>
      <tr>
        <th>6-11 Science Tamil</th>
        <th><?php echo $necessity['science']; ?></th>
        <th><?php  echo $i; ?></th>
        <th><?php if($balance>0){ echo $balance; $c = $balance + $c; }else{echo 0;} ?></th>
        <th><?php if($balance<0){ echo $balance; $d = $balance + $d; }else{echo 0;} ?></th>
      </tr>
      <?php 
      }
      ?>

      <?php 
      $i = 0;
      if($classes['science_en']<>'0'){
        $necessity = $database -> table_by_id($classes['science_en'],'class_teacher','class');

        $current_query = $database -> school_appointed_teachers($number);
        while($current = mysqli_fetch_assoc($current_query)){
          $teacher = $database -> table_by_id($current['tc_id'],'teacher','tc_id');
          $subject = $database -> table_by_id($teacher['main_sub'],'subject','su_id');
          if($subject['sub_cat'] == 5 AND $subject['medium'] == 3){
            $i++;
          }
        }

        $a = $necessity['science'] +$a;
        $b = $i +$b;
        $balance = $i - $necessity['science'];

      ?>
      <tr>
        <th>6-11 Science English</th>
        <th><?php echo $necessity['science']; ?></th>
        <th><?php  echo $i; ?></th>
        <th><?php if($balance>0){ echo $balance; $c = $balance + $c; }else{echo 0;} ?></th>
        <th><?php if($balance<0){ echo $balance; $d = $balance + $d; }else{echo 0;} ?></th>
      </tr>
      <?php 
      }
      ?>

      <?php 
      $i = 0;
      if($classes['maths_si']<>'0'){
        $necessity = $database -> table_by_id($classes['maths_si'],'class_teacher','class');

        $current_query = $database -> school_appointed_teachers($number);
        while($current = mysqli_fetch_assoc($current_query)){
          $teacher = $database -> table_by_id($current['tc_id'],'teacher','tc_id');
          $subject = $database -> table_by_id($teacher['main_sub'],'subject','su_id');
          if($subject['sub_cat'] == 6 AND $subject['medium'] == 1){
            $i++;
          }
        }
        $a = $necessity['maths'] +$a;
        $b = $i +$b;
        $balance = $i - $necessity['maths'];

      ?>
      <tr>
        <th>6-11 Mathematics Sinhala</th>
        <th><?php echo $necessity['maths']; ?></th>
        <th><?php  echo $i; ?></th>
        <th><?php if($balance>0){ echo $balance; $c = $balance + $c; }else{echo 0;} ?></th>
        <th><?php if($balance<0){ echo $balance; $d = $balance + $d; }else{echo 0;} ?></th>
      </tr>
      <?php 
      }
      ?>

      <?php 
      $i = 0;
      if($classes['maths_tm']<>'0'){
        $necessity = $database -> table_by_id($classes['maths_tm'],'class_teacher','class');

        $current_query = $database -> school_appointed_teachers($number);
        while($current = mysqli_fetch_assoc($current_query)){
          $teacher = $database -> table_by_id($current['tc_id'],'teacher','tc_id');
          $subject = $database -> table_by_id($teacher['main_sub'],'subject','su_id');
          if($subject['sub_cat'] == 6 AND $subject['medium'] == 2){
            $i++;
          }
        }

        $a = $necessity['maths'] +$a;
        $b = $i +$b;
        $balance = $i - $necessity['maths'];

      ?>
      <tr>
        <th>6-11 Mathematics Tamil</th>
        <th><?php echo $necessity['maths']; ?></th>
        <th><?php  echo $i; ?></th>
        <th><?php if($balance>0){ echo $balance; $c = $balance + $c; }else{echo 0;} ?></th>
        <th><?php if($balance<0){ echo $balance; $d = $balance + $d; }else{echo 0;} ?></th>
      </tr>
      <?php 
      }
      ?>

      <?php 
      $i = 0;
      if($classes['maths_en']<>'0'){
        $necessity = $database -> table_by_id($classes['maths_en'],'class_teacher','class');

        $current_query = $database -> school_appointed_teachers($number);
        while($current = mysqli_fetch_assoc($current_query)){
          $teacher = $database -> table_by_id($current['tc_id'],'teacher','tc_id');
          $subject = $database -> table_by_id($teacher['main_sub'],'subject','su_id');
          if($subject['sub_cat'] == 6 AND $subject['medium'] == 3){
            $i++;
          }
        }

        $a = $necessity['maths'] +$a;
        $b = $i +$b;
        $balance = $i - $necessity['maths'];

      ?>
      <tr>
        <th>6-11 Mathematics English</th>
        <th><?php echo $necessity['maths']; ?></th>
        <th><?php  echo $i; ?></th>
        <th><?php if($balance>0){ echo $balance; $c = $balance + $c; }else{echo 0;} ?></th>
        <th><?php if($balance<0){ echo $balance; $d = $balance + $d; }else{echo 0;} ?></th>
      </tr>
      <?php 
      }
      ?>

      <?php 
      $i = 0;
      if($classes['mother_lang_si']<>'0'){
        $necessity = $database -> table_by_id($classes['mother_lang_si'],'class_teacher','class');

        $current_query = $database -> school_appointed_teachers($number);
        while($current = mysqli_fetch_assoc($current_query)){
          $teacher = $database -> table_by_id($current['tc_id'],'teacher','tc_id');
          $subject = $database -> table_by_id($teacher['main_sub'],'subject','su_id');
          if($subject['sub_cat'] == 7 AND $subject['medium'] == 1){
            $i++;
          }
        }

        $a = $necessity['mother_lang'] +$a;
        $b = $i +$b;
        $balance = $i - $necessity['mother_lang'];

      ?>
      <tr>
        <th>6-11 Mother Language Sinhala</th>
        <th><?php echo $necessity['mother_lang']; ?></th>
        <th><?php  echo $i; ?></th>
        <th><?php if($balance>0){ echo $balance; $c = $balance + $c; }else{echo 0;} ?></th>
        <th><?php if($balance<0){ echo $balance; $d = $balance + $d; }else{echo 0;} ?></th>
      </tr>
      <?php 
      }
      ?>

      <?php 
      $i = 0;
      if($classes['mother_lang_tm']<>'0'){
        $necessity = $database -> table_by_id($classes['mother_lang_tm'],'class_teacher','class');

        $current_query = $database -> school_appointed_teachers($number);
        while($current = mysqli_fetch_assoc($current_query)){
          $teacher = $database -> table_by_id($current['tc_id'],'teacher','tc_id');
          $subject = $database -> table_by_id($teacher['main_sub'],'subject','su_id');
          if($subject['sub_cat'] == 7 AND $subject['medium'] == 2){
            $i++;
          }
        }

        $a = $necessity['mother_lang'] +$a;
        $b = $i +$b;
        $balance = $i - $necessity['mother_lang'];

      ?>
      <tr>
        <th>6-11 Mother Language Tamil</th>
        <th><?php echo $necessity['mother_lang']; ?></th>
        <th><?php  echo $i; ?></th>
        <th><?php if($balance>0){ echo $balance; $c = $balance + $c; }else{echo 0;} ?></th>
        <th><?php if($balance<0){ echo $balance; $d = $balance + $d; }else{echo 0;} ?></th>
      </tr>
      <?php 
      }
      ?>

      <?php 
      $i = 0;
      if($classes['mother_lang_en']<>'0'){
        $necessity = $database -> table_by_id($classes['mother_lang_en'],'class_teacher','class');

        $current_query = $database -> school_appointed_teachers($number);
        while($current = mysqli_fetch_assoc($current_query)){
          $teacher = $database -> table_by_id($current['tc_id'],'teacher','tc_id');
          $subject = $database -> table_by_id($teacher['main_sub'],'subject','su_id');
          if($subject['sub_cat'] == 7 AND $subject['medium'] == 3){
            $i++;
          }
        }

        $a = $necessity['mother_lang'] +$a;
        $b = $i +$b;
        $balance = $i - $necessity['mother_lang'];

      ?>
      <tr>
        <th>6-11 Mother Language English</th>
        <th><?php echo $necessity['mother_lang']; ?></th>
        <th><?php  echo $i; ?></th>
        <th><?php if($balance>0){ echo $balance; $c = $balance + $c; }else{echo 0;} ?></th>
        <th><?php if($balance<0){ echo $balance; $d = $balance + $d; }else{echo 0;} ?></th>
      </tr>
      <?php 
      }
      ?>

      <?php 
      $i = 0;
      if($classes['english_ol_en']<>'0'){
        $necessity = $database -> table_by_id($classes['english_ol_en'],'class_teacher','class');

        $current_query = $database -> school_appointed_teachers($number);
        while($current = mysqli_fetch_assoc($current_query)){
          $teacher = $database -> table_by_id($current['tc_id'],'teacher','tc_id');
          $subject = $database -> table_by_id($teacher['main_sub'],'subject','su_id');
          if($subject['sub_cat'] == 8){
            $i++;
          }
        }

        $a = $necessity['english_ol'] +$a;
        $b = $i +$b;
        $balance = $i - $necessity['english_ol'];

      ?>
      <tr>
        <th>6-11 English</th>
        <th><?php echo $necessity['english_ol']; ?></th>
        <th><?php  echo $i; ?></th>
        <th><?php if($balance>0){ echo $balance; $c = $balance + $c; }else{echo 0;} ?></th>
        <th><?php if($balance<0){ echo $balance; $d = $balance + $d; }else{echo 0;} ?></th>
      </tr>
      <?php 
      }
      ?>

      <?php 
      $i = 0;
      if($classes['religion_si']<>'0'){
        $necessity = $database -> table_by_id($classes['religion_si'],'class_teacher','class');

        $current_query = $database -> school_appointed_teachers($number);
        while($current = mysqli_fetch_assoc($current_query)){
          $teacher = $database -> table_by_id($current['tc_id'],'teacher','tc_id');
          $subject = $database -> table_by_id($teacher['main_sub'],'subject','su_id');
          if($subject['sub_cat'] == 9 AND $subject['medium'] == 1){
            $i++;
          }
        }

        $a = $necessity['religion'] +$a;
        $b = $i +$b;
        $balance = $i - $necessity['religion'];

      ?>
      <tr>
        <th>6-11 Religion Sinhala</th>
        <th><?php echo $necessity['religion']; ?></th>
        <th><?php  echo $i; ?></th>
        <th><?php if($balance>0){ echo $balance; $c = $balance + $c; }else{echo 0;} ?></th>
        <th><?php if($balance<0){ echo $balance; $d = $balance + $d; }else{echo 0;} ?></th>
      </tr>
      <?php 
      }
      ?>

      <?php 
      $i = 0;
      if($classes['religion_tm']<>'0'){
        $necessity = $database -> table_by_id($classes['religion_tm'],'class_teacher','class');

        $current_query = $database -> school_appointed_teachers($number);
        while($current = mysqli_fetch_assoc($current_query)){
          $teacher = $database -> table_by_id($current['tc_id'],'teacher','tc_id');
          $subject = $database -> table_by_id($teacher['main_sub'],'subject','su_id');
          if($subject['sub_cat'] == 9 AND $subject['medium'] == 2){
            $i++;
          }
        }

        $a = $necessity['religion'] +$a;
        $b = $i +$b;
        $balance = $i - $necessity['religion'];

      ?>
      <tr>
        <th>6-11 Religion Tamil</th>
        <th><?php echo $necessity['religion']; ?></th>
        <th><?php  echo $i; ?></th>
        <th><?php if($balance>0){ echo $balance; $c = $balance + $c; }else{echo 0;} ?></th>
        <th><?php if($balance<0){ echo $balance; $d = $balance + $d; }else{echo 0;} ?></th>
      </tr>
      <?php 
      }
      ?>

      <?php 
      $i = 0;
      if($classes['religion_en']<>'0'){
        $necessity = $database -> table_by_id($classes['religion_en'],'class_teacher','class');

        $current_query = $database -> school_appointed_teachers($number);
        while($current = mysqli_fetch_assoc($current_query)){
          $teacher = $database -> table_by_id($current['tc_id'],'teacher','tc_id');
          $subject = $database -> table_by_id($teacher['main_sub'],'subject','su_id');
          if($subject['sub_cat'] == 9 AND $subject['medium'] == 3){
            $i++;
          }
        }

        $a = $necessity['religion'] +$a;
        $b = $i +$b;
        $balance = $i - $necessity['religion'];

      ?>
      <tr>
        <th>6-11 Religion English</th>
        <th><?php echo $necessity['religion']; ?></th>
        <th><?php  echo $i; ?></th>
        <th><?php if($balance>0){ echo $balance; $c = $balance + $c; }else{echo 0;} ?></th>
        <th><?php if($balance<0){ echo $balance; $d = $balance + $d; }else{echo 0;} ?></th>
      </tr>
      <?php 
      }
      ?>

      <?php 
      $i = 0;
      if($classes['history_si']<>'0'){
        $necessity = $database -> table_by_id($classes['history_si'],'class_teacher','class');

        $current_query = $database -> school_appointed_teachers($number);
        while($current = mysqli_fetch_assoc($current_query)){
          $teacher = $database -> table_by_id($current['tc_id'],'teacher','tc_id');
          $subject = $database -> table_by_id($teacher['main_sub'],'subject','su_id');
          if($subject['sub_cat'] == 10 AND $subject['medium'] == 1){
            $i++;
          }
        }

        $a = $necessity['history'] +$a;
        $b = $i +$b;
        $balance = $i - $necessity['history'];

      ?>
      <tr>
        <th>6-11 History Sinhala</th>
        <th><?php echo $necessity['history']; ?></th>
        <th><?php  echo $i; ?></th>
        <th><?php if($balance>0){ echo $balance; $c = $balance + $c; }else{echo 0;} ?></th>
        <th><?php if($balance<0){ echo $balance; $d = $balance + $d; }else{echo 0;} ?></th>
      </tr>
      <?php 
      }
      ?>

      <?php 
      $i = 0;
      if($classes['history_tm']<>'0'){
        $necessity = $database -> table_by_id($classes['history_tm'],'class_teacher','class');

        $current_query = $database -> school_appointed_teachers($number);
        while($current = mysqli_fetch_assoc($current_query)){
          $teacher = $database -> table_by_id($current['tc_id'],'teacher','tc_id');
          $subject = $database -> table_by_id($teacher['main_sub'],'subject','su_id');
          if($subject['sub_cat'] == 10 AND $subject['medium'] == 2){
            $i++;
          }
        }

        $a = $necessity['history'] +$a;
        $b = $i +$b;
        $balance = $i - $necessity['history'];

      ?>
      <tr>
        <th>6-11 History Tamil</th>
        <th><?php echo $necessity['history']; ?></th>
        <th><?php  echo $i; ?></th>
        <th><?php if($balance>0){ echo $balance; $c = $balance + $c; }else{echo 0;} ?></th>
        <th><?php if($balance<0){ echo $balance; $d = $balance + $d; }else{echo 0;} ?></th>
      </tr>
      <?php 
      }
      ?>

      <?php 
      $i = 0;
      if($classes['history_en']<>'0'){
        $necessity = $database -> table_by_id($classes['history_en'],'class_teacher','class');

        $current_query = $database -> school_appointed_teachers($number);
        while($current = mysqli_fetch_assoc($current_query)){
          $teacher = $database -> table_by_id($current['tc_id'],'teacher','tc_id');
          $subject = $database -> table_by_id($teacher['main_sub'],'subject','su_id');
          if($subject['sub_cat'] == 10 AND $subject['medium'] == 3){
            $i++;
          }
        }

        $a = $necessity['history'] +$a;
        $b = $i +$b;
        $balance = $i - $necessity['history'];

      ?>
      <tr>
        <th>6-11 History English</th>
        <th><?php echo $necessity['history']; ?></th>
        <th><?php  echo $i; ?></th>
        <th><?php if($balance>0){ echo $balance; $c = $balance + $c; }else{echo 0;} ?></th>
        <th><?php if($balance<0){ echo $balance; $d = $balance + $d; }else{echo 0;} ?></th>
      </tr>
      <?php 
      }
      ?>

      <?php 
      $i = 0;
      if($classes['first_cat_si']<>'0'){
        $necessity = $database -> table_by_id($classes['first_cat_si'],'class_teacher','class');

        $current_query = $database -> school_appointed_teachers($number);
        while($current = mysqli_fetch_assoc($current_query)){
          $teacher = $database -> table_by_id($current['tc_id'],'teacher','tc_id');
          $subject = $database -> table_by_id($teacher['main_sub'],'subject','su_id');
          if($subject['sub_cat'] == 11 AND $subject['medium'] == 1){
            $i++;
          }
        }

        $a = $necessity['first_cat'] +$a;
        $b = $i +$b;
        $balance = $i - $necessity['first_cat'];

      ?>
      <tr>
        <th>6-11 First Catagory Sinhala</th>
        <th><?php echo $necessity['first_cat']; ?></th>
        <th><?php  echo $i; ?></th>
        <th><?php if($balance>0){ echo $balance; $c = $balance + $c; }else{echo 0;} ?></th>
        <th><?php if($balance<0){ echo $balance; $d = $balance + $d; }else{echo 0;} ?></th>
      </tr>
      <?php 
      }
      ?>

      <?php 
      $i = 0;
      if($classes['first_cat_tm']<>'0'){
        $necessity = $database -> table_by_id($classes['first_cat_tm'],'class_teacher','class');

        $current_query = $database -> school_appointed_teachers($number);
        while($current = mysqli_fetch_assoc($current_query)){
          $teacher = $database -> table_by_id($current['tc_id'],'teacher','tc_id');
          $subject = $database -> table_by_id($teacher['main_sub'],'subject','su_id');
          if($subject['sub_cat'] == 11 AND $subject['medium'] == 2){
            $i++;
          }
        }

        $a = $necessity['first_cat'] +$a;
        $b = $i +$b;
        $balance = $i - $necessity['first_cat'];

      ?>
      <tr>
        <th>6-11 First Catagory Tamil</th>
        <th><?php echo $necessity['first_cat']; ?></th>
        <th><?php  echo $i; ?></th>
        <th><?php if($balance>0){ echo $balance; $c = $balance + $c; }else{echo 0;} ?></th>
        <th><?php if($balance<0){ echo $balance; $d = $balance + $d; }else{echo 0;} ?></th>
      </tr>
      <?php 
      }
      ?>

      <?php 
      $i = 0;
      if($classes['first_cat_en']<>'0'){
        $necessity = $database -> table_by_id($classes['first_cat_en'],'class_teacher','class');

        $current_query = $database -> school_appointed_teachers($number);
        while($current = mysqli_fetch_assoc($current_query)){
          $teacher = $database -> table_by_id($current['tc_id'],'teacher','tc_id');
          $subject = $database -> table_by_id($teacher['main_sub'],'subject','su_id');
          if($subject['sub_cat'] == 11 AND $subject['medium'] == 3){
            $i++;
          }
        }

        $a = $necessity['first_cat'] +$a;
        $b = $i +$b;
        $balance = $i - $necessity['first_cat'];

      ?>
      <tr>
        <th>6-11 First Catagory English</th>
        <th><?php echo $necessity['first_cat']; ?></th>
        <th><?php  echo $i; ?></th>
        <th><?php if($balance>0){ echo $balance; $c = $balance + $c; }else{echo 0;} ?></th>
        <th><?php if($balance<0){ echo $balance; $d = $balance + $d; }else{echo 0;} ?></th>
      </tr>
      <?php 
      }
      ?>

      <?php 
      $i = 0;
      if($classes['sec_cat_si']<>'0'){
        $necessity = $database -> table_by_id($classes['sec_cat_si'],'class_teacher','class');

        $current_query = $database -> school_appointed_teachers($number);
        while($current = mysqli_fetch_assoc($current_query)){
          $teacher = $database -> table_by_id($current['tc_id'],'teacher','tc_id');
          $subject = $database -> table_by_id($teacher['main_sub'],'subject','su_id');
          if($subject['sub_cat'] == 12 AND $subject['medium'] == 1){
            $i++;
          }
        }

        $a = $necessity['sec_cat'] +$a;
        $b = $i +$b;
        $balance = $i - $necessity['sec_cat'];

      ?>
      <tr>
        <th>6-11 Second Catagory Sinhala</th>
        <th><?php echo $necessity['sec_cat']; ?></th>
        <th><?php  echo $i; ?></th>
        <th><?php if($balance>0){ echo $balance; $c = $balance + $c; }else{echo 0;} ?></th>
        <th><?php if($balance<0){ echo $balance; $d = $balance + $d; }else{echo 0;} ?></th>
      </tr>
      <?php 
      }
      ?>

      <?php 
      $i = 0;
      if($classes['sec_cat_tm']<>'0'){
        $necessity = $database -> table_by_id($classes['sec_cat_tm'],'class_teacher','class');

        $current_query = $database -> school_appointed_teachers($number);
        while($current = mysqli_fetch_assoc($current_query)){
          $teacher = $database -> table_by_id($current['tc_id'],'teacher','tc_id');
          $subject = $database -> table_by_id($teacher['main_sub'],'subject','su_id');
          if($subject['sub_cat'] == 12 AND $subject['medium'] == 2){
            $i++;
          }
        }

        $a = $necessity['sec_cat'] +$a;
        $b = $i +$b;
        $balance = $i - $necessity['sec_cat'];

      ?>
      <tr>
        <th>6-11 Second Catagory Tamil</th>
        <th><?php echo $necessity['sec_cat']; ?></th>
        <th><?php  echo $i; ?></th>
        <th><?php if($balance>0){ echo $balance; $c = $balance + $c; }else{echo 0;} ?></th>
        <th><?php if($balance<0){ echo $balance; $d = $balance + $d; }else{echo 0;} ?></th>
      </tr>
      <?php 
      }
      ?>

      <?php 
      $i = 0;
      if($classes['sec_cat_en']<>'0'){
        $necessity = $database -> table_by_id($classes['sec_cat_en'],'class_teacher','class');

        $current_query = $database -> school_appointed_teachers($number);
        while($current = mysqli_fetch_assoc($current_query)){
          $teacher = $database -> table_by_id($current['tc_id'],'teacher','tc_id');
          $subject = $database -> table_by_id($teacher['main_sub'],'subject','su_id');
          if($subject['sub_cat'] == 12 AND $subject['medium'] == 3){
            $i++;
          }
        }

        $a = $necessity['sec_cat'] +$a;
        $b = $i +$b;
        $balance = $i - $necessity['sec_cat'];

      ?>
      <tr>
        <th>6-11 Second Catagory English</th>
        <th><?php echo $necessity['sec_cat']; ?></th>
        <th><?php  echo $i; ?></th>
        <th><?php if($balance>0){ echo $balance; $c = $balance + $c; }else{echo 0;} ?></th>
        <th><?php if($balance<0){ echo $balance; $d = $balance + $d; }else{echo 0;} ?></th>
      </tr>
      <?php 
      }
      ?>

      <?php 
      $i = 0;
      if($classes['third_cat_si']<>'0'){
        $necessity = $database -> table_by_id($classes['third_cat_si'],'class_teacher','class');

        $current_query = $database -> school_appointed_teachers($number);
        while($current = mysqli_fetch_assoc($current_query)){
          $teacher = $database -> table_by_id($current['tc_id'],'teacher','tc_id');
          $subject = $database -> table_by_id($teacher['main_sub'],'subject','su_id');
          if($subject['sub_cat'] == 13 AND $subject['medium'] == 1){
            $i++;
          }
        }

        $full = $classes['com_lab_tm'] + $necessity['third_cat'];

        $a = $full +$a;
        $b = $i +$b;
        $balance = $i - $full;

      ?>
      <tr>
        <th>6-11 Third Catagory(include Computer Labs) Sinhala</th>
        <th><?php echo $full; ?></th>
        <th><?php  echo $i; ?></th>
        <th><?php if($balance>0){ echo $balance; $c = $balance + $c; }else{echo 0;} ?></th>
        <th><?php if($balance<0){ echo $balance; $d = $balance + $d; }else{echo 0;} ?></th>
      </tr>
      <?php 
      }
      ?>

      <?php 
      $i = 0;
      if($classes['third_cat_tm']<>'0'){
        $necessity = $database -> table_by_id($classes['third_cat_tm'],'class_teacher','class');

        $current_query = $database -> school_appointed_teachers($number);
        while($current = mysqli_fetch_assoc($current_query)){
          $teacher = $database -> table_by_id($current['tc_id'],'teacher','tc_id');
          $subject = $database -> table_by_id($teacher['main_sub'],'subject','su_id');
          if($subject['sub_cat'] == 13 AND $subject['medium'] == 2){
            $i++;
          }
        }
        $full = $classes['com_lab_si'] + $necessity['third_cat'];
        $a = $full +$a;
        $b = $i +$b;
        $balance = $i - $full;

      ?>
      <tr>
        <th>6-11 Third Catagory(include Computer Labs) Tamil</th>
        <th><?php echo $full; ?></th>
        <th><?php  echo $i; ?></th>
        <th><?php if($balance>0){ echo $balance; $c = $balance + $c; }else{echo 0;} ?></th>
        <th><?php if($balance<0){ echo $balance; $d = $balance + $d; }else{echo 0;} ?></th>
      </tr>
      <?php 
      }
      ?>

      <?php 
      $i = 0;
      if($classes['third_cat_en']<>'0'){
        $necessity = $database -> table_by_id($classes['third_cat_en'],'class_teacher','class');

        $current_query = $database -> school_appointed_teachers($number);
        while($current = mysqli_fetch_assoc($current_query)){
          $teacher = $database -> table_by_id($current['tc_id'],'teacher','tc_id');
          $subject = $database -> table_by_id($teacher['main_sub'],'subject','su_id');
          if($subject['sub_cat'] == 13 AND $subject['medium'] == 3){
            $i++;
          }
        }

        $full = $classes['com_lab_en'] + $necessity['third_cat'];
        $a = $full +$a;
        $b = $i +$b;
        $balance = $i - $full;

      ?>
      <tr>
        <th>6-11 Third Catagory(include Computer Labs) English</th>
        <th><?php echo $full; ?></th>
        <th><?php  echo $i; ?></th>
        <th><?php if($balance>0){ echo $balance; $c = $balance + $c; }else{echo 0;} ?></th>
        <th><?php if($balance<0){ echo $balance; $d = $balance + $d; }else{echo 0;} ?></th>
      </tr>
      <?php 
      }
      ?>


      <?php 
      $i = 0;
      if($classes['git_si']<>'0'){
        $necessity = $database -> table_by_id($classes['git_si'],'class_teacher','class');

        $current_query = $database -> school_appointed_teachers($number);
        while($current = mysqli_fetch_assoc($current_query)){
          $teacher = $database -> table_by_id($current['tc_id'],'teacher','tc_id');
          $subject = $database -> table_by_id($teacher['main_sub'],'subject','su_id');
          if($subject['sub_cat'] == 15 AND $subject['medium'] == 1){
            $i++;
          }
        }

        $a = $necessity['git'] +$a;
        $b = $i +$b;
        $balance = $i - $necessity['git'];

      ?>
      <tr>
        <th>AL GIT Sinhala</th>
        <th><?php echo $necessity['git']; ?></th>
        <th><?php  echo $i; ?></th>
        <th><?php if($balance>0){ echo $balance; $c = $balance + $c; }else{echo 0;} ?></th>
        <th><?php if($balance<0){ echo $balance; $d = $balance + $d; }else{echo 0;} ?></th>
      </tr>
      <?php 
      }
      ?>

      <?php 
      $i = 0;
      if($classes['git_tm']<>'0'){
        $necessity = $database -> table_by_id($classes['git_tm'],'class_teacher','class');

        $current_query = $database -> school_appointed_teachers($number);
        while($current = mysqli_fetch_assoc($current_query)){
          $teacher = $database -> table_by_id($current['tc_id'],'teacher','tc_id');
          $subject = $database -> table_by_id($teacher['main_sub'],'subject','su_id');
          if($subject['sub_cat'] == 15 AND $subject['medium'] == 2){
            $i++;
          }
        }

        $a = $necessity['git'] +$a;
        $b = $i +$b;
        $balance = $i - $necessity['git'];

      ?>
      <tr>
        <th>AL GIT Tamil</th>
        <th><?php echo $necessity['git']; ?></th>
        <th><?php  echo $i; ?></th>
        <th><?php if($balance>0){ echo $balance; $c = $balance + $c; }else{echo 0;} ?></th>
        <th><?php if($balance<0){ echo $balance; $d = $balance + $d; }else{echo 0;} ?></th>
      </tr>
      <?php 
      }
      ?>

      <?php 
      $i = 0;
      if($classes['git_en']<>'0'){
        $necessity = $database -> table_by_id($classes['git_en'],'class_teacher','class');

        $current_query = $database -> school_appointed_teachers($number);
        while($current = mysqli_fetch_assoc($current_query)){
          $teacher = $database -> table_by_id($current['tc_id'],'teacher','tc_id');
          $subject = $database -> table_by_id($teacher['main_sub'],'subject','su_id');
          if($subject['sub_cat'] == 15 AND $subject['medium'] == 3){
            $i++;
          }
        }

        $a = $necessity['git'] +$a;
        $b = $i +$b;
        $balance = $i - $necessity['git'];

      ?>
      <tr>
        <th>AL GIT English</th>
        <th><?php echo $necessity['git']; ?></th>
        <th><?php  echo $i; ?></th>
        <th><?php if($balance>0){ echo $balance; $c = $balance + $c; }else{echo 0;} ?></th>
        <th><?php if($balance<0){ echo $balance; $d = $balance + $d; }else{echo 0;} ?></th>
      </tr>
      <?php 
      }
      ?>

      <?php 
      $i = 0;
      if($classes['english_al']<>'0'){
        $necessity = $database -> table_by_id($classes['english_al'],'class_teacher','class');

        $current_query = $database -> school_appointed_teachers($number);
        while($current = mysqli_fetch_assoc($current_query)){
          $teacher = $database -> table_by_id($current['tc_id'],'teacher','tc_id');
          $subject = $database -> table_by_id($teacher['main_sub'],'subject','su_id');
          if($subject['sub_cat'] == 16 AND $subject['medium'] == 3){
            $i++;
          }
        }

        $a = $necessity['english_al'] +$a;
        $b = $i +$b;
        $balance = $i - $necessity['english_al'];

      ?>
      <tr>
        <th>AL English</th>
        <th><?php echo $necessity['english_al']; ?></th>
        <th><?php  echo $i; ?></th>
        <th><?php if($balance>0){ echo $balance; $c = $balance + $c; }else{echo 0;} ?></th>
        <th><?php if($balance<0){ echo $balance; $d = $balance + $d; }else{echo 0;} ?></th>
      </tr>
      <?php 
      }
      ?>

      <?php 
      $i = 0;
      if($classes['al_sci_si']<>'0'){
        $necessity = $database -> table_by_id($classes['al_sci_si'],'class_teacher','class');

        $current_query = $database -> school_appointed_teachers($number);
        while($current = mysqli_fetch_assoc($current_query)){
          $teacher = $database -> table_by_id($current['tc_id'],'teacher','tc_id');
          $subject = $database -> table_by_id($teacher['main_sub'],'subject','su_id');
          if($subject['sub_cat'] == 17 AND $subject['medium'] == 1){
            $i++;
          }
        }

        $a = $necessity['al_sci_many'] +$a;
        $b = $i +$b;
        $balance = $i - $necessity['al_sci_many'];

      ?>
      <tr>
        <th>AL Science Sinhala</th>
        <th><?php echo $necessity['al_sci_many']; ?></th>
        <th><?php  echo $i; ?></th>
        <th><?php if($balance>0){ echo $balance; $c = $balance + $c; }else{echo 0;} ?></th>
        <th><?php if($balance<0){ echo $balance; $d = $balance + $d; }else{echo 0;} ?></th>
      </tr>
      <?php 
      }
      ?>

      <?php 
      $i = 0;
      if($classes['al_sci_tm']<>'0'){
        $necessity = $database -> table_by_id($classes['al_sci_tm'],'class_teacher','class');

        $current_query = $database -> school_appointed_teachers($number);
        while($current = mysqli_fetch_assoc($current_query)){
          $teacher = $database -> table_by_id($current['tc_id'],'teacher','tc_id');
          $subject = $database -> table_by_id($teacher['main_sub'],'subject','su_id');
          if($subject['sub_cat'] == 17 AND $subject['medium'] == 2){
            $i++;
          }
        }

        $a = $necessity['al_sci_many'] +$a;
        $b = $i +$b;
        $balance = $i - $necessity['al_sci_many'];

      ?>
      <tr>
        <th>AL Science Tamil</th>
        <th><?php echo $necessity['al_sci_many']; ?></th>
        <th><?php  echo $i; ?></th>
        <th><?php if($balance>0){ echo $balance; $c = $balance + $c; }else{echo 0;} ?></th>
        <th><?php if($balance<0){ echo $balance; $d = $balance + $d; }else{echo 0;} ?></th>
      </tr>
      <?php 
      }
      ?>

      <?php 
      $i = 0;
      if($classes['al_sci_en']<>'0'){
        $necessity = $database -> table_by_id($classes['al_sci_en'],'class_teacher','class');

        $current_query = $database -> school_appointed_teachers($number);
        while($current = mysqli_fetch_assoc($current_query)){
          $teacher = $database -> table_by_id($current['tc_id'],'teacher','tc_id');
          $subject = $database -> table_by_id($teacher['main_sub'],'subject','su_id');
          if($subject['sub_cat'] == 17 AND $subject['medium'] == 3){
            $i++;
          }
        }

        $a = $necessity['al_sci_many'] +$a;
        $b = $i +$b;
        $balance = $i - $necessity['al_sci_many'];

      ?>
      <tr>
        <th>AL Science English</th>
        <th><?php echo $necessity['al_sci_many']; ?></th>
        <th><?php  echo $i; ?></th>
        <th><?php if($balance>0){ echo $balance; $c = $balance + $c; }else{echo 0;} ?></th>
        <th><?php if($balance<0){ echo $balance; $d = $balance + $d; }else{echo 0;} ?></th>
      </tr>
      <?php 
      }
      ?>

      <?php 
      $i = 0;
      if($classes['al_tec_si']<>'0'){
        $necessity = $database -> table_by_id($classes['al_tec_si'],'class_teacher','class');

        $current_query = $database -> school_appointed_teachers($number);
        while($current = mysqli_fetch_assoc($current_query)){
          $teacher = $database -> table_by_id($current['tc_id'],'teacher','tc_id');
          $subject = $database -> table_by_id($teacher['main_sub'],'subject','su_id');
          if($subject['sub_cat'] == 18 AND $subject['medium'] == 1){
            $i++;
          }
        }

        $a = $necessity['al_tec_many'] +$a;
        $b = $i +$b;
        $balance = $i - $necessity['al_tec_many'];

      ?>
      <tr>
        <th>AL Technology Sinhala</th>
        <th><?php echo $necessity['al_tec_many']; ?></th>
        <th><?php  echo $i; ?></th>
        <th><?php if($balance>0){ echo $balance; $c = $balance + $c; }else{echo 0;} ?></th>
        <th><?php if($balance<0){ echo $balance; $d = $balance + $d; }else{echo 0;} ?></th>
      </tr>
      <?php 
      }
      ?>

      <?php 
      $i = 0;
      if($classes['al_tec_tm']<>'0'){
        $necessity = $database -> table_by_id($classes['al_tec_tm'],'class_teacher','class');

        $current_query = $database -> school_appointed_teachers($number);
        while($current = mysqli_fetch_assoc($current_query)){
          $teacher = $database -> table_by_id($current['tc_id'],'teacher','tc_id');
          $subject = $database -> table_by_id($teacher['main_sub'],'subject','su_id');
          if($subject['sub_cat'] == 18 AND $subject['medium'] == 2){
            $i++;
          }
        }

        $a = $necessity['al_tec_many'] +$a;
        $b = $i +$b;
        $balance = $i - $necessity['al_tec_many'];

      ?>
      <tr>
        <th>AL Technology Tamil</th>
        <th><?php echo $necessity['al_tec_many']; ?></th>
        <th><?php  echo $i; ?></th>
        <th><?php if($balance>0){ echo $balance; $c = $balance + $c; }else{echo 0;} ?></th>
        <th><?php if($balance<0){ echo $balance; $d = $balance + $d; }else{echo 0;} ?></th>
      </tr>
      <?php 
      }
      ?>

      <?php 
      $i = 0;
      if($classes['al_tec_en']<>'0'){
        $necessity = $database -> table_by_id($classes['al_tec_en'],'class_teacher','class');

        $current_query = $database -> school_appointed_teachers($number);
        while($current = mysqli_fetch_assoc($current_query)){
          $teacher = $database -> table_by_id($current['tc_id'],'teacher','tc_id');
          $subject = $database -> table_by_id($teacher['main_sub'],'subject','su_id');
          if($subject['sub_cat'] == 18 AND $subject['medium'] == 3){
            $i++;
          }
        }

        $a = $necessity['al_tec_many'] +$a;
        $b = $i +$b;
        $balance = $i - $necessity['al_tec_many'];

      ?>
      <tr>
        <th>AL Technology English</th>
        <th><?php echo $necessity['al_tec_many']; ?></th>
        <th><?php  echo $i; ?></th>
        <th><?php if($balance>0){ echo $balance; $c = $balance + $c; }else{echo 0;} ?></th>
        <th><?php if($balance<0){ echo $balance; $d = $balance + $d; }else{echo 0;} ?></th>
      </tr>
      <?php 
      }
      ?>

      <?php 
      $i = 0;
      if($classes['al_art_si']<>'0'){
        $necessity = $database -> table_by_id($classes['al_art_si'],'class_teacher','class');

        $current_query = $database -> school_appointed_teachers($number);
        while($current = mysqli_fetch_assoc($current_query)){
          $teacher = $database -> table_by_id($current['tc_id'],'teacher','tc_id');
          $subject = $database -> table_by_id($teacher['main_sub'],'subject','su_id');
          if($subject['sub_cat'] == 19 AND $subject['medium'] == 1){
            $i++;
          }
        }
        $a = $necessity['al_ca_many'] +$a;
        $b = $i +$b;
        $balance = $i - $necessity['al_ca_many'];

      ?>
      <tr>
        <th>AL Art/Commerce Sinhala</th>
        <th><?php echo $necessity['al_ca_many']; ?></th>
        <th><?php  echo $i; ?></th>
        <th><?php if($balance>0){ echo $balance; $c = $balance + $c; }else{echo 0;} ?></th>
        <th><?php if($balance<0){ echo $balance; $d = $balance + $d; }else{echo 0;} ?></th>
      </tr>
      <?php 
      }
      ?>

      <?php 
      $i = 0;
      if($classes['al_art_tm']<>'0'){
        $necessity = $database -> table_by_id($classes['al_art_tm'],'class_teacher','class');

        $current_query = $database -> school_appointed_teachers($number);
        while($current = mysqli_fetch_assoc($current_query)){
          $teacher = $database -> table_by_id($current['tc_id'],'teacher','tc_id');
          $subject = $database -> table_by_id($teacher['main_sub'],'subject','su_id');
          if($subject['sub_cat'] == 19 AND $subject['medium'] == 2){
            $i++;
          }
        }

        $a = $necessity['al_ca_many'] +$a;
        $b = $i +$b;
        $balance = $i - $necessity['al_ca_many'];

      ?>
      <tr>
        <th>AL Art/Commerce Tamil</th>
        <th><?php echo $necessity['al_ca_many']; ?></th>
        <th><?php  echo $i; ?></th>
        <th><?php if($balance>0){ echo $balance; $c = $balance + $c; }else{echo 0;} ?></th>
        <th><?php if($balance<0){ echo $balance; $d = $balance + $d; }else{echo 0;} ?></th>
      </tr>
      <?php 
      }
      ?>

      <?php 
      $i = 0;
      if($classes['al_art_en']<>'0'){
        $necessity = $database -> table_by_id($classes['al_art_en'],'class_teacher','class');

        $current_query = $database -> school_appointed_teachers($number);
        while($current = mysqli_fetch_assoc($current_query)){
          $teacher = $database -> table_by_id($current['tc_id'],'teacher','tc_id');
          $subject = $database -> table_by_id($teacher['main_sub'],'subject','su_id');
          if($subject['sub_cat'] == 19 AND $subject['medium'] == 3){
            $i++;
          }
        }

        $a = $necessity['al_ca_many'] +$a;
        $b = $i +$b;
        $balance = $i - $necessity['al_ca_many'];

      ?>
      <tr>
        <th>AL Art/Commerce English</th>
        <th><?php echo $necessity['al_ca_many']; ?></th>
        <th><?php  echo $i; ?></th>
        <th><?php if($balance>0){ echo $balance; $c = $balance + $c; }else{echo 0;} ?></th>
        <th><?php if($balance<0){ echo $balance; $d = $balance + $d; }else{echo 0;} ?></th>
      </tr>
      <?php 
      }
      ?>

      <?php 
      $i = 0;
      if($classes['al_sci_si']<>'0' OR $classes['al_tec_si']<>'0' OR $classes['al_art_si']<>'0'){
        $full = 0;
        if($classes['al_sci_si']>10){
          $j = intval(($classes['al_sci_si']-10)/4);
          $full = $j + $full;
        }
        if($classes['al_tec_si']>10){
          $j = intval(($classes['al_tec_si']-10)/4);
          $full = $j + $full;
        }
        if($classes['al_art_si']>10){
          $j = intval(($classes['al_art_si']-10)/4);
          $full = $j + $full;
        }

        $current_query = $database -> school_appointed_teachers($number);
        while($current = mysqli_fetch_assoc($current_query)){
          $teacher = $database -> table_by_id($current['tc_id'],'teacher','tc_id');
          $subject = $database -> table_by_id($teacher['main_sub'],'subject','su_id');
          if($subject['sub_cat'] == 20 AND $subject['medium'] == 1){
            $i++;
          }
        }

        $a = $full +$a;
        $b = $i +$b;
        $balance = $i - $full;

      ?>
      <tr>
        <th>AL Suplimentry Sinhala</th>
        <th><?php echo $full; ?></th>
        <th><?php  echo $i; ?></th>
        <th><?php if($balance>0){ echo $balance; $c = $balance + $c; }else{echo 0;} ?></th>
        <th><?php if($balance<0){ echo $balance; $d = $balance + $d; }else{echo 0;} ?></th>
      </tr>
      <?php 
      }
      ?>

      <?php 
      $i = 0;
      if($classes['al_sci_tm']<>'0' OR $classes['al_tec_tm']<>'0' OR $classes['al_art_tm']<>'0'){
        $full = 0;
        if($classes['al_sci_tm']>10){
          $j = intval(($classes['al_sci_tm']-10)/4);
          $full = $j + $full;
        }
        if($classes['al_tec_tm']>10){
          $j = intval(($classes['al_tec_tm']-10)/4);
          $full = $j + $full;
        }
        if($classes['al_art_tm']>10){
          $j = intval(($classes['al_art_tm']-10)/4);
          $full = $j + $full;
        }

        $current_query = $database -> school_appointed_teachers($number);
        while($current = mysqli_fetch_assoc($current_query)){
          $teacher = $database -> table_by_id($current['tc_id'],'teacher','tc_id');
          $subject = $database -> table_by_id($teacher['main_sub'],'subject','su_id');
          if($subject['sub_cat'] == 20 AND $subject['medium'] == 2){
            $i++;
          }
        }

        $a = $full +$a;
        $b = $i +$b;
        $balance = $i - $full;

      ?>
      <tr>
        <th>AL Suplimentry Tamil</th>
        <th><?php echo $full; ?></th>
        <th><?php  echo $i; ?></th>
        <th><?php if($balance>0){ echo $balance; $c = $balance + $c; }else{echo 0;} ?></th>
        <th><?php if($balance<0){ echo $balance; $d = $balance + $d; }else{echo 0;} ?></th>
      </tr>
      <?php 
      }
      ?>

      <?php 
      $i = 0;
      if($classes['al_sci_en']<>'0' OR $classes['al_tec_en']<>'0' OR $classes['al_art_en']<>'0'){
        $full = 0;
        if($classes['al_sci_en']>10){
          $j = intval(($classes['al_sci_en']-10)/4);
          $full = $j + $full;
        }
        if($classes['al_tec_en']>10){
          $j = intval(($classes['al_tec_en']-10)/4);
          $full = $j + $full;
        }
        if($classes['al_art_en']>10){
          $j = intval(($classes['al_art_en']-10)/4);
          $full = $j + $full;
        }

        $current_query = $database -> school_appointed_teachers($number);
        while($current = mysqli_fetch_assoc($current_query)){
          $teacher = $database -> table_by_id($current['tc_id'],'teacher','tc_id');
          $subject = $database -> table_by_id($teacher['main_sub'],'subject','su_id');
          if($subject['sub_cat'] == 20 AND $subject['medium'] == 3){
            $i++;
          }
        }

        $a = $full +$a;
        $b = $i +$b;
        $balance = $i - $full;

      ?>
      <tr>
        <th>AL Suplimentry English</th>
        <th><?php echo $full; ?></th>
        <th><?php  echo $i; ?></th>
        <th><?php if($balance>0){ echo $balance; $c = $balance + $c; }else{echo 0;} ?></th>
        <th><?php if($balance<0){ echo $balance; $d = $balance + $d; }else{echo 0;} ?></th>
      </tr>
      <?php 
      }
      ?>

      <?php 
      $i = 0;
      if($classes['sp_need']<>'0'){

        $full = intval(($classes['sp_need'])/5);

        $current_query = $database -> school_appointed_teachers($number);
        while($current = mysqli_fetch_assoc($current_query)){
          $teacher = $database -> table_by_id($current['tc_id'],'teacher','tc_id');
          $subject = $database -> table_by_id($teacher['main_sub'],'subject','su_id');
          if($subject['sub_cat'] == 22){
            $i++;
          }
        }

        $a = $full +$a;
        $b = $i +$b;
        $balance = $i - $full;

      ?>
      <tr>
        <th>Special Education</th>
        <th><?php echo $full; ?></th>
        <th><?php  echo $i; ?></th>
        <th><?php if($balance>0){ echo $balance; $c = $balance + $c; }else{echo 0;} ?></th>
        <th><?php if($balance<0){ echo $balance; $d = $balance + $d; }else{echo 0;} ?></th>
      </tr>
      <?php 
      }
      ?>

      <?php 
      $i = 0;
      if($classes['students']<>'0' AND $classes['lib']<>'0'){
        $full = 0;
        if($classes['students']>499){
          $full = 1;
        }

        $current_query = $database -> school_appointed_teachers($number);
        while($current = mysqli_fetch_assoc($current_query)){
          $teacher = $database -> table_by_id($current['tc_id'],'teacher','tc_id');
          $subject = $database -> table_by_id($teacher['main_sub'],'subject','su_id');
          if($subject['sub_cat'] == 24){
            $i++;
          }
        }

        $a = $full +$a;
        $b = $i +$b;
        $balance = $i - $full;

      ?>
      <tr>
        <th>Library</th>
        <th><?php echo $full; ?></th>
        <th><?php  echo $i; ?></th>
        <th><?php if($balance>0){ echo $balance; $c = $balance + $c; }else{echo 0;} ?></th>
        <th><?php if($balance<0){ echo $balance; $d = $balance + $d; }else{echo 0;} ?></th>
      </tr>
      <?php 
      }
      ?>

      <?php 
      $i = 0;
      if($classes['students']<>'0'){
        $full = 0;
        if($classes['students']>299){
          $full = 1;
        }

        $current_query = $database -> school_appointed_teachers($number);
        while($current = mysqli_fetch_assoc($current_query)){
          $teacher = $database -> table_by_id($current['tc_id'],'teacher','tc_id');
          $subject = $database -> table_by_id($teacher['main_sub'],'subject','su_id');
          if($subject['sub_cat'] == 23){
            $i++;
          }
        }

        $a = $full +$a;
        $b = $i +$b;
        $balance = $i - $full;

      ?>
      <tr>
        <th>Counselling</th>
        <th><?php echo $full; ?></th>
        <th><?php  echo $i; ?></th>
        <th><?php if($balance>0){ echo $balance; $c = $balance + $c; }else{echo 0;} ?></th>
        <th><?php if($balance<0){ echo $balance; $d = $balance + $d; }else{echo 0;} ?></th>
      </tr>
      <?php 
      }
      ?>

      <?php 
      $i = 0;
      if($classes['olstu']<>'0' AND $classes['students']<>'0'){
        $full = 0;
        if($classes['olstu']<201){
          $full = 0;
        }
        elseif($classes['olstu']<301){
          $full = 1;
        }
        elseif($classes['olstu']<481){
          $full = 2;
        }
        elseif($classes['olstu']<721){
          $full = 3;
        }
        elseif($classes['olstu']<1441){
          $full = 4;
        }
        elseif($classes['olstu']<1941){
          $full = 5;
        }
        if($classes['olstu']>1940){
          $j = $classes['olstu']-1940;
          $max = intval(($j)/500);
          $full = 5 + $max;
        }



        $current_query = $database -> school_appointed_teachers($number);
        while($current = mysqli_fetch_assoc($current_query)){
          $teacher = $database -> table_by_id($current['tc_id'],'teacher','tc_id');
          $subject = $database -> table_by_id($teacher['main_sub'],'subject','su_id');
          if($subject['sub_cat'] == 14){
            $i++;
          }
        }

        $a = $full +$a;
        $b = $i +$b;
        $balance = $i - $full;

      ?>
      <tr>
        <th>OL Supervision</th>
        <th><?php echo $full; ?></th>
        <th><?php  echo $i; ?></th>
        <th><?php if($balance>0){ echo $balance; $c = $balance + $c; }else{echo 0;} ?></th>
        <th><?php if($balance<0){ echo $balance; $d = $balance + $d; }else{echo 0;} ?></th>
      </tr>
      <?php 
      }
      ?>

      <?php 
      $i = 0;
      if($classes['alstu']<>'0' AND $classes['students']<>'0'){


        $full = 0;
        if($classes['alstu']<101){
          $full = 0;
        }
        elseif($classes['alstu']<211){
          $full = 1;
        }
        elseif($classes['alstu']<481){
          $full = 1;
        }
        elseif($classes['alstu']<961){
          $full = 2;
        }
        elseif($classes['alstu']>960){
          $full = 2;
        }
        



        $current_query = $database -> school_appointed_teachers($number);
        while($current = mysqli_fetch_assoc($current_query)){
          $teacher = $database -> table_by_id($current['tc_id'],'teacher','tc_id');
          $subject = $database -> table_by_id($teacher['main_sub'],'subject','su_id');
          if($subject['sub_cat'] == 21){
            $i++;
          }
        }

        $a = $full +$a;
        $b = $i +$b;
        $balance = $i - $full;

      ?>
      <tr>
        <th>AL Supervision</th>
        <th><?php echo $full; ?></th>
        <th><?php  echo $i; ?></th>
        <th><?php if($balance>0){ echo $balance; $c = $balance + $c; }else{echo 0;} ?></th>
        <th><?php if($balance<0){ echo $balance; $d = $balance + $d; }else{echo 0;} ?></th>
      </tr>
      <?php 
      }
      ?>

      <?php 
      $i = 0;
      if($classes['min_reli']<>'0'){


        $full = 0;
        if($classes['min_reli']>240){
          $full = 1;
        }
        elseif($classes['min_reli']>480){
          $full = 2;
        }
        
        $a = $full +$a;

      ?>
      <tr>
        <th>Religious Minorities</th>
        <th><?php echo $full; ?></th>
        <th><?php  echo "-"; ?></th>
        <th><?php echo "-"; ?></th>
        <th><?php echo "-"; ?></th>
      </tr>
      <?php 
      }
      ?>

      <?php 
      $i = 0;
      if($classes['pristu']<>'0' OR $classes['olstu']<>'0' OR $classes['alstu']<>'0'){


        $full = 0;
        if($classes['pristu']>=500 AND $classes['olstu']>=200){
          $full = 2;
        }
        if($classes['olstu']>=500 AND $classes['alstu']>=100){
          $full = 2;
        }
        if($classes['pristu']>=500 AND $classes['olstu']>=500 AND $classes['alstu']>=100){
          $full = 4;
        }
        $a = $full +$a;

      ?>
      <tr>
        <th>Assistant Principal</th>
        <th><?php echo $full; ?></th>
        <th><?php  echo "-"; ?></th>
        <th><?php echo "-"; ?></th>
        <th><?php echo "-"; ?></th>
      </tr>
      <?php 
      }
      ?>
      <?php 
      $i = 0;
      if($classes['pristu']<>'0' OR $classes['olstu']<>'0' OR $classes['alstu']<>'0' OR $classes['students']<>'0'){


        $full = 0;
        if($classes['students']>=400){
          $full = 1;
        }
        if($classes['olstu']>=800 AND $classes['alstu']>=150 AND $classes['students']>=1500){
          $full = 2;
        }
        if($classes['pristu']>=500 AND $classes['olstu']>=500 AND $classes['alstu']>=300 AND $classes['students']>=2000){
          $full = 3;
        }
        $a = $full +$a;

      ?>
      <tr>
        <th>Deputy Principal</th>
        <th><?php echo $full; ?></th>
        <th><?php  echo "-"; ?></th>
        <th><?php echo "-"; ?></th>
        <th><?php echo "-"; ?></th>
      </tr>
      <?php 
      }
      ?>

      <tr>
        <th>Total</th>
        <th><?php echo $a; ?></th>
        <th><?php  echo $b; ?></th>
        <th><?php echo $c; ?></th>
        <th><?php echo $d; ?></th>
      </tr>
      </table>

      
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

  

<script >
google.load("visualization", "1", {packages:["corechart"]});
google.setOnLoadCallback(drawChart1);
function drawChart1() {
  var data = google.visualization.arrayToDataTable([
    ['SUMMARY', 'Amount'],
    ['Neccesity', <?php $database -> display_message($graph_detail1); ?>],
    ['Appointed', <?php $database -> display_message($graph_detail2); ?>],
    ['Excess', <?php $database -> display_message($graph_detail3); ?>],
    ['Deficient', <?php $database -> display_message($graph_detail4); ?>]
  ]);

  var options = {
    title: 'Teachers Summary(Amount)',
    hAxis: {title: 'Teachers Summary', titleTextStyle: {color: 'black'}}
 };

var chart = new google.visualization.ColumnChart(document.getElementById('chart_div1'));
  chart.draw(data, options);
}


$(window).resize(function(){
  drawChart1();
});

</script>
