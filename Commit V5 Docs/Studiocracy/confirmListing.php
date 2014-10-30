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
	$artist_id = (int)$_SESSION['sid'];
	$title = $_POST['title'];
	//$image = mysqli_real_escape_string($dbc,$_POST['image']);
	$series = $_POST['series'];
	$year = $_POST['year'];
	$medium = $_POST['medium'];
	$height = $_POST['hdimension'];
	$width = $_POST['wdimension'];
	$price = $_POST['price'];
	$stock = $_POST['stock'];
	
	// Build the SQL statement to insert data to the DB
	$query = "INSERT INTO artwork (artist_id, title, series, year_created, medium_used, height, width, price, stock) VALUES ('$artist_id','$title','$series','$year','$medium','$height','$width','$price','$stock')";
	// Run the query we just built
	$result = mysqli_query($dbc, $query)
	or die('Unable to write to DB! Process aborted...');

	//Close the DBC
	mysqli_close($dbc);
	
	header('Location: home.php');
	exit;
?>
                            
                            
                            
                            
                            
                               
                            
                            
                            
                            
                            
                            