                                                                                                                                <?php 
session_start();
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="robots" content="noindex,nofollow" />
		<title><?php echo $fname . " " . $lname; ?></title>
		<link rel='icon' type='image/png' href='favicon.png'>
		<link rel="shortcut icon" type="image/ico" href="favicon.ico" />
		<link rel="stylesheet" href="css/styles.css" />
	</head>
	
	
	<body>
	<div id="top">
		<table><tr>
			<td style="width:25%"><a style="font-size:50px;margin-left:60px" href="home.php">Studiocracy</a></td>
			<td style="width:45%"><a href="userProfile.php"><?php echo $_SESSION['fname']." ".$_SESSION['lname']; ?></a> | <a href="editAccount.php">Account Edit</a> | <a href="logout.php">Logout</a></td>
		</tr></table>
	</div>
	
	<?php
	  require_once(dirname(__FILE__) . '/config.php');
	
	  $token  = $_POST['stripeToken'];
	  $price = $_POST['price'];
	  $artwork_id=$_POST['artwork_id']; 
	
	  $customer = Stripe_Customer::create(array(
	      'email' => 'customer@example.com',
	      'card'  => $token
	  ));
	
	  $charge = Stripe_Charge::create(array(
	      'customer' => $customer->id,
	      'amount'   => $price,
	      'currency' => 'usd'
	  ));
	
	  

	  
	  
	  
	  
	  
	 //Connecting to the database
	$servername = 'localhost';
	$username = 'franciso';
	$password = 'Smockish1';
	$dbname = 'franciso_smockish';
		
		
	// Create connection
	$conn = new mysqli($servername, $username, $password,$dbname);
	
	

	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	} 
	$sql = "UPDATE artwork SET stock = stock - 1 WHERE art_id ='$artwork_id'";
	
	
	
	if ($conn->query($sql) === TRUE) {
	    echo "Record updated successfully";
	} else {
	    echo "Error updating record: " . $conn->error;
	}

// Create display

// Get data into variables
$FirstName=$_POST['artist_first_name'];
$LastName=$_POST['artist_last_name']; 
$title =$_POST['artwork_title']; 
$image = $_POST['image']; 
$year = $_POST['artwork_year']; 

							  




	
	$conn->close();
	  
	?>
	
<h1>Congratulations!</h1> 	
<p>You have successfully purchased:</p>
<h2><?php echo $title ?> by <?php echo $FirstName.' '.$LastName ?></h2>
<img src="<?php echo $image ?>" alt="<?php echo $title ?>" />
<h3>Shipped To: </h3>
<p>Title: <?php echo $title ?></p>

<?php
	// Connection variables
	$host = 'localhost';
	$user = 'franciso';
	$pw = 'Smockish1';
	$db = 'franciso_smockish';
	
	// Connect to DB
	$dbc = mysqli_connect($host,$user,$pw,$db) or die('Unable to connect!');
	
	// Query to get the artists email
	$query = "SELECT email_address FROM users WHERE first_name = '$FirstName' AND last_name = '$LastName'";
	
	// Run Query
	$email = mysqli_query($dbc, $query) or die('Unable to read (email)!');
	
	mysqli_close($dbc);
	
	// the message
	$msg = "Please ship ".$title." to ".$_SESSION['fname']." ".$_SESSION['lname']." at ".$_SESSION['address'];

	// use wordwrap() if lines are longer than 100 characters
	$msg = wordwrap($msg,100);

	// send email
	//mail($email,"Sales Order",$msg);
        mail("jennettesuns@msn.com","Sales Order",$msg);
?>
	</body>	
</html>   
                            
                            
                            
                            
                            
                            
                            
                            