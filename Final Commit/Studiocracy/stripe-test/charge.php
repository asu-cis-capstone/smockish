<?php
  require_once(dirname(__FILE__) . '/config.php');

  $token  = $_POST['stripeToken'];
  $price = $_POST['price'];
  $artwork_id=$_POST['artwork_id']; 

  $customer = Stripe_Customer::create(array(
      'email' => 'customer@example.com',
      'card'  => $token
  ));

  $charge = Stripe_Charge::create(array(
      'customer' => $customer->id,
      'amount'   => $price,
      'currency' => 'usd'
  ));

  echo '<h1>Successfully charged '.'$'.$price/100 .'</h1>';
  
  //Connecting to the database
$servername = 'localhost';
$username = 'franciso';
$password = 'Smockish1';
$dbname = 'franciso_smockish';
	
	
// Create connection
$conn = new mysqli($servername, $username, $password,$dbname);


// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$sql = "UPDATE artwork SET stock = stock - 1 WHERE art_id ='$artwork_id'";



if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();
  
?>