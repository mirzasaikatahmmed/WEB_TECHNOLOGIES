<?PHP 
    session_start();
    
    if(isset($_POST['submit'])) {
        $file = $_FILES['file'];
        $fileName = $_FILES['file']['name'];
        $fileTmpName = $_FILES['file']['tmp_name'];
        $fileSize = $_FILES['file']['size'];
        $fileError = $_FILES['file']['error'];
        $fileType = $_FILES['file']['type'];

        $fileExt = explode('.', $fileName);
        $fileActualExt = strtolower(end($fileExt));

        $allowed = array('jpg', 'jpeg', 'png');

        if(in_array($fileActualExt, $allowed)) {
            if($fileError === 0) {
                if($fileSize < 1000000) {
                    $fileNameNew = $fileName;
                    $fileDestination = '../../Assets/Media/'.$fileNameNew;
                    move_uploaded_file($fileTmpName, $fileDestination);
                    $_SESSION['message'] = 'File uploaded successfully';
                    header('Location: ../Views/index.php');
                } else {
                    $_SESSION['message'] = 'File is too big';
                    header('Location: ../Views/index.php');
                }
            } else {
                $_SESSION['message'] = 'There was an error uploading your file';
                header('Location: ../Views/index.php');
            }
        } else {
            $_SESSION['message'] = 'You cannot upload files of this type';
            header('Location: ../Views/index.php');
        }
    }
?>