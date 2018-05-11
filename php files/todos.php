<?php
date_default_timezone_set('US/Eastern');
require_once "init.php";
include_once "header.php";

$itemsQuery = $db->prepare("
    SELECT id, name, done
    FROM items
    WHERE user= :user");

$itemsQuery->execute([
    'user'=> $_SESSION['user_id']
]);

$items = itemsQuery :: rowCount() ? $itemsQuery : [];
foreach($items as $item){
    echo $item['name'], '<br>';
}
?>
<?php
//welcome scripts
//HTML can be output inside of PHP tags using echo
echo '<h1>Welcome to Easy Task Management</h1>';
//Different kinds of quotation styles can be used, but the closing quote must match the opening quote
echo "<p>For both your avid schedulers and your hasty procrastinators</br> </p>";
echo "Hello! Today is " . date("Y/m/d") . "<br>";
?>
    <style>
        include_once 'user.css';
    </style>
    <!-- javascript section for calendar functions-->
    <title>Easy Task Management Listls</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script>
<?php
include "login_maryann.php";

<div class="container-fluid">
    <div class="row">
        <!--div that holds two columns for to-do-list and contact-list-->
        <div class="col-sm">
            <div class="list">
            <h3>To Do List's</h3>
            <ul class="items">
                <li><span class="item">Shopping</span>
                </li>
<!--                <li><span= class"item done">item done</span>-->
<!--                    <a href="#" class="done-button">Mark as done</a>-->
<!--                </li>-->
            </ul>
                <form class "item-add" action="add.php" method="post">
                <input type="text" name="name" placeholder="Type a new item here" class="input" autocomplete="off" required>
                <input type="submit" value="Add" class="submit">
                </form>

            </div>
         </div>
     </div>