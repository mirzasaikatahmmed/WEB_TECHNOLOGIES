<?php 
session_start(); 
if (!isset($_SESSION['Username'])) {
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
    <div class="container">
        <h1>Dashboard</h1>

        <?php
        if (isset($_SESSION['First_Name']) && isset($_SESSION['Last_Name'])) {
            $fullName = $_SESSION['First_Name'] . ' ' . $_SESSION['Last_Name'];
            echo '<p>Hello, ' . $fullName . '</p>';
        } else {
            echo '<p>Hello, ' . $_SESSION['Username'] . '</p>';
        }
        ?>
        <br>
        <p>Logged In: <?php date_default_timezone_set('Asia/Dhaka'); echo date('l jS \of F Y h:i:s A', $_SESSION['loggedInTime']); ?></p>
        <hr>
        <button class="logout-btn"><a href="Logout.php">Logout</a></button>
    </div>
</body>
</html>
