<?php

//delete.php

if(isset($_POST["id"]))
{
//$connect = new PDO('mysql:host=localhost;dbname=testing', 'root', '');
 //$connect = new PDO('mysql:host=localhost;dbname=testing', 'root', '');
 $conn = new PDO('mysql: host=127.0.0.1;dbname=mi557mdh_time_Management;port=3306','mi557mdh_mg656','NQzUOMgJ27DZ9');

 $query = "
 DELETE from events WHERE id=:id
 ";
 $statement = $connect->prepare($query);
 $statement->execute(
  array(
   ':id' => $_POST['id']
  )
 );
}

?>
