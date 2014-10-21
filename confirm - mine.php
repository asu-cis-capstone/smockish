<?php
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
	$nname = mysqli_real_escape_string($dbc,$_POST['lname']);
	$lname = mysqli_real_escape_string($dbc,$_POST['lname']);
	$zip = $_POST['zip'];
	$refcode = $_POST['refcode'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$usertypedb="";  
	if(isset($_POST['newscheck']))
	{
		//Variables for e-mail entry
		$usertype=$_POST['usertype']; 
	
		//determining value of usertype
		if(count($usertype) == 1)
		{
			if($usertype[0]=="artist")
			{
				// Artist
				$usertypedb="1"; 
			}
			else
			{
			// Collector 
			$usertypedb="2";
			}	 
		}
		
		else
		{
			//Both artist and collector
				$usertypedb="1,2"; 
		}
	/*	
	Need to find the next user id and create the user in phplist_listuser
	// Build the SQL statement to insert e-mail data to the DB. Attribute ID should probably be dynamically set as well. 
		// 
	$query = "INSERT INTO phplist_user_user_attribute(attributeid,userid,value)"  
	"VALUES(1,'$userid','$usertypedb')";
	
	// Run the query we just built
	$result = mysqli_query($dbc, $query)
	or die('Unable to write to DB! Process aborted...');

	//Close the DBC
	mysqli_close($dbc);
	*/ 
	}
	
	 
	// Build the SQL statement to insert data to the DB
	$query = "INSERT INTO users(first_name, nickname, last_name,zip, referal_code, email_address, password)"  
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
<div>
	<p style="font-size:500%; text-align:center;">Registration successfully entered into database!</p>
	<p> <?php echo $message; ?></p>
</div>
</body>
</html>
                            
                            
                            