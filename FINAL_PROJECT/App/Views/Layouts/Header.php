<?PHP 
    SESSION_START();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../Public/Assets/CSS/Style.css">
    <title>ShopConnect</title>
</head>
<body>
    <header class="header">
        <div class="logo">
            <h1>ShopConnect</h1>
        </div>
        <div class="user-info">
            <?php if (isset($_SESSION['user_id'])): ?>
                <span>Welcome, <?php echo isset($_SESSION['user_name']) ? $_SESSION['user_name'] : ' Guest'; ?></span>
                <a href="../../Controllers/LogoutController.php">Logout</a>
            <?php endif; ?>
        </div>
    </header>
