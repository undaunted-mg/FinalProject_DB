<html>
	<head>
	<title>
		HTML form.
	</title>
	</head>
	<body>

  <!-- HTML code can reside ABOVE and BELOW the starting and closing PHP tags -->

	<?php
		require_once 'login_maryann.php'; // Change this to the file name with your name

		//Create the connection to the MySQL database
		$db_server = mysqli_connect($db_hostname, $db_username, $db_password, $db_database);
		if (!$db_server) die("Unable to connect to MySQL: " . mysql_error());

		$sql = "SELECT person_id, fname, lname FROM person;";

		//As we have already connected to the database, execute the query stored in the $sql variable
		$result = mysqli_query($db_server, $sql);

		//Check if the query was successfully executed: if the result is NOT FALSE
		if($result)
			echo "SELECT query successful!</br></br>";
		else
			die("SELECT query failed</br></br>");


		//More advanced logic can also be done based on success or failure
		if($result)
		{
			//Start a table
			echo "<table>";
      		echo "<tr><td>Person ID</td><td>First Name</td><td>Last Name</td></tr>";
			while($row=mysqli_fetch_assoc($result))
			{
				//Store each SQL row's column name/value pair in a PHP variable
				foreach($row as $key=>$value) ${$key}=$value;

				//Construct a table row where <td> = table division, i.e. a single column
				echo "<tr><td>$person_id</td><td>$fname</td><td>$lname</td></tr>";
			}

			//End the table
			echo "</table>";

				//Commented code below for DEBUGGING ONLY - Comment out the code for table above if this is being used.

			/*while($row=mysql_fetch_assoc($result))
			{
				//Store each SQL row's column name/value pair in a PHP variable
				foreach($row as $key=>$value) ${$key}=$value;

				echo "$person_id is the first column returned in my example query.<br>";
				echo "$fname is the second column returned in my example query.<br>";
				echo "$lname is the third column returned in my example query.<br>";

			}*/
		}


	?>

  <!-- HTML code can reside ABOVE and BELOW the starting and closing PHP tags -->
	</body>
</html>
