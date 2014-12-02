<?php
	session_start();
	
	// PHP connection variables
	$host = 'localhost';
	$user = 'franciso';
	$pw = 'Smockish1';
	$db = 'franciso_smockish';

	// Setup DB connection
	$dbc = mysqli_connect($host, $user, $pw, $db) or die('Unable to connect to DB! Process aborted...');
	
	// PHP variable for each user-entered element
	$sid 		= $_SESSION['sid'];
	$fname 		= mysqli_real_escape_string($dbc,$_POST['fname']);
	$lname 		= mysqli_real_escape_string($dbc,$_POST['lname']);
	$address 	= mysqli_real_escape_string($dbc,$_POST['address']);
	$city 		= mysqli_real_escape_string($dbc,$_POST['city']);
	$state 		= $_POST['state'];
	$zip 		= $_POST['zip'];
	$email 		= $_POST['email'];
	$password 	= $_POST['password'];
	$currentpass 	= $_POST['oldpw'];


	// Build the SQL statement to check account information
	$query = "SELECT * FROM users WHERE user_id = '$sid'";

	// Run the query we just built
	$result = mysqli_query($dbc, $query) or die('Unable to write to DB! Process aborted...');
	
	if (mysqli_num_rows($result) == 0){
		mysqli_close($dbc);
		header("Location: editAccount.php?aerror=1");
		exit;
	}
	else{
		// Build the SQL statement to check account information
		$query = "SELECT * FROM users WHERE user_id = '$sid'";

		// Run the query we just built
		$result = mysqli_query($dbc, $query) or die('Unable to write to DB! Process aborted...');

		if (mysqli_num_rows($result) == 0){
			mysqli_close($dbc);
			header("Location: editAccount.php?aerror=2");
			exit;
		}
		else{
		
			// Build the SQL statement to check account information
			$query = "SELECT * FROM users WHERE user_id = '$sid'";
	
			// Run the query we just built
			$result = mysqli_query($dbc, $query) or die('Unable to write to DB! Process aborted...');

			if (mysqli_num_rows($result) == 0){
			mysqli_close($dbc);
			header("Location: editAccount.php?aerror=3");
			exit;
			}
			else{
				// Build the SQL statement to change account information
				$query = "UPDATE users SET first_name = '$fname', last_name = '$lname', address = '$address', city = '$city', 
				state = '$state', zip = '$zip', email_address ='$email', password = '$password'
				WHERE user_id = '$sid'";
	
	
				// Run the query again
				$result = mysqli_query($dbc, $query) or die('Unable to write to DB! Process aborted...');


				$query = "SELECT * FROM users WHERE user_id = '$sid'";
				
				$result = mysqli_query($dbc, $query) or die('Unable to write to DB! Process aborted here...');

				// Get and store our PHP session variables
				$row = mysqli_fetch_array($result);
				$_SESSION['fname'] 	= $row['first_name'];
				$_SESSION['lname'] 	= $row['last_name'];
				$_SESSION['address'] 	= $row['address'];
				$_SESSION['city'] 	= $row['city'];
				$_SESSION['state'] 	= $row['state'];
				$_SESSION['zip'] 	= $row['zip'];
				$_SESSION['email'] 	= $row['email_address'];
				
		
				//Close the DBC
				mysqli_close($dbc);
	
				header('Location: editAccount.php?a=1');
				exit;
			}
		}
	}
?>
                            
                            
                            
                            
                            
                            
                            