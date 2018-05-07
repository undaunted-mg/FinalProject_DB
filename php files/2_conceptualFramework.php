<html>
  <head>
    <title>Conceptual framework of HTML, CSS, and PHP</title>
    <style type="text/css">
      h2 { color: green; border-bottom:2px solid green; }
    </style>
  </head>
  <body>
  
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

  <h2>This h2 header is colored green because the CSS written inside the style tag inside the head specifies it.</h2>
  <p>All CSS reference an HTML tag, or a class, or an ID.</p>
  </body>
</html>