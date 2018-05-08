<?php
//Purpose of this file is just to process the form. Thus, no HTML output is actually needed in this
//$_POST is the ARRAY containing all HTML data that is sent to the POST method

//Print out a "raw" display of the contents of the POST array and the GET array. Surrounding it with <pre> tags makes it look like command line font.
echo '<pre>The $_POST array contains:';
print_r($_POST); 
echo '</pre>';

//Store each POST key/value pair in a PHP variable
foreach($_POST as $key=>$value) ${$key}=$value;

echo $search; //If the posted FORM had an input with name="search", the value of it can be displayed by referencing the variable with that name


?>