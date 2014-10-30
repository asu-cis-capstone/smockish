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
	
		<div id="profile">
			<table align="center">
				<tr>
					<td>
						<table style="color:white">
							<tr>
								<td><a><img src="img/pic.jpg" alt="" /></a></td>
							</tr>
							<tr>
								<td class="name"><?php echo $_SESSION['fname'] . " " . $_SESSION['lname']; ?></td>
							</tr>
							<tr>
								<td><?php echo $_SESSION['city'] . ", " . $_SESSION['state']; ?></td>
							</tr>
							<tr>
								<td><?php echo "Join Date: " . $_SESSION['joindate']; ?></td>
							</tr>
							<tr>
								<td><a href="<?php echo $_SESSION['weburl'];?>"><?php echo $_SESSION['webname']; ?></a></td>
							</tr>
							<tr>
								<td><?php echo $_SESSION['email']; ?></td>
							</tr>
							<tr>
								<td><a href="editProfile.php">Edit Page</a>
							</tr>
						</table>
					</td>
					<td>
						<p class="biotitle">Artist Biography:</p>
						<p class="biop"><?php echo $_SESSION['bio']; ?></p>
					</td>
				</tr>
			</table>
		</div>
		<div id="statement">
			<table>
				<tr><td class="arttitle">Artist Statement:</td></tr>
				<tr><td class="artstatement"><?php echo $_SESSION['statement']; ?></td></tr>
			</table>
		</div>
	</body>	
</html>
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            