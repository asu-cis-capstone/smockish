<?php 
	//Start a PHP session
	session_start();
	
	if ($_SESSION['lstatus']==false) {
		header("Location: index.php?lerror=3");
		exit;
	}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="robots" content="noindex,nofollow" />
		<title><?php echo $_SESSION['fname'] . " " . $_SESSION['lname']; ?></title>
		<link rel='icon' type='image/png' href='favicon.png'>
		<link rel="shortcut icon" type="image/ico" href="favicon.ico" />
		<link rel="stylesheet" href="css/editProfile.css" />
	</head>
	<body>
	<div id="top">
		<table><tr>
			<td style="width:25%"><a style="font-size:50px;margin-left:60px" href="home.php">Studiocracy</a></td>
			<td style="width:30%"><form action="http://www.google.com/search" method="get"><input type="search" name="q" size="35" onblur="value=''" placeholder="Search"/></form></td>
			<td style="width:45%"><a href="userProfile.php"><?php echo $_SESSION['fname']." ".$_SESSION['lname']; ?></a> | <a  href="editAccount.php">Account Edit</a> | <a href="logout.php">Logout</a></td>
		</tr></table>	
	</div>
		<form id="editprofile" action="confirmProfile.php" method="post">
			<div id="profile">
				<table align="center">
					<tr>
						<td>
							<table style="color:white">
								<tr>
									<!-- Upload ArtWork -->
									<td><label for="file">Upload Your Picture:</label>
									<input class="file" type="hidden" name="flag" value="1" />
									<input type="file" name="fileToUpload" id="file" /></td>
									
								</tr>
								<tr>
									<td><label for=”fname”>First Name:</label>
									<input type="text" name="fname"  value ="<?php echo $_SESSION['fname'];?>"
									required pattern="[a-zA-Z-' ]{2,20}" placeholder="Enter your first name"/></td>
								</tr><tr>
									<td><label for=”lname”>Last Name:</label>
									<input type="text" name="lname" required value ="<?php echo $_SESSION['lname'];?>"
 									pattern="[a-zA-Z-' ]{2,20}" placeholder="Enter your last name"/></td>
								</tr>
								<tr>
									<td><label for=”city”>City:</label><input type="text" name="city"
									value ="<?php echo $_SESSION['city'];?>" pattern="[a-zA-Z ]{2,40}" placeholder="Enter city name"/>
								</tr><tr>
									<td><label for=”state”>State:</label><input type="text" name="state" 
									value ="<?php echo $_SESSION['state'];?>" required pattern="[a-zA-Z]{2,2}" 
									placeholder="Enter state code"/></td>
								</tr>
								<tr>
									<td><?php echo "Join Date: " . $_SESSION['joindate']; ?></td>
								</tr>
								<tr>
									<td><label for=”weburl”>Web URL:</label><input type="text" name="weburl"
									value ="<?php echo $_SESSION['weburl'];?>" 
									placeholder="Enter your web address"></td>
								</tr><tr>	
									<td><label for=”webname”>Web Name:</label><input type="text" name="webname"
									value="<?php echo $_SESSION['webname']; ?>"
									placeholder="Enter your web Name"></td>
								</tr>
								<tr>
									<td><label for=”email”>Email:</label><input type="text" name="email" 
									required value ="<?php echo $_SESSION['email']; ?>" 
									pattern="[a-z0-9-_$.]+@[a-z0-9-_.]+\.[a-z]{2,40}"
									placeholder="Enter your email"/></td>
								</tr>
							</table>
						</td>
					</tr>
				</table>
			</div>
			
			<div id="bio">
				<table align="center">							
					<tr><td><label for="bio"> Artist Biography: </label><br />
					<textarea name="bio" rows="19" cols="112" 
					required maxlength="2000" placeholder="Tell us about yourself!">
					<?php echo $_SESSION['bio']; ?></textarea> </td></tr>
				</table>
			</div>
			
			
			<div id="statement">
				<table align="center">
					<tr><td><label for ="arttitle">Artist Statement:</label><br />					
					<textarea name="statement" rows="19" cols="112" 
					required maxlength="2000"  placeholder="Tell us about your artworks!">
					<?php echo $_SESSION['statement']; ?></textarea></td></tr>
				</table>
			</div>	
		
			<div id="contacts">
				<table align="center">
					<tr><td><label for ="contact">Contact:</label><br />						
					<textarea name="contact" rows="19" cols="112" 
					required maxlength="2000" placeholder="Information we can contact you">
					<?php echo $_SESSION['contact']; ?></textarea></td></tr>
				</table>
			</div>			
		<input class="submit" type="submit" value="Save Changes" />
		</form>
	</body>	
</html>
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            