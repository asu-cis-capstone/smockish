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
			<td style="width:30%"></td>
			<td style="width:45%"><a href="userProfile.php"><?php echo $_SESSION['fname']." ".$_SESSION['lname']; ?></a> | <a href="editAccount.php">Account Edit</a> | <a href="logout.php">Logout</a></td>
		</tr></table>	
		

	</div>	
	<div id="header">
		<p class="sh1">Account Edit</p>
		<p class="sh2">Please enter your listing info here</p>
	</div>
	
	<form id="joinform" action="confirmAccount.php" method="post">
		<p class="fh11">
			Edit User:
		</p>
		
		<p>
			<label for="fname">First Name:</label>
			<input type="text" name="fname" 
			required autofocus value ="<?php echo $_SESSION['fname'];?>"
			pattern="[a-zA-Z-' ]{4,50}" title="Please enter your first name" />
			<br /><br />
			
			<label for="lname">Last Name:</label>
			<input type="text" name="lname" 
			required value ="<?php echo $_SESSION['lname'];?>"
			pattern="[a-zA-Z-' ]{4,50}" title="Please enter your last name" />
			<br /><br />
			
			<label>Address:</label>
			<input type="text" name="address" 
			required value ="<?php echo $_SESSION['address'];?>"
			pattern="[0-9a-zA-Z-' ]{2,30}" title="Please enter your address" /><br /><br />
			<label>City:</label>
			<input type="text" name="city" 
			required value ="<?php echo $_SESSION['city'];?>"
			pattern="[a-zA-Z-' ]{2,30}" title="Please enter your city" /><br /><br />
			
			<label for="state">State</label>
							<select name="state" id="state" required title="Select your state of residence.">
								<option value="">Select Your State</option>
								<option value="AL"<?php if($_SESSION['state']=='AL'){echo ' selected';} ?>>Alabama</option>
								<option value="AK"<?php if($_SESSION['state']=='AK'){echo ' selected';} ?>>Alaska</option>
								<option value="AZ"<?php if($_SESSION['state']=='AZ'){echo ' selected';} ?>>Arizona</option>
								<option value="AR"<?php if($_SESSION['state']=='AL'){echo ' selected';} ?>>Arkansas</option>
								<option value="CA"<?php if($_SESSION['state']=='AL'){echo ' selected';} ?>>California</option>
								<option value="CO"<?php if($_SESSION['state']=='CO'){echo ' selected';} ?>>Colorado</option>
								<option value="CT"<?php if($_SESSION['state']=='CT'){echo ' selected';} ?>>Connecticut</option>
								<option value="DE"<?php if($_SESSION['state']=='DE'){echo ' selected';} ?>>Delaware</option>
								<option value="DC"<?php if($_SESSION['state']=='DC'){echo ' selected';} ?>>District Of Columbia</option>
								<option value="FL"<?php if($_SESSION['state']=='FL'){echo ' selected';} ?>>Florida</option>
								<option value="GA"<?php if($_SESSION['state']=='GA'){echo ' selected';} ?>>Georgia</option>
								<option value="HI"<?php if($_SESSION['state']=='HI'){echo ' selected';} ?>>Hawaii</option>
								<option value="ID"<?php if($_SESSION['state']=='ID'){echo ' selected';} ?>>Idaho</option>
								<option value="IL"<?php if($_SESSION['state']=='IL'){echo ' selected';} ?>>Illinois</option>
								<option value="IN"<?php if($_SESSION['state']=='IN'){echo ' selected';} ?>>Indiana</option>
								<option value="IA"<?php if($_SESSION['state']=='IA'){echo ' selected';} ?>>Iowa</option>
								<option value="KS"<?php if($_SESSION['state']=='KS'){echo ' selected';} ?>>Kansas</option>
								<option value="KY"<?php if($_SESSION['state']=='KY'){echo ' selected';} ?>>Kentucky</option>
								<option value="LA"<?php if($_SESSION['state']=='LA'){echo ' selected';} ?>>Louisiana</option>
								<option value="ME"<?php if($_SESSION['state']=='ME'){echo ' selected';} ?>>Maine</option>
								<option value="MD"<?php if($_SESSION['state']=='MD'){echo ' selected';} ?>>Maryland</option>
								<option value="MA"<?php if($_SESSION['state']=='MA'){echo ' selected';} ?>>Massachusetts</option>
								<option value="MI"<?php if($_SESSION['state']=='MI'){echo ' selected';} ?>>Michigan</option>
								<option value="MN"<?php if($_SESSION['state']=='MN'){echo ' selected';} ?>>Minnesota</option>
								<option value="MS"<?php if($_SESSION['state']=='MS'){echo ' selected';} ?>>Mississippi</option>
								<option value="MO"<?php if($_SESSION['state']=='MO'){echo ' selected';} ?>>Missouri</option>
								<option value="MT"<?php if($_SESSION['state']=='MT'){echo ' selected';} ?>>Montana</option>
								<option value="NE"<?php if($_SESSION['state']=='NE'){echo ' selected';} ?>>Nebraska</option>
								<option value="NV"<?php if($_SESSION['state']=='NV'){echo ' selected';} ?>>Nevada</option>
								<option value="NH"<?php if($_SESSION['state']=='NH'){echo ' selected';} ?>>New Hampshire</option>
								<option value="NJ"<?php if($_SESSION['state']=='NJ'){echo ' selected';} ?>>New Jersey</option>
								<option value="NM"<?php if($_SESSION['state']=='NM'){echo ' selected';} ?>>New Mexico</option>
								<option value="NY"<?php if($_SESSION['state']=='NY'){echo ' selected';} ?>>New York</option>
								<option value="NC"<?php if($_SESSION['state']=='NC'){echo ' selected';} ?>>North Carolina</option>
								<option value="ND"<?php if($_SESSION['state']=='ND'){echo ' selected';} ?>>North Dakota</option>
								<option value="OH"<?php if($_SESSION['state']=='OH'){echo ' selected';} ?>>Ohio</option>
								<option value="OK"<?php if($_SESSION['state']=='OK'){echo ' selected';} ?>>Oklahoma</option>
								<option value="OR"<?php if($_SESSION['state']=='OR'){echo ' selected';} ?>>Oregon</option>
								<option value="PA"<?php if($_SESSION['state']=='PA'){echo ' selected';} ?>>Pennsylvania</option>
								<option value="RI"<?php if($_SESSION['state']=='RI'){echo ' selected';} ?>>Rhode Island</option>
								<option value="SC"<?php if($_SESSION['state']=='SC'){echo ' selected';} ?>>South Carolina</option>
								<option value="SD"<?php if($_SESSION['state']=='SD'){echo ' selected';} ?>>South Dakota</option>
								<option value="TN"<?php if($_SESSION['state']=='TN'){echo ' selected';} ?>>Tennessee</option>
								<option value="TX"<?php if($_SESSION['state']=='TX'){echo ' selected';} ?>>Texas</option>
								<option value="UT"<?php if($_SESSION['state']=='UT'){echo ' selected';} ?>>Utah</option>
								<option value="VT"<?php if($_SESSION['state']=='VT'){echo ' selected';} ?>>Vermont</option>
								<option value="VA"<?php if($_SESSION['state']=='VA'){echo ' selected';} ?>>Virginia</option>
								<option value="WA"<?php if($_SESSION['state']=='WA'){echo ' selected';} ?>>Washington</option>
								<option value="WV"<?php if($_SESSION['state']=='WV'){echo ' selected';} ?>>West Virginia</option>
								<option value="WI"<?php if($_SESSION['state']=='WI'){echo ' selected';} ?>>Wisconsin</option>
								<option value="WY"<?php if($_SESSION['state']=='WY'){echo ' selected';} ?>>Wyoming</option>
							</select><br /><br />
			
			<label>Zip Code</label>
			<input type="text" name="zip" value ="<?php echo $_SESSION['zip']; ?>"
			required  pattern="[0-9]{5,5}" title="Please enter your zip code"/>
			<br /><br />
			
			<label for="email">Email:</label>
			<input type="text" name="email" value ="<?php echo $_SESSION['email']; ?>" 
			pattern="[a-z0-9-_$.]+@[a-z0-9-_.]+\.[a-z]{2,20}" title="Please enter your email">
			<br /><br />
			
			<label for="password">New Password:</label>
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
				<a href="home.php" target="_parent"><input type="button" value="Back"></a> 
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
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            