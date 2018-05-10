<?php
// Initialize the session
session_start();

// If session variable is not set it will redirect to login page
if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
  header("location: login.php");
  exit;
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Easy Task Management Home Page</title>
<meta charset="utf-8">
</nav>
<?php

include "login_maryann.php";

$db_server = mysqli_connect($db_hostname, $db_username, $db_password, $db_database);
if (!$db_server) die("Unable to connect to MySQL: " . mysqli_error($db_server));
?>
<?php
/*if(!isset($_SESSION['userId']))
{
// not logged in
header('Location: login.php');
exit();
}*/


date_default_timezone_set('US/Eastern');

include_once "header.php";

?>
<?php
//index.php
//welcome scripts
//HTML can be output inside of PHP tags using echo
echo '<h1>Welcome to Easy Task Managment</h1>';
//Different kinds of quotation styles can be used, but the closing quote must match the opening quote
echo "<p>For both your avid schedulers and your hasty procrastinators</br> </p>";
?>
    <style type="text/css">
        body{ font: 14px sans-serif; text-align: center; }
    </style>
</head>
<body>
    <div class="page-header">
        <h1>Hi, <b><?php echo htmlspecialchars($_SESSION['username']); ?></b>. Welcome to our site.</h1>
    </div>
    <p><a href="logout.php" class="btn btn-danger">Sign Out of Your Account</a></p>
</body>
</html>
