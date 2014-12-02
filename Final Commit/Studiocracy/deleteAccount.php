<?php
	session_start();
	
	// PHP connection variables
	$host = 'localhost';
	$user = 'franciso';
	$pw = 'Smockish1';
	$db = 'franciso_smockish';

	// Setup DB connection
	$dbc = mysqli_connect($host, $user, $pw, $db) or die('Unable to connect to DB! Process aborted...'); 
	
	// PHP variable for data from login form
	$email = $_POST['email'];
	$sid = $_SESSION['sid'];
	
	// Build the SQL statement to check posted data
	$query = "SELECT email_address FROM users WHERE email_address = '$email' AND user_id = '$sid'";

	// Run the query we just built
	$result = mysqli_query($dbc, $query) or die('Unable to write to DB! Process aborted...');
	
	// Email error return
	if (mysqli_num_rows($result) == 0){
		header('Location: editAccount.php?error=1');
		exit;
	}
	else{
		// Build the SQL statement to check posted data
		$query = "DELETE FROM users WHERE email_address = '$email' AND user_id = '$sid'";

		// Run the query we just built
		$result = mysqli_query($dbc, $query) or die('Unable to write to DB! Process aborted...');
		
		session_unset();
		session_destroy();
		header('Location: index.php?del=1');
		exit;
	}
?>
                            