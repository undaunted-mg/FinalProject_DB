<?php
date_default_timezone_set('US/Eastern');
include_once "login_maryann.php";
include_once "header.php";
?>

<?php
//index.php
//welcome scripts
//HTML can be output inside of PHP tags using echo
echo '<h1>Welcome to Easy Task Management</h1>';
//Different kinds of quotation styles can be used, but the closing quote must match the opening quote
echo "<p>For both your avid schedulers and your hasty procrastinators</br> </p>";
echo "Hello! Today is " . date("Y/m/d") . "<br>";
?>
  
<!-- README: -->
<!-- This file has a .PHP extension. This means that the server will process PHP code in addition to outputting HTML. -->
<!-- If a file with an .HTM or .HTML extension had PHP code included in it, it would not work. -->
<!-- PHP can reside inside HTML tags. Or HTML can be echoed from inside PHP tags. -->

<?php
echo '<p>PHP code can be used to output static HTML.</br></br>';
$query = "SELECT * FROM table1;";
echo "Variables such as this SQL query can also be displayed: <em>$query</em>.<br /><br />";
//When including PHP variables inside an echo statement, double quotes need to be used.
?>
<html>
  <head>
    <title>Conceptual framework of HTML, CSS, and PHP</title>
  <style type="text/css">
      h1 {
          color: blue;
          padding: 1px;
          margin:1px 1px 1px 1px;
      }
      p{
          padding: 1px;
          margin:1px 1px 1px 1px;
      }
    </style>
  </head>
  <body>

  <h2>Please login or register to access your task calendar.</h2>
  <p>All CSS reference an HTML tag, or a class, or an ID.</p>
  </body>
</html>