<html>
<body>

<form action="create_pokemon.php" method="post">
Name: <input type="text" name="name"><br>
Species: <input type="text" name="species"><br>
Ability: <input type="text" name="ability"><br>
Nature: <input type="text" name="nature"><br>

<?php
	echo "Trainer ID: <input type=\"text\" name=\"tid\" readonly value=\"";
	echo $_POST["tid"];
	echo "\"> <br />"
?>

<input type="submit">
<input type='submit' value='Main Menu' onclick='this.form.action="main_menu.php";' />
</form>

</body>
</html>