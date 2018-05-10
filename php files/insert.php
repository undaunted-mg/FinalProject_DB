<?php

//insert.php

//$connect = new PDO('mysql:host=localhost;dbname=testing', 'root', '');
//$connect = new PDO('mysql: host=127.0.0.1;dbname=mi557mdh_time_Management;port=3306','mi557mdh_mg656','NQzUOMgJ27DZ9');
//Create the connection to the MySQL database
include "login_maryann.php";

$db_server = mysqli_connect($db_hostname, $db_username, $db_password, $db_database);
if (!$db_server) die("Unable to connect to MySQL: " . mysqli_error($db_server));

if(isset($POST["title"]))
{
    $title = $POST['title'];
    $start_event = $POST['start'];
    $end_event = $POST['end'];

 $query = /** @lang text */
     "
 INSERT INTO events
 (title, start_event, end_event)
 VALUES ('$title', '$start_event', '$end_event')
 ";
 $statement = $db_server->prepare($query);
 $statement->execute(
//  [
//   ':title'  => $POST['title'],
//   ':start_event' => $POST['start'],
//   ':end_event' => $POST['end']
//  ]
 );
}


?>
