<?PHP
    session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Login</title>
    </head>
    <body>
        <fieldset>
            <legend>Login</legend>
            <form action = "LoginAction.php" method="POST" novalidate>
                <label for = "username">Username: </label>
                <input type="text" id="username" name="username" value="<?php echo isset($_SESSION['username']) ? $_SESSION['username'] : "" ;?>">
                <?php echo isset($_SESSION['usernameErr']) ? $_SESSION['usernameErr'] : ""; ?>
                <br><br>
                <label for = "password">Password: </label>
                <input type="password" id="password" name="password" value="<?php echo isset($_SESSION['password']) ? $_SESSION['password'] : "" ;?>">
                <?php echo isset($_SESSION['passwordErr']) ? $_SESSION['passwordErr'] : ""; ?>
                <br><br>
                <label for="remember_me">Remember Me</label>
                <input type="checkbox" id="remember_me" name="remember_me">
                <br><br>
                <input type="submit" value="Login">
            </form>
        </fieldset>
        <?php echo isset($_SESSION['msg3']) ? $_SESSION['msg3'] : ""; ?>
    </body>
</html>