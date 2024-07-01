<?php 
    session_start(); 
    if (!isset($_SESSION['uname'])) {
        header("Location: login.php");
        exit();
    } 
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Dashboard</title>
</head>
<body>

	<h1>Dashboard</h1>

	<p>Hello, <?php echo $_SESSION['uname']; ?></p>

	<br>

	<p>Logged In: <?php echo date('l jS \of F Y h:i:s A', $_SESSION['loggedInTime']); ?></p>

	<hr>

	<button><a href="Logout.php">Logout</a></button>

</body>
</html>