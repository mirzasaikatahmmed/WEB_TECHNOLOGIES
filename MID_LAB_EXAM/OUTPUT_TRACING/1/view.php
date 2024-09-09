<?PHP
    SESSION_START();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View</title>
</head>
<body>
    <form action="controller.php" method="POST" novalidate>
        <label for="name">Full Name</label>
        <input type="text" id="name" name="name">

        <input type="submit" Submit>
    </form>
</body>
</html>