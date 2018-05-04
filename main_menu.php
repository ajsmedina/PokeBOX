<html>
<body>

<form action="main_menu.php" method="post">

<?php
	$tid = -1;
	//nametid runs if this is our first time entering the main menu (aka post-login)
	//otherwise, we just need the regular id to be passed on
	if($_POST["tname"]!=NULL){
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
				WHERE name = \"".$_POST["tname"]."\"";

		$result = $conn->query($sql);
		$row = $result->fetch_assoc();
		
		if($row==0){
			//If this runs, then the user did not input a valid trainer id.
			echo "That trainer name ".$_POST["tname"]." is invalid! Either try again, or register your trainer name. <br />;
		} else {
			$tid = $row["id"];
		}
	}else {
		$tid = $_POST["tid"];
	}
	
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
<input type='submit' value='Logout' onclick='this.form.action="login.php";' />

</form>

</body>
</html>