<?php include_once '../Layouts/header.php'; ?>

<div class="ForgotPassword-Form">
    <h2>Forgot Password</h2>
    <form method="POST" action="../../Controllers/ForgotPasswordController.php" novalidate>
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" value="<?php echo empty($_SESSION['email']) ? "" : $_SESSION['email']; ?>" placeholder="Enter your email">
        <span class="error"><?php echo empty($_SESSION['err1']) ? "" :  $_SESSION['err1'] ?></span>
        <br><br>

        <button type="submit">Send Email</button>

        <?php if (isset($error)): ?>
            <p class="error"><?php echo $error; ?></p>
        <?php endif; ?>
    </form>
</div>

<?php include_once '../Layouts/footer.php'; ?>