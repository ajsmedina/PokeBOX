<html>
<body>

<form action="main_menu.php" method="post">
<?php
	echo "Trainer ID: <input type=\"text\" name=\"tid\" readonly value=\"";
	echo $_POST["tid"];
	echo "\"> <br />"
?>


<input type='submit' value='Create Pokemon' onclick='this.form.action="create_pokemon_form.php";' />
<input type='submit' value='Team Select' onclick='this.form.action="team_select.php";' />

</form>

</body>
</html>