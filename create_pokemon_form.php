<html>
<body>

<form action="create_pokemon_form2.php" method="post">

Nickname: <input type="text" name="name" 
<?php echo "value= \"".$_POST["name"]."\""; ?>
 ><br>

Species: <input type="text" name="species" value= <?php echo "\"".$_POST["species"]."\""; ?> ><br>
<br>

<?php
	echo "<input type=\"text\" style=\"visibility: hidden\" name=\"tid\" readonly value=\"";
	echo $_POST["tid"];
	echo "\"> <br />"
?>

<input type="submit" value='Next'>
<input type='submit' value='Back' onclick='this.form.action="main_menu.php";' />
</form>

</body>
</html>