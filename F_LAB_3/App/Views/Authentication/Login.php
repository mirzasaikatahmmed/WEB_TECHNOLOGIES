<?php include_once '../Layouts/header.php'; ?>

<div class="login-form">
    <h2>Login</h2>
    <form method="POST" action="../../Controllers/LoginController.php" onsubmit="return isValid(this);" novalidate>
        
        Email: <input type="email" name="username" id="username">
        <span id="err1" style="color:red"></span>
        <br>

        Password: <input type="password" name="password" id="password">
        <span id="err2" style="color:red"></span>
        <br>

        <div style="display: flex; justify-content: space-between; align-items: center;">
            <label for="remember_me">
            <input type="checkbox" name="remember_me">
            Remember Me
            </label>
        </div>

        <button type="submit">Login</button>
    </form>
</div>

<?php include_once '../Layouts/footer.php'; ?>
