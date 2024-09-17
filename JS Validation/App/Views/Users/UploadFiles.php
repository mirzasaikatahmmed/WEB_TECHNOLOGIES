<?php
include_once '../Layouts/header.php';

if (empty($_SESSION['isLoggedIn']) || $_SESSION['isLoggedIn'] === false) {
    $_SESSION['err3'] = "Unauthorized Access...!";
    header("Location: ../Authentication/Login.php");
    die();
}
?>

<div class="UploadFiles-Form">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <h2>Upload Files</h2>
            <form id="uploadForm" action="../../Controllers/UploadFileController.php" method="post" enctype="multipart/form-data" novalidate>
                <div class="form-group">
                    <label for="file">Select File</label>
                    <input type="file" class="form-control-file" id="file" name="file">
                </div>
                <button type="submit" class="btn btn-primary">Upload</button>
            </form>
            <br><br>
            <div id="error-message" class="alert alert-danger" style="display: none;"></div>
            <?php
                if (isset($_SESSION['message'])) {
                    echo '<div class="alert alert-info">' . $_SESSION['message'] . '</div>';
                    unset($_SESSION['message']);
                }
            ?>
        </div>
    </div>
</div>

<script>
document.getElementById('uploadForm').addEventListener('submit', function(event) {
    const fileInput = document.getElementById('file');
    const file = fileInput.files[0];
    const allowedExtensions = ['jpg', 'jpeg', 'png'];
    const maxSize = 10000000;
    const errorMessageDiv = document.getElementById('error-message');

    errorMessageDiv.style.display = 'none';
    errorMessageDiv.textContent = '';

    if (!file) {
        errorMessageDiv.textContent = 'No file selected';
        errorMessageDiv.style.display = 'block';
        event.preventDefault();
        return;
    }

    const fileExtension = file.name.split('.').pop().toLowerCase();
    if (!allowedExtensions.includes(fileExtension)) {
        errorMessageDiv.textContent = 'You cannot upload files of this type';
        errorMessageDiv.style.display = 'block';
        event.preventDefault();
        return;
    }

    if (file.size > maxSize) {
        errorMessageDiv.textContent = 'File is too big';
        errorMessageDiv.style.display = 'block';
        event.preventDefault();
        return;
    }
});
</script>

<?php include_once '../Layouts/footer.php'; ?>