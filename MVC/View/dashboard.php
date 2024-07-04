<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>
</head>
<body>
    <h1>Welcome, <?php echo $_SESSION['First_Name'] . " " . $_SESSION['Last_Name']; ?>!</h1>
    <a href="/Dashboard/logout">Logout</a>
</body>
</html>
