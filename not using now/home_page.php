
<title>Easy Task Managment Home Page</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</head>
<body>
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
              <a class="nav-link" href="#">Login</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Add Task or Event</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Add To-Do</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div> <!-- end of navbar div-->
</nav>

<?php
//HTML can be output inside of PHP tags using echo
echo '<h1>Welcome to Easy Task Managment</h1>';
//Different kinds of quotation styles can be used, but the closing quote must match the opening quote
echo "<p>This program is for both your schedulers and your procrastinators.</p>";
?>
