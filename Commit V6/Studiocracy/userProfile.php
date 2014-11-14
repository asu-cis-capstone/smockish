
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
	$joindate = $row['join_date'];
	$email = $row['email_address'];
	$bio = $row['bio'];
	$statement = $row['statement'];
		
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
		<link rel="stylesheet" href="css/sell.css" />
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
				<td style="width:30%"><form action="http://www.google.com/search" method="get"><input type="search" name="q" size="35" onblur="value=''" placeholder="Search"/></form></td>
				<td style="width:45%"><a href="userProfile.php"><?php echo $_SESSION['fname']." ".$_SESSION['lname']; ?></a> | <a  href="editAccount.php">Account Edit</a> | <a href="logout.php">Logout</a></td>
			</tr></table>
		</div>
	
		<div id="profile">
			<table >
				<tr>
					<td>
						<table class="proname">
							<a><img src=<?php echo "filesProfile/" . $image ?>  alt="" /></a>
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
        			<li class="active"><a href="#tab1">Artist Biography</a></li>
        			<li><a href="#tab2">Artist Statment</a></li>
        			<li><a href="#tab3">Contact Information</a></li>
        			
    			</ul>
 
    		<div class="tab-content">
        		<div id="tab1" class="tab active">
        			<p class="biop"><?php echo $bio; ?></p>
            			
        		</div>
 
        		<div id="tab2" class="tab">
            			<p class="artstatement"><?php echo $statement; ?></p>
        		</div>
 
        		<div id="tab3" class="tab">            
        			<p>Tab #3 content goes here!</p>
        		</div>
 		</div>
        		
        		
    		<div id="artWork">
    			<table align="center">
			<?php
				$query = "SELECT * FROM artwork WHERE artist_id='$sid'";
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
						<tr><td class="aName">Artist Name: <a href="userProfile.php?ID='.$row['artist_id'].'">'.$fname." ".$lname.'</td></tr>
						<tr><td class="series">Series: '.$row['series'].'</td></tr>
						<tr><td class="year">Year: '.$row['year_created'].'</td></tr>
						<tr><td class="medium">Medium: '.$row['medium'].'</td></tr>
						<tr><td class="dimensions">Dimensions: '.$row['height'].$row['measurement'].' x '.$row['width'].$row['measurement'].'</td></tr>
						<tr><td class="dimensions">Weight: '.$row['weight'].'</td></tr>
						<tr><td class="price">Price: $'.$row['price'].'</td></tr>
						<tr><td class="stock">Stock: $'.$row['stock'].'</td></tr>
						<tr><td><a href="editListing.php?artID='.$row['art_id'].'"><input class="button" type="button" value="Edit" style="text-align: center;"></a></td></tr>
					</table></td></tr>';
					
				}
			?>	
			</table>
    		</div>
	</body>	
</html>
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            