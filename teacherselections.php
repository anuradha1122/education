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
  <script type="text/javascript">
    $('#radioBtn a').on('click', function(){
      var sel = $(this).data('title');
      var tog = $(this).data('toggle');
      $('#'+tog).prop('value', sel);
      
      $('a[data-toggle="'+tog+'"]').not('[data-title="'+sel+'"]').removeClass('active').addClass('notActive');
      $('a[data-toggle="'+tog+'"][data-title="'+sel+'"]').removeClass('notActive').addClass('active');
  })
  </script>
  <script type="text/javascript">
  $(document).ready(function(){
      $('.search-box input[type="text"]').on("keyup input", function(){
          /* Get input value on change */
          var inputVal = $(this).val();
          var resultDropdown = $(this).siblings(".result");
          if(inputVal.length){
              $.get("schoolandofficesearch.php", {term: inputVal}).done(function(data){
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
              $.get("subjectsearch.php", {term: inputVal}).done(function(data){
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
      width: 40%;
      text-align: right;
      
    }

    #tableBox {
      width: 60%;
      text-align:left;

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

    .slidecontainer {
    width: 100%;
}

.slider {
    -webkit-appearance: none;
    width: 100%;
    height: 25px;
    background: #d3d3d3;
    outline: none;
    opacity: 0.7;
    -webkit-transition: .2s;
    transition: opacity .2s;
}

.slider:hover {
    opacity: 1;
}

.slider::-webkit-slider-thumb {
    -webkit-appearance: none;
    appearance: none;
    width: 25px;
    height: 25px;
    background: blue;
    cursor: pointer;
}

.slider::-moz-range-thumb {
    width: 25px;
    height: 25px;
    background: #4CAF50;
    cursor: pointer;
}

.center-block {
  display: block;
  margin-right: auto;
  margin-left: auto;
}

.result,.result1,.result2 {

      position: absolute;
      background-color: black;
      color: white;
      z-index: 999;

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

?>
<div class="container-fluid">
  <div class="row">
    <div class="col-md-12 text-center">
      <h3>TEACHER SELECTIONS</h3>
    </div>
  </div>
  <form method="post" action="teacherselectionresults.php">

  <div class="row justify-content-center">
    <div class="col-sm-4 col-xs-12 justify-content-center">
      <div class="col-xs-12 text-center">
        <h4>Appointed Period:</h4>
      </div>
      <div class="col-xs-12 text-center">
        <input name="app_prd" type="range" min="0" max="40" value="40" class="slider" id="myRangeapoprd">
        <p>Appointed Period: <span id="demoapoprd"></span></p>
      </div>
    </div>
    <div class="col-sm-4 col-xs-12 justify-content-center">
      <div class="col-xs-12 text-center">
        <h4>Age:</h4>
      </div>
      <div class="col-xs-12 text-center">
        <input name="min_age" type="range" min="20" max="60" value="20" class="slider" id="myRangeminage">
        <p>Mininmum Age: <span id="demominage"></span></p>
      </div>
      <div class="col-xs-12 text-center">
        <input name="max_age" type="range" min="20" max="60" value="60" class="slider" id="myRangemaxage">
        <p>Maximam Age : <span id="demomaxage"></span></p>
      </div>
    </div>
    <div class="col-sm-4 col-xs-12 justify-content-center">
      <div class="col-xs-12 text-center">
        <h4>School Appointed Period:</h4>
      </div>
      <div class="col-xs-12 text-center">
        <input name="sch_prd" type="range" min="0" max="40" value="40" class="slider" id="myRangeschprd">
        <p>School Appointed Period: <span id="demoschprd"></span></p>
      </div>
    </div>
  </div>

  <div class="row justify-content-center">
    <div class="col-sm-4 col-xs-12 justify-content-center">
      <div class="col-xs-12 text-center">
        <h4>Education Office / School:</h4>
      </div>
      <div class="search-box col-xs-12 text-center">
        <label class="text col-xs-12">
          <input class="text-center" type="text" name="name" placeholder="No office School Selected">
          <div class="result col-xs-10 justify-content-center"></div>
        </label>   
      </div>
    </div>
    <div class="col-sm-4 col-xs-12 justify-content-center">
      <div class="col-xs-12 text-center">
        <h4>Appointed Subject:</h4>
      </div>
      <div class="search-box1 col-xs-12 text-center">
        <label class="text col-xs-12">
          <input class="text-center" type="text" name="ap_sub" placeholder="No Subject Selected">
          <div class="result1 col-xs-10 justify-content-center"></div>
        </label>   
      </div>
    </div>
    <div class="col-sm-4 col-xs-12 justify-content-center">
      <div class="col-xs-12 text-center">
        <h4>Teaching Subject:</h4>
      </div>
      <div class="search-box2 col-xs-12 text-center">
        <label class="text col-xs-12">
          <input class="text-center" type="text" name="te_sub" placeholder="No Subject Selected">
          <div class="result2 col-xs-10 justify-content-center"></div>
        </label>   
      </div>
    </div>
  </div>

  <div class="row justify-content-center">
    <div class="col-sm-4 col-xs-12 justify-content-center">
      <div class="col-xs-12 text-center">
        <h4>Gender:</h4>
      </div>
      <div class="col-xs-12 text-center">
        <div class="btn-group btn-group-toggle col-xs-12" data-toggle="buttons">
          <label class="btn btn-primary col-xs-12 active">
          <input type="radio" name="gender" value="0">
          All
          </label>
          <label class="btn btn-primary col-xs-12">
          <input type="radio" name="gender" value="1">
          Male
          </label>
          <label class="btn btn-primary col-xs-12">
          <input type="radio" name="gender" value="2">
          Female
          </label>
        </div>
      </div>
    </div>
    <div class="col-sm-4 col-xs-12 justify-content-center">
      <div class="col-xs-12 text-center">
        <h4>Civil_status:</h4>
      </div>
      <div class="col-xs-12 text-center">
        <div class="btn-group btn-group-toggle" data-toggle="buttons">
              <label class="btn btn-primary col-xs-12 active">
                <input type="radio" name="civil_status" id="civil_status" value="0"  autocomplete="off" >
                All Civil_status
              </label>
            <?php
            $civil_status_query = $database -> table_search('civil_status');
            while($civil_status = mysqli_fetch_assoc($civil_status_query)){ ?>
              <label class="btn btn-primary col-xs-12">
              <input type="radio" name="civil_status" id="civil_status" value="<?php echo $civil_status['cs_id']; ?>"  autocomplete="off" >
              <?php echo $civil_status['name'];
              $i='0'; ?>
              </label>
            <?php }
          ?>
        </div>
      </div>
    </div>
    <div class="col-sm-4 col-xs-12 justify-content-center">
      <div class="col-xs-12 text-center">
        <h4>Medium:</h4>
      </div>
      <div class="col-xs-12 text-center">
        <div class="btn-group btn-group-toggle" data-toggle="buttons">
              <label class="btn btn-primary col-xs-12 active">
                <input type="radio" name="medium" id="medium" value="0"  autocomplete="off" >
                All Mediums
              </label>
            <?php
            $medium_quary = $database -> table_search('medium');
            while($medium = mysqli_fetch_assoc($medium_quary)){ ?>
              <label class="btn btn-primary col-xs-12">
              <input type="radio" name="medium" id="medium" value="<?php echo $medium['md_id']; ?>"  autocomplete="off" >
              <?php echo $medium['name'];
              $i='0'; ?>
              </label>
            <?php }
          ?>
        </div>
      </div>
    </div>
  </div>

  <div class="row justify-content-center">
    <div class="col-sm-4 col-xs-12 justify-content-center">
      <div class="col-xs-12 text-center">
        <h4>Race:</h4>
      </div>
      <div class="col-xs-12 text-center">
        <div class="btn-group btn-group-toggle" data-toggle="buttons">
              <label class="btn btn-primary col-xs-12 active">
                <input type="radio" name="race" id="race" value="0"  autocomplete="off" >
                All Races
              </label>
            <?php
            $race_query = $database -> table_search('race');
            while($race = mysqli_fetch_assoc($race_query)){ ?>
              <label class="btn btn-primary col-xs-12">
              <input type="radio" name="race" id="race" value="<?php echo $race['ra_id']; ?>"  autocomplete="off" >
              <?php echo $race['name'];
              $i='0'; ?>
              </label>
            <?php }
          ?>
        </div>
      </div>
    </div>
    <div class="col-sm-4 col-xs-12 justify-content-center">
      <div class="col-xs-12 text-center">
        <h4>Religion:</h4>
      </div>
      <div class="col-xs-12 text-center">
        <div class="btn-group btn-group-toggle" data-toggle="buttons">
              <label class="btn btn-primary col-xs-12 active">
                <input type="radio" name="religion" id="religion" value="0"  autocomplete="off" >
                All Religions
              </label>
            <?php
            $religion_query = $database -> table_search('religion');
            while($religion = mysqli_fetch_assoc($religion_query)){ ?>
              <label class="btn btn-primary col-xs-12">
              <input type="radio" name="religion" id="religion" value="<?php echo $religion['rg_id']; ?>"  autocomplete="off" >
              <?php echo $religion['name'];
              $i='0'; ?>
              </label>
            <?php }
          ?>
        </div>
      </div>
    </div>
    <div class="col-sm-4 col-xs-12 justify-content-center">
      <div class="col-xs-12 text-center">
        <h4>Appointed Catagory:</h4>
      </div>
      <div class="col-xs-12 text-center">
        <div class="btn-group btn-group-toggle" data-toggle="buttons">
              <label class="btn btn-primary col-xs-12 active">
                <input type="radio" name="appoint_catagory" id="appoint_catagory" value="0"  autocomplete="off" >
                All Appointed catagory
              </label>
            <?php
            $appoint_catagory_query = $database -> table_search('appointment_catagory');
            while($appoint_catagory = mysqli_fetch_assoc($appoint_catagory_query)){ ?>
              <label class="btn btn-primary col-xs-12">
              <input type="radio" name="appoint_catagory" id="appoint_catagory" value="<?php echo $appoint_catagory['ct_id']; ?>"  autocomplete="off" >
              <?php echo $appoint_catagory['short_name'];
              $i='0'; ?>
              </label>
            <?php }
          ?>
        </div>
      </div>
    </div>
  </div>

  <div class="row justify-content-center">
    <div class="col-sm-4 col-xs-12 justify-content-center">
      <div class="col-xs-12 text-center">
        <h4>Education Qualification:</h4>
      </div>
      <div class="col-xs-12 text-center">
        <div class="btn-group btn-group-toggle" data-toggle="buttons">
              <label class="btn btn-primary col-xs-12 active">
                <input type="radio" name="edu_quali" id="edu_quali" value="0"  autocomplete="off" >
                All Qualifications
              </label>
            <?php
            $edu_quali_query = $database -> table_search('education_qualification');
            while($edu_quali = mysqli_fetch_assoc($edu_quali_query)){ ?>
              <label class="btn btn-primary col-xs-12">
              <input type="radio" name="edu_quali" id="edu_quali" value="<?php echo $edu_quali['eq_id']; ?>"  autocomplete="off" >
              <?php echo $edu_quali['name'];
              $i='0'; ?>
              </label>
            <?php }
          ?>
        </div>
      </div>
    </div>
    <div class="col-sm-4 col-xs-12 justify-content-center">
      <div class="col-xs-12 text-center">
        <h4>Rank:</h4>
      </div>
      <div class="col-xs-12 text-center">
        <div class="btn-group btn-group-toggle" data-toggle="buttons">
              <label class="btn btn-primary col-xs-12 active">
                <input type="radio" name="rank" id="rank" value="0"  autocomplete="off" >
                All Ranks
              </label>
            <?php
            $rank_quary = $database -> table_search_by_two_value('principal','teacher','rank','level');
            while($rank = mysqli_fetch_assoc($rank_quary)){ ?>
              <label class="btn btn-primary col-xs-12">
              <input type="radio" name="rank" id="rank" value="<?php echo $rank['rk_id']; ?>"  autocomplete="off" >
              <?php echo $rank['name'];
              $i='0'; ?>
              </label>
            <?php }
          ?>
        </div>
      </div>
    </div>
    <div class="col-sm-4 col-xs-12 justify-content-center">
      <div class="col-xs-12 text-center">
        <h4>Professional Qualification:</h4>
      </div>
      <div class="col-xs-12 text-center">
        <div class="btn-group btn-group-toggle" data-toggle="buttons">
              <label class="btn btn-primary col-xs-12 active">
                <input type="radio" name="prof_quali" id="prof_quali" value="0"  autocomplete="off" >
                All Qualifications
              </label>
            <?php
            $prof_quali_quary = $database -> table_search('prof_qualification');
            while($prof_quali = mysqli_fetch_assoc($prof_quali_quary)){ ?>
              <label class="btn btn-primary col-xs-12">
              <input type="radio" name="prof_quali" id="prof_quali" value="<?php echo $prof_quali['pq_id']; ?>"  autocomplete="off" >
              <?php echo $prof_quali['name'];
              $i='0'; ?>
              </label>
            <?php }
          ?>
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-md-12 text-center">
      <h3>SELECT FIELDS YOU WANT</h3>
    </div>
  </div>

  <div class="row justify-content-center">
    <div class="col-sm-3 col-xs-12 justify-content-center">
      <div class="col-xs-12 text-center">
        <h4>First Name</h4>
      </div>
      <div class="col-xs-12 text-center">
        <div class="btn-group btn-group-toggle justify-content" data-toggle="buttons">
          <label class="btn btn-primary">
            <input type="radio" name="first_name" value="yes">Yes
          </label>
          <label class="btn btn-primary active">
            <input type="radio" name="first_name" value="no">No
          </label>
        </div>
      </div>
    </div>
    <div class="col-sm-3 col-xs-12 justify-content-center">
      <div class="col-xs-12 text-center">
        <h4>Middle Name</h4>
      </div>
      <div class="col-xs-12 text-center">
        <div class="btn-group btn-group-toggle justify-content" data-toggle="buttons">
          <label class="btn btn-primary">
            <input type="radio" name="middle_name" value="yes">Yes
          </label>
          <label class="btn btn-primary active">
            <input type="radio" name="middle_name" value="no">No
          </label>
        </div>
      </div>
    </div>
    <div class="col-sm-3 col-xs-12 justify-content-center">
      <div class="col-xs-12 text-center">
        <h4>Last Name</h4>
      </div>
      <div class="col-xs-12 text-center">
        <div class="btn-group btn-group-toggle justify-content" data-toggle="buttons">
          <label class="btn btn-primary">
            <input type="radio" name="last_name" value="yes">Yes
          </label>
          <label class="btn btn-primary active">
            <input type="radio" name="last_name" value="no">No
          </label>
        </div>
      </div>
    </div>
    <div class="col-sm-3 col-xs-12 justify-content-center">
      <div class="col-xs-12 text-center">
        <h4>Sir Name</h4>
      </div>
      <div class="col-xs-12 text-center">
        <div class="btn-group btn-group-toggle justify-content" data-toggle="buttons">
          <label class="btn btn-primary">
            <input type="radio" name="sir_name" value="yes">Yes
          </label>
          <label class="btn btn-primary active">
            <input type="radio" name="sir_name" value="no">No
          </label>
        </div>
      </div>
    </div>
  </div>

  <div class="row justify-content-center">
    <div class="col-sm-3 col-xs-12 justify-content-center">
      <div class="col-xs-12 text-center">
        <h4>Birth Day</h4>
      </div>
      <div class="col-xs-12 text-center">
        <div class="btn-group btn-group-toggle justify-content" data-toggle="buttons">
          <label class="btn btn-primary">
            <input type="radio" name="birth_day" value="yes">Yes
          </label>
          <label class="btn btn-primary active">
            <input type="radio" name="birth_day" value="no">No
          </label>
        </div>
      </div>
    </div>
    <div class="col-sm-3 col-xs-12 justify-content-center">
      <div class="col-xs-12 text-center">
        <h4>Address</h4>
      </div>
      <div class="col-xs-12 text-center">
        <div class="btn-group btn-group-toggle justify-content" data-toggle="buttons">
          <label class="btn btn-primary">
            <input type="radio" name="address" value="yes">Yes
          </label>
          <label class="btn btn-primary active">
            <input type="radio" name="address" value="no">No
          </label>
        </div>
      </div>
    </div>
    <div class="col-sm-3 col-xs-12 justify-content-center">
      <div class="col-xs-12 text-center">
        <h4>Telephone</h4>
      </div>
      <div class="col-xs-12 text-center">
        <div class="btn-group btn-group-toggle justify-content" data-toggle="buttons">
          <label class="btn btn-primary">
            <input type="radio" name="telephone" value="yes">Yes
          </label>
          <label class="btn btn-primary active">
            <input type="radio" name="telephone" value="no">No
          </label>
        </div>
      </div>
    </div>
    <div class="col-sm-3 col-xs-12 justify-content-center">
      <div class="col-xs-12 text-center">
        <h4>Email</h4>
      </div>
      <div class="col-xs-12 text-center">
        <div class="btn-group btn-group-toggle justify-content" data-toggle="buttons">
          <label class="btn btn-primary">
            <input type="radio" name="email" value="yes">Yes
          </label>
          <label class="btn btn-primary active">
            <input type="radio" name="email" value="no">No
          </label>
        </div>
      </div>
    </div>
  </div>

  <div class="row justify-content-center">
    <div class="col-sm-3 col-xs-12 justify-content-center">
      <div class="col-xs-12 text-center">
        <h4>Gender</h4>
      </div>
      <div class="col-xs-12 text-center">
        <div class="btn-group btn-group-toggle justify-content" data-toggle="buttons">
          <label class="btn btn-primary">
            <input type="radio" name="gender_select" value="yes">Yes
          </label>
          <label class="btn btn-primary active">
            <input type="radio" name="gender_select" value="no">No
          </label>
        </div>
      </div>
    </div>
    <div class="col-sm-3 col-xs-12 justify-content-center">
      <div class="col-xs-12 text-center">
        <h4>Race</h4>
      </div>
      <div class="col-xs-12 text-center">
        <div class="btn-group btn-group-toggle justify-content" data-toggle="buttons">
          <label class="btn btn-primary">
            <input type="radio" name="race_select" value="yes">Yes
          </label>
          <label class="btn btn-primary active">
            <input type="radio" name="race_select" value="no">No
          </label>
        </div>
      </div>
    </div>
    <div class="col-sm-3 col-xs-12 justify-content-center">
      <div class="col-xs-12 text-center">
        <h4>Religion</h4>
      </div>
      <div class="col-xs-12 text-center">
        <div class="btn-group btn-group-toggle justify-content" data-toggle="buttons">
          <label class="btn btn-primary">
            <input type="radio" name="religion_select" value="yes">Yes
          </label>
          <label class="btn btn-primary active">
            <input type="radio" name="religion_select" value="no">No
          </label>
        </div>
      </div>
    </div>
    <div class="col-sm-3 col-xs-12 justify-content-center">
      <div class="col-xs-12 text-center">
        <h4>Civil Status</h4>
      </div>
      <div class="col-xs-12 text-center">
        <div class="btn-group btn-group-toggle justify-content" data-toggle="buttons">
          <label class="btn btn-primary">
            <input type="radio" name="civil_status_select" value="yes">Yes
          </label>
          <label class="btn btn-primary active">
            <input type="radio" name="civil_status_select" value="no">No
          </label>
        </div>
      </div>
    </div>
  </div>

  <div class="row justify-content-center">
    <div class="col-sm-3 col-xs-12 justify-content-center">
      <div class="col-xs-12 text-center">
        <h4>Appointed Date</h4>
      </div>
      <div class="col-xs-12 text-center">
        <div class="btn-group btn-group-toggle justify-content" data-toggle="buttons">
          <label class="btn btn-primary">
            <input type="radio" name="app_date_select" value="yes">Yes
          </label>
          <label class="btn btn-primary active">
            <input type="radio" name="app_date_select" value="no">No
          </label>
        </div>
      </div>
    </div>
    <div class="col-sm-3 col-xs-12 justify-content-center">
      <div class="col-xs-12 text-center">
        <h4>Current School Appointment</h4>
      </div>
      <div class="col-xs-12 text-center">
        <div class="btn-group btn-group-toggle justify-content" data-toggle="buttons">
          <label class="btn btn-primary">
            <input type="radio" name="cur_school_select" value="yes">Yes
          </label>
          <label class="btn btn-primary active">
            <input type="radio" name="cur_school_select" value="no">No
          </label>
        </div>
      </div>
    </div>
    <div class="col-sm-3 col-xs-12 justify-content-center">
      <div class="col-xs-12 text-center">
        <h4>Current School</h4>
      </div>
      <div class="col-xs-12 text-center">
        <div class="btn-group btn-group-toggle justify-content" data-toggle="buttons">
          <label class="btn btn-primary">
            <input type="radio" name="cur_scl_name_select" value="yes">Yes
          </label>
          <label class="btn btn-primary active">
            <input type="radio" name="cur_scl_name_select" value="no">No
          </label>
        </div>
      </div>
    </div>
    <div class="col-sm-3 col-xs-12 justify-content-center">
      <div class="col-xs-12 text-center">
        <h4>Medium</h4>
      </div>
      <div class="col-xs-12 text-center">
        <div class="btn-group btn-group-toggle justify-content" data-toggle="buttons">
          <label class="btn btn-primary">
            <input type="radio" name="medium_select" value="yes">Yes
          </label>
          <label class="btn btn-primary active">
            <input type="radio" name="medium_select" value="no">No
          </label>
        </div>
      </div>
    </div>
  </div>

  <div class="row justify-content-center">
    <div class="col-sm-3 col-xs-12 justify-content-center">
      <div class="col-xs-12 text-center">
        <h4>Education Qualifications</h4>
      </div>
      <div class="col-xs-12 text-center">
        <div class="btn-group btn-group-toggle justify-content" data-toggle="buttons">
          <label class="btn btn-primary">
            <input type="radio" name="edu_select" value="yes">Yes
          </label>
          <label class="btn btn-primary active">
            <input type="radio" name="edu_select" value="no">No
          </label>
        </div>
      </div>
    </div>
    <div class="col-sm-3 col-xs-12 justify-content-center">
      <div class="col-xs-12 text-center">
        <h4>Professional Qualifications</h4>
      </div>
      <div class="col-xs-12 text-center">
        <div class="btn-group btn-group-toggle justify-content" data-toggle="buttons">
          <label class="btn btn-primary">
            <input type="radio" name="pro_select" value="yes">Yes
          </label>
          <label class="btn btn-primary active">
            <input type="radio" name="pro_select" value="no">No
          </label>
        </div>
      </div>
    </div>
    <div class="col-sm-3 col-xs-12 justify-content-center">
      <div class="col-xs-12 text-center">
        <h4>Position</h4>
      </div>
      <div class="col-xs-12 text-center">
        <div class="btn-group btn-group-toggle justify-content" data-toggle="buttons">
          <label class="btn btn-primary">
            <input type="radio" name="position_select" value="yes">Yes
          </label>
          <label class="btn btn-primary active">
            <input type="radio" name="position_select" value="no">No
          </label>
        </div>
      </div>
    </div>
    <div class="col-sm-3 col-xs-12 justify-content-center">
      <div class="col-xs-12 text-center">
        <h4>rank</h4>
      </div>
      <div class="col-xs-12 text-center">
        <div class="btn-group btn-group-toggle justify-content" data-toggle="buttons">
          <label class="btn btn-primary">
            <input type="radio" name="rank_select" value="yes">Yes
          </label>
          <label class="btn btn-primary active">
            <input type="radio" name="rank_select" value="no">No
          </label>
        </div>
      </div>
    </div>
  </div>

  <div class="row justify-content-center">
    <div class="col-sm-3 col-xs-12 justify-content-center">
      <div class="col-xs-12 text-center">
        <h4>Appointed Subject</h4>
      </div>
      <div class="col-xs-12 text-center">
        <div class="btn-group btn-group-toggle justify-content" data-toggle="buttons">
          <label class="btn btn-primary">
            <input type="radio" name="app_sub_select" value="yes">Yes
          </label>
          <label class="btn btn-primary active">
            <input type="radio" name="app_sub_select" value="no">No
          </label>
        </div>
      </div>
    </div>
    <div class="col-sm-3 col-xs-12 justify-content-center">
      <div class="col-xs-12 text-center">
        <h4>Teaching Subjects</h4>
      </div>
      <div class="col-xs-12 text-center">
        <div class="btn-group btn-group-toggle justify-content" data-toggle="buttons">
          <label class="btn btn-primary">
            <input type="radio" name="te_sub_select" value="yes">Yes
          </label>
          <label class="btn btn-primary active">
            <input type="radio" name="te_sub_select" value="no">No
          </label>
        </div>
      </div>
    </div>
    <div class="col-sm-3 col-xs-12 justify-content-center">
      <div class="col-xs-12 text-center">
        <h4>Appointment Catagory</h4>
      </div>
      <div class="col-xs-12 text-center">
        <div class="btn-group btn-group-toggle justify-content" data-toggle="buttons">
          <label class="btn btn-primary">
            <input type="radio" name="catagory_select" value="yes">Yes
          </label>
          <label class="btn btn-primary active">
            <input type="radio" name="catagory_select" value="no">No
          </label>
        </div>
      </div>
    </div>
    <div class="col-sm-3 col-xs-12 justify-content-center">
      <div class="col-xs-12 text-center">
        <h4></h4>
      </div>
      <div class="col-xs-12 text-center">
        <div class="btn-group btn-group-toggle justify-content" data-toggle="buttons">
          
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-md-12 text-center">
      <h3>OUTPUT FORMAT</h3>
    </div>
  </div>

  <div class="row justify-content-center">
    <div class="col-xs-12 justify-content-center text-center">
      <div class="btn-group btn-group-toggle" data-toggle="buttons" align="center">
          <label class="btn btn-primary col-xs-12 active">
          <input type="radio" name="output" value="1">Visual
          </label>  
          <label class="btn btn-primary col-xs-12">
          <input type="radio" name="output" value="2">Excel Sheet
          </label> 
          <label class="btn btn-primary col-xs-12">
          <input type="radio" name="output" value="3">PDF
          </label>  
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-sm-4 col-xs-12 center-block hidden-xs" align="center" style="padding-top: 10px;">
      <input class="btn btn-primary" type="submit" name="back" value="back">
    </div>
    <div class="col-sm-4 col-xs-12 center-block" align="center" style="padding-top: 10px;">
      <input class="btn btn-primary" type="submit" name="submit" value="submit">
    </div>
    <div class="col-sm-4 col-xs-12 center-block" align="center" style="padding-top: 10px;">
      <input class="btn btn-primary" align="center" type="submit" name="refresh" value="refresh">
    </div>
    <div class="col-sm-4 col-xs-12 center-block visible-xs" align="center" style="padding-top: 10px;">
      <input class="btn btn-primary" type="submit" name="back" value="back">
    </div>
  </div>

  </form>
</div>

<footer class="container-fluid text-center ">
  <div class="row footer">
    <p>2019 Copyright: www.semis.lk</p>
  </div>
</footer>

</body>
</html>
<script>
var sliderminage = document.getElementById("myRangeminage");
var outputminage = document.getElementById("demominage");
outputminage.innerHTML = sliderminage.value;

sliderminage.oninput = function() {
  outputminage.innerHTML = this.value;
}
</script>
<script>
var slidermaxage = document.getElementById("myRangemaxage");
var outputmaxage = document.getElementById("demomaxage");
outputmaxage.innerHTML = slidermaxage.value;

slidermaxage.oninput = function() {
  outputmaxage.innerHTML = this.value;
}
</script>
<script>
var sliderapoprd = document.getElementById("myRangeapoprd");
var outputapoprd = document.getElementById("demoapoprd");
outputapoprd.innerHTML = sliderapoprd.value;

sliderapoprd.oninput = function() {
  outputapoprd.innerHTML = this.value;
}
</script>
<script>
var sliderschprd = document.getElementById("myRangeschprd");
var outputschprd = document.getElementById("demoschprd");
outputschprd.innerHTML = sliderschprd.value;

sliderschprd.oninput = function() {
  outputschprd.innerHTML = this.value;
}
</script>