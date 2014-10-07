<?php
	// PHP connection variables
	$host = 'localhost';
	$user = 'tado1';
	$pw = 'cis425';
	$db = 'tado1';
	
	// Setup DB connection
	$dbc = mysqli_connect($host, $user, $pw, $db)
	or die('Unable to connect to DB! Process aborted...');
	
	// PHP variable for each user-entered element
	$fname = mysqli_real_escape_string($dbc,$_POST['fname']);
	$nname = mysqli_real_escape_string($dbc,$_POST['nname']);
	$lname = mysqli_real_escape_string($dbc,$_POST['lname']);
	$zip = $_POST['zip'];
	$refcode = $_POST['refcode'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	
	// Build the SQL statement to insert data to the DB
	$query = "INSERT INTO smockishaccount(fname,nname,lname,zip,refcode,email,password)" . 
	"VALUES('$fname','$nname','$lname','$zip','$refcode','$email','$password')";
	
	// Run the query we just built
	$result = mysqli_query($dbc, $query)
	or die('Unable to write to DB! Process aborted...');

	//Close the DBC
	mysqli_close($dbc);
?>
<html>
<head>
	<meta charset="utf-8">
	<title>Registration Testing Page</title>
</head>
<body> 
<div><p style="font-size:500%; text-align:center;">Registration successfully entered into database!</p></div>
</body>
</html>
