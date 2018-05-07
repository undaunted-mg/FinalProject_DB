<?php

//update.php

//$connect = new PDO('mysql:host=localhost;dbname=testing', 'root', '');
$connect = new PDO('mysql: host=127.0.0.1;dbname=mi557mdh_time_Management;port=3306','mi557mdh_mg656','NQzUOMgJ27DZ9');


if(isset($_POST["id"]))
{
 $query = "
 UPDATE events
 SET title=:title, start_event=:start_event, end_event=:end_event
 WHERE id=:id
 ";
 $statement = $connect->prepare($query);
 $statement->execute(
  array(
   ':title'  => $_POST['title'],
   ':start_event' => $_POST['start'],
   ':end_event' => $_POST['end'],
   ':id'   => $_POST['id']
  )
 );
}

?>
