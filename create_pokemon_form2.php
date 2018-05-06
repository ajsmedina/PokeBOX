<html>
<body>

<form action="create_pokemon.php" method="post">

<?php //server info
	$servername = "localhost";
	$username = "ajsmedina";
	$password = "";
	$database_name = "my_ajsmedina";

	$conn = new mysqli($servername, $username, $password, $database_name);

	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 

	echo "Nickname: <input type=\"text\"  name=\"name\" readonly value=\"".$_POST["name"]."\"> <br />";
	echo "Species: <input type=\"text\"  name=\"species\" readonly value=\"".$_POST["species"]."\"> <br />";
	
	$sql = "SELECT * FROM POKEMON_DEFAULT_DATA WHERE species=\"".$_POST["species"]."\"";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();
	
	if($row==0){
		echo "The Pokemon \"".$_POST["species"]."\" does not exist. Please input a correct Pokemon.<br />";
	} else {
?>

Ability:
<select name="ability">
	<?php
		$abilities = array($row["ability1"],$row["ability2"],$row["ability3"]);
		
		for($i=0;$i<3; $i++) {
			if(!is_null($abilities[$i])){
			echo "<option value=\"".$abilities[$i]."\">".$abilities[$i]."</option>";
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
		while($nrow = $result->fetch_assoc()) {
			$nature = $nrow["name"];
			echo "<option value=\"".$nature."\">".$nature;
			echo "( +".$nrow["statup"].", -".$nrow["statdown"].") </option>";
		}
	 
  ?>
</select>
<br>

Stats: <br />
HP: <input type="number" name="hp" min="0" max="255" value="0"> <br />
ATK: <input type="number" name="atk" min="0" max="255" value="0"> <br />
DEF: <input type="number" name="def" min="0" max="255" value="0"> <br />
SPATK: <input type="number" name="spatk" min="0" max="255" value="0"> <br />
SPDEF: <input type="number" name="spdef" min="0" max="255" value="0"> <br />
SPD: <input type="number" name="spd" min="0" max="255" value="0"> <br />

Moves: <br />
<input type="text" name="move1" /><br />
<input type="text" name="move2" /><br />
<input type="text" name="move3" /><br />
<input type="text" name="move4" /><br /><br />

<?php
	}
	
	$conn->close();
	
	echo "<input type=\"text\" style=\"visibility: hidden\" name=\"tid\" readonly value=\"";
	echo $_POST["tid"];
	echo "\"> <br />";

	if($row!=0){?>
	
	<input type="submit" value='Add Pokemon'>
	
<?php } ?>
<input type='submit' value='Back' onclick='this.form.action="create_pokemon_form.php";' />
</form>

</body>
</html>