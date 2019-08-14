<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
   "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

   <head>
      <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
      <title>Sandbox</title>
      <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
      <script type="text/javascript">
      	$(function () {

    var counter = 0,
        divs = $('#div1, #div2, #div3');

    function showDiv () {
        divs.hide() // hide all divs
            .filter(function (index) { return index == counter % 3; }) // figure out correct div to show
            .show('fast'); // and show it

        counter++;
    }; // function to loop through divs and show correct div

    showDiv(); // show first div    

    setInterval(function () {
        showDiv(); // show next div
    }, 10 * 1000); // do this every 10 seconds    

});
      </script>
      <style type="text/css" media="screen">
         body { background-color: #fff; font: 16px Helvetica, Arial; color: #000; }
         .display { width:300px; height:200px; border: 2px solid #000; }
         .js .display { display:none; }
      </style>
   </head>

   <body>
      <h2>Example of using setInterval to trigger display of Div</h2>
      <p>The first div will display after 10 seconds...</p>
      <div id='container'>
      <div id='div1' class='display' style="background-color: red;"> 
         div1
      </div>
      <div id='div2' class='display' style="background-color: green;"> 
         div2
      </div>
      <div id='div3' class='display' style="background-color: blue;"> 
         div3
      </div>
      <div>
   </body>

</html>