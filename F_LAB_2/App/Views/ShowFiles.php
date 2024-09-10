<?php
$dir = '../../Assets/Media/';
$files = scandir($dir);
$files = array_diff($files, array('.', '..'));
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Uploaded Pictures</title>
    <link rel="stylesheet" href="../../Assets/CSS/styles.css">
</head>
<body>
    <h2>Uploaded Pictures</h2>
    <div style="display: flex; flex-wrap: wrap;">
        <?php
        foreach ($files as $file) {
            $filePath = $dir . $file;
            echo '<div style="margin: 10px;">';
            echo '<img src="' . $filePath . '" alt="' . $file . '" style="max-width: 200px; max-height: 200px;">';
            echo '</div>';
        }
        ?>
    </div>
</body>
</html>