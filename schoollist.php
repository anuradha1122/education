<?php include("database.php"); 
ob_start();
unset($_POST);
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
      text-align:left;

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

<div class="container-fluid">
  <div class="row">
    <div class="col-md-12 text-center">
      <h3>SCHOOLS</h3>
    </div>
  </div>
  <div class="row" >
      <div class="col-sm-4 col-sm-offset-4 col-xs-offset-0 justify-content-center">
     <table class="table table-hover">
      <tr>
        <th>
          Number
        </th>
        <th class="text-center">
          Name
        </th>
      </tr>
  <?php
  #page number 21

  $database = new Database();

  $database -> empty_session();
  //$database -> restricted_page('21');
  $office_no  = "";
  $ad_id              = $database -> session_to_variabal($_SESSION['ad_id']);
  $admin              = $database -> table_by_id($ad_id,'admin_staff','ad_id');
  if($admin['position'] == 6){
    $appointment        = $database -> current_admin_search($ad_id);
    $office_no           =$appointment['office_no'];
  }

  if(isset($_GET['number'])){
      $number  = strtoupper($_GET['number']);
      $office = $database -> table_by_id($number, 'education_office', 'office_no');
      if($office <> NULL){
        $number_arr = str_split($number);
        if($number_arr[1] == 0 AND $number_arr[2] == 0 AND $number_arr[3] == 0 AND $number_arr[4] == 0 AND $number_arr[5] == 0){
          $school_query = $database -> table_search('school');
          if(mysqli_num_rows($school_query) > 0){
            ?>
            <tr>
              <td style="background-color: #cc6633;">
                
              </td>
              <td style="background-color: #cc6633;">
                National Schools (Sinhala)
              </td>
            </tr>
            <?php
            while($school = mysqli_fetch_assoc($school_query)){
              if($school['cat_by_auth'] == 1 AND $school['cat_by_lang'] == 1) {
                ?>
                <tr>
                <td id="schoolNo">

                <?php 
                if($office_no == $number){
                ?>
                <a href="schoolinsight.php?number=<?php $database -> display_message($school['school_no']); ?>">
                <?php
                  $database -> display_message($school['school_no']);
                ?>
                </a>
                <?php
                }else{
                  $database -> display_message($school['school_no']);
                }
                ?>
                </td>
                <td id="schoolName">
                <a href="schooldetails.php?number=<?php $database -> display_message($school['school_no']); ?>">
                <?php
                  $database -> display_message($school['name']);
                ?>
                </a>
                </td>
                </tr>
                
                <?php
              }
            }
          }

          $school_query = $database -> table_search('school');
          if(mysqli_num_rows($school_query) > 0){
            ?>
            <tr>
              <td style="background-color: #cc6633;">
                
              </td>
              <td style="background-color: #cc6633;">
                National Schools (Tamil)
              </td>
            </tr>
            <?php
            while($school = mysqli_fetch_assoc($school_query)){
              if($school['cat_by_auth'] == 1 AND $school['cat_by_lang'] == 2) {
                ?>
                <tr>
                <td id="schoolNo">
                <?php 
                if($office_no == $number){
                ?>
                <a href="schoolinsight.php?number=<?php $database -> display_message($school['school_no']); ?>">
                <?php
                  $database -> display_message($school['school_no']);
                ?>
                </a>
                <?php
                }else{
                  $database -> display_message($school['school_no']);
                }
                ?>
                </td>
                <td id="schoolName">
                <a href="schooldetails.php?number=<?php $database -> display_message($school['school_no']); ?>">
                <?php
                  $database -> display_message($school['name']);
                ?>
                </a>
                </td>
                </tr>
                
                <?php
              }
            }
          }

          $school_query = $database -> table_search('school');
          if(mysqli_num_rows($school_query) > 0){
            ?>
            <tr>
              <td style="background-color: #cc6633;">
                
              </td>
              <td style="background-color: #cc6633;">
                Provincial Schools (Sinhala)
              </td>
            </tr>
            <?php
            while($school = mysqli_fetch_assoc($school_query)){
              if($school['cat_by_auth'] == 2 AND $school['cat_by_lang'] == 1) {
                ?>
                <tr>
                <td id="schoolNo">
                <?php 
                if($office_no == $number){
                ?>
                <a href="schoolinsight.php?number=<?php $database -> display_message($school['school_no']); ?>">
                <?php
                  $database -> display_message($school['school_no']);
                ?>
                </a>
                <?php
                }else{
                  $database -> display_message($school['school_no']);
                }
                ?>
                </td>
                <td id="schoolName">
                <a href="schooldetails.php?number=<?php $database -> display_message($school['school_no']); ?>">
                <?php
                  $database -> display_message($school['name']);
                ?>
                </a>
                </td>
                </tr>
                
                <?php
              }
            }
          }

          $school_query = $database -> table_search('school');
          if(mysqli_num_rows($school_query) > 0){
            ?>
            <tr>
              <td style="background-color: #cc6633;">
                
              </td>
              <td style="background-color: #cc6633;">
                Provicial Schools (Tamil)
              </td>
            </tr>
            <?php
            while($school = mysqli_fetch_assoc($school_query)){
              if($school['cat_by_auth'] == 2 AND $school['cat_by_lang'] == 2) {
                ?>
                <tr>
                <td id="schoolNo">
                <?php 
                if($office_no == $number){
                ?>
                <a href="schoolinsight.php?number=<?php $database -> display_message($school['school_no']); ?>">
                <?php
                  $database -> display_message($school['school_no']);
                ?>
                </a>
                <?php
                }else{
                  $database -> display_message($school['school_no']);
                }
                ?>
                </td>
                <td id="schoolName">
                <a href="schooldetails.php?number=<?php $database -> display_message($school['school_no']); ?>">
                <?php
                  $database -> display_message($school['name']);
                ?>
                </a>
                </td>
                </tr>
                
                <?php
              }
            }
          }
          
        }elseif ($number_arr[2] == 0 AND $number_arr[3] == 0 AND $number_arr[4] == 0 AND $number_arr[5] == 0) {
          $office_query = $database -> table_search_by_element($number,'education_office','higher_provi_no');
          if(mysqli_num_rows($office_query) > 0){
            ?>
            <tr>
              <td style="background-color: #cc6633;">
                
              </td>
              <td style="background-color: #cc6633;">
                National Schools (Sinhala)
              </td>
            </tr>
            <?php
            while($office = mysqli_fetch_assoc($office_query)){
               $provi_arr = str_split($office['office_no']);
               if($provi_arr[4] <> 0 OR $provi_arr[5] <> 0){

                $eo_id = $office['eo_id'];
                $school_query = $database -> table_search_by_element($eo_id,'school','edu_division');
                  if(mysqli_num_rows($school_query) > 0){
                    
                    while($school = mysqli_fetch_assoc($school_query)){
                      if($school['cat_by_auth'] == 1 AND $school['cat_by_lang'] == 1) {
                        ?>
                        <tr>
                        <td id="schoolNo">
                        <?php 
                        if($office_no == $number){
                        ?>
                        <a href="schoolinsight.php?number=<?php $database -> display_message($school['school_no']); ?>">
                        <?php
                          $database -> display_message($school['school_no']);
                        ?>
                        </a>
                        <?php
                        }else{
                          $database -> display_message($school['school_no']);
                        }
                        ?>
                        </td>
                        <td id="schoolName">
                        <a href="schooldetails.php?number=<?php $database -> display_message($school['school_no']); ?>">
                        <?php
                          $database -> display_message($school['name']);
                        ?>
                        </a>
                        </td>
                        </tr>
                        
                        <?php
                      }
                    }
                  }
               }
            }
          }
          $office_query = $database -> table_search_by_element($number,'education_office','higher_provi_no');
          if(mysqli_num_rows($office_query) > 0){
            ?>
            <tr>
              <td style="background-color: #cc6633;">
                
              </td>
              <td style="background-color: #cc6633;">
                National Schools (Tamil)
              </td>
            </tr>
            <?php
            while($office = mysqli_fetch_assoc($office_query)){
               $provi_arr = str_split($office['office_no']);
               if($provi_arr[4] <> 0 OR $provi_arr[5] <> 0){

                $eo_id = $office['eo_id'];
                $school_query = $database -> table_search_by_element($eo_id,'school','edu_division');
                  if(mysqli_num_rows($school_query) > 0){
                    
                    while($school = mysqli_fetch_assoc($school_query)){
                      if($school['cat_by_auth'] == 1 AND $school['cat_by_lang'] == 2) {
                        ?>
                        <tr>
                        <td id="schoolNo">
                        <?php 
                        if($office_no == $number){
                        ?>
                        <a href="schoolinsight.php?number=<?php $database -> display_message($school['school_no']); ?>">
                        <?php
                          $database -> display_message($school['school_no']);
                        ?>
                        </a>
                        <?php
                        }else{
                          $database -> display_message($school['school_no']);
                        }
                        ?>
                        </td>
                        <td id="schoolName">
                        <a href="schooldetails.php?number=<?php $database -> display_message($school['school_no']); ?>">
                        <?php
                          $database -> display_message($school['name']);
                        ?>
                        </a>
                        </td>
                        </tr>
                        
                        <?php
                      }
                    }
                  }
               }
            }
          }
          $office_query = $database -> table_search_by_element($number,'education_office','higher_provi_no');
          if(mysqli_num_rows($office_query) > 0){
            ?>
            <tr>
              <td style="background-color: #cc6633;">
                
              </td>
              <td style="background-color: #cc6633;">
                Province Schools (Sinhala)
              </td>
            </tr>
            <?php
            while($office = mysqli_fetch_assoc($office_query)){
               $provi_arr = str_split($office['office_no']);
               if($provi_arr[4] <> 0 OR $provi_arr[5] <> 0){

                $eo_id = $office['eo_id'];
                $school_query = $database -> table_search_by_element($eo_id,'school','edu_division');
                  if(mysqli_num_rows($school_query) > 0){
                    
                    while($school = mysqli_fetch_assoc($school_query)){
                      if($school['cat_by_auth'] == 2 AND $school['cat_by_lang'] == 1) {
                        ?>
                        <tr>
                        <td id="schoolNo">
                        <?php 
                        if($office_no == $number){
                        ?>
                        <a href="schoolinsight.php?number=<?php $database -> display_message($school['school_no']); ?>">
                        <?php
                          $database -> display_message($school['school_no']);
                        ?>
                        </a>
                        <?php
                        }else{
                          $database -> display_message($school['school_no']);
                        }
                        ?>
                        </td>
                        <td id="schoolName">
                        <a href="schooldetails.php?number=<?php $database -> display_message($school['school_no']); ?>">
                        <?php
                          $database -> display_message($school['name']);
                        ?>
                        </a>
                        </td>
                        </tr>
                        
                        <?php
                      }
                    }
                  }
               }
            }
          }
          $office_query = $database -> table_search_by_element($number,'education_office','higher_provi_no');
          if(mysqli_num_rows($office_query) > 0){
            ?>
            <tr>
              <td style="background-color: #cc6633;">
                
              </td>
              <td style="background-color: #cc6633;">
                Province Schools (Tamil)
              </td>
            </tr>
            <?php
            while($office = mysqli_fetch_assoc($office_query)){
               $provi_arr = str_split($office['office_no']);
               if($provi_arr[4] <> 0 OR $provi_arr[5] <> 0){

                $eo_id = $office['eo_id'];
                $school_query = $database -> table_search_by_element($eo_id,'school','edu_division');
                  if(mysqli_num_rows($school_query) > 0){
                    
                    while($school = mysqli_fetch_assoc($school_query)){
                      if($school['cat_by_auth'] == 2 AND $school['cat_by_lang'] == 2) {
                        ?>
                        <tr>
                        <td id="schoolNo">
                        <?php 
                        if($office_no == $number){
                        ?>
                        <a href="schoolinsight.php?number=<?php $database -> display_message($school['school_no']); ?>">
                        <?php
                          $database -> display_message($school['school_no']);
                        ?>
                        </a>
                        <?php
                        }else{
                          $database -> display_message($school['school_no']);
                        }
                        ?>
                        </td>
                        <td id="schoolName">
                        <a href="schooldetails.php?number=<?php $database -> display_message($school['school_no']); ?>">
                        <?php
                          $database -> display_message($school['name']);
                        ?>
                        </a>
                        </td>
                        </tr>
                        
                        <?php
                      }
                    }
                  }
               }
            }
          }

        }elseif ($number_arr[4] == 0 AND $number_arr[5] == 0) {
          $office_query = $database -> table_search_by_element($number,'education_office','higher_zone_no');
          if(mysqli_num_rows($office_query) > 0){
            ?>
            <tr>
              <td style="background-color: #cc6633;">
                
              </td>
              <td style="background-color: #cc6633;">
                National Schools (Sinhala)
              </td>
            </tr>
            <?php
            while($office = mysqli_fetch_assoc($office_query)){
               $zone_arr = str_split($office['office_no']);
               if($zone_arr[4] <> 0 OR $zone_arr[5] <> 0){

                $eo_id = $office['eo_id'];
                $school_query = $database -> table_search_by_element($eo_id,'school','edu_division');
                  if(mysqli_num_rows($school_query) > 0){
                    while($school = mysqli_fetch_assoc($school_query)){
                      if($school['cat_by_auth'] == 1 AND $school['cat_by_lang'] == 1) {
                        ?>
                        <tr>
                        <td id="schoolNo">
                        <?php 
                        if($office_no == $number){
                        ?>
                        <a href="schoolinsight.php?number=<?php $database -> display_message($school['school_no']); ?>">
                        <?php
                          $database -> display_message($school['school_no']);
                        ?>
                        </a>
                        <?php
                        }else{
                          $database -> display_message($school['school_no']);
                        }
                        ?>
                        </td>
                        <td id="schoolName">
                        <a href="schooldetails.php?number=<?php $database -> display_message($school['school_no']); ?>">
                        <?php
                          $database -> display_message($school['name']);
                        ?>
                        </a>
                        </td>
                        </tr>
                        
                        <?php
                      }
                    }
                  }
               }
            }
          }

          $office_query = $database -> table_search_by_element($number,'education_office','higher_zone_no');
          if(mysqli_num_rows($office_query) > 0){
            ?>
            <tr>
              <td style="background-color: #cc6633;">
                
              </td>
              <td style="background-color: #cc6633;">
                National Schools (Tamil)
              </td>
            </tr>
            <?php
            while($office = mysqli_fetch_assoc($office_query)){
               $zone_arr = str_split($office['office_no']);
               if($zone_arr[4] <> 0 OR $zone_arr[5] <> 0){

                $eo_id = $office['eo_id'];
                $school_query = $database -> table_search_by_element($eo_id,'school','edu_division');
                  if(mysqli_num_rows($school_query) > 0){
                    while($school = mysqli_fetch_assoc($school_query)){
                      if($school['cat_by_auth'] == 1 AND $school['cat_by_lang'] == 2) {
                        ?>
                        <tr>
                        <td id="schoolNo">
                        <?php 
                        if($office_no == $number){
                        ?>
                        <a href="schoolinsight.php?number=<?php $database -> display_message($school['school_no']); ?>">
                        <?php
                          $database -> display_message($school['school_no']);
                        ?>
                        </a>
                        <?php
                        }else{
                          $database -> display_message($school['school_no']);
                        }
                        ?>
                        </td>
                        <td id="schoolName">
                        <a href="schooldetails.php?number=<?php $database -> display_message($school['school_no']); ?>">
                        <?php
                          $database -> display_message($school['name']);
                        ?>
                        </a>
                        </td>
                        </tr>
                        
                        <?php
                      }
                    }
                  }
               }
            }
          }

          $office_query = $database -> table_search_by_element($number,'education_office','higher_zone_no');
          if(mysqli_num_rows($office_query) > 0){
            ?>
            <tr>
              <td style="background-color: #cc6633;">
                
              </td>
              <td style="background-color: #cc6633;">
                Province Schools (Sinhala)
              </td>
            </tr>
            <?php
            while($office = mysqli_fetch_assoc($office_query)){
               $zone_arr = str_split($office['office_no']);
               if($zone_arr[4] <> 0 OR $zone_arr[5] <> 0){

                $eo_id = $office['eo_id'];
                $school_query = $database -> table_search_by_element($eo_id,'school','edu_division');
                  if(mysqli_num_rows($school_query) > 0){
                    while($school = mysqli_fetch_assoc($school_query)){
                      if($school['cat_by_auth'] == 2 AND $school['cat_by_lang'] == 1) {
                        ?>
                        <tr>
                        <td id="schoolNo">
                        <?php 
                        if($office_no == $number){
                        ?>
                        <a href="schoolinsight.php?number=<?php $database -> display_message($school['school_no']); ?>">
                        <?php
                          $database -> display_message($school['school_no']);
                        ?>
                        </a>
                        <?php
                        }else{
                          $database -> display_message($school['school_no']);
                        }
                        ?>
                        </td>
                        <td id="schoolName">
                        <a href="schooldetails.php?number=<?php $database -> display_message($school['school_no']); ?>">
                        <?php
                          $database -> display_message($school['name']);
                        ?>
                        </a>
                        </td>
                        </tr>
                        
                        <?php
                      }
                    }
                  }
               }
            }
          }

          $office_query = $database -> table_search_by_element($number,'education_office','higher_zone_no');
          if(mysqli_num_rows($office_query) > 0){
            ?>
            <tr>
              <td style="background-color: #cc6633;">
                
              </td>
              <td style="background-color: #cc6633;">
                Province Schools (Tamil)
              </td>
            </tr>
            <?php
            while($office = mysqli_fetch_assoc($office_query)){
               $zone_arr = str_split($office['office_no']);
               if($zone_arr[4] <> 0 OR $zone_arr[5] <> 0){

                $eo_id = $office['eo_id'];
                $school_query = $database -> table_search_by_element($eo_id,'school','edu_division');
                  if(mysqli_num_rows($school_query) > 0){
                    while($school = mysqli_fetch_assoc($school_query)){
                      if($school['cat_by_auth'] == 2 AND $school['cat_by_lang'] == 2) {
                        ?>
                        <tr>
                        <td id="schoolNo">
                        <?php 
                        if($office_no == $number){
                        ?>
                        <a href="schoolinsight.php?number=<?php $database -> display_message($school['school_no']); ?>">
                        <?php
                          $database -> display_message($school['school_no']);
                        ?>
                        </a>
                        <?php
                        }else{
                          $database -> display_message($school['school_no']);
                        }
                        ?>
                        </td>
                        <td id="schoolName">
                        <a href="schooldetails.php?number=<?php $database -> display_message($school['school_no']); ?>">
                        <?php
                          $database -> display_message($school['name']);
                        ?>
                        </a>
                        </td>
                        </tr>
                        
                        <?php
                      }
                    }
                  }
               }
            }
          }
        }else {
          $office_query = $database -> table_search_by_element($number,'education_office','office_no');
          if(mysqli_num_rows($office_query) > 0){
            ?>
            <tr>
              <td style="background-color: #cc6633;">
                
              </td>
              <td style="background-color: #cc6633;">
                National Schools (Sinhala)
              </td>
            </tr>
            <?php
            while($office = mysqli_fetch_assoc($office_query)){
               $div_arr = str_split($office['office_no']);

                $eo_id = $office['eo_id'];
                $school_query = $database -> table_search_by_element($eo_id,'school','edu_division');
                  if(mysqli_num_rows($school_query) > 0){
                    while($school = mysqli_fetch_assoc($school_query)){
                      if($school['cat_by_auth'] == 1 AND $school['cat_by_lang'] == 1) {
                        ?>
                        <tr>
                        <td id="schoolNo">
                        <?php 
                        if($office_no == $number){
                        ?>
                        <a href="schoolinsight.php?number=<?php $database -> display_message($school['school_no']); ?>">
                        <?php
                          $database -> display_message($school['school_no']);
                        ?>
                        </a>
                        <?php
                        }else{
                          $database -> display_message($school['school_no']);
                        }
                        ?>
                        </td>
                        <td id="schoolName">
                        <a href="schooldetails.php?number=<?php $database -> display_message($school['school_no']); ?>">
                        <?php
                          $database -> display_message($school['name']);
                        ?>
                        </a>
                        </td>
                        </tr>
                        
                        <?php
                      }
                    }
                  }
            }
          }

          $office_query = $database -> table_search_by_element($number,'education_office','office_no');
          if(mysqli_num_rows($office_query) > 0){
            ?>
            <tr>
              <td style="background-color: #cc6633;">
                
              </td>
              <td style="background-color: #cc6633;">
                National Schools (Tamil)
              </td>
            </tr>
            <?php
            while($office = mysqli_fetch_assoc($office_query)){
               $div_arr = str_split($office['office_no']);

                $eo_id = $office['eo_id'];
                $school_query = $database -> table_search_by_element($eo_id,'school','edu_division');
                  if(mysqli_num_rows($school_query) > 0){
                    while($school = mysqli_fetch_assoc($school_query)){
                      if($school['cat_by_auth'] == 1 AND $school['cat_by_lang'] == 2) {
                        ?>
                        <tr>
                        <td id="schoolNo">
                        <?php 
                        if($office_no == $number){
                        ?>
                        <a href="schoolinsight.php?number=<?php $database -> display_message($school['school_no']); ?>">
                        <?php
                          $database -> display_message($school['school_no']);
                        ?>
                        </a>
                        <?php
                        }else{
                          $database -> display_message($school['school_no']);
                        }
                        ?>
                        </td>
                        <td id="schoolName">
                        <a href="schooldetails.php?number=<?php $database -> display_message($school['school_no']); ?>">
                        <?php
                          $database -> display_message($school['name']);
                        ?>
                        </a>
                        </td>
                        </tr>
                        
                        <?php
                      }
                    }
                  }
            }
          }

          $office_query = $database -> table_search_by_element($number,'education_office','office_no');
          if(mysqli_num_rows($office_query) > 0){
            ?>
            <tr>
              <td style="background-color: #cc6633;">
                
              </td>
              <td style="background-color: #cc6633;">
                Province Schools (Sinhala)
              </td>
            </tr>
            <?php
            while($office = mysqli_fetch_assoc($office_query)){
               $div_arr = str_split($office['office_no']);

                $eo_id = $office['eo_id'];
                $school_query = $database -> table_search_by_element($eo_id,'school','edu_division');
                  if(mysqli_num_rows($school_query) > 0){
                    while($school = mysqli_fetch_assoc($school_query)){
                      if($school['cat_by_auth'] == 2 AND $school['cat_by_lang'] == 1) {
                        ?>
                        <tr>
                        <td id="schoolNo">
                        <?php 
                        if($office_no == $number){
                        ?>
                        <a href="schoolinsight.php?number=<?php $database -> display_message($school['school_no']); ?>">
                        <?php
                          $database -> display_message($school['school_no']);
                        ?>
                        </a>
                        <?php
                        }else{
                          $database -> display_message($school['school_no']);
                        }
                        ?>
                        </td>
                        <td id="schoolName">
                        <a href="schooldetails.php?number=<?php $database -> display_message($school['school_no']); ?>">
                        <?php
                          $database -> display_message($school['name']);
                        ?>
                        </a>
                        </td>
                        </tr>
                        
                        <?php
                      }
                    }
                  }
            }
          }

          $office_query = $database -> table_search_by_element($number,'education_office','office_no');
          if(mysqli_num_rows($office_query) > 0){
            ?>
            <tr>
              <td style="background-color: #cc6633;">
                
              </td>
              <td style="background-color: #cc6633;">
                Province Schools (Tamil)
              </td>
            </tr>
            <?php
            while($office = mysqli_fetch_assoc($office_query)){
               $div_arr = str_split($office['office_no']);

                $eo_id = $office['eo_id'];
                $school_query = $database -> table_search_by_element($eo_id,'school','edu_division');
                  if(mysqli_num_rows($school_query) > 0){
                    while($school = mysqli_fetch_assoc($school_query)){
                      if($school['cat_by_auth'] == 2 AND $school['cat_by_lang'] == 2) {
                        ?>
                        <tr>
                        <td id="schoolNo">
                        <?php 
                        if($office_no == $number){
                        ?>
                        <a href="schoolinsight.php?number=<?php $database -> display_message($school['school_no']); ?>">
                        <?php
                          $database -> display_message($school['school_no']);
                        ?>
                        </a>
                        <?php
                        }else{
                          $database -> display_message($school['school_no']);
                        }
                        ?>
                        </td>
                        <td id="schoolName">
                        <a href="schooldetails.php?number=<?php $database -> display_message($school['school_no']); ?>">
                        <?php
                          $database -> display_message($school['name']);
                        ?>
                        </a>
                        </td>
                        </tr>
                        
                        <?php
                      }
                    }
                  }
            }
          }
        }
      }else{
        $database -> headerto('educationoffice.php');
      }
  }else{
    $database -> headerto('educationoffice.php');
  }
  ?>
  </table>
        </div>
      </div>  
  </div>
</div>
<footer class="container-fluid text-center">
  <div class="row footer">
    <p>2018 Copyright: xcodeweb.com</p>
  </div>
</footer>