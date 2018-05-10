<?php

//delete.php

include "login_maryann.php";

if(isset($_POST["id"]))
{
//$connect = new PDO('mysql:host=localhost;dbname=testing', 'root', '');
 //$connect = new PDO('mysql:host=localhost;dbname=testing', 'root', '');
 //$conn = new PDO('mysql: host=127.0.0.1;dbname=mi557mdh_time_Management;port=3306','mi557mdh_mg656','NQzUOMgJ27DZ9');
 $db_server = mysqli_connect($db_hostname, $db_username, $db_password, $db_database);
 if (!$db_server) die("Unable to connect to MySQL: " . mysqli_error($db_server));
$id = $_POST['id'];
 $query = "
 DELETE from events WHERE id=$id";
 $statement = $db_server->prepare($query);
 $statement->execute(
//  array(
//   ':id' => $_POST['id']
//  )
 );
}

?>