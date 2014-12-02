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
	$address = $_POST['address'];
	$city = $_POST['city'];
	$state = $_POST['state'];
	$weburl = $_POST['weburl'];
	$webname = mysqli_real_escape_string($dbc,$_POST['webname']);
	$email = mysqli_real_escape_string($dbc,$_POST['email']);
	$bio = mysqli_real_escape_string($dbc,$_POST['bio']);
	$statement = mysqli_real_escape_string($dbc,$_POST['statement']);
	$sid = $_SESSION['sid'];
	
	
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
	$target_dir = "filesProfile/";
	$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
	$imageFileType = strToLower(pathinfo($target_file,PATHINFO_EXTENSION));
	$image = $target_file;

	/*// Check for errors
	if($_FILES['fileToUpload']['error'] > 0){
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
	if(file_exists('./filesProfile/' . $_FILES['fileToUpload']['name'])){
	    die('File with that name already exists.');
	}
	
	// Upload file
	if(!move_uploaded_file($_FILES['fileToUpload']['tmp_name'],"./filesProfile/" . $_FILES['fileToUpload']['name'])){
	    die('Error uploading file - check destination is writeable.');
	}
	}

	// Build the SQL statement to insert data to the DB  
	$query = "UPDATE users 
	SET first_name='$fname', last_name='$lname', address='$address', city='$city', state='$state', email_address='$email', bio='$bio', 
	statement='$statement', website_name='$webname', website_url='$weburl', image='$image'
	WHERE user_id = '$sid'";


	// Run the query we just built
	$result = mysqli_query($dbc, $query)
	or die('Unable to write to DB! Process aborted...1');

	// Build SQL query to select new updated data
	$query = "SELECT * FROM users WHERE user_id = $sid";
	
	// Run the query again
	$result = mysqli_query($dbc, $query)
	or die('Unable to write to DB! Process aborted...2');
	
	$row = mysqli_fetch_array($result);
	$_SESSION['fname'] = $row['first_name'];
	$_SESSION['lname'] = $row['last_name'];
	$_SESSION['address'] = $row['address'];
	$_SESSION['city'] = $row['city'];
	$_SESSION['state'] = $row['state'];
	$_SESSION['webname'] = $row['website_name'];
	$_SESSION['weburl'] = $row['website_url'];
	$_SESSION['email'] = $row['email_address'];
	$_SESSION['bio'] = $row['bio'];
	$_SESSION['statement'] = $row['statement'];
	$_SESSION['image'] = $row['image'];

	//Close the DBC
	mysqli_close($dbc);
	
	session_write_close();
	header('Location: userProfile.php');
	exit;
?>
                                          
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                                          
                            
                            
                            
                            
                                               
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            