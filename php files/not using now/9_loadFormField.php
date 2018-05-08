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
		if (!$db_server) die("Unable to connect to MySQL: " . mysqli_error($db_server));

		$sql = "SELECT fname FROM person;";

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

			while($row=mysqli_fetch_assoc($result))
			{
				//Store each SQL row's column name/value pair in a PHP variable
				foreach($row as $key=>$value) ${$key}=$value;

				//Load data onto form field
				echo "<label>Name:</label><input type='text' name='name' size='30' value='$fname'/><br/><br/>";
			}

		}

			?>

  <!-- HTML code can reside ABOVE and BELOW the starting and closing PHP tags -->
	</body>
</html>
