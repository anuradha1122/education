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
      $('.search-box1 input[type="text"]').on("keyup input", function(){
          /* Get input value on change */
          var inputVal = $(this).val();
          var resultDropdown = $(this).siblings(".result1");
          if(inputVal.length){
              $.get("schoolstatsearch.php", {term: inputVal}).done(function(data){
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
              $.get("subjectsearch.php", {term: inputVal}).done(function(data){
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
      $('.search-box input[type="text"]').on("keyup input", function(){
          /* Get input value on change */
          var inputVal = $(this).val();
          var resultDropdown = $(this).siblings(".resultk");
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
      $(document).on("click", ".resultk p", function(){
          $(this).parents(".search-box").find('input[type="text"]').val($(this).text());
          $(this).parent(".resultk").empty();
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
<script>
  
  function firstName(str) {
    if (str == "") {
        document.getElementById("firstName").innerHTML = "";
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
                document.getElementById("firstName").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","ajax/firstname.php?q="+str,true);
        xmlhttp.send();
    }
}
</script>

<script>
  
  function middleName(str) {
    if (str == "") {
        document.getElementById("middleName").innerHTML = "";
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
                document.getElementById("middleName").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","ajax/middlename.php?q="+str,true);
        xmlhttp.send();
    }
}
</script>

<script>
  
  function lastName(str) {
    if (str == "") {
        document.getElementById("lastName").innerHTML = "";
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
                document.getElementById("lastName").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","ajax/lastname.php?q="+str,true);
        xmlhttp.send();
    }
}
</script>

<script>
  
  function sirName(str) {
    if (str == "") {
        document.getElementById("sirName").innerHTML = "";
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
                document.getElementById("sirName").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","ajax/sirname.php?q="+str,true);
        xmlhttp.send();
    }
}
</script>

<script>
  
  function birthDay(str) {
    if (str == "") {
        document.getElementById("birthDay").innerHTML = "";
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
                document.getElementById("birthDay").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","ajax/birthday.php?q="+str,true);
        xmlhttp.send();
    }
}
</script>

<script>
  
  function add1(str) {
    if (str == "") {
        document.getElementById("add1").innerHTML = "";
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
                document.getElementById("add1").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","ajax/add1.php?q="+str,true);
        xmlhttp.send();
    }
}
</script>

<script>
  
  function add2(str) {
    if (str == "") {
        document.getElementById("add2").innerHTML = "";
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
                document.getElementById("add2").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","ajax/add2.php?q="+str,true);
        xmlhttp.send();
    }
}
</script>

<script>
  
  function add3(str) {
    if (str == "") {
        document.getElementById("add3").innerHTML = "";
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
                document.getElementById("add3").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","ajax/add3.php?q="+str,true);
        xmlhttp.send();
    }
}
</script>
<script>
  
  function divi(str) {
    if (str == "") {
        document.getElementById("divi").innerHTML = "";
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
                document.getElementById("divi").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","ajax/division.php?q="+str,true);
        xmlhttp.send();
    }
}
</script>

<script>
  
  function gen(str) {
    if (str == "") {
        document.getElementById("gen").innerHTML = "";
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
                document.getElementById("gen").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","ajax/gender.php?q="+str,true);
        xmlhttp.send();
    }
}
</script>

<script>
  
  function races(str) {
    if (str == "") {
        document.getElementById("races").innerHTML = "";
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
                document.getElementById("races").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","ajax/race.php?q="+str,true);
        xmlhttp.send();
    }
}
</script>
<script>
  
  function religions(str) {
    if (str == "") {
        document.getElementById("religions").innerHTML = "";
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
                document.getElementById("religions").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","ajax/religion.php?q="+str,true);
        xmlhttp.send();
    }
}
</script>

<script>
  
  function civil(str) {
    if (str == "") {
        document.getElementById("civil").innerHTML = "";
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
                document.getElementById("civil").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","ajax/civil_states.php?q="+str,true);
        xmlhttp.send();
    }
}
</script>

<script>
  
  function appoint(str) {
    if (str == "") {
        document.getElementById("appoint").innerHTML = "";
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
                document.getElementById("appoint").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","ajax/appoint.php?q="+str,true);
        xmlhttp.send();
    }
}
</script>

<script>
  
  function catagory(str) {
    if (str == "") {
        document.getElementById("catagory").innerHTML = "";
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
                document.getElementById("catagory").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","ajax/appoint_cat.php?q="+str,true);
        xmlhttp.send();
    }
}
</script>

<script>
  
  function id_card(str) {
    if (str == "") {
        document.getElementById("id_card").innerHTML = "";
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
                document.getElementById("id_card").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","ajax/id_card.php?q="+str,true);
        xmlhttp.send();
    }
}
</script>

<script>
  
  function tele(str) {
    if (str == "") {
        document.getElementById("tele").innerHTML = "";
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
                document.getElementById("tele").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","ajax/tele.php?q="+str,true);
        xmlhttp.send();
    }
}
</script>

<script>
  
  function medi(str) {
    if (str == "") {
        document.getElementById("medi").innerHTML = "";
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
                document.getElementById("medi").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","ajax/medi.php?q="+str,true);
        xmlhttp.send();
    }
}
</script>

<script>
  
  function posi(str) {
    if (str == "") {
        document.getElementById("posi").innerHTML = "";
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
                document.getElementById("posi").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","ajax/posi.php?q="+str,true);
        xmlhttp.send();
    }
}
</script>

<script>
  
  function eduq(str) {
    if (str == "") {
        document.getElementById("eduq").innerHTML = "";
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
                document.getElementById("eduq").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","ajax/eduQ.php?q="+str,true);
        xmlhttp.send();
    }
}
</script>

<script>
  
  function profq(str) {
    if (str == "") {
        document.getElementById("profq").innerHTML = "";
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
                document.getElementById("profq").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","ajax/profQ.php?q="+str,true);
        xmlhttp.send();
    }
}
</script>

<script>
  
  function ranks(str) {
    if (str == "") {
        document.getElementById("ranks").innerHTML = "";
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
                document.getElementById("ranks").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","ajax/ranks.php?q="+str,true);
        xmlhttp.send();
    }
}
</script>

<script>
  
  function current(str) {
    if (str == "") {
        document.getElementById("current").innerHTML = "";
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
                document.getElementById("current").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","ajax/current.php?q="+str,true);
        xmlhttp.send();
    }
}
</script>

<script>
  
  function subject1(str) {
    if (str == "") {
        document.getElementById("subject1").innerHTML = "";
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
                document.getElementById("subject1").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","ajax/subject1.php?q="+str,true);
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
        document.getElementById("subject3").innerHTML = "";
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
                document.getElementById("subject3").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","ajax/subject3.php?q="+str,true);
        xmlhttp.send();
    }
}
</script>

<script>
  
  function subject4(str) {
    if (str == "") {
        document.getElementById("subject4").innerHTML = "";
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
                document.getElementById("subject4").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","ajax/subject4.php?q="+str,true);
        xmlhttp.send();
    }
}
</script>

<script>
  
  function subject5(str) {
    if (str == "") {
        document.getElementById("subject5").innerHTML = "";
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
                document.getElementById("subject5").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","ajax/subject5.php?q="+str,true);
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
    .resultk {

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

    $creator      = $database -> find_creator();
    echo $emp_no       = $database -> form_data_process('keynic');
    $emp_no       = $database -> data_existance($emp_no,'teacher','nic');
    $emp_err      = $database -> field_missing($emp_no,'Emplyee Number is Missing or Wrong');
    $person       = $database -> table_by_id($emp_no,'teacher','nic');

    if(isset($_POST['first_name']) AND $_POST['first_name'] <> ''){

        $history      = $database -> insert_change($person['tc_id'],'first_name',$person['first_name'],$creator);
        $first_name   = strtoupper($database -> post_to_variabal($_POST['first_name']));
        $update       = $database -> update_one_column('teacher', 'first_name', $first_name, 'nic', $emp_no);
    }
    
    if(isset($_POST['middle_name']) AND $_POST['middle_name'] <> ''){
        $history      = $database -> insert_change($person['tc_id'],'middle_name',$person['middle_name'],$creator);
        $middle_name  = strtoupper($database -> post_to_variabal($_POST['middle_name']));
        $update       = $database -> update_one_column('teacher', 'middle_name', $middle_name, 'nic', $emp_no);
    }

    if(isset($_POST['last_name']) AND $_POST['last_name'] <> ''){
        $history      = $database -> insert_change($person['tc_id'],'last_name',$person['last_name'],$creator);
        $last_name    = strtoupper($database -> post_to_variabal($_POST['last_name']));
        $update       = $database -> update_one_column('teacher', 'last_name', $last_name, 'nic', $emp_no);
    }

    if(isset($_POST['sir_name']) AND $_POST['sir_name'] <> ''){
        $history      = $database -> insert_change($person['tc_id'],'sir_name',$person['sir_name'],$creator);
        $sir_name     = strtoupper($database -> post_to_variabal($_POST['sir_name']));
        $update       = $database -> update_one_column('teacher', 'sir_name', $sir_name, 'nic', $emp_no);
    }
    
    if(isset($_POST['birthday']) AND $_POST['birthday'] <> ''){
        $history      = $database -> insert_change($person['tc_id'],'birth_day',$person['birth_day'],$creator);
        $birthday     = $database -> post_to_variabal($_POST['birthday']);
        $update       = $database -> update_one_column('teacher', 'birth_day', $birthday, 'nic', $emp_no);
    }
    
    if(isset($_POST['add_li1']) AND $_POST['add_li1'] <> ''){
        $history      = $database -> insert_change($person['tc_id'],'add_li1',$person['add_li1'],$creator);
        $add_li1      = strtoupper($database -> post_to_variabal($_POST['add_li1']));
        $update       = $database -> update_one_column('teacher', 'add_li1', $add_li1, 'nic', $emp_no);
    }

    if(isset($_POST['add_li2']) AND $_POST['add_li2'] <> ''){
        $history      = $database -> insert_change($person['tc_id'],'add_li2',$person['add_li2'],$creator);
        $add_li2      = strtoupper($database -> post_to_variabal($_POST['add_li2']));
        $update       = $database -> update_one_column('teacher', 'add_li2', $add_li2, 'nic', $emp_no);
    }

    if(isset($_POST['add_li3']) AND $_POST['add_li3'] <> ''){
        $history      = $database -> insert_change($person['tc_id'],'add_li3',$person['add_li3'],$creator);
        $add_li3      = strtoupper($database -> post_to_variabal($_POST['add_li3']));
        $update       = $database -> update_one_column('teacher', 'add_li3', $add_li3, 'nic', $emp_no);
    }
    
    if(isset($_POST['division']) AND $_POST['division'] <> ''){
        $history      = $database -> insert_change($person['tc_id'],'division',$person['division'],$creator);
        $division     = $database -> post_to_variabal($_POST['division']);
        $div          = $database -> table_by_id($division,'education_office','name');
        $eo_id        = $div['eo_id'];
        $update       = $database -> update_one_column('teacher', 'division', $eo_id, 'nic', $emp_no);
    }
    
    if(isset($_POST['gender']) AND $_POST['gender'] <> '' AND $_POST['gender'] <> 'no'){
        $history      = $database -> insert_change($person['tc_id'],'gender',$person['gender'],$creator);
        $gender       = $database -> post_to_variabal($_POST['gender']);
        $update       = $database -> update_one_column('teacher', 'gender', $gender, 'nic', $emp_no);
    }
    

    if(isset($_POST['race']) AND $_POST['race'] <> ''){
        $history      = $database -> insert_change($person['tc_id'],'race',$person['race'],$creator);
        $race         = $database -> post_to_variabal($_POST['race']);
        $update       = $database -> update_one_column('teacher', 'race', $race, 'nic', $emp_no);
    }

    if(isset($_POST['religion']) AND $_POST['religion'] <> ''){
        $history      = $database -> insert_change($person['tc_id'],'religion',$person['religion'],$creator);
        $religion     = $database -> post_to_variabal($_POST['religion']);
        $update       = $database -> update_one_column('teacher', 'religion', $religion, 'nic', $emp_no);
    }
    
    if(isset($_POST['civil_status']) AND $_POST['civil_status'] <> ''){
        $history      = $database -> insert_change($person['tc_id'],'civil_status',$person['civil_status'],$creator);
        $civil_status = $database -> post_to_variabal($_POST['civil_status']);
        $update       = $database -> update_one_column('teacher', 'civil_status', $civil_status, 'nic', $emp_no);
    }
    
    if(isset($_POST['app_date']) AND $_POST['app_date'] <> ''){
        $history      = $database -> insert_change($person['tc_id'],'app_date',$person['appoint_date'],$creator);
        $app_date     = $database -> post_to_variabal($_POST['app_date']);
        $update       = $database -> update_one_column('teacher', 'appoint_date', $app_date, 'nic', $emp_no);
    }


    if(isset($_POST['app_cata']) AND $_POST['app_cata'] <> ''){
        $history      = $database -> insert_change($person['tc_id'],'app_cata',$person['appoint_cat'],$creator);
        $app_cata     = $database -> post_to_variabal($_POST['app_cata']);
        $update       = $database -> update_one_column('teacher', 'appoint_cat', $app_cata, 'nic', $emp_no);
    }

    if(isset($_POST['tel']) AND $_POST['tel'] <> ''){
        $history      = $database -> insert_change($person['tc_id'],'tel_no',$person['tel_no'],$creator);
        $tel          = $database -> post_to_variabal($_POST['tel']);
        $update       = $database -> update_one_column('teacher', 'tel_no', $tel, 'nic', $emp_no);
    }

    if(isset($_POST['medium']) AND $_POST['medium'] <> ''){
        $history      = $database -> insert_change($person['tc_id'],'medium',$person['medium'],$creator);
        $medium       = $database -> post_to_variabal($_POST['medium']);
        $update       = $database -> update_one_column('teacher', 'medium', $medium, 'nic', $emp_no);
    }

    if(isset($_POST['position']) AND $_POST['position'] <> ''){
        $history      = $database -> insert_change($person['tc_id'],'position',$person['position'],$creator);
        $position     = $database -> post_to_variabal($_POST['position']);
        $update       = $database -> update_one_column('teacher', 'position', $position, 'nic', $emp_no);
    }

    if(isset($_POST['ed_qu']) AND $_POST['ed_qu'] <> ''){
        $history      = $database -> insert_change($person['tc_id'],'edu_quali',$person['edu_quali'],$creator);
        $ed_qu        = $database -> post_to_variabal($_POST['ed_qu']);
        $update       = $database -> update_one_column('teacher', 'edu_quali', $ed_qu, 'nic', $emp_no);
    }

    if(isset($_POST['pr_qu']) AND $_POST['pr_qu'] <> ''){
        $history      = $database -> insert_change($person['tc_id'],'prof_quali',$person['prof_quali'],$creator);
        $pr_qu        = $database -> post_to_variabal($_POST['pr_qu']);
        $update       = $database -> update_one_column('teacher', 'prof_quali', $pr_qu, 'nic', $emp_no);
    }

    if(isset($_POST['rank']) AND $_POST['rank'] <> ''){
        $history      = $database -> insert_change($person['tc_id'],'rank',$person['rank'],$creator);
        $rank         = $database -> post_to_variabal($_POST['rank']);
        $update       = $database -> update_one_column('teacher', 'rank', $rank, 'nic', $emp_no);
    }

    if(isset($_POST['cur_function']) AND $_POST['cur_function'] <> ''){
        $history      = $database -> insert_change($person['tc_id'],'cur_function',$person['cur_function'],$creator);
        $function     = $database -> post_to_variabal($_POST['cur_function']);
        $update       = $database -> update_one_column('teacher', 'cur_function', $function, 'nic', $emp_no);
    }

    if(isset($_POST['first_sub']) AND $_POST['first_sub'] <> ''){
        $history      = $database -> insert_change($person['tc_id'],'first_sub',$person['main_sub'],$creator);
        $first_sub    = $database -> post_to_variabal($_POST['first_sub']);
        $sub          = $database -> table_by_id($first_sub,'subject','name');
        $update       = $database -> update_one_column('teacher', 'main_sub', $sub['su_id'], 'nic', $emp_no);
    }

    if(isset($_POST['sec_sub']) AND $_POST['sec_sub'] <> ''){
        $history      = $database -> insert_change($person['tc_id'],'sec_sub',$person['sec_sub'],$creator);
        $sec_sub      = $database -> post_to_variabal($_POST['sec_sub']);
        $sub          = $database -> table_by_id($sec_sub,'subject','name');
        $update       = $database -> update_one_column('teacher', 'sec_sub', $sub['su_id'], 'nic', $emp_no);
    }

    if(isset($_POST['third_sub']) AND $_POST['third_sub'] <> ''){
        $history      = $database -> insert_change($person['tc_id'],'third_sub',$person['third_sub'],$creator);
        $third_sub    = $database -> post_to_variabal($_POST['third_sub']);
        $sub          = $database -> table_by_id($third_sub,'subject','name');
        $update       = $database -> update_one_column('teacher', 'third_sub',$sub['su_id'], 'nic', $emp_no);
    }

    if(isset($_POST['forth_sub']) AND $_POST['forth_sub'] <> ''){
        $history      = $database -> insert_change($person['tc_id'],'forth_sub',$person['forth_sub'],$creator);
        $forth_sub      = $database -> post_to_variabal($_POST['forth_sub']);
        $sub          = $database -> table_by_id($forth_sub,'subject','name');
        $update       = $database -> update_one_column('teacher', 'forth_sub', $sub['su_id'], 'nic', $emp_no);
    }

    if(isset($_POST['fifth_sub']) AND $_POST['fifth_sub'] <> ''){
        $history      = $database -> insert_change($person['tc_id'],'fifth_sub',$person['fifth_sub'],$creator);
        $fifth_sub    = $database -> post_to_variabal($_POST['fifth_sub']);
        $sub          = $database -> table_by_id($fifth_sub,'subject','name');
        $update       = $database -> update_one_column('teacher', 'fifth_sub', $sub['su_id'], 'nic', $emp_no);
    }

    if(isset($_POST['email']) AND $_POST['email'] <> ''){
        $history      = $database -> insert_change($person['tc_id'],'email',$person['email'],$creator);
        $email        = $database -> form_data_process('email');
        $email        = $database -> email_validation($email);
        $email        = $database -> email_existance($email,'teacher','email');
        $email_err    = $database -> field_missing($email,'Invalied email format or email already exist');
        if($email <> ''){
            $update       = $database -> update_one_column('teacher', 'email', $email, 'nic', $emp_no);

        }      
    }

    if(isset($_POST['password']) AND $_POST['password'] <> '' AND isset($_POST['cpassword']) AND $_POST['cpassword'] <> ''){
        $password     = $database -> form_data_process('password');
        $password     = crypt($password,'$2a$09$anexamplestringforsalt$');

        $cpassword    = $database -> form_data_process('cpassword');
        $cpassword    = crypt($cpassword,'$2a$09$anexamplestringforsalt$');

        if($password == $cpassword){

            $update   = $database -> update_one_column('teacher', 'password', $password, 'nic', $emp_no);

        } else{

            $pw_err   = $database -> text_to_variabal('password did not Match');
        }
    }

    if(isset($_POST['nic']) AND $_POST['nic'] <> ''){
        $history      = $database -> insert_change($person['tc_id'],'nic',$person['nic'],$creator);
        $nic          = strtoupper($database -> post_to_variabal($_POST['nic']));
        $update       = $database -> update_one_column('teacher', 'nic', $nic, 'nic', $emp_no);
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
      <h3>CHANGE TEACHER PROFILE</h3>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-4 col-sm-offset-4 col-xs-offset-0 justify-content-center">
      <form method="post" action="">
      <table class = "table table-hover">
    <tr>
    <td id="tableField">
    NIC:
    </td>
    <td class="search-box" id="tableBox">
    <input type="text" name="keynic" value="" onkeyup ="firstName(this.value);middleName(this.value);lastName(this.value);sirName(this.value);birthDay(this.value);add1(this.value);add2(this.value);add3(this.value);divi(this.value);gen(this.value);races(this.value);religions(this.value);civil(this.value);appoint(this.value);catagory(this.value);id_card(this.value);tele(this.value);medi(this.value);posi(this.value);eduq(this.value);profq(this.value);ranks(this.value);current(this.value);subject1(this.value);subject2(this.value);subject3(this.value);subject4(this.value);subject5(this.value);eMail(this.value);old_school(this.value)">
    <div class="result col-xs-6 justify-content-center"></div></td>
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

    <?php if(isset($_SESSION['ad_id']) OR isset($_SESSION['pr_id'])){ ?>
    <tr>
    <td id="tableField">
    First Name:
    
    </td>
    <td id="tableBox">
    <input type="text" name="first_name" value="">
    <div id="firstName"></div>
    </td>
    </tr>
    
    <?php } ?>

    <?php if(isset($_SESSION['ad_id']) OR isset($_SESSION['pr_id'])){ ?>
    <tr>
    <td id="tableField">
    Middle Name:
    </td>
    <td id="tableBox">
    <input type="text" name="middle_name" value="">
    <div id="middleName"></div>
    </td>
    </tr>
    <?php } ?>

    <?php if(isset($_SESSION['ad_id']) OR isset($_SESSION['pr_id'])){ ?>
    <tr>
    <td id="tableField">
    Last Name:
    </td>
    <td id="tableBox">
    <input type="text" name="last_name" value="">
    <div id="lastName"></div>
    </td>
    </tr>
    <?php } ?>

    <?php if(isset($_SESSION['ad_id']) OR isset($_SESSION['pr_id'])){ ?>
    <tr>
    <td id="tableField">
    Surname:
    </td>
    <td id="tableBox">
    <input type="text" name="sir_name" value="">
    <div id="sirName"></div>
    </td>
    </tr>
    <?php } ?>

    <?php if(isset($_SESSION['ad_id'])){ ?>
    <tr>
    <td id="tableField">
    Birth Day:
    </td>
    <td id="tableBox">
    <input type="date" name="birthday" value="">
    <div id="birthDay"></div>
    </td>
    </tr>
    <?php } ?>

    <?php if(isset($_SESSION['pr_id'])){ ?>
    <tr>
    <td id="tableField">
    Address Line 1:
    </td>
    <td id="tableBox">
    <input type="text" name="add_li1" value="">
    <div id="add1"></div>
    </td>
    </tr>

    <tr>
    <td id="tableField">
    Address Line 2:
    </td>
    <td id="tableBox">
    <input type="text" name="add_li2" value="">
    <div id="add2"></div>
    </td>
    </tr>

    <tr>
    <td id="tableField">
    Address Line 3:
    </td>
    <td id="tableBox">
    <input type="text" name="add_li3" value="">
    <div id="add3"></div>
    </td>
    </tr>
    <?php } ?>

    <tr>
    <td id="tableField">
    Residential Edu: Division:
    </td>
    <td class="search-box1" id="tableBox">
    <input type="text" placeholder="No Change" name="division" value="">
    <div class="result1 col-xs-6 justify-content-center"></div>
    <div class="col-xs-12" id="divi"></div>
    </td>
    </tr>
   
    <?php if(isset($_SESSION['ad_id']) OR isset($_SESSION['pr_id'])){ ?>
    <tr>
    <td id="tableField">
    Gender:
    </td>
    <td id="tableBox">
    <input type="radio" name="gender" value="no" checked> No Change
    <input type="radio" name="gender" value="1"> Male
    <input type="radio" name="gender" value="2"> Female
    <div id="gen"></div>
    </td>
    
    </tr>
    <?php } ?>

    <?php if(isset($_SESSION['pr_id'])){ ?>
    <tr>
    <td id="tableField">
    Race:
    </td>
    <td id="tableBox">
    <select name="race"><option value="" selected>No Change</option><?php $race_query = $database ->table_search('race');
      while($race = mysqli_fetch_assoc($race_query)){ ?> 
      <option value="<?php echo $race['ra_id']; ?>"><?php echo $race['name']?></option> <?php }?> </select>
      <div id="races"></div>
    </td>
    </tr>
    <?php } ?>

    <?php if(isset($_SESSION['pr_id'])){ ?>
    <tr>
    <td id="tableField">
    Religion:
    </td>
    <td id="tableBox">
    <select name="religion"><option value="" selected>No Change</option><?php $religion_query = $database ->table_search('religion');
   		while($religion = mysqli_fetch_assoc($religion_query)){ ?> 
      <option value="<?php echo $religion['rg_id']; ?>"><?php echo $religion['name']?></option> <?php }?> </select>
      <div id="religions"></div>
    </td>
    </tr>

    <tr>
    <td id="tableField">
    Civil Status:
    </td>
    <td id="tableBox">
    <select name="civil_status"><option value="" selected>No Change</option><?php $ci_st_query = $database ->table_search('civil_status');
   		while($civil_status = mysqli_fetch_assoc($ci_st_query)){ ?> 
      <option value="<?php echo $civil_status['cs_id']; ?>"><?php echo $civil_status['name']?></option> <?php }?></select>
      <div id="civil"></div>
    </td>
    </tr>

    <?php } ?>

    <?php if(isset($_SESSION['ad_id'])){ ?>
    <tr>
    <td id="tableField">
    Appointment Date:
    </td>
    <td id="tableBox">
    <input type="date" name="app_date" value="">
    <div id="appoint"></div>
    </td>
    </tr>
    <?php } ?>

    <?php if(isset($_SESSION['ad_id']) OR isset($_SESSION['pr_id'])){ ?>
    <tr>
    <td id="tableField">
    Appointment Catagory:
    </td>
    <td id="tableBox">
    <select name="app_cata"> <option value="" selected>No Change</option><?php $cat_query = $database ->table_search('appointment_catagory');
      while($catagory = mysqli_fetch_assoc($cat_query)){ ?> 
      <option value="<?php echo $catagory['ct_id']; ?>"><?php echo $catagory['name']?></option> <?php }?> </select>
      <div id="catagory"></div>
      </td>   </tr>
    <?php } ?>

    <?php if(isset($_SESSION['ad_id']) OR isset($_SESSION['pr_id'])){ ?>
    <tr>
    <td id="tableField">
    NIC:
    </td>
    <td id="tableBox">
    <input type="text" name="nic" value="">
    <div id="id_card"></div>        
     </td>    </tr>
    <?php } ?>

    <tr>
    <td id="tableField">
    Telephone:
    </td>
    <td id="tableBox">
    <input type="text" name="tel" value="">
    <div id="tele"></div>
    </td>
    </tr>

    <?php if(isset($_SESSION['ad_id'])){ ?>
    <tr>
    <td id="tableField">
    Medium:
    </td>
    <td id="tableBox">
    <select name="medium"><option value="" selected>No Change</option><?php $med_query = $database ->table_search('medium');
   		while($medium = mysqli_fetch_assoc($med_query)){?> 
      <option value="<?php echo $medium['md_id']; ?>"><?php echo $medium['name']?></option> <?php }?></select>
      <div id="medi"></div>
    </td>
    </tr>
    <?php } ?>

    <?php if(isset($_SESSION['ad_id']) OR isset($_SESSION['pr_id'])){ ?>
    <tr>
    <td id="tableField">
    Position:
    </td>
    <td id="tableBox">
    <select name="position"><option value="" selected>No Change</option><?php $position_query = $database ->table_search('position');
      while($position = mysqli_fetch_assoc($position_query)){ ?> 
      <option value="<?php echo $position['ps_id']; ?>"><?php echo $position['display_name']?></option> <?php }?></select>
      <div id="posi"></div>
    </td>
    </tr>
    <?php } ?>

    <?php if(isset($_SESSION['ad_id']) OR isset($_SESSION['pr_id'])){ ?>
    <tr>
    <td id="tableField">
    Education Qualification:
    </td>
    <td id="tableBox">
    <select name="ed_qu"><option value="" selected>No Change</option><?php $ed_qu_query = $database ->table_search('education_qualification');
      while($ed_qu = mysqli_fetch_assoc($ed_qu_query)){ ?> 
      <option value="<?php echo $ed_qu['eq_id']; ?>"><?php echo $ed_qu['name']?></option> <?php }?></select>
      <div id="eduq"></div>
    </td>
    </tr>
    <?php } ?>

    <?php if(isset($_SESSION['ad_id']) OR isset($_SESSION['pr_id'])){ ?>
    <tr>
    <td id="tableField">
    Professional Qualification:
    </td>
    <td id="tableBox">
    <select name="pr_qu"><option value="" selected>No Change</option><?php $pr_qu_query = $database ->table_search('prof_qualification');
      while($pr_qu = mysqli_fetch_assoc($pr_qu_query)){?> 
      <option value="<?php echo $pr_qu['pq_id']; ?>"><?php echo $pr_qu['name']?></option> <?php }?></select>
      <div id="profq"></div>
    </td>
    </tr>
    <?php } ?>

    <?php if(isset($_SESSION['pr_id'])){ ?>
    <tr>
    <td id="tableField">
    Rank:
    </td>
    <td id="tableBox">
    <select name="rank"><option value="" selected>No Change</option><?php $rank_query = $database ->table_search_by_element('teacher','rank','level');
      while($rank = mysqli_fetch_assoc($rank_query)){?> 
      <option value="<?php echo $rank['rk_id']; ?>"><?php echo $rank['name']?></option> <?php }?></select>
      <div id="ranks"></div>
    </td>
    </tr>
    <?php } ?>
    
    <?php if(isset($_SESSION['pr_id'])){ ?>
    <tr>
    <td id="tableField">
    Current Functionality:
    </td>
    <td id="tableBox">
    <select name="cur_function"><option value="" selected>No Change</option><?php $func_query = $database ->table_search('teacher_function');
      while($function = mysqli_fetch_assoc($func_query)){ ?> 
      <option value="<?php echo $function['tf_id']; ?>"><?php echo $function['name']?></option> <?php }?></select>
      <div id="current"></div>
    </td>
    </tr>
    <?php } ?>

    <?php if(isset($_SESSION['ad_id'])){ ?>
    <tr>
    <td id="tableField">
    Appointed Subject:
    </td>
    <td class="search-box2" id="tableBox">
    <input type="text" placeholder="No Change" name="first_sub" value="">
    <div class="result2 col-xs-6 justify-content-center"></div>
    <div class="col-xs-12" id="subject1"></div>
    </td>
    </tr>
    <?php } ?>


    <?php if(isset($_SESSION['pr_id'])){ ?>
    <tr>
    <td id="tableField">
    E-mail:
    </td>
    <td id="tableBox">
    <input type="text" name="email" value="">
    <div id="eMail"></div>
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
  <div class="row footer">
    <p>2018 Copyright: xcodeweb.com</p>
  </div>
</footer>

