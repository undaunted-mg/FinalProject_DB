<?php
/*if(!isset($_SESSION['userId']))
{
    // not logged in
    header('Location: login.php');
    exit();
}*/
?>

<!DOCTYPE html>
<html>
<head>
<title>Easy Task Management</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/css/bootstrap.css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>
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
              <a class="nav-link active" href="index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="calendar.php">My Calendar</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="register.php">Register</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="logout.php">Sign Out</a>
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
echo "Hello! Today is " . date("Y/m/d") . "<br>";
?>
<!-- javascript section for calendar functions-->
  <script>
  $(document).ready(function() {
   var calendar = $('#calendar').fullCalendar({
    editable:true,
    header:{
     left:'prev,next today',
     center:'title',
     right:'month,agendaWeek,agendaDay'
    },
    events: 'load.php',
    selectable:true,
    selectHelper:true,
    select: function(start, end, allDay)
    {
     var title = prompt("Enter Event Title");
     if(title)
     {
      var start = $.fullCalendar.formatDate(start, "Y-MM-DD HH:mm:ss");
      var end = $.fullCalendar.formatDate(end, "Y-MM-DD HH:mm:ss");
      $.ajax({
       url:"insert.php",
       type:"POST",
       data:{title:title, start:start, end:end},
       success:function()
       {
        calendar.fullCalendar('refetchEvents');
        alert("Added Successfully");
       }
      })
     }
    },
    editable:true,
    eventResize:function(event)
    {
     var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
     var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
     var title = event.title;
     var id = event.id;
     $.ajax({
      url:"update.php",
      type:"POST",
      data:{title:title, start:start, end:end, id:id},
      success:function(){
       calendar.fullCalendar('refetchEvents');
       alert('Event Update');
      }
     })
    },

    eventDrop:function(event)
    {
     var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
     var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
     var title = event.title;
     var id = event.id;
     $.ajax({
      url:"update.php",
      type:"POST",
      data:{title:title, start:start, end:end, id:id},
      success:function()
      {
       calendar.fullCalendar('refetchEvents');
       alert("Event Updated");
      }
     });
    },

    eventClick:function(event)
    {
     if(confirm("Are you sure you want to remove it?"))
     {
      var id = event.id;
      $.ajax({
       url:"delete.php",
       type:"POST",
       data:{id:id},
       success:function()
       {
        calendar.fullCalendar('refetchEvents');
        alert("Event Removed");
       }
      })
     }
    },

   });
  });

  </script>
</head>
<body>
  <br />
  <h2 align="center"><a href="#">Easy Task Manager</a></h2>
  <br />
  <div class="container">
    <div id="calendar"></div>
  </div>
</br>
<div class="container-fluid">
  <div class="row text-center">
    <!--div that holds two columns for to-do-list and contact-list-->
      <h3>Other Tools</h3>
    <div class="col-md-3 col-lg-6 col-xl-6">
      <h3>To Do List's</h3>
      <div id="to-do-list"></div>
      <form method=”post” action=”create.php”>
        <p>To do title: </p>
        <input name=”todoTitle” type=”text”>
        <p>To do description: </p>
        <input name=”todoDescription” type=”text”>
      </br>
      <input type=”submit” name=”submit” value=”submit”>
    </form>
    </div>
      <div class="col-md-3 col-lg-6 col-xl-6">
        <h3>Contact List</h3>
        <form method=”post” action=”create.php”>
          <p>Contact Name: </p>
          <input name=”contactTitle” type=”text”>
          <p>Contact Info: </p>
          <input name=”contactInfo” type=”text”>
        </br>
        <input type=”submit” name=”submit” value=”submit”>
      </form>
    </div> <!-- end of row text-center div-->
  </div>
  </div> <!-- end of row text-center div-->
</div><!-- end of container-fluid div-->
</body>
</html>
