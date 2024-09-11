<?php
include_once '../Layouts/header.php';
include_once '../../Config/Database.php';

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


<div class="image-table"></div>
    <table border="1" cellpadding="10" cellspacing="0">
        <thead>
            <tr>
                <th>Image</th>
                <th>File Name</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include_once '../../Config/Database.php';
            $db = getConnection();
            $conn = getConnection();
            include_once '../../Models/UserModel.php';

            $email = $_SESSION['email'];
            $userID = getIDByEmail($conn, $email);
            $query = "SELECT fileID, image_file_name FROM files WHERE userID = ?";
            $stmt = $db->prepare($query);
            $stmt->bind_param('i', $userID);
            $stmt->execute();
            $result = $stmt->get_result();
            while ($image = $result->fetch_assoc()) {
                $fileName = $image['image_file_name'];
                $imageFile = '../../../Storage/Images/' . $fileName;
                echo '<tr>';
                echo '<td><img src="' . $imageFile . '" alt="' . $fileName . '" style="max-width: 200px; max-height: 200px;"></td>';
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