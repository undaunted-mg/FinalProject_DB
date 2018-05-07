<?php
  if(!isset($page_title)) { $page_title = 'User Area'; }
?>

<!doctype html>

<html lang="en">
  <head>
    <title>GBI - <?php echo $page_title; ?></title>
    <meta charset="utf-8">
    <link rel="stylesheet" media="all" href="../stylesheets/staff.css" />
  </head>

  <body>
    <header>
      <h1>GBI Staff Area</h1>
    </header>

    <navigation>
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
    </navigation>
