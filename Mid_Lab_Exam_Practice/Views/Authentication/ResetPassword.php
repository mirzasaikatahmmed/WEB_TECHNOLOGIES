<?PHP
 SESSION_START();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
</head>
<body>
    <form action="../../Controllers/ResetPasswordController.php" novalidate>
        <label for="email">Email</label>
        <input type="email" id="email" name="email" value="<?php echo empty($_SESSION['email']) ? "" :  $_SESSION['email'] ?>">
        <span><?php echo empty($_SESSION['err1']) ? "" :  $_SESSION['err1'] ?></span>
        <br><br>
        <input type="submit" value="Reset Password">
        <br><br>
        <?php echo empty($_SESSION['err2']) ? "" :  $_SESSION['err2'] ?>
        <br><br>
        <a href="Login.php">Login</a>
        <br>
        <a href="Registration.php">Register</a>
    </form>
</body>
</html>