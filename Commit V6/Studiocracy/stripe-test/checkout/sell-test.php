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
		<link rel="stylesheet" href="css/sell.css" />
	</head>
	
	
	<body>
	<div id="top">
		<table><tr>
			<td style="width:25%"><a style="font-size:50px;margin-left:60px" href="home.php">Studiocracy</a></td>
			<td style="width:30%"><form action="http://www.google.com/search" method="get"><input type="search" name="q" size="35" onblur="value=''" placeholder="Search"/></form></td>
			<td style="width:45%"><a href="userProfile.php"><?php echo $_SESSION['fname']." ".$_SESSION['lname']; ?></a> | <a  href="editAccount.php">Account Edit</a> | <a href="logout.php">Logout</a></td>
		</tr></table>
	</div>
	
	<div id="artWork">
    			<table align="center">
			<?php
				$sql = "SELECT u.first_name, u.last_name, A.art_id, A.artist_id, A.descrip, A.image, A.series, A.year_created, A.medium_used, A.height, A.width, A.measurement, A.weight, A.price, A.stock\n"
    . "FROM artwork AS A, users u\n"
    . "WHERE artist_id=u.user_id AND A.stock > 0";
				$result = mysqli_query($dbc, $query) or die('Unable to write to DB! Process aborted...');
				while($row = mysqli_fetch_array($result))
				{
					echo '<tr><td>
					<table class="pics">	
						<a class="pic"><img src="filesListing/'.$row['image'].'" alt="" /></a>
					</table>
					</td>
					<td>
					<table class="description">
						<tr><td class="des">Description</td></tr>
						<tr><td class="input">Enter your description here!</td></tr>
					</table>
					</td>
					<td>
					<table class="information" style="text-align:left">
						<tr><td class="title">Title: '.$row['title'].'</td></tr>
						<tr><td class="aName">Artist Name: <a href="userProfile.php?ID='.$row['artist_id'].'">'.$row['first_name']." ".$row['last_name'].'</td></tr>
						<tr><td class="series">Series: '.$row['series'].'</td></tr>
						<tr><td class="year">Year: '.$row['year_created'].'</td></tr>
						<tr><td class="medium">Medium: '.$row['medium'].'</td></tr>
						<tr><td class="dimensions">Dimensions: '.$row['height'].$row['measurement'].' x '.$row['width'].$row['measurement'].'</td></tr>
						<tr><td class="dimensions">Weight: '.$row['weight'].'</td></tr>
						<tr><td class="price">Price: $'.$row['price'].'</td></tr>
						<tr><td class="stock">Stock: $'.$row['stock'].'</td></tr>
						<tr><td>'; ?>
					

						
						
						
						
						</td></tr>
					</table></td></tr>';
					<?
				}
			?>	
			</table>
    		</div>
	</body>	
</html>                      