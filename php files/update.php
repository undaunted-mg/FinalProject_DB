<?php

//update.php

include "login_maryann.php";

//test this one:Doesn't work! $connect = new PDO('mysql:host=localhost;dbname=testing', 'root', '');
//ok then test this: Also no work!! $connect = new PDO('mysql: host=127.0.0.1;dbname=mi557mdh_time_Management;port=3306','mi557mdh_mg656','NQzUOMgJ27DZ9');
//Create the connection to the MySQL database-maybe dis work? pretty please?
$db_server = mysqli_connect($db_hostname, $db_username, $db_password, $db_database);
if (!$db_server) die("Unable to connect to MySQL: " . mysqli_error($db_server));

//if(isset($_POST["id"]))
$id = $_POST['id'];
    if(isset($_POST["id"]))

{

    $start_event = $_POST['start'];
    $end_event = $_POST['end'];
    $id = $_POST['id'];
    $title = $_POST['title'];

 $query =
 "UPDATE events
 SET title='$title', start_event='$start_event', end_event='$end_event'
 WHERE id=$id";
 $statement = $db_server->prepare($query);
 $statement->execute(

//array doesn't work comment out
//  array(
//   ':title'  => $_POST['title'],
//   ':start_event' => $_POST['start'],
//   ':end_event' => $_POST['end'],
//   ':id'   => $_POST['id']
//  )
 );
}
?>
