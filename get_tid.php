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




$sql = "SELECT id
		FROM TRAINER_DATA
		WHERE name = \"".$_POST["name"]."\"";

$result = $conn->query($sql);
$row = $result->fetch_assoc();
echo $row;
echo $row["id"];

?>

</body>


</html>