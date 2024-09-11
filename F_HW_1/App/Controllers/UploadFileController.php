<?php
session_start();
require_once '../Config/Database.php';
$conn = getConnection();
$email = $_SESSION['email'];

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
                if ($fileSize < 1000000) {
                    $uniqueID = uniqid('', true);
                    $fileNameNew = "{$uniqueID}.{$fileActualExt}";
                    $fileDestination = "../../Storage/Images/{$fileNameNew}";

                    if (move_uploaded_file($fileTmpName, $fileDestination)) {
                        $userID = getIDByEmail($conn, $email);

                        if ($userID !== null) {
                            if (insertFileData($conn, $fileNameNew, $userID)) {
                                $_SESSION['message'] = 'File uploaded successfully';
                            } else {
                                $_SESSION['message'] = 'Failed to insert file data';
                            }
                        } else {
                            $_SESSION['message'] = 'Invalid userID';
                        }

                        header('Location: ../Views/Users/UploadFiles.php');
                        exit();
                    } else {
                        $_SESSION['message'] = 'There was an error moving your file';
                        header('Location: ../Views/Users/UploadFiles.php');
                        exit();
                    }
                } else {
                    $_SESSION['message'] = 'File is too big';
                    header('Location: ../Views/Users/UploadFiles.php');
                    exit();
                }
            } else {
                $_SESSION['message'] = 'There was an error uploading your file';
                header('Location: ../Views/Users/UploadFiles.php');
                exit();
            }
        } else {
            $_SESSION['message'] = 'You cannot upload files of this type';
            header('Location: ../Views/Users/UploadFiles.php');
            exit();
        }
    } else {
        $_SESSION['message'] = 'No file was uploaded';
        header('Location: ../Views/Users/UploadFiles.php');
        exit();
    }
} else {
    $_SESSION['message'] = 'Upload Failed';
    header('Location: ../Views/Users/UploadFiles.php');
    exit();
}

function getIDByEmail($conn, $email) {
    $stmt = $conn->prepare("SELECT id FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row['id'];
    } else {
        return null;
    }
}

function insertFileData($conn, $fileNameNew, $userID) {
    $stmtCheck = $conn->prepare("SELECT id FROM users WHERE id = ?");
    $stmtCheck->bind_param("i", $userID);
    $stmtCheck->execute();
    $resultCheck = $stmtCheck->get_result();

    if ($resultCheck->num_rows > 0) {
        $stmt = $conn->prepare("INSERT INTO files (image_file_name, userID) VALUES (?, ?)");
        $stmt->bind_param("si", $fileNameNew, $userID);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    } else {
        return false;
    }
}

?>