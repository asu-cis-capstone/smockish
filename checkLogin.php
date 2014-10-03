<?php	
	// PHP connection variables
	$host = 'localhost';
	$user = 'tado1';
	$pw = 'cis425';
	$db = 'tado1';
	
	// PHP variable for data from login form
	$email = $_POST['email'];
	$password = $_POST['password'];
	
	// Setup DB connection
	$dbc = mysqli_connect($host,$user,$pw,$db) or die('Unable to connect!');
	
	// Build email query
	$query = "SELECT email FROM smockishaccount WHERE email = '$email'";
	
	// Run email query
	$result = mysqli_query($dbc, $query) or die('Unable to read (email)!');
	
	// Email error return
	if (mysqli_num_rows($result) == 0)
	{
		header('Location: index.php?lerror=1');
		exit;
	}
	
	// Build the password query
	$query = "SELECT * FROM smockishaccount WHERE email = '$email' AND password = '$password'";
	
	// Run password query
	$result = mysqli_query($dbc, $query) or die('Unable to read (password)!');
	
	// Password error return
	if (mysqli_num_rows($result) == 0)
	{
		header('Location: index.php?lerror=2');
		exit;
	}
	
	//Close the DB connection
	mysqli_close($dbc);
	
	// Start PHP sesstion
	session_start();
	
	// Get and store our PHP session variables
	$row = mysqli_fetch_array($result);
	$_SESSION['sname'] = $row['name'];
	header('Location: index.php');
	
	// Pass a 3 back to login.php for testing
	header('Location: index.php?lerror=3');
	exit;
?>