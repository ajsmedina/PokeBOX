<html>

<body>

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


//This creates the table for Pokemon Data.
//If adding to an existing table, comment this out.
$conn->query("CREATE TABLE POKEMON_DEFAULT_DATA (
				id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
				species VARCHAR(30) NOT NULL,
				type1 VARCHAR(30) NOT NULL,
				type2 VARCHAR(30),
				ability1 VARCHAR(30) NOT NULL,
				ability2 VARCHAR(30),
				ability3 VARCHAR(30),
				hp INT(6) NOT NULL,
				atk INT(6) NOT NULL,
				def INT(6) NOT NULL,
				spatk INT(6) NOT NULL,
				spdef INT(6) NOT NULL,
				spd INT(6) NOT NULL
)");

//Initialize stat arrays 
$type = array(NULL, NULL);
$ability = array(NULL, NULL, NULL);
$stats = array(NULL, NULL, NULL, NULL, NULL, NULL);

//Set up statements for insert
$stmt = $conn->prepare("INSERT INTO POKEMON_DEFAULT_DATA (species, type1, type2, ability1, ability2, ability3, hp, atk, def, spatk, spdef, spd) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssssssiiiiii", $name, $type[0], $type[1], $ability[0], $ability[1], $ability[2], $stats[0], $stats[1], $stats[2], $stats[3], $stats[4], $stats[5]);

//Insert Pokemon info from PokeAPI.
//Maximum id is the pokedex id# of the last Pokemon to extract.
for($id=1; $id<=40;$id++){
	
	//Reset arrays to NULL each iteration.
	for($i=0; $i<2; $i++){
		$type[$i] = NULL;
	}
	for($i=0; $i<3; $i++){
		$ability[$i] = NULL;
	}
	for($i=0; $i<6; $i++){
		$stat[$i] = NULL;
	}

	//Extract info from PokeAPI.
	$data = file_get_contents('http://pokeapi.co/api/v2/pokemon/'.$id.'/');
	
	//Read the JSON data.
	$poke = json_decode($data);

	$name = $poke->name;

	//For types, abilities, and stats, add info to the corresponding array.
	//array_reverse is done since the data comes in reversed order for some reason.
	$typee = $poke->types;
	$typeee = array_reverse($typee);
	for($i=0; $i<count($typeee); $i++){
		$type[$i] = $typeee[$i]->type->name;
	}

	$abil = $poke->abilities;
	$abilll = array_reverse($abil);
	for($i=0; $i<count($abilll); $i++){
		$ability[$i] = $abilll[$i]->ability->name;
	}

	$statss = $poke->stats;
	$statsss = array_reverse($statss);
	for($i=0; $i<6; $i++){
		$stats[$i] = $statsss[$i]->base_stat;
	}

	
	//Run the prepared statement and insert Pokemon into database
	$stmt->execute();
}

echo "Done!";

$stmt->close();
$conn->close();


?>

</body>


</html>