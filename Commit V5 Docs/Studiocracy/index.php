<?php
	//Start a PHP session
	session_start();
	
	//Check to see if user is already logged in
	if (isset($_SESSION['sid']))
	{
		header("Location: home.php?login=1");
		exit;
	}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="robots" content="noindex,nofollow" />
		<title>Studiocracy</title>
		<link rel='icon' type='image/png' href='favicon.png'>
		<link rel="shortcut icon" type="image/ico" href="favicon.ico" />
		<link rel="stylesheet" href="css/style.css" />
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
	</head>

	<body>
		<div id="top">
			<?php
			if (isset($_GET['lerror'])) {
				if($_GET['lerror'] == 1)
					echo '<p style="font-size:20px;margin:0px;background:red;">Email invalid!</p>';
				if($_GET['lerror'] == 2)
					echo '<p style="font-size:20px;margin:0px;background:red;">Password invalid!</p>';
				if($_GET['lerror'] == 3)
					echo '<p style="font-size:20px;margin:0px;background:red;">User not logged in, please login!</p>';
			}
			if (isset($_GET['logout'])) {
				if($_GET['logout'] == 1)
					echo '<p style="font-size:20px;margin:0px;background:green;">Logout Success!</p>';
			}?>
			<table>
				<tr>
					<td style="width:30%"><a class="title" href="index.php">Studiocracy</a></td>
					<td style="width:35%"><form action="http://www.google.com/search" method="get"><input type="search" name="q" size="35" onblur="value=''" placeholder="Search"/></form></td>
					<td style="width:35%"><a class="inline" href="#signin"> Sign-In </a>|<a class="inline" href="#reg"> Register </a>|<a class="iframe" href="how_it_works.htm"> How It Works </a></td>
				</tr>
			</table>
		</div>
		
		<div id="email">
			<strong>Welcome to your gallery.</strong>
			<p>Buy art directly from artists at any price range.<br />Build your network and discover rising talent near you.</p>
			<a class="iframe" href="http://francisogertschnig.com/Studiocracy/lists/?p=subscribe&amp;id=1"><input type="button" value="get early access" /></a>
			</form>
		</div>
		
		<div id="nav">
			<a href="#info1"><img src="img/buy.png" alt="" /></a>
			<a href="#info2"><img src="img/sell.png" alt=""/></a>
			<a href="#info3"><img src="img/meet.png" alt=""/></a>
		</div>
		
		<div id="info1">
			<table>
				<tr><td colspan="2"><h1 style="font-size:45px">optimized transactions, personal experience.</h1></td></tr>
				<tr>
					<td valign="top" align="left">
						<p>Browse a huge searchable database of art<br />from the convenience of your home.<br />Ranking algorithms personally<br />recommended art and help you make an<br />informed purchase about what's hot.<br />Then complete the purchase online,<br />securely and quickly.</p>
						<p>Not sold from our listings? Get in touch<br />with the seller, arrange to see the art in person,<br />or schedule a tour of the artist's studio with one<br />click of a button. Be as involved as you want to<br />be with every work you collect.</p>
					</td>
					<td><img src="img/1.png" alt="" /></td>
				</tr>
			</table >
		</div>
		<div id="info2">
			<table>
				<tr><td colspan="2"><h1 style="font-size:45px">it's your art. sell it on your terms.</h1></tr>
				<tr>
					<td><img src="img/2.png" alt="" /></td>
					<td valign="top" align="right">
						<p>Studiocracy is the world's largest art show - and<br />it never ends. Anyone can list their art<br />online, set their prices, and personally work<br />with interested collectors.</p>
						<p>Kiss goodbye to high comission rates.<br />At Studiocracy, you retain over 85% of the<br />profit from each transaction. that's higher<br />than any online retailer in the industry.</p>
					</td>
				</tr>
			</table>
		</div>
		<div id="info3">
			<table>
				<tr><td colspan="2"><h1 style="font-size:45px">the art world's new home network.</h1></tr>
				<tr>
					<td valign="top" align="left">
						<p>Studiocracy takes the conversion about<br />culture and brings it online, accessible<br />and open to everyone. Join conversations<br />about trending art. Connect with local<br />artists and collectors in your area.<br />Act as a patron and promote the art<br />you love. We believe that art is for<br />everyone, and now anyone can participate<br />in the art world.</p>
					</td>
					<td><img src="img/3.png" alt="" /></td>
				</tr>
			</table>
		</div>
		
		<div style='display:none'>
			<div id="signin">
				<form action="checkLogin.php" method="post">
					<h1>Sign In</h1>
					<hr>
					<p><input type="email" name="email" placeholder="E-mail Address" required pattern="[a-z0-9.-_$]+@[a-z0-9-_]+\.[a-z]{2,6}" maxlength="50"/></p>
					<p><input type="password" name="password" placeholder="Password" required pattern="[a-zA-Z0-9-_!$]{4,20}"/></p>
					<p><a class="inline fix" href="#reset">Forgot your password?</a></p>
					<button type="submit">Sign In To Your Account</button>
					<p>Not a member? <a class="inline fix" href="#reg">Join Now</a></p>
				</form>
			</div>
		</div>
		<div style='display:none'>
			<div id="reset">
				<form action="#" method="post">
					<h1>Password Recovery</h1>
					<hr>
					<p>Enter your email address below and we will send you a replacement password.</p>
					<p><input type="email" name="email" placeholder="E-mail Address" required title="{6-50 char} Must include an @ and a . after" pattern="[a-z0-9.-_$]+@[a-z0-9-_]+\.[a-z]{2,6}" maxlength="50"/></p>
					<button type="submit">Reset Password</button>
				</form>
			</div>
		</div>
		<div style='display:none'>
			<div id="reg">
				<form action="confirmRegistration.php" method="post">
					<h1>Studiocracy Registration</h1>
					<hr>
					<table>
						<tr>
							<td><label>First Name*</label><br />
							<input type="text" name="fname" placeholder="First Name" required title="{2-30 char} Upper/Lower Case Alphabetic Characters, - and ' Only." pattern="[a-zA-Z-' ]{2,30}"/></td>
							<td><label>Nick Name</label><br />
							<input type="text" name="nname" placeholder="Nick Name" title="{2-30 char} Upper/Lower Case Alphabetic Characters, - and ' Only." pattern="[a-zA-Z-' ]{2,30}"/></td>
							<td><label>Last Name*</label><br />
							<input type="text" name="lname" placeholder="Last Name" required title="{2-30 char} Upper/Lower Case Alphabetic Characters, - and ' Only." pattern="[a-zA-Z-' ]{2,30}"/></td>
						</tr>
						<tr>
							<td><label>Zip Code*</label><br />
							<input type="text" name="zip" placeholder="Zip Code" required title="{5 char} Numeric Characters Only." pattern="[0-9]{5,5}"/></td>
							<td><label>Referral Code</label><br />
							<input type="text" name="refcode" placeholder="Referral Code" title="{8 char} Alphanumeric Characters Only." pattern="[a-zA-Z0-9]{8,8}"/></td>
							
							<td><label>User Type*</label><br />
							<label for="artist" class="usertypelabel">Artist</label><input class="usertypebox" type="checkbox" name="usertype" id="artist" value="artist" title="Please select either Artist or Collector"/>
							<label for="artist" class="usertypelabel">Collector</label><input class="usertypebox" type="checkbox" name="usertype" id="collector" value="collector" /></td>						
						</tr>
						<tr>
							<td><label>E-mail Address*</label><br />
							<input type="email" name="email" placeholder="E-mail Address" required title="{6-50 char}  Must include an @ and a . after" pattern="[a-z0-9.-_$]+@[a-z0-9-_]+\.[a-z]{2,6}" maxlength="50"/></td>
							<td><label>Password*</label><br />
							<input type="password" name="password" placeholder="Password" required title="{4-20 char} Alphanumeric Characters, - _ ! and $ Only." onchange="form.reenter.pattern=this.value;" pattern="[a-zA-Z0-9-_!$]{4,20}"/></td>
							<td><label>Confirm Password*</label><br />
							<input type="password" name="cpassword" placeholder="Confirm Password" required title="Password must match!" pattern="[a-zA-Z0-9-_!$]{4,20}"/></td>
						</tr>
					</table>
					<h2>Join Our Newsletter</h2>
					<hr>
					<p>Stay up to date on works by your favorite artists and get notified when new auctions launch.</p>
					<input type="checkbox" name="newscheck" /><label>Sign me up!</label>
					<p>By signing up you agree to Studiocracy's <a class="iframe fix" href="about/terms.htm">terms and conditions</a> and <a class="iframe fix" href="about/privacy.htm">privacy policy</a>.</p>
					<button type="submit">Join Now</button>
					<p>Already a member? <a class="inline fix" href="#signin">Sign In</a></p>
				</form>
			</div>
		</div>
		<footer>
			<p>&copy; 2014, Studiocracy</p>
		</footer>

	</body>
</html>
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            