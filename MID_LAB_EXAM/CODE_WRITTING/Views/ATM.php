<?PHP
    SESSION_START();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ATM</title>
</head>
<body>
    <form action="../Controllers/ATMController.php" method="POST" novalidate>
        <label for="AccountNumber">Account Number:</label>
        <input type="text" id="AccountNumber" name="AccountNumber" value="<?PHP echo empty($_SESSION['AccountNumber']) ? "" : $_SESSION['AccountNumber']; ?>">
        <span><?php echo empty($_SESSION['err1']) ? "" :  $_SESSION['err1'] ?></span>
        <br><br>

        <label for="Balance">Balance:</label>
        <input type="number" id="Balance" name="Balance" value="<?PHP echo empty($_SESSION['Balance']) ? "" : $_SESSION['Balance']; ?>">
        <span><?php echo empty($_SESSION['err2']) ? "" :  $_SESSION['err2'] ?></span>
        <br><br>

        <label for="Token">Token:</label>
        <input type="text" id="Token" name="Token" value="<?PHP echo empty($_SESSION['Token']) ? "" : $_SESSION['Token']; ?>">
        <span><?php echo empty($_SESSION['err3']) ? "" :  $_SESSION['err3'] ?></span>
        <br><br>

        <input type="submit" value="Withdraw">
    </form>
</body>
</html>