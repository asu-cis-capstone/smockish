<?php
	session_start();
	
	// PHP connection variables
	$host = 'localhost';
	$user = 'franciso';
	$pw = 'Smockish1';
	$db = 'franciso_smockish';

	// Setup DB connection
	$dbc = mysqli_connect($host, $user, $pw, $db)
	or die('Unable to connect to DB! Process aborted...');
	
	// PHP variable for each user-entered element
	$fname = mysqli_real_escape_string($dbc,$_POST['fname']);
	$lname = mysqli_real_escape_string($dbc,$_POST['lname']);
	$city = $_POST['city'];
	$state = $_POST['state'];
	$weburl = $_POST['weburl'];
	$webname = $_POST['webname'];
	$email = $_POST['email'];
	$bio = $_POST['bio'];
	$statement = $_POST['statement'];
	$sid = $_SESSION['sid'];
	
	// Build the SQL statement to insert data to the DB
	$query = "UPDATE users 
	SET first_name='$fname', last_name='$lname', city='$city', state='$state', email_address='$email', bio='$bio', statement='$statement', website_name='$webname', website_url='$weburl'
	WHERE user_id = '$sid'";

	// Run the query we just built
	$result = mysqli_query($dbc, $query)
	or die('Unable to write to DB! Process aborted...');

	//Close the DBC
	mysqli_close($dbc);
	
	session_write_close();
	header('Location: profile.php');
	exit;
?>
                                          
                            
                            
                            
                            