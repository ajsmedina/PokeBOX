<html>
<body>

<?php

//server info
$servername = "localhost";
$username = "ajsmedina";
$password = "";
$database_name = "my_ajsmedina";

$conn = new mysqli($servername, $username, $password, $database_name);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

//Initialize stat arrays 
$tid=$_POST["tid"];;
$name = $_POST["name"];
$species = $_POST["species"];
$ability = $_POST["ability"];
$nature = $_POST["nature"];
$move = array(NULL, NULL, NULL, NULL);
$stats = array(NULL, NULL, NULL, NULL, NULL, NULL);

//Set up statements for insert
$stmt = $conn->prepare("INSERT INTO POKEMON_BOX_DATA (trainerid, name, species, ability, nature, move1, move2, move3, move4, hp, atk, def, spatk, spdef, spd) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("issssssssiiiiii", $tid, $name, $species, $ability, $nature, $move[0], $move[1], $move[2], $move[3], $stats[0], $stats[1], $stats[2], $stats[3], $stats[4], $stats[5]);



$stmt->execute();

echo $_POST["name"];
echo " was added to your box!";

$stmt->close();
$conn->close();

?>

<form action="main_menu.php" method="post">
<?php
	echo "Trainer ID: <input type=\"text\" name=\"tid\" readonly value=\"";
	echo $_POST["tid"];
	echo "\"> <br />"
?>

<input type='submit' value='Main Menu' />
</form>


</body>
</html>