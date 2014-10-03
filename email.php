<!DOCTYPE html>
<?php
	$host = 'localhost';
	$user = 'tado1';
	$pw = 'cis425';
	$db = 'tado1';
	
	$dbc = mysqli_connect($host, $user, $pw, $db)
	or die('Unable to connect to DB! Process aborted...');

	$email = $_POST['email'];
	
	$query = "INSERT INTO smockishemail(email)" . 
	"VALUES('$email')";
	
	$result = mysqli_query($dbc, $query)
	or die('Unable to write to DB! Process aborted...');

	mysqli_close($dbc);
?>
<html>
<head>
	<meta charset="utf-8">
	<title>Email Testing Page</title>
</head>
<body> 
<div><p style="font-size:500%; text-align:center;">E-mail successfully entered into database!</p></div>
</body>
</html>