<?php
include_once '../Layouts/header.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: ../Auth/login.php');
    exit();
}
?>

<div class="UploadFiles-Form">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <h2>Upload Files</h2>
            <form id="uploadForm" action="../../Controllers/UploadImagesController.php" method="post" enctype="multipart/form-data" novalidate>
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

<?php include_once '../Layouts/footer.php'; ?>