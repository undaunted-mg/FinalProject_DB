
	<?php
		require_once 'login_maryann.php'; // Change this to the file name with your name

		//Create the connection to the MySQL database
		$db_server = mysqli_connect($db_hostname, $db_username, $db_password, $db_database);
		if (!$db_server) die("Unable to connect to MySQL: " . mysqli_error($db_server));

		//$_POST is the ARRAY containing all HTML data that is sent to POST method

		//Store each POST key/value pair in a PHP variable
		foreach($_POST as $key=>$value) ${$key}=$value;

		echo "<h3>You searched for $search</h3>"; //If the posted FORM had an input with name="search", the value of it can be displayed by referencing the variable with that name

		//DO something with that value
		$sql = "INSERT INTO person (person_id, fname, lname) VALUES ('$id', '$fname', '$lname');";

		//As we have already connected to the database, execute the query stored in the $sql variable
		//results of the query get return and stored in the $result variable.
		$result = mysqli_query($db_server, $sql);

		//Check if the query was successfully executed: if the result is NOT FALSE
		if($result) echo "INSERT success!<br />"; else echo "INSERT failed!<br />";

		//More advanced logic can also be done based on success or failure
		if($result)
		{
			//Multiple lines of code should be wrapped in curly braces
			echo "<p>Data was successfully INSERTED from the database.</p>";
		}
		else
		{
			echo "<p>Your INSERT failed and here's why:</p>";
			die(mysqli_error($db_server));
		}
	?>
