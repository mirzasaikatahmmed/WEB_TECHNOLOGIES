<?php include_once '../Layouts/header.php'; ?>

<div class="ChangePassword-Form">
    <form method="POST" action="../../Controllers/ChangePasswordController.php" novalidate>
        <label for="email">Email</label>
        <input type="email" id="email" name="email" value="<?php echo empty($_SESSION['email']) ? "" :  $_SESSION['email'] ?>" readonly>

        <label for="password">Password</label>
        <input type="password" id="password" name="password" value="<?php echo empty($_SESSION['password']) ? "" :  $_SESSION['password'] ?>">
		<span><?php echo empty($_SESSION['err1']) ? "" :  $_SESSION['err1'] ?></span>

        <label for="confirmPassword">Confirm Password</label>
        <input type="password" id="confirmPassword" name="confirmPassword">
		<span><?php echo empty($_SESSION['err2']) ? "" :  $_SESSION['err2'] ?></span>

		<span><?php echo empty($_SESSION['err3']) ? "" :  $_SESSION['err3'] ?></span>
        <br><br>

        <button type="submit">Change Password</button>
    </form>
</div>

<?php include_once '../Layouts/footer.php'; ?>