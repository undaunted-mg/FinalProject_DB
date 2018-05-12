
<title>Easy Task Management Home Page</title>
<meta charset="utf-8">
<?php

date_default_timezone_set('US/Eastern');

include "login_maryann.php";
include_once "header.php";
$db_server = mysqli_connect($db_hostname, $db_username, $db_password, $db_database);
if (!$db_server) die("Unable to connect to MySQL: " . mysqli_error($db_server));
?>

<style>
    include_once 'user.css';
</style>

<head>
    <div class="container">
        <div class="row">
    <?php
    //HTML can be output inside of PHP tags using echo
    echo '<h1>Welcome to Easy Task Management</h1>';
    //Different kinds of quotation styles can be used, but the closing quote must match the opening quote
    echo "<p>This program is for both your avid schedulers and your hasty procrastinators.</p>";
    ?>
</head>
        </div>
    </div>
<body>
<div class="container">
    <h2>How to use the Calendar:</h2>
    <div class="row">
<ul>
    <li>1. Choose your desired view whether it be monthly, weekly, or daily.</li>
    <li>2. Adding an event in monthly view makes it an all day event but you can edit the time later in weekly or daily view.</li>
    <li>3. To edit an event time, go into weekly or daily view, and slide the event to the correct time slot or drag the event box higher or low to add or remove time.</li>
    <li>4. To remove an event or task, simply click on the event and click ok when the prompt asks you to confirm deletion.</li>
    <li>5. Your events will be saved as long as you keep your session live.</li>
</ul>
</div>
    </div>

<div class="container">
    <h2>How to use lists:</h2>
    <div class="row">
<ul>
    <li>1.Type in your task.</li>
    <li>2. When task is completed you can cross it off using the button or you can go ahead and delete it.</li>
    <li>3. Your list items will be saved as long as you keep your session live.</li>
</ul>
    </div>
</div>
</body>