


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

$sql = "SELECT id,name,species
		FROM POKEMON_BOX_DATA
		WHERE trainerid = ".$_POST["tid"];
?>


<form>


 <?php 
 for($i=0;$i<6;$i++){
$result = $conn->query($sql);
echo "<select>";
	echo "<option value=\"EMPTY\"> [EMPTY] </option>"; 
	while($row = $result->fetch_assoc()) {
		
        echo"<option value=\"";
		echo $row["id"];
		echo "\">" ;
		echo $row["name"];
		echo " (".$row["species"].")";
		echo "</option>";
	}
echo "</select>";
 }
?>

</form>


<form action="main_menu.php" method="post">
<?php
	echo "Trainer ID: <input type=\"text\" name=\"tid\" readonly value=\"";
	echo $_POST["tid"];
	echo "\"> <br />"
?>
<input type='submit' value='Main Menu' />
</form>
<?php
$conn->close();
?>
</body>
</html>