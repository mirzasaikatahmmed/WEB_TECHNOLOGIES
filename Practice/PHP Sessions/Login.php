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

                <label for = "username">Username</label>
                <input type="test" id="username" name="username" value="<?php echo isset($_SESSION['uname']) ? $_SESSION['uname'] : "" ;?>">
                <?php echo isset($_SESSION['usernameErr']) ? $_SESSION['usernameErr'] : ""; ?>
                <br><br>

                <label for = "password">Password</label>
                <input type="password" id="password" name="password" value="<?php echo isset($_SESSION['pass']) ? $_SESSION['pass'] : "" ;?>">
                <?php echo isset($_SESSION['passwordErr']) ? $_SESSION['passwordErr'] : ""; ?>
                <br><br>

                <input type="submit" value="Login">

            </form>
        </fieldset>
        <?php echo isset($_SESSION['msg3']) ? $_SESSION['msg3'] : ""; ?>
    </body>
</html>