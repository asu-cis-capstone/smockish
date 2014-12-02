<?php require_once('./config.php'); ?>
<?php
// My code 

//Connecting to the database
$servername = 'localhost';
$username = 'franciso';
$password = 'Smockish1';
$dbname = 'franciso_smockish';

$artwork_id=$_GET['artwork']; 
	
	
// Create connection
$conn = new mysqli($servername, $username, $password,$dbname);


// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

// sql 
$sql = "SELECT price, stock FROM artwork WHERE art_id =".$artwork_id;
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
		$amount = $row["price"] * 100;
		$stock = $row["stock"];
    }
} else {
    echo "Item not found.";
}
	
$conn->close();
?>
<?
	
	$description='This is coming from a variable'

?>
<html> 
	<head>
		<title>Stripe Test</title>
	</head>
	<body>
	<?php
	
	if($stock < 1)
	{ 
		echo 'This item is out of stock.';
	}
	else
	{
	?>
<form action="charge.php" method="post">
	  <script src="https://checkout.stripe.com/checkout.js" class="stripe-button"
			  data-key="<?php echo $stripe['publishable_key']; ?>"
			  data-amount=<?php echo '"'.$amount.'"' ?> data-description=<?php echo '"'.$description.'"' ?>></script>
			  <input type="hidden" name="price" value=<?php echo '"'.$amount.'"' ?>>
			  <input type="hidden" name="artwork_id" value="<?php echo $artwork_id ?>">

 </form>  	
		<?
	}
	?> 
		
	
	</body>
</html>