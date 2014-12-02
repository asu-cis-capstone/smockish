<!DOCTYPE html>
<?php
	$price =205;
	$stripe_desc='This is a test message';
	$price_display='$'.$price/100; 
?>

<html lang="en">
	<head>
		<title> Stripe Test</title>
	</head>
	<body>
		<div id="buy">
				<form action="" method="POST">
				  <script
					src="https://checkout.stripe.com/checkout.js" class="stripe-button"
					data-key="pk_test_6pRNASCoBOKtIshFeQd4XMUh"
					data-amount= <?php echo '"'.$price.'"'?>
					data-name="Demo Site"
					data-description= <?php echo'"'.$stripe_desc." (".$price_display.")".'"'?> 
					data-image="/128x128.png">
				  </script>
				</form>
			</div>	
	</body>


