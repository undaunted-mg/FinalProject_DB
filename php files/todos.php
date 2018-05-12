<style type="text/css">
    <?php include 'user.css'; ?>
</style>
<?php
require_once "init.php";
include_once "header.php";

//$itemsQuery = $db->prepare("
//    SELECT  name, done
//    FROM items
//    WHERE user= :user\");id,
$userID = 1; //TODO
$db_server = mysqli_connect($db_hostname, $db_username, $db_password, $db_database);

if (!$db_server) die("Unable to connect to MySQL: " . mysqli_error($db_server));

//$items_array = array();
//$itemsQuery = "SELECT * FROM items"; //TODO: where user_id=...
//$result = mysqli_query($db_server,$itemsQuery);
//$statement = $db_server->prepare($itemsQuery);
//$statement->execute();

//$itemsQuery->execute([
//    'user'=> $_SESSION['user_id']
//]);
//
//$items = itemsQuery -> rowCount() ? $itemsQuery : [];
//echo '<pre>', print_r($item, true), '</pre>';
//foreach($items as $item){
//    echo $item['name'], '<br>';
//}
?>


<?php
//welcome scripts
//HTML can be output inside of PHP tags using echo
echo '<h1>Welcome to Easy Task Management</h1>';
//Different kinds of quotation styles can be used, but the closing quote must match the opening quote
echo "<p>For both your avid schedulers and your hasty procrastinators</br> </p>";
echo "<p>Hello! Today is " . date("Y/m/d") . "<br></p>";
?>


    <!-- javascript section for calendar functions-->
    <title>Easy Task Management To Do List</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Shadows+Into+Light+Two" rel="stylesheet">
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
    <div class="list">
        <h1 class="header">To Do</h1>
        <?php if (!empty($items)): ?>
            <ul class="items">
                <?php foreach($items as $item):?>
                <li>
                    <span class="item<?php echo $item['done'] ? ' done': ' '?>"> <?php echo $item['name'];?></span>
                    <?php if (!$item['done']):?>
                    <a href="#" class="done-button">Mark as done</a>
                    <?php endif; ?>
                </li>
                <li><span class="item done">learn php</span>
                </li>
                <?php endforeach; ?>
            </ul>
                <?php else: ?>
        <p>You haven't added any items yet</p>
        <?php endif; ?>
        <form class "item-add" action="add.php" method="post">
            <input type="text" name="name" placeholder="Type a new item here" class="input" autocomplete="off" required>
            <input type="submit" value="Add" class="submit">
        </form>
    </div>
</body>