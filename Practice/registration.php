<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Registration</title>
</head>
<body>

	<fieldset>
		<legend>Registration</legend>
		<form action="RegistrationAction.php" method="post" novalidate>

			<label for="username">Username</label>
			<input type="text" name="username" id="username">
			<?php echo isset($_GET['err1']) ? $_GET['err1'] : "" ?>
			<br><br>

			<label for="password">Password</label>
			<input type="password" name="password" id="password">
			<?php echo isset($_GET['err2']) ? $_GET['err2'] : "" ?>
			<br><br>

			<input type="submit" value="Register">
			
		</form>
	</fieldset>

</body>
</html>