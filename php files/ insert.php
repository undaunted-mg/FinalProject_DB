<?php

//insert.php

//$connect = new PDO('mysql:host=localhost;dbname=testing', 'root', '');
$conn = new PDO('mysql: host=127.0.0.1;dbname=mi557mdh_time_Management;port=3306','mi557mdh_mg656','NQzUOMgJ27DZ9');


if(isset($_POST["title"]))
{
 $query = "
 INSERT INTO events
 (title, start_event, end_event)
 VALUES (:title, :start_event, :end_event)
 ";
 $statement = $connect->prepare($query);
 $statement->execute(
  array(
   ':title'  => $_POST['title'],
   ':start_event' => $_POST['start'],
   ':end_event' => $_POST['end']
  )
 );
}


?>
