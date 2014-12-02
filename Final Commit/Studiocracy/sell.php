
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
	
	require_once('./config.php');
?>                                
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="robots" content="noindex,nofollow" />
		<title><?php echo $fname . " " . $lname; ?></title>
		<link rel='icon' type='image/png' href='favicon.png'>
		<link rel="shortcut icon" type="image/ico" href="favicon.ico" />
		<link rel="stylesheet" href="css/sell.css" />
	</head>
	
	
	<body>
	<div id="top">
		<table><tr>
			<td style="width:25%"><a style="font-size:50px;margin-left:60px" href="home.php">Studiocracy</a></td>
			<td style="width:30%"></td>
			<td style="width:45%"><a href="userProfile.php"><?php echo $_SESSION['fname']." ".$_SESSION['lname']; ?></a> | <a  href="editAccount.php">Account Edit</a> | <a href="logout.php">Logout</a></td>
		</tr></table>
	</div>
	
	<div id="artWork">
			<?php
			
			/*Need to change this query to ensure we don't get out of stock items */ 
				$query = "SELECT u.first_name, u.last_name, A.title, A.art_id, A.artist_id, A.descrip, A.image, A.series, A.year_created, A.medium_used, A.height, A.width, A.measurement, A.weight, A.price, A.stock\n"."FROM artwork AS A, users u\n"."WHERE artist_id=u.user_id AND A.stock > 0";
				$result = mysqli_query($dbc, $query) or die('Unable to write to DB! Process aborted...');
				while($row = mysqli_fetch_array($result))
				{ ?>
					<table align="center" class="masterTable">
					<tr><td>
					<div class="innerTable">
					<table class="pics">	
						<a class="pic"><img src="<?php echo $row['image'] ?>" alt="" /></a>
					</table>
					</td>
					
					<td>
					<table class="information">
						<tr><td class="title"><?php echo $row['title'] ?></td></tr>
						<tr><td class="aName">Artist Name: <a href="userProfile.php?ID=<?php echo $row['artist_id'] ?>"><?php echo $row['first_name']." ".$row['last_name']?></td></tr>
						<tr><td class="series">Series: <?php echo $row['series'] ?></td></tr>
						<tr><td class="year">Year: <?php echo $row['year_created'] ?></td></tr>
						<tr><td class="medium">Medium: <?php echo $row['medium_used'] ?></td></tr>
						<tr><td class="dimensions">Dimensions: <?php echo $row['height'].$row['measurement'].' x '.$row['width'].$row['measurement'] ?></td></tr>
						<tr><td class="dimensions">Weight: <?php echo $row['weight'] ?></td></tr>
						<tr><td class="price">Price: $<?php echo $row['price'] ?></td></tr>
						<tr><td class="stock">Stock: <?php echo $row['stock'] ?></td></tr>
						<tr><td>
						
						<?php $amount = $row['price'] * 100; ?> 
							<form action="charge.php" method="post">
								<script src="https://checkout.stripe.com/checkout.js" class="stripe-button"
							  data-key="<?php echo $stripe['publishable_key']; ?>"
							  data-amount=<?php echo '"'.$amount.'"' ?> data-description=<?php echo '"'.$row['descrip'].'"' ?>></script>
							  <input type="hidden" name="price" value=<?php echo '"'.$amount.'"' ?>>
							  <input type="hidden" name="artwork_id" value="<?php echo $row['art_id'] ?>">
							  <input type="hidden" name="artist_first_name" value="<?php echo $row['first_name'] ?>">
							  <input type="hidden" name="artist_last_name" value="<?php echo $row['last_name'] ?>">
							  <input type="hidden" name="artwork_title" value="<?php echo $row['title'] ?>">
							  <input type="hidden" name="image" value="<?php echo $row['image'] ?>">
							  <input type="hidden" name="artwork_year" value="<?php echo $row['year_created'] ?>">
							  
						</form>  	
						
						

						
						
						</td></tr>
					</table></div></td></tr>
					
					</table>
				<?php	
				}
			?>
			
    		</div>
	</body>	
</html>                      
                            
                            
                            
                            
                            
                            
                            