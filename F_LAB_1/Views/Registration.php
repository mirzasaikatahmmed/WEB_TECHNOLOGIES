<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>User Registration</title>
</head>
<body>
    <fieldset>
        <legend>Registration</legend>
        <form action="../Controllers/register.php" method="POST" novalidate>
            <label for="email">Email: </label>
            <input type="email" id="email" name="email" value="<?php echo isset($_SESSION['email']) ? $_SESSION['email'] : ''; ?>">
            <?php echo isset($_SESSION['emailErr']) ? $_SESSION['emailErr'] : ''; ?>
            <br><br>

            <label for="password">Password: </label>
            <input type="password" id="password" name="password">
            <?php echo isset($_SESSION['passwordErr']) ? $_SESSION['passwordErr'] : ''; ?>
            <br><br>

            <label for="cPassword">Confirm Password: </label>
            <input type="password" id="cPassword" name="cPassword">
            <?php echo isset($_SESSION['cPasswordErr']) ? $_SESSION['cPasswordErr'] : ''; ?>
            <br><br>

            <input type="submit" value="Register">
        </form>
        <?php echo isset($_SESSION['registrationErr']) ? $_SESSION['registrationErr'] : ''; ?>
    </fieldset>
</body>
</html>

<?php
$_SESSION['emailErr'] = '';
$_SESSION['passwordErr'] = '';
$_SESSION['cPasswordErr'] = '';
$_SESSION['registrationErr'] = '';
?>
