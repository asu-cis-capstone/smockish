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
	
	// issue variable - convert to drop down or must be converted to unsigned(int)
	$refcode = (INT)$_POST['refcode'];
	
	$artist=3;
	$collector = 3;
	$email = $_POST['email'];
	$password = $_POST['password'];
	
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
	$query = "INSERT INTO users (first_name, last_name, nickname, zip, email_address, password, artist, collector) VALUES ('$fname','$lname','$nname','$zip','$email','$password','$artist','$collector')";
	
	// Run the query we just built
	$result = mysqli_query($dbc, $query)
	or die('Unable to write to DB! Process aborted...');

	//Close the DBC
	mysqli_close($dbc);
	
	header('Location: index.php?reg=1');
	exit;
?>
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            