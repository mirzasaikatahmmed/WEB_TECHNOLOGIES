<?php
include_once '../Layouts/header.php';
include_once '../../Models/UserModel.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: ../Auth/login.php');
    exit();
}
?>


<div class="image-table">
<table border="1" cellpadding="10" cellspacing="0">
    <thead>
        <tr>
            <th>Serial Number</th>
            <th>Image</th>
            <th>File Name</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $db = getConnection();
        $conn = getConnection();

        $email = isset($_SESSION['email']) ? $_SESSION['email'] : '';
        $userID = getUserByEmail($email);
        $query = "SELECT fileID, image_file_name FROM files WHERE userID = ?";
        $stmt = $db->prepare($query);
        $stmt->bind_param('i', $userID);
        $stmt->execute();
        $result = $stmt->get_result();
        $serialNumber = 1;
        while ($image = $result->fetch_assoc()) {
            $fileID = $image['fileID'];
            $fileName = $image['image_file_name'];
            $imageFile = '../../../Storage/Images/' . $fileName;
            echo '<tr>';
            echo '<td>' . $serialNumber++ . '</td>';
            echo '<td><img src="' . $imageFile . '" alt="' . $fileName . '" style="width: auto; height: 100px;"></td>';
            echo '<td>' . $fileName . '</td>';
            echo '</tr>';
        }
        $stmt->close();
        $db->close();
        ?>
    </tbody>
</table>
</div>

<?php include_once '../Layouts/footer.php'; ?>