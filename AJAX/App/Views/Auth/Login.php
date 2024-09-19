<?php
    session_start();
    $isLoggedIn = isset($_SESSION['user_id']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image Drive</title>
    <link rel="stylesheet" href="../../../Public/Assets/CSS/style.css">
    <script src="../../../Public/Assets/JS/Script.js" defer></script>
</head>
<body>
<div class="login-container">
    <form id="loginForm" action="../../Controllers/LoginController.php" method="POST">
        <h2>Login</h2>

        <?php if (isset($_SESSION['error_message'])): ?>
            <div class="error-message-global">
                <?php echo htmlspecialchars($_SESSION['error_message']); ?>
            </div>
        <?php endif; ?>

        <div class="input-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" placeholder="Enter your email" value="<?php echo empty($_SESSION['email']) ? "" : $_SESSION['email']; ?>">
            <div id="email-error-message" class="error-message"></div>
        </div>

        <div class="input-group">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" placeholder="Enter your password" value="<?php echo empty($_SESSION['password']) ? "" : $_SESSION['password']; ?>">
            <div id="password-error-message" class="error-message"></div>
        </div>

        <button type="submit">Login</button>
    </form>
    <div class="register-link">
        <p>Don't have an account? <a href="./Registration.php">Register here</a></p>
    </div>
</div>

</body>
</html>

