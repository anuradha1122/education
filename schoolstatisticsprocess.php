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

$number_err ="";

?>

<div class="container-fluid">
  <div class="row">
    <div class="col-md-12 text-center">
      <h3>

        <?php 
        if(isset($_POST['number']) AND $_POST['number'] !="" AND isset($_POST['ethnicity'])){
          $database -> display_message("ETHNICITY STATISTICS");
        }
        elseif(isset($_POST['number']) AND $_POST['number'] !="" AND isset($_POST['authority'])){
          $database -> display_message("AUTHORITY STATISTICS");
        } 
        elseif(isset($_POST['number']) AND $_POST['number'] !="" AND isset($_POST['language'])){
          $database -> display_message("LANGUAGE STATISTICS");
        }
        elseif(isset($_POST['number']) AND $_POST['number'] !="" AND isset($_POST['class'])){
          $database -> display_message("CLASS STATISTICS");
        }
        elseif(isset($_POST['number']) AND $_POST['number'] !="" AND isset($_POST['density'])){
          $database -> display_message("DENCITY STATISTICS");
        }
        elseif(isset($_POST['number']) AND $_POST['number'] !="" AND isset($_POST['gender'])){
          $database -> display_message("GENDER STATISTICS");
        }
        elseif(isset($_POST['number']) AND $_POST['number'] !="" AND isset($_POST['facility'])){
          $database -> display_message("FACILITY STATISTICS");
        }
        else{
          $database -> headerto('schoolstatistics.php');
        }

        ?>

      </h3>
    </div>
    <div class="col-md-12 text-center">
    
      <?php 
        $office = $database -> table_by_id($_POST['number'],'education_office','name');
        echo $office['name'];
        echo " (".$office['office_no'].")";
      ?>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-4 col-sm-offset-4 col-xs-offset-0 justify-content-center">
      <?php
      if($_SERVER["REQUEST_METHOD"] == "POST"){

          $number = $_POST['number'];
          $office = $database -> table_by_id($number,'education_office','name');
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

          if($type == "division" AND isset($_POST['ethnicity'])){
            $sinhala = $tamil = $muslim = 0;
            $div_id = $office['eo_id'];

            $school_query = $database -> table_search_by_element($div_id,'school','edu_division');
            if(mysqli_num_rows($school_query) > 0){
                while($school = mysqli_fetch_assoc($school_query)){
                  if($school['cat_by_ethi'] == 1){
                    $sinhala++;
                  }elseif ($school['cat_by_ethi'] == 2) {
                    $tamil++;
                  }elseif ($school['cat_by_ethi'] == 3) {
                    $muslim++;
                  }
                }
            }
            $total = $sinhala+$tamil+$muslim;
            $sinhalap = round($sinhala*100/$total,1);
            $tamilp = round($tamil*100/$total,1);
            $muslimp = round($muslim*100/$total,1);
            ?>
            <table class="table table-hover">
              <tr>
                <th id="tableMain">
                  Ethnicity
                </th>
                <th id="school">
                  Schools
                </th>
                <th id="percentage">
                 Percentage
                </th>
              </tr>
              <tr>
                <td id="tableMain">
                 Sinhala 
                </td>
                <td id="school">
                  <?php $database -> display_message($sinhala); ?>
                </td>
                <td id="percentage">
                  <?php $database -> display_message($sinhalap); ?>
                </td>
              </tr>
              <tr>
                <td id="tableMain">
                  Tamil
                </td>
                <td id="school">
                  <?php $database -> display_message($tamil); ?>
                </td>
                <td id="percentage">
                  <?php $database -> display_message($tamilp); ?>
                </td>
              </tr>
              <tr>
                <td id="tableMain">
                 Muslim
                </td>
                <td id="school">
                  <?php $database -> display_message($muslim); ?>
                </td>
                <td id="percentage">
                  <?php $database -> display_message($muslimp); ?>
                </td>
              </tr>
            </table>
            <?php
          }
          elseif($type == "zone" AND isset($_POST['ethnicity'])){
            $sinhala = $tamil = $muslim = 0;
            $zone_id = $office['eo_id'];

            $zone_query = $database -> table_search_by_element($office['office_no'],'education_office','higher_zone_no');
            if(mysqli_num_rows($zone_query) > 0){
                while($zone = mysqli_fetch_assoc($zone_query)){
                  $div_id = $database -> table_by_id($zone['office_no'],'education_office','office_no');
                  $school_query = $database -> table_search_by_element($div_id['eo_id'],'school','edu_division');
                  if(mysqli_num_rows($school_query) > 0){
                      while($school = mysqli_fetch_assoc($school_query)){
                        if($school['cat_by_ethi'] == 1){
                          $sinhala++;
                        }elseif ($school['cat_by_ethi'] == 2) {
                          $tamil++;
                        }elseif ($school['cat_by_ethi'] == 3) {
                          $muslim++;
                        }
                      }
                  }
                }
            }
              

            $total = $sinhala+$tamil+$muslim;
            $sinhalap = round($sinhala*100/$total,1);
            $tamilp = round($tamil*100/$total,1);
            $muslimp = round($muslim*100/$total,1);
            ?>
            <table class="table table-hover">
              <tr>
                <th id="tableMain">
                  Ethnicity
                </th>
                <th id="school">
                  Schools
                </th>
                <th id="percentage">
                 Percentage
                </th>
              </tr>
              <tr>
                <td id="tableMain">
                 Sinhala 
                </td>
                <td id="school">
                  <?php $database -> display_message($sinhala); ?>
                </td>
                <td id="percentage">
                  <?php $database -> display_message($sinhalap); ?>
                </td>
              </tr>
              <tr>
                <td id="tableMain">
                  Tamil
                </td>
                <td id="school">
                  <?php $database -> display_message($tamil); ?>
                </td>
                <td id="percentage">
                  <?php $database -> display_message($tamilp); ?>
                </td>
              </tr>
              <tr>
                <td id="tableMain">
                 Muslim
                </td>
                <td id="school">
                  <?php $database -> display_message($muslim); ?>
                </td>
                <td id="percentage">
                  <?php $database -> display_message($muslimp); ?>
                </td>
              </tr>
            </table>
            <?php
          }
          elseif($type == "province" AND isset($_POST['ethnicity'])){
            $sinhala = $tamil = $muslim = 0;
            $province_id = $office['eo_id'];

            $province_query = $database -> table_search_by_element($office['office_no'],'education_office','higher_provi_no');
            if(mysqli_num_rows($province_query) > 0){
                while($province = mysqli_fetch_assoc($province_query)){
                  $div_id = $database -> table_by_id($province['office_no'],'education_office','office_no');
                  $school_query = $database -> table_search_by_element($div_id['eo_id'],'school','edu_division');
                  if(mysqli_num_rows($school_query) > 0){
                      while($school = mysqli_fetch_assoc($school_query)){
                        if($school['cat_by_ethi'] == 1){
                          $sinhala++;
                        }elseif ($school['cat_by_ethi'] == 2) {
                          $tamil++;
                        }elseif ($school['cat_by_ethi'] == 3) {
                          $muslim++;
                        }
                      }
                  }
                }
            }
              

            $total = $sinhala+$tamil+$muslim;
            $sinhalap = round($sinhala*100/$total,1);
            $tamilp = round($tamil*100/$total,1);
            $muslimp = round($muslim*100/$total,1);
            ?>
            <table class="table table-hover">
              <tr>
                <th id="tableMain">
                  Ethnicity
                </th>
                <th id="school">
                  Schools
                </th>
                <th id="percentage">
                 Percentage
                </th>
              </tr>
              <tr>
                <td id="tableMain">
                 Sinhala 
                </td>
                <td id="school">
                  <?php $database -> display_message($sinhala); ?>
                </td>
                <td id="percentage">
                  <?php $database -> display_message($sinhalap); ?>
                </td>
              </tr>
              <tr>
                <td id="tableMain">
                  Tamil
                </td>
                <td id="school">
                  <?php $database -> display_message($tamil); ?>
                </td>
                <td id="percentage">
                  <?php $database -> display_message($tamilp); ?>
                </td>
              </tr>
              <tr>
                <td id="tableMain">
                 Muslim
                </td>
                <td id="school">
                  <?php $database -> display_message($muslim); ?>
                </td>
                <td id="percentage">
                  <?php $database -> display_message($muslimp); ?>
                </td>
              </tr>
            </table>
            <?php
          }
          elseif($type == "country" AND isset($_POST['ethnicity'])){
            $sinhala = $tamil = $muslim = 0;
            $school_query = $database -> table_search('school');
            if(mysqli_num_rows($school_query) > 0){
                while($school = mysqli_fetch_assoc($school_query)){
                  if($school['cat_by_ethi'] == 1){
                    $sinhala++;
                  }elseif ($school['cat_by_ethi'] == 2) {
                    $tamil++;
                  }elseif ($school['cat_by_ethi'] == 3) {
                    $muslim++;
                  }
                }
            }
            $total = $sinhala+$tamil+$muslim;
            $sinhalap = round($sinhala*100/$total,1);
            $tamilp = round($tamil*100/$total,1);
            $muslimp = round($muslim*100/$total,1);
            ?>
            <table class="table table-hover">
              <tr>
                <th id="tableMain">
                  Ethnicity
                </th>
                <th id="school">
                  Schools
                </th>
                <th id="percentage">
                 Percentage
                </th>
              </tr>
              <tr>
                <td id="tableMain">
                 Sinhala 
                </td>
                <td id="school">
                  <?php $database -> display_message($sinhala); ?>
                </td>
                <td id="percentage">
                  <?php $database -> display_message($sinhalap); ?>
                </td>
              </tr>
              <tr>
                <td id="tableMain">
                  Tamil
                </td>
                <td id="school">
                  <?php $database -> display_message($tamil); ?>
                </td>
                <td id="percentage">
                  <?php $database -> display_message($tamilp); ?>
                </td>
              </tr>
              <tr>
                <td id="tableMain">
                 Muslim
                </td>
                <td id="school">
                  <?php $database -> display_message($muslim); ?>
                </td>
                <td id="percentage">
                  <?php $database -> display_message($muslimp); ?>
                </td>
              </tr>
            </table>
            <?php
          }
          elseif($type == "division" AND isset($_POST['authority'])){
            $national = $provi = 0;
            $div_id = $office['eo_id'];
            $school_query = $database -> table_search_by_element($div_id,'school','edu_division');
            if(mysqli_num_rows($school_query) > 0){
                while($school = mysqli_fetch_assoc($school_query)){
                  if($school['cat_by_auth'] == 1){
                    $national++;
                  }elseif ($school['cat_by_auth'] == 2) {
                    $provi++;
                  }
                }
            }
            $total = $national+$provi;
            $nationalp = round($national*100/$total,1);
            $provip = round($provi*100/$total,1);
            ?>
            <table class="table table-hover">
              <tr>
                <th id="tableMain">
                  Authority
                </th>
                <th id="school">
                  Schools
                </th>
                <th id="percentage">
                 Percentage
                </th>
              </tr>
              <tr>
                <td id="tableMain">
                 National Schools 
                </td>
                <td id="school">
                  <?php $database -> display_message($national); ?>
                </td>
                <td id="percentage">
                  <?php $database -> display_message($nationalp); ?>
                </td>
              </tr>
              <tr>
                <td id="tableMain">
                  Province Schools
                </td>
                <td id="school">
                  <?php $database -> display_message($provi); ?>
                </td>
                <td id="percentage">
                  <?php $database -> display_message($provip); ?>
                </td>
              </tr>
            </table>
            <?php
          }
          elseif($type == "zone" AND isset($_POST['authority'])){
            $national = $provi = 0;
            $zone_id = $office['eo_id'];

            $zone_query = $database -> table_search_by_element($office['office_no'],'education_office','higher_zone_no');
            if(mysqli_num_rows($zone_query) > 0){
                while($zone = mysqli_fetch_assoc($zone_query)){
                  $div_id = $database -> table_by_id($zone['office_no'],'education_office','office_no');
                  $school_query = $database -> table_search_by_element($div_id['eo_id'],'school','edu_division');
                  if(mysqli_num_rows($school_query) > 0){
                      while($school = mysqli_fetch_assoc($school_query)){
                        if($school['cat_by_auth'] == 1){
                          $national++;
                        }elseif ($school['cat_by_auth'] == 2) {
                          $provi++;
                        }
                      }
                  }
                }
            }
            $total = $national+$provi;
            $nationalp = round($national*100/$total,1);
            $provip = round($provi*100/$total,1);
            ?>
            <table class="table table-hover">
              <tr>
                <th id="tableMain">
                  Authority
                </th>
                <th id="school">
                  Schools
                </th>
                <th id="percentage">
                 Percentage
                </th>
              </tr>
              <tr>
                <td id="tableMain">
                 National Schools 
                </td>
                <td id="school">
                  <?php $database -> display_message($national); ?>
                </td>
                <td id="percentage">
                  <?php $database -> display_message($nationalp); ?>
                </td>
              </tr>
              <tr>
                <td id="tableMain">
                  Province Schools
                </td>
                <td id="school">
                  <?php $database -> display_message($provi); ?>
                </td>
                <td id="percentage">
                  <?php $database -> display_message($provip); ?>
                </td>
              </tr>
            </table>
            <?php
          }
          elseif($type == "province" AND isset($_POST['authority'])){
            $national = $provi = 0;
            $zone_id = $office['eo_id'];

            $province_query = $database -> table_search_by_element($office['office_no'],'education_office','higher_provi_no');
            if(mysqli_num_rows($province_query) > 0){
                while($province = mysqli_fetch_assoc($province_query)){
                  $div_id = $database -> table_by_id($province['office_no'],'education_office','office_no');
                  $school_query = $database -> table_search_by_element($div_id['eo_id'],'school','edu_division');
                  if(mysqli_num_rows($school_query) > 0){
                      while($school = mysqli_fetch_assoc($school_query)){
          
                        if($school['cat_by_auth'] == 1){
                          $national++;
                        }elseif ($school['cat_by_auth'] == 2) {
                          $provi++;
                        }
                      }
                  }
                }
            }
            $total = $national+$provi;
            $nationalp = round($national*100/$total,1);
            $provip = round($provi*100/$total,1);
            ?>
            <table class="table table-hover">
              <tr>
                <th id="tableMain">
                  Authority
                </th>
                <th id="school">
                  Schools
                </th>
                <th id="percentage">
                 Percentage
                </th>
              </tr>
              <tr>
                <td id="tableMain">
                 National Schools 
                </td>
                <td id="school">
                  <?php $database -> display_message($national); ?>
                </td>
                <td id="percentage">
                  <?php $database -> display_message($nationalp); ?>
                </td>
              </tr>
              <tr>
                <td id="tableMain">
                  Province Schools
                </td>
                <td id="school">
                  <?php $database -> display_message($provi); ?>
                </td>
                <td id="percentage">
                  <?php $database -> display_message($provip); ?>
                </td>
              </tr>
            </table>
            <?php
          }
          elseif($type == "country" AND isset($_POST['authority'])){
            $national = $provi = 0;
            $school_query = $database -> table_search('school');
            if(mysqli_num_rows($school_query) > 0){
                while($school = mysqli_fetch_assoc($school_query)){
                  if($school['cat_by_auth'] == 1){
                    $national++;
                  }elseif ($school['cat_by_auth'] == 2) {
                    $provi++;
                  }
                }
            }
            $total = $national+$provi;
            $nationalp = round($national*100/$total,1);
            $provip = round($provi*100/$total,1);
            ?>
            <table class="table table-hover">
              <tr>
                <th id="tableMain">
                  Authority
                </th>
                <th id="school">
                  Schools
                </th>
                <th id="percentage">
                 Percentage
                </th>
              </tr>
              <tr>
                <td id="tableMain">
                 National Schools 
                </td>
                <td id="school">
                  <?php $database -> display_message($national); ?>
                </td>
                <td id="percentage">
                  <?php $database -> display_message($nationalp); ?>
                </td>
              </tr>
              <tr>
                <td id="tableMain">
                  Province Schools
                </td>
                <td id="school">
                  <?php $database -> display_message($provi); ?>
                </td>
                <td id="percentage">
                  <?php $database -> display_message($provip); ?>
                </td>
              </tr>
            </table>
            <?php
          }
          elseif($type == "division" AND isset($_POST['language'])){
            $sin = $tam = $eng = $sintam = $sineng = $tameng = $sintameng = 0;
            $div_id = $office['eo_id'];
            $school_query = $database -> table_search_by_element($div_id,'school','edu_division');
            if(mysqli_num_rows($school_query) > 0){
                while($school = mysqli_fetch_assoc($school_query)){
                  if($school['cat_by_lang'] == 1){
                    $sin++;
                  }elseif ($school['cat_by_lang'] == 2) {
                    $tam++;
                  }elseif($school['cat_by_lang'] == 3){
                    $eng++;
                  }elseif ($school['cat_by_lang'] == 4) {
                    $sintam++;
                  }elseif($school['cat_by_lang'] == 5){
                    $sineng++;
                  }elseif ($school['cat_by_lang'] == 6) {
                    $tameng++;
                  }elseif ($school['cat_by_lang'] == 7) {
                    $sintameng++;
                  }
                }
            }
            $total = $sin+$tam+$eng+$sintam+$sineng+$tameng+$sintameng;
            $sinp = round($sin*100/$total,1);
            $tamp = round($tam*100/$total,1);
            $engp = round($eng*100/$total,1);
            $sintamp = round($sintam*100/$total,1);
            $sinengp = round($sineng*100/$total,1);
            $tamengp = round($tameng*100/$total,1);
            $sintamengp = round($sintameng*100/$total,1);
            ?>
            <table class="table table-hover">
              <tr>
                <th id="tableMain">
                  Language
                </th>
                <th id="school">
                  Schools
                </th>
                <th id="percentage">
                 Percentage
                </th>
              </tr>
              <tr>
                <td id="tableMain">
                 Sinhala 
                </td>
                <td id="school">
                  <?php $database -> display_message($sin); ?>
                </td>
                <td id="percentage">
                  <?php $database -> display_message($sinp); ?>
                </td>
              </tr>
              <tr>
                <td id="tableMain">
                  Tamil
                </td>
                <td id="school">
                  <?php $database -> display_message($tam); ?>
                </td>
                <td id="percentage">
                  <?php $database -> display_message($tamp); ?>
                </td>
              </tr>
              <tr>
                <td id="tableMain">
                 English 
                </td>
                <td id="school">
                  <?php $database -> display_message($eng); ?>
                </td>
                <td id="percentage">
                  <?php $database -> display_message($engp); ?>
                </td>
              </tr>
              <tr>
                <td id="tableMain">
                  Sinhala/Tamil
                </td>
                <td id="school">
                  <?php $database -> display_message($sintam); ?>
                </td>
                <td id="percentage">
                  <?php $database -> display_message($sintamp); ?>
                </td>
              </tr>
              <tr>
                <td id="tableMain">
                 Sinhala/English 
                </td>
                <td id="school">
                  <?php $database -> display_message($sineng); ?>
                </td>
                <td id="percentage">
                  <?php $database -> display_message($sinengp); ?>
                </td>
              </tr>
              <tr>
                <td id="tableMain">
                  Tamil/English
                </td>
                <td id="school">
                  <?php $database -> display_message($tameng); ?>
                </td>
                <td id="percentage">
                  <?php $database -> display_message($tamengp); ?>
                </td>
              </tr>
              <tr>
                <td id="tableMain">
                 Sinhala/Tamil/English 
                </td>
                <td id="school">
                  <?php $database -> display_message($sintameng); ?>
                </td>
                <td id="percentage">
                  <?php $database -> display_message($sintamengp); ?>
                </td>
              </tr>
            </table>
            <?php
          }
          elseif($type == "zone" AND isset($_POST['language'])){
            $sin = $tam = $eng = $sintam = $sineng = $tameng = $sintameng = 0;
            $zone_id = $office['eo_id'];

            $zone_query = $database -> table_search_by_element($office['office_no'],'education_office','higher_zone_no');
            if(mysqli_num_rows($zone_query) > 0){
                while($zone = mysqli_fetch_assoc($zone_query)){
                  $div_id = $database -> table_by_id($zone['office_no'],'education_office','office_no');
                  $school_query = $database -> table_search_by_element($div_id['eo_id'],'school','edu_division');
                  if(mysqli_num_rows($school_query) > 0){
                      while($school = mysqli_fetch_assoc($school_query)){
                        if($school['cat_by_lang'] == 1){
                          $sin++;
                        }elseif ($school['cat_by_lang'] == 2) {
                          $tam++;
                        }elseif($school['cat_by_lang'] == 3){
                          $eng++;
                        }elseif ($school['cat_by_lang'] == 4) {
                          $sintam++;
                        }elseif($school['cat_by_lang'] == 5){
                          $sineng++;
                        }elseif ($school['cat_by_lang'] == 6) {
                          $tameng++;
                        }elseif ($school['cat_by_lang'] == 7) {
                          $sintameng++;
                        }
                      }
                  }
                }
            }
            $total = $sin+$tam+$eng+$sintam+$sineng+$tameng+$sintameng;
            $sinp = round($sin*100/$total,1);
            $tamp = round($tam*100/$total,1);
            $engp = round($eng*100/$total,1);
            $sintamp = round($sintam*100/$total,1);
            $sinengp = round($sineng*100/$total,1);
            $tamengp = round($tameng*100/$total,1);
            $sintamengp = round($sintameng*100/$total,1);
            ?>
            <table class="table table-hover">
              <tr>
                <th id="tableMain">
                  Language
                </th>
                <th id="school">
                  Schools
                </th>
                <th id="percentage">
                 Percentage
                </th>
              </tr>
              <tr>
                <td id="tableMain">
                 Sinhala 
                </td>
                <td id="school">
                  <?php $database -> display_message($sin); ?>
                </td>
                <td id="percentage">
                  <?php $database -> display_message($sinp); ?>
                </td>
              </tr>
              <tr>
                <td id="tableMain">
                  Tamil
                </td>
                <td id="school">
                  <?php $database -> display_message($tam); ?>
                </td>
                <td id="percentage">
                  <?php $database -> display_message($tamp); ?>
                </td>
              </tr>
              <tr>
                <td id="tableMain">
                 English 
                </td>
                <td id="school">
                  <?php $database -> display_message($eng); ?>
                </td>
                <td id="percentage">
                  <?php $database -> display_message($engp); ?>
                </td>
              </tr>
              <tr>
                <td id="tableMain">
                  Sinhala/Tamil
                </td>
                <td id="school">
                  <?php $database -> display_message($sintam); ?>
                </td>
                <td id="percentage">
                  <?php $database -> display_message($sintamp); ?>
                </td>
              </tr>
              <tr>
                <td id="tableMain">
                 Sinhala/English 
                </td>
                <td id="school">
                  <?php $database -> display_message($sineng); ?>
                </td>
                <td id="percentage">
                  <?php $database -> display_message($sinengp); ?>
                </td>
              </tr>
              <tr>
                <td id="tableMain">
                  Tamil/English
                </td>
                <td id="school">
                  <?php $database -> display_message($tameng); ?>
                </td>
                <td id="percentage">
                  <?php $database -> display_message($tamengp); ?>
                </td>
              </tr>
              <tr>
                <td id="tableMain">
                 Sinhala /Tamil/English 
                </td>
                <td id="school">
                  <?php $database -> display_message($sintameng); ?>
                </td>
                <td id="percentage">
                  <?php $database -> display_message($sintamengp); ?>
                </td>
              </tr>
            </table>
            <?php
          }
          elseif($type == "province" AND isset($_POST['language'])){
            $sin = $tam = $eng = $sintam = $sineng = $tameng = $sintameng = 0;
            $zone_id = $office['eo_id'];

            $province_query = $database -> table_search_by_element($office['office_no'],'education_office','higher_provi_no');
            if(mysqli_num_rows($province_query) > 0){
                while($province = mysqli_fetch_assoc($province_query)){
                  $div_id = $database -> table_by_id($province['office_no'],'education_office','office_no');
                  $school_query = $database -> table_search_by_element($div_id['eo_id'],'school','edu_division');
                  if(mysqli_num_rows($school_query) > 0){
                      while($school = mysqli_fetch_assoc($school_query)){
          
                        if($school['cat_by_lang'] == 1){
                          $sin++;
                        }elseif ($school['cat_by_lang'] == 2) {
                          $tam++;
                        }elseif($school['cat_by_lang'] == 3){
                          $eng++;
                        }elseif ($school['cat_by_lang'] == 4) {
                          $sintam++;
                        }elseif($school['cat_by_lang'] == 5){
                          $sineng++;
                        }elseif ($school['cat_by_lang'] == 6) {
                          $tameng++;
                        }elseif ($school['cat_by_lang'] == 7) {
                          $sintameng++;
                        }
                      }
                  }
                }
            }
            $total = $sin+$tam+$eng+$sintam+$sineng+$tameng+$sintameng;
            $sinp = round($sin*100/$total,1);
            $tamp = round($tam*100/$total,1);
            $engp = round($eng*100/$total,1);
            $sintamp = round($sintam*100/$total,1);
            $sinengp = round($sineng*100/$total,1);
            $tamengp = round($tameng*100/$total,1);
            $sintamengp = round($sintameng*100/$total,1);
            ?>
            <table class="table table-hover">
              <tr>
                <th id="tableMain">
                  Language
                </th>
                <th id="school">
                  Schools
                </th>
                <th id="percentage">
                 Percentage
                </th>
              </tr>
              <tr>
                <td id="tableMain">
                 Sinhala 
                </td>
                <td id="school">
                  <?php $database -> display_message($sin); ?>
                </td>
                <td id="percentage">
                  <?php $database -> display_message($sinp); ?>
                </td>
              </tr>
              <tr>
                <td id="tableMain">
                  Tamil
                </td>
                <td id="school">
                  <?php $database -> display_message($tam); ?>
                </td>
                <td id="percentage">
                  <?php $database -> display_message($tamp); ?>
                </td>
              </tr>
              <tr>
                <td id="tableMain">
                 English 
                </td>
                <td id="school">
                  <?php $database -> display_message($eng); ?>
                </td>
                <td id="percentage">
                  <?php $database -> display_message($engp); ?>
                </td>
              </tr>
              <tr>
                <td id="tableMain">
                  Sinhala /Tamil
                </td>
                <td id="school">
                  <?php $database -> display_message($sintam); ?>
                </td>
                <td id="percentage">
                  <?php $database -> display_message($sintamp); ?>
                </td>
              </tr>
              <tr>
                <td id="tableMain">
                 Sinhala /English 
                </td>
                <td id="school">
                  <?php $database -> display_message($sineng); ?>
                </td>
                <td id="percentage">
                  <?php $database -> display_message($sinengp); ?>
                </td>
              </tr>
              <tr>
                <td id="tableMain">
                  Tamil /English
                </td>
                <td id="school">
                  <?php $database -> display_message($tameng); ?>
                </td>
                <td id="percentage">
                  <?php $database -> display_message($tamengp); ?>
                </td>
              </tr>
              <tr>
                <td id="tableMain">
                 Sinhala /Tamil /English 
                </td>
                <td id="school">
                  <?php $database -> display_message($sintameng); ?>
                </td>
                <td id="percentage">
                  <?php $database -> display_message($sintamengp); ?>
                </td>
              </tr>
            </table>
            <?php
          }
          elseif($type == "country" AND isset($_POST['language'])){
            $sin = $tam = $eng = $sintam = $sineng = $tameng = $sintameng = 0;
            $school_query = $database -> table_search('school');
            if(mysqli_num_rows($school_query) > 0){
                while($school = mysqli_fetch_assoc($school_query)){
                  if($school['cat_by_lang'] == 1){
                    $sin++;
                  }elseif ($school['cat_by_lang'] == 2) {
                    $tam++;
                  }elseif($school['cat_by_lang'] == 3){
                    $eng++;
                  }elseif ($school['cat_by_lang'] == 4) {
                    $sintam++;
                  }elseif($school['cat_by_lang'] == 5){
                    $sineng++;
                  }elseif ($school['cat_by_lang'] == 6) {
                    $tameng++;
                  }elseif ($school['cat_by_lang'] == 7) {
                    $sintameng++;
                  }
                }
            }
            $total = $sin+$tam+$eng+$sintam+$sineng+$tameng+$sintameng;
            $sinp = round($sin*100/$total,1);
            $tamp = round($tam*100/$total,1);
            $engp = round($eng*100/$total,1);
            $sintamp = round($sintam*100/$total,1);
            $sinengp = round($sineng*100/$total,1);
            $tamengp = round($tameng*100/$total,1);
            $sintamengp = round($sintameng*100/$total,1);
            ?>
            <table class="table table-hover">
              <tr>
                <th id="tableMain">
                  Language
                </th>
                <th id="school">
                  Schools
                </th>
                <th id="percentage">
                 Percentage
                </th>
              </tr>
              <tr>
                <td id="tableMain">
                 Sinhala 
                </td>
                <td id="school">
                  <?php $database -> display_message($sin); ?>
                </td>
                <td id="percentage">
                  <?php $database -> display_message($sinp); ?>
                </td>
              </tr>
              <tr>
                <td id="tableMain">
                  Tamil
                </td>
                <td id="school">
                  <?php $database -> display_message($tam); ?>
                </td>
                <td id="percentage">
                  <?php $database -> display_message($tamp); ?>
                </td>
              </tr>
              <tr>
                <td id="tableMain">
                 English 
                </td>
                <td id="school">
                  <?php $database -> display_message($eng); ?>
                </td>
                <td id="percentage">
                  <?php $database -> display_message($engp); ?>
                </td>
              </tr>
              <tr>
                <td id="tableMain">
                  Sinhala/Tamil
                </td>
                <td id="school">
                  <?php $database -> display_message($sintam); ?>
                </td>
                <td id="percentage">
                  <?php $database -> display_message($sintamp); ?>
                </td>
              </tr>
              <tr>
                <td id="tableMain">
                 Sinhala/English 
                </td>
                <td id="school">
                  <?php $database -> display_message($sineng); ?>
                </td>
                <td id="percentage">
                  <?php $database -> display_message($sinengp); ?>
                </td>
              </tr>
              <tr>
                <td id="tableMain">
                  Tamil/English
                </td>
                <td id="school">
                  <?php $database -> display_message($tameng); ?>
                </td>
                <td id="percentage">
                  <?php $database -> display_message($tamengp); ?>
                </td>
              </tr>
              <tr>
                <td id="tableMain">
                 Sinhala/Tamil/English 
                </td>
                <td id="school">
                  <?php $database -> display_message($sintameng); ?>
                </td>
                <td id="percentage">
                  <?php $database -> display_message($sintamengp); ?>
                </td>
              </tr>
            </table>
            <?php
          }
          elseif($type == "division" AND isset($_POST['class'])){
            $onefive = $oneeight = $oneele = $onethir = $sixele = $sixthir = $other = 0;
            $div_id = $office['eo_id'];
            $school_query = $database -> table_search_by_element($div_id,'school','edu_division');
            if(mysqli_num_rows($school_query) > 0){
                while($school = mysqli_fetch_assoc($school_query)){
                  if($school['cat_by_cls'] == 1){
                    $onefive++;
                  }elseif ($school['cat_by_cls'] == 2) {
                    $oneeight++;
                  }elseif($school['cat_by_cls'] == 3){
                    $oneele++;
                  }elseif ($school['cat_by_cls'] == 4) {
                    $onethir++;
                  }elseif($school['cat_by_cls'] == 5){
                    $sixele++;
                  }elseif ($school['cat_by_cls'] == 6) {
                    $sixthir++;
                  }elseif ($school['cat_by_cls'] == 7) {
                    $other++;
                  }
                }
            }
            $total = $onefive+$oneeight+$oneele+$onethir+$sixele+$sixthir+$other;
            $onefivep = round($onefive*100/$total,1);
            $oneeightp = round($oneeight*100/$total,1);
            $oneelep = round($oneele*100/$total,1);
            $onethirp = round($onethir*100/$total,1);
            $sixelep = round($sixele*100/$total,1);
            $sixthirp = round($sixthir*100/$total,1);
            $otherp = round($other*100/$total,1);
            ?>
            <table class="table table-hover">
              <tr>
                <th id="tableMain">
                  Classes
                </th>
                <th id="school">
                  Schools
                </th>
                <th id="percentage">
                 Percentage
                </th>
              </tr>
              <tr>
                <td id="tableMain">
                 1-5 
                </td>
                <td id="school">
                  <?php $database -> display_message($onefive); ?>
                </td>
                <td id="percentage">
                  <?php $database -> display_message($onefivep); ?>
                </td>
              </tr>
              <tr>
                <td id="tableMain">
                  1-8
                </td>
                <td id="school">
                  <?php $database -> display_message($oneeight); ?>
                </td>
                <td id="percentage">
                  <?php $database -> display_message($oneeightp); ?>
                </td>
              </tr>
              <tr>
                <td id="tableMain">
                 1-11
                </td>
                <td id="school">
                  <?php $database -> display_message($oneele); ?>
                </td>
                <td id="percentage">
                  <?php $database -> display_message($oneelep); ?>
                </td>
              </tr>
              <tr>
                <td id="tableMain">
                  1-13
                </td>
                <td id="school">
                  <?php $database -> display_message($onethir); ?>
                </td>
                <td id="percentage">
                  <?php $database -> display_message($onethirp); ?>
                </td>
              </tr>
              <tr>
                <td id="tableMain">
                 6-11
                </td>
                <td id="school">
                  <?php $database -> display_message($sixele); ?>
                </td>
                <td id="percentage">
                  <?php $database -> display_message($sixelep); ?>
                </td>
              </tr>
              <tr>
                <td id="tableMain">
                  6-13
                </td>
                <td id="school">
                  <?php $database -> display_message($sixthir); ?>
                </td>
                <td id="percentage">
                  <?php $database -> display_message($sixthirp); ?>
                </td>
              </tr>
              <tr>
                <td id="tableMain">
                 Other
                </td>
                <td id="school">
                  <?php $database -> display_message($other); ?>
                </td>
                <td id="percentage">
                  <?php $database -> display_message($otherp); ?>
                </td>
              </tr>
            </table>
            <?php
          }
          elseif($type == "zone" AND isset($_POST['class'])){
            $onefive = $oneeight = $oneele = $onethir = $sixele = $sixthir = $other = 0;
            $zone_id = $office['eo_id'];

            $zone_query = $database -> table_search_by_element($office['office_no'],'education_office','higher_zone_no');
            if(mysqli_num_rows($zone_query) > 0){
                while($zone = mysqli_fetch_assoc($zone_query)){
                  $div_id = $database -> table_by_id($zone['office_no'],'education_office','office_no');
                  $school_query = $database -> table_search_by_element($div_id['eo_id'],'school','edu_division');
                  if(mysqli_num_rows($school_query) > 0){
                      while($school = mysqli_fetch_assoc($school_query)){
                        if($school['cat_by_cls'] == 1){
                          $onefive++;
                        }elseif ($school['cat_by_cls'] == 2) {
                          $oneeight++;
                        }elseif($school['cat_by_cls'] == 3){
                          $oneele++;
                        }elseif ($school['cat_by_cls'] == 4) {
                          $onethir++;
                        }elseif($school['cat_by_cls'] == 5){
                          $sixele++;
                        }elseif ($school['cat_by_cls'] == 6) {
                          $sixthir++;
                        }elseif ($school['cat_by_cls'] == 7) {
                          $other++;
                        }
                      }
                  }
                }
            }
            $total = $onefive+$oneeight+$oneele+$onethir+$sixele+$sixthir+$other;
            $onefivep = round($onefive*100/$total,1);
            $oneeightp = round($oneeight*100/$total,1);
            $oneelep = round($oneele*100/$total,1);
            $onethirp = round($onethir*100/$total,1);
            $sixelep = round($sixele*100/$total,1);
            $sixthirp = round($sixthir*100/$total,1);
            $otherp = round($other*100/$total,1);
            ?>
            <table class="table table-hover">
              <tr>
                <th id="tableMain">
                  Classes
                </th>
                <th id="school">
                  Schools
                </th>
                <th id="percentage">
                 Percentage
                </th>
              </tr>
              <tr>
                <td id="tableMain">
                 1-5 
                </td>
                <td id="school">
                  <?php $database -> display_message($onefive); ?>
                </td>
                <td id="percentage">
                  <?php $database -> display_message($onefivep); ?>
                </td>
              </tr>
              <tr>
                <td id="tableMain">
                  1-8
                </td>
                <td id="school">
                  <?php $database -> display_message($oneeight); ?>
                </td>
                <td id="percentage">
                  <?php $database -> display_message($oneeightp); ?>
                </td>
              </tr>
              <tr>
                <td id="tableMain">
                 1-11
                </td>
                <td id="school">
                  <?php $database -> display_message($oneele); ?>
                </td>
                <td id="percentage">
                  <?php $database -> display_message($oneelep); ?>
                </td>
              </tr>
              <tr>
                <td id="tableMain">
                  1-13
                </td>
                <td id="school">
                  <?php $database -> display_message($onethir); ?>
                </td>
                <td id="percentage">
                  <?php $database -> display_message($onethirp); ?>
                </td>
              </tr>
              <tr>
                <td id="tableMain">
                 6-11
                </td>
                <td id="school">
                  <?php $database -> display_message($sixele); ?>
                </td>
                <td id="percentage">
                  <?php $database -> display_message($sixelep); ?>
                </td>
              </tr>
              <tr>
                <td id="tableMain">
                  6-13
                </td>
                <td id="school">
                  <?php $database -> display_message($sixthir); ?>
                </td>
                <td id="percentage">
                  <?php $database -> display_message($sixthirp); ?>
                </td>
              </tr>
              <tr>
                <td id="tableMain">
                 Other
                </td>
                <td id="school">
                  <?php $database -> display_message($other); ?>
                </td>
                <td id="percentage">
                  <?php $database -> display_message($otherp); ?>
                </td>
              </tr>
            </table>
            <?php
          }
          elseif($type == "province" AND isset($_POST['class'])){
            $onefive = $oneeight = $oneele = $onethir = $sixele = $sixthir = $other = 0;
            $zone_id = $office['eo_id'];

            $province_query = $database -> table_search_by_element($office['office_no'],'education_office','higher_provi_no');
            if(mysqli_num_rows($province_query) > 0){
                while($province = mysqli_fetch_assoc($province_query)){
                  $div_id = $database -> table_by_id($province['office_no'],'education_office','office_no');
                  $school_query = $database -> table_search_by_element($div_id['eo_id'],'school','edu_division');
                  if(mysqli_num_rows($school_query) > 0){
                      while($school = mysqli_fetch_assoc($school_query)){
          
                        if($school['cat_by_cls'] == 1){
                          $onefive++;
                        }elseif ($school['cat_by_cls'] == 2) {
                          $oneeight++;
                        }elseif($school['cat_by_cls'] == 3){
                          $oneele++;
                        }elseif ($school['cat_by_cls'] == 4) {
                          $onethir++;
                        }elseif($school['cat_by_cls'] == 5){
                          $sixele++;
                        }elseif ($school['cat_by_cls'] == 6) {
                          $sixthir++;
                        }elseif ($school['cat_by_cls'] == 7) {
                          $other++;
                        }
                      }
                  }
                }
            }
            $total = $onefive+$oneeight+$oneele+$onethir+$sixele+$sixthir+$other;
            $onefivep = round($onefive*100/$total,1);
            $oneeightp = round($oneeight*100/$total,1);
            $oneelep = round($oneele*100/$total,1);
            $onethirp = round($onethir*100/$total,1);
            $sixelep = round($sixele*100/$total,1);
            $sixthirp = round($sixthir*100/$total,1);
            $otherp = round($other*100/$total,1);
            ?>
            <table class="table table-hover">
              <tr>
                <th id="tableMain">
                  Classes
                </th>
                <th id="school">
                  Schools
                </th>
                <th id="percentage">
                 Percentage
                </th>
              </tr>
              <tr>
                <td id="tableMain">
                 1-5 
                </td>
                <td id="school">
                  <?php $database -> display_message($onefive); ?>
                </td>
                <td id="percentage">
                  <?php $database -> display_message($onefivep); ?>
                </td>
              </tr>
              <tr>
                <td id="tableMain">
                  1-8
                </td>
                <td id="school">
                  <?php $database -> display_message($oneeight); ?>
                </td>
                <td id="percentage">
                  <?php $database -> display_message($oneeightp); ?>
                </td>
              </tr>
              <tr>
                <td id="tableMain">
                 1-11
                </td>
                <td id="school">
                  <?php $database -> display_message($oneele); ?>
                </td>
                <td id="percentage">
                  <?php $database -> display_message($oneelep); ?>
                </td>
              </tr>
              <tr>
                <td id="tableMain">
                  1-13
                </td>
                <td id="school">
                  <?php $database -> display_message($onethir); ?>
                </td>
                <td id="percentage">
                  <?php $database -> display_message($onethirp); ?>
                </td>
              </tr>
              <tr>
                <td id="tableMain">
                 6-11
                </td>
                <td id="school">
                  <?php $database -> display_message($sixele); ?>
                </td>
                <td id="percentage">
                  <?php $database -> display_message($sixelep); ?>
                </td>
              </tr>
              <tr>
                <td id="tableMain">
                  6-13
                </td>
                <td id="school">
                  <?php $database -> display_message($sixthir); ?>
                </td>
                <td id="percentage">
                  <?php $database -> display_message($sixthirp); ?>
                </td>
              </tr>
              <tr>
                <td id="tableMain">
                 Other
                </td>
                <td id="school">
                  <?php $database -> display_message($other); ?>
                </td>
                <td id="percentage">
                  <?php $database -> display_message($otherp); ?>
                </td>
              </tr>
            </table>
            <?php
          }
          elseif($type == "country" AND isset($_POST['class'])){
            $onefive = $oneeight = $oneele = $onethir = $sixele = $sixthir = $other = 0;
            $school_query = $database -> table_search('school');
            if(mysqli_num_rows($school_query) > 0){
                while($school = mysqli_fetch_assoc($school_query)){
                  if($school['cat_by_cls'] == 1){
                    $onefive++;
                  }elseif ($school['cat_by_cls'] == 2) {
                    $oneeight++;
                  }elseif($school['cat_by_cls'] == 3){
                    $oneele++;
                  }elseif ($school['cat_by_cls'] == 4) {
                    $onethir++;
                  }elseif($school['cat_by_cls'] == 5){
                    $sixele++;
                  }elseif ($school['cat_by_cls'] == 6) {
                    $sixthir++;
                  }elseif ($school['cat_by_cls'] == 7) {
                    $other++;
                  }
                }
            }
            $total = $onefive+$oneeight+$oneele+$onethir+$sixele+$sixthir+$other;
            $onefivep = round($onefive*100/$total,1);
            $oneeightp = round($oneeight*100/$total,1);
            $oneelep = round($oneele*100/$total,1);
            $onethirp = round($onethir*100/$total,1);
            $sixelep = round($sixele*100/$total,1);
            $sixthirp = round($sixthir*100/$total,1);
            $otherp = round($other*100/$total,1);
            ?>
            <table class="table table-hover">
              <tr>
                <th id="tableMain">
                  Classes
                </th>
                <th id="school">
                  Schools
                </th>
                <th id="percentage">
                 Percentage
                </th>
              </tr>
              <tr>
                <td id="tableMain">
                 1-5 
                </td>
                <td id="school">
                  <?php $database -> display_message($onefive); ?>
                </td>
                <td id="percentage">
                  <?php $database -> display_message($onefivep); ?>
                </td>
              </tr>
              <tr>
                <td id="tableMain">
                  1-8
                </td>
                <td id="school">
                  <?php $database -> display_message($oneeight); ?>
                </td>
                <td id="percentage">
                  <?php $database -> display_message($oneeightp); ?>
                </td>
              </tr>
              <tr>
                <td id="tableMain">
                 1-11
                </td>
                <td id="school">
                  <?php $database -> display_message($oneele); ?>
                </td>
                <td id="percentage">
                  <?php $database -> display_message($oneelep); ?>
                </td>
              </tr>
              <tr>
                <td id="tableMain">
                  1-13
                </td>
                <td id="school">
                  <?php $database -> display_message($onethir); ?>
                </td>
                <td id="percentage">
                  <?php $database -> display_message($onethirp); ?>
                </td>
              </tr>
              <tr>
                <td id="tableMain">
                 6-11
                </td>
                <td id="school">
                  <?php $database -> display_message($sixele); ?>
                </td>
                <td id="percentage">
                  <?php $database -> display_message($sixelep); ?>
                </td>
              </tr>
              <tr>
                <td id="tableMain">
                  6-13
                </td>
                <td id="school">
                  <?php $database -> display_message($sixthir); ?>
                </td>
                <td id="percentage">
                  <?php $database -> display_message($sixthirp); ?>
                </td>
              </tr>
              <tr>
                <td id="tableMain">
                 Other
                </td>
                <td id="school">
                  <?php $database -> display_message($other); ?>
                </td>
                <td id="percentage">
                  <?php $database -> display_message($otherp); ?>
                </td>
              </tr>
            </table>
            <?php
          }
          elseif($type == "division" AND isset($_POST['density'])){
            $ab = $c = $t2 = $t3 = 0;
            $div_id = $office['eo_id'];
            $school_query = $database -> table_search_by_element($div_id,'school','edu_division');
            if(mysqli_num_rows($school_query) > 0){
                while($school = mysqli_fetch_assoc($school_query)){
                  if($school['cat_by_den'] == 1){
                    $ab++;
                  }elseif ($school['cat_by_den'] == 2) {
                    $c++;
                  }elseif($school['cat_by_den'] == 3){
                    $t2++;
                  }elseif ($school['cat_by_den'] == 4) {
                    $t3++;
                  }
                }
            }
            $total = $ab+$c+$t2+$t3;
            $abp = round($ab*100/$total,1);
            $cp = round($c*100/$total,1);
            $t2p = round($t2*100/$total,1);
            $t3p = round($t3*100/$total,1);
            ?>
            <table class="table table-hover">
              <tr>
                <th id="tableMain">
                  Catagory
                </th>
                <th id="school">
                  Schools
                </th>
                <th id="percentage">
                 Percentage
                </th>
              </tr>
              <tr>
                <td id="tableMain">
                 1-AB
                </td>
                <td id="school">
                  <?php $database -> display_message($ab); ?>
                </td>
                <td id="percentage">
                  <?php $database -> display_message($abp); ?>
                </td>
              </tr>
              <tr>
                <td id="tableMain">
                  1-C
                </td>
                <td id="school">
                  <?php $database -> display_message($c); ?>
                </td>
                <td id="percentage">
                  <?php $database -> display_message($cp); ?>
                </td>
              </tr>
              <tr>
                <td id="tableMain">
                 Type 2
                </td>
                <td id="school">
                  <?php $database -> display_message($t2); ?>
                </td>
                <td id="percentage">
                  <?php $database -> display_message($t2p); ?>
                </td>
              </tr>
              <tr>
                <td id="tableMain">
                  Type 3
                </td>
                <td id="school">
                  <?php $database -> display_message($t3); ?>
                </td>
                <td id="percentage">
                  <?php $database -> display_message($t3p); ?>
                </td>
              </tr>
            </table>
            <?php
          }
          elseif($type == "zone" AND isset($_POST['density'])){
            $ab = $c = $t2 = $t3 = 0;
            $zone_id = $office['eo_id'];

            $zone_query = $database -> table_search_by_element($office['office_no'],'education_office','higher_zone_no');
            if(mysqli_num_rows($zone_query) > 0){
                while($zone = mysqli_fetch_assoc($zone_query)){
                  $div_id = $database -> table_by_id($zone['office_no'],'education_office','office_no');
                  $school_query = $database -> table_search_by_element($div_id['eo_id'],'school','edu_division');
                  if(mysqli_num_rows($school_query) > 0){
                    while($school = mysqli_fetch_assoc($school_query)){
                      if($school['cat_by_den'] == 1) {
                        $ab++;
                      }elseif ($school['cat_by_den'] == 2) {
                        $c++;
                      }elseif($school['cat_by_den'] == 3) {
                        $t2++;
                      }elseif ($school['cat_by_den'] == 4) {
                        $t3++;
                      }
                    }
                  }
                }
              }
                $total = $ab+$c+$t2+$t3;
                $abp = round($ab*100/$total,1);
                $cp = round($c*100/$total,1);
                $t2p = round($t2*100/$total,1);
                $t3p = round($t3*100/$total,1);
                ?>
                <table class="table table-hover">
                  <tr>
                    <th id="tableMain">
                      Catagory
                    </th>
                    <th id="school">
                      Schools
                    </th>
                    <th id="percentage">
                     Percentage
                    </th>
                  </tr>
                  <tr>
                    <td id="tableMain">
                     1-AB
                    </td>
                    <td id="school">
                      <?php $database -> display_message($ab); ?>
                    </td>
                    <td id="percentage">
                      <?php $database -> display_message($abp); ?>
                    </td>
                  </tr>
                  <tr>
                    <td id="tableMain">
                      1-C
                    </td>
                    <td id="school">
                      <?php $database -> display_message($c); ?>
                    </td>
                    <td id="percentage">
                      <?php $database -> display_message($cp); ?>
                    </td>
                  </tr>
                  <tr>
                    <td id="tableMain">
                     Type 2
                    </td>
                    <td id="school">
                      <?php $database -> display_message($t2); ?>
                    </td>
                    <td id="percentage">
                      <?php $database -> display_message($t2p); ?>
                    </td>
                  </tr>
                  <tr>
                    <td id="tableMain">
                      Type 3
                    </td>
                    <td id="school">
                      <?php $database -> display_message($t3); ?>
                    </td>
                    <td id="percentage">
                      <?php $database -> display_message($t3p); ?>
                    </td>
                  </tr>
                </table>
            <?php
          }
          elseif($type == "province" AND isset($_POST['density'])){
            $ab = $c = $t2 = $t3 = 0;
            $zone_id = $office['eo_id'];

            $province_query = $database -> table_search_by_element($office['office_no'],'education_office','higher_provi_no');
            if(mysqli_num_rows($province_query) > 0){
                while($province = mysqli_fetch_assoc($province_query)){
                  $div_id = $database -> table_by_id($province['office_no'],'education_office','office_no');
                  $school_query = $database -> table_search_by_element($div_id['eo_id'],'school','edu_division');
                  if(mysqli_num_rows($school_query) > 0){
                    while($school = mysqli_fetch_assoc($school_query)){
                      if($school['cat_by_den'] == 1) {
                        $ab++;
                      }elseif ($school['cat_by_den'] == 2) {
                        $c++;
                      }elseif($school['cat_by_den'] == 3) {
                        $t2++;
                      }elseif ($school['cat_by_den'] == 4) {
                        $t3++;
                      }
                    }
                  }
                }
              }
                $total = $ab+$c+$t2+$t3;
                $abp = round($ab*100/$total,1);
                $cp = round($c*100/$total,1);
                $t2p = round($t2*100/$total,1);
                $t3p = round($t3*100/$total,1);
                ?>
                <table class="table table-hover">
                  <tr>
                    <th id="tableMain">
                      Catagory
                    </th>
                    <th id="school">
                      Schools
                    </th>
                    <th id="percentage">
                     Percentage
                    </th>
                  </tr>
                  <tr>
                    <td id="tableMain">
                     1-AB
                    </td>
                    <td id="school">
                      <?php $database -> display_message($ab); ?>
                    </td>
                    <td id="percentage">
                      <?php $database -> display_message($abp); ?>
                    </td>
                  </tr>
                  <tr>
                    <td id="tableMain">
                      1-C
                    </td>
                    <td id="school">
                      <?php $database -> display_message($c); ?>
                    </td>
                    <td id="percentage">
                      <?php $database -> display_message($cp); ?>
                    </td>
                  </tr>
                  <tr>
                    <td id="tableMain">
                     Type 2
                    </td>
                    <td id="school">
                      <?php $database -> display_message($t2); ?>
                    </td>
                    <td id="percentage">
                      <?php $database -> display_message($t2p); ?>
                    </td>
                  </tr>
                  <tr>
                    <td id="tableMain">
                      Type 3
                    </td>
                    <td id="school">
                      <?php $database -> display_message($t3); ?>
                    </td>
                    <td id="percentage">
                      <?php $database -> display_message($t3p); ?>
                    </td>
                  </tr>
                </table>
            <?php
          }
          elseif($type == "country" AND isset($_POST['density'])){
            $ab = $c = $t2 = $t3 = 0;
            $school_query = $database -> table_search('school');
            if(mysqli_num_rows($school_query) > 0){
                while($school = mysqli_fetch_assoc($school_query)){
                  if($school['cat_by_den'] == 1){
                    $ab++;
                  }elseif ($school['cat_by_den'] == 2) {
                    $c++;
                  }elseif($school['cat_by_den'] == 3){
                    $t2++;
                  }elseif ($school['cat_by_den'] == 4) {
                    $t3++;
                  }
                }
            }
            $total = $ab+$c+$t2+$t3;
            $abp = round($ab*100/$total,1);
            $cp = round($c*100/$total,1);
            $t2p = round($t2*100/$total,1);
            $t3p = round($t3*100/$total,1);
            ?>
            <table class="table table-hover">
              <tr>
                <th id="tableMain">
                  Catagory
                </th>
                <th id="school">
                  Schools
                </th>
                <th id="percentage">
                 Percentage
                </th>
              </tr>
              <tr>
                <td id="tableMain">
                 1-AB
                </td>
                <td id="school">
                  <?php $database -> display_message($ab); ?>
                </td>
                <td id="percentage">
                  <?php $database -> display_message($abp); ?>
                </td>
              </tr>
              <tr>
                <td id="tableMain">
                  1-C
                </td>
                <td id="school">
                  <?php $database -> display_message($c); ?>
                </td>
                <td id="percentage">
                  <?php $database -> display_message($cp); ?>
                </td>
              </tr>
              <tr>
                <td id="tableMain">
                 Type 2
                </td>
                <td id="school">
                  <?php $database -> display_message($t2); ?>
                </td>
                <td id="percentage">
                  <?php $database -> display_message($t2p); ?>
                </td>
              </tr>
              <tr>
                <td id="tableMain">
                  Type 3
                </td>
                <td id="school">
                  <?php $database -> display_message($t3); ?>
                </td>
                <td id="percentage">
                  <?php $database -> display_message($t3p); ?>
                </td>
              </tr>
            </table>
            <?php
          }
          elseif($type == "division" AND isset($_POST['gender'])){
            $boy = $girl = $mix = $girlal = $boyal = 0;
            $div_id = $office['eo_id'];
            $school_query = $database -> table_search_by_element($div_id,'school','edu_division');
            if(mysqli_num_rows($school_query) > 0){
                while($school = mysqli_fetch_assoc($school_query)){
                  if($school['cat_by_gen'] == 1){
                    $boy++;
                  }elseif ($school['cat_by_gen'] == 2) {
                    $girl++;
                  }elseif($school['cat_by_gen'] == 3){
                    $mix++;
                  }elseif ($school['cat_by_gen'] == 4) {
                    $girlal++;
                  }elseif($school['cat_by_gen'] == 5){
                    $boyal++;
                  }
                }
            }
            $total = $boy+$girl+$mix+$girlal+$boyal;
            $boyp = round($boy*100/$total,1);
            $girlp = round($girl*100/$total,1);
            $mixp = round($mix*100/$total,1);
            $girlalp = round($girlal*100/$total,1);
            $boyalp = round($boyal*100/$total,1);
            ?>
            <table class="table table-hover">
              <tr>
                <th id="tableMain">
                  Gender
                </th>
                <th id="school">
                  Schools
                </th>
                <th id="percentage">
                 Percentage
                </th>
              </tr>
              <tr>
                <td id="tableMain">
                 Boys 
                </td>
                <td id="school">
                  <?php $database -> display_message($boy); ?>
                </td>
                <td id="percentage">
                  <?php $database -> display_message($boyp); ?>
                </td>
              </tr>
              <tr>
                <td id="tableMain">
                  Girls
                </td>
                <td id="school">
                  <?php $database -> display_message($girl); ?>
                </td>
                <td id="percentage">
                  <?php $database -> display_message($girlp); ?>
                </td>
              </tr>
              <tr>
                <td id="tableMain">
                 Mixed
                </td>
                <td id="school">
                  <?php $database -> display_message($mix); ?>
                </td>
                <td id="percentage">
                  <?php $database -> display_message($mixp); ?>
                </td>
              </tr>
              <tr>
                <td id="tableMain">
                  Girls without AL/Primary
                </td>
                <td id="school">
                  <?php $database -> display_message($girlal); ?>
                </td>
                <td id="percentage">
                  <?php $database -> display_message($girlalp); ?>
                </td>
              </tr>
              <tr>
                <td id="tableMain">
                 Boys without AL/Primary
                </td>
                <td id="school">
                  <?php $database -> display_message($boyal); ?>
                </td>
                <td id="percentage">
                  <?php $database -> display_message($boyalp); ?>
                </td>
              </tr>
            </table>
            <?php
          }
          elseif($type == "zone" AND isset($_POST['gender'])){
            $boy = $girl = $mix = $girlal = $boyal = 0;
            $zone_id = $office['eo_id'];

            $zone_query = $database -> table_search_by_element($office['office_no'],'education_office','higher_zone_no');
            if(mysqli_num_rows($zone_query) > 0){
                while($zone = mysqli_fetch_assoc($zone_query)){
                  $div_id = $database -> table_by_id($zone['office_no'],'education_office','office_no');
                  $school_query = $database -> table_search_by_element($div_id['eo_id'],'school','edu_division');
                  if(mysqli_num_rows($school_query) > 0){
                    while($school = mysqli_fetch_assoc($school_query)){
                      if($school['cat_by_gen'] == 1){
                        $boy++;
                      }elseif ($school['cat_by_gen'] == 2) {
                        $girl++;
                      }elseif($school['cat_by_gen'] == 3){
                        $mix++;
                      }elseif ($school['cat_by_gen'] == 4) {
                        $girlal++;
                      }elseif($school['cat_by_gen'] == 5){
                        $boyal++;
                      }
                    }
                  }
                }
              }
                $total = $boy+$girl+$mix+$girlal+$boyal;
                $boyp = round($boy*100/$total,1);
                $girlp = round($girl*100/$total,1);
                $mixp = round($mix*100/$total,1);
                $girlalp = round($girlal*100/$total,1);
                $boyalp = round($boyal*100/$total,1);
                ?>
                <table class="table table-hover">
                  <tr>
                    <th id="tableMain">
                      Gender
                    </th>
                    <th id="school">
                      Schools
                    </th>
                    <th id="percentage">
                     Percentage
                    </th>
                  </tr>
                  <tr>
                    <td id="tableMain">
                     Boys 
                    </td>
                    <td id="school">
                      <?php $database -> display_message($boy); ?>
                    </td>
                    <td id="percentage">
                      <?php $database -> display_message($boyp); ?>
                    </td>
                  </tr>
                  <tr>
                    <td id="tableMain">
                      Girls
                    </td>
                    <td id="school">
                      <?php $database -> display_message($girl); ?>
                    </td>
                    <td id="percentage">
                      <?php $database -> display_message($girlp); ?>
                    </td>
                  </tr>
                  <tr>
                    <td id="tableMain">
                     Mixed
                    </td>
                    <td id="school">
                      <?php $database -> display_message($mix); ?>
                    </td>
                    <td id="percentage">
                      <?php $database -> display_message($mixp); ?>
                    </td>
                  </tr>
                  <tr>
                    <td id="tableMain">
                      Girls without AL/Primary
                    </td>
                    <td id="school">
                      <?php $database -> display_message($girlal); ?>
                    </td>
                    <td id="percentage">
                      <?php $database -> display_message($girlalp); ?>
                    </td>
                  </tr>
                  <tr>
                    <td id="tableMain">
                     Boys without AL/Primary
                    </td>
                    <td id="school">
                      <?php $database -> display_message($boyal); ?>
                    </td>
                    <td id="percentage">
                      <?php $database -> display_message($boyalp); ?>
                    </td>
                  </tr>
                </table>
            <?php
          }
          elseif($type == "province" AND isset($_POST['gender'])){
            $boy = $girl = $mix = $girlal = $boyal = 0;
            $zone_id = $office['eo_id'];

            $province_query = $database -> table_search_by_element($office['office_no'],'education_office','higher_provi_no');
            if(mysqli_num_rows($province_query) > 0){
                while($province = mysqli_fetch_assoc($province_query)){
                  $div_id = $database -> table_by_id($province['office_no'],'education_office','office_no');
                  $school_query = $database -> table_search_by_element($div_id['eo_id'],'school','edu_division');
                  if(mysqli_num_rows($school_query) > 0){
                    while($school = mysqli_fetch_assoc($school_query)){
                      if($school['cat_by_gen'] == 1){
                        $boy++;
                      }elseif ($school['cat_by_gen'] == 2) {
                        $girl++;
                      }elseif($school['cat_by_gen'] == 3){
                        $mix++;
                      }elseif ($school['cat_by_gen'] == 4) {
                        $girlal++;
                      }elseif($school['cat_by_gen'] == 5){
                        $boyal++;
                      }
                    }
                  }
                }
              }
                $total = $boy+$girl+$mix+$girlal+$boyal;
                $boyp = round($boy*100/$total,1);
                $girlp = round($girl*100/$total,1);
                $mixp = round($mix*100/$total,1);
                $girlalp = round($girlal*100/$total,1);
                $boyalp = round($boyal*100/$total,1);
                ?>
                <table class="table table-hover">
                  <tr>
                    <th id="tableMain">
                      Gender
                    </th>
                    <th id="school">
                      Schools
                    </th>
                    <th id="percentage">
                     Percentage
                    </th>
                  </tr>
                  <tr>
                    <td id="tableMain">
                     Boys 
                    </td>
                    <td id="school">
                      <?php $database -> display_message($boy); ?>
                    </td>
                    <td id="percentage">
                      <?php $database -> display_message($boyp); ?>
                    </td>
                  </tr>
                  <tr>
                    <td id="tableMain">
                      Girls
                    </td>
                    <td id="school">
                      <?php $database -> display_message($girl); ?>
                    </td>
                    <td id="percentage">
                      <?php $database -> display_message($girlp); ?>
                    </td>
                  </tr>
                  <tr>
                    <td id="tableMain">
                     Mixed
                    </td>
                    <td id="school">
                      <?php $database -> display_message($mix); ?>
                    </td>
                    <td id="percentage">
                      <?php $database -> display_message($mixp); ?>
                    </td>
                  </tr>
                  <tr>
                    <td id="tableMain">
                      Girls without AL/Primary
                    </td>
                    <td id="school">
                      <?php $database -> display_message($girlal); ?>
                    </td>
                    <td id="percentage">
                      <?php $database -> display_message($girlalp); ?>
                    </td>
                  </tr>
                  <tr>
                    <td id="tableMain">
                     Boys without AL/Primary
                    </td>
                    <td id="school">
                      <?php $database -> display_message($boyal); ?>
                    </td>
                    <td id="percentage">
                      <?php $database -> display_message($boyalp); ?>
                    </td>
                  </tr>
                </table>
            <?php
          }
          elseif($type == "country" AND isset($_POST['gender'])){
            $boy = $girl = $mix = $girlal = $boyal = 0;
            $school_query = $database -> table_search('school');
            if(mysqli_num_rows($school_query) > 0){
                while($school = mysqli_fetch_assoc($school_query)){
                  if($school['cat_by_gen'] == 1){
                    $boy++;
                  }elseif ($school['cat_by_gen'] == 2) {
                    $girl++;
                  }elseif($school['cat_by_gen'] == 3){
                    $mix++;
                  }elseif ($school['cat_by_gen'] == 4) {
                    $girlal++;
                  }elseif($school['cat_by_gen'] == 5){
                    $boyal++;
                  }
                }
            }
            $total = $boy+$girl+$mix+$girlal+$boyal;
            $boyp = round($boy*100/$total,1);
            $girlp = round($girl*100/$total,1);
            $mixp = round($mix*100/$total,1);
            $girlalp = round($girlal*100/$total,1);
            $boyalp = round($boyal*100/$total,1);
            ?>
            <table class="table table-hover">
              <tr>
                <th id="tableMain">
                  Gender
                </th>
                <th id="school">
                  Schools
                </th>
                <th id="percentage">
                 Percentage
                </th>
              </tr>
              <tr>
                <td id="tableMain">
                 Boys 
                </td>
                <td id="school">
                  <?php $database -> display_message($boy); ?>
                </td>
                <td id="percentage">
                  <?php $database -> display_message($boyp); ?>
                </td>
              </tr>
              <tr>
                <td id="tableMain">
                  Girls
                </td>
                <td id="school">
                  <?php $database -> display_message($girl); ?>
                </td>
                <td id="percentage">
                  <?php $database -> display_message($girlp); ?>
                </td>
              </tr>
              <tr>
                <td id="tableMain">
                 Mixed
                </td>
                <td id="school">
                  <?php $database -> display_message($mix); ?>
                </td>
                <td id="percentage">
                  <?php $database -> display_message($mixp); ?>
                </td>
              </tr>
              <tr>
                <td id="tableMain">
                  Girls without AL/Primary
                </td>
                <td id="school">
                  <?php $database -> display_message($girlal); ?>
                </td>
                <td id="percentage">
                  <?php $database -> display_message($girlalp); ?>
                </td>
              </tr>
              <tr>
                <td id="tableMain">
                 Boys without AL/Primary
                </td>
                <td id="school">
                  <?php $database -> display_message($boyal); ?>
                </td>
                <td id="percentage">
                  <?php $database -> display_message($boyalp); ?>
                </td>
              </tr>
            </table>
            <?php
          }
          elseif($type == "division" AND isset($_POST['facility'])){
            $mc = $c = $nc = $d = $vd = 0;
            $div_id = $office['eo_id'];
            $school_query = $database -> table_search_by_element($div_id,'school','edu_division');
            if(mysqli_num_rows($school_query) > 0){
                while($school = mysqli_fetch_assoc($school_query)){
                  if($school['cat_by_facil'] == 1){
                    $mc++;
                  }elseif ($school['cat_by_facil'] == 2) {
                    $c++;
                  }elseif ($school['cat_by_facil'] == 3) {
                    $nc++;
                  }elseif ($school['cat_by_facil'] == 4) {
                    $d++;
                  }elseif ($school['cat_by_facil'] == 5) {
                    $vd++;
                  }
                }
            }
            $total = $mc+$c+$nc+$d+$vd;
            $mcp = round($mc*100/$total,1);
            $cp = round($c*100/$total,1);
            $ncp = round($nc*100/$total,1);
            $dp = round($d*100/$total,1);
            $vdp = round($vd*100/$total,1);
            ?>
            <table class="table table-hover">
              <tr>
                <th id="tableMain">
                  Facility
                </th>
                <th id="school">
                  Schools
                </th>
                <th id="percentage">
                 Percentage
                </th>
              </tr>
              <tr>
                <td id="tableMain">
                 More Convenient 
                </td>
                <td id="school">
                  <?php $database -> display_message($mc); ?>
                </td>
                <td id="percentage">
                  <?php $database -> display_message($mcp); ?>
                </td>
              </tr>
              <tr>
                <td id="tableMain">
                 Convenient
                </td>
                <td id="school">
                  <?php $database -> display_message($c); ?>
                </td>
                <td id="percentage">
                  <?php $database -> display_message($cp); ?>
                </td>
              </tr>
              <tr>
                <td id="tableMain">
                 Not Convenient 
                </td>
                <td id="school">
                  <?php $database -> display_message($nc); ?>
                </td>
                <td id="percentage">
                  <?php $database -> display_message($ncp); ?>
                </td>
              </tr>
              <tr>
                <td id="tableMain">
                 Difficult 
                </td>
                <td id="school">
                  <?php $database -> display_message($d); ?>
                </td>
                <td id="percentage">
                  <?php $database -> display_message($dp); ?>
                </td>
              </tr>
              <tr>
                <td id="tableMain">
                  Very Difficult
                </td>
                <td id="school">
                  <?php $database -> display_message($vd); ?>
                </td>
                <td id="percentage">
                  <?php $database -> display_message($vdp); ?>
                </td>
              </tr>
            </table>
            <?php
          }
          elseif($type == "zone" AND isset($_POST['facility'])){
            $mc = $c = $nc = $d = $vd = 0;
            $zone_id = $office['eo_id'];

            $zone_query = $database -> table_search_by_element($office['office_no'],'education_office','higher_zone_no');
            if(mysqli_num_rows($zone_query) > 0){
                while($zone = mysqli_fetch_assoc($zone_query)){
                  $div_id = $database -> table_by_id($zone['office_no'],'education_office','office_no');
                  $school_query = $database -> table_search_by_element($div_id['eo_id'],'school','edu_division');
                  if(mysqli_num_rows($school_query) > 0){
                    while($school = mysqli_fetch_assoc($school_query)){
                      if($school['cat_by_facil'] == 1){
                        $mc++;
                      }elseif ($school['cat_by_facil'] == 2) {
                        $c++;
                      }elseif ($school['cat_by_facil'] == 3) {
                        $nc++;
                      }elseif ($school['cat_by_facil'] == 4) {
                        $d++;
                      }elseif ($school['cat_by_facil'] == 5) {
                        $vd++;
                      }
                    }
                  }
                }
              }
                $total = $mc+$c+$nc+$d+$vd;
                $mcp = round($mc*100/$total,1);
                $cp = round($c*100/$total,1);
                $ncp = round($nc*100/$total,1);
                $dp = round($d*100/$total,1);
                $vdp = round($vd*100/$total,1);
                ?>
                <table class="table table-hover">
                  <tr>
                    <th id="tableMain">
                      Facility
                    </th>
                    <th id="school">
                      Schools
                    </th>
                    <th id="percentage">
                     Percentage
                    </th>
                  </tr>
                  <tr>
                    <td id="tableMain">
                     More Convenient 
                    </td>
                    <td id="school">
                      <?php $database -> display_message($mc); ?>
                    </td>
                    <td id="percentage">
                      <?php $database -> display_message($mcp); ?>
                    </td>
                  </tr>
                  <tr>
                    <td id="tableMain">
                     Convenient
                    </td>
                    <td id="school">
                      <?php $database -> display_message($c); ?>
                    </td>
                    <td id="percentage">
                      <?php $database -> display_message($cp); ?>
                    </td>
                  </tr>
                  <tr>
                    <td id="tableMain">
                     Not Convenient 
                    </td>
                    <td id="school">
                      <?php $database -> display_message($nc); ?>
                    </td>
                    <td id="percentage">
                      <?php $database -> display_message($ncp); ?>
                    </td>
                  </tr>
                  <tr>
                    <td id="tableMain">
                     Difficult 
                    </td>
                    <td id="school">
                      <?php $database -> display_message($d); ?>
                    </td>
                    <td id="percentage">
                      <?php $database -> display_message($dp); ?>
                    </td>
                  </tr>
                  <tr>
                    <td id="tableMain">
                      Very Difficult
                    </td>
                    <td id="school">
                      <?php $database -> display_message($vd); ?>
                    </td>
                    <td id="percentage">
                      <?php $database -> display_message($vdp); ?>
                    </td>
                  </tr>
                </table>
            <?php
          }
          elseif($type == "province" AND isset($_POST['facility'])){
            $mc = $c = $nc = $d = $vd = 0;
            $zone_id = $office['eo_id'];

            $province_query = $database -> table_search_by_element($office['office_no'],'education_office','higher_provi_no');
            if(mysqli_num_rows($province_query) > 0){
                while($province = mysqli_fetch_assoc($province_query)){
                  $div_id = $database -> table_by_id($province['office_no'],'education_office','office_no');
                  $school_query = $database -> table_search_by_element($div_id['eo_id'],'school','edu_division');
                  if(mysqli_num_rows($school_query) > 0){
                    while($school = mysqli_fetch_assoc($school_query)){
                      if($school['cat_by_facil'] == 1){
                        $mc++;
                      }elseif ($school['cat_by_facil'] == 2) {
                        $c++;
                      }elseif ($school['cat_by_facil'] == 3) {
                        $nc++;
                      }elseif ($school['cat_by_facil'] == 4) {
                        $d++;
                      }elseif ($school['cat_by_facil'] == 5) {
                        $vd++;
                      }
                    }
                  }
                }
              }
                $total = $mc+$c+$nc+$d+$vd;
                $mcp = round($mc*100/$total,1);
                $cp = round($c*100/$total,1);
                $ncp = round($nc*100/$total,1);
                $dp = round($d*100/$total,1);
                $vdp = round($vd*100/$total,1);
                ?>
                <table class="table table-hover">
                  <tr>
                    <th id="tableMain">
                      Facility
                    </th>
                    <th id="school">
                      Schools
                    </th>
                    <th id="percentage">
                     Percentage
                    </th>
                  </tr>
                  <tr>
                    <td id="tableMain">
                     More Convenient 
                    </td>
                    <td id="school">
                      <?php $database -> display_message($mc); ?>
                    </td>
                    <td id="percentage">
                      <?php $database -> display_message($mcp); ?>
                    </td>
                  </tr>
                  <tr>
                    <td id="tableMain">
                     Convenient
                    </td>
                    <td id="school">
                      <?php $database -> display_message($c); ?>
                    </td>
                    <td id="percentage">
                      <?php $database -> display_message($cp); ?>
                    </td>
                  </tr>
                  <tr>
                    <td id="tableMain">
                     Not Convenient 
                    </td>
                    <td id="school">
                      <?php $database -> display_message($nc); ?>
                    </td>
                    <td id="percentage">
                      <?php $database -> display_message($ncp); ?>
                    </td>
                  </tr>
                  <tr>
                    <td id="tableMain">
                     Difficult 
                    </td>
                    <td id="school">
                      <?php $database -> display_message($d); ?>
                    </td>
                    <td id="percentage">
                      <?php $database -> display_message($dp); ?>
                    </td>
                  </tr>
                  <tr>
                    <td id="tableMain">
                      Very Difficult
                    </td>
                    <td id="school">
                      <?php $database -> display_message($vd); ?>
                    </td>
                    <td id="percentage">
                      <?php $database -> display_message($vdp); ?>
                    </td>
                  </tr>
                </table>
            <?php
          }
          elseif($type == "country" AND isset($_POST['facility'])){
            $mc = $c = $nc = $d = $vd = 0;
            $school_query = $database -> table_search('school');
            if(mysqli_num_rows($school_query) > 0){
                while($school = mysqli_fetch_assoc($school_query)){
                  if($school['cat_by_facil'] == 1){
                    $mc++;
                  }elseif ($school['cat_by_facil'] == 2) {
                    $c++;
                  }elseif ($school['cat_by_facil'] == 3) {
                    $nc++;
                  }elseif ($school['cat_by_facil'] == 4) {
                    $d++;
                  }elseif ($school['cat_by_facil'] == 5) {
                    $vd++;
                  }
                }
            }
            $total = $mc+$c+$nc+$d+$vd;
            $mcp = round($mc*100/$total,1);
            $cp = round($c*100/$total,1);
            $ncp = round($nc*100/$total,1);
            $dp = round($d*100/$total,1);
            $vdp = round($vd*100/$total,1);
            ?>
            <table class="table table-hover">
              <tr>
                <th id="tableMain">
                  Facility
                </th>
                <th id="school">
                  Schools
                </th>
                <th id="percentage">
                 Percentage
                </th>
              </tr>
              <tr>
                <td id="tableMain">
                 More Convenient 
                </td>
                <td id="school">
                  <?php $database -> display_message($mc); ?>
                </td>
                <td id="percentage">
                  <?php $database -> display_message($mcp); ?>
                </td>
              </tr>
              <tr>
                <td id="tableMain">
                 Convenient
                </td>
                <td id="school">
                  <?php $database -> display_message($c); ?>
                </td>
                <td id="percentage">
                  <?php $database -> display_message($cp); ?>
                </td>
              </tr>
              <tr>
                <td id="tableMain">
                 Not Convenient 
                </td>
                <td id="school">
                  <?php $database -> display_message($nc); ?>
                </td>
                <td id="percentage">
                  <?php $database -> display_message($ncp); ?>
                </td>
              </tr>
              <tr>
                <td id="tableMain">
                 Difficult 
                </td>
                <td id="school">
                  <?php $database -> display_message($d); ?>
                </td>
                <td id="percentage">
                  <?php $database -> display_message($dp); ?>
                </td>
              </tr>
              <tr>
                <td id="tableMain">
                  Very Difficult
                </td>
                <td id="school">
                  <?php $database -> display_message($vd); ?>
                </td>
                <td id="percentage">
                  <?php $database -> display_message($vdp); ?>
                </td>
              </tr>
            </table>
            <?php
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

  
<?php if(isset($_POST['ethnicity'])) { ?>
  <script >
  google.load("visualization", "1", {packages:["corechart"]});
  google.setOnLoadCallback(drawChart1);
  function drawChart1() {
    var data = google.visualization.arrayToDataTable([
      ['Ethnicity', 'Amount'],
      ['Sinhala', <?php $database -> display_message($sinhala); ?>],
      ['Tamil', <?php $database -> display_message($tamil); ?>],
      ['Muslim', <?php $database -> display_message($muslim); ?>]
    ]);

    var options = {
      title: 'Ethnicity Static(Amount)',
      hAxis: {title: 'Ethnicity', titleTextStyle: {color: 'black'}}
   };

  var chart = new google.visualization.ColumnChart(document.getElementById('chart_div1'));
    chart.draw(data, options);
  }

  google.load("visualization", "1", {packages:["corechart"]});
  google.setOnLoadCallback(drawChart2);
  function drawChart2() {
    var data = google.visualization.arrayToDataTable([
      ['Ethnicity', 'Schools'],
      ['Sinhala', <?php $database -> display_message($sinhalap); ?>],
      ['Tamil', <?php $database -> display_message($tamilp); ?>],
      ['Muslim', <?php $database -> display_message($muslimp); ?>]
    ]);

    var options = {
      title: 'Ethnicity Static(Percentage)',
      hAxis: {title: 'Ethnicity',  titleTextStyle: {color: '#333'}},
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

<?php if(isset($_POST['authority'])) { ?>
  <script >
  google.load("visualization", "1", {packages:["corechart"]});
  google.setOnLoadCallback(drawChart1);
  function drawChart1() {
    var data = google.visualization.arrayToDataTable([
      ['Authority', 'Amount'],
      ['National Schools', <?php $database -> display_message($national); ?>],
      ['Province Schools', <?php $database -> display_message($provi); ?>]
    ]);

    var options = {
      title: 'Authority Static(Amount)',
      hAxis: {title: 'Authority', titleTextStyle: {color: 'black'}}
   };

  var chart = new google.visualization.ColumnChart(document.getElementById('chart_div1'));
    chart.draw(data, options);
  }

  google.load("visualization", "1", {packages:["corechart"]});
  google.setOnLoadCallback(drawChart2);
  function drawChart2() {
    var data = google.visualization.arrayToDataTable([
      ['Authority', 'Amount'],
      ['National Schools', <?php $database -> display_message($nationalp); ?>],
      ['Province Schools', <?php $database -> display_message($provip); ?>]
    ]);

    var options = {
      title: 'Authority Static(Percentage)',
      hAxis: {title: 'Authority',  titleTextStyle: {color: '#333'}},
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

<?php if(isset($_POST['language'])) { ?>
  <script >
  google.load("visualization", "1", {packages:["corechart"]});
  google.setOnLoadCallback(drawChart1);
  function drawChart1() {
    var data = google.visualization.arrayToDataTable([
      ['language', 'schools'],
      ['Sinhala', <?php $database -> display_message($sin); ?>],
      ['Tamil', <?php $database -> display_message($tam); ?>],
      ['English', <?php $database -> display_message($eng); ?>],
      ['Sinhala/Tamil', <?php $database -> display_message($sintam); ?>],
      ['Sinhala/English', <?php $database -> display_message($sineng); ?>],
      ['Tamil/English', <?php $database -> display_message($tameng); ?>],
      ['Sinhala/Tamil/English', <?php $database -> display_message($sintameng); ?>]
    ]);

    var options = {
      title: 'Language Static(Amount)',
      hAxis: {title: 'Language', titleTextStyle: {color: 'black'}}
   };

  var chart = new google.visualization.ColumnChart(document.getElementById('chart_div1'));
    chart.draw(data, options);
  }

  google.load("visualization", "1", {packages:["corechart"]});
  google.setOnLoadCallback(drawChart2);
  function drawChart2() {
    var data = google.visualization.arrayToDataTable([
      ['language', 'schools'],
      ['Sinhala', <?php $database -> display_message($sinp); ?>],
      ['Tamil', <?php $database -> display_message($tamp); ?>],
      ['English', <?php $database -> display_message($engp); ?>],
      ['Sinhala/Tamil', <?php $database -> display_message($sintamp); ?>],
      ['Sinhala/English', <?php $database -> display_message($sinengp); ?>],
      ['Tamil/English', <?php $database -> display_message($tamengp); ?>],
      ['Sinhala/Tamil/English', <?php $database -> display_message($sintamengp); ?>]
    ]);

    var options = {
      title: 'Language Static(Percentage)',
      hAxis: {title: 'Language',  titleTextStyle: {color: '#333'}},
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

<?php if(isset($_POST['class'])) { ?>
  <script >
  google.load("visualization", "1", {packages:["corechart"]});
  google.setOnLoadCallback(drawChart1);
  function drawChart1() {
    var data = google.visualization.arrayToDataTable([
      ['Classes', 'schools'],
      ['1-5', <?php $database -> display_message($onefive); ?>],
      ['1-8', <?php $database -> display_message($oneeight); ?>],
      ['1-11', <?php $database -> display_message($oneele); ?>],
      ['1-13', <?php $database -> display_message($onethir); ?>],
      ['6-11', <?php $database -> display_message($sixele); ?>],
      ['6-13', <?php $database -> display_message($sixthir); ?>],
      ['other', <?php $database -> display_message($other); ?>]
    ]);

    var options = {
      title: 'Class Static(Amount)',
      hAxis: {title: 'Classes', titleTextStyle: {color: 'black'}}
   };

  var chart = new google.visualization.ColumnChart(document.getElementById('chart_div1'));
    chart.draw(data, options);
  }

  google.load("visualization", "1", {packages:["corechart"]});
  google.setOnLoadCallback(drawChart2);
  function drawChart2() {
    var data = google.visualization.arrayToDataTable([
      ['Classes', 'schools'],
      ['1-5', <?php $database -> display_message($onefivep); ?>],
      ['1-8', <?php $database -> display_message($oneeightp); ?>],
      ['1-11', <?php $database -> display_message($oneelep); ?>],
      ['1-13', <?php $database -> display_message($onethirp); ?>],
      ['6-11', <?php $database -> display_message($sixelep); ?>],
      ['6-13', <?php $database -> display_message($sixthirp); ?>],
      ['other', <?php $database -> display_message($otherp); ?>]
    ]);

    var options = {
      title: 'Class Static(Percentage)',
      hAxis: {title: 'Classes',  titleTextStyle: {color: '#333'}},
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

<?php if(isset($_POST['density'])) { ?>
  <script >
  google.load("visualization", "1", {packages:["corechart"]});
  google.setOnLoadCallback(drawChart1);
  function drawChart1() {
    var data = google.visualization.arrayToDataTable([
      ['Catagory', 'schools'],
      ['1-AB', <?php $database -> display_message($ab); ?>],
      ['1-C', <?php $database -> display_message($c); ?>],
      ['Type-2', <?php $database -> display_message($t2); ?>],
      ['Type-3', <?php $database -> display_message($t3); ?>]
    ]);

    var options = {
      title: 'Density Static(Amount)',
      hAxis: {title: 'Density', titleTextStyle: {color: 'black'}}
   };

  var chart = new google.visualization.ColumnChart(document.getElementById('chart_div1'));
    chart.draw(data, options);
  }

  google.load("visualization", "1", {packages:["corechart"]});
  google.setOnLoadCallback(drawChart2);
  function drawChart2() {
    var data = google.visualization.arrayToDataTable([
      ['Catagory', 'schools'],
      ['1-AB', <?php $database -> display_message($abp); ?>],
      ['1-C', <?php $database -> display_message($cp); ?>],
      ['Type-2', <?php $database -> display_message($t2p); ?>],
      ['Type-3', <?php $database -> display_message($t3p); ?>]
    ]);

    var options = {
      title: 'Density Static(Percentage)',
      hAxis: {title: 'Density',  titleTextStyle: {color: '#333'}},
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
      ['Catagory', 'schools'],
      ['Boys', <?php $database -> display_message($boy); ?>],
      ['Girls', <?php $database -> display_message($girl); ?>],
      ['Mixed', <?php $database -> display_message($mix); ?>],
      ['Girls Exept AL/Primary', <?php $database -> display_message($girlal); ?>],
      ['Boys Exept AL/Primary', <?php $database -> display_message($boyal); ?>]
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
      ['Catagory', 'schools'],
      ['Boys', <?php $database -> display_message($boyp); ?>],
      ['Girls', <?php $database -> display_message($girlp); ?>],
      ['Mixed', <?php $database -> display_message($mixp); ?>],
      ['Girls Exept AL/Primary', <?php $database -> display_message($girlalp); ?>],
      ['Boys Exept AL/Primary', <?php $database -> display_message($boyalp); ?>]
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

<?php if(isset($_POST['facility'])) { ?>
  <script >
  google.load("visualization", "1", {packages:["corechart"]});
  google.setOnLoadCallback(drawChart1);
  function drawChart1() {
    var data = google.visualization.arrayToDataTable([
      ['Catagory', 'schools'],
      ['More Convenient', <?php $database -> display_message($mc); ?>],
      ['Convenient', <?php $database -> display_message($c); ?>],
      ['Not Convenient', <?php $database -> display_message($nc); ?>],
      ['Difficult', <?php $database -> display_message($d); ?>],
      ['Very Difficult', <?php $database -> display_message($vd); ?>]
    ]);

    var options = {
      title: 'Facility Static(Amount)',
      hAxis: {title: 'Facility', titleTextStyle: {color: 'black'}}
   };

  var chart = new google.visualization.ColumnChart(document.getElementById('chart_div1'));
    chart.draw(data, options);
  }

  google.load("visualization", "1", {packages:["corechart"]});
  google.setOnLoadCallback(drawChart2);
  function drawChart2() {
    var data = google.visualization.arrayToDataTable([
      ['Catagory', 'schools'],
      ['More Convenient', <?php $database -> display_message($mcp); ?>],
      ['Convenient', <?php $database -> display_message($cp); ?>],
      ['Not Convenient', <?php $database -> display_message($ncp); ?>],
      ['Difficult', <?php $database -> display_message($dp); ?>],
      ['Very Difficult', <?php $database -> display_message($vdp); ?>]
    ]);

    var options = {
      title: 'Facility Static(Percentage)',
      hAxis: {title: 'Facility',  titleTextStyle: {color: '#333'}},
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