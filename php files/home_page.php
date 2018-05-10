
<title>Easy Task Management Home Page</title>
<meta charset="utf-8">
<?php

date_default_timezone_set('US/Eastern');

include "login_maryann.php";
include_once "header.php";
$db_server = mysqli_connect($db_hostname, $db_username, $db_password, $db_database);
if (!$db_server) die("Unable to connect to MySQL: " . mysqli_error($db_server));
?>


<?php
//HTML can be output inside of PHP tags using echo
echo '<h1>Welcome to Easy Task Management</h1>';
//Different kinds of quotation styles can be used, but the closing quote must match the opening quote
echo "<p>This program is for both your avid schedulers and your hasty procrastinators.</p>";
?>
