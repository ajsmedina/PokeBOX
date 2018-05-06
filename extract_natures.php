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



//if adding to an existing table, comment this out.
$conn->query("CREATE TABLE NATURES_DATA (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(30) NOT NULL,
statup  VARCHAR(30),
statdown VARCHAR(30)
)");

$name="";
$sup="";
$sdown="";


//Set up statements for insert
$stmt = $conn->prepare("INSERT INTO NATURES_DATA (name, statup, statdown) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $name, $sup, $sdown);

for($id=1; $id<=25;$id++){

	$data = file_get_contents('http://pokeapi.co/api/v2/nature/'.$id);
	
	$nature = json_decode($data);

	$name = $nature->name;
	$sup = $nature->increased_stat->name;
	$sdown = $nature->decreased_stat->name;
	
	$stmt->execute();
}

echo "done!";

$stmt->close();
$conn->close();


?>

</body>


</html>