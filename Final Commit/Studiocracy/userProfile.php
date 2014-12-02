<?php
	//Start a PHP session
	session_start();
	
	if ($_SESSION['lstatus']==false) {
		header("Location: index.php?lerror=3");
		exit;
	}
	
	if (isset($_GET['ID']))
	{
		$sid = $_GET['ID'];
	}
	else
	{
		if(isset($_SESSION['sid']))
		{	
			$sid = $_SESSION['sid'];			
		}
		else
			header("Location: 404.htm");
	}
	
	
	
	// PHP connection variables
	$host = 'localhost';
	$user = 'franciso';
	$pw = 'Smockish1';
	$db = 'franciso_smockish';

	// Setup DB connection
	$dbc = mysqli_connect($host, $user, $pw, $db) or die('Unable to connect to DB! Process aborted...');

	// Build SQL query to select data
	$query = "SELECT * FROM users WHERE user_id = '$sid'";

	// Run the query
	$result = mysqli_query($dbc, $query) or die('Unable to write to DB! Process aborted...');
	
	// Get and store our PHP session variables
	$row = mysqli_fetch_array($result);
	$image = $row['image'];
	$fname = $row['first_name'];
	$lname = $row['last_name'];
	$city = $row['city'];
	$state = $row['state'];
	$webname = $row['website_name'];
	$weburl = $row['website_url'];
	$joindate = date("M-d-y",strtotime($row['join_date']));
	$email = $row['email_address'];
	$bio = $row['bio'];
	$statement = $row['statement'];
	
	// Delete function
	if(isset($_POST['delete']))
	{
		if($_POST['delete']==1)
		{
		$art_id=$_POST['art_id'];
			// sql to delete a record
			$sql = "DELETE FROM artwork WHERE art_id='$art_id'";

				if (mysqli_query($dbc, $sql)) {
				} else {
					echo "Error deleting art: " . mysqli_error($dbc);
				}
		}
	}
		
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="robots" content="noindex,nofollow" />
		<title><?php echo $fname . " " . $lname; ?></title>
		<link rel='icon' type='image/png' href='favicon.png'>
		<link rel="shortcut icon" type="image/ico" href="favicon.ico" />
		<link rel="stylesheet" href="css/profilecss.css" />
		<!--<link rel="stylesheet" href="css/sell.css" />-->
		<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
		<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
		<script type="text/javascript">
		
		jQuery(document).ready(function() {
    jQuery('.tabs .tab-links a').on('click', function(e)  {
        var currentAttrValue = jQuery(this).attr('href');
 
        // Show/Hide Tabs
        jQuery('.tabs ' + currentAttrValue).show().siblings().hide();
 
        // Change/remove current tab to active
        jQuery(this).parent('li').addClass('active').siblings().removeClass('active');
 
        e.preventDefault();
    });
});
		</script>
	</head>
	
	
	<body>
		<div id="top">
			<table><tr>
				<td style="width:25%"><a style="font-size:50px;margin-left:60px" href="home.php">Studiocracy</a></td>
				<td style="width:30%"></td>
				<td style="width:45%"><a href="userProfile.php"><?php echo $_SESSION['fname']." ".$_SESSION['lname']; ?></a> | <a  href="editAccount.php">Account Edit</a> | <a href="logout.php">Logout</a></td>
			</tr></table>
		</div>
	
		<div id="profile">
			<?php
			if(isset($_POST['delete']))
			{
				if($_POST['delete']==0)
				{
				
				$delete_artwork_title=$_POST['delete_artwork_title']; 
			?>
			
				<p>You tried to delete <?php echo $_POST['delete_artwork_title']; ?>. Do you really want to delete it?</p>
					
					<form action="userProfile.php" method="post">
						<input type="hidden" name="art_id" value="<?php echo $_POST['art_id']; ?>" />
						<input type="hidden" name="delete" value="1" /><!-- 0 : We have not confirmed that we want to delete yet; 1: We have confirmed - Delete --> 
						<input type="hidden" name="delete_artwork_title" value="<?php echo $delete_artwork_title; ?>" /> 
						<input type="submit" value="Delete Listing">
						</form>
						
				<form action="userProfile.php" method="post">
					<input type="submit" value="Cancel">
				</form>
				<?php
								}
								if($_POST['delete']==1)
								{
									?>
									<p>Successfully deleted <?php echo $_POST['delete_artwork_title']; ?> </p> 
									<?php 
								}
								?>
								
								
					</td>
				</tr> 
			</table> 
			<?php

			}
			?>
			<table >
				<tr>
					<td>
						<table class="proname">
							<a><img src=<?php echo $image ?>  alt="" /></a>
						</table>
					</td> 
					<td>
						<table class="info2" >	
							<tr><td class="name"><?php echo $fname . " " . $lname; ?></td></tr>
							<tr><td><?php echo $city . ", " . $state; ?></td></tr>
							<tr><td><?php echo "Join Date: " . $joindate; ?></td></tr>
							<tr><td><a href="<?php echo $weburl; ?>"><?php echo $webname; ?></a></td></tr>
							<tr><td><?php echo $email; ?></td></tr>
							<?php 
								if (isset($_GET['ID']))
									echo '';
								else
									echo '<tr><td><a href="editProfile.php">Edit Page</a></tr>';
							?>
						</table>
					</td>	
				</tr>
			</table>
		</div>
		
		
		
		
		
		
		
		<div class="tabs">
    			<ul class="tab-links">
        			<li class="active"><a href="#tab1">Artist Biography</a</li>
        			<li><a href="#tab2">Artist Statment</a></li>
    			</ul>
    			
 
    		<div class="tab-content">
        		<div id="tab1" class="tab active">
        			<p class="biop"><?php echo $bio; ?></p>
            			
        		</div>
 
        		<div id="tab2" class="tab">
            			<p class="artstatement"><?php echo $statement; ?></p>
        		</div>
 		</div>
        	</div>	
        		
        	<div id="division">
        	</div>
        		
        		
        		
        		
        		
        		
        		
        		
        		
        		
        		
    		<div id="artWork">
			<?php
			
			/*Need to change this query to ensure we don't get out of stock items */ 
				$query="SELECT u.first_name, u.last_name, A.title, A.art_id, A.artist_id, A.descrip, A.image, A.series, A.year_created, A.medium_used, A.height, A.width, A.measurement, A.weight, A.price, A.stock\n"."FROM artwork AS A, users u\n"."WHERE artist_id=u.user_id AND A.stock >0 AND artist_id= '$sid'";
				
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
					<table class="description">
						<tr><td class="des"></td></tr>
						<tr><td class="input"><!--<? echo $row['descrip'] ?>--></td></tr>
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
						<?php
						
							if (isset($_GET['ID']))
							{
							?>
						<?php $amount = $row['price'] * 100; ?> 
							<form action="charge.php" method="post">
								<script src="https://checkout.stripe.com/checkout.js" class="stripe-button"
							  data-key="<?php echo $stripe['publishable_key']; ?>"
							  data-amount=<?php echo '"'.$amount.'"' ?> data-description=<?php echo '"'.$row['descrip'].'"' ?>></script>
							  <input type="hidden" name="price" value=<?php echo '"'.$amount.'"' ?>>
							  <input type="hidden" name="artwork_id" value="<?php echo $row['art_id'] ?>">

						</form>  	
						
						<?php }else{?>
						<form action="createListing.php" method="post">
						<input type="hidden" name="art_id" value="<?php echo $row['art_id']; ?>" /> 
						<input type="submit" value="Edit Listing">
						</form> 
						
						<form action="userProfile.php" method="post">
						<input type="hidden" name="art_id" value="<?php echo $row['art_id']; ?>" />
						<input type="hidden" name="delete" value="0" /><!-- 0 : We have not confirmed that we want to delete yet; 1: We have confirmed - Delete --> 
						<input type="hidden" name="delete_artwork_title" value="<?php echo $row['title']; ?>" />
						<input type="submit" value="Delete Listing">
						</form>
						
						<?php
						}
						
						?>
						

						
						
						</td></tr>
					</table></div></td></tr>
					
					</table>
				<?php	
				}
			?>
    		</div>	
    		<footer>
			<p>&copy; 2014, Studiocracy</p>
		</footer>	   		
	</body>	
</html>
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            