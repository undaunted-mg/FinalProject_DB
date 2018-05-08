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
<title>Easy Task Management</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/css/bootstrap.css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</head>
<body>
<!-- nav bar section-->
<nav class="navbar navbar-expand-sm bg-dark navbar-dark"> <!-- put navbar and brand outside div to solve navbar width issue -->
  <a class="navbar-brand" href="#">🗓</a>
  <div class="container-fluid"><!-- navbar div -->
    <div class="row">
      <div class="col-md-12 col-lg-12 col-xl-12">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link active" href="#">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">My Calendar</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Register</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Sign Out</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div> <!-- end of navbar div-->
</nav>

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
