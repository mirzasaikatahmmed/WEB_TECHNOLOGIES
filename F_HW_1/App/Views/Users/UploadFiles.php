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
            <?php
            if (isset($_SESSION['message'])) {
                echo '<div class="alert alert-info">' . $_SESSION['message'] . '</div>';
                unset($_SESSION['message']);
            }
            ?>
            <form action="../../Controllers/UploadFileController.php" method="post" enctype="multipart/form-data" novalidate>
                <div class="form-group">
                    <label for="file">Select File</label>
                    <input type="file" class="form-control-file" id="file" name="file">
                </div>
                <button type="submit" class="btn btn-primary">Upload</button>
            </form>
        </div>
    </div>
</div>

<?php include_once '../Layouts/footer.php'; ?>