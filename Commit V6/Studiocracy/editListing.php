<?php 
	//Start a PHP session
	session_start();
	
	if ($_SESSION['lstatus']==false) {
		header("Location: index.php?lerror=3");
		exit;
	}
	
	if (isset($_GET['artID']))
		$artID = $_GET['artID'];
	else
		header("Location: 404.htm");
		
	// PHP connection variables
	$host = 'localhost';
	$user = 'franciso';
	$pw = 'Smockish1';
	$db = 'franciso_smockish';

	// Setup DB connection
	$dbc = mysqli_connect($host, $user, $pw, $db) or die('Unable to connect to DB! Process aborted...');

	// Build SQL query to select data
	$query = "SELECT * FROM artWork WHERE art_id = '$artID' AND artist_id = '$_SESSION['sid']'";
	
	// Run the query
	$result = mysqli_query($dbc, $query) or die('Unable to write to DB! Process aborted...');
	
	// Get and store our PHP session variables
	$row = mysqli_fetch_array($result);

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- Meta tag -->
		<meta name="robots" content="noindex,nofollow" />
		<meta charset= "utf-8" />

		<!-- Link tag for CSS -->
		<link type="text/css" rel="stylesheet" href="css/listingForm.css" />
		
		<!-- Web Page Title -->
		<title>Listing Form</title>

	</head>
	
	<body>
	<div id="top">
		<table><tr>
			<td style="width:25%"><a style="font-size:50px;margin-left:60px" href="home.php">Studiocracy</a></td>
			<td style="width:30%"><form action="http://www.google.com/search" method="get"><input type="search" name="q" size="35" onblur="value=''" placeholder="Search"/></form></td>
			<td style="width:45%"><a href="userProfile.php"><?php echo $_SESSION['fname']." ".$_SESSION['lname']; ?></a> | <a  href="editAccount.php">Account Edit</a> | <a href="logout.php">Logout</a></td>
		</tr></table>
	</div>

	<div id="header">
		<p class="sh1">Edit Listing Form</p>
		<p class="sh2">Please enter your listing info here to edit it</p>
	</div>
	
	<form id="joinform" action="confirmEditListing.php" method="post">
		<p class="fh1">
			Listing Form:
		</p>
		
		<p>
			<!--ArtWork Title-->
			<label for="artwork">Artwork Title:</label>
			<input type="text" name="title" 
			required autofocus
			pattern="[a-zA-Z-' 0-9]{4,50}" title="Name: 4-50 chars, upper/lower case, numbers and - or ' only" />
			<br />
			
			<!--Series-->
			<label for="series">Series:</label>
			<input type="text" name="series" 
			pattern="[a-zA-Z-' 0-9]{4,50}" title="Series: 4-50 chars, upper/lower case, numbers and - or ' only" />
			<br />
			
			<!--Year-->
			<label for="year">Year Created:</label>
			<input type="text" name="year" 
			required pattern="[0-9]{4}" title="Year Created: Please enter a valid four digit year" />
			<br />
			
			<!--Medium-->
			<label for="medium">Medium:</label>
			<select  name="medium" >
            		<option value="">All Mediums</option>
                        <option value="3D Sculpting" >                3D Sculpting            </option>
                        <option value="Acrylic" >                Acrylic            </option>
                        <option value="Airbrush" >                Airbrush            </option>
                        <option value="Algorithmic Art" >                Algorithmic Art            </option>
                        <option value="Aquatint" >                Aquatint            </option>
                        <option value="Ballpoint Pen" >                Ballpoint Pen            </option>
                        <option value="Black & White" >                Black & White            </option>
                        <option value="Bronze" >                Bronze            </option>
                        <option value="C-type" >                C-type            </option>
                        <option value="Ceramic" >                Ceramic            </option>
                        <option value="Chalk" >                Chalk            </option>
                        <option value="Charcoal" >                Charcoal            </option>
                        <option value="Clay" >                Clay            </option>
                        <option value="Color" >                Color            </option>
                        <option value="Conte" >                Conte            </option>
                        <option value="Crayon" >                Crayon            </option>
                        <option value="Decoupage" >                Decoupage            </option>
                        <option value="Digital" >                Digital            </option>
                        <option value="Drypoint" >                Drypoint            </option>
                        <option value="Dye Transfer" >                Dye Transfer            </option>
                        <option value="Enamel" >                Enamel            </option>
                        <option value="Encaustic" >                Encaustic            </option>
                        <option value="Engraving" >                Engraving            </option>
                        <option value="Environmental" >                Environmental            </option>
                        <option value="Etching" >                Etching            </option>
                        <option value="Fabric" >                Fabric            </option>
                        <option value="Fiber" >                Fiber            </option>
                        <option value="Fiberglass" >                Fiberglass            </option>
                        <option value="Found Objects" >                Found Objects            </option>
                        <option value="Fractal" >                Fractal            </option>
                        <option value="Full spectrum" >                Full spectrum            </option>
                        <option value="Gelatin" >                Gelatin            </option>
                        <option value="Gesso" >                Gesso            </option>
                        <option value="Giclée" >                Giclée            </option>
                        <option value="Glass" >                Glass            </option>
                        <option value="Gouache" >                Gouache            </option>
                        <option value="Granite" >                Granite            </option>
                        <option value="Graphite" >                Graphite            </option>
                        <option value="Household" >                Household            </option>
                        <option value="Ink" >                Ink            </option>
                        <option value="Interactive" >                Interactive            </option>
                        <option value="Kinetic" >                Kinetic            </option>
                        <option value="LED" >                LED            </option>
                        <option value="Latex" >                Latex            </option>
                        <option value="Leather" >                Leather            </option>
                        <option value="Lenticular" >                Lenticular            </option>
                        <option value="Lights" >                Lights            </option>
                        <option value="Linocuts" >                Linocuts            </option>
                        <option value="Lithograph" >                Lithograph            </option>
                        <option value="Manipulated" >                Manipulated            </option>
                        <option value="Marble" >                Marble            </option>
                        <option value="Marker" >                Marker            </option>
                        <option value="Metal" >                Metal            </option>
                        <option value="Mezzotint" >                Mezzotint            </option>
                        <option value="Monotype" >                Monotype            </option>
                        <option value="Mosaic" >                Mosaic            </option>
                        <option value="Neon" >                Neon            </option>
                        <option value="New Media" >                New Media            </option>
                        <option value="Oil" >                Oil            </option>
                        <option value="Paint" >                Paint            </option>
                        <option value="Paper" >                Paper            </option>
                        <option value="Paper mache" >                Paper mache            </option>
                        <option value="Pastel" >                Pastel            </option>
                        <option value="Pen and Ink" >                Pen and Ink            </option>
                        <option value="Pencil" >                Pencil            </option>
                        <option value="Photo" >                Photo            </option>
                        <option value="Photogram" >                Photogram            </option>
                        <option value="Photography" >                Photography            </option>
                        <option value="Pinhole" >                Pinhole            </option>
                        <option value="Plaster" >                Plaster            </option>
                        <option value="Plastic" >                Plastic            </option>
                        <option value="Platinum" >                Platinum            </option>
                        <option value="Polaroid" >                Polaroid            </option>
                        <option value="Pottery" >                Pottery            </option>
                        <option value="Precious Materials" >                Precious Materials            </option>
                        <option value="Resin" >                Resin            </option>
                        <option value="Robotics" >                Robotics            </option>
                        <option value="Rubber" >                Rubber            </option>
                        <option value="Screenprinting" >                Screenprinting            </option>
                        <option value="Silverpoint" >                Silverpoint            </option>
                        <option value="Sound" >                Sound            </option>
                        <option value="Spray Paint" >                Spray Paint            </option>
                        <option value="Steel" >                Steel            </option>
                        <option value="Stencil" >                Stencil            </option>
                        <option value="Stone" >                Stone            </option>
                        <option value="Taxidermy" >                Taxidermy            </option>
                        <option value="Tempera" >                Tempera            </option>
                        <option value="Textile" >                Textile            </option>
                        <option value="Timber" >                Timber            </option>
                        <option value="Vector" >                Vector            </option>
                        <option value="Video" >                Video            </option>
                        <option value="Watercolor" >                Watercolor            </option>
                        <option value="Wax" >                Wax            </option>
                        <option value="Wood" >                Wood            </option>
                        <option value="Woodcut" >                Woodcut            </option>
                    </select>
			
			<!--Dimensions-->
			<label for="dimension">Dimension(height):</label>
			<input type="text" name="hdimension" 
			required pattern="[0-9.]{1,10}" title="Height: Please enter the accurate size of the art, numbers only"  />
			<br />
			
			<!--Dimensions-->
			<label for="dimension">Dimension(width):</label>
			<input type="text" name="wdimension" 
			required pattern="[0-9.]{1,10}" title="Width: Please enter the accurate size of the art, numbers only" />
			<br />
			
			<!--Price-->
			<label for="price">Price:</label>
			<input type="text" name="price" 
			required pattern="[0-9.]{1,10}" title="Price: Please enter the dollar amount of the art" />
			<br />
			
			<!--Quantity-->
			<label for="stock">Quantity:</label>
			<input type="text" name="stock" 
			required pattern="[0-9]{1,4}" title="Quantity: Please enter the quantity of the art, numbers only" />
			<br />
		</p>
		
		<p class="submit">
			<!--Submit button -->
			<input type="submit" value="Submit!" />
			
			<!--Reset button -->
			<span class="reset">
				<input type="reset" value="Clear Form!" onclick="history.go(0)"/>
			</span>
		</p>
		<p id="messages"></p>
	</form> 
    </body> 
</html>                                
                            
                            
                            
                            
                            
                            
                            
                            