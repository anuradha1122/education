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
        </table>
      </div>
  </div>
  <div class="row">
    <div class="col-md-12 text-center">
      <h3>TEACHER SUMMARY</h3>
    </div>
  </div> 
  <div class="row">
    <div class="col-sm-4 col-sm-offset-2" style="padding-top: 50px;">
      <table class="table table-hover">
      <?php 
        $school_subject = $database -> table_by_id($school['sc_id'],'school_subject','sc_id');
        if($school_subject <> NULL ) {
          $count = 1;
          $total_teacher = 0;
          while($count < 290) {
            $class        = $school_subject[$count];
            $subject      = $database -> table_by_id($count,'subject','su_id');
            $catagory     = $database -> table_by_id($subject['sub_cat'],'subject_catagory','sc_id');
            $class_amount = $database -> table_by_id($class,'class_teacher','ct_id');
            $total_teacher = $total_teacher + $class_amount[$catagory['value']];
            $count++;
          }
          ?>
          <tr>
            <td id="tableField">
              Teacher Neccesity
            </td>
            <td id="tableBox">
              <?php $database -> display_message($total_teacher); ?>
              <?php $graph_detail1 = $total_teacher; ?>
            </td>
          </tr>
          <?php
          $appoint_query = $database -> school_appointed_teachers($number);
          if(mysqli_num_rows($appoint_query) > 0){
            $appointed = 0;
            while($appoint = mysqli_fetch_assoc($appoint_query)){
                $appointed++;
            }
          }
          ?>
          <tr>
            <td id="tableField">
              Teacher Appointed
            </td>
            <td id="tableBox">
              <?php $database -> display_message($appointed); ?>
              <?php $graph_detail2 = $appointed; ?>
            </td>
          </tr>

          <?php
          $count = 1;
          $subject_nes = array();
          $total_teacher = 0;
          $excess = $deficient =0;
          while($count < 290) {
            $class        = $school_subject[$count];
            $subject      = $database -> table_by_id($count,'subject','su_id');
            $catagory     = $database -> table_by_id($subject['sub_cat'],'subject_catagory','sc_id');
            $class_amount = $database -> table_by_id($class,'class_teacher','ct_id');
            $neccesity = $class_amount[$catagory['value']];
            if($neccesity =="") {
              $neccesity = 0;
            }

            $appoint_query = $database -> school_appointed_teachers($number);
            if(mysqli_num_rows($appoint_query) > 0){
              $appoint_teacher = 0;
              while($appoint = mysqli_fetch_assoc($appoint_query)){
                  $teacher      = $database -> table_by_id($appoint['tc_id'],'teacher','tc_id');
                  if($teacher['main_sub'] == $count){
                    $appoint_teacher++;
                  }
              }
            }
            $unbalance = $neccesity - $appoint_teacher;
            if($unbalance <0) {
              $excess++;
            }elseif ($unbalance>0) {
              $deficient++;
            }
            
            $count++;
          }
          ?>
          <tr>
            <td id="tableField">
              Teacher Excess
            </td>
            <td id="tableBox">
              <?php $database -> display_message($excess); ?>
              <?php $graph_detail3 = $excess; ?>
            </td>
          </tr>
          <tr>
            <td id="tableField">
              Teacher Deficient
            </td>
            <td id="tableBox">
              <?php $database -> display_message($deficient); ?>
              <?php $graph_detail4 = $deficient; ?>
            </td>
          </tr>
          <?php
          
        }else{
          $database -> display_message("Teachers Are Not Allocated");
        }
      ?>
    </table>
    </div>
    <div class="col-sm-4">
      <div class="well" id="chart_div1" class="chart"></div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12 text-center">
      <h3>TEACHER ALLOCATION FOR SUBJECTS</h3>
    </div>
  </div> 
  <div class="row">
    <div class="col-sm-8 col-sm-offset-2 col-xs-offset-0 table-responsive justify-content-center">
      <table class="table table-hover">
      
      <?php
        $school_subject = $database -> table_by_id($school['sc_id'],'school_subject','sc_id');
        if($school_subject <> NULL ) { 
          ?>
          <tr>
          <th id="tableSubject">
            SUBJECT
          </th>
          <th id="tableNecessity">
            NECESSITY
          </th>
          <th id="tableAppointed">
            APPOINTED
          </th>
          <th id="tableTeaching">
            TEACHING
          </th>
          <th id="tableExcess">
            EXCESS
          </th>
          <th id="tableDeficient">
            DEFICIENT
          </th>
        </tr>
          <?php
          $count = 1;
          $total_teacher = 0;
          $excess = $deficient =0;
          while($count < 290) {
            $class        = $school_subject[$count];
            $subject      = $database -> table_by_id($count,'subject','su_id');
            if($class <> 0) {
            ?>
            <tr>
              <td id="tableSubject"><a href='schoolsubjectinsight.php?sub_id=<?php $database -> display_message($count.",".$school['school_no']); ?>'>
                <?php $database -> display_message($subject['name']); ?></a>
              </td>
            <?php
            }
            $catagory     = $database -> table_by_id($subject['sub_cat'],'subject_catagory','sc_id');
            $class_amount = $database -> table_by_id($class,'class_teacher','ct_id');
            $neccesity = $class_amount[$catagory['value']];
            if($neccesity =="") {
              $neccesity = 0;
            }
            if($class <> 0) {
            ?>
              <td id="tableNecessity">
                <?php $database -> display_message($neccesity); ?>
              </td>
            <?php
            }
            $appoint_query = $database -> school_appointed_teachers($number);
            if(mysqli_num_rows($appoint_query) > 0){
              $appoint_teacher = 0;
              while($appoint = mysqli_fetch_assoc($appoint_query)){
                  $teacher      = $database -> table_by_id($appoint['tc_id'],'teacher','tc_id');
                  if($teacher['main_sub'] == $count){
                    $appoint_teacher++;
                  }
              }
            }
            if($class <> 0) {
            ?>
              <td id="tableAppointed">
                <?php $database -> display_message($appoint_teacher); ?>
              </td>
            <?php
            }

            $appoint_query = $database -> school_appointed_teachers($number);
            if(mysqli_num_rows($appoint_query) > 0){
              $teach_teacher = 0;
              while($appoint = mysqli_fetch_assoc($appoint_query)){
                  $teacher      = $database -> table_by_id($appoint['tc_id'],'teacher','tc_id');
                  if($teacher['sec_sub'] == $count OR $teacher['third_sub'] == $count OR $teacher['forth_sub'] == $count OR $teacher['fifth_sub'] == $count){
                    $teach_teacher++;
                  }
              }
            }
            if($class <> 0) {
              ?>
                <td id="tableTeaching">
                  <?php $database -> display_message($teach_teacher); ?>
                </td>
              <?php
              }
              $excess = 0;
              $deficient = 0;
              $unbalance = $neccesity - $appoint_teacher;
              if($unbalance <0) {
                $excess = $unbalance;
              }elseif ($unbalance>0) {
                $deficient = $unbalance;
              }
              if($class <> 0) {
              ?>
              <td id="tableExcess">
                <?php $database -> display_message(abs($excess)); ?>
              </td>
              <td id="tableDeficient">
                <?php $database -> display_message($deficient); ?>
              </td>
              </tr>
              <?php
            }
            $count++;
            ?>
            <?php
          }
          
        }else{
          $database -> display_message("Teachers Are Not Allocated");
        }
      ?>
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
