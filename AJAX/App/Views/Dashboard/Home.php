<?php
include_once '../Layouts/header.php';
include_once '../../Models/UserModel.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: ../Auth/login.php');
    exit();
}
?>

<div class="gallery-container">
    <div class="gallery">
        <?php
        $db = getConnection();
        $conn = getConnection();
        $userID = $_SESSION['user_id'];
        $query = "SELECT fileID, image_file_name FROM files WHERE userID = ?";
        $stmt = $db->prepare($query);
        $stmt->bind_param('i', $userID);
        $stmt->execute();
        $result = $stmt->get_result();
        
        while ($image = $result->fetch_assoc()) {
            $fileName = $image['image_file_name'];
            $imageFile = '../../../Public/Uploads/' . $fileName;
            echo '<div class="gallery-item">';
            echo '<img src="' . $imageFile . '" alt="' . $fileName . '" onclick="openModal(this.src, this.alt)">';
            echo '<div class="image-title">' . $fileName . '</div>';
            echo '</div>';
        }
        
        $stmt->close();
        $db->close();
        ?>
    </div>
</div>

<div id="imageModal" class="modal" onclick="closeModal()">
    <span class="close">&times;</span>
    <img class="modal-content" id="modalImage">
    <div id="caption"></div>
</div>

<script>
    function openModal(src, alt) {
        var modal = document.getElementById("imageModal");
        var modalImg = document.getElementById("modalImage");
        var captionText = document.getElementById("caption");
        
        modal.style.display = "block";
        modalImg.src = src;
        captionText.innerHTML = alt;
    }

    function closeModal() {
        var modal = document.getElementById("imageModal");
        modal.style.display = "none";
    }
</script>
<?php include_once '../Layouts/footer.php'; ?>
