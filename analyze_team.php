


<html>
<body>

<?php
//WORK IN PROGRESS
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

if($sql!=false){
	echo 
}
?>

</form>


<form action="analyze_team.php" method="post">

<?php
		echo "<input type=\"text\" style=\"visibility: hidden\" name=\"tid\" readonly value=\"";
	echo $_POST["tid"];
	echo "\"> <br />"
?>
<input type='submit' value='Back' onclick='this.form.action="main_menu.php";'  />
<input type='submit' value='Analyze Team' />
</form>
<?php
$conn->close();
?>
</body>
</html>