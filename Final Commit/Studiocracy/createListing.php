                                <?php 
	//Start a PHP session
	session_start();
	
	if ($_SESSION['lstatus']==false) {
		header("Location: index.php?lerror=3");
		exit;
	}
	if(isset($_POST['art_id'])) // If this is set we are here to edit not create. 
	{
			$art_id=$_POST['art_id'];
	
	
	// PHP connection variables
	$host = 'localhost';
	$user = 'franciso';
	$pw = 'Smockish1';
	$db = 'franciso_smockish';

	// Setup DB connection
	$dbc = mysqli_connect($host, $user, $pw, $db)
	or die('Unable to connect to DB! Process aborted...');
	
	$sql = "SELECT * FROM artwork WHERE art_id='$art_id'";
	$result = mysqli_query($dbc, $sql);

	if (mysqli_num_rows($result) > 0) {
		// output data of each row
		while($row = mysqli_fetch_assoc($result)) {
			$art_info=$row; 
		}
	} else {
		echo "0 results";
	}

mysqli_close($dbc);
	}
	
	
	
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
			<td style="width:25%"></td>
			<td style="width:50%"><a href="userProfile.php"><?php echo $_SESSION['fname']." ".$_SESSION['lname']; ?></a> | <a  href="editAccount.php">Account Edit</a> | <a href="logout.php">Logout</a></td>
		</tr></table>
	</div>
	<div id="header">
		<p class="sh1">Listing Form</p>
		<p class="sh2">Please enter your listing info here</p>
	</div>
	
	
	<div id="pic" align="center">
		<img src="img/list1.jpg" alt="" />
	</div>
	
	<form id="joinform" action="confirmListing.php" method="post" enctype="multipart/form-data">
		<p class="fh1">
			Listing Form:
		</p>
		
		<p>
			<!-- Upload ArtWork -->
			<label for="file">Upload Your Picture:</label>
			<?php 
			if(isset($art_id))
			{
			?>
					<input type="hidden" name="art_id" value="<?php echo $art_id; ?>">
			<?php
			}
			?>
			
			<input type="hidden" name="flag" value="1" />
			<input type="file" name="fileToUpload" id="file" />
			<br />
			<br />
			
			<!--ArtWork Title-->
			<label for="artwork">Artwork Title:</label>
			<input type="text" name="title" 
			required autofocus
			pattern="[a-zA-Z-' 0-9]{4,50}" title="Name: 4-50 chars, upper/lower case, numbers and - or ' only" value="<?php if(isset($art_id)){echo $art_info['title'];}?>"/>
			<br />
			<br />
			
			<!--Series-->
			<label for="series">Series:</label>
			<input type="text" name="series" 
			pattern="[a-zA-Z-' 0-9]{4,50}" title="Series: 4-50 chars, upper/lower case, numbers and - or ' only" value="<?php if(isset($art_id)){echo $art_info['series'];}?>"/>
			<br /><br />
			
			<!--Year-->
			<label for="year">Year Created:</label>
			<input type="text" name="year" 
			required pattern="[0-9]{4}" title="Year Created: Please enter a valid four digit year" value="<?php if(isset($art_id)){echo $art_info['year_created'];}?>"/>
			<br /><br />
			
			<!--Medium-->
			<label for="medium">Medium:</label>
			<select  name="medium" required>
            		<option value="">All Mediums</option>
                        <option value="3D Sculpting"<?php if(isset($art_id)&& $art_info['medium_used']=="3D Sculpting"){echo ' selected';}?>>3D Sculpting</option>
                        <option value="Acrylic"<?php if(isset($art_id)&& $art_info['medium_used']=="Acrylic"){echo ' selected';}?>>Acrylic</option>
                        <option value="Airbrush"<?php if(isset($art_id)&& $art_info['medium_used']=="Airbrush"){echo ' selected';}?>>Airbrush</option>
                        <option value="Algorithmic Art"<?php if(isset($art_id)&& $art_info['medium_used']=="Algorithmic Art"){echo ' selected';}?> >Algorithmic Art</option>
                        <option value="Aquatint"<?php if(isset($art_id)&& $art_info['medium_used']=="Aquatint"){echo ' selected';}?> >Aquatint</option>
                        <option value="Ballpoint Pen" <?php if(isset($art_id)&& $art_info['medium_used']=="Ballpoint Pen"){echo ' selected';}?>>Ballpoint Pen</option>
                        <option value="Black and White" <?php if(isset($art_id)&& $art_info['medium_used']=="Black and White"){echo ' selected';}?>>Black &amp; White</option>
                        <option value="Bronze" <?php if(isset($art_id)&& $art_info['medium_used']=="Bronze"){echo ' selected';}?>>Bronze</option>
                        <option value="C-type" <?php if(isset($art_id)&& $art_info['medium_used']=="C-type"){echo ' selected';}?>>C-type</option>
                        <option value="Ceramic" <?php if(isset($art_id)&& $art_info['medium_used']=="Ceramic"){echo ' selected';}?>>Ceramic</option>
                        <option value="Chalk" <?php if(isset($art_id)&& $art_info['medium_used']=="Chalk"){echo ' selected';}?>>Chalk</option>
                        <option value="Charcoal" <?php if(isset($art_id)&& $art_info['medium_used']=="Charcoal"){echo ' selected';}?>>Charcoal</option>
                        <option value="Clay" <?php if(isset($art_id)&& $art_info['medium_used']=="Clay"){echo ' selected';}?>>Clay</option>
                        <option value="Color" <?php if(isset($art_id)&& $art_info['medium_used']=="Color"){echo ' selected';}?>>Color</option>
                        <option value="Conte" <?php if(isset($art_id)&& $art_info['medium_used']=="Conte"){echo ' selected';}?>>Conte</option>
                        <option value="Crayon" <?php if(isset($art_id)&& $art_info['medium_used']=="Crayon"){echo ' selected';}?>>Crayon</option>
                        <option value="Decoupage" <?php if(isset($art_id)&& $art_info['medium_used']=="Decoupage"){echo ' selected';}?>>Decoupage</option>
                        <option value="Digital" <?php if(isset($art_id)&& $art_info['medium_used']=="Digital"){echo ' selected';}?>>Digital</option>
                        <option value="Drypoint" <?php if(isset($art_id)&& $art_info['medium_used']=="Drypoint"){echo ' selected';}?>>Drypoint</option>
                        <option value="Dye Transfer" <?php if(isset($art_id)&& $art_info['medium_used']=="Dye Transfer"){echo ' selected';}?>>Dye Transfer</option>
                        <option value="Enamel" <?php if(isset($art_id)&& $art_info['medium_used']=="Enamel"){echo ' selected';}?>>Enamel</option>
                        <option value="Encaustic" <?php if(isset($art_id)&& $art_info['medium_used']=="Encaustic"){echo ' selected';}?>>Encaustic</option>
                        <option value="Engraving" <?php if(isset($art_id)&& $art_info['medium_used']=="Engraving"){echo ' selected';}?>>Engraving</option>
                        <option value="Environmental" <?php if(isset($art_id)&& $art_info['medium_used']=="Environmental"){echo ' selected';}?>>Environmental</option>
                        <option value="Etching" <?php if(isset($art_id)&& $art_info['medium_used']=="Etching"){echo ' selected';}?>>Etching</option>
                        <option value="Fabric" <?php if(isset($art_id)&& $art_info['medium_used']=="Fabric"){echo ' selected';}?>>Fabric</option>
                        <option value="Fiber" <?php if(isset($art_id)&& $art_info['medium_used']=="Fiber"){echo ' selected';}?>>Fiber</option>
                        <option value="Fiberglass" <?php if(isset($art_id)&& $art_info['medium_used']=="Fiberglass"){echo ' selected';}?>>Fiberglass</option>
                        <option value="Found Objects" <?php if(isset($art_id)&& $art_info['medium_used']=="Found Objects"){echo ' selected';}?>>Found Objects</option>
                        <option value="Fractal" <?php if(isset($art_id)&& $art_info['medium_used']=="Fractal"){echo ' selected';}?>>Fractal</option>
                        <option value="Full spectrum" <?php if(isset($art_id)&& $art_info['medium_used']=="Full spectrum"){echo ' selected';}?>>Full spectrum</option>
                        <option value="Gelatin" <?php if(isset($art_id)&& $art_info['medium_used']=="Gelatin"){echo ' selected';}?>>Gelatin</option>
                        <option value="Gesso" <?php if(isset($art_id)&& $art_info['medium_used']=="Gesso"){echo ' selected';}?>>Gesso</option>
                        <option value="Giclée" <?php if(isset($art_id)&& $art_info['medium_used']=="Giclée"){echo ' selected';}?>>Giclée</option>
                        <option value="Glass" <?php if(isset($art_id)&& $art_info['medium_used']=="Glass"){echo ' selected';}?>>Glass</option>
                        <option value="Gouache" <?php if(isset($art_id)&& $art_info['medium_used']=="Gouache"){echo ' selected';}?>>Gouache</option>
                        <option value="Granite"<?php if(isset($art_id)&& $art_info['medium_used']=="Granite"){echo ' selected';}?> >Granite</option>
                        <option value="Graphite"<?php if(isset($art_id)&& $art_info['medium_used']=="Graphite"){echo ' selected';}?> >Graphite</option>
                        <option value="Household"<?php if(isset($art_id)&& $art_info['medium_used']=="Household"){echo ' selected';}?> >Household</option>
                        <option value="Ink"<?php if(isset($art_id)&& $art_info['medium_used']=="Ink"){echo ' selected';}?> >Ink</option>
                        <option value="Interactive"<?php if(isset($art_id)&& $art_info['medium_used']=="Interactive"){echo ' selected';}?> >Interactive</option>
                        <option value="Kinetic" <?php if(isset($art_id)&& $art_info['medium_used']=="Kinetic"){echo ' selected';}?> >Kinetic</option>
                        <option value="LED"<?php if(isset($art_id)&& $art_info['medium_used']=="LED"){echo ' selected';}?> >LED</option>
                        <option value="Latex"<?php if(isset($art_id)&& $art_info['medium_used']=="Latex"){echo ' selected';}?> >Latex</option>
                        <option value="Leather"<?php if(isset($art_id)&& $art_info['medium_used']=="Leather"){echo ' selected';}?> >Leather</option>
                        <option value="Lenticular"<?php if(isset($art_id)&& $art_info['medium_used']=="Lenticular"){echo ' selected';}?> >Lenticular</option>
                        <option value="Lights"<?php if(isset($art_id)&& $art_info['medium_used']=="Lights"){echo ' selected';}?> >Lights</option>
                        <option value="Linocuts"<?php if(isset($art_id)&& $art_info['medium_used']=="Linocuts"){echo ' selected';}?> >Linocuts</option>
                        <option value="Lithograph"<?php if(isset($art_id)&& $art_info['medium_used']=="Lithograph"){echo ' selected';}?> >Lithograph</option>
                        <option value="Manipulated" <?php if(isset($art_id)&& $art_info['medium_used']=="Manipulated"){echo ' selected';}?> >Manipulated</option>
                        <option value="Marble"<?php if(isset($art_id)&& $art_info['medium_used']=="Marble"){echo ' selected';}?> >Marble</option>
                        <option value="Marker"<?php if(isset($art_id)&& $art_info['medium_used']=="Marker"){echo ' selected';}?> >Marker</option>
                        <option value="Metal"<?php if(isset($art_id)&& $art_info['medium_used']=="Metal"){echo ' selected';}?> >Metal</option>
                        <option value="Mezzotint"<?php if(isset($art_id)&& $art_info['medium_used']=="Mezzotint"){echo ' selected';}?> >Mezzotint</option>
                        <option value="Monotype"<?php if(isset($art_id)&& $art_info['medium_used']=="Monotype"){echo ' selected';}?> >Monotype</option>
                        <option value="Mosaic"<?php if(isset($art_id)&& $art_info['medium_used']=="Mosaic"){echo ' selected';}?> >Mosaic</option>
                        <option value="Neon"<?php if(isset($art_id)&& $art_info['medium_used']=="Neon"){echo ' selected';}?> >Neon</option>
                        <option value="New Media"<?php if(isset($art_id)&& $art_info['medium_used']=="New Media"){echo ' selected';}?> >New Media</option>
                        <option value="Oil"<?php if(isset($art_id)&& $art_info['medium_used']=="Oil"){echo ' selected';}?> >Oil</option>
                        <option value="Paint"<?php if(isset($art_id)&& $art_info['medium_used']=="Paint"){echo ' selected';}?> >Paint</option>
                        <option value="Paper"<?php if(isset($art_id)&& $art_info['medium_used']=="Paper"){echo ' selected';}?> >Paper</option>
                        <option value="Paper mache"<?php if(isset($art_id)&& $art_info['medium_used']=="Paper mache"){echo ' selected';}?> >Paper mache</option>
                        <option value="Pastel"<?php if(isset($art_id)&& $art_info['medium_used']=="Pastel"){echo ' selected';}?> >Pastel</option>
                        <option value="Pen and Ink"<?php if(isset($art_id)&& $art_info['medium_used']=="Pen and Ink"){echo ' selected';}?> >Pen and Ink</option>
                        <option value="Pencil"<?php if(isset($art_id)&& $art_info['medium_used']=="Pencil"){echo ' selected';}?> >Pencil</option>
                        <option value="Photo"<?php if(isset($art_id)&& $art_info['medium_used']=="Photo"){echo ' selected';}?> >Photo</option>
                        <option value="Photogram"<?php if(isset($art_id)&& $art_info['medium_used']=="Photogram"){echo ' selected';}?> >Photogram</option>
                        <option value="Photography"<?php if(isset($art_id)&& $art_info['medium_used']=="Photography"){echo ' selected';}?> >Photography</option>
                        <option value="Pinhole"<?php if(isset($art_id)&& $art_info['medium_used']=="Pinhole"){echo ' selected';}?> >Pinhole</option>
                        <option value="Plaster"<?php if(isset($art_id)&& $art_info['medium_used']=="Plaster"){echo ' selected';}?> >Plaster</option>
                        <option value="Plastic"<?php if(isset($art_id)&& $art_info['medium_used']=="Plastic"){echo ' selected';}?> >Plastic</option>
                        <option value="Platinum"<?php if(isset($art_id)&& $art_info['medium_used']=="Platinum"){echo ' selected';}?> >Platinum</option>
                        <option value="Polaroid"<?php if(isset($art_id)&& $art_info['medium_used']=="Polaroid"){echo ' selected';}?> >Polaroid</option>
                        <option value="Pottery"<?php if(isset($art_id)&& $art_info['medium_used']=="Pottery"){echo ' selected';}?> >Pottery</option>
                        <option value="Precious Materials"<?php if(isset($art_id)&& $art_info['medium_used']=="Precious Materials"){echo ' selected';}?> >Precious Materials</option>
                        <option value="Resin"<?php if(isset($art_id)&& $art_info['medium_used']=="Resin"){echo ' selected';}?> >Resin</option>
                        <option value="Robotics"<?php if(isset($art_id)&& $art_info['medium_used']=="Robotics"){echo ' selected';}?> >Robotics</option>
                        <option value="Rubber"<?php if(isset($art_id)&& $art_info['medium_used']=="Rubber"){echo ' selected';}?> >Rubber</option>
                        <option value="Screenprinting"<?php if(isset($art_id)&& $art_info['medium_used']=="Screenprinting"){echo ' selected';}?> >Screenprinting</option>
                        <option value="Silverpoint"<?php if(isset($art_id)&& $art_info['medium_used']=="Silverpoint"){echo ' selected';}?> >Silverpoint</option>
                        <option value="Sound"<?php if(isset($art_id)&& $art_info['medium_used']=="Sound"){echo ' selected';}?> >Sound</option>
                        <option value="Spray Paint"<?php if(isset($art_id)&& $art_info['medium_used']=="Spray Paint"){echo ' selected';}?> >Spray Paint</option>
                        <option value="Steel"<?php if(isset($art_id)&& $art_info['medium_used']=="Steel"){echo ' selected';}?> >Steel</option>
                        <option value="Stencil"<?php if(isset($art_id)&& $art_info['medium_used']=="Stencil"){echo ' selected';}?> >Stencil</option>
                        <option value="Stone"<?php if(isset($art_id)&& $art_info['medium_used']=="Stone"){echo ' selected';}?> >Stone</option>
                        <option value="Taxidermy"<?php if(isset($art_id)&& $art_info['medium_used']=="Taxidermy"){echo ' selected';}?> >Taxidermy</option>
                        <option value="Tempera"<?php if(isset($art_id)&& $art_info['medium_used']=="Tempera"){echo ' selected';}?> >Tempera</option>
                        <option value="Textile"<?php if(isset($art_id)&& $art_info['medium_used']=="Textile"){echo ' selected';}?> >Textile</option>
                        <option value="Timber"<?php if(isset($art_id)&& $art_info['medium_used']=="Timber"){echo ' selected';}?> >Timber</option>
                        <option value="Vector"<?php if(isset($art_id)&& $art_info['medium_used']=="Vector"){echo ' selected';}?> >Vector</option>
                        <option value="Video"<?php if(isset($art_id)&& $art_info['medium_used']=="Video"){echo ' selected';}?> >Video</option>
                        <option value="Watercolor"<?php if(isset($art_id)&& $art_info['medium_used']=="Watercolor"){echo ' selected';}?> >Watercolor</option>
                        <option value="Wax"<?php if(isset($art_id)&& $art_info['medium_used']=="Wax"){echo ' selected';}?> >Wax</option>
                        <option value="Wood"<?php if(isset($art_id)&& $art_info['medium_used']=="Wood"){echo ' selected';}?> >Wood</option>
                        <option value="Woodcut"<?php if(isset($art_id)&& $art_info['medium_used']=="Woodcut"){echo ' selected';}?> >Woodcut</option>
                    </select>
			<br /><br />
			
			<!--Dimensions-->
			<label for="dimension">Dimension(height):</label>
			<input type="text" name="hdimension" 
			required pattern="[0-9.]{1,10}" title="Height: Please enter the accurate size of the art, numbers only" value="<?php if(isset($art_id)){echo $art_info['height'];}?>"  />
			<br /><br />
			
			<!--Dimensions-->
			<label for="dimension">Dimension(width):</label>
			<input type="text" name="wdimension" 
			required pattern="[0-9.]{1,10}" title="Width: Please enter the accurate size of the art, numbers only" value="<?php if(isset($art_id)){echo $art_info['width'];}?>" />
			<br /><br />
			
			<!--Measurement-->
			<label for="measurement">Measurement:</label>
			<select name="measurement" required >
						<option value="">Select unit of measurement</option>
                        <option value="ft" <?php if(isset($art_id)&& $art_info['measurement']=="ft"){echo ' selected';}?> >ft</option>
                        <option value="in" <?php if(isset($art_id)&& $art_info['measurement']=="in"){echo ' selected';}?>>in</option>
                    	</select>
			<br /><br />
			
			<!--Weight-->
			<label for="weight">Weight(in Pounds):</label>
			<input type="text" name="weight" 
			required pattern="[0-9.]{1,6}" title="Weight: Please enter the weight of the art in pounds" value="<?php if(isset($art_id)){echo $art_info['weight'];}?>" />
			<br /><br />
			
			<!--Price-->
			<label for="price">Price:</label>
			<input type="text" name="price" 
			required pattern="[0-9.]{1,10}" title="Price: Please enter the dollar amount of the art" value="<?php if(isset($art_id)){echo $art_info['price'];}?>" />
			<br /><br />
			
			<!--Quantity-->
			<label for="stock">Quantity:</label>
			<input type="text" name="stock" 
			required pattern="[0-9]{1,4}" title="Quantity: Please enter the quantity of the art, numbers only" value="<?php if(isset($art_id)){echo $art_info['width'];}?>" />
			<br /><br />
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
	
	<footer>
		<p>&copy; 2014, Studiocracy</p>
	</footer>
		
    </body> 
</html>          

                            