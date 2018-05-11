<?php

session_start();

$_SESSION['user_id']=1;

$db_server = mysqli_connect($db_hostname, $db_username, $db_password, $db_database);

if(!isset($_SESSION['user_id'])){
    die('You are not signed in.');
    $itemsQuery= $db->prepare("SELECT id, name, done
FROM items
WHERE user= :user");}
