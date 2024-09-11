<?php 
include_once '../Layouts/header.php';
include_once '../../Config/Database.php';

if (empty($_SESSION['isLoggedIn'])) {
    $_SESSION['err3'] = "Unauthorized Access...!";
    header("Location: ../Authentication/Login.php");
    die();
}
else if ($_SESSION['isLoggedIn'] === false) {
    $_SESSION['err3'] = "Unauthorized Access...!";
    header("Location: ../Authentication/Login.php");
    die();
}
?>

<div class="image-gallery" style="display: flex; flex-wrap: wrap;">
    <?php
    include_once '../../Models/UserModel.php'; 
    $conn = getConnection();
    $email = $_SESSION['email'];
    $id = getIDByEmail($conn, $email);
    $files = getFilesByID($id);

    if (is_array($files)) {
        foreach ($files as $file) {
            if (is_array($file) && isset($file['image_file_name'])) {
                $filePath = '../../../Storage/Images/' . $file['image_file_name'];
                if (file_exists($filePath)) {
                    echo '<div style="margin: 10px;">';
                    echo '<img src="' . $filePath . '" alt="' . $file['image_file_name'] . '" style="max-width: 200px; max-height: 200px;">';
                    echo '</div>';
                } else {
                    echo '<div style="margin: 10px;">Image not found: ' . $file['image_file_name'] . '</div>';
                }
            }
        }
    } else {
        echo 'No files found.';
    }
    ?>
</div>

<?php include_once '../Layouts/footer.php'; ?>