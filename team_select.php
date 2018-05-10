


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

//Load relevent info of each Pokemon the user has
$sql = "SELECT id,name,species
		FROM POKEMON_BOX_DATA
		WHERE trainerid = ".$_POST["tid"];
?>


<form>


 <?php 

//Pokemon teams are 6, so make 6 dropdown menus.
for($i=0;$i<6;$i++){
	
	//Query the SQL statement
	$result = $conn->query($sql);
	
	
	echo "<select name=\"";
	
	//id for which position in the team this is
	echo "poke".$i."\" >";
	
		echo "<option value=\"EMPTY\"> [EMPTY] </option>"; 
		
		//Run for each Pokemon retrieved form the database
		//$row will be NULL when there are no more Pokemon left.
		while($row = $result->fetch_assoc()) {
			
			echo"<option value=\"";
			echo $row["id"]; //This is the Pokemon's unique index number.
			echo "\"";
			
			if($_POST["poke".$i]==$row["id"]){
				echo " selected ";
			}
			echo ">" ;
			echo $row["name"];
			echo " (".$row["species"].")";
			echo "</option>";
		}
	echo "</select>";
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