<?php

session_start();

$_SESSION['user_id']=1; //todo

include "login_maryann.php";


if(!isset($_SESSION['user_id'])){
    die('You are not signed in.');
    $itemsQuery= $db->prepare("SELECT id, name, done
FROM items
WHERE user= :user");}
