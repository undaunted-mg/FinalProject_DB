<?php
require_once "login_maryann.php";

if(isset($POST["title"]))
{
    $name = trim($POST['name']);

    if(!empty($name)) {
        $addedQuery = $db->prepare("
        INSERT INTO items (name, user, done, created)
        VALUES (:name, :user, 0, NOW())
        ");
     $addedQuery->execute([
         'name'=> $name,
         'user'=> $_SESSION['user_id']
     ]);
    }
}
header('Location: todos.php')


?>