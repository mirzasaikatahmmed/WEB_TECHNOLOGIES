<?php include_once '../Layouts/header.php'; ?>

<div class="login-form">
    <h2>Login</h2>
    <form id="login-form" method="POST" action="../../Controllers/LoginController.php" onsubmit="return isValid(this);" novalidate>
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" value="<?php echo empty($_SESSION['email']) ? "" : $_SESSION['email']; ?>">
        <span class="error"><?php echo empty($_SESSION['err1']) ? "" :  $_SESSION['err1'] ?></span>

        <label for="password">Password:</label>
        <input type="password" name="password" id="password" value="<?php echo empty($_SESSION['password']) ? "" : $_SESSION['password']; ?>">
        <span class="error"><?php echo empty($_SESSION['err2']) ? "" :  $_SESSION['err2'] ?></span>

        <div style="display: flex; justify-content: space-between; align-items: center;">
            <label for="remember_me">
            <input type="checkbox" name="remember_me" id="remember_me">
            Remember Me
            </label>
            <p><a href="./ForgotPassword.php">Forgot Password?</a></p>
        </div>

        <button type="submit">Login</button>

        <?php if (!empty($_SESSION['err3'])): ?>
            <p class="error"><?php echo $_SESSION['err3']; ?></p>
        <?php endif; ?>
    </form>
</div>

<?php include_once '../Layouts/footer.php'; ?>
