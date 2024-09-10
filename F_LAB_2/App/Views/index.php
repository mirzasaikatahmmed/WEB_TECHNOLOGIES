<?php 
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Media Upload</title>
    <link rel="stylesheet" href="../../Assets/CSS/style.css">
</head>
<body>
    <div class="container">
        <h1>Media Upload</h1>
        <form action="../Controllers/MediaController.php" method="post" enctype="multipart/form-data">
            <input type="file" name="file" id="file" class="file">
            <br><br>
            <button type="submit" name="submit" class="submit">Upload</button>
            <br><br>
            <a class="ShowFiles" href="ShowFiles.php">Show Files</a>

            <?php 
                if(isset($_SESSION['message'])) {
                    echo '<p class="message">'.$_SESSION['message'].'</p>';
                    unset($_SESSION['message']);
                }
            ?>
        </form>
    </div>
</body>
</html>