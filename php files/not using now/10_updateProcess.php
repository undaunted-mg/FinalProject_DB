
	<?php
		require_once 'login_maryann.php'; // Change this to the file name with your name

		//Create the connection to the MySQL database
		$db_server = mysql_connect($db_hostname, $db_username, $db_password);
		if (!$db_server) die("Unable to connect to MySQL: " . mysql_error());

		//Set the database to use: same as "USE DATABASE" in SQL
		mysql_select_db($db_database) or die("Unable to select database: " . mysql_error());

		//$_POST is the ARRAY containing all HTML data that is sent to POST method

		//Store each POST key/value pair in a PHP variable
		foreach($_POST as $key=>$value) ${$key}=$value;

		echo "<h3>You searched for $search</h3>"; //If the posted FORM had an input with name="search", the value of it can be displayed by referencing the variable with that name

		//DO something with that value

		$sql = "UPDATE person SET fname = '$search' WHERE person_id = 11";
		//"INSERT INTO person (person_id, fname, lname) VALUES (13, '$search', 'Unknown');";

		//As we have already connected to the database, execute the query stored in the $sql variable
		$result = mysql_query($sql);

		//Check if the INSERT was successfully executed: if the result is NOT FALSE
		if($result) echo "UPDATE success!"; else echo "UPDATE failed!";

		//More advanced logic can also be done based on success or failure
		if($result)
		{
			//Multiple lines of code should be wrapped in curly braces
			echo "<p>New row was successfully inserted</p>".
			$insertQueryCount = $insertQueryCount+1;
		}
		else
		{
			echo "<p>Your insert failed.</p>";
			die(mysql_error());
		}
	?>
