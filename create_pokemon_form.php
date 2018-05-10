<html>
<body>

<form action="create_pokemon_form2.php" method="post">

Nickname: <input type="text" name="name" 

<?php 
//If going back from page 2, then name will already be filled in.
echo "value= \"".$_POST["name"]."\""; 
?>

 ><br>

Species: <input type="text" name="species" value= 

<?php
//If going back from page 2, then species will already be filled in.
echo "\"".$_POST["species"]."\""; 
?>
 ><br>
<br>

<input type="submit" value='Next'>

<input type='submit' value='Back' onclick='this.form.action="main_menu.php";' />
<?php
	//Create fields for all stats.
	//If going back from page 2, user will not have to reinput the stats since they are in these hidden fields.
	//If starting on page 1, initialize stats to 0.
	$stats = array("hp","atk","def","spatk","spdef","spd");
	for($i = 0; $i< sizeof($stats);$i++){
		echo "<input type=\"text\"  style=\"visibility: hidden\" name=\"".$stats[$i]."\" readonly value=\"";
		if(is_numeric($_POST[$stats[$i]])){echo $_POST[$stats[$i]];}else{echo 0;}
		echo "\"> <br />";
	}
	
	//If going back from page 2, user will not have to reinput name and ability since they are in this hidden field.
	echo "<input type=\"text\"  style=\"visibility: hidden\" name=\"nature\" readonly value=\"".$_POST["nature"]."\"> <br />";
	echo "<input type=\"text\"  style=\"visibility: hidden\" name=\"ability\" readonly value=\"".$_POST["ability"]."\"> <br />";
	
	echo "<input type=\"text\" style=\"visibility: hidden\" name=\"tid\" readonly value=\"";
	echo $_POST["tid"];
	echo "\"> <br />"
?>

</form>

</body>
</html>