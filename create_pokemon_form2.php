<html>
	<head>
		<title> PokeBOX</title>
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>
<body>

<div id="content">
<h1> Create Pokemon </h1>
	<form action="create_pokemon.php" method="post">
	<div class="left">
		<h2> Pokemon Info </h2>
		<?php 
			//Server Info
			$servername = "localhost";
			$username = "ajsmedina";
			$password = "";
			$database_name = "my_ajsmedina";

			$conn = new mysqli($servername, $username, $password, $database_name);

			// Check connection
			if ($conn->connect_error) {
				die("Connection failed: " . $conn->connect_error);
			} 

			//These readonly fields just remind the user what Pokemon they are working with.
			echo "Nickname: <input type=\"text\"  name=\"name\" readonly value=\"".$_POST["name"]."\"> <br />";
			echo "Species: <input type=\"text\"  name=\"species\" readonly value=\"".$_POST["species"]."\"> <br />";
			
			//Gets data from the Pokemon species provided.
			//This is why we have two pages.
			$sql = "SELECT * FROM POKEMON_DEFAULT_DATA WHERE species=\"".$_POST["species"]."\"";
			
			$result = $conn->query($sql);
			$row = $result->fetch_assoc();
			
			//If the user inputted an incorrect species, don't run the rest of the pokemon info
			if($row!=0){
		?>

		Ability:
		<select name="ability">
			<?php
				$abilities = array($row["ability1"],$row["ability2"],$row["ability3"]);
				
				//Maximum of 3 abilities per Pokemon
				//Fact-check this since I think some have 4?
				for($i=0;$i<3; $i++) {
					//Don't display "NULL" since not every Poemon has 3 abilities.
					if(!is_null($abilities[$i])){
						echo "<option value=\"".$abilities[$i]."\" ";
						
						if($_POST["ability"]==$abilities[$i]){
							echo " selected ";
						}
						
						echo">".$abilities[$i];
						echo "</option>";
					}
				}
			 
		  ?>
		</select>
		<br>

		Nature: 
		<select name="nature">
			<?php
				$sql = "SELECT * FROM NATURES_DATA";
				$result = $conn->query($sql);
				
				//Create option for each nature
				while($nrow = $result->fetch_assoc()) {
					$nature = $nrow["name"];
					echo "<option value=\"".$nature."\"";
					if($_POST["nature"]==$nature){
						echo " selected ";
					}
					echo "> ".$nature;
					
					//Display the stat changes the nature gives.
					echo "( +".$nrow["statup"].", -".$nrow["statdown"].")";
					
					echo" </option>";
				}
			 
		  ?>
		</select>
		<?php } ?>
	</div>

	<div class="right">
		<?php //If the user inputted an incorrect species, then provide an error code and don't run the rest of the code.
			if($row==0){
				echo "The Pokemon \"".$_POST["species"]."\" does not exist. Please go back and input a correct Pokemon.<br />";
			} else {?>
		<h2> Battle Info </h2>
		
		<div class="subleft">
			EVs: <br />
			<?php
				$stats = array("hp","atk","def","spatk","spdef","spd");
				//Display each stat. Stats can range from 0-255
				for($i = 0; $i< sizeof($stats);$i++){
					echo strtoupper($stats[$i]).": <input type=\"number\" name=\"".$stats[$i]."\" min=\"0\" max=\"255\" value=\"".$_POST[$stats[$i]]."\"> <br />";
				}
			?>
		</div >
		<div class="subright">
			Moves: <br />
			<input type="text" name="move1" /><br />
			<input type="text" name="move2" /><br />
			<input type="text" name="move3" /><br />
			<input type="text" name="move4" /><br /><br />
		</div>
		<?php } ?>
	</div>
	
	<div class="middle">

		<?php
			$conn->close();

			if($row!=0){?>
			
			<input type="submit" value='Add Pokemon'>
			
		<?php } ?>
		<input type='submit' value='Back' onclick='this.form.action="create_pokemon_form.php";' />
	</div>
	
	<div class="hidden">
		<?php
			echo "<br /> <input type=\"text\" style=\"visibility: hidden\" name=\"tid\" readonly value=\"";
			echo $_POST["tid"];
			echo "\"> ";?>
	</div>
	</form>
</div>

</body>
</html>