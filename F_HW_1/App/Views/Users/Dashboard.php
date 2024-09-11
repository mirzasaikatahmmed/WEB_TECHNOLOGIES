<?php 
include_once '../Layouts/header.php';

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

<div class="image-gallery">
    <?php
    include_once '../../Models/UserModel.php'; 
        $email = $_SESSION['email'];
        $student_id = getStudentIDByEmail($email);
        $files = getFilesByStudentID($student_id);

        foreach ($files as $file) {
            $filePath = '../../../Storage/Images/' . $file['image_file_name'];
            echo '<div style="margin: 10px;">';
            echo '<img src="' . $filePath . '" alt="' . $file['image_file_name'] . '" style="max-width: 200px; max-height: 200px;">';
            echo '</div>';
        }
    ?>
</div>

<?php include_once '../Layouts/footer.php'; ?>