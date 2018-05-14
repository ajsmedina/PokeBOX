<html>

	<head>
		<title> PokeBOX</title>
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>

	<body>

		<div id="content">
	<h1> Welcome to PokeBOX! </h1>
		
			<div class="left">
				<h2>Log In</h2>
				<form action="main_menu.php" method="post">
				Trainer Name: <input type="text" name="tname"><br>

				<input type="submit">

				</form>
			</div>

			<div class="right">
				<h2>New Trainer</h2>
				<form action="create_trainer.php" method="post">

				Trainer Name: <input type="text" name="name"><br>

				<input type="submit">
				</form>
			</div>
			
			
		</div>

	</body>
</html>