<PHP 
    SESSION_START();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
</head>
<body>
    <form method="POST" action="../../Controllers/RegistrationController.php">
        <label for="name">Full Name: </label>
        <input type="text" name="name" id="name">
        <br><br>

        <label for="email">Email: </label>
        <input type="email" name="email" id="email">
        <br><br>

        <label for="password">Password: </label>
        <input type="password" name="password" id="password">
        <br><br>

        <button id="submit">Register</button>
    </form>
</body>
</html>