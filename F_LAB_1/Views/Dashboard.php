<?php
session_start();

if (!isset($_SESSION['user'])) {
    header("Location: Login.php");
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
    <h1>Welcome, <?php echo htmlspecialchars($_SESSION['user']['email']); ?>!</h1>
    <p>This is your dashboard.</p>
    <form action="../Controllers/Logout.php" method="POST">
        <input type="submit" value="Logout">
    </form>
</body>
</html>
