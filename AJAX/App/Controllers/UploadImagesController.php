<?php
session_start();
require_once '../Models/UserModel.php';
$conn = getConnection();
if (!isset($_SESSION['user_id'])) {
    header('Location: ../Views/Images/UploadImages.php');
    exit();
}

$email = $_SESSION['email'];
$userID = $_SESSION['user_id'];
if ($userID === null) {
    $_SESSION['message'] = 'Invalid userID or email not found in database.';
    header('Location: ../Views/Images/UploadImages.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_FILES['file']) && $_FILES['file']['error'] !== UPLOAD_ERR_NO_FILE) {
        $file = $_FILES['file'];
        $fileName = $file['name'];
        $fileTmpName = $file['tmp_name'];
        $fileSize = $file['size'];
        $fileError = $file['error'];
        $fileType = $file['type'];

        $fileExt = explode('.', $fileName);
        $fileActualExt = strtolower(end($fileExt));

        $allowed = ['jpg', 'jpeg', 'png'];

        if (in_array($fileActualExt, $allowed)) {
            if ($fileError === 0) {
                if ($fileSize < 10000000) {
                    $userInfo = getUserInfoByID($conn, $userID);
                    if ($userInfo === null) {
                        $_SESSION['message'] = 'User information not found.';
                        header('Location: ../Views/Images/UploadImages.php');
                        exit();
                    }

                    $studentName = $userInfo['name'];
                    $name = str_replace(' ', '_', $studentName);
                    $studentID = $userInfo['student_id'];
                    $serial = 1;
                    $fileNameNew = "{$name}[{$studentID}][{$serial}].{$fileActualExt}";
                    while (file_exists("../../Public/Uploads/{$fileNameNew}")) {
                        $serial++;
                        $fileNameNew = "{$name}[{$studentID}][{$serial}].{$fileActualExt}";
                    }

                    $fileDestination = "../../Public/Uploads/{$fileNameNew}";

                    if (move_uploaded_file($fileTmpName, $fileDestination)) {
                        if (insertFileData($conn, $fileNameNew, $userID)) {
                            $_SESSION['message'] = 'File uploaded successfully';
                        } else {
                            $_SESSION['message'] = 'Failed to insert file data';
                        }

                        header('Location: ../Views/Images/UploadImages.php');
                        exit();
                    } else {
                        $_SESSION['message'] = 'There was an error moving your file';
                        header('Location: ../Views/Images/UploadImages.php');
                        exit();
                    }
                } else {
                    $_SESSION['message'] = 'File is too big';
                    header('Location: ../Views/Images/UploadImages.php');
                    exit();
                }
            } else {
                $_SESSION['message'] = 'There was an error uploading your file';
                header('Location: ../Views/Images/UploadImages.php');
                exit();
            }
        } else {
            $_SESSION['message'] = 'You cannot upload files of this type';
            header('Location: ../Views/Images/UploadImages.php');
            exit();
        }
    } else {
        $_SESSION['message'] = 'No file was uploaded';
        header('Location: ../Views/Images/UploadImages.php');
        exit();
    }
} else {
    $_SESSION['message'] = 'Upload Failed';
    header('Location: ../Views/Images/UploadImages.php');
    exit();
}
?>
