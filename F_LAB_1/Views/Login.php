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
            <form action = "../Controllers/Login.php" method="POST" novalidate>
                <label for = "email">Email: </label>
                <input type="text" id="email" name="email" value="<?php echo isset($_SESSION['email']) ? $_SESSION['email'] : "" ;?>">
                <?php echo isset($_SESSION['emailErr']) ? $_SESSION['emailErr'] : ""; ?>
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