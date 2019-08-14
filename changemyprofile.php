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
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 10px;
    box-sizing: border-box;
    }


    input[type=submit] {
        width: 32%;
        background-color: black;
        color: white;
        padding: 10px 10px;
        margin: 8px 0;
        border: none;
        border-radius: 10px;
        cursor: pointer;
    }

    input[type=submit]:hover {
        background-color: #cc6633;
    }


    #tableField {
      width: 50%;
      text-align: right;
      color: #1ca1d8;
    }

    #tableBox {
      width: 50%;
      text-align:left;

    }

    #tableErr {
      width: 30%;
      text-align:left;
      color: red;

    }

    @font-face {
        font-family: arjunn;
        src: url(font/arjunn);
        src: url("font/arjunn.eot?#iefix") format("embedded-opentype"),
             url("font/arjunn.woff") format("woff"),
             url("font/arjunn.ttf") format("truetype"),
             url("font/arjunn.svg#HurmeGeometricSans4 Bold") format("svg");
    }
    @font-face {
        font-family: hgs4b;
        src: url(font/HurmeGeometricSans4 Bold);
        src: url("font/HurmeGeometricSans4 Bold.eot?#iefix") format("embedded-opentype"),
             url("font/HurmeGeometricSans4 Bold.woff") format("woff"),
             url("font/HurmeGeometricSans4 Bold.ttf") format("truetype"),
             url("font/HurmeGeometricSans4 Bold.svg#HurmeGeometricSans4 Bold") format("svg");
    }
    @font-face {
        font-family: hgs4l;
        src: url(font/HurmeGeometricSans4 Light);
        src: url("font/HurmeGeometricSans4 Light.eot?#iefix") format("embedded-opentype"),
             url("font/HurmeGeometricSans4 Light.woff") format("woff"),
             url("font/HurmeGeometricSans4 Light.ttf") format("truetype"),
             url("font/HurmeGeometricSans4 Light.svg#HurmeGeometricSans4 Light") format("svg");
    }
    @font-face {
        font-family: hgs4bo;
        src: url(font/HurmeGeometricSans4 LightOblique);
        src: url("font/HurmeGeometricSans4 LightOblique.eot?#iefix") format("embedded-opentype"),
             url("font/HurmeGeometricSans4 LightOblique.woff") format("woff"),
             url("font/HurmeGeometricSans4 LightOblique.ttf") format("truetype"),
             url("font/HurmeGeometricSans4 LightOblique.svg#HurmeGeometricSans4 LightOblique") format("svg");
    }
    @font-face {
        font-family: hgs4;
        src: url("font/HurmeGeometricSans4");
        src: url("font/HurmeGeometricSans4.eot?#iefix") format("embedded-opentype"),
             url("font/HurmeGeometricSans4.woff") format("woff"),
             url("font/HurmeGeometricSans4.ttf") format("truetype"),
             url("font/HurmeGeometricSans4.svg#HurmeGeometricSans4") format("svg");
    }
    @font-face {
        font-family: kalaham;
        src: url("font/KALAHAM");
        src: url("font/KALAHAM.eot?#iefix") format("embedded-opentype"),
             url("font/KALAHAM.woff") format("woff"),
             url("font/KALAHAM.ttf") format("truetype"),
             url("font/KALAHAM.svg#HurmeGeometricSans4") format("svg");
    }
    @font-face {
        font-family: basuru;
        src: url("font/basuru");
        src: url("font/basuru.eot?#iefix") format("embedded-opentype"),
             url("font/basuru.woff") format("woff"),
             url("font/basuru.ttf") format("truetype"),
             url("font/basuru.svg#HurmeGeometricSans4") format("svg");
    }
  </style>
</head>
<body>

<nav class="navbar navbar-inverse" style="background-color: #1ca1d8">
  <div class="container-fluid">
    <div class="navbar-header" id="brand-text">
      <a class="navbar-brand animated bounce delay-1s slower" href="index.php" style="color: white;stroke:solid"><span style="font-family: 'arjunn',Arial, sans-serif;font-size: 50px">isma ;;=</span><span style="font-family: 'hgs4l',Arial, sans-serif;"> | Sip Thathu | </span><span style="font-family: 'kalaham',Arial, sans-serif;">சிப் தது</span></a>
    </div>

    <ul class="nav navbar-nav navbar-right">
        <li><a href="logout.php?id=logout" style="color: white"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
      </ul>
  </div>
</nav>
<?php

#page number 11

$database = new Database();

$database -> empty_session();
$database ->restricted_page('11');
$activity = "";
$email_err = $emp_err = $cpw_err = $success = $pw_err = "";
$position     = $database -> find_position();

$id           = $database -> find_id();
if($position = 'tc_id'){
    $profile      = $database -> table_by_id($id,'teacher','tc_id');
}
elseif($position = 'pr_id'){
    $profile      = $database -> table_by_id($id,'principal','pr_id');
}
elseif($position = 'ad_id'){
    $profile      = $database -> table_by_id($id,'admin_staff','ad_id');
}

if($_SERVER["REQUEST_METHOD"] == "POST"){

	if(isset($_POST['submit'])){

    
    
    
    if(isset($_POST['add_li1']) AND $_POST['add_li1'] <> ''){

        $add_li1      = $database -> post_to_variabal($_POST['add_li1']);
        if($position =='ad_id'){
            $update       = $database -> update_one_column('admin_staff', 'add_li1', $add_li1, 'ad_id', $id);
        }elseif($position =='pr_id'){
            $update       = $database -> update_one_column('principal', 'add_li1', $add_li1, 'pr_id', $id);
        }elseif($position =='tc_id'){
            $update       = $database -> update_one_column('teacher', 'add_li1', $add_li1, 'tc_id', $id);
        }

        $activity .= ".6";
    }

    if(isset($_POST['add_li2']) AND $_POST['add_li2'] <> ''){

        $add_li2      = $database -> post_to_variabal($_POST['add_li2']);
        if($position =='ad_id'){
            $update       = $database -> update_one_column('admin_staff', 'add_li2', $add_li2, 'ad_id', $id);
        }elseif($position =='pr_id'){
            $update       = $database -> update_one_column('principal', 'add_li2', $add_li2, 'pr_id', $id);
        }elseif($position =='tc_id'){
            $update       = $database -> update_one_column('teacher', 'add_li2', $add_li2, 'tc_id', $id);
        }

        $activity .= ".7";
    }

    if(isset($_POST['add_li3']) AND $_POST['add_li3'] <> ''){

        $add_li3      = $database -> post_to_variabal($_POST['add_li3']);
        if($position =='ad_id'){
            $update       = $database -> update_one_column('admin_staff', 'add_li3', $add_li3, 'ad_id', $id);
        }elseif($position =='pr_id'){
            $update       = $database -> update_one_column('principal', 'add_li3', $add_li3, 'pr_id', $id);
        }elseif($position =='tc_id'){
            $update       = $database -> update_one_column('teacher', 'add_li3', $add_li3, 'tc_id', $id);
        }

        $activity .= ".8";
    }
    
    if(isset($_POST['division']) AND $_POST['division'] <> ''){

        $division     = $database -> post_to_variabal($_POST['division']);
        if($position =='ad_id'){
            $update       = $database -> update_one_column('admin_staff', 'division', $division, 'ad_id', $id);
        }elseif($position =='pr_id'){
            $update       = $database -> update_one_column('principal', 'division', $division, 'pr_id', $id);
        }elseif($position =='tc_id'){
            $update       = $database -> update_one_column('teacher', 'division', $division, 'tc_id', $id);
        }   
        $activity .= ".9";
    }

    if(isset($_POST['tel']) AND $_POST['tel'] <> ''){

        $tel          = $database -> post_to_variabal($_POST['tel']);
        if($position =='ad_id'){
            $update       = $database -> update_one_column('admin_staff', 'tel_no', $tel, 'ad_id', $id);
        }elseif($position =='pr_id'){
            $update       = $database -> update_one_column('principal', 'tel_no', $tel, 'pr_id', $id);
        }elseif($position =='tc_id'){
            $update       = $database -> update_one_column('teacher', 'tel_no', $tel, 'tc_id', $id);
        }
        
        
        $activity .= ".9";
    }

    if(isset($_POST['sec_sub']) AND $_POST['sec_sub'] <> ''){

        $sec_sub      = $database -> post_to_variabal($_POST['sec_sub']);
        if($position =='ad_id'){
            $update       = $database -> update_one_column('admin_staff', 'sec_sub', $sec_sub, 'ad_id', $id);
        }elseif($position =='pr_id'){
            $update       = $database -> update_one_column('principal', 'sec_sub', $sec_sub, 'pr_id', $id);
        }elseif($position =='tc_id'){
            $update       = $database -> update_one_column('teacher', 'sec_sub', $sec_sub, 'tc_id', $id);
        }   
        
        $activity .= ".10";
    }

    if(isset($_POST['third_sub']) AND $_POST['third_sub'] <> ''){

        $third_sub      = $database -> post_to_variabal($_POST['third_sub']);
        if($position =='ad_id'){
            $update       = $database -> update_one_column('admin_staff', 'third_sub', $third_sub, 'ad_id', $id);
        }elseif($position =='pr_id'){
            $update       = $database -> update_one_column('principal', 'third_sub', $third_sub, 'pr_id', $id);
        }elseif($position =='tc_id'){
            $update       = $database -> update_one_column('teacher', 'third_sub', $third_sub, 'tc_id', $id);
        }   
        
        $activity .= ".11";
    }

    if(isset($_POST['forth_sub']) AND $_POST['forth_sub'] <> ''){

        $forth_sub      = $database -> post_to_variabal($_POST['forth_sub']);
        if($position =='ad_id'){
            $update       = $database -> update_one_column('admin_staff', 'forth_sub', $forth_sub, 'ad_id', $id);
        }elseif($position =='pr_id'){
            $update       = $database -> update_one_column('principal', 'forth_sub', $forth_sub, 'pr_id', $id);
        }elseif($position =='tc_id'){
            $update       = $database -> update_one_column('teacher', 'forth_sub', $forth_sub, 'tc_id', $id);
        }   
        
        $activity .= ".12";
    }

    if(isset($_POST['fifth_sub']) AND $_POST['fifth_sub'] <> ''){

        $fifth_sub      = $database -> post_to_variabal($_POST['fifth_sub']);
        if($position =='ad_id'){
            $update       = $database -> update_one_column('admin_staff', 'fifth_sub', $fifth_sub, 'ad_id', $id);
        }elseif($position =='pr_id'){
            $update       = $database -> update_one_column('principal', 'fifth_sub', $fifth_sub, 'pr_id', $id);
        }elseif($position =='tc_id'){
            $update       = $database -> update_one_column('teacher', 'fifth_sub', $fifth_sub, 'tc_id', $id);
        }   
        
        $activity .= ".10";
    }

    if(isset($_POST['email']) AND $_POST['email'] <> ''){
        $email        = $database -> form_data_process('email');
        $email        = $database -> email_validation($email);
        
        if($email <> ''){
            if($position =='ad_id'){
                $email        = $database -> email_existance($email,'admin_staff','email');
                $email_err    = $database -> field_missing($email,'Invalied email format or email already exist');
                $update       = $database -> update_one_column('admin_staff', 'email', $email, 'ad_id', $id);
            }elseif($position =='pr_id'){
                $email        = $database -> email_existance($email,'principal','email');
                $email_err    = $database -> field_missing($email,'Invalied email format or email already exist');
                $update       = $database -> update_one_column('principal', 'email', $email, 'pr_id', $id);
            }elseif($position =='tc_id'){
                $email        = $database -> email_existance($email,'teacher','email');
                $email_err    = $database -> field_missing($email,'Invalied email format or email already exist');
                $update       = $database -> update_one_column('teacher', 'email', $email, 'tc_id', $id);
            }
            $activity .= ".11";
        }      
    }

    if(isset($_POST['password']) AND $_POST['password'] <> '' AND isset($_POST['cpassword']) AND $_POST['cpassword'] <> ''){
        $password     = $database -> form_data_process('password');
        $password     = crypt($password,'$2a$09$anexamplestringforsalt$');

        $cpassword    = $database -> form_data_process('cpassword');
        $cpassword    = crypt($cpassword,'$2a$09$anexamplestringforsalt$');

        if($password == $cpassword){
            if($position =='ad_id'){
                $update       = $database -> update_one_column('admin_staff', 'password', $password, 'ad_id', $id);
            }elseif($position =='pr_id'){
                $update       = $database -> update_one_column('principal', 'password', $password, 'pr_id', $id);
            }elseif($position =='tc_id'){
                $update       = $database -> update_one_column('teacher', 'password', $password, 'tc_id', $id);
            }
            $activity .= ".12";
        } else{

            $pw_err   = $database -> text_to_variabal('password did not Match');
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
    <div class="col-md-12 text-center" style="font-family: 'hgs4l',Arial, sans-serif;">
      <h3><span style="color: #1ca1d8">CHANGE</span> YOUR PROFILE</h3>
    </div>
  </div>
  <div class="row" style="font-family: 'hgs4l',Arial, sans-serif;">
    <div class="col-sm-8 col-sm-offset-2 col-xs-offset-0 justify-content-center">
      <form method="post" action="">
      <table class = "table table-hover">


    <tr>
    <td id="tableField">
    First Name:
    </td>
    <td id="tableBox">
    <input type="text" name="first_name" value="">
    <br><span style="color: #1ca1d8">current : </span><span><?php echo $profile['first_name']; ?></span>
    </td>
    </tr>

    <tr>
    <td id="tableField">
    Middle Name:
    </td>
    <td id="tableBox">
    <input type="text" name="middle_name" value="">
    <br><span style="color: #1ca1d8">current : </span><span><?php echo $profile['middle_name']; ?></span>
    </td>
    </tr>

    <tr>
    <td id="tableField">
    Last Name:
    </td>
    <td id="tableBox">
    <input type="text" name="last_name" value="">
    <br><span style="color: #1ca1d8">current : </span><span><?php echo $profile['last_name']; ?></span>
    </td>
    </tr>

    <tr>
    <td id="tableField">
    Surname:
    </td>
    <td id="tableBox">
    <input type="text" name="sir_name" value="">
    <br><span style="color: #1ca1d8">current : </span><span><?php echo $profile['sir_name']; ?></span>
    </td>
    </tr>

    <tr>
    <td id="tableField">
    Name with Initials:
    </td>
    <td id="tableBox">
    <input type="text" name="in_name" value="">
    <br><span style="color: #1ca1d8">current : </span><span><?php echo $profile['in_name']; ?></span>
    </td>
    </tr>

    <tr>
    <td id="tableField">
    Birthday:
    </td>
    <td id="tableBox">
    <input type="date" name="birth_day" value="">
    <br><span style="color: #1ca1d8">current : </span><span><?php echo $profile['birth_day']; ?></span>
    </td>
    </tr>


    <tr>
    <td id="tableField">
    Address Line 1:
    </td>
    <td id="tableBox">
    <input type="text" name="add_li1" value="">
    <br><span style="color: #1ca1d8">current : </span><span><?php echo $profile['add_li1']; ?></span>
    </td>
    </tr>

    <tr>
    <td id="tableField">
    Address Line 2:
    </td>
    <td id="tableBox">
    <input type="text" name="add_li2" value="">
    <br><span style="color: #1ca1d8">current : </span><span><?php echo $profile['add_li2']; ?></span>
    </td>
    </tr>

    <tr>
    <td id="tableField">
    Address Line 3:
    </td>
    <td id="tableBox">
    <input type="text" name="add_li3" value="">
    <br><span style="color: #1ca1d8">current : </span><span><?php echo $profile['add_li3']; ?></span>
    </td>
    </tr>

    <tr>
    <td id="tableField">
    Residential Edu: Division:
    </td>
    <td id="tableBox">
    <select name="division"><option value="" selected>No Change</option><?php $div_query = $database -> find_division();
      while($division = mysqli_fetch_assoc($div_query)){ ?> 
      <option value="<?php echo $division['eo_id']; ?>"><?php echo $division['name']?></option> <?php }?> </select>
      <br><span style="color: #1ca1d8">current : </span><span><?php 
        $mydiv = $profile['division'];
        $office = $database -> table_by_id($mydiv,'education_office','eo_id');
        echo $office['name']; 
        ?></span>
    </td>
    </tr>

    <tr>
    <td id="tableField">
    Gender:
    </td>
    <td id="tableBox">
    <select name="gender">
        <option value="0" selected>No Change</option>
        <option value="1">Male</option> 
        <option value="2">Female</option> 
    </select>
    <br><span style="color: #1ca1d8">current : </span>
    <span>
        <?php 
            if($profile['gender'] == '1'){
                echo "Male";
            }
            if($profile['gender'] == '2'){
                echo "Female";
            } 
        ?>
            
    </span>
    </td>
    </tr>

    <tr>
    <td id="tableField">
    Race:
    </td>
    <td id="tableBox">
    <select name="division"><option value="" selected>No Change</option><?php $race_query = $database -> table_search('race');
      while($race = mysqli_fetch_assoc($race_query)){ ?> 
      <option value="<?php echo $race['ra_id']; ?>"><?php echo $race['name']?></option> <?php }?> </select>
      <br><span style="color: #1ca1d8">current : </span><span><?php 
        $race = $profile['race'];
        $office = $database -> table_by_id($race,'race','ra_id');
        echo $office['name']; 
        ?></span>
    </td>
    </tr>

    <tr>
    <td id="tableField">
    Religion:
    </td>
    <td id="tableBox">
    <select name="religion"><option value="" selected>No Change</option><?php $religion_query = $database -> table_search('religion');
      while($religion = mysqli_fetch_assoc($religion_query)){ ?> 
      <option value="<?php echo $religion['rg_id']; ?>"><?php echo $religion['name']?></option> <?php }?> </select>
      <br><span style="color: #1ca1d8">current : </span><span><?php 
        $religion = $profile['religion'];
        $office = $database -> table_by_id($religion,'religion','rg_id');
        echo $office['name']; 
        ?></span>
    </td>
    </tr>

    <tr>
    <td id="tableField">
    Civil Status:
    </td>
    <td id="tableBox">
    <select name="civil_status"><option value="" selected>No Change</option><?php $civil_status_query = $database -> table_search('civil_status');
      while($civil_status = mysqli_fetch_assoc($civil_status_query)){ ?> 
      <option value="<?php echo $civil_status['cs_id']; ?>"><?php echo $civil_status['name']?></option> <?php }?> </select>
      <br><span style="color: #1ca1d8">current : </span><span><?php 
        $civil_status = $profile['civil_status'];
        $office = $database -> table_by_id($civil_status,'civil_status','cs_id');
        echo $office['name']; 
        ?></span>
    </td>
    </tr>

    <tr>
    <td id="tableField">
    Appointed Date:
    </td>
    <td id="tableBox">
    <input type="date" name="appoint_date" value="">
    <br><span style="color: #1ca1d8">current : </span><span><?php echo $profile['appoint_date']; ?></span>
    </td>
    </tr>

    <tr>
    <td id="tableField">
    Appointment State:
    </td>
    <td id="tableBox">
    <select name="appoint_state"><option value="" selected>No Change</option><?php $appoint_state_query = $database -> table_search('appointment_state');
      while($appoint_state = mysqli_fetch_assoc($appoint_state_query)){ ?> 
      <option value="<?php echo $appoint_state['ap_id']; ?>"><?php echo $appoint_state['name']?></option> <?php }?> </select>
      <br><span style="color: #1ca1d8">current : </span><span><?php 
        $appoint_state = $profile['appoint_state'];
        $office = $database -> table_by_id($appoint_state,'appointment_state','ap_id');
        echo $office['name']; 
        ?></span>
    </td>
    </tr>

    <tr>
    <td id="tableField">
    NIC:
    </td>
    <td id="tableBox">
    <input type="text" name="nic" value="">
    <br><span style="color: #1ca1d8">current : </span><span><?php echo $profile['nic']; ?></span>
    </td>
    </tr>

    <tr>
    <td id="tableField">
    Telephone:
    </td>
    <td id="tableBox">
    <input type="text" name="tel" value="">
    <br><span style="color: #1ca1d8">current : </span><span><?php echo $profile['tel_no']; ?></span>
    </td>
    </tr>

    <tr>
    <td id="tableField">
    Medium:
    </td>
    <td id="tableBox">
    <select name="medium"><option value="" selected>No Change</option><?php $medium_query = $database -> table_search('medium');
      while($medium = mysqli_fetch_assoc($medium_query)){ ?> 
      <option value="<?php echo $medium['md_id']; ?>"><?php echo $medium['name']?></option> <?php }?> </select>
      <br><span style="color: #1ca1d8">current : </span><span><?php 
        $medium = $profile['medium'];
        $office = $database -> table_by_id($medium,'medium','md_id');
        echo $office['name']; 
        ?></span>
    </td>
    </tr>

    <tr>
    <td id="tableField">
    Appointment State:
    </td>
    <td id="tableBox">
    <select name="appoint_state"><option value="" selected>No Change</option><?php $appoint_state_query = $database -> table_search('appointment_state');
      while($appoint_state = mysqli_fetch_assoc($appoint_state_query)){ ?> 
      <option value="<?php echo $appoint_state['ap_id']; ?>"><?php echo $appoint_state['name']?></option> <?php }?> </select>
      <br><span style="color: #1ca1d8">current : </span><span><?php 
        $appoint_state = $profile['appoint_state'];
        $office = $database -> table_by_id($appoint_state,'appointment_state','ap_id');
        echo $office['name']; 
        ?></span>
    </td>
    </tr>

    <tr>
    <td id="tableField">
    Appointment State:
    </td>
    <td id="tableBox">
    <select name="appoint_state"><option value="" selected>No Change</option><?php $appoint_state_query = $database -> table_search('appointment_state');
      while($appoint_state = mysqli_fetch_assoc($appoint_state_query)){ ?> 
      <option value="<?php echo $appoint_state['ap_id']; ?>"><?php echo $appoint_state['name']?></option> <?php }?> </select>
      <br><span style="color: #1ca1d8">current : </span><span><?php 
        $appoint_state = $profile['appoint_state'];
        $office = $database -> table_by_id($appoint_state,'appointment_state','ap_id');
        echo $office['name']; 
        ?></span>
    </td>
    </tr>

    <?php if($position == 'tc_id') { ?>
    <tr>
    <td id="tableField">
    Teaching Subject 1:
    </td>
    <td id="tableBox">
    <select name="sec_sub"><option value="" selected>No Change</option> <?php $sub_query = $database ->table_search('subject');
      while($subject = mysqli_fetch_assoc($sub_query)){ ?> 
      <option value="<?php echo $subject['su_id']; ?>"><?php echo $subject['name']?></option> <?php } ?></select>
    </td>
    </tr>

    <tr>
    <td id="tableField">
    Teaching Subject 2:
    </td>
    <td id="tableBox">
    <select name="third_sub"><option value="" selected>No Change</option><?php $sub_query = $database ->table_search('subject');
      while($subject = mysqli_fetch_assoc($sub_query)){?> 
      <option value="<?php echo $subject['su_id']; ?>"><?php echo $subject['name']?></option> <?php } ?></select>
    </td>
    </tr>

    <tr>
    <td id="tableField">
    Teaching Subject 3:
    </td>
    <td id="tableBox">
    <select name="forth_sub"><option value="" selected>No Change</option><?php $sub_query = $database ->table_search('subject');
      while($subject = mysqli_fetch_assoc($sub_query)){?> 
      <option value="<?php echo $subject['su_id']; ?>"><?php echo $subject['name']?></option> <?php } ?></select>
    </td>
    </tr>

    <tr>
    <td id="tableField">
    Teaching Subject 4:
    </td>
    <td id="tableBox">
    <select name="fifth_sub"><option value="" selected>No Change</option><?php $sub_query = $database ->table_search('subject');
      while($subject = mysqli_fetch_assoc($sub_query)){?> 
      <option value="<?php echo $subject['su_id']; ?>"><?php echo $subject['name']?></option> <?php } ?></select>
    </td>
    </tr>
    <?php } ?>
    
    <tr>
    <td id="tableField">
    E-mail:
    </td>
    <td id="tableBox">
    <input type="text" name="email" value="">
    <br><span style="color: #1ca1d8">current : </span><span><?php echo $profile['email']; ?></span>
    </td>
    </tr>

    <?php if($email_err !=""){ ?>
    <tr>
    <td id="tableField">
    </td>
    <td id="tableBox" class="text-danger">
    <?php $database -> display_message($email_err); ?>
    </td>
    </tr>
    <?php } ?>

    <tr>
    <td id="tableField">
    Pass Word:
    </td>
    <td id="tableBox">
    <input type="password" name="password" maxlength="10" minlength="6" value="">
    </td>
    </tr>

    <tr>
    <td id="tableField">
    Confirm Pass Word:
    </td>
    <td id="tableBox">
    <input type="password" name="cpassword" maxlength="10" minlength="6" value="">
    </td>
    </tr>

    <?php if($pw_err !=""){ ?>
    <tr>
    <td id="tableField">
    </td>
    <td id="tableBox" class="text-danger">
    <?php $database -> display_message($pw_err); ?>
    </td>
    </tr>
    <?php } ?>

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
  <div class="row footer" style="background-color: #1ca1d8">
    <p>2019 Copyright: www.semis.lk</p>
  </div>
</footer>

