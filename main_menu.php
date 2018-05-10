<html>
<body>

<form action="main_menu.php" method="post">

<?php
	$tid = -1;
	
	//If tid is null, that means user is coming from the login screen
	//Need to validate the user id.
	if(is_null($_POST["tid"])){
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

		//Get the trainer id of the trainer with the given name.
		$sql = "SELECT id
				FROM TRAINER_DATA
				WHERE name = \"".$_POST["tname"]."\"";

		$result = $conn->query($sql);
		$row = $result->fetch_assoc();
		
		//If row==0, then the user did not input a valid trainer id.
		if($row==0){
			echo "The trainer name ".$_POST["tname"]." is invalid! Either try again, or register your trainer name. <br />";
		} else {
			$tid = $row["id"];
		}
	}else {
		$tid = $_POST["tid"];
	}
	
	//Only provide the navigation menu if the user was actually logged in.
	if($row!=0 || $tid!=-1){

		echo "<input type=\"text\" style=\"visibility: hidden\" name=\"tid\" readonly value=\"";
		echo $tid;
		echo "\"> <br />"
?>

<input type='submit' value='Create Pokemon' onclick='this.form.action="create_pokemon_form.php";' />
<input type='submit' value='Team Select' onclick='this.form.action="team_select.php";' />

<?
	}
?>
<br /> <br />
<input type='submit' value='Logout' onclick='this.form.action="login.php";' />

</form>

</body>
</html>