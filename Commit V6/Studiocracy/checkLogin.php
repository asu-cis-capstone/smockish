<?php	
	// PHP connection variables
	$host = 'localhost';
	$user = 'franciso';
	$pw = 'Smockish1';
	$db = 'franciso_smockish';
	
	// PHP variable for data from login form
	$email = $_POST['email'];
	$password = $_POST['password'];
	
	// Setup DB connection
	$dbc = mysqli_connect($host,$user,$pw,$db) or die('Unable to connect!');
	
	// Build email query
	$query = "SELECT email_address FROM users WHERE email_address = '$email'";
	
	// Run email query
	$result = mysqli_query($dbc, $query) or die('Unable to read (email)!');
	
	// Email error return
	if (mysqli_num_rows($result) == 0)
	{
		$_SESSION['lstatus'] = false;
		header("Location: index.php?lerror=1");
		exit;
	}
	
	// Build the password query
	$query = "SELECT * FROM users WHERE email_address = '$email' AND password = '$password'";
	
	// Run password query
	$result = mysqli_query($dbc, $query) or die('Unable to read (password)!');
	
	// Password error return
	if (mysqli_num_rows($result) == 0)
	{
		$_SESSION['lstatus'] = false;
		header("Location: index.php?lerror=2");
		exit;
	}
	
	//Close the DB connection
	mysqli_close($dbc);
	
	// Start PHP session
	session_start();

	// Get and store our PHP session variables
	$row = mysqli_fetch_array($result);
	$_SESSION['sid'] = $row['user_id'];
	$_SESSION['fname'] = $row['first_name'];
	$_SESSION['lname'] = $row['last_name'];
	$_SESSION['city'] = $row['city'];
	$_SESSION['state'] = $row['state'];
	$_SESSION['joindate'] = $row['join_date'];
	$_SESSION['weburl'] = $row['website_url'];
	$_SESSION['webname'] = $row['website_name'];
	$_SESSION['email'] = $row['email_address'];
	$_SESSION['bio'] = $row['bio'];
	$_SESSION['statement'] = $row['statement'];
	$_SESSION['lstatus'] = true;
	
	header("Location: home.php?login=1");
	exit;
?>                         
                            
                            
                            
                            
                            
                            
                            