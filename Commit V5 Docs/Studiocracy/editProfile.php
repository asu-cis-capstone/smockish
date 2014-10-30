                                <?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="robots" content="noindex,nofollow" />
		<title><?php echo $_SESSION['fname'] . " " . $_SESSION['lname']; ?></title>
		<link rel='icon' type='image/png' href='favicon.png'>
		<link rel="shortcut icon" type="image/ico" href="favicon.ico" />
		<link rel="stylesheet" href="css/profilecss.css" />
	</head>
	<body>
	<div id="top">
			<table>
				<tr>
					<td style="width:30%"><a class="title" href="home.php">Studiocracy</a></td>
					<td style="width:35%"><form action="http://www.google.com/search" method="get"><input type="search" name="q" size="35" onblur="value=''" placeholder="Search"/></form></td>
					<td style="width:35%"><a href="profile.php"><?php echo $_SESSION['fname'] . " " . $_SESSION['lname']; ?></a> | <a class="iframe" href="cart.php">Cart</a> | <a href="logout.php">Logout</a></td>
					</tr>
			</table>
		</div>
	
		<form id="editprofile" action="confirmProfile.php" method="post">
			<div id="profile">
				<table align="center">
					<tr>
						<td>
							<table style="color:white">
								<tr>
									<td><a><img src="img/pic.jpg" alt="" /></a></td>
								</tr>
								<tr>
									<td><label for=”fname”>First Name:</label>
									<input type="text" name="fname" value ="<?php echo $_SESSION['fname'];?>" 
									required pattern="[a-zA-Z-' ]{2,20}" /></td>
								</tr><tr>
									<td><label for=”lname”>Last Name:</label>
									<input type="text" name="lname" required value ="<?php echo $_SESSION['lname'];?>"
 									pattern="[a-zA-Z-' ]{2,20}" /></td>
								</tr>
								<tr>
									<td><label for=”city”>City:</label><input type="text" name="city"
									value ="<?php echo $_SESSION['city'];?>" pattern="[a-zA-Z ]{2,40}"/>
								</tr><tr>
									<td><label for=”state”>State:</label><input type="text" name="state" 
									value ="<?php echo $_SESSION['state'];?>" required pattern="[a-zA-Z]{2,2}"/></td>
								</tr>
								<tr>
									<td><?php echo "Join Date: " . $_SESSION['joindate']; ?></td>
								</tr>
								<tr>
									<td><label for=”weburl”>Web URL:</label><input type="text" name="weburl" required 
									value ="<?php echo $_SESSION['weburl'];?>"></td>
								</tr><tr>	
									<td><label for=”webname”>Web Name:</label><input type="text" name="webname" required 
									value="<?php echo $_SESSION['webname']; ?>"></td>
								</tr>
								<tr>
									<td><label for=”email”>Email:</label><input type="text" name="email" 
									required value ="<?php echo $_SESSION['email']; ?>" 
									pattern="[a-z0-9-_$.]+@[a-z0-9-_.]+\.[a-z]{2,40}"/></td>
								</tr>
							</table>
						</td>
						<td>
							<label for=”bio”> Artist Biography: </label><br /><textarea style="resize:none; font-size:90%;" name="bio" 
							rows="19" cols="112" required maxlength="2000" 
							pattern="[a-zA-Z0-9-' ]{1,2000}" /><?php echo $_SESSION['bio']; ?></textarea> 
						</td>
					</tr>
				</table>
			</div>
				<div id="statement">
					<table style="width: 990px">
						<tr><td><label for =”arttitle”>Artist Statement:</label></td></tr>
						<tr><td><textarea style="resize:none; font-size:90%;" name="statement" 
						rows="19" cols="156" required maxlength="2000" 
						pattern="[a-zA-Z0-9-' ]{1,2000}" /><?php echo $_SESSION['statement']; ?></textarea></td></tr>
					</table>
				</div>	
		
		<input type="submit" value="Save Changes" />
		

		</form>
	</body>	
</html>
                            
                            
                            
                            