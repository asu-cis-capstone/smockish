
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
	if(file_exists('./filesProfile/' . $_FILES['fileToUpload']['name'])){
	    die('File with that name already exists.');
	}
	
	// Upload file
	if(!move_uploaded_file($_FILES['fileToUpload']['tmp_name'],"./filesProfile/" . $_FILES['fileToUpload']['name'])){
	    die('Error uploading file - check destination is writeable.');
	}
	
	$pic=$_FILES['fileToUpload']['name'];
	$f_name=$pic;
	$repl="_";
	$pattern="/[^a-zA-Z0-9\.]/";
	$f_name=preg_replace($pattern,$repl,$f_name);
	$f_name=str_replace($repl,'',$f_name);
	$old="./filesProfile/".$pic;
	$new="./filesProfile/".$f_name;
	rename($old,$new);
	$image=$f_name;

	
	// Build the SQL statement to insert data to the DB  
	$query = "UPDATE users 
	SET first_name='$fname', last_name='$lname', city='$city', state='$state', email_address='$email', bio='$bio', statement='$statement', website_name='$webname', website_url='$weburl', image='$image'
	WHERE user_id = '$sid'";

	// Run the query we just built
	$result = mysqli_query($dbc, $query)
	or die('Unable to write to DB! Process aborted...');

	// Build SQL query to select new updated data
	$query = "SELECT * FROM users WHERE user_id = $sid";
	
	// Run the query again
	$result = mysqli_query($dbc, $query)
	or die('Unable to write to DB! Process aborted...');
	
	$row = mysqli_fetch_array($result);
	$_SESSION['fname'] = $row['first_name'];
	$_SESSION['lname'] = $row['last_name'];
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
                                          
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            