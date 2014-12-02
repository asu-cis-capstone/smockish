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
	$fname 		= mysqli_real_escape_string($dbc,$_POST['fname']);
	$nname 		= mysqli_real_escape_string($dbc,$_POST['lname']);
	$lname 		= mysqli_real_escape_string($dbc,$_POST['lname']);
	$address 	= mysqli_real_escape_string($dbc,$_POST['address']);
	$city 		= mysqli_real_escape_string($dbc,$_POST['city']);
	$state 		= $_POST['state'];
	$zip 		= $_POST['zip'];
	
	// issue variable - convert to drop down or must be converted to unsigned(int)
	$refcode = (INT)$_POST['refcode'];
	
	$artist		= $_POST['artist'];
	$collector 	= $_POST['collector'];
	$email 		= $_POST['email'];
	$password 	= $_POST['password'];
	
	//Variables for e-mail entry
	$usertype=$_POST['usertype']; 

	//determining value of usertype
	//$message="Got into first if."; 
	
	
	if(count($usertype) == 1)
	{
		if($usertype[0]=="artist")
		{

			$artist = 1; 
			$collector=0; 
			// Artist 
			//$message="they selected artist."; 
		}
		else
		{
			$artist=0; 
			$collector=1;
			//$message="they selected collector."; 
			
		// Collector 
		}	 
	}
	
	else
	{
			$artist = 1; 
			$collector=1;
			//$message="they selected both."; 
			 
	}
 
	 //echo $message; 
	//echo $artist.' is the value for artist';
	//echo $collector.' is the value for collector'; 
	
	
	// Build the SQL statement to insert data to the DB
	$query = "INSERT INTO users (first_name, last_name, nickname, address, city, state, zip, email_address, password, artist, collector) VALUES ('$fname','$lname','$nname','$address','$city','$state','$zip','$email','$password','$artist','$collector')";
	
	// Run the query we just built
	$result = mysqli_query($dbc, $query)
	or die('Unable to write to DB! Process aborted...');

	// Build the password query
	$query = "SELECT * FROM users WHERE email_address = '$email' AND password = '$password'";
	
	// Run password query
	$result = mysqli_query($dbc, $query) or die('Unable to read (password)!');

	//Close the DBC
	mysqli_close($dbc);
	
	// Start PHP session
	session_start();

	// Get and store our PHP session variables
	$row = mysqli_fetch_array($result);
	$_SESSION['sid'] 	= $row['user_id'];
	$_SESSION['fname'] 	= $row['first_name'];
	$_SESSION['lname'] 	= $row['last_name'];
	$_SESSION['address'] 	= $row['address'];
	$_SESSION['city'] 	= $row['city'];
	$_SESSION['state'] 	= $row['state'];
	$_SESSION['zip'] 	= $row['zip'];
	$_SESSION['joindate'] 	= $row['join_date'];
	$_SESSION['weburl'] 	= $row['website_url'];
	$_SESSION['webname'] 	= $row['website_name'];
	$_SESSION['email'] 	= $row['email_address'];
	$_SESSION['bio'] 	= $row['bio'];
	$_SESSION['statement'] 	= $row['statement'];
	$_SESSION['lstatus'] 	= true;
	
	header("Location: home.php?login=1");
	exit;
?>
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            