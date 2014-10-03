<!DOCTYPE html>
<?php
$email = $_POST["email"];
$fh = fopen("email.txt", "a");
fwrite($fh, $email."\n");
fclose($fh);
?>
<html>
<head>
	<meta charset="utf-8">
	<title>PHP Testing Page</title>
</head>
<body> 
<div><p style="font-size:500%; text-align:center;">TEST SUCCESS!</p></div>
</body>
</html>