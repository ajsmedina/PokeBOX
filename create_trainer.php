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
$name = $_POST["name"];


$sql = "SELECT *
		FROM TRAINER_DATA
		WHERE name = \"".$name."\"";

$result = $conn->query($sql);
$row = $result->fetch_assoc(); //fetches an assoc list

//echo count($row);
if(is_null($name) || $name==""){
	echo "Please enter a trainer name.";
}
elseif($row==0){
	//Set up statements for insert
	$stmt = $conn->prepare("INSERT INTO TRAINER_DATA (name) VALUES (?)");
	$stmt->bind_param("s", $name);

	$stmt->execute();

	echo "Welcome, ";
	echo $name;
	echo "!";

	$stmt->close();
} else {
	echo "The trainer ".$name." already exists! Try a new name.";
}
$conn->close();

?>

<form action="login.php" method="post">
<input type='submit' value='Login' />
</form>


</body>
</html>