<?php

//Create the connection to the MySQL database
require_once 'login_mi557mdh.php'; // Change this to the file name with your name
$db_server = mysqli_connect($db_hostname, $db_username, $db_password, $db_database);
if (!$db_server) die("Unable to connect to MySQL: " . mysqli_error($db_server));

//This will only display if the connection was successful.
echo "Connection to MySQL database server successful!";

?>
