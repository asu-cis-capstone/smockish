<?php 
	session_start();
	
	$artistID = $_SESSION['sid'];
	
	// PHP connection variables
	$host = 'localhost';
	$user = 'franciso';
	$pw = 'Smockish1';
	$db = 'franciso_smockish';

	// Setup DB connection
	$dbc = mysqli_connect($host, $user, $pw, $db) or die('Unable to connect to DB! Process aborted...');
	
	// Build SQL query to select data
	$query = "SELECT * FROM artwork WHERE artist_id = '$artistID'";
	
	// Run the query
	$result = mysqli_query($dbc, $query) or die('Unable to write to DB! Process aborted...');
	
	$row = mysqli_fetch_array($result);
	$aName = "SELECT name FROM users WHERE user_id = '$artistID'";
	$image = $row['image'];
	$title = $row['title'];
	$artwork = $row['image'];
	$series = $row['series'];
	$year = $row['year_created'];
	$medium = $row['medium'];
	$height = $row['height'];
	$width = $row['width'];
	$dunit = $row['measurement'];
	$weight = $row['weight'];
	$price = $row['price'];
	$stock = $row['stock'];
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="robots" content="noindex,nofollow" />
		<title>Dummy Listing Page</title>
		<link rel='icon' type='image/png' href='favicon.png'>
		<link rel="shortcut icon" type="image/ico" href="favicon.ico" />
		<link rel="stylesheet" href="css/listing.css" /> 
	</head>
	
	<body>
		<div id="artwork">
		<table align="center">
			<tr>
				<td>
					<table>	
						<a class="pic" ><img src="<?php echo 'fileListing/'.$image ?>" alt="" /></a>
					</table>
					</td>
					<td>
					<table class="description" style="color:white">
						<tr><td class="title">Description</td></tr>
						<tr><td class="desc">Enter your description here!</td></tr>
					</table>
					</td>
					<td>
					<table class="information" style="color:white">
						<tr><td class="title"><?php echo "Title: ".$title ?></td></tr>
						<tr><td class="art"><?php echo "Artwork: ".$artwork ?></td></tr>
						<tr><td class="aName"><a href="userProfile.php?ID=<?php $artistID ?>">Artist Name: <?php $aName ?></td></tr>
						<tr><td class="series"><?php echo "Series: ".$series ?></td></tr>
						<tr><td class="year"><?php echo "Year: ".$year ?></td></tr>
						<tr><td class="medium"><?php echo "Medium: ".$medium ?></td></tr>
						<tr><td class="dimensions"><?php echo "Dimensions: ".$height.$dUnit." x ".$width.$dUnit ?></td></tr>
						<tr><td class="dimensions"><?php echo "Weight: ".$weight ?></td></tr>
						<tr><td class="price"><?php echo "Price: $".$price ?></td></tr>
						<tr><td class="stock"><?php echo "Stock: $".$stock ?></td></tr>
						<tr><td><input type="button" value="Buy" style="text-align: center;"></td></tr>
					</table>
				</td>					
			</tr>	
		</table>
		</div>
		<footer>
			<p>&copy; 2014, Studiocracy</p>
		</footer>
	</body>
</html>
                            
   
<table id="product_table">
		<?php
			$query = "SELECT * FROM products";
			$result = mysqli_query($dbc, $query) or die("Error querying the DB");
			while($row = mysqli_fetch_array($result))
			{
				echo '<tr>
				<td><img id="shopping_img" src="' . $row['image'] . '" alt="' . $row['name'] . '" /></td>
				<td><p><strong>' . $row['name'] . '</strong></p>
				<p>' . $row['description'] . '</p>
				<p>Price: <strong>&#36;' . $row['price'] . '</strong></p>
				</td>
				<td><input type="button" value="Add to Cart" onclick="addtocart(' .$row['id'] . ')" />
				</td>
				</tr>';
			}
		?>
	</table>                            
                            