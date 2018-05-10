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


$conn->query("CREATE TABLE POKEMON_BOX_DATA (
				id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
				trainerid INT(6) NOT NULL,
				name VARCHAR(30) NOT NULL,
				species VARCHAR(30) NOT NULL,
				ability VARCHAR(30) NOT NULL,
				nature VARCHAR(30) NOT NULL,
				move1 VARCHAR(30),
				move2 VARCHAR(30),
				move3 VARCHAR(30),
				move4 VARCHAR(30),
				hp INT(6),
				atk INT(6),
				def INT(6),
				spatk INT(6),
				spdef INT(6),
				spd INT(6)
)");

$conn->close();
?>

</body>


</html>