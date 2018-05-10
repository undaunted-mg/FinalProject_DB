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
  echo '<h1>Welcome to Easy Task Management</h1>';
  //Different kinds of quotation styles can be used, but the closing quote must match the opening quote
  echo "<p>For both your avid schedulers and your hasty procrastinators</br> </p>";
  echo "Hello! Today is " . date("Y/m/d") . "<br>";
  ?>
<style>
    include_once 'user.css';
</style>

<!-- javascript section for calendar functions-->

<head>
    <title>Easy Task Management </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>
  <script>

      <?php

            include "login_maryann.php";
            $userID = 1; //TODO

                $db_server = mysqli_connect($db_hostname, $db_username, $db_password, $db_database);
      if (!$db_server) die("Unable to connect to MySQL: " . mysqli_error($db_server));

      $events_array = array();
              $query = "SELECT * FROM events"; //TODO: where user_id=...

              $result = mysqli_query($db_server,$query);
//                $statement = $db_server->prepare($query);
//                $result = $statement->execute();

              while($line = mysqli_fetch_array($result,MYSQLI_ASSOC)){
                  $e = array();
                  $e['id'] = $line['id'];
                  $e['start'] = $line['start_event'];
                  $e['end'] = $line['end_event'];
                  array_push($events_array,$e);
              }
//              print_r($events_array);

      ?>
      var events = <?php echo json_encode($events_array);?>;

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
            success:function(msg)
            {
                calendar.fullCalendar('renderEvent',{title:title, start:start, end:end},true);
              calendar.fullCalendar('refetchEvents');
              alert("Added Successfully " + msg);
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
              alert(JSON.stringify({title:title, start:start, end:end, id:id}));
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
                calendar.fullCalendar('removeEvents',[id]);
              calendar.fullCalendar('refetchEvents');
              alert("Event Removed");
            }
          })
        }
      },

    });
    calendar.fullCalendar('addEventSource',events);
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
  <div class="row">
    <!--div that holds two columns for to-do-list and contact-list-->
    <div class="col-sm">
      <h3>To Do List's</h3>
      <div id="to-do-list">
        <form method="post" action="index.php" class="input_form">
          <input type="text" name="task" class="task_input">
          <button type="submit" name="submit" id="add_btn" class="add_btn">Add Task</button>
        </form>
      </div>
    </div>
    <div class="col-sm">
      <div id="contact_List">
        <h3>Contact List</h3>
        <form method="post" action="index.php" class="contact_form">
          <input type="text" name="Contact" class="contact_input">
          <button type="submit" name="submit" id="add_btn" class="add_btn">Add Contact</button>
        </form>
      </div>
    </div>
  </div> <!-- end of row text-center div-->
</div><!-- end of container-fluid div-->
</br>
</body>
</html>
