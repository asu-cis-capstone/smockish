                                
<?php	
	//Start a PHP session
	session_start();
	
	if ($_SESSION['lstatus']==false) {
		header("Location: index.php?lerror=3");
		exit;
	}
	
	// PHP connection variables
	$host = 'localhost';
	$user = 'franciso';
	$pw = 'Smockish1';
	$db = 'franciso_smockish';

	// Setup DB connection
	$dbc = mysqli_connect($host, $user, $pw, $db) or die('Unable to connect to DB! Process aborted...');	
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
			<td style="width:45%"><a href="userProfile.php"><?php echo $_SESSION['fname']." ".$_SESSION['lname']; ?></a> | <a  href="editAccount.php">Account Edit</a> | <a href="logout.php">Logout</a></td>
		</tr></table>
	</div>
	
	<div id="artWork">
    			<table align="center">
			<?php
				$query = "SELECT `user_id`,`first_name`,`last_name`,`city`,`state`,`email_address`,`image` FROM `users`";				$result = mysqli_query($dbc, $query) or die('Unable to write to DB! Process aborted...');
				while($row = mysqli_fetch_array($result))
				{
					echo '<tr><td>
					<table class="pics">	
						<a class="pic"><img src="'.$row['image'].'" alt="" /></a>
					</table>
					</td>
					<td>
					<table class="information" style="text-align:left">
						<tr><td class="aName">Name: <a href="userProfile.php?ID='.$row['user_id'].'">'.$row['first_name']." ".$row['last_name'].'</td></tr>
						<tr><td class="series">Location: '.$row['city'].", ".$row['state'].'</td></tr>
						<tr><td class="year">Email: '.$row['email_address'].'</td></tr>
					</table></td></tr>';
					
				}
			?>	
			</table>
    		</div>
	</body>	
</html>                      
                            
                                                            
                            
                            
                            
                            
                            