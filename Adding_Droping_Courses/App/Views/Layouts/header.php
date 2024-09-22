<?php
    session_start();
    $isLoggedIn = isset($_SESSION['user_id']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adding Droping Courses</title>
    <link rel="stylesheet" href="../../../Public/Assets/CSS/style.css">
    <script src="../../../Public/Assets/JS/Script.js" defer></script>
</head>
<body>
<header>
    <div class="logo">
        <h1>Adding Droping Courses</h1>
    </div>
    <div class="nav-links">
        <!-- <a href="../Dashboard/Home.php">Home</a>
        <a href="../Images/UploadImages.php">Upload Image</a> -->
        <div class="dropdown">
            <button class="dropbtn">Account</button>
            <div class="dropdown-content">
                <a href="../Users/Profile.php">Profile</a>
                <a href="../Auth/ChangePassword.php">Change Password</a>
                <a href="../../Controllers/LogoutController.php">Logout</a>
            </div>
        </div>
    </div>
</header>
