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
		<meta name="robots" content="noindex,nofollow" />
		<meta charset= "utf-8" />
		<link type="text/css" rel="stylesheet" href="css/editAccount.css" />
		<link rel="stylesheet" href="css/colorbox.css">
		<script src="js/script.js"></script>
        	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        	<script src="js/jquery.colorbox.js"></script>
		<script>
			$(document).ready(function(){
				$(".art").colorbox({rel:'art'});
				$(".pic").colorbox({rel:'pic'});
				$(".youtube").colorbox({iframe:true, innerWidth:640, innerHeight:390});
				$(".iframe").colorbox({iframe:true, width:"80%", height:"80%"});
				$("a.inline").colorbox({inline:true});
			});
		</script>
		
		<!-- Web Page Title -->
		<title>Account Edit</title>

	</head>
	
	<body>
	
	<div id="top">
		<?php
		if (isset($_GET['aerror'])) {
			if($_GET['aerror'] == 1)
				echo '<p style="font-size:20px;margin:0px;background:red;">Name Invalid!</p>';
			if($_GET['aerror'] == 2)
				echo '<p style="font-size:20px;margin:0px;background:red;">Email invalid!</p>';
			if($_GET['aerror'] == 3)
				echo '<p style="font-size:20px;margin:0px;background:red;">Current Password Invalid!</p>';
		}
		if (isset($_GET['a'])) {
			if($_GET['a'] == 1)
				echo '<p style="font-size:20px;margin:0px;background:green;">Account Edit Success!</p>';
		}
		if (isset($_GET['error'])) {
					if($_GET['error'] == 1)
						echo '<p style="font-size:20px;margin:0px;background:red;">Incorrect Email!</p>';
		}?>
			<table><tr>
				<td style="width:25%"><a style="font-size:50px;margin-left:60px" href="home.php">Studiocracy</a></td>
				<td style="width:30%"><form action="http://www.google.com/search" method="get"><input type="search" name="q" size="35" onblur="value=''" placeholder="Search"/></form></td>
				<td style="width:45%"><a href="userProfile.php"><?php echo $_SESSION['fname']." ".$_SESSION['lname']; ?></a> | <a  href="editAccount.php">Account Edit</a> | <a href="logout.php">Logout</a></td>
			</tr></table>
	</div>	
	<div id="header">
		<p class="sh1">Account Edit</p>
		<p class="sh2">Please enter your listing info here</p>
	</div>
	
	<form id="joinform" action="confirmAccount.php" method="post">
		<p class="fh1">
			Edit User:
		</p>
		
		<p>
			<label for="fname">First Name:</label>
			<input type="text" name="fname" 
			required autofocus value ="<?php echo $_SESSION['fname'];?>"
			pattern="[a-zA-Z-' ]{4,50}" title="Please enter your first name">
			<br /><br />
			
			<label for="lname">Last Name:</label>
			<input type="text" name="lname" 
			required autofocus value ="<?php echo $_SESSION['lname'];?>"
			pattern="[a-zA-Z-' ]{4,50}" title="Please enter your last name">
			<br /><br />
			
			<label for="email">Email:</label>
			<input type="text" name="email" value ="<?php echo $_SESSION['email']; ?>" 
			pattern="[a-z0-9-_$.]+@[a-z0-9-_.]+\.[a-z]{2,20}" title="Please enter your email">
			<br /><br />
			
			<label for="password">Password:</label>
			<input type="password" id="password" name="password" 
			required
			pattern="[a-zA-Z0-9-_!$]{5,15}"
			title="Please enter Password, 5-15 chars, upper/lower case, number and -_!$ only"
			onchange="form.reenter.pattern=this.value;">
			<br /><br />
	
			<label for="reenter">Re-enter Password:</label>
			<input type="password" id="reenter" name="reenter" 
			title="Reentered must match your password" required>
			<br /><br />
		
			<label for="oldpw">Current Password:</label>
			<input type="oldpw" id="oldpw" name="oldpw" 
			title="Please enter your current password" required>
			<br /><br />	
		</p>
		
		<p class="button" style="text-align:center">
			<!--Update button -->
			<input class="update" type="submit" value="Update">
			
			<!--Back button -->
			<span class="back">
				<a href="home.php"><input type="button" value="Back"></a> 
			</span>

			<!--Delete Account -->
			<span class="delete">
				<a class="inline" href="#dAccount"><input type="button" value="Delete Account"></a>
			</span>
		</p>
	</form>
	<div style='display:none'>
			<div style="color:black; text-align:center;" id="dAccount">
				<?php
				?>
				<form action="deleteAccount.php" target="_parent" method="post">
					<h1>Delete Account Confirmation</h1>
					<hr>
					<p>Are you sure you wish to delete your account? If so, enter your email address below.</p>
					<p><input type="email" name="email" placeholder="E-mail Address" required title="{6-50 char} Must include an @ and a . after" pattern="[a-z0-9.-_$]+@[a-z0-9-_]+\.[a-z]{2,6}" maxlength="50"/></p>
					<button type="submit">Confirm Account Deletion</button>
				</form>
			</div>
	</div>
		<footer>
			<p>&copy; 2014, Studiocracy</p>
		</footer>
    </body> 
</html>                                
	                                
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            