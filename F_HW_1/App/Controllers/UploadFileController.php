<?php
session_start();
require_once '../Models/UserModel.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['submit'])) {
        $file = $_FILES['file'];
        $fileName = $_FILES['file']['name'];
        $fileTmpName = $_FILES['file']['tmp_name'];
        $fileSize = $_FILES['file']['size'];
        $fileError = $_FILES['file']['error'];
        $fileType = $_FILES['file']['type'];

        $fileExt = explode('.', $fileName);
        $fileActualExt = strtolower(end($fileExt));

        $allowed = ['jpg', 'jpeg', 'png'];

        if (in_array($fileActualExt, $allowed)) {
            if ($fileError === 0) {
                if ($fileSize < 1000000) {
                    $uniqueID = uniqid('', true);
                    $fileNameNew = "{$uniqueID}.{$fileActualExt}";
                    $fileDestination = "../../Storage/Images/{$fileNameNew}";

                    if (move_uploaded_file($fileTmpName, $fileDestination)) {
                        $email = $_SESSION['email'];
                        $studentID = getStudentIDByEmail($email);

                        insertFileData($studentID, $fileNameNew);

                        $_SESSION['message'] = 'File uploaded successfully';
                        header('Location: ../Views/Users/UploadFiles.php');
                    } else {
                        $_SESSION['message'] = 'There was an error moving your file';
                        header('Location: ../Views/Users/UploadFiles.php');
                    }
                } else {
                    $_SESSION['message'] = 'File is too big';
                    header('Location: ../Views/Users/UploadFiles.php');
                }
            } else {
                $_SESSION['message'] = 'There was an error uploading your file';
                header('Location: ../Views/Users/UploadFiles.php');
            }
        } else {
            $_SESSION['message'] = 'You cannot upload files of this type';
            header('Location: ../Views/Users/UploadFiles.php');
        }
    }
} else {
    $_SESSION['message'] = 'Upload Failed';
    header('Location: ../Views/Users/UploadFiles.php');
}
