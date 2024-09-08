<?php
    SESSION_START();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>
</head>
<body>
    <form method="POST" action="../../Controllers/ChangePasswordController.php" novalidate>
        <label for="email">Email</label>
        <input type="email" id="email" name="email" value="<?php echo empty($_SESSION['email']) ? "" :  $_SESSION['email'] ?>" readonly>
        <br><br>
        <label for="password">Password</label>
        <input type="password" id="password" name="password" value="<?php echo empty($_SESSION['password']) ? "" :  $_SESSION['password'] ?>">
		<span><?php echo empty($_SESSION['err1']) ? "" :  $_SESSION['err1'] ?></span>
        <br><br>
        <label for="confirmPassword">Confirm Password</label>
        <input type="password" id="confirmPassword" name="confirmPassword">
		<span><?php echo empty($_SESSION['err2']) ? "" :  $_SESSION['err2'] ?></span>
        <br><br>
		<span><?php echo empty($_SESSION['err1']) ? "" :  $_SESSION['err1'] ?></span>
        <br><br>
        <button type="submit">Change Password</button>
    </form>
</body>
</html>