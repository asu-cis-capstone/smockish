
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
	$series = $_POST['series'];
	$year = $_POST['year'];
	$medium = $_POST['medium'];
	$height = $_POST['hdimension'];
	$width = $_POST['wdimension'];
	$weight = $_POST['weight'];
	$measurement = $_POST['measurement'];
	$price = $_POST['price'];
	$stock = $_POST['stock'];
	
	
	//image upload
	$target_dir = "uploads/";
	$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
	$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
	
	// Check for errors
	if($_FILES['fileToUpload']['error'] > 0){
	    die('An error ocurred when uploading.');
	}
	
	if(!getimagesize($_FILES['fileToUpload']['tmp_name'])){
	    die('Please ensure you are uploading an image.');
	}
	
	// Check filetype
	if($imageFileType != "png" && $imageFileType != "jpg" && $imageFileType != "jpeg" ){
	    die('Unsupported filetype uploaded.');
	}
	
	// Check filesize
	if($_FILES['fileToUpload']['size'] > 500000){
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
	
	$pic=$_FILES['fileToUpload']['name'];
	$f_name=$pic;
	$repl="_";
	$pattern="/[^a-zA-Z0-9\.]/";
	$f_name=preg_replace($pattern,$repl,$f_name);
	$f_name=str_replace($repl,'',$f_name);
	$old="./filesListing/".$pic;
	$new="./filesListing/".$f_name;
	rename($old,$new);
	$image=$f_name;
	
	// Build the SQL statement to insert data to the DB
	$query = "INSERT INTO artwork (artist_id, title, image, series, year_created, medium_used, height, width, measurement, weight, price, stock) VALUES ('$artist_id','$title','$image','$series','$year','$medium','$height','$width','$measurement','$weight','$price','$stock')";
	// Run the query we just built
	$result = mysqli_query($dbc, $query)
	or die('Unable to write to DB! Process aborted...');

	//Close the DBC
	mysqli_close($dbc);
	
	header('Location: home.php');
	exit;
?>
                            
                            
                            
                            
                            
                               
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            