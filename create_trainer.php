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

$name = $_POST["name"];

//Check if the inputted name already exists.
$sql = "SELECT *
		FROM TRAINER_DATA
		WHERE name = \"".$name."\"";

$result = $conn->query($sql);
$row = $result->fetch_assoc();

//If no name was entered, then don't do anything.
if(is_null($name) || $name==""){
	echo "Please enter a trainer name.";
}
//If name was not found, then it is a valid name. Add it to the list of trainers.
elseif($row==0){
	$stmt = $conn->prepare("INSERT INTO TRAINER_DATA (name) VALUES (?)");
	$stmt->bind_param("s", $name);

	$stmt->execute();

	echo "Welcome, ".$name."!";

	$stmt->close();
} 
//If the name was found, then it is not a valid name.
else {
	echo "The trainer ".$name." already exists! Try a new name.";
}
$conn->close();

?>

<form action="login.php" method="post">
<input type='submit' value='Login' />
</form>


</body>
</html>