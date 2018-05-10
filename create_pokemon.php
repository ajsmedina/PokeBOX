<html>
<body>

<?php

//Server Info
$servername = "localhost";
$username = "ajsmedina";
$password = "";
$database_name = "my_ajsmedina";

$conn = new mysqli($servername, $username, $password, $database_name);

//Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

//Initialize All Fields
$tid=$_POST["tid"];
$name = $_POST["name"];
$species = $_POST["species"];
$ability = $_POST["ability"];
$nature = $_POST["nature"];
$move = array($_POST["move1"], $_POST["move2"], $_POST["move3"], $_POST["move4"]);
$stats = array($_POST["hp"], $_POST["atk"], $_POST["def"], $_POST["spatk"], $_POST["spdef"], $_POST["spd"]);

$goback = 0;

//Total up EVs
$stattot = 0;
for($i=0;$i<6;$i++){
	$stattot += $stats[$i];
}

//EVs cannot exceed 550. If they do, then do not insert Pokemon.
if($stattot>550){
	echo "Your EVs are ".$stattot."/510. Please make sure your EVs are inputted correctly.";
	$goback=1;
}
//If EVs are fine, then insert Pokemon.
else{
	$stmt = $conn->prepare("INSERT INTO POKEMON_BOX_DATA (trainerid, name, species, ability, nature, move1, move2, move3, move4, hp, atk, def, spatk, spdef, spd) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
	$stmt->bind_param("issssssssiiiiii", $tid, $name, $species, $ability, $nature, $move[0], $move[1], $move[2], $move[3], $stats[0], $stats[1], $stats[2], $stats[3], $stats[4], $stats[5]);

	$stmt->execute();

	echo $_POST["name"];
	echo " was added to your box!";

	$stmt->close();
	$conn->close();
}

?>

<form action="main_menu.php" method="post">


<?php
	echo "<input type=\"text\" style=\"visibility: hidden\" name=\"tid\" readonly value=\"";
	echo $_POST["tid"];
	echo "\"> <br />";
	
	//If there was an error with input (ex. EVs), then these hidden form fields will send data back
	//to previous page. ie The user will not have to input the fields again.
	if($goback==1){ 
		echo "<input type=\"text\"  style=\"visibility: hidden\" name=\"name\" readonly value=\"".$_POST["name"]."\"> <br />";
		echo "<input type=\"text\"  style=\"visibility: hidden\" name=\"species\" readonly value=\"".$_POST["species"]."\"> <br />";
		echo "<input type=\"text\"  style=\"visibility: hidden\" name=\"nature\" readonly value=\"".$_POST["nature"]."\"> <br />";
		echo "<input type=\"text\"  style=\"visibility: hidden\" name=\"ability\" readonly value=\"".$_POST["ability"]."\"> <br />";
		echo "<input type=\"text\"  style=\"visibility: hidden\" name=\"move1\" readonly value=\"".$_POST["move1"]."\"> <br />";
		echo "<input type=\"text\"  style=\"visibility: hidden\" name=\"move2\" readonly value=\"".$_POST["move2"]."\"> <br />";
		echo "<input type=\"text\"  style=\"visibility: hidden\" name=\"move3\" readonly value=\"".$_POST["move3"]."\"> <br />";
		echo "<input type=\"text\"  style=\"visibility: hidden\" name=\"move4\" readonly value=\"".$_POST["move4"]."\"> <br />";
		echo "<input type=\"text\"  style=\"visibility: hidden\" name=\"hp\" readonly value=\"".$_POST["hp"]."\"> <br />";
		echo "<input type=\"text\"  style=\"visibility: hidden\" name=\"atk\" readonly value=\"".$_POST["atk"]."\"> <br />";
		echo "<input type=\"text\"  style=\"visibility: hidden\" name=\"def\" readonly value=\"".$_POST["def"]."\"> <br />";
		echo "<input type=\"text\"  style=\"visibility: hidden\" name=\"spakt\" readonly value=\"".$_POST["spatk"]."\"> <br />";
		echo "<input type=\"text\"  style=\"visibility: hidden\" name=\"spdef\" readonly value=\"".$_POST["spdef"]."\"> <br />";
		echo "<input type=\"text\"  style=\"visibility: hidden\" name=\"spd\" readonly value=\"".$_POST["spd"]."\"> <br />";
		
		?>
		
		<input type='submit' value='Back' onclick='this.form.action="create_pokemon_form2.php";' />
	<?php
	}else{
?>

<input type='submit' value='Add Another Pokemon' onclick='this.form.action="create_pokemon_form.php";' />
<input type='submit' value='Main Menu' />

<?php
	}
?>
</form>


</body>
</html>