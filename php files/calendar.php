<style type="text/css">
    <?php include 'user.css'; ?>
</style>

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
echo "<p>Hello! Today is " . date("Y/m/d") . "<br></p>";
?>

<!-- javascript section for calendar functions-->
<head>
    <title>Easy Task Management </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

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
        //test to make sure array is getting through
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
                events: 'insert.php',
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
<h3 align="center"><a href="#">Easy Task Manager</a></h3>
<br />
<div class="container">
    <div id="calendar"></div>
</div>
</br>
</br>
</body>
</html>