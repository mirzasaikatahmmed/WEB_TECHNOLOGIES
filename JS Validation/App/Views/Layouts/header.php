<?php 
    session_start();
    $isLoggedIn = isset($_SESSION['isLoggedIn']) && $_SESSION['isLoggedIn'] === true;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image Store</title>
    <link rel="stylesheet" type="text/css" href="../../../Assets/CSS/style.css">
    <script src="../../../Assets/JS/script.js"></script>
</head>
<body>
<header>
    <div class="logo">
        <h1>Image Drive</h1>
    </div>
    <div class="nav-links">
        <?php if ($isLoggedIn): ?>
            <a href="../Users/Dashboard.php">Dashboard</a>
            <a href="../Users/UploadFiles.php">Upload Image</a>
            <div class="dropdown">
                <button class="dropbtn">Account</button>
                <div class="dropdown-content">
                    <a href="../Users/Profile.php">Profile</a>
                    <a href="../Users/ChangePassword.php">Change Password</a>
                    <a href="../../Controllers/LogoutController.php">Logout</a>
                </div>
            </div>
        <?php else: ?>
            <a href="../Authentication/Login.php">Login</a>
            <a href="../Authentication/Registration.php">Registration</a>
        <?php endif; ?>
    </div>
</header>
