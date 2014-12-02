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
	$title = mysqli_real_escape_string($dbc,$_POST['title']);
	$series = mysqli_real_escape_string($dbc,$_POST['series']);
	$year = mysqli_real_escape_string($dbc,$_POST['year']);
	$medium = $_POST['medium'];
	$height = $_POST['hdimension'];
	$width = $_POST['wdimension'];
	$weight = $_POST['weight'];
	$measurement = $_POST['measurement'];
	$price = $_POST['price'];
	$stock = $_POST['stock'];

	// Build the SQL statement to insert data to the DB  
	$query = "SELECT image FROM users where user_id='$sid'";  
	

	// Run the query we just built
	$result = mysqli_query($dbc, $query)
	or die('Unable to write to DB! Process aborted...Select image');
		
	if (mysqli_num_rows($result) > 0) {
	
		while($row = mysqli_fetch_assoc($result)) {
			$image=$row['image'];
        	}
	}
	
	if(is_uploaded_file($_FILES['fileToUpload']['tmp_name']))
	{
	
	//image upload
	$target_dir = "filesListing/";
	$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
	$imageFileType = strToLower(pathinfo($target_file,PATHINFO_EXTENSION));
	$image=$target_file;
	
	/*// Check for errors
	if(!$_FILES['fileToUpload']['error'] > 0){
	    die('An error occurred when uploading.');
	}*/
	
	if(!getimagesize($_FILES['fileToUpload']['tmp_name'])){
	    die('Please ensure you are uploading an image.');
	}
	
	// Check filetype
	if($imageFileType != "png" && $imageFileType != "jpg" && $imageFileType != "jpeg" ){
	    die('Unsupported filetype uploaded.');
	}
	
	// Check filesize
	if($_FILES['fileToUpload']['size'] > 2000000){
	    die('File uploaded exceeds maximum upload size.');
	}
	
	// Check if the file exists
	if(file_exists('./filesListing/' . $_FILES['fileToUpload']['name'])){
	    die('File with that name already exists.');
	}
	
	// Upload file
	if(!move_uploaded_file($_FILES['fileToUpload']['tmp_name'],"./filesListing/" . $_FILES['fileToUpload']['name'])){
	    die('Error uploading file - check destination is writeable.');
	}
	}
	
	// Include our if statement 
	if(isset($_POST['art_id']))
	{ // We're updating
	
	$art_id=$_POST['art_id'];
 
		$query ="UPDATE artwork SET title='$title', image='$image', series='$series', year_created='$year', medium_used='$medium', height='$height', width='$width', measurement='$measurement', weight='$weight', price='$price', stock='$stock' WHERE art_id='$art_id'";  
	
	}
	else
	{ // We're adding 
		
	// Build the SQL statement to insert data to the DB
	$query = "INSERT INTO artwork (artist_id, title, image, series, year_created, medium_used, height, width, measurement, weight, price, stock) VALUES ('$artist_id','$title','$image','$series','$year','$medium','$height','$width','$measurement','$weight','$price','$stock')";
	
	
	}
	
	
	
	
	
	// Run the query we just built
	$result = mysqli_query($dbc, $query)
	or die('Unable to write to DB! Process aborted...');

	//Close the DBC
	mysqli_close($dbc);
	header('Location: http://francisogertschnig.com/Studiocracy/home.php');
	
	exit;
	 
?>
                            
                            
                            
                            
                            
                               
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            