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
$conn->query("CREATE TABLE TRAINER_DATA (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(30) NOT NULL
)");

$conn->close();


?>

</body>


</html>