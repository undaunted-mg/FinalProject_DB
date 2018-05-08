<?php
//$_POST is the ARRAY containing all HTML data that is sent to the POST method

//Print out a "raw" display of the contents of the POST array and the GET array. Surrounding it with <pre> tags makes it look like command line font.
echo '<pre>The $_POST array contains:';
print_r($_POST); 
echo '</pre>';

//Store each POST key/value pair in a PHP variable
foreach($_POST as $key=>$value) ${$key}=$value;

//After running the above command, you can now access the individual pieces of data as PHP variables
echo "[name] => $name <br />
      [State] => $State<br />
      [Age] => $Age<br />
      [Subjects] => $Subjects<br />
      [Comments] => $Comments<br />";


?>